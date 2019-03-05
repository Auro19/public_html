<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/common.joomgallery.php $
// $Id: common.joomgallery.php 396 2009-03-15 16:06:21Z aha $
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

// central definition of Gallery Version
// used in footer and to identify version to addons using the interface
// returned via Joom_GetGalleryVersion(), defined here for convenience
define('_JG_GALLERY_VERSION', "1.0.1");

function Joom_FixFilename($orig,$replace_extension=0) {
  global $jg_filenamesearch, $jg_filenamereplace;

  $orig = strtolower(basename($orig));
  // replace special chars
  if(!empty($jg_filenamesearch)) {
    $filenamesearch  = explode("|",$jg_filenamesearch);
  } else {
    $filenamesearch = array();
  }

  if(!empty($jg_filenamereplace)) {
    $filenamereplace = explode("|",$jg_filenamereplace);
  } else {
    $filenamereplace = array();
  }

  // replace whitespace with underscore
  array_push($filenamesearch,"\s");
  array_push($filenamereplace,"_");
  // replace other stuff
  array_push($filenamesearch,"[^a-z_0-9-]");
  array_push($filenamereplace,"");

  //checks for different array-length
  $lengthsearch  = sizeof($filenamesearch);
  $lengthreplace = sizeof($filenamereplace);
  if($lengthsearch>$lengthreplace) {
    while($lengthsearch>$lengthreplace) {
      array_push($filenamereplace,"");
      $lengthreplace = $lengthreplace+1;
    }
  } else if($lengthreplace>$lengthsearch) {
    while($lengthreplace>$lengthsearch) {
      array_push($filenamesearch,"");
      $lengthsearch = $lengthsearch+1;
    }
  }

  //checks for extension
  $extensions = array('.jpeg','.jpg','.jpe','.gif','.png');
  $extension=false;
  for($i=0;$i<sizeof($extensions);$i++) {
    $extensiontrue = substr_count($orig,$extensions[$i]);
    if($extensiontrue !=0) {
      $extension=true;
      break; //wenn Extension gefunden, Abbruch der Abfrage
    }
  }
  //replaces extension if present
  if($extension) {
    $fileextension = ereg_replace('.*\.([^\.]*)$', '\\1', $orig);
    $fileextensionlength = strlen($fileextension);
    $filenamelength = strlen($orig);
    $filename = substr($orig,-$filenamelength,-$fileextensionlength-1);
   //no extension found (Batchupload)
  } else {
    $filename = $orig;
  }
  for ($i=0;$i<$lengthreplace;$i++) {
    $searchstring = "!".$filenamesearch[$i]."+!i";
    $filename = preg_replace($searchstring, $filenamereplace[$i] ,$filename);
  }
  if($extension && $replace_extension == 0) {
    //returns filename with extension for regular upload
    return $filename.".".$fileextension;
  } else {
    //returns filename without extension for batchupload
    return $filename;
  }
}

/**
* Kopiert Bild per PHP copy
* @param $srcFile absoluter Pfad zur Quelldatei
* @param $destFile absoluter Pfad zur Zieldatei
* @return Aktion erfolgreich/nicht erfolgreich
*/
function Joom_CopyPicture($srcFile, $destFile) {

  if (copy($srcFile, $destFile)) {
    return true;
  } else {
    return false;
  }
}

/**
* Kopiert Datei per PHP copy
* @param $srcfile absoluter Pfad zur Quelldatei
* @param $destPath absoluter Pfad zum Zielverzeichnis
* @param $destName Name der Zeildatei
* @return Aktion erfolgreich/nicht erfolgreich
*/
function Joom_CopyFile($srcFile, $destPath, $destName) {

  $srcFileCopy = $destPath . '/' . $destName;
  if (copy($srcFile, $srcFileCopy)) {
    return true;
  } else {
    return false;
  }
}

/**
* Verschiebt vorher mit POST hochgeladenes Bild per PHP move_uploaded_file
* @param $srcFile absoluter Pfad zur Quelldatei
* @param $destName Name der Zieldatei incl. Kategoriepfad
* @return Aktion erfolgreich/nicht erfolgreich
*/
function Joom_MoveUploadedFile($srcFile, $destName) {
  if (move_uploaded_file($srcFile,$destName)) {
    // Set mode of uploaded picture
    chmod($destName, octdec('644'));
    return true;
  } else {
    return false;
  }
}

/**
* Verschiebt Bild per PHP rename
* @param $srcfile absoluter Pfad zur Quelldatei
* @param $destPath absoluter Pfad zum Zielverzeichnis
* @param $destName Name der Zeildatei
* @return Aktion erfolgreich/nicht erfolgreich
*/
function Joom_MoveFile($srcFile, $destPath, $destName) {
  $srcFileMove = $destPath . $destName;

  if (rename($srcFile, $srcFileMove)) {
    return true;
  } else {
    return false;
  }
}

/**
* Verschiebt Ordner per PHP rename
* @param $srcDir absoluter Pfad zum Quellordner
* @param $destDir absoluter Pfad zum Zielordner
* @return Aktion erfolgreich/nicht erfolgreich
*/
function Joom_MoveDir($srcDir,$destDir) {
  if (rename($srcDir, $destDir)) {
    return true;
  } else {
    return false;
  }
}

/**
* Loescht Bild im Filesystem, Aufruf von Joom_RemoveFile
* @param $srcFilename Dateiname des zu loeschenden Bildes
* @return Aktion erfolgreich/nicht erfolgreich
* @see Joom_RemoveFile
*/
function Joom_RemoveOrigFile($srcFilename) {
  global $absolut_originalpath;

  if (Joom_RemoveFile($srcFilename, $absolut_originalpath)) {
    return true;
  } else {
    return false;
  }
}

/**
* Loescht Bild im Filesystem per PHP unlink
* @param $srcFilename Dateiname des zu loeschenden Bildes
* @param $srcFilePath Pfad zu der zu loeschenden Datei
* @return Aktion erfolgreich/nicht erfolgreich
*/
function Joom_RemoveFile($srcFilename, $srcFilePath) {

  $remove_filename = $srcFilePath . $srcFilename;
  if (unlink($remove_filename)) {
    return true;
  } else {
    return false;
  }
}

