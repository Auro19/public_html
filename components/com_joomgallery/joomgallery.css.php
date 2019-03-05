<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/joomgallery.css.php $
// $Id: joomgallery.css.php 396 2009-03-15 16:06:21Z aha $
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

# Don't allow direct linking
defined ('_VALID_MOS') or die( 'Direct Access to this location is not allowed.' );

global $mosConfig_live_site,$mosConfig_absolute_path,$func;

if(method_exists($mainframe, 'addCustomHeadTag') && !defined('_JOOM_PARENT_MODULE')) {
  $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_settings.css\" />");
  $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common.css\" />");
  
  switch ($func){
    case '':
     $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common2.css\" />");
     break;
    case 'viewcategory':
      $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common2.css\" />");
      $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_category.css\" />");
      break;
    case 'detail':
    case 'deletecomment':
      $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_detail.css\" />");
      break;
    case 'special':
      $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common2.css\" />");
      $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_special.css\" />");
      break;
    case 'showupload':
    case 'userpanel':
    case 'showusercats':  //Overview categories
    case 'newusercat':    //New category for user
    case 'editusercat':
    case 'editpic':
      $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_user.css\" />");
      break;
    case 'showfavourites':
    case 'createzip':
      $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common2.css\" />");
      $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_favourites.css\" />");
      break;
    default:
      break;
  }
  // muss zuletzt geladen werden (ueberschreibt default-Einstellungen)
  if(file_exists($mosConfig_absolute_path . 
           '/components/com_joomgallery/assets/css/joom_local.css')) 
  {
    $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_local.css\" />");
  }
           
} else {
    echo "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_settings.css\" />";
    echo "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common.css\" />";
  switch ($func){
  case '':
    echo "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common2.css\" />";
  case 'viewcategory':
    echo "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common2.css\" />";
    echo "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_category.css\" />";
   break;
  case 'detail':
    echo "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_detail.css\" />";
    break;
  case 'special':
    echo "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common2.css\" />";
    echo "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_special.css\" />";
    break;
  case 'showupload':
  case 'userpanel':
  case 'showusercats':  //Overview categories
  case 'newusercat':    //New category for user
  case 'editusercat':
  case 'editpic':
    echo "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_user.css\" />";
    break;
  default:
    break;
  }
  
  // muss zuletzt geladen werden (ueberschreibt default-Einstellungen)
  if(file_exists($mosConfig_absolute_path . 
           '/components/com_joomgallery/assets/css/joom_local.css')) 
  {
   echo "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_local.css\" />";
  }
}
?>
