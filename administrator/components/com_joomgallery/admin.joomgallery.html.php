<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/admin.joomgallery.html.php $
// $Id: admin.joomgallery.html.php 396 2009-03-15 16:06:21Z aha $
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

// list of common inclusions:
if (file_exists($mosConfig_absolute_path . '/administrator/components/com_joomgallery/adminlanguage/admin.'
                . $mosConfig_lang . '.php')) {
  include($mosConfig_absolute_path . '/administrator/components/com_joomgallery/adminlanguage/admin.'
          . $mosConfig_lang . '.php');
} else {
  include($mosConfig_absolute_path . '/administrator/components/com_joomgallery/adminlanguage/admin.english.php');
}

// pruefen, ob Menue-Eintraege in der aktuellen Sprache ausgegeben werden
$query = "SELECT name FROM #__components WHERE admin_menu_link = 'option=com_joomgallery&act=help'";
$database->setQuery($query);
$jga_help_manager = $database->loadResult();
if($jga_help_manager != _JGA_HELP_MANAGER) {
  $queries = array(
    "UPDATE #__components SET name='"._JGA_JOOMGALLERY."', admin_menu_alt='"._JGA_JOOMGALLERY."' WHERE admin_menu_link = 'option=com_joomgallery' AND parent = '0'",
    "UPDATE #__components SET name='"._JGA_CATEGORY_MANAGER."', admin_menu_alt='"._JGA_CATEGORY_MANAGER."' WHERE admin_menu_link = 'option=com_joomgallery&act=categories'",
    "UPDATE #__components SET name='"._JGA_PICTURE_MANAGER."', admin_menu_alt='"._JGA_PICTURE_MANAGER."' WHERE admin_menu_link = 'option=com_joomgallery&act=pictures'",
    "UPDATE #__components SET name='"._JGA_COMMENTS_MANAGER."', admin_menu_alt='"._JGA_COMMENTS_MANAGER."' WHERE admin_menu_link = 'option=com_joomgallery&act=comments'",
    "UPDATE #__components SET name='"._JGA_VOTES_MANAGER."', admin_menu_alt='"._JGA_VOTES_MANAGER."' WHERE admin_menu_link = 'option=com_joomgallery&act=votes'",
    "UPDATE #__components SET name='"._JGA_PICTURE_UPLOAD_MANAGER."', admin_menu_alt='"._JGA_PICTURE_UPLOAD_MANAGER."' WHERE admin_menu_link = 'option=com_joomgallery&act=upload'",
    "UPDATE #__components SET name='"._JGA_BATCH_UPLOAD_MANAGER."', admin_menu_alt='"._JGA_BATCH_UPLOAD_MANAGER."' WHERE admin_menu_link = 'option=com_joomgallery&act=batchupload'",
    "UPDATE #__components SET name='"._JGA_FTP_UPLOAD_MANAGER."', admin_menu_alt='"._JGA_FTP_UPLOAD_MANAGER."' WHERE admin_menu_link = 'option=com_joomgallery&act=ftpupload'",
    "UPDATE #__components SET name='"._JGA_JAVA_UPLOAD_MANAGER."',admin_menu_alt='"._JGA_JAVA_UPLOAD_MANAGER."' WHERE admin_menu_link = 'option=com_joomgallery&act=jupload'",
    "UPDATE #__components SET name='"._JGA_CONFIGURATION_MANAGER."', admin_menu_alt='"._JGA_CONFIGURATION_MANAGER."' WHERE admin_menu_link = 'option=com_joomgallery&act=configuration'",
    "UPDATE #__components SET name='"._JGA_MIGRATION_MANAGER."', admin_menu_alt='"._JGA_MIGRATION_MANAGER."' WHERE admin_menu_link = 'option=com_joomgallery&act=migrate'",
    "UPDATE #__components SET name='"._JGA_HELP_MANAGER."', admin_menu_alt='"._JGA_HELP_MANAGER."' WHERE admin_menu_link = 'option=com_joomgallery&act=help'",
    "UPDATE #__components SET name='"._JGA_CSS_MANAGER."', admin_menu_alt='"._JGA_CSS_MANAGER."' WHERE admin_menu_link = 'option=com_joomgallery&act=editcss'"
  );
  foreach ($queries as $query) {
    $database->setQuery( $query );
    $database->query();
  }
}

/******************************************************************************\
*                            Functions / Menu                                  *
\******************************************************************************/


function Joom_ShowMenu_HTML() {
  global $database;

  $database->setQuery("SELECT id
      FROM #__components
      WHERE link = 'option=com_joomgallery' AND parent=''");
  $id = $database->loadResult();

  $database->setQuery("SELECT *
      FROM #__components
      WHERE parent='".$id."'");
  $rows = $database->loadObjectList();
  $counter = 0;
  $img_per_row = 3;
?>
<h1><?php echo _JGA_ADMINMENU; ?></h1>
<table border="0" cellpadding="10">
  <tbody>
<?php
  foreach($rows as $row) {
    $counter++;
    if($counter == 1) {
?>
    <tr>
<?php
    }
?>
      <td>
        <a style="font-size:14pt;text-decoration:none;" href="index2.php?<?php echo $row->admin_menu_link;?>" title="<?php echo $row->admin_menu_alt; ?>" >
          <img src="<?php echo $row->admin_menu_img; ?>" width="16px" height="16px" alt="<?php echo $row->admin_menu_alt; ?>" border="0" />
          <?php echo $row->name; ?>
        </a>
      </td>
<?php
    if($counter>=$img_per_row) {
      $counter=0;
?>
    </tr>
<?php
    }
  }
  if($counter!=0) {
?>
      <td colspan="<?php echo $img_per_row-$counter; ?>">
        &nbsp;
      </td>
    </tr>
<?php
  }
?>
  </tbody>
</table>
<?php
}
?>
