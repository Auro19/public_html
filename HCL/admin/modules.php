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
* This file allows administration of hot pages									  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->auth();
    $inc->template();
    $inc->module();

    // Check to see if the person is not logged in
    $GLOBALS['auth']->check_logout();

    // Define the three sets of links in the template
    if (isset($_GET['type'])) {
        if ($_GET['type'] == 'operator') {
            if ($GLOBALS['auth']->operator()) {
                $GLOBALS['template']->links('operator', 'operator');
            }
        } elseif ($_GET['type'] == 'admin') {
            if ($GLOBALS['auth']->admin()) {
                $GLOBALS['template']->links('admin', 'admin');
            }
        } elseif ($_GET['type'] == 'conf') {
            if ($GLOBALS['auth']->admin()) {
                $GLOBALS['template']->links('conf', 'conf');
            }
        }
    } else {
        if ($GLOBALS['auth']->operator()) {
            $GLOBALS['template']->links('operator', 'operator');
        }
    }

    $GLOBALS['template']->assign('links_main', '');

    $GLOBALS['template']->assign('modules', $GLOBALS['module']->links(addslashes($_GET['type']), 'true'));

    // Assign the page's title and the content template that needs to be used
    $GLOBALS['template']->assign('title', $GLOBALS['lang']['modules']);
    $GLOBALS['template']->assign('content', 'admin_modules.tpl');

    // Include the javascript files
    $GLOBALS['template']->assign('javascript', 'misc&monitor');

    // Display the output
    $GLOBALS['template']->display('admin.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>