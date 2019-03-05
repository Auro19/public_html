<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/joomgallery.php $
// $Id: joomgallery.php 396 2009-03-15 16:06:21Z aha $
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
//Fix for local installations => e.g. xampp
$path = preg_replace("!(\\\)!i","/",dirname(__FILE__));
define( '_JOOM_ABSOLUTE_PATH', str_replace("/components/com_joomgallery","",$path));
define( '_JOOM_FRONTEND_PATH', $path );

require (_JOOM_ABSOLUTE_PATH . '/administrator/components/com_joomgallery/joomgallery.config.php');
require_once(_JOOM_ABSOLUTE_PATH . '/administrator/components/com_joomgallery/joomgallery.class.php');
require_once(_JOOM_ABSOLUTE_PATH . '/administrator/components/com_joomgallery/common.joomgallery.php');

include_once (_JOOM_FRONTEND_PATH . '/joomgallery.html.php');

//Konfigurationsklasse zum Laden/Sichern und Einf?gen in $GLOBALS
require(_JOOM_ABSOLUTE_PATH.'/administrator/components/com_joomgallery/includes/admin.configuration.php');
$configurationclass = new Joom_AdminConfiguration('loadconfigfirst');

//JoomGallery globals
global $jg_pathoriginalimages,$jg_pathimages,$jg_paththumbs;

//andere globals
global
$absolut_originalpath,
$absolut_picturepath,
$absolut_thumbnailpath,
$catid,               //mehrere
$catpath,             //mehrere
$func,                //mehrere
$is_editor,           //includes/html/joom_viewdetails.html.php
$gid,                 //mehrere
$imgfilename,         //details/javascript
$imginfo_ori,         //joom_viewdetails
$imgtext,             //joom_viewdetails
$imgtitle,            //mehrere
#$Itemid,              //mehrere
$joompath,            //mehrere 
$numberofpictures,    //joomgallery.html.php
$orig,                //joomgallery.html.php
$origpicturepath,     //joom_javascript.php
$picturepath,
$smiley,              //mehrere
$start,               //GalleryDefault()
$thumbnailpath       //mehrere
;

$gid=$my->gid;

// Variables - Don't change anything here!!!
$func = $database->getEscaped(trim( mosGetParam( $_POST, 'func', "" ) ));
if ($func == "") {
  $func = $database->getEscaped(trim( mosGetParam( $_REQUEST, 'func', "" ) ));
}

$picturepath     = $mosConfig_live_site . $jg_pathimages . '/';
$origpicturepath = $mosConfig_live_site . $jg_pathoriginalimages . '/';
$thumbnailpath   = $mosConfig_live_site . $jg_paththumbs . '/';

$absolut_originalpath  = $mosConfig_absolute_path . $jg_pathoriginalimages . '/';
$absolut_picturepath   = $mosConfig_absolute_path . $jg_pathimages . '/';
$absolut_thumbnailpath = $mosConfig_absolute_path . $jg_paththumbs . '/';

$id = intval( mosGetParam( $_REQUEST, 'id', 0 ) );
$catid = intval( mosGetParam( $_REQUEST, 'catid', 0 ) );
$orig = intval( mosGetParam( $_REQUEST, 'orig', 0) );

$Itemid = intval( mosGetParam( $_REQUEST, 'Itemid', '' ) );
if ($Itemid == "") {
  $Itemid = intval( mosGetParam( $_POST, 'Itemid', "" ) );
}
if ( ( $Itemid == 1 ) || ( $Itemid == 99999999 ) || ( $Itemid == '' ) ) {
  $database->setQuery("SELECT id FROM #__menu
      WHERE link = 'index.php?option=com_joomgallery'");
  $Itemid = intval( $database->loadResult() );
}
if($Itemid) {
  define('_JOOM_ITEMID','&Itemid='.$Itemid);
  define('_JOOM_ITEMIDX','&amp;Itemid='.$Itemid);
} else {
  define('_JOOM_ITEMID','');
  define('_JOOM_ITEMIDX','');
}

// Editorrechte
$is_editor = (strtolower($my->usertype) == 'editor' ||
              strtolower($my->usertype) == 'administrator' ||
              strtolower($my->usertype) == 'super administrator');

$is_user = (strtolower($my->usertype) <> '');

//Allgemeine Includes
include_once (_JOOM_FRONTEND_PATH . '/joomgallery.css.php');

if (file_exists(_JOOM_FRONTEND_PATH . '/language/' . $mosConfig_lang . '.php')) {
  include_once(_JOOM_FRONTEND_PATH . '/language/' . $mosConfig_lang . '.php');
} else {
  include_once(_JOOM_FRONTEND_PATH . '/language/english.php');
}

include_once (_JOOM_FRONTEND_PATH . '/includes/joom.javascript.php');

// Eventuell Zip's loeschen
if($jg_favourites && ($jg_zipdownload == 1 || ($my->id < 1 && $jg_usefavouritesforpubliczip == 1))) {
  $database->setQuery("SELECT uid,uuserid,zipname 
                       FROM #__joomgallery_users
                       WHERE zipname != '' AND time != '' AND time < NOW()-INTERVAL 60 SECOND");
  $ziprows = $database->loadObjectList();
  foreach($ziprows as $row) {
    if(file_exists($row->zipname)) {
      unlink($row->zipname);
    }
    if($row->uuserid != 0) {
      $database->setQuery("UPDATE #__joomgallery_users
                           SET time = '', zipname = ''
                           WHERE uid = '".$row->uid."'");
    } else {
      $database->setQuery("DELETE FROM #__joomgallery_users
                           WHERE uuserid = '0'
                           AND zipname = '".$row->zipname."'");
    }
    $database->query();
  }
}

##############################################################
switch ($func) {
  case 'special':
    Joom_GalleryHeader();
    include( _JOOM_FRONTEND_PATH . '/includes/joom.viewspecial.php' );
    break;

  case 'detail':
    if ( $gid==0 && $jg_showdetailpage==0) {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID), _JGS_ALERT_NO_DETAILVIEW_FOR_GUESTS);
      return;
    } elseif($jg_detailpic_open!=0) {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID), _JGS_ALERT_NO_DETAILVIEW_FOR_GUESTS);
      return;
    } else {
      Joom_GalleryHeader();
      include( _JOOM_FRONTEND_PATH . '/includes/joom.viewdetails.php' );
    }
    break;

  case 'savenameshield':
  case 'deletenameshield':
    require_once(_JOOM_FRONTEND_PATH . '/includes/joom.nameshields.php');
    $nameshieldsclass = new Joom_Nameshields($func);
    break;

  case 'votepic':
    $imgvote = intval( mosGetParam( $_REQUEST, 'imgvote', 0 ) );
    include( _JOOM_FRONTEND_PATH . '/includes/joom.votepic.php' );
    break;

  case 'userpanel':    
  case 'showusercats':  //Overview user categories
  case 'newusercat':    //New user category
  case 'editusercat':   //Modify an existing user category
  case 'saveusercat':   //Save new or modified user category
  case 'deleteusercat': //Delete user category
  case 'editpic':
  case 'savepic':
  case 'deletepic':
  case 'showupload':
    if ($jg_userspace == 0) {
      //sie sind nicht berechtigt...
      mosNotAuth();
      return;
    }      
    if (!$my->username) {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID), _JGS_YOU_ARE_NOT_LOGGED);
      return;
    }
    if ($func == 'userpanel' || $func == 'showusercats' || 
        $func == 'newusercat' || $func == 'editusercat'|| 
        $func == 'editpic' || $func == 'showupload') {
      Joom_GalleryHeader();
    }
    require_once(_JOOM_FRONTEND_PATH . '/includes/joom.userpanel.php');
    $userpanelclass = new Joom_UserPanel($option,$func,$catid);
    break;

  case 'commentpic':
  case 'deletecomment':
    require_once(_JOOM_FRONTEND_PATH . '/includes/joom.comments.php');
    $commentsclass = new Joom_Comments($func,$id);
    break;

  case 'viewcategory':
    Joom_GalleryHeader();
    //ueberpruefen der Berechtigung
    $database->setQuery("SELECT count(cid)
        FROM #__joomgallery_catg
        WHERE cid = '$catid' AND access <= '$gid'");
    $is_allowed = $database->loadResult();
    if ( $is_allowed < 1 ) {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID), _JGS_ALERT_YOU_NOT_ACCESS_THIS_DIRECTORY);
      return;
    }
    //Kategorieklasse
    require_once(_JOOM_FRONTEND_PATH . '/includes/joom.viewcategory.php');
    $categoryclass = new Joom_CategoryView($catid);

    //Navigation fuer Unterkategorien
    $categoryclass->Joom_SubcatPageNav();

    //Ausgabe der Unterkategorien
    $categoryclass->Joom_ShowSubcategories();

    //Navigation fuer Kategorie
    $categoryclass->Joom_CatPageNav();

    $count = $categoryclass->catcount;
    $orderclause = $categoryclass->orderclause;
    $catstart = $categoryclass->catstart;
    $startpage = $categoryclass->catstartpage;
    $gesamtseiten = $categoryclass->catgesamtseiten;

    //Ausgabe der Kategorienavigation im Header
    if ( ( $jg_showpagenav == 1 ) || ( $jg_showpagenav == 2 ) ) {
      $categoryclass->Joom_ShowCategoryPageNav();
    }

    //Kategorie Kopfbereich
    $categoryclass->Joom_ShowCategoryHead();

    Joom_LightboxImages(0,$catstart,$orderclause);

    //Kategorie Hauptbereich
    $categoryclass->Joom_ShowCategoryBody();

    Joom_LightboxImages($catstart+$jg_perpage,$count,$orderclause);

    //Kategorie Navi im Footer
    if ( ( $jg_showpagenav == 2 ) || ( $jg_showpagenav == 3 ) ) {
      $categoryclass->Joom_ShowCategoryPageNav();
    }

    //title-tag
    global $jg_pagetitle_cat;
    $pagetitle = Joom_MakePagetitle($jg_pagetitle_cat, $categoryclass->catname,"");
    $mainframe->setPageTitle(_JGS_GALLERY." - ".$pagetitle);

    break;

  case 'uploadhandler':
    include( _JOOM_ABSOLUTE_PATH . '/components/com_joomgallery/classes/upload.class.php' );
    $uploadclass = new Joom_Upload( $func,$catid );
    break;

  case 'send2friend':
    //TODO
    $send2friendname=mosGetParam( $_POST, 'send2friendname', '' );
    $send2friendemail=mosGetParam( $_POST, 'send2friendemail', '' );
    $from2friendname=mosGetParam( $_POST, 'from2friendname', '' );
    $from2friendemail=mosGetParam( $_POST, 'from2friendemail', '' );
    $id= intval(mosGetParam( $_POST, 'id', ''));
    $text=$from2friendname . " (" . $from2friendemail . ")"
    . " "._JGS_INVITE_YOU_VIEW_PICTURE."\r \n";
    $text.=$mosConfig_live_site . "/index.php?option=com_joomgallery&func=detail&id=$id"._JOOM_ITEMID." \r\n";
    $subject=$mosConfig_sitename . ' - ' . _JGS_RECOMMENDED_PICTURE_FROM_FRIEND;
    mosMail( $mosConfig_mailfrom, $mosConfig_fromname, $send2friendemail, $subject, $text);
    mosRedirect(sefRelToAbs("index.php?option=com_joomgallery&func=detail&id=$id"._JOOM_ITEMID), _JGS_MAIL_SENT);
    return;
    break;

  case 'download':
    include( _JOOM_FRONTEND_PATH . '/includes/joom.specialimages.php' );
    $download = new Joom_SpecialImages;
    $download->Joom_CreateDownload($id, $orig, $catid);
  break;

  case 'addpicture':
  case 'removepicture':
  case 'removeall':
  case 'switchlayout':
  case 'createzip':
  case 'showfavourites':
    include( _JOOM_FRONTEND_PATH . '/includes/joom.favourites.php' );
    $favourites = new Joom_Favourites($func,$id,$catid);
  break;

  case 'watermark':
    include( _JOOM_FRONTEND_PATH . '/includes/joom.specialimages.php' );
    $watermark = new Joom_SpecialImages;
    $watermark->Joom_CreateWatermark($id, $catid, $orig);
  break;
 
  default:
    Joom_GalleryHeader();
    // set default page title
    $mainframe->setPageTitle( _JGS_GALLERY );

    if (!$jg_showrmsmcats) {
      $access = "AND access <= '$gid'";
    } else {
      $access = "";
    }

    # Feststellen der Anzahl der darstellbaren Kategorien
    $database->setQuery("SELECT count(cid)
        FROM #__joomgallery_catg
        WHERE published = '1' AND parent='0' $access");
    $count2 = $database->loadResult();
    # Berechnen der Gesamtseiten
    if ( $jg_catperpage == 0 ) $jg_catperpage = 10;
    $gesamtseiten=floor( $count2 / $jg_catperpage );
    $seitenrest=$count2 % $jg_catperpage;
    if ( $seitenrest > 0 ) {
      $gesamtseiten++;
    }

    $count2 = number_format($count2, 0, ',', '.');
    # Feststellen der aktuellen Seite
    $startpage = intval( mosGetParam( $_REQUEST, 'startpage', 0) );
    if ( isset( $startpage ) ) {
      if ( $startpage > $gesamtseiten ) {
        $startpage=$gesamtseiten;
      } elseif ( $startpage < 1 ) {
        $startpage=1;
      }
    } else {
      $startpage=1;
    }

    # Limit und Seite Vor- & Rueckfunktionen
    $start=($startpage - 1) * $jg_catperpage;
    if (!$func) {
      if ( ( $jg_showgallerypagenav == 1 ) || ( $jg_showgallerypagenav == 2 ) ) Joom_ShowGalleryPageNav_HTML($count2, $start, $startpage, $gesamtseiten);
    }
    Joom_GalleryDefault();
    break;
}

    if (!$func) {
      if ( ( $jg_showgallerypagenav == 2 ) || ( $jg_showgallerypagenav == 3 ) ) Joom_ShowGalleryPageNav_HTML($count2, $start, $startpage, $gesamtseiten);
    }

if ($func != 'uploadhandler') {
  Joom_GalleryFooter();
}

if ($jg_completebreadcrumbs
      && defined('_JEXEC')) {
  Joom_CompleteBreadcrumbs($catid,$id,$func);
}
?>
