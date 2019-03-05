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
* This file allows the uploading of files that are going to be transferred		  *
**********************************************************************************/

    include_once('../../class/include.php');
    $inc = new Includer();
    $inc->template();
    $inc->file();

    if (isset($_FILES['file'])) {
        $GLOBALS['template']->assign('submit', 'true');
        if ($_FILES["file"]["size"] > 0) {
            $size = $GLOBALS['file']->insert('false', $_FILES["file"], addslashes($_GET['chatid']));
            $GLOBALS['template']->assign('onload', ' onload="window.opener.parent.window.Chat.file(\''.$size.'\');window.close();"');
            $GLOBALS['template']->assign('fail', 'false');
        } else {
            $GLOBALS['template']->assign('fail', 'true');
        }
    }

    $GLOBALS['template']->assign('chatid', addslashes($_GET['chatid']));
    $GLOBALS['template']->assign('max_size', $GLOBALS['file']->max_size());

    // Display the output
    $GLOBALS['template']->display('chat_upload.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>