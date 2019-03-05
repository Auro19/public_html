<?php
/**
 * No Direct Access
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

class PluginMenu extends Adapters
{
    function administrator(){
        $result = array(
            'task' => JRequest::getCMD('task'),
            'params' => array(
                '$menutype' => JRequest::getVar('menutype')
            )
        );

        return $result;
    }

    function site(){
        $menu = &JSite::getMenu();
        $menuActive = $menu->getActive();
        
        if( $menuActive->access == 0){
        	$menuActive->id = null;
        	$menuActive->menutype = null;
        }

        $result = array(
            'task' => 'access',
            'params' => array(
                '$menutype' => $menuActive->menutype,
        		'$menu_id' => $menuActive->id
            )
        );
        
        return $result;
    }
}