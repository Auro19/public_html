<?php
/**
* @version $Id: toolbar.attend_events.php 26 2007-01-06 00:03:24Z pcarr $
* @package Attend Events
* @copyright (C) 2004 Tony Blair
* @copyright (C) 2005-06 Peter Carr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* Events Session Toolbar
* 
* Determines the toolbar to display based on the action and task
*/


require_once( $mainframe->getPath( 'toolbar_html' ) );
require_once( $mainframe->getPath( 'toolbar_default' ) );

$table = mosGetParam($_REQUEST, 'table', 'index');

// determine the action which helps to determine the final task
if (!empty($act)) {
    $table = $act;
} elseif (empty($table)) {
    $table = "sessions";
}

// determine which toolbars to display
if ($task) {
    $pageId = $table . "." . $task;
} else {
    $pageId = $table;
}

switch ( $table.$task ) {
    case "configthank":
    case "configconfirm":
    case "confignotify":
    case "configcancellation":
        TOOLBAR_Events_Sessions::_CONFIG(0, $pageId);
        break;
        
    case "configoptions": 
        TOOLBAR_Events_Sessions::_CONFIG(1, $pageId);
        break;
        
    case "registrations":
        TOOLBAR_Events_Sessions::_REGISTRATIONS($pageId);
        break;
    
    case "registrationsview":
        TOOLBAR_Events_Sessions::_VIEW($pageId);
        break;
        
    case "registrationsemail":
        TOOLBAR_Events_Sessions::_COMPOSE($pageId);
        break;
        
    case "registrationssend":
        TOOLBAR_Events_Sessions::_SEND($pageId);
        break;
    
    case "sessionsnew":
    case "sessionsedit":
    case "registrationsexport":
    case "registrationsexportall":
    case "venuesnew":
    case "venuesedit":
        TOOLBAR_Events_Sessions::_EDIT($pageId);
        break;
    
    case "sessions":
        TOOLBAR_Events_Sessions::_DEFAULT($pageId);
        break;
    
    case "venues":
    	TOOLBAR_Events_Sessions::_VENUE($pageId);
    	break;

    case "index":
        TOOLBAR_Events_Sessions::_ABOUT($pageId);
        break;
    
    case "config":
    case "configsave":
    case "configapply":
    default:
        TOOLBAR_Events_Sessions::_BLANK($pageId);
        break;
}
?>
