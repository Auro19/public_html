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
* This class allows emails to be sent using the email templates and		          *
* data passed into the functions												  *
**********************************************************************************/

    class Email {

        function auth($host, $port, $username, $password)
        {
            $GLOBALS['phpmailer']->IsMail(); // set mailer to use SMTP
            $GLOBALS['phpmailer']->Host = $host; // specify main and backup server
            $GLOBALS['phpmailer']->SMTPAuth = true; // turn on SMTP authentication
            $GLOBALS['phpmailer']->Username = $username;  // SMTP username
            $GLOBALS['phpmailer']->Password = $password; // SMTP password
            $GLOBALS['phpmailer']->Port = $port; // SMTP port
        }

        function send($subject, $message, $to, $toname, $from, $fromname)
        {
            $GLOBALS['phpmailer']->From = $from;
            $GLOBALS['phpmailer']->FromName = $fromname;
            $GLOBALS['phpmailer']->AddAddress($to, $toname);
            $GLOBALS['phpmailer']->AddReplyTo($from, $fromname);

            $GLOBALS['phpmailer']->WordWrap = 50;
            $GLOBALS['phpmailer']->IsHTML(true);
            $GLOBALS['phpmailer']->Subject = $subject;
            $GLOBALS['phpmailer']->Body = $message;

            if ($GLOBALS['phpmailer']->Send()) {
                return true;
            } else {
                return false;
            }
        }

        function transcript($guest, $details)
        {
            // open the email template and replace the tags.
            $file = dirname(__FILE__).'/../templates/'.$GLOBALS['conf']['template'].'/email_transcript.tpl';
            if ($fp = fopen($file, 'r')) {
                $message = fread($fp, filesize($file));
                fclose($fp);
            } else {
                $message = '';
            }
            foreach ($GLOBALS['conf'] as $key => $val) {
                if (!is_array($GLOBALS['conf'][$key])) {
                    $message = str_replace('{$conf.'.$key.'}', $val, $message);
                }
            }
            foreach ($GLOBALS['lang'] as $key => $val) {
                $message = str_replace('{$lang.'.$key.'}', $val, $message);
            }
            foreach ($details as $key => $val) {
                $message = str_replace('{$details.'.$key.'}', $val, $message);
            }
            if ($this->send($GLOBALS['conf']['company']." - ".$GLOBALS['lang']['chat_transcript'], $message, $guest['email'], $guest['name'], $details['email'], $GLOBALS['conf']['company'])) {
                return true;
            } else {
                return false;
            }
        }

        function contact($details)
        {
            if ($this->send($details['subject'], $details['message'], $details['email'], $details['department'], $details['from'], $details['name'])) {
                return true;
            } else {
                return false;
            }
        }

    }

?>