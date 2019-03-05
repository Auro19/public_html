<?php
// Content Management System module for PHProjekt (CMS4P).
// Copyright ©2002, 2003, 2004 by Mario A. Valdez-Ramirez
// http://www.mariovaldez.net/

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

// You can contact Mario A. Valdez-Ramirez by email 
// at mario@mariovaldez.org or paper mail at 
// Olmos 809, San Nicolas, NL. 66495, Mexico.


// Set error reporting level.
error_reporting(E_ALL & ~E_NOTICE);

// Set code version (not the config version).
$cm_codebaseversion = "0.6.0b12";
$cm_codebasedetails = array (0, 6, 0, "b", "12");

// Set paths.
$cm_langpath = $path_pre."cm/lang";
$cm_libpath = $path_pre."cm/lib";
$cm_docpath = $path_pre."cm/doc";
$cm_skinpath = $path_pre."cm/layout";
$cm_imgpath = $path_pre."cm/layout";
$cm_cfgpath = $path_pre."cm/cm_config.inc.php";

// Set chronometer.
$cm_timestart = fcm_getmicrotime();

// Load config file.
if (is_readable ("$cm_cfgpath")) include ("$cm_cfgpath");
else { die ("panic: cm_config.inc.php doesn't exist!! Did you backup it after installation? ..."); }
$cm_icon_set = 1;  // Override icon set.

// set charset
if     (eregi('pl|cz|hu|si',$langua)) { $lcfg="iso-8859-2"; }
elseif ($langua=="jp") { $lcfg = "euc-jp"; }
elseif ($langua=="sk") { $lcfg = "iso-8859-2"; }    // previously windows-1250
elseif ($langua=="ru") { $lcfg = "iso-8859-5"; }    // previously windows-1251
//elseif ($langua=="ru") { $lcfg = "koi8-r"; }      // Russian alternative
elseif ($langua=="tw") { $lcfg = "big5"; }
elseif ($langua=="zh") { $lcfg = "gb2312"; }
else { $lcfg="iso-8859-1"; } 
if ($lcfg <> "") { $lang_cfg = "<meta http-equiv='Content-Type' content='text/html; charset=$lcfg'>"; }

// Load language strings file.
$cm_languages = array ("es" => 1, "en" => 1, "nl" => 1, "de" => 1, "fr" => 1, "ct" => 1, "br" => 1);
if (array_key_exists (strtolower ($langua), $cm_languages)) {
	$cm_langua = strtolower ($langua);
	include("$cm_langpath/$cm_langua.inc.php");
}
else { $cm_langua = "en"; include("$cm_langpath/en.inc.php"); }

// Check if we are in safe-mode...
if (ini_get ("safe_mode")) {
  $cm_safemode = true;
}
else {
  $cm_safemode = false;
}

// Define User-Agent string...
$cm_tmpsoftwarename = explode (" ", $HTTP_SERVER_VARS["SERVER_SOFTWARE"]);
$cm_tmposname = explode (" ", php_uname ());
$cm_mod_useragent = "User-Agent: CMS4P/$cm_codebaseversion Phprojekt/$version " . $cm_tmpsoftwarename[0] . " " . ucwords ($db_type) . "/unknown " . $cm_tmposname[0];
$cm_mod_id = "CMS4P/$cm_codebaseversion Phprojekt/$version " . $cm_tmpsoftwarename[0] . " " . ucwords ($db_type) . "/unknown " . $cm_tmposname[0];

// Find out if there is a db prefix.
if (defined ("DB_PREFIX")) {
  define ("CM_PP_PREFIX", DB_PREFIX);
  if ($cm_enable_dbprefix) {
    define ("CM_DB_PREFIX", DB_PREFIX);
  }
  else {
    define ("CM_DB_PREFIX", "");
  }
}
else {
  define ("CM_PP_PREFIX", "");
  define ("CM_DB_PREFIX", "");
}

// Include the constraints matrix functions.
include_once ($path_pre . "cm/cm_constraints.inc.php");

// Get the user-agent...
$cm_http_useragent = $_SERVER["HTTP_USER_AGENT"];
if (!$cm_http_useragent) {
  $cm_http_useragent = $HTTP_SERVER_VARS["HTTP_USER_AGENT"];
  if (!$cm_http_useragent) {
    $cm_http_useragent = $_ENV["HTTP_USER_AGENT"];
    if (!$cm_http_useragent) {
      $cm_http_useragent = getenv("HTTP_USER_AGENT");
    }
    else $cm_http_useragent = "";
  }
}
$cm_php_self = $_SERVER["PHP_SELF"];
if (!$cm_php_self) {
  $cm_php_self = $HTTP_SERVER_VARS["PHP_SELF"];
  if (!$cm_php_self) {
    $cm_php_self = $_ENV["PHP_SELF"];
    if (!$cm_php_self) {
      $cm_php_self = getenv("PHP_SELF");
    }
    else $cm_php_self = "";
  }
}
$cm_server_name = $_SERVER["SERVER_NAME"];
if (!$cm_server_name) {
  $cm_server_name = $HTTP_SERVER_VARS["SERVER_NAME"];
  if (!$cm_server_name) {
    $cm_server_name = $_ENV["SERVER_NAME"];
    if (!$cm_server_name) {
      $cm_server_name = getenv("SERVER_NAME");
    }
    else $cm_server_name = "";
  }
}

// Load mimetypes.
include_once ($path_pre . "cm/cm_mimetypes.inc.php");

// Set current skin.
if (($skin) && ($skin != "default") && (!$cm_force_skin)) {
  $cm_skin = $skin;
}
elseif ($cm_default_skin) {
  $cm_skin = $cm_default_skin;
}
else {
  $cm_skin = "cm_gnome";
}

// Set image location.
if (($cm_skin) && is_readable ("$cm_skinpath/$cm_skin")) {
  include_once ("$cm_skinpath/$cm_skin/cm_filetypes.inc.php");
  include_once ("$cm_skinpath/$cm_skin/cm_images.inc.php");
}
else {
  include_once ("$cm_skinpath/cm_gnome/cm_filetypes.inc.php");
  include_once ("$cm_skinpath/cm_gnome/cm_images.inc.php");
}

// Set CSS file.
if (($cm_skin) && is_readable ($path_pre . "layout/$cm_skin/css/cm-style.css")) {
  $css_style = $path_pre . "layout/$cm_skin/css/cm-style.css";
  $css_txt_style = $path_pre . "layout/$cm_skin/css/cm-styletxt.css";
}
elseif (($cm_skin) && is_readable ("$cm_skinpath/$cm_skin/cm-style.css")) {
  $css_style = "$cm_skinpath/$cm_skin/cm-style.css";
  $css_txt_style = "$cm_skinpath/$cm_skin/cm-styletxt.css";
}
else {
  $css_style = "$cm_skinpath/cm_gnome/cm-style.css";
  $css_txt_style = "$cm_skinpath/cm_gnome/cm-styletxt.css";
}
$css_pngfix = $path_pre . "cm/pngbehavior.css";

/******************************** Paste contents below this line **************************************/
// Define default HTML header, footer and tabs coding.
 // Altered by Mark Coudriet for Floating Menus
  if (strpos($skin,'_-')==true) {
	$cm_html_header = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"><html lang=\"$langua\" $dir_tag>\n";
  }
  else {
 	$cm_html_header = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"><html lang=\"$langua\" $dir_tag>\n"; 
  }
 // End
$cm_html_header .= "<head>\n<title>{$cm_text["contentmanagement"]}</title>
  <link rel=stylesheet type=\"text/css\" href=\"$css_style\">
  <meta name=\"Generator\" content=\"$cm_mod_id\">\n";
if ($cm_enable_pngfix) $cm_html_header .= "<link rel=stylesheet type=\"text/css\" href=\"$css_pngfix\">\n";
$cm_html_header .= "$lang_cfg\n</head>\n
<body bgcolor=\"$bgcolor3\" leftmargin=\"20\" topmargin=\"20\" rightmargin=\"20\" bottommargin=\"20\">\n";
  
 // Added by Mark Coudriet for Floating Menus
  if (strpos($skin,'_-')==true) { 	
	    include_once ($path_pre."layout/".$skin."/includes/bodytag.inc.php");
  }  
 // End
/******************************** End of Paste ******************************************************/
 
$cm_html_footer = "<table align=\"right\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n
  <tr><td class=\"footertext\">$user_kurz ($langua, $cm_langua, $lcfg): $cm_currentversion</td></tr></table>\n</body></html>\n";
$cm_print_header = "<html><head>\n<title>{$cm_text["contentmanagement"]}</title>
  <link rel=stylesheet type=\"text/css\" href=\"$css_txt_style\">\n$lang_cfg\n</head>\n
  \n<body>\n";
$cm_print_footer = "<p class=\"footertext\">$user_kurz ($langua, $cm_langua, $lcfg): $cm_currentversion</p>\n</body></html>\n";
$cm_nav_mouseover="";

// Legacy definitions for PP3.3 navigation.
$cm_nav_pre1="<td class=\"cms\"><img src='$img_path/links2.gif' border='0'></td>";
$cm_nav_pre2="<td class=\"cms\"><img src='$img_path/links.gif' border='0'></td>";
$cm_nav_post1="<td class=\"cms\"><img src='$img_path/rechts2.gif' border='0'>&nbsp;</td>";
$cm_nav_post2="<td class=\"cms\"><img src='$img_path/rechts.gif' border='0'>&nbsp;</td>";
$cm_nav_slicer="";

// Define some constants.
define ("CM_MSGSTYLE_WARNING", 1);
define ("CM_MSGSTYLE_ERROR", 2);
define ("CM_MSGSTYLE_INFORMATION", 3);
define ("CM_MSGSTYLE_QUESTION", 4);
define ("CM_HITTYPE_PAGE", "p");
define ("CM_HITTYPE_FILE", "f");
define ("CM_HITTYPE_ELINK", "l");
define ("CM_HITTYPE_SYND", "s");
define ("CM_HITTYPE_CONTENTLESS", "b");
define ("CM_HITTYPE_ANNOUNCE", "w");
define ("CM_MIN_RATE", 1);  //This must be higher than 0
define ("CM_MAX_RATE", 5);
define ("CM_APPLOG_ADD_ROOT", 1);
define ("CM_APPLOG_ADD_PAGE", 2);
define ("CM_APPLOG_DEL_PAGE", 3);
define ("CM_APPLOG_EDIT_PAGE", 4);
define ("CM_APPLOG_POST_COMMENT", 5);
define ("CM_APPLOG_ERROR", 6);
define ("CM_APPLOG_GET_SYND", 7);
define ("CM_APPLOG_FILE", 8);
define ("CM_APPLOG_EDIT_SECURITY", 10);
define ("CM_APPLOG_INFO", 11);
define ("CM_APPLOG_CHECKER", 12);
define ("CM_APPLOG_RATE_PAGE", 13);
define ("CM_APPLOG_EDIT_SYND", 14);
define ("CM_MAX_LOGO_SIZE", 20480);
define ("CM_DEFAULT_MARKUP", "#SHORTINDEX#");
define ("CM_MAX_SYNDLEN", 60);
define ("CM_DEBUGLOG_FILENAME", "cms.log");



function fcm_getmicrotime () {
  list ($usec, $sec) = explode (" ", microtime ());
  return ((float)$usec + (float)$sec);
}


function fcm_dbglog ($cm_dbgmod) {
  $cm_dbglogf = fopen (CM_DEBUGLOG_FILENAME, 'a');
  fwrite ($cm_dbglogf, $cm_dbgmod . "\n");
  fclose ($cm_dbglogf);
}


// fcm_user_groups
// Build an array of the group the user belongs to.
// If the setup is groupless, an empty array is returned.
function fcm_user_groups ($cm_username) {
  global $groups;
  $cm_groups = array ();
  if ($groups) {
    $cm_row_count = 0;
    $result2 = db_query ("select ID, kurz from " . CM_PP_PREFIX . "users where kurz = '$cm_username'") or db_die();
    $row2 = db_fetch_row ($result2);
    $result1 = db_query ("select user_ID, " . CM_PP_PREFIX . "gruppen.kurz from " . CM_PP_PREFIX . "grup_user, " . CM_PP_PREFIX . "gruppen where " . CM_PP_PREFIX . "grup_user.user_ID = '$row2[0]' and " . CM_PP_PREFIX . "grup_user.grup_ID = " . CM_PP_PREFIX . "gruppen.ID") or db_die();
    while ($row1 = db_fetch_row ($result1)) {
      $cm_groups[$cm_row_count] = $row1[1];
      $cm_row_count++;
    }
  }
  return ($cm_groups);
};


// fcm_access_sqldef
// Build a SQL string of conditions to restrict the query to the groups
// the user belongs to.
// This string is concatenated to the SQL query after all other conditions.
function fcm_access_sqldef ($cm_username) {
  $cm_access_def = "";
  if (!fcm_check_anyglobal (CM_SEC_DISPLA, $cm_username, CM_SEC_SDIR)) {
    $cm_user_groups = fcm_user_groups ($cm_username);
    foreach ($cm_user_groups as $cm_cur_acc_group) {
      $cm_access_def .= " or cmdb_viewer_group = '$cm_cur_acc_group'";
    }
    if ($cm_access_def) {
      $cm_access_def = " and (" . substr ($cm_access_def, 4) . " or cmdb_viewer_group = '')";
    }
  }
  return ($cm_access_def);
};


// fcm_doc_summary
// Displays the summary at the beginning of all pages.
// You must already have the information, this function only display data,
// don't search for it.
function fcm_doc_summary ($cm_uauthor, $cm_uowner, $cm_gviewer, $cm_dcreation, $cm_dupdate, $cm_title, $cm_keywords, $cm_summary, $cm_totalvisits, $cm_updatevisits, $cm_rating) {
  global $cm_text, $cm_imgpath;
  echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"docdataborder\">\n";
  echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"5\">\n";
  echo "<tr><td><h3 class=\"docdatatitle\">$cm_title</h3>";
  echo "</td><td class=\"docdatabody\" valign=\"top\" rowspan=\"2\" nowrap>";
  echo "<strong>{$cm_text["owner"]}:</strong> " . fcm_unspecialchars ($cm_uowner) . "<br>";
  echo "<strong>{$cm_text["visibleto"]}:</strong> " . fcm_unspecialchars ($cm_gviewer) . "<br>";
  echo "<strong>{$cm_text["update"]}:</strong> " . substr ($cm_dupdate, 0, 10) . "<br>";
  echo "<strong>{$cm_text["visits"]}:</strong> " . $cm_totalvisits . " / " . $cm_updatevisits . "<br>";
  if ($cm_rating) {
    echo "<strong>{$cm_text["averagerating"]}:</strong> " . str_repeat ("<img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["user_ratestar"]}\" width=\"8\" height=\"8\" border=\"0\" alt=\"*\">", $cm_rating) . " (" . round ($cm_rating, 1) . ")";
  }
  echo "</td></tr>\n";
  echo "<tr><td class=\"docdatabody\">";
  if ($cm_summary) {
    echo "$cm_summary<br>";
  }
  echo "</td></tr>";
  echo "</table>\n";
  echo "</td></tr></table>\n";
  echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"cms\" height=\"5\"><img src=\"$cm_imgpath/t.gif\" width=\"1\" height=\"5\" border=\"0\" alt=\"\"></td></tr></table>\n";
} 


