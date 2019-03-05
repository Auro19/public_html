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
* This class contains misc functions that are not really associated with a		  *
* specific class/genre of functions												  *
**********************************************************************************/

    function key_from_match_val2($array, $match)
    {
        $returned = false;
        foreach ($array as $key => $val) {
            foreach ($array[$key] as $key2 => $val2) {
                if ($array[$key][$key2] == $match) {
                    return $key;
                    $returned = true;
                }
            }
        }
        if ($returned !== true) {
            return false;
        }
    }

    function nl_br($arg)
    {
         return preg_replace("!\n!iU", '<br />', $arg);
    }

    function br_nl($arg)
    {
         return preg_replace('!<br.*>!iU', "\n", $arg);
    }

    function secs_to_hms($time)
    {
        $secs = $time;
        if ($secs > 59) {
            $hours = floor($secs / 3600);
            $secs = $secs % 3600;
            $mins = floor($secs / 60);
            $secs = $secs % 60;
            if ($hours > 0) {
                return $hours.' hours '.$mins.' mins '.$secs.' secs';
            } else {
                return $mins.' mins '.$secs.' secs';
            }
        } else {
            return $secs.' secs';
        }
    }

    function ascii_to_html($ascii)
    {
        if ($ascii < '127') {
            return chr($ascii);
        } else {
            return '&#'.$ascii.';';
        }
    }

    function char_to_html($string)
    {
        $html = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $html .= '&#'.ord($string{$i}).';';
        }
        return $html;
    }

    function html_to_char($string) 
    {
        $character = split(";", $string);
        $text = '';
        foreach ($character as $key => $val) {
            if (strlen($character[$key]) > 2) {
                $ascii = substr($character[$key], 2);
                $html = chr($ascii);
                $text = $text.$html;
            }
        }
        return $text;
    }

    function parse_with_session($chatid, $string, $person = '')
    {
        if ($person == 'operator') {
            $string = str_replace('PERSON', $_SESSION['hcl_'.$chatid]['operator'], $string);
        } elseif ($person == 'guest') {
            $string = str_replace('PERSON', $_SESSION['hcl_'.$chatid]['guest'], $string);
        }
        $string = str_replace('GUEST', $_SESSION['hcl_'.$chatid]['guest'], $string);
        $string = str_replace('OPERATOR', $_SESSION['hcl_'.$chatid]['operator'], $string);
        $string = str_replace('DEPARTMENT', $_SESSION['hcl_'.$chatid]['department'], $string);
        return $string;
    }

    if (!function_exists('file_get_contents')) {
        function file_get_contents($file) {
            $file = file($file);
            return !$file ? false : implode('', $file);
        }
    }


?>