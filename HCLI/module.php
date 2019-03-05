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
* This file is a wrapper for the module files					                  *
**********************************************************************************/

    include_once('./class/include.php');
    global $inc;
    $inc = new Includer();
    $inc->template();
    $inc->module();

    if ($GLOBALS['module']->exists(addslashes($_GET['module']))) {
        if ($GLOBALS['module']->active(addslashes($_GET['module']))) {
            $GLOBALS['module']->get_config(addslashes($_GET['module']));
            // Get the main file if one isn't specified
            if (!isset($_GET['file'])) {
                $_GET['file'] = $GLOBALS['conf']['modules'][addslashes($_GET['module'])]['user'];
            }
            // Display the output
            if (file_exists(dirname(__FILE__).'/templates/'.$GLOBALS['conf']['template'].'/'.'mod_'.addslashes($_GET['module']).'.tpl')) {
                $GLOBALS['template']->assign('title', $GLOBALS['conf']['modules'][addslashes($_GET['module'])]['title']);
                $GLOBALS['template']->assign('content', 'module.tpl');
                $GLOBALS['template']->display('mod_'.addslashes($_GET['module']).'.tpl');
            } else {
                $GLOBALS['template']->display('module.tpl');
            }
        } else {
            echo($GLOBALS['lang']['mod_not_active']);
        }
    } else {
        echo($GLOBALS['lang']['mod_doesnt_exist']);
    }

    // do events that need to be done at the end of the file
    $inc->finished();
    
?>