// fcm_doc_txtsummary
// Displays the summary at the beginning of all pages.
// You must already have the information, this function only display data,
// don't search for it. This is the printable version.
function fcm_doc_txtsummary ($cm_uauthor, $cm_uowner, $cm_gviewer, $cm_dcreation, $cm_dupdate, $cm_title, $cm_keywords, $cm_summary, $cm_totalvisits, $cm_updatevisits, $cm_rating) {
  global $cm_text, $cm_imgpath;
  echo "<h3 class=\"docdatatitle\">$cm_title</h3>";
  echo "<p class=\"docdatabody\"><strong>{$cm_text["owner"]}:</strong> " . fcm_unspecialchars ($cm_uowner) . "<br>";
  echo "<strong>{$cm_text["visibleto"]}:</strong> " . fcm_unspecialchars ($cm_gviewer) . "<br>";
  echo "<strong>{$cm_text["update"]}:</strong> " . substr ($cm_dupdate, 0, 10) . "<br>";
  echo "<strong>{$cm_text["visits"]}:</strong> " . $cm_totalvisits . " / " . $cm_updatevisits . "<br>";
  if ($cm_rating) {
  echo "<strong>{$cm_text["averagerating"]}:</strong> " . str_repeat ("*", $cm_rating) . " (" . round ($cm_rating, 1) . ")";
  }
  if ($cm_summary) {
    echo "<br>$cm_summary";
  }
  echo "</p>";
} 


// fcm_bread_crumbs
// Generates the bread crumbs navigation links for a given page/directory.
function fcm_bread_crumbs ($cm_path, $cm_crumb_separator, $cm_crumb_active) {
  global $cm_text;
  $cm_crumb_separator = fcm_htmlentity ($cm_crumb_separator);
  if ($cm_crumb_active) {
    $cm_breadcrumbs_str = "<A class=\"cms\" HREF=\"display.php?cm_path=\">{$cm_text["root"]}</A>";
  }
  else {
    $cm_breadcrumbs_str = $cm_text["root"];
  }
  $cm_displaynodes = explode ("/", substr ($cm_path, 1));
  $cm_displaypath = "";
  foreach ($cm_displaynodes as $cm_path_node) {
    $cm_displaypath .= "/" . $cm_path_node;
    $result1 = db_query("select cmdb_directory, cmdb_short_title, cmdb_abstract from " . CM_DB_PREFIX . "content3 where cmdb_directory like '$cm_displaypath'") or db_die();
    $row1 = db_fetch_row($result1);
    if ($row1[1]) {
      if ($cm_crumb_active) {
        $cm_breadcrumbs_str .= " $cm_crumb_separator <A class=\"cms\" HREF=\"display.php?cm_path=$cm_displaypath\" TITLE=\"" . substr ($row1[2], 0, 70) . "...\">$row1[1]</A>";
      }
      else {
        $cm_breadcrumbs_str .= " $cm_crumb_separator $row1[1]";
      }
    }
    else {
      if ($cm_crumb_active) {
        $cm_breadcrumbs_str .= " $cm_crumb_separator <A class=\"cms\" HREF=\"display.php?cm_path=$cm_displaypath\" TITLE=\"" . substr ($row1[2], 0, 70) . "...\">$cm_path_node</A>";
      }
      else {
        $cm_breadcrumbs_str .= " $cm_crumb_separator $cm_path_node";
      }
    }
  }
  return ($cm_breadcrumbs_str);
}


// fcm_title_nav2
// Displays the navigation bars. You must already have the information, this
// function won't search for it. You must call it with the path of the page, and
// permissions for current user in the current location. Usually you can get these
// values from the array returned from fcm_check_validops function.
function fcm_title_nav2 ($cm_path, $cm_cancreate = false, $cm_candelete = false, $cm_canedit = false, $cm_canview = false, $cm_canpost = false, $cm_canprint = false, $cm_issuperuser = false, $cm_canrate = false) {
  global $cm_text, $cm_imgpath, $cm_control_iconwidth, $cm_control_iconheight, $cm_image_filename, $cm_icon_set, $cm_text_icons;
  echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"5\"><tr><td class=\"navborder\">\n";
  echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\n";
  echo "<tr><td class=\"navbody\">&nbsp;";
  echo fcm_bread_crumbs ($cm_path, ">", true);
  echo "</td><td class=\"navbody\" align=\"right\">";
  if ($cm_text_icons) {
    if ($cm_issuperuser) {
      echo "&nbsp;<A class=\"cms\" HREF=\"console.php\">{$cm_text["enterconsole"]}</A>&nbsp;\n";
    }
    if ($cm_canprint) {
      echo "&nbsp;<A class=\"cms\" HREF=\"print.php?cm_path=$cm_path\" TARGET=\"_blank\">{$cm_text["printablepage"]}</A>&nbsp;\n";
    }
    echo "&nbsp;<A class=\"cms\" HREF=\"listing.php?cm_path=$cm_path&cm_fdn=0&cm_hdet=1\">{$cm_text["listdirs"]}</A>&nbsp;\n";
    echo "&nbsp;<A class=\"cms\" HREF=\"search.php?cm_path=$cm_path\">{$cm_text["search"]}</A>&nbsp;\n";
    echo "&nbsp;<A class=\"cms\" HREF=\"statshits.php?cm_path=$cm_path\">{$cm_text["stats"]}</A>&nbsp;\n";
    if ($cm_canpost) {
      echo "&nbsp;<A class=\"cms\" HREF=\"usercomment.php?cm_path=$cm_path\">{$cm_text["postcomment"]}</A>&nbsp;\n";
    }
    if ($cm_canrate) {
      echo "&nbsp;<A class=\"cms\" HREF=\"userrating.php?cm_path=$cm_path\">{$cm_text["rateabout"]}</A>&nbsp;\n";
    }
    echo "</td></tr>\n";
    echo "<tr><td class=\"navbody\" align=\"right\" colspan=\"2\">\n";
    if ($cm_canedit) {
      echo "&nbsp;<A class=\"cms\" HREF=\"edit.php?cm_path=$cm_path\">{$cm_text["editdoc"]}</A>&nbsp;\n";
      echo "&nbsp;<A class=\"cms\" HREF=\"fileman.php?cm_path=$cm_path\">{$cm_text["managefiles"]}</A>&nbsp;\n";
    }
    if ($cm_candelete) {
      echo "&nbsp;<A class=\"cms\" HREF=\"delete.php?cm_path=$cm_path\">{$cm_text["deletedoc"]}</A>&nbsp;\n";
    }
    if ($cm_cancreate) {
      echo "&nbsp;<A class=\"cms\" HREF=\"create.php?cm_path=$cm_path\">{$cm_text["createdoc"]}</A>&nbsp;\n";
    }
  }
  else {
    if ($cm_issuperuser) {
      echo "&nbsp;<A class=\"cms\" HREF=\"console.php\"><img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["nav_console"]}\" width=\"$cm_control_iconwidth\" height=\"$cm_control_iconheight\" border=\"0\" alt=\"{$cm_text["enterconsole"]}\" title=\"{$cm_text["enterconsole"]}\" class=\"pngimg\"></A>&nbsp;\n";
    }
    if ($cm_canprint) {
      echo "&nbsp;<A class=\"cms\" HREF=\"print.php?cm_path=$cm_path\" TARGET=\"_blank\"><img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["nav_print"]}\" width=\"$cm_control_iconwidth\" height=\"$cm_control_iconheight\" border=\"0\" alt=\"{$cm_text["printablepage"]}\" title=\"{$cm_text["printablepage"]}\" class=\"pngimg\"></A>&nbsp;\n";
    }
    echo "&nbsp;<A class=\"cms\" HREF=\"listing.php?cm_path=$cm_path&cm_fdn=0&cm_hdet=1\"><img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["nav_dirlist"]}\" width=\"$cm_control_iconwidth\" height=\"$cm_control_iconheight\" border=\"0\" alt=\"{$cm_text["listdirs"]}\" title=\"{$cm_text["listdirs"]}\" class=\"pngimg\"></A>&nbsp;\n";
    echo "&nbsp;<A class=\"cms\" HREF=\"search.php?cm_path=$cm_path\"><img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["nav_search"]}\" width=\"$cm_control_iconwidth\" height=\"$cm_control_iconheight\" border=\"0\" alt=\"{$cm_text["search"]}\" title=\"{$cm_text["search"]}\" class=\"pngimg\"></A>&nbsp;\n";
    echo "&nbsp;<A class=\"cms\" HREF=\"statshits.php?cm_path=$cm_path\"><img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["nav_stats"]}\" width=\"$cm_control_iconwidth\" height=\"$cm_control_iconheight\" border=\"0\" alt=\"{$cm_text["stats"]}\" title=\"{$cm_text["stats"]}\" class=\"pngimg\"></A>&nbsp;\n";
    if ($cm_canpost) {
      echo "&nbsp;<A class=\"cms\" HREF=\"usercomment.php?cm_path=$cm_path\"><img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["nav_comments"]}\" width=\"$cm_control_iconwidth\" height=\"$cm_control_iconheight\" border=\"0\" alt=\"{$cm_text["postcomment"]}\" title=\"{$cm_text["postcomment"]}\" class=\"pngimg\"></A>&nbsp;\n";
    }
    if ($cm_canrate) {
      echo "&nbsp;<A class=\"cms\" HREF=\"userrating.php?cm_path=$cm_path\"><img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["nav_rate"]}\" width=\"$cm_control_iconwidth\" height=\"$cm_control_iconheight\" border=\"0\" alt=\"{$cm_text["rateabout"]}\" title=\"{$cm_text["rateabout"]}\" class=\"pngimg\"></A>&nbsp;\n";
    }
    echo "</td></tr>\n";
    echo "<tr><td class=\"navbody\" align=\"right\" colspan=\"2\">\n";
    if ($cm_canedit) {
      echo "&nbsp;<A class=\"cms\" HREF=\"edit.php?cm_path=$cm_path\"><img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["nav_edit"]}\" width=\"$cm_control_iconwidth\" height=\"$cm_control_iconheight\" border=\"0\" alt=\"{$cm_text["editdoc"]}\" title=\"{$cm_text["editdoc"]}\" class=\"pngimg\"></A>&nbsp;\n";
      echo "&nbsp;<A class=\"cms\" HREF=\"fileman.php?cm_path=$cm_path\"><img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["nav_fileman"]}\" width=\"$cm_control_iconwidth\" height=\"$cm_control_iconheight\" border=\"0\" alt=\"{$cm_text["managefiles"]}\" title=\"{$cm_text["managefiles"]}\" class=\"pngimg\"></A>&nbsp;\n";
    }
    if ($cm_candelete) {
      echo "&nbsp;<A class=\"cms\" HREF=\"delete.php?cm_path=$cm_path\"><img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["nav_delete"]}\" width=\"$cm_control_iconwidth\" height=\"$cm_control_iconheight\" border=\"0\" alt=\"{$cm_text["deletedoc"]}\" title=\"{$cm_text["deletedoc"]}\" class=\"pngimg\"></A>&nbsp;\n";
    }
    if ($cm_cancreate) {
      echo "&nbsp;<A class=\"cms\" HREF=\"create.php?cm_path=$cm_path\"><img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["nav_new"]}\" width=\"$cm_control_iconwidth\" height=\"$cm_control_iconheight\" border=\"0\" alt=\"{$cm_text["createdoc"]}\" title=\"{$cm_text["createdoc"]}\" class=\"pngimg\"></A>&nbsp;\n";
    }
  }
  echo "</td></tr>\n";
  echo "</table>\n";
  echo "</td></tr></table>\n";
  echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"cms\" height=\"5\"><img src=\"$cm_imgpath/t.gif\" width=\"1\" height=\"5\" border=\"0\" alt=\"\"></td></tr></table>\n";
};


// fcm_articlelist_box
// Displays the title and summary of a page, usually for the index listings.
// You must have already the information, this function won't search it.
// You must call it with the path, title, abstract, date (usually last update),
// total comments, total visits and if the page is a header (usually only for
// the first level directories).
function fcm_articlelist_box ($cm_path, $cm_boxtitle, $cm_boxabstract, $cm_boxdate, $cm_isheader, $cm_comments = 0, $cm_visits = 0, $cm_rating = 0, $cm_iscontentless = false, $cm_isannounce = false, $cm_logoimage = "", $cm_show_crumbs = false) {
  global $cm_text, $cm_imgpath, $cm_doclogo_width, $cm_doclogo_height, $cm_icon_set, $cm_image_filename;
  if ($cm_isannounce) {
    echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"doclist3border\">\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"5\"><tr><td valign=\"top\" class=\"doclist3body\">\n";
  }
  elseif ($cm_isheader) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"cms\" height=\"5\"><img src=\"$cm_imgpath/t.gif\" width=\"1\" height=\"5\" border=\"0\" alt=\"\"></td></tr></table>\n";
    echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"doclist1border\">\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"5\"><tr><td valign=\"top\" class=\"doclist1body\">\n";
  }
  else {
    echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"doclist2border\">\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"5\"><tr><td valign=\"top\" class=\"doclist2body\">\n";
  }
  if ($cm_logoimage) {
    $cm_logo_status = fcm_check_logoimage ($cm_path, $cm_logoimage);
    if (!(($cm_logo_status[0] & 16) || ($cm_logo_status[0] & 64))) {
      if ($cm_iscontentless) {
        echo "<IMG SRC=\"getfile.php?cm_path=$cm_path&cm_file=" . fcm_urlencode ($cm_logoimage) . "\" BORDER=\"0\" ALT=\"$cm_boxtitle\" WIDTH=\"" . $cm_logo_status[3] . "\" HEIGHT=\"" . $cm_logo_status[4] . "\">";
      }
      else {
        echo "<A class=\"cms\" HREF=\"display.php?cm_path=$cm_path\"><IMG SRC=\"getfile.php?cm_path=$cm_path&cm_file=" . fcm_urlencode ($cm_logoimage) . "\" BORDER=\"0\" ALT=\"$cm_boxtitle\" WIDTH=\"" . $cm_logo_status[3] . "\" HEIGHT=\"" . $cm_logo_status[4] . "\"></A>";
      }
      if ($cm_isheader) {
        echo "</td><td width=\"100%\" valign=\"top\" class=\"doclist1body\">\n";
      }
      elseif ($cm_isannounce) {
        echo "</td><td width=\"100%\" valign=\"top\" class=\"doclist3body\">\n";
      }
      else {
        echo "</td><td width=\"100%\" valign=\"top\" class=\"doclist2body\">\n";
      }
    }
  }
  if (!$cm_boxtitle) {
    $cm_boxtitle = "{$cm_text["untitled"]} ($cm_path)";
  }
  if ($cm_iscontentless) {
    echo "<strong>$cm_boxtitle</strong>\n";
  }
  else {
    echo "<strong><A class=\"cms\" HREF=\"display.php?cm_path=$cm_path\">$cm_boxtitle</A></strong>\n";
  } 
  if (!$cm_isheader) {
    echo " [ " . substr ($cm_boxdate, 0, 10) . "&nbsp;";
    if ($cm_comments && !$cm_iscontentless) {
      echo "|&nbsp;{$cm_text["totalcomments"]}: $cm_comments ";
    }
    if ($cm_visits && !$cm_iscontentless) {
      echo "|&nbsp;{$cm_text["visits"]}: $cm_visits ";
    }
    if ($cm_rating && !$cm_iscontentless) {
      echo "|&nbsp;" . str_repeat ("<img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["user_ratestar"]}\" width=\"8\" height=\"8\" border=\"0\" alt=\"*\">", $cm_rating);
    }
    echo " ] <br>\n";
  }
  echo "&nbsp;&nbsp;&nbsp;$cm_boxabstract<br>\n";
  if ($cm_show_crumbs) {
    echo "<span class=\"searchcrumb\">" . fcm_bread_crumbs ($cm_path, ">", false) . "</span>";
  }
  echo "</td></tr></table>";
  echo "</td></tr></table>\n";
  echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"cms\" height=\"2\"><img src=\"$cm_imgpath/t.gif\" width=\"1\" height=\"2\" border=\"0\" alt=\"\"></td></tr></table>\n";
};