function Joom_ResizeImage($src_file, $dest_file, $useforresizedirection,
                          $new_width, $thumbheight, $method, $dest_qual,
                          $max_width=false) {
  global $jg_fastgd2thumbcreation;

  // Doing resize instead of thumbnail, copy original and remove it.
  $imagetype = array(1 => 'GIF', 2 => 'JPG', 3 => 'PNG', 4 => 'SWF', 5 => 'PSD',
                     6 => 'BMP', 7 => 'TIFF', 8 => 'TIFF', 9 => 'JPC', 10 => 'JP2',
                     11 => 'JPX', 12 => 'JB2', 13 => 'SWC', 14 => 'IFF');
  $imginfo = getimagesize($src_file);

  if ($imginfo == null) die(_JG_FILE_NOT_FOUND);
  $imginfo[2] = $imagetype[$imginfo[2]];
  // GD can only handle JPG & PNG images
  if ($imginfo[2] != 'JPG' && $imginfo[2] != 'PNG' && $imginfo[2] != 'GIF'
      && ($method == 'gd1' || $method == 'gd2')) die(_JG_GD_ONLY_JPG_PNG);
    // height/width
    $srcWidth = $imginfo[0];
    $srcHeight = $imginfo[1];
  if ($max_width) {
    echo _JG_RESIZE_TO_MAX . "<br />";
    $ratio = max($srcHeight,$srcWidth) / $new_width ;
    //$ratio = $srcWidth / $new_width;
  } else {
    echo _JG_CREATE_THUMBNAIL_FROM . " $imginfo[2], $imginfo[0] x $imginfo[1]...<br />";
    // Wird durchlaufen, wenn nach Weite konvertiert wird
    if ($useforresizedirection) {
      $ratio = ($srcWidth / $new_width);
      $testheight = ($srcHeight/$ratio);
      // Wird durchlaufen, wenn die neue Hoehe die angegebene Maximalhoehe
      // ueberschreitet
      if($testheight>$thumbheight) {
        $ratio = ($srcHeight/$thumbheight);
      }
    // Wird durchlaufen, wenn nach Breite konvertiert wird
    } else {
      $ratio = ($srcHeight / $thumbheight);
      $testwidth = ($srcWidth/$ratio);
      // Wird durchlaufen, wenn die neue Breite die angegebene Maximalbreite
      // ueberschreitet
      if($testwidth>$new_width) {
        $ratio = ($srcWidth/$new_width);
      }
    }
  }
  $ratio = max($ratio, 1.0);

  $destWidth = (int)($srcWidth / $ratio);
  $destHeight = (int)($srcHeight / $ratio);
  // Method for thumbnails creation

  switch ($method) {
    case 'gd1' :
      if (!function_exists('imagecreatefromjpeg' )) {
        die(_JG_GD_LIBARY_NOT_INSTALLED);
      }
      if ( $imginfo[2] == 'JPG' ) {
        $src_img = imagecreatefromjpeg($src_file);
      } else if ($imginfo[2] == 'PNG') {
        $src_img = imagecreatefrompng($src_file);
      } else {
        $src_img = imagecreatefromgif($src_file);
      }
      if (!$src_img) {
        $ERROR = $lang_errors['invalid_image'];
        return false;
      }
      $dst_img = imagecreate($destWidth, $destHeight);
      imagecopyresized($dst_img, $src_img, 0, 0, 0, 0, $destWidth,
                       (int)$destHeight, $srcWidth, $srcHeight);
      imagejpeg($dst_img, $dest_file, $dest_qual);
      imagedestroy($src_img);
      imagedestroy($dst_img);
    break;

    case 'gd2' :
      if (!function_exists('imagecreatefromjpeg')) {
        die(_JG_GD_LIBARY_NOT_INSTALLED);
      }
      if (!function_exists('imagecreatetruecolor')) {
        die(_JG_GD_NO_TRUECOLOR);
      }
      if ($imginfo[2] == 'JPG') {
        $src_img = imagecreatefromjpeg($src_file);
      } else if ($imginfo[2] == 'PNG'){
        $src_img = imagecreatefrompng($src_file);
      } else {
        $src_img = imagecreatefromgif($src_file);
      }

      if (!$src_img){
        $ERROR = $lang_errors['invalid_image'];
        return false;
      }
      $dst_img = imagecreatetruecolor($destWidth, $destHeight);

      if ($jg_fastgd2thumbcreation == 0) {
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $destWidth,
                           (int)$destHeight, $srcWidth, $srcHeight);
      } else {
        fastimagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $destWidth,
                           (int)$destHeight, $srcWidth, $srcHeight);
      }

      imagejpeg($dst_img, $dest_file, $dest_qual);
      imagedestroy($src_img);
      imagedestroy($dst_img);
    break;
    case 'im';
      global $jg_impath;
      if (!empty($jg_impath)) {
        $convert_path=$jg_impath.'convert';
      } else {
        $convert_path='convert';
      }
      $commands = ' -resize "'.$destWidth.'x'.$destHeight.'" -quality "'.$dest_qual.'"  -unsharp "3.5x1.2+1.0+0.10"';
      $convert = $convert_path.' '.$commands.' "'.$src_file.'" "'.$dest_file.'"';
      //echo $convert.'<br />';
      $return_var=null;
      $dummy=null;
      @exec($convert,$dummy,$return_var);
      if ($return_var != 0){
        return false;
      }
    break;
  }

  // Set mode of uploaded picture
  chmod($dest_file, octdec('644'));

  // We check that the image is valid
  $imginfo = getimagesize($dest_file);
  if ($imginfo == null) {
    return false;
  } else {
    return true;
  }
}

function fastimagecopyresampled (&$dst_image, $src_image, $dst_x, $dst_y,
                                 $src_x, $src_y, $dst_w, $dst_h,
                                 $src_w, $src_h, $quality = 3) {
  // http://de.php.net/manual/en/function.imagecopyresampled.php#77679
  //
  // Plug-and-Play fastimagecopyresampled function replaces much slower
  // imagecopyresampled. Just include this function and change all
  // "imagecopyresampled" references to "fastimagecopyresampled".
  // Typically from 30 to 60 times faster when reducing high resolution
  // images down to thumbnail size using the default quality setting.
  // Author: Tim Eckel - Date: 09/07/07 - Version: 1.1 -
  // Project: FreeRingers.net - Freely distributable - These comments must remain.
  //
  // Optional "quality" parameter (defaults is 3). Fractional values are allowed,
  // for example 1.5. Must be greater than zero.
  // Between 0 and 1 = Fast, but mosaic results, closer to 0 increases the mosaic effect.
  // 1 = Up to 350 times faster. Poor results, looks very similar to imagecopyresized.
  // 2 = Up to 95 times faster.  Images appear a little sharp,
  //                             some prefer this over a quality of 3.
  // 3 = Up to 60 times faster.  Will give high quality smooth results very close to
  //                             imagecopyresampled, just faster.
  // 4 = Up to 25 times faster.  Almost identical to imagecopyresampled for most images.
  // 5 = No speedup.             Just uses imagecopyresampled, no advantage over
  //                             imagecopyresampled.

  if (empty($src_image) || empty($dst_image) || $quality <= 0) { return false; }
  if ($quality < 5 && (($dst_w * $quality) < $src_w || ($dst_h * $quality) < $src_h)) {
    $temp = imagecreatetruecolor ($dst_w * $quality + 1, $dst_h * $quality + 1);
    imagecopyresized   ($temp, $src_image, 0, 0, $src_x, $src_y, $dst_w * $quality + 1,
                        $dst_h * $quality + 1, $src_w, $src_h);
    imagecopyresampled ($dst_image, $temp, $dst_x, $dst_y, 0, 0, $dst_w,
                        $dst_h, $dst_w * $quality, $dst_h * $quality);
    imagedestroy ($temp);
  } else {
    imagecopyresampled ($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w,
                        $dst_h, $src_w, $src_h);
  }
  return true;
}

function Joom_RecursiveListDir($base) {

  static $filelist = array();
  static $dirlist = array();

  if(is_dir($base)) {
    $dh = opendir($base);
    while (false !== ($dir = readdir($dh))) {
      if (is_dir($base .'/'. $dir) && $dir !== '.' && $dir !== '..'
          && strtolower($dir) !== 'cvs' && strtolower($dir) !== '.svn') {
        $subbase = $base .'/'. $dir;
        $dirlist[] = $subbase;
        $subdirlist = Joom_RecursiveListDir($subbase);
      }
    }
    closedir($dh);
  }
  return $dirlist;
}

