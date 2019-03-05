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
* This file contains the setup routine											  *
**********************************************************************************/

    include_once('../class/include.php');

    if (isset($_POST['four']) || isset($_POST['five'])) {
        $inc = new Includer('setup_db');
    } else {
        $inc = new Includer('setup');
    }

    $inc->template();
    $inc->file();
    $inc->setup();

    if (isset($_POST['one'])) {
        if (isset($_POST['submit'])) {
            $GLOBALS['setup']->language(addslashes($_POST['language']));
        }
        // Create the .htaccess files as some FTP clients cannot see them and therefore
        // do not upload them.
        if (!file_exists(dirname(__FILE__).'/../cache/.htaccess')) {
            $GLOBALS['file']->create(dirname(__FILE__).'/../cache/.htaccess', "<Limit GET POST>\ndeny from all\n</Limit>");
        }
        if (!file_exists(dirname(__FILE__).'/../compile/.htaccess')) {
            $GLOBALS['file']->create(dirname(__FILE__).'/../compile/.htaccess', "<Limit GET POST>\ndeny from all\n</Limit>");
        }
        $GLOBALS['template']->assign('step', '2');
    } elseif (isset($_POST['two'])) {
        if (isset($_POST['submit'])) {
            $GLOBALS['setup']->conf(addslashes($_POST['host']), addslashes($_POST['database']), addslashes($_POST['username']), addslashes($_POST['password']), addslashes($_POST['prefix']), addslashes($_POST['url']), addslashes($_POST['monitor_traffic']), addslashes($_POST['template']), addslashes($_POST['company']), $_SESSION['hcl_language']);
        }
        $GLOBALS['template']->assign('step', '3');
    } elseif (isset($_POST['three'])) {
        $GLOBALS['template']->assign('install_upgrade', addslashes($_POST['install_upgrade']));
        $GLOBALS['template']->assign('step', '4');
    } elseif (isset($_POST['four'])) {
        if (isset($_POST['submit'])) {
            if ($_POST['install_upgrade'] == 'install') {
                $GLOBALS['setup']->install_db();
            } else {
                $GLOBALS['setup']->upgrade_db();
            }
        }
        @chmod(dirname(__FILE__).'/../config.php', 0644);
        if ($GLOBALS['file']->check_write(dirname(__FILE__).'/../config.php')) {
            $GLOBALS['template']->assign('step', '5');
        } else {
            $GLOBALS['template']->assign('step', '6');
        }
    } elseif (isset($_POST['five'])) {
        if (isset($_POST['skip'])) {
            $GLOBALS['template']->assign('step', '6');
        } else {
            @chmod(dirname(__FILE__).'/../config.php', 0644);
            if ($GLOBALS['file']->check_write(dirname(__FILE__).'/../config.php')) {
                $GLOBALS['template']->assign('step', '5');
            } else {
                $GLOBALS['template']->assign('step', '6');
            }
        }
    } else {
        $GLOBALS['template']->assign('step', '1');
    }

    if (isset($_SESSION['hcl_language'])) {
        $GLOBALS['template']->assign('lang_file', $_SESSION['hcl_language']);
    } else {
        $GLOBALS['template']->assign('lang_file', 'english.php');
    }

    $GLOBALS['template']->assign('template_dir', 'Bliss');
    #Small hack to fix an issue with HTTP_HOST not being defined
    error_reporting (0);
    if (@isset($_SERVER['HTTP_HOST']))
    @$GLOBALS['template']->assign('url', 'http://'.$_SERVER['HTTP_HOST'].substr(strrev(strstr(strrev(substr(strrev(strstr(strrev($_SERVER['PHP_SELF']), '/')), 0, -1)), '/')), 0, -1));
    else
    @$GLOBALS['template']->assign('url', $conf['url']);    
    error_reporting (E_ALL);
    #End hack
    
    $GLOBALS['template']->assign('language', $GLOBALS['setup']->language());
    $GLOBALS['template']->assign('template', $GLOBALS['setup']->template());

    // Display the output
    $GLOBALS['template']->display('setup.tpl');
    
    // do events that need to be done at the end of the file
    $inc->finished();
    
?>