// fcm_echo_articlelist_box
// Similar to fcm_articlelist_box, this function won't display it but will
// store the HTML code in a string, to be included later in a page. This is
// used when interpreting the content of a page.
function fcm_echo_articlelist_box ($cm_path, $cm_boxtitle, $cm_boxabstract, $cm_boxdate, $cm_comments = 0, $cm_visits = 0, $cm_rating = 0, $cm_iscontentless = false, $cm_isannounce = false, $cm_logoimage = "") {
  global $cm_text, $cm_imgpath, $cm_doclogo_width, $cm_doclogo_height, $cm_icon_set, $cm_image_filename;
  $cm_boxstring = "";
  if ($cm_isannounce) {
    $cm_boxstring .= "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"doclist3border\">\n";
    $cm_boxstring .= "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"5\"><tr><td valign=\"top\" class=\"doclist3body\">\n";
  }
  else {
    $cm_boxstring .= "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"doclist2border\">\n";
    $cm_boxstring .= "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"5\"><tr><td valign=\"top\" class=\"doclist2body\">\n";
  }
  if ($cm_logoimage) {
    $cm_logo_status = fcm_check_logoimage ($cm_path, $cm_logoimage);
    if (!(($cm_logo_status[0] & 16) || ($cm_logo_status[0] & 64))) {
      if ($cm_iscontentless) {
        $cm_boxstring .= "<IMG SRC=\"getfile.php?cm_path=$cm_path&cm_file=" . fcm_urlencode ($cm_logoimage) . "\" BORDER=\"0\" ALT=\"$cm_boxtitle\" WIDTH=\"" . $cm_logo_status[3] . "\" HEIGHT=\"" . $cm_logo_status[4] . "\">";
      }
      else {
        $cm_boxstring .= "<A class=\"cms\" HREF=\"display.php?cm_path=$cm_path\"><IMG SRC=\"getfile.php?cm_path=$cm_path&cm_file=" . fcm_urlencode ($cm_logoimage) . "\" BORDER=\"0\" ALT=\"$cm_boxtitle\" WIDTH=\"" . $cm_logo_status[3] . "\" HEIGHT=\"" . $cm_logo_status[4] . "\"></A>";
      }
      if ($cm_isannounce) {
        $cm_boxstring .= "</td><td width=\"100%\" valign=\"top\" class=\"doclist3body\">\n";
      }
      else {
        $cm_boxstring .= "</td><td width=\"100%\" valign=\"top\" class=\"doclist2body\">\n";
      }
    }
  }
  if (!$cm_boxtitle) {
    $cm_boxtitle = "{$cm_text["untitled"]} ($cm_path)";
  }
  if ($cm_iscontentless) {
    $cm_boxstring .= "<strong>$cm_boxtitle</strong>\n";
  }
  else {
    $cm_boxstring .= "<strong><A class=\"cms\" HREF=\"display.php?cm_path=$cm_path\">$cm_boxtitle</A></strong>\n";
  }
  $cm_boxstring .= " [ " . substr ($cm_boxdate, 0, 10) . "&nbsp;";
  if ($cm_comments && !$cm_iscontentless) {
    $cm_boxstring .= "|&nbsp;{$cm_text["totalcomments"]}: $cm_comments ";
  }
  if ($cm_visits && !$cm_iscontentless) {
    $cm_boxstring .= "|&nbsp;{$cm_text["visits"]}: $cm_visits ";
  }
  if ($cm_rating && !$cm_iscontentless) {
    $cm_boxstring .= "|&nbsp;" . str_repeat ("<img src=\"$cm_imgpath/{$cm_image_filename[$cm_icon_set]["user_ratestar"]}\" width=\"8\" height=\"8\" border=\"0\" alt=\"*\">", $cm_rating);
  }
  $cm_boxstring .= " ] <br>\n";
  $cm_boxstring .= "&nbsp;&nbsp;&nbsp;$cm_boxabstract<br>\n";
  if ($cm_show_crumbs) {
    $cm_boxstring .= "<span class=\"searchcrumb\">" . fcm_bread_crumbs ($cm_path, ">", false) . "</span>";
  }
  $cm_boxstring .= "</td></tr></table>";
  $cm_boxstring .= "</td></tr></table>\n";
  $cm_boxstring .= "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"cms\" height=\"5\"><img src=\"$cm_imgpath/t.gif\" width=\"1\" height=\"5\" border=\"0\" alt=\"\"></td></tr></table>\n";
  return $cm_boxstring;
};


// fcm_articlelist_nostyle
// Displays the title and summary of a page, usually for the index listings.
// It works like fcm_articlelist_box but without the CMS style classes.
// It uses the Phprojekt colors.
function fcm_articlelist_nostyle ($cm_path, $cm_boxtitle, $cm_boxabstract, $cm_boxdate, $cm_iscontentless = false, $cm_isannounce = false, $cm_list_width = "100%", $cm_rowcolor, $cm_hovercolor) {
  global $cm_text, $cm_imgpath, $cm_doclogo_width, $cm_doclogo_height, $cm_show_rootinnav;
  echo "<table width=\"$cm_list_width\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\">";
  if ((!$cm_iscontentless) && $cm_hovercolor) {
    echo "<tr bgcolor=\"$cm_rowcolor\" onmouseover=\"this.style.backgroundColor = '$cm_hovercolor'\" onmouseout=\"this.style.backgroundColor = '$cm_rowcolor'\" onDblClick=\"location.href = '../cm/display.php?cm_path=$cm_path'\">\n";
  }
  else {
    echo "<tr bgcolor=\"$cm_rowcolor\">\n";
  }
  echo "<td valign=\"top\">\n";
  if (!$cm_boxtitle) {
    $cm_boxtitle = "{$cm_text["untitled"]} ($cm_path)";
  }
  if ($cm_iscontentless) {
    echo "<strong>$cm_boxtitle</strong>\n";
  }
  else {
    if (($cm_show_rootinnav) && (substr_count ($cm_path, "/") == 1)) {
      echo "<strong><A HREF=\"../index.php?module=$cm_path\" target=\"_top\">$cm_boxtitle</A></strong>\n";
    }
    else {
      echo "<strong><A HREF=\"../index.php?module=cms&cm_path=$cm_path\" target=\"_top\">$cm_boxtitle</A></strong>\n";
    }
  }
  echo " [ " . substr ($cm_boxdate, 0, 10) . " ]\n";
  echo "&nbsp;&nbsp;$cm_boxabstract\n";
  echo "</td></tr></table>\n";
};


// fcm_message
// Displays a message for the user. According to the category, it will display
// the message in a colored box (colors are controled by the CSS file) and an
// icon.
function fcm_message ($cm_message, $cm_msgstyle) {
  global $cm_text, $cm_imgpath, $cm_msg_iconwidth, $cm_msg_iconheight, $cm_image_filename, $cm_icon_set;
  switch ($cm_msgstyle) {
    case CM_MSGSTYLE_INFORMATION:
      $cm_msg_borderclass = "infomessageboxborder";
      $cm_msg_class = "infomessagebox";
      $cm_msg_icon = $cm_image_filename[$cm_icon_set]["dialog_info"];
      $cm_msg_iconalt = $cm_text["iconaltinfo"];
      break;
    case CM_MSGSTYLE_WARNING:
      $cm_msg_borderclass = "warningmessageboxborder";
      $cm_msg_class = "warningmessagebox";
      $cm_msg_icon = $cm_image_filename[$cm_icon_set]["dialog_warning"];
      $cm_msg_iconalt = $cm_text["iconaltwarn"];
      break;
    case CM_MSGSTYLE_ERROR:
      $cm_msg_borderclass = "errormessageboxborder";
      $cm_msg_class = "errormessagebox";
      $cm_msg_icon = $cm_image_filename[$cm_icon_set]["dialog_error"];
      $cm_msg_iconalt = $cm_text["iconalterror"];
      break;
    case CM_MSGSTYLE_QUESTION:
      $cm_msg_borderclass = "infomessageboxborder";
      $cm_msg_class = "infomessagebox";
      $cm_msg_icon = $cm_image_filename[$cm_icon_set]["dialog_question"];
      $cm_msg_iconalt = $cm_text["iconaltquestion"];
      break;
    default:
      $cm_msg_borderclass = "defaultmessageboxborder";
      $cm_msg_class = "defaultmessagebox";
      $cm_msg_icon = $cm_image_filename[$cm_icon_set]["dialog_default"];
      $cm_msg_iconalt = $cm_text["iconaltinfo"];
  }
  echo "<table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"$cm_msg_borderclass\">";
  echo "<table width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\"><tr><td class=\"$cm_msg_class\">\n";
  echo "<img src=\"$cm_imgpath/$cm_msg_icon\" width=\"$cm_msg_iconwidth\" height=\"$cm_msg_iconheight\" border=\"0\" alt=\"$cm_msg_iconalt\" class=\"pngimg\">";
  echo "</td><td class=\"$cm_msg_class\">\n";
  echo "$cm_message"; 
  echo "</td></tr></table></td></tr></table>\n";
  echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"cms\" height=\"10\"><img src=\"$cm_imgpath/t.gif\" width=\"1\" height=\"10\" border=\"0\" alt=\"\"></td></tr></table>\n";
};


// fcm_conv_multiline
// Searches for $cm_mksymbol in $cm_source_string, if found outputs $cm_delimiter
// and change state of $cm_laststate. Next time searches for $cm_mksymbol in 
// $cm_source_string and if found outputs $cm_delimiter2.
// Used for markup that starts and ends with the same code and spans several 
// lines (like PREFORMATED).
function fcm_conv_multiline ($cm_source_string, $cm_delimiter, $cm_delimiter2, $cm_mksymbol, &$cm_laststate)
{
  $cm_mkpos = strpos ($cm_source_string, $cm_mksymbol);
  if ($cm_mkpos === 0) {
    if ($cm_laststate) {
      $cm_laststate = false;
      return substr ($cm_source_string, strlen ($cm_mksymbol)) . $cm_delimiter2;
    }
    else {
      $cm_laststate = true;
      return $cm_delimiter . substr ($cm_source_string, strlen ($cm_mksymbol));
    }
  }
  return $cm_source_string;
};


// fcm_conv_block
// Searches for $cm_mksymbol in $cm_source_string only at the beginning of string,
// if found outputs $cm_delimiter before and after $cm_source_string. If
// $cm_mksymbol is empty, just outputs the delimiters and the string.
// Used for markup that requires only a code at the beginning of the line.
function fcm_conv_block ($cm_source_string, $cm_delimiter, $cm_delimiter2, $cm_mksymbol)
{
  if (($cm_source_string == "") || ($cm_source_string == "\r") || ($cm_source_string == "\n")) {
    return "";
  }
  if ($cm_mksymbol == "") {
    return $cm_delimiter . $cm_source_string . $cm_delimiter2;
  }
  $cm_mkpos = strpos ($cm_source_string, $cm_mksymbol);
  if ($cm_mkpos === 0) {
    return $cm_delimiter . substr ($cm_source_string, strlen ($cm_mksymbol)) . $cm_delimiter2;
  }
  return $cm_source_string;
};


// fcm_conv_inline
// Searches for $cm_mksymbol1 and $cm_mksymbol2 in $cm_source_string. If found
// outputs $cm_delimiter before and $cm_delimiter2 after the positions of the
// markup code. If only one markup code is found, it's ignored. 
// The markup codes (mksymbols) must be asymetric two-characters strings.
// Used for markup that opens and closes around a segment of a string (like bold,
// italics, etc).
function fcm_conv_inline ($cm_source_string, $cm_delimiter, $cm_delimiter2, $cm_mksymbol1, $cm_mksymbol2)
{
  if (($cm_source_string == "") || ($cm_source_string == "\r") || ($cm_source_string == "\n")) {
    return "";
  }
  $cm_convstr = "";
  $cm_a = 0;
  $cm_b = strpos ($cm_source_string, $cm_mksymbol1, $cm_a);
  $cm_c = strpos ($cm_source_string, $cm_mksymbol2, $cm_a);
  while (($cm_b !== false) && ($cm_c !== false)) {
    $cm_convstr .= substr ($cm_source_string, $cm_a, $cm_b - $cm_a + 1);
    $cm_convstr .= $cm_delimiter;
    $cm_convstr .= substr ($cm_source_string, $cm_b + 2, $cm_c - $cm_b - 2);
    $cm_convstr .= $cm_delimiter2;
    $cm_a = $cm_c + 1;
    $cm_b = strpos ($cm_source_string, $cm_mksymbol1, $cm_a);
    $cm_c = strpos ($cm_source_string, $cm_mksymbol2, $cm_a);
  }
  $cm_convstr .= substr ($cm_source_string, $cm_a);
  if ($cm_convstr) {
    return $cm_convstr;
  }
  else {
    return $cm_source_string;
  }
};


// fcm_conv_emoticons
// Searches for emoticons in $cm_source_string. If found outputs image tags
// according to a predefined array.
function fcm_conv_emoticons ($cm_source_string)
{
  global $cm_imgpath, $cm_emoticon_iconwidth, $cm_emoticon_iconheight, $cm_convert_emoticons, $cm_image_filename, $cm_icon_set;
  if ($cm_convert_emoticons) {
    if (($cm_source_string == "") || ($cm_source_string == "\r") || ($cm_source_string == "\n")) {
      return "";
    }
    $cm_emoticons = array (" :)", " :P", " :p", " :(", " :'(", " :,(", " =)", " ;)", " :O", " :o", " :D", " :\\", " :/", " :|");
    $cm_emotimages = array ($cm_image_filename[$cm_icon_set]["emoticon_smile"], $cm_image_filename[$cm_icon_set]["emoticon_tongue"], $cm_image_filename[$cm_icon_set]["emoticon_tongue"], $cm_image_filename[$cm_icon_set]["emoticon_sad"], $cm_image_filename[$cm_icon_set]["emoticon_cry"], $cm_image_filename[$cm_icon_set]["emoticon_cry"], $cm_image_filename[$cm_icon_set]["emoticon_happy"], $cm_image_filename[$cm_icon_set]["emoticon_wink"], $cm_image_filename[$cm_icon_set]["emoticon_oh"], $cm_image_filename[$cm_icon_set]["emoticon_oh"], $cm_image_filename[$cm_icon_set]["emoticon_laugh"], $cm_image_filename[$cm_icon_set]["emoticon_wry"], $cm_image_filename[$cm_icon_set]["emoticon_wry"], $cm_image_filename[$cm_icon_set]["emoticon_serious"]);
    for ($cm_ci = 0; $cm_ci < count ($cm_emoticons); $cm_ci++)  {
      $cm_source_string = str_replace ($cm_emoticons[$cm_ci], " <img src=\"$cm_imgpath/$cm_emotimages[$cm_ci]\" alt=\"$cm_emoticons[$cm_ci]\" width=\"$cm_emoticon_iconwidth\" height=\"$cm_emoticon_iconheight\" border=\"0\" class=\"pngimg\">", $cm_source_string);
    }
  }
  return $cm_source_string;
};


