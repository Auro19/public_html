package TTXWorkHours;
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
# $Revision: 657 $
# $Date: 2008-11-21 13:05:18 -0500 (Fri, 21 Nov 2008) $
#

$TTXWorkHours::VERSION='3.01';
BEGIN {
  $TTXWorkHours::REVISION = '$Revision: 657 $';
  if ($TTXWorkHours::REVISION =~ /(\d+)/) {
    $TTXWorkHours::REVISION = $1;
  }
};
use strict;
require TTXData;
require TTXCommon;
my $lasterror;

# ========================================================================= link

sub errormsg {
  my $msg = $lasterror;
  $lasterror = undef;
  return $msg;
}
# ===================================================================== normtime

sub normtime {
  my ($hh, $mm) = split(/:/, $_[0]);
  if ($hh > 23 || $mm > 59) {
    return undef;
  }
  return int ($hh*60 + $mm);
}
# ===================================================================== packwrkh

sub packwrkh {
  my $wrkh = '';
  my @labels = ('Weekday', 'Sat', 'Sun');
  for (my $i = 0; $i < 3; ++$i) {
    my $val = $_[$i];
    $val =~ s/\s//g;
    if ($val eq undef || $val eq '') {
      $wrkh .= ';';
      next;
    }
    if ($val =~ /[^0-9:-]/ || $val !~ /\d\d?:\d\d-\d\d?:\d\d/) {
      $lasterror = "Invalid $labels[$i] work hours";
      return undef;
    }
    my ($start, $stop) = split(/-/, $val);
    my $normstart = normtime($start);
    my $normstop = normtime($stop);
    if ($normstart eq undef || $normstop eq undef) {
      $lasterror = "Invalid $labels[$i] work hours";
      return undef;
    }
    $wrkh .= "$val;";
  }
  $wrkh .= ($_[3] ? '1':'0');
  return $wrkh;
}
# =================================================================== unpackwrkh

sub unpackwrkh {
  my $cfg = TTXData::get('CONFIG');
  my @wrkh = split(/;/, $_[0]);
  if (!$cfg->get('userdb.wrkh')) {
    if ($wrkh[0] eq undef && $wrkh[1] eq undef && $wrkh[2] eq undef) {
      for (my $i = 0; $i < 3; ++$i) {
        $wrkh[$i] = '00:00-00:00';
      }
    }
  }
  return @wrkh;
}
# ===================================================================== vacation

sub vacation {
  my ($week, $sat, $sun, $vac) = unpackwrkh($_[0]);
  return 1 if $vac;
  return 0;
}
# ====================================================================== onguard

sub onguard {
  my ($week, $sat, $sun, $vac) = unpackwrkh($_[0]);
  return 0 if $vac;
  return 0 if $week eq undef && $sat eq undef && $sun eq undef;
  my $tm = time() + TTXData::get('CONFIG')->get('timezone') * 60;
  my ($sec,$min,$hour,$mday,$mon,$year, $wday) = gmtime($tm);
  my $hhmm = normtime("$hour:$min");
#
# If today is Tue - Fri
#
  if ($wday > 1 && $wday < 6) {
    return 0 if $week eq undef;
    my ($start, $stop) = split(/-/, $week);
    my $normstart = normtime($start);
    my $normstop = normtime($stop);
    return 1 if $stop == $start;  # special case, 24 hours operations
    #
    # Start and stop within the same day
    #
    if ($stop > $start) {
      if ($hhmm >= $normstart && $hhmm <= $normstop) {
        return 1;
      } else {
        return 0;
      }
    #
    # Stop on the next day
    #
    } else {
      if ($hhmm >= $normstart || $hhmm <= $normstop) {
        return 1;
      } else {
        return 0;
      }
    }
#
# If today is Mon
#
  } elsif ($wday == 1) {
    #
    # Check Sun night shift first
    #
    if ($sun ne undef) {
      my ($start, $stop) = split(/-/, $sun);
      my $normstart = normtime($start);
      my $normstop = normtime($stop);
      if ($normstop <= $normstart) {
        if ($hhmm <= $normstop) {
          return 1;
        }
      }
    }
    if ($week ne undef) {
      my ($start, $stop) = split(/-/, $week);
      my $normstart = normtime($start);
      my $normstop = normtime($stop);
      return 1 if $normstop == $normstart;  # special case, 24 hours operations
      if ($normstop >= $normstart) {
        if ($hhmm <= $normstop && $hhmm >= $normstart) {
          return 1;
        }
      } else {
        if ($hhmm >= $normstart) {
          return 1;
        }
      }
    }
    return 0;
#
# If today is Sun
#
  } elsif ($wday == 0) {
    #
    # Check Sat night shift first
    #
    if ($sat ne undef) {
      my ($start, $stop) = split(/-/, $sat);
      my $normstart = normtime($start);
      my $normstop = normtime($stop);
      if ($normstop <= $normstart) {
        if ($hhmm <= $normstop) {
          return 1;
        }
      }
    }
    if ($sun ne undef) {
      my ($start, $stop) = split(/-/, $sun);
      my $normstart = normtime($start);
      my $normstop = normtime($stop);
      if ($normstop >= $normstart) {
        if ($hhmm <= $normstop && $hhmm >= $normstart) {
          return 1;
        }
      } else {
        if ($hhmm >= $normstart) {
          return 1;
        }
      }
    }
    return 0;
  } elsif ($wday == 6) {
    #
    # Check Weekday night shift first
    #
    if ($week ne undef) {
      my ($start, $stop) = split(/-/, $week);
      my $normstart = normtime($start);
      my $normstop = normtime($stop);
      if ($normstop <= $normstart) {
        if ($hhmm <= $normstop) {
          return 1;
        }
      }
    }
    if ($sat ne undef) {
      my ($start, $stop) = split(/-/, $sat);
      my $normstart = normtime($start);
      my $normstop = normtime($stop);
      if ($normstop >= $normstart) {
        if ($hhmm <= $normstop && $hhmm >= $normstart) {
          return 1;
        }
      } else {
        if ($hhmm >= $normstart) {
          return 1;
        }
      }
    }
    return 0;
  }
  return 0;
}

1;
#
