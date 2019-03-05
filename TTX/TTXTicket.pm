package TTXTicket;
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

$TTXTicket::VERSION='3.01';
BEGIN {
  $TTXTicket::REVISION = '$Revision: 769 $';
  if ($TTXTicket::REVISION =~ /(\d+)/) {
    $TTXTicket::REVISION = $1;
  }
};

use strict;
use TTXCommon;
use TTXData;
require TTXUser;
use TTXTickets;
require TTXMail;
require TTXMarkup;
require TTXDictionary;
my $usewrkh = undef;
my $_isrestricted = undef;
my $_f2t;

# =================================================================== invenabled

my $_invenabled = undef;

sub invenabled {
  if ($_invenabled eq undef) {
    eval 'use TTXInvMod';
    if ($@ eq undef) {
      $_invenabled = 1;
    } else {
      $_invenabled = 0;
    }
  }
  return $_invenabled;
}
# ================================================================= hasanswerlib

my $_hasanswerlib = undef;

sub hasanswerlib {
  if ($_hasanswerlib eq undef) {
    eval 'use TTXAnswerLib';
    if ($@ eq undef) {
      $_hasanswerlib = 1;
    } else {
      $_hasanswerlib = 0;
    }
  }
  return $_hasanswerlib;
}
# =================================================================== multigroup

my $_multigroup = undef;

sub multigroup {
  if ($_multigroup eq undef) {
    eval 'use TTXGroups';
    if ($@ eq undef) {
      my $rev;
      eval '$rev = $TTXGroups::REVISION';
      if ($@ eq undef && $rev > 486) {
        $_multigroup = 1;
      } else {
        $_multigroup = 0;
      }
    } else {
      $_multigroup = 0;
    }
  }
  return $_multigroup;
}
# ====================================================================== company

sub company {
  my ($cfg, $ticket) = @_;
  my $cid = $cfg->get('customcompany');
  my $title;
  if ($cid ne undef && $cid =~ /(\d+)/) {
    $cid = $1;
    $title = $ticket->{"c$cid"};
  }
  if ($title eq undef) {
    $title = TTXCommon::decodeit($cfg->get('company'));
  }
  return $title;
}
# =================================================================== usernotify

sub usernotify {
  my $cfg = $_[0]->{cfg};
  my $ticket = $_[0]->{ticket};
  my $email = $ticket->{'email'};
  my $name = $ticket->{'name'};
  my %macros;
  $name = '[%Customer%]' if $name eq undef;
  my $messages = $ticket->{messages};
  my $tmpl;
  my $tmplfn;
  my $subjtmpl;
  if (@{$messages} == 1) {
    $tmplfn = 'newticket';
    if ($cfg->get('validate') ne undef) {
      $tmplfn .= 'validate';
      $macros{ENV_HTTP_HOST} = $ENV{HTTP_HOST};
      $macros{VALIDATIONCODE} = $_[0]->{validationcode};
    } else {
      return if $cfg->get('_USER') eq undef && $cfg->get('notikcfrm');
    }
  } else {
    return if $cfg->get('_USER') eq undef && $cfg->get('nomsgcfrm');
    $tmplfn = 'newmessage';
  }
  if (open(TMPL, $cfg->get('basedir')."/templates/$tmplfn.txt")) {
    my @buff = <TMPL>;
    close TMPL;
    $tmpl = join('', @buff);
  }
  if (open(TMPL, $cfg->get('basedir')."/templates/s-$tmplfn.txt")) {
    $subjtmpl = <TMPL>;
    close TMPL;
    $subjtmpl =~ s/(?>\x0D\x0A?|[\x0A-\x0C\x85\x{2028}\x{2029}])//g;
  } else {
    $subjtmpl = '(%STDSUBJ%)';
  }
  $tmpl = TTXCommon::decodeit($tmpl);
  $subjtmpl = TTXCommon::decodeit($subjtmpl);
  $macros{TICKETID} = $ticket->{id};
  $macros{ACCESSKEY} = $ticket->{key};
  $macros{TICKETSTATE} = TTXDictionary::translate(TTXCommon::status($ticket->{status}));
  $macros{UNAME} = $name;
  $macros{COMPANYNAME} = company($cfg, $ticket);
  $macros{UEMAIL} = $email;
  $macros{OPERATORNAME} = '-';
  $macros{FROM} = $_[0]->{from};
  $macros{GROUP} = ($ticket->{grp} ne undef) ? $cfg->get($ticket->{grp}) : '-';
  my $oper;
  if ($cfg->get('_USER') ne undef) {
    $oper = $cfg->get('_USER');
  } elsif ($ticket->{oper} ne undef) {
    $oper = TTXUser->new($ticket->{oper});
  }
  if ($oper ne undef) {
    $macros{OPERATORNAME} = $oper->{fname}.' '.$oper->{lname};
  }
  my $respondername;
  if ($cfg->get('askforname') ne undef) {
    my $nm = $name;
    $nm =~ s/[="'&><]//g;
    $nm =~ s/\[/%5B/g;
    $nm =~ s/\]/%5D/g;
    $nm =~ s/\s/+/g;
    $respondername = "&respondername=$nm";
  }
  $macros{TICKETURL} = '[url'." http://$ENV{HTTP_HOST}$ENV{SCRIPT_NAME}?cmd=ticket&key=".$ticket->{key}.$respondername.
                         '][b]Ticket '.$macros{TICKETID}.'[/b][/url]'."\n\nACCESS KEY: ".$ticket->{key};
  my $msg = $messages->[@{$messages} - 1];
  my @msgparts = split(/\n\n/, $msg);
  shift @msgparts;
  my $body = join("\n\n", @msgparts);
  $macros{MESSAGE} = $body;
  my $cnt = TTXCommon::cfldcnt();
  for (my $i = 0; $i < $cnt; ++$i) { $macros{"C$i"} = $ticket->{"c$i"}; }
  my $tmplcc = $tmpl;
  $tmpl =~ s/\(%\s*([A-Z0-9_]+)\s*%\)/$macros{$1}/g;
  $tmpl =~ s/\[%%\]//g;
  $tmpl =~ s/\[%([^]]+)%\]/TTXDictionary::translate($1)/ge;
  $macros{STDSUBJ} = TTXDictionary::translate('Ticket').' '.$ticket->{id};
  $macros{STDSUBJ} .= ", ".$ticket->{subject} if $ticket->{subject} ne undef;
  my $subjtmplcc = $subjtmpl;
  $subjtmpl =~ s/\(%\s*([A-Z0-9_]+)\s*%\)/$macros{$1}/g;
  $subjtmpl =~ s/\[%%\]//g;
  $subjtmpl =~ s/\[%([^]]+)%\]/TTXDictionary::translate($1)/ge;
  my $fromaddr = "\"".company($cfg, $ticket)."\" <".$cfg->get('email').">";
  if ($cfg->get('usegrpsel')) {
    eval 'use TTXMailMap';
    if ($@ eq undef) {
      my $a = TTXMailMap::group2mail($cfg, $ticket->{grp});
      if ($a ne undef) {
        $fromaddr = "\"".company($cfg, $ticket)."\" <$a>";
      }
    }
  }
   my $files = undef;
  if ($cfg->get('sendfiles.customer')) {
    $files = TTXData::get('SESSIONFILES');
  }
  TTXMail::sendmail(
   {
     to => $email,
     from => $fromaddr,
     subject => $subjtmpl,
     msg => $tmpl,
     files => $files
   }
  );
  if ($cfg->get('emaillist') ne undef) {
    my $tmplname;
    if (@{$messages} == 1) {
      $tmplname = 'newticket';
      $tmplname = 'newccticket' if -f $cfg->get('basedir')."/templates/newccticket.txt";
    } else {
      $tmplname = 'newmessage';
      $tmplname = 'newccmessage' if -f $cfg->get('basedir')."/templates/newccmessage.txt";;
    }
    if (open(TMPL, $cfg->get('basedir')."/templates/$tmplname.txt")) {
      my @buff = <TMPL>;
      close TMPL;
      $tmplcc = join('', @buff);
    }
    if (open(TMPL, $cfg->get('basedir')."/templates/s-$tmplname.txt")) {
      $subjtmplcc = <TMPL>;
      close TMPL;
      $subjtmplcc =~ s/(?>\x0D\x0A?|[\x0A-\x0C\x85\x{2028}\x{2029}])//g;
    }
    $tmplcc = TTXCommon::decodeit($tmplcc);
    $subjtmplcc = TTXCommon::decodeit($subjtmplcc);
    my $n = $cfg->get('emaillist');
    if ($n =~ /^\d\d?$/) {
      my @addrlist = split(/,|;/, $ticket->{"c$n"});
      $macros{UNAME} = '[%Customer%]';
      foreach my $addr (@addrlist) {
        $addr =~ s/\s//g;
        next if $addr !~ /^[0-9A-Za-z'._+-]+@[0-9A-Za-z_-]+\.[0-9A-Za-z._-]+$/;
        $macros{TICKETURL} = '[url '."http://$ENV{HTTP_HOST}$ENV{SCRIPT_NAME}?cmd=ticket&ccmail=$addr&key=".$ticket->{key}.
                             '][b]Ticket '.$macros{TICKETID}.'[/b][/url]'."\n\nACCESS KEY: ".$ticket->{key};
        $macros{UEMAIL} = $addr;
        my $tmpltmp = $tmplcc;
        $tmpltmp =~ s/\(%\s*([A-Z0-9_]+)\s*%\)/$macros{$1}/g;
        $tmpltmp =~ s/\[%%\]//g;
        $tmpltmp =~ s/\[%([^]]+)%\]/TTXDictionary::translate($1)/ge;
        my $subjtmpltmp = $subjtmplcc;
        $subjtmpltmp =~ s/\(%\s*([A-Z0-9_]+)\s*%\)/$macros{$1}/g;
        $subjtmpltmp =~ s/\[%%\]//g;
        $subjtmpltmp =~ s/\[%([^]]+)%\]/TTXDictionary::translate($1)/ge;
        TTXMail::sendmail(
         {
           to => $addr,
           from => $fromaddr,
           subject => $subjtmpltmp,
           msg => $tmpltmp,
           files => $files
         }
        );
      }
    }
  }
}
# ================================================================= buildadrlist

