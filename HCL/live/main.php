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
* This file is the landing page for requesting live help						  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->template();
    $inc->live();
    $inc->chat();

    if ($GLOBALS['chat']->blocked()) {
        $GLOBALS['template']->assign('text', $GLOBALS['lang']['blocked']);
        $GLOBALS['template']->display('plain.tpl');
        $inc->finished();
        exit;
    }

    if (isset($_GET['departmentid'])) {
    	$department_show = false;
        $departmentid = addslashes($_GET['departmentid']);
    } else {
    	$department_show = true;
        $departmentid = '';
    }

    if (isset($_GET['nick'])) {
    	$nick_show = false;
        $nick = addslashes($_GET['nick']);
    } else {
    	$nick_show = true;
        $nick = htmlspecialchars(stripslashes($GLOBALS['live']->nick()));
    }

    if (!$nick_show && !$department_show) {
        header('Location: '.$GLOBALS['conf']['url'].'/live/request.php?request&departmentid='.$departmentid.'&nick='.urlencode($nick));
    }

    if (isset($_GET['retry'])) {
        $retry = 'true';
    } else {
        $retry = 'false';
    }

    if (!$GLOBALS['live']->status_department($departmentid)) {
        header('Location: '.$GLOBALS['conf']['url'].'/live/divert.php?divert=offline&departmentid='.$departmentid);
    }
    
    if ($department_show) {
    	$avaliable = $GLOBALS['live']->avaliable_department('');
    } else {
    	$avaliable = $GLOBALS['live']->avaliable_department($departmentid);
    }
    if (count($avaliable) == 1) {
        $departmentid = $avaliable[0]['id'];
    }

    $GLOBALS['template']->assign('avaliable', $avaliable);
    $GLOBALS['template']->assign('departmentid', $departmentid);
    $GLOBALS['template']->assign('department_show', $department_show);
    $GLOBALS['template']->assign('nick', $nick);
    $GLOBALS['template']->assign('nick_show', $nick_show);
    $GLOBALS['template']->assign('retry', $retry);

    // Display the output
    $GLOBALS['template']->display('live_main.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>