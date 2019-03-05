<?php
/**
 * No Direct Access
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

class PluginContent extends Adapters
{
    function administrator(){
        $db = & JFactory::getDBO();

        //get id from content
        $cid			= JRequest::getVar( 'cid', array(0), '', 'array' );
		JArrayHelper::toInteger($cid, array(0));
		$id				= JRequest::getVar( 'id', $cid[0], '', 'int' );

        $sqlContent = "SELECT catid FROM #__content WHERE id = {$id}";
        $db->setQuery( $sqlContent );
        $catid = $db->loadResult();

        $result = array(
            'task' => JRequest::getCMD('task'),
            'params' => array(
                '$catid' => $catid
            )
        );

        return $result;
    }

	function site(){
        $db = & JFactory::getDBO();

        //get id from content
        $cid			= JRequest::getVar( 'cid', array(0), '', 'array' );
		JArrayHelper::toInteger($cid, array(0));
		$id				= JRequest::getVar( 'id', $cid[0], '', 'int' );

        $sqlContent = "SELECT catid FROM #__content WHERE id = {$id}";
        $db->setQuery( $sqlContent );
        $catid = $db->loadResult();

        $view = JRequest::getCMD('view');
        switch($view){
        	case 'article':
        		$task = 'access';
        		break;
        	default:
        		$task = '';
        		break;
        }
        
        $result = array(
            'task' => $task,
            'params' => array(
                '$catid' => $catid
            )
        );

        return $result;
    }
}