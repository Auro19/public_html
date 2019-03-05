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
* This file is used enable cobrowse with the visitor							  *
**********************************************************************************/

var CoBrowseConnection1 = new Aardvark('CoBrowseConnection1'); var CoBrowseConnection2 = new Aardvark('CoBrowseConnection2'); function CoBrowse() { this.time = Misc.epoch(); this.start = Misc.epoch(); this.mac = navigator.platform.indexOf('Mac'); this.image_width = 0; this.alert = false; this.alertsave = false; this.elements; this.chatid = '<?php echo($chatid); ?>'; this.type; this.count = 0; this.input = Array(); this.textarea = Array(); this.select = Array(); this.handled = false; <?php if ($GLOBALS['cobrowse']->getpage($chatid)) { ?>
this.track = true; <?php } else { ?>
this.track = false; <?php } ?>
this.name = ''; this.marker; this.comarkers_left = 0; this.comarkers_right = 0; this.keepalive = 0; this.check = function(variables)
{ var response = ''; <?php if (!isset($_SESSION['hcl_cobrowse'])) { ?>
if (CoBrowseConnection1.vars.cobrowse_<?php echo($chatid); ?>) { response = CoBrowseConnection1.vars.cobrowse_<?php echo($chatid); ?>; this.time = Misc.epoch(); if (this.track) { var i = 0; var max = 0; var action = response.split('|'); max = action.length - 1; for (i = 0; i < max; ++i) { switch (action[i]) { case 'handleforms':
this.handleforms(); break; case 'getforms':
this.getforms(); break; case 'disconnect':
if (this.keepalive > 3) { this.disconnect();} else { this.keepalive ++;}
break;}
}
}
}
window.setTimeout('CoBrowse.tracker();', <?php echo($GLOBALS['conf']['cobrowse_refresh']); ?>); <?php } ?>
}
this.tracker = function()
{ this.time = Misc.epoch(); <?php if (!isset($_SESSION['hcl_cobrowse'])) { ?>
if (this.track && this.connect_host == this.install_host) { CoBrowseConnection1.add('cobrowse', ''); CoBrowseConnection1.add('time', Misc.epoch()); CoBrowseConnection1.send('<?php echo($GLOBALS['conf']['url']); ?>/live/response.php', 'CoBrowse.check(variables)', 'reset');} else { window.setTimeout('CoBrowse.tracker();', <?php echo($GLOBALS['conf']['cobrowse_refresh']); ?>);}
if (!this.handled) { this.handled = true; this.handleforms();}
<?php } ?>
}
this.disconnect = function()
{ this.track = false; this.keepalive = 0; this.clearmarkers();}
this.insertmarker = function(type, x, y)
{ if (this.mac > -1) { this.name = 'hcl_cobrowse_marker_' + type; parent.window.document.getElementById(this.name).style.visibility = 'true'; parent.window.document.getElementById(this.name).style.top = y+'px'; parent.window.document.getElementById(this.name).style.left = x+'px';} else { if (type == 'right') { this.comarkers_right++; this.name = 'hcl_cobrowse_marker_' + type + '_' + this.comarkers_right;} else if (type == 'left') { this.comarkers_left++; this.name = 'hcl_cobrowse_marker_' + type + '_' + this.comarkers_left;}
parent.window.document.body.innerHTML = parent.window.document.body.innerHTML + '<div id="'+this.name+'" style="position:absolute; z-index:1; top: '+y+'px; left:'+x+'px;"><img src="<?php echo($GLOBALS['conf']['url']); ?>/templates/<?php echo($GLOBALS['conf']['template']); ?>/images/marker_'+type+'.gif" alt="" /></div>';}
}
this.clearmarkers = function()
{ if (this.mac > -1) { parent.window.document.getElementById('hcl_cobrowse_marker_right').style.visibility = 'hidden'; parent.window.document.getElementById('hcl_cobrowse_marker_left').style.visibility = 'hidden';} else { for (this.count = 1; this.count < (this.comarkers_right + 1); this.count++) { parent.window.document.getElementById('hcl_cobrowse_marker_right_'+this.count).style.visibility = 'hidden';}
for (this.count = 1; this.count < (this.comarkers_left + 1); this.count++) { parent.window.document.getElementById('hcl_cobrowse_marker_left_'+this.count).style.visibility = 'hidden';}
}
}
this.getforms = function(type, name, value)
{ this.time = Misc.epoch(); this.elements = parent.window.document.getElementsByTagName(type); for (this.count = 0; this.count < this.elements.length; this.count++) { if (this.elements[this.count].name == name) { if (type == 'input') { if (this.elements[this.count].type == 'checkbox' || this.elements[this.count].type == 'radio') { if (value == 'true') { this.input[this.count][2] = 'true'; this.elements[this.count].checked = true;} else { this.input[this.count][2] = 'false'; this.elements[this.count].checked = false;}
} else { this.input[this.count][2] = value; this.elements[this.count].value = value;}
} else if (type == 'textarea') { this.textarea[this.count][2] = value; this.elements[this.count].value = value;} else if (type == 'select') { this.select[this.count][2] = value; this.elements[this.count].selectedIndex = value;}
}
}
}
this.setforms = function(tag, type, name, value)
{ var docoforms = false; this.time = Misc.epoch(); if (type == 'password') { if (!this.alertsave) { this.alert = confirm('<?php echo($GLOBALS['lang']['cobrowse_sendpwd']); ?>'); this.alertsave = true;}
if (this.alert) { docoforms = true;}
} else { docoforms = true;}
if (docoforms) { CoBrowseConnection2.add('coforms', ''); CoBrowseConnection2.add('type', tag); CoBrowseConnection2.add('name', escape(name)); CoBrowseConnection2.add('value', escape(value)); CoBrowseConnection2.add('time', Misc.epoch()); CoBrowseConnection2.send('<?php echo($GLOBALS['conf']['url']); ?>/live/response.php', '', 'reset');}
}
this.initiateforms = function()
{ this.elements = parent.window.document.getElementsByTagName('input'); for (this.count = 0; this.count < this.elements.length; this.count++) { if (this.elements[this.count].type == 'checkbox') { if (this.elements[this.count].checked == true) { CoBrowse.setforms('input', this.elements[this.count].type, this.elements[this.count].name, 'true');} else { CoBrowse.setforms('input', this.elements[this.count].type, this.elements[this.count].name, 'false');}
} else if (this.elements[this.count].type !== 'password') { CoBrowse.setforms('input', this.elements[this.count].type, this.elements[this.count].name, this.elements[this.count].value);}
}
this.elements = parent.window.document.getElementsByTagName('textarea'); for (this.count = 0; this.count < this.elements.length; this.count++) { CoBrowse.setforms('textarea', this.elements[this.count].type, this.elements[this.count].name, this.elements[this.count].value);}
this.elements = parent.window.document.getElementsByTagName('select'); for (this.count = 0; this.count < this.elements.length; this.count++) { if (this.elements[this.count].options) { CoBrowse.setforms('select', '', this.elements[this.count].name, this.elements[this.count].selectedIndex);}
}
}
this.handleforms = function()
{ this.elements = parent.window.document.getElementsByTagName('input'); for (this.count = 0; this.count < this.elements.length; this.count++) { if (this.input[this.count]) { if (this.input[this.count][2] !== this.elements[this.count].value) { if (this.elements[this.count].type == 'checkbox') { if (this.elements[this.count].checked == true) { this.input[this.count][2] = 'true';} else { this.input[this.count][2] = 'false';}
} else { this.input[this.count][2] = this.elements[this.count].value;}
CoBrowse.setforms('input', this.input[this.count][0], this.input[this.count][1], this.input[this.count][2]);}
} else { this.input[this.count] = Array(3); this.input[this.count][0] = this.elements[this.count].type; this.input[this.count][1] = this.elements[this.count].name; if (this.elements[this.count].type == 'checkbox') { if (this.elements[this.count].checked == true) { this.input[this.count][2] = 'true';} else { this.input[this.count][2] = 'false';}
} else { this.input[this.count][2] = this.elements[this.count].value;}
}
}
this.elements = parent.window.document.getElementsByTagName('textarea'); for (this.count = 0; this.count < this.elements.length; this.count++) { if (this.textarea[this.count]) { if (this.textarea[this.count][2] !== this.elements[this.count].value) { this.textarea[this.count][2] = this.elements[this.count].value; CoBrowse.setforms('textarea', this.textarea[this.count][0], this.textarea[this.count][1], this.textarea[this.count][2]);}
} else { this.textarea[this.count] = Array(3); this.textarea[this.count][0] = this.elements[this.count].type; this.textarea[this.count][1] = this.elements[this.count].name; this.textarea[this.count][2] = this.elements[this.count].value;}
}
this.elements = parent.window.document.getElementsByTagName('select'); for (this.count = 0; this.count < this.elements.length; this.count++) { if (this.elements[this.count].options) { if (this.select[this.count]) { if (this.select[this.count][2] !== this.elements[this.count].selectedIndex) { this.select[this.count][2] = this.elements[this.count].selectedIndex; CoBrowse.setforms('select', this.select[this.count][0], this.select[this.count][1], this.select[this.count][2]);}
} else { this.select[this.count] = Array(3); this.select[this.count][0] = ''; this.select[this.count][1] = this.elements[this.count].name; this.select[this.count][2] = this.elements[this.count].selectedIndex;}
}
}
}
if (this.mac > -1) { document.write('<div id="hcl_cobrowse_marker_right" style="position:absolute; z-index:1; top: 0; left:0; visibility: hidden;"><img src="<?php echo($GLOBALS['conf']['url']); ?>/templates/<?php echo($GLOBALS['conf']['template']); ?>/images/marker_right.gif" alt="" /></div>'); document.write('<div id="hcl_cobrowse_marker_left" style="position:absolute; z-index:1; top: 0; left:0; visibility: hidden;"><img src="<?php echo($GLOBALS['conf']['url']); ?>/templates/<?php echo($GLOBALS['conf']['template']); ?>/images/marker_left.gif" alt="" /></div>');}
}
var CoBrowse = new CoBrowse(); <?php if (!isset($_SESSION['hcl_cobrowse'])) { ?>
setTimeout('CoBrowse.tracker();', 1000); <?php } ?>

    //=======================================================================
