<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/admin.configuration.php $
// $Id: admin.configuration.php 396 2009-03-15 16:06:21Z aha $
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

include_once dirname(__FILE__) . '/html/admin.configuration.html.php';


class Joom_AdminConfiguration {
  var $configfile = '/administrator/components/com_joomgallery/joomgallery.config.php';

  function Joom_AdminConfiguration($task) {
    switch($task) {
      case 'loadconfigfirst':
        $this->Joom_LoadConfigFirst();
        break;
      case 'loadconfigmodif':
        $this->Joom_LoadConfigModif();
        break;
      case 'configuration':
        $this->Joom_ShowConfig($option);
        break;
      case 'saveconfiguration':
        $this->Joom_LoadConfigPost();
        $this->Joom_SaveConfig ();
        break;
   }
  }


  /******************************************************************************\
  *                        Functions / Configuration                             *
  \******************************************************************************/

  function Joom_LoadConfigFirst() {
    //Einlesen der Konfiguration und in GLOBAL-Array einfuegen
    global $mosConfig_absolute_path, $joom_configfile;
    $joom_configfile = $mosConfig_absolute_path . $this->configfile;
    $handle = fopen ($joom_configfile, "r");
    while (!feof($handle)) {
      $buffer = fgets($handle, 1024);
      if (substr($buffer,0,4)=='$jg_') {
          $variables = explode('=',$buffer);
          $var_name=trim(substr($variables[0],1));

          $var_value=trim(substr($variables[1],1));
          $varvalue_length = strlen($var_value);
          $GLOBALS[$var_name]=substr($var_value,1,$varvalue_length-3);
      }
    }
    fclose ($handle);
  }

