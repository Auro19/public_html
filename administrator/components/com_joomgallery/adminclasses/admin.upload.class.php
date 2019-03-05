<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/adminclasses/admin.upload.class.php $
// $Id: admin.upload.class.php 396 2009-03-15 16:06:21Z aha $
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
* Upload Funktionen fuer das Backend 
* - Batch
* - FTP
* - Einzelupload
* - JAVA Applet (jupload)
*/
defined('_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.');

class Joom_Upload {

  var $bugtest;
  var $gentitle;
  var $gendesc;
  var $photocred;
  var $filecounter;
  var $file_delete;
  var $original_delete;
  var $create_special_gif;
  var $arrscreenshot;
  var $zippack;
  var $ftpfiles;
  var $subdirectory;
  var $imgname_separator;

/**
* Konstruktor
* @param Task
* @param Kategorie ID
*/
function Joom_Upload($task, $catid) {
  global $database,$my;

  $this->subdirectory        = mosGetParam($_POST, 'subdirectory', '/');
  $this->bugtest             = intval( mosGetParam( $_REQUEST, 'bugtest', 0) );
  $this->gentitle            = mosGetParam($_POST, 'gentitle', '');
  $this->gendesc             = Joom_FixUserEntrie(mosGetParam($_REQUEST, 'gendesc', ''));
  $this->photocred           = Joom_FixUserEntrie(mosGetParam($_REQUEST, 'photocred', ''));
  
  $this->filecounter         = mosGetParam($_POST, 'filecounter', '');
  $this->file_delete         = mosGetParam($_POST, 'file_delete', '');
  $this->original_delete     = mosGetParam($_POST, 'original_delete', '');
  $this->create_special_gif  = mosGetParam($_POST, 'create_special_gif', '');
  $this->arrscreenshot       = mosGetParam($_FILES, 'arrscreenshot', '');
  $this->zippack             = mosGetParam($_FILES, 'zippack', '');
  $this->ftpfiles            = mosGetParam($_POST, 'ftpfiles', '');
  
  $this->imgname_separator   = '_';//konfigurierbar machen?

  switch($task) {
    //Upload von bis zu 10 Bildern im Backend
    case 'uploadhandler':
      $this->Upload_Singles_Backend($catid);
      break;
    //Upload eines ZIP mit Bildern
    case 'batchuploadhandler':
      $this->Upload_Batch($catid);
      break;
    //Verarbeitung von Bildern, die vorher per FTP uebertragen worden sind
    case 'ftpuploadhandler':
      $this->Upload_FTP($catid);
      break;
    //Upload ueber das JUpload Applet im Backend
    case 'juploadhandler_receive':
      $this->Upload_AppletReceive_Backend($catid);
      break;
    default:
      die('Wrong Task');
      break;
  }
}

/**
* Batch Upload
* Bilder aus ZIP-Archiv extrahieren und einer Kategorie zuordnen
* @param Kategorie ID
*/
function Upload_Batch($catid) {
  global $database,$mosConfig_absolute_path,$absolut_originalpath,$absolut_picturepath,
         $absolut_thumbnailpath,$my,$jg_pathtemp,$jg_filenamenumber,$jg_pathoriginalimages,
         $jg_useorigfilename,$jg_useforresizedirection,$jg_thumbwidth,
         $jg_thumbheight,$jg_thumbcreation,$jg_thumbquality,$jg_thumbquality,
         $jg_delete_original,$jg_uploadorder,$jg_resizetomaxwidth,$jg_maxwidth;

  if (is_dir($mosConfig_absolute_path . '/' . $jg_pathtemp)) {
    $temp_dir = $jg_pathtemp;
  } else {
    echo "<script> alert('"._JGA_ERROR_TEMP_MISSING."'); </script>\n";
    exit();
  }

  // include zip class
  if (file_exists($mosConfig_absolute_path . '/administrator/classes/pclzip.lib.php')) {
    require_once($mosConfig_absolute_path . '/administrator/classes/pclzip.lib.php');
  } else {
    require_once($mosConfig_absolute_path . '/administrator/includes/pcl/pclzip.lib.php');
  }

  //check existence of uploaded zip
  if (!file_exists($this->zippack["tmp_name"])) {
      echo "<script> alert('"._JGA_ERROR_FILE_NOT_UPLOADED."'); window.history.go(-1); </script>\n";
      exit();
  }
  
  //CREATE ZIP OBJECT, MAKE ARRAY CONTAINING FILE INFO, AND EXTRACT FILES TO TEMPORARY LOCATION
  $this->zippack = $this->zippack["tmp_name"];
  $zipfile = new PclZip($this->zippack);
  $ziplist = $zipfile->listContent();
  $zipfile->extract(PCLZIP_OPT_PATH,$mosConfig_absolute_path . '/' .$temp_dir,PCLZIP_OPT_REMOVE_ALL_PATH);
  
  //check error code of extraction
  if ($zipfile->error_code != 1) {
    $ziperror=str_replace("'","",$zipfile->errorInfo());
    echo "<script> alert('".$ziperror."'); window.history.go(-1); </script>\n";    
    exit();
  }

  echo '<p />';

  $sizeofzip = sizeof($ziplist);

  // FOR EACH FILE EXTRACTED FROM THE ZIP - GET ORIGINAL FILENAME, CREATE UNIQUE FILENAME,
  // COPY TO NEW LOCATION, DELETE FILE IN TEMP LOCATION, MAKE THUMBNAIL, AND ADD TO DATABASE
  echo '---------------------------------<br />' . "\n";
  echo $sizeofzip . ' ' . _JGA_FILES_IN_BATCH . '<br />' . "\n";
  echo '---------------------------------<br />' . "\n";
  usort($ziplist, "Joom_SortBatch");
  $ziplist = array_reverse($ziplist);

  // Wenn $jg_filenamenumber ungleich 0, wird eine lfd. Nummer vergeben
  // und Bestandteil des Dateinamens
  // sonst ist dies nicht freigeschaltet

  if( $jg_filenamenumber != 0 ) {
    if( $this->filecounter != 0 ) {  //im Backend wurde Startwert gesetzt
      if( ($this->filecounter - $sizeofzip) < 0 ) {
        $this->filecounter = $sizeofzip;
      }
    } elseif ( $this->filecounter <= 0 ) {
      $this->filecounter = 1;
    } else {
      $this->filecounter = $sizeofzip;
    }
  }
  
  //Pfad der Kategorie feststellen
  $catpath = Joom_GetCatPath($catid);
    
  for ($i=0; $i < $sizeofzip; $i++) {
    $origfilename = $ziplist[$i]['filename'];
    $fileextension = strtolower(ereg_replace('.*\.([^\.]*)$', '\\1', $origfilename));
    if ( $jg_filenamenumber == 1) {
      $picserial = $this->filecounter;
      $this->filecounter++;
    }
    //Check for path exploits, and replace spaces
    if ( $jg_useorigfilename ) {
      //TODO JoomFixCatname, weil es laengere Namen erzeugt
      $compacttitle = Joom_FixFilename($origfilename,1);
    } else {
      $compacttitle = Joom_FixFilename($this->gentitle);
    }
    if( $jg_filenamenumber > 0 ) {
      $newfilename = $this->Upload_GenFilename($compacttitle,$fileextension,$picserial);
    } else {
      $newfilename = $this->Upload_GenFilename($compacttitle,$fileextension);
    }

    echo '<hr /><br />' . "\n";
    echo _JGA_FILENAME . '&#35;';

    echo "$origfilename <br />\n";

    echo _JGA_NEW_FILENAME . ": $newfilename <br />";

    //Verschieben des Bildes aus dem temp-Verzeichnis in den Originals-Ordner
    if (Joom_MoveFile($mosConfig_absolute_path . "/$temp_dir/$origfilename",
                      $mosConfig_absolute_path . $jg_pathoriginalimages.'/'.$catpath ,
                      $newfilename)) {

      //Rechte auf 644 setzen
      chmod($absolut_originalpath.$catpath.$newfilename, octdec('644'));
      echo _JGA_UPLOAD_START . '<br />';
    } else {
      die(_JGA_PROBLEM_COPYING . ': ' . $absolut_originalpath . '. ' . _JGA_CHECK_PERMISSIONS);
    }
    echo _JGA_UPLOAD_COMPLETE . '<br />';

    //Thumb aus dem Originalbild erstellen
    Joom_ResizeImage($absolut_originalpath.$catpath.$newfilename,
                     $absolut_thumbnailpath.$catpath.$newfilename,
                     $jg_useforresizedirection, $jg_thumbwidth, $jg_thumbheight,
                     $jg_thumbcreation, $jg_thumbquality);
    echo _JGA_THUMBNAIL_CREATED . '<br />';

    //Detailbild aus dem Originalbild erstellen
    if ($jg_resizetomaxwidth) {
      Joom_ResizeImage($absolut_originalpath.$catpath.$newfilename,
                       $absolut_picturepath.$catpath.$newfilename,
                       false, $jg_maxwidth, false,$jg_thumbcreation,
                       $jg_thumbquality, true);
      echo _JGA_RESIZED_TO_MAXWIDTH . '...<br />';
    }
    if($jg_delete_original == 1 || ($jg_delete_original== 2 && $this->original_delete==1)) {
      //ggf. Originalbild l?schen
      if(Joom_RemoveOrigFile($catpath.$newfilename)) {
        echo _JGA_ORIGINAL_DELETED . '<br />';
      }
      else {
        die(_JGA_PROBLEM_DELETING_ORIGINAL . ': ' . $absolut_originalpath . ' ' . _JGA_CHECK_PERMISSIONS);
     }
    }
    //Neuen Eintrag f?r ordering suchen
    $ordering = $this->Upload_GetOrdering($jg_uploadorder,$catid);

    if ( $jg_useorigfilename ) {
      $fileextensionlength = strlen($fileextension);
      $filenamelength = strlen($origfilename);
      $imgname = substr($origfilename,-$filenamelength,-$fileextensionlength-1);
    } else {
      if ($jg_filenamenumber > 0 && $jg_uploadorder) {// Nummerierung im Bildtitel evtl. unabhaengig von jg_uploadorder machen?
        #$counter = $this->filecounter-1;
        $imgname = $this->gentitle.$this->imgname_separator.$picserial;
      } else {
        $imgname = $this->gentitle;
      }
    }
    $batchtime = mktime();
    $database->setQuery( "INSERT INTO #__joomgallery(id, catid, imgtitle, imgauthor,
        imgtext, imgdate, imgcounter, imgvotes,
        imgvotesum, published, imgfilename, imgthumbname,
        checked_out,owner,approved, ordering)
        VALUES
        (NULL, '$catid', '$imgname', '$this->photocred',
        '$this->gendesc', '$batchtime', '0', '0',
        '0', '1', '$newfilename', '$newfilename',
        '0', '$my->id', 1, '$ordering')");
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
      exit();
    }
  }
  echo '<hr /><br />' . "\n";
  if($this->bugtest!=1) {
    mosRedirect("index2.php?option=com_joomgallery&act=batchupload",_JGA_UPLOAD_SUCCESSFULL);
  }

}

