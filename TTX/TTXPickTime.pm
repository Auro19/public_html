package TTXPickTime;
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

$TTXPickTime::VERSION='3.01';
BEGIN {
  $TTXPickTime::REVISION = '$Revision: 769 $';
  if ($TTXPickTime::REVISION =~ /(\d+)/) {
    $TTXPickTime::REVISION = $1;
  }
};

use strict;

# ===================================================================== picktime

sub picktime {
  my ($query, $pref, $start) = @_;
  my $buff;
  my $sec = $query->param($pref.'sec');
  my $min = $query->param($pref.'min');
  my $hour = $query->param($pref.'hour');
  if ($sec =~ /\D/ || $sec > 59) {
    $sec = '';
  }
  if ($min =~ /\D/ || $min > 59) {
    $min = '';
  }
  if ($hour =~ /\D/ || $hour > 23) {
    $hour = '';
  }
  if ($hour eq '') {
    $min = '';
    $sec = '';
  } else {
    if ($min eq '') {
      $min = $start ? 0:59;
      $sec = $start ? 0:59;
    } elsif ($sec eq '') {
      $sec = $start ? 0:59;
    }
  }
  $query->param(-name => $pref.'sec', -value => $sec);
  $query->param(-name => $pref.'min', -value => $min);
  $query->param(-name => $pref.'hour', -value => $hour);
  $buff .= "<select name=$pref"."hour>\n<option></option>\n";
  for (my $i = 0; $i < 24; ++$i) {
    $buff .= '<option';
    $buff .= ' selected' if $hour == $i;
    $buff .= ">$i</option>\n";
  }
  $buff .= "</select>\n<select name=$pref"."min>\n<option></option>\n";
  for (my $i = 0; $i < 60; $i += 5) {
    if ($min < $i && $min > ($i - 5)) {
      my $j = $min;
      if ($j =~ /^\d$/) { $j = "0$j"; }
      $buff .= "<option value=$min selected>$j</option>\n";
    }
    $buff .= "<option value=$i";
    $buff .= ' selected' if $min ne '' && $min == $i;
    my $j = $i;
    if ($j =~ /^\d$/) { $j = "0$j"; }
    $buff .= ">$j</option>\n";
  }
  $buff .= "</select>\n<input type=hidden name=$pref"."sec value=$sec>\n";
  return $buff;
}

1;
#
