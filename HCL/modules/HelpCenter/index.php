<?php

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
* This file provides a landing page for people wishing to use your Help Center	  *
**********************************************************************************/

    $GLOBALS['inc']->department();
    $GLOBALS['inc']->email();

    if (isset($_POST['email_send'])) {
        $details['name'] = addslashes($_POST['name']);
        $details['from'] = addslashes($_POST['email']);
        $details['department'] = $GLOBALS['department']->name(addslashes($_POST['departmentid']));
        $details['email'] = $GLOBALS['department']->email(addslashes($_POST['departmentid']));
        $details['subject'] = addslashes($_POST['subject']);
        $details['message'] = addslashes($_POST['message']);
        $GLOBALS['email']->auth($GLOBALS['department']->email_host(addslashes($_POST['departmentid'])), $GLOBALS['department']->email_port(addslashes($_POST['departmentid'])), $GLOBALS['department']->email_username(addslashes($_POST['departmentid'])), $GLOBALS['department']->email_password(addslashes($_POST['departmentid'])));
        $GLOBALS['email']->contact($details);
        $email_sent = true;
    } else {
        $email_sent = false;
    }

?>
<div align="center">
<h3><?php echo($GLOBALS['lang']['live_help']); ?></h3>
<!-- BEGIN Help Center Live Code, Copyright (c) 2005 Help Center Live. All Rights Reserved -->
<div id="div_initiate" style="position:absolute; z-index:1; top: 40%; left:40%; visibility: hidden;"><a href="javascript:Live.initiate_accept();"><img src="<?php echo($GLOBALS['conf']['url']); ?>/templates/<?php echo($GLOBALS['conf']['template']); ?>/images/initiate.gif" border="0"></a><br><a href="javascript:Live.initiate_decline();"><img src="<?php echo($GLOBALS['conf']['url']); ?>/templates/<?php echo($GLOBALS['conf']['template']); ?>/images/initiate_close.gif" border="0"></a></div>
<script type="text/javascript" language="javascript" src="<?php echo($GLOBALS['conf']['url']); ?>/class/js/include.php?live&cobrowse"></script>
<!-- END Help Center Live Code, Copyright (c) 2005 Help Center Live. All Rights Reserved -->
<br />
<br />
<br />
<br />
<?php
    // check to see if the osTicket module is activated, and include the config for it.
    if ($GLOBALS['module']->exists('osTicket')) {
        if ($GLOBALS['module']->active('osTicket')) {
            $GLOBALS['module']->get_config('osTicket');
?>
<h3><?php echo($GLOBALS['lang']['trouble_tickets']); ?></h3>
<?php include(dirname(__FILE__).'/../osTicket/open.php'); ?>
<br />
<br />
<br />
<br />
<?php
        }
    }
?>
<h3><?php echo($GLOBALS['lang']['contact_us']); ?></h3>
<?php

    // osTicket changes the selected database so we need to cahnge it back
    $GLOBALS['db']->select();

    if ($email_sent) {
        echo($GLOBALS['lang']['email_sent']);
    } else {
?>
<form action="<?php echo($GLOBALS['conf']['modules']['HelpCenter']['selfurl']); ?>" method="post">
  <table cellspacing="0" cellpadding="5">
    <tr class="alt">
      <td><?php echo($GLOBALS['lang']['department']); ?></td>
      <td>
      <select name="departmentid">
<?php
        $departments = $GLOBALS['department']->listall('0');
        foreach ($departments as $key => $val) {
?>
          <option value="<?php echo($departments[$key]['id']); ?>"><?php echo($departments[$key]['name']); ?></option>
<?php
        }
?>
      </select>
      </td>
    </tr>
    <tr>
      <td><?php echo($GLOBALS['lang']['your_name']); ?></td>
      <td><input type="text" name="name" value="" size="20" /></td>
    </tr>
    <tr>
      <td><?php echo($GLOBALS['lang']['your_email']); ?></td>
      <td><input type="text" name="email" value="" size="20" /></td>
    </tr>
    <tr>
      <td><?php echo($GLOBALS['lang']['subject']); ?></td>
      <td><input type="text" name="subject" value="" size="20" /></td>
    </tr>
    <tr>
      <td><?php echo($GLOBALS['lang']['message']); ?></td>
      <td><textarea name="message" rows="5" cols="20"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="email_send" value="<?php echo($GLOBALS['lang']['submit']); ?>" /></td>
    </tr>
  </table>
</form>
<?php
    }
?>
</div>