// fcm_conv_images
// Searches for $cm_mksymbol1 and $cm_mksymbol2 in $cm_source_string. If found
// outputs image tags with the data from the enclosed markup code. The enclosed
// data is split in two by $cm_mksymbol3 (if exist). The first part is used as
// URL and the second (if exist) as alternate text. If the first part begins 
// with a dot, then the URL is constructed as local with $cm_currentpath.
// If only one markup code is found, it's ignored. 
// The markup codes (mksymbols) must be asymetric two-characters strings.
// Used for markup of images that opens and closes around a segment of a string.
function fcm_conv_images ($cm_currentpath, $cm_source_string, $cm_mksymbol1, $cm_mksymbol2, $cm_mksymbol3)
{
  global $cm_mainroot;
  $cm_convstr = "";
  $cm_imgurl = "";
  $cm_islocal = false;
  $cm_a = 0;
  $cm_b = strpos ($cm_source_string, $cm_mksymbol1, $cm_a);
  $cm_c = strpos ($cm_source_string, $cm_mksymbol2, $cm_a);
  $cm_d = strpos ($cm_source_string, $cm_mksymbol3, $cm_b);
  while (($cm_b !== false) && ($cm_c !== false)) {
    if (($cm_d !== false) && ($cm_d < $cm_c)) {
      $cm_imgurl = substr ($cm_source_string, ($cm_b + 2), ($cm_d - $cm_b - 2));
      if ($cm_imgurl{0} == ".") {
        $cm_islocal = true;
        $cm_imgurl = substr ($cm_imgurl, 1);
      }
      $cm_imgtitle = substr ($cm_source_string, ($cm_d + 1), ($cm_c - $cm_d - 1));
    }
    else {
      $cm_imgurl = substr ($cm_source_string, ($cm_b + 2), ($cm_c - $cm_b - 2));
      if ($cm_imgurl{0} == ".") {
        $cm_islocal = true;
        $cm_imgurl = substr ($cm_imgurl, 1);
      }
      $cm_imgtitle = "";
    }
    $cm_convstr .= substr ($cm_source_string, $cm_a, $cm_b - $cm_a);
    if (substr ($cm_imgurl, -1) == ",") {
      $cm_imgurl = substr ($cm_imgurl, 0, -1);
    }
    if ($cm_islocal) {
      $cm_convstr .= "<IMG SRC=\"getfile.php?cm_s=1&cm_path=$cm_currentpath&cm_file=" . fcm_urlencode ($cm_imgurl) . "\" ALT=\"" . $cm_imgtitle . "\"" . ">";
    }
    else {
      $cm_convstr .= "<IMG SRC=\"redir.php?cm_elink=" . fcm_urlencode ($cm_imgurl) . "\" ALT=\"" . $cm_imgtitle . "\"" . ">";
    }
    $cm_a = $cm_c + 2;
    $cm_b = strpos ($cm_source_string, $cm_mksymbol1, $cm_a);
    $cm_c = strpos ($cm_source_string, $cm_mksymbol2, $cm_a);
    $cm_d = strpos ($cm_source_string, $cm_mksymbol3, $cm_b);
  }
  $cm_convstr .= substr ($cm_source_string, $cm_a);
  if ($cm_convstr) {
    return $cm_convstr;
  }
  else {
    return $cm_source_string;
  }
};


// fcm_conv_links
// Searches for $cm_mksymbol1 and $cm_mksymbol2 in $cm_source_string. If found
// outputs link tags with the data from the enclosed markup code. The enclosed
// data is split in two by $cm_mksymbol3 (if exist). The first part is used as
// URL and the second (if exist) as link text. If the first part begins 
// with a dot, then the URL is constructed as local with $cm_currentpath.
// If the second part is absent, then the link text is the URL.
// If only one markup code is found, it's ignored. If $cm_newwin is set, the
// created link uses a _blank target to open it in a new window.
// The markup codes (mksymbols) must be asymetric two-characters strings.
// Used for markup of links that opens and closes around a segment of a string.
function fcm_conv_links ($cm_currentpath, $cm_source_string, $cm_mksymbol1, $cm_mksymbol2, $cm_mksymbol3, $cm_newwin)
{
  global $cm_mainroot;
  $cm_convstr = "";
  $cm_linkurl = "";
  $cm_linktitle = "";
  $cm_islocal = false;
  $cm_isredirable = false;
  $cm_a = 0;
  $cm_b = strpos ($cm_source_string, $cm_mksymbol1, $cm_a);
  $cm_c = strpos ($cm_source_string, $cm_mksymbol2, $cm_a);
  $cm_d = strpos ($cm_source_string, $cm_mksymbol3, $cm_b);
  while (($cm_b !== false) && ($cm_c !== false)) {
    if (($cm_d !== false) && ($cm_d < $cm_c)) {
      $cm_linkurl = substr ($cm_source_string, ($cm_b + 2), ($cm_d - $cm_b - 2));
      if ($cm_linkurl{0} == ".") {
        $cm_islocal = true;
        $cm_linkurl = substr ($cm_linkurl, 1);
      }
      $cm_linktitle = substr ($cm_source_string, ($cm_d + 1), ($cm_c - $cm_d - 1));
    }
    else {
      $cm_linkurl = substr ($cm_source_string, ($cm_b + 2), ($cm_c - $cm_b - 2));
      if ($cm_linkurl{0} == ".") {
        $cm_islocal = true;
        $cm_linktitle = substr ($cm_linkurl, 1);
        $cm_linkurl = substr ($cm_linkurl, 1);
      }
      else {
        $cm_linktitle = $cm_linkurl;
      }
    }
    $cm_convstr .= substr ($cm_source_string, $cm_a, $cm_b - $cm_a);
    if (substr ($cm_linkurl, -1) == ",") {
      $cm_linkurl = substr ($cm_linkurl, 0, -1);
    }
    if (substr ($cm_linktitle, -1) == ",") {
      $cm_linktitle = substr ($cm_linktitle, 0, -1);
    }
    if (eregi ('http:|https:', $cm_linkurl)) {
      $cm_isredirable = true;
    }
    if ($cm_islocal) {
      if ($cm_newwin) {
        $cm_convstr .= "<A class=\"gcms\" HREF=\"getfile.php?cm_s=1&cm_path=$cm_currentpath&cm_file=" . fcm_urlencode ($cm_linkurl) . "\" TITLE=\"" . $cm_linkurl . "\" target=\"_blank\">" . $cm_linktitle . "</A>";
      }
      else {
        $cm_convstr .= "<A class=\"gcms\" HREF=\"getfile.php?cm_s=1&cm_path=$cm_currentpath&cm_file=" . fcm_urlencode ($cm_linkurl) . "\" TITLE=\"" . $cm_linkurl . "\">" . $cm_linktitle . "</A>";
      }
    }
    else {
      if ($cm_isredirable) {
        if ($cm_newwin) {
          $cm_convstr .= "<A class=\"gcms\" HREF=\"redir.php?cm_elink=" . fcm_urlencode ($cm_linkurl) . "\" TITLE=\"" . $cm_linkurl . "\" target=\"_blank\">" . $cm_linktitle . "</A>";
        }
        else {
          $cm_convstr .= "<A class=\"gcms\" HREF=\"redir.php?cm_elink=" . fcm_urlencode ($cm_linkurl) . "\" TITLE=\"" . $cm_linkurl . "\">" . $cm_linktitle . "</A>";
        }
      }
      else {
        if ($cm_newwin) {
          $cm_convstr .= "<A class=\"gcms\" HREF=\"" . fcm_urlencode ($cm_linkurl) . "\" TITLE=\"" . $cm_linkurl . "\" target=\"_blank\">" . $cm_linktitle . "</A>";
        }
        else {
          $cm_convstr .= "<A class=\"gcms\" HREF=\"" . fcm_urlencode ($cm_linkurl) . "\" TITLE=\"" . $cm_linkurl . "\">" . $cm_linktitle . "</A>";
        }
      }
    }
    $cm_a = $cm_c + 2;
    $cm_b = strpos ($cm_source_string, $cm_mksymbol1, $cm_a);
    $cm_c = strpos ($cm_source_string, $cm_mksymbol2, $cm_a);
    $cm_d = strpos ($cm_source_string, $cm_mksymbol3, $cm_b);
  }
  $cm_convstr .= substr ($cm_source_string, $cm_a);
  if ($cm_convstr) {
    return $cm_convstr;
  }
  else {
    return $cm_source_string;
  }
};


// fcm_conv_index 
// Searches $cm_mksymbol in $cm_source_string. If found, query the database
// searching for the next lower-level directories and calls fcm_echo_articlelist_box
// to create an index listing of pages. If no page is found, then just output
// a "no docs available". If $cm_level is zero it will search all lower directories,
// otherwise it will show only the next level. (The exception are announces, which are
// always displayed regardless of the level).
function fcm_conv_index ($cm_currentpath, $cm_source_string, $cm_mksymbol, $cm_level) {
  global $cm_text;
  global $user_kurz;
  $cm_convstr = "";
  $cm_mkpos = strpos ($cm_source_string, $cm_mksymbol, 0);
  if ($cm_mkpos !== false) {
    $cm_pppos = strrpos ($cm_currentpath, "/");
    if ($cm_pppos == 0) {
      $cm_tl_path = "/";
    }
    else {
      $cm_tl_path = substr ($cm_currentpath, 0, $cm_pppos);
    }
    $result2 = db_query("select cmdb_title, cmdb_directory, cmdb_parentdir, cmdb_abstract, cmdb_date_update, cmdb_type, cmdb_logo from " . CM_DB_PREFIX . "content3 where cmdb_parentdir like '$cm_currentpath%' and cmdb_type like '%" . CM_HITTYPE_ANNOUNCE . "%' " . fcm_access_sqldef ($user_kurz) . " order by cmdb_date_update desc") or db_die();
    while ($row2 = db_fetch_row($result2)) { 
      $cm_convstr .= fcm_echo_articlelist_box ($row2[1], $row2[0], $row2[3], $row2[4], fcm_get_totalcomments ($row2[1]), fcm_get_totalhits ($row2[1], CM_HITTYPE_PAGE), fcm_getaverage_rating ($row2[1]), fcm_is_cleditable ($row2[1], $user_kurz, $row2[5]), true, $row2[6], false);
    }
    if ($cm_level) {
      $result2 = db_query("select cmdb_title, cmdb_directory, cmdb_parentdir, cmdb_abstract, cmdb_date_update, cmdb_type, cmdb_logo from " . CM_DB_PREFIX . "content3 where cmdb_parentdir like '$cm_currentpath' and cmdb_type like '%" . CM_HITTYPE_PAGE . "%' and cmdb_type not like '%" . CM_HITTYPE_ANNOUNCE . "%' " . fcm_access_sqldef ($user_kurz) . " order by cmdb_date_update desc") or db_die();
    }
    else {
      $result2 = db_query("select cmdb_title, cmdb_directory, cmdb_parentdir, cmdb_abstract, cmdb_date_update, cmdb_type, cmdb_logo from " . CM_DB_PREFIX . "content3 where cmdb_directory like '$cm_currentpath/%' and cmdb_type like '%" . CM_HITTYPE_PAGE . "%' and cmdb_type not like '%" . CM_HITTYPE_ANNOUNCE . "%' " . fcm_access_sqldef ($user_kurz) . " order by cmdb_date_update desc") or db_die();
    }
    while ($row2 = db_fetch_row($result2)) { 
      $cm_convstr .= fcm_echo_articlelist_box ($row2[1], $row2[0], $row2[3], $row2[4], fcm_get_totalcomments ($row2[1]), fcm_get_totalhits ($row2[1], CM_HITTYPE_PAGE), fcm_getaverage_rating ($row2[1]), fcm_is_cleditable ($row2[1], $user_kurz, $row2[5]), false, $row2[6], false);
    }
    if (!$cm_convstr) {
      $cm_convstr .= "<P class=\"gcms\">{$cm_text["nodocsunderthis"]}</P>";
    }
  }
  if ($cm_convstr) {
    return $cm_convstr;
  }
  else {
    return $cm_source_string;
  }
};


// fcm_conv_fileindex
// Searches $cm_mksymbol in $cm_source_string. If found, reads the page's
// directory and creates a file listing with icons. If no files are found, 
// outputs nothing.
function fcm_conv_fileindex ($cm_currentpath, $cm_source_string, $cm_mksymbol) {
  global $cm_text, $cm_disabled_type;
  global $cm_mainroot, $cm_jpegprefix_file, $cm_show_thumbsinlisting, $cm_imgpath;
  global $cm_file_iconname, $cm_filelist_iconwidth, $cm_filelist_iconheight, $cm_icon_set;
  $cm_indexpath = $cm_mainroot . $cm_currentpath . "/";
  $cm_convstr = "";
  $cm_sorteddir = array ();
  $cm_mkpos = strpos ($cm_source_string, $cm_mksymbol, 0);
  if (($cm_mkpos !== false) && (file_exists ($cm_indexpath))) {
    $cm_convstr .= "<TABLE ALIGN=\"center\" BORDER=\"0\" cellspacing=\"0\" cellpadding=\"3\">";
    $cm_convstr .= "<TR><td class=\"gfileheader\">&nbsp;</td><td class=\"gfileheader\" align=\"center\">{$cm_text["filename"]}</td><td class=\"gfileheader\" align=\"center\">{$cm_text["filesize"]}</td><td class=\"gfileheader\" align=\"center\">{$cm_text["filedate"]}</td><td class=\"gfileheader\" align=\"center\">{$cm_text["filehits"]}</td></TR>";
  	$cm_dirhandle = opendir($cm_indexpath);
    while (($file = readdir($cm_dirhandle)) != false)
      $cm_sorteddir[count($cm_sorteddir)] = $file;
  	closedir($cm_dirhandle); 
    natcasesort($cm_sorteddir);
    $cm_curcolor = "gfilecolor1"; 
  	foreach ($cm_sorteddir as $file) {
      if ($file != "." && $file != ".." && ((!eregi ("^" . $cm_jpegprefix_file, strtolower ($file))) || ($cm_show_thumbsinlisting))) {
        if (!is_dir ($cm_indexpath . $file)) {
          $cm_fileext = (string) substr (strrchr (strtolower ($file), "."), 1);
          if (!array_key_exists ($cm_fileext, $cm_disabled_type)) {
            if (isset ($cm_file_iconname[$cm_icon_set][$cm_fileext])) {
              $cm_fileicon = $cm_file_iconname[$cm_icon_set][$cm_fileext];
            }
            else {
              $cm_fileicon = $cm_file_iconname[$cm_icon_set]["default"];
            }
            $cm_convstr .= "<TR class=\"$cm_curcolor\"><TD class=\"gfilebody\"><img src=\"$cm_imgpath/$cm_fileicon\" alt=\"\" width=\"$cm_filelist_iconwidth\" height=\"$cm_filelist_iconheight\" border=\"0\" class=\"pngimg\"></TD>";
            $cm_convstr .= "<TD class=\"gfilebody\"><A class=\"cms\" HREF=\"getfile.php?cm_s=1&cm_path=$cm_currentpath&cm_file=" . fcm_urlencode ($file) . "\">" . $file . "</A></TD>";
            $cm_convstr .= "<TD class=\"gfilebody\">" . round (filesize ($cm_indexpath . $file) / 1024) . " k</TD>";
            $cm_convstr .= "<TD class=\"gfilebody\">" . date ("Y-m-d H:i:s", filemtime ($cm_indexpath . $file)) . "</TD>";
            $cm_convstr .= "<TD class=\"gfilebody\" align=\"right\">" . fcm_get_updatehits ($cm_currentpath . "/" . $file, CM_HITTYPE_FILE) . "</TD></TR>";
            $cm_curcolor = fcm_swap_rowcolor ($cm_curcolor, "gfilecolor1", "gfilecolor2");
          }
        }
      }
  	}
    $cm_convstr .= "</TABLE>";
  }
  if ($cm_convstr) {
    return $cm_convstr;
  }
  else {
    return $cm_source_string;
  }
};


