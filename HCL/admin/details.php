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
* This file allows administration of the operator's details						  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->auth();
    $inc->template();
    $inc->operator();

    // Check to see if the person is not logged in
    $GLOBALS['auth']->check_logout();

    // Define the three sets of links in the template
    if ($GLOBALS['auth']->admin()) {
        $GLOBALS['template']->links('admin', 'admin');
    } else {
        $GLOBALS['template']->links('operator', 'operator');
    }

    if (isset($_POST['submit'])) {
        $GLOBALS['template']->assign('alert', $GLOBALS['operator']->update(0, addslashes($_POST['old_password']), addslashes($_POST['new_password']), addslashes($_POST['new_password_again']), addslashes($_POST['firstname']), addslashes($_POST['lastname']), addslashes($_POST['email']), $_FILES['picture'], addslashes($_POST['showpic']), addslashes($_POST['autosave'])));
    } else {
        $GLOBALS['template']->assign('alert', '');
    }

    $GLOBALS['template']->assign('details', $GLOBALS['operator']->get());
    $GLOBALS['template']->assign('id', $GLOBALS['operator']->id());
    
    $GLOBALS['template']->assign('links_main', array(
        array('title' => $GLOBALS['lang']['launch_monitor'], 'url' => 'javascript:Monitor.launch();')
        ));

    // Assign the page's title and the content template that needs to be used
    $GLOBALS['template']->assign('title', $GLOBALS['lang']['my_details']);
    $GLOBALS['template']->assign('content', 'admin_details.tpl');

    // Include the javascript files
    $GLOBALS['template']->assign('javascript', 'misc&monitor');

    // Display the output
    $GLOBALS['template']->display('admin.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>