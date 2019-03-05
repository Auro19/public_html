package TTXLogin;
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

$TTXLogin::VERSION='3.01';
BEGIN {
  $TTXLogin::REVISION = '$Revision: 769 $';
  if ($TTXLogin::REVISION =~ /(\d+)/) {
    $TTXLogin::REVISION = $1;
  }
};
use strict;
use TTXCommon;
require TTXUser;
require TTXSession;

# ======================================================================== login

sub login {
  my ($cfg, $query, $data) = @_;
  $data->{PAGEHEADING} = '[%Login%]';
  return undef if !$query->param('dologin');
  if (TTXCommon::cleanit($query, 'login') eq undef) {
    $data->{ERROR_MESSAGE} = '[%Missing User ID%]';
    return undef;
  }
  if (TTXCommon::cleanit($query, 'passwd') eq undef) {
    $data->{ERROR_MESSAGE} = '[%Missing Password%]';
    return undef;
  }
  my $user = TTXUser->new($query->param('login'));
  if ($user eq undef || ($user->get('passwd') eq undef) || ($user->get('passwd') ne $query->param('passwd'))) {
    $data->{ERROR_MESSAGE} = '[%Wrong User ID or Password%]';
    return undef;
  }
  $cfg->set('_USER', $user);
  my $session = TTXSession->new();
  $session->login($query->param('login'));
  $user->set('session', $session);
  $query->param(-name => 'checkupdate', -value => '1');
  if ($cfg->get('rememberme')) {
    $cfg->set('_GLOBAL_SID', $session->sid());
  } else {
    $query->param('sid', $session->sid());
  }
  if ($query->param('nextcmd') ne undef) {
    $query->param(-name => 'cmd', -value => $query->param('nextcmd'));
    return $query->param('nextcmd');
  }
  return 'helpdesk';
}

1;
#
