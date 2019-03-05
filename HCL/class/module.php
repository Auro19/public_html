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
* This class allows implementation of modules    								  *
**********************************************************************************/

    class Module {

        var $result;
        var $modules;
        var $links;
        var $array;

        function exists($module) {
            if (is_dir(dirname(__FILE__).'/../modules/'.$module)) {
                if (is_dir(dirname(__FILE__).'/../modules/'.$module.'/hcl')) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        function active($module) {
            $this->get_all();
            foreach ($this->modules as $key => $var) {
                if ($this->modules[$key]['dir'] == $module) {
                    if ($this->get_config($this->modules[$key]['dir'])) {
                        if ($GLOBALS['conf']['modules'][$this->modules[$key]['dir']]['active']) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                }
            }
        }

        function auth($module)
        {
            if ($this->exists($module)) {
                include_once(dirname(__FILE__).'/../modules/'.$module.'/hcl/auth.php');
                return true;
            } else {
                return false;
            }
        }

        function links($type, $display = '')
        {
            $this->links = array();
            $this->get_all();
            foreach ($this->modules as $key => $val) {
                if ($this->get_config($this->modules[$key]['dir'])) {
                    if ($GLOBALS['conf']['modules'][$this->modules[$key]['dir']]['active'] && ($GLOBALS['conf']['modules'][$this->modules[$key]['dir']]['display'] || $display == 'true')) {
                        if ($GLOBALS['conf']['modules'][$this->modules[$key]['dir']]['operator'] !== '') {
                            $this->array['name'] = $this->modules[$key]['dir'];
                            $this->array['title'] = $GLOBALS['conf']['modules'][$this->modules[$key]['dir']]['title'];
                            switch ($type) {
                            case 'operator':
                                $this->array['url'] = $GLOBALS['conf']['url'].'/admin/module.php?module='.$this->modules[$key]['dir'].'&file='.$GLOBALS['conf']['modules'][$this->modules[$key]['dir']]['operator'].'&type=operator';
                                break;
                            case 'admin':
                                $this->array['url'] = $GLOBALS['conf']['url'].'/admin/module.php?module='.$this->modules[$key]['dir'].'&file='.$GLOBALS['conf']['modules'][$this->modules[$key]['dir']]['admin'].'&type=admin';
                                break;
                            case 'conf':
                                $this->array['url'] = $GLOBALS['conf']['url'].'/admin/module.php?module='.$this->modules[$key]['dir'].'&file='.$GLOBALS['conf']['modules'][$this->modules[$key]['dir']]['conf'].'&type=conf';
                                break;
                            }
                            $this->links[] = $this->array;
                        }
                    }
                }
            }
            return $this->links;
        }

        function get_all()
        {
            $this->modules = $GLOBALS['file']->dirlist(dirname(__FILE__).'/../modules/');
            return $this->modules;
        }

        function get_config($module = '')
        {
            if ($module !== '') {
                if ($this->exists($module)) {
                    include_once(dirname(__FILE__).'/../modules/'.$module.'/hcl/config.php');
                    return true;
                } else {
                    return false;
                }
            } else {
                $this->get_all();
                foreach ($this->modules as $key => $val) {
                    $this->get_config($this->modules[$key]['dir']);
                }
            }
        }

    }

?>