// fcm_create_thumbnail
// It creates a thumbnail from a JPEG file.
// It will create a jpeg thumbnail using the prefix defined in the 
// configuration. It will try to use the true color functions if
// enabled and available. This function will try to keep the 
// aspect ration of the image so the final image may not have the
// exact dimensions defined in the arguments.  
function fcm_create_thumbnail ($cm_image_path, $cm_image_filename, $cm_new_filename, $cm_maxX, $cm_maxY) {
  global $cm_enable_gd, $cm_jpeg_truecolors, $cm_jpeg_quality;
  if ($cm_enable_gd) {
    if (!file_exists ($cm_image_path . $cm_new_filename)) {
      $cm_maxX = abs ($cm_maxX); 
      $cm_maxY = abs ($cm_maxY);
      $cm_outjpeg = fopen($cm_image_path . $cm_new_filename, "w");
      $cm_outjpeg = fclose($cm_outjpeg);
      if (function_exists ("imagecreatefromjpeg") && function_exists ("imagejpeg")) {
        $cm_jpeg_dimensions = getimagesize ($cm_image_path . $cm_image_filename);
        $cm_jpeg_oldX = $cm_jpeg_dimensions [0];
        $cm_jpeg_oldY = $cm_jpeg_dimensions [1];
        $cm_jpeg_newX = $cm_jpeg_oldX;
        $cm_jpeg_newY = $cm_jpeg_oldY;
        $cm_jpeg_Xratio = ($cm_jpeg_oldX / $cm_maxX);
        $cm_jpeg_Yratio = ($cm_jpeg_oldY / $cm_maxY);
        if ($cm_jpeg_Xratio > $cm_jpeg_Yratio) {
          $cm_jpeg_newX = round ($cm_jpeg_oldX / $cm_jpeg_Xratio);
          $cm_jpeg_newY = round ($cm_jpeg_oldY / $cm_jpeg_Xratio);
          $cm_reduction_ratio = round ((1/$cm_jpeg_Xratio) * 100);
        }
        else {
          $cm_jpeg_newX = round ($cm_jpeg_oldX / $cm_jpeg_Yratio);
          $cm_jpeg_newY = round ($cm_jpeg_oldY / $cm_jpeg_Yratio);
          $cm_reduction_ratio = round ((1/$cm_jpeg_Yratio) * 100);
        }
        if ($cm_jpeg_truecolors) {
          $cm_swap_jpeg = imagecreatetruecolor ($cm_jpeg_newX, $cm_jpeg_newY);
        }
        else {
          $cm_swap_jpeg = imagecreate ($cm_jpeg_newX, $cm_jpeg_newY);
        }
        $cm_orig_jpeg = imagecreatefromjpeg($cm_image_path . $cm_image_filename);
        if ($cm_orig_jpeg) {
          if ($cm_jpeg_truecolors) {
            imagecopyresampled ($cm_swap_jpeg, $cm_orig_jpeg, 0, 0, 0, 0, $cm_jpeg_newX, $cm_jpeg_newY, $cm_jpeg_oldX, $cm_jpeg_oldY);
          }
          else {
            imagecopyresized ($cm_swap_jpeg, $cm_orig_jpeg, 0, 0, 0, 0, $cm_jpeg_newX, $cm_jpeg_newY, $cm_jpeg_oldX, $cm_jpeg_oldY);
          }
          if ($cm_swap_jpeg) {
            imageinterlace ($cm_swap_jpeg, 1);
            imagejpeg ($cm_swap_jpeg, $cm_image_path . $cm_new_filename, $cm_jpeg_quality);
          }
        }
      }
    }
  }
};


// fcm_conv_album
// Searches $cm_mksymbol in $cm_source_string. If found, reads the page's
// directory, check if there are JPEG images, and creates a thumbnail for
// every picture found. If the thumbnail file already exist it won't create
// a new one. Then creates a table with the thumbnails and links to the 
// original JPEG pictures. If no files are found, outputs nothing.
function fcm_conv_album ($cm_currentpath, $cm_source_string, $cm_mksymbol)
{
  global $cm_text;
  global $cm_mainroot, $cm_enable_gd, $cm_jpegprefix_file, $cm_jpeg_maxX, $cm_jpeg_maxY;
  global $cm_album_cols, $cm_jpeg_quality, $cm_jpeg_prettynames, $cm_safemode;
  $cm_indexpath = $cm_mainroot . $cm_currentpath . "/";
  $cm_convstr = ""; 
  $cm_sorteddir = array ();
  $cm_imgpos = 1;
  $cm_mkpos = strpos ($cm_source_string, $cm_mksymbol, 0);
  if ($cm_enable_gd) {
    if (($cm_mkpos !== false) && (file_exists ($cm_indexpath))) {
    	$cm_dirhandle = opendir($cm_indexpath);
      while (($file = readdir($cm_dirhandle)) != false)
        $cm_sorteddir[count($cm_sorteddir)] = $file;
    	closedir($cm_dirhandle); 
      natcasesort($cm_sorteddir); 
      $cm_convstr .= "<TABLE ALIGN=\"center\" BORDER=\"0\" cellspacing=\"0\" cellpadding=\"10\">\n";
    	foreach ($cm_sorteddir as $file) {
        if (!$cm_safemode) {
          @set_time_limit (60);
        }
        if (($file != ".") && ($file != "..") && eregi ("\.jpg$", strtolower ($file)) && (!eregi ("^" . $cm_jpegprefix_file, strtolower ($file)))) {
          $jpeg_dimensions = getimagesize ($cm_indexpath . $file);
          $jpeg_oldX = $jpeg_dimensions [0];
          $jpeg_oldY = $jpeg_dimensions [1];
          $cm_img_data = $jpeg_oldX . "x" . $jpeg_oldY . ", ";
          $cm_img_data .= round (filesize ($cm_indexpath . $file) / 1024) . " k";
          $cm_img_altdata = $cm_img_data;
          $cm_img_data .= "<BR>" . $cm_text["filehits"] . " " . fcm_get_updatehits ($cm_currentpath . "/" . $file, CM_HITTYPE_FILE);
  
          if ($cm_imgpos == 1)
            $cm_convstr .= "<TR>\n";
          $cm_convstr .= "<TD class=\"galbumbody\" ALIGN=\"center\"><A class=\"cms\" HREF=\"getfile.php?cm_s=1&cm_path=$cm_currentpath&cm_file=" . fcm_urlencode ($file) . "\">";
          $cm_convstr .= "<IMG SRC=\"getfile.php?cm_path=$cm_currentpath&cm_file=" . fcm_urlencode ($cm_jpegprefix_file . $file) . "\" BORDER=\"0\" ALT=\"" . $cm_img_altdata . "\">";
          $cm_convstr .= "</A><BR>";
          if ($cm_jpeg_prettynames) {
            $cm_convstr .= ucwords (strtr (basename (strtolower ($file), ".jpg"), "_-&%", "    ")) . "<BR>$cm_img_data</TD>\n";
          }
          else {
            $cm_convstr .= $file . "<BR>$cm_img_data</TD>\n";
          }
          if ($cm_imgpos == $cm_album_cols) {
            $cm_convstr .= "</TR>\n";
            $cm_imgpos = 1;
          }
          else {
            $cm_imgpos++;
          }
          fcm_create_thumbnail ($cm_indexpath, $file, ($cm_jpegprefix_file . $file), $cm_jpeg_maxX, $cm_jpeg_maxY);
        }
    	}
      $cm_convstr .= "</TABLE>";
    }
    if ($cm_convstr) {
      return $cm_convstr;
    }
    else {
      return $cm_source_string;
    }
  }
  else {
    return $cm_source_string;
  }
};


// fcm_conv_list
// Searches for $cm_mksymbol1 in $cm_source_string, if found outputs $cm_delimiter1
// and change the "depth" of $cm_laststate to +1.
// Searches for $cm_mksymbol2 in $cm_source_string, if found outputs $cm_delimiter2
// and change the "depth" of $cm_laststate to -1 only if its value is >0.
// The original idea for this function courtesy of Stephen Reindl (sreindl@stephenreindl.de).
function fcm_conv_list ($cm_source_string, $cm_delimiter1, $cm_delimiter2, $cm_mksymbol1, $cm_mksymbol2, &$cm_laststate)
{
  $cm_mkpos1 = strpos ($cm_source_string, $cm_mksymbol1);
  $cm_mkpos2 = strpos ($cm_source_string, $cm_mksymbol2);
  if ($cm_mkpos1 === 0) {
    $cm_laststate++;
    return substr ($cm_source_string, strlen ($cm_mksymbol1)) . $cm_delimiter1;
  }
  if ($cm_mkpos2 === 0) {
    if ($cm_laststate > 0) {
      $cm_laststate--;
      return substr ($cm_source_string, strlen ($cm_mksymbol2)) . $cm_delimiter2;
    }
  }
  return $cm_source_string;
};


// fcm_conv_listitem
// Searches for $cm_mksymbol in $cm_source_string, if found outputs $cm_delimiter.
function fcm_conv_listitem ($cm_source_string, $cm_delimiter, $cm_mksymbol)
{
  $cm_mkpos = strpos ($cm_source_string, $cm_mksymbol);
  if ($cm_mkpos === 0) {
    return $cm_delimiter . substr ($cm_source_string, strlen ($cm_mksymbol));
  }
  return $cm_source_string;
};


// fcm_process_markup
// Split $cm_markup_string in lines and call every markup-processing function to
// convert the markup code to HTML code.
function fcm_process_markup ($cm_markup_string, $cm_currentpath, $cm_disable_format = false)
{
  global $cm_enable_gd;
  $cm_lines = explode ("\n", $cm_markup_string);
  $cm_mk = "";
  $cm_multi = false;
  $cm_olist = 0;
  $cm_ulist = 0;
  foreach ($cm_lines as $cm_currentline) {
    $cm_origline = $cm_currentline;
    if (!$cm_disable_format) {
      $cm_currentline = fcm_conv_multiline ($cm_currentline, "<PRE class=\"gcms\">", "</PRE>", "___", $cm_multi);
      $cm_currentline = fcm_conv_block ($cm_currentline, "<H1 class=\"gcms\">", "</H1>", "= ");
      $cm_currentline = fcm_conv_block ($cm_currentline, "<H2 class=\"gcms\">", "</H2>", "== ");
      $cm_currentline = fcm_conv_block ($cm_currentline, "<H3 class=\"gcms\">", "</H3>", "=== ");
      $cm_currentline = fcm_conv_block ($cm_currentline, "<H4 class=\"gcms\">", "</H4>", "==== ");
      $cm_currentline = fcm_conv_block ($cm_currentline, "<H5 class=\"gcms\">", "</H5>", "===== ");
      $cm_currentline = fcm_conv_block ($cm_currentline, "<H6 class=\"gcms\">", "</H6>", "====== ");
      $cm_currentline = fcm_conv_list ($cm_currentline, "<UL class=\"gcms\">", "</UL>", "*[", "*]", $cm_ulist);
      $cm_currentline = fcm_conv_list ($cm_currentline, "<OL class=\"gcms\">", "</OL>", "#[", "#]", $cm_olist);
      if ($cm_ulist > 0) {
        $cm_currentline = fcm_conv_listitem ($cm_currentline, "<LI class=\"gcms\">", "*-");
      }
      if ($cm_olist > 0) {
        $cm_currentline = fcm_conv_listitem ($cm_currentline, "<LI class=\"gcms\">", "#-");
      }
      if (($cm_currentline == $cm_origline) && ($cm_multi == false)) {
        $cm_currentline = fcm_conv_block ($cm_currentline, "<P class=\"gcms\">", "</P>", "");
      }
      $cm_currentline = fcm_conv_inline ($cm_currentline, "<STRONG class=\"gcms\">", "</STRONG>", " *", "* ");
      $cm_currentline = fcm_conv_inline ($cm_currentline, "<EM class=\"gcms\">", "</EM>", " _", "_ ");
      $cm_currentline = fcm_conv_links ($cm_currentpath, $cm_currentline, "[[", "]]", " ", false);
      $cm_currentline = fcm_conv_links ($cm_currentpath, $cm_currentline, "{{", "}}", " ", true);
      $cm_currentline = fcm_conv_images ($cm_currentpath, $cm_currentline, "((", "))", " ");
    }
    $cm_currentline = fcm_conv_inline ($cm_currentline, "<DIV class=\"gboxedpara\">", "</DIV>", " %", "% ");
    $cm_currentline = fcm_conv_index ($cm_currentpath, $cm_currentline, "#INDEX#", 0);
    $cm_currentline = fcm_conv_index ($cm_currentpath, $cm_currentline, "#SHORTINDEX#", 1);
    $cm_currentline = fcm_conv_fileindex ($cm_currentpath, $cm_currentline, "#FILES#");
    if ($cm_enable_gd) {
      $cm_currentline = fcm_conv_album ($cm_currentpath, $cm_currentline, "#ALBUM#");
    }
    else {
      $cm_currentline = fcm_conv_fileindex ($cm_currentpath, $cm_currentline, "#ALBUM#");
    }
    $cm_currentline = fcm_conv_emoticons ($cm_currentline);
    $cm_mk = $cm_mk . $cm_currentline . "\n";
  }
  return $cm_mk;
};


