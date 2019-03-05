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
* This file shows the main admin screen											  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->auth();
    $inc->template();
    $inc->notes();

    // Check to see if the person is not logged in
    $GLOBALS['auth']->check_logout();

    // Check if any POST variables are passed into the file and act accordingly
    if (isset($_POST['add'])) {
        $GLOBALS['notes']->add(addslashes($_POST['subject']), addslashes($_POST['message']));
    } elseif (isset($_POST['edit'])) {
        $GLOBALS['notes']->update(addslashes($_POST['id']), addslashes($_POST['subject']), addslashes($_POST['message']));
    } elseif (isset($_POST['delete'])) {
        $GLOBALS['notes']->delete(addslashes($_POST['id']));
    }

    // Check if any GET variables are passed into the file and act accordingly
    if (isset($_GET['add'])) {
        // Show the form to add a note and add the correct header
        $GLOBALS['template']->assign('title', $GLOBALS['lang']['add_note']);
        $GLOBALS['template']->assign('action', 'add_note');
    } elseif (isset($_GET['edit'])) {
        // Show the form to edit a note and add the correct header
        $GLOBALS['template']->assign('title', $GLOBALS['lang']['edit_note']);
        $GLOBALS['template']->assign('action', 'edit_note');
        $GLOBALS['template']->assign('id', addslashes($_GET['edit']));
        $GLOBALS['template']->assign('subject', $GLOBALS['notes']->fetch(addslashes($_GET['edit']), 'subject', HCL_NOTES_BR2NL, HCL_NOTES_HTML_FRIENDLY));
        $GLOBALS['template']->assign('message', $GLOBALS['notes']->fetch(addslashes($_GET['edit']), 'message', HCL_NOTES_BR2NL, HCL_NOTES_HTML_FRIENDLY));
    } elseif (isset($_GET['delete'])) {
        // Show the form to delete a note and add the correct header
        $GLOBALS['template']->assign('title', $GLOBALS['lang']['delete_note']);
        $GLOBALS['template']->assign('action', 'delete_note');
        $GLOBALS['template']->assign('id', $_GET['delete']);
        $GLOBALS['template']->assign('subject', $GLOBALS['notes']->fetch(addslashes($_GET['delete']), 'subject', HCL_NOTES_BR2NL, HCL_NOTES_HTML_FRIENDLY));
    } else {
        $GLOBALS['template']->assign('title', $GLOBALS['lang']['notes']);
        $GLOBALS['template']->assign('action', 'main');
        // Display the notes.. the fetch() function in the 'Notes' class returns an
        // array or false when there are no notes to display.
        if (!$GLOBALS['notes']->fetch()) {
            $GLOBALS['template']->assign('notes', 'false');
        } else {
            $GLOBALS['template']->assign('notes', $GLOBALS['notes']->fetch());
        }
    }

    // Define the three sets of links in the template
    if ($GLOBALS['auth']->admin()) {
        $GLOBALS['template']->links('admin', 'admin');
    } else {
        $GLOBALS['template']->links('operator', 'operator');
    }
    
    $GLOBALS['template']->assign('links_main', array(
        array('title' => $GLOBALS['lang']['view_note'], 'url' => $GLOBALS['conf']['url'].'/admin/index.php'),
        array('title' => $GLOBALS['lang']['add_note'], 'url' => $GLOBALS['conf']['url'].'/admin/index.php?add')
        ));

    // Assign the page's title and the content template that needs to be used
    $GLOBALS['template']->assign('content', 'admin_index.tpl');

    // Include the javascript files
    $GLOBALS['template']->assign('javascript', 'monitor');

    // Display the output
    $GLOBALS['template']->display('admin.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>