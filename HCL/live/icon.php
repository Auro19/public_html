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
* This file displays the chat icon												  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->image();
    $inc->operator();
    $inc->live();

    if (!isset($_GET['departmentid'])) {
        $_GET['departmentid'] = '0';
    }

    if (isset($_GET['picture']) && isset($_GET['id'])) {
        header('Content-Type: image/gif');
        echo($GLOBALS['operator']->picture(addslashes($_GET['id'])));
    } else {
        if (isset($_GET['status'])) {
            $icon = $GLOBALS['image']->icon(addslashes($_GET['status']), addslashes($_GET['departmentid']));
        } else {
            if ($GLOBALS['live']->status_department(addslashes($_GET['departmentid']))) {
                $icon = $GLOBALS['image']->icon('online', addslashes($_GET['departmentid']));
            } else {
                $icon = $GLOBALS['image']->icon('offline', addslashes($_GET['departmentid']));
            }
        }
        header($icon['header']);
        @readfile($icon['file']);
    }

    // do events that need to be done at the end of the file
    $inc->finished();

?>