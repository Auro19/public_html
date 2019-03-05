<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/joom.specialimages.php $
// $Id: joom.specialimages.php 396 2009-03-15 16:06:21Z aha $
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

/******************************************************************************\
**   This Script was build by using some code-pieces from the                 **
**   watermark.php by Brock Ferguson, the securityimages tutorial             **
**   by Edwart Eliot both http://www.sitepoint.com, and some                  **
**   code-pieces from the watermark.php by Michael Mueller,                    **
**   http://www.php4u.net                                                     **
**   Thanks!                                                                  **
\******************************************************************************/

# Don't allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.');

class Joom_SpecialImages {

  function Joom_CreateWatermark($id, $catid,$orig=0) {
    global $my, $jg_bigpic, $jg_watermark, $jg_showdetailpage;
    ob_clean();

    //Get Filename from database || Dateinamen aus der Datenbank holen
    $filename = $this->Joom_GetFilename($id);
    //Checks permission with configuration of JoomGallery || ueberprueft die Berechtigung anhand der Konfiguration der JoomGallery
    if($filename == "" || $jg_watermark == 0 || ($jg_bigpic==1 && $my->gid<1 && $orig==1) || ($jg_showdetailpage==0 && $my->gid<1)) {
//      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID), _JGS_ALERT_NOT_ALLOWED_VIEW_PICTURE );
?>
      <script>
        alert('<?php echo _JGS_ALERT_NOT_ALLOWED_VIEW_PICTURE;?>');
        document.location.href
        = '<?php echo sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID); ?>';
      </script>
<?php
    }

    //Disable caching for original files || Verbietet das Cachen von Originalbildern
    $cache = "nocache";
    //Quality of file if it is a jpeg || Qualitaet der jpegs
    $quali = 95;
    //Updates counter || Counter wird erhoeht
    if($orig!=1) {
      $this->Joom_Counter($id);
      $cache = "cache";
      $quali = 80;
    }

    //Defines imagepath || Definiert den richtigen Pfad zu dem Bild
    $file = $this->Joom_GetPath($orig, $jg_bigpic, $catid).$filename;
    //Checks if image is existend || Ueberprueft ob das Bild auch vorhanden ist
    $this->Joom_CheckFile($file);
    //Defines mimetyp || Definiert Mimetyp
    $mime = $this->Joom_CheckMime($file);
    //Checks if image is animated gif and stops including watermark || Ueberprueft ob das Bild ein animiertes gif ist und fuegt das Wasserzeichen nicht hinzu

    if($this->Joom_CheckAniGif($file)) {
      $this->Joom_Output($file, $filename, "cache", $mime, "inline", "file");
    } else {
      //includes the watermark into the file || Fuegt das Wasserzeichen zu dem Bild hinzu
      $file = $this->Joom_IncWatermark($file);
      $this->Joom_Output($file, $filename, $cache, $mime, "inline", "image", $quali);
    }
  }


