<?php
// PHProjekt Themeware System
// Copyright ©2003-2005 by Mark Coudriet / ipsymon@yahoo.com

// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License, or
// (at your option) any later version.
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, 
// Boston, MA 02111-1307, USA.

// define db_prefix -* Must use to be compatible with older versions of PHProjekt
if (!defined("DB_PREFIX")) define ('DB_PREFIX',$db_prefix);
// ************* BEGIN VARIABLE SECTION
// default colours for the whole system.
$bgcolor1 = "white";     // First background color 79817A
$bgcolor2 = "#F4F4F4";     // Second background color
$bgcolor3 = "#F4F4F4";     // Third background color
//$bgcolor1 = "\"\""; // First background color
//$bgcolor2 = "\"\""; // Second background color
//$bgcolor3 = "\"\""; // Third background color
$terminfarbe = "#DFE4DC";  // Color for Calendar Events
$bgcolor_hili = "#C8FC00"; // Row hover color
$tr_hover = "1";           // Enable or disable row hovers

$target = "\"_top\""; // target for href's
$br="";
// additional elements - optionally set
// use chat inviter?
$chatinv = 1;       // 0 = Disabled, 1 = Enabled
$nav_searchbox = 0; // show search box
$nav_timecard = 0;  // show timecard login
$tab_type = 2;      // tab as text: 0; as images: 1; as text & images: 2;
$nav_pos = 0;
$nav_space=0;
$tab_increase = 0;  // suggest 4
$width_sel = 16;
$width_notsel = 16 + $tab_increase;
$height_sel = 16;
$height_notsel = 16 + $tab_increase;
// CSS for groupbox
$groupstyle = "style=\"padding-top:2px; padding-left:3px\"";

// Help document URL
$help_docs = "http://wiki.phprojekt.com/index.php/OnlineManual";
// Custom Help docs
//$help_docs = $dir."help/en/Intranet.html";
// ************* END VARIABLE SECTION

// ************* deliver custom menu
include_once("../layout/$skin/includes/display.inc.php");
// *************

