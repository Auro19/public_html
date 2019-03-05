<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/install.joomgallery.php $
// $Id: install.joomgallery.php 396 2009-03-15 16:06:21Z aha $
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

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

  function com_install() {
    global $database, $mosConfig_absolute_path, $mosConfig_lang;

    if (file_exists($mosConfig_absolute_path . '/administrator/components/com_joomgallery/adminlanguage/admin.'
                    . $mosConfig_lang . '.php')) {
      include($mosConfig_absolute_path . '/administrator/components/com_joomgallery/adminlanguage/admin.'
              . $mosConfig_lang . '.php');
    } else {
      include($mosConfig_absolute_path . '/administrator/components/com_joomgallery/adminlanguage/admin.english.php');
    }



    $queries = array(
      "UPDATE #__components SET name='"._JGA_JOOMGALLERY."', admin_menu_alt='"._JGA_JOOMGALLERY."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/main.png' WHERE admin_menu_link = 'option=com_joomgallery' AND parent = '0'",
      "UPDATE #__components SET name='"._JGA_CATEGORY_MANAGER."', admin_menu_alt='"._JGA_CATEGORY_MANAGER."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/categories.png' WHERE admin_menu_link = 'option=com_joomgallery&act=categories'",
      "UPDATE #__components SET name='"._JGA_PICTURE_MANAGER."', admin_menu_alt='"._JGA_PICTURE_MANAGER."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/pictures.png' WHERE admin_menu_link = 'option=com_joomgallery&act=pictures'",
      "UPDATE #__components SET name='"._JGA_COMMENTS_MANAGER."', admin_menu_alt='"._JGA_COMMENTS_MANAGER."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/comments.png' WHERE admin_menu_link = 'option=com_joomgallery&act=comments'",
      "UPDATE #__components SET name='"._JGA_VOTES_MANAGER."', admin_menu_alt='"._JGA_VOTES_MANAGER."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/votes.png' WHERE admin_menu_link = 'option=com_joomgallery&act=votes'",
      "UPDATE #__components SET name='"._JGA_PICTURE_UPLOAD_MANAGER."', admin_menu_alt='"._JGA_PICTURE_UPLOAD_MANAGER."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/pictureupload.png' WHERE admin_menu_link = 'option=com_joomgallery&act=upload'",
      "UPDATE #__components SET name='"._JGA_BATCH_UPLOAD_MANAGER."', admin_menu_alt='"._JGA_BATCH_UPLOAD_MANAGER."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/batchupload.png' WHERE admin_menu_link = 'option=com_joomgallery&act=batchupload'",
      "UPDATE #__components SET name='"._JGA_FTP_UPLOAD_MANAGER."', admin_menu_alt='"._JGA_FTP_UPLOAD_MANAGER."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/ftpupload.png' WHERE admin_menu_link = 'option=com_joomgallery&act=ftpupload'",
      "UPDATE #__components SET name='"._JGA_JAVA_UPLOAD_MANAGER."',admin_menu_alt='"._JGA_JAVA_UPLOAD_MANAGER."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/jupload.png' WHERE admin_menu_link = 'option=com_joomgallery&act=jupload'",
      "UPDATE #__components SET name='"._JGA_CONFIGURATION_MANAGER."', admin_menu_alt='"._JGA_CONFIGURATION_MANAGER."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/config.png' WHERE admin_menu_link = 'option=com_joomgallery&act=configuration'",
      "UPDATE #__components SET name='"._JGA_MIGRATION_MANAGER."', admin_menu_alt='"._JGA_MIGRATION_MANAGER."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/migration.png' WHERE admin_menu_link = 'option=com_joomgallery&act=migrate'",
      "UPDATE #__components SET name='"._JGA_HELP_MANAGER."', admin_menu_alt='"._JGA_HELP_MANAGER."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/information.png' WHERE admin_menu_link = 'option=com_joomgallery&act=help'",
      "UPDATE #__components SET name='"._JGA_CSS_MANAGER."', admin_menu_alt='"._JGA_CSS_MANAGER."', admin_menu_img = '../administrator/components/com_joomgallery/assets/images/css.png' WHERE admin_menu_link = 'option=com_joomgallery&act=editcss'"
    );

    foreach ($queries as $query) {
      $database->setQuery( $query );
      $database->query();
    }

    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
      exit();
    }
    echo '<p><b>'._JGA_JOOMGALLERY_SUCCESSFULLY_INSTALLED.'</b></p>';
  }

?>