<?php

/**********************************************************************************
* Help Center Live! – http://www.helpcenterlive.com 				  			  *
* by Digital Frontiers, UTO 							  						  *
***********************************************************************************
* Software Version: Help Center Live! v 2.1.7 					  				  *
* Software by: Digital Frontiers, UTO (http://www.helpcenterlive.com) 		      *
* Copyright 2008 by: Digital Frontiers, UTO (http://www.helpcenterlive.com) 	  *
* Support, News, Updates at: http://www.helpcenterlive.com 			  			  *
***********************************************************************************
* This program is free software; you may redistribute it and/or modify it under   *
* the terms of the provided license as published by Digital Frontiers, UTO. 	  *
* 										  										  *
* This program is distributed in the hope that it is and will be useful, but 	  *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE. 						  					  *
* 										  										  *
* See the "license.txt" file for details of the Help Center Live! license. 	 	  *
* The latest version can always be found at http://www.helpcenterlive.com. 	 	  *
***********************************************************************************
* File Comments:																  *
* his file is used to include the javascript files that we want to use			  *
**********************************************************************************/

    include_once('../include.php');
    $inc = new Includer();
    $inc->chat();
    $inc->live();
    $inc->operator();
    $inc->cobrowse();

    if (isset($_GET['opchat']) && isset($_GET['chatid'])) {
        $chatid = addslashes($_GET['chatid']);
    } elseif (isset($_GET['opchat']) && !isset($_GET['chatid'])) {
        $chatid = 'op_'.$GLOBALS['operator']->id();
    } else {
        if (isset($_GET['live']) || isset($_GET['cobrowse']) || isset($_GET['request'])) {
            $GLOBALS['live']->newvisitor();
            $chatid = $GLOBALS['live']->chatid();
        }
        if (isset($_GET['chat']) && isset($_GET['admin'])) {
            $chatid = addslashes($_GET['chatid']);
        } else {
            $GLOBALS['live']->newvisitor();
            $chatid = $GLOBALS['live']->chatid();
        }
        if (isset($_GET['monitor']) || isset($_GET['request'])) {
            $operatorid = $GLOBALS['operator']->id();
        }
    }

    $misc_flag = false;
    $image_flag = false;
    $monitor_flag = false;
    $live_flag = false;
    $cobrowse_flag = false;
    $request_flag = false;
    $chat_flag = false;
    $aardvark_flag = false;
    $xmlhttprequest_flag = false;

?>
<!--

<?php
    if (isset($_GET['misc'])) {
        $type = 'misc';
        if ($misc_flag !== true) {
            include_once('misc.php');
            $misc_flag = true;
        }
    }
    if (isset($_GET['monitor'])) {
        $type = 'monitor';
        if ($misc_flag !== true) {
            include_once('misc.php');
            $misc_flag = true;
        }
        if ($xmlhttprequest_flag !== true) {
            include_once('xmlhttprequest.php');
            $xmlhttprequest_flag = true;
        }
        if ($aardvark_flag !== true) {
            include_once('aardvark.php');
            $aardvark_flag = true;
        }
        if ($monitor_flag !== true) {
            include_once('monitor.php');
            $monitor_flag = true;
        }
    }
    if (isset($_GET['live'])) {
        $type = 'live';
        if ($misc_flag !== true) {
            include_once('misc.php');
            $misc_flag = true;
        }
        if ($xmlhttprequest_flag !== true) {
            include_once('xmlhttprequest.php');
            $xmlhttprequest_flag = true;
        }
        if ($aardvark_flag !== true) {
            include_once('aardvark.php');
            $aardvark_flag = true;
        }
        if ($live_flag !== true) {
            include_once('live.php');
            $live_flag = true;
        }
    }
    if (isset($_GET['cobrowse'])) {
        $type = 'cobrowse';
        if ($misc_flag !== true) {
            include_once('misc.php');
            $misc_flag = true;
        }
        if ($xmlhttprequest_flag !== true) {
            include_once('xmlhttprequest.php');
            $xmlhttprequest_flag = true;
        }
        if ($aardvark_flag !== true) {
            include_once('aardvark.php');
            $aardvark_flag = true;
        }
        if ($cobrowse_flag !== true) {
            include_once('cobrowse.php');
            $cobrowse_flag = true;
        }
    }
    if (isset($_GET['request'])) {
        $type = 'request';
        if ($misc_flag !== true) {
            include_once('misc.php');
            $misc_flag = true;
        }
        if ($xmlhttprequest_flag !== true) {
            include_once('xmlhttprequest.php');
            $xmlhttprequest_flag = true;
        }
        if ($aardvark_flag !== true) {
            include_once('aardvark.php');
            $aardvark_flag = true;
        }
        if ($request_flag !== true) {
            include_once('request.php');
            $request_flag = true;
        }
    }
    if (isset($_GET['chat'])) {
        $type = 'chat';
        if ($misc_flag !== true) {
            include_once('misc.php');
            $misc_flag = true;
        }
        if ($xmlhttprequest_flag !== true) {
            include_once('xmlhttprequest.php');
            $xmlhttprequest_flag = true;
        }
        if ($aardvark_flag !== true) {
            include_once('aardvark.php');
            $aardvark_flag = true;
        }
        if ($chat_flag !== true) {
            include_once('chat.php');
            $chat_flag = true;
        }
    }
?>

//-->