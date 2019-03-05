<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/toolbar.joomgallery.html.php $
// $Id: toolbar.joomgallery.html.php 396 2009-03-15 16:06:21Z aha $
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

class menujoomgallery {

// Categories
  function CATEGORIES_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::publishList('publishcatg',_JGA_TOOLBAR_PUBLISH);
    mosMenuBar::unpublishList('unpublishcatg',_JGA_TOOLBAR_UNPUBLISH);
    mosMenuBar::spacer();
    mosMenuBar::divider();
    mosMenuBar::spacer();
    mosMenuBar::addNew('newcatg',_JGA_TOOLBAR_NEW);
    mosMenuBar::editList('editcatg',_JGA_TOOLBAR_EDIT);
    mosMenuBar::deleteList('','removecatg',_JGA_TOOLBAR_REMOVE);
    mosMenuBar::spacer();
    mosMenuBar::divider();
    mosMenuBar::spacer();
    if (defined('_JEXEC')){
      mosMenuBar::custom('cpanel','config.png','config.png',_JGA_TOOLBAR_CPANEL,false);
    }else{
      mosMenuBar::custom('cpanel','cpanel.png" width="32" height="32','cpanel.png" width="32" height="32"',_JGA_TOOLBAR_CPANEL,false);
    }
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }

  function NEW_CATEGORY_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::save('savenewcatg',_JGA_TOOLBAR_SAVE);
    mosMenuBar::cancel('cancelcatg',_JGA_TOOLBAR_CANCEL);
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }

  function EDIT_CATEGORY_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::save('saveeditcatg',_JGA_TOOLBAR_SAVE);
    mosMenuBar::cancel('cancelcatg',_JGA_TOOLBAR_CANCEL);
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }

// Pictures
  function PICTURES_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::publishList('publishpic',_JGA_TOOLBAR_PUBLISH);
    mosMenuBar::unpublishList('unpublishpic',_JGA_TOOLBAR_UNPUBLISH);
    mosMenuBar::custom('approvepic','upload.png','upload_f2.png',_JGA_TOOLBAR_APPROVE);
    mosMenuBar::spacer();
    mosMenuBar::divider();
    mosMenuBar::spacer();
    mosMenuBar::addNew('newpic',_JGA_TOOLBAR_NEW);
    mosMenuBar::editList('editpic',_JGA_TOOLBAR_EDIT);
    if (defined('_JEXEC')){
      mosMenuBar::custom('movepic','move.png','move.png',_JGA_TOOLBAR_MOVE);
    }else{
      mosMenuBar::custom('movepic', 'move_f2.png', 'move_f2.png',_JGA_TOOLBAR_MOVE);
    }
    mosMenuBar::deleteList('','removepic',_JGA_TOOLBAR_REMOVE);
    mosMenuBar::spacer();
    mosMenuBar::divider();
    mosMenuBar::spacer();
    if (defined('_JEXEC')){
      mosMenuBar::custom('cpanel','config.png','config.png',_JGA_TOOLBAR_CPANEL,false);
    }else{
      mosMenuBar::custom('cpanel','cpanel.png" width="32" height="32"','cpanel.png" width="32" height="32"',_JGA_TOOLBAR_CPANEL,false);
    }
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }

  function NEW_PICTURE_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::save('savenewpic',_JGA_TOOLBAR_SAVE);
    mosMenuBar::cancel('canceleditpic',_JGA_TOOLBAR_CANCEL);
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }

  function EDIT_PICTURE_MENU() {
    mosMenuBar::startTable();(_JGA_TOOLBAR_SAVE);
    mosMenuBar::save('saveeditpic',_JGA_TOOLBAR_SAVE);
    mosMenuBar::cancel('canceleditpic',_JGA_TOOLBAR_CANCEL);
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }

  function MOVE_PICTURES_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::save('savemovepic',_JGA_TOOLBAR_SAVE);
    mosMenuBar::cancel();
    mosMenuBar::spacer();
    if (defined('_JEXEC')){
      mosMenuBar::custom('cpanel','config.png','config.png',_JGA_TOOLBAR_CPANEL,false);
    }else{
      mosMenuBar::custom('cpanel','cpanel.png" width="32" height="32','cpanel.png" width="32" height="32"',_JGA_TOOLBAR_CPANEL,false);
    }
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }


