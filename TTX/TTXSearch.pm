package TTXSearch;
#
# Common search functions
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

$TTXSearch::VERSION='3.01';
BEGIN {
  $TTXSearch::REVISION = '$Revision: 769 $';
  if ($TTXSearch::REVISION =~ /(\d+)/) {
    $TTXSearch::REVISION = $1;
  }
};
use strict;

# ===================================================================== tokenize

sub tokenize {
  my $s = $_[0];
  $s =~ s /\*/\\\*/g;
  $s =~ s /\?/\\\?/g;
  $s =~ s /\+/\\\+/g;
  $s =~ s /\{/\\\{/g;
  my @tokens;
  while ($s =~ /"([^"]*)"/) {
    my $t = $1;
    push @tokens, $t;
    $s =~ s/"[^"]*"//;
  }
  push @tokens, split(/ /, $s);
  my @cleantokens;
  foreach my $token (@tokens) {
    $token =~ s/\s+/ /g;
    $token =~ s/^\s//;
    $token =~ s/\s+$//;
    next if $token eq undef;
    next if grep(/^$token$/i, @cleantokens);
    push @cleantokens, $token;
  }
  return \@cleantokens;
}

# ===================================================================== abstract

sub abstract {
  my ($text, $tokens) = @_;
  $text =~ s/<([^>]*)>/&lt;$1&gt;/g;
#
# mark tokens
#
  foreach my $token (@{$tokens}) {
    $token =~ s/ /(\\s+|\\s+<b>|<\/b>\\s+)/g;
    $text =~ s/\b($token)\b/<b>$1<\/b>/gi;
  }
#
# remove enclosed token marks
#
  $text =~ s/(<b>[^<]*)<b>/$1/g;
  $text =~ s/<\/b>([^<]*<\/b>)/$1/g;
#
# remove extra text
#
  $text =~ /^([^<]*)<b>/;
  my @plain = split(/<b>[^<]*<\/b>/, $text);
  if (@plain < 1) {
    push @plain, '';
  }
  $text = "</b>$text<b>";
  my @bold = split(/<\/b>[^<]*<b>/, $text);
  my $i = 1;
  my $out;
  my $wcnt = 10;
  foreach (@plain) {
    my $pt = $_;
    $pt =~ s/^\s+//;
    $pt =~ s/\s+$//;
    my @words = split(/\s+/, $pt);
    if ($i == 1 && @bold > 0) {
      if (@words > 5) {
        $out = "... ".join(" ", splice(@words, -5));
      } else {
        $out = join(" ", @words);
      }
    } elsif ($bold[$i] eq undef) {
      $wcnt *= 8 if @bold == 0;
      if (@words > $wcnt / 2) {
        $out .= join(" ", splice(@words, 0, $wcnt / 2))." ...";
      } else {
        $out .= join(" ", @words);
      }
    } else {
      if (@words <= $wcnt) {
        $out .= join(" ", @words);
      } else {
        $out .= join(" ", splice(@words, 0, $wcnt / 2)).
                " ... ".
                join(" ", splice(@words, $wcnt / (-2)));
      }
    }
    $out .= " <b>$bold[$i]</b> " if $bold[$i] ne undef;
    $i++;
  }
  return $out;
}
1;
#
