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
* This file contains all the javascript used at the admin end except		      *
* for the request monitor														  * 
**********************************************************************************/

    include_once('../../class/include.php');
    $inc = new Includer();
    $inc->auth();
    $inc->template();
    $inc->monitor();

    // Check to see if the person is not logged in
    $GLOBALS['auth']->check_logout();

    $GLOBALS['template']->assign('chats', $GLOBALS['monitor']->chats());
    $GLOBALS['template']->assign('visitors', $GLOBALS['monitor']->visitors());
    $GLOBALS['template']->assign('sounds', $GLOBALS['monitor']->sounds());
    $GLOBALS['template']->assign('onload', ' onload="'.$GLOBALS['monitor']->onload().'"');

    // Include the javascript files
    $GLOBALS['template']->assign('javascript', 'misc');

    // Display the output
    $GLOBALS['template']->display('monitor_content.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
?>