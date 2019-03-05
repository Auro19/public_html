package TTXPreview;
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

$TTXPreview::VERSION='3.01';
BEGIN {
  $TTXPreview::REVISION = '$Revision: 769 $';
  if ($TTXPreview::REVISION =~ /(\d+)/) {
    $TTXPreview::REVISION = $1;
  }
};
use strict;
use TTXCommon;
require TTXMarkup;

# ======================================================================== print
sub preview {
  my ($cfg, $query, $data) = @_;
  $data->{PAGEHEADING} = '[%Message Preview%]';
  my $body = TTXCommon::cleanit($query, 'msg',1);
  $body =~ s/</&lt;/g;
  $body = TTXMarkup::html($body);
  $body =~ s/\n/<br>\n/g;
  $data->{MESSAGE} = $body;
  return undef;
}
1;
#
