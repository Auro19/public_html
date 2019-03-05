<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/classes/upload.class.php $
// $Id: upload.class.php 396 2009-03-15 16:06:21Z aha $
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

/**
* Upload Funktionen fuer den Frontend-Bereich
* - Einzelupload
*/
defined('_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.');

class Joom_Upload {
  var $bugtest;
  var $filecounter;
  var $file_delete;
  var $original_delete;
  var $create_special_gif;
  var $arrscreenshot;
  var $adminlogged;

/**
* Konstruktor
* @param func
* @param Kategorie ID
*/
  function Joom_Upload($func, $catid) {
    global $database,$my;

    $this->bugtest             = intval( mosGetParam( $_REQUEST, 'bugtest', 0) );
    $this->filecounter         = mosGetParam($_POST, 'filecounter', '');
    $this->original_delete     = mosGetParam($_POST, 'original_delete', '');
    $this->create_special_gif  = mosGetParam($_POST, 'create_special_gif', '');
    $this->arrscreenshot       = mosGetParam($_FILES, 'arrscreenshot', '');

    if ($my->usertype == 'Administrator' || $my->usertype == 'Super Administrator') {
      $this->adminlogged=true;
    } else {
      $this->adminlogged=false;
    }
    
    
    switch($func) {
      case 'uploadhandler':
        $this->Upload_Singles($catid);
        break;
      default:
        die('Wrong');
        break;
    }
  }

/**
* Einzelupload
* Bilder werden durch User ausgew�hlt und hochgeladen
* Anzahl der gleichzeitigen Uploads im Backend ausw�hlbar
* @param Kategorie ID
* @see joomgallery.php
*/
  function Upload_Singles ($catid) {
    global $mosConfig_absolute_path ,$database,$absolut_originalpath,
           $absolut_picturepath ,$absolut_thumbnailpath,
           $my,$jg_useorigfilename,$jg_useforresizedirection,$jg_thumbwidth,
           $jg_thumbheight,$jg_delete_original,$jg_thumbcreation,$jg_thumbquality,
           $jg_maxwidth,$jg_resizetomaxwidth,$jg_uploadorder,$jg_useruploadnumber,
           $jg_maxuploadfields,$jg_maxfilesize,$jg_pathimages,$jg_pathoriginalimages,
           $jg_paththumbs,$jg_special_gif_upload,$jg_delete_original_user,$jg_approve,
           $mosConfig_live_site;

    if (!$my->username) {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID),_JGS_YOU_ARE_NOT_LOGGED);
      die();
    }

    //Kategoriepfad ermitteln ,Ermittlung nur einmal notwendig
    $catpath = Joom_GetCatPath($catid);  

    echo '<p />';
    $isallok = 0;
    for ($i=0; $i < $jg_maxuploadfields; $i++) {
      $screenshot=$this->arrscreenshot["tmp_name"][$i];
      $screenshot_name=$this->arrscreenshot["name"][$i];
      $screenshot_filesize = $this->arrscreenshot["size"][$i];

      $ii = $i+1;
      if ( $screenshot_name ) {
        echo $ii . ". " . $screenshot_name . "<br />";
      }
      if (strlen($screenshot) > 0 && $screenshot != 'none' ) {
        //Check for path exploits, and replace spaces

        $screenshot_name = Joom_FixFilename($screenshot_name);
        // Get extension
        $tag = strtolower(ereg_replace('.*\.([^\.]*)$', '\\1', $screenshot_name));

        if ( $jg_useruploadnumber == 1 ) {
          $filecounter = $i + 1;
          $praefix = substr($screenshot_name,0,strpos(strtolower($screenshot_name),$tag)-1);          
          $newfilename = $this->Upload_GenFilename($praefix,$tag,$filecounter);
        } else {
          $newfilename = $this->Upload_GenFilename($screenshot_name,$tag);          
        }
        
        //Bildgroesse darf Admin max nicht ueberschreiten
        //Ausnahmen: Admin/SuperAdmin 
        if ($screenshot_filesize > $jg_maxfilesize && !$this->adminlogged) {
          mosRedirect(sefRelToAbs("index.php?option=com_joomgallery&func=showupload"),_JGS_ALERT_MAX_ALLOWED_FILESIZE . " " . $jg_maxfilesize . " " . _JGS_ALERT_BYTES);
          $isallok = $isallok+1;
          die();
        } else {
          //Check for right format
          if (($tag == 'jpeg') || ($tag == 'jpg') || ($tag == 'jpe') ||
              ($tag == 'gif') || ($tag == 'png')) {

            //Wenn Bild schon existiert, Abbruch
            if (file_exists(_JOOM_ABSOLUTE_PATH . $jg_pathimages .'/'.
                $catpath. $newfilename )) {
              mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=showupload'._JOOM_ITEMID),_JGS_ALERT_SAME_PICTURE_ALREADY_EXIST);
              $isallok = $isallok+1;
              die();
            }
            // We'll assume that this file is ok because with open_basedir,
            // we can move the file, but may not be able to access it until it's moved
            if (strlen($screenshot) > 0 && $screenshot != 'none' &&
                Joom_MoveUploadedFile($screenshot,_JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . '/' . $catpath . $newfilename)) {

              if (!$img_info = getimagesize(_JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . '/' . $catpath . $newfilename)) {
                // getimagesize didn't find a valid image or this is
                // some sort of hacking attempt
                Joom_RemoveFile($newfilename,_JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . '/' . $catpath);
                $isallok = $isallok+1;
                die();
              }
              if (Joom_CopyFile(_JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . '/' .
                  $catpath . $newfilename,
                  _JOOM_ABSOLUTE_PATH . $jg_pathimages . '/' . $catpath, $newfilename)) {
                echo _JGS_UPLOAD_COMPLETE . '...<br />';
              } else {
                $isallok = $isallok+1;
                die(_JGS_PROBLEM_COPYING . "$jg_pathimages. " . _JGS_CHECK_PERMISSIONS);
              }

              // Thumb erstellen
              Joom_ResizeImage(_JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . '/' . $catpath . $newfilename,
                               _JOOM_ABSOLUTE_PATH . $jg_paththumbs . '/' . $catpath . $newfilename,
                               $jg_useforresizedirection, $jg_thumbwidth, $jg_thumbheight,
                               $jg_thumbcreation, $jg_thumbquality);
              echo _JGS_THUMBNAIL_CREATED . '...<br />';

              if ($jg_resizetomaxwidth && ($jg_special_gif_upload==0 ||
                  $this->create_special_gif!=1 || ($tag!='gif' && $tag!='png'))) {
                Joom_ResizeImage(_JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . '/' . $catpath . $newfilename,
                                 _JOOM_ABSOLUTE_PATH . $jg_pathimages . '/' . $catpath . $newfilename,
                                 false, $jg_maxwidth, false, $jg_thumbcreation, $jg_thumbquality, true);
                echo _JGS_RESIZED_TO_MAXWIDTH . '<br />';
              } else {
                Joom_CopyFile(_JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . '/' . $catpath . $newfilename,
                              _JOOM_ABSOLUTE_PATH . $jg_pathimages . '/' . $catpath, $newfilename);
              }
              if($jg_delete_original_user == 1 || ($jg_delete_original_user== 2 && $this->original_delete==1)) {
                if(Joom_RemoveOrigFile($catpath . $newfilename)) {
                  echo _JGS_ORIGINAL_DELETED . '<br />';
                } else {
                  $isallok = $isallok+1;
                  die(_JGS_PROBLEM_DELETING_ORIGINAL .' - '. _JGS_CHECK_PERMISSIONS);
               }
              }

              $ordering = $this->Upload_GetOrdering ($jg_uploadorder,$catid);

              $row = new mosjoomgallery($database);
              if (!$row->bind($_POST, _JGS_APPROVED_OWNER_PUBLISHED)) {
                echo "<script> alert('" . $row->getError() . "'); window.history.go(-1); </script>\n";
                exit();
              }
              $row->imgdate = mktime();
              $row->owner = $my->id;
              
              $row->published = 1;

              //Upload durch Administrator und hoeher wird sofort freigegeben
              if ($jg_approve==1 &&  !$this->adminlogged ) {
                $row->approved = 0;
              } else {
                $row->approved = 1;
              }
              $row->imgfilename = $newfilename;
              $row->imgthumbname = $newfilename;
              $row->useruploaded = 1;
              $row->ordering = $ordering;

              //Wenn im Backend die Vergabe von lfd. Nummern eingestellt wurde 
              //wird dem Bildtitel die lfd. Nummer (+1) hinzugefügt
              if ($jg_useruploadnumber) {
                $row->imgtitle = $row->imgtitle . '_' . $filecounter; 
              }              
              
              if (!$row->store()) {
                // this is a real issue, because if the database didn't work, the images are still out there
                // TODO Wenn die Datenbank nicht funktioniert, sind die Bilder trotzdem schon aufgenommen
                echo "<script> alert('" . $row->getError() . "'); window.history.go(-1); </script>\n";
                $isallok = $isallok+1;
                exit();
              } else {

                // E-Mail ueber ein neues Bild an die User, die global als User Email-Empfang
                // erlaubt haben TODO -> In Backend-Konfig einstellen bzw. deaktivieren

                /* TODO
                require_once("/administrator/components/com_messages/messages.class.php" );
                $database->setQuery("SELECT id
                    FROM #__users
                    WHERE sendEmail='1'");
                $users = $database->loadResultArray();
                foreach ($users as $user_id) {
                  $msg = new mosMessage($database);
                  $msg->send($my->id,
                  $user_id,
                  _JGS_NEW_PICTURE_UPLOADED,
                  sprintf( _JGS_NEW_CONTENT_SUBMITTED . " %s " . _JGS_TITLED ." %s.",
                  $my->username,
                  $row->imgtitle));
                }
                */

                echo _JGS_ALERT_PICTURE_SUCCESSFULLY_ADDED . '<br />';
                echo _JGS_NEW_FILENAME . ': ' . $newfilename . '<br /><br />';
              }
            } else {
              $isallok = $isallok+1;
              die(_JGS_WRONG_FILENAME);
            }
          } else {
            mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=showupload'._JOOM_ITEMID),_JGS_ALERT_INVALID_IMAGE_TYPE);
            $isallok = $isallok+1;
          }
        }
      }
    }
    if ( $isallok == 0 && $this->bugtest != 1 ) {
      $query = "SELECT name
          FROM #__joomgallery_catg
          WHERE cid=$catid";

      $catname = $this->Upload_DBQuery($query);
?>
    <p>
      <img src="<?php echo $mosConfig_live_site ?>/images/M_images/arrow.png" width="9" height="9" alt="arrow" />&nbsp;
      <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=showupload'._JOOM_ITEMIDX) ;?>">
        <?php echo _JGS_MORE_UPLOADS ;?>
      </a>
    </p>
    <p>
      <img src="<?php echo $mosConfig_live_site ?>/images/M_images/arrow.png" width="9" height="9" alt="arrow" />&nbsp;
      <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=userpanel'._JOOM_ITEMIDX) ;?>">
        <?php echo _JGS_BACK_TO_USER_PANEL ;?>
      </a>
    </p>
    <p>
      <img src="<?php echo $mosConfig_live_site ?>/images/M_images/arrow.png" width="9" height="9" alt="arrow" />&nbsp;
      <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;startpage=1'._JOOM_ITEMIDX); ?>">
        <?php echo _JGS_BACK_TO_GALLERY ?>
      </a>
    </p>
<?php
    }
  }


/**
* Dateinamen generieren.
* Beispiel: <Name/gen. Titel>_<ggf. filecounter>_<20071031>_<Random Zahl>.jpg
* @param $filename Original-Upload-Name z.B. 'malta.jpg'
* @param $tag Dateiendung z.B. '.jpg'
* @param $this->filecounter ggf. bei Batch und FTP Upload
*/
  function Upload_GenFilename ($filename,$tag,$filecounter = NULL) {
    $filedate = date("Ymd");
    //Neuen Startwert f?r Zufallszahl bestimmen
    mt_srand();
    $randomnumber = mt_rand(1000000000, 2099999999);

    //Suffix = $tag mit dem . entfernen
    //nur wenn in filename enthalten
    if (stristr($filename,$tag)) {
      $filename = substr($filename,0,strlen($filename)-strlen($tag)-1);
    }

    //Neuer Filename
    if ( $filecounter == NULL) {
      $newfilename = $filename.'_'.$filedate.'_'.$randomnumber.'.'.$tag;
    } else {
      $newfilename = $filename.'_'.$filecounter.'_'.$filedate.'_'.$randomnumber.'.'.$tag;
    }
    return $newfilename;
  }


/**
* DB-Eintrag fuer Bild erzeugen bzw. Abfragen an DB senden
* @param Query
* @param loadObject=false, wenn true Rueckgabe eines Objekts
* @return Ergebnis
*/
  function Upload_DBQuery ($query,$loadObject=false) {
    global $database;
    $database->setQuery($query);
    if ($loadObject) {
      $database->loadObject($result);
    } else {
      $result=$database->loadResult();
    }
    return $result;
  }

/**
* Ermittelt Odering gemäß Vorgabe in $jg_uploadorder
* @param $type = $jg_uploadorder ASC,DESC
* @param Kategorie ID
* @return neues ordering
*/
  function Upload_GetOrdering ($type,$catid) {
    switch ($type) {
      case 1:
        $query = "SELECT MIN(ordering)-1
            FROM #__joomgallery
            WHERE catid=$catid ";
        $result = $this->Upload_DBQuery($query); //TODO Ordering <0 erlaubt???
        break;
      case 2:
        $query = "SELECT MAX(ordering)+1
              FROM #__joomgallery
              WHERE catid=$catid ";
        $result = $this->Upload_DBQuery($query);
        break;
      default;
        $result = 0;
        break;
    }
    if ($result == NULL) {
      $result = 0;
    }
    return $result;
  }

}
?>
