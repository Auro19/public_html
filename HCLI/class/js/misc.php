    //=======================================================================

/**********************************************************************************
* Help Center Live! – http://www.helpcenterlive.com 				  			  *
* by Digital Frontiers, UTO 							  						  *
***********************************************************************************
* Software Version: Help Center Live! v 2.1.7 					  				  *
* Software by: Digital Frontiers, UTO (http://www.helpcenterlive.com) 		      *
* Copyright 2008 by: Digital Frontiers, UTO (http://www.helpcenterlive.com) 	  *
* Support, News, Updates at: http://www.helpcenterlive.com 			  			  *
***********************************************************************************
* This program is free software; you may redistribute it and/or modify it under   *
* the terms of the provided license as published by Digital Frontiers, UTO. 	  *
* 										  										  *
* This program is distributed in the hope that it is and will be useful, but 	  *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE. 						  					  *
* 										  										  *
* See the "license.txt" file for details of the Help Center Live! license. 	 	  *
* The latest version can always be found at http://www.helpcenterlive.com. 	 	  *
***********************************************************************************
* File Comments:																  *
* This file contains any misc javascript functions								  *
* This is a compressed version for faster page loading.							  *
* The normal vesrion is in the /normal directory								  *
**********************************************************************************/

function Misc() { this.date = new Date(); this.mac = navigator.platform.indexOf('Mac'); this.text = ''; this.action = false; this.epoch = function()
{ this.date = new Date(); return this.date.getTime();}
this.alert_mac = function(text)
{ this.text = text; if (this.mac > -1) { setTimeout('alert(Misc.text);', 100);}
}
this.statusbar = function(text)
{ window.status = text;}
this.confirm_action = function()
{ this.action = confirm('<?php echo($GLOBALS['lang']['confirm_action']); ?>'); if (this.action == false) { return false;} else { return true;}
}
}
var Misc = new Misc(); 

    //=======================================================================