function Joom_BBDecode($text) {

  $text = nl2br($text);
  static $bbcode_tpl = array();
  static $patterns = array();
  static $replacements = array();
  // First: If there isn't a "[" and a "]" in the message, don't bother.
  if ((strpos($text, '[') === false || strpos($text, ']') === false)) {
    return $text;
  }
  // [b] and [/b] for bolding text.
  $text=str_replace( "[b]", '<b>', $text );
  $text=str_replace( "[/b]", '</b>', $text );

  // [u] and [/u] for underlining text.
  $text=str_replace( "[u]", '<u>', $text );
  $text=str_replace( "[/u]", '</u>', $text );

  // [i] and [/i] for italicizing text.
  $text=str_replace( "[i]", '<i>', $text );
  $text=str_replace( "[/i]", '</i>', $text );

  if (!count($bbcode_tpl )) {
    // We do URLs in several different ways..
    $bbcode_tpl['url']='<span class="bblink"><a href="{URL}" target="_blank">{DESCRIPTION}</a></span>';
    $bbcode_tpl['email']='<span class="bblink"><a href="mailto:{EMAIL}">{EMAIL}</a></span>';
    $bbcode_tpl['url1']=str_replace( '{URL}', '\\1\\2', $bbcode_tpl['url'] );
    $bbcode_tpl['url1']=str_replace( '{DESCRIPTION}', '\\1\\2', $bbcode_tpl['url1'] );
    $bbcode_tpl['url2']=str_replace( '{URL}', 'http://\\1', $bbcode_tpl['url'] );
    $bbcode_tpl['url2']=str_replace( '{DESCRIPTION}', '\\1', $bbcode_tpl['url2'] );
    $bbcode_tpl['url3']=str_replace( '{URL}', '\\1\\2', $bbcode_tpl['url'] );
    $bbcode_tpl['url3']=str_replace( '{DESCRIPTION}', '\\3', $bbcode_tpl['url3'] );
    $bbcode_tpl['url4']=str_replace( '{URL}', 'http://\\1', $bbcode_tpl['url'] );
    $bbcode_tpl['url4']=str_replace( '{DESCRIPTION}', '\\2', $bbcode_tpl['url4'] );
    $bbcode_tpl['email']=str_replace( '{EMAIL}', '\\1', $bbcode_tpl['email'] );
    // [url]xxxx://www.phpbb.com[/url] code..
    $patterns[1] = '#\[url\]([a-z]+?://){1}([a-z0-9\-\.,\?!%\*_\#:;~\\&$@\/=\+\(\)]+)\[/url\]#si';
    $replacements[1] = $bbcode_tpl['url1'];
    // [url]www.phpbb.com[/url] code.. (no xxxx:// prefix).
    $patterns[2] = '#\[url\]([a-z0-9\-\.,\?!%\*_\#:;~\\&$@\/=\+\(\)]+)\[/url\]#si';
    $replacements[2] = $bbcode_tpl['url2'];
    // [url=xxxx://www.phpbb.com]phpBB[/url] code..
    $patterns[3] = '#\[url=([a-z]+?://){1}([a-z0-9\-\.,\?!%\*_\#:;~\\&$@\/=\+\(\)]+)\](.*?)\[/url\]#si';
    $replacements[3] = $bbcode_tpl['url3'];
    // [url=www.phpbb.com]phpBB[/url] code.. (no xxxx:// prefix).
    $patterns[4] = '#\[url=([a-z0-9\-\.,\?!%\*_\#:;~\\&$@\/=\+\(\)]+)\](.*?)\[/url\]#si';
    $replacements[4] = $bbcode_tpl['url4'];
    //[email]user@domain.tld[/email] code..
    $patterns[5] = '#\[email\]([a-z0-9\-_.]+?@[\w\-]+\.([\w\-\.]+\.)?[\w]+)\[/email\]#si';
    $replacements[5] = $bbcode_tpl['email'];
  }
  $text=preg_replace($patterns, $replacements, $text);
  return $text;
}


function Joom_FixCatname ($text) {
  global $database;

  $text = trim($text);
  if($text != "") {
    $text = strip_tags($text);
    $search = array("/\s/","/\'/","/ä/","/ö/","/ü/","/Ä/","/Ö/","/Ü/","/ß/","/â/","/à/","/Â/","/ç/","/é/","/è/","/ê/","/Ê/","/î/","/ô/","/Ô/","/ù/","/û/","/Û/");
    $replace = array("_","_","ae","oe","ue","Ae","Oe","Ue","ss","a","a","A","c","e","e","e","E","i","o","O","u","u","U");
    $text = preg_replace($search, $replace, $text);
    $text = strtolower ($text);
    $text= preg_replace("/[^a-z0-9_]/","",$text);
    $text = $database->getEscaped($text);
  }
  return $text;
}


function Joom_FixUserEntrie($text) {
  global $database;

  $text = trim($text);
  if($text != "") {
    $text = strip_tags($text);
    if (defined('_JEXEC')) {
      $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
    } else {
      $text = htmlspecialchars($text, ENT_QUOTES);
    }
    $text = $database->getEscaped($text);
  }
  return $text;
}


function Joom_FixUserEntrie2($text) {
  global $database;

  $text = trim($text);
  if($text != "") {
    $text = strip_tags($text);
    $text = $database->getEscaped($text);
  }
  return $text;
}


function Joom_FixAdminEntrie($text) {
  global $database;

  $text = trim($text);
  return $text;
}

function Joom_FixPathEntrie($path) {
  if(strpos($path,'/') !== 0) {
    $path = '/'.$path;
  }
  $path = rtrim($path,'/');
  return $path;
}
/** shows Category Path in Category Manager Admin Backend
* @param $cat Catid
* @param $access
*/
function Joom_ShowCategoryPath( $cat, $access=0 ) {
  global $database, $my;
  $cat=intval($cat);
  if ($cat == 0) return;
  $parent_id = true;
  while ($parent_id) {
    // read name and parent_id
    $query = "SELECT name, parent
        FROM #__joomgallery_catg
        WHERE cid=$cat AND access<='$my->gid'";
    $database->setQuery( $query );
    $database->LoadObject($result);
    $parent_id = $result->parent;
    $name = $result->name;
    // write path
    if (empty($path)) {
      $path = $name;
    } else {
      $path = $name . ' &raquo; ' . $path;
    }
    // next looping
    $cat = $parent_id;
  }
  return $path . ' ';
}

/**
 * Callbackfunktion fuer die Sortierung eines Objektarrays nach zusammen
 * gesetzten Kategorienamen mit allen Parentkategorien
 *
 * @param object $a
 * @param object $b
 * @return 0 wenn gleich, -1 wenn a < b, 1 wenn a > b
 */
function Joom_SortCatArray($a,$b){ 
  return strcmp($a->name, $b->name);
}


/**
 * Aufbau HTML Auswahlliste der freigegebenen Kategorien
 *
 * @param int $cat catid
 * @param string $cname Name des HTML-select $_POST Variable
 * @param string $extra HTML Code
 * @param int $orig catid - gefuellt, wenn Kategorie ausgeschlossen werden soll
 * @return string HTML Code
 */
function Joom_ShowDropDownCategoryList($cat, $cname = 'catid', $extra = null,
                                       $orig=null) {
  global $database;
  
  $query = "SELECT cid, parent,name,'0' as ready
            FROM #__joomgallery_catg";
  $database->setQuery($query);
  $rows = $database->loadObjectList("cid");

  //Array von Unterkategorien der aktuellen Kategorie
  if ($cname=='parent' && $orig != null) {
    $ignore=array();    
  }
  
  $output = "<select name=\"$cname\" class=\"inputbox\" $extra >\n";
  $output .= "  <option value=\"0\"></option>\n";
  
  if (count($rows)==0){
    $output .= "</select>\n";
    return $output;    
  }
  
  //Iteration durch das Array und Aufbau des Pfades
  foreach ($rows as $key => $obj) {
    $parent=$obj->parent;

    if ($cname=='parent' && $orig != null) {
      if ($parent==$orig || in_array($parent,$ignore)) {
        //akt. Kategorie gefunden
        //in ignore aufnehmen
        if (!in_array($key,$ignore)) {
          $ignore[]=$key;
          continue;
        }
      }else{
        //pruefen, ob in dem Parent pfad nach oben sich die Cat = $orig befindet
        //dann alle beteilgten Cat ausschliessen
        $parentcat=null;
        $parentcats=array();
        $parentcat=$rows[$key]->parent;
        while ($parentcat!=0 && $parentcat!=$orig){
          $parentcat=$rows[$parentcat]->parent;
          $parentcats[]=$parentcat;
        }
        if (!empty($parentcats) && in_array($orig,$parentcats)) {
          //wenn gefunden, die angesammelten Cat dem $ignore hinzufuegen
          $ignore[]=$key;
          $ignore=array_merge($ignore,$parentcats);
          $parentcats=array(); //loeschen
          continue;         
        }
      }
    }
    
    //wenn Rootkategorie, naechstes Element
    if ($parent != 0){
      //wenn Pfad des Parent schon aufgebaut, sofort uebernehmen
      if ($rows[$parent]->ready){
        $rows[$key]->name = $rows[$parent]->name . ' &raquo; ' . $rows[$key]->name;
      } else {
        while ($parent!=0){
          $rows[$key]->name = $rows[$parent]->name . ' &raquo; ' . $rows[$key]->name;       
          
          //wenn Pfad des aktuellen Parent schon aufgebaut, while abbrechen
          //sonst mit naechstem Parent fortfahren
          if ($rows[$parent]->ready){
            break;
          }else{
            $parent=$rows[$parent]->parent;                  
          }
        }      
      }      
    }
    $rows[$key]->ready="1"; //Pfad vollstaendig aufgebaut, -> ready
  }

  //aus Array die in $ignore gesammelten nicht auszugebenden cat entfernen
  if ($cname=='parent' && $orig != null) {
    foreach ($ignore as $catignore){
      unset ($rows[$catignore]);  
    }
  }
    
  //sortieren des Array nach aufgebautem Pfadnamen
  usort( $rows , "Joom_SortCatArray" );

  foreach ($rows as $key => $obj) {
    //Kategorie darf nicht Parent von sich selbst sein
    if($cname != 'parent' || ($cname == 'parent' && $obj->cid != $orig)){    
      $output .="<option value=\"".$obj->cid."\"";
      if($cat==$obj->cid) {
        $output .= " selected=\"selected\"";
      }
      $output .=">".$obj->name."</option>\n";      
    }   
  }
  $output .= "</select>\n";
  $rows=array();
  return $output;
}


