<?php
/**
* @version	$Id: users.php 10381 2008-06-01 03:35:53Z pasamio$
* @package	Joomla
* @subpackage	noixACL
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license	GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

function com_uninstall()
{
	jimport('joomla.filesystem.file');
	
    $fileDestiny = JPATH_SITE.DS."libraries".DS."joomla".DS."installer".DS."adapters".DS."adapter.php";
    //check if my adapter exists in joomla libraries
    if( file_exists($fileDestiny) ){
        if( !JFile::delete($fileDestiny) ){
            echo JText::_("ERRORDELETELIB");
        }
    }
}