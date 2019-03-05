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

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

require_once( $mainframe->getPath( 'toolbar_html' ) );

switch ( $task ) {
	case "conf":
		TOOLBAR_jambook::_EDIT_CONFIG();
		break;
	case "list":
		TOOLBAR_jambook::LIST_MENU();
		break;
	case "new":
	case "edit":
		TOOLBAR_jambook::EDIT_MENU();
		break;
	case "listtemplates":
		TOOLBAR_jambook::LISTTMPL_MENU();
		break;
	case "edittemplate":
		TOOLBAR_jambook::EDITTMPL_MENU();
		break;
	case "info":
	default:
		TOOLBAR_jambook::BACKONLY_MENU();
		break;
}
