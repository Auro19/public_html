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
* This file checks for updates on the HCL site									  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->template();
    $inc->mothership();

    // Assign the page's title and the content template that needs to be used
    $GLOBALS['template']->assign('title', $GLOBALS['lang']['updates']);
    $GLOBALS['template']->assign('content', 'plain.tpl');

    if ($GLOBALS['mothership']->check_updates()) {
        $GLOBALS['template']->assign('text', $GLOBALS['lang']['update_available'].'<br /><a href="http://www.helpcenterlive.com/project/showfiles.php?group_id=93857&package_id=99667">'.$GLOBALS['lang']['update_download'].'</a>');
    } else {
        $GLOBALS['template']->assign('text', $GLOBALS['lang']['update_current']);
    }

    // Display the output
    $GLOBALS['template']->display('update.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();

?>