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
* This file deals with visitors that have been diverted when requesting a chat	  *
* because there are no operators or all the operators are busy					  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->template();
    $inc->department();
    $inc->email();
    $inc->chat();

    if ($GLOBALS['chat']->blocked()) {
        $GLOBALS['template']->assign('text', $GLOBALS['lang']['blocked']);
        $GLOBALS['template']->display('plain.tpl');
        $inc->finished();
        exit;
    }

    if (isset($_GET['departmentid'])) {
        if ($_GET['departmentid'] !== '') {
            $GLOBALS['template']->assign('departmentid', addslashes($_GET['departmentid']));
        } else {
            $GLOBALS['template']->assign('departmentid', '0');
        }
    } elseif (isset($_POST['departmentid'])) {
        if ($_POST['departmentid'] !== '') {
            $GLOBALS['template']->assign('departmentid', addslashes($_POST['departmentid']));
        } else {
            $GLOBALS['template']->assign('departmentid', '0');
        }
    } else {
        $GLOBALS['template']->assign('departmentid', '0');
    }

    if (isset($_GET['divert'])) {
        if ($_GET['divert'] == 'busy') {
            $GLOBALS['template']->assign('divert', 'busy');
        } elseif ($_GET['divert'] == 'offline') {
            $GLOBALS['template']->assign('divert', 'offline');
            $GLOBALS['template']->assign('departments', $GLOBALS['department']->listall('0'));
        }
    } elseif (isset($_POST['email_send'])) {
        $details['name'] = addslashes($_POST['name']);
        $details['from'] = addslashes($_POST['email']);
        $details['department'] = $GLOBALS['department']->name(addslashes($_POST['departmentid']));
        $details['email'] = $GLOBALS['department']->email(addslashes($_POST['departmentid']));
        $details['subject'] = addslashes($_POST['subject']);
        $details['message'] = addslashes($_POST['message']);
        $GLOBALS['email']->auth($GLOBALS['department']->email_host(addslashes($_POST['departmentid'])), $GLOBALS['department']->email_port(addslashes($_POST['departmentid'])), $GLOBALS['department']->email_username(addslashes($_POST['departmentid'])), $GLOBALS['department']->email_password(addslashes($_POST['departmentid'])));
        $GLOBALS['email']->contact($details);
        $GLOBALS['template']->assign('divert', 'email_sent');
    } else {
        $GLOBALS['template']->assign('divert', '');
    }


    $GLOBALS['template']->assign('onload', '');

    $GLOBALS['template']->assign('javascript', 'misc');

    // Display the output
    $GLOBALS['template']->display('live_divert.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>