  function Joom_CreateDownload($id, $orig=0, $catid) {
    global $my, $jg_showdetaildownload, $jg_downloadfile, $jg_downloadwithwatermark, $jg_showdetailpage, $secondoption, $catid;
    ob_clean();

    //Get Filename from database || Dateinamen aus der Datenbank holen
    $filename = $this->Joom_GetFilename($id);

    //Checks permission with configuration of JoomGallery || ueberprueft die Berechtigung anhand der Konfiguration der JoomGallery
    if($filename == ""
        || ((($jg_showdetaildownload == 0)
        || ($jg_showdetaildownload==1 && $my->gid<1)
        || ($jg_showdetaildownload==2 && $my->gid<2)
        || ($jg_showdetailpage==0 && $my->gid<1))
        && (($jg_showcategorydownload == 0)
        || ($jg_showcategorydownload==1 && $my->gid<1)
        || ($jg_showcategorydownload==2 && $my->gid<2)))) {
//     mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID), _JGS_ALERT_NOT_ALLOWED_VIEW_PICTURE );
?>
      <script>
        alert('<?php echo _JGS_ALERT_NOT_ALLOWED_VIEW_PICTURE;?>');
        document.location.href
        = '<?php echo sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID); ?>';
      </script>
<?php
    }

    //Defines variable for function Joom_GetPath() with joomconfig. This is important for chosing the right imgagepath.
    //Definiert eine Variable fuer die Funktion Joom_GetPath() anhand der Joomconfig. Dies ist wichtig um den richtigen Bildpfad zu bestimmen.
    //Download originals, or if not available download normal image || Laedt das Originalbild runter oder, wenn nicht vorhanden, das normale Bild
    if($jg_downloadfile==2 && $this->Joom_CheckFile($this->Joom_GetPath(1,1, $catid).$filename,0)) {
      $secondoption=1;
    //Donwload only original or exit phpscript || Nur das Originalbild herunterladen, oder das PHP Script wird beendet
    } elseif($jg_downloadfile==1) {
      if($this->Joom_CheckFile($this->Joom_GetPath(1,1,$catid).$filename)) {
        $secondoption=1;
      } else {
        exit();
      }
    //Download the normal image || Das normale Bild herunterladen
    } else {
      $secondoption=0;
    }

    //Defines imagepath || Definiert den richtigen Pfad zu dem Bild
    $file = $this->Joom_GetPath(1, $secondoption, $catid).$filename;
    //Defines mimetyp || Definiert den Mimetyp
    $mime = $this->Joom_CheckMime($file);
    //includes the watermark into the file || Fuegt das Wasserzeichen zu dem Bild hinzu
    if($jg_downloadwithwatermark==1 && !$this->Joom_CheckAniGif($file)) {
      $file = $this->Joom_IncWatermark($file);
      $image="image";
    } else {
      $image="file";
    }
    //Writes the output of the image || Schreibt den Code zur Generierung des Bildes
    $this->Joom_Output($file, $filename, "nocache", $mime, "attachment", $image);
  }