/**
* FTP Upload
* mehrere Bilder werden in den FTP-Upload-Ordner (einstellbar im Backend)
* uebertragen
* und diese dann einer Kategorie zugeordnet
* HTML: Joom_ShowFTPUpload
* @param Kategorie ID
*/
function Upload_FTP ($catid) {
  global $database,$mosConfig_absolute_path,$absolut_originalpath,
         $absolut_picturepath,$absolut_thumbnailpath,$my,$jg_uploadorder,
         $jg_useorigfilename,$jg_useforresizedirection,$jg_thumbwidth,$jg_filenamenumber,
         $jg_thumbheight,$jg_delete_original,$jg_thumbcreation,$jg_thumbquality,
         $jg_maxwidth,$jg_resizetomaxwidth,$jg_uploadorder,$jg_pathftpupload;

  $sizeftpfiles = sizeof($this->ftpfiles);

  if( $jg_uploadorder != 0 ) {
    if( $this->filecounter != 0 ) {  //im Backend wurde Startwert gesetzt
      if( ($this->filecounter - $sizeftpfiles) < 0 ) {
        $this->filecounter = $sizeftpfiles;
      } elseif ( $this->filecounter <= 0 ) {
        $this->filecounter = 1;
      }
    } else {
      $this->filecounter = $sizeftpfiles;
    }
  }
  
  //Kategorieunterordner feststellen
  $catpath = Joom_GetCatPath($catid);

  foreach ($this->ftpfiles as $screenshot_name) {
    //Filecounter bestimmen
    switch ( $jg_uploadorder ) {
      case 0:
        break;
      case 1:
        $picserial = $this->filecounter;
        $this->filecounter--; //Descending
        break;
      case 2:
        $picserial = $this->filecounter;
        $this->filecounter++; //Ascending
        break;
      default:
        break;
    }

    $fileextension = strtolower(ereg_replace('.*\.([^\.]*)$', '\\1', $screenshot_name));

    if ( $jg_useorigfilename ) {
      $compacttitle = Joom_FixFilename($screenshot_name, 1);
    } else {
      $compacttitle = Joom_FixFilename($this->gentitle);
    }
    if( $jg_uploadorder != 0 ) {
      $newfilename = $this->Upload_GenFilename($compacttitle,$fileextension,$picserial);
    } else {
      $newfilename = $this->Upload_GenFilename($compacttitle,$fileextension);
    }


    echo '<p />';
    echo "$screenshot_name<br />";

    //Thumbnail erzeugen
    Joom_ResizeImage($mosConfig_absolute_path.$jg_pathftpupload.'/'.$this->subdirectory.$screenshot_name,
                     $absolut_thumbnailpath.$catpath.$newfilename,
                     $jg_useforresizedirection,$jg_thumbwidth, $jg_thumbheight,
                     $jg_thumbcreation, $jg_thumbquality);

    echo _JGA_THUMBNAIL_CREATED . '<br />';

    //Detailbild erzeugen, nur wenn maxwidth vorgegeben wurde
    //und ein jpg vorliegt
    if ($jg_resizetomaxwidth  && ($this->create_special_gif!=1 ||
       ($fileextension!='gif' && $fileextension!='png'))) {
      Joom_ResizeImage($mosConfig_absolute_path. $jg_pathftpupload.'/'.$this->subdirectory.$screenshot_name,
                       $absolut_picturepath.$catpath.$newfilename,
                       false, $jg_maxwidth,false, $jg_thumbcreation,
                       $jg_thumbquality, true);

      echo _JGA_RESIZED_TO_MAXWIDTH . '...<br />';
    } else {
      //sonst nur das Bild kopieren
      Joom_CopyFile($mosConfig_absolute_path. $jg_pathftpupload.'/'.$this->subdirectory.$screenshot_name,
                    $absolut_picturepath.$catpath, $newfilename);
      chmod($absolut_picturepath.$catpath.$newfilename, octdec('644'));
    }

    //Soll das Bild in Originale angelegt werden?
    if(!($jg_delete_original == 1 || ($jg_delete_original== 2 && $this->original_delete==1))) {
      //Originalbild soll angelegt werden
      //wenn Datei aus dem Upload-Verzeichnis gel?scht werden soll
      //dieses in das Originale-Verzeichnis verschieben
      if ($this->file_delete == 1) {
        if (!Joom_MoveFile($mosConfig_absolute_path. $jg_pathftpupload.'/'.$this->subdirectory.$screenshot_name,
                           $absolut_originalpath.$catpath,$newfilename)) {
          echo _JGA_COULD_NOT_DELETE_PICTURE . '<br />';
          $this->bugtest=1;
          continue;
        } else {
          chmod($absolut_originalpath.$catpath.$newfilename, octdec('644'));
        }
      } else {
        //Datei aus dem Upload-Verzeichnis nicht l?schen, kopieren in das
        //Originale-Verzeichnis
        if (Joom_CopyFile($mosConfig_absolute_path. $jg_pathftpupload.'/'.$this->subdirectory.$screenshot_name,
                          $absolut_originalpath.$catpath,$newfilename)) {
          chmod($absolut_originalpath.$catpath.$newfilename, octdec('644'));
        } else {
          $this->bugtest=1;
          echo _JGA_WRONG_FILENAME;
          continue;
        }
      }
    } else {
      //Originalbild soll nicht angelegt werden
      //ggf. Bild aus dem Upload-Verzeichnis l?schen
      if ($this->file_delete == 1) {
        if (!Joom_RemoveFile($screenshot_name, $mosConfig_absolute_path. $jg_pathftpupload.'/'.$this->subdirectory)) {
          echo _JGA_COULD_NOT_DELETE_PICTURE . '<br />';
          $this->bugtest=1;
          continue;
        }
      }
    }

    $ordering = $this->Upload_GetOrdering ($jg_uploadorder,$catid);

    if ( $jg_useorigfilename ) {
      $fileextensionlength = strlen($fileextension);
      $filenamelength = strlen($screenshot_name);
      $imgname = substr($screenshot_name,-$filenamelength,-$fileextensionlength-1);
    } else {
      if ($jg_filenamenumber > 0 && $jg_uploadorder) {// Nummerierung im Bildtitel evtl. unabhaengig von jg_uploadorder machen?
        $imgname = $this->gentitle.$this->imgname_separator.$picserial;
      } else {
        $imgname = $this->gentitle;
      }
    }

    // Datenbankeintrag erzeugen - insert into database
    $batchtime = mktime();
    $database->setQuery( "INSERT INTO #__joomgallery(id, catid, imgtitle, imgauthor,
                         imgtext, imgdate, imgcounter, imgvotes,
                         imgvotesum, published, imgfilename, imgthumbname,
                         checked_out,owner,approved, ordering)
                         VALUES
                         (NULL, '$catid', '$imgname', '$this->photocred',
                         '$this->gendesc', '$batchtime', '0', '0',
                         '0', '1', '$newfilename', '$newfilename',
                         '0', '$my->id', 1, '$ordering')");

    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
      exit();
    }
  }
  if($this->bugtest!=1) {
    mosRedirect("index2.php?option=com_joomgallery&act=ftpupload&batchul=1",_JGA_UPLOAD_SUCCESSFULL);
  }
}

