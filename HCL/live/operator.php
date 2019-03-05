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
* This file is for requesting operator-to-operator chats						  *
**********************************************************************************/

    include_once('../class/include.php');
    $inc = new Includer();
    $inc->template();
    $inc->live();

    if (isset($_GET['operatorid'])) {
        $operatorid = addslashes($_GET['operatorid']);
    } else {
        $operatorid = '';
    }

    if (isset($_GET['retry'])) {
        $retry = 'true';
    } else {
        $retry = 'false';
    }

    if (!$GLOBALS['live']->status_operator($operatorid)) {
        header('Location: '.$GLOBALS['conf']['url'].'/live/divert.php?operator='.$operatorid.'&referrer='.$_SERVER['PHP_SELF']);
    }

    $GLOBALS['template']->assign('avaliable', $GLOBALS['live']->avaliable_operator($operatorid));
    $GLOBALS['template']->assign('operatorid', $operatorid);
    $GLOBALS['template']->assign('retry', $retry);

    // Display the output
    $GLOBALS['template']->display('live_operator.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>