function Joom_ProcessText($text,$nr=40) {

  $mytext=explode(" ",trim($text));
  $newtext=array();
  foreach($mytext as $k=>$txt) {
    if (strlen($txt)>$nr) {
      $txt=wordwrap($txt, $nr, "- ", 1);
    }
    $newtext[]=$txt;
  }
  return implode(" ",$newtext);
}


/**
 * reads the category path from db
 *
 * @param int $catid
 * @return string catpath
 */
function Joom_GetCatPath($catid) {
  global $database;

  $database->setQuery("SELECT catpath
      FROM #__joomgallery_catg
      WHERE cid= '".$catid."'");

  $database->loadObject($catobj);

  if (empty($catobj->catpath)) {
    $catpath = "";
  } else {
    $catpath = "$catobj->catpath/";
  }
  return $catpath;
}


/**
 * See if directory can be written to
 */
function Joom_CheckWriteable($path, $dirpath) {

  $fullpath = $path . $dirpath;
  if (@is_writable($fullpath)) {
    return true;
  } else {
    return false;
  }
}


/**
 * Attempts to determine if gd is configured, and if so,
 * what version is installed
 */
function Joom_GDVersion() {

  // Simplified GD Version check
  if (!extension_loaded('gd')) {
    return;
  }

  $phpver = substr(phpversion(), 0, 3);
  // gd_info came in at 4.3
  if ($phpver < 4.3)
    return -1;

  if (function_exists('gd_info')) {
    $ver_info = gd_info();
    preg_match('/\d/', $ver_info['GD Version'], $match);
    $gd_ver = $match[0];
    return $match[0];
  } else {
    return;
  }
}


/**
 * Attempts to determine if ImageMagick is configured, and if so,
 * what version is installed
 *
 */
function Joom_IMVersion() {
  global $jg_impath;
  $status=null;
  $output = array();

  $jg_impath='/usr/bin/';

  if (!empty($jg_impath)) {
    $execstring=$jg_impath.'convert -version';
  } else {
    $execstring='convert -version';
  }

  @exec($execstring, $output, $status);

  if (count($output)==0) {
    return "0";
  } else {
    return($output[0]);
  }
}


/**
* Funktion Joom_DeleteDirectory
* Loescht ein Verzeichnis rekursiv, d.h. alle darin noch enthaltenen Dateien
* werden geloescht. Dient im Grunde dazu, die index.html aus dem Verzeichnis
* zu entfernen; kann aber entsprechend erweitert werden, um auch
* Unterverzeichnisse und deren Inhalt mitzuloeschen; die Funktion sollte immer
* erst nach Joom_CheckEmptyDirectory aufgerufen werden.
*
* @param    string    $path: der absolute Pfad zum entsprechenden Verzeichnis
* @return   boolean   true oder false
*/
function Joom_DeleteDirectory($path) {

  // Oeffnen des Verzeichnisses
  $dir = opendir($path);
  // Durchsuchen des Verzeichnisses
  while(($entry = readdir($dir)) !== false) {
    // Wenn der Eintrag das aktuelle Verzeichnis oder das Elternverzeichnis
    // ist, wird er ignoriert und fortgefahren
    if ($entry == '.' || $entry == '..') continue;
    // Wenn eine Datei oder ein Link gefunden wird
    if (is_file ($path.$entry) || is_link ($path.$entry)) {
      //   wird versucht, die Datei bzw. den Link zu loeschen
      unlink ($path.$entry);
    }
  }
  // Schlieszen des Verzeichnisses
  closedir ($dir);
  // Loeschen des Verzeichnisses; wenn erfolgreich, ...
  if (rmdir ($path)) {
    // ...wird true zurueckgegeben...
    return true;
  //   wenn nicht erfolgreich, ...
  } else {
    // wird false zurueckgegeben
    return false;
  }
}


/**
* Funktion Joom_MakeDirectory
* Erstellt ein neues Verzeichnis und kopiert eine index.html hinein
*
* @param    string    $dir: der absolute Pfad zur entsprechenden Kategorie
* @return   mixed     $error oder 0
*/
function Joom_MakeDirectory($dir) {
  global $absolut_originalpath;
  //Ueberpruefung, ob das zu erstellende Verzeichnis bereits besteht
  if (is_dir($dir)) {
    // Wenn das Verzeichnis bereits besteht wird in die Ausgabe eine
    // die Fehlernummer 1111 geschrieben, die von der Funktion
    // Joom_AlertErrorMessages weiterverarbeitet werden kann
    $error = "1111";
    return $error;
  // Wenn das Verzeichnis nicht bereits besteht...
  } else {
    // ...wird versucht, das neue Verzeichnis zu erstellen
    $res = mkdir($dir, 0755);
    // Wenn das neue Verzeichnis nicht erstellt werden kann, ...
    if (!$res ) {
      // ...wird in die Ausgabe die Fehlernummer 1112 geschrieben, die von der
      // Funktion Joom_AlertErrorMessages weiterverarbeitet werden kann
      $error = "1112";
      return $error;
    // Wenn das Verzeichnis erfolgreich erstellt werden konnte ...
    } else {
      // ...wird die index.html aus dem Originals-Verzeichnis in das neue
      // Verzeichnis kopiert und eine 0 ausgegeben.
      $index = "index.html";
      Joom_CopyPicture($absolut_originalpath.$index, $dir.'/'.$index);
      return 0;
    }
  }
}


function Joom_ShowBackendAllowedCat($cat, $cname, $extras='', $levellimit='4') {
  global $database;

  $database->setQuery("SELECT cid AS id, parent, name
      FROM #__joomgallery_catg
      WHERE owner IS NULL
      ORDER BY name");

  $items = $database->loadObjectList();
  // establish the hierarchy of the menu
  $children = array();
  // first pass - collect children
  foreach ($items as $v) {
    $pt = $v->parent;
    $list = @$children[$pt] ? $children[$pt] : array();
    array_push( $list, $v );
    $children[$pt] = $list;
  }
  // second pass - get an indent list of the items
  $list = Joom_CatTreeRecurse(0, '', array(), $children);
  // assemble menu items to the array
  $items   = array();
  $items[] = mosHTML::makeOption('', ' ');
  foreach ($list as $item) {
    //if ($item->id != $menu->id) {
    $items[] = mosHTML::makeOption($item->id, $item->treename);
    //}
  }
  asort($items);
  // build the html select list
  $parlist =Joom_SelectList2($items, $cname, 'class="inputbox" '.$extras,
                             'value', 'text', $cat);
  return $parlist;
}

/**
 * @param unknown_type $id
 * @param unknown_type $indent
 * @param unknown_type $list
 * @param unknown_type $children
 * @param unknown_type $maxlevel
 * @param unknown_type $level
 * @param unknown_type $seperator
 * @return unknown
 */
function Joom_CatTreeRecurse($id, $indent="&nbsp;&nbsp;&nbsp;", $list,
                             &$children, $maxlevel=9999, $level=0 ,
                             $seperator=" &raquo; ") {

  if (@$children[$id] && $level <= $maxlevel) {
    foreach ($children[$id] as $v) {
      $id = $v->id;
      $txt = $v->name;
      $pt = $v->parent;
      $list[$id] = $v;
      $list[$id]->treename = $indent . $txt;
      $list[$id]->children = count(@$children[$id]);
      $list = Joom_CatTreeRecurse($id, $indent . $txt . $seperator, $list,
                                  $children, $maxlevel, $level+1);
    }
  }
  return $list;
}


## multiple select list
function Joom_SelectList2(&$arr, $tag_name, $tag_attribs, $key, $text, $selected) {

  reset($arr);
  $html = "\n<select name=\"$tag_name\" $tag_attribs>";
  for ($i=0, $n=count( $arr ); $i < $n; $i++ ) {
    $k  = $arr[$i]->$key;
    $t  = $arr[$i]->$text;
    $id = @$arr[$i]->id;

    $extra  = '';
    $extra .= $id ? " id=\"" . $arr[$i]->id . "\"" : '';
    if (is_array( $selected)) {
      foreach ($selected as $obj) {
        $k2 = $obj;
        if ($k == $k2) {
          $extra .= ' selected="selected"';
          break;
        }
      }
    } else {
      $extra .= ($k == $selected ? ' selected="selected"' : '');
    }
    $html .= "\n\t<option value=\"" . $k . "\"$extra>" . $t . '</option>';
  }
  $html .= "\n</select>\n";
  return $html;
}


/**
* Funktion Joom_CheckEmptyDirectory
* Ueberprueft, ob ein Verzeichnis leer ist bzw. nur noch die index.html enthaelt;
* gleichzeitig wird geprueft, ob auf das Verzeichnis zugegriffen werden kann
*
* @param    string    $directory: der absolute Verzeichnispfad
* @param    integer   $catid: die ID der entsprechenden Kategorie
*/
function Joom_CheckEmptyDirectory($directory, $catid) {

  // Ueberpruefung, ob das Verzeichnis ueberhaupt existiert; wenn nicht, Abbruch
  // und entsprechende Fehlermeldung
  if (!is_dir($directory)) Joom_AlertErrorMessages(0, $catid, $directory, 0);
  // Oeffnen des Verzeichnisses
  $dir = opendir($directory);
  // Wenn das Oeffnen fehlgeschlagen ist, dann verfuegt das Script nicht ueber
  // ausreichende Rechte fuer das Verzeichnis: in diesem Fall Abbruch und
  // entsprechende Fehlermeldung
  if (!$dir) Joom_AlertErrorMessages(0, $catid, $directory, 0);
  $index = "index.html";
  while(false != ($entry = readdir($dir))) {
    // wenn der Eintrag etwas anderes als das aktuelle Verzeichnis oder das
    // Elternverzeichnis oder die index.html ist...
    if($entry != '.' && $entry != '..' && $entry != $index) {
      //   schliesze das Verzeichnis...
      closedir($dir);
      //   und breche das Script mit einer entsprechenden Fehlermeldung ab.
      Joom_AlertErrorMessages(0, $catid, $directory, 0);
    }
  }
}


/******************************************************************************\
*                  Functions / Categories & Pictures                           *
\******************************************************************************/


# The following function was taken from admin.frontpage.php
# @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
# modification aha - additional saveorder for categories
function Joom_SaveOrder(&$cid, &$catg) {
  global $database;

  $returntask = mosGetParam($_REQUEST, 'returntask', null);
  if ($returntask == 'pictures') {
    $total    = count($cid);
    $order    = mosGetParam($_POST, 'order', array(0));
    for($i=0; $i < $total; $i++ ) {
      $query = "UPDATE #__joomgallery
          SET ordering = $order[$i]
          WHERE id = $cid[$i]";
      $database->setQuery( $query );
      if (!$database->query()) {
        echo "<script> alert('".$database->getErrorMsg()."');
              window.history.go(-1); </script>\n";
        exit();
      }
      // update ordering
      $row = new mosjoomgallery($database);
      $row->load($cid[$i]);
      $row->updateOrder('');
    }
    mosRedirect('index2.php?option=com_joomgallery&task=pictures',
                _JG_NEW_ORDERING_SAVED);
  } else {
    $total    = count($catg);
    $order    = mosGetParam($_POST, 'order', array(0));

    for($i=0; $i < $total; $i++ ) {
      $query = "UPDATE #__joomgallery_catg
          SET ordering = $order[$i]
          WHERE cid = $catg[$i]";
      $database->setQuery( $query );
      if (!$database->query()) {
        echo "<script> alert('".$database->getErrorMsg()."');
              window.history.go(-1); </script>\n";
        exit();
      }
      // update ordering
      $row = new mosjoomgallery($database);
      $row->load($catg[$i]);
      $row->updateOrder('');
    }
    mosRedirect('index2.php?option=com_joomgallery&task=categories',
                _JG_NEW_ORDERING_SAVED);
  }
}


function Joom_SortBatch($a, $b) {

  $searchstring = "/[^0-9]/";
  $a = preg_replace($searchstring, '', $a['filename']);
  $b = preg_replace($searchstring, '', $b['filename']);
  if ($a<$b) {
    return 1;
  } elseif ($a>$b) {
    return -1;
  }else {
    return 0;
  }
}

/**
* Funktion, die aus der Upload-Time eines Bildes und einer festgelegten Zeitspanne
* ermittelt, ob ein Bild als NEW gekennzeichnet werden soll
*
* @param    integer    $uptime: Upload-Datum in Sekunden
* @param    integer    $daysnew: Zeitspanne der Markierung in Tagen
* @return   string.....$isnew: enthaelt entweder den Pfad zum New-Image oder nichts
* */
function Joom_CheckNew($uptime, $daysnew) {

  // Gibt die seit Beginn der Unix-Epoche (Januar 1 1970 00:00:00 GMT) bis jetzt
  // vergangene Zeitspanne in Sekunden zurueck.
  $thistime   = time();
  // Errechnet die Anzahl Sekunden fuer die unter $ag_daysnew angegebenen Tage
  // (siehe Configuration Manager)
  $timefornew = 86400*$daysnew;
  // Wenn die Zeitspanne seit dem Upload kleiner ist, als die Zeitspanne, die unter
  // $jg_daysnew angegeben ist...
  if (($thistime - $uptime) < $timefornew) {
    // ...wird das kleine Image "New" angezeigt ...
    $isnew = "<img src=\"components/com_joomgallery/assets/images/new.png\" class=\"jg_newpic\" alt=\"New\" />";
  // ...ansonsten ...
  } else {
    // wird nichts ausgegeben
    $isnew = "";
  }
  // Rueckgabewert der Funktion
  return $isnew;
}

/**
* Pruefung der Bilder einer Kategorie und ggf. vorhandener Unterkategorien usw.
* Aufruf der Funktion CheckNew(), um festzustellen, ob NEW zutrifft
* rekursiver Aufruf -> vorzeitig beenden, wenn 'new' festgestellt wurde
* @param    integer    $catids_values: eine bzw. mehrere ID der Kategorie/Unterkategorien
* @return   string.....$isnew: enthaelt entweder den Pfad zum New-Image oder nichts
* */
function Joom_CheckNewCatg($catids_values) {
  global $jg_catdaysnew,$database,$gid;
  $isnewcat = "";
  //Abfrage der Kategorie = $cid
  $database->setQuery( "SELECT MAX(imgdate)
    FROM #__joomgallery AS a
    LEFT JOIN #__joomgallery_catg AS c ON c.cid=a.catid
    WHERE a.catid in ($catids_values)
    AND a.published = '1' AND a.approved='1' AND c.access <= $gid AND c.published = '1'");
  $maxdate = $database->loadResult();
  if ($database->getErrorNum()) {
    echo $database->stderr(true);
  }

  //wenn maxdate = NULL, ist kein Bild gefunden worden
  //sonst Pruefung des Datums auf 'new'
  if ( $maxdate != NULL ) {
    $isnewcat = Joom_CheckNew($maxdate, $jg_catdaysnew);
    if ( $isnewcat != "" ) return $isnewcat;
  }

  //In der Kategorie wurde kein Bild bzw. kein Bild mit 'new' gefunden
  //Abfrage der untergeordneten Kategorien mit parent = $cid
  $database->setQuery( "SELECT cid
    FROM #__joomgallery_catg
    WHERE parent in ($catids_values)
    AND access <= $gid AND published = '1' " );

  //Wenn Rueckgabe von 0 Zeilen existieren keine zutreffenden Unterkategorien
  //Rueckgabe von ""
  $catids = $database->loadResultArray();
  if ($database->getErrorNum()) {
    echo $database->stderr(true);
  }

  if (count($catids) == 0) {
    return "";
  }
  //Array aufspliten in kommaseparierten String
  $catids_values = implode (",",$catids);

  //erneuter Funktionsaufruf mit Pruefung
  //auf 'new' Bilder und Unterkategorien
  //wenn Rueckgabe != "" -> vorzeitiges Ende der Suche
  $isnewcat = Joom_CheckNewCatg($catids_values);

  // nach erfolgloser Suche
  // Rueckgabewert leer
  return $isnewcat;
}

/**
* Constructs the Pathway/Breadcrumbs for the categorylinks
* @param $cat CategoryID db->cid
* @return $pathName fully constructed HTML pathname with Links
*/
function Joom_CategoryPathLink($cat) {
  global $database, $mosConfig_lang, $gid;
  if(!defined('_JOOM_ITEMIDX')) define('_JOOM_ITEMIDX','');
  $cat=intval( $cat );
  $parent_id=$cat;

  while ( $parent_id ) {
    $query="SELECT *
        FROM #__joomgallery_catg
        WHERE cid=$cat AND access <= '$gid'";
    $database->setQuery( $query );
    $database->LoadObject($result);
    if (!isset($result)) return "";
    $parent_id = $result->parent;
    $cid = $result->cid;
    $catname = $result->name;
    $name='    <a href="'. sefRelToAbs('index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=' . $cat._JOOM_ITEMIDX).'" class="jg_pathitem">' . $catname  . '</a>' . "\n";
    // write path
    if ( empty( $path ) ) {
      $path = $name;
    } else {
      $path = $name . '    &raquo; '."\n" . $path;
    }
    // next looping
    $cat=$parent_id;
  }
  $home='    <a href="'. sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMIDX) . '" class="jg_pathitem">' . _JG_HOME . '</a>';
  $pathName=$home . "\n" . '    &raquo; '."\n" . $path . ' ';
  return $pathName;
}

/**
* Counts all pics in a category and their subcategories
* for DefaultView and CategoryView
* @param $cat CategoryID db->cid
* @return $val Number of pics in categories->subcategories....
*/
function Joom_GetNumberOfLinks($cat) {
  global $database, $gid;
  $queue[] = intval($cat);

  //iteration for all subcategories, collect the category id's for later counting
  while (list($key, $cat) = each($queue)) {
    // get children
    $query="SELECT cid
        FROM #__joomgallery_catg
        WHERE parent=$cat AND published=1";
    $database->setQuery($query);
    $result = $database->loadResultArray();
    // put them in queue
    foreach ($result as $row) {
      $queue[] = $row;
    }
  }
  $array_values = implode (",",$queue);
  //count all pictures wich are in the categories
  $query="SELECT count(id) as count
      FROM #__joomgallery
      WHERE published = 1 AND approved = 1 AND catid in ($array_values)";

  $database->setQuery( $query );
  $val = $database->LoadResult();
  return $val;
}


function Joom_MakePagetitle($text,$catname,$imgtitle) {
  preg_match_all("/(\[\!.*?\!\])/i",$text,$results);
  for($i=0;$i<count($results[0]);$i++) {
    $replace = str_replace("[!","",$results[0][$i]);
    $replace = str_replace("!]","",$replace);
    $replace = trim($replace);
    $replace2 = str_replace("[!","\[\!",$results[0][$i]);
    $replace2 = str_replace("!]","\!\]",$replace2);
    $text = preg_replace("/(".$replace2.")/ie",$replace,$text);
  }
  $text = str_replace("#cat",$catname,$text);
  $text = str_replace("#img",$imgtitle,$text);
  return $text;
}

/**
* All Categories and their subcategories with published pictures
* @param $cat catid db->cid
* @param showrandom random choice
* @return $allsubcats chosen subcategories
*/
function Joom_GetAllSubCategories ($cat, $showrandom) {
  global $database, $my;

  $cat=intval($cat);
  $allsubcats = array();

  //read all cats: cid und parent in static array 
  //if not already done execute DB query, 
  //according to $showrandom only special cats
  static $allcatsread=false;
  static $allcats = array();

  //showrandom=1 only check if there are pictures in cat
  if ( $showrandom == 1 ) {
    $database->setQuery("SELECT count(id)
        FROM #__joomgallery
        WHERE $cat = catid");
    $count = $database->loadResult();

    if ($count > 0) {
      $allsubcats[] = $cat;
    }  
    return $allsubcats;  
  }
  
  //$showrandom = 2 (only subcats) or 3 = cat and the subcats
  //DB-query only if array empty
  if (!$allcatsread){
    $database->setQuery("SELECT ca.cid,ca.parent,IFNULL(count(p.id),0) as piccount
                  FROM #__joomgallery_catg AS ca
                  LEFT JOIN #__joomgallery AS p
                  ON p.catid = ca.cid
                  WHERE ca.published = '1'
                  AND ca.access <= '$my->gid'                  
                  AND (isnull(p.published) OR p.published=1)
                  AND (isnull(p.approved) OR p.approved=1)
                  /* unpublished approved picture for category, only working with own coice */
                  OR ((isnull(p.published) OR p.published=0) AND (isnull(p.approved) OR p.approved=1))                  
                  GROUP BY ca.cid 
                  ORDER BY cast(parent as unsigned)");

    $allcats=$database->loadObjectList("cid");
    $allcatsread=true;
  }
  
  //analyze the array of all cats
  //if $showrandom=2, check only the subcats
  //if $showrandom>2, check cat and subcats
  if ($showrandom>2){
    //only add cat if there are pictures
    if (array_key_exists($cat,$allcats) && $allcats[$cat]->piccount > 0) {
      $allsubcats[] = $cat;
    }       
  }
  
  $alldone=false;
  $workparentarray=array();
  $workparentarray[]=$cat; 
  $workchildsarray=array();
  
  while (!$alldone) {
    //check all subcats from cat and add them in $allsubcats and $workparentarray
    $maxparent=max($workparentarray);
    
    foreach ($allcats as $key => $catid){
      //break the iteration when beyond parent 
      if ($catid->parent > $maxparent){
        break;
      }
      if (in_array($catid->parent,$workparentarray)){
        $workchildsarray[] = $key;
      }      
    }
    if (count($workchildsarray)) {
      $allsubcats=array_merge($allsubcats,$workchildsarray);
      $workparentarray=$workchildsarray;
    } else {
      //no more cats to check
      $alldone=true;
    }
    $workchildsarray=array();
    
  }
  //remove from collected cats if not including any pictures
  if (count($allsubcats)) {
    $tempcats=array();
    foreach($allsubcats as $tempcat) {
      if ($allcats[$tempcat]->piccount > 0) {
        $tempcats[] = $tempcat;
      }
    }
    $allsubcats=$tempcats;
    $tempcats=array();
  }
  
  return $allsubcats; 
}

/**
* Counts the hits of all pics in a category and their subcategories
* @param $allsubcats Array of all subcats from the category
* @return $numberoftotalhits
*/
function Joom_GetTotalHits ($allsubcats) {
  global $database;

  $numberoftotalhits=0;
  if ( $allsubcats ) {
    $array_values = implode (",", $allsubcats);
    $database->setQuery("SELECT sum(imgcounter) as result
        FROM #__joomgallery WHERE catid in ($array_values)");
    $numberoftotalhits = $database->LoadResult();
  } else {
    $numberoftotalhits = 0;
  }

  if ($numberoftotalhits == 0 || $numberoftotalhits == NULL ) {
    $numberoftotalhits = 0;
  }

  return $numberoftotalhits;
}

function Joom_GenPagination($url, &$pageCount, &$currentPage,$anchortag) {
  $retVal = '';
  $ellipsis="&hellip;";

  $aktpage=2;

  //akuelle Seite gefunden und verarbeitet
  $currItemfound=false;

  //Linken Rand bearbeiten
  if( $currentPage == 1 ) {
    $currItemfound=true;
    $retVal .= '<span class="jg_pagenav">[1]</span>&nbsp;';
    $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url,2)).$anchortag.'" title="'._JG_PAGE.' 2" class="jg_pagenav">2</a>'."\n";
  } else {
    //aktuelle Seite != 1
    $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url, 1)).$anchortag.'" title="'._JG_PAGE.' 1" class="jg_pagenav">1</a>'."\n";
    if ($currentPage==2) {
      $currItemfound=true;
      $retVal .= '&nbsp;<span class="jg_pagenav">[2]</span>';
    } else {
      $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url,2)).$anchortag.'" title="'._JG_PAGE.' 2" class="jg_pagenav">2</a>'."\n";
    }
  }
  //Bereich links von akt. Seite bis 1 noch nicht verarbeitet
  if (!$currItemfound) {
    //Aufbau der Seiten links bis akt. Seite
    //abhaengig von der Differenz nach Links Spruenge einbauen
    //wenn Differenz zur akt. Seite zu klein ist, exakt diese Seiten ausgeben
    if ($currentPage - $aktpage < 6) {
      $aktpage++;
      for ($i = $aktpage;$i < $currentPage;$i++){
        $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url, $i)).$anchortag.'" title="'._JG_PAGE.' '.$i.'" class="jg_pagenav">'.$i.'</a>'."\n";
        $aktpage++;
      }
    } else {
      //sonst Ausgabe der restlichen Links ggf in Steps
      //und zusaetzlich Ausgabe der 2 linken Nachbarn
      //Auffuellen des Bereiches Pos 3 bis akt.Seite -3
      $endbereich=$currentPage-3;
      $jump=ceil(($endbereich-5)/4);
      if ($jump==0) $jump=1;
      $aktpage=$aktpage+$jump;
      for ($i = 1;$i < 4;$i++){
        if ($jump == 1) {
          $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url, $aktpage)).$anchortag.'" title="'._JG_PAGE.' '.$aktpage.'" class="jg_pagenav">'.$aktpage.'</a>'."\n";
        } else {
          $retVal .= $ellipsis.'&nbsp;<a href="'.sefRelToAbs(sprintf($url, $aktpage)).$anchortag.'" title="'._JG_PAGE.' '.$aktpage.'" class="jg_pagenav">'.$aktpage.'</a>'."\n";
        }
        $aktpage=$aktpage+$jump;
      }
      if ($aktpage != ($currentPage-2) ) $retVal .= $ellipsis;
      //Ausgabe von 2 Seiten links neben der akt. Seite
      $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url, $currentPage-2)).$anchortag.'" title="'._JG_PAGE.' '.($currentPage-2).'" class="jg_pagenav">'.($currentPage-2).'</a>'."\n";
      $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url, $currentPage-1)).$anchortag.'" title="'._JG_PAGE.' '.($currentPage-1).'" class="jg_pagenav">'.($currentPage-1).'</a>'."\n";
    }
    //Ausgabe der akt. Seite
    $retVal .= '&nbsp;<span class="jg_pagenav">['.$currentPage.']</span>&nbsp;';
    $currItemfound=true;
    $aktpage=$currentPage;
  }
  //akt. Seite gefunden, rechts 2 Werte aufbauen
  //max bis zum Ende
  if ($pageCount-$aktpage< 3) {
    $anzahl=$pageCount-$aktpage;
  } else {
    $anzahl=2;
  }
  $aktpage++;
  for ($i = 1;$i <= $anzahl;$i++){
    $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url, $aktpage)).$anchortag.'" title="'._JG_PAGE.' '.$aktpage.'" class="jg_pagenav">'.$aktpage.'</a>'."\n";
    $aktpage++;
  }
  if ($aktpage == $pageCount) {
    $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url,$aktpage)).$anchortag.'" title="'._JG_PAGE.' '.$aktpage.'" class="jg_pagenav">'.$aktpage.'</a>'."\n";
    return $retVal;
  }
  //alle Seiten ausgegeben
  if ($aktpage > $pageCount) {
    return $retVal;
  }
  //wenn nur noch 3 Seiten bis zum Ende vorhanden
  if ($aktpage < $pageCount && ($pageCount-$aktpage) < 7) {
    for ($i = $aktpage;$i <= $pageCount;$i++){
      $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url, $aktpage)).$anchortag.'" title="'._JG_PAGE.' '.$aktpage.'" class="jg_pagenav">'.$aktpage.'</a>'."\n";
      $aktpage++;
    }
  } else {
      //Ausgabe der restlichen Links in Steps
      //und zusÃ¤tzlich Ausgabe der letzten Seite und des Nachbarn links
      //Auffuellen des Bereiches akt. Seite +3 bis letzteSeite -3
      $startbereich=$aktpage;
      $endbereich=$pageCount-3;
      $jump=ceil(($endbereich-$startbereich)/4);
      $aktpage=$aktpage+$jump;
      for ($i = 1;$i < 4;$i++){
        if ($jump == 1) {
          $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url, $aktpage)).$anchortag.'" title="'._JG_PAGE.' '.$aktpage.'" class="jg_pagenav">'.$aktpage.'</a>'."\n";
        } else {
          $retVal .= $ellipsis.'&nbsp;<a href="'.sefRelToAbs(sprintf($url, $aktpage)).$anchortag.'" title="'._JG_PAGE.' '.$aktpage.'" class="jg_pagenav">'.$aktpage.'</a>'."\n";
        }
        $aktpage=$aktpage+$jump;
      }
      $retVal .= $ellipsis;
      //Ausgabe der vorletzten Seite
      $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url, $pageCount-1)).$anchortag.'" title="'._JG_PAGE.' '.($pageCount-1).'" class="jg_pagenav">'.($pageCount-1).'</a>'."\n";
      //letzte Seite
      $retVal .= '&nbsp;<a href="'.sefRelToAbs(sprintf($url, $pageCount)).$anchortag.'" title="'._JG_PAGE.' '.($pageCount).'" class="jg_pagenav">'.($pageCount).'</a>'."\n";
  }
  return $retVal;
}

/**
 * Update des Kategoriepfades in der DB fuer Unterkategorien, wenn eine Parent-
 * kategorie verschoben wurde oder sich deren Name geaendert hat
 * rekursiver Aufruf pro Kategorieebene
 *
 * @param    integer  $catids_values: ID(s) der geaenderten Kategorie
 * @param    string   $oldpath: vorheriger rel. Kategoriepfad
 * @param    string   $newpath: jetziger rel. Kategoriepfad
* */
function Joom_UpdateNewCatpath($catids_values,&$oldpath,&$newpath) {
  global $database;

  //Abfrage der Unterkategorien mit parent in $catids_values
  $database->setQuery( "SELECT cid
    FROM #__joomgallery_catg
    WHERE parent in ($catids_values) ");

  $subcatids = $database->loadResultArray();

  if ($database->getErrorNum()) {
    echo $database->stderr(true);
  }
  if (count($subcatids) == 0) return; //beendet, nichts mehr gefunden

  // Mit Hilfe der Klasse mosCatgs wird eine neues Objekt angelegt
  $row = new mosCatgs($database);
  foreach ($subcatids as $subcatid) {
    $row->load($subcatid);
    $catpath = $row->catpath;

    //in catpath den alten rel. pfad durch den neuen ersetzen
    $catpath = str_replace($oldpath.'/',$newpath.'/',$catpath);

    //und wieder speichern
    $row->catpath = $catpath;
    if (!$row->store()) {
      echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
      exit();
    }
  }

  //Array aufspliten in kommaseparierten String
  $catids_values = implode (",",$subcatids);

  //erneuter Funktionsaufruf mit den Unterkategorien als Parents
  Joom_UpdateNewCatpath($catids_values,$oldpath,$newpath);
}

/* Die folgenden zwei Funktionen wurden einem Forums-Beitrag von ecomeback
 * entnommen: http://www.joomlaportal.de/505887-post4.html
 * Vielen Dank an dieser Stelle!

/**
 * Create an Object from an mixed var
 * we "need" this for the multiple joomla select list
 *
 * @param $row - mixed - the mixed var you want to convert
 * @param $take_key - bool - set true if you want to get the key into value object element
 * @param $value_name - string - the name of the value object element
 * @param $text_name - string - the name of the text object element
 *
 */
function Joom_CreateObject($row, $take_key=false, $value_name='value', $text_name='text'){

  if(!is_object($row)) {
    if(is_array($row)){
      $obj_array = array();
      foreach($row as $key => $value) {
        $obj = new stdClass;
        $value = trim($value);
        $obj->$value_name     = $take_key ? $key : $value;
        $obj->$text_name      = $value;
        $obj_array[$key]     = $obj;
      }
      return $obj_array;
    } else {
      $row = trim($row);
      $obj->$value_name     = $row;
      $obj->$text_name      = $row;
      return $obj;
    }
  }
  return $row;
}


/**
 * Create an Object Array from string
 * we need this for the multiple joomla select list
 *
 * @param $row - mixed - the mixed var you want to convert
 * @param $default - mixed - the returned var if row is empty
 * @param $explode - bool - explode string
 * @param $con - string - the string connector
 *
 */
function Joom_CreateArrayObject( $row, $default=array(), $explode=true, $con=',' ) {

  if(empty($row)) {
    return Joom_CreateObject($default);
  }
  if(!is_object($row)){
    if(!is_array($row) && $explode){
      $rows = explode( $con, $row );
      return Joom_CreateObject($rows);
    }
  return Joom_CreateObject($row);
  }
  return array($row);
}


/******************************************************************************\
*                                    Errors                                    *
\******************************************************************************/

function Joom_AlertErrorMessages($eid, $catid, $dir, $name ) {
  global $database;

  $error[$eid] = constant("_JGA_ALERT_ERROR_$eid");

  $output = _JGA_ALERT_ERROR
           ._JGA_ALERT_ERROR_BREAK
           ._JGA_ALERT_ERROR_BR
           ._JGA_ALERT_ERROR_BR
           .$error[$eid]
           ._JGA_ALERT_ERROR_BR
           ._JGA_ALERT_ERROR_BR
           ._JGA_ALERT_ERROR_NUMBER
           .$eid
           ._JGA_ALERT_ERROR_BR;


  if ($catid ) {
    if (is_array($catid)) {
      $catids = implode(',',$catid);
    } else {
      $catids = $catid;
    }
    $output.=_JGA_ALERT_ERROR_CATID;
    $output.=$catids;
    $output.=_JGA_ALERT_ERROR_BR;
  }

  if ($name ) {
    $output.=_JGA_ALERT_ERROR_NAME;
    $output.=$name;
    $output.=_JGA_ALERT_ERROR_BR;
  }

  if ($dir ) {
    $output.=_JGA_ALERT_ERROR_DIRECTORY;
    $output.=$dir;
    $output.=_JGA_ALERT_ERROR_BR;
  }

  $output.=_JGA_ALERT_ERROR_BR;
  $output.=_JGA_ALERT_ERROR_SEE_FAQS;
  $output.=_JGA_ALERT_ERROR_BR;
  $output.=_JGA_ALERT_ERROR_FAQ.$eid._JGA_ALERT_ERROR_HTML;
  $output.=_JGA_ALERT_ERROR_BR;
  $output.=_JGA_ALERT_ERROR_BR;
  $output.=_JGA_ALERT_ERROR_NOTE;
  $output.=_JGA_ALERT_ERROR_BR;
  $output.=_JGA_ALERT_ERROR_FORUM;
  $output.=_JGA_ALERT_ERROR_BR;


  echo "<script> alert('".$output."'); window.history.go(-1); </script>\n";
  exit();

}

/**
 * Creates display string (HTML) for a user name to be
 * displayed, links to CB / CBe / JomSocial if configured in global JG config.
 * 
 * Link to GalleryTab (if available) optional
 */
function getDisplayName($userId, $linkToTab = true){
  global $database, $jg_combuild, $jg_realname, $mainframe;
  if (is_null($userId))
    return _JGS_NO_DATA;
  $userId = intval($userId);
  
  if (!defined("_JOOM_ABSOLUTE_PATH")) // not defined in Backend
    define("_JOOM_ABSOLUTE_PATH", $mainframe->getCfg( 'absolute_path' ));
    
  if ($jg_realname){
    $database->setQuery("SELECT name 
                      FROM #__users 
                      WHERE id=$userId");
  } else{
    $database->setQuery("SELECT username 
                      FROM #__users 
                      WHERE id=$userId");
  }
  
  $username = $database->loadResult();
  $return = "";
  if ($jg_combuild > 0){
   //directly link to a user gallery tab, if present:
    if($linkToTab && file_exists(_JOOM_ABSOLUTE_PATH."/components/com_comprofiler/plugin/user/plug_joomgallery-tab/cb.joomtab.php")) {
      $tablink = "&amp;tab=getjoomtab";
    } else if($linkToTab && file_exists(_JOOM_ABSOLUTE_PATH."/components/com_comprofiler/plugin/user/plug_gallery-tab/cb.gallerytab.php")) {
      $tablink = "&amp;tab=getgallerytab";
    } else {
      $tablink = "";
    }
    // TODO: Tab in CBE available?
    
    if ($jg_combuild == 1) // Joomlapolis Community Builder and old CBE
      $profile_url = $mainframe->getCfg( 'live_site' )."/index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$userId.$tablink;
    if ($jg_combuild == 2) // new CBE
      $profile_url = $mainframe->getCfg( 'live_site' )."/index.php?option=com_cbe&amp;task=userProfile&amp;user=".$userId;
    if ($jg_combuild == 3) // JomSocial
      $profile_url = $mainframe->getCfg( 'live_site' )."/index.php?option=com_community&amp;view=profile&amp;userid=".$userId;
    
    
    if (function_exists("sefRelToAbs")) // not avail. in backend
      $profile_url = sefRelToAbs($profile_url);
    
    $return .= "<a href =\"$profile_url\">";
  }
  $return .= $username;
  
  if ($jg_combuild > 0)
    $return .="</a>";
  
  
  return $return;
}

// TODO: better solution than two queries for each nameshield?
/**
 * Helper function to calculate the width of a nameshield,
 * returns length of username
 */
function getDisplayNameLength($userId){
  global $database, $jg_realname;
  
  $userId = intval($userId);
  if ($jg_realname){
    $database->setQuery("SELECT name 
                      FROM #__users 
                      WHERE id=$userId");
  } else{
    $database->setQuery("SELECT username 
                      FROM #__users 
                      WHERE id=$userId");
  }
  $username = $database->loadResult(); 
  return strlen($username);  
}

/** 
 * Returns true if $string is valid UTF-8 and false otherwise. 
 * 
 * @since        1.14 
 * @param [mixed] $string     string to be tested 
 * @subpackage 
 */ 
function is_utf8($string) { 

// From http://w3.org/International/questions/qa-forms-utf-8.html 
  return preg_match('%^(?: 
        [\x09\x0A\x0D\x20-\x7E]            # ASCII 
      | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte 
      |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs 
      | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte 
      |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates 
      |  \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3 
      | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15 
      |  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16 
  )*$%xs', $string); 

}


function utf8_encode_mix($input, $encode_keys=false) {

  if(is_array($input)) {
    $result = array();
    foreach($input as $k => $v) {
      $key = ($encode_keys)? utf8_encode($k) : $k;
      $result[$key] = utf8_encode_mix( $v, $encode_keys);
    }
  } else {
    $result = utf8_encode($input);
  }

  return $result;
}

/**
 * returns the currently installed version of JoomGallery
 *
 * @return string Version
 */
function Joom_GetGalleryVersion(){
  // TODO: could be read from component XMl files like in JG 1.5.
  // There does not seem to be a nice XML parser in Joomla 1.0 though...
  // Constant is defined at top of file for convenience ;)
  return _JG_GALLERY_VERSION;
}



  if ( !function_exists('htmlspecialchars_decode') ) {
    function htmlspecialchars_decode($string,$style=ENT_COMPAT) {
      $translation = array_flip(get_html_translation_table(HTML_SPECIALCHARS,$style));
      if($style === ENT_QUOTES){ $translation['&#039;'] = '\''; }
      return strtr($string,$translation);
    }
  }
?>
