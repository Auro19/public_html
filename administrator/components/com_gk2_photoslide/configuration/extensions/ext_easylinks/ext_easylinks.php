<?php

/**
*	@author: GavickPro
* 	@date: 2008
**/

class GKExtensionEasyLinks
{	
	function init()
	{
		$task = JRequest::getCmd( 'task' );
		
		if($task == 'view_group' || $task == '' || !isset($task) || $task == 'view_groups')
		{
			echo '<script type="text/javascript" src="components/com_gk2_tabs_manager/configuration/extensions/ext_easylinks/js/easylinks.js"></script>';
			echo '<link rel="stylesheet" type="text/css" href="components/com_gk2_tabs_manager/configuration/extensions/ext_easylinks/css/easylinks.css" />';
		}	
	}
}

GKExtensionEasyLinks::init();

?>