package TTXDictionary;
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

$TTXDictionary::VERSION='3.01';
BEGIN {
  $TTXDictionary::REVISION = '$Revision: 769 $';
  if ($TTXDictionary::REVISION =~ /(\d+)/) {
    $TTXDictionary::REVISION = $1;
  }
};

use strict;
use CSV;
require TTXCommon;
my %dictionary;
my $isLoaded;
my $uselang;

# ========================================================================= lang

sub lang {
  my $uselang = $_[0];
}
# ========================================================================= load

sub load {
  return 1 if $isLoaded;
  my $cfg = TTXData::get('CONFIG');
  my $dictname = 'dict'.(($uselang ne undef) ? "-$uselang":'').'.csv';
  my $fn = $cfg->get('basedir')."/$dictname";
  if (open(CSV, $fn)) {
    foreach (my $line = <CSV>; $line ne undef; $line = <CSV>) {
      chomp($line);
      $line =~ s/(\r|\n)+$//;
      my ($en, $trans) = CSVsplit($line);
      $dictionary{$en} = TTXCommon::decodeit($trans);
    }
    close CSV;
  }
  if ($cfg->get('charset') ne undef) {
    $dictionary{CHARSET} = TTXCommon::decodeit($cfg->get('charset'));
  }
  if ($dictionary{CHARSET} eq undef) {
    $dictionary{CHARSET} = 'ISO-8859-1';
  }
  $isLoaded = 1;
  return 1;
}
# ==================================================================== translate

sub translate {
  my $txt = $_[0];
  load();
  if (defined $dictionary{$txt}) {
    $txt = $dictionary{$txt};
  }
  return $txt;
}

1;
#
