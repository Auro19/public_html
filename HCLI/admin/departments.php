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
* This file allows administration of departments messages						  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->auth();
    $inc->template();
    $inc->department();

    // Check to see if the person is not logged in
    $GLOBALS['auth']->check_logout();

    // Define the three sets of links in the template
    if ($GLOBALS['auth']->admin()) {
        $GLOBALS['template']->links('conf', 'conf');
    } else {
        header('Location: '.$GLOBALS['conf']['url'].'/admin/index.php');
    }

    $GLOBALS['template']->assign('links_main', array(
        array('title' => $GLOBALS['lang']['view_all'], 'url' => $GLOBALS['conf']['url'].'/admin/departments.php?view'),
        array('title' => $GLOBALS['lang']['add'], 'url' => $GLOBALS['conf']['url'].'/admin/departments.php?add'),
        array('title' => $GLOBALS['lang']['assigns'], 'url' => $GLOBALS['conf']['url'].'/admin/assigns.php')
        ));

    if (isset($_GET['add'])) {
        $GLOBALS['template']->assign('action', 'add');
    } elseif (isset($_POST['add'])) {
        $GLOBALS['template']->assign('action', 'added');
        $GLOBALS['department']->insert(addslashes($_POST['name']), addslashes($_POST['visible']), addslashes($_POST['order']), addslashes($_POST['email']), addslashes($_POST['email_host']), addslashes($_POST['email_port']), addslashes($_POST['email_username']), addslashes($_POST['email_password']));
    } elseif (isset($_GET['edit'])) {
        $GLOBALS['template']->assign('action', 'edit');
        $GLOBALS['template']->assign('department', $GLOBALS['department']->get(addslashes($_GET['id'])));
    } elseif (isset($_POST['edit'])) {
        $GLOBALS['template']->assign('action', 'edited');
        $GLOBALS['department']->update(addslashes($_POST['id']), addslashes($_POST['name']), addslashes($_POST['visible']), addslashes($_POST['order']), addslashes($_POST['email']), addslashes($_POST['email_host']), addslashes($_POST['email_port']), addslashes($_POST['email_username']), addslashes($_POST['email_password']));
    } elseif (isset($_POST['delete'])) {
        $GLOBALS['template']->assign('action', 'delete');
        foreach ($_POST as $key => $val) {
            if ($key == $val && is_numeric($val)) {
                $GLOBALS['department']->delete($val);
            }
        }
        $GLOBALS['template']->assign('departments', $GLOBALS['department']->listall('', 'all'));
    } else {
        $GLOBALS['template']->assign('action', 'view');
        $GLOBALS['template']->assign('departments', $GLOBALS['department']->listall('', 'all'));
    }

    // Assign the page's title and the content template that needs to be used
    $GLOBALS['template']->assign('title', $GLOBALS['lang']['departments']);
    $GLOBALS['template']->assign('content', 'admin_departments.tpl');

    // Include the javascript files
    $GLOBALS['template']->assign('javascript', 'misc');

    // Display the output
    $GLOBALS['template']->display('admin.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>