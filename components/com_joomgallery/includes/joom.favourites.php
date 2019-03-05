<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/joom.favourites.php $
// $Id: joom.favourites.php 396 2009-03-15 16:06:21Z aha $
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

class Joom_Favourites {

   var $piclist;
   var $using_database;
   var $user_exists;
   var $layout;
   var $output;

  function Joom_Favourites($func,$id,$catid) {
    global $mainframe,$database,$my,
           /*$jg_showdetailpage,*/$jg_showdetailfavourite,$jg_favourites,
           $jg_usefavouritesforpubliczip,$jg_usefavouritesforzip;

    $access = true;
    if($func == 'addpicture') {
      $database->setQuery("SELECT id
                           FROM #__joomgallery as a
                           LEFT JOIN #__joomgallery_catg as c ON a.catid = c.cid
                           WHERE a.id= '".$id."' AND a.approved = '1' AND a.published = '1'
                           AND c.access <= '".$my->gid."' AND c.published = '1'");
      if(!$database->loadResult()) {
        $access = false;
      }
    }

    // Berechtigung ueberpruefen
    if((( ( $jg_showdetailfavourite==0 && $my->gid<1 )
       || ( $jg_showdetailfavourite==1 && $my->gid<2 ))
       ^  ( defined('_JEXEC') && $jg_usefavouritesforpubliczip == 1 && $my->id < 1 ))
       || $jg_favourites == 0
       || $access == false) {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID), _JGS_ALERT_NOT_ALLOWED_VIEW_PICTURE );
    }

    // Ueberpruefung, ob mit der Datenbank oder mit der Session gearbeitet wird
    if(($my->id && $jg_usefavouritesforzip != 1) || !defined('_JEXEC')) {
      $this->using_database = true;
      
      if($jg_usefavouritesforzip == 1) {
        $this->output = '_JGS_ZIP_';
      } else {
        $this->output = '_JGS_FAV_';
      }

      $database->setQuery("SELECT uuserid FROM #__joomgallery_users WHERE uuserid = '".$my->id."'");
      if($database->loadResult()) {
        $this->user_exists = true;
        $database->setQuery("SELECT piclist,layout FROM #__joomgallery_users WHERE uuserid = '".$my->id."'");
        $row = $database->loadObjectList();
        $this->piclist = $row[0]->piclist;
        $this->layout = $row[0]->layout;
      } else {
        $this->user_exists = false;
        $this->piclist = NULL;
        $this->layout = 0;
      }
    } else {
      $this->using_database = false;

      $this->output = '_JGS_ZIP_';

      $this->piclist = $mainframe->getUserState('joom.favourites.pictures');
      $this->layout = $mainframe->getUserState('joom.favourites.layout');
    }

