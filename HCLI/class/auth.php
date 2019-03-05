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
* This class contains all the authentication functions					          *
**********************************************************************************/

    class Auth {

        var $username;
        var $password;
        var $result;
        var $operatorname;

        // This function returns a boolean as to whether the current
        // person logged in is an operator. If the arguements
        // $username (and optional $password) are passed into the function,
        // that operator will be checked instead.
        function operator($username = '', $password = '')
        {
            if ($username == '' && $password == '') {
                if (isset($_SESSION['hcl_username']) && isset($_SESSION['hcl_password'])) {
                    if ($GLOBALS['db']->query('SELECT `id` FROM `operators` WHERE `username`="'.$_SESSION['hcl_username'].'" AND `password`="'.$_SESSION['hcl_password'].'"')) {
                        $this->username = $_SESSION['hcl_username'];
                        $this->password = $_SESSION['hcl_password'];
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                if ($username !== '' && $password !== '') {
                    if ($GLOBALS['db']->query('SELECT `id` FROM `operators` WHERE `username`="'.$username.'" AND `password`="'.md5($password).'"')) {
                        return true;
                    } else {
                        return false;
                    }
                } elseif ($username !== '' && $password == '') {
                    if ($GLOBALS['db']->query('SELECT `id` FROM `operators` WHERE `username`="'.$username.'"')) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        }

        function admin()
        {
            if (isset($_SESSION['hcl_username']) && isset($_SESSION['hcl_password'])) {
                if ($this->result = $GLOBALS['db']->query('SELECT `level` FROM `operators` WHERE `username`="'.$_SESSION['hcl_username'].'" AND `password`="'.$_SESSION['hcl_password'].'"')) {
                    if ($this->result[0]['level'] == '0') {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        function login($username, $password, $arg = '')
        {
            if ($arg == '') {
                if ($login = $GLOBALS['db']->query('SELECT `id` FROM `operators` WHERE `username`="'.$username.'" AND `password`="'.md5($password).'"')) {
                    $_SESSION['hcl_username'] = $username;
                    $_SESSION['hcl_password'] = md5($password);
                    return true;
                } else {
                    return false;
                }
            } else {
                switch($arg) {
                    case 'no_md5':
                        if ($GLOBALS['db']->query('SELECT `id` FROM `operators` WHERE `username`="'.$username.'" AND `password`="'.$password.'"')) {
                            $_SESSION['hcl_username'] = $username;
                            $_SESSION['hcl_password'] = $password;
                            return true;
                        } else {
                            return false;
                        }
                        break;
                    default:
                        return false;
                }
            }
        }

        function logout()
        {
            unset($_SESSION['hcl_username']);
            unset($_SESSION['hcl_password']);
            if (!isset($_SESSION['hcl_username']) && !isset($_SESSION['hcl_password'])) {
                return true;
            } else {
                return false;
            }
        }

        function check_login()
        {
             if ($this->operator()) {
                  header('Location: '.$GLOBALS['conf']['url'].'/admin/index.php');
             }
        }

        function check_logout()
        {
            if (!$this->operator()) {
                 header('Location: '.$GLOBALS['conf']['url'].'/admin/login.php');
                 exit;
            }
        }

    }

?>