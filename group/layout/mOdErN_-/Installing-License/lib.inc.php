<?php
// lib.inc.php - PHProjekt Version 4.2
// copyright  ©  2000-2004 Albrecht Guenther  ag@phprojekt.com
// www.phprojekt.com
// Author: Albrecht Guenther         

//***************
// include config
// fetch parameters from config.inc.php - could be placed in the PHProjekt root or two levels above = outside the webroot!
// only avoid including the config if the setup routine is active ...
if (!defined("setup_included")) {
  $config_path = $path_pre."config.inc.php";  
  // set config path for files in subdir
  $config_loaded = include_once("./$config_path"); 
  // if the config.inc.php file is not in the root directory, serch two levels above 
  if(!$config_loaded) {    
    $config_loaded2 = include_once("../../$config_path");
    // oh, it cna't be found there either? -> die with panic message
    if (!$config_loaded2) die("panic: config.inc.php doesn't exist!! Did you backup it after installation? ...<br>(If you run this tool for the first time: please read the file INSTALL in the PHProjekt root directory)"); 
  }
} 
        
// set time
$dbTSnull = date("YmdHis", mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y")));

// ****************************
// set variables and contstants
// ****************************
// set include path.
$var_ini_set = ini_set('include_path','./');
// parse transmitted variables
$include_path = $path_pre.'lib/gpcs_vars.inc.php';
include_once $include_path; 
// change path if a script from a subdir is calling ...
$lang_path = $path_pre.'lang';                                                                                   
$lib_path = $path_pre.'lib';
$img_path = $path_pre.'img';
// set constant to ensure that the lib is included (especially for those who want to access a script directly)                   
define ('lib_included','1'); 
// define db_prefix
define ('DB_PREFIX',$db_prefix);
                  

// ******************
// error and security
// ******************
// define the error level
if (!isset($error_reporting_level) or !$error_reporting_level) { error_reporting(0); }
else { error_reporting( E_ALL & ~E_NOTICE); }
// avoid this d... error warning since it does not affect the scritps here
$var_ini_set = ini_set("session.bug_compat_42", 1);
$var_ini_set = ini_set("session.bug_compat_warn", 0);

// check whether $path_pre doesn't redirect to some outer place
if (isset($path_pre) and $path_pre <> "./" and $path_pre <> "../" and $path_pre <> "../../") { die("You are not allowed to do this"); }

// limit session to a certain time [minutes]
if ($session_time_limit) {
  if (!$sess_begin) {
    $sess_begin = time();
    reg_sess_vars(array("sess_begin"));
  }
  else {
    $now = time();
    if (($now - $sess_begin) > ($session_time_limit*60)) {
      session_unset();
      $indexpath = $path_pre."index.php";
      die ("<a href='$indexpath' target='_top'>$index_text5!</a>");
    }
    else {
      $sess_begin = $now;
      reg_sess_vars(array("sess_begin"));
    }
  }
}
   
// ************
// db functions
// ************
include_once("$lib_path/db/$db_type.inc.php"); 
// ************
            
// ****************
// string functions
// ****************
// safe HTML output
function html_out($outstr){
	// allowed tags - no attributes! 
	// Caution! Write br before b, ul before u ... 
	//          because of the RegExp!!
	$tags = "p|br|b|i|ul|u|ol|li|strong|em";
	// allowed tags - attributes allowed 
	$tags2 = "font";
  if ($outstr <> "") {
	$outstr = ereg_replace("'","&#39;",htmlspecialchars($outstr,ENT_NOQUOTES));
	$outstr = preg_replace("/&lt;($tags).*?&gt;/i", '<\1>', $outstr); 
	$outstr = preg_replace("/&lt;(($tags2).*?)&gt;/i", '<\1>', $outstr); 
	$outstr = preg_replace("/&lt;\\/($tags|$tags2)&gt;/i", '</\1>', $outstr); 
}
	return $outstr;
}

// the same specialy for hidden form fields and select field option values (uev -> UrlEncodedValues)
function uev_out($outstr){return ereg_replace("'","&#39;",htmlspecialchars(urlencode($outstr)));}  #

// here we will build the iso format from a timestamp, e.g. 20040115235912 will be 2004-01-15 23.59
function show_iso_date1($date) { return substr($date,0,4)."-".substr($date,4,2)."-".substr($date,6,2)." ".substr($date,8,2).":".substr($date,10,2); }
function show_iso_date2($date) { return substr($date,0,4)."-".substr($date,4,2)."-".substr($date,6,2); }


// quotation related string treatment for arrays
  // to call with array_walk()                                                                                                             
// function arr_addsl(&$item,$key){$item = addslashes($item);}
   // is moved to gpcs_vars.inc.php because used before loading lib.inc.php                                                                     
function arr_stripsl(&$item,$key){$item = stripslashes($item);}
function arr_dequote(&$item,$key){$item = addslashes(ereg_replace('^\"|\"$','',$item));}

// change colours in list view
function tr_tag ($dblclick,$parent="",$rec_id=0) {   

  global $cnr, $bgcolor1, $bgcolor2, $bgcolor_mark, $bgcolor_hili, $tr_hover;
  // alternate bgcolor
  if (($cnr/2) == round($cnr/2)) { $color = "$bgcolor1"; $cnr++;}
  else { $color = "$bgcolor2"; $cnr++; }
  // highlight table rows?                                                                                                                      
  // highlight and marker in table rows
	if($rec_id) $str_mark = " onClick=\"marker(this,$rec_id,'$color','$bgcolor_mark')\"";
  if ($tr_hover) { $tr_hover_on = "onmouseover=\"hili(this,$rec_id,'$bgcolor_hili')\" onmouseout=\"hili(this,$rec_id,'$color')\" onDblClick=\"".$parent."location.href = '$dblclick'\"".$str_mark.";"; }
  else { $tr_hover_on = ''; }                                                                                                 
  // html output
  echo "<tr bgcolor=$color $tr_hover_on>\n";
}
// how many records on one page should be displayed? 
$perpage_values = array("10","20","30","50","100");  

            
// ***************************
// Authentication and settings
// ***************************   
// array with available languages - this array is needed for the next action
$languages = array("al","ba","br","ct","cz","da","de","ee","en","es","fi","fr","gr","he","hu","is","it","ko","jp",
                   "lt","lv","nl","no","pl","pt","ro","ru","se","si","sk","tr","tw","zh");
// fetch user data
// pass this check only it the constant 'avoid_auth' is set in the script
if (!defined("avoid_auth")) { include_once("$lib_path/auth.inc.php"); } 
// end authentication
// ***************  
                            
// *************
// date and time
function today(){
  global $year, $month, $day, $timezone;
  $year  = date("Y", mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y"))); 
  $month = date("m", mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y"))); 
  $day   = date("d", mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y"))); 
}

// *************
// language part
// *************
// language given? -> include language file
if ($langua) { include_once("$lang_path/$langua.inc.php"); }
// determine language for login and -if no language is given in the db- further on
else { 
  // determine language of browser
  $langua = getenv("HTTP_ACCEPT_LANGUAGE");
  // special patch for canadian users
  if (eregi('ca',$langua)) {
    if (eregi('en',$langua)) { $langua = 'en'; $found = 1; } // english canadian
    if (eregi('fr',$langua)) { $langua = 'fr'; $found = 1; } // french canadian
  }
  // special patch for user with konqueror :-)
  elseif (eregi('queror',$langua)) { $langua = 'en'; $found = 1; }
  // otherwise loop over all available languages
  else {
    foreach($languages as $langua1) {
      if (eregi($langua1,$langua)) {
        $langua = $langua1; $found = 1;
      }
    }
  }
  // include the found language
  if ($found) { include_once("$lang_path/$langua.inc.php"); }
  // nothing found? -> take english
  else { $langua = "en"; include_once("$lang_path/en.inc.php"); }
}
// default direction of text, will be overwritten by certain languages
$dir_tag = "dir=\"ltr\"";
// set charset
if     (eregi('pl|cz|hu|si',$langua)) { $lcfg = 'charset=iso-8859-2'; } 
elseif ($langua=='sk') {                $lcfg = 'charset=windows-1250'; }
elseif ($langua=='ru') {                $lcfg = 'charset=windows-1251'; }
elseif ($langua=='he') { $dir = 'rtl';  $lcfg = 'charset=windows-1255'; }
elseif (eregi('lv|lt|ee',$langua)) {    $lcfg = 'charset=windows-1257'; } 
elseif ($langua=='tw') { $lcfg = 'charset=big5'; }
elseif ($langua=='zh') { $lcfg = 'charset=gb2312'; }
elseif ($langua=='jp') { $lcfg = 'charset=EUC-JP'; }
if ($lcfg <> '') { $lang_cfg = "<meta http-equiv=\"Content-Type\" content=\"text/html; $lcfg\">"; }

// assign help files
// list all languages without own help files, they have to take english
  if (eregi('br|da|ee|he|hu|is|jp|ko|lt|lv|no|pl|pt|ru|se|sk',$langua)) { $doc = $path_pre.'/help/en'; }
  elseif ($langua=='tw') { $doc = $path_pre.'/help/zh'; }
  // assuming catalan users would like to read spanish help  :)
  elseif ($langua=='ct') { $doc = $path_pre.'help/es'; }
  // the rest gets their own help files
  else { $doc = $path_pre.'help/'.$langua; }
// end help files    
// end language definitions
// ************************

// ******
// layout
// ******
// skins & css
// include the chosen skin
$css_loaded = @include_once($path_pre.'layout/'.$skin.'/'.$skin.'.php'); 
//fallback to default layout doesn't exist anymore
if (!$css_loaded) {
  include($path_pre.'layout/default/default.php'); 
  $skin='default';
}
// Determine OS for style sheet
$css_style = def_style(); 
// end skins & css

// ****************                                                                                                 
// menu & separator

  // separation bar
function solidbar($width=200, $height=1) { return ('<img src="'.$GLOBALS['img_path'].'/s.gif" width='.$width.' height='.$height.' hspace=0 vspace=0>'); } 

  // show a module related submenu
function submenu($menubar,$width = 200){                                                                                                                       
  echo "<table width=$width cellpadding=2 border=0><tr>";
  foreach($menubar as $but){
    echo"<td id=m".($but[0]?"h":"l")."><a id=m".($but[0]?"h":"l")." href=\"$but[1]\">$but[2]</a></td>\n";
  }
  echo"</tr></table>";
}
// end submenu and separator

// perpage values
if (!$perpage) {
  if ($start_perpage) { $perpage = $start_perpage; }
  else { $perpage = "30"; }    
}                                                                                                                    

// sets a form element element (in fact: all elements of a form) to inactive                         
function read_o($read_o, $type='disabled') {
  global $bgcolor3;
  if ($read_o == 0) return '';
  else { 
    if ($type == 'readonly') { return " readonly style='background-color:$bgcolor3;'"; }
    else { return " disabled style='background-color:$bgcolor3;'"; }
  }
}

// end layout
// **********

// group string for sql queries
if ($user_group) { $sql_user_group = "(gruppe = '$user_group')"; }
// all groups available for e.g. admin root, must be true in all cases
else { $sql_user_group = "(1 = 1)"; }

// transmit PHPSESSID in GET-strings if needed (no cookies) only
$sid = (SID?"&".SID:"");


// *********************
// show elements of tree
// this function returns the level of an select-element - useful to indent elements in a list
// parameter: table and column name, $query, $access column, order by, value of element to show as selected, name of parent column, exclude the selected ID select children?
function show_elements_of_tree($table,$name,$query,$acc,$order,$sel_record,$parent,$exclude_ID=0) {
  global $records, $selected_record, $db_table, $children;
  $records = array(); 
  $children = array();                       
  $db_table = $table;
  $selected_record = $sel_record;      
  $result = db_query("select ID,$acc,$parent,$name 
                        from ".DB_PREFIX."$table 
                             $query 
                             $order") or db_die(); 
  while ($row = db_fetch_row($result)) { 
    if ($row[0] <> $exclude_ID) {
      $record = array();           
      // first element will be an array which keeps the children of this record
      foreach ($row as $element) { $record[] = $element; }  
      // ... one array for the main records ...
      if ($row[2] == 0 or !$row[2]) {$mainrecords[] = $record[0]; }   
      // ... one array which keeps all elements below the current record
      else { $children[$row[2]][] = $row[0]; }
      // ... and one for all records :)
      $records[$record[0]] = $record;
    }                            
  }        
  // end of creating the arrays, now loop over them and display them in the select box         
  if ($mainrecords) foreach($mainrecords as $mainrecID) { show_elem2($mainrecID); } 
}       
                                           

function show_elem2($ID) { 
  global $db_table, $indent, $user_kurz, $user_access, $subdirs, $selected_record, $records, $children; 
                          
  // additional conditions for some modules
  switch ($db_table) {
    // if the table is table projects, check whether the user is a participant of the project
    case "projekte":
        $allowed = 1;      
      break;
    case "contacts":
      // last name, first name in the select box gives a better distinction
      $records[$ID][3] = $records[$ID][3].",".$records[$ID][4];
      // if a company record is given, include him as well
      if ($records[$ID][5] <> '') $records[$ID][3] .= ' ('.$records[$ID][5].')';
      // since in the query the permission is already included we don't need another criterium
      $allowed = 1;
      break; 
    case "dateien":               
      $records[$ID][3] = ereg_replace("§"," ",$records[$ID][3]); 
      $allowed = 1;   
      break;
    case 'notes': $allowed = 1;
      break;
  }             
  // first show the records itself if access is allowed
  if ($allowed == 1) {
    echo "<option value='".$records[$ID][0]."'";
    if ($records[$ID][0] == $selected_record) { echo " selected"; }
    echo ">";
    for ($i = 1; $i <= $indent; $i++) { echo "&nbsp;&nbsp;"; }
    echo $records[$ID][3]."\n";  
  }                              

  // look for subelements
  if ($children[$ID][0] > 0) {
    foreach ($children[$ID] as $child) {
      $indent++;
      show_elem2($child);
      $indent--;
    }         
  }  
}
// end show elements of tree
// *************************

// adds hidden fields to some forms
//   - for modules that have different forms for create and modify data
$view_param = array('up'=>$up,'sort'=>$sort,'perpage'=>$perpage,'page'=>$page,'filter'=>$filter,'keyword'=>$keyword,'direction'=>$direction);                    
function hidden_fields($hid){
  if( SID ) { $hid['PHPSESSID'] = $GLOBALS['PHPSESSID']; }
  foreach($hid as $key=>$value) { $str .= "<input type=hidden name='".$key."' value='".$value."'>\n"; }
  return $str;  
}

// routine to check which access status the user has concerning a module and according to his role
function check_role($module) {
  global $user_ID;
  $result = db_query("select ".DB_PREFIX."roles.ID, $module 
                        from ".DB_PREFIX."roles, ".DB_PREFIX."users 
                       where ".DB_PREFIX."users.role = ".DB_PREFIX."roles.ID and 
                             ".DB_PREFIX."users.ID = '$user_ID'") or db_die();
  $row = db_fetch_row($result);
  // is there a role for this user?
  if ($row[0] > 0) {
    // return the numeric value of the status: 0 = no access, 1 = read, 2 = write
    return $row[1];
  }
  // otherwise give him the full rights
  else { return "2"; }  
}    

// simple select form for export options
function show_export_form($file) { 
  global $img_path, $print, $exp1, $keyword, $filter, $firstchar, $sort, $up, $month, $year, $anfang, $ende, $pdf_support, $PHPSESSID;
  $hidden = array('file'=>$file,'PHPSESSID'=>$PHPSESSID,'filter'=>$filter,'keyword'=>$keyword,'firstchar'=>$firstchar,'up'=>$up,'sort'=>$sort,'month'=>$month,'year'=>$year);
  if ($file == "project_stat") {  $hidden = array_merge(array('anfang'=>$anfang,'ende'=>$ende), $hidden); }
  echo "<form action='../misc/export.php' method=post>\n";
  echo hidden_fields($hidden);  
  echo "$exp1: <select name=medium>\n";   
  if ($pdf_support) echo "<option value=pdf>PDF\n";
  echo "<option value=xml>XML\n";
  echo "<option value=html>HTML\n";  
  echo "<option value=csv>CSV\n";
  echo "<option value=xls>XLS\n";    
  echo "<option value=rtf>RTF\n";
  echo "<option value=doc>DOC\n";  
  echo "<option value=print>$print\n";          
  echo "</select> <input type=image src='$img_path/los.gif' border=0 id=tr></form>&nbsp;";
}

// this function gets the OS of the browser and chooses the appropiate css file
function def_style() {
  global $HTTP_USER_AGENT, $path_pre, $skin;
  // mac platform ...
  if (eregi("mac", $HTTP_USER_AGENT)) { return $path_pre."layout/".$skin."/css/mac.css"; }
  // windows OS ...
  elseif (eregi("win", $HTTP_USER_AGENT)) {
    // special css for 4.x NN browsers
    if (eregi("4.7|4.6|4.5", $HTTP_USER_AGENT)) { return $path_pre."layout/".$skin."/css/nn4.css"; }
    // css for IE and opera
    else  { return $path_pre."layout/".$skin."/css/win.css"; }
  }
  // default layout - not very nice but could fit a bit at least
  else { return $path_pre."layout/".$skin."/css/common.css"; }
} // end find style sheet

// for ldap
function logit($message) {
	openlog("phprojekt", LOG_NDELAY|LOG_PID, LOG_USER);
	syslog(LOG_DEBUG, $message);
	closelog();
}


// for debugging :)
function get_mt(){ 
  list($usec, $sec) = explode(" ",microtime()); 
  return ((float)$usec + (float)$sec); 
}
function show_mt($begin) {
  list($usec, $sec) = explode(" ",microtime()); 
  echo 'This action tooks '.sprintf('%.4f', ((float)$usec + (float)$sec) - $begin).' sec';
}

// returns a set of name properties like last name, first or short name, either from the users or contacts table
function slookup($table = 'users', $values='nachname,vorname',$inputfield='ID',$value) {
  $result = db_query("select ".$values." 
                        from ".DB_PREFIX.$table." 
                       where ".$inputfield." = '".$value."'") or db_die();
  $row = db_fetch_row($result);
  if (count($row) < 2) { return $row[0]; }
  else return implode(',',$row);
}

// array with port types, will be used on several stages
// array for mail account types and ports
$port = array('pop3'=>'110/pop3','pop3s'=>'995/pop3s/ssl','pop3/NOTLS'=>'110/pop3/NOTLS',
              'pop3s NVC'=>'995/pop3s/ssl/novalidate-cert','imap'=>'143/imap','imap3'=>'220/imap3',
              'imaps'=>'993/imaps/ssl','imaps NVC'=>'993/imaps/ssl/novalidate-cert',                            
              'imap4-ssl'=>'585/imap4-ssl/ssl','imap/NOTLS'=>'143/imap/NOTLS','imap/NOVALIDATE'=>'143/imap/NOVALIDATE');         

function close_window() {
global $close_window; 
 return "<a href=\"Javascript:top.window.close()\">".$close_window."</a>\n";
}

// load class for sending e-mail                                                                                
// and initialize the objekt "$mail" - if needed
function use_mail($init=''){                                                                                      
	global $lib_path, $mail_mode, $mail_eoh, $mail_eol, $mail_auth, $local_hostname, 
  $smtp_hostname, $smtp_account, $smtp_password, $pop_hostname, $pop_account, $pop_password, $mail;

	include_once($lib_path.'/sendmail.inc.php'); 
	if($init){ 
		$mail = new send_mail($mail_mode, $mail_eoh, $mail_eol, $mail_auth, $local_hostname, $smtp_hostname, 
                          $smtp_account, $smtp_password, $pop_hostname, $pop_account, $pop_password);  
	}
}

// *****************
// history functions
// store the values of fields that have been changed in this record
function history_keep($table, $table_fields, $ID, $exclude_fields = '') {
  global $user_ID, $dbIDnull, $dbTSnull;
  if ($exclude_fields == '') $exclude_fields = array();
  else $exclude_fields = explode(',',$exclude_fields);                                                                                     
     
  foreach (explode(',',$table_fields) as $field) { 
    $last_value = slookup($table,$field,'ID',$ID);    
    if(!get_magic_quotes_runtime()) $last_value=addslashes($last_value);
     
    // exception: if the name of the field is 'acc_read' or 'acc', it must be compared with the variable $access
    ($field == 'acc_read') ? $new_value = $GLOBALS['access'] : $new_value = $GLOBALS[$field];
    // no action if it's a new value or one of the following field types: timestamp_* 
    if ((!$last_value and !$new_value) or in_array($field,$exclude_fields)) {}
    elseif ($last_value <> $new_value) { 
          $result = db_query("insert into ".DB_PREFIX."history 
                                 (   ID,        von    ,   _date,   _table,  _field,_record,  last_value,   new_value)
                          values ($dbIDnull,'$user_ID','$dbTSnull','$table','$field',   $ID ,'$last_value','$new_value')") or db_die();
    } 
  }  
}

function history_delete($table, $ID) {
  $result = db_query("delete from ".DB_PREFIX."history 
                       where _table = '$table' and
                             _record = '$ID'") or db_die();    
}

function history_show($table, $ID) {      
  global $fields, $roles_text3, $roles_text4, $datei_text6, $forms_23, $forms_23a, $forms_23b, $forms_23c, $forms_23d;
                        
  // build field array
  foreach($fields as $field_name => $field) { $formfields1[$field['form_name']] = $field_name; } 
  // add read and write access as well
  $form_fields = array_merge(array('$roles_text3'=>'acc',$roles_text3=>'acc_read',$roles_text4=>'acc_write'), $formfields1);
  $str = "<br><table cellpadding=2 cellspacing=0 border=1><tr><td colspan=5 align=center><b>$forms_23</b></td></tr>\n";
  $str .= "<tr><td>$datei_text6</td><td>$forms_23a</td><td>$forms_23b</td><td>$forms_23c</td><td>$forms_23d</td></tr>\n";
  $result = db_query("select  _date,_field,last_value,new_value,nachname,vorname 
                        from ".DB_PREFIX."history,".DB_PREFIX."users  
                       where ".DB_PREFIX."history.von = ".DB_PREFIX."users.ID and
                             _table = '$table' and
                             _record = '$ID'
                    order by _date desc") or db_die();                           
  while ($row = db_fetch_row($result)) {                  
    // check whether this field has a name in the form
    $form_name = array_search($row[1],$form_fields);                                                                                
    $form_name ? $fieldname = enable_vars($form_name) : $fieldname = $row[1];
    // if it is a serialized string, split it into an array
    $str .= "<tr><td>".show_iso_date1($row[0])."</td><td>".$fieldname."</td><td>".formatstring($row[2],100)."&nbsp;</td>";
    $str .= "<td>".formatstring($row[3],100)."&nbsp;</td><td>".$row[4].", ".$row[5]."</td></tr>\n";    
  }        
  $str .= '</table>';
  return $str;                    
}
// end history functions
// *********************   

function formatstring($string, $length) {
  // if it is serialized string ,return a list
  if (substr($string,-2) == ';}') $string = implode('<br>',unserialize($string));
  return substr($string,0,100);                                                                                                             
}

// *************
// header functions

function set_page_header() {
  return set_html_tag().set_head_tag().set_body_tag();
}  
/*function set_html_tag() {
  global $dir_tag, $langua, $lang_cfg;
  return "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n<html lang=\"".$langua."\" ".$dir_tag.">\n".$lang_cfg."\n"; 
}*/
/******************************** Paste contents below this line **************************************/
function set_html_tag() {
  global $dir_tag, $langua, $skin;
 // Altered by Mark Coudriet for Floating Menus
  if (strpos($skin,'_-')==true) {
	$header_type = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"><html lang=\"$langua\" $dir_tag>\n";
  }
  else {
 	$header_type = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"><html lang=\"$langua\" $dir_tag>\n"; 
  }
	return $header_type;
}
// End
/******************************** End of Paste ******************************************************/

function set_head_tag() {
  global $css_inc, $js_inc, $css_style, $path_pre; 
  $js_inc[] = " src=\"".$path_pre."lib/chkform.js\">";   
  $head = "<head>\n<link rel=stylesheet type='text/css' href='".$css_style."'>\n";  
  if ($css_inc) { foreach ($css_inc as $css) { $head .= "<style type=\"text/css\">".$css."</style>\n"; } }
  foreach ($js_inc as $js) { $head .= "<script type=\"text/javascript\" ".$js."</script>\n"; }  
  return $head."</head>\n";
}
/*function set_body_tag() {
  global $onload, $bgcolor3;
  $body = "<body  bgcolor=\"".$bgcolor3."\" ";
  if ($onload) {
    $body .= " onLoad = \""; 
    foreach ($onload as $load) { $body .= $load; }
    $body .= "\"";
  }
  return $body.">\n";   
}*/
/******************************** Paste contents below this line **************************************/
function set_body_tag() {
  global $onload, $bgcolor3, $skin, $startstring, $endstring, $rts_36, $directory, $choose_one, $path_pre;
  $body = "<body bgcolor=\"".$bgcolor3."\" ";
  if ($onload) {
    $body .= " onLoad = \""; 
    foreach ($onload as $load) { $body .= $load; }
    $body .= "\"";
  }
  $body.=">\n";
   // Altered by Mark Coudriet for Floating Menus
  //$requested = getenv('REQUEST_URI');
  //$requested = $GLOBALS['PHP_SELF'];
  $gh = $GLOBALS['REQUEST_URI'];
  $requested .= strpos($GLOBALS['PHP_SELF'],'o.php');
  $requested .= strpos($GLOBALS['PHP_SELF'],'calendar_control.php');
  $requested .= strpos($GLOBALS['REQUEST_URI'],'chat.php?mode=input');
  $requested .= strpos($GLOBALS['REQUEST_URI'],'admin.php?framenr=l');
  $requested .= strpos($GLOBALS['PHP_SELF'],'index.php');
  if ($requested != true && strpos($skin,'_-')==true) {
	    include_once ($path_pre."layout/".$skin."/includes/bodytag.inc.php");
	    //echo $path_pre."layout/".$skin."/includes/bodytag.inc.php";
		}
  return $body;   
}
/******************************** End of Paste ******************************************************/
// end header functions
// ********************

// prepare for htmlarea
if ($use_html_editor) {
  $js_inc[] = ">_editor_url = \"".$path_pre."lib/htmlarea/\"";
  $js_inc[] = " src=".$path_pre."lib/htmlarea/htmlarea.js>"; 
  $js_inc[] = " src=".$path_pre."lib/htmlarea/poupwin.js>";
  $js_inc[] = " src=".$path_pre."lib/htmlarea/dialog.js>";     
  $js_inc[] = " src=".$path_pre."lib/htmlarea/lang/en.js>"; 
  $js_inc[] = ">HTMLArea.loadPlugin(\"TableOperations\");";
  $js_inc[] = " src=".$path_pre."lib/html_config.js>";   
  $css_inc[] = "@import url(".$path_pre."lib/htmlarea/htmlarea.css)";
  $onload[] = "HTMLArea.replaceAll(config);";                                                                                                    
}

// supply the javascript script for the datepicker popup
function datepicker(){                                                                                                        
	global $lib_path, $name_month, $name_day2, $today, $dir_tag, $langua, $lang_cfg;
	$m = "m=".implode("_",$name_month);                                                                                                                           
	$d = "&d=".implode("_",$name_day2);
	$t = "&t=".$today;
	$h = "&h=<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"><html lang=\"".$langua."\" ".$dir_tag.">".$lang_cfg;
	echo"<script language='JavaScript'>\n";
	echo"var dTarget;\n";
	echo"function callPick(obj){\n";
	echo"dTarget = obj;\n";
	echo"var dp = window.open('".$lib_path."/datepicker.php?".$m.$d.$t.$h."','dp','left=200,top=200,width=230,height=210,toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=0');\n";
	echo"dp.focus();\n";
	echo"return false;\n";
	echo"}\n";                                                                                                                              
	echo"</script>\n";
}

function selector($selected, $exclude_ID){                                                                                                        
	global $lib_path; 
	echo"<script language='JavaScript'>\n";
	echo"var dTarget;\n";
	echo"function callPick2(obj1,obj2){\n";
	echo"dTarget = obj1;\n";
	echo"sTarget = obj2;\n";  
	echo"var dp = window.open('".$lib_path."/selector.php?selected=".$selected."&exclude_ID=".$exclude_ID."','dp','left=100,top=100,width=430,height=310,toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=0');\n";
	echo"dp.focus();\n";
	echo"return false\n";
	echo"}\n";
	echo"</script>\n";
}

// supply a random string, mostly used for a new filename
function rnd_string($length=12) {
  srand((double)microtime()*1000000);    
  $char = "123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMANOPQRSTUVWXYZ";
  $rnd_string = '';
  while (strlen($rnd_string) < $length) { $rnd_string .= substr($char,(rand()%(strlen($char))),1); }
  return $rnd_string;
}

// crypt string
function encrypt($password, $saltstring) {
  $salt = substr($saltstring, 0, 2);
  $enc_pw = crypt($password, $salt);
  return $enc_pw;
}

// preparation ... :)
function touch_record() {}

// **********                                                                                                                                                          
// contact box for large number of data
function select_contacts($contact_ID, $field_name, $exclude_ID=0) {                                                                                          
  global $user_ID, $user_kurz,$selected, $sql_user_group, $filter_maxhits, $field, $selected, $read_o, $img_path;    
	$selected      =$contact_ID;
  selector($selected, $exclude_ID);                  
  // first proof whether the table has a big amount of data 
  if ($filter_maxhits > 0) {                                                                                                                            
    $result = db_query("select count(ID) 
                          from ".DB_PREFIX."contacts
                         where (acc_read like 'system' or von = $user_ID or ((acc_read like 'group' or acc_read like '%\"$user_kurz\"%') and $sql_user_group))") or db_die();
    $row = db_fetch_row($result);
    $amount = $row[0];
  }
  else $amount = 0; 
    // end amount check, now decide which element to show       
    if ($filter_maxhits > 0  and $amount > $filter_maxhits) { 
    echo "<input type='hidden' name='".$field_name."' value='".$selected."'>\n";   
    echo "<input type='text' size=25 name='".$field_name."_2' value='".slookup('contacts','nachname,vorname','ID',$selected)."'";
    if ($field['form_tooltip'] <> '') { echo " title='".$field['form_tooltip']."'"; }                                                     
	  $elem_pick = ($read_o)?(""):("&nbsp;<a href='javascript://' onclick='callPick2(document.frm.".$field_name.",document.frm.".$field_name."_2)'><img src='".$img_path."/cont.gif' border=0></a>");
	  echo read_o(1,'readonly').">".$elem_pick."\n";              
  }
  // default case: show the usual select box with tree view
  else {   
    // special hack for forms - if the contact ID is given, mark this one as selected        
    echo "<select name='". $field_name."'";
    if ($field['form_tooltip'] <> '') { echo " title='".$field['form_tooltip']."'"; }
    echo read_o($read_o)."><option value=''>"; 
    show_elements_of_tree('contacts',
                          'nachname,vorname,firma',
                          "where (acc_read like 'system' or ((von = $user_ID or acc_read like 'group' or acc_read like '%\"$user_kurz\"%') and $sql_user_group))",
                          'acc_read'," order by nachname",$selected,'parent',$exclude_ID);  
    echo "</select>\n";
  }  
}
?>
