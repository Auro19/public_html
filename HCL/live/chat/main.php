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
* This file forms the main chat window											  *
**********************************************************************************/

	include_once('../../class/include.php');
    $inc = new Includer();
    $inc->template();
    $inc->auth();
    $inc->operator();
    $inc->department();
    $inc->chat();
    $inc->db();
    $inc->chat();

    if ($GLOBALS['chat']->blocked()) {
        $GLOBALS['template']->assign('text', $GLOBALS['lang']['blocked']);
        $GLOBALS['template']->display('plain.tpl');
        $inc->finished();
        exit;
    }

    if (isset($_GET['admin'])) {
        $GLOBALS['template']->assign('admin', 'true');
    } else {
        $GLOBALS['template']->assign('admin', 'false');
    }

    $GLOBALS['chat']->session(addslashes($_GET['chatid']));
    $GLOBALS['chat']->assign(addslashes($_GET['chatid']));

    $GLOBALS['template']->assign('chatid', addslashes($_GET['chatid']));

    if ($GLOBALS['auth']->operator() && isset($_GET['admin']) && !isset($_GET['opchat'])) {
        $GLOBALS['db']->query('UPDATE `sessions` SET `typeo`="0" WHERE `chatid`="'.addslashes($_GET['chatid']).'"');
    } else {
        $GLOBALS['db']->query('UPDATE `sessions` SET `typeg`="0" WHERE `chatid`="'.addslashes($_GET['chatid']).'"');
    }

    if (isset($_GET['opchat'])) {
        $GLOBALS['template']->assign('opchat', 'true');
        $GLOBALS['template']->assign('javascript', 'chat&opchat');
    } else {
        $GLOBALS['template']->assign('opchat', 'false');
        $GLOBALS['template']->assign('javascript', 'chat');
    }
    
    if (!$GLOBALS['db']->query('SELECT * FROM `sessions` WHERE `chatid`="'.addslashes($_GET['chatid']).'"')) {
        $GLOBALS['template']->assign('onload', ' onload="Chat.empty();"');
        $GLOBALS['template']->assign('text', $GLOBALS['lang']['chat_empty']);
    }

    // Display the output
    $GLOBALS['template']->display('chat.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>