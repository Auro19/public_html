package TTXMarkup;
#
# Markup language pack/upack routines
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
#
$TTXMarkup::VERSION='3.01';
BEGIN {
  $TTXMarkup::REVISION = '$Revision: 769 $';
  if ($TTXMarkup::REVISION =~ /(\d+)/) {
    $TTXMarkup::REVISION = $1;
  }
};
use strict;
use TTXData;

# =============================================================== loaddictionary
my $_dictptr = {};
my $_cantranslate = undef;

sub loaddictionary {
  if ($_cantranslate eq undef) {
    $_cantranslate = 0;
    my $cfg = $_[0];
    my $fn = $cfg->get('basedir') . '/markdict.txt';
    if (-f $fn && open(DICT, $fn)) {
      my @buff = <DICT>;
      close DICT;
      if (int(@buff) > 0) {
        chomp @buff;
        foreach my $line (@buff) {
          $line =~ s/^\s+//;
          my ($str, $url) = split(/\s+/, $line);
          $_dictptr->{$str} = $url;
        }
        $_cantranslate = 1;
      }
    }
  }
  if ($_cantranslate) {
    return $_dictptr;
  }
  return undef;
}
# ====================================================================== markurl

sub markurl {
  my $cfg = TTXData::get('CONFIG');
  my $buff = $_[0];
  my $hreflvl = 0;
  my $mark;
  my $dict = loaddictionary($cfg);
  do {
    if ($buff =~ /^(<a[^>]*?>)/gi) {    # if open anchor tag
      $mark .= $1;                      #   copy it
      ++$hreflvl;                       #   and increase level
    } elsif ($buff =~ /^<\/a>/gi) {     # else if closing anchor tag
      $mark .= '</a>';                  #   copy it
      --$hreflvl if $hreflvl > 0;       #   and decrease level
    } elsif ($buff =~ /^(<[^<>]*>)/g) { # else if other tag
      $mark .= $1;                      #   copy it 
    } elsif ($buff =~ /^</gi) {         # else if unmatched tag
      $mark .= '&lt;';                  #   escape and copy it
    } elsif (!$hreflvl) {               # else if not inside an anchor tag
      if ($buff =~ /^([^<]+)/g) {       #   colect all till next '<'
        my $tmp = $1;
        do {
          my $pattern = '[A-Za-z\d\/+,._?&=%:-]';
          my $epat = '\dA-Za-z\'!#\$%&*\/=?^`\{\|\}\~_+-';
          if ($tmp =~ /^([,:.\@$epat]+)/g) {  # collect a character sequence that may contain a link
            my $line = $1;
            if ($line =~ /([Hh][Tt][Tt][Pp][Ss]?):\/\/($pattern+)/) {
              $mark .= "<a href=\"$1://$2\" target=\"_blank\">$2<\/a>";
            } elsif ($line =~ /([wW][wW][wW]\.[a-zA-Z0-9-]+\.[A-Za-z]+)($pattern+)?/) {
              $mark .= "<a href=\"http://$1$2\" target=\"_blank\">$1$2<\/a>";
            } elsif ($line =~ /^\./) {
              $mark .= $line;
            } elsif ($line =~ /([.$epat]*[$epat]@[0-9A-Za-z-]+\.[0-9A-Za-z.-]+)/) {
              $mark .= "<a href=\"mailto:$1\">$1</a>";
            } else {
              if ($dict ne undef) {
                foreach my $key (keys %{$dict}) {
                  if ($line =~ /^$key$/) {
                    $line = '<a href="'.$dict->{$key}."\" target=_blank>$line</a>";
                    last;
                  }
                }
              }
              $mark .= $line;
            }
          } elsif ($tmp =~ /^([^,:.\@$epat]+)/g) { # collect a character sequence that may not contain a link
            $mark .= $1;
          } else { 
            $mark .= $tmp;
          }
          my $n = pos($tmp);
          if ($n >= length($tmp) || $n < 1) {
            $tmp = undef;   # just to make sure
          } else {
            $tmp = substr($tmp, $n);
          }
        } while (length($tmp) > 0);
      }
    } else {
      if ($buff =~ /^([^<]*)/g) {
        $mark .= $1;
      }
    }
    my $n = pos($buff);
    if ($n >= length($buff) || $n < 1) {
      $buff = undef;
    } else  {
      $buff = substr($buff, $n);
    }
  } while (length($buff) > 0);
  return $mark;
}
# ========================================================================= html

sub html {
  my $buff = shift;
  $buff =~ s/\[(\/?)(u|b|i|code|small)]/<$1$2>/gi; # [b] [i] [u] [code] [small]
  $buff =~ s/\[\(]/[/g; # [[]
  $buff =~ s/\[url\s+([^]\s]+)\s*]/<a href="$1" target=_blank>/gi;
  $buff =~ s/\[\/url\s*]/<\/a>/gi;
  $buff =~ s/\[(image|img)\s+([^]\s]+)\s*]/<img src="$2">/gi;
  $buff =~ s/\[\/(image|img)\s*]/<\/img>/gi;
  $buff =~ s/  /&nbsp; /g;
  $buff = markurl($buff);
  return $buff;
}
# ========================================================================= help

sub help {
  return undef;
}
# ======================================================================== strip

sub strip {
  my $buff = shift;
  $buff =~ s/\[(\/?)(u|b|i|code|small)]//gi; # [b] [i] [u] [code] [small]
  $buff =~ s/\[\(]/[/g; # [[]
  $buff =~ s/\[url\s+([^]\s]+)\s*]/$1 /gi;
  $buff =~ s/\[\/url\s*]/ /gi;
  $buff =~ s/\[(image|img)\s+([^]\s]+)\s*]/$2 /gi;
  $buff =~ s/\[\/(image|img)\s*]//gi;
  return $buff;
}
1;
#
