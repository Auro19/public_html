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
* This class contains all the Hot Page functions								  *
**********************************************************************************/

    class Hotpage {

        var $result;
        var $hotpage;
        
        function check($page)
        {
            $this->hotpage = false;
            if ($this->result = $GLOBALS['db']->query('SELECT * FROM `hotpages` WHERE 1')) {
                foreach ($this->result as $key => $val) {
                    if (stristr($page, $this->result[$key]['page'])) {
                        $this->hotpage = true;
                    }
                }
            }
            return $this->hotpage;
        }

        function listall()
        {
            if ($this->result = $GLOBALS['db']->query('SELECT * FROM `hotpages` WHERE 1')) {
                return $this->result;
            } else {
                return false;
            }
        }

        function get($id)
        {
            if ($this->result = $GLOBALS['db']->query('SELECT * FROM `hotpages` WHERE `id`="'.$id.'"')) {
                return $this->result[0];
            } else {
                return false;
            }
        }

        function insert($page)
        {
            if ($page === '') $page = ' ';
            if ($GLOBALS['db']->query('INSERT INTO `hotpages` (`page`) VALUES ("'.$page.'")')) {
                return true;
            } else {
                return false;
            }
        }

        function update($id, $page)
        {
            if ($id === '') return false;
            if ($page === '') $page =' ';
            if ($GLOBALS['db']->query('UPDATE `hotpages` SET `page`="'.$page.'" WHERE `id`="'.$id.'"')) {
                return true;
            } else {
                return false;
            }
        }

        function delete($id)
        {
            $GLOBALS['db']->query('DELETE FROM `hotpages` WHERE `id`="'.$id.'"');
        }

    }

?>