// ************* BEGIN CUSTOM_FUNCTIONS SECTION
function group_box() { 
  global $user_ID, $PHPSESSID, $module, $mode2, $user_group, $tab_notsel, $nav_searchbox, $groupstyle, $target, $startstring;
  
  // determine whether this is the first or second from onthis page -> must know this to get the onchange-js properly working 
  if ($nav_searchbox) { $form_nr = 1; }
  else { $form_nr = "0"; }
  // does a group with this user exist?
  $result = db_query("select grup_ID 
                        from ".DB_PREFIX."grup_user 
                       where user_ID = '$user_ID'") or db_die();
  $row = db_fetch_row($result);
  if ($row[0] > 0) {
  $startstring .=  "<form action='../index.php' method=post target=$target>\n";  
  $startstring .=  $tab_notsel[0].$tab_notsel[1];
    // fetch number, then name of common group, show up in drop down box
    if (SID) $startstring .=  "<input type=hidden name='PHPSESSID' value='$PHPSESSID'>\n";
    $startstring .=  "<input type=hidden name='module' value='$module'>\n";
    $startstring .=  "<input type=hidden name='mode2' value='$mode2'>\n";
    $startstring .=  "<select name=change_group onchange='document.forms[$form_nr].submit()'>\n";
    $result = db_query("select grup_ID 
                          from ".DB_PREFIX."grup_user 
                         where user_ID = '$user_ID'") or db_die();
    while ($row = db_fetch_row($result)) {
      $result2 = db_query("select kurz 
                             from ".DB_PREFIX."gruppen 
                            where ID = '$row[0]'") or db_die();
      $row2 = db_fetch_row($result2);
      $startstring .=  "<option value='$row[0]'";
      if ($user_group == $row[0]) { $startstring .=  " selected"; }
      $startstring .=  ">$row2[0]\n";
    }
    $startstring .=  "</select></form>\n";
  $startstring .=  $tab_notsel[4].$tab_notsel[5];
  }
}

// addons
function add_addons() {
  global $addons_list, $mod_arr, $sid;
  // first call of this file here? -> scan the directory
  if (!$addons_list[0]) { $addons_list = check_addons(); }
  // next part - display the found addons in the navigation bar
  if ($addons_list[0] <> "no_addons" and $addons_list[0]) {
    foreach ($addons_list as $addon) {
      $mod_arr[] = array($addon,"href='../index.php?module=addon&mode2=".$addon.$sid."' target=$target>",$addon);
    }
  }
}

function check_addons() {
  global $path_pre;

  // check whether the addon directory exists at all
  if (file_exists($path_pre."addons")) {
    // open the addon directory
    $fp = opendir($path_pre."addons/");
    // read all objects in this dir, set the count of found addons to zero ...
    $i = 0;
    while ($file = readdir ($fp)) {
      // but exclude links, index files, system files etc.
      if ($file!='.' && $file!='..' && $file!='index.html' && !ereg("^_",$file) && $file!='CVS') { 
        $addons_list[$i] = $file;
        $at_least_one_addon = 1;
        $i++;
      }
    }
    closedir($fp);
  } // close bracket "check exist addons dir"
  // not a single addon :-((
  if (!$at_least_one_addon) { $addons_list[0] = "no_addons"; }
  // write into session: "no_addons" as the first element if nothing is found, otherwise all addons as an array
  reg_sess_vars(array("addons_list"));
  return $addons_list;
}

// END FROM O.PHP
// Added by Mark Coudriet
	// Permission function
	function can_access($access_grp) {
		global $user_kurz;
		$result2 = db_query("select ID, kurz from ".DB_PREFIX."users where kurz = '$user_kurz'") or db_die();
    	$row2 = db_fetch_row($result2);
    	$result1 = db_query("select user_ID, ".DB_PREFIX."gruppen.kurz from ".DB_PREFIX."grup_user, "
    	                                  .DB_PREFIX."gruppen where "
                                          .DB_PREFIX."grup_user.user_ID = '$row2[0]' and "
                                          .DB_PREFIX."grup_user.grup_ID = ".DB_PREFIX."gruppen.ID and "
                                          .DB_PREFIX."gruppen.kurz = '$access_grp' ") or db_die();
    	$row1 = db_fetch_row($result1);
    	return ($row1[0] <> '');
	} // Permission function

	
// Timecard Button
function Compact_show_timecard_button() {
  global $user_ID, $sid, $img_path, $l_text21a, $l_text21d, $startstring, $target;

  // fetch current date and time
  $datum = date("Y-m-d", mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y")));
  $time  = date("H:i", mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y")));
  
  
  // fetch an entry of this user from today where the record hasn't been completed (means: the user is still in the office)
  $result = db_query("select ID 
                        from ".DB_PREFIX."timecard 
                       where datum = '$datum' and 
                             (ende = '' or ende is NULL) and 
                             users = '$user_ID'") or db_die();
  $row = db_fetch_row($result);  
  // buttons for 'come' and 'leave', alternate display  
  if ($row[0] > 0) {
  // button 'leave' only if one record from today is open
    $startstring .= "href=\"../index.php?module=timecard&mode=data&action=2\"".$sid." target=$target><img src='$img_path/tc_logout.gif' alt='$l_text21d' title='$l_text21d' border=0></a>\n"; 
  }
  else {
    // 'come' button only if the user is not logged into the timecard today
    $startstring .= "href=\"../index.php?module=timecard&mode=data&action=1\"".$sid." target=$target><img src='$img_path/tc_login.gif' alt='$l_text21a' title='$l_text21a' border=0></a>\n"; 
  }
}
		
	
// By Mark Coudriet
// Who's online?
function chat_invite() {
global $startstring, $tab_alt, $PHPSESSID, $user_loginname, $user_group, $sid, $HTTP_SERVER_VARS, $HTTP_POST_VARS, $skin, $chat, $chatinv, $o_chat;
$thm_page = $HTTP_SERVER_VARS['PHP_SELF'];

// initialized invited username
$invited = $HTTP_POST_VARS['selinvite'];
  //$alive = 9999; // Must be less than freq to stop from reposting data
  //$freq = 10000;
  $alive = 9999; // Must be less than freq to stop from reposting data
  $freq = 10000;
  // online users
  $invitefile = "../chat/list.txt";
  $i = 0;
  $a = 0;
  $stopdup = 0;

// check role
if ($chatinv !=0 and $chat and  check_role("chat") > 0) {
$startstring .=  $tab_notsel[0].$tab_alt;
$startstring .= " <iframe src=\"../layout/$skin/inviter.php\" style=\"display:none\"></iframe>";
$startstring .= " <table id=\"online\" align=\"right\"> ";
$startstring .= " <tr><td>";
$startstring .= "<form action='../chat/chat.php' method='post' name='frm' style=\"background-color:transparent; margin:0; padding:0; border:0px\">\n";
$startstring .= "<input type=hidden name='content' value=\"$user_loginname has entered the room!\">\n";
$startstring .= "<input type=hidden name=mode value=write>\n";
$startstring .= "<input type=hidden name=PHPSESSID value=$PHPSESSID></form> \n";


$startstring .= " <form name=\"invite\" method=\"POST\" action=\"$thm_page\"> \n";
$startstring .= " <select name=\"selinvite\" onchange='document.invite.submit()' size=1>";

  // read file alive and put into array $lines
  if (file_exists($invitefile)) {
    $lines = file($invitefile);
    // scan all current users online
    while ($lines[$i]) {
      // extract  names and record time
      $li = explode(":", $lines[$i]);
      $time = time();  // take current time
      
      // exclude old records (probably crap from older sessions)
      if (($li[1] + $alive/1000 + 5) > $time) {
        // entry for this user found?
        if ($li[0] == ($user_loginname)) {
	      if($invited=="reset") {
		    $lines2[] = $li[0].":".$time.":".$user_group.":";
	      }
	      else if ($stopdup!=1)  {
          	// take the record into the new array with the current time
          	$lines2[] = $li[0].":".$time.":".$user_group.":".$li[3];
          	$drin = 1;
      	  }
      	  $stopdup = 1;
        }
        
        	// invite?
        	else if ($li[0] == $invited) {
          		// take the record into the new array with the current time
          		$lines2[] = $li[0].":".$time.":".$user_group.":<script>var URL=top.location.href; var urlSplit=URL.split('?'); var accept=confirm('$o_chat Invitation from ".$user_loginname." \\n Click OK to Accept?'); if (accept) { document.invite.submit(); setTimeout(\"parent.location.href=urlSplit[0]+'?module=chat$sid'\", 10); } else { document.invite.submit(); } </script>";
          		$redirect = 1;
        	}
    	
        // take current records of other users into the new array
        else { $lines2[] = $li[0].":".$li[1].":".$li[2].":".$li[3]; }
      }    
      $i++;
    }
  }
  //
  if (!$drin ) { $lines2[] = $user_loginname.":".$time.":".$user_group.":"; }
  $fp = fopen($invitefile, "w+");
  flock($fp, 2);
  
  $peeps .= "<option selected value=\"reset\">Invite</option>";
  
  for ($i=0; $i < count($lines2); $i++) {
    $line = "$lines2[$i]\n";
    $fw = fwrite($fp,$line);
    $li = explode(":",$line);

    if( ($user_group==$li[2]) && ($li[0] != $user_loginname) ) {
    	// online users
		if($alternate<>0) { $peeps .= "<option style=\"background-color:#CCCCCC; color:blue\" value=\"".$li[0]."\">". $li[0]; $alternate=0; }
		else { $peeps .= "<option style=\"background-color:#0066CC; color:#FFFFFF\" value=\"".$li[0]."\">". $li[0]; $alternate=1; }		
	}
	if($li[0] == $user_loginname) { $strInvite = $li[3]; }
  }
  fclose($fp);

if($redirect==1) {
	$startstring .= "<script> document.frm.submit(); parent.location.href='../index.php?module=chat$sid' </script> \n";
}

$startstring .= $peeps ."</select></form>";
$startstring .= " $strInvite \n";
//$startstring .= " $strInvite <script language=\"JavaScript\"> var myTimeout = null; function thm_timer() { myTimeout = setTimeout(\"document.location.href=document.location.href\",$freq); } thm_timer(); </script>\n";
$startstring .= "</td></tr></table>". $tab_notsel[4].$tab_notsel[5]." \n";
}
}// End of Who's online?	
// ************* END CUSTOM_FUNCTIONS SECTION
?>