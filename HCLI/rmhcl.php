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
* This file is used for deleting the cache and compile directories as             *
* they are created by different uid's - therefore sometimes not allowing          *
* users to delete them via FTP													  *
**********************************************************************************/

    // Set this to true if you want to remove the cache and compile
    // directories

    $allow_rm = false;

    function rmrf($dir, $sub = false) {
        if (file_exists($dir)) {
            if ($dp = @opendir($dir)) {
                while (false !== ($file = readdir($dp))) {
                    if ($file !== '.' && $file !== '..') {
                        if (!is_dir($file)) {
                            if (substr($file, -4, 4) == '.dbc' || substr($file, -4, 4) == '.php') {
                                unlink($dir.'/'.$file);
                            } else {
                                rmrf($dir.'/'.$file, true);
                            }
                        } else {
                            rmrf($dir.'/'.$file, true);
                        }
                    }
                }
                closedir($dp);
                if ($sub) {
                    rmdir($dir);
                }
            }
        }
    }

    if ($allow_rm) {
        rmrf(dirname(__FILE__).DIRECTORY_SEPARATOR.'cache');
        rmrf(dirname(__FILE__).DIRECTORY_SEPARATOR.'compile');
        echo('cache and compile directories removed.');
    } else {
        echo('You need to set $allow_rm to true in this file first.');
    }

?>