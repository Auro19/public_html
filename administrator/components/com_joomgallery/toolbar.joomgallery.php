<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/toolbar.joomgallery.php $
// $Id: toolbar.joomgallery.php 396 2009-03-15 16:06:21Z aha $
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

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

require_once( $mainframe->getPath( 'toolbar_html' ) );
require_once( $mainframe->getPath( 'toolbar_default' ) );

if ($act) $task = $act;

switch ($task) {

// Categories
  case "categories":
    menujoomgallery::CATEGORIES_MENU();
    break;

  case "newcatg":
    menujoomgallery::NEW_CATEGORY_MENU();
    break;

  case "editcatg":
    menujoomgallery::EDIT_CATEGORY_MENU();
    break;

//case "movecatg":
//  menujoomgallery::MOVE_CATEGORIES_MENU();
//  break;

// Pictures
  case "pictures":
    menujoomgallery::PICTURES_MENU();
    break;

  case "newpic":
    menujoomgallery::NEW_PICTURE_MENU();
    break;

  case "editpic":
    menujoomgallery::EDIT_PICTURE_MENU();
    break;

  case "movepic":
    menujoomgallery::MOVE_PICTURES_MENU();
    break;

// Comments
  case "comments":
    menujoomgallery::COMMENTS_MENU();
    break;

// Uploads
  case "upload":
    menujoomgallery::UPLOAD_MENU();
    break;
  //TODO
  case "uploadhandler":
    menujoomgallery::UPLOAD_MENU();
    break;

  case "batchupload":
    menujoomgallery::UPLOAD_MENU();
    break;

  //TODO
    case "batchuploadhandler":
    menujoomgallery::UPLOAD_MENU();
    break;

  case "ftpupload":
    menujoomgallery::UPLOAD_MENU();
    break;

  //TODO
  case "ftpuploadhandler":
    menujoomgallery::UPLOAD_MENU();
    break;

  case "jupload":
    menujoomgallery::UPLOAD_MENU();
    break;

// Configuration
  case "configuration":
    menujoomgallery::CONFIG_MENU();
    break;

// VOTING
  case "votes":
   menujoomgallery::VOTING_MENU();
   break;

// CSS Edit
  case "editcss":
    if (file_exists($mosConfig_absolute_path . '/components/com_joomgallery/assets/css/joom_local.css')){
      menujoomgallery::CSS_MENU_EDIT();
    }else{
      menujoomgallery::CSS_MENU_NEW();
    }
    break;

// Migration
  case "migrate":
   menujoomgallery::MIGRATE_MENU();
   break;

// Help, Information
  case "help":
   menujoomgallery::HELP_MENU();
   break;


// Default
  default:
    menujoomgallery::DEFAULT_MENU();
    break;
}
?>