  function Joom_GetFilename($id) {
    global $database, $my;
    //Database Query for access || Ueberprueft die Zugangsberechtigung fuer dieses Bild
    $database->setQuery("SELECT c.access
        FROM #__joomgallery_catg as c
        LEFT JOIN #__joomgallery as a ON a.catid = c.cid
        WHERE a.id= '$id'");
    $c_access=$database->loadResult();
    if ( $my->gid < $c_access ) {
//      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID), _JGS_ALERT_NOT_ALLOWED_VIEW_PICTURE );
?>
      <script>
        alert('<?php echo _JGS_ALERT_NOT_ALLOWED_VIEW_PICTURE;?>');
        document.location.href
        = '<?php echo sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID); ?>';
      </script>
<?php
    }

    //Gets filename from database if access is is allowed || Ist der Zugriff erlaubt, wird der Dateinamen aus der Datenbank geholt
    $database->setQuery("SELECT imgfilename
        FROM #__joomgallery
        WHERE published='1' AND approved='1' AND id='$id'");

    return $database->loadResult();
  }


  function Joom_Counter($id) {
    global $database;

    if ($this->Joom_Check_Countstop($id) == true) return;

    //Gets gits from database || Holt die Anzahl der Zugriffe aus der Datenbank
    $database->setQuery("SELECT imgcounter
        FROM #__joomgallery
        WHERE id='$id'");

    //Increases counter || Erhoeht den Zaehler
    $imgcounter = $database->loadResult()+1;
    //Puts new counter in the database || Schreibt den neuen Zaehlstand in die Datenbank
    $database->setQuery("UPDATE #__joomgallery
        SET imgcounter='$imgcounter'
        WHERE id=$id");
    $database->query();
  }

  function Joom_Check_Countstop($id) {
    global $database,$mainframe,$mosConfig_lifetime;
    if (defined('_JEXEC')) {

      // TODO / TEST # session_id() anstatt $_SESSION['__default']['session.token'] da session.token nicht immer gesetzt zu sein scheint
      if(isset($_SESSION['__default']['session.token'])) {
        $session_id = $_SESSION['__default']['session.token'];
      } else {
        $session_id = session_id();
      }
      // TODO / TEST ENDE

      $stoptime=$mosConfig_lifetime*60;
    } else {
      $session_id=$mainframe->_session->session_id;
      $stoptime=$mosConfig_lifetime;
    }
    
    $ip=$_SERVER['REMOTE_ADDR'];
  
    //Loeschen aller veralteten Eintraege
    $database->setQuery("DELETE FROM #__joomgallery_countstop
        WHERE now() > date_add(cstime,interval $stoptime SECOND)");
    $database->query();
  
    //Optimieren der Tabelle
    //$database->setQuery("OPTIMIZE TABLE #__joomgallery_countstop");
    //$database->query();
  
    //Ueberpruefen, ob Eintrag existiert
    $database->setQuery("SELECT COUNT(cspicid) FROM #__joomgallery_countstop
        WHERE cssessionid='$session_id'
        AND csip='$ip'
        AND cspicid=$id");
    $database->query();
    $result = $database->loadResult();
  
    if ($result>0) {
      return true; //Sperre aktiv
    } else {
      //Neuer Eintrag
      $database->setQuery("INSERT INTO #__joomgallery_countstop
        (csip,cssessionid,cspicid,cstime)
        VALUES ('$ip','$session_id',$id,now())");
      $database->query();
      return false;
    }
}

  function Joom_CheckFile($file,$exitfunc=1) {
    //Checks if image is existend || Ueberprueft ob das Bild auch vorhanden ist
    if(!file_exists($file)) {
      //Warning or return false || Gibt eine Warnmeldung aus oder gibt false zurueck
      if($exitfunc==1) {
//        mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID), _JGS_ALERT_FILE_NOT_EXIST );
?>
      <script>
        alert('<?php echo _JGS_ALERT_FILE_NOT_EXIST;?>');
        document.location.href
        = '<?php echo sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID); ?>';
      </script>
<?php
      } else {
        return false;
      }
    } else {
      return true;
    }
  }

  function Joom_CheckAniGif($file) {
    //Reads file Content into string || Liest eine Datei in einen String ein
    $filecontents=file_get_contents($file);
    $str_loc=0;
    $count=0;
    //Checks is there is more then one frame || Ueberprueft, ob es mehr als einen Frame gibt.
    while($count < 2) {
      $where1=strpos($filecontents,"\x00\x21\xF9\x04",$str_loc);
      if (!$where1) {
        break;
      } else {
        $str_loc=$where1+1;
        $where2=strpos($filecontents,"\x00\x2C",$str_loc);
        if(!$where2) {
          break;
        } else {
          if ($where1+8 == $where2) {
            $count++;
          }
        $str_loc=$where2+1;
        }
      }
    }
    //Returns true if more then one frame is found || Gibt true zurueck, wenn mehr als ein Bild gefunden wurde.
    if($count>1) {
      return true;
    } else {
      return false;
    }
  }

  function Joom_GetPath($orig, $second, $catid) {
    global $jg_pathoriginalimages, $jg_pathimages;
    //Defines imagepath || Definiert den richtigen Pfad zu dem Bild

    $catpath = Joom_GetCatPath($catid);
    if($orig==1 && $second!=0) {
      $path = $jg_pathoriginalimages;
    } else {
      $path = $jg_pathimages;
    }
    return _JOOM_ABSOLUTE_PATH.$path."/".$catpath;
  }

  function Joom_CheckMime($file) {
   $mime = getimagesize($file);
   switch($mime[2]) {
     case 1:
      $mime = "image/gif";
      break;
     case 2:
      $mime = "image/jpeg";
      break;
     case 3:
      $mime = "image/png";
      break;
     default:
      exit();
      break;
   }
   return $mime;
  }

  function Joom_IncWatermark($file) {
    global $jg_watermarkpos, $jg_wmpath, $jg_wmfile;

    //Path to the watermarkfile || Pfad zum Wasserzeichen
    $watermark = _JOOM_ABSOLUTE_PATH.$jg_wmpath."/".$jg_wmfile;

    //Checks if image is existend || Ueberprueft ob das Bild auch vorhanden ist
    $this->Joom_CheckFile($watermark);

    //Gets information of the image || Holt die Informationen des Bildes
    $mime_img = $this->Joom_CheckMime($file);
    $mime_wat = $this->Joom_CheckMime($watermark);

    switch($mime_img) {
      case "image/gif":
       $image = imagecreatefromgif($file);
       break;
      case "image/jpeg":
       $image = imagecreatefromjpeg($file);
       break;
      case "image/png":
       $image = imagecreatefrompng($file);
       break;
     default:
      exit();
      break;
    }

    //Gets height and width from imgage || Holt die Hoehe und die Breite des Bildes
    $infos_img = getimagesize($file);
    $infos_wat = getimagesize($watermark);

    //Checks if image is smaller than watermark and returns image without || Ueberprueft ob das Bild kleiner ist, als das Waserzeichen und gibt nur das Bild zurueck
    if($infos_img[0]<$infos_wat[0] || $infos_img[1]<$infos_wat[1]) {
      return $image;
    } else {
      //Gets the position of the watermark || Definiert die Position des Wasserzeichens
      $t_x=0;
      $t_y=0;
      $position = $jg_watermarkpos;
      // Position x
      switch (($position-1)%3) {
        case 0:
          $pos_x = 0;
          break;
        case 1:
          $pos_x = round(($infos_img[0]-$infos_wat[0])/2, 0);
          break;
        case 2:
          $pos_x = $infos_img[0]-$infos_wat[0];
          break;
      }
      // Position y
      switch (floor(($position-1)/3)) {
        case 0:
          $pos_y = 0;
          break;
        case 1:
          $pos_y = round(($infos_img[1]-$infos_wat[1])/2, 0);
          break;
        case 2:
          $pos_y = $infos_img[1]-$infos_wat[1];
          break;
      }

    // Watermark-procedure || Erzeugt das Wasserzeichen
    switch($mime_wat) {
      case "image/gif":
        $watermark = imagecreatefromgif($watermark);
        break;
      case "image/jpeg":
        $watermark = imagecreatefromjpeg($watermark);
        break;
      case "image/png":
        $watermark = imagecreatefrompng($watermark);
        break;
     default:
       exit();
       break;
    }
      $watermark_width = imagesx($watermark);
      $watermark_height = imagesy($watermark);
      $image_width = imagesx($image);
      $image_height = imagesy($image);

      if ( $mime_img=="image/gif" || ( $mime_img=="image/png" && !strstr($_SERVER['HTTP_USER_AGENT'],'MSIE' ) ) ) {
       $image_new = ImageCreate($image_width,$image_height);
       $transcol=imagecolortransparent($image);
       imagepalettecopy($image_new,$image);
       imagefill($image_new,0,0,$transcol);
       imagecopyresampled($image_new, $image, 0, 0, 0, 0, $image_width, $image_height, $image_width, $image_height);
       imagecolortransparent($image_new,$transcol);
      } else {
       $image_new = $image;
      }
      imagealphablending($image_new, TRUE);
      imagealphablending($watermark, TRUE);
      imagecolortransparent($watermark, imagecolorat($watermark, $t_x, $t_y));
      imagecopyresampled($image_new, $watermark, $pos_x, $pos_y, 0, 0, $watermark_width, $watermark_height, $watermark_width, $watermark_height);
      return $image_new;
    }
  }


  function Joom_Output($file, $filename, $cache, $mime, $show, $image, $quali=95) {
  //Writes header || Gibt den Header der neuen Bilddatei heraus
  header("Pragma: public");

  //Writes header information for caching || Gibt die Header Informationen fuer Dateien aus, die in den gecached werden duerfen
  if($cache=="cache") {
    header("Last-Modified: ".gmdate('D, d M Y H:i:s', getlastmod())." GMT");
    header("Cache-Control: public, max-age=3600");
    header("Cache-Control: pre-check=3600, FALSE");
    header("Expires: ".gmdate('D, d M Y H:i:s', time()+3600)." GMT ");
  //Writes header information for non caching || Gibt die Header Informationen fuer Dateien aus, die nicht gecached werden duerfen
  } else {
    header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
    header("Pragma: no-cache");
    header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0, false");
    header('Expires: 0');
  }
  //header("Content-Transfer-Encoding: binary");
  if($image=="file") {
    header("Content-Length: ".filesize($file));
    header("Accept-Ranges: bytes");
  }
  header("Content-type: $mime");
  header("Content-Disposition: $show; filename=$filename");

  //Checks if file is a image to be generated with php || Ueberprueft ob die Datei ein Bild ist, das erst noch von PHP erzeugt werden muss
  if($image=="image") {
    switch($mime) {
      case "image/gif":
       imagegif($file);
       break;
     case "image/png":
       imagepng($file);
       break;
     case "image/jpeg":
       imagejpeg($file,'',$quali);
       break;
     default:
       exit();
       break;
    }
  imagedestroy($file);
  } else {
    readfile($file);
  }
  exit;
  }
}

?>
