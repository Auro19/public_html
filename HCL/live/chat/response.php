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

    include_once('../../class/include.php');
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

    if (isset($aardvark->vars['cobrowsestarted'])) {
        $GLOBALS['cobrowse']->notify();
    } elseif (isset($aardvark->vars['chat'])) {
        $aardvark->add('chat_'.$aardvark->vars['chatid'], $GLOBALS['chat']->response($aardvark->vars['chatid'], $aardvark->vars['typing'], $aardvark->vars['admin'], $aardvark->vars['checksum'], $aardvark->vars['copage']));
    } elseif (isset($aardvark->vars['send']) && isset($aardvark->vars['message'])) {
        if ($aardvark->vars['message'] !== '') {
            $GLOBALS['chat']->send($aardvark->vars['chatid'], $aardvark->vars['message'], $aardvark->vars['admin'], $aardvark->vars['opchat']);
        }
    } elseif (isset($aardvark->vars['transfer']) && isset($aardvark->vars['operatorid']) && isset($aardvark->vars['departmentid'])) {
        $GLOBALS['chat']->transfer($aardvark->vars['chatid'], $aardvark->vars['operatorid'], $aardvark->vars['departmentid']);
    }

    // Send the variables across to the client
    $aardvark->send();

    // do events that need to be done at the end of the file
    $inc->finished();

?>