sub buildadrlist {
  my @adrlist;
  foreach my $oper (@{$_[0]}) {
    my $u = TTXUser->new($oper);
    if ($u ne undef && $u->{email} ne undef) {
      push @adrlist, $u->{email};
    }
  }
  return @adrlist;
}
# ==================================================================== cleanlist

sub cleanlist {
  my %seen = ();
  my @uniq = grep { ! $seen{$_}++ } @{$_[0]};
  @{$_[0]} = @uniq;
}
# =============================================================== transfernotice

sub transfernotice {
  my $cfg = $_[0]->{cfg};
  my $ticket = $_[0]->{ticket};
  my $o = $cfg->get('_USER');
  return if $o eq undef;
  my $u = TTXUser->new($ticket->{oper});
  return if $u eq undef || $u->{email} eq undef;
  my $quicklink;
  if ($cfg->get('quicklink')) {
    $quicklink = '&o='.$ticket->{oper};
    my $salt = $ticket->{id} % 100;
    $salt = "0$salt" if $salt < 10;
    my $p = crypt($u->{passwd}.$ticket->{id}, $salt);
    $p =~ s/^\d\d//;
    $quicklink .= "&p=$p";
  }
  TTXMail::sendmail(
   {
     to => $u->{email},
     from => "\"".company($cfg, $ticket)."\" <".$cfg->get('email').">",
     subject => TTXDictionary::translate('Ticket transfer notice'),
     msg => '[b]'.TTXDictionary::translate('Ticket ID').':[/b] '.$ticket->{id}."\n".
            '[b]'.TTXDictionary::translate('Subject').':[/b] '.$ticket->{subject}."\n".
            '[b]'.TTXDictionary::translate('Transferred by').':[/b] '.$o->{fname}.' '.$o->{lname}.' ('.$o->{login}.") \n".
            '[b]'.TTXDictionary::translate('Access link').':[/b] '.
            '[url http://'.$ENV{HTTP_HOST}.$ENV{SCRIPT_NAME}.'?cmd=helpdesk&tk='.$ticket->{key}.$quicklink.']'.
            TTXDictionary::translate('Ticket').' '.$ticket->{id}.'[/url]'."\n\n"
   }
  );
}
# =================================================================== opernotify

sub opernotify {
  my $cfg = $_[0]->{cfg};
  return if $cfg->get('silent');
  my $ticket = $_[0]->{ticket};
  my @adrlist;
  if ($cfg->get('usegrpsel') && $ticket->{oper} eq undef && ! exists $_[0]->{notifylist}) {
    my $grp;
    if ($ticket->{grp} eq undef) {
      $grp = $cfg->get('defaultgrp');
    } else {
      $grp = $ticket->{grp};
    }
    my @list = split(/;/, $cfg->get("mbr-$grp"));
    $_[0]->{notifylist} = \@list;
  }
  if (exists $_[0]->{notifylist}) {
    cleanlist($_[0]->{notifylist});
    @adrlist = buildadrlist($_[0]->{notifylist});
  } elsif ($ticket->{oper} ne undef) {
    my @operlist = split(/,/, $ticket->{oper});
    push @operlist, $cfg->get('supervisor') if $cfg->get('supervisor') ne undef;
    @adrlist = buildadrlist(\@operlist);
  } else {
    @adrlist = TTXUser::listemail();
  }
  my $email = $ticket->{'email'};
  my $name = $ticket->{'name'};
  my %macros;
  $name = '[%Customer%]' if $name eq undef;
  my $messages = $ticket->{messages};
  if ($usewrkh eq undef) {
    eval "use TTXWorkHours";
    if ($@ eq undef) {
      $usewrkh = 1;
    } else {
      $usewrkh = 0;
    }
  }
  my $tmpl;
  my $tmplfn;
  my $subjtmpl;
  if (@{$messages} == 1) {
    $tmplfn = 'onewticket';
  } else {
    $tmplfn = 'onewmessage';
  }
  if (open(TMPL, $cfg->get('basedir')."/templates/$tmplfn.txt")) {
    my @buff = <TMPL>;
    close TMPL;
    $tmpl = join('', @buff);
  }
  if (open(TMPL, $cfg->get('basedir')."/templates/s-$tmplfn.txt")) {
    $subjtmpl = <TMPL>;
    close TMPL;
    $subjtmpl =~ s/(?>\x0D\x0A?|[\x0A-\x0C\x85\x{2028}\x{2029}])//g;
  } else {
    $subjtmpl = '(%STDSUBJ%)';
  }
  $tmpl = TTXCommon::decodeit($tmpl);
  $subjtmpl = TTXCommon::decodeit($subjtmpl);
  $macros{TICKETID} = $ticket->{id};
  if (invenabled()) {
    my $items = TTXInvMod::getitems($ticket->{item});
    my $val = undef;
    foreach my $item (@{$items}) {
      $val .= ', ' if $val ne undef;
      $val .= $item->{title};
    }
    $val = 'none' if $val eq undef;
    $macros{ITEMLBL} = TTXCommon::decodeit($cfg->get('inventory.label')) || 'Item';
    $macros{ITEM} = $val;
    $macros{ITEMLINE} = "\n[b]$macros{ITEMLBL}:[/b] $macros{ITEM}";
  }
  $macros{GROUP} = ($ticket->{grp} ne undef) ? $cfg->get($ticket->{grp}) : '-';
  $macros{TICKETSTATE} = TTXDictionary::translate(TTXCommon::status($ticket->{status}));
  $macros{UNAME} = $name;
  $macros{COMPANYNAME} = company($cfg, $ticket);
  $macros{UEMAIL} = $email;
  $macros{TICKETURL} = '[url '."http://$ENV{HTTP_HOST}".$cfg->get('scriptname')."?cmd=helpdesk&tk=".$ticket->{key}.
                       '][b]Ticket '.$macros{TICKETID}.'[/b][/url]';
  my $msg = $messages->[@{$messages} - 1];
  my @msgparts = split(/\n\n/, $msg);
  my $headers = shift @msgparts;
  my $ip;
  foreach my $line (split(/\n/, $headers)) {
    if ($line =~ /^IP:\s*([0-9a-fA-F.]+)/) {
      $ip = $1;
      last;
    }
  }
  if ($ip ne undef) {
    $macros{MSGIPADDRESS} = $ip;
    eval 'use Socket';
    if ($@ eq undef) {
      eval '$macros{MSGHOST} = gethostbyaddr(inet_aton('.$ip.'), AF_INET)';
    }
  }
  my $body = join("\n\n", @msgparts);
  $macros{MESSAGE} = $body;
  my $cnt = TTXCommon::cfldcnt();
  for (my $i = 0; $i < $cnt; ++$i) { $macros{"C$i"} = $ticket->{"c$i"}; }
  my $tmplcpy;
  if (!$cfg->get('quicklink')) {
    $tmpl =~ s/\(%\s*([A-Z0-9_]+)\s*%\)/$macros{$1}/g;
    $tmpl =~ s/\[%%\]//g;
    $tmpl =~ s/\[%([^]]+)%\]/TTXDictionary::translate($1)/ge;
  } else {
    $tmplcpy = $tmpl;
  }
  my @oplist;  # got to think about this...
  if (exists $_[0]->{notifylist}) {
    @oplist = @{$_[0]->{notifylist}};
  } elsif ($ticket->{oper} ne undef) {
    @oplist = split(/,/, $ticket->{oper});
    push @oplist, $cfg->get('supervisor') if $cfg->get('supervisor') ne undef;
  } else {
    @oplist = TTXUser::list();
  }
  my $files = undef;
  if ($cfg->get('sendfiles.operator')) {
    $files = TTXData::get('SESSIONFILES');
  }
  foreach my $adr (@adrlist) {
    my $oper = shift @oplist;
    if ($oper ne undef) { # just to make sure
      my $u = TTXUser->new($oper);
      if ($u ne undef && $u->{email} ne undef &&
            (!$usewrkh ||
              (($ticket->{oper} ne $oper && TTXWorkHours::onguard($u->{wrkh})) ||
               ($ticket->{oper} eq $oper && !TTXWorkHours::vacation($u->{wrkh})))
            )
          ) {
        if ($cfg->get('quicklink')) {
          my $tmp = $macros{TICKETURL};
          my $salt = $ticket->{id} % 100;
          $salt = "0$salt" if $salt < 10;
          my $p = crypt($u->{passwd}.$ticket->{id}, $salt);
          $p =~ s/^\d\d//;
          $macros{TICKETURL} =~ s/cmd=helpdesk/cmd=helpdesk&p=$p&o=$oper/;
          $tmpl = $tmplcpy;
          $tmpl =~ s/\(%\s*([A-Z0-9_]+)\s*%\)/$macros{$1}/g;
          $tmpl =~ s/\[%%\]//g;
          $tmpl =~ s/\[%([^]]+)%\]/TTXDictionary::translate($1)/ge;
          $macros{TICKETURL} = $tmp;
        }
        $macros{STDSUBJ} = TTXDictionary::translate('Ticket').' '.$ticket->{id};
        if ($u->{usemail}) {
          $ticket->{key} =~ /Z(\w\w\w\w)/;
          $macros{STDSUBJ} .= ' ('.$u->{snum}."-$1)";
        }
        $macros{STDSUBJ} .= ", ".$ticket->{subject} if $ticket->{subject} ne undef;
        my $subj = $subjtmpl;
        $subj =~ s/\(%\s*([A-Z0-9_]+)\s*%\)/$macros{$1}/g;
        $subj =~ s/\[%%\]//g;
        $subj =~ s/\[%([^]]+)%\]/TTXDictionary::translate($1)/ge;
        TTXMail::sendmail(
          {
           to => $adr,
           from => "\"".company($cfg, $ticket)."\" <".$cfg->get('email').">",
           subject => $subj,
           msg => $tmpl,
           files => $files
          }
        );
      } else {
        next;
      }
    } else {
      last;
    }
  }
}
# ====================================================================== keyform

