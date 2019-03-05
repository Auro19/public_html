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
* This file allows operators to login											  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->auth();
    $inc->template();

    if (isset($_POST['username']) && isset($_POST['password'])) {
            $GLOBALS['auth']->login(addslashes($_POST['username']), addslashes($_POST['password']));
    }

    // Define the three sets of links in the template
    $GLOBALS['template']->links('none', 'none');
    $GLOBALS['template']->assign('links_main', '');

    // If the person is logged in, load sound files and redirect them to the index page
    if ($GLOBALS['auth']->operator()) {
        header('Location: '.$GLOBALS['conf']['url'].'/admin/index.php');
    } else {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $GLOBALS['template']->assign('login_text', $GLOBALS['lang']['login_failure']);
        }
        // Assign the page's title and the content template that needs to be used
        $GLOBALS['template']->assign('title', $GLOBALS['lang']['login']);
        $GLOBALS['template']->assign('content', 'admin_login.tpl');
    	// Display the output
    	$GLOBALS['template']->display('admin.tpl');
    }
    
    // do events that need to be done at the end of the file
    $inc->finished();

?>