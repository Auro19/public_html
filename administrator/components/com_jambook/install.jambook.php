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

function com_install() {
	global $database, $mosConfig_absolute_path;

	$errmsg = "";

	// Change the image for the main component menu item in the admin section.
	$sql = "UPDATE #__components SET admin_menu_img='../components/com_jambook/images/jambook_tiny.png' WHERE admin_menu_link='option=com_jambook'";
	$database->setQuery($sql);
	if ( !$database->query() ) {
		$errmsg .= "Couldn't update image for Control Panel submenu item.<br />\n";
	}

	// Change the image for the Control Panel Administration submenu item in the admin section.
	$sql = "UPDATE #__components SET admin_menu_img='../components/com_jambook/images/controlpanel.png' WHERE admin_menu_link='option=com_jambook&task=cpanel'";
	$database->setQuery($sql);
	if ( !$database->query() ) {
		$errmsg .= "Couldn't update image for Control Panel submenu item.<br />\n";
	}

	// Change the image for the Item List Administration submenu item in the admin section.
	$sql = "UPDATE #__components SET admin_menu_img='../components/com_jambook/images/editentries.png' WHERE admin_menu_link='option=com_jambook&task=list'";
	$database->setQuery($sql);
	if ( !$database->query() ) {
		$errmsg .= "Couldn't update image for Item List submenu item.<br />\n";
	}

	// Change the image for the Template Manager submenu item in the admin section.
	$sql = "UPDATE #__components SET admin_menu_img='../components/com_jambook/images/templatemanager.png' WHERE admin_menu_link='option=com_jambook&task=listtemplates'";
	$database->setQuery($sql);
	if ( !$database->query() ) {
		$errmsg .= "Couldn't update image for Template Manager submenu item.<br />\n";
	}

	// Change the image for the Import submenu item in the admin section.
	$sql = "UPDATE #__components SET admin_menu_img='../components/com_jambook/images/import.png' WHERE admin_menu_link='option=com_jambook&task=import'";
	$database->setQuery($sql);
	if ( !$database->query() ) {
		$errmsg .= "Couldn't update image for Import submenu item.<br />\n";
	}

	// Change the image for the Deinstall submenu item in the admin section.
	$sql = "UPDATE #__components SET admin_menu_img='../components/com_jambook/images/trash.png' WHERE admin_menu_link='option=com_jambook&task=deinstall'";
	$database->setQuery($sql);
	if ( !$database->query() ) {
		$errmsg .= "Couldn't update image for Deinstall submenu item.<br />\n";
	}

	// Change the image for the Configuration submenu item in the admin section.
	$sql = "UPDATE #__components SET admin_menu_img='../components/com_jambook/images/configuration.png' WHERE admin_menu_link='option=com_jambook&task=conf'";
	$database->setQuery($sql);
	if ( !$database->query() ) {
		$errmsg .= "Couldn't update image for Configuration submenu item.<br />\n";
	}

	// Change the image for the Information submenu item in the admin section.
	$sql = "UPDATE #__components SET admin_menu_img='../components/com_jambook/images/information.png' WHERE admin_menu_link='option=com_jambook&task=info'";
	$database->setQuery($sql);
	if ( !$database->query() ) {
		$errmsg .= "Couldn't update image for Information submenu item.<br />\n";
	}

/*
	// Install modules
	$modules = array( "mod_component_menu", "mod_component_categories" );
	foreach ( $modules as $mod ) {
		$modfile = "$mosConfig_absolute_path/components/com_jambook/$mod.zip";
		$base_Dir = "$mosConfig_absolute_path/uploadfiles/";
		if ( is_writable( $base_Dir ) ) {
			if ( !( @rename( $modfile, "$base_Dir/$mod.zip" ) && chmod( "$base_Dir/$mod.zip", 0777 ) ) ) {
				$errmsg .= "Couldn't copy module file $mod.zip to installation directory.<br />\n";
			} else {
				$modinstaller = new mosInstallerModule( "$mod.zip" );
				if( !$modinstaller->install() )
				{
					$errmsg .= "Error installing module $mod. " . $modinstaller->getError() . "<br />\n";
				}
				cleanupInstall( "$mod.zip", $modinstaller->unpackDir() );
			}
		} else {
			$errmsg .= "Directory uploadfiles is not writeable!<br />\n";
		}
	}
*/

	// Show installation error messages
	if ( $errmsg ) {
		HTML_installer::showInstallMessage( $errmsg, "Installation error messages", $option );
	}

	return "Jambook component successfully installed. Visit <a href=\"http://www.jxdevelopment.com\" target=\"_blank\">JX Development</a> for more exciting Joomla extensions.";
}
