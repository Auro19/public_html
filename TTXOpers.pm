package TTXOpers;
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

$TTXOpers::VERSION='3.01';
BEGIN {
  $TTXOpers::REVISION = '$Revision: 769 $';
  if ($TTXOpers::REVISION =~ /(\d+)/) {
    $TTXOpers::REVISION = $1;
  }
};

use strict;
use TTXUser;

# ===================================================================== selector

sub selector {
  my ($cfg, $query, $data) = @_;
  $data->{OPERSELSTD} = '<tr><td align=right class=lbl>[%Assign to%]<font color=red><sup>*</sup></font></td>'."\n<td align=left>";
  $data->{OPERSEL} = "<select name=oper>\n".'<option value="">-- [%please select%] --</option>'."\n".
                     "<option value=\"-\"";
  $data->{OPERSEL} .= ' selected' if $query->param('oper') eq '-';
  $data->{OPERSEL} .= '>-- [%any operator%] --</option>'."\n";
  my @operlist = TTXUser::list();
  my %operinfo;
  foreach my $id (@operlist) {
    my $u = TTXUser->new($id);
    next if $u eq undef;
    $operinfo{$id} = $u;
  }
  foreach my $id (sort {uc($operinfo{$a}->{lname}) cmp uc($operinfo{$b}->{lname})} keys %operinfo) {
    my $oper = $operinfo{$id}->{fname}.' '.$operinfo{$id}->{lname};
    next if $oper eq undef || $oper eq '';
    $oper =~ s/</&quot;/g;
    $data->{OPERSEL} .= "<option value=\"$id\"";
    $data->{OPERSEL} .= ' selected' if $query->param('oper') eq $id;
    $data->{OPERSEL} .= ">$oper</option>\n";
  }
  $data->{OPERSEL} .= '</select>';
  $data->{OPERSELSTD} .= $data->{OPERSEL} . "</td></tr>\n";
}

1;
#
