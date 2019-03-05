package TTXPrint;
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

$TTXPrint::VERSION='3.01';
BEGIN {
  $TTXPrint::REVISION = '$Revision: 769 $';
  if ($TTXPrint::REVISION =~ /(\d+)/) {
    $TTXPrint::REVISION = $1;
  }
};
use strict;
use TTXCommon;
require TTXMarkup;

# =================================================================== dumpticket

sub dumpticket {
  my ($cfg, $query, $data, $t) = @_;
  my $isoper = 0;
  if ($cfg->get('_USER') ne undef) {
    $isoper = 1;
  }
  $data->{TICKET_status} = TTXCommon::status($t->{status});
  $data->{TICKET_id} = $t->{id};
  $data->{TICKET_subject} = $t->{subject};
  $data->{TICKET_email} = $t->{email};
  $data->{TICKET_name} = $t->{name};
  $data->{TICKET_key} = $t->{key};
  $data->{TICKET_open} = TTXCommon::tmtxt($t->{open});
  $data->{TICKET_GROUP} = TTXCommon::decodeit($cfg->get($t->{grp})) || '-';
  $data->{TICKET_group} = $data->{TICKET_GROUP};
  $data->{TICKET_closed} = $t->{status} eq 'CLS' ? TTXCommon::tmtxt($t->{closed}):'-';
  $data->{TICKET_oper} = $isoper ? $t->{oper}:(($t->{oper} eq undef) ? 'not assigned':'assigned');
  my @xvars = $cfg->vars();
  @xvars = grep(/^x/, @xvars);
  foreach my $xvar (@xvars) {
    $data->{'TICKET_c'.$cfg->get($xvar)} = $t->{'c'.$cfg->get($xvar)};
  }
}

# ===================================================================== annotate
sub annotate {
  my ($cfg, $query, $data) = @_;
  if ($cfg->get('_USER') eq undef) {
    return 'print';
  }
  my $tickets = TTXCommon::dbtik();
  if ($tickets eq undef || $tickets->error() ne undef) {
    $data->{ERROR_MESSAGE} = $tickets->errortext();
    return undef;
  }
  my $t;
  if ($cfg->get('_USER') ne undef) {
    $t = $tickets->ticket(int(TTXCommon::cleanit($query, 'key')));
  } else {
    $t = $tickets->ticketbykey(TTXCommon::cleanit($query, 'key'));
  }
  if ($t eq undef) {
    $data->{ERROR_MESSAGE} = $cfg->get('shortkey') ? 'Ticket does not exist':'Invalid access key';
    return undef;
  }
  dumpticket($cfg, $query, $data, $t);
  return undef;
}

