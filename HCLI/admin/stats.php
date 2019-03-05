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
* This file allows administration of stats										  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->auth();
    $inc->template();
    $inc->stats();
    $inc->operator();

    // Check to see if the person is not logged in
    $GLOBALS['auth']->check_logout();

    // Define the three sets of links in the template
    if ($GLOBALS['auth']->admin()) {
        $GLOBALS['template']->links('conf', 'conf');
    } else {
        header('Location: '.$GLOBALS['conf']['url'].'/admin/index.php');
    }

    if (isset($_POST['fd'])) {
        $fd = addslashes($_POST['fd']);
    } else {
        $fd = gmdate("j", time() + (3600 * $GLOBALS['conf']['offset']));
    }
    if (isset($_POST['fm'])) {
        $fm = addslashes($_POST['fm']);
    } else {
        if (gmdate("n", time() + (3600 * $GLOBALS['conf']['offset'])) > 1) {
            $fm = gmdate("n", time() + (3600 * $GLOBALS['conf']['offset'])) - 1;
        } else {
            $fm = gmdate("n", time() + (3600 * $GLOBALS['conf']['offset']));
        }
    }
    if (isset($_POST['fy'])) {
        $fy = addslashes($_POST['fy']);
    } else {
        if (gmdate("n", time() + (3600 * $GLOBALS['conf']['offset'])) <= 1) {
            $fy = gmdate("Y", time() + (3600 * $GLOBALS['conf']['offset'])) - 1;
        } else {
            $fy = gmdate("Y", time() + (3600 * $GLOBALS['conf']['offset']));
        }
    }
    if (isset($_POST['td'])) {
        $td = addslashes($_POST['td']);
    } else {
        $td = gmdate("j", time() + (3600 * $GLOBALS['conf']['offset']));
    }
    if (isset($_POST['tm'])) {
        $tm = addslashes($_POST['tm']);
    } else {
        $tm = gmdate("n", time() + (3600 * $GLOBALS['conf']['offset']));
    }
    if (isset($_POST['ty'])) {
        $ty = addslashes($_POST['ty']);
    } else {
        $ty = gmdate("Y", time() + (3600 * $GLOBALS['conf']['offset']));
    }
    
    $GLOBALS['template']->assign('fd', $fd);
    $GLOBALS['template']->assign('fm', $fm);
    $GLOBALS['template']->assign('fy', $fy);
    $GLOBALS['template']->assign('td', $td);
    $GLOBALS['template']->assign('tm', $tm);
    $GLOBALS['template']->assign('ty', $ty);

    $GLOBALS['template']->assign('links_main', array(
        array('title' => $GLOBALS['lang']['visitors'], 'url' => $GLOBALS['conf']['url'].'/admin/stats.php'),
        array('title' => $GLOBALS['lang']['referrers'], 'url' => $GLOBALS['conf']['url'].'/admin/stats.php?referrers'),
        array('title' => $GLOBALS['lang']['operators'], 'url' => $GLOBALS['conf']['url'].'/admin/stats.php?operators')
        ));

    if (isset($_GET['operators'])) {
        $GLOBALS['template']->assign('action', 'operators');
        if (isset($_POST['id'])) {
            $id = addslashes($_POST['id']);
        } elseif (isset($_GET['id'])) {
            $id = addslashes($_GET['id']);
        } else {
            $id = $GLOBALS['operator']->id();
        }
        $GLOBALS['template']->assign('id', $id);
        $GLOBALS['template']->assign('operators', $GLOBALS['operator']->listall());
        $GLOBALS['template']->assign('operator', $GLOBALS['stats']->operator($id));
        if (isset($_GET['reviews'])) {
            if (isset($_POST['limit'])) {
                $GLOBALS['template']->assign('reviews', $GLOBALS['stats']->reviews($id, addslashes($_POST['limit'])));
                $GLOBALS['template']->assign('limit', addslashes($_POST['limit']));
            } else {
                $GLOBALS['template']->assign('reviews', $GLOBALS['stats']->reviews($id));
                $GLOBALS['template']->assign('limit', '5');
            }
            $GLOBALS['template']->assign('reviews_view', 'true');
        } else {
            $GLOBALS['template']->assign('reviews_view', 'false');
        }
    } elseif (isset($_GET['referrers'])) {
        $GLOBALS['template']->assign('action', 'referrers');
        if (isset($_POST['limit'])) {
            $GLOBALS['template']->assign('referrers', $GLOBALS['stats']->referrers(addslashes($_POST['limit'])));
            $GLOBALS['template']->assign('limit', addslashes($_POST['limit']));
        } else {
            $GLOBALS['template']->assign('referrers', $GLOBALS['stats']->referrers('20'));
            $GLOBALS['template']->assign('limit', '20');
        }
    } else {
        $GLOBALS['template']->assign('action', 'visitors');
        $GLOBALS['template']->assign('dates', $GLOBALS['lang']['from'].': '.$fd.'/'.$fm.'/'.$fy.', '.$GLOBALS['lang']['to'].': '.$td.'/'.$tm.'/'.$ty);
        $GLOBALS['template']->assign('stats', $GLOBALS['stats']->visitors($fd, $fm, $fy, $td, $tm, $ty));
    }

    // Assign the page's title and the content template that needs to be used
    $GLOBALS['template']->assign('title', $GLOBALS['lang']['statistics']);
    $GLOBALS['template']->assign('content', 'admin_stats.tpl');

    // Include the javascript files
    $GLOBALS['template']->assign('javascript', 'misc');

    // Display the output
    $GLOBALS['template']->display('admin.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>