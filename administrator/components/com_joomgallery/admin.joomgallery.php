<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/admin.joomgallery.php $
// $Id: admin.joomgallery.php 396 2009-03-15 16:06:21Z aha $
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

require_once($mainframe->getPath('class'));
require_once($mainframe->getPath('admin_html'));
require_once($mosConfig_absolute_path .
             '/administrator/components/com_joomgallery/common.joomgallery.php');
require($mosConfig_absolute_path .
        '/administrator/components/com_joomgallery/includes/admin.configuration.php');

//Konfigurationsklasse zum Laden/Sichern und Einfuegen in $GLOBALS
$configurationclass = new Joom_AdminConfiguration('loadconfigfirst');

//Config-Globals
global $jg_pathimages,$jg_pathoriginalimages,$jg_paththumbs;

//andere globals
global
$absolut_originalpath,
$absolut_picturepath,
$absolut_thumbnailpath,
$adminclassespath,
$adminincludepath,
$cid,
$id,
$thumbnailpath;

//sanitize other variables
$id                    = mosGetParam($_REQUEST, 'id', null);
$act                   = mosGetParam($_REQUEST, 'act', null);
$task                  = mosGetParam($_REQUEST, 'task', null);
$option                = mosGetParam($_REQUEST, 'option', null);
$name                  = Joom_FixUserEntrie(mosGetParam($_REQUEST, 'name', ''));
$cid                   = mosGetParam($_REQUEST, 'cid', '');
$catid                 = mosGetParam($_REQUEST, 'catid', '');

$thumbnailpath         = $mosConfig_live_site . $jg_paththumbs . '/';
$absolut_originalpath  = $mosConfig_absolute_path . $jg_pathoriginalimages . '/';
$absolut_picturepath   = $mosConfig_absolute_path . $jg_pathimages . '/';
$absolut_thumbnailpath = $mosConfig_absolute_path . $jg_paththumbs . '/';
$adminincludepath      = $mosConfig_absolute_path .
                         '/administrator/components/com_joomgallery/includes/';
$adminclassespath      = $mosConfig_absolute_path .
                         '/administrator/components/com_joomgallery/adminclasses/';