sub keyform {
  my ($cfg, $query, $data) = @_;
  $data->{PAGEHEADING} = '[%Access Key%]';
  $data->{MESSAGE} = '[%Forgot the key? We will send it to your email address.%]';
  return undef if !$query->param('do');
  $query->param(-name => 'do', -value => '');
  if ($query->param('cancel') ne undef) {
    if ($cfg->get('_USER') ne undef) { return 'helpdesk'; }
    else { return 'newticket'; }
  }
  if ($query->param('cmd') eq 'keyform') {
    my $key = TTXCommon::cleanit($query, 'key');
    if ($key eq undef) {
      $data->{ERROR_MESSAGE} = '[%Missing access key%]';
      return undef;
    }
    if ($cfg->get('shortkey')) {
      if ($key !~ /^\d+$/) {
        $data->{ERROR_MESSAGE} = '[%Invalid access key%]';
        return undef;
      }
    } elsif ($key !~ /^\d+Z\d+$/) {
      $data->{ERROR_MESSAGE} = '[%Invalid access key%]';
      return undef;
    }
    return 'ticket';
  }
# keyfinder code
  my $email = TTXCommon::cleanit($query, 'email');
  if ($email eq undef) {
    $data->{ERROR_MESSAGE} = '[%Missing email address%]';
    return undef;
  }
  if ($email !~ /^[0-9A-Za-z.'_+-]+@[0-9A-Za-z_-]+\.[0-9A-Za-z._-]+$/) {
    $data->{ERROR_MESSAGE} = '[%Invalid email address%]';
    return undef;
  }
  my $tickets = TTXCommon::dbtik();
  if ($tickets eq undef || $tickets->error() ne undef) {
    $data->{ERROR_MESSAGE} = $tickets->errortext();
    return undef;
  }
  my @filter;
  my $f;
  $f->{col} = 'email';
  $f->{expr} = "^$email\$";
  push @filter, $f;
  my $tmp = $cfg->set('hideoldsolved', 0);
  my $browser = $tickets->list(0, 999, 'id', 'A', \@filter);
  $cfg->set('hideoldsolved', $tmp);
  my $list = $browser->{list};
  if (@{$list} < 1) {
    $data->{ERROR_MESSAGE} = '[%No tickets found%]';
  } else {
    my $body;
    foreach my $id (@{$list}) {
      my $t = $tickets->ticket($id);
      $body .= "#".$id." (".$t->{subject}.") KEY: ".$t->{key}."\n";
    }
    $tickets = undef;
    $body = TTXDictionary::translate('Dear customer,')."\n\n".
            TTXDictionary::translate('This is a list of all service tickets associated '.
            'with your email address')."\n\n$body\n";
    $body .= TTXDictionary::translate('Use the following link to access your tickets')."\n".
             "[url http://$ENV{HTTP_HOST}$ENV{SCRIPT_NAME}?cmd=ticket]Show Ticket[/url]\n\n".
             TTXDictionary::translate('Kind Regards')."\n".TTXCommon::decodeit($cfg->get('company'))."\n";
    TTXMail::sendmail(
     {
       to => $email,
       from => "\"".TTXCommon::decodeit($cfg->get('company'))."\" <".$cfg->get('email').">",
       subject => TTXDictionary::translate('Access key(s)'),
       msg => $body
     }
    );
    $data->{MESSAGE} = '<b>[%Access keys were sent to your email address.%]</b>';
  }
  return undef;
}
# ================================================================== checkgroups
my $groupsenabled;
sub checkgroups {
  if ($groupsenabled eq undef) {
    eval "use TTXGroups";
    if (!$@) {
      $groupsenabled = 1;
    } else {
      $groupsenabled = 0;
      if ($_[0]->get('usegrpsel')) {
        $_[0]->set('usegrpsel', 0);
        $_[0]->save();
      }
    }
  }
  return $groupsenabled;
}
# ========================================================================== kid

sub kid {
  my ($cfg, $query, $data, $useold) = @_;
  my $datadir = $cfg->get('basedir');
  my $keyid;
  my $oldid = TTXCommon::cleanit($query, 'kid');
  if ($oldid ne undef && $oldid !~ /^\d+-\d+$/) {
    $oldid = undef;
    $query->param(-name => 'kid', -value => '');
  }
  if ($oldid ne undef && $useold && (-f "$datadir/keys/$oldid.cgi")) {
    $keyid = $oldid;
  } else {
    $query->param(-name => 'kid', -value => '');
    if (-f "$datadir/keys/$oldid.cgi") {
      unlink "$datadir/keys/$oldid.cgi";
    }
    $keyid = time(). "-$$";
    $useold = 0;
  }
  if (! -d "$datadir/keys") {
    mkdir("$datadir/keys", 0777);
  }
  if (-d "$datadir/keys") {
    if (!$useold && open(KF, ">$datadir/keys/$keyid.cgi")) {
      my $key = 999 + int rand(9000);
      print KF "$key\n";
      close KF;
    }
    $data->{KID} = $keyid;
    my $keycode;
    if ($useold && $oldid ne undef) {
      $keycode = TTXCommon::cleanit($query, 'keycode');
      $keycode =~ s/"/&quot;/g;
    }
    $data->{KIDVAL} = <<EOT;
<input type=text name=keycode size=6 value="$keycode">
<input type=hidden name=kid value="$keyid">
EOT

      $data->{KIDIMG} = "<img src=\"key.cgi?$keyid\" />";
      $data->{KIDFORM} = <<EOT;
<tr>
  <td align=right><b>[%Access code%]</b></td>
  <td align=left>
    <table>
      <tr>
        <td><img src="key.cgi?$keyid" /></td>
        <td>[%Copy the code here%]: </td>
        <td><input type=text name=keycode size=6 value="$keycode">
        <input type=hidden name=kid value="$keyid"></td>
      </tr>
    </table>
  </td>
</tr>

EOT
  }
}
# ================================================================= isrestricted

sub isrestricted {
  if ($_isrestricted eq undef) {
    $_isrestricted = 0;
    my $cfg = $_[0];
    if ($cfg->get('_USER') ne undef) {
      my $uid = $cfg->get('_USER')->get('login');
      my @rlist = split(/,|;/, $cfg->get('restricted.list'));
      if (grep(/^$uid$/, @rlist)) {
        $_isrestricted = 1;
      }
    }
  }
  return $_isrestricted;
}
# ==================================================================== newticket

sub newticket {
  my ($cfg, $query, $data) = @_;
#
# Check if last ticket associated with the customer is not solved yet
#
  if ($cfg->get('singleticket') && $cfg->get('_USER') eq undef) {
    my @tlist = split(/;/, $cfg->get('_GLOBAL_TLIST'));
    my $sname = $ENV{SCRIPT_NAME};
    my ($lastone) = grep(/^$sname:/, @tlist);
    if ($lastone ne undef) {
      my $key = (split(/:/, $lastone))[1];
      if ($key ne undef) {
        my $tickets = TTXCommon::dbtik();
        if ($tickets->error() eq undef) {
          my $id = $key;
          $id =~ s/Z.*$//;
          my $t = $tickets->ticket($id, 1);
          if ($t ne undef && ($cfg->get('shortkey') || $t->{key} eq $key)) {
            if ($t->{status} ne 'CLS') {
              $query->param('do', '');
              $query->param('key', $key);
              $query->param('cancel', '');
              $query->param('respondername', TTXCommon::encodeit($t->{name}));
              return 'ticket';
            } else {
              @tlist = grep(!/^$sname:/, @tlist);
              $cfg->set('_GLOBAL_TLIST', join(';', @tlist));
            }
          }
        }
      }
    }
  }
  my $cfn;  # captcha code file name
  if ($query->param('do') && $query->param('reset') ne undef) {
    foreach my $id ('do', 'name', 'email', 'grp', 'subject', 'internal', grep(/^x/, $cfg->vars())) {
      $query->param($id, '');
    }
  }
  $data->{PAGEHEADING} = '[%Contact Customer Service%]';
  if ($cfg->get('newtikresetbtn')) {
    $data->{RESETBTN} = "\n<input type=submit value=".'"[%Reset%]" name=reset>';
  }
  if (TTXData::get('ISPRO')) {
    $data->{FILEFORMS} = TTXFile::fileforms();
  }
  if ($cfg->get('_USER') ne undef) {
    if (isrestricted($cfg)) {
      $data->{INTERNALCHECKBOX} = '<input type=hidden name=internal value=1>';
    } else {
      $data->{INTERNALCHECKBOX} = '<input type=checkbox name=internal value=1' .
         ($query->param('internal') ? ' checked':''). '> <span class=lbl>[%Internal%]</span>';
    }
  } else {
    $data->{INTERNALCHECKBOX} = '&nbsp;';
  }
  checkgroups($cfg);
  if ($cfg->get('usegrpsel') && !$cfg->get('forcemailmap')) {
    TTXGroups::selector($cfg, $query, $data);
  }
  if ($cfg->get('inventory.show') && invenabled()) {
    TTXInvMod::selector($cfg, $query, $data);
  }
  if ($cfg->get('useopersel')) {
    eval "use TTXOpers";
    if (!$@) {
      TTXOpers::selector($cfg, $query, $data);
    } else {
      $cfg->set('useopersel', 0);
    }
  }
  if (!$query->param('do')) {
    if ($query->param('reset') eq undef) {
      my @catchy = grep(/^_GLOBAL_newticket_x/, keys %{$cfg->ashash()});
      my @noncatchy = split(/,|;/, $cfg->get('nonsticky'));
      push @catchy, 'email';
      push @catchy, 'name';
      foreach my $input (@catchy) {
        $input =~ s/^_GLOBAL_newticket_//;
        next if $input =~ /^x/ && grep {$_ == $cfg->get($input)} @noncatchy;
        if ($query->param($input) eq undef) {
          $query->param(-name => $input, -value => $cfg->get("_GLOBAL_newticket_$input"));
        }
      }
    }
    kid($cfg, $query, $data, 0) if $cfg->get('useaccesscode');
  }
  my $usettxlayout = 0;
  eval "use TTXLayout";
  if (!$@) {
    my $ldver;
    eval '$ldver = $TTXLayout::VERSION';
    if ($ldver >= '2.22') {
      $usettxlayout = 1;
      my $cfldcnt = TTXCommon::cfldcnt();
      for (my $i = 0; $i < $cfldcnt; ++$i) {
        next if $cfg->get("c$i.internal");
        $data->{"CUSTOM$i"} = TTXLayout::cfld($query, $i);
        $data->{"CUSTOMROW$i"} = TTXLayout::cfldrow($query, $i);
        $data->{"CUSTOMVARS"} .= $data->{"CUSTOMROW$i"};
      }
    }
  }
  return undef if !$query->param('do');
  $query->param(-name => 'do', -value => '');
  if ($query->param('cancel') ne undef) {
    $query->param(-name => 'cancel', -value => '');
    if ($cfg->get('_USER') ne undef) {
      $query->param(-name => 'tid', -value=> '');
      return 'helpdesk';
    } else {
      return undef;
    }
  }
  my $ticket;
  if (checkgroups()) {
    my @grps = $query->param('grp');
    if (multigroup()) {
      $ticket->{grp} = TTXGroups::packgrp(\@grps);
    } else {
      $ticket->{grp} = $grps[0];
    }
  }
  if ($cfg->get('firstname') =~ /^\s*\d+/ && $cfg->get('lastname') =~ /^\s*\d+/) {
    my $name = join(' ', (TTXCommon::cleanit($query, 'x'.fid2title('c'.int($cfg->get('firstname')))),
                          TTXCommon::cleanit($query, 'x'.fid2title('c'.int($cfg->get('lastname'))))));
    $query->param('name', $name);
  }
  $ticket->{name} = TTXCommon::cleanit($query, 'name', 1);
  $ticket->{email} = TTXCommon::cleanit($query, 'email');
  $ticket->{subject} = TTXCommon::cleanit($query, 'subject', 1);
  if (invenabled()) {
    my @items = $query->param('item');
    if (grep(/^-$/, @items) || !int(@items)) {
      @items = ('-');
      $ticket->{item} = '';
    } else {
      $ticket->{item} = ';'.join(';', @items).';';
    }
  }
  my $error;
  if ($ticket->{name} eq undef) {
    $error .= '[%Missing Name%]<br>';
  }
  $ticket->{lname} = $ticket->{name};
  $ticket->{name} =~ /\s(\w+)$/;
  $ticket->{lname} = $1 if $1 ne undef;
  if ($ticket->{email} eq undef) {
    $ticket->{email} = $cfg->get('defaultemail');
  }
  if ($ticket->{email} eq undef) {
    $error .= '[%Missing Email%]<br>'."\n";
  } elsif ($ticket->{email} !~ /^[0-9A-Za-z'._+-]+@[0-9A-Za-z_-]+\.[0-9A-Za-z._-]+$/) {
    if ($cfg->get('emaildomain') ne undef) {
      $ticket->{email} .= '@'.$cfg->get('emaildomain');
      if ($ticket->{email} !~ /^[0-9A-Za-z'._+-]+@[0-9A-Za-z_-]+\.[0-9A-Za-z._-]+$/) {
        $error .= "Invalid Email<br>";
      } else {
        $query->param('email', $ticket->{email});
      }
    } else {
      $error .= "Invalid Email<br>";
    }
  }
  if ($ticket->{grp} eq undef || $ticket->{grp} =~ /^;+$/) {
    eval 'use TTXMailMap';
    if ($@ eq undef && (($cfg->get('mailmap') =~ /^from$/i) || $cfg->get('forcemailmap'))) {
      $ticket->{grp} = TTXMailMap::mail2group($cfg, $ticket->{email});
    } elsif ($cfg->get('usegrpsel') && !$cfg->get('forcemailmap')) {
      $error .= TTXDictionary::translate('Missing').' '.(TTXCommon::decodeit($cfg->get('grpsellbl')) || '[%Department%]')."<br>";
    }
  }
  if ($ticket->{subject} eq undef) {
    $error .= '[%Missing Subject%]<br>';
  }
  my $useold = 0;
  if ($cfg->get('useaccesscode')) {
    my $skipcode = TTXCommon::cleanit($query, 'skipcaptcha');
    if ($skipcode eq undef || $skipcode ne $cfg->get('skipcaptcha')) {
      my $kid = TTXCommon::cleanit($query, 'kid');
      if ($kid !~ /^\d+-\d+$/) {
        $error .= '[%Corrupted access code%]<br>';
      } else {
        $cfn = $cfg->get('basedir')."/keys/$kid.cgi";
        my $key = TTXCommon::cleanit($query, 'keycode');
        if ($key eq undef) {
          $error .= '[%Missing access code%]<br>';
        } else {
          if (!open(KF, $cfn)) {
            $error .= '[%Expired access code%]<br>';
          } else {
            my $k = <KF>;
            close KF;
            chomp $k;
            if ($k ne $key) {
              $error .= '[%Invalid access code%]<br>';
            } else {
              $useold = 1;
            }
          }
        }
      }
    }
  }
  if ($cfg->get('useopersel') && $query->param('oper') eq undef) {
    $error .= '[%Missing Operator%] (<i>[%to assign the ticket to%]</i>)<br>';
  }
  my $custom;
  if ($cfg->get('confirmticket') =~ /^(\d\d?)$/) {
    my $cfidx = $1;
    my ($xname) = grep {$cfg->get($_) == $cfidx} grep(/^x/, $cfg->vars());
    if ($xname ne undef && $query->param($xname) eq undef) {
      $query->param($xname, 'No');
    }
  }
  my @inputs = sort $query->param();
  my @mandatory;
  foreach my $f ($query->param('mandatory')) {
    @mandatory = (@mandatory, split(/\s*,\s*/, $f));
  }
  if ($usettxlayout) {
    foreach my $f (split(/;|,/, $cfg->get('mandatory'))) {
      $f =~ s/\D//g;
      my $xname = TTXLayout::findname($cfg, $f);
      if (!grep(/^$xname$/, @mandatory)) {
        push @mandatory, $xname;
      }
    }
  }
  my $cfldcnt = TTXCommon::cfldcnt();
  foreach my $input (@inputs) {
    next if $input !~ /^x./;
    next if $query->param($input) eq undef;
    @mandatory = grep { $_ ne $input } @mandatory;
    my $val = TTXCommon::decodeit($query->param($input));
    my $cidx;
    if ($cfg->get($input) ne undef) {
      $cidx = int ($cfg->get($input));
      if ($cidx >= 0 && $cidx < $cfldcnt) {
        if ($cfg->get("c$cidx.type") eq 'list') {
          my @vals = $query->param($input);
          my @allow = split(/;/, TTXCommon::decodeit($cfg->get("dropdown$cidx")));
          my @accept;
          foreach my $v (@vals) {
            $v = TTXCommon::decodeit($v);
            push @accept, $v if grep(/^$v$/, @allow);
          }
          $val = join(';', @accept);
          $ticket->{"c$cidx"} = ";$val;" if $val ne undef;
        } else {
          $ticket->{"c$cidx"} = $val;
        }
      }
    }
    $input =~ s/^x//;
    $custom .= "[b]$input:[/b] $val\n" if !$cfg->get("c$cidx.internal");
  }
  $custom .= "\n" if $custom ne undef;
  foreach my $mid (@mandatory) {
    $mid =~ s/^x//;
    $error .= '[%Missing%]'." $mid<br>\n";
  }
  if ($cfg->get('matchlistcc') =~ /^\s*(\d\d?)\s*$/) {
    my $key = $ticket->{"c$1"};
    my $fldname = $cfg->get('matchlistname') || 'account number';
    if ($key eq undef) {
      $error .= '[%Missing%]'." $fldname<br>\n";
    } else {
      my $fn = $cfg->get('matchlistfile') || $cfg->get('basedir')."/matchlist.txt";
      if (open(MATCHLIST, $fn)) {
        my @lines = <MATCHLIST>;
        close(MATCHLIST);
        chomp @lines;
        my $match = 0;
        if ($cfg->get('matchlistdigitsonly')) {
          $key =~ s/\D//g;
          foreach my $line (@lines) {
            $line =~ s/\D//g;
            if ($line eq $key) {
              $match = 1;
              last;
            }
          }
        } else {
          $match = int(grep(/^\s*$key\s*$/, @lines));
        }
        if (!$match) {
          $error .= '[%Invalid%] '."$fldname<br>\n";
        }
      } else {
        $error .= '[%Missing matchfile%]<br>'."\n";
      }
    }
  }
  if ($error ne undef) {
    $error =~ s/<br>$//;
    $data->{ERROR_MESSAGE} = $error;
    kid($cfg, $query, $data, $useold) if $cfg->get('useaccesscode');
    return undef;
  }
  my @catchy = grep(/^_GLOBAL_newticket_x/, keys %{$cfg->ashash()});
  foreach my $input (@catchy) {
    $cfg->set($input, undef);
  }
  if ($cfg->get('stickycf')) {
    @catchy = grep(/^x/, $query->param());
  } else {
    @catchy = ();
  }
  push @catchy, 'email';
  push @catchy, 'name';
  foreach my $input (@catchy) {
    $cfg->set("_GLOBAL_newticket_$input", $query->param($input));
  }
  TTXCommon::cleanit($query, 'problem');
  my $tickets = TTXCommon::dbtik();
  if ($tickets->error() ne undef || !$tickets->addticket($ticket)) {
    $data->{ERROR_MESSAGE} = $tickets->errortext();
    kid($cfg, $query, $data, $useold) if $cfg->get('useaccesscode');
    return undef;
  }
  if ($cfg->get('validate') ne undef) {
    my $n = $cfg->get('validate');
    if ($n =~ /^\d\d?$/) {
      $ticket->{"c$n"} = 'N';
      srand($ticket->{open});
      my $k = int (rand(999999));
      $data->{VALIDATIONCODE} = $ticket->{id}."Z$k";
    }
  }
  my @messages;
  $messages[0] = "From: ".$ticket->{name}."\nDate: ".time()."\nIP: $ENV{REMOTE_ADDR}\n";
  if ($query->param('internal')) {
     $messages[0] .= "Operator: 1\nInternal: Yes\n";
  }
  if (TTXData::get('ISPRO')) {
    for (my $i = 1; $i < 4; ++$i) {
      next if $query->param("f$i") eq undef;
      $messages[0] .= TTXFile::addfile($query, "f$i", "fname$i", $ticket->{id});
    }
  }
  my $autoassignmsg;
  if ($cfg->get('useopersel') && $query->param('oper') ne undef && $query->param('oper') ne '-') {
    my $u = TTXUser->new($query->param('oper'));
    if ($u ne undef) {
      $ticket->{oper} = $u->{login};
      $ticket->{status} = 'OPN';
      $autoassignmsg = '[%The ticket is assigned to%] '.$u->{fname}.' '.$u->{lname}."\n\n";
    }
  }
  $messages[0] .= "\n$custom$autoassignmsg".substr(TTXCommon::decodeit($query->param('problem')),0,32*1024);
  $ticket->{messages} = \@messages;
  if (!$tickets->save()) {
    $data->{ERROR_MESSAGE} = $tickets->errortext();
    kid($cfg, $query, $data, $useold) if $cfg->get('useaccesscode');
    return undef;
  }
#
# Update TLIST cookie
#
  if ($cfg->get('singleticket') && $cfg->get('_USER') eq undef) {
    my @tlist = split(/;/, $cfg->get('_GLOBAL_TLIST'));
    my $sname = $ENV{SCRIPT_NAME};
    @tlist = grep(!/^$sname:/, @tlist);
    push @tlist, "$sname:".$ticket->{key};
    $cfg->set('_GLOBAL_TLIST', join(';', @tlist));
  }
  unlink $cfn if $cfn ne undef && -f $cfn;
  $tickets = undef;
  $data->{TICKETID} = $ticket->{id};
  $data->{TICKETKEY} = $ticket->{key};
  usernotify({cfg => $cfg, ticket => $ticket, validationcode => $data->{VALIDATIONCODE}})
    if !$query->param('internal');
  if ($cfg->get('validate') eq undef) {
    my $opernotifydata = {cfg => $cfg, ticket => $ticket};
    if ($cfg->get('supervisor') ne undef) {
      my @list = ($cfg->get('supervisor'));
      $opernotifydata->{notifylist} = \@list;
    } elsif ($cfg->get('usegrpsel')) {
      my @list;
      foreach my $grp (TTXGroups::unpackgrp($ticket->{grp})) {
        foreach my $id (split(/;/, $cfg->get("mbr-$grp"))) {
          push @list, $id if !grep(/^$id$/, @list);
        }
      }
      $opernotifydata->{notifylist} = \@list;
    } elsif ($cfg->get('routex') ne undef) {
      eval "use TTXCustomRoute";
      if ($@ eq undef) {
        my @list = TTXCustomRoute::routelist($cfg, $ticket);
        $opernotifydata->{notifylist} = \@list;
      }
    }
    opernotify($opernotifydata);
  }
  if ($cfg->get('report') || $cfg->get('newticketnotice')) {
    eval "use TTXEReport";
    if ($@ eq undef) {
      TTXEReport::reportopen($cfg, $ticket);
    }
  }
  if ($cfg->get('internaldesk')) {
    $query->param(-name => 'reset', -value => 1);
    return 'helpdesk';
  }
  if ($query->param('noconfirmation')) {
    $query->param(-name => 'reset', -value => 1);
    return 'helpdesk';
  }
  return 'confirmnew';
}
# =================================================================== confirmnew

sub confirmnew {
  my ($cfg, $query, $data) = @_;
  return undef;
}
# ==================================================================== fid2title

sub fid2title {
 if ($_f2t eq undef) {
   eval 'use TTXData';
   my $cfg;
   eval '$cfg = TTXData::get'."('CONFIG')";
   return $_[0] if $cfg eq undef;
   my @xflds = grep(/^x/, $cfg->vars());
   foreach my $xfld (@xflds) {
     my $t = $xfld;
     $t =~ s/^x//;
     $_f2t->{'c'.$cfg->get($xfld)} = $t;
   }
 }
 return $_f2t->{$_[0]} || $_[0];
}
# ======================================================================= wanted

sub wanted {
  my ($cfg, $query, $ticket) = @_;
  my $buff;
  if ($cfg->get('mandatoryfields') ne undef) {
    my @mflist = split(/;/, $cfg->get('mandatoryfields'));
    foreach my $fid (@mflist) {
      next if $fid !~ /^c\d+$/;
      my $title = fid2title($fid);
      $title =~ s/</&lt;/g;
      $buff .= "<tr>\n<td align=left class=lbl>$title</td>\n<td align=left>";
      my $id = $fid; $id =~ s/^c//;
      if ($cfg->get("dropdown$id") ne undef) {
        $buff .= "<select name=wanted$id>\n";
        if ($ticket->{$fid} eq undef) {
          if ($query->param("wanted$id") eq undef) {
            $buff .= "<option></option>\n";
          }
        } elsif ($query->param("wanted$id") eq undef) {
          $query->param(-name => "wanted$id", -value => $ticket->{$fid});
        }
        my @options = split(/;/, $cfg->get("dropdown$id"));
        foreach my $option (@options) {
          my $safeoption1 = $option;
          my $safeoption2 = $option;
          $safeoption1 =~ s/"/&quot/g;
          $safeoption2 =~ s/</&lt;/g;
          $buff .= "<option value=\"$safeoption1\"";
          if ($option eq $query->param("wanted$id")) {
            $buff .= ' selected';
          }
          $buff .= ">$safeoption2</option>\n";
        }
        $buff .= "</select>\n";
      } else {
        my $val = $query->param('do') ? $query->param("wanted$id") : $ticket->{$fid};
        $val =~ s/"/&quot;/g;
        $buff .= "<input type=text size=25 name=wanted$id value=\"$val\">\n";
      }
      $buff .= "</td>\n</tr>\n";
    }
    if ($buff ne undef) {
      $buff = "<table width=".$cfg->get('HTMLBASEWIDTH')."cellspacing=0 cellpadding=0 bgcolor=\"#CFDCE8\">\n".
              "<tr>\n<td align=center>\n".
              "<table cellpadding=3>$buff</table>\n".
              "</td>\n</tr>\n".
              "</table>\n";
    }
  }
  return $buff;
}
# ======================================================================= lockdb
my $lockcnt;
sub lockdb {
  return ++$lockcnt if $lockcnt;
  my $cfg = TTXData::get('CONFIG');
  return 1 if $cfg->get('dbmode') !~ /sql/;
  my $lockfile = $cfg->get('basedir')."/lockdb.ttx";
  if (! -f $lockfile) {
    if (!open(LOCK, ">$lockfile")) {
      return 0;
    }
  } elsif (!open(LOCK,"+<$lockfile")) {
    return 0;
  }
  flock(LOCK, 2);
  $lockcnt = 1;
  return 1;
}
# ===================================================================== unlockdb

sub unlockdb {
  return if !$lockcnt;
  my $cfg = TTXData::get('CONFIG');
  return if $cfg->get('dbmode') !~ /sql/;
  --$lockcnt;
  if (!$lockcnt) {
    flock(LOCK, 8);
    close LOCK;
  }
}
# ======================================================================== claim

sub claim {
  my ($cfg, $query, $data) = @_;
  if ($query->param('cancel') ne undef) {
    $query->param(-name => 'tid', -value=> '');
    $query->param(-name => 'do', -value => '');
    return 'helpdesk';
  }
  if (!$query->param('do')) {
    return undef;
  }
  $query->param(-name => 'do', -value => '');
  my $notify;
  lockdb();
  my $tickets = TTXCommon::dbtik();
  if ($tickets eq undef || $tickets->error() ne undef) {
    $data->{ERROR_MESSAGE} = $tickets->errortext();
    unlockdb();
    return undef;
  }
  my $t = $tickets->ticket(TTXCommon::cleanit($query, 'tid'));
  if ($t eq undef) {
    $data->{ERROR_MESSAGE} = '[%Invalid access key%]';
    $query->param(-name => 'tid', -value=> '');
    unlockdb();
    return 'helpdesk';
  }
  if ($t->{oper} ne undef) {
    $data->{ERROR_MESSAGE} = '[%The ticket is already assigned to%] '.$t->{oper};
  } else {
    if ($cfg->get('mandatoryfields') ne undef && $query->param('delete') eq undef) {
      my @mflist = split(/;/, $cfg->get('mandatoryfields'));
      my $err;
      foreach my $fid (@mflist) {
        next if $fid !~ /^c\d+$/;
        my $id = $fid; $id =~ s/^c//;
        if ($query->param("wanted$id") ne undef) {
          $t->{$fid} = $query->param("wanted$id");
        } elsif ($t->{$fid} eq undef) {
          $err .= '[%Missing%] '.fid2title($fid)."<br>";
        }
      }
      if ($err ne undef) {
        $data->{ERROR_MESSAGE} = $err;
        $data->{WANTED} = wanted($cfg, $query, $t);
        unlockdb();
        return 'ticket';
      }
    }
    $t->{oper} = $cfg->get('_USER')->get('login');
    $t->{status} = 'OPN';
    if ($cfg->get('claimtime') ne undef) {
      my $totaltm = int ((time() - $t->{open})/60);
      my $totaltmm = $totaltm % 60;
      my $totaltmh = int(($totaltm - $totaltmm) / 60);
      $totaltmm = "0$totaltmm" if $totaltmm < 10;
      $totaltmh = "0$totaltmh" if $totaltmh < 10;
      $t->{'c'.$cfg->get('claimtime')} = $totaltmh.':'.$totaltmm;
    }
    $tickets->save();
    TTXCommon::logit("CLAIM|".$t->{oper}."|".$t->{id});
    if ($query->param('delete') ne undef) {
      my $oper = $cfg->get('_USER')->get('login');
      if ($cfg->get('_USER')->get('dt')) {
        $tickets->deltik($t->{id});
        $tickets->save();
      }
      $query->param(-name => 'tid', -value=> '');
      unlockdb();
      return 'helpdesk';
    } elsif ($cfg->get('claimnotice') ne undef) {
      $notify = 1;
    }
  }
  unlockdb();
  if ($notify) {
    my @oplist = TTXUser::list();
    if ($usewrkh eq undef) {
      eval 'use TTXWorkHours';
      $usewrkh = 1 if $@ eq undef;
    }
    foreach my $o (@oplist) {
      my $u = TTXUser->new($o);
      next if $u eq undef || $u->{email} eq undef || ($usewrkh && !TTXWorkHours::onguard($u->{wrkh}));
      TTXMail::sendmail(
        {
          to => $u->{email},
          from => '"'.company($cfg, $t).'" <'.$cfg->get('email').'>',
          subject => 'Notice: ticket '.$t->{id}.' claimed by '.$t->{oper},
          msg => '[b]Notice:[/b] ticket '.$t->{id}.' claimed by '.$t->{oper}."\n\n".
                 "This is a notification only, please do not reply to this message\n"
         }
       );
     }
  }
  return 'ticket';
}
# =================================================================== directedit

my $_directedit = undef;

sub directedit {
  if ($_directedit eq undef) {
    eval 'use TTXCFEd';
    if ($@ eq undef) {
      $_directedit = 1;
    } else {
      $_directedit = 0;
    }
  }
  return $_directedit;
}
# ===================================================================== ok2close

sub ok2close {
  my ($cfg, $data, $t) = @_;
  return 1 if $cfg->get('checkonclose') eq undef;
  my @cclist;
  foreach my $f (split(/,|;/, $cfg->get('checkonclose'))) {
    $f =~ s/^\s+//; $f =~ s/\s+$//;
    next if $f eq undef;
    next if $f eq '';
    next if $f !~ /\d\d?/;
    push @cclist, $f;
  }
  my @errors;
  foreach my $f (@cclist) {
    next if length($t->{"c$f"}) > 0;
    push @errors, '[%Missing %]'.fid2title("c$f");
  }
  if (@errors > 0) {
    $data->{ERROR_MESSAGE} = join("<br>\n", @errors);
    return 0;
  }
  return 1;
}
# ======================================================================= ticket

sub ticket {
  my ($cfg, $query, $data) = @_;
  checkgroups($cfg);
  my $user = $cfg->get('_USER');
  TTXCommon::tickedvars($cfg, $data);
  my $cfldcnt = TTXCommon::cfldcnt();
  if ($query->param('cancel') ne undef) {
    if ($user ne undef) {
      foreach my $id ('tid', 'do', 'item', 'email') {
        $query->param($id, '');
      }
      for(my $i = 0; $i < $cfldcnt; ++$i) {
        $query->param("c$i", '');
      }
      return 'helpdesk';
    } else {
      if ($query->param('emailkey') ne undef) {
        return 'mytickets';
      } else {
        return 'newticket';
      }
    }
  }
  if ($query->param('key') eq undef) {
    return 'keyform';
  }
  my $tickets = TTXCommon::dbtik();
  if ($tickets eq undef || $tickets->error() ne undef) {
    $data->{ERROR_MESSAGE} = $tickets->errortext();
    return undef;
  }
  my $t;
  my $isoper = 0;
  if ($user ne undef) {
    $t = $tickets->ticket(int(TTXCommon::cleanit($query, 'key')));
    $isoper = 1;
  } else {
    $t = $tickets->ticketbykey(TTXCommon::cleanit($query, 'key'));
  }
  if ($t eq undef) {
    $data->{ERROR_MESSAGE} = $cfg->get('shortkey') ? '[%Ticket does not exist%]':'[%Invalid access key%]';
    return 'keyform';
  }
  $query->param(-name => 'tid', -value=> $t->{id});
  my $cmd;
  my $readonly;
  if ($isoper) {
    $readonly = $user->get('ro') ? 1:0;
    if (!$readonly) {
      my $oper = $user->get('login');
      my $candel;
      if ($user->get('dt')) {
        $candel = 1;
      }
      if ($t->{oper} eq undef) {
        $cmd = 'claim';
        $data->{WANTED} = wanted($cfg, $query, $t);
        if ($candel) {
          $data->{DELTICKET} = '&nbsp;&nbsp;<input type=submit name=delete onclick="return confirmdel()" value="[%Delete ticket%]">';
        }
      } else {
        if ($candel) {
          $data->{DELTICKET} = '<input type=submit name=delete onclick="return confirmdel()" value="[%Delete ticket%]">';
        }
        if (hasanswerlib()) {
          $data->{DELTICKET} .= '&nbsp;&nbsp;<input type=submit name=draft value="[%Save draft%]">'
        }
      }
      $data->{TICKEDOPEN} = "<a href=# onClick=\"return ticked('".$query->param('tid')."')\">";
      $data->{TICKEDCLOSE} = '</a>';
      $data->{ANSWERLIB} = '&nbsp;&nbsp;&nbsp;&nbsp;<a href=#teditor tabindex="-1" onClick="return answerlib()">[%Answer library%]</a>';
    }
  }
  if ($query->param('do') && $isoper && $query->param('draft') ne undef && hasanswerlib()) {
    $query->param('do', '');
    $query->param('draft', '');
    if (TTXAnswerLib::savedraft($t, $query->param('problem'), $data)) {
      $data->{ERROR_BOX} = "<br><b><font color=blue>Message saved</font></b><br><br>\n";
    } # if error, the error message already in place
  }
  if ($isoper && !$query->param('do')) {
    if ($cfg->get('default.internal')) {
      $query->param('internal', '1');
    }
  }
  if ($query->param('do') && $t->{status} eq 'CLS' && !$isoper) {
    $query->param(-name => 'email', -value => $t->{email});
    $query->param(-name => 'name', -value => $t->{name});
    $query->param(-name => 'subject', -value => $t->{subject});
    $query->param(-name => 'problem', -value => TTXDictionary::translate('Posted as a followup to the solved ticket').' #'.$t->{id}.
                                                ".\n\n".$query->param('problem'));
    return 'newticket';
  }
  if ($t->{status} =~ /OPN|WFR|HLD/ && !$readonly) {
    $data->{PREVIEW} .= '&nbsp;&nbsp;<a href=#teditor tabindex="-1" onClick="return preview()">[%Preview%]</a>';
  }
  my $worktimehdr = undef;
  my $notify;
  my $xupdate = 0;
  if ($query->param('do')) {
    my @inputs = $query->param();
    @inputs = grep(/^x/, @inputs);
    foreach my $input (@inputs) {
      my $val = TTXCommon::cleanit($query, $input);
      my $n = $cfg->get($input);
      next if $n eq undef || $n =~ /[^0-9]/ || $n < 0 || $n >= $cfldcnt;
      if ($val ne $t->{"c$n"}) {
        $t->{"c$n"} = $val;
        $xupdate = 1;
      }
    }
  }
  if ($cmd eq undef && $query->param('do')) {
    if ($readonly) {
      $query->param(-name => 'do', -value=> '');
      $query->param(-name => 'tid', -value=> '');
      return 'helpdesk';
    }
    if ($isoper && $query->param('delete') ne undef) {
      my $oper = $user->get('login');
      if ($user->get('dt')) {
        $tickets->deltik($t->{id});
        $tickets->save();
      }
      foreach my $fid ('do', 'tid', 'email', 'item', 'grp') {
        $query->param(-name => $fid, -value=> '');
      }
      for(my $i = 0; $i < $cfldcnt; ++$i) {
        $query->param("c$i", '');
      }
      return 'helpdesk';
    }
    my $deccode = 0;
    if (directedit()) {
      $deccode = TTXCFEd::update($cfg, $query, $data, $t);
      if ($deccode > 0) {
        $xupdate = 1;
      }
    }
    my $attachment;
    if (TTXData::get('ISPRO')) {
      for (my $i = 1; $i < 4; ++$i) {
        next if $query->param("f$i") eq undef;
        $attachment .= TTXFile::addfile($query, "f$i", "fname$i", $t->{id});
      }
    }
    if ($query->param('problem') eq undef && $attachment ne undef) {
      $query->param(-name => 'problem', -value => 'See attachment');
    }
    if ($query->param('problem') eq undef && $query->param('newstatus') eq 'CLS') {
      $query->param(-name => 'problem', -value => TTXDictionary::translate('Ticket closed'));
    }
    if ($deccode < 0) {
      # the error description is in place already
    } elsif (($query->param('newstatus') eq 'CLS' || ($t->{status} eq 'CLS' && !length($query->param('newstatus')))) && !ok2close($cfg, $data, $t)) {
      # the error description is in place already
    } elsif ($query->param('problem') eq undef &&
        ($query->param('newstatus') eq undef || $t->{status} eq $query->param('newstatus')) &&
        ($query->param('transfer') eq undef || $t->{oper} eq $query->param('transfer')) &&
        !$xupdate) {
      $data->{ERROR_MESSAGE} = '[%Missing message%]';
    } elsif (!$isoper &&
             $cfg->get('askforname') &&
             $query->param('ccmail') ne undef &&
             $query->param('ccmail') ne $t->{email} &&
             TTXCommon::cleanit($query, 'respondername') eq undef &&
             $query->param('problem') ne undef) {
      $data->{ERROR_MESSAGE} = '[%Missing name%]';
    } else {
      my $skipupdate = 0;
      if ($isoper && $cfg->get('tracktime') ne undef) {
        my $ttx = $cfg->get('tracktime');
        if ($ttx ne undef && $ttx !~ /[^0-9]/ && $ttx >= 0 && $ttx < $cfldcnt) {
          my $tth = int(TTXCommon::cleanit($query, 'tracktimeh'));
          my $ttm = int(TTXCommon::cleanit($query, 'tracktimem'));
          if ((($query->param('tracktimeh') eq undef && $query->param('tracktimem') eq undef) ||
              ($query->param('tracktimeh') =~ /\D/ || $query->param('tracktimem') =~ /\D/))
              && $query->param('problem') ne undef) {
            $skipupdate = 1;
            $data->{ERROR_MESSAGE} = '[%Invalid or missing work time%]';
          } else {
            $query->param(-name => 'tracktimeh', -value => '');
            $query->param(-name => 'tracktimem', -value => '');
            if (($tth + $ttm) > 0) {
              my ($totaltmh, $totaltmm) = split(/:/, $t->{"c$ttx"});
              my $totaltm = $totaltmh * 60 + $totaltmm;
              $totaltm += $tth * 60 + $ttm;
              $totaltmm = $totaltm % 60;
              $totaltmh = int(($totaltm - $totaltmm) / 60);
              $totaltmm = "0$totaltmm" if $totaltmm < 10;
              $totaltmh = "0$totaltmh" if $totaltmh < 10;
              $t->{"c$ttx"} = $totaltmh.':'.$totaltmm;
              $tth = "0$tth" if $tth < 10;
              $ttm = "0$ttm" if $ttm < 10;
              $worktimehdr = "WTM: $tth-$ttm\n";
            }
          }
        }
      }
      if (!$skipupdate) {
        if ($query->param('newstatus') ne undef) {
          $t->{status} = $query->param('newstatus');
        } elsif($query->param('problem') ne undef) {
          if ($t->{status} eq 'OPN' && $isoper && !$query->param('internal')) { $t->{status} = 'WFR'; }
          if ($t->{status} =~ /WFR|HLD/ && !$isoper) { $t->{status} = 'OPN'; }
        }
        if ($query->param('problem') ne undef || $attachment ne undef) {
          my $unm = $t->{name};
          if ($cfg->get('askforname') && $query->param('respondername') ne undef) {
            $unm = TTXCommon::decodeit($query->param('respondername'));
          }
          my $msg = "From: ".($isoper ? $user->get('login') : $unm)."\nDate: ".time()."\nOperator: $isoper\n";
          if ($isoper && $query->param('internal')) {
            $msg .= "Internal: Yes\n";
          }
          $msg .= "IP: $ENV{REMOTE_ADDR}\n";
          $msg .= $worktimehdr;
          my $problem = TTXCommon::decodeit($query->param('problem'));
          $msg .= "$attachment\n".substr($problem,0,32*1024);
          push @{$t->{messages}}, $msg;
          $query->param(-name => 'problem', -value => '');
          $notify = 1;
          if ($isoper) {
            TTXCommon::logit("RESPOND|".$t->{oper}."|".$t->{id});
			if ($cfg->get('firstanswer') =~ /^\d\d?$/) {
				my $fa = int($cfg->get('firstanswer'));
				if ($fa < $cfldcnt && $t->{"c$fa"} eq undef && !$query->param('internal')) {
					$t->{"c$fa"} = $cfg->get('firstanswer.unix') ? time() : TTXCommon::tmtxt(time(), 1);
				}
			}
          }
        }
        if ($isoper && $query->param('transfer') ne undef && $query->param('transfer') ne $t->{oper}) {
          TTXCommon::logit("TRANSFER|".$t->{oper}."|".$t->{id}."|".$query->param('transfer'));
          if ($query->param('transfer') !~ /^\+/) {
            $t->{oper} = $query->param('transfer');
            $t->{status} = 'OPN' if $cfg->get('transferopens');
            transfernotice({cfg => $cfg, ticket => $t});
          } elsif($cfg->get('usegrpsel')) {
            my $grp = $query->param('transfer');
            $grp =~ s /^\+//;
            TTXGroups::grptransfer({cfg => $cfg, ticket => $t, grp => $grp});
          }
        }
        $t->{updated} = time();
        if ($t->{status} eq 'CLS') {
          $t->{closed} = $t->{updated};
          if ($isoper) {
            TTXCommon::logit("CLOSE|".$t->{oper}."|".$t->{id});
            if ($cfg->get('report') ne undef) {
              eval "use TTXEReport";
              if ($@ eq undef) {
                TTXEReport::reportclose($cfg, $t);
              }
            }
          }
        }
        $tickets->save();
        if ($t->{status} eq 'PND' && $isoper) {
          $query->param(-name => 'do', -value => '');
          my $oper = $user->get('login');
          if ($user->get('dt')) {
            $data->{DELTICKET} = '&nbsp;&nbsp;<input type=submit name=delete onclick="return confirmdel()" value="[%Delete ticket%]">';
          }
          $cmd = 'claim';
        }
      }
    }
  }
  $tickets = undef;
  if (directedit()) {
    TTXCFEd::form($cfg, $query, $data, $t);
  }
  if ($isoper && invenabled()) {
    $data->{INVENTORYROW} = TTXInvMod::invrow($cfg, $data, $t);
  }
  if (($t->{status} =~ /WFR|CLS|HLD/) && $isoper) {
    $data->{NEWSTATUS} = "<input type=radio name=newstatus value=OPN";
    if ($query->param('newstatus') eq 'OPN') { $data->{NEWSTATUS} .= ' checked'; }
    $data->{NEWSTATUS} .= '> [%Open%]<br>'."\n";
    if ($t->{status} ne 'WFR') {
      $data->{NEWSTATUS} .= "<input type=radio name=newstatus value=WFR";
      if ($query->param('newstatus') eq 'WFR') { $data->{NEWSTATUS} .= ' checked'; }
      $data->{NEWSTATUS} .= '> [%Responded%]<br>'."\n";
    }
    if ($t->{status} ne 'HLD') {
      $data->{NEWSTATUS} .= "<input type=radio name=newstatus value=HLD";
      if ($query->param('newstatus') eq 'HLD') { $data->{NEWSTATUS} .= ' checked'; }
      $data->{NEWSTATUS} .= '> [%On Hold%]<br>'."\n";
    }
  }
  if ($t->{status} eq 'OPN') {
    $data->{NEWSTATUS} = "<input type=radio name=newstatus value=OPN";
    if ($query->param('newstatus') eq 'OPN') { $data->{NEWSTATUS} .= ' checked'; }
    $data->{NEWSTATUS} .= '> [%Open%]<br>'."\n";
    $data->{NEWSTATUS} .= "<input type=radio name=newstatus value=WFR";
    if ($query->param('newstatus') eq 'WFR') { $data->{NEWSTATUS} .= ' checked'; }
    $data->{NEWSTATUS} .= '> [%Responded%]<br>'."\n";
    if ($isoper) {
      $data->{NEWSTATUS} .= "<input type=radio name=newstatus value=HLD";
      if ($query->param('newstatus') eq 'HLD') { $data->{NEWSTATUS} .= ' checked'; }
      $data->{NEWSTATUS} .= '> [%On Hold%]<br>'."\n";
    }
  }
  if ($t->{status} ne 'CLS') {
    $data->{NEWSTATUS} .= "<input type=radio name=newstatus value=CLS";
    if ($query->param('newstatus') eq 'CLS') { $data->{NEWSTATUS} .= ' checked'; }
    $data->{NEWSTATUS} .= '> [%Closed%]<br>'."\n";
  }
  if ($isoper) {
    if (isrestricted($cfg)) {
      $data->{NEWSTATUS} .= '<input type=hidden name=internal value=1>';
   } else {
      $data->{NEWSTATUS} .= '<br><input type=checkbox name=internal value=1';
      if ($query->param('internal')) {
        $data->{NEWSTATUS} .= ' checked';
      }
      $data->{NEWSTATUS} .= '> <span class=lbl>[%Internal%]</span><br>';
    }
  }
  my $userid = $user->{login} if $isoper;
  if ($isoper && ($userid eq $t->{oper} || $user->get('tr'))) {
    my @operlist = TTXUser::list();
    my @grplist;
    if ($cfg->get('usegrpsel')) {
      my $rev;
      eval '$rev = $TTXGroups::REVISION';
      if ($@ eq undef && $rev > 231) {
        TTXGroups::cleanoperlist($cfg, \@operlist, $t->{grp});
      }
      my @gl = grep(/^group\d\d?$/, $cfg->vars());
      if ($rev > 486 && !$cfg->get("ingrouptx")) {
        my @tgl = TTXGroups::unpackgrp($t->{grp});
        foreach my $gid (@gl) {
          push @grplist, $gid if !grep(/^$gid$/, @tgl);
        }
      } else {
        @grplist = @gl;
      }
    }
    if (@operlist > 1 || ($cfg->get('usegrpsel') && @grplist > 0)) {
      $data->{NEWSTATUS} .= '<br><table cellpadding=0 cellspacing=0><tr><td align=right><span class=lbl>[%Transfer to%]</span></td></tr>'."\n".
                            "<tr><td align=right><br class=tiny><select name=transfer>\n";
      $data->{NEWSTATUS} .= "<option></option>\n";
      foreach my $oper (sort @operlist) {
        next if $oper eq $t->{oper};
        $data->{NEWSTATUS} .= "<option value=$oper";
        if ($query->param('transfer') eq $oper) {
          $data->{NEWSTATUS} .= " selected";
        }
        $data->{NEWSTATUS} .= ">$oper</option>\n";
      }
      if ($cfg->get('usegrpsel')) {
        TTXGroups::trselector($cfg, $data, \@grplist);
      }
      $data->{NEWSTATUS} .= "</select></td></tr></table>\n";
    }
  }
  $data->{PAGEHEADING} = '[%Ticket%] #'.$t->{id};
  $data->{TICKET_status} = TTXCommon::status($t->{status});
  $data->{TICKET_subject} = $t->{subject};
  $data->{TICKET_email} = $t->{email};
  $data->{TICKET_name} = $t->{name};
  $data->{TICKET_key} = $t->{key};
  $data->{TICKET_open} = TTXCommon::tmtxt($t->{open});
  if (multigroup()) {
    my @gl = TTXGroups::unpackgrp($t->{grp});
    my @labels;
    my $val;
    foreach my $gid (@gl) {
      push @labels, $cfg->get($gid) if length($cfg->get($gid)) > 0;
    }
    if (@labels > 0) {
      $val = join(',', sort @labels);
    } else {
      $val = '-';
    }
    $data->{TICKET_GROUP} = TTXCommon::decodeit($val);
  } else {
    $data->{TICKET_GROUP} = TTXCommon::decodeit($cfg->get($t->{grp})) || '-';
  }
  $data->{TICKET_closed} = $t->{status} eq 'CLS' ? TTXCommon::tmtxt($t->{closed}):'-';
  $data->{TICKET_oper} = $isoper ? $t->{oper}:(($t->{oper} eq undef) ? '[%not assigned%]':'[%assigned%]');
  my @xvars = $cfg->vars();
  @xvars = grep(/^x/, @xvars);
  foreach my $xvar (@xvars) {
    $data->{'TICKET_c'.$cfg->get($xvar)} = $t->{'c'.$cfg->get($xvar)};
    if ($query->param('do') eq undef) {
      $query->param(-name => $xvar, -value => TTXCommon::encodeit($t->{'c'.$cfg->get($xvar)}));
    }
  }
  if ($cfg->get('tracktime') ne undef && $isoper) {
    my $ttx = $cfg->get('tracktime');
    if ($ttx !~ /[^0-9]/ && $ttx >= 0 && $ttx < $cfldcnt) {
      my $tth = TTXCommon::cleanit($query, 'tracktimeh');
      my $ttm = TTXCommon::cleanit($query, 'tracktimem');
      $tth =~ s/"/&quot;/g; $ttm =~ s/"/&quot;/g;
      $data->{TRACKTIME} = '<b>[%Time spent on preparing the response (hh:mm)%]</b>'."\n".
                           "<input type=text size=2 name=tracktimeh value=\"$tth\">:".
                           "<input type=text size=2 name=tracktimem value=\"$ttm\"><br><br class=tiny>";
    }
  }
  if (!$isoper && $cfg->get('askforname')) {
    if ($query->param('ccmail') ne undef) {
      if ($query->param('respondername') eq undef && $query->param('ccmail') eq $t->{email}) {
        $query->param(-name => 'respondername', -value => TTXCommon::encodeit($t->{name}));
      }
      my $nm = $query->param('respondername');
      $nm =~ s/"/&quot;/g;
      $nm = TTXCommon::encodeit($nm);
      $data->{TRACKTIME} .= '<b>[%Your name%]<font color=red><sup><small>*</small></sup></font></b>&nbsp;'.
                            "\n<input type=text size=25 name=respondername value=\"$nm\">".
                            "<input type=hidden name=ccmail value=\"".$query->param('ccmail')."\"><br><br class=tiny>";
    }
  }
  my %images;
  my %names;
  my $editlink;
  if ($isoper && $t->{status} ne 'PND') {
    if ($user->get('me')) {
      eval 'use TTXMsgEdit';
      if ($@ eq undef) {
        $editlink = 1;
      }
    }
  }
  my $mid = 0;
  foreach my $msg (@{$t->{messages}}) {
    my @msgparts = split(/\n\n/, $msg);
    my $rawheader = shift @msgparts;
    my $body = join("\n\n", @msgparts);
    my @headerlines = split(/\n/, $rawheader);
    chomp @headerlines;
    my %header;
    foreach my $line (@headerlines) {
      if ($line =~ /^([a-zA-Z][a-zA-Z0-9-]*):\s*(.*)$/) {
        $header{uc $1} = $2;
      }
    }
    next if $header{OPERATOR} && $header{INTERNAL} =~ /Yes/ &&
            (!$isoper || ($cfg->get('_USER')->get('ro') && $cfg->get('hideinternal')));
    my $style;
    if ($header{OPERATOR}) {
      if ($header{INTERNAL} =~ /Yes/) {
        $style = 'imsg';
      } else {
        $style = 'omsg'
      }
    } else {
      $style = 'cmsg';
    }
    my $imgtag;
    my $fromtag;
    if ($header{OPERATOR}) {
      if (!exists $images{$header{FROM}}) {
        my $u = TTXUser->new($header{FROM});
        if ($u eq undef) {
          $images{$header{FROM}} = undef;
          $names{$header{FROM}} = undef;
        } else {
          $images{$header{FROM}} = $u->{image};
          $names{$header{FROM}} = $u->{fname}.' '.$u->{lname};
        }
      }
      if ($images{$header{FROM}} ne undef) {
        $imgtag = "<br><br class=sm><center><nobr>&nbsp;<img src=\"$images{$header{FROM}}\">&nbsp;</nobr></center><br class=sm>\n";
      }
      $fromtag = $names{$header{FROM}};
      if ($isoper) { $fromtag .= " ($header{FROM})"; }
    }
    $fromtag = $header{FROM} if $fromtag eq undef;
    $fromtag =~ s/</&lt;/g;
    if ($isoper) {
      if ($header{IP} ne undef) {
        $fromtag .= "<br>[$header{IP}]";
      }
    }
    my $msgwtm = undef;
    if ($header{WTM} ne undef) {
      $msgwtm = "<br>Work&nbsp;time:&nbsp;$header{WTM}";
      $msgwtm =~ s/-/:/;
    }
    if ($editlink ne undef) {
      $editlink = "<br>".TTXMsgEdit::link($cfg, $t, $mid);
      ++$mid;
    }
    $data->{MESSAGES} .= "<tr>\n<td width=20% align=left valign=top class=$style>$fromtag<br>".TTXCommon::tmtxt($header{DATE})."$msgwtm$editlink$imgtag</td>\n";
    $body =~ s/</&lt;/g;
    $body = TTXMarkup::html($body);
    $body =~ s/\n/<br>\n/g;
    $body = TTXCommon::splitlongwords($body, 80, 1);
    my $cfidx = $1;
    my $firstfile = 1;
    for (my $i=1; $i < 10; ++$i) {
      if ($header{"FILE$i"} ne undef) {
        if ($firstfile) {
          $body .= '<br class=sm><br class=sm>[%Files%]:<br>'."\n";
          $firstfile = 0;
        }
        $header{"FILE$i"} =~ s/CGIURL/$ENV{SCRIPT_NAME}/;
        $body .= $header{"FILE$i"} . "<br>\n";
      }
    }
    if (!$isoper && $cfg->get('confirmticket') =~ /^(\d\d?)$/) {
      my $cidx = $1;
      if ($t->{"c$cidx"} !~ /yes/i) {
        eval 'use TTXConfirmTicket';
        if ($@ eq undef) {
          $body .= TTXConfirmTicket::button($query->param('key'));
        }
      }
    }
    $data->{MESSAGES} .= "<td align=left valign=top class=$style>$body</td>\n</tr>\n";
  }
  if (TTXData::get('ISPRO')) {
    my $isRepository;
    eval '$isRepository = $TTXFile::isRepository';
    if ($isRepository ne 'yes' || !$isoper) {
      $data->{FILEFORMS} = TTXFile::fileforms();
    }
  }
  if ($notify) {
    if (!($isoper && $query->param('internal'))) {
      usernotify({cfg => $cfg, ticket => $t,
                  from => $isoper ?
                    $user->{fname}.' '.$user->{lname} :
                    $query->param('respondername')});
      if ($cfg->get('askforsurvey') && $t->{status} eq 'CLS') {
        eval "use TTXSurvey";
        TTXSurvey::ask($cfg, $t);
      }
    }
    if (!$isoper) {
      if ($t->{status} eq 'PND') {
        if ($cfg->get('validate') eq undef || $t->{'c'.$cfg->get('validate')} eq 'Y') {
          my $opernotifydata = {cfg => $cfg, ticket => $t};
          if ($cfg->get('supervisor') ne undef) {
            my @list = ($cfg->get('supervisor'));
            $opernotifydata->{notifylist} = \@list;
          } elsif ($cfg->get('usegrpsel')) {
            my @list = split(/;/, $cfg->get("mbr-".$t->{grp}));
            $opernotifydata->{notifylist} = \@list;
          } elsif ($cfg->get('routex') ne undef) {
            eval "use TTXCustomRoute";
            if ($@ eq undef) {
              my @list = TTXCustomRoute::routelist($cfg, $t);
              $opernotifydata->{notifylist} = \@list;
            }
          }
          opernotify($opernotifydata);
        }
      } else {
        opernotify({cfg => $cfg, ticket => $t});
      }
    } elsif ($t->{oper} ne undef) {
      if ($cfg->get('internalnotice') && $query->param('internal')) {
        my $opernotifydata = {cfg => $cfg, ticket => $t};
        my @list = TTXUser::list();
        $opernotifydata->{notifylist} = \@list;
        opernotify($opernotifydata);
      }elsif (isrestricted($cfg)) {
        my $opernotifydata = {cfg => $cfg, ticket => $t};
        my @list = split(/,|;/, $cfg->get('restricted.notice'));
        $opernotifydata->{notifylist} = \@list;
        opernotify($opernotifydata);
      }elsif ($user->{login} ne $t->{oper}) {
        opernotify({cfg => $cfg, ticket => $t});
      }
    }
  }
  return $cmd;
}


1;
#
