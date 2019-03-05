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
* This class contains all the functions related to canned messages		          *
**********************************************************************************/

    class Canned {

        var $result;
        var $result2;
        var $canned;

        function get($operatorid = '', $departmentid = '', $id = '')
        {
            if ($id !== '') {
                $this->result = $GLOBALS['db']->query('SELECT * FROM `canned` WHERE `id`="'.$id.'"');
                $this->canned = $this->result[0];
            } else {
                if ($operatorid == '') {
                    $operatorid = $GLOBALS['operator']->id();
                    if (!$GLOBALS['operator']->id()) {
                        return false;
                    }
                }
                $this->canned = array(
                    'all' => array(),
                    'op' => array(),
                    'dep' => array(),
                    'both' => array()
                );
                if ($this->canned['all'] = $GLOBALS['db']->query('SELECT * FROM `canned` WHERE `departmentid`="0" AND `operatorid`="0"')){
                    foreach ($this->canned['all'] as $key => $val) {
                        $this->canned['all'][$key]['message_js'] = addslashes($this->canned['all'][$key]['message']);
                    }
                }
                if ($this->canned['op'] = $GLOBALS['db']->query('SELECT * FROM `canned` WHERE `departmentid`="0" AND `operatorid`="'.$operatorid.'"')) {
                    foreach ($this->canned['op'] as $key => $val) {
                        $this->canned['op'][$key]['message_js'] = addslashes($this->canned['op'][$key]['message']);
                    }
                }
                if ($departmentid == '') {
                    if ($this->result = $GLOBALS['db']->query('SELECT * FROM `assigns` WHERE `operatorid`="'.$operatorid.'"')) {
                        foreach ($this->result as $key => $val) {
                            $this->result2 = $GLOBALS['db']->query('SELECT * FROM `canned` WHERE `departmentid`="'.$this->result[$key]['departmentid'].'" AND `operatorid`="0"');
                            if ($this->result2) {
                                $this->canned['dep'] = array_merge($this->canned['dep'], array(array('name' => $GLOBALS['department']->name($this->result[$key]['departmentid']), 'messages' => $this->result2)));
                            }
                            $this->result2 = $GLOBALS['db']->query('SELECT * FROM `canned` WHERE `departmentid`="'.$this->result[$key]['departmentid'].'" AND `operatorid`="'.$operatorid.'"');
                            if ($this->result2) {
                                $this->canned['both'] = array_merge($this->canned['both'], array(array('name' => $GLOBALS['department']->name($this->result[$key]['departmentid']), 'messages' => $this->result2)));
                            }
                        }
                    }
                } else {
                    $this->canned['dep'] = $GLOBALS['db']->query('SELECT * FROM `canned` WHERE `departmentid`="'.$departmentid.'" AND `operatorid`="0"');
                    $this->canned['both'] = $GLOBALS['db']->query('SELECT * FROM `canned` WHERE `departmentid`="'.$departmentid.'" AND `operatorid`="'.$operatorid.'"');
                }
                if ($this->canned['dep']) {
                    foreach ($this->canned['dep'] as $key => $val) {
                        if (isset($this->canned['dep'][$key]['messages'][0])) {
                            foreach ($this->canned['dep'][$key]['messages'] as $key2 => $val2) {
                                $this->canned['dep'][$key]['messages'][$key2]['message_js'] = addslashes($this->canned['dep'][$key]['messages'][$key2]['message']);
                            }
                        }
                    }
                }
                if ($this->canned['both']) {
                    foreach ($this->canned['both'] as $key => $val) {
                        if (isset($this->canned['both'][$key]['messages'][0])) {
                            foreach ($this->canned['both'][$key]['messages'] as $key2 => $val2) {
                                $this->canned['both'][$key]['messages'][$key2]['message_js'] = addslashes($this->canned['both'][$key]['messages'][$key2]['message']);
                            }
                        }
                    }
                }
            }
            return $this->canned;
        }

        function insert($operatorid, $departmentid, $subject, $message)
        {
            $subject = str_replace("\n", "   ", $subject);
            $message = str_replace("\n", "   ", $message);
            if ($operatorid === '') $operatorid = '0';
            if ($departmentid === '') $departmentid = '0';
            if ($subject === '') $subject = ' ';
            $GLOBALS['db']->query('INSERT INTO `canned` (`operatorid`, `departmentid`, `subject`, `message`) VALUES ("'.$operatorid.'", "'.$departmentid.'", "'.$subject.'", "'.$message.'")');
        }

        function update($id, $operator, $department, $subject, $message)
        {
            $subject = str_replace("\n", "   ", $subject);
            $message = str_replace("\n", "   ", $message);
            if ($operatorid === '') $operatorid = '0';
            if ($departmentid === '') $departmentid = '0';
            if ($subject === '') $subject = ' ';
            if ($messaage === '') $message = ' ';
            $GLOBALS['db']->query('UPDATE `canned` SET `operatorid`="'.$operator.'", `departmentid`="'.$department.'", `subject`="'.$subject.'", `message`="'.$message.'" WHERE `id`="'.$id.'"');
        }

        function delete($id)
        {
            $GLOBALS['db']->query('DELETE FROM `canned` WHERE `id`="'.$id.'"');
        }

    }

?>