/**
* Backend Einzelupload
* Bis zu 10 Bilder werden ausgew?hlt und hochgeladen
* @param Kategorie ID
*/
function Upload_Singles_Backend ($catid) {
  global $database,$absolut_originalpath,$absolut_picturepath,$absolut_thumbnailpath,
         $my,$jg_useorigfilename,$jg_useforresizedirection,$jg_thumbwidth,
         $jg_thumbheight,$jg_delete_original,$jg_thumbcreation,$jg_thumbquality,
         $jg_maxwidth,$jg_resizetomaxwidth,$jg_uploadorder;
    
  //Kategorieunterordner feststellen
  $catpath = Joom_GetCatPath($catid);
  
  for ($i=0; $i < 10; $i++) {
    echo '<hr />';
    $pos=$i+1;
    echo 'verarbeite Bild an Position: '.$pos.'<br />';
    //Befindet sich an der Position ein Bild
    //wenn nein, ueberspringen
    if (empty($this->arrscreenshot["tmp_name"][$i])) {
      echo 'Kein Eintrag an Position: '.$pos.'<br />';
      continue;
    }
    if ($this->arrscreenshot["error"][$i] > 0) {
      echo 'Upload-Fehler bei Bild: '.$ipos.'<br />';
      $this->Upload_CheckError($this->arrscreenshot["error"][$i]);
      $this->bugtest=1;
      continue;
    }

    $screenshot=$this->arrscreenshot["tmp_name"][$i];
    $screenshot_name=$this->arrscreenshot["name"][$i];
    $screenshot_name = Joom_FixFilename($screenshot_name);
    echo '<p />';

    $tag = ereg_replace('.*\.([^\.]*)$', '\\1', $screenshot_name);
    $tag = strtolower($tag);

    //Neuen Dateinamen generieren
    //wenn generischer Titel eingestellt ist, diesen verwenden
    if ( $jg_useorigfilename ) {
      $screenshot_name = Joom_FixFilename($screenshot_name);
      $newfilename = $this->Upload_GenFilename($screenshot_name,$tag);
    } else {
      $screenshot_name = Joom_FixFilename($this->gentitle);
      $newfilename = $this->Upload_GenFilename($screenshot_name,$tag);
    }

    //hochgeladenes Bild in Originale-Ordner verschieben
    if ((($tag == 'jpeg') || ($tag == 'jpg') || ($tag == 'jpe') || ($tag == 'gif') || ($tag == 'png'))
        && strlen($screenshot) > 0 && $screenshot != 'none'
        && Joom_MoveUploadedFile($screenshot,$absolut_originalpath.$catpath.$newfilename)) {
      chmod($absolut_originalpath.$catpath.$newfilename, octdec('644'));

      //Thumbnail erstellen
      Joom_ResizeImage($absolut_originalpath.$catpath.$newfilename,
                       $absolut_thumbnailpath.$catpath.$newfilename,
                       $jg_useforresizedirection, $jg_thumbwidth, $jg_thumbheight,
                       $jg_thumbcreation, $jg_thumbquality);
      echo _JGA_THUMBNAIL_CREATED . '<br />';

      //ggf. Detailbild erstellen
      if ($jg_resizetomaxwidth && ($this->create_special_gif!=1 || ($tag!='gif' && $tag!='png'))) {
        Joom_ResizeImage($absolut_originalpath.$catpath.$newfilename,
                         $absolut_picturepath.$catpath.$newfilename, false,
                         $jg_maxwidth, false, $jg_thumbcreation, $jg_thumbquality, true);
        echo _JGA_RESIZED_TO_MAXWIDTH . '...<br />';
      } else {
        Joom_CopyFile($absolut_originalpath.$catpath.$newfilename,
                      $absolut_picturepath.$catpath, $newfilename);
        chmod($absolut_picturepath.$catpath, $newfilename, octdec('644'));
      }

      if($jg_delete_original == 1 || ($jg_delete_original== 2 && $this->original_delete==1)) {
        //Entfernen des Bildes aus dem Originale-Ordner, wenn gew?nscht
        if(Joom_RemoveOrigFile($catpath.$newfilename)) {
          echo _JGA_ORIGINAL_DELETED . '<br />';
        } else {
          die(_JGA_PROBLEM_DELETING_ORIGINAL . ': ' . $absolut_originalpath . ' ' . _JGA_CHECK_PERMISSIONS);
        }
      }

      //Neuen Eintrag fuer ordering suchen
      $ordering = $this->Upload_GetOrdering($jg_uploadorder,$catid);

      // Datenbankeintrag erzeugen - insert into database
      //Timestamp ermitteln
      $batchtime = mktime();
      if ( $jg_useorigfilename ) {
        $fileextensionlength = strlen($tag);
        $filenamelength = strlen($screenshot_name);
        $imgname = substr($screenshot_name,-$filenamelength,-$fileextensionlength-1);
      } else {
        $imgname = $this->gentitle;
      }
      $query= "INSERT INTO #__joomgallery(id, catid, imgtitle, imgauthor,
          imgtext, imgdate, imgcounter, imgvotes,
          imgvotesum, published, imgfilename, imgthumbname,
          checked_out,owner,approved, ordering)
          VALUES
          (NULL, '$catid', '$imgname', '$this->photocred',
          '$this->gendesc', '$batchtime', '0', '0',
          '0', '1', '$newfilename', '$newfilename',
          '0', '$my->id', 1, '$ordering')";

      $result = $database->setQuery($query);

      if (!$database->query()) {
          echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
        exit();
      }
    } else {
      echo _JGA_WRONG_FILENAME ;
    }
  }
  if($this->bugtest!=1) {
    mosRedirect("index2.php?option=com_joomgallery&act=upload&batchul=1",_JGA_UPLOAD_SUCCESSFULL);
  }
}


