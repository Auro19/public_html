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
* This file contains outputs the request monitor template and executes any        * 
* funtions that	should be executed before the request monitor starts to load	  *
**********************************************************************************/

    include_once('../../class/include.php');
    $inc = new Includer();
    $inc->auth();
    $inc->template();

    // Check to see if the person is not logged in
    $GLOBALS['auth']->check_logout();

    // Include the javascript files
    $GLOBALS['template']->assign('javascript', 'monitor');

    // Display the output
    $GLOBALS['template']->display('monitor.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
?>