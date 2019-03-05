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
* This file allows us to use Aardvark to send and receive variables to and from   *
* the client.		  															  *
**********************************************************************************/

    class Aardvark {

        var $variables_send = array();
        var $variables_receive = array();
        var $vars = array();

        // Add a variable to the output buffer
        function add($variable, $data)
        {
            // increase the variable output buffer array to include them
            array_push($this->variables_send, array('variable' => $variable, 'data' => $data));
        }

        // Send the response
        function send()
        {
            // Make sure the pages are not cached
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            // IE wants a privacy policy.. so send it one that will make it accept our cookies
            header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');
            // 60 seconds in the future is sufficient time for the browser to receive the cookie
            // and deal with it
			// 60 seconds is NOT sufficient, and clocks being off screw the whole world up.  Deal...
            $time = time() + 3800;
            // Loop through the variable output buffer
            foreach ($this->variables_send as $key => $val) {
                // Send the variables across in the form of cookies
                $domain = '';
                if (isset($this->vars['domain'])) {
                	$local = explode('.', $_SERVER['HTTP_HOST']);
                	$foreign = explode('.', addslashes(urldecode($this->vars['domain'])));
                	for ($i = count($foreign)-1; $i >= 0; $i--) {
                		if (isset($local[$i])) {
                			if ($foreign[$i] == $local[$i]) {
                				$domain = '.'.$foreign[$i].$domain;
                			} else {
                				$i = -1;
                			}
                		} else {
                			$i = -1;
                		}
                	}
                }
                if (strlen($domain) > 0) {
                	$domain = substr($domain, 1);
                }
                setcookie('aardvark_'.$this->variables_send[$key]['variable'], $this->variables_send[$key]['data'], $time, '/', $domain);
            }
            // XMLHttpRequest fails if it doesnt receive any 'body' content so send some of
            // that as well as the headers.
            echo('<!-- done -->');
        }

        // Grab incoming variables and sort them out into easy to read global variables
        function receive()
        {
            $this->variables_receive = array();
            foreach ($_GET as $key => $val) {
                if (substr($key, 0, 9) == 'aardvark_') {
                    $variable = addslashes(substr($key, 9));
                    $data = addslashes($val);
                    array_push($this->variables_receive, array('variable' => $variable));
                    array_push($this->variables_receive, array('data' => $data));
                    $this->vars[$variable] = $data;
                }
            }
            return $this->variables_receive;
        }

    }

?>