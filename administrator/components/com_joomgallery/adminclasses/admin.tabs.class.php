<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/adminclasses/admin.tabs.class.php $
// $Id: admin.tabs.class.php 396 2009-03-15 16:06:21Z aha $
/******************************************************************************\
**   JoomGallery  1.0.1                                                       **
**   By: JoomGallery::ProjectTeam                                             **
**   Copyright (C) 2008  M. Andreas Boettcher                                 **
**   Based on: PonyGallery ML 2.5.1 by PonyGallery-ML-Team                    **
**   Released under GNU GPL Public License                                    **
**   License: http://www.gnu.org/copyleft/gpl.html or have a look             **
**   at administrator/components/com_joomgallery/LICENSE.TXT                  **
\******************************************************************************/

#### Original Copyright ########################################################
## PonyGallery ML 2.5.1                                                       ##
## By: M. Andreas Boettcher & Benjamin Malte Meier                            ##
## & Andreas Hartmann & The ML-Team                                           ##
## Copyright (C) 2007 M. Andreas Boettcher, All rights reserved.              ##
## Released under GNU GPL Public License                                      ##
################################################################################


defined('_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.');

/**
The following class was taken from Joomla's Core and has been modified by including 
the function startNestedTab, which was taken from 
http://www.perfectdesigning.net/development_projects/support/joomla!_tab_system.html
*/

/**
* Tab Creation handler
* @package Joomla
*/
class jmosTabs   {
	/** @var int Use cookies */
	var $useCookies = 0;

	/**
	* Constructor
	* Includes files needed for displaying tabs and sets cookie options
	* @param int useCookies, if set to 1 cookie will hold last used tab between page refreshes
	*/
	function jmosTabs( $useCookies, $xhtml=NULL ) {
		global $mosConfig_live_site, $mainframe;

		if ( $xhtml ) { 
			$mainframe->addCustomHeadTag( '<link rel="stylesheet" type="text/css" media="all" href="'. $mosConfig_live_site.'/includes/js/tabs/tabpane.css" id="luna-tab-style-sheet" />' );
		} else {
			echo "<link id=\"luna-tab-style-sheet\" type=\"text/css\" rel=\"stylesheet\" href=\"" . $mosConfig_live_site. "/includes/js/tabs/tabpane.css\" />";
		}

		echo "<script type=\"text/javascript\" src=\"". $mosConfig_live_site . "/includes/js/tabs/tabpane_mini.js\"></script>";

		$this->useCookies = $useCookies;
	}

	/**
	* creates a tab pane and creates JS obj
	* @param string The Tab Pane Name
	*/
	function startPane($id){
		echo "<div class=\"tab-page\" id=\"".$id."\">";
		echo "<script type=\"text/javascript\">\n";
		echo "	var tabPane1 = new WebFXTabPane( document.getElementById( \"".$id."\" ), ".$this->useCookies." )\n";
		echo "</script>\n";
	}

	/**
	* Ends Tab Pane
	*/
	function endPane() {
		echo "</div>";
	}

	/*
	* Creates a tab with title text and starts that tabs page
	* @param tabText - This is what is displayed on the tab
	* @param paneid - This is the parent pane to build this tab on
	*/
	function startTab( $tabText, $paneid ) {
		echo "<div class=\"tab-page\" id=\"".$paneid."\">";
		echo "<h2 class=\"tab\">".$tabText."</h2>";
		echo "<script type=\"text/javascript\">\n";
		echo "  tabPane1.addTabPage( document.getElementById( \"".$paneid."\" ) );";
		echo "</script>";
	}

	/*
	* Ends a tab page
	*/
	function endTab() {
		echo "</div>";
	}

  function startNestedTab( $tabText ) {
          echo "<div class=\"tab-page\">";
          echo "<h2 class=\"tab\">".$tabText."</h2>";
  }

}








?>
