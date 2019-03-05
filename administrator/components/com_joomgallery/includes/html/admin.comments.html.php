<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/html/admin.comments.html.php $
// $Id: admin.comments.html.php 396 2009-03-15 16:06:21Z aha $
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

/******************************************************************************\
*                            Functions / Comments                              *
\******************************************************************************/

class HTML_Joom_AdminComments {


  function Joom_ShowComments_HTML($option, &$rows, &$search, &$pageNav) {
    global $database, $userid, $mosConfig_live_site, $thumbnailpath,
           $absolut_thumbnailpath,$jg_dateformat;

?>
<script  type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
<form action="index2.php" method="post" name="adminForm">
<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td width="100%" class="sectionname"  align="left">
      <p>
      <a href='http://www.joomgallery.net/' target='_blank'>
      <img src="../administrator/components/com_joomgallery/assets/images/main2.png" hspace="6" border="0" align="top" width="16" height="16" alt="<?php echo _JGA_JOOMGALLERY; ?>" /></a>&nbsp;
      <span style="font-size:13px; font-weight:bold;">
        <?php echo _JGA_JOOMGALLERY.' :: '._JGA_COMMENTS_MANAGER; ?> 
      </span>
      </p>
    </td>
  </tr>
  <tr>
    <td width="100%"></td>
    <td nowrap>
      <?php echo _JGA_DISPLAY ; ?>
    </td>
    <td>
      <?php echo $pageNav->writeLimitBox(); ?>
    </td>
    <td>
      <?php echo _JGA_SEARCH ; ?>
    </td>
    <td>
      <input type="text" name="search" value="<?php echo $search;?>" class="inputbox" onChange="document.adminForm.submit();" />
    </td>
  </tr>
</table>
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
  <tr>
    <th width="20">
      <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
    </th>
    <th class="title" width="15%">
      <div align="left">
        <?php echo _JGA_AUTHOR; ?>
      </div>
    </th>
    <th width="35%">
      <div align="left">
        <?php echo _JGA_TEXT; ?>
      </div>
    </th>
    <th width="10%">
      <div align="center">
      <?php echo _JGA_IP; ?>
      </div>
    </th>
    <th width="10%">
      <?php echo _JGA_PUBLISHED; ?>
    </th>
    <th width="10%">
      <?php echo _JGA_APPROVED; ?>
    </th>
    <th width="10%">
      <?php echo _JGA_PICTURE; ?>
    </th>
    <th width="24"></th>
    <th width="15%">
      <?php echo _JGA_DATE; ?>
    </th>
  </tr>
<?php
      $k = 0;
      for ($i=0, $n=count($rows); $i < $n; $i++) {
        $row = &$rows[$i];
        $task = $row->published ? 'unpublishcmt' : 'publishcmt';
        $img = $row->published ? 'tick.png' : 'publish_x.png';
        $taska = $row->approved ? 'rejectcmt' : 'approvecmt';
        $imga = $row->approved ? 'tick.png' : 'publish_x.png';
?>
  <tr class="<?php echo "row$k"; ?>">
    <td>
      <input type="checkbox" id="cb<?php echo $i;?>" name="id[]" value="<?php echo $row->cmtid; ?>" onclick="isChecked(this.checked);" />
    </td>
    <td>
      <div align="left">
<?php
    
    if ($row->userid > 0) {
      echo getDisplayName($row->userid, false);      
    } else {
      echo $row->cmtname;
    }
?>
      </div>
    </td>
    <td>
      <div align="left">
<?php
        $cmttext = Joom_ProcessText($row->cmttext);
?>
        <?php echo $cmttext; ?>
      </div>
    </td>
    <td>
      <div align="center">
        <?php echo $row->cmtip; ?>
      </div>
    </td>
    <td align='center'>
      <a href="javascript: void(0);" onClick="return listItemTask('cb<?php echo $i;?>','<?php echo $task;?>')">
        <img src="images/<?php echo $img;?>" width="12" height="12" border="0" alt="" />
      </a>
    </td>
    <td align='center'>
      <a href="javascript: void(0);" onClick="return listItemTask('cb<?php echo $i;?>','<?php echo $taska;?>')">
        <img src="images/<?php echo $imga;?>" width="12" height="12" border="0" alt="" />
      </a>
    </td>
    <td width="10%" align="center">
      <?php echo $row->cmtpic; ?>
    </td>
    <td>
<?php
        $database->setQuery("SELECT imgthumbname
            FROM #__joomgallery
            WHERE id = '$row->cmtpic'");
        $is_imgthumbname = $database->loadResult();
        $database->setQuery("SELECT catid
            FROM #__joomgallery
            WHERE id = '$row->cmtpic'");
        $is_catid = $database->loadResult();
        $catpath = Joom_GetCatPath($is_catid);

        $tnfile = 'tn_';
        if (is_file($absolut_thumbnailpath.$catpath.$is_imgthumbname)) {
          $imginfo = getimagesize($absolut_thumbnailpath.$catpath.$is_imgthumbname);
          $imgsource = $thumbnailpath.$catpath.$is_imgthumbname;
          $srcWidth = $imginfo[0];
          $srcHeight = $imginfo[1];
          $thumbexists = 1;
        } else if (is_file($absolut_thumbnailpath.$catpath.$tnfile.$is_imgthumbname)) {
          $imginfo = getimagesize($thumbnailpath.$catpath.$tnfile.$is_imgthumbname);
          $imgsource = $thumbnailpath.$catpath.$tnfile.$is_imgthumbname;
          $srcWidth = $imginfo[0];
          $srcHeight = $imginfo[1];
          $thumbexists = 1;
        } else {
          $thumbexists = 0;
        }
  
        if ($thumbexists) {
?>
      <a href="<?php echo $mosConfig_live_site; ?>/index.php?option=com_joomgallery&func=detail&id=<?php echo $row->cmtpic; ?>" onmouseover="return overlib('<img src=\'<?php echo $imgsource; ?>\' />',WIDTH,<?php echo $srcWidth; ?>, HEIGHT,<?php echo $srcHeight; ?>)"  onmouseout="return nd()";target="_blank">
        <img src="<?php echo $imgsource; ?>" border="0" width="24" height="24" alt="" />
      </a>
<?php
        } else {
?>
      &nbsp;
<?php
        }
?>

    </td>
    <td width="10%" align="center">
      <?php echo strftime("$jg_dateformat", $row->cmtdate); ?>
    </td>
<?php
        $k = 1 - $k;
?>
  </tr>
<?php
      }
?>
  <tr>
    <th align="center" colspan="9">
      <?php echo $pageNav->writePagesLinks(); ?>
    </th>
  </tr>
  <tr>
    <td align="center" colspan="9">
      <?php echo $pageNav->writePagesCounter(); ?>
    </td>
  </tr>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="task" value="comments" />
<input type="hidden" name="boxchecked" value="0" />
</form>
<?php
  }

}


?>