    switch($func) {
      case 'addpicture':
        $this->Joom_Favourites_AddPicture($id,$catid);
        break;
      case 'removepicture':
        $this->Joom_Favourites_RemovePicture($id);
        break;
      case 'removeall':
        $this->Joom_Favourites_RemoveAll();
        break;
      case 'switchlayout':
        $this->Joom_Favourites_SwitchLayout();
        break;
      case 'createzip':
        Joom_GalleryHeader();
        $this->Joom_Favourites_CreateZip();
        break;
      case 'showfavourites':
        Joom_GalleryHeader();
        $this->Joom_ShowFavourites();
        break;
    }
  }

  function Joom_Favourites_AddPicture($id, $catid) {
    global $mainframe,$database,$my,
           $jg_maxfavourites;

    if(is_null($this->piclist)) {
      if($this->using_database) {
        if($this->user_exists) {
          $database->setQuery("UPDATE #__joomgallery_users
                               SET piclist = '".$id."'
                               WHERE uuserid = '".$my->id."'");
        } else {
          $database->setQuery("INSERT INTO #__joomgallery_users
                               (uuserid,piclist)
                               VALUES
                               ('".$my->id."','".$id."')");
        }
        $database->query();
      } else {
        $mainframe->setUserState('joom.favourites.pictures',$id);
      }
    } else {
      $piclist_array = explode(',',$this->piclist);

      if(in_array($id,$piclist_array)) {  // Bild bereits vorhanden
        if($catid != 0) {
          mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=viewcategory&catid='.$catid._JOOM_ITEMID),$this->Output('ALREADY_IN'));
        } else {
          mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=detail&id='.$id._JOOM_ITEMID),$this->Output('ALREADY_IN'));
        }
      }
      if(count($piclist_array) == $jg_maxfavourites) {  // bereits maximala Anzahl an Bildern erreicht
        if($catid != 0) {
          mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=viewcategory&catid='.$catid._JOOM_ITEMID),$this->Output('ALREADY_MAX'));
        } else {
          mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=detail&id='.$id._JOOM_ITEMID),$this->Output('ALREADY_MAX'));
        }
      }

      if($this->using_database) {
        $database->setQuery("UPDATE #__joomgallery_users
                             SET piclist = '".$this->piclist.','.intval($id)."'
                             WHERE uuserid = '".$my->id."'");
        $database->query();
      } else {
        $mainframe->setUserState('joom.favourites.pictures',$this->piclist.','.intval($id));
      }
    }
    if($catid != 0) {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=viewcategory&catid='.$catid._JOOM_ITEMID),$this->Output('SUCCESSFULLY_ADDED'));
    } else {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=detail&id='.$id._JOOM_ITEMID),$this->Output('SUCCESSFULLY_ADDED'));
    }
  }

  function Joom_Favourites_RemovePicture($id) {
    global $mainframe,$database,$my;

    $piclist = explode(',',$this->piclist);
    if(!in_array($id,$piclist)) {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=showfavourites'._JOOM_ITEMID),$this->Output('NOT_IN'));
    }
    $new_piclist = array();
    foreach($piclist as $picid) {
      if($picid != $id) {
        array_push($new_piclist,$picid);
      }
    }
    if(count($new_piclist) == 0) {
      $new_piclist = NULL;
      $set_piclist = " SET piclist = NULL ";
    } else {
      $new_piclist = implode(',',$new_piclist);
      $set_piclist = " SET piclist = '".$new_piclist."' ";
    }
    if($this->using_database) {
      $database->setQuery("UPDATE #__joomgallery_users"
                          .$set_piclist.
                          "WHERE uuserid = '".$my->id."'");
      $database->query();
    } else {
      $mainframe->setUserState('joom.favourites.pictures',$new_piclist);
    }
    mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=showfavourites'._JOOM_ITEMID),$this->Output('SUCCESSFULLY_REMOVED'));
  }

  function Joom_Favourites_RemoveAll() {
    global $mainframe,$database,$my;

    if($this->using_database) {
      $database->setQuery("UPDATE #__joomgallery_users
                           SET piclist = NULL
                           WHERE uuserid = '".$my->id."'");
      $database->query();
    } else {
      $mainframe->setUserState('joom.favourites.pictures',NULL);
    }
    
    mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID),$this->Output('ALL_REMOVED'));
  }

  function Joom_Favourites_SwitchLayout() {
    global $mainframe,$database,$my;

    if($this->layout) {
      if($this->using_database) {
        $database->setQuery("UPDATE #__joomgallery_users
                             SET layout = '0'
                             WHERE uuserid = '".$my->id."'");
        $database->query();
      } else {
        $mainframe->setUserState('joom.favourites.layout',0);
      }
    } else {
      if($this->using_database) {
        $database->setQuery("UPDATE #__joomgallery_users
                             SET layout = '1'
                             WHERE uuserid = '".$my->id."'");
        $database->query();
      } else {
        $mainframe->setUserState('joom.favourites.layout',1);
      }
    }
    mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=showfavourites'._JOOM_ITEMID));
  }

  function Joom_Favourites_CreateZip() {
    global $mosConfig_absolute_path,$mosConfig_live_site,
           $mainframe,$database,$my,
           $jg_zipdownload,$jg_usefavouritesforpubliczip,$jg_pathoriginalimages,$jg_pathimages;

    // Kontrollabfrage, ob der Zip-Download erlaubt ist
    if($jg_zipdownload != 1 && ($my->id || $jg_usefavouritesforpubliczip != 1)) {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=showfavourites'._JOOM_ITEMID),_JGS_FAV_NOT_ALLOWED);
    }

    // Einbinden der PclZip-Library
    if(file_exists($mosConfig_absolute_path . '/administrator/includes/pcl/pclzip.lib.php')) {
      require_once($mosConfig_absolute_path . '/administrator/includes/pcl/pclzip.lib.php');
    } else {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=showfavourites'._JOOM_ITEMID),_JGS_FAV_ZIPLIBRARY_NOT_FOUND);
    }

    // Name des Zip-Archivs
    $zipname = 'components/com_joomgallery/joomgallery_'.date('d_m_Y').'__';
    if($my->id) {
      $zipname .= $my->id.'_';
    }
    $zipname .= mt_rand(10000,99999).'.zip';

    // Erstellen des Zip-Archivs
    $zipfile = new PclZip($zipname);
    if(!is_null($this->piclist)) {
      $picids = explode(',',$this->piclist);
      $files = array();
      foreach( $picids as $picid) {
        $database->setQuery("SELECT catid,imgfilename FROM #__joomgallery
                             WHERE id = '".$picid."'");
        $row = $database->loadObjectList();
        $catpath = Joom_getCatPath($row[0]->catid);
        if(file_exists($mosConfig_absolute_path.$jg_pathoriginalimages.'/'.$catpath.$row[0]->imgfilename)){
          array_push($files,ltrim($jg_pathoriginalimages,'/').'/'.$catpath.$row[0]->imgfilename);
        } elseif(file_exists($mosConfig_absolute_path.$jg_pathimages.'/'.$catpath.$row[0]->imgfilename)) {
          array_push($files,ltrim($jg_pathimages,'/').'/'.$catpath.$row[0]->imgfilename);
        }
      }
      $createzip = $zipfile->create($files,PCLZIP_OPT_REMOVE_ALL_PATH);
      if($my->id) {
        if($this->user_exists) {
          $database->setQuery("SELECT zipname FROM #__joomgallery_users
                               WHERE uuserid = '".$my->id."'");
          if($old_zip = $database->loadResult()) {
            if(file_exists($old_zip)) {
              unlink($old_zip);
            }
          }
          $database->setQuery("UPDATE #__joomgallery_users
                               SET time = NOW(),zipname = '".$zipname."'
                               WHERE uuserid = '".$my->id."'");
        } else {
          $database->setQuery("INSERT INTO #__joomgallery_users
                               (uuserid,time,zipname)
                               VALUES
                               ('".$my->id."',NOW(),'".$zipname."')");
        }
      } else {
        $database->setQuery("INSERT INTO #__joomgallery_users
                             (time,zipname)
                             VALUES
                             (NOW(),'".$zipname."')");
      }
      $database->query();

      include_once dirname(__FILE__).'/html/joom.favourites.html.php';
      if($createzip != 0 ) {
        $zipsize = filesize($zipname);
        if($zipsize < 1000000) {
          $zipsize = round($zipsize,-3)/1000;
          $zipsize_string = $zipsize.' KB';
        } else {
          $zipsize = round($zipsize,-6)/1000000;
          $zipsize_string = $zipsize.' MB';
        }
        HTML_Joom_Favourites::Joom_Favourites_CreateZip_HTML($zipname,$zipsize_string);
      } else {
        HTML_Joom_Favourites::Joom_Favourites_CreateZip_Error_HTML($zipfile);
      }
    } else {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=showfavourites'._JOOM_ITEMID),$this->Output('NO_PICTURES'));
    }
  }

  function Joom_ShowFavourites() {
    global $mainframe,$database,$my,
           $jg_showdetaildownload;

    include_once dirname(__FILE__).'/html/joom.favourites.html.php';

    $query = "SELECT *,a.owner AS imgowner
              FROM #__joomgallery AS a, #__joomgallery_catg AS ca
              WHERE a.catid=ca.cid";
    if(is_null($this->piclist)) {
      $query .= " LIMIT 0";
    } else {
      $query .= " AND a.id IN (".$database->getEscaped($this->piclist).")";
    }
    $database->setQuery($query);
    $rows = $database->loadObjectList();

    // Download Icon # hier wird im Moment noch die Einstellung fuer die Detail-Ansicht uebernommen
    $showDownloadIcon = 0;
    /*if((is_file(_JOOM_ABSOLUTE_PATH.$jg_pathoriginalimages.'/'.$catpath.$imgfilename) 
         || $jg_downloadfile!=1)){*/
      if((($jg_showdetaildownload == 1) && ($my->gid >= 1)) 
           || (($jg_showdetaildownload == 2) && ($my->gid == 2)) 
           || (($jg_showdetaildownload == 3))) {
        $showDownloadIcon = 1;
      } elseif(($jg_showdetaildownload == 1) && ($my->gid < 1)){
        $showDownloadIcon = -1;
      }
    #}
    
    if($this->layout) {
      HTML_Joom_Favourites::Joom_ShowFavourites_HTML1($rows,$showDownloadIcon);
    } else {
      HTML_Joom_Favourites::Joom_ShowFavourites_HTML2($rows,$showDownloadIcon);
    }
  }

  function Output($msg) {
    return constant($this->output.$msg);
  }
}
?>