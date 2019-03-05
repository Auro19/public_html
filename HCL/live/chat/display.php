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
* This files displays all the chat messages										  *
**********************************************************************************/

    include_once('../../class/include.php');
    $inc = new Includer();
    $inc->chat();
    $inc->template();

    if (isset($_GET['admin'])) {
        $GLOBALS['template']->assign('admin', 'true');
        $admin = 'true';
    } else {
        $GLOBALS['template']->assign('admin', 'false');
        $admin = 'false';
    }

    $GLOBALS['chat']->assign(addslashes($_GET['chatid']));
    $GLOBALS['template']->assign('chatid', addslashes($_GET['chatid']));
    $GLOBALS['template']->assign('messages', $GLOBALS['chat']->get_messages($admin, addslashes($_GET['chatid'])));
    if (isset($_GET['admin']) && $_SESSION['hcl_'.addslashes($_GET['chatid'])]['isoperator'] == 'true') {
        $GLOBALS['template']->assign('onload', ' onload="scroll(0,10000000);parent.window.Chat.checksum = '.$GLOBALS['chat']->checksum(addslashes($_GET['chatid']), 'true').';"');
        $GLOBALS['template']->assign('now_chatting', parse_with_session(addslashes($_GET['chatid']), $GLOBALS['lang']['now_chatting'], 'guest'));
    } else {
        $GLOBALS['template']->assign('onload', ' onload="scroll(0,10000000);parent.window.Chat.checksum = '.$GLOBALS['chat']->checksum(addslashes($_GET['chatid']), 'false').';"');
        $GLOBALS['template']->assign('now_chatting', parse_with_session(addslashes($_GET['chatid']), $GLOBALS['lang']['now_chatting'], 'operator'));
    }

    // Display the output
    $GLOBALS['template']->display('chat_display.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>