// fcm_mark_visit
// Add a hit to the hit count of a page. If the page don't have yet a hit count, 
// creates one. this modify both the Total-hits and Hits-since-update. 
// Returns the total hits.
function fcm_mark_visit ($cm_visitedpath, $cm_hit_type) {
  global $dbIDnull;
  if ($cm_visitedpath) {
    $result1 = db_query("select cmdb_directory, cmdb_totalhits, cmdb_updatehits from " . CM_DB_PREFIX . "cmhits3 where cmdb_directory like '$cm_visitedpath' and cmdb_type like '%$cm_hit_type%'") or db_die();
    $row1 = db_fetch_row($result1);
    if ($row1[0]) {
      $cm_totalhits = $row1[1] + 1;
      $cm_updatehits = $row1[2] + 1;
      $result2 = db_query("update " . CM_DB_PREFIX . "cmhits3 set cmdb_totalhits='$cm_totalhits', cmdb_updatehits='$cm_updatehits' where cmdb_directory like '$cm_visitedpath' and cmdb_type like '%$cm_hit_type%'") or db_die();
    }
    else {
      $result2 = db_query("insert into " . CM_DB_PREFIX . "cmhits3 values($dbIDnull,'$cm_hit_type','$cm_visitedpath','1','1')") or db_die();
      $cm_totalhits = 1;
      $cm_updatehits = 1;
    }
    return ($cm_totalhits);
  }
};


// fcm_reset_updatedvisit
// Reset the hits-count of the page. Only the Hits-since-update counter is 
// modified.
function fcm_reset_updatedvisit ($cm_visitedpath, $cm_hit_type) {
  global $dbIDnull;
  if ($cm_visitedpath) {
    $result1 = db_query("select cmdb_directory from " . CM_DB_PREFIX . "cmhits3 where cmdb_directory like '$cm_visitedpath' and cmdb_type like '%$cm_hit_type%'") or db_die();
    $row1 = db_fetch_row($result1);
    if ($row1[0]) {
      $result2 = db_query("update " . CM_DB_PREFIX . "cmhits3 set cmdb_updatehits='0' where cmdb_directory like '$cm_visitedpath' and cmdb_type like '%$cm_hit_type%'") or db_die();
    }
    else {
      $result2 = db_query("insert into " . CM_DB_PREFIX . "cmhits3 values($dbIDnull,'$cm_hit_type','$cm_visitedpath','0','0')") or db_die();
    }
  }
};


// fcm_get_totalhits
// Returns the Total-hits of a page.
function fcm_get_totalhits ($cm_visitedpath, $cm_hit_type) {
  if ($cm_visitedpath) {
    $result1 = db_query("select cmdb_directory, cmdb_totalhits from " . CM_DB_PREFIX . "cmhits3 where cmdb_directory like '$cm_visitedpath' and cmdb_type like '%$cm_hit_type%'") or db_die();
    $row1 = db_fetch_row($result1);
    if ($row1[0]) {
      return ($row1[1]);
    }
    return (0);
  }
};


// fcm_get_updatehits
// Returns the Hits-since-update count of a page.
function fcm_get_updatehits ($cm_visitedpath, $cm_hit_type) {
  if ($cm_visitedpath) {
    $result1 = db_query("select cmdb_directory, cmdb_updatehits from " . CM_DB_PREFIX . "cmhits3 where cmdb_directory like '$cm_visitedpath' and cmdb_type like '%$cm_hit_type%'") or db_die();
    $row1 = db_fetch_row($result1);
    if ($row1[0]) {
      return ($row1[1]);
    }
    return (0);
  }
};


// fcm_delete_hitrecord
// Deletes the hits record of a page from the database.
// Usually used when deleting a page.
function fcm_delete_hitrecord ($cm_visitedpath, $cm_hit_type) {
  if ($cm_visitedpath) {
    $result1 = db_query("delete from " . CM_DB_PREFIX . "cmhits3 where cmdb_directory like '$cm_visitedpath' and cmdb_type like '%$cm_hit_type%'") or db_die();
  }
};


// fcm_rename_hitrecord
// Changes the object name of a hit record.
// Usually used when renaming or moving a page or file.
function fcm_rename_hitrecord ($cm_oldpath, $cm_newpath, $cm_hit_type) {
  if ($cm_oldpath && $cm_newpath) {
    $result2 = db_query("update " . CM_DB_PREFIX . "cmhits3 set cmdb_directory='$cm_newpath' where cmdb_directory like '$cm_oldpath' and cmdb_type like '%$cm_hit_type%'") or db_die();
  }
};


// fcm_add_logentry
// Adds an entry to the event log table.
// $cm_logged_operation is a CM_APPLOG_ constant.
function fcm_add_logentry ($cm_logged_path, $cm_logged_user, $cm_logged_operation, $cm_logged_desc) {
  global $dbIDnull;
  $cm_logged_date = fcm_curdate_string ();
  $cm_logged_desc = substr ($cm_logged_desc, 0, 255);
  $result2 = db_query("insert into " . CM_DB_PREFIX . "cmapplog3 values($dbIDnull,'$cm_logged_date',$cm_logged_operation,'$cm_logged_user','$cm_logged_path','$cm_logged_desc')") or db_die();
};


// fcm_can_berated
// Returns true if the given directory/page has rating enabled.
function fcm_can_berated ($cm_ratedpath) {
  if (($cm_ratedpath) && ($cm_ratedpath != "/")) {
    $result1 = db_query("select cmdb_directory, cmdb_rated, cmdb_type from " . CM_DB_PREFIX . "content3 where cmdb_directory like '$cm_ratedpath' and cmdb_type not like '%" . CM_HITTYPE_CONTENTLESS . "%'") or db_die();
    $row1 = db_fetch_row($result1);
    if ($row1[1] == 1) {
      return (true);
    }
  }
  return (false);
};


// fcm_set_rating
// Set the rating of a directory given by an user.
// If the directory-user record does not exist yet, it is created. If it exists,
// is modified (only if the config value $cm_can_rerate is TRUE).
// It does return TRUE if the rating was recorded/changed, otherwise, it returns FALSE.
function fcm_set_rating ($cm_ratedpath, $cm_user_rating, $cm_rating_user) {
  global $dbIDnull, $cm_can_rerate;
  if (($cm_ratedpath) && (fcm_can_berated ($cm_ratedpath))) {
    if (fcm_get_userrating ($cm_ratedpath, $cm_rating_user) > 0) {
      if ($cm_can_rerate) {
        $result2 = db_query("update " . CM_DB_PREFIX . "cmrating3 set cmdb_rate=$cm_user_rating where cmdb_directory='$cm_ratedpath' and cmdb_author_user='$cm_rating_user'") or db_die();
        return (true);
      }
      else {
        return (false);
      }
    }
    else {
      $result2 = db_query("insert into " . CM_DB_PREFIX . "cmrating3 values($dbIDnull,'$cm_ratedpath',$cm_user_rating,'$cm_rating_user')") or db_die();
      return (true);
    }
  }
  else {
    return (false);
  }
};


// fcm_get_rating
// Returns the number of users that have given a certain value to a page/directory.
function fcm_get_rating ($cm_ratedpath, $cm_user_rating) {
  global $cm_historical_ratings;
  if (($cm_ratedpath) && (fcm_can_berated ($cm_ratedpath) || $cm_historical_ratings)) {
    $result1 = db_query("select count(cmdb_directory) from " . CM_DB_PREFIX . "cmrating3 where cmdb_directory like '$cm_ratedpath' and cmdb_rate=$cm_user_rating") or db_die();
    $row1 = db_fetch_row($result1);
    return ($row1[0]);
  }
  else {
    return (0);
  }
};


// fcm_get_userrating
// Returns the rating given by an user to a page/directory.
// If the user has not rated the page/directory, 0 is returned.
function fcm_get_userrating ($cm_ratedpath, $cm_rating_user) {
  global $cm_historical_ratings;
  if (($cm_ratedpath) && (fcm_can_berated ($cm_ratedpath) || $cm_historical_ratings)) {
    $result1 = db_query("select cmdb_rate from " . CM_DB_PREFIX . "cmrating3 where cmdb_directory like '$cm_ratedpath' and cmdb_author_user='$cm_rating_user'") or db_die();
    $row1 = db_fetch_row($result1);
    if ($row1[0]) {
      return ($row1[0]);
    }
    else {
      return (0);
    }
  }
};


// fcm_getaverage_rating
// Returns the average rating of a page/directory.
function fcm_getaverage_rating ($cm_ratedpath) {
  global $cm_historical_ratings;
  if (($cm_ratedpath) && (fcm_can_berated ($cm_ratedpath) || $cm_historical_ratings)) {
    $result1 = db_query("select avg(cmdb_rate) from " . CM_DB_PREFIX . "cmrating3 where cmdb_directory like '$cm_ratedpath'") or db_die();
    $row1 = db_fetch_row($result1);
    return ($row1[0]);
  }
  else {
    return (0);
  }
};


// fcm_delete_rating
// Deletes all records related to a page/directory from the rating table.
function fcm_delete_rating ($cm_ratedpath, $cm_hit_type) {
  if ($cm_ratedpath) {
    $result1 = db_query("delete from " . CM_DB_PREFIX . "cmrating3 where cmdb_directory like '$cm_ratedpath'") or db_die();
  }
};


// fcm_storerdf 
// Opens a connection to a web server, gets a RDF/RSS page, extract the titles
// and urls from the XML code, encode the data and store it in an array, 
// serialize the array data and store it in the database.
// This function don't walk through the XML tree, it just do a crude
// search for strings.
function fcm_storerdf ($cm_rdfurl, $cm_rdftitle, $cm_rdftime2live) {
  global $dbIDnull, $cm_mod_useragent, $cm_safemode;
  $result1 = db_query("select cmdb_type, cmdb_title, cmdb_date_update from " . CM_DB_PREFIX . "cmsynd3 where cmdb_title like '$cm_rdftitle'") or db_die();
  $row1 = db_fetch_row($result1);
  if ($row1[0]) {
    $cm_date_diff = round ((date( "U" ) - mktime(substr($row1[2],11,2), substr($row1[2],14,2), substr($row1[2],17,2), substr($row1[2],5,2), substr($row1[2],8,2), substr($row1[2],0,4))) / 60);
    if (($cm_date_diff <= $cm_rdftime2live) && ($cm_rdftime2live !== 0)) {
      return;
    }
  }
  $cm_rdf_content = "";
  $cm_urlparts = parse_url ($cm_rdfurl);
  if (!$cm_safemode) {
    @set_time_limit (60);
  }
  $cm_fp = @fsockopen ($cm_urlparts ["host"], "80", $errno, $errstr, 50);
  if ($cm_fp) {
    if (!$cm_urlparts["query"]) {
      fputs($cm_fp, "GET " . $cm_urlparts["path"] . " HTTP/1.0\r\nHost: " . $cm_urlparts["host"] . "\r\n$cm_mod_useragent\r\n\r\n");
    }
    else {
      fputs($cm_fp, "GET " . $cm_urlparts["path"] . "?" . $cm_urlparts["query"] . " HTTP/1.0\r\nHost: " . $cm_urlparts["host"] . "\r\n$cm_mod_useragent\r\n\r\n");
    }
    while (!feof($cm_fp)) {
      $cm_rdf_content .= fgets ($cm_fp, 128);
    }
    $cm_rdf_data = $cm_rdf_content;
    if (eregi ("<title>", $cm_rdf_data) && eregi ("HTTP.*200 OK", $cm_rdf_data)) {
      $cm_rdf_data = eregi_replace ("<image.*/image>", "", $cm_rdf_data);
      $cm_rdf_data = eregi_replace ("</rdf:RDF.*", "", $cm_rdf_data);
      $cm_rdf_data = eregi_replace ("</rss>.*", "", $cm_rdf_data);
      $cm_rdf_data = rtrim ($cm_rdf_data);
    }
    else {
      $cm_rdf_data = "";
    }
    $cm_rdf_items = explode ("</item>", $cm_rdf_data);
    for ($cm_ci = 0; $cm_ci < count ($cm_rdf_items); $cm_ci++) {
      $cm_rdf_links[$cm_ci][0] = eregi_replace (".*<title>", "", $cm_rdf_items[$cm_ci]);
      $cm_rdf_links[$cm_ci][0] = eregi_replace ("</title>.*", "", $cm_rdf_links[$cm_ci][0]);
      $cm_rdf_links[$cm_ci][1] = eregi_replace (".*<link>", "", $cm_rdf_items[$cm_ci]);
      $cm_rdf_links[$cm_ci][1] = eregi_replace ("</link>.*", "", $cm_rdf_links[$cm_ci][1]);
      $cm_rdf_links[$cm_ci][0] = fcm_htmlentity ($cm_rdf_links[$cm_ci][0], ENT_QUOTES);
      $cm_rdf_links[$cm_ci][1] = urlencode ($cm_rdf_links[$cm_ci][1]);
    }
    $cm_rdf_content = addslashes (serialize ($cm_rdf_links));
  }
  $cm_pub_date = fcm_curdate_string ();
  if ($row1[0]) {
    $result2 = db_query("update " . CM_DB_PREFIX . "cmsynd3 set cmdb_date_creation='$cm_pub_date', cmdb_date_update='$cm_pub_date', cmdb_content='$cm_rdf_content' where cmdb_title like '$cm_rdftitle'") or db_die();
  }
  else {
    $result2 = db_query("insert into " . CM_DB_PREFIX . "cmsynd3 values($dbIDnull,'" . CM_HITTYPE_SYND . "','$cm_rdfurl','$cm_rdftitle',null,'$cm_pub_date','$cm_pub_date',1,1,1,5,'$cm_rdf_content')") or db_die();
  }
  fcm_add_logentry ("", "", CM_APPLOG_GET_SYND, "Got syndication feed $cm_rdftitle");
}



// fcm_readrdf
// Reads the RSS/RDF data from the database, unserialize, decode, and store in
// an array, then return the array (bidimensional array, first column is the 
// title, second column is the URL). Parameters are: unique syndication name,
// max number of links to extract, max lenght of line per entry. 
function fcm_readrdf ($cm_rdftitle, $cm_max_links, $cm_max_linelen) {
  $cm_rdf_links = array ();
  $cm_rdf_sellinks = array ();
  $result1 = db_query("select cmdb_type, cmdb_title, cmdb_date_update, cmdb_content from " . CM_DB_PREFIX . "cmsynd3 where cmdb_title like '$cm_rdftitle'") or db_die();
  $row1 = db_fetch_row($result1);
  if ($row1[0]) {
    $cm_rdf_links = unserialize (stripslashes ($row1[3]));
    if ($cm_max_links > count ($cm_rdf_links)) {
      $cm_max_links = count ($cm_rdf_links);
    }
    for ($cm_ci = 0; $cm_ci < $cm_max_links; $cm_ci++) {
      $cm_rdf_sellinks[$cm_ci][0] = fcm_unhtmlentities ($cm_rdf_links[$cm_ci][0]);
      if (strlen ($cm_rdf_sellinks[$cm_ci][0]) > $cm_max_linelen) {
        $cm_rdf_sellinks[$cm_ci][0] = substr ($cm_rdf_sellinks[$cm_ci][0], 0, $cm_max_linelen) . "&hellip;";
      }
      $cm_rdf_sellinks[$cm_ci][1] = urldecode ($cm_rdf_links[$cm_ci][1]);
    }
  }
  return ($cm_rdf_sellinks);
}


