<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/html/admin.votes.html.php $
// $Id: admin.votes.html.php 396 2009-03-15 16:06:21Z aha $
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

class HTML_Joom_AdminVotes {

  function HTML_Joom_AdminVotes() {
?>
  <script type="text/javascript">
  <!--
  function confirmation(){
    var msg = "<?php echo _JGA_ALERT_RESET_VOTES_CONFIRM ?>";
    return(confirm(msg));
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
          <?php echo _JGA_JOOMGALLERY.' :: '._JGA_VOTES_MANAGER; ?> 
        </span>
        </p>
      </td>
    </tr>
  </table>
  <form action="index2.php?option=com_joomgallery&amp;act=votes" name="adminForm" method="POST" onsubmit="return confirmation()">
  <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminlist">
    <tr>
      <td style="padding:4px;" width="20%" align="center">
        <input type="submit" name="votes_sync" value="<?php echo _JGA_SYNCHRONIZE_VOTES;?>"/>
      </td>
      <td style="padding:4px;" width="80%">
        <?php echo _JGA_SYNCHRONIZE_VOTES_LONG; ?> 
    </td>
    </tr>
    <tr>
      <td style="padding:4px;" align="center">
        <input type="submit" name="votes_reset" value="<?php echo _JGA_RESET_VOTES;?>" />
      </td>
      <td style="padding:4px;">
        <?php echo _JGA_RESET_VOTES_LONG; ?> 
      </td>
    </tr>
  </table>
  </form>
<?php
  }
}
?>
