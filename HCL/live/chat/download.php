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
* This file forces the download of a transferred file							  *
**********************************************************************************/

    include_once('../../class/include.php');
    $inc = new Includer();
    $inc->db();
    $inc->file();

    if (isset($_GET['admin'])) {
        $admin = 'true';
    } else {
        $admin = 'false';
    }

    if (isset($_GET['client'])) {
        $client = 'true';
    } else {
        $client = 'false';
    }

    if (isset($_GET['id'])) {
        if ($files = $GLOBALS['file']->get($admin, addslashes($_GET['id']), $client)) {
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: private");
			header('Content-Type: '.$files['type']);
            header('Content-Length: '.strlen($files['file']));
            header('Content-Disposition: attachment; filename='.$files['name']);
            echo($files['file']);
        }
    } else {
        if (isset($_SESSION['hcl_'.addslashes($_GET['chatid'])]['fileid'])) {
            if ($files = $GLOBALS['file']->get($admin, $_SESSION['hcl_'.addslashes($_GET['chatid'])]['fileid'], $client)) {
				header("Pragma: public");
				header("Expires: 0");
				header("Cache-Control: private");
				header('Content-Type: '.$files['type']);
           	 	header('Content-Length: '.strlen($files['file']));
            	header('Content-Disposition: attachment; filename='.$files['name']);
                echo($files['file']);
            }
        }
    }
    
    // do events that need to be done at the end of the file
    $inc->finished();

?>