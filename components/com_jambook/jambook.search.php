<?php
/**
 * Jambook guestbook component for Joomla.
 *
 * Distributed under the terms of the GNU General Public License v2
 * http://www.gnu.org/copyleft/gpl.html
 * This software may be used without warrany provided and
 * copyright statements are left intact.
 *
 * @package JX Development
 * @subpackage Jambook
 * @copyright Copyright (C) 2007-2008 Olle Johansson
 * @author Olle Johansson - http://www.jxdevelopment.com
 * @version $Id$
 **/

if ( !defined( '_VALID_MOS' ) && !defined('_JEXEC') ) die( 'Direct Access to this location is not allowed.' );

// Read configuration file
include_once( $mainframe->getCfg( 'absolute_path' ) . "/components/com_jambook/configuration.php" );

// Merge results with rest of search result.
$rows = array_merge( $rows, $foundlinks );
