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

class TOOLBAR_jambook {

	function _EDIT_CONFIG() {
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::save( 'saveconf' );
		mosMenuBar::back();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}

	function BACKONLY_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::back();
		mosMenuBar::endTable();
	}

	function LIST_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::publish();
		mosMenuBar::unpublish();
		mosMenuBar::divider();
		mosMenuBar::addNew();
		mosMenuBar::editList();
		mosMenuBar::deleteList();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
	
	function EDIT_MENU() {
		mosMenuBar::startTable();
		if (defined('_JEXEC')) {
			mosMenuBar::preview( 'index.php?option=com_jambook&tmpl=component' );
		} else {
			mosMenuBar::preview( '../components/com_jambook/preview' );
		}
		mosMenuBar::divider();
		mosMenuBar::save();
		mosMenuBar::divider();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}

	function LISTTMPL_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::editList( 'edittemplate' );
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}

	function EDITTMPL_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::save( 'savetemplate' );
		mosMenuBar::divider();
		mosMenuBar::cancel( 'canceltemplate' );
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
}