if(is_file($mosConfig_absolute_path .
           '/administrator/components/com_joomgallery/joom_update.php')
           && $act!="configuration") {
  include($mosConfig_absolute_path .
          '/administrator/components/com_joomgallery/joom_update.php');
} else {
  switch($act) {
    case 'categories':
      require_once($adminincludepath . 'admin.categories.php');
      $task = 'categories';
      break;

    case 'pictures':
      require_once($adminincludepath . 'admin.pictures.php');
      $task = 'pictures';
      break;

    case 'comments':
      require_once($adminincludepath . 'admin.comments.php');
      $task = 'comments';
      break;

    case 'votes':
      require_once($adminincludepath . 'admin.votes.php');
      $task = 'votes';
      break;

    case 'upload':
      require_once($adminincludepath . 'admin.uploads.php');
      $task = 'upload';
      break;

    case 'batchupload':
      require_once($adminincludepath . 'admin.uploads.php');
      $task = 'batchupload';
      break;

    case 'ftpupload':
      require_once($adminincludepath . 'admin.uploads.php');
      $task = 'ftpupload';
      break;

    case 'jupload':
      require_once($adminincludepath . 'admin.uploads.php');
      $task = 'jupload';
      break;

    case 'editcss':
      require_once($adminincludepath . 'admin.cssedit.php');
      $task = 'editcss';
      break;


    case 'configuration':
        if(is_file($mosConfig_absolute_path .
           '/administrator/components/com_joomgallery/joom_update.php')) {
         include($mosConfig_absolute_path .
                 '/administrator/components/com_joomgallery/joom_update2.php');
        }
      //require_once($adminincludepath . 'admin.configuration.php');
      $task = 'configuration';
      break;

    case 'migrate':
      $task = 'migrate';
      break;

    case 'help':
      $task = 'help';
      break;
  }

  switch($task) {
//Categories
    case 'categories':
    case 'orderupcatg':
    case 'orderdowncatg':
    case 'publishcatg':
    case 'unpublishcatg':
    case 'approvecat':
    case 'rejectcat':
    case 'newcatg':
    case 'savenewcatg':
    case 'editcatg':
    case 'saveeditcatg':
//   case 'movecatg':
//   case 'savemovecatg':
    case 'removecatg':
    case 'cancelcatg':
      require_once($adminincludepath . 'admin.categories.php');
      $categoryclass = new Joom_AdminCategories($task, $cid);
      break;

//Pictures
    case 'pictures':
    case 'newpic':
    case 'savenewpic':
    case 'editpic':
    case 'saveeditpic':
    case 'canceleditpic':
    case 'movepic':
    case 'savemovepic':
    case 'publishpic':
    case 'unpublishpic':
    case 'approvepic':
    case 'rejectpic':
    case 'orderup':
    case 'orderdown':
    case 'removepic':
      require_once($adminincludepath . 'admin.pictures.php');
      $pictureclass = new Joom_AdminPictures($task,$cid);
      break;

//Categories & Pictures
    case 'saveorder':
      Joom_SaveOrder($id, $cid);
      break;

//Comments
    case 'comments':
    case 'publishcmt':
    case 'unpublishcmt':
    case 'approvecmt':
    case 'rejectcmt':
    case 'removecmt':
      require_once($adminincludepath . 'admin.comments.php');
      $commentsclass = new Joom_AdminComments($task);
      break;

// Votes
    case 'votes':
      require_once($adminincludepath . 'admin.votes.php');
      $voteclass = new Joom_AdminVotes($task);
      break;

//Uploads
    case 'upload':
    case 'batchupload':
    case 'ftpupload':
    case 'jupload':
      require_once($adminincludepath . 'admin.uploads.php');
      $adminuploadclass = new Joom_AdminUploads($task);
      break;

//Upload-Funktionen
    case 'uploadhandler':
    case 'batchuploadhandler':
    case 'ftpuploadhandler':
    case 'juploadhandler_receive':
      require_once($adminclassespath.'admin.upload.class.php');
      $uploadclass = new Joom_Upload($task, $catid);
      break;

// CSS-Bearbeitung
    case 'savecss':
    case 'cancelcss':
    case 'deletecss':
    case 'editcss':
      require_once($adminincludepath . 'admin.cssedit.php');
      $cssclass = new Joom_AdminCssEdit($task);
      break;

//Configuration
    case 'configuration':
      require_once($adminclassespath.'admin.tabs.class.php');
      $configurationclass->Joom_ShowConfig($option);
      break;
    case 'saveconfiguration':
      $configurationclass->Joom_SaveConfig();
      break;

//Migration
    case 'migrate':
      require_once($adminincludepath . 'admin.migration.php');
      $adminmigrateclass = new Joom_AdminMigration($task);
      break;

//Help
    case 'help':
      require_once($adminincludepath . 'admin.help.php');
      $adminhelpclass = new Joom_AdminHelp($task);
      break;

//Default
    default:
      Joom_ShowMenu_HTML();
      break;
  }
}

?>
        <div class="footer" align="center" style="padding-top:1em;">
           <p><br />
             <a href="http://www.joomgallery.net" target="_blank">
              <img src='../components/com_joomgallery/assets/images/powered_by.gif'  style=" border-color:#666; border-style:solid; border-width:1px; padding:2px;" alt="Powered by JoomGallery" />
             </a>
           </p>
          By:
          <a href="mailto:team@joomgallery.net">
          JoomGallery::ProjectTeam
          </a>
          <br />
          [Based on: PonyGallery ML by
          <a href='http://www.joomgallery.net/' target='_blank'>PonyGallery-ML-Team</a>]
          <br />
          <?php echo "Version ".Joom_GetGalleryVersion(); ?>
        </div>
 
