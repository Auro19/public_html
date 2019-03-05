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
* This class contains functions used to display images							  *
**********************************************************************************/

    class Image {

        var $icon;

        function icon($status, $departmentid = '')
        {
            if ($departmentid !== '' && file_exists(dirname(__FILE__).'/../icons/'.$status.'_'.$departmentid.'.gif')) {
                $this->icon = array('header' => 'Content-type: image/gif', 'file' => dirname(__FILE__).'/../icons/'.$status.'_'.$departmentid.'.gif');
            } elseif ($departmentid !== '' && file_exists(dirname(__FILE__).'/../icons/'.$status.'_'.$departmentid.'.jpg')) {
                $this->icon = array('header' => 'Content-type: image/jpeg', 'file' => dirname(__FILE__).'/../icons/'.$status.'_'.$departmentid.'.jpg');
            } elseif ($departmentid !== '' && file_exists(dirname(__FILE__).'/../icons/'.$status.'_'.$departmentid.'.png')) {
                $this->icon = array('header' => 'Content-type: image/png', 'file' => dirname(__FILE__).'/../icons/'.$status.'_'.$departmentid.'.png');
            } elseif ($departmentid !== '' && file_exists(dirname(__FILE__).'/../icons/'.$status.'_'.$departmentid.'.swf')) {
                $this->icon = array('header' => 'Content-type: application/x-shockwave-flash', 'file' => dirname(__FILE__).'/../icons/'.$status.'_'.$departmentid.'.swf');
            } else {
                if (file_exists(dirname(__FILE__).'/../icons/'.$status.'.gif')) {
                    $this->icon = array('header' => 'Content-type: image/gif', 'file' => dirname(__FILE__).'/../icons/'.$status.'.gif');
                } elseif (file_exists(dirname(__FILE__).'/../icons/'.$status.'.jpg')) {
                    $this->icon = array('header' => 'Content-type: image/jpeg', 'file' => dirname(__FILE__).'/../icons/'.$status.'.jpg');
                } elseif (file_exists(dirname(__FILE__).'/../icons/'.$status.'.png')) {
                    $this->icon = array('header' => 'Content-type: image/png', 'file' => dirname(__FILE__).'/../icons/'.$status.'.png');
                } elseif (file_exists(dirname(__FILE__).'/../icons/'.$status.'.swf')) {
                    $this->icon = array('header' => 'Content-type: application/x-shockwave-flash', 'file' => dirname(__FILE__).'/../icons/'.$status.'.swf');
                }
            }
            return $this->icon;
        }

    }

?>