package TTXSession;
#
# This module is a part of Trouble Ticket Express package
# http://www.troubleticketexpress.com
#
# Copyright 2004-2010, United Web Coders
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.
#
# $Revision: 769 $
# $Date: 2010-03-28 10:34:42 -0400 (Sun, 28 Mar 2010) $
#

$TTXSession::VERSION='3.01';
BEGIN {
  $TTXSession::REVISION = '$Revision: 769 $';
  if ($TTXSession::REVISION =~ /(\d+)/) {
    $TTXSession::REVISION = $1;
  }
};

use strict;
use TTXConfig;
use TTXData;
use vars qw(@ISA);
@ISA = qw(TTXConfig);

my %errmsgs = (
  NOFILENAME => 'Missing file name',
  NOFILE => 'File does not exist',
  OPENERR => 'Error reading file',
  WRERR => 'Error writing file'
);

# ========================================================================== new

sub new {
  my $class = $_[0];
  my $self  = $class->SUPER::new();
  if ($_[1] ne undef && $self->load(TTXData::get('CONFIG')->get('basedir')."/sid/$_[1].cgi")) {
    $self->{_SID} = $_[1];
  }
  return $self;
}

# ====================================================================== refresh

sub refresh {
  my $self = shift;
  my $exptime = TTXData::get('CONFIG')->get('exptime');
  $exptime = 3600 * 10 if !$exptime;
  $self->{expires} = time() + $exptime;
  $self->save();
}
# ====================================================================== expired

sub expired {
  my $self = shift;
  return 1 if $self->{login} ne undef && $self->{expires} < time();
  return 0;
}
# ======================================================================= logout

sub logout {
  my $self = shift;
  if ($self->{login} ne undef) {
    my $fn = TTXData::get('CONFIG')->get('basedir')."/sid/".$self->sid().".cgi";
    $fn =~ /(.*)/; $fn = $1;
    unlink($fn);
  }
}
# ========================================================================== sid

sub sid {
  my $self = shift;
  return $self->{_SID};
}
# ==================================================================== errortext

sub errortext {
  my $self = shift;
  return $errmsgs{$self->{_ERROR_CODE}}." [session]";
}
# ====================================================================== cleanup

sub cleanup {
  if (opendir(DIR, TTXData::get('CONFIG')->get('basedir')."/sid")) {
    my @dirlist = readdir(DIR);
    closedir(DIR);
    my $killtm = time() - 3600 * 24 * 7; # one week ago
    foreach my $file (@dirlist) { # quick and dirty cleanup
      next if $file !~ /^\d+Z\d+\.cgi$/;
      my ($tm) = split(/Z/, $file);
      if ($tm < $killtm) {
        $file =~ /(.*)/; $file = $1;
        unlink TTXData::get('CONFIG')->get('basedir')."/sid/$file";
      }
    }
  }
}
# ======================================================================== login

sub login {
  my $self = shift;
  my $uid = shift;
  if ($uid eq undef) {
    warn "uid eq undef";
    return 0;
  }
  cleanup();
  my $sid = time()."Z".$$.int(rand(900000) + 100000);
  $self->file(TTXData::get('CONFIG')->get('basedir')."/sid/$sid.cgi");
  $self->set('login', $uid);
  my $exptime = TTXData::get('CONFIG')->get('exptime');
  $exptime = 3600 * 10 if !$exptime;
  $self->set('expires', time() + $exptime);
  if ($self->save()) {
    $self->{_SID} = $sid;
    return 1;
  } else {
    return 0;
  }
}

# ====================================================================== qexpand

sub qexpand {
  my ($self, $query, $cmd) = @_;
  my @vars = $self->vars();
  foreach my $id (@vars) {
    next if $id !~ /^$cmd\.(\w+)$/;
    my $var = $1;
    if ($query->param($var) eq undef && $self->get("$id") ne undef) {
      $query->param(-name => $var, -value => $self->get("$id"));
    }
  }
}

# ======================================================================== qsave

sub qsave {
  my ($self, $query, $cmd, $list) = @_;
  my $dosave = 0;
  foreach my $id (@{$list}) {
    if ($self->get("$cmd.$id") ne $query->param($id)) {
      $self->set("$cmd.$id", $query->param($id));
      $dosave = 1;
    }
  }
  if ($dosave) {
    $self->save() ;
    if (TTXData::get('_USECACHE')) {
      eval "use TTXCache";
      TTXCache::purge() if $@ eq undef;
    }
  }
}

1;
#
