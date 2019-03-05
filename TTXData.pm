package TTXData;
#
# Application wide globals
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

$TTXData::VERSION='3.01';
BEGIN {
  $TTXData::REVISION = '$Revision: 769 $';
  if ($TTXData::REVISION =~ /(\d+)/) {
    $TTXData::REVISION = $1;
  }
};
use strict;

# ====================================================================== GLOBALS
my $globals = {};

# ========================================================================== get

sub get {
  return $globals->{$_[0]};
}
# ========================================================================== set

sub set {
  my $name = shift;
  my $value = shift;
  my $old = $globals->{$name};
  $globals->{$name} = $value;
  return $old
}


1;
#
