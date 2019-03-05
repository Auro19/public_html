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
* This class contains functions to add, edit and delete notes					  *
**********************************************************************************/

    define('HCL_NOTES_NL2BR', 1);
    define('HCL_NOTES_BR2NL', 2);
    define('HCL_NOTES_HTML_FRIENDLY', 4);

    class Notes {

        var $result;

        // This fetches all the notes an operator has and returns them in an array
        function fetch($id = '', $column = '', $action = '', $action2 = '')
        {

            $this->result = $GLOBALS['db']->query('SELECT * FROM `notes` WHERE `operatorid`="'.$GLOBALS['operator']->id().'" ORDER BY `timestamp` DESC');

            if (!$this->result) {
                return false;
            } else {

                foreach($this->result as $key => $val) {
                    $this->result[$key]['time'] = gmdate('G:i:s D jS F Y', $this->result[$key]['timestamp'] + (3600 * $GLOBALS['conf']['offset']));
                }

                switch ($action) {
                    case HCL_NOTES_NL2BR:
                        foreach ($this->result as $key => $val) {
                            if ($column !== '') {
                                $this->result[$key][$column] = nl_br($this->result[$key][$column]);
                            } else {
                                foreach ($this->result[$key] as $key2 => $val2) {
                                    $this->result[$key][$key2] = nl_br($val2);
                                }
                            }
                        }
                        break;
                    case HCL_NOTES_BR2NL:
                        foreach ($this->result as $key => $val) {
                            if ($column !== '') {
                                $this->result[$key][$column] = br_nl($this->result[$key][$column]);
                            } else {
                                foreach ($this->result[$key] as $key2 => $val2) {
                                    $this->result[$key][$key2] = br_nl($val2);
                                }
                            }
                        }
                        break;
                }

                switch ($action2) {
                    case HCL_NOTES_HTML_FRIENDLY:
                        foreach ($this->result as $key => $val) {
                            if ($column !== '') {
                                $this->result[$key][$column] = htmlspecialchars($this->result[$key][$column]);
                            } else {
                                foreach ($this->result[$key] as $key2 => $val2) {
                                    $this->result[$key][$key2] = htmlspecialchars($val2);
                                }
                            }
                        }
                        break;
                }

                if ($id !== '') {
                    if ($column !== '') {
                        $this->result = $this->result[key_from_match_val2($this->result, $id)][$column];
                    } else {
                        $this->result = $this->result[key_from_match_val2($this->result, $id)];
                    }
                }

                return $this->result;
            }
        }

        function add($subject, $message)
        {
            $message = nl_br($message);
            $operatorid = $GLOBALS['operator']->id();
            if ($operatorid === '') $operatorid = ' ';
            if ($subject === '') $subject = ' ';
            if ($message === '') $message = ' ';
            $GLOBALS['db']->query('INSERT INTO `notes` (`timestamp`,`operatorid`, `subject`, `message`) VALUES (UNIX_TIMESTAMP(), "'.$operatorid.'", "'.$subject.'", "'.$message.'")');
        }

        function update($id, $subject, $message)
        {
            $message = nl_br($message);
            if ($subject === '') $subject = ' ';
            if ($message === '') $message = ' ';
            $GLOBALS['db']->query('UPDATE `notes` SET `timestamp`=UNIX_TIMESTAMP(), `subject`="'.$subject.'", `message`="'.$message.'" WHERE `id`="'.$id.'"');
        }

        function delete($id) {
            $GLOBALS['db']->query('DELETE FROM `notes` WHERE `id`="'.$id.'"');
        }

    }

?>