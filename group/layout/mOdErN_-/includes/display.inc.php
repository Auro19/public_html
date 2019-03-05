<?php
// ************* BEGIN CUSTOM_FUNCTIONS SECTION

// deliver a special theme array with available modules	
include_once("../layout/$skin/includes/show_modules.inc.php");


// BEGIN FROM O.PHP
// tab div contains bookmarks and votes
if (($lesezeichen and check_role("bookmarks") > 0) or ($votum and check_role("votum") > 0)) { 
  $mod_arr[] = array("options","href='../index.php?module=options$sid' target=$target>",$o_div);
}  
// settings will appear in all cases
$mod_arr[] = array("settings","href='../index.php?module=settings$sid' target=$target>",$o_settings);
// now search for addons and add them to the list
add_addons();

// now the help routine
if (ereg($langua,"de|es|nl|fr|tr|zh|fi")) { $mod_arr[] = array("help","href='".$doc."/help.php' target='_blank'>","?"); }
else  { $mod_arr[] = array("help","href='$help_docs' target='_blank'>",$admin_text4); }

                                                                                                                                           
// ... and the copyright messages ...
if (ereg($langua,"cz|de|es|fi|fr|nl|ro|si|tr|zh")) { $mod_arr[] = array("copyright","href='$doc/copy.html' target='_blank'>","&copy;"); }
else  { $mod_arr[] = array("copyright","href='../help/en/copy.html' target='_blank'>","&copy;"); }


// then the logout
$mod_arr[] = array("logout","href='../index.php?module=logout$sid' target=$target>",$o_logout);

// admin tab
if (eregi("a",$user_access)) $mod_arr[] =  array("admin","href='../index.php?module=admin$sid' target=$target>","admin");


// ************* BEGIN STARTSTRING SECTION
// Random Pastel Colors
//$startstring .= " <script LANGUAGE=\"JavaScript\" TYPE=\"text/javascript\" SRC=\"../layout/$skin/includes/pastel.js\"></SCRIPT>\n";

// Table
if ($chatinv !=0 and $chat and check_role("chat") > 0) {
$startstring .= " <table class='tLinks' cellpadding=\"0\" cellspacing=\"0\"> \n";
}
else {
$startstring .= " <table class='tLinks' border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> \n";
}

// ************* END STARTSTRING SECTION
// ************* BEGIN HIDE_ORIGINAL_CELLS SECTION
// strings for each tab element if the tab is selected
$tab_sel[0] = "";
$tab_sel[1] = "<tr><td>";
$tab_sel[2] = "<a class=";
$tab_sel[3] = "</a>";
$tab_sel[4] = "</td></tr>";
$tab_sel[5] = "";
// strings for each tab element if the tab is not selected
$tab_notsel[0] = "";
$tab_notsel[1] = "<tr><td>";
$tab_notsel[2] = "<a class=";
$tab_notsel[3] = "</a>";
$tab_notsel[4] = "</td></tr>";
$tab_notsel[5] = "";

$tab_alt = "<tr><td $groupstyle nowrap>";
$tab_alt_sel = "<tr><td class=\"selected_top";
$tab_alt_notsel = "<tr><td class=\"notselected_top\" style=\"vertical-align:middle";



// ************* END HIDE_ORIGINAL_CELLS SECTION

// ************* BEGIN DISPLAY_NEW_CELLS SECTION
$startstringFinal .= " </td></tr></table> \n";


// ************* BEGIN DISPLAY_NEW_CELLS SECTION
// loop over all modules and convert them into tabs
foreach ($mod_arr as $mod) {
  // module is selected
  if ($module == $mod[0] or ($module == 'addon' and $mode2 == $mod[0])) {
    $select = "\"selected\" ";
    // icon tab
    if ($tab_type == 1) { $startstring .=  $tab_sel[0].$tab_sel[1].$tab_sel[2].$select.$mod[1]."&nbsp;<img class=\"Coudriet_img\" src='../layout/$skin/img/".$mod[0].".png' alt='".$mod[2]."' border=0>".$tab_sel[3].$tab_sel[4].$tab_sel[5]."\n"; }
    // icon and text tab
    elseif ($tab_type == 2) { $startstring .=  $tab_sel[0].$tab_sel[1].$tab_sel[2].$select.$mod[1]."&nbsp;<img class=\"Coudriet_img\" src='../layout/$skin/img/".$mod[0].".png' alt='".$mod[2]."' border=0>&nbsp;&nbsp;".$mod[2].$tab_sel[3].$tab_sel[4].$tab_sel[5]."\n"; }
    // default: text tab
    else { $startstring .=  $tab_sel[0].$tab_sel[1].$tab_sel[2].$select.$mod[1].$mod[2].$tab_sel[3].$tab_sel[4].$tab_sel[5]."\n"; }
  }
  // module is not selected
  else {
    $select = "\"notselected\" ";
    // icon tab
    if ($tab_type == 1) { $startstring .=  $tab_notsel[0].$tab_notsel[1].$tab_notsel[2].$select.$mod[1]."&nbsp;<img class=\"Coudriet_img\" src='../layout/$skin/img/".$mod[0].".png' alt='".$mod[2]."' border=0>".$tab_notsel[3].$tab_notsel[4].$tab_notsel[5]."\n"; }
    // icon and text tab
    elseif ($tab_type == 2) { $startstring .=  $tab_notsel[0].$tab_notsel[1].$tab_notsel[2].$select.$mod[1]."&nbsp;<img class=\"Coudriet_img\" src='../layout/$skin/img/".$mod[0].".png' alt='".$mod[2]."' border=0>&nbsp;&nbsp;".$mod[2].$tab_notsel[3].$tab_notsel[4].$tab_notsel[5]."\n"; }
    // default: text tab
    else { $startstring .=  $tab_notsel[0].$tab_notsel[1].$tab_notsel[2].$select.$mod[1].$mod[2].$tab_notsel[3].$tab_notsel[4].$tab_notsel[5]."\n"; }
 
  }
}

// chat inviter
chat_invite();	
	
// timecard login buttons
if ($timecard and $nav_timecard and check_role("timecard") > 1) {
  $startstring .= $tab_notsel[0].$tab_notsel[1].$tab_notsel[2].$select;
  // include snippet with the buttons for login/logout into timecard
  Compact_show_timecard_button();
  $startstring .= $tab_notsel[4].$tab_notsel[5];
}

// search box
if ($nav_searchbox) {
  $startstring .= $tab_notsel[0].$tab_notsel[1];
  $startstring .= "<form action='../index.php' target=$target> \n";
  $startstring .= "<input type=hidden name=module value=search> \n";
  if (SID) $startstring .= "<input type=hidden name=PHPSESSID value=$PHPSESSID> \n"; 
  // special input box for nn4
  if (eregi("4.7|4.6|4.5", $HTTP_USER_AGENT)) { $startstring .= "<input type=text name=searchterm size=8 value=''> \n"; }
  else { $startstring .= "<input type=text name=searchterm size=6 value=''> \n"; }
  $startstring .= "<input type=hidden name=gebiet value=all> \n";   
  $startstring .= $tab_notsel[4].$tab_notsel[5];
}
                
// last action: display the group select box
if ($groups) { group_box(); }

$startstring .= $startstringFinal;
// ************* END DISPLAY_NEW_CELLS SECTION

$startstring .= "<span id='menu' class='menu'><img src='../layout/$skin/img/menu.gif'></span><script>document.getElementById(\"menu\").style.backgroundColor=document.body.style.backgroundColor;</script>";

// ************* END CUSTOM_FUNCTIONS SECTION
?>