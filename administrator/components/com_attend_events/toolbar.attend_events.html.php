<?php
/**
 * @version $Id: toolbar.attend_events.html.php 26 2007-01-06 00:03:24Z pcarr $
* @package Attend Events
* @copyright (C) 2004 Tony Blair
* @copyright (C) 2005-06 Peter Carr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* Events Session Toolbar HTML Class
* 
* Class that specifies the layout of the admin toolbar for each of the different toolbars required 
*/

Class TOOLBAR_Events_Sessions {
    
    function _BLANK($pageId) {
        mosMenuBar::startTable();
        mosMenuBar::help($pageId,true);
        mosMenuBar::endTable();
    } // _BLANK()
    
    function _CONFIG($showApply, $pageId) {
        global $mosConfig_absolute_path;
        
        mosMenuBar::startTable();
        mosMenuBar::spacer();
        if (is_writable($mosConfig_absolute_path."/components/com_attend_events/config.attend_events.php")) {
            mosMenuBar::save();
        }
        if ($showApply) {
            mosMenuBar::spacer();
            if (is_writable($mosConfig_absolute_path."/components/com_attend_events/config.attend_events.php")) {
                mosMenuBar::apply();
            }
        }
        mosMenuBar::spacer();
        mosMenuBar::cancel();
        mosMenuBar::spacer();
        mosMenuBar::divider();
        mosMenuBar::spacer();
        mosMenuBar::help($pageId,true);
        mosMenuBar::endTable();
    } // _CONFIG()
    
    function _EDIT($pageId) { 
        mosMenuBar::startTable();
        mosMenuBar::save();
        mosMenuBar::spacer();
        mosMenuBar::cancel();
        mosMenuBar::spacer();
        mosMenuBar::divider();
        mosMenuBar::spacer();
        mosMenuBar::help($pageId,true);
        mosMenuBar::endTable(); 
    } // _EDIT()
    
    function _DEFAULT($pageId) {
        mosMenuBar::startTable();
        mosMenuBar::publishList(); 
        mosMenuBar::spacer();
        mosMenuBar::unpublishList();
        mosMenuBar::spacer();        
        mosMenuBar::divider();   
        mosMenuBar::spacer();   
        mosMenuBar::addNew(); 
        mosMenuBar::spacer();
        mosMenuBar::editList();
        mosMenuBar::spacer(); 
        mosMenuBar::deleteList();
        mosMenuBar::spacer();
        mosMenuBar::divider();
        mosMenuBar::spacer();
        mosMenuBar::help($pageId,true);
        mosMenuBar::endTable();
    } // _DEFAULT()
    
    function _REGISTRATIONS($pageId) {
        mosMenuBar::startTable();
        mosMenuBar::custom('view', "preview.png", "preview_f2.png", _ESESS_TOOLBAR_VIEW, true);
        mosMenuBar::spacer();
        mosMenuBar::divider();
        mosMenuBar::spacer();
        mosMenuBar::deleteList();
        mosMenuBar::spacer();
        mosMenuBar::divider();
        mosMenuBar::spacer();
        mosMenuBar::custom('email', "edit.png", "edit_f2.png", _ESESS_TOOLBAR_EMAIL, true);
        mosMenuBar::spacer();
        mosMenuBar::divider();
        mosMenuBar::spacer();
        mosMenuBar::custom('export', "unarchive.png", "unarchive_f2.png", _ESESS_TOOLBAR_EXPORT, false);
        mosMenuBar::spacer();
        mosMenuBar::divider();
        mosMenuBar::spacer();
        mosMenuBar::help($pageId,true);
        mosMenuBar::endTable();
    } // _REGISTRATIONS()
    
    function _VIEW($pageId) {
        mosMenuBar::startTable();
        mosMenuBar::deleteList();
        mosMenuBar::spacer();
        mosMenuBar::cancel();
        mosMenuBar::spacer();
        mosMenuBar::divider();
        mosMenuBar::spacer();
        mosMenuBar::help($pageId,true);
        mosMenuBar::endTable(); 
    } // _VIEW()
    
    function _COMPOSE($pageId) {
		mosMenuBar::startTable();
		mosMenuBar::custom('send','publish.png','publish_f2.png','Send Mail',false);
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::divider();
		mosMenuBar::spacer();
		mosMenuBar::help($pageId,true);
		mosMenuBar::endTable();    
    } // _COMPOSE()
    
    function _SEND($pageId) {
		mosMenuBar::startTable();
		mosMenuBar::custom('','forward.png','forward_f2.png','Continue',false);
		mosMenuBar::endTable();    
    } // _SEND()
    
    function _VENUE($pageId) {
        mosMenuBar::startTable();
        mosMenuBar::addNew(); 
        mosMenuBar::spacer();
        mosMenuBar::editList();
        mosMenuBar::spacer(); 
        mosMenuBar::deleteList();
        mosMenuBar::spacer();
        mosMenuBar::divider();
        mosMenuBar::spacer();
        mosMenuBar::help($pageId,true);
        mosMenuBar::endTable();
    }
    
    function _ABOUT($pageId) {
        mosMenuBar::startTable();
        mosMenuBar::custom('uninstall', 'delete.png', 'delete_f2.png', _ESESS_TOOLBAR_UNINSTALL, false);
        mosMenuBar::spacer();
        mosMenuBar::custom('config', 'downloads.png', 'downloads_f2.png', _ESESS_TOOLBAR_SAVESETTINGS, false);
        mosMenuBar::spacer();
        mosMenuBar::custom('update', 'tool.png', 'tool_f2.png',_ESESS_TOOLBAR_UPDATE, false);
        mosMenuBar::spacer();
        mosMenuBar::divider();
        mosMenuBar::spacer();
        mosMenuBar::help($pageId,true);
        mosMenuBar::endTable();    
    }
}
?>
