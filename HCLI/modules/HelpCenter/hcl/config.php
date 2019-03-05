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
* This file allows Help Center to integrate into Help Center Live				  *
**********************************************************************************/

    // This sets HCL to use the module or not.
    $GLOBALS['conf']['modules']['HelpCenter']['active'] = true;

    // This sets HCL to display the module in the main admin links.
    $GLOBALS['conf']['modules']['HelpCenter']['display'] = false;

    // The title of the module.
    $GLOBALS['conf']['modules']['HelpCenter']['title'] = 'Help Center';

    // The main file that will be accessible by end users.
    $GLOBALS['conf']['modules']['HelpCenter']['user'] = '/modules/HelpCenter/index.php';

    // The main file that will be accessible by the operators.
    $GLOBALS['conf']['modules']['HelpCenter']['operator'] = '';
    
    // The main file that will be accessible by the administators.
    $GLOBALS['conf']['modules']['HelpCenter']['admin'] = '';
    
    // The main file that will be accessible in the config settings menu.
    $GLOBALS['conf']['modules']['HelpCenter']['conf'] = '';

    // The url to the module
    $GLOBALS['conf']['modules']['HelpCenter']['realurl'] = $GLOBALS['conf']['url'].'/modules/HelpCenter/';
    
    if (isset($_GET['type'])) {
        $GLOBALS['conf']['modules']['HelpCenter']['url'] = $GLOBALS['conf']['url'].'/admin/module.php?module=HelpCenter&type='.addslashes($_GET['type']).'&file=/modules/HelpCenter/';
    } else {
        $GLOBALS['conf']['modules']['HelpCenter']['url'] = $GLOBALS['conf']['url'].'/module.php?module=HelpCenter&file=';
    }


    // Get the PHP_SELF with GET vars
    $args = '';
    $getargs = '';
    foreach ($_GET as $key => $val) {
        if ($key == 'module' || $key == 'file' || $key == 'type') {
            $getargs .= '<input type="hidden" name="'.$key.'" value="'.$val.'" />';
            if ($args == '') {
                $args .= '?'.$key.'='.$val;
            } else {
                $args .= '&'.$key.'='.$val;
            }
        }
    }

    $GLOBALS['conf']['modules']['HelpCenter']['selfurl'] = $_SERVER['PHP_SELF'].$args;

    // Used for when forms are posted via GET
    $GLOBALS['conf']['modules']['HelpCenter']['getargs'] = $getargs;

?>