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
* This file contains a relay to connect the javascript classes to the php classes *
* in the request monitor														  * 
**********************************************************************************/

    include_once('../../class/include.php');
    $inc = new Includer();
    $inc->auth();
    $inc->operator();
    $inc->monitor();
    $inc->aardvark();

    // Receive all the variables sent into the file
    $variables = $aardvark->receive();

    // Check to see if the person is not logged in
    $GLOBALS['auth']->check_logout();

    if(!isset($aardvark->vars['id'])) {
        $aardvark->vars['id'] = '';
    }
    if(!isset($aardvark->vars['chatid'])) {
        $aardvark->vars['chatid'] = '';
    }

    if (isset($aardvark->vars['monitor'])) {
        $aardvark->add('monitor_'.$GLOBALS['operator']->id(), $GLOBALS['monitor']->response());
    }
    if (isset($aardvark->vars['accept_chat'])) {
        $GLOBALS['monitor']->accept_chat($aardvark->vars['id'], $aardvark->vars['chatid']);
    }
    if (isset($aardvark->vars['decline_chat'])) {
        $GLOBALS['monitor']->decline_chat($aardvark->vars['id'], $aardvark->vars['chatid']);
    }
    if (isset($aardvark->vars['accept_opchat'])) {
        $GLOBALS['monitor']->accept_opchat($aardvark->vars['id'], $aardvark->vars['chatid']);
    }
    if (isset($aardvark->vars['decline_opchat'])) {
        $GLOBALS['monitor']->decline_opchat($aardvark->vars['id'], $aardvark->vars['chatid']);
    }
    if (isset($aardvark->vars['accept_transfer'])) {
        $GLOBALS['monitor']->accept_transfer($aardvark->vars['id'], $aardvark->vars['chatid']);
    }
    if (isset($aardvark->vars['decline_transfer'])) {
        $GLOBALS['monitor']->decline_transfer($aardvark->vars['id'], $aardvark->vars['chatid']);
    }
    if (isset($aardvark->vars['status'])) {
        $GLOBALS['monitor']->status($aardvark->vars['x']);
    }
    if (isset($aardvark->vars['sounds'])) {
        $GLOBALS['monitor']->sounds($aardvark->vars['x']);
    }

    // Send the variables across to the client
    $aardvark->send();
    
    // do events that need to be done at the end of the file
    $inc->finished();
?>