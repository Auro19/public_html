<?php

// show_tabs.inc.php - PHProjekt Version 4.1
// copyright  ©  2000-2003 Albrecht Guenther  ag@phprojekt.com
// www.phprojekt.com
// Author: Albrecht Guenther

// check whether lib.inc.php has been included
if (!defined("lib_included")) { die("Please use index.php!"); }

// array with the name of all basic modules
// scheme; internal name of module, external name
$mod_arr[] = array("summary","href='../index.php?module=summary$sid' target=$target>",$o_summary);
// Content Management System Include
if (file_exists($path_pre."cm")) $mod_arr[] = array("cms","href='../index.php?module=cms$sid' target=$target>",$o_news); 
if ($calendar and check_role("calendar") > 0)    $mod_arr[] = array("calendar","href='../index.php?module=calendar$sid' target=$target>",$o_calendar);
if ($adressen and check_role("contacts") > 0)    $mod_arr[] = array("contacts","href='../index.php?module=contacts$sid' target=$target>",$o_adresses);
if ($chat and check_role("chat") > 0)        $mod_arr[] = array("chat","href='../index.php?module=chat$sid' target=$target>" ,$o_chat);
if ($forum and check_role("forum") > 0) $mod_arr[] = array("forum","href='../index.php?module=forum$sid' target=$target>" ,$o_forum);
if ($dateien and check_role("filemanager") > 0)     $mod_arr[] = array("filemanager","href='../index.php?module=filemanager$sid' target=$target>",$o_files);
if ($projekte and check_role("projects") > 0)    $mod_arr[] = array("projects","href='../index.php?module=projects$sid' target=$target>",$o_projects);
if ($timecard and check_role("timecard") > 0)    $mod_arr[] = array("timecard","href='../index.php?module=timecard$sid' target=$target>",$o_timecard);
if ($notes and check_role("notes") > 0)       $mod_arr[] = array("notes","href='../index.php?module=notes$sid' target=$target>",$o_notes);
if ($rts and check_role("helpdesk") > 0)         $mod_arr[] = array("rts","href='../index.php?module=rts$sid' target=$target>",$o_rts);
if ($quickmail and check_role("mail") > 0)   $mod_arr[] = array("mail","href='../index.php?module=mail$sid' target=$target>",$o_mail);
if ($todo and check_role("todo") > 0)        $mod_arr[] = array("todo","href='../index.php?module=todo$sid' target=$target>" ,$o_todo);
if ($news and check_role("news") > 0)        $mod_arr[] = array("news","href='../index.php?module=news$sid' target=$target>",$o_news);

?>