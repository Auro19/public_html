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
* The main index file. A redirect to the admin directory		                  *
* has been put here because that is probably most useful		                  *
**********************************************************************************/


    include_once("./class/include.php");
    $inc = new Includer();
    $inc->module();

    if ($GLOBALS['module']->exists('HelpCenter')) {
        if ($GLOBALS['module']->active('HelpCenter')) {
            header('Location: '.$conf['url'].'/module.php?module=HelpCenter');
        } else {
            header('Location: '.$conf['url'].'/admin/index.php');
        }
    } else {
        header('Location: '.$conf['url'].'/admin/index.php');
    }

    // do events that need to be done at the end of the file
    $inc->finished();

?>