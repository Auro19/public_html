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
* This file allows administration of chat transcripts							  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->auth();
    $inc->template();
    $inc->canned();
    $inc->department();
    $inc->transcript();

    // Check to see if the person is not logged in
    $GLOBALS['auth']->check_logout();

    // Define the three sets of links in the template
    if ($GLOBALS['auth']->admin()) {
        if (isset($_GET['admin'])) {
            $GLOBALS['template']->links('conf', 'conf');
        } else {
            $GLOBALS['template']->links('admin', 'admin');
        }
    } else {
        $GLOBALS['template']->links('operator', 'operator');
    }
    $GLOBALS['template']->assign('links_main', array(
        array('title' => $GLOBALS['lang']['view_all'], 'url' => $GLOBALS['conf']['url'].'/admin/transcripts.php')
        ));

    if (isset($_GET['view']) && isset($_GET['id'])) {
        $GLOBALS['template']->assign('action', 'view');
        if ($GLOBALS['auth']->admin() && isset($_GET['admin'])) {
            $GLOBALS['template']->assign('transcript', $GLOBALS['transcript']->get('', addslashes($_GET['id']), 'admin'));
        } else {
            $GLOBALS['template']->assign('transcript', $GLOBALS['transcript']->get('', addslashes($_GET['id'])));
        }
    } elseif (isset($_POST['delete'])) {
    	if ($GLOBALS['conf']['opdelete'] === true || admin()){
            $GLOBALS['template']->assign('action', 'delete');
            foreach ($_POST as $key => $val) {
                if ($key == $val && is_numeric($val)) {
                    $GLOBALS['db']->query('DELETE FROM `transcripts` WHERE `id`="'.$val.'"');
                }
            }
    	}
    } else {
        $GLOBALS['template']->assign('action', '');
    }

    if ($GLOBALS['auth']->admin() && isset($_GET['admin'])) {
        $GLOBALS['template']->assign('transcripts', $GLOBALS['transcript']->get('', '', 'admin'));
        $GLOBALS['template']->assign('departments', $GLOBALS['department']->listall());
        $GLOBALS['template']->assign('admin', 'admin');
    } else {
        $GLOBALS['template']->assign('transcripts', $GLOBALS['transcript']->get());
        $GLOBALS['template']->assign('departments', $GLOBALS['department']->listall($GLOBALS['operator']->id()));
        $GLOBALS['template']->assign('admin', '');
    }

    // Assign the page's title and the content template that needs to be used
    $GLOBALS['template']->assign('title', $GLOBALS['lang']['transcripts']);
    $GLOBALS['template']->assign('content', 'admin_transcripts.tpl');

    // Include the javascript files
    $GLOBALS['template']->assign('javascript', 'misc&monitor');

    // Display the output
    $GLOBALS['template']->display('admin.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>