// fcm_display_rdfbox
// Creates a box with a list of links from the RDF/RSS array.
function fcm_display_rdfbox ($cm_rdftitle, $cm_rdfdata) {
  global $cm_imgpath;
  echo "<table width=\"150\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"cms\" height=\"5\"><img src=\"$cm_imgpath/t.gif\" width=\"1\" height=\"5\" border=\"0\" alt=\"\"></td></tr></table>\n";
  echo "<table width=\"150\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\"><tr><td class=\"syndhead\">\n";
  echo "&nbsp;<strong>$cm_rdftitle</strong>&nbsp;\n"; 
  echo "</td></tr></table>\n";
  echo "<table width=\"150\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\"><tr><td class=\"syndbody\">\n";
  echo "<ul class=\"syndlist\">\n";
  foreach ($cm_rdfdata as $cm_ci) {
    $cm_ci[0] = trim ($cm_ci[0]);
    $cm_ci[1] = trim ($cm_ci[1]);
    if (($cm_ci[0]) && ($cm_ci[1])) {
      echo "<li class=\"synditem\"><a class=\"cms\" href=\"redir.php?cm_elink=$cm_ci[1]\" target=\"_blank\">$cm_ci[0]</a></li>\n";
    }
  }
  echo "</ul>\n";
  echo "</td></tr></table>\n";
  echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td class=\"cms\" height=\"10\"><img src=\"$cm_imgpath/t.gif\" width=\"1\" height=\"10\" border=\"0\" alt=\"\"></td></tr></table>\n";
};
 

// fcm_display_txtrdfbox
// Creates a list with a list of links from the RDF/RSS array.
function fcm_display_txtrdfbox ($cm_rdftitle, $cm_rdfdata) {
  global $cm_imgpath;
  echo "&nbsp;<strong>$cm_rdftitle</strong>&nbsp;\n"; 
  echo "<ul class=\"syndlist\">\n";
  foreach ($cm_rdfdata as $cm_ci) {
    echo "<li class=\"synditem\"><a href=\"redir.php?cm_elink=$cm_ci[1]\" target=\"_blank\">$cm_ci[0]</a></li>\n";
  }
  echo "</ul>\n";
};


// fcm_load_synd
// Read all syndicated newsfeed records in cmsynd3 and 
// call fcm_storerdf to update them.
function fcm_load_synd ($cm_autodl, $cm_homepage, $cm_force) {
  $cm_where = "";
  if ($cm_autodl) {
    $cm_where = "(cmdb_autodl > 0)";
  }
  if ($cm_homepage) {
    if ($cm_where != "") { 
      $cm_where .= " and (cmdb_inhome > 0)";
    }
    else {
      $cm_where = "(cmdb_inhome > 0)";
    }
  }
  if ($cm_where != "") {
    $cm_where = " where " . $cm_where;
  } 
  $result1 = db_query("select cmdb_uri, cmdb_title, cmdb_ttl, cmdb_autodl, cmdb_inhome from " . CM_DB_PREFIX . "cmsynd3" . $cm_where) or db_die();
  while ($row1 = db_fetch_row($result1)) {
    if ($cm_force) {
      fcm_storerdf ($row1[0], $row1[1], 1);
    }
    else {     
      fcm_storerdf ($row1[0], $row1[1], $row1[2]);
    }     
  }
};


// fcm_display_synd
// Read all syndicated newsfeed records in cmsynd3 and 
// call fcm_readrdf/fcm_display_rdfbox to display them.
function fcm_display_synd ($cm_autodl, $cm_homepage, $cm_displayall) {
  $cm_where = "";
  if ($cm_autodl) {
    $cm_where = "(cmdb_autodl > 0)";
  }
  if ($cm_homepage) {
    if ($cm_where != "") { 
      $cm_where .= " and (cmdb_inhome > 0)";
    }
    else {
      $cm_where = "(cmdb_inhome > 0)";
    }
  }
  if ($cm_where != "") {
    $cm_where = " where " . $cm_where;
  } 
  $result1 = db_query("select cmdb_title, cmdb_visitems, cmdb_autodl, cmdb_inhome from " . CM_DB_PREFIX . "cmsynd3" . $cm_where . " order by upper(cmdb_title)") or db_die();
  while ($row1 = db_fetch_row($result1)) {
    if ($cm_displayall) {
      fcm_display_rdfbox ($row1[0], fcm_readrdf ($row1[0], 100, CM_MAX_SYNDLEN));
    }
    else {     
      fcm_display_rdfbox ($row1[0], fcm_readrdf ($row1[0], $row1[1], CM_MAX_SYNDLEN));
    }     
  }
};


// fcm_can_becommented
// Returns true if the given directory/page has user comments enabled.
function fcm_can_becommented ($cm_commentpath) {
  if (($cm_commentpath) && ($cm_commentpath != "/")) {
    $result1 = db_query("select cmdb_directory, cmdb_commented, cmdb_type from " . CM_DB_PREFIX . "content3 where cmdb_directory like '$cm_commentpath' and cmdb_type not like '%" . CM_HITTYPE_CONTENTLESS . "%'") or db_die();
    $row1 = db_fetch_row($result1);
    if ($row1[1] == 1) {
      return (true);
    }
  }
  return (false);
};


// fcm_get_totalcomments
// Returns the number of user comments of a given page/directory.
function fcm_get_totalcomments ($cm_commentedpath) {
  global $cm_historical_comments;
  if (($cm_commentedpath) && (fcm_can_becommented ($cm_commentedpath) || $cm_historical_comments)) {
    $result1 = db_query("select count(cmdb_directory) from " . CM_DB_PREFIX . "cmcomments3 where cmdb_directory like '$cm_commentedpath'") or db_die();
    $row1 = db_fetch_row($result1);
    return ($row1[0]);
  }
  else {
    return (0);
  }
};


// fcm_delete_usercomments
// Deletes the user comments of a page from the database.
// Usually used when deleting a page.
function fcm_delete_usercomments ($cm_commentedpath, $cm_hit_type) {
  if ($cm_commentedpath) {
    $result1 = db_query("delete from " . CM_DB_PREFIX . "cmcomments3 where cmdb_directory like '$cm_commentedpath' and cmdb_type like '%$cm_hit_type%'") or db_die();
  }
};


// fcm_show_userratings
// Displays the average rating for a page. If no rating records are found, it displays
// an invitation to rate the page.
function fcm_show_userratings ($cm_ratedpath) {
  global $cm_text;
  if (($cm_ratedpath) && ($cm_ratedpath <> "/") && (fcm_can_berated ($cm_ratedpath))) {
    $cm_avg_rating = fcm_getaverage_rating ($cm_ratedpath);
    echo "<table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">";
    echo "<tr><td class=\"ratingcontrol\">\n";
    if ($cm_avg_rating >= 1) {
      echo "{$cm_text["averagerating"]}: " . round ($cm_avg_rating, 1) . " (" . CM_MIN_RATE . "-" . CM_MAX_RATE . "). ";
    }
    echo "<A class=\"cms\" HREF=\"userrating.php?cm_path=$cm_ratedpath\">{$cm_text["rateabout"]}</A>"; 
    echo "</td></tr></table><br>\n";
  }
};


// fcm_call_htmleditor
// Writes the javascript code to call the DHTML WYSIWYG
// editor (for both IE's and Mozilla's).
// It adds two parameters to the form, one to point to the
// destination window (to pass back the content of the editor
// window, and if the dir of the page already exist (to enable
// the uploading of images).
// The JS code has a function (Send...) to:
//   1) check if the editor windows already exist,
//   2) create the editor window,
//   3) change the target of the form,
//   4) post the form to the editor window,
//   5) restore the original target of the form,
//   6) if the window already exist, change focus to it.
// The code also create a bind to the unonload method of the
// create/edit page, so if the page is reloaded or unloaded
// (changed to another page) the editor window is closed.
function fcm_call_htmleditor ($cm_form_target, $cm_is_htmlenabled, $cm_direxist) {
  global $cm_text, $cm_http_useragent;
  if (($cm_is_htmlenabled) && (eregi ("MSIE", $cm_http_useragent))) {
    echo "<script><!--
    function SendHTMLData() {
   	  if (document.all(\"cm_edit_prompt\").contentEditable) {
        if (!window.edit_window || edit_window.closed == true) {
          edit_window = window.open (\"\", \"editing_window\", \"toolbar=no,resizable=yes,scrollbars=yes,status=yes,width=640,height=480\");
          orig_action = document.all(\"cm_editingform\").action;
          orig_target = document.all(\"cm_editingform\").target;
         	document.all(\"cm_editingform\").action = \"editor.php\";
         	document.all(\"cm_editingform\").target = \"editing_window\";
          document.all(\"cm_editingform\").submit();	
         	document.all(\"cm_editingform\").action = orig_action;
         	document.all(\"cm_editingform\").target = orig_target;
       	}
       	else {
       	  window.edit_window.focus();
       	}
      }
      else {
     	  alert(\"{$cm_text["edit_notcompat"]}\");
      }
    }
     --></script>
    <script for=window event=onunload()><!--
      if (window.edit_window || !(edit_window.closed)) {
        edit_window.close();
     	}
    --></script>";

    echo "<br><span class=\"generaltext\">{$cm_text["canusehtml"]} <a id=\"cm_edit_prompt\" onclick=\"SendHTMLData();\" title=\"{$cm_text["openhtmleditor"]}\">{$cm_text["openhtmleditor"]}</a></span>\n";
    echo "<input type=\"hidden\" name=\"cm_form_target\" value=\"$cm_form_target\">\n";
    if ($cm_direxist) {
      echo "<input type=\"hidden\" name=\"cm_direxist\" value=\"1\">\n";
    }
    else {
      echo "<input type=\"hidden\" name=\"cm_direxist\" value=\"0\">\n";
    }
  }
  elseif (($cm_is_htmlenabled) && (eregi ("Gecko", $cm_http_useragent))) {
    echo "<script><!--
    function CloseIfGone(e) {
      if (window.edit_window || !(edit_window.closed)) {
        edit_window.close();
     	}
    }
    function SendHTMLData() {
        if (!window.edit_window || edit_window.closed == true) {
          window.onunload = CloseIfGone; 
          edit_window = window.open (\"\", \"editing_window\", \"toolbar=no,resizable=yes,scrollbars=yes,status=yes,width=640,height=480\");
          orig_action = document.getElementById(\"cm_editingform\").action;
          orig_target = document.getElementById(\"cm_editingform\").target;
         	document.getElementById(\"cm_editingform\").action = \"editorm.php\";
         	document.getElementById(\"cm_editingform\").target = \"editing_window\";
          document.getElementById(\"cm_editingform\").submit();	
         	document.getElementById(\"cm_editingform\").action = orig_action;
         	document.getElementById(\"cm_editingform\").target = orig_target;
       	}
       	else {
       	  window.edit_window.focus();
       	}
    }
     --></script>";

    echo "<br><span class=\"generaltext\">{$cm_text["canusehtml"]} <a id=\"cm_edit_prompt\" onclick=\"SendHTMLData();\" title=\"{$cm_text["openhtmleditorm"]}\">{$cm_text["openhtmleditorm"]}</a></span>\n";
    echo "<input type=\"hidden\" name=\"cm_form_target\" value=\"$cm_form_target\">\n";
    if ($cm_direxist) {
      echo "<input type=\"hidden\" name=\"cm_direxist\" value=\"1\">\n";
    }
    else {
      echo "<input type=\"hidden\" name=\"cm_direxist\" value=\"0\">\n";
    }
  }
};


// fcm_can_usehtml
// Returns true if the given directory/page has HTML content enabled.
function fcm_can_usehtml ($cm_htmlpath) {
  if ($cm_htmlpath) {
    $result1 = db_query("select cmdb_directory, cmdb_enable_html from " . CM_DB_PREFIX . "content3 where cmdb_directory like '$cm_htmlpath'") or db_die();
    $row1 = db_fetch_row($result1);
    if ($row1[1] == 1) {
      return (true);
    }
  }
  return (false);
};


// fcm_recode_html
// Converts the HTML tags to a custom tag to identify them later.
// This is useful before storing the content in the database, because
// the content is converted to char entities.
function fcm_recode_html ($string) {
  $string = str_replace ("<", "-CMGT-", $string);
  $string = str_replace (">", "-CMLT-", $string);
  //$string = str_replace ("&", "-CMAMP-", $string);
  $string = str_replace ("\"", "-CMDQ-", $string);
	return ($string);
};


// fcm_decode_html
// Inverse of fcm_recode_html.
function fcm_decode_html ($string) {
  $string = str_replace ("-CMGT-", "<", $string);
  $string = str_replace ("-CMLT-", ">", $string);
  //$string = str_replace ("&amp;CMAMP;", "&", $string);
  $string = str_replace ("-CMDQ-", "\"", $string);
	return ($string);
};


// fcm_decode_htmlfull
// Inverse of fcm_recode_html, plus unspecialchars without htmlentities.
// We don't use fcm_unspecialchars because it applies htmlentities and
// we don't change fcm_unspecialchars because we don't want to change the
// so called API.
function fcm_decode_htmlfull ($string) {
  $string = str_replace ("-CMGT-", "<", $string);
  $string = str_replace ("-CMLT-", ">", $string);
  //$string = str_replace ("&amp;CMAMP;", "&", $string);
  $string = str_replace ("-CMDQ-", "\"", $string);
	$trans_tbl = get_html_translation_table (HTML_SPECIALCHARS);
	$trans_tbl = array_flip ($trans_tbl);
	return strtr ($string, $trans_tbl);
};


// fcm_truncate_string
// This function does a quick and dirty string truncation
// taking care of not spliting double-byte characters.
// However, it can also delete the last character of single-byte
// strings if the last character is an extended character.
function fcm_truncate_string ($string, $strmaxlen) {
  if (strlen ($string) > $strmaxlen) {
    $str_bmb = false;
    $str_mmb = false;
    for ($cm_sc = 0; $cm_sc < $strmaxlen; $cm_sc++)  {
      if (ord ($string[$cm_sc]) < 128) {
        $str_bmb = false;
        $str_mmb = false;
      }
      else {
        if ((!$str_bmb) && (!$str_mmb)) {
          $str_bmb = true;
        }
        elseif ((!$str_bmb) && ($str_mmb)) {
            $str_bmb = true;
            $str_mmb = false;
        }
        elseif (($str_bmb) && (!$str_mmb)) {
            $str_bmb = false;
            $str_mmb = true;
        }
      }
    }
    if ($str_bmb) {
      $string = substr ($string, 0, ($strmaxlen - 1));
    }
    else {
      $string = substr ($string, 0, $strmaxlen);
    }
  }
	return ($string);
}


// fcm_remove_accents
// Based on removeaccents function posted in php.net by "hotmail - marksteward".
function fcm_remove_accents ($string){
return strtr(
 strtr($string,
  'ŠŽšžŸÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÑÒÓÔÕÖØÙÚÛÜÝàáâãäåçèéêëìíîïñòóôõöøùúûüýÿ',
  'SZszYAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy'),
 array('Þ' => 'TH', 'þ' => 'th', 'Ð' => 'DH', 'ð' => 'dh', 'ß' => 'ss',
  'Œ' => 'OE', 'œ' => 'oe', 'Æ' => 'AE', 'æ' => 'ae', 'µ' => 'u'));
}


// fcm_recode_URIs
// Checks all lines in the $cm_markup_string and verify if there is $cm_argument (usually href=" or src="),
// if yes, it extracts the URL and decide if add a call to getfile.php or redir.php to it.
// This function is used to rewrite the URLs of user entered URLs in links or images references.
// There should be a better way to do it using regexps...
function fcm_recode_URIs ($cm_markup_string, $cm_path, $cm_argument) {
  $cm_lines = explode ("\n", $cm_markup_string);
  $cm_newline = "";
  $cm_argument = strtolower ($cm_argument);
  $cm_arglen = strlen ($cm_argument);
  foreach ($cm_lines as $cm_currentline) {
    if (($cm_currentline != "") && ($cm_currentline != "\r") && ($cm_currentline != "\n")) {
      $cm_mkposn = 0;
      $cm_mkposb = (int) @strpos (strtolower ($cm_currentline), $cm_argument, $cm_mkposn);
      $cm_mkpose = (int) @strpos (strtolower ($cm_currentline), "\"", $cm_mkposb + $cm_arglen);
      $cm_ctpos = (int) @strpos (strtolower ($cm_currentline), ">", $cm_mkposb + $cm_arglen);
      if ($cm_ctpos < $cm_mkpose) { $cm_mkpose = $cm_ctpos; }
      while (($cm_mkposb && $cm_mkpose) && ($cm_mkpose > $cm_mkposb)) { 
        $cm_url = substr ($cm_currentline, ($cm_mkposb + $cm_arglen), ($cm_mkpose - ($cm_mkposb + $cm_arglen)));
          if (eregi ('http:|https:', $cm_linkurl)) {
            $cm_url = "redir.php?cm_elink=" . $cm_url;
          }
          elseif (($cm_url == "") || strpos ($cm_url, ":") || (strpos ($cm_url, "getfile.php?cm_path=") === 0) || (strpos ($cm_url, "redir.php?cm_elink=") === 0)) {
            $cm_mkposn = $cm_mkpose + 1; 
          }
          else {
            $cm_url = "getfile.php?cm_path=$cm_path&cm_file=" . $cm_url; 
          } 
          $cm_currentline = substr ($cm_currentline, 0, ($cm_mkposb + $cm_arglen)) . $cm_url . substr ($cm_currentline, $cm_mkpose);
          $cm_mkposb = (int) @strpos (strtolower ($cm_currentline), $cm_argument, $cm_mkposn);
          $cm_mkpose = (int) @strpos (strtolower ($cm_currentline), "\"", $cm_mkposb + $cm_arglen);
          $cm_ctpos = (int) @strpos (strtolower ($cm_currentline), ">", $cm_mkposb + $cm_arglen);
          if ($cm_ctpos < $cm_mkpose) { $cm_mkpose = $cm_ctpos; }
      }
    }
    $cm_newline = $cm_newline . $cm_currentline . "\n";
  }
	return ($cm_newline);
};


// fcm_secure_html
// Neutralize some html tags considered dangerous or useless.
function fcm_secure_html ($string) {
  $string = preg_replace ("/<script.*?<\/script>/is", "", $string);
  $string = preg_replace ("/<iframe.*?<\/iframe>/is", "", $string);
  $string = preg_replace ("/<frameset.*?<\/frameset>/is", "", $string);
  $string = preg_replace ("/<embed.*?<\/embed>/is", "", $string);
  $string = preg_replace ("/<applet.*?<\/applet>/is", "", $string);
  $string = preg_replace ("/<object.*?<\/object>/is", "", $string);
  $string = preg_replace ("/<style.*?<\/style>/is", "", $string);
  $string = preg_replace ("/<head.*?<\/head>/is", "", $string);
  $string = preg_replace ("/<title.*?<\/title>/is", "", $string);
  $string = preg_replace ("/<link.*?>/is", "", $string);
  $string = preg_replace ("/<sound.*?>/is", "", $string);
  $string = preg_replace ("/<bgsound.*?>/is", "", $string);
  $string = preg_replace ("/<meta.*?>/is", "", $string);
  $string = preg_replace ("/<body.*?>/is", "", $string);
	return ($string);
};


// fcm_htmlentity
function fcm_htmlentity ($string) {
	return (htmlspecialchars ($string));
};


// fcm_unhtmlentities
// This function is the inverse of the PHP's htmlentities function.
// Used to decode the encoded RDF/RSS data stored in the database and to decode
// data send to the pie-graph generating routine.
function fcm_unhtmlentities ($string) {
	$trans_tbl = get_html_translation_table (HTML_ENTITIES);
	$trans_tbl = array_flip ($trans_tbl);
	return strtr ($string, $trans_tbl);
};


// fcm_unspecialchars
// This function apply the htmlentities to a string, then
// reconvert the special chars (ampersand, quotes, greater than, lesser than)
// back to its normal representation. This function is used to convert
// names with international characters but will keep the already converted
// characters. This is useful when we know that the string won't have
// special chars, except those from a previous conversion.
function fcm_unspecialchars ($string) {
  $string = htmlentities ($string);
	$trans_tbl = get_html_translation_table (HTML_SPECIALCHARS);
	$trans_tbl = array_flip ($trans_tbl);
	return strtr ($string, $trans_tbl);
};


// fcm_urlencode
// Apply URL encoding to a string, but avoid replacing 
// forward-slashes and colons, so
// the URL can be interpreted by the browser. This is useful when 
// generating links for files with international characters.
function fcm_urlencode ($cm_ue) {
  $cm_ue = rawurlencode ($cm_ue);
  $cm_ue = str_replace ("%2f", "/", $cm_ue);
  $cm_ue = str_replace ("%2F", "/", $cm_ue);
  $cm_ue = str_replace ("%3a", ":", $cm_ue);
  $cm_ue = str_replace ("%3A", ":", $cm_ue);
  return ($cm_ue);
}


// fcm_curdate_string
// Returns the current date in a string formated as
// 2002-10-22 01:35:14
function fcm_curdate_string () {
  global $timezone;
  return (date("Y-m-d H:i:s", mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y"))));
}


// fcm_diffdate_days
// Returns the difference in days of the current day and given date
// (both formated as 2002-10-22 01:35:14.
function fcm_diffdate_days ($cm_givendate) {
  return round ((date ("U") - mktime (substr ($cm_givendate, 11, 2), substr ($cm_givendate, 14, 2), substr ($cm_givendate, 17, 2), substr ($cm_givendate, 5, 2), substr ($cm_givendate, 8, 2), substr ($cm_givendate, 0, 4))) / 86400);
}



// fcm_user_names
// Retrieves the long name of a user and return it as an
// array. Element 0 is shortname, 1 is first name, 2 is surnames.
// If the user no longer exist, 0 is false, 1 and 2 are warning strings.
function fcm_user_names ($cm_username) {
  global $cm_text;
  $result9 = db_query("select kurz, vorname, nachname from " . CM_PP_PREFIX . "users where kurz = '$cm_username'") or db_die();
  $row9 = db_fetch_row($result9);
  if (!$row9) {
    $rowX[0] = false;
    $rowX[1] = $cm_text["unknownuser"];
    $rowX[2] = $cm_text["unknownuser"];
    return ($rowX);
  }
  return ($row9);
}


// fcm_group_names
// Retrieves the long name of a group and return it as an
// array. Element 0 is shortname, 1 is long name.
// If the group no longer exist, 0 is false, 1 is a warning string.
// If the group to search is an empty string, 0 and 1 are empty strings.
// If the setup is groupless, 0 and 1 are empty strings.
function fcm_group_names ($cm_groupname) {
  global $cm_text, $groups;
  if (($cm_groupname) && ($groups)) {
    $result9 = db_query("select kurz, name from " . CM_PP_PREFIX . "gruppen where kurz = '$cm_groupname'") or db_die();
    $row9 = db_fetch_row($result9);
     if (!$row9) {
      $rowX[0] = false;
      $rowX[1] = $cm_text["unknowngroup"];
      return ($rowX);
    }
    return ($row9);
  }
  else {
    $rowX[0] = "";
    $rowX[1] = "";
    return ($rowX);
  }
}


// fcm_default_group
// Retrieves the long name of the default group and return it as an
// array. Element 0 is shortname, 1 is long name.
// If the group 1 don't exist the first available group is returned, if there is
// no next valid group the function returns 0 as false, 1 as a warning string.
// If the setup is groupless, 0 and 1 are empty strings.
function fcm_default_group () {
  global $cm_text, $groups;
  if ($groups) {
    $result9 = db_query("select kurz, name from " . CM_PP_PREFIX . "gruppen where ID=1") or db_die();
    $row9 = db_fetch_row($result9);
    if (!$row9) {
      $result9 = db_query("select kurz, name from " . CM_PP_PREFIX . "gruppen") or db_die();
      $row9 = db_fetch_row($result9);
      if (!$row9) {
        $rowX[0] = false;
        $rowX[1] = $cm_text["unknowngroup"];
        return ($rowX);
      }
    }
    return ($row9);
  }
  else {
    $rowX[0] = "";
    $rowX[1] = "";
    return ($rowX);
  }
}


// fcm_get_viewergroup 
// It returns the group ID and name of a given path. If the group is not found
// (if it no longer exists) or if empty or if it is the root dir, returns the
// default group.  
function fcm_get_viewergroup ($cm_path) {
  if ($cm_path && ($cm_path <> "/")) { 
    $result2 = db_query("select cmdb_directory, cmdb_viewer_group from " . CM_DB_PREFIX . "content3 where cmdb_directory like '$cm_path' and cmdb_type like '%" . CM_HITTYPE_PAGE . "%'") or db_die();
    $row2 = db_fetch_row($result2);
    if ($row2) {
      $result9 = db_query("select kurz, name from " . CM_PP_PREFIX . "gruppen where kurz='" . $row2[1] . "'") or db_die();
      $row9 = db_fetch_row($result9);
      if ($row9) {
        return ($row9);
      }
      else {
        return (fcm_default_group ());
      }
    }
    else {
      return (fcm_default_group ());
    }
  }
  else {
    return (fcm_default_group ());
  } 
};



// fcm_swap_rowcolor
// Takes the value of $cm_curcolor and switch it to $cm_color1 
// or $cm_color2 (it will alternate between both). This is used
// to swap color classes for listings.
function fcm_swap_rowcolor ($cm_curcolor, $cm_color1, $cm_color2) {
  if ($cm_curcolor == $cm_color1) {
    $cm_curcolor = $cm_color2;
  }
  else {
    $cm_curcolor = $cm_color1;
  }
  return ($cm_curcolor);
}


// fcm_is_cleditable
// Check if a content-less item is editable according to the
// user permissions (if user is the owner or superuser or someone
// with editing permissions, the content-less item is editable).
// If the item is not content-less, returns false.
function fcm_is_cleditable ($cm_path, $cm_username, $cm_type) {
  if (stristr ($cm_type, CM_HITTYPE_CONTENTLESS)) {
    if (fcm_check_constraints (CM_SEC_CHANGE, $cm_username, $cm_path)) {
      $cm_cledit = false;
    }
    else {
      $cm_cledit = true;
    }
  }
  else {
    $cm_cledit = false;
  }
  return ($cm_cledit);
}



// fcm_val_droplist
// It creates a drop list for a html form using the values in the array
// $cm_dropvalues and presetting the default in $cm_defvalue. The name of the
// select input element is passed in $cm_dropname.
function fcm_val_droplist ($cm_dropname, $cm_dropvalues, $cm_defvalue) {
  echo "<select class=\"cms\" name=\"$cm_dropname\">\n";
  foreach ($cm_dropvalues as $cm_dropval) {
    echo "<option class=\"cms\" value=\"$cm_dropval\"";
    if ($cm_defvalue == $cm_dropval) {
      echo " selected";
    }
    echo ">$cm_dropval</option>";
  }
  echo "</select><br>\n";
}


// fcm_check_logoimage
// It will check if the logo image file exists, if its dimensions are 
// conforming and its size is not too big. The return code is stored in
// the first element of an array. The dimensions of the image are stored
// in the second (X) and third (Y) element. The fourth and fifth elements
// are the corrected X and Y (adjusted to the max allowed).
// The return codes are as follow:
// 0000000 = Ok
// 0000001 = Too wide
// 0000010 = Too high
// 0000100 = Too wide * 2
// 0001000 = Too high * 2
// 0010000 = Invalid file or corrupted
// 0100000 = Too big (kbytes)
// 1000000 = No image
function fcm_check_logoimage ($cm_currentpath, $cm_logoimage) {
  global $cm_text, $cm_mainroot, $cm_doclogo_width, $cm_doclogo_height;
  $cm_logo_code[0] = 0;
  $cm_logo_code[1] = 0;
  $cm_logo_code[2] = 0;
  $cm_logo_code[3] = 0;
  $cm_logo_code[4] = 0;
  if ($cm_logoimage) {
    $cm_logoimage = $cm_mainroot . $cm_currentpath . "/" . $cm_logoimage;
    if (file_exists ($cm_logoimage)) {
      $cm_logo_size = getimagesize ($cm_logoimage);
      $cm_logo_X = $cm_logo_size [0];
      $cm_logo_Y = $cm_logo_size [1];
      $cm_logo_code[1] = $cm_logo_X;
      $cm_logo_code[2] = $cm_logo_Y;
      $cm_logo_code[3] = $cm_logo_X;
      $cm_logo_code[4] = $cm_logo_Y;
      $cm_logo_K = filesize ($cm_logoimage);
      if ($cm_logo_X > $cm_doclogo_width) {
        $cm_logo_code[0] += 1;
        $cm_logo_code[3] = $cm_doclogo_width;
      }
      if ($cm_logo_Y > $cm_doclogo_height) {
        $cm_logo_code[0] += 2;
        $cm_logo_code[4] = $cm_doclogo_height;
      }
      if ($cm_logo_X > ($cm_doclogo_width * 2)) {
        $cm_logo_code[0] += 4;
      }
      if ($cm_logo_Y > ($cm_doclogo_height * 2)) {
        $cm_logo_code[0] += 8;
      }
      if (($cm_logo_X == 0) || ($cm_logo_Y == 0)) {
        $cm_logo_code[0] += 16;
      }
      if ($cm_logo_K > CM_MAX_LOGO_SIZE) {
        $cm_logo_code[0] += 32;
      }
    }
    else {
      $cm_logo_code[0] = 64;
    }
  }
  return ($cm_logo_code);
};


// fcm_warn_logoimage
// It will call fcm_check_logoimage and if the return code is not zero
// it will display some error message.
function fcm_warn_logoimage ($cm_currentpath, $cm_logoimage, $cm_ischk_enabled) {
  global $cm_text, $cm_doclogo_width, $cm_doclogo_height;
  if ($cm_logoimage && $cm_ischk_enabled) {
    $cm_logo_status = fcm_check_logoimage ($cm_currentpath, $cm_logoimage);
    if ($cm_logo_status[0] & 64) {
      fcm_message ($cm_text["logodontexist"], CM_MSGSTYLE_WARNING);
    }
    else {
      if (($cm_logo_status[0] & 4) || ($cm_logo_status[0] & 8)) {
        fcm_message ($cm_text["logotoobig"] . " (" . $cm_logo_status[1] . "x" . $cm_logo_status[2] . ">" . $cm_doclogo_width . "x" . $cm_doclogo_height . ")", CM_MSGSTYLE_WARNING);
      }
      elseif (($cm_logo_status[0] & 16)) {
        fcm_message ($cm_text["logoiszero"], CM_MSGSTYLE_WARNING);
      }
      if ($cm_logo_status[0] & 32) {
        fcm_message ($cm_text["logotooheavy"] . " (&lt;" . CM_MAX_LOGO_SIZE . ")", CM_MSGSTYLE_WARNING);
      }
    }
  }
};




?>