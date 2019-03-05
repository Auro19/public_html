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
* This file is a relay between the javascript chat class and the php classes	  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->chat();
    $inc->operator();
    $inc->live();
    $inc->aardvark();
    
    if ($GLOBALS['chat']->blocked()) {
        $inc->finished();
        exit;
    }

    // Receive all the variables sent into the file
    $variables = $aardvark->receive();


    if(!isset($aardvark->vars['id'])) {
        $aardvark->vars['id'] = '';
    }
    if(!isset($aardvark->vars['chatid'])) {
        $aardvark->vars['chatid'] = '';
    }
    if (isset($aardvark->vars['admin'])) {
        $aardvark->vars['admin'] = 'true';
    } else {
        $aardvark->vars['admin'] = 'false';
    }
    if (isset($aardvark->vars['opchat'])) {
        $aardvark->vars['opchat'] = 'true';
    } else {
        $aardvark->vars['opchat'] = 'false';
    }
    if (isset($aardvark->vars['typing'])) {
        $aardvark->vars['typing'] = 'true';
    } else {
        $aardvark->vars['typing'] = 'false';
    }

    if (isset($aardvark->vars['live'])) {
        if (isset($aardvark->vars['endchat'])) {
            $GLOBALS['chat']->end($aardvark->vars['chatid']);
        }
        foreach ($_GET as $key => $val) {
            $_GET[substr($key, 9, strlen($key))] = addslashes($val);
            unset($_GET[$key]);
        }
        $aardvark->add('live_'.$GLOBALS['live']->chatid(), $GLOBALS['live']->response($_GET));
    } elseif (isset($aardvark->vars['request'])) {
        $aardvark->add('request_'.$GLOBALS['live']->chatid(), $GLOBALS['chat']->request($aardvark->vars['chatid'], $aardvark->vars['opchat']));
    } elseif (isset($aardvark->vars['cobrowse'])) {
        $aardvark->add('cobrowse_'.$GLOBALS['live']->chatid(), $GLOBALS['cobrowse']->response($aardvark->vars['chatid']));
    } elseif (isset($aardvark->vars['coforms']) && isset($aardvark->vars['type']) && isset($aardvark->vars['name']) && isset($aardvark->vars['value'])) {
        $GLOBALS['cobrowse']->setforms($GLOBALS['live']->chatid(), $aardvark->vars['type'], rawurldecode($aardvark->vars['name']), rawurldecode($aardvark->vars['value']), 'false');
    } elseif (isset($aardvark->vars['decline_initiate'])) {
        $GLOBALS['live']->decline_inititate();
    }

    // Send the variables across to the client
    $aardvark->send();

    // do events that need to be done at the end of the file
    $inc->finished();

?>