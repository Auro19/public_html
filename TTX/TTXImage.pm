package TTXImage;
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

$TTXImage::VERSION='3.01';
BEGIN {
  $TTXImage::REVISION = '$Revision: 769 $';
  if ($TTXImage::REVISION =~ /(\d+)/) {
    $TTXImage::REVISION = $1;
  }
};

use strict;
use TTXData;

my %imgtypes = (
  gif => 'gif',
  jpg => 'jpeg',
  tiff => 'tiff',
  tif => 'tiff',
  png => 'png',
  bmp => 'bmp'
);

# ========================================================================= show

sub show {
  my $fid = shift;
  my $gid = shift;
  my $dir = TTXData::get('CONFIG')->get('basedir')."/files";
  if (($fid !~ /^\d+-\d+-\d+-\d+\.dat$/) || (!open(F, "$dir/$fid"))) {
    return;
  }
  $gid = $imgtypes{lc $gid};
  print "Content-Type:image/$gid\n\n";
  binmode(F);
  my $buff;
  while (read(F, $buff,1024)) {
     print $buff;
  }
  close F;
}
1;
