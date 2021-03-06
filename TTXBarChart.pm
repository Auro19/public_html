package TTXBarChart;
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

$TTXBarChart::VERSION='3.01';
BEGIN {
  $TTXBarChart::REVISION = '$Revision: 769 $';
  if ($TTXBarChart::REVISION =~ /(\d+)/) {
    $TTXBarChart::REVISION = $1;
  }
};

use strict;
use TTXData;
my %defaults = (
  barwidth => 20,
  barheight => 15,
  chartwidth => 200,
  chartheight => 100,
  barcolor => 'blue',
  fontratio => 0.4
);
# ========================================================================= vbar

sub vbar {
  my ($data, $barwidth, $chartheight, $barcolor, $fratio) = @_;
  my $buff;
  my $cfg = TTXData::get('CONFIG');
  my $img = $cfg->get('imgurl')."/dot.gif";
  if (!$barwidth || $barwidth =~ /\D/) {
    $barwidth = $defaults{barwidth};
  }
  if (!$chartheight || $chartheight =~ /\D/) {
    $chartheight = $defaults{chartheight};
  }
  if ($barcolor eq undef) {
    $barcolor = $defaults{barcolor}
  }
  if ($fratio eq undef) {
    $fratio = $defaults{fontratio}
  }
  my $lblstyle = "style=\"font-size: ".(int ($barwidth*$fratio))."px\"";
  my $valstyle = "style=\"font-size: ".(int ($barwidth*$fratio) - 1)."px;font-family:serif\"";
  $buff =<<EOT;
<table cellpadding=0 cellspacing=1>
 <tr>
EOT
  my $max = 0;
  for (my $i = 0; $i < @{$data}; ++$i) {
    if ($data->[$i]->{val} eq undef || $data->[$i]->{val} < 0) {
      $data->[$i]->{val} = 0;
    }
    if ($data->[$i]->{val} > $max) {
      $max = $data->[$i]->{val};
    }
  }
  for (my $i = 0; $i < @{$data}; ++$i) {
    my $h=1;
    if ($max) {
      $h = int (($data->[$i]->{val} / $max) * $chartheight);
    }
    my $alt = $data->[$i]->{val};
    my $v = $alt;
    if ($v > 9999) {
      if ($v < 1000000) {
        $v = (int ($v/1000)).'K';
      } else {
        $v = (int ($v/1000000)).'M';
      }
    }
    $buff .= <<EOT;
  <td valign=bottom>
   <table cellpadding=0 cellspacing=0>
    <tr>
     <td align=center $valstyle>$v</td>
    </tr>
    <tr bgcolor="$barcolor">
     <td><img src="$img" width=$barwidth height=$h alt=$alt /></td>
    </tr>
   </table>
  </td>
EOT
  }
  $buff .= "</tr>\n<tr>";
  for (my $i = 0; $i < @{$data}; ++$i) {
    my $lbl = $data->[$i]->{lbl};
    if ($lbl =~ /^(..?.?)/) {
      $lbl = $1;
    } else {
      $lbl = '&nbsp;';
    }
    $buff .= "<td valign=top align=center $lblstyle>$lbl</td>\n";
  }
  $buff .=<<EOT;
 </tr>
</table>
EOT
  return $buff;
}
# ========================================================================= hbar

sub hbar {
  my ($data, $barheight, $chartwidth, $barcolor, $fratio, $percentage) = @_;
  my $buff;
  my $cfg = TTXData::get('CONFIG');
  my $img = $cfg->get('imgurl')."/dot.gif";
  if (!$barheight || $barheight =~ /\D/) {
    $barheight = $defaults{barheight};
  }
  if (!$chartwidth || $chartwidth =~ /\D/) {
    $chartwidth = $defaults{chartwidth};
  }
  if ($barcolor eq undef) {
    $barcolor = $defaults{barcolor}
  }
  if ($fratio eq undef) {
    $fratio = $defaults{fontratio}
  }
  my $lblstyle = "style=\"font-size: ".(int ($barheight*$fratio))."px\"";
  my $valstyle = "style=\"font-size: ".(int ($barheight*$fratio) - 1)."px;font-family:serif\"";
  $buff =<<EOT;
<table cellpadding=0 cellspacing=1>
EOT
  my $max = 0;
  my $total;
  for (my $i = 0; $i < @{$data}; ++$i) {
    if ($data->[$i]->{val} eq undef || $data->[$i]->{val} < 0) {
      $data->[$i]->{val} = 0;
    }
    if ($data->[$i]->{val} > $max) {
      $max = $data->[$i]->{val};
    }
    $total += $data->[$i]->{val};
  }
  for (my $i = 0; $i < @{$data}; ++$i) {
    my $w=1;
    if ($max) {
      $w = int (($data->[$i]->{val} / $max) * $chartwidth);
    }
    my $alt = $data->[$i]->{val};
    my $v = $alt;
    if ($v > 9999) {
      if ($v < 1000000) {
        $v = (int ($v/1000)).'K';
      } else {
        $v = (int ($v/1000000)).'M';
      }
    }
    my $lbl = $data->[$i]->{lbl};
    if ($lbl eq undef) {
      $lbl = '&nbsp;';
    }
    if ($percentage && $total) {
      $v .= ' &nbsp;('.(int (100 * $alt / $total)).'%)';
    }
    $buff .= <<EOT;
 <tr>
  <td valign=middle align=right $lblstyle>$lbl</td>
  <td valign=middle align=left>
   <table  cellpadding=0 cellspacing=0>
    <tr>
     <td align=left valign=middle>
      <table cellpadding=0 cellspacing=0>
       <tr bgcolor="$barcolor">
        <td><img src="$img" width=$w height=$barheight alt=$alt /></td>
       </tr>
      </table>
     </td>
     <td align=left valign=middle>
      <span $valstyle>&nbsp;$v</span>
     </td>
    </tr>
   </table>
  </td>
 </tr>
EOT
  }
  $buff .= "</table>\n";
  return $buff;
}


1;
#