// Comments
  function COMMENTS_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::publishList('publishcmt',_JGA_TOOLBAR_PUBLISH_COMMENT );
    mosMenuBar::unpublishList('unpublishcmt',_JGA_TOOLBAR_UNPUBLISH_COMMENT);
    mosMenuBar::custom('approvecmt','upload.png','upload_f2.png',_JGA_TOOLBAR_APPROVE_COMMENT);
    mosMenuBar::spacer();
    mosMenuBar::divider();
    mosMenuBar::spacer();
    mosMenuBar::deleteList(' ','removecmt',_JGA_TOOLBAR_REMOVE_COMMENT);
    mosMenuBar::spacer();
    mosMenuBar::divider();
    mosMenuBar::spacer();
    if (defined('_JEXEC')){
      mosMenuBar::custom('cpanel','config.png','config.png',_JGA_TOOLBAR_CPANEL,false);
    }else{
      mosMenuBar::custom('cpanel','cpanel.png" width="32" height="32"','cpanel.png" width="32" height="32"',_JGA_TOOLBAR_CPANEL,false);
    }
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }


// Uploads
  function UPLOAD_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::back();
    mosMenuBar::spacer();
    mosMenuBar::divider();
    mosMenuBar::spacer();
    if (defined('_JEXEC')){
      mosMenuBar::custom('cpanel','config.png','config.png',_JGA_TOOLBAR_CPANEL,false);
    }else{
      mosMenuBar::custom('cpanel','cpanel.png" width="32" height="32"','cpanel.png" width="32" height="32"',_JGA_TOOLBAR_CPANEL,false);
    }
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }


// Configuration
  function CONFIG_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::save('saveconfiguration',_JGA_TOOLBAR_SAVE);
    mosMenuBar::spacer();
    mosMenuBar::divider();
    mosMenuBar::spacer();
    if (defined('_JEXEC')){
      mosMenuBar::custom('cpanel','config.png','config.png',_JGA_TOOLBAR_CPANEL,false);
    }else{
      mosMenuBar::custom('cpanel','cpanel.png" width="32" height="32"','cpanel.png" width="32px" height="32"',_JGA_TOOLBAR_CPANEL,false);
    }
    mosMenuBar::endTable();
  }

  // Voting
  function VOTING_MENU() {
    mosMenuBar::startTable();
    if (defined('_JEXEC')){
      mosMenuBar::custom('cpanel','config.png','config.png',_JGA_TOOLBAR_CPANEL,false);
    }else{
      mosMenuBar::custom('cpanel','cpanel.png" width="32" height="32"','cpanel.png" width="32" height="32"',_JGA_TOOLBAR_CPANEL,false);
    }
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }

// CSS Edit (new file)
  function CSS_MENU_NEW() {
    mosMenuBar::startTable();
    mosMenuBar::save('savecss',_JGA_TOOLBAR_SAVE);
    mosMenuBar::cancel('cancelcss',_JGA_TOOLBAR_CANCEL);
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }

// CSS Edit (edit file)
  function CSS_MENU_EDIT() {
    mosMenuBar::startTable();
    mosMenuBar::trash('deletecss', _JGA_TOOLBAR_DEL_CSS);
    mosMenuBar::save('savecss',_JGA_TOOLBAR_SAVE);
    mosMenuBar::cancel('cancelcss',_JGA_TOOLBAR_CANCEL);
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }

  // Migration
  function MIGRATE_MENU() {
    mosMenuBar::startTable();
    if (defined('_JEXEC')){
      mosMenuBar::custom('cpanel','config.png','config.png',_JGA_TOOLBAR_CPANEL,false);
    }else{
      mosMenuBar::custom('cpanel','cpanel.png" width="32" height="32"','cpanel.png" width="32" height="32"',_JGA_TOOLBAR_CPANEL,false);
    }
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }


  function HELP_MENU() {
    mosMenuBar::startTable();
    if (defined('_JEXEC')){
      mosMenuBar::custom('cpanel','config.png','config.png',_JGA_TOOLBAR_CPANEL,false);
    }else{
      mosMenuBar::custom('cpanel','cpanel.png" width="32" height="32"','cpanel.png" width="32" height="32"',_JGA_TOOLBAR_CPANEL,false);
    }
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }


// Default
  function DEFAULT_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }

}
?>
