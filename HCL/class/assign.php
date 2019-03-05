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
* This class contains functions related to the assigning of operators to          *
* departments   																  *
**********************************************************************************/

    class Assign {

        var $result;
        var $result2;
        var $poll;

        function delete($assignid)
        {
            $GLOBALS['db']->query('DELETE FROM `assigns` WHERE `id`="'.$assignid.'"');
        }

        function delete_department($departmentid)
        {
            $GLOBALS['db']->query('DELETE FROM `assigns` WHERE `departmentid`="'.$departmentid.'"');
        }

        function delete_operator($operatorid)
        {
            $GLOBALS['db']->query('DELETE FROM `assigns` WHERE `operatorid`="'.$operatorid.'"');
        }

        function insert($operatorid, $departmentid, $poll)
        {
            if ($departmentid === "") $departmentid='0';
            if ($operatorid === "") $operatorid='0';
            if ($poll === "") $poll='0';
        	if ($GLOBALS['db']->query('INSERT INTO `assigns` (`departmentid`, `operatorid`, `poll`) VALUES ("'.$departmentid.'", "'.$operatorid.'", "'.$poll.'")')) {
                return true;
            } else {
                return false;
            }
        }

        function listall()
        {
            if ($this->result = $GLOBALS['db']->query('SELECT * FROM `departments` WHERE 1')) {
                foreach ($this->result as $key => $val) {
                    if ($this->result2 = $GLOBALS['db']->query('SELECT * FROM `assigns` WHERE `departmentid`="'.$this->result[$key]['id'].'" ORDER BY `poll` DESC LIMIT 1')) {
                        $this->poll = $this->result2[0]['poll'];
                    } else {
                        $this->poll = -1;
                    }
                    $this->result[$key]['operators'] = $GLOBALS['db']->query('SELECT * FROM `operators` WHERE 1');
                    foreach ($this->result[$key]['operators'] as $key2 => $val2) {
                        if ($this->result2 = $GLOBALS['db']->query('SELECT * FROM `assigns` WHERE `departmentid`="'.$this->result[$key]['id'].'" AND `operatorid`="'.$this->result[$key]['operators'][$key2]['id'].'" ORDER BY `poll` ASC')) {
                            $this->result[$key]['operators'][$key2]['checked'] = 'true';
                            $this->result[$key]['operators'][$key2]['poll'] = $this->result2[0]['poll'];
                        } else {
                            $this->result[$key]['operators'][$key2]['checked'] = 'false';
                            $this->poll = $this->poll + 1;
                            $this->result[$key]['operators'][$key2]['poll'] = $this->poll;
                        }
                    }
                }
                return $this->result;
            } else {
                return false;
            }
        }

    }

?>