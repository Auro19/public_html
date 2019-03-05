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
* This class contains all the setup functions									  *
**********************************************************************************/

    class Setup {

        var $result;
        var $sql;
        var $files;
        var $file;
        var $dirs;
        var $id;

        function install_db()
        {
            $GLOBALS['inc']->db();
            $this->sql = $GLOBALS['file']->read(dirname(__FILE__).'/../setup/database.sql');
            $GLOBALS['db']->query($this->sql);
            $GLOBALS['db']->query('INSERT INTO `operators` (`username`, `password`, `firstname`, `lastname`, `email`, `showpic`, `autosave`, `level`,`picture`) VALUES ("admin", "'.md5('admin').'", "Default", "User", "admin@example.com", "0", "1", "0","")');
            $this->id = $GLOBALS['db']->id();
            $GLOBALS['db']->query('INSERT INTO `notes` (`timestamp`,`operatorid`, `subject`, `message`) VALUES (UNIX_TIMESTAMP(), "'.$this->id.'", "'.$GLOBALS['lang']['hcl_welcome'].'", "'.$GLOBALS['lang']['hcl_welcome_message'].'")');
        }

        function upgrade_db()
        {
            $GLOBALS['inc']->db();
            $this->sql = $GLOBALS['file']->read(dirname(__FILE__).'/../setup/upgrade.sql');
            if ($GLOBALS['db']->query($this->sql)) {
                return true;
            } else {
                return false;
            }
        }

        function conf($host, $database, $username, $password, $prefix, $url, $monitor_traffic, $template, $company, $language)
        {
            $this->file = $GLOBALS['file']->read(dirname(__FILE__).'/../config.php');
            $this->file = preg_replace("/\['host'\] = '.*';/", '[\'host\'] = \''.$host.'\';', $this->file);
            $this->file = preg_replace("/\['database'\] = '.*';/", '[\'database\'] = \''.$database.'\';', $this->file);
            $this->file = preg_replace("/\['username'\] = '.*';/", '[\'username\'] = \''.$username.'\';', $this->file);
            $this->file = preg_replace("/\['password'\] = '.*';/", '[\'password\'] = \''.$password.'\';', $this->file);
            $this->file = preg_replace("/\['prefix'\] = '.*';/", '[\'prefix\'] = \''.$prefix.'\';', $this->file);
            $this->file = preg_replace("/\['url'\] = '.*';/", '[\'url\'] = \''.$url.'\';', $this->file);
            $this->file = preg_replace("/\['monitor_traffic\'\] = '.*';/", '$conf[\'monitor_traffic\'] = \''.$monitor_traffic.'\';', $this->file);
            $this->file = preg_replace("/\['template'\] = '.*';/", '[\'template\'] = \''.$template.'\';', $this->file);
            $this->file = preg_replace("/\['lang'\] = '.*';/", '[\'lang\'] = \''.substr($language, 0, -4).'\';', $this->file);
            $this->file = preg_replace("/\['company'\] = '.*';/", '[\'company\'] = \''.$company.'\';', $this->file);
            $GLOBALS['file']->save(dirname(__FILE__).'/../config.php', $this->file);
        }

        function language($language = '')
        {
            if ($language == '') {
                $results = array();
                $this->files = $GLOBALS['file']->filelist(dirname(__FILE__).'/../lang/', 'php');
                foreach ($this->files as $key => $val) {
                    $this->files[$key]['name'] = ucfirst(strtolower(substr($this->files[$key]['file'], 0, -4)));
                    if (substr($this->files[$key]['name'], 0, 5) !== 'Index') {
                        $results[] = $this->files[$key];
                    }
                }
                return $results;
            } else {
                $_SESSION['hcl_language'] = $language;
            }
        }

        function template()
        {
            $results = array();
            $this->dirs = $GLOBALS['file']->dirlist(dirname(__FILE__).'/../templates/');
            foreach ($this->dirs as $key => $val) {
                $this->dirs[$key]['name'] = ucfirst(strtolower($this->dirs[$key]['dir']));
                if (substr($this->dirs[$key]['name'], 0, 5) !== 'Index') {
                    $results[] = $this->dirs[$key];
                }
            }
            return $results;
        }

    }

?>