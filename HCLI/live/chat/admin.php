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
* This file contains the operators special capabilites during a chat			  *
**********************************************************************************/

    include_once('../../class/include.php');
    $inc = new Includer();
    $inc->template();
    $inc->chat();
    $inc->monitor();
    $inc->db();
    $inc->file();
    $inc->live();
    $inc->canned();

    if (isset($_GET['admin'])) {
        $GLOBALS['template']->assign('admin', 'true');
    } else {
        $GLOBALS['template']->assign('admin', 'false');
    }
    $GLOBALS['chat']->assign(addslashes($_GET['chatid']));
    $GLOBALS['template']->assign('chatid', addslashes($_GET['chatid']));

    if (isset($_POST['submit'])) {
        $GLOBALS['template']->assign('submit', 'true');
    } else {
        $GLOBALS['template']->assign('submit', 'false');
    }

    if (isset($_FILES['file'])) {
        if ($_FILES["file"]["size"] > 0) {
            $size = $GLOBALS['file']->insert('true', $_FILES["file"], addslashes($_GET['chatid']));
            $GLOBALS['template']->assign('onload', ' onload="parent.window.Chat.file(\''.$size.'\');"');
            $GLOBALS['template']->assign('fail', 'false');
        } else {
            $GLOBALS['template']->assign('fail', 'true');
        }
    }

    if (isset($_GET['request_transfer'])) {
        $GLOBALS['template']->assign('request_transfer', 'true');
        $GLOBALS['file']->request_transfer(addslashes($_GET['chatid']));
    }

    if (isset($_GET['canned'])) {
        $GLOBALS['template']->assign('type', 'canned');
        $GLOBALS['template']->assign('canned', $GLOBALS['canned']->get($_SESSION['hcl_'.addslashes($_GET['chatid'])]['operatorid'], $_SESSION['hcl_'.addslashes($_GET['chatid'])]['departmentid']));
    } elseif (isset($_GET['transfer'])) {
        $GLOBALS['template']->assign('type', 'transfer');
        $GLOBALS['template']->assign('transfer', $GLOBALS['live']->avaliable_department('', 'all'));
    } elseif (isset($_GET['file'])) {
        $GLOBALS['template']->assign('type', 'file');
        $GLOBALS['template']->assign('info', $GLOBALS['monitor']->info(addslashes($_GET['chatid'])));
        $GLOBALS['template']->assign('max_size', ini_get('upload_max_filesize'));
    } elseif (isset($_GET['info'])) {
        if (isset($_GET['history'])) {
            $GLOBALS['template']->assign('history', 'true');
        }
        $GLOBALS['template']->assign('type', 'info');
        $GLOBALS['template']->assign('info', $GLOBALS['monitor']->info(addslashes($_GET['chatid'])));
    }

    // Display the output
    $GLOBALS['template']->display('chat_admin.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>