/**
* Backend Appletupload
* @param Kategorie ID
*/
function Upload_AppletReceive_Backend ($catid) {
  global $database,$absolut_originalpath,$absolut_picturepath,$absolut_thumbnailpath,
         $my,$jg_useorigfilename,$jg_useforresizedirection,$jg_thumbwidth,
         $jg_thumbheight,$jg_delete_original,$jg_thumbcreation,$jg_thumbquality,
         $jg_maxwidth,$jg_resizetomaxwidth,$jg_uploadorder,$jg_pathtemp;

  //ueber den Text JOOMGALLERYUPLOADERROR erkennt das Applet einen Fehler im
  //Upload und gibt diesen als JS-Alert aus
         
  //allgemeine Voraussetzungen pruefen
  //keine catid
  if ($catid == 0) {
    echo('JOOMGALLERYUPLOADERROR '._JGA_JUPLOAD_YOU_MUST_SELECT_CATEGORY);
    die;
  }
  //kein allgemeiner Titel
  if (!$jg_useorigfilename && empty($this->gentitle)) {
    echo('JOOMGALLERYUPLOADERROR '._JGA_JUPLOAD_PICTURE_MUST_HAVE_TITLE);
    die;   
  }
  //Kategorieunterordner feststellen
  $catpath = Joom_GetCatPath($catid);         

  //Bilder verarbeiten
  foreach ($_FILES as $file => $fileArray) {
    //Wenn 'Originale l�schen' im Backend eingestellt ist und das Bild resized
    //werden soll, erfolgt dies lokal im Applet. Dann wird nur das Detailbild
    //hochgeladen, der Zielpfad muss entsprechend eingestellt werden
    if ($jg_delete_original && $jg_resizetomaxwidth) {
      $no_original = true;
      $absolutpath = $absolut_picturepath;
    } else {
      $no_original = false;      
      $absolutpath = $absolut_originalpath;      
    }
    
    $screenshot=$fileArray["tmp_name"];
    $screenshot_name=$fileArray["name"];
    $screenshot_name = Joom_FixFilename($screenshot_name);

    $tag = ereg_replace('.*\.([^\.]*)$', '\\1', $screenshot_name);
    $tag = strtolower($tag);

    //Neuen Dateinamen generieren
    //wenn generischer Titel eingestellt ist, diesen verwenden
    if ( $jg_useorigfilename ) {
      $screenshot_name = Joom_FixFilename($screenshot_name);
      $newfilename = $this->Upload_GenFilename($screenshot_name,$tag);
    } else {
      $screenshot_name = Joom_FixFilename($this->gentitle);
      $newfilename = $this->Upload_GenFilename($screenshot_name,$tag);
    }

    //hochgeladenes Bild in Zielordner (Detail oder Original) verschieben
    if (strlen($screenshot) > 0 && $screenshot != 'none') {
      
      Joom_MoveUploadedFile($screenshot, $absolutpath.$catpath.$newfilename);
      chmod($absolutpath.$catpath.$newfilename, octdec('644'));

      //Thumbnail erstellen
      Joom_ResizeImage($absolutpath.$catpath.$newfilename,
                       $absolut_thumbnailpath.$catpath.$newfilename,
                       $jg_useforresizedirection, $jg_thumbwidth, $jg_thumbheight,
                       $jg_thumbcreation, $jg_thumbquality);
      
      echo _JGA_THUMBNAIL_CREATED."\n";

      //ggf. Detailbild erstellen
      //nicht, wenn im Backend 'Original l�schen' und die Gr��en�nderung 
      //eingestellt ist. Dann wurde durch das Applet bereits die Gr��en�nderung 
      //vorgenommen und nur das Detailbild hochgeladen
      if (!$no_original) {
        if ($jg_resizetomaxwidth && ($this->create_special_gif != 1 || ($tag != 'gif' && $tag != 'png'))) {
          Joom_ResizeImage($absolutpath.$catpath.$newfilename,
                           $absolut_picturepath.$catpath.$newfilename, false,
                           $jg_maxwidth, false, $jg_thumbcreation, $jg_thumbquality, true);
          echo _JGA_RESIZED_TO_MAXWIDTH."\n";
        } else {
          Joom_CopyFile($absolutpath.$catpath.$newfilename,
                        $absolut_picturepath.$catpath, $newfilename);
          chmod($absolut_picturepath.$catpath, $newfilename, octdec('644'));
        }
      }
      //Originalbild nur l�schen, wenn dies im Uploadfenster aktiviert wurde
      //nicht bei entsprechender Einstellung im Backend
      if($jg_delete_original== 2 && $this->original_delete==1) {
        if(Joom_RemoveOrigFile($catpath.$newfilename)) {
          echo _JGA_ORIGINAL_DELETED;
        } else {
          echo('JOOMGALLERYUPLOADERROR '. 
              _JGA_PROBLEM_DELETING_ORIGINAL . 
              ': ' . 
              $absolut_originalpath . 
              ' ' . 
              _JGA_CHECK_PERMISSIONS);
          die;
        }
      }

      //Neuen Eintrag f�r ordering suchen
      $ordering = $this->Upload_GetOrdering($jg_uploadorder,$catid);

      // Datenbankeintrag erzeugen - insert into database
      //Timestamp ermitteln
      $batchtime = mktime();
      if ( $jg_useorigfilename ) {
        $fileextensionlength = strlen($tag);
        $filenamelength = strlen($screenshot_name);
        $imgname = substr($screenshot_name,-$filenamelength,-$fileextensionlength-1);
      } else {
        $imgname = $this->gentitle;
      }
      $query= "INSERT INTO #__joomgallery(id, catid, imgtitle, imgauthor,
          imgtext, imgdate, imgcounter, imgvotes,
          imgvotesum, published, imgfilename, imgthumbname,
          checked_out,owner,approved, ordering)
          VALUES
          (NULL, '$catid', '$imgname', '$this->photocred',
          '$this->gendesc', '$batchtime', '0', '0',
          '0', '1', '$newfilename', '$newfilename',
          '0', '$my->id', 1, '$ordering')";

      $result = $database->setQuery($query);

      if (!$database->query()) {
        echo('JOOMGALLERYUPLOADERROR '. $database->getErrorMsg());
        die;
      }
    } else {
      echo('JOOMGALLERYUPLOADERROR '._JGA_WRONG_FILENAME);
      die;
    }
  }
  //Die folgenden Zeilen so stehen lassen, sonst erkennt das Applet nicht den
  //erfolgreichen Upload und gibt eine Fehlermeldung aus  
  echo "\r\nJOOMGALLERYUPLOADSUCCESS";
  exit;
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
  //Neuen Startwert f�r Zufallszahl bestimmen
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
* Ermittelt Odering gemaess Vorgabe in $jg_uploadorder
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

/**
* analysiert die Fehlercodes
* und gibt entsprechenden Text aus
* @param errorcode
*/
function Upload_CheckError ($uploaderror) {
  $uploadErrors = array(

  );
  if (in_array($uploaderror, $uploadErrors)) {
    echo _JGA_ERROR_CODE . $uploadErrors[$uploaderror] . '<br />';
  } else {
    echo _JGA_ERROR_CODE . _JGA_ERROR_UNKNOWN . ' <br />';
  }
}

}
?>