  /**
   * Laden der Config-Datei und Lesen von POST-Daten hinsichtlich Aenderung
   *
   */
  function Joom_LoadConfigPost() {
    global $mosConfig_absolute_path;
    //Einlesen der Konfiguration aus POST und in GLOBAL-Array einfuegen
    //Grundlegende Einstellungen
    //Grundlegende Einstellungen->Pfade und Verzeichnisse
    if (isset($_POST['jg_pathimages'])) {
      $GLOBALS['jg_pathimages'] = Joom_FixPathEntrie(Joom_FixAdminEntrie(mosGetParam($_POST,'jg_pathimages','/components/com_joomgallery/img_pictures')));
    }
    if (isset($_POST['jg_pathoriginalimages'])) {
      $GLOBALS['jg_pathoriginalimages'] = Joom_FixPathEntrie(Joom_FixAdminEntrie(mosGetParam($_POST,'jg_pathoriginalimages','/components/com_joomgallery/img_originals')));
    }
    if (isset($_POST['jg_paththumbs'])) {
      $GLOBALS['jg_paththumbs'] = Joom_FixPathEntrie(Joom_FixAdminEntrie(mosGetParam($_POST,'jg_paththumbs','/components/com_joomgallery/img_thumbnails')));
    }
    if (isset($_POST['jg_pathftpupload'])) {
      $GLOBALS['jg_pathftpupload'] = Joom_FixPathEntrie(Joom_FixAdminEntrie(mosGetParam($_POST,'jg_pathftpupload','/components/com_joomgallery/ftp_upload')));
    }
    if (isset($_POST['jg_pathtemp'])) {
      $GLOBALS['jg_pathtemp'] = Joom_FixPathEntrie(Joom_FixAdminEntrie(mosGetParam($_POST,'jg_pathtemp','/administrator/components/com_joomgallery/temp')));
    }
    if (isset($_POST['jg_wmpath'])) {
      $GLOBALS['jg_wmpath'] = Joom_FixPathEntrie(Joom_FixAdminEntrie(mosGetParam($_POST,'jg_wmpath','/components/com_joomgallery/images')));
    }
    if (isset($_POST['jg_wmfile'])) {
      $GLOBALS['jg_wmfile'] = Joom_FixAdminEntrie(mosGetParam($_POST,'jg_wmfile', 'watermark.png'));
    }
    if (isset($_POST['jg_dateformat'])) {
      $GLOBALS['jg_dateformat'] = mosGetParam($_POST,'jg_dateformat','%d-%m-%Y%H:%M:%S');
    }
    //Grundlegende Einstellungen->Ersetzungen
    if (isset($_POST['jg_filenamewithjs']))  $GLOBALS['jg_filenamewithjs']               = intval(mosGetParam($_POST, 'jg_filenamewithjs', 1));
    if (isset($_POST['jg_filenamesearch']))  $GLOBALS['jg_filenamesearch']               = mosGetParam($_POST, 'jg_filenamesearch', '');
    if (isset($_POST['jg_filenamereplace']))  $GLOBALS['jg_filenamereplace']              = mosGetParam($_POST, 'jg_filenamereplace', '');
    //Grundlegende Einstellungen->Bildmanipulation
    if (isset($_POST['jg_thumbcreation']))  $GLOBALS['jg_thumbcreation']                = mosGetParam($_POST, 'jg_thumbcreation', 'gd2');
    if (isset($_POST['jg_fastgd2thumbcreation']))  $GLOBALS['jg_fastgd2thumbcreation']         = intval(mosGetParam($_POST, 'jg_fastgd2thumbcreation', 1));
    if (isset($_POST['jg_impath']))  $GLOBALS['jg_impath']                       = mosGetParam($_POST, 'jg_impath', '');
    if (isset($_POST['jg_resizetomaxwidth']))  $GLOBALS['jg_resizetomaxwidth']             = intval(mosGetParam($_POST, 'jg_resizetomaxwidth', 1));
    if (isset($_POST['jg_maxwidth']))  $GLOBALS['jg_maxwidth']                     = intval(mosGetParam($_POST, 'jg_maxwidth', 400));
    if (isset($_POST['jg_picturequality']))  $GLOBALS['jg_picturequality']               = intval(mosGetParam($_POST, 'jg_picturequality', 100));
    if (isset($_POST['jg_useforresizedirection']))  $GLOBALS['jg_useforresizedirection']        = intval(mosGetParam($_POST, 'jg_useforresizedirection', 0));
    if (isset($_POST['jg_thumbwidth']))  $GLOBALS['jg_thumbwidth']                   = intval(mosGetParam($_POST, 'jg_thumbwidth', 133));
    if (isset($_POST['jg_thumbheight']))  $GLOBALS['jg_thumbheight']                  = intval(mosGetParam($_POST, 'jg_thumbheight', 100));
    if (isset($_POST['jg_thumbquality']))  $GLOBALS['jg_thumbquality']                 = intval(mosGetParam($_POST, 'jg_thumbquality', 75));
    //Grundlegende Einstellungen->Backend-Upload
    if (isset($_POST['jg_uploadorder']))  $GLOBALS['jg_uploadorder']                  = intval(mosGetParam($_POST, 'jg_uploadorder', 0));
    if (isset($_POST['jg_useorigfilename']))  $GLOBALS['jg_useorigfilename']              = intval(mosGetParam($_POST, 'jg_useorigfilename', 0));
    if (isset($_POST['jg_filenamenumber']))  $GLOBALS['jg_filenamenumber']               = intval(mosGetParam($_POST, 'jg_filenamenumber', 0));
    if (isset($_POST['jg_delete_original']))  $GLOBALS['jg_delete_original']              = intval(mosGetParam($_POST, 'jg_delete_original', 0));
    if (isset($_POST['jg_wrongvaluecolor']))  $GLOBALS['jg_wrongvaluecolor']              = Joom_FixAdminEntrie(mosGetParam($_POST, 'jg_wrongvaluecolor', 'red'));
    //Grundlegende Einstellungen->Zusaetzliche Funktionen
    if (isset($_POST['jg_combuild']))  $GLOBALS['jg_combuild']                     = intval(mosGetParam($_POST, 'jg_combuild', 0));
    if (isset($_POST['jg_realname']))  $GLOBALS['jg_realname']                     = intval(mosGetParam($_POST, 'jg_realname', 0));
    if (isset($_POST['jg_bridge']))  $GLOBALS['jg_bridge']                       = intval(mosGetParam($_POST, 'jg_bridge', 0));
    if (isset($_POST['jg_cooliris']))  $GLOBALS['jg_cooliris']                     = intval(mosGetParam($_POST, 'jg_cooliris', 0));    
    if (isset($_POST['jg_coolirislink']))  $GLOBALS['jg_coolirislink']                 = intval(mosGetParam($_POST, 'jg_coolirislink', 0)); 
    //Benutzer-Rechte
    //Benutzer-Rechte->Benutzer-Upload ueber "Meine Galerie"
    if (isset($_POST['jg_userspace']))  $GLOBALS['jg_userspace']                    = intval(mosGetParam($_POST, 'jg_userspace', 0));
    if (isset($_POST['jg_approve']))  $GLOBALS['jg_approve']                      = intval(mosGetParam($_POST, 'jg_approve', 1));
    if (isset($_POST['jg_usercat']))  $GLOBALS['jg_usercat']                      = intval(mosGetParam($_POST, 'jg_usercat', 0));
    
    if (isset($_POST['jg_usercategory']))  {
      $GLOBALS['jg_usercategory']                 = array();
      $usercats = mosGetParam($_POST, 'jg_usercategory', 0);
      foreach($usercats as $usercat) {
        $usercat = intval($usercat);
        if($usercat > 0) {
          array_push($GLOBALS['jg_usercategory'], $usercat);
        }
      }          
    }
    if (isset($_POST['jg_usercatacc']))  $GLOBALS['jg_usercatacc']                   = intval(mosGetParam($_POST, 'jg_usercatacc', 0));
    if (isset($_POST['jg_maxusercat']))  $GLOBALS['jg_maxusercat']                   = intval(mosGetParam($_POST, 'jg_maxusercat', 10));    
    if (isset($_POST['jg_userowncatsupload']))  $GLOBALS['jg_userowncatsupload']            = intval(mosGetParam($_POST, 'jg_userowncatsupload', 400));
    if (isset($_POST['jg_maxuserimage']))  $GLOBALS['jg_maxuserimage']                 = intval(mosGetParam($_POST, 'jg_maxuserimage', 400));
    if (isset($_POST['jg_maxfilesize']))  $GLOBALS['jg_maxfilesize']                  = intval(mosGetParam($_POST, 'jg_maxfilesize', 2000000));
   
    if (isset($_POST['jg_category']))  {
      $GLOBALS['jg_category']                     = array();
      $cats = mosGetParam($_POST, 'jg_category', '');
      foreach($cats as $cat) {
        $cat = intval($cat);
        if($cat > 0) {
          array_push($GLOBALS['jg_category'], $cat);
        }
      }      
    }

    if (isset($_POST['jg_maxuploadfields']))  $GLOBALS['jg_maxuploadfields']              = intval(mosGetParam($_POST, 'jg_maxuploadfields', 10));
    if (isset($_POST['jg_useruploadnumber']))  $GLOBALS['jg_useruploadnumber']             = intval( mosGetParam($_POST, 'jg_useruploadnumber', 0 ) );
    if (isset($_POST['jg_special_gif_upload']))  $GLOBALS['jg_special_gif_upload']           = intval(mosGetParam($_POST, 'jg_special_gif_upload', 0));
    if (isset($_POST['jg_delete_original_user']))  $GLOBALS['jg_delete_original_user']         = intval(mosGetParam($_POST, 'jg_delete_original_user', 0));
    if (isset($_POST['jg_newpiccopyright']))  $GLOBALS['jg_newpiccopyright']              = intval(mosGetParam($_POST, 'jg_newpiccopyright', 0));
    if (isset($_POST['jg_newpicnote']))  $GLOBALS['jg_newpicnote']                   = intval(mosGetParam($_POST, 'jg_newpicnote', 0));
    //Benutzer-Rechte->Bewertungen
    if (isset($_POST['jg_showrating']))  $GLOBALS['jg_showrating']                   = intval(mosGetParam($_POST, 'jg_showrating', 0));
    if (isset($_POST['jg_maxvoting']))  $GLOBALS['jg_maxvoting']                    = intval(mosGetParam($_POST, 'jg_maxvoting', 5));
    if (isset($_POST['jg_onlyreguservotes']))  $GLOBALS['jg_onlyreguservotes']             = intval(mosGetParam($_POST, 'jg_onlyreguservotes', 1));
    //Benutzer-Rechte->Kommentare
    if (isset($_POST['jg_showcomment']))  $GLOBALS['jg_showcomment']                  = intval(mosGetParam($_POST, 'jg_showcomment', 0));
    if (isset($_POST['jg_anoncomment']))  $GLOBALS['jg_anoncomment']                  = intval(mosGetParam($_POST, 'jg_anoncomment', 0));
    if (isset($_POST['jg_namedanoncomment']))  $GLOBALS['jg_namedanoncomment']             = intval(mosGetParam($_POST, 'jg_namedanoncomment', 0));
    if (isset($_POST['jg_approvecom']))  $GLOBALS['jg_approvecom']                   = intval(mosGetParam($_POST, 'jg_approvecom', 2));
    if (isset($_POST['jg_secimages']))  $GLOBALS['jg_secimages']                    = intval(mosGetParam($_POST, 'jg_secimages', 2));
    if (isset($_POST['jg_bbcodesupport']))  $GLOBALS['jg_bbcodesupport']                = intval(mosGetParam($_POST, 'jg_bbcodesupport', 0));
    if (isset($_POST['jg_smiliesupport']))  $GLOBALS['jg_smiliesupport']                = intval(mosGetParam($_POST, 'jg_smiliesupport', 0));
    if (isset($_POST['jg_anismilie']))  $GLOBALS['jg_anismilie']                    = intval(mosGetParam($_POST, 'jg_anismilie', 0));
    if (isset($_POST['jg_smiliescolor']))  $GLOBALS['jg_smiliescolor']                 = mosGetParam($_POST, 'jg_smiliescolor', 'grey');
    //Frontend Einstellungen
    //Frontend Einstellungen->Anordnung der Bilder
    if (isset($_POST['jg_firstorder']))  $GLOBALS['jg_firstorder']                   = mosGetParam($_POST, 'jg_firstorder', 'ordering ASC');
    if (isset($_POST['jg_secondorder']))  $GLOBALS['jg_secondorder']                  = mosGetParam($_POST, 'jg_secondorder', 'imgdate DESC');
    if (isset($_POST['jg_thirdorder']))  $GLOBALS['jg_thirdorder']                   = mosGetParam($_POST, 'jg_thirdorder', 'imgtitle DESC');
    //Frontend Einstellungen->Seitentitel
    if (isset($_POST['jg_pagetitle_cat']))  $GLOBALS['jg_pagetitle_cat']                = mosGetParam($_POST, 'jg_pagetitle_cat', '');
    if (isset($_POST['jg_pagetitle_detail']))  $GLOBALS['jg_pagetitle_detail']             = mosGetParam($_POST, 'jg_pagetitle_detail', '');
    //Frontend Einstellungen->Kopf- und Fussbereich
    if (isset($_POST['jg_showgalleryhead']))  $GLOBALS['jg_showgalleryhead']              = intval(mosGetParam($_POST, 'jg_showgalleryhead', 1));
    if (isset($_POST['jg_showpathway']))  $GLOBALS['jg_showpathway']                  = intval(mosGetParam($_POST, 'jg_showpathway', 1));
    if (isset($_POST['jg_completebreadcrumbs']))  $GLOBALS['jg_completebreadcrumbs']          = intval(mosGetParam($_POST, 'jg_completebreadcrumbs', 0));
    if (isset($_POST['jg_search']))  $GLOBALS['jg_search']                       = intval(mosGetParam($_POST, 'jg_search', 1));
    if (isset($_POST['jg_showallpics']))  $GLOBALS['jg_showallpics']                  = intval(mosGetParam($_POST, 'jg_showallpics', 0));
    if (isset($_POST['jg_showallhits']))  $GLOBALS['jg_showallhits']                  = intval(mosGetParam($_POST, 'jg_showallhits', 0));
    if (isset($_POST['jg_showbacklink']))  $GLOBALS['jg_showbacklink']                 = intval(mosGetParam($_POST, 'jg_showbacklink', 0));
    if (isset($_POST['jg_suppresscredits']))  $GLOBALS['jg_suppresscredits']              = intval(mosGetParam($_POST, 'jg_suppresscredits', 1));
    //Frontend Einstellungen->Meine Galerie
    if (isset($_POST['jg_showuserpanel']))  $GLOBALS['jg_showuserpanel']                = intval(mosGetParam($_POST, 'jg_showuserpanel', 1));
    if (isset($_POST['jg_showallpicstoadmin']))  $GLOBALS['jg_showallpicstoadmin']           = intval(mosGetParam($_POST, 'jg_showallpicstoadmin', 0));
    if (isset($_POST['jg_showminithumbs']))  $GLOBALS['jg_showminithumbs']               = intval(mosGetParam($_POST, 'jg_showminithumbs', 1));
    //Frontend Einstellungen->Toplisten
    if (isset($_POST['jg_showtoplist']))  $GLOBALS['jg_showtoplist']                  = intval(mosGetParam($_POST, 'jg_showtoplist', 1));
    if (isset($_POST['jg_toplist']))  $GLOBALS['jg_toplist']                      = intval(mosGetParam($_POST, 'jg_toplist', 10));
    if (isset($_POST['jg_topthumbalign']))  $GLOBALS['jg_topthumbalign']                = intval(mosGetParam($_POST, 'jg_topthumbalign', 1));
    if (isset($_POST['jg_toptextalign']))  $GLOBALS['jg_toptextalign']                 = intval(mosGetParam($_POST, 'jg_toptextalign', 1));
    if (isset($_POST['jg_whereshowtoplist']))  $GLOBALS['jg_whereshowtoplist']             = intval(mosGetParam($_POST, 'jg_whereshowtoplist', 0));
    if (isset($_POST['jg_toplistcols']))  $GLOBALS['jg_toplistcols']                  = intval(mosGetParam($_POST, 'jg_toplistcols', 0));
    if (isset($_POST['jg_showrate']))  $GLOBALS['jg_showrate']                     = intval(mosGetParam($_POST, 'jg_showrate', 1));
    if (isset($_POST['jg_showlatest']))  $GLOBALS['jg_showlatest']                   = intval(mosGetParam($_POST, 'jg_showlatest', 1));
    if (isset($_POST['jg_showcom']))  $GLOBALS['jg_showcom']                      = intval(mosGetParam($_POST, 'jg_showcom', 1));
    if (isset($_POST['jg_showthiscomment']))  $GLOBALS['jg_showthiscomment']              = intval(mosGetParam($_POST, 'jg_showthiscomment', 1));
    if (isset($_POST['jg_showmostviewed']))  $GLOBALS['jg_showmostviewed']               = intval(mosGetParam($_POST, 'jg_showmostviewed', 1));
    //Frontend Einstellungen->PopUp-Funktionen
    if (isset($_POST['jg_openjs_padding']))  $GLOBALS['jg_openjs_padding']               = intval(mosGetParam($_POST, 'jg_openjs_padding', 10));
    if (isset($_POST['jg_openjs_background']))  $GLOBALS['jg_openjs_background']            = Joom_FixAdminEntrie(mosGetParam($_POST, 'jg_openjs_background', '#fff'));
    if (isset($_POST['jg_dhtml_border']))  $GLOBALS['jg_dhtml_border']                 = Joom_FixAdminEntrie(mosGetParam($_POST, 'jg_dhtml_border', '#808080'));
    if (isset($_POST['jg_show_title_in_dhtml']))  $GLOBALS['jg_show_title_in_dhtml']          = intval(mosGetParam($_POST, 'jg_show_title_in_dhtml', 0));
    if (isset($_POST['jg_show_description_in_dhtml']))  $GLOBALS['jg_show_description_in_dhtml']    = intval(mosGetParam($_POST, 'jg_show_description_in_dhtml', 0));
    if (isset($_POST['jg_lightbox_overlay']))  $GLOBALS['jg_lightbox_overlay']             = Joom_FixAdminEntrie(mosGetParam($_POST, 'jg_lightbox_overlay', '#000'));
    if (isset($_POST['jg_lightbox_speed']))  $GLOBALS['jg_lightbox_speed']               = intval(mosGetParam($_POST, 'jg_lightbox_speed', 5));
    if (isset($_POST['jg_lightbox_slide_all']))  $GLOBALS['jg_lightbox_slide_all']           = intval(mosGetParam($_POST, 'jg_lightbox_slide_all', 0));
    if (isset($_POST['jg_resize_js_image']))  $GLOBALS['jg_resize_js_image']              = intval(mosGetParam($_POST, 'jg_resize_js_image', 1));
    if (isset($_POST['jg_disable_rightclick_original']))  $GLOBALS['jg_disable_rightclick_original']  = intval(mosGetParam($_POST, 'jg_disable_rightclick_original', 1));
    //Galerie-Ansicht
    //Galerie-Ansicht->Generelle Einstellungen
    if (isset($_POST['jg_showgallerysubhead']))  $GLOBALS['jg_showgallerysubhead']           = intval(mosGetParam($_POST, 'jg_showgallerysubhead', 1));
    if (isset($_POST['jg_showallcathead']))  $GLOBALS['jg_showallcathead']               = intval(mosGetParam($_POST, 'jg_showallcathead', 1));
    if (isset($_POST['jg_colcat']))  $GLOBALS['jg_colcat']                       = intval(mosGetParam($_POST, 'jg_colcat', 1));
    if (isset($_POST['jg_catperpage']))  $GLOBALS['jg_catperpage']                   = intval(mosGetParam($_POST, 'jg_catperpage', 10));
    if (isset($_POST['jg_ordercatbyalpha']))  $GLOBALS['jg_ordercatbyalpha']              = intval( mosGetParam($_POST, 'jg_ordercatbyalpha', 0 ) );
    if (isset($_POST['jg_showgallerypagenav']))  $GLOBALS['jg_showgallerypagenav']           = intval(mosGetParam($_POST, 'jg_showgallerypagenav', 1));
    if (isset($_POST['jg_showcatcount']))  $GLOBALS['jg_showcatcount']                 = intval(mosGetParam($_POST, 'jg_showcatcount', 1));
    if (isset($_POST['jg_showcatthumb']))  $GLOBALS['jg_showcatthumb']                 = intval(mosGetParam($_POST, 'jg_showcatthumb', 1));
    if (isset($_POST['jg_showrandomcatthumb']))  $GLOBALS['jg_showrandomcatthumb']           = intval(mosGetParam($_POST, 'jg_showrandomcatthumb', 2));
    if (isset($_POST['jg_ctalign']))  $GLOBALS['jg_ctalign']                      = intval(mosGetParam($_POST, 'jg_ctalign', 1));
    if (isset($_POST['jg_showtotalcathits']))  $GLOBALS['jg_showtotalcathits']             = intval(mosGetParam($_POST, 'jg_showtotalcathits', 1));
    if (isset($_POST['jg_showcatasnew']))  $GLOBALS['jg_showcatasnew']                 = intval( mosGetParam($_POST, 'jg_showcatasnew', 0 ) );
    if (isset($_POST['jg_catdaysnew']))  $GLOBALS['jg_catdaysnew']                   = intval( mosGetParam($_POST, 'jg_catdaysnew', 7 ) );
    if (isset($_POST['jg_rmsm']))  $GLOBALS['jg_rmsm']                        = intval(mosGetParam($_POST, 'jg_rmsm', 1));
    if (isset($_POST['jg_showrmsmcats']))  $GLOBALS['jg_showrmsmcats']                 = intval(mosGetParam($_POST, 'jg_showrmsmcats', 0));
    //Kategorie-Ansicht
    //Kategorie-Ansicht->Generelle Einstellungen
    if (isset($_POST['jg_showcathead']))  $GLOBALS['jg_showcathead']                  = intval(mosGetParam($_POST, 'jg_showcathead', 1));
    if (isset($_POST['jg_usercatorder']))  $GLOBALS['jg_usercatorder']                 = intval( mosGetParam($_POST, 'jg_usercatorder', 0 ) );
    if (isset($_POST['jg_usercatorderlist']))  $GLOBALS['jg_usercatorderlist']             = mosGetParam($_POST, 'jg_usercatorderlist', 'date, title' );
    if (isset($_POST['jg_showcatdescriptionincat']))  $GLOBALS['jg_showcatdescriptionincat']      = intval( mosGetParam($_POST, 'jg_showcatdescriptionincat', 0 ) );
    if (isset($_POST['jg_showpagenav']))  $GLOBALS['jg_showpagenav']                  = intval(mosGetParam($_POST, 'jg_showpagenav', 1));
    if (isset($_POST['jg_showpiccount']))  $GLOBALS['jg_showpiccount']                 = intval(mosGetParam($_POST, 'jg_showpiccount', 1));
    if (isset($_POST['jg_perpage']))  $GLOBALS['jg_perpage']                      = intval(mosGetParam($_POST, 'jg_perpage', 9));
    if (isset($_POST['jg_catthumbalign']))  $GLOBALS['jg_catthumbalign']                = intval(mosGetParam($_POST, 'jg_catthumbalign', 1));
    if (isset($_POST['jg_colnumb']))  $GLOBALS['jg_colnumb']                      = intval(mosGetParam($_POST, 'jg_colnumb', 3));
    if (isset($_POST['jg_detailpic_open']))  $GLOBALS['jg_detailpic_open']               = intval(mosGetParam($_POST, 'jg_detailpic_open', 0));
    if (isset($_POST['jg_lightboxbigpic']))  $GLOBALS['jg_lightboxbigpic']               = intval(mosGetParam($_POST, 'jg_lightboxbigpic', 0));
    if (isset($_POST['jg_showtitle']))  $GLOBALS['jg_showtitle']                    = intval(mosGetParam($_POST, 'jg_showtitle', 1));
    if (isset($_POST['jg_showpicasnew']))  $GLOBALS['jg_showpicasnew']                 = intval( mosGetParam($_POST, 'jg_showpicasnew', 0 ) );
    if (isset($_POST['jg_daysnew']))  $GLOBALS['jg_daysnew']                      = intval( mosGetParam($_POST, 'jg_daysnew', 7 ) );
    if (isset($_POST['jg_showhits']))  $GLOBALS['jg_showhits']                     = intval(mosGetParam($_POST, 'jg_showhits', 1));
    if (isset($_POST['jg_showauthor']))  $GLOBALS['jg_showauthor']                   = intval(mosGetParam($_POST, 'jg_showauthor', 1));
    if (isset($_POST['jg_showowner']))  $GLOBALS['jg_showowner']                    = intval(mosGetParam($_POST, 'jg_showowner', 1));
    if (isset($_POST['jg_showcatcom']))  $GLOBALS['jg_showcatcom']                   = intval(mosGetParam($_POST, 'jg_showcatcom', 1));
    if (isset($_POST['jg_showcatrate']))  $GLOBALS['jg_showcatrate']                  = intval(mosGetParam($_POST, 'jg_showcatrate', 1));
    if (isset($_POST['jg_showcatdescription']))  $GLOBALS['jg_showcatdescription']           = intval(mosGetParam($_POST, 'jg_showcatdescription', 1));
    if (isset($_POST['jg_showcategorydownload']))  $GLOBALS['jg_showcategorydownload']         = intval(mosGetParam($_POST, 'jg_showcategorydownload', 0));
    if (isset($_POST['jg_showcategoryfavourite']))  $GLOBALS['jg_showcategoryfavourite']        = intval(mosGetParam($_POST, 'jg_showcategoryfavourite', 0));
    //Kategorie-Ansicht->Unterkategorien
    if (isset($_POST['jg_showsubcathead']))  $GLOBALS['jg_showsubcathead']               = intval(mosGetParam($_POST, 'jg_showsubcathead', 1));
    if (isset($_POST['jg_showsubcatcount']))  $GLOBALS['jg_showsubcatcount']              = intval( mosGetParam($_POST, 'jg_showsubcatcount', 1 ) );
    if (isset($_POST['jg_colsubcat']))  $GLOBALS['jg_colsubcat']                    = intval(mosGetParam($_POST, 'jg_colsubcat', 3));
    if (isset($_POST['jg_subperpage']))  $GLOBALS['jg_subperpage']                   = intval( mosGetParam($_POST, 'jg_subperpage', 2 ) );
    if (isset($_POST['jg_subcatthumbalign']))  $GLOBALS['jg_subcatthumbalign']             = intval(mosGetParam($_POST, 'jg_subcatthumbalign', 1));
    if (isset($_POST['jg_showsubthumbs']))  $GLOBALS['jg_showsubthumbs']                = intval(mosGetParam($_POST, 'jg_showsubthumbs', 2));
    if (isset($_POST['jg_showrandomsubthumb']))  $GLOBALS['jg_showrandomsubthumb']           = intval(mosGetParam($_POST, 'jg_showrandomsubthumb', 3));
    if (isset($_POST['jg_ordersubcatbyalpha']))  $GLOBALS['jg_ordersubcatbyalpha']           = intval( mosGetParam($_POST, 'jg_ordersubcatbyalpha', 0 ) );
    if (isset($_POST['jg_subcatdetailsalign']))  $GLOBALS['jg_subcatdetailsalign']                 = intval( mosGetParam($_POST, 'jg_subcatdetailsalign', 0 ) );
    if (isset($_POST['jg_showtotalsubcathits']))  $GLOBALS['jg_showtotalsubcathits']          = intval(mosGetParam($_POST, 'jg_showtotalsubcathits', 1));
    //Detail-Ansicht
    //Detail-Ansicht->Generelle Einstellungen
    if (isset($_POST['jg_showdetailpage']))  $GLOBALS['jg_showdetailpage']               = intval(mosGetParam($_POST, 'jg_showdetailpage', 1));
    if (isset($_POST['jg_showdetailnumberofpics']))  $GLOBALS['jg_showdetailnumberofpics']       = intval(mosGetParam($_POST, 'jg_showdetailnumberofpics', 1));
    if (isset($_POST['jg_cursor_navigation']))  $GLOBALS['jg_cursor_navigation']            = intval(mosGetParam($_POST, 'jg_cursor_navigation', 1));
    if (isset($_POST['jg_disable_rightclick_detail']))  $GLOBALS['jg_disable_rightclick_detail']    = intval(mosGetParam($_POST, 'jg_disable_rightclick_detail', 1));
    if (isset($_POST['jg_showdetailtitle']))  $GLOBALS['jg_showdetailtitle']              = intval(mosGetParam($_POST, 'jg_showdetailtitle', 1));
    if (isset($_POST['jg_showdetail']))  $GLOBALS['jg_showdetail']                   = intval(mosGetParam($_POST, 'jg_showdetail', 1));
    if (isset($_POST['jg_showdetailaccordion']))  $GLOBALS['jg_showdetailaccordion']          = intval(mosGetParam($_POST, 'jg_showdetailaccordion', 0));
    if (isset($_POST['jg_showdetaildescription']))  $GLOBALS['jg_showdetaildescription']        = intval(mosGetParam($_POST, 'jg_showdetaildescription', 1));
    if (isset($_POST['jg_showdetaildatum']))  $GLOBALS['jg_showdetaildatum']              = intval(mosGetParam($_POST, 'jg_showdetaildatum', 1));
    if (isset($_POST['jg_showdetailhits']))  $GLOBALS['jg_showdetailhits']               = intval(mosGetParam($_POST, 'jg_showdetailhits', 1));
    if (isset($_POST['jg_showdetailrating']))  $GLOBALS['jg_showdetailrating']             = intval(mosGetParam($_POST, 'jg_showdetailrating', 1));
    if (isset($_POST['jg_showdetailfilesize']))  $GLOBALS['jg_showdetailfilesize']           = intval(mosGetParam($_POST, 'jg_showdetailfilesize', 1));
    if (isset($_POST['jg_showdetailauthor']))  $GLOBALS['jg_showdetailauthor']             = intval(mosGetParam($_POST, 'jg_showdetailauthor', 1));
    if (isset($_POST['jg_showoriginalfilesize']))  $GLOBALS['jg_showoriginalfilesize']         = intval(mosGetParam($_POST, 'jg_showoriginalfilesize', 1));
    if (isset($_POST['jg_showdetaildownload']))  $GLOBALS['jg_showdetaildownload']           = intval(mosGetParam($_POST, 'jg_showdetaildownload', 1));
    if (isset($_POST['jg_downloadfile']))  $GLOBALS['jg_downloadfile']                 = intval(mosGetParam($_POST, 'jg_downloadfile', 1));
    if (isset($_POST['jg_downloadwithwatermark']))  $GLOBALS['jg_downloadwithwatermark']        = intval(mosGetParam($_POST, 'jg_downloadwithwatermark', 1));
    if (isset($_POST['jg_watermark']))  $GLOBALS['jg_watermark']                    = intval(mosGetParam($_POST, 'jg_watermark', 1));
    if (isset($_POST['jg_watermarkpos']))  $GLOBALS['jg_watermarkpos']                 = intval(mosGetParam($_POST, 'jg_watermarkpos', 9));
    if (isset($_POST['jg_bigpic']))  $GLOBALS['jg_bigpic']                       = intval(mosGetParam($_POST, 'jg_bigpic', 1));
    if (isset($_POST['jg_bigpic_open']))  $GLOBALS['jg_bigpic_open']                  = intval(mosGetParam($_POST, 'jg_bigpic_open', 0));
    if (isset($_POST['jg_bbcodelink']))  $GLOBALS['jg_bbcodelink']                   = intval(mosGetParam($_POST, 'jg_bbcodelink', 3));
    if (isset($_POST['jg_showcommentsunreg']))  $GLOBALS['jg_showcommentsunreg']            = intval(mosGetParam($_POST, 'jg_showcommentsunreg', 1));
    if (isset($_POST['jg_showcommentsarea']))  $GLOBALS['jg_showcommentsarea']             = intval(mosGetParam($_POST, 'jg_showcommentsarea', 3));
    if (isset($_POST['jg_send2friend']))  $GLOBALS['jg_send2friend']                  = intval(mosGetParam($_POST, 'jg_send2friend', 1));
    //Detail-Ansicht->Motiongallery
    if (isset($_POST['jg_minis']))  $GLOBALS['jg_minis']                        = intval(mosGetParam($_POST, 'jg_minis', 1));
    if (isset($_POST['jg_motionminis']))  $GLOBALS['jg_motionminis']                  = intval(mosGetParam($_POST, 'jg_motionminis', 1));
    if (isset($_POST['jg_motionminiWidth']))  $GLOBALS['jg_motionminiWidth']              = intval(mosGetParam($_POST, 'jg_motionminiWidth', 400));
    if (isset($_POST['jg_motionminiHeight']))  $GLOBALS['jg_motionminiHeight']             = intval(mosGetParam($_POST, 'jg_motionminiHeight', 50));
    if (isset($_POST['jg_miniWidth']))  $GLOBALS['jg_miniWidth']                    = intval(mosGetParam($_POST, 'jg_miniWidth', 30));
    if (isset($_POST['jg_miniHeight']))  $GLOBALS['jg_miniHeight']                   = intval(mosGetParam($_POST, 'jg_miniHeight', 30));
    if (isset($_POST['jg_minisprop']))  $GLOBALS['jg_minisprop']                    = intval(mosGetParam($_POST, 'jg_minisprop', 0));
    //Detail-Ansicht->Namensschilder
    if (isset($_POST['jg_nameshields']))  $GLOBALS['jg_nameshields']                  = intval( mosGetParam($_POST, 'jg_nameshields', 0 ) );
    if (isset($_POST['jg_nameshields_unreg']))  $GLOBALS['jg_nameshields_unreg']            = intval( mosGetParam($_POST, 'jg_nameshields_unreg', 0 ) );
    if (isset($_POST['jg_show_nameshields_unreg']))  $GLOBALS['jg_show_nameshields_unreg']       = intval( mosGetParam($_POST, 'jg_show_nameshields_unreg', 0 ) );
    if (isset($_POST['jg_nameshields_height']))  $GLOBALS['jg_nameshields_height']           = intval( mosGetParam($_POST, 'jg_nameshields_height', 12 ) );
    if (isset($_POST['jg_nameshields_width']))  $GLOBALS['jg_nameshields_width']            = intval( mosGetParam($_POST, 'jg_nameshields_width', 8 ) );
    //Detail-Ansicht->Slideshow
    if (isset($_POST['jg_slideshow']))  $GLOBALS['jg_slideshow']                    = intval(mosGetParam($_POST, 'jg_slideshow', 1));
    if (isset($_POST['jg_slideshow_timer']))  $GLOBALS['jg_slideshow_timer']              = intval(mosGetParam($_POST, 'jg_slideshow_timer', 5));
    if (isset($_POST['jg_slideshow_usefilter']))  $GLOBALS['jg_slideshow_usefilter']          = intval(mosGetParam($_POST, 'jg_slideshow_usefilter', 1));
    if (isset($_POST['jg_slideshow_filterbychance']))  $GLOBALS['jg_slideshow_filterbychance']     = intval(mosGetParam($_POST, 'jg_slideshow_filterbychance', 1));
    if (isset($_POST['jg_slideshow_filtertimer']))  $GLOBALS['jg_slideshow_filtertimer']        = intval(mosGetParam($_POST, 'jg_slideshow_filtertimer', 3));
    if (isset($_POST['jg_showsliderepeater']))  $GLOBALS['jg_showsliderepeater']            = intval(mosGetParam($_POST, 'jg_showsliderepeater', 1));
    //Detail-Ansicht->Exif-Daten
    if (isset($_POST['jg_showexifdata'])) $GLOBALS['jg_showexifdata']                 = intval(mosGetParam($_POST, 'jg_showexifdata', 0));

    if (isset($_POST['jg_subifdtags'])) {
      $GLOBALS['jg_subifdtags']                     = array();
      $subifdtags = mosGetParam($_POST, 'jg_subifdtags', '');
      if ($subifdtags != NULL) {
        foreach($subifdtags as $subifdtag) {
          $subifdtag = intval($subifdtag);
          if($subifdtag > 0) {
            array_push($GLOBALS['jg_subifdtags'], $subifdtag);
          }
        }
      }        
    }
    if (isset($_POST['jg_ifdotags'])) {
      $GLOBALS['jg_ifdotags']                     = array();
      $ifdotags = mosGetParam($_POST, 'jg_ifdotags', '');
      if ($ifdotags != NULL) {
        foreach($ifdotags as $ifdotag) {
          $ifdotag = intval($ifdotag);
          if($ifdotag > 0) {
            array_push($GLOBALS['jg_ifdotags'], $ifdotag);
          }
        }
      }
    }
    if (isset($_POST['jg_gpstags'])) {
      $GLOBALS['jg_gpstags']                     = array();
      $gpstags = mosGetParam($_POST, 'jg_gpstags', '');
      if ($gpstags != NULL) {
        foreach($gpstags as $gpstag) {
          $gpstag = intval($gpstag);
          if($gpstag >= 0) {
            array_push($GLOBALS['jg_gpstags'], $gpstag);
          }
        }
      }
    }
    //Detail-Ansicht->IPTC-Daten
    if (isset($_POST['jg_showiptcdata'])) $GLOBALS['jg_showiptcdata'] = intval(mosGetParam($_POST, 'jg_showiptcdata', 0));
    if (isset($_POST['jg_iptctags'])) {
      $GLOBALS['jg_iptctags'] = array();
      $iptctags = mosGetParam($_POST, 'jg_iptctags', '');
      if ($iptctags != NULL) {
        foreach($iptctags as $iptctag) {
          $iptctag = intval($iptctag);
          if($iptctag >= 0) {
            array_push($GLOBALS['jg_iptctags'], $iptctag);
          }
        }
      }
    }
    //Favoriten->Generelle Einstellungen
    if (isset($_POST['jg_favourites']))  $GLOBALS['jg_favourites']                   = intval(mosGetParam($_POST, 'jg_favourites', 0));
    if (isset($_POST['jg_showdetailfavourite']))  $GLOBALS['jg_showdetailfavourite']          = intval(mosGetParam($_POST, 'jg_showdetailfavourite', 0));
    if (isset($_POST['jg_favouritesshownotauth']))  $GLOBALS['jg_favouritesshownotauth']        = intval(mosGetParam($_POST, 'jg_favouritesshownotauth', 0));
    if (isset($_POST['jg_maxfavourites']))  $GLOBALS['jg_maxfavourites']                = intval(mosGetParam($_POST, 'jg_maxfavourites', 30));
    if (isset($_POST['jg_zipdownload']))  $GLOBALS['jg_zipdownload']                  = intval(mosGetParam($_POST, 'jg_zipdownload', 1));
    if (isset($_POST['jg_usefavouritesforpubliczip']))  $GLOBALS['jg_usefavouritesforpubliczip']    = intval(mosGetParam($_POST, 'jg_usefavouritesforpubliczip', 1));
    if (isset($_POST['jg_usefavouritesforzip']))  $GLOBALS['jg_usefavouritesforzip']          = intval(mosGetParam($_POST, 'jg_usefavouritesforzip', 0));
  }


  function Joom_ShowConfig($option) {
    global $mosConfig_absolute_path,$jg_category,$jg_usercategory, 
    $jg_pathimages,$jg_pathoriginalimages,$jg_paththumbs,$jg_pathftpupload,
    $jg_pathtemp,$jg_wmpath,$jg_wmfile;

    //check the existence of component-xml from com_easycaptcha
    if  (defined( '_JEXEC' ))  {
      $xmlfile = $mosConfig_absolute_path. '/administrator/components/com_easycaptcha/com_easycaptcha.xml';
    } else {
      $xmlfile = $mosConfig_absolute_path. '/administrator/components/com_easycaptcha/easycaptcha.xml';
    }
    if (is_file($xmlfile)) {
      $easycaptchamsg = '<div style="color:#080;">[' . _JGA_EASYCAPTCHA_INSTALLED . ']</div>';
    } else {
      $easycaptchamsg = '<div style="color:#f00;font-weight:bold">[' . _JGA_EASYCAPTCHA_NOT_INSTALLED . ']</div>';
    }

    //check the installation of GD
    $gdver = Joom_GDVersion();
    // Returns version, 0 if not installed, or -1 if appears to be installed but
    // not verified
    global $gdmsg,$immsg;
    if ($gdver > 0) {
      $gdmsg = _JGA_GD_INSTALLED_PARTONE .  $gdver  . _JGA_GD_INSTALLED_PARTTWO;
    } elseif ($gdver == -1) {
      $gdmsg = _JGA_GD_NO_VERSION;
    } else {
      $gdmsg = _JGA_GD_NOT_INSTALLED .
               '<a href="http://www.php.net/gd" target="_blank">http://www.php.net/gd</a>'
               . _JGA_GD_MORE_INFO;
    }

    //check the installation of ImageMagick
    $imver = Joom_IMVersion();
    // Returns version, 0 if not installed or path not properly configured
    if ($imver != "0") {
      $immsg = _JGA_IM_INSTALLED .  $imver;
    } else {
      $immsg = _JGA_IM_NOT_INSTALLED;
    }

    //check the installation of Exif
    $exifmsg = "";
    if (!extension_loaded('exif')) {
      $exifmsg    = '<div style="color:#f00;font-weight:bold; text-align:center;">[' . _JGA_EXIF_NOT_INSTALLED . ' ' . _JGA_EXIF_NO_OPTIONS . ']</div>';
    } else {
      $exifmsg    = '<div style="color:#080; text-align:center;">[' . _JGA_EXIF_INSTALLED . ']</div>';
      if (!function_exists('exif_read_data')) {
        $exifmsg = '<div style="color:#f00;font-weight:bold; text-align:center;">[' . _JGA_EXIF_INSTALLED_BUT . ' ' . _JGA_EXIF_NO_OPTIONS . ']</div>';
      }
    }
    //TODO: Ueberpruefung, ob Input-Felder leer sind und damit auf das Root-Verzeichnis
    //verweisen!

    $writeable   = '<span style="color:#080;">'
                     . _JGA_DIRECTORY_WRITEABLE .
                   '</span>';
    $unwriteable = '<span style="color:#f00;">'
                     . _JGA_DIRECTORY_UNWRITEABLE .
                   '</span>';

    if (Joom_CheckWriteable($mosConfig_absolute_path, $jg_pathimages)) {
      $write_pathimages = $writeable;
    } else {
      $write_pathimages = $unwriteable;
    }
    if (Joom_CheckWriteable($mosConfig_absolute_path, $jg_pathoriginalimages)) {
      $write_pathoriginalimages = $writeable;
    } else {
      $write_pathoriginalimages = $unwriteable;
    }
    if (Joom_CheckWriteable($mosConfig_absolute_path, $jg_paththumbs)) {
      $write_paththumbs = $writeable;
    } else {
      $write_paththumbs = $unwriteable;
    }
    if (Joom_CheckWriteable($mosConfig_absolute_path, $jg_pathftpupload)) {
      $write_pathftpupload = $writeable;
    } else {
      $write_pathftpupload = $unwriteable;
    }
    if (Joom_CheckWriteable($mosConfig_absolute_path, $jg_pathtemp)) {
      $write_pathtemp = $writeable;
    } else {
      $write_pathtemp = $unwriteable;
    }
    if (Joom_CheckWriteable($mosConfig_absolute_path, $jg_wmpath)) {
      $write_wmpath = $writeable;
    } else {
      $write_wmpath = $unwriteable;
    }
    if (is_file($mosConfig_absolute_path . $jg_wmpath . '/' . $jg_wmfile)) {
      $write_wmfile = '<span style="color:#080;">'
                        . _JGA_FILE_EXIST .
                      '</span>';
    } else {
      $write_wmfile = '<span style="color:#f00;">'
                        . _JGA_ALERT_FILE_NOT_EXIST .
                      '</span>';
    }

    $joom_configfile = $mosConfig_absolute_path . $this->configfile;
    if (@is_writable($joom_configfile)) {
      $configmsg = '<div style="color:#080; text-align:center;">[' . _JGA_CONFIGURATION_WRITEABLE . ']</div>';
    } else {
      $configmsg = '<div style="color:#f00;font-weight:bold; text-align:center;">[' . _JGA_CONFIGURATION_NOT_WRITEABLE . ' ' . _JGA_CHECK_PERMISSIONS . ']</div>';
    }

    //Kategorien fuer den Frontendupload
    $arr_jg_category  = explode(',', $jg_category);

    $clist = Joom_ShowBackendAllowedCat($arr_jg_category, "jg_category[]",
                               $extras=" multiple  size=\"6\"", $levellimit="4");

    //Kategorien unterhalb der Userkategorien angelegt werden duerfen
    $arr_jg_usercategory  = explode(',', $jg_usercategory);

    $clist2 = Joom_ShowBackendAllowedCat($arr_jg_usercategory, "jg_usercategory[]",
                               $extras=" multiple  size=\"6\"", $levellimit="4");                               
                               
    
    // TODO: Ueberpruefung, ob Config-File beschreibbar ist
                               
  ?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      if (pressbutton == 'cancel') {
        submitform(pressbutton);
        return;
      }
      if (form.jg_paththumbs.value == ''){
        alert('<?php echo _JGA_ALERT_THUMBNAIL_PATH_SUPPORT; ?>');
      } else {
        submitform(pressbutton);
      }
    }
    </script>
  <?php
    HTML_Joom_AdminConfig::Joom_ShowConfig_HTML($option, $clist,$clist2, $write_pathimages,
                                                $write_pathoriginalimages,
                                                $write_paththumbs, $write_pathtemp,
                                                $write_wmpath, $write_pathftpupload,
                                                $write_wmfile, $gdmsg,$immsg,
                                                $easycaptchamsg, $exifmsg, $configmsg);
  }


  function Joom_SaveConfig () {
    $this->Joom_LoadConfigPost();
    global $option,

    //Grundlegende Einstellungen
    //Grundlegende Einstellungen->Pfade und Verzeichnisse
    $jg_pathimages, $jg_pathoriginalimages, $jg_paththumbs, $jg_pathftpupload,
    $jg_pathtemp, $jg_wmpath, $jg_wmfile, $jg_dateformat,
    //Grundlegende Einstellungen->Ersetzungen
    $jg_filenamewithjs, $jg_filenamesearch, $jg_filenamereplace,
    //Grundlegende Einstellungen->Bildmanipulation
    $jg_thumbcreation, $jg_fastgd2thumbcreation, $jg_impath,
    $jg_resizetomaxwidth, $jg_maxwidth, $jg_picturequality,
    $jg_useforresizedirection, $jg_thumbwidth, $jg_thumbheight, $jg_thumbquality,
    //Grundlegende Einstellungen->Backend-Upload
    $jg_uploadorder, $jg_useorigfilename, $jg_filenamenumber, $jg_delete_original,
    $jg_wrongvaluecolor, 
    //Grundlegende Einstellungen->Zusaetzliche Funktionen
    $jg_combuild,$jg_realname,$jg_bridge,$jg_cooliris,$jg_coolirislink,
    //Benutzer-Rechte
    //Benutzer-Rechte->Benutzer-Upload ueber "Meine Galerie"
    $jg_userspace,$jg_approve, $jg_usercat, $jg_usercategory, $jg_usercatacc, 
    $jg_maxusercat,$jg_userowncatsupload, $jg_maxuserimage, $jg_maxfilesize,
    $jg_category,$jg_maxuploadfields,$jg_useruploadnumber,$jg_special_gif_upload, 
    $jg_delete_original_user,$jg_newpiccopyright,$jg_newpicnote,
    //Benutzer-Rechte->Bewertungen
    $jg_showrating, $jg_maxvoting, $jg_onlyreguservotes,
    //Benutzer-Rechte->Kommentare
    $jg_showcomment, $jg_anoncomment, $jg_namedanoncomment, $jg_approvecom,
    $jg_secimages, $jg_bbcodesupport, $jg_smiliesupport, $jg_anismilie,
    $jg_smiliescolor,
    //Frontend Einstellungen
    //Frontend Einstellungen->Anordnung der Bilder
    $jg_firstorder, $jg_secondorder, $jg_thirdorder,
    //Frontend Einstellungen->Seitentitel
    $jg_pagetitle_cat, $jg_pagetitle_detail,
    //Frontend Einstellungen->Kopf- und Fussbereich
    $jg_showgalleryhead, $jg_showpathway, $jg_completebreadcrumbs, $jg_search,
    $jg_showallpics, $jg_showallhits, $jg_showbacklink, $jg_suppresscredits,
    //Frontend Einstellungen->Meine Galerie
    $jg_showuserpanel, $jg_showallpicstoadmin, $jg_showminithumbs,
    //Frontend Einstellungen->PopUp-Funktionen
    $jg_openjs_padding, $jg_openjs_background, $jg_dhtml_border,
    $jg_show_title_in_dhtml, $jg_show_description_in_dhtml,
    $jg_lightbox_overlay, $jg_lightbox_speed, $jg_lightbox_slide_all,
    $jg_resize_js_image, $jg_disable_rightclick_original,
    //Galerie-Ansicht
    //Galerie-Ansicht->Generelle Einstellungen
    $jg_showgallerysubhead, $jg_showallcathead, $jg_colcat, $jg_catperpage,
    $jg_showgallerypagenav, $jg_showcatcount, $jg_showcatthumb,$jg_ordercatbyalpha,
    $jg_showrandomcatthumb, $jg_ctalign, $jg_showtotalcathits, $jg_showcatasnew,
    $jg_catdaysnew, $jg_rmsm, $jg_showrmsmcats,
    //Kategorie-Ansicht
    //Kategorie-Ansicht->Generelle Einstellungen
    $jg_showcathead, $jg_usercatorder, $jg_usercatorderlist,
    $jg_showcatdescriptionincat,$jg_showpagenav, $jg_showpiccount, $jg_perpage,
    $jg_catthumbalign, $jg_colnumb, $jg_detailpic_open, 
    $jg_lightboxbigpic, $jg_showtitle, $jg_showpicasnew, $jg_daysnew,$jg_showhits, 
    $jg_showauthor, $jg_showowner, $jg_showcatcom, $jg_showcatrate, 
    $jg_showcatdescription,$jg_showcategorydownload,$jg_showcategoryfavourite,
    //Kategorie-Ansicht->Unterkategorien
    $jg_showsubcathead, $jg_showsubcatcount, $jg_colsubcat, $jg_subperpage, 
    $jg_subcatthumbalign, $jg_showsubthumbs, $jg_showrandomsubthumb, 
    $jg_showtotalsubcathits,$jg_ordersubcatbyalpha,
    //Detail-Ansicht
    //Detail-Ansicht->Generelle Einstellungen
    $jg_showdetailpage, $jg_showdetailnumberofpics, $jg_cursor_navigation,
    $jg_disable_rightclick_detail, $jg_showdetailtitle, $jg_showdetail, 
    $jg_showdetaildescription, $jg_showdetailaccordion,
    $jg_showdetaildatum, $jg_showdetailhits, $jg_showdetailrating,
    $jg_showdetailfilesize, $jg_showdetailauthor, $jg_showoriginalfilesize,
    $jg_showdetaildownload, $jg_downloadfile, $jg_downloadwithwatermark,
    $jg_watermark, $jg_watermarkpos, $jg_bigpic, $jg_bigpic_open,
    $jg_bbcodelink, $jg_showcommentsunreg, $jg_showcommentsarea, $jg_send2friend, 
    //Detail-Ansicht->Motiongallery
    $jg_minis, $jg_motionminis, $jg_motionminiWidth, $jg_motionminiHeight,
    $jg_miniWidth, $jg_miniHeight, $jg_minisprop,
    //Detail-Ansicht->Namensschilder
    $jg_nameshields, $jg_nameshields_unreg, $jg_show_nameshields_unreg,
    $jg_nameshields_height, $jg_nameshields_width,
    //Detail-Ansicht->Slideshow
    $jg_slideshow, $jg_slideshow_timer, $jg_slideshow_usefilter,
    $jg_slideshow_filterbychance, $jg_slideshow_filtertimer, $jg_showsliderepeater,
    //Detail-Ansicht->Exif-Daten
    $jg_showexifdata, $jg_subifdtags, $jg_ifdotags, $jg_gpstags,
    //Detail-Ansicht->IPTC-Daten
    $jg_showiptcdata, $jg_iptctags,
    //Toplisten->Generelle Einstellungen
    $jg_showtoplist, $jg_toplist, $jg_topthumbalign, $jg_toptextalign, 
    $jg_whereshowtoplist, $jg_showrate, $jg_showlatest, $jg_showcom, 
    $jg_showthiscomment, $jg_showmostviewed, $jg_toplistcols,
    //Favoriten->Generelle Einstellungen
    $jg_favourites,$jg_showdetailfavourite,$jg_favouritesshownotauth,
    $jg_maxfavourites,$jg_zipdownload,$jg_usefavouritesforpubliczip,$jg_usefavouritesforzip,

    $joom_configfile;

    if (!Joom_SaveCSS()) {
      $mosmsg = _JGA_CSS_NOT_WRITEABLE;
      mosRedirect('index2.php?option='. $option .'&act=config',$mosmsg);
      break;
    }

    @chmod($joom_configfile, 0766);
    $permission = is_writable($joom_configfile);
    if (!$permission) {
      $mosmsg = _JGA_CONFIGURATION_NOT_WRITEABLE;
      mosRedirect('index2.php?option='. $option .'&act=config',$mosmsg);
      break;
    }
    if (is_array($jg_category)) {
      $jg_category2         = implode (',', $jg_category);
    } else {
      $jg_category2         = '';
    }
    if (is_array($jg_usercategory)) {
      $jg_category3         = implode (',', $jg_usercategory);
    } else {
      $jg_category3         = '';
    }
    if (is_array($jg_usercatorderlist)) {
      $jg_usercatorderlist2 = implode (',', $jg_usercatorderlist);
    } else {
      $jg_usercatorderlist2 = '';
    }
    if (is_array($jg_ifdotags)) {
      $jg_ifdotags2         = implode (',', $jg_ifdotags);
    } else {
      $jg_ifdotags2         = '';
    }
    if (is_array($jg_subifdtags)) {
      $jg_subifdtags2       = implode (',', $jg_subifdtags);
    } else {
      $jg_subifdtags2 = '';
    }
    if (is_array($jg_gpstags)) {
      $jg_gpstags2          = implode (',', $jg_gpstags);
    } else {
      $jg_gpstags2 = '';
    }
    if (is_array($jg_iptctags)) {
      $jg_iptctags2          = implode (',', $jg_iptctags);
    } else {
      $jg_iptctags2 = '';
    }

    $config = "<?php\n";
    //Grundlegende Einstellungen
    //Grundlegende Einstellungen->Pfade und Verzeichnisse
    if (isset($jg_pathimages) && ($jg_pathimages != '')) {
      $config .= "\$jg_pathimages = \"$jg_pathimages\";\n";
    } else {
      $config .= "\$jg_pathimages = \"/components/com_joomgallery/img_pictures\";\n";
    }
    if (isset($jg_pathoriginalimages) && ($jg_pathoriginalimages != '')) {
      $config .= "\$jg_pathoriginalimages = \"$jg_pathoriginalimages\";\n";
    } else {
      $config .= "\$jg_pathoriginalimages = \"/components/com_joomgallery/img_originals\";\n";
    }
    if (isset($jg_paththumbs) && ($jg_paththumbs != '')) {
      $config .= "\$jg_paththumbs = \"$jg_paththumbs\";\n";
    } else {
      $config .= "\$jg_paththumbs = \"/components/com_joomgallery/img_thumbnails\";\n";
    }
    if (isset($jg_pathftpupload) && ($jg_pathftpupload != '')) {
      $config .= "\$jg_pathftpupload = \"$jg_pathftpupload\";\n";
    } else {
      $config .= "\$jg_pathftpupload = \"/components/com_joomgallery/ftp_upload\";\n";
    }
    if (isset($jg_pathtemp) && ($jg_pathtemp != '')) {
      $config .= "\$jg_pathtemp = \"$jg_pathtemp\";\n";
    } else {
      $config .= "\$jg_pathtemp = \"administrator/components/com_joomgallery/temp\";\n";
    }
    if (isset($jg_wmpath) && ($jg_wmpath != '')) {
      $config .= "\$jg_wmpath = \"$jg_wmpath\";\n";
    } else {
      $config .= "\$jg_wmpath = \"/components/com_joomgallery/images\";\n";
    }
    if (isset($jg_wmfile) && ($jg_wmfile != '')) {
      $config .= "\$jg_wmfile = \"$jg_wmfile\";\n";
    } else {
      $config .= "\$jg_wmfile = \"watermark.png\";\n";
    }
    if (isset($jg_dateformat)) {
      $config .= "\$jg_dateformat = \"$jg_dateformat\";\n";
    } else {
      $config .= "\$jg_dateformat = \"%d-%m-%Y %H:%M:%S\";\n";
    }
  //Grundlegende Einstellungen->Ersetzungen
    if (isset($jg_filenamewithjs)) {
      $config .= "\$jg_filenamewithjs = \"$jg_filenamewithjs\";\n";
    } else {
      $config .= "\$jg_filenamewithjs = \"1\";\n";
    }
    if (isset($jg_filenamesearch)) {
      $config .= "\$jg_filenamesearch = \"$jg_filenamesearch\";\n";
    } else {
      $config .= "\$jg_filenamesearch = \"\";\n";
    }
    if (isset($jg_filenamereplace)) {
      $config .= "\$jg_filenamereplace = \"$jg_filenamereplace\";\n";
    } else {
      $config .= "\$jg_filenamereplace = \"\";\n";
    }
  //Grundlegende Einstellungen->Bildmanipulation
    if (isset($jg_thumbcreation)) {
      $config .= "\$jg_thumbcreation = \"$jg_thumbcreation\";\n";
    } else {
      $config .= "\$jg_thumbcreation = \"gd2\";\n";
    }
    if (isset($jg_fastgd2thumbcreation)) {
      $config .= "\$jg_fastgd2thumbcreation = \"$jg_fastgd2thumbcreation\";\n";
    } else {
      $config .= "\$jg_fastgd2thumbcreation = \"1\";\n";
    }
    if (isset($jg_impath)) {
      $config .= "\$jg_impath = \"$jg_impath\";\n";
    } else {
      $config .= "\$jg_impath = \"\";\n";
    }
    if (isset($jg_resizetomaxwidth)) {
      $config .= "\$jg_resizetomaxwidth = \"$jg_resizetomaxwidth\";\n";
    } else {
      $config .= "\$jg_resizetomaxwidth = \"1\";\n";
    }
    if (isset($jg_maxwidth) && ($jg_maxwidth != 0)) {
      $config .= "\$jg_maxwidth = \"$jg_maxwidth\";\n";
    } else {
      $config .= "\$jg_maxwidth = \"400\";\n";
    }
    if (isset($jg_picturequality) && ($jg_picturequality != 0)) {
      $config .= "\$jg_picturequality = \"$jg_picturequality\";\n";
    } else {
      $config .= "\$jg_picturequality = \"100\";\n";
    }
    if (isset($jg_useforresizedirection)) {
      $config .= "\$jg_useforresizedirection = \"$jg_useforresizedirection\";\n";
    } else {
      $config .= "\$jg_useforresizedirection = \"0\";\n";
    }
    if (isset($jg_thumbwidth) && ($jg_thumbwidth != 0)) {
      $config .= "\$jg_thumbwidth = \"$jg_thumbwidth\";\n";
    } else {
      $config .= "\$jg_thumbwidth = \"133\";\n";
    }
    if (isset($jg_thumbheight) && ($jg_thumbheight != 0)) {
      $config .= "\$jg_thumbheight = \"$jg_thumbheight\";\n";
    } else {
      $config .= "\$jg_thumbheight = \"100\";\n";
    }
    if (isset($jg_thumbquality) && ($jg_thumbquality != 0)) {
      $config .= "\$jg_thumbquality = \"$jg_thumbquality\";\n";
    } else {
      $config .= "\$jg_thumbquality = \"75\";\n";
    }
    //Grundlegende Einstellungen->Backend-Upload
    if (isset($jg_uploadorder)) {
      $config .= "\$jg_uploadorder = \"$jg_uploadorder\";\n";
    } else {
      $config .= "\$jg_uploadorder = \"0\";\n";
    }
    if (isset($jg_useorigfilename)) {
      $config .= "\$jg_useorigfilename = \"$jg_useorigfilename\";\n";
    } else {
      $config .= "\$jg_useorigfilename = \"0\";\n";
    }
    if (isset($jg_filenamenumber)) {
      $config .= "\$jg_filenamenumber = \"$jg_filenamenumber\";\n";
    } else {
      $config .= "\$jg_filenamenumber = \"0\";\n";
    }
    if (isset($jg_delete_original)) {
      $config .= "\$jg_delete_original = \"$jg_delete_original\";\n";
    } else {
      $config .= "\$jg_delete_original = \"0\";\n";
    }
    if (isset($jg_wrongvaluecolor) && ($jg_wrongvaluecolor != '')) {
      $config .= "\$jg_wrongvaluecolor = \"$jg_wrongvaluecolor\";\n";
    } else {
      $config .= "\$jg_wrongvaluecolor = \"red\";\n";
    }
    //Grundlegende Einstellungen->Zusaetzliche Funktionen
    if (isset($jg_combuild)) {
      $config .= "\$jg_combuild = \"$jg_combuild\";\n";
    } else {
      $config .= "\$jg_combuild = \"0\";\n";
    }
    if (isset($jg_realname)) {
      $config .= "\$jg_realname = \"$jg_realname\";\n";
    } else {
      $config .= "\$jg_realname = \"0\";\n";
    }
    if (isset($jg_bridge)) {
      $config .= "\$jg_bridge = \"$jg_bridge\";\n";
    } else {
      $config .= "\$jg_bridge = \"0\";\n";
    }
    if (isset($jg_cooliris)) {
      $config .= "\$jg_cooliris = \"$jg_cooliris\";\n";
    } else {
      $config .= "\$jg_cooliris = \"0\";\n";
    }
    if (isset($jg_coolirislink)) {
      $config .= "\$jg_coolirislink = \"$jg_coolirislink\";\n";
    } else {
      $config .= "\$jg_coolirislink = \"0\";\n";
    }
    //Benutzer-Rechte
    //Benutzer-Rechte->Benutzer-Upload ueber "Meine Galerie"
    if (isset($jg_userspace)) {
      $config .= "\$jg_userspace = \"$jg_userspace\";\n";
    } else {
      $config .= "\$jg_userspace = \"0\";\n";
    }
    if (isset($jg_approve)) {
      $config .= "\$jg_approve = \"$jg_approve\";\n";
    } else {
      $config .= "\$jg_approve = \"1\";\n";
    }
    if (isset($jg_usercat)) {
      $config .= "\$jg_usercat = \"$jg_usercat\";\n";
    } else {
      $config .= "\$jg_usercat = \"0\";\n";
    } 
    if (isset($jg_maxusercat) && ($jg_maxusercat != 0)) {
      $config .= "\$jg_maxusercat = \"$jg_maxusercat\";\n";
    } else {
      $config .= "\$jg_maxusercat = \"10\";\n";
    }
    if (isset($jg_userowncatsupload)) {
      $config .= "\$jg_userowncatsupload = \"$jg_userowncatsupload\";\n";
    } else {
      $config .= "\$jg_userowncatsupload = \"0\";\n";
    }    
    if (isset($jg_maxuserimage) && ($jg_maxuserimage != 0)) {
      $config .= "\$jg_maxuserimage = \"$jg_maxuserimage\";\n";
    } else {
      $config .= "\$jg_maxuserimage = \"400\";\n";
    }
    if (isset($jg_maxfilesize) && ($jg_maxfilesize != 0)) {
      $config .= "\$jg_maxfilesize = \"$jg_maxfilesize\";\n";
    } else {
      $config .= "\$jg_maxfilesize = \"2000000\";\n";
    }
    if (isset($jg_category)) {
      if (is_array($jg_category)){
        //changed
        $config .= "\$jg_category = \"$jg_category2\";\n";        
      } else {
        //not changed
        $config .= "\$jg_category = \"$jg_category\";\n";        
      }
    } else {
      $config .= "\$jg_category = \"\";\n";
    }
    if (isset($jg_usercategory)) {
      if (is_array($jg_usercategory)){
        //changed
        $config .= "\$jg_usercategory = \"$jg_category3\";\n";
      } else {
        //not changed
        $config .= "\$jg_usercategory = \"$jg_usercategory\";\n";        
      }
    } else {
      $config .= "\$jg_usercategory = \"\";\n";
    }
    if (isset($jg_usercatacc)) {
      $config .= "\$jg_usercatacc = \"$jg_usercatacc\";\n";
    } else {
      $config .= "\$jg_usercatacc = \"0\";\n";
    }       
    if (isset($jg_maxuploadfields) && ($jg_maxuploadfields != 0)) {
      $config .= "\$jg_maxuploadfields = \"$jg_maxuploadfields\";\n";
    } else {
      $config .= "\$jg_maxuploadfields = \"10\";\n";
    }
    if (isset($jg_useruploadnumber)) {
      $config .= "\$jg_useruploadnumber = \"$jg_useruploadnumber\";\n";
    } else {
      $config .= "\$jg_useruploadnumber = \"0\";\n";
    }
    if (isset($jg_special_gif_upload)) {
      $config .= "\$jg_special_gif_upload = \"$jg_special_gif_upload\";\n";
    } else {
      $config .= "\$jg_special_gif_upload = \"0\";\n";
    }
    if (isset($jg_delete_original_user)) {
      $config .= "\$jg_delete_original_user = \"$jg_delete_original_user\";\n";
    } else {
      $config .= "\$jg_delete_original_user = \"0\";\n";
    }
    if (isset($jg_newpiccopyright)) {
      $config .= "\$jg_newpiccopyright = \"$jg_newpiccopyright\";\n";
    } else {
      $config .= "\$jg_newpiccopyright = \"0\";\n";
    }
    if (isset($jg_newpicnote)) {
      $config .= "\$jg_newpicnote = \"$jg_newpicnote\";\n";
    } else {
      $config .= "\$jg_newpicnote = \"0\";\n";
    }
    //Benutzer-Rechte->Bewertungen
    if (isset($jg_showrating)) {
      $config .= "\$jg_showrating = \"$jg_showrating\";\n";
    } else {
      $config .= "\$jg_showrating = \"0\";\n";
    }
    if (isset($jg_maxvoting) && ($jg_maxvoting != 0)) {
      $config .= "\$jg_maxvoting = \"$jg_maxvoting\";\n";
    } else {
      $config .= "\$jg_maxvoting = \"5\";\n";
    }
    if (isset($jg_onlyreguservotes)) {
      $config .= "\$jg_onlyreguservotes = \"$jg_onlyreguservotes\";\n";
    } else {
      $config .= "\$jg_onlyreguservotes = \"1\";\n";
    }
    //Benutzer-Rechte->Kommentare
    if (isset($jg_showcomment)) {
      $config .= "\$jg_showcomment = \"$jg_showcomment\";\n";
    } else {
      $config .= "\$jg_showcomment = \"0\";\n";
    }
    if (isset($jg_anoncomment)) {
      $config .= "\$jg_anoncomment = \"$jg_anoncomment\";\n";
    } else {
      $config .= "\$jg_anoncomment = \"0\";\n";
    }
    if (isset($jg_namedanoncomment)) {
      $config .= "\$jg_namedanoncomment = \"$jg_namedanoncomment\";\n";
    } else {
      $config .= "\$jg_namedanoncomment = \"0\";\n";
    }
    if (isset($jg_approvecom)) {
      $config .= "\$jg_approvecom = \"$jg_approvecom\";\n";
    } else {
      $config .= "\$jg_approvecom = \"2\";\n";
    }
    if (isset($jg_secimages)) {
      $config .= "\$jg_secimages = \"$jg_secimages\";\n";
    } else {
      $config .= "\$jg_secimages = \"2\";\n";
    }
    if (isset($jg_bbcodesupport)) {
      $config .= "\$jg_bbcodesupport = \"$jg_bbcodesupport\";\n";
    } else {
      $config .= "\$jg_bbcodesupport = \"0\";\n";
    }
    if (isset($jg_smiliesupport)) {
      $config .= "\$jg_smiliesupport = \"$jg_smiliesupport\";\n";
    } else {
      $config .= "\$jg_smiliesupport = \"0\";\n";
    }
    if (isset($jg_anismilie)) {
      $config .= "\$jg_anismilie = \"$jg_anismilie\";\n";
    } else {
      $config .= "\$jg_anismilie = \"0\";\n";
    }
    if (isset($jg_smiliescolor) && ($jg_smiliescolor != '')) {
      $config .= "\$jg_smiliescolor = \"$jg_smiliescolor\";\n";
    } else {
      $config .= "\$jg_smiliescolor = \"grey\";\n";
    }
    //Frontend Einstellungen
    //Frontend Einstellungen->Anordnung der Bilder
    if (isset($jg_firstorder)) {
      $config .= "\$jg_firstorder = \"$jg_firstorder\";\n";
    } else {
      $config .= "\$jg_firstorder = \"ordering ASC\";\n";
    }
    if (isset($jg_secondorder)) {
      $config .= "\$jg_secondorder = \"$jg_secondorder\";\n";
    } else {
      $config .= "\$jg_secondorder = \"imgdate DESC\";\n";
    }
    if (isset($jg_thirdorder)) {
      $config .= "\$jg_thirdorder = \"$jg_thirdorder\";\n";
    } else {
      $config .= "\$jg_thirdorder = \"imgtitle DESC\";\n";
    }
    //Frontend Einstellungen->Seitentitel
    if (isset($jg_pagetitle_cat)) {
      $config .= "\$jg_pagetitle_cat = \"$jg_pagetitle_cat\";\n";
    } else {
      $config .= "\$jg_pagetitle_cat = \"[! _JGS_CATEGORY!]: #cat\";\n";
    }
    if (isset($jg_pagetitle_detail)) {
      $config .= "\$jg_pagetitle_detail = \"$jg_pagetitle_detail\";\n";
    } else {
      $config .= "\$jg_pagetitle_detail = \"[! _JGS_CATEGORY!]: #cat - [! _JGS_PICTURE!]:  #img\";\n";
    }
    //Frontend Einstellungen->Kopf- und Fussbereich
    if (isset($jg_showgalleryhead)) {
      $config .= "\$jg_showgalleryhead = \"$jg_showgalleryhead\";\n";
    } else {
      $config .= "\$jg_showgalleryhead = \"1\";\n";
    }
    if (isset($jg_showpathway)) {
      $config .= "\$jg_showpathway = \"$jg_showpathway\";\n";
    } else {
      $config .= "\$jg_showpathway = \"1\";\n";
    }
    if (isset($jg_completebreadcrumbs)) {
      $config .= "\$jg_completebreadcrumbs = \"$jg_completebreadcrumbs\";\n";
    } else {
      $config .= "\$jg_completebreadcrumbs = \"0\";\n";
    }
    if (isset($jg_search)) {
      $config .= "\$jg_search = \"$jg_search\";\n";
    } else {
      $config .= "\$jg_search = \"1\";\n";
    }
    if (isset($jg_showallpics)) {
      $config .= "\$jg_showallpics = \"$jg_showallpics\";\n";
    } else {
      $config .= "\$jg_showallpics = \"0\";\n";
    }
    if (isset($jg_showallhits)) {
      $config .= "\$jg_showallhits = \"$jg_showallhits\";\n";
    } else {
      $config .= "\$jg_showallhits = \"0\";\n";
    }
    if (isset($jg_showbacklink)) {
      $config .= "\$jg_showbacklink = \"$jg_showbacklink\";\n";
    } else {
      $config .= "\$jg_showbacklink = \"0\";\n";
    }
    if (isset($jg_suppresscredits)) {
      $config .= "\$jg_suppresscredits = \"$jg_suppresscredits\";\n";
    } else {
      $config .= "\$jg_suppresscredits = \"1\";\n";
    }
    //Frontend Einstellungen->Meine Galerie
    if (isset($jg_showuserpanel)) {
      $config .= "\$jg_showuserpanel = \"$jg_showuserpanel\";\n";
    } else {
      $config .= "\$jg_showuserpanel = \"1\";\n";
    }
    if (isset($jg_showallpicstoadmin)) {
      $config .= "\$jg_showallpicstoadmin = \"$jg_showallpicstoadmin\";\n";
    } else {
      $config .= "\$jg_showallpicstoadmin = \"0\";\n";
    }
    if (isset($jg_showminithumbs)) {
      $config .= "\$jg_showminithumbs = \"$jg_showminithumbs\";\n";
    } else {
      $config .= "\$jg_showminithumbs = \"1\";\n";
    }
    //Frontend Einstellungen->PopUp-Funktionen
    if (isset($jg_openjs_padding) && ($jg_openjs_padding != 0)) {
      $config .= "\$jg_openjs_padding = \"$jg_openjs_padding\";\n";
    } else {
      $config .= "\$jg_openjs_padding = \"10\";\n";
    }
    if (isset($jg_openjs_background) && ($jg_openjs_background != '')) {
      $config .= "\$jg_openjs_background = \"$jg_openjs_background\";\n";
    } else {
      $config .= "\$jg_openjs_background = \"#fff\";\n";
    }
    if (isset($jg_dhtml_border)) {
      $config .= "\$jg_dhtml_border = \"$jg_dhtml_border\";\n";
    } else {
      $config .= "\$jg_dhtml_border = \"#808080\";\n";
    }
    if (isset($jg_show_title_in_dhtml)) {
      $config .= "\$jg_show_title_in_dhtml = \"$jg_show_title_in_dhtml\";\n";
    } else {
      $config .= "\$jg_show_title_in_dhtml = \"0\";\n";
    }
    if (isset($jg_show_description_in_dhtml)) {
      $config .= "\$jg_show_description_in_dhtml = \"$jg_show_description_in_dhtml\";\n";
    } else {
      $config .= "\$jg_show_description_in_dhtml = \"0\";\n";
    }
    if (isset($jg_lightbox_overlay) && ($jg_lightbox_overlay != '')) {
      $config .= "\$jg_lightbox_overlay = \"$jg_lightbox_overlay\";\n";
    } else {
      $config .= "\$jg_lightbox_overlay = \"#000\";\n";
    }
    if (isset($jg_lightbox_speed) && ($jg_lightbox_speed != 0)) {
      $config .= "\$jg_lightbox_speed = \"$jg_lightbox_speed\";\n";
    } else {
      $config .= "\$jg_lightbox_speed = \"5\";\n";
    }
    if (isset($jg_lightbox_slide_all)) {
      $config .= "\$jg_lightbox_slide_all = \"$jg_lightbox_slide_all\";\n";
    } else {
      $config .= "\$jg_lightbox_slide_all = \"0\";\n";
    }
    if (isset($jg_resize_js_image)) {
      $config .= "\$jg_resize_js_image = \"$jg_resize_js_image\";\n";
    } else {
      $config .= "\$jg_resize_js_image = \"1\";\n";
    }
    if (isset($jg_disable_rightclick_original)) {
      $config .= "\$jg_disable_rightclick_original = \"$jg_disable_rightclick_original\";\n";
    } else {
      $config .= "\$jg_disable_rightclick_original = \"1\";\n";
    }
    //Galerie-Ansicht
    //Galerie-Ansicht->Generelle Einstellungen
    if (isset($jg_showgallerysubhead)) {
      $config .= "\$jg_showgallerysubhead = \"$jg_showgallerysubhead\";\n";
    } else {
      $config .= "\$jg_showgallerysubhead = \"1\";\n";
    }
    if (isset($jg_showallcathead)) {
      $config .= "\$jg_showallcathead = \"$jg_showallcathead\";\n";
    } else {
      $config .= "\$jg_showallcathead = \"1\";\n";
    }
    if (isset($jg_colcat)) {
      $config .= "\$jg_colcat = \"$jg_colcat\";\n";
    } else {
      $config .= "\$jg_colcat = \"1\";\n";
    }
    if (isset($jg_catperpage) && ($jg_catperpage != 0)) {
      $config .= "\$jg_catperpage = \"$jg_catperpage\";\n";
    } else {
      $config .= "\$jg_catperpage = \"10\";\n";
    }
    if (isset($jg_ordercatbyalpha)) {
      $config .= "\$jg_ordercatbyalpha = \"$jg_ordercatbyalpha\";\n";
    } else {
      $config .= "\$jg_ordercatbyalpha = \"0\";\n";
    }
    if (isset($jg_showgallerypagenav)) {
      $config .= "\$jg_showgallerypagenav = \"$jg_showgallerypagenav\";\n";
    } else {
      $config .= "\$jg_showgallerypagenav = \"1\";\n";
    }
    if (isset($jg_showcatcount)) {
      $config .= "\$jg_showcatcount = \"$jg_showcatcount\";\n";
    } else {
      $config .= "\$jg_showcatcount = \"1\";\n";
    }
    if (isset($jg_showcatthumb)) {
      $config .= "\$jg_showcatthumb = \"$jg_showcatthumb\";\n";
    } else {
      $config .= "\$jg_showcatthumb = \"1\";\n";
    }
    if (isset($jg_showrandomcatthumb)) {
      $config .= "\$jg_showrandomcatthumb = \"$jg_showrandomcatthumb\";\n";
    } else {
      $config .= "\$jg_showrandomcatthumb = \"2\";\n";
    }
    if (isset($jg_ctalign)) {
      $config .= "\$jg_ctalign = \"$jg_ctalign\";\n";
    } else {
      $config .= "\$jg_ctalign = \"1\";\n";
    }
    if (isset($jg_showtotalcathits)) {
      $config .= "\$jg_showtotalcathits = \"$jg_showtotalcathits\";\n";
    } else {
      $config .= "\$jg_showtotalcathits = \"1\";\n";
    }
    if (isset($jg_showcatasnew)) {
      $config .= "\$jg_showcatasnew = \"$jg_showcatasnew\";\n";
    } else {
      $config .= "\$jg_showcatasnew = \"0\";\n";
    }
    if (isset($jg_catdaysnew) && ($jg_catdaysnew != 0)) {
      $config .= "\$jg_catdaysnew = \"$jg_catdaysnew\";\n";
    } else {
      $config .= "\$jg_catdaysnew = \"7\";\n";
    }
    if (isset($jg_rmsm)) {
      $config .= "\$jg_rmsm = \"$jg_rmsm\";\n";
    } else {
      $config .= "\$jg_rmsm = \"1\";\n";
    }
    if (isset($jg_showrmsmcats)) {
      $config .= "\$jg_showrmsmcats = \"$jg_showrmsmcats\";\n";
    } else {
      $config .= "\$jg_showrmsmcats = \"0\";\n";
    }
    //Kategorie-Ansicht
    //Kategorie-Ansicht->Generelle Einstellungen
    if (isset($jg_showcathead)) {
      $config .= "\$jg_showcathead = \"$jg_showcathead\";\n";
    } else {
      $config .= "\$jg_showcathead = \"1\";\n";
    }
    if (isset($jg_usercatorder)) {
      $config .= "\$jg_usercatorder = \"$jg_usercatorder\";\n";
    } else {
      $config .= "\$jg_usercatorder = \"0\";\n";
    }
    if (isset($jg_usercatorderlist)) {
      if (is_array($jg_usercatorderlist)){
        //changed
        $config .= "\$jg_usercatorderlist = \"$jg_usercatorderlist2\";\n";
      } else {
        //not changed
        $config .= "\$jg_usercatorderlist = \"$jg_usercatorderlist\";\n";        
      }
    } else {
      $config .= "\$jg_usercatorderlist = \"\";\n";
    }
    if (isset($jg_showcatdescriptionincat)) {
      $config .= "\$jg_showcatdescriptionincat = \"$jg_showcatdescriptionincat\";\n";
    } else {
      $config .= "\$jg_showcatdescriptionincat = \"0\";\n";
    }
    if (isset($jg_showpagenav)) {
      $config .= "\$jg_showpagenav = \"$jg_showpagenav\";\n";
    } else {
      $config .= "\$jg_showpagenav = \"1\";\n";
    }
    if (isset($jg_showpiccount)) {
      $config .= "\$jg_showpiccount = \"$jg_showpiccount\";\n";
    } else {
      $config .= "\$jg_showpiccount = \"1\";\n";
    }
    if (isset($jg_perpage) && ($jg_perpage != 0)) {
      $config .= "\$jg_perpage = \"$jg_perpage\";\n";
    } else {
      $config .= "\$jg_perpage = \"9\";\n";
    }
    if (isset($jg_catthumbalign)) {
      $config .= "\$jg_catthumbalign = \"$jg_catthumbalign\";\n";
    } else {
      $config .= "\$jg_catthumbalign = \"1\";\n";
    }
    if (isset($jg_colnumb) && ($jg_colnumb != 0)) {
      $config .= "\$jg_colnumb = \"$jg_colnumb\";\n";
    } else {
      $config .= "\$jg_colnumb = \"3\";\n";
    }
    if (isset($jg_detailpic_open)) {
      $config .= "\$jg_detailpic_open = \"$jg_detailpic_open\";\n";
    } else {
      $config .= "\$jg_detailpic_open = \"0\";\n";
    }
    if (isset($jg_lightboxbigpic)) {
      $config .= "\$jg_lightboxbigpic = \"$jg_lightboxbigpic\";\n";
    } else {
      $config .= "\$jg_lightboxbigpic = \"0\";\n";
    }
    if (isset($jg_showtitle)) {
      $config .= "\$jg_showtitle = \"$jg_showtitle\";\n";
    } else {
      $config .= "\$jg_showtitle = \"1\";\n";
    }
    if (isset($jg_showpicasnew)) {
      $config .= "\$jg_showpicasnew = \"$jg_showpicasnew\";\n";
    } else {
      $config .= "\$jg_showpicasnew = \"0\";\n";
    }
    if (isset($jg_daysnew) && ($jg_daysnew != 0)) {
      $config .= "\$jg_daysnew = \"$jg_daysnew\";\n";
    } else {
      $config .= "\$jg_daysnew = \"7\";\n";
    }
    if (isset($jg_showhits)) {
      $config .= "\$jg_showhits = \"$jg_showhits\";\n";
    } else {
      $config .= "\$jg_showhits = \"1\";\n";
    }
    if (isset($jg_showauthor)) {
      $config .= "\$jg_showauthor = \"$jg_showauthor\";\n";
    } else {
      $config .= "\$jg_showauthor = \"1\";\n";
    }
    if (isset($jg_showowner)) {
      $config .= "\$jg_showowner = \"$jg_showowner\";\n";
    } else {
      $config .= "\$jg_showowner = \"1\";\n";
    }
    if (isset($jg_showcatcom)) {
      $config .= "\$jg_showcatcom = \"$jg_showcatcom\";\n";
    } else {
      $config .= "\$jg_showcatcom = \"1\";\n";
    }
    if (isset($jg_showcatrate)) {
      $config .= "\$jg_showcatrate = \"$jg_showcatrate\";\n";
    } else {
      $config .= "\$jg_showcatrate = \"1\";\n";
    }
    if (isset($jg_showcatdescription)) {
      $config .= "\$jg_showcatdescription = \"$jg_showcatdescription\";\n";
    } else {
      $config .= "\$jg_showcatdescription = \"1\";\n";
    }
    if (isset($jg_showcategorydownload)) {
      $config .= "\$jg_showcategorydownload = \"$jg_showcategorydownload\";\n";
    } else {
      $config .= "\$jg_showcategorydownload = \"0\";\n";
    }
    if (isset($jg_showcategoryfavourite)) {
      $config .= "\$jg_showcategoryfavourite = \"$jg_showcategoryfavourite\";\n";
    } else {
      $config .= "\$jg_showcategoryfavourite = \"0\";\n";
    }
    //Kategorie-Ansicht->Unterkategorien
    if (isset($jg_showsubcathead)) {
      $config .= "\$jg_showsubcathead = \"$jg_showsubcathead\";\n";
    } else {
      $config .= "\$jg_showsubcathead = \"1\";\n";
    }
    if (isset($jg_showsubcatcount)) {
      $config .= "\$jg_showsubcatcount = \"$jg_showsubcatcount\";\n";
    } else {
      $config .= "\$jg_showsubcatcount = \"1\";\n";
    }
    if (isset($jg_colsubcat)) {
      $config .= "\$jg_colsubcat = \"$jg_colsubcat\";\n";
    } else {
      $config .= "\$jg_colsubcat = \"3\";\n";
    }
    if (isset($jg_subperpage) && $jg_subperpage != 0) {
      $config .= "\$jg_subperpage = \"$jg_subperpage\";\n";
    } else {
      $config .= "\$jg_subperpage = \"2\";\n";
    }
    if (isset($jg_subcatthumbalign)) {
      $config .= "\$jg_subcatthumbalign = \"$jg_subcatthumbalign\";\n";
    } else {
      $config .= "\$jg_subcatthumbalign = \"1\";\n";
    }
    if (isset($jg_showsubthumbs)) {
      $config .= "\$jg_showsubthumbs = \"$jg_showsubthumbs\";\n";
    } else {
      $config .= "\$jg_showsubthumbs = \"2\";\n";
    }
    if (isset($jg_showrandomsubthumb)) {
      $config .= "\$jg_showrandomsubthumb = \"$jg_showrandomsubthumb\";\n";
    } else {
      $config .= "\$jg_showrandomsubthumb = \"3\";\n";
    }
    if (isset($jg_ordersubcatbyalpha)) {
      $config .= "\$jg_ordersubcatbyalpha = \"$jg_ordersubcatbyalpha\";\n";
    } else {
      $config .= "\$jg_ordersubcatbyalpha = \"0\";\n";
    }
    if (isset($jg_showtotalsubcathits)) {
      $config .= "\$jg_showtotalsubcathits = \"$jg_showtotalsubcathits\";\n";
    } else {
      $config .= "\$jg_showtotalsubcathits = \"1\";\n";
    }
  //Detail-Ansicht
  //Detail-Ansicht->Generelle Einstellungen
    if (isset($jg_showdetailpage)) {
      $config .= "\$jg_showdetailpage = \"$jg_showdetailpage\";\n";
    } else {
      $config .= "\$jg_showdetailpage = \"1\";\n";
    }
    if (isset($jg_showdetailnumberofpics)) {
      $config .= "\$jg_showdetailnumberofpics = \"$jg_showdetailnumberofpics\";\n";
    } else {
      $config .= "\$jg_showdetailnumberofpics = \"1\";\n";
    }
    if (isset($jg_cursor_navigation)) {
      $config .= "\$jg_cursor_navigation = \"$jg_cursor_navigation\";\n";
    } else {
      $config .= "\$jg_cursor_navigation = \"1\";\n";
    }
    if (isset($jg_disable_rightclick_detail)) {
      $config .= "\$jg_disable_rightclick_detail = \"$jg_disable_rightclick_detail\";\n";
    } else {
      $config .= "\$jg_disable_rightclick_detail = \"1\";\n";
    }
    if (isset($jg_showdetailtitle)) {
      $config .= "\$jg_showdetailtitle = \"$jg_showdetailtitle\";\n";
    } else {
      $config .= "\$jg_showdetailtitle = \"1\";\n";
    }
    if (isset($jg_showdetail)) {
      $config .= "\$jg_showdetail = \"$jg_showdetail\";\n";
    } else {
      $config .= "\$jg_showdetail = \"1\";\n";
    }
    if (isset($jg_showdetailaccordion)) {
      $config .= "\$jg_showdetailaccordion = \"$jg_showdetailaccordion\";\n";
    } else {
      $config .= "\$jg_showdetailaccordion = \"0\";\n";
    }
    if (isset($jg_showdetaildescription)) {
      $config .= "\$jg_showdetaildescription = \"$jg_showdetaildescription\";\n";
    } else {
      $config .= "\$jg_showdetaildescription = \"1\";\n";
    }
    if (isset($jg_showdetaildatum)) {
      $config .= "\$jg_showdetaildatum = \"$jg_showdetaildatum\";\n";
    } else {
      $config .= "$jg_showdetaildatum = \"1\";\n";
    }
    if (isset($jg_showdetailhits)) {
      $config .= "\$jg_showdetailhits = \"$jg_showdetailhits\";\n";
    } else {
      $config .= "\$jg_showdetailhits = \"1\";\n";
    }
    if (isset($jg_showdetailrating)) {
      $config .= "\$jg_showdetailrating = \"$jg_showdetailrating\";\n";
    } else {
      $config .= "$jg_showdetailrating = \"1\";\n";
    }
    if (isset($jg_showdetailfilesize)) {
      $config .= "\$jg_showdetailfilesize = \"$jg_showdetailfilesize\";\n";
    } else {
      $config .= "\$jg_showdetailfilesize = \"1\";\n";
    }
    if (isset($jg_showdetailauthor)) {
      $config .= "\$jg_showdetailauthor = \"$jg_showdetailauthor\";\n";
    } else {
      $config .= "\$jg_showdetailauthor = \"1\";\n";
    }
    if (isset($jg_showoriginalfilesize)) {
      $config .= "\$jg_showoriginalfilesize = \"$jg_showoriginalfilesize\";\n";
    } else {
      $config .= "\$jg_showoriginalfilesize = \"1\";\n";
    }
    if (isset($jg_showdetaildownload)) {
      $config .= "\$jg_showdetaildownload = \"$jg_showdetaildownload\";\n";
    } else {
      $config .= "\$jg_showdetaildownload = \"1\";\n";
    }
    if (isset($jg_downloadfile)) {
      $config .= "\$jg_downloadfile = \"$jg_downloadfile\";\n";
    } else {
      $config .= "\$jg_downloadfile = \"1\";\n";
    }
    if (isset($jg_downloadwithwatermark)) {
      $config .= "\$jg_downloadwithwatermark = \"$jg_downloadwithwatermark\";\n";
    } else {
      $config .= "\$jg_downloadwithwatermark = \"1\";\n";
    }
    if (isset($jg_watermark)) {
      $config .= "\$jg_watermark = \"$jg_watermark\";\n";
    } else {
      $config .= "\$jg_watermark = \"1\";\n";
    }
    if (isset($jg_watermarkpos) && ($jg_watermarkpos != 0)) {
      $config .= "\$jg_watermarkpos = \"$jg_watermarkpos\";\n";
    } else {
      $config .= "\$jg_watermarkpos = \"9\";\n";
    }
    if (isset($jg_bigpic)) {
      $config .= "\$jg_bigpic = \"$jg_bigpic\";\n";
    } else {
      $config .= "\$jg_bigpic = \"1\";\n";
    }
    if (isset($jg_bigpic_open)) {
      $config .= "\$jg_bigpic_open = \"$jg_bigpic_open\";\n";
    } else {
      $config .= "\$jg_bigpic_open = \"0\";\n";
    }
    if (isset($jg_bbcodelink)) {
      $config .= "\$jg_bbcodelink = \"$jg_bbcodelink\";\n";
    } else {
      $config .= "\$jg_bbcodelink = \"3\";\n";
    }
    if (isset($jg_showcommentsunreg)) {
      $config .= "\$jg_showcommentsunreg = \"$jg_showcommentsunreg\";\n";
    } else {
      $config .= "\$jg_showcommentsunreg = \"1\";\n";
    }
    if (isset($jg_showcommentsarea)) {
      $config .= "\$jg_showcommentsarea = \"$jg_showcommentsarea\";\n";
    } else {
      $config .= "\$jg_showcommentsarea = \"3\";\n";
    }
    if (isset($jg_send2friend)) {
      $config .= "\$jg_send2friend = \"$jg_send2friend\";\n";
    } else {
      $config .= "\$jg_send2friend = \"1\";\n";
    }
    //Detail-Ansicht->Motiongallery
    if (isset($jg_minis)) {
      $config .= "\$jg_minis = \"$jg_minis\";\n";
    } else {
      $config .= "\$jg_minis = \"1\";\n";
    }
    if (isset($jg_motionminis)) {
      $config .= "\$jg_motionminis = \"$jg_motionminis\";\n";
    } else {
      $config .= "\$jg_motionminis = \"1\";\n";
    }
    if (isset($jg_motionminiWidth) && ($jg_motionminiWidth != 0)) {
      $config .= "\$jg_motionminiWidth = \"$jg_motionminiWidth\";\n";
    } else {
      $config .= "\$jg_motionminiWidth = \"400\";\n";
    }
    if (isset($jg_motionminiHeight) && ($jg_motionminiHeight != 0)) {
      $config .= "\$jg_motionminiHeight = \"$jg_motionminiHeight\";\n";
    } else {
      $config .= "\$jg_motionminiHeight = \"50\";\n";
    }
    if (isset($jg_miniWidth) && ($jg_motionminiWidth != 0)) {
      $config .= "\$jg_miniWidth = \"$jg_miniWidth\";\n";
    } else {
      $config .= "\$jg_miniWidth = \"28\";\n";
    }
    if (isset($jg_miniHeight) && ($jg_motionminiHeight != 0)) {
      $config .= "\$jg_miniHeight = \"$jg_miniHeight\";\n";
    } else {
      $config .= "\$jg_miniHeight = \"28\";\n";
    }
    if (isset($jg_minisprop)) {
      $config .= "\$jg_minisprop = \"$jg_minisprop\";\n";
    } else {
      $config .= "\$jg_minisprop = \"0\";\n";
    }
    //Detail-Ansicht->Namensschilder
    if (isset($jg_nameshields)) {
      $config .= "\$jg_nameshields = \"$jg_nameshields\";\n";
    } else {
      $config .= "\$jg_nameshields = \"0\";\n";
    }
    if (isset($jg_nameshields_unreg)) {
      $config .= "\$jg_nameshields_unreg = \"$jg_nameshields_unreg\";\n";
    } else {
      $config .= "\$jg_nameshields_unreg = \"0\";\n";
    }
    if (isset($jg_show_nameshields_unreg)) {
      $config .= "\$jg_show_nameshields_unreg = \"$jg_show_nameshields_unreg\";\n";
    } else {
      $config .= "\$jg_show_nameshields_unreg = \"0\";\n";
    }
    if (isset($jg_nameshields_height)) {
      $config .= "\$jg_nameshields_height = \"$jg_nameshields_height\";\n";
    } else {
      $config .= "\$jg_nameshields_height = \"12\";\n";
    }
    if (isset($jg_nameshields_width)) {
      $config .= "\$jg_nameshields_width = \"$jg_nameshields_width\";\n";
    } else {
      $config .= "\$jg_nameshields_width = \"8\";\n";
    }
    //Detail-Ansicht->Slideshow
    if (isset($jg_slideshow)) {
      $config .= "\$jg_slideshow = \"$jg_slideshow\";\n";
    } else {
      $config .= "\$jg_slideshow = \"1\";\n";
    }
    if (isset($jg_slideshow_timer) && ($jg_slideshow_timer != 0)) {
      $config .= "\$jg_slideshow_timer = \"$jg_slideshow_timer\";\n";
    } else {
      $config .= "\$jg_slideshow_timer = \"5\";\n";
    }
    if (isset($jg_slideshow_usefilter)) {
      $config .= "\$jg_slideshow_usefilter = \"$jg_slideshow_usefilter\";\n";
    } else {
      $config .= "\$jg_slideshow_usefilter = \"1\";\n";
    }
    if (isset($jg_slideshow_filterbychance)) {
      $config .= "\$jg_slideshow_filterbychance = \"$jg_slideshow_filterbychance\";\n";
    } else {
      $config .= "\$jg_slideshow_filterbychance = \"1\";\n";
    }
    if (isset($jg_slideshow_filtertimer) && ($jg_slideshow_filtertimer != 0)) {
      $config .= "\$jg_slideshow_filtertimer = \"$jg_slideshow_filtertimer\";\n";
    } else {
      $config .= "\$jg_slideshow_filtertimer = \"3\";\n";
    }
    if (isset($jg_showsliderepeater)) {
      $config .= "\$jg_showsliderepeater = \"$jg_showsliderepeater\";\n";
    } else {
      $config .= "\$jg_showsliderepeater = \"1\";\n";
    }
    //Detail-Ansicht->Exif-Daten
    if (isset($jg_showexifdata)) {
      $config .= "\$jg_showexifdata = \"$jg_showexifdata\";\n";
    } else {
      $config .= "\$jg_showexifdata = \"0\";\n";
    }
    //For all array based variables, e.g. EXIF
    //1. when there are changes in one or more of the tags, $jg_*tags will be an array and filled with the $_POST content
    //   $jg_*tags2 contains the actualized activated tags in a string formerly read and changed to string
    //   from $jg_*tags
    //   so use the content of $jg_*tags2 for writing in config file
    //
    //2. when there are now changes in the data $jg_*tags2 will be empty
    //   and $jg_*tags is an string including the formerly read config not an array
    //   so use the content of $jg_*tags for writing in config file
    if (isset($jg_subifdtags)) {
      if (is_array($jg_subifdtags)) {
      	//changed
        $config .= "\$jg_subifdtags = \"$jg_subifdtags2\";\n";                
      } else {
      	//not changed
        $config .= "\$jg_subifdtags = \"$jg_subifdtags\";\n";        
      }
    } else {
    	//default
      $config .= "\$jg_subifdtags = \"\";\n";
    }
    if (isset($jg_ifdotags)) {
      if (is_array($jg_ifdotags)) {
      	//changed
        $config .= "\$jg_ifdotags = \"$jg_ifdotags2\";\n";                
      } else {
      	//not changed
        $config .= "\$jg_ifdotags = \"$jg_ifdotags\";\n";        
      }
    } else {
    	//default
      $config .= "\$jg_ifdotags = \"\";\n";
    }
    if (isset($jg_gpstags)) {
      if (is_array($jg_gpstags)) {
      	//changed
        $config .= "\$jg_gpstags = \"$jg_gpstags2\";\n";                
      } else {
      	//not changed
        $config .= "\$jg_gpstags = \"$jg_gpstags\";\n";        
      }
    } else {
    	//default
      $config .= "\$jg_gpstags = \"\";\n";
    }
    
    //Detail-Ansicht->IPTC-Daten
    if (isset($jg_showiptcdata)) {
      $config .= "\$jg_showiptcdata = \"$jg_showiptcdata\";\n";
    } else {
      $config .= "\$jg_showiptcdata = \"0\";\n";
    }
    if (isset($jg_iptctags)) {
    	if (is_array($jg_iptctags)) {
    		//changed
	      $config .= "\$jg_iptctags = \"$jg_iptctags2\";\n";    		
    	} else {
    		//not changed
        $config .= "\$jg_iptctags = \"$jg_iptctags\";\n";  		
    	}
    } else {
    	//default
      $config .= "\$jg_iptctags = \"\";\n";
    }   
    
    //Toplisten->Generelle Einstellungen
    if (isset($jg_showtoplist)) {
      $config .= "\$jg_showtoplist = \"$jg_showtoplist\";\n";
    } else {
      $config .= "\$jg_showtoplist = \"1\";\n";
    }
    if (isset($jg_toplist) && ($jg_toplist != 0)) {
      $config .= "\$jg_toplist = \"$jg_toplist\";\n";
    } else {
      $config .= "\$jg_toplist = \"10\";\n";
    }
    if (isset($jg_topthumbalign)) {
      $config .= "\$jg_topthumbalign = \"$jg_topthumbalign\";\n";
    } else {
      $config .= "\$jg_topthumbalign = \"1\";\n";
    }
    if (isset($jg_toptextalign)) {
      $config .= "\$jg_toptextalign = \"$jg_toptextalign\";\n";
    } else {
      $config .= "\$jg_toptextalign = \"1\";\n";
    }
    if (isset($jg_toplistcols) && ($jg_toplistcols != 0)) {
      $config .= "\$jg_toplistcols = \"$jg_toplistcols\";\n";
    } else {
      $config .= "\$jg_toplistcols = \"3\";\n";
    }
    if (isset($jg_whereshowtoplist)) {
      $config .= "\$jg_whereshowtoplist = \"$jg_whereshowtoplist\";\n";
    } else {
      $config .= "\$jg_whereshowtoplist = \"0\";\n";
    }
    if (isset($jg_showrate)) {
      $config .= "\$jg_showrate = \"$jg_showrate\";\n";
    } else {
      $config .= "\$jg_showrate = \"1\";\n";
    }
    if (isset($jg_showlatest)) {
      $config .= "\$jg_showlatest = \"$jg_showlatest\";\n";
    } else {
      $config .= "\$jg_showlatest = \"1\";\n";
    }
    if (isset($jg_showcom)) {
      $config .= "\$jg_showcom = \"$jg_showcom\";\n";
    } else {
      $config .= "\$jg_showcom = \"1\";\n";
    }
    if (isset($jg_showthiscomment)) {
      $config .= "\$jg_showthiscomment = \"$jg_showthiscomment\";\n";
    } else {
      $config .= "\$jg_showthiscomment = \"1\";\n";
    }
    if (isset($jg_showmostviewed)) {
      $config .= "\$jg_showmostviewed = \"$jg_showmostviewed\";\n";
    } else {
      $config .= "\$jg_showmostviewed = \"1\";\n";
    }
  //Favourites
  //Favoriten->Generelle Einstellungen
    if (isset($jg_favourites)) {
      $config .= "\$jg_favourites = \"$jg_favourites\";\n";
    } else {
      $config .= "\$jg_favourites = \"0\";\n";
    }
    if (isset($jg_showdetailfavourite)) {
      $config .= "\$jg_showdetailfavourite = \"$jg_showdetailfavourite\";\n";
    } else {
      $config .= "\$jg_showdetailfavourite = \"0\";\n";
    }
    if (isset($jg_favouritesshownotauth)) {
      $config .= "\$jg_favouritesshownotauth = \"$jg_favouritesshownotauth\";\n";
    } else {
      $config .= "\$jg_favouritesshownotauth = \"0\";\n";
    }
    if (isset($jg_maxfavourites)) {
      $config .= "\$jg_maxfavourites = \"$jg_maxfavourites\";\n";
    } else {
      $config .= "\$jg_maxfavourites = \"30\";\n";
    }
    if (isset($jg_zipdownload)) {
      $config .= "\$jg_zipdownload = \"$jg_zipdownload\";\n";
    } else {
      $config .= "\$jg_zipdownload = \"1\";\n";
    }
    if (isset($jg_usefavouritesforpubliczip)) {
      $config .= "\$jg_usefavouritesforpubliczip = \"$jg_usefavouritesforpubliczip\";\n";
    } else {
      $config .= "\$jg_usefavouritesforpubliczip = \"1\";\n";
    }
    if (isset($jg_usefavouritesforzip)) {
      $config .= "\$jg_usefavouritesforzip = \"$jg_usefavouritesforzip\";\n";
    } else {
      $config .= "\$jg_usefavouritesforzip = \"0\";\n";
    }


    $config .= "?>";

    if ($fp = fopen("$joom_configfile", "w")) {
      fputs($fp, $config, strlen($config));
      fclose ($fp);
    }
    mosRedirect('index2.php?option='. $option .'&task=configuration', _JGA_SETTINGS_SAVED);
  }

  }

  function Joom_SaveCSS()
  {
    //Aufbau und Schreiben der joom_settings.css
    //mit Einstellungen aufgrund der Vorgaben im Backend
    global $mosConfig_absolute_path,
    //Grundlegende Einstellungen (common)
    $align, $jg_colcat, $jg_colnumb, $jg_colsubcat,
    $jg_showcatdescription, $jg_thumbheight, $jg_showcatthumb,
    $jg_ctalign, $jg_catperpage,$jg_catthumbalign,$jg_subcatthumbalign,

    //Toplisten
    $jg_showtoplist, $jg_toplistcols, $jg_topthumbalign, $jg_toptextalign,
    
    //Motiongallery
    $jg_minis, $jg_miniHeight, $jg_miniWidth, $jg_minisprop,
    $jg_motionminiWidth, $jg_motionminiHeight,
    
    //Namensschilder
    $jg_nameshields,$jg_nameshields_height;
        
    //$joomgallery_image = _JGA_PICTURE;
    //$joomgallery_of = _JGA_OF;

    $jg_thumblheight=$jg_thumbheight+10;

    //Berechnung der Spaltenbreiten
    //Galerie Ansicht
    $colwidth_gal = floor( 99 / $jg_colcat);      

    //Kategorien
    $colwidth_cat = floor( 99 / $jg_colnumb );    
    
    //Unterkategorien
    $colwidth_subcat = floor( 99 / $jg_colsubcat );
            
    //Ausrichtung des Containers fuer Text und ggf. Bild 
    //wenn ct_align = 0 abwechselnde Ausrichtung
    $jg_gal_container = ""; //-> jg_element_gal
    $jg_gal_elemimg = "";   //-> jg_photo_container
    $jg_gal_elemtxt = "";   //-> jg_element_txt
      
    //Galerie Ansicht
    //Ausrichtung bei einspaltiger Darstellung nicht ueber float, sondern ueber
    //text-align
    switch ($jg_ctalign) {
      case 1: 
        //linksbuendig
        //wenn nur eine Spalte -> text-align
        if ($jg_colcat == 1){
          $jg_gal_container = "  text-align:left !important;\n ";
          $jg_gal_elemtxt = "  text-align:left !important; \n ";                    
        } else {
          $jg_gal_container = "  float:left;\n ";
          $jg_gal_elemtxt = "  float:left;\n ";          
        }
        break;     
      case 2: 
        //rechts
        //wenn nur eine Spalte -> text-align
        if ($jg_colcat == 1 || $jg_catperpage == 1){
          $jg_gal_container = "  text-align:right !important;\n";
        } else {
          $jg_gal_container = "  float:right;\n ";  
        }
        $jg_gal_elemtxt = "  text-align:right !important;\n ";        
        break;        
      case 3: 
        //zentriert
        if ($jg_colcat == 1 || $jg_catperpage == 1){
          $jg_gal_container = "  text-align:center;\n ";          
        } else {
          $jg_gal_container = "  float:left;\n ";          
        }
        $jg_gal_elemtxt = "  text-align:center !important;\n ";       
        break;

      default: 
        //=0 abwechselnde Reihenfolge, Klassen *_r sorgen fuer rechte Platzierung
        //in joom_common2.css
        $jg_gal_container = "  float:left;\n ";
        $jg_gal_elemtxt = "  float:left;\n ";
        break;          
    }
        
    //Ausrichtung ggf. vom Thumb
    if ($jg_showcatthumb == 1 ) { 
      switch ($jg_ctalign) {
        case 1:
          //links
          //wenn nur eine Spalte -> text-align
          if ($jg_colcat == 1 || $jg_catperpage == 1){
            $jg_gal_elemimg = "  text-align:left !important;\n ";                    
          } else {          
            $jg_gal_elemimg = "  float:left;\n ";
          }
          break;       
        case 2: 
          //rechts
          //wenn nur eine Spalte -> text-align
          if ($jg_colcat == 1 || $jg_catperpage == 1){
            $jg_gal_elemimg = "  text-align:right !important;\n";           
          } else {
            $jg_gal_elemimg = "  float:right;\n ";            
          }
          break;
        case 3: 
          //zentriert
          $jg_gal_elemimg = "  text-align:center !important;\n ";
          break;
        default:
          //abwechselnd        
          $jg_gal_elemimg = "  float:left;\n ";
          break;
      } 
    }
    
    //Kategorie-Ansicht
    switch ($jg_catthumbalign) {
      case 1:
        //left
        $cat_container="  float:left;";
        $cat_photo="  float:left;";
        $cat_txt="  text-align:left !important;";
        break;
      case 2:
        //right
        $cat_container="  float:right;\n  text-align:right !important;";           
        $cat_photo="  text-align:right !important;";
        $cat_txt="  text-align:right !important;";
        break;        
      case 3:
        //center
        if ($jg_colnumb == 1) {
          $cat_container="  text-align:center !important;";        
          $cat_photo="  text-align:center !important;";
          $cat_txt="  display:block;\n  text-align:center !important;";          
        } else {
          $cat_container="  float:left;\n  text-align:center !important;";        
          $cat_photo="  text-align:center !important;";
          $cat_txt="  text-align:center !important;";                    
        }
        break;
    }

    //Subkategorie-Ansicht
    switch ($jg_subcatthumbalign) {
      case 1:
        //left
        if ($jg_colsubcat == 1) {
          $subcat_container="  text-align:left !important;";
          $subcat_photo="  float:left;";
          $subcat_txt="  text-align:left !important;";          
        } else {
          $subcat_container="  float:left;";
          $subcat_photo="  float:left;";
          $subcat_txt="  text-align:left !important;";          
        }
        break;
      case 2:
        //right
        if ($jg_colsubcat == 1) {
          $subcat_container="  text-align:right !important;";           
          $subcat_photo="  float:right;";
          $subcat_txt="  text-align:right !important;";          
        } else {
          $subcat_container="  float:right;\n  text-align:right !important;";           
          $subcat_photo="  float:right;";
          $subcat_txt="  text-align:right !important;";
        }
        break;        
      case 3:
        //center
        if ($jg_colsubcat == 1) {
          $subcat_container="  text-align:center !important;";        
          $subcat_photo="  text-align:center !important;";
          $subcat_txt="  display:block;\n  text-align:center !important;";          
        } else {
          $subcat_container="  float:left;\n  text-align:center !important;";        
          $subcat_photo="  text-align:center !important;\n";
          $subcat_txt="  clear:both;\n  text-align:center !important;";                    
        }
        break;
    }
    
    //Toplisten-Ansicht
    $colwidth_top = floor ( 99 / $jg_toplistcols );
    
    //nur, wenn diese auch aktiviert ist
    if ($jg_showtoplist != 0) {
      switch ($jg_topthumbalign) {
        case 1:
          //bild links
          if ($jg_toplistcols == 1) {
            $top_container="";
            $top_photo="  width:49%;\n  float:left;";
            
            switch ($jg_toptextalign) {
              //Align des Textes
              case 1:
                //left
                $top_txt="  text-align:left !important;";
                break;
              case 2:
                //rechts
                $top_txt="  text-align: right !important;";              
                break;                  
              case 3:
                //center
                $top_txt="  text-align: center !important;";              
                break;                
            }
            $top_txt .= "  width:49%;float:left;";          
          } else {
            $top_container="  float:left;\n  height:100%;";            
            $top_photo="";           
            $top_txt="  text-align:left !important;";                 
          }               
          break;
          
        case 2:
          //bild rechts
          if ($jg_toplistcols == 1) {
            $top_container="";
            $top_photo="  width:49%;\n  float:left;\n  text-align:right !important;";
            
            switch ($jg_toptextalign) {
              //Align des Textes
              case 1:
                //left
                $top_txt="  text-align:left !important;";
                break;
              case 2:
                //rechts
                $top_txt="  text-align: right !important;";              
                break;              
              case 3:
                //center
                $top_txt="  text-align: center !important;";              
                break;              
            }
            $top_txt .= "  width:49%;float:left;";          
          } else {
            $top_container="  float:left;\n  height:100%;\n  text-align:right !important;";            
            $top_photo="";
            $top_txt="  text-align: right !important;";              
          }          
          break;
          
        case 3:
          //bild center
          if ($jg_toplistcols == 1) {
            $top_container="";
            $top_photo="  width:49%;\n  float:left;\n  text-align:center;";
            
            switch ($jg_toptextalign) {
              //Align des Textes
              case 1:
                //left
                $top_txt="  text-align:left !important;";
                break;
              case 2:
                //rechts
                $top_txt="  text-align: right !important;";              
                break;              
              case 3:
                //center
                $top_txt="  text-align: center !important;";              
                break;                
            }
            $top_txt .= "  width:49%;float:left;";          
          } else {
            $top_container="  float:left;\n  height:100%;\n  text-align:center !important;";            
            $top_photo="";
            $top_txt="  text-align: center !important;";              
          } 
          break;        
      }
    }
           
    //Detailansicht
    if ($jg_minis != 0 && $jg_minisprop == 2 ) {
      $minidimensions  = "height:".$jg_miniHeight."px";
    } else if ($jg_minisprop == 1 ) {
      $minidimensions  = "width:".$jg_miniWidth."px";
    } else {
      $minidimensions  = "width:".$jg_miniWidth."px;\n";
      $minidimensions .= "height:".$jg_miniHeight."px;\n";
    }

    // Aufbereitung und Ausgabe des CSS

    // Einstellungen aus der Konfiguration werden nur noch in
    // settings_css geschrieben, der Rest wird nicht ueberschrieben

    $css_settings = "
/* Joomgallery CSS
CSS Styles generated by settings in the Joomgallery backend.
DO NOT EDIT - this file will be overwritten every time the config is saved.
Adjust your styles in joom_local.css instead.

CSS Styles, die ueber die Speicherung der Konfiguration im Backend erzeugt werden.
BITTE NICHT VERAENDERN - diese Datei wird  mit dem naechsten Speichern ueberschrieben.
Bitte nehmen Sie Aenderungen in der Datei joom_local.css in diesem 
Verzeichnis vor. Sie koennen sie neu erstellen oder die schon vorhandene
joom_local.css.README umbenennen und anpassen
*/\n";

    //Galerieansicht
    $css_settings .= "/* Gallery view */\n";
    
    //Container mit ggf. Bild und Kategorietext
    $css_settings .= ".jg_element_gal, .jg_element_gal_r {\n";
    $css_settings .= $jg_gal_container;    
    $css_settings .= " height:".$jg_thumblheight."px;\n";
    $css_settings .= "  width:".$colwidth_gal."%;\n";
    $css_settings .= "}\n";
   
    //Text
    $css_settings .= ".jg_element_txt {\n";
    $css_settings .= $jg_gal_elemtxt;
    $css_settings .= "}\n";

    //Bild, wenn aktiviert
    if ($jg_showcatthumb == 1 && !empty($jg_gal_elemimg)) {    
      $css_settings .= ".jg_photo_container {\n";
      $css_settings .= $jg_gal_elemimg;
      $css_settings .= "}\n";         
    }
    
    //Kategorieansicht
    $css_settings .= "\n/* Category view */\n";
    $css_settings .= ".jg_element_cat {\n";
    $css_settings .= "  width:".$colwidth_cat."%;\n";
    $css_settings .= $cat_container."\n";
    $css_settings .= "}\n";
    $css_settings .= ".jg_catelem_cat a{\n";
    $css_settings .= "  height:".$jg_thumbheight."px;\n";
    $css_settings .= "}\n";
    $css_settings .= ".jg_catelem_photo {\n";
    $css_settings .= $cat_photo."\n";
    $css_settings .= "}\n";
    $css_settings .= ".jg_catelem_txt {\n";
    $css_settings .= $cat_txt."\n";
    $css_settings .= "}\n";

    //Subkategorieansicht
    $css_settings .= "\n/* Subcategory view */\n";
    $css_settings .= ".jg_subcatelem_cat {\n";
    $css_settings .= "  width:".$colwidth_subcat."%;\n";
    $css_settings .= $subcat_container."\n";
    $css_settings .= "}\n";
    $css_settings .= ".jg_subcatelem_cat a{\n";
    $css_settings .= "  height:".$jg_thumbheight."px;\n";
    $css_settings .= "}\n";
    $css_settings .= ".jg_subcatelem_photo {\n";
    $css_settings .= $subcat_photo."\n";
    $css_settings .= "}\n";
    $css_settings .= ".jg_subcatelem_txt {\n";
    $css_settings .= $subcat_txt."\n";
    $css_settings .= "}\n";
    
    //Detailansicht
    $css_settings .= "\n/* Detail view */\n";

    //Motiongallery nur, wenn diese auch aktiviert ist
    if ($jg_minis != 0) {
      $css_settings .= ".jg_minipic {\n";
      $css_settings .= "  ".$minidimensions.";\n";
      $css_settings .= "}\n";
    
      $css_settings .= "#motioncontainer {\n";
      $css_settings .= "  width:".$jg_motionminiWidth."px; /* Set to gallery width, in px or percentage */\n";
      $css_settings .= "  height:".$jg_motionminiHeight."px;/* Set to gallery height */\n";
      $css_settings .= "}\n";
    }
    
    //Namensschilder nur, wenn diese auch aktiviert sind
    if ($jg_nameshields != 0) {
      $css_settings .=".nameshield {\n";
      $css_settings .="  line-height:".$jg_nameshields_height."px;\n";
      $css_settings .="}\n";
    }

    //Toplisten (special)
    $css_settings .= "\n/* Special view - Toplists*/\n";
    $css_settings .= ".jg_topelement, .jg_favelement {\n";
    $css_settings .= "  width:".$colwidth_top."%;\n";
    $css_settings .= "  height:auto;\n"; 
    $css_settings .= $top_container."\n";
    $css_settings .= "}\n";
    
    $css_settings .= ".jg_topelem_photo, .jg_favelem_photo  {\n";
    $css_settings .= "  ".$top_photo."\n";
    $css_settings .= "}\n";
    
    $css_settings .= ".jg_topelem_txt, .jg_favelem_txt {\n";
    $css_settings .= "  ".$top_txt."\n";
    $css_settings .= "}\n";
   

    // CSS-Styles werden nur noch in joom_settings.css geschrieben.
    $css_settings_file =
        $mosConfig_absolute_path."/components/com_joomgallery/assets/css/joom_settings.css";
        
    if ($fp = fopen("$css_settings_file", "w")) {
      if (fputs($fp, $css_settings, strlen($css_settings)) == FALSE ) {
        fclose ($fp);
        return false;
      }
      fclose ($fp);
      @chmod ($css_settings_file, 0766);
    } else {
      return false;
    }
    return true;
  }


  function Joom_BuildExifConfig () {
    global $mosConfig_absolute_path, $mosConfig_lang, $jg_subifdtags, $jg_ifdotags, 
           $jg_gpstags;

    if (file_exists($mosConfig_absolute_path . '/components/com_joomgallery/includes/exif/exiflanguage/exif.'
                    . $mosConfig_lang . '.php')) {
      include($mosConfig_absolute_path . '/components/com_joomgallery/includes/exif/exiflanguage/exif.'
              . $mosConfig_lang . '.php');
    } else {
      include($mosConfig_absolute_path . '/components/com_joomgallery/includes/exif/exiflanguage/exif.english.php');
    }
    require_once($mosConfig_absolute_path . '/administrator/components/com_joomgallery/adminexif/admin.exifarray.php');


    $jg_ifdotags   = explode (',', $jg_ifdotags);
    $jg_subifdtags = explode (',', $jg_subifdtags);
    $jg_gpstags    = explode (',', $jg_gpstags);

    $definitions = array(
    1 => array ('TAG' => "IFD0", 'JG' => $jg_ifdotags, 'NAME' => "jg_ifdotags[]", 'HEAD' => _JGSE_IFD0TAGS),
    2 => array ('TAG' => "EXIF", 'JG' => $jg_subifdtags, 'NAME' => "jg_subifdtags[]", 'HEAD' => _JGSE_SUBIFDTAGS),
    3 => array ('TAG' => "GPS",  'JG' => $jg_gpstags,  'NAME' => "jg_gpstags[]",  'HEAD' => _JGSE_GPSTAGS)
    );
    $count=count($definitions);
    $output  = '';

    for($ii=1; $ii <= $count; $ii++) {
      $tags     = count($exif_config_array[$definitions[$ii]['TAG']]);
      $jgtags   = $definitions[$ii]['JG'];
      $tagname  = $definitions[$ii]['NAME'];
      $header   = $definitions[$ii]['HEAD'];

      $output .= "    <tr>\n";
//       $output .= "      <th>\n";
//       $output .= "        <input type=\"checkbox\" name=\"toggle\" value=\"\" onclick=\"checkAll(".$tags.")\" />\n";
//       $output .= "      </th>\n";
      $output .= "      <th colspan=\"5\" width=\"100%\" align=\"center\" class=\"title\">\n";
      $output .= "        ".$header."\n";
      $output .= "      </th>\n";
      $output .= "    </tr>\n";
      $output .= "    <tr>\n";
      $output .= "      <th>\n";
      $output .= "        &nbsp;\n";
      $output .= "      </th>\n";
      $output .= "      <th nowrap=\"nowrap\">\n";
      $output .= "        "._JGSE_TAGNR."\n";
      $output .= "      </th>\n";
      $output .= "      <th>\n";
      $output .= "        "._JGSE_TAGNAME."\n";
      $output .= "      </th>\n";
      $output .= "      <th nowrap=\"nowrap\">\n";
      $output .= "        "._JGSE_TAG."\n";
      $output .= "      </th>\n";
      $output .= "      <th>\n";
      $output .= "        "._JGSE_TAGDESCRIPTION."\n";
      $output .= "      </th>\n";
      $output .= "    </tr>\n";

      $i=1;

      foreach($exif_config_array[$definitions[$ii]['TAG']] as $key => $value) {

        if ((in_array($key, $jgtags)) && $jgtags[0] !='') {
          $checked = 'checked="checked"';
        } else {
          $checked = "";
        }

        $output .= "    <tr>\n";
        $output .= "      <td>\n";
        $output .= "        <input type=\"checkbox\" id=\"cb".$i."\" name=\"".$tagname."\" value=\"".$key."\" onclick=\"isChecked(this.checked);\" ".$checked." />\n";
        $output .= "      </td>\n";
        $output .= "      <td nowrap=\"nowrap\">\n";
        $output .= "        ".$key."\n";
        $output .= "      </td>\n";
        $output .= "      <td width=\"30%\">\n";
        $output .= "        ".$value['Name']."\n";
        $output .= "      </td>\n";
        $output .= "      <td width=\"20%\">\n";
        $output .= "        ".$value['Attribute']."\n";
        $output .= "      </td>\n";
        $output .= "      <td width=\"50%\">\n";
        $output .= "        ".$value['Description']."\n";
        $output .= "      </td>\n";
        $output .= "    </tr>\n";
        $i++;
      }

      $output .= "    <tr>\n";
      $output .= "      <th colspan=\"5\">\n";
      $output .= "        &nbsp;\n";
      $output .= "      </th>\n";
      $output .= "    </tr>\n";
    }
    echo $output;
  }
  function Joom_BuildIptcConfig () {
    global $mosConfig_absolute_path, $mosConfig_lang, $jg_iptctags;
    if (file_exists($mosConfig_absolute_path . '/components/com_joomgallery/includes/iptc/iptclanguage/iptc.'
                    . $mosConfig_lang . '.php')) {
      include($mosConfig_absolute_path . '/components/com_joomgallery/includes/iptc/iptclanguage/iptc.'
              . $mosConfig_lang . '.php');
    } else {
      include($mosConfig_absolute_path . '/components/com_joomgallery/includes/iptc/iptclanguage/iptc.english.php');
    }
    require_once($mosConfig_absolute_path . '/administrator/components/com_joomgallery/adminiptc/admin.iptcarray.php');
    $jg_iptctags   = explode (',', $jg_iptctags);
    $definitions = array(
    1 => array ('TAG' => "IPTC", 'JG' => $jg_iptctags, 'NAME' => "jg_iptctags[]", 'HEAD' => _JGSI_IPTCTAGS),
    );
    $count=count($definitions);
    $output  = '';
    for($ii=1; $ii <= $count; $ii++) {
      $tags     = count($iptc_config_array[$definitions[$ii]['TAG']]);
      $jgtags   = $definitions[$ii]['JG'];
      $tagname  = $definitions[$ii]['NAME'];
      $header   = $definitions[$ii]['HEAD'];
      $output .= "    <tr>\n";
//       $output .= "      <th>\n";
//       $output .= "        <input type=\"checkbox\" name=\"toggle\" value=\"\" onclick=\"checkAll(".$tags.")\" />\n";
//       $output .= "      </th>\n";
      $output .= "      <th colspan=\"5\" width=\"100%\" align=\"center\" class=\"title\">\n";
      $output .= "        ".$header."\n";
      $output .= "      </th>\n";
      $output .= "    </tr>\n";
      $output .= "    <tr>\n";
      $output .= "      <th>\n";
      $output .= "        &nbsp;\n";
      $output .= "      </th>\n";
      $output .= "      <th nowrap=\"nowrap\">\n";
      $output .= "        "._JGSI_TAGNR."\n";
      $output .= "      </th>\n";
      $output .= "      <th>\n";
      $output .= "        "._JGSI_TAGNAME."\n";
      $output .= "      </th>\n";
      $output .= "      <th nowrap=\"nowrap\">\n";
      $output .= "        "._JGSI_TAG."\n";
      $output .= "      </th>\n";
      $output .= "      <th>\n";
      $output .= "        "._JGSI_TAGDESCRIPTION."\n";
      $output .= "      </th>\n";
      $output .= "    </tr>\n";
      $j=1;
      foreach($iptc_config_array[$definitions[$ii]['TAG']] as $key => $value) {
        if ((in_array($key, $jgtags)) && $jgtags[0] !='') {
          $checked = 'checked="checked"';
        } else {
          $checked = "";
        }
        $output .= "    <tr>\n";
        $output .= "      <td>\n";
        $output .= "        <input type=\"checkbox\" id=\"cb".$j."\" name=\"".$tagname."\" value=\"".$key."\" onclick=\"isChecked(this.checked);\" ".$checked." />\n";
        $output .= "      </td>\n";
        $output .= "      <td nowrap=\"nowrap\">\n";
        $output .= "        ".$value['IMM']."\n";
        $output .= "      </td>\n";
        $output .= "      <td width=\"20%\">\n";
        $output .= "        ".$value['Name']."\n";
        $output .= "      </td>\n";
        $output .= "      <td width=\"20%\">\n";
        $output .= "        ".$value['Attribute']."\n";
        $output .= "      </td>\n";
        $output .= "      <td width=\"60%\">\n";
        $output .= "        ".$value['Description']."\n";
        $output .= "      </td>\n";
        $output .= "    </tr>\n";
        $j++;
      }
      $output .= "    <tr>\n";
      $output .= "      <th colspan=\"5\">\n";
      $output .= "        &nbsp;\n";
      $output .= "      </th>\n";
      $output .= "    </tr>\n";
    }
    echo $output;
  }
?>