# ======================================================================== print
sub print {
  my ($cfg, $query, $data) = @_;
  my $tickets = TTXCommon::dbtik();
  if ($tickets eq undef || $tickets->error() ne undef) {
    $data->{ERROR_MESSAGE} = $tickets->errortext();
    return undef;
  }
  my $t;
  if ($cfg->get('_USER') ne undef) {
    $t = $tickets->ticket(int(TTXCommon::cleanit($query, 'key')));
  } else {
    $t = $tickets->ticketbykey(TTXCommon::cleanit($query, 'key'));
  }
  if ($t eq undef) {
    $data->{ERROR_MESSAGE} = $cfg->get('shortkey') ? 'Ticket does not exist':'Invalid access key';
    return undef;
  }
  dumpticket($cfg, $query, $data, $t);
  $data->{NOTES} = TTXCommon::decodeit($query->param('notes'));
  $data->{NOTES} =~ s/</&lt;/g;
  $data->{NOTES} =~ s/\n/<br>\n/g;
  $data->{PAGEHEADING} = 'Ticket '.$t->{id};
  $data->{PRINTBASEWIDTH} = $cfg->get('PRINTBASEWIDTH') || 680;
  my $isoper = 0;
  $isoper = 1 if $cfg->get('_USER') ne undef;
  my %images;
  my %names;
  my $hasImageSize = 0;
  eval 'use Image::Size';
  if ($@ eq undef) {
    $hasImageSize = 1;
  }
  foreach my $msg (@{$t->{messages}}) {
    my @msgparts = split(/\n\n/, $msg);
    my $rawheader = shift @msgparts;
    my $body = join("\n\n", @msgparts);
    my @headerlines = split(/\n/, $rawheader);
    chomp @headerlines;
    my %header;
    foreach my $line (@headerlines) {
      if ($line =~ /^([a-zA-Z][a-zA-Z0-9-]*):\s*(.*)$/) {
        $header{uc $1} = $2;
      }
    }
    next if $header{OPERATOR} && $header{INTERNAL} =~ /Yes/ && !$isoper;
    my $style;
    if ($header{OPERATOR}) {
      if ($header{INTERNAL} =~ /Yes/) {
        $style = 'imsg';
      } else {
        $style = 'omsg'
      }
    } else {
      $style = 'cmsg';
    }
    my $imgtag;
    my $fromtag;
    if ($header{OPERATOR}) {
      if (!exists $images{$header{FROM}}) {
        my $u = TTXUser->new($header{FROM});
        if ($u eq undef) {
          $images{$header{FROM}} = undef;
          $names{$header{FROM}} = undef;
        } else {
          $images{$header{FROM}} = $u->{image};
          $names{$header{FROM}} = $u->{fname}.' '.$u->{lname};
        }
      }
      if ($images{$header{FROM}} ne undef) {
        $imgtag = "<br><br class=sm><center><nobr>&nbsp;<img src=\"$images{$header{FROM}}\">&nbsp;</nobr></center><br class=sm>\n";
      }
      $fromtag = $names{$header{FROM}};
      if ($isoper) { $fromtag .= " ($header{FROM})"; }
    }
    $fromtag = $header{FROM} if $fromtag eq undef;
    $fromtag =~ s/</&lt;/g;
    if ($isoper) {
      if ($header{IP} ne undef) {
        $fromtag .= "<br>[$header{IP}]";
      }
    }
    $data->{MESSAGES} .= "<tr>\n<td width=20% align=left valign=top class=$style>$fromtag<br>".TTXCommon::tmtxt($header{DATE})."$imgtag</td>\n";
    #if($ENV{HTTP_USER_AGENT} =~ /MSIE/) {
    #  $body =~ s/([^\s\?\%]{60})/$1\n/g;
    #} else {
    #  $body =~ s/(\S{60})/$1\n/g;
    #}
    $body =~ s/</&lt;/g;
    $body = TTXMarkup::html($body);
    $body =~ s/\n/<br>\n/g;
    $body = TTXCommon::splitlongwords($body, 60, 1);
    my $firstfile = 1;
    for (my $i=1; $i < 4; ++$i) {
      my $skip;
      if ($header{"FILE$i"} ne undef) {
        if ($firstfile) {
          $body .= "<br><br class=sm>\n";
          $firstfile = 0;
        }
        $header{"FILE$i"} =~ /fid=([^&]+)&fn=([^"]+)/;
        my $fid=$1;
        my $fn=$2;
        $fn =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
        my ($x, $y, $gid);
        if ($hasImageSize) {
          ($x, $y, $gid) = imgsize($cfg->get('basedir')."/files/$fid");
        }
        if ($x ne undef && $y ne undef) {
          my $maxx = $data->{PRINTBASEWIDTH} * 0.667;
          if ($x > $maxx) {
            my $scale = $maxx / $x;
            $x = int ($scale * $x);
            $y = int ($scale * $y);
          }
          $body .= "<center><small><img src=\"http://$ENV{HTTP_HOST}$ENV{SCRIPT_NAME}?cmd=img&gid=$gid&fid=$fid\" width=$x height=$y><br>$fn<br></small></center>\n";
        }
      }
    }
    $data->{MESSAGES} .= "<td align=left valign=top class=$style>$body</td>\n</tr>\n";
  }
  return undef;
}
1;
#
