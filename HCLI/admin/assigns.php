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
* File Comments:								  								  *
* This file allows administration of the assigning of operators to departments	  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->auth();
    $inc->template();
    $inc->assign();

    // Check to see if the person is not logged in
    $GLOBALS['auth']->check_logout();

    // Define the three sets of links in the template
    if ($GLOBALS['auth']->admin()) {
        $GLOBALS['template']->links('conf', 'conf');
    } else {
        header('Location: '.$GLOBALS['conf']['url'].'/admin/index.php');
    }

    $GLOBALS['template']->assign('links_main', array(
        array('title' => $GLOBALS['lang']['view_all'], 'url' => $GLOBALS['conf']['url'].'/admin/assigns.php'),
        array('title' => $GLOBALS['lang']['operators'], 'url' => $GLOBALS['conf']['url'].'/admin/operators.php'),
        array('title' => $GLOBALS['lang']['departments'], 'url' => $GLOBALS['conf']['url'].'/admin/departments.php')
        ));

    if (isset($_POST['edit'])) {
        $GLOBALS['template']->assign('text', $GLOBALS['lang']['assigns_updated']);
        $GLOBALS['assign']->delete_department(addslashes($_POST['id']));
        // Loop through all the posted variables. Ones that have their name and values as numbers
        // are departments being assigned
        foreach ($_POST as $key => $val) {
            if (is_numeric($key) && is_numeric($val) && is_numeric($_POST['poll_'.$key])) {
                $GLOBALS['assign']->insert($key, $val, $_POST['poll_'.$key]);
            }
        }
    } else {
        $GLOBALS['template']->assign('text', '');
    }

    // Grab a list of the assigns already in place
    $GLOBALS['template']->assign('assigns', $GLOBALS['assign']->listall());

    // Assign the page's title and the content template that needs to be used
    $GLOBALS['template']->assign('title', $GLOBALS['lang']['assigns']);
    $GLOBALS['template']->assign('content', 'admin_assigns.tpl');

    // Include the javascript files
    $GLOBALS['template']->assign('javascript', 'misc');

    // Display the output
    $GLOBALS['template']->display('admin.tpl');

    // do events that need to be done at the end of the file
    $inc->finished();
    
?>