package TTXGrpCmd;
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

$TTXGrpCmd::VERSION='3.01';
BEGIN {
  $TTXGrpCmd::REVISION = '$Revision: 769 $';
  if ($TTXGrpCmd::REVISION =~ /(\d+)/) {
    $TTXGrpCmd::REVISION = $1;
  }
};

use strict;
use TTXCommon;
require TTXUser;
use TTXTickets;
require TTXMail;
require TTXMarkup;
require TTXTicket;

# ================================================================== checkgroups
my $groupsenabled;
sub checkgroups {
  if ($groupsenabled eq undef) {
    eval "use TTXGroups";
    if (!$@) {
      $groupsenabled = 1;
    } else {
      $groupsenabled = 0;
      if ($_[0]->get('usegrpsel')) {
        $_[0]->set('usegrpsel', 0);
        $_[0]->save();
      }
    }
  }
}
# ======================================================================= lockdb
my $lockcnt;
sub lockdb {
  return ++$lockcnt if $lockcnt;
  my $cfg = TTXData::get('CONFIG');
  return 1 if $cfg->get('dbmode') !~ /sql/;
  my $lockfile = $cfg->get('basedir')."/lockdb.ttx";
  if (! -f $lockfile) {
    if (!open(LOCK, ">$lockfile")) {
      return 0;
    }
  } elsif (!open(LOCK,"+<$lockfile")) {
    return 0;
  }
  flock(LOCK, 2);
  $lockcnt = 1;
  return 1;
}
# ===================================================================== unlockdb

sub unlockdb {
  return if !$lockcnt;
  my $cfg = TTXData::get('CONFIG');
  return if $cfg->get('dbmode') !~ /sql/;
  --$lockcnt;
  if (!$lockcnt) {
    flock(LOCK, 8);
    close LOCK;
  }
}
# =========================================================================== do

sub do {
  my ($cfg, $query, $data) = @_;
  checkgroups($cfg);
  lockdb();
  my $tickets = TTXCommon::dbtik();
  if ($tickets eq undef || $tickets->error() ne undef) {
    $data->{ERROR_MESSAGE} = $tickets->errortext();
    return undef;
  }
  my $update = 0;
  my @tidlist = $query->param('mtid');
  my $user = $cfg->get('_USER');
  my $userid = $user->{login};
  my $readonly = $user->get('ro') ? 1:0;
  if (!$readonly) {
    foreach my $tid (@tidlist) {
      if ($query->param('del') ne undef) {
        if ($user->get('dt')) {
          $tickets->deltik($tid);
          $update = 1;
        }
      } elsif ($query->param('close') ne undef) {
        my $t = $tickets->ticket($tid);
        next if $t eq undef;
        if ($t->{status} ne 'CLS') {
          if ($t->{oper} eq undef) {
            $t->{oper} = $userid;
          }
          $t->{status} = 'CLS';
          $t->{updated} = time();
          $t->{closed} = $t->{updated};
          TTXCommon::logit("CLOSE|$userid|".$t->{id});
          $update = 1;
        }
      } elsif ($query->param('assign') ne undef) {
        my $t = $tickets->ticket($tid);
        next if $t eq undef;
        my $to = TTXCommon::cleanit($query, 'to');
        next if $to eq undef;
        if ($to !~ /^\+/) {
		  if ($t->{oper} ne $to) {
			my $user = TTXUser->new($to);
			next if ($user eq undef || $user->get('login') eq undef);
			$t->{oper} = $to;
			$t->{status} = 'OPN' if $cfg->get('transferopens') || $t->{status} eq 'PND';
			$update = 1;
			$t->{updated} = time();
			TTXCommon::logit("TRANSFER|$userid|".$t->{id}."|$to");
			TTXTicket::transfernotice({cfg => $cfg, ticket => $t});
		  }
        } elsif($cfg->get('usegrpsel')) {
          my $grp = $query->param('to');
          $grp =~ s /^\+//;
          TTXGroups::grptransfer({cfg => $cfg, ticket => $t, grp => $grp});
          $update = 1;
          $t->{updated} = time();
        }
      }
    }
  }
  $tickets->save() if $update;
  unlockdb();
  $query->param(-name => 'tid', -value => '');
  $query->param(-name => 'del', -value => '');
  $query->param(-name => 'close', -value => '');
  $query->param(-name => 'assign', -value => '');
  return 'helpdesk'
}

1;
#
