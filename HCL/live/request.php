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
* This file is used to try and connect the visitor with an operator				  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->template();
    $inc->live();
    $inc->chat();
    $inc->operator();

    if ($GLOBALS['chat']->blocked()) {
        $GLOBALS['template']->assign('text', $GLOBALS['lang']['blocked']);
        $GLOBALS['template']->display('plain.tpl');
        $inc->finished();
        exit;
    }

    if (isset($_GET['opchat'])) {
        if (isset($_POST['operatorid'])) {
            $operatorid = addslashes($_POST['operatorid']);
            if (isset($_POST['submit']) && ($_POST['operatorid'] == '')) {
                header('Location: '.$GLOBALS['conf']['url'].'/live/operator.php?retry');
            } else {
                $GLOBALS['live']->chatid('op_'.$GLOBALS['operator']->id());
                $GLOBALS['live']->opchat($operatorid, $GLOBALS['operator']->id());
            }
        } else {
            header('Location: '.$GLOBALS['conf']['url'].'/live/operator.php?retry');
        }
        $GLOBALS['template']->assign('javascript', 'request&opchat');
        $GLOBALS['template']->assign('onload', ' onload="Request.refresh();"');
    } elseif (isset($_GET['initiate'])) {
        $GLOBALS['live']->initiate(addslashes($_GET['chatid']));
        $GLOBALS['template']->assign('javascript', 'request&initiate');
        $GLOBALS['template']->assign('onload', ' onload="Request.refresh();"');
    } elseif (isset($_GET['request'])) {
        if (isset($_POST['departmentid'])) {
            $departmentid = addslashes($_POST['departmentid']);
        } else if (isset($_GET['departmentid'])) {
            $departmentid = addslashes($_GET['departmentid']);    
        } else {
        	$departmentid= '';
        }
        if (isset($_POST['nick'])) {
            $nick = addslashes($_POST['nick']);
        } else if (isset($_GET['nick'])) {
            $nick = addslashes($_GET['nick']);
        } else {
        	$nick = '';
        }
        if ($departmentid != '') {
            if (isset($_POST['submit']) && ($departmentid == '' || $nick == '')) {
                header('Location: '.$GLOBALS['conf']['url'].'/live/main.php?retry');
            } else {
                $GLOBALS['live']->nick($nick);
                $GLOBALS['live']->request($departmentid, $nick, $GLOBALS['live']->chatid());
            }
            $GLOBALS['template']->assign('javascript', 'request&departmentid='.$departmentid);
            $GLOBALS['template']->assign('onload', ' onload="Request.refresh();"');
        } else {
            header('Location: '.$GLOBALS['conf']['url'].'/live/main.php?retry');
        }
    }

    // Display the output
    $GLOBALS['template']->display('live_request.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();

?>