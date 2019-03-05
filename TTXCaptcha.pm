package TTXCaptcha;
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

$TTXCaptcha::VERSION='3.01';
BEGIN {
  $TTXCaptcha::REVISION = '$Revision: 769 $';
  if ($TTXCaptcha::REVISION =~ /(\d+)/) {
    $TTXCaptcha::REVISION = $1;
  }
};
use strict;
my %cmx;
my $cw;
my $dot;
my $nodot;
my $dw;

# ======================================================================== image

sub image {
  my ($key) = @_;
  $key =~ s/\D//g;
  my $buff;
  my $bpx = 7;
  my $pal = "\xFF\xFF\xFF" .
            "\x66\x66\x66" .
            "\x99\x99\x99" .
            "\x33\x33\x33";

  initcmx();

  my $dh = int(length($dot) / $dw);
  my $ch = int(length($cmx{0}) / $cw);
  my $len = length($key);
  my $w = $len * $cw * $dw;
  my $h = $ch * $dh;
  my $blmt = 2**$bpx - 3;

# GIF header
  $buff .= 'GIF87a';
  $buff .= pack 'v2', $w, $h;
  $buff .= pack 'C', 0xF0 + $bpx - 1;
  $buff .= "\0";
  $buff .= "\0";
  $buff .= $pal;
  $buff .= "\0" x ((2**$bpx * 3) - length $pal);
  $buff .= ',';
  $buff .= "\0\0\0\0";
  $buff .= pack 'v2', $w, $h;
  $buff .= "\0";
  $buff .= pack 'C', $bpx;
#
# Build image
#
  my $img;
  for (my $y = 0; $y < $h; $y++) {
    my $cy = int($y / $dh) % $ch;
    my $dy = $y % $dh;
    for (my $x = 0; $x < $w; $x += $dw) {
      my $cx = int($x / $dw) % $cw;
      my $i = int($x / $dw / $cw);
      my $c = substr $key, $i, 1;
      my $d = substr $cmx{$c}, $cy * $cw + $cx, 1;
      my $di = ($d eq 'X') ? $dot : $nodot;
      $di = substr $di, $dy * $dw, $dw;
      for ($i = 0; $i < length $di; $i++) {
        $c = ord substr $di, $i, 1;
        $c = chr $c;
        $img .= $c;
      }
    }
  }
#
# Pack image
#
  my $cnt;
  for (my $i = 0; $i < length $img; $i += $cnt) {
    $cnt = (length $img) - $i;
    if ($cnt > $blmt) {
      $cnt = $blmt;
    }
    $buff .= pack 'C', $cnt + 1;
    $buff .= substr $img, $i, $cnt;
    $buff .= pack 'C', 2**$bpx;
  }
  $buff .= pack 'C', 2**$bpx + 1;
  $buff .= "\0";
  $buff .= ';';
  return "Content-type: image/gif\nExpires: Wed, 05-Jan-2007 01:01:01 GMT\n\n".$buff;
}
# ====================================================================== initcmx
#
# Quick and dirty solution. The matrix must be loadable
#

sub initcmx {

  $cw = 6;

$cmx{'0'} = qq~
......
.XXX..
X...X.
X...X.
X...X.
X...X.
X...X.
.XXX..
......
~;
$cmx{'1'} = qq~
..X...
.XX...
..X...
..X...
..X...
..X...
.XXX..
......
......
~;
if (rand() < 0.5) {
$cmx{'1'} = qq~
......
...X..
..XX..
...X..
...X..
...X..
...X..
...X..
..XXX.
~;
}
$cmx{'2'} = qq~
......
......
.XXX..
X...X.
....X.
..XX..
.X....
X.....
XXXXX.
~;
if (rand() < 0.3) {
$cmx{'2'} = qq~
.XXX..
X...X.
....X.
..XX..
.X....
X.....
XXXXX.
......
......
~;
}
if (rand() > 0.7) {
$cmx{'2'} = qq~
......
XXXX..
....X.
....X.
.XXX..
X.....
X.....
XXXXX.
......
~;
}
$cmx{'3'} = qq~
XXXXX.
....X.
...X..
..XX..
....X.
X...X.
.XXX..
......
......
~;
$cmx{'4'} = qq~
......
...X..
..XX..
.X.X..
X..X..
XXXXX.
...X..
...X..
......
~;
if (rand() < 0.5) {
$cmx{'4'} = qq~
....X.
...XX.
..X.X.
.X..X.
XXXXX.
....X.
....X.
......
......
~;
}
$cmx{'5'} = qq~
......
......
XXXXX.
X.....
XXXX..
....X.
....X.
X...X.
.XXX..
~;
$cmx{'6'} = qq~
..XXX.
.X....
X.....
XXXX..
X...X.
X...X.
.XXX..
......
......
~;
if (rand() < 0.5) {
$cmx{'6'} = qq~
......
......
..XXX.
.X....
X.....
XXXX..
X...X.
X...X.
.XXX..
~;
}
$cmx{'7'} = qq~
......
XXXXX.
....X.
...X..
..X...
.X....
.X....
.X....
......
~;
if (rand() < 0.5) {
$cmx{'7'} = qq~
......
......
XXXXXX
.....X
....X.
...X..
..X...
.X....
X.....
~;
}
$cmx{'8'} = qq~
.XXX..
X...X.
X...X.
.XXX..
X...X.
X...X.
.XXX..
......
......
~;
$cmx{'9'} = qq~
......
......
.XXX..
X...X.
X...X.
.XXXX.
....X.
...X..
XXX...
~;
  for (my $i = 0; $i < 10; ++$i) {
    $cmx{$i} =~ s/\n//g;
    $cmx{$i} =~ s/\r//g;
  }
  $dot = qq~
\1\2\1
\2\3\2
\1\2\1
~;
  $nodot = qq~
\0\0\0
\0\0\0
\0\0\0
~;
 $dot =~ s/\n//g;
 $dot =~ s/\r//g;
 $nodot =~ s/\n//g;
 $nodot =~ s/\r//g;
 $dw = 3;
}

1;
#
