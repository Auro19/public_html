<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/html/admin.cssedit.html.php $
// $Id: admin.cssedit.html.php 396 2009-03-15 16:06:21Z aha $
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

defined('_VALID_MOS') or die('Direct Access to this location is not allowed.');

class HTML_Joom_AdminCssEdit {

  function HTML_Joom_AdminCssEdit($content, $path, $editExistingFile, $msg) {
?>
  <script language="javascript">
	<!--
		
	function submitbutton(pressbutton) {
	  var form = document.adminForm;
	  if (pressbutton == 'cancelcss' || pressbutton == 'savecss') {
	    submitform( pressbutton );
		return;
	  }
	  else if (pressbutton == 'deletecss'){
	    if (confirm('<?php echo _JGA_CSS_CONFIRM_DELETE ?>')){
	      submitform(pressbutton);
	    }
	    
	    return;
	  }
	}
	//-->
  </script>
 
  <table cellpadding="4" cellspacing="0" border="0" width="100%">
    <tr>
      <td width="100%" class="sectionname"  align="left">
        <p>
        <a href='http://www.joomgallery.net/' target='_blank'>
        <img src="../administrator/components/com_joomgallery/assets/images/main2.png" hspace="6" border="0" align="top" width="16" height="16" alt="<?php echo _JGA_JOOMGALLERY; ?>" /></a>&nbsp;
        <span style="font-size:13px; font-weight:bold;">
          <?php echo _JGA_JOOMGALLERY.' :: '._JGA_CSS_MANAGER . " (". ($editExistingFile ? _JGA_TOOLBAR_EDIT : _JGA_TOOLBAR_NEW ).")"; ?> 
        </span>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <?php echo ($editExistingFile)? _JGA_EDIT_CSS_EXPLANATION : _JGA_NEW_CSS_EXPLANATION; ?>      
        </p>
      </td>
    </tr>
  </table>
  <form action="index2.php" name="adminForm" method="post">
    <table class="adminform" width="100%" border="0" cellpadding="4" cellspacing="0">
      <tbody>
        <tr>
          <th><?php echo $path ?></th>
        </tr>
        <tr>
          <td>
            <textarea cols="110" rows="25" name="csscontent" class="inputbox"><?php echo $content ?></textarea>
          </td>
        </tr>
        <tr>
          <td class="error"><?php echo $msg; ?></td>
        </tr>
        
      </tbody>
    </table>
    <input type="hidden" name="option" value="com_joomgallery">
    <input type="hidden" name="task" value="">
    <input type="hidden" name="hidemainmenu" value="" />
    <input type="hidden" name="boxchecked" value="1" />
  </form>
<?php
  }
}
?>
