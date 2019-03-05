package TTXCache;
#
# This is an optional Cache module for
# Trouble Ticket Express help desk package.
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

$TTXCache::VERSION='3.01';
BEGIN {
  $TTXCache::REVISION = '$Revision: 769 $';
  if ($TTXCache::REVISION =~ /(\d+)/) {
    $TTXCache::REVISION = $1;
  }
};
use strict;
use TTXCommon;
use TTXData;
my $usemd5 = undef;
#
# constants
#
my $cacheidxfn = 'cache.cgi';
my $cachedir = 'cache';
my $maxage = 180; # seconds
my $nolog = 1;
my $serial;

# ======================================================================== mdhex

sub mdhex {
  if ($usemd5 eq undef) {
    $usemd5 = 0;
    eval 'use Digest::MD5 qw(md5_hex)';
    if ($@ eq undef) {
      $usemd5 = 1;
    }
  }
  if ($usemd5) {
    return md5_hex(TTXCommon::encodeit($_[0]));
  }
  return undef;
}

# ==================================================================== signature

sub signature {
  my $query = $_[0];
  my $str;
  foreach my $key (sort $query->param) {
    $str .= $key.'='.$query->param($key);
  }
  return mdhex($str);
}
# ======================================================================== store

sub store {
  my ($cfg, $query, $pg, $pgsig) = @_;
  my $pgsid = $query->param('sid');
  $pgsid = 0 if $pgsid eq undef;
  my $pgcmd = $query->param('cmd');
  my $idxfn = $cfg->get('basedir')."/$cacheidxfn";
  if (! -e $idxfn) {
    if (open(IDX, ">$idxfn")) {
      flock(IDX,2);
      print IDX "0\n";
      $serial = 0;
      close IDX;
    } else {
      return;
    }
  }
  if (! -d $cfg->get('basedir')."/$cachedir") {
    mkdir $cfg->get('basedir')."/$cachedir", 0777;
  }
  if (open(IDX, "+<$idxfn")) {
    flock IDX,2;
    my @pages;
    my @buff = <IDX>;
    chomp @buff;
    my $curtm = time();
    my $purgetm = $curtm - $maxage;
    my $sn = shift @buff;
    if ($sn ne undef && $serial ne undef && $sn ne $serial) {
      close IDX;
      return;
    }
    foreach my $line (@buff) {
      my ($tm, $cmd, $sid, $sig, $n) = split(/-/, $line);
      if ($tm < $purgetm || "$cmd-$sid-$sig" eq "$pgcmd-$pgsid-$pgsig") {
        unlink $cfg->get('basedir')."/$cachedir/$tm-$n.cgi";
        next;
      }
      push (@pages, "$tm-$cmd-$sid-$sig-$n");
    }
    my $n = 0;
    while (-e $cfg->get('basedir')."/$cachedir/$curtm-$n.cgi") {
      ++$n;
      return if $n > 100; # endless loop control, just to make sure
    }
    push (@pages, "$curtm-$pgcmd-$pgsid-$pgsig-$n");
    if (!open(PG, ">".$cfg->get('basedir')."/$cachedir/$curtm-$n.cgi")) {
      close IDX;
      return;
    }
    seek IDX,0,0;
    print IDX "$serial\n";
    foreach my $p (@pages) {
      print IDX "$p\n";
    }
    truncate(IDX, tell (IDX));
    close IDX;
    print PG $pg;
    close PG;
  }
}
# ========================================================================== hit

sub hit {
  my ($cfg, $query) = @_;
  my $pgsig = signature($query);
  my $pgsid = $query->param('sid');
  $pgsid = 0 if $pgsid eq undef;
  my $pgcmd = $query->param('cmd');
  my $idxfn = $cfg->get('basedir')."/$cacheidxfn";
  if (open(IDX, "$idxfn")) {
    my @buff = <IDX>;
    close IDX;
    chomp @buff;
    my $curtm = time();
    my $purgetm = $curtm - $maxage;
    $serial = shift @buff;
    foreach my $line (@buff) {
      my ($tm, $cmd, $sid, $sig, $n) = split(/-/, $line);
      next if $tm < $purgetm || "$cmd-$sid-$sig" ne "$pgcmd-$pgsid-$pgsig";
      return "$tm-$n";
    }
  }
  return 0;
}

# ========================================================================= page

sub page {
  my ($cfg, $pgid) = @_;
  if (open(PG, $cfg->get('basedir')."/$cachedir/$pgid.cgi")) {
    my @buff = <PG>;
    close PG;
    return join('', @buff);
  }
  return undef;
}
# ======================================================================== purge

sub purge {
  my $cfg = TTXData::get('CONFIG');
  my $idxfn = $cfg->get('basedir')."/$cacheidxfn";
  if (open(IDX, "+<$idxfn")) {
    flock IDX,2;
    my @buff = <IDX>;
    chomp @buff;
    foreach my $line (@buff) {
      my ($tm, $cmd, $sid, $sig, $n) = split(/-/, $line);
      unlink $cfg->get('basedir')."/$cachedir/$tm-$n.cgi";
    }
    seek IDX,0,0;
    ++$serial;
    print IDX "$serial\n";
    truncate(IDX, tell (IDX));
    close IDX;
  }
  logit('P');
}
# ======================================================================== logit

sub logit {
  return if $nolog;
  my $cfg = TTXData::get('CONFIG');
  my $fn = $cfg->get('basedir')."/ttxcachelog.txt";
  if (open(CACHELOG, ">>$fn")) {
    flock(CACHELOG,2);
    seek(CACHELOG, 0, 2);
    print CACHELOG time()."|$_[0]\n";
    close CACHELOG;
  }
}

1;
#
