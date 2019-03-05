<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/admin.pictures.php $
// $Id: admin.pictures.php 396 2009-03-15 16:06:21Z aha $
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

include_once dirname(__FILE__) . '/html/admin.pictures.html.php';

class Joom_AdminPictures {

  var $copy_original;
  var $newcatid;
  var $pcatid;
  var $tcatid;
  var $imgfilename;
  var $imgthumbname;
  var $imgtitle;
  var $imgauthor;
  var $owner;
  var $imgtext;

  function Joom_AdminPictures($task,$cid) {
    global $option,$id;

    $this->copy_original         = mosGetParam($_REQUEST, 'copy_original', '');
    $this->newcatid              = mosGetParam($_REQUEST, 'catid', '');
    $this->pcatid                = mosGetParam($_REQUEST, 'pcatid', '');
    $this->tcatid                = mosGetParam($_REQUEST, 'tcatid', '');
    $this->imgfilename           = mosGetParam($_REQUEST, 'imgfilename', '');
    $this->imgthumbname          = mosGetParam($_REQUEST, 'imgthumbname', '');
    $clearPicVotes               = mosGetParam($_REQUEST, 'clearpicvotes', 0);    

    switch($task) {
      case 'pictures':
        $this->Joom_ShowPictures($option);
        break;

      case 'newpic':
        $this->Joom_ShowNewPicture($option);
        break;

      case 'savenewpic':
        $this->Joom_SaveNewPicture($option);
        break;

      case 'editpic':
        $this->Joom_ShowEditPicture($option, $id[0]);
        break;

      case 'saveeditpic':
        $this->Joom_SaveEditPicture($option, $clearPicVotes);
        break;

      case 'canceleditpic':
        $this->Joom_CancelEditPicture ($option);
        break;

      case 'movepic':
        $this->Joom_ShowMovePictures($id);
        break;

      case 'savemovepic':
        $this->Joom_SaveMovePicture($id);
        break;

      case 'publishpic':
        $this->Joom_PublishPictures($id, 1, $option);
        break;

      case 'unpublishpic':
        $this->Joom_PublishPictures($id, 0, $option);
        break;

      case 'approvepic':
        $this->Joom_ApprovePictures($id, 1, $option);
        break;

      case 'rejectpic':
        $this->Joom_ApprovePictures($id, 0, $option);
        break;

      case 'orderup':
        if ($sorder == 0) {
          $this->Joom_OrderPictures($id[0], 1, $option);
        } else {
          $this->Joom_OrderPictures($id[0], -1, $option);
        }
        break;

      case 'orderdown':
        if ($sorder == 0) {
          $this->Joom_OrderPictures($id[0], -1, $option);
        } else {
          $this->Joom_OrderPictures($id[0], 1, $option );
        }
        break;

      case 'removepic':
        $this->Joom_RemovePictures($id, $option);
        break;
    }
  }


/******************************************************************************\
*                            Functions / Pictures                              *
\******************************************************************************/


/**
* Ermittelt alle notwendigen Daten zur Anzeige aller Bilder ueber den Picture
* Manager und stellt diese Daten der gleichnamigen HTML-Funktion zur Verfuegung
*
* @param    string    $option: Joomla-Variable z.B. "com_joomgallery"
*/
function Joom_ShowPictures($option) {
  global $database, $mainframe, $mosConfig_list_limit;

  $group='';

  # Prepare pagelimit choices
  $limit      = $mainframe->getUserStateFromRequest('viewlistlimit', 'limit',
                                                    $mosConfig_list_limit);
  $limitstart = $mainframe->getUserStateFromRequest("view{$option}limitstart",
                                                    'limitstart', 0);
  
  # Prepare category and search choices
  $catid      = $mainframe->getUserStateFromRequest("catid{$option}", 'catid', 0);
  $search     = $mainframe->getUserStateFromRequest("search{$option}", 'search', '');
  $search     = $database->getEscaped(trim(strtolower($search)));
  $sort       = $mainframe->getUserStateFromRequest("sort{$option}",'sort', 0);
  $sorder     = $mainframe->getUserStateFromRequest("sorder{$option}",'sorder', 0);

  $where      = array();
  $sortorder  = '';
  if ($catid > 0) {
    $where[]   = "catid='$catid'";
  }
  if ($sort == 1) {
    $where[]   = 'a.approved = 0';
  }
  if ($sort == 2) {
    $where[]   = 'a.approved = 1';
  }
  if ($sort == 3) {
    $where[]   = 'useruploaded = 1';
  }
  if ($sort == 4) {
    $where[]   = 'useruploaded = 0';
  }
  if ($sorder == 0) {
    $sortorder = 'a.catid ASC, a.ordering DESC, imgdate DESC, imgtitle DESC';
  }
  if ($sorder == 1) {
    $sortorder = 'a.catid ASC, a.ordering ASC, imgdate DESC, imgtitle DESC';
  }
  if ($search) {
    $where[]   = "LOWER(imgtitle) LIKE '%$search%' OR LOWER(imgtext) LIKE '%$search%' ";
    $group     = "GROUP BY id";
  }

  # Get total number of records
  $database->setQuery("SELECT COUNT(*)
      FROM #__joomgallery AS a "
      . (count($where) ? 'WHERE '
      . implode(' AND ', $where) : ''));
  $total = $database->loadResult();
  echo $database->getErrorMsg();
  if ($limit > $total) {
    $limitstart = 0;
  }

  # Do the main database query
  $where[]     = 'a.catid = cc.cid';
  $whereclause = count($where) ? 'WHERE ' . implode(' AND ', $where) : '';
  $query="SELECT a.*, cc.name AS category
      FROM #__joomgallery AS a, #__joomgallery_catg AS cc
      $whereclause
      $group
      ORDER BY $sortorder";

  if ($limit != 0) {
    $query.=" LIMIT $limitstart, $limit";
  }
      
  $database->setQuery($query);
  $rows = $database->loadObjectList();
  if ($database->getErrorNum()) {
    echo $database->stderr();
    return false;
  }
  $clist = Joom_ShowDropDownCategoryList($catid, 'catid', 'class="inputbox" size="1"
                                         onchange="document.adminForm.submit();"');

  $s_options[] = mosHTML::makeOption(_JGA_ALL_PICTURES, 0);
  $s_options[] = mosHTML::makeOption("1",_JGA_NOT_APPROVED_ONLY);
  $s_options[] = mosHTML::makeOption("2",_JGA_APPROVED_ONLY);
  $s_options[] = mosHTML::makeOption("3",_JGA_USER_UPLOADED_ONLY);
  $s_options[] = mosHTML::makeOption("4",_JGA_ADMIN_UPLOADED_ONLY);
  $slist       = mosHTML::selectList($s_options, 'sort', 'class="inputbox" size="1"
                                     onchange="document.adminForm.submit();"',
                                     'value', 'text', $sort);

  $o_options[] = mosHTML::makeOption(_JGA_ORDERBY_ORDERING_DESC, 0);
  $o_options[] = mosHTML::makeOption("1",_JGA_ORDERBY_ORDERING_ASC);
  $olist       = mosHTML::selectList($o_options, 'sorder', 'class="inputbox"
                                     size="1" onchange="document.adminForm.submit();"',
                                     'value', 'text', $sorder);

  # Set up page navigation
  include_once("includes/pageNavigation.php");
  $pageNav = new mosPageNav($total, $limitstart, $limit);

  HTML_Joom_AdminPictures::Joom_ShowPictures_HTML($option, $rows, $clist, $slist,
                                                  $search, $pageNav, $olist);
}


/**
* Stellt die Funktionalitaet zur Anordnung der Kategorien ueber die Pfeil-Symbole
* zur Verfuegung
*
* @param    integer    $uid: ID des Bildes z.B. "10"
* @param    integer    $inc: Steuerungsvariable Up oder Down, "1" oder "-1"
* @param    string     $option: Joomla-Variable z.B. "com_joomgallery"
*/
function Joom_OrderPictures($uid, $inc, $option) {
  global $database;

  $fp = new mosjoomgallery($database);
  $fp->load($uid);
  $fp->move($inc);
  $fp->updateOrder();
  mosRedirect('index2.php?option='. $option .'&task=pictures');
}


function Joom_PublishPictures($cid=null, $publish=1, $option) {
  global $database;

  if (!is_array($cid) || count($cid) < 1) {
    $action = $publish ? 'publish' : 'unpublish';
    echo "<script> alert('" . _JGA_ALERT_SELECT_AN_ITEM . " $action'); window.history.go(-1);</script>\n";
    exit;
  }

  $cids = implode(',', $cid);

  $database->setQuery("UPDATE #__joomgallery
      SET published='$publish'
      WHERE id IN ($cids)" );
  if (!$database->query()) {
    echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
    exit();
  }
  mosRedirect('index2.php?option='. $option .'&task=pictures');
}


function Joom_ApprovePictures($cid=null, $approve=1, $option) {
  global $database;

  if (!is_array($cid) || count($cid) < 1) {
    $action = $approve ? 'approve' : 'reject';
    echo "<script> alert('" . _JGA_ALERT_SELECT_AN_ITEM . " $action'); window.history.go(-1);</script>\n";
    exit;
  }

  $cids = implode(',', $cid);

  $database->setQuery("UPDATE #__joomgallery
      SET approved='$approve'
      WHERE id IN ($cids)");
  if (!$database->query()) {
    echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
    exit();
  }
  mosRedirect('index2.php?option='. $option .'&task=pictures');
}


/**
* Ermittelt alle notwendigen Daten zur Erstellung eines neuen Bildes ueber New
* aus dem Picture Manager und stellt diese Daten der gleichnamigen HTML-
* Funktion zur Verfuegung
* @param $option
*/
function Joom_ShowNewPicture($option) {
  global $database, $absolut_picturepath, $absolut_thumbnailpath, $mainframe,
         $absolut_originalpath, $jg_pathimages, $jg_paththumbs, $jg_realname, $my;

  // Wenn die Bild-Kategorie oder die Thumbnail-Kategorie geaendert wird, erfolgt
  // ein Refresh der Seite. Um die bis dahin erfolgten Eingaben auf der
  // aktualisierten Seite zur Verfuegung zu haben, muessen diese ueber $POST bzw.
  // $mainframe->getUserStateFromRequest ermittelt werden.
  // Der Bildtitel
  $this->imgtitle =  mosGetParam($_POST, 'imgtitle', '');
  // Die Kategorie, in der das Bild gespeichert werden soll
  $this->newcatid = $mainframe->getUserStateFromRequest("newcatid{$option}",'catid',0);
  // Die Beschreibung zum Bild
  $this->imgtext =  mosGetParam($_POST, 'imgtext', '');
  // Der Autor des Bildes
  $this->imgauthor =  mosGetParam($_POST, 'imgauthor', '');
  // Besitzer
  $this->owner =  mosGetParam($_POST, 'owner', '');
  // Die Kategorie, aus der das Originalbild und das Detailbild verwendet
  // werden sollen
  $this->pcatid = $mainframe->getUserStateFromRequest("pcatid{$option}", 'pcatid', 0);
  // Der Name des Original- bzw. Detail-Bildes
  $this->imgfilename =  mosGetParam($_POST, 'imgfilename', '');
  // Die Kategorie, aus der das Thumbnail verwendet werden soll
  $this->tcatid = $mainframe->getUserStateFromRequest("tcatid{$option}", 'tcatid', 0);
  // Der Name des Thumbnails
  $this->imgthumbname =  mosGetParam($_POST, 'imgthumbname', '');

  // Erzeugung der DropDown-Liste fuer die neue Kategorie
  $Lists['clist'] = Joom_ShowDropDownCategoryList($this->newcatid , 'catid', 'size="1"');

  // Erzeugung der Kategorie-DropDown-Liste fuer Original- und Detailbild
  $Lists['cplist'] = Joom_ShowDropDownCategoryList($this->pcatid, 'pcatid',
    'class="inputbox" size="1" onchange="document.adminForm.submit();"');

  // Erzeugung der Bilder-DropDown-Liste
  // Ermittlung des Kategorie-Pfades fuer Original- und Detailbild
  $ppath = Joom_GetCatPath($this->pcatid);
  // Zusammensetzen des absoluten Kategorie-Pfades fuer Original- und Detailbild
  $pcatpath = $absolut_picturepath.$ppath;
  // Auslesen des Verzeichnisses fuer die Original- und Detailbilder
  $imgFiles = mosReadDirectory($pcatpath);
  // Grund-Erstellung des Arrays mit Standard-Ausgabe
  $images = array( mosHTML::makeOption( '', _JGA_PLEASE_SELECT_IMAGE) );
  // Schleife zum Hinzufuegen aller Bilddateien aus dem Verzeichnis zum Array
  foreach ($imgFiles as $file) {
    // Wenn die Datei eine der Endungen bmp, gif, jpg, png, jpeg oder jpe hat...
    if (eregi("bmp|gif|jpg|png|jpeg|jpe", $file)) {
      // ...wird sie dem Array hinzugefuegt
      $images[] = mosHTML::makeOption( $file );
    }
  }
  // Erstellung der Liste aus dem erzeugten Array
  $Lists['imagelist'] = mosHTML::selectList($images, 'imgfilename',
  "class=\"inputbox\" size=\"1\""
  . "onchange=\"javascript:"
  . "if (document.forms[0].imgfilename.options[selectedIndex].value!='') {"
  .   "document.imagelib2.src='..$jg_pathimages/$ppath' "
  .   "+ document.forms[0].imgfilename.options[selectedIndex].value;"
  .   "document.adminForm.submit();"
  . "} else {"
  .   "document.imagelib2.src='../images/M_images/blank.png'"
  . "}\"",
  'value', 'text', $this->imgfilename);

  // Erzeugung der Meldung, ob ein Original zum Bild vorhanden ist
  // Wenn ein Original im entsprechenden Ordner vorhanden ist...
  if (is_file($absolut_originalpath.$ppath.$this->imgfilename)) {
    // ...wird das Original als vorhanden angezeigt.
    $original_message = 1;
  } else if (!is_file($absolut_originalpath.$ppath.$this->imgfilename)){
    // ...wird das Original als nicht vorhanden angezeigt
    $original_message = 0;
  }

  // Erzeugung der Ja-Nein-DropDown-Liste zur Auswahl, ob dem Bild ein
  // Original zugeordnet werden soll
  $yesno[] = mosHTML::makeOption('1', _JGA_YES);
  $yesno[] = mosHTML::makeOption('0', _JGA_NO);
  $Lists['copy_original'] = mosHTML::selectList($yesno, 'copy_original',
  'class="inputbox" size="1"', 'value', 'text', $this->copy_original );

  // Erzeugung der Kategorie-DropDown-Liste fuer das Thumbnail
  $Lists['ctlist'] = Joom_ShowDropDownCategoryList($this->tcatid, 'tcatid',
  'class="inputbox" size="1" onchange="document.adminForm.submit();"');

  // Erzeugung der Thumbnail-DropDown-Liste
  // Ermittlung des Kategorie-Pfades fuer das Thumbnail
  $tpath = Joom_GetCatPath($this->tcatid);
  // Zusammensetzen des absoluten Kategorie-Pfades fuer das Thumbnail
  $tcatpath = $absolut_thumbnailpath.$tpath;
  // Auslesen des Verzeichnisses fuer die Thumbnails
  $thuFiles = mosReadDirectory($tcatpath);
  // Grund-Erstellung des Arrays mit Standard-Ausgabe
  $thumbs = array(mosHTML::makeOption('', _JGA_PLEASE_SELECT_THUMBNAIL) );
  // Schleife zum Hinzufuegen aller Bilddateien aus dem Verzeichnis zum Array
  foreach ($thuFiles as $tfile) {
    // Wenn die Datei eine der Endungen bmp, gif, jpg, png, jpeg oder jpe hat...
    if (eregi( "bmp|gif|jpg|png|jpeg|jpe", $tfile)) {
      // ...wird sie dem Array hinzugefuegt
      $thumbs[] = mosHTML::makeOption($tfile);
    }
  }
  // Erstellung der Liste aus dem erzeugten Array
  $Lists['thumblist'] = mosHTML::selectList($thumbs, 'imgthumbname',
  "class=\"inputbox\" size=\"1\""
  . " onchange=\"javascript:"
  . "if (document.forms[0].imgthumbname.options[selectedIndex].value!='') {"
  .   "document.imagelib.src='..$jg_paththumbs/$tpath' "
  .   "+ document.forms[0].imgthumbname.options[selectedIndex].value"
  . "} else {"
  .   "document.imagelib.src='../images/M_images/blank.png'"
  . "}\"",
  'value', 'text', $this->imgthumbname);
  
  // Build User select list
  $selname = ($jg_realname)?"name":"username";
  $sql	= "SELECT id as value,$selname as text"
	. "\n FROM #__users"
	. "\n ORDER BY $selname";

  $database->setQuery($sql);
  if (!$database->query()) {
	echo $database->stderr();
	return;
  }

  // set owner to current admin user, if none set:
  $owner = ($this->owner)?$this->owner:$my->id;
  $Lists['users'] = mosHTML::selectList($database->loadObjectList(), 'owner', 'class="inputbox" size="1"','value', 'text', $owner);

 // Uebergabe der Daten an die HTML-Funktion
  HTML_Joom_AdminPictures::Joom_ShowNewPicture_HTML($option, $Lists, $original_message);

}


/**
* Speichert ein ueber New im Picture Manager erstelltes Bild; dabei werden -
* falls erforderlich - die Original-, Detail und Thumbnail-Bilder in die
* entsprechenden Verzeichnisse kopiert und der neue Datenbank-Eintrag angelegt
* @param $option
*/
function Joom_SaveNewPicture($option) {
  global $database, $absolut_originalpath, $absolut_picturepath,
         $absolut_thumbnailpath;

  // Ermittlung des catpath fuer die Kategorie, in die die Bilder kopiert werden
  // sollen
  $catpath = Joom_GetCatPath($this->newcatid);
  // Ermttlung des catpath fuer die Kategorie, aus der Original- und Detail-
  // Bild kopiert werden sollen
  $pcatpath = Joom_GetCatPath($this->pcatid);
  // Ermttlung des catpath fuer die Kategorie, aus der das Thumbnail kopiert
  // werden soll
  $tcatpath = Joom_GetCatPath($this->tcatid);


  //TODO: Fehlermeldungen anpassen
  // Ueberpruefung, ob das Thumbnail bereits im Verzeichnis existiert. Sollte
  // es dort bereits vorhanden sein, wird der weitere Vorgang nicht durchlaufen
  if (!is_file($absolut_thumbnailpath.$catpath.$this->imgthumbname)) {
    // Wenn das Thumbnail-Verzeichnis, in welches das Bild kopiert werden soll,
    // nicht existiert...
    if (!is_dir($absolut_thumbnailpath.$catpath)) {
      // ...Ausgabe der entsprechenden Fehlermeldung und Abbruch...
      Joom_AlertErrorMessages(0, $this->newcatid, $absolut_thumbnailpath.$catpath,
                              $this->imgthumbname);
    // ...wenn das Verzeichnis existiert,...
    } else {
      // wird es geoeffnet.
      $dir = opendir($absolut_thumbnailpath.$catpath);
      // Wenn sich das Verzeichnis nicht oeffnen laeßt...
      if (!$dir) {
        // ...Ausgabe der entsprechenden Fehlermeldung und Abbruch.
        Joom_AlertErrorMessages(0, $this->newcatid, $absolut_thumbnailpath.$catpath,
                                $this->imgthumbname);
      // Wenn es sich oeffnen laeßt...
      } else {
        // ...wird versucht, das Thumbnail aus dem Ursprungsverzeichnis in
        // das Zielverzeichnis zu kopieren.
        $resthu = Joom_CopyPicture($absolut_thumbnailpath.$tcatpath.$this->imgthumbname,
                                   $absolut_thumbnailpath.$catpath.$this->imgthumbname);
        // Wenn der Kopiervorgang fehlschlaegt...
        if (!$resthu) {
          // ...wird das Verzeichnis geschlossen...
          closedir($dir);
          // ...und eine entsprechende Fehlermeldung ausgegeben; Abbruch der
          // Funktion
          Joom_AlertErrorMessages(0, $this->newcatid, $absolut_thumbnailpath.$catpath,
                                  $this->imgthumbname);
        }
      }
    }
  // Wenn das Thumbnail bereits im Zielverzeichnis existiert...
  } else {
    // ...wird eine Kontroll-Variable angelegt, damit das Thumbnail nicht
    // versehentlich beim Abbruch der Funktion geloescht wird
    $thumb_exist = 1;
  }

  // Gleiche Vorgehensweise wie oben fuer das Thumbnail hier jetzt fuer das
  // Detail-Bild; wenn in diesem Durchgang Fehler auftreten und die Funktion
  // abgebrochen werden muss, wird vorher das evtl. zuvor erstellte Thumbnail
  // wieder aus dem Zielverzeichnis geloescht.
  if (!is_file($absolut_picturepath.$catpath.$this->imgfilename)) {
    if (!is_dir($absolut_picturepath.$catpath)) {
      if (!$thumb_exist) Joom_DeletePicture($absolut_thumbnailpath.$catpath,
                                            $this->imgthumbname);
        Joom_AlertErrorMessages(0, $this->newcatid, $absolut_picturepath.$catpath,
                                $this->imgfilename);
    } else {
      $dir = opendir($absolut_picturepath.$catpath);
      if (!$dir) {
        if (!$thumb_exist) Joom_DeletePicture($absolut_thumbnailpath.$catpath,
                                              $this->imgthumbname);
          Joom_AlertErrorMessages(0, $this->newcatid, $absolut_picturepath.$catpath,
                                  $this->imgfilename);
      } else {
        $respic = Joom_CopyPicture($absolut_picturepath.$pcatpath.$this->imgfilename,
                                   $absolut_picturepath.$catpath.$this->imgfilename);
        if (!$respic) {
          closedir($dir);
          if (!$thumb_exist) Joom_DeletePicture($absolut_thumbnailpath.$catpath,
                                                $this->imgthumbname);
            Joom_AlertErrorMessages(0, $this->newcatid, $absolut_picturepath.$catpath,
                                    $this->imgfilename);
        }
      }
    }
  } else {
    $picture_exist = 1;
  }

  // Wenn angegeben wurde, dass das Original angelegt werden soll, wird der
  // folgende Vorgang durchgefuehrt, ansonsten wird kein Bild kopiert
  if ($this->copy_original == 1) {
    // Ueberpruefung, ob das Bild bereits im Verzeichnis existiert. Sollte es dort
    // bereits vorhanden sein, wird der weitere Vorgang nicht durchlaufen
    if (!is_file($absolut_originalpath.$catpath.$this->imgfilename)) {
    // Wenn das Originalbild im Quellverzeichnis vorhanden ist...
      if (is_file($absolut_originalpath.$pcatpath.$this->imgfilename)) {
        // ...wird im weiteren Verlauf der Pfad zum Originalbild verwendet.
        $picturepath = $absolut_originalpath.$pcatpath;
      // Wenn kein Originalbild vorhanden, ...
      } else {
        // dann wird im weiteren Verlauf der Pfad zum Detail-Bild verwendet und
        // das Detail-Bild als Original benutzt
        $picturepath = $absolut_picturepath.$pcatpath;
      }
      // Wenn das Verzeichnis, in welches das Bild kopiert werden soll,
      // nicht existiert...
      if (!is_dir($absolut_originalpath.$catpath)) {
        // ...werden Thumbnail und Detail-Bild - sofern sie nicht schon vorher
        // in dem Verzeichnis existierten - wieder geloescht...
        if (!$thumb_exist) Joom_DeletePicture($absolut_thumbnailpath.$catpath,
                                               $this->imgthumbname);
        if (!$picture_exist) Joom_DeletePicture($absolut_picturepath.$catpath,
                                                 $this->imgfilename);
          // ...Ausgabe der entsprechenden Fehlermeldung und Abbruch...
          Joom_AlertErrorMessages(0, $this->newcatid, $absolut_originalpath.$catpath,
                                  $this->imgfilename);
      // ...wenn das Verzeichnis existiert,...
      } else {
        // wird es geoeffnet.
        $dir = opendir($picturepath);
        // Wenn sich das Verzeichnis nicht oeffnen laeßt...
        if (!$dir) {
          // ...werden Thumbnail und Detail-Bild - sofern sie nicht schon vorher
          // in dem Verzeichnis existierten - wieder geloescht...
          if (!$thumb_exist) Joom_DeletePicture($absolut_thumbnailpath.$catpath,
                                                $this->imgthumbname);
          if (!$picture_exist) Joom_DeletePicture($absolut_picturepath.$catpath,
                                                  $this->imgfilename);
            // ...Ausgabe der entsprechenden Fehlermeldung und Abbruch...
            Joom_AlertErrorMessages(0,$this->newcatid,$absolut_originalpath.$catpath,
                                    $this->imgfilename);
        // Wenn es sich oeffnen laeßt...
        } else {
          // ...wird versucht, das Bild aus dem Ursprungsverzeichnis in
          // das Zielverzeichnis zu kopieren.
          $resori = Joom_CopyPicture($picturepath.$this->imgfilename,
                                     $absolut_originalpath.$catpath.$this->imgfilename);
          // Wenn der Kopiervorgang fehlschlaegt...
          if (!$resori) {
            // ...wird das Verzeichnis geschlossen...
            closedir($dir);
            // ...und es werden Thumbnail und Detail-Bild - sofern sie nicht
            // schon vorher in dem Verzeichnis existierten - wieder geloescht...
            if (!$thumb_exist) Joom_DeletePicture($absolut_thumbnailpath.$catpath,
                                                  $this->imgthumbname);
            if (!$picture_exist) Joom_DeletePicture($absolut_picturepath.$catpath,
                                                    $this->imgfilename);
            // ...und eine entsprechende Fehlermeldung ausgegeben; Abbruch der
            // Funktion
            Joom_AlertErrorMessages(0, $this->newcatid, $picturepath, $this->imgfilename);
          }
        }
      }
    }
  }

  // Wenn alle Verzeichnis-Operationen erfolgreich durchgefuehrt werden konnten
  // wird mit Hilfe der Klasse mosjoomgallery eine neue Tabellenzeile angelegt
  $row = new mosjoomgallery($database);
  // Wenn die neue Datenbank-Zeile nicht hinzugefuegt werden kann, Ausgabe des
  // Fehlers und Ruecksprung auf die vorangegangene Seite; Abbruch dieser Funktion
  if (!$row->bind($_POST)) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }
  if(get_magic_quotes_gpc()) {
    $row->imgtitle=stripslashes($row->imgtitle);
    $row->imgtext=stripslashes($row->imgtext);
    $row->imgauthor=stripslashes($row->imgauthor);
  }
  // Wenn die neue Zeile in der Datenbank-Tabelle nicht erstellt werden kann,
  // Abbruch dieser Funktion mit Fehlermeldung und Ruecksprung auf die
  // vorangegangene Seite
  if (!$row->store()) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }
  // Rueckkehr auf die Ursprungsseite (Picture Manager)
  mosRedirect('index2.php?option='. $option .'&task=pictures');
}


function Joom_ShowEditPicture($option, $uid) {
  global $database, $my, $jg_realname;

  # oop database connector
  $row = new mosjoomgallery($database);
  # load the row from the db table
  $row->load($uid);
  $database->setQuery("SELECT name
      FROM #__joomgallery_catg
      WHERE cid = $row->catid" );
  $catname = $database->loadResult();
  
  // Build User select list
  $selname = ($jg_realname)?"name":"username";
  $sql	= "SELECT id as value,$selname as text"
	. "\n FROM #__users"
	. "\n ORDER BY $selname";

  $database->setQuery($sql);
  if (!$database->query()) {
	echo $database->stderr();
	return;
  }

  // set owner to current admin user, if none set:
  $owner = ($row->owner)?$row->owner:$my->id;
  $Lists['users'] = mosHTML::selectList($database->loadObjectList(), 'owner', 'class="inputbox" size="1"','value', 'text', $owner);

  HTML_Joom_AdminPictures::Joom_ShowEditPicture_HTML($option, $row, $catname, $Lists);
}


/**
* Speichert ein ueber Edit im Picture Manager veraendertes Bild; erstellt den
* neuen, veraenderten Datenbankeintrag
* @param $option
*/
function Joom_SaveEditPicture($option, $clearPicVotes = false) {
  global $database;

  $row = new mosjoomgallery($database);
  if (!$row->bind($_POST)) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }
  if(get_magic_quotes_gpc()) {
    $row->imgtitle=stripslashes($row->imgtitle);
    $row->imgtext=stripslashes($row->imgtext);
    $row->imgauthor=stripslashes($row->imgauthor);
  }
  // clear votes if "clear" checked
  if ($clearPicVotes){
    $row->imgvotes = 0;
    $row->imgvotesum = 0;
    // delete vote logs
    $query = "DELETE FROM #__joomgallery_votes WHERE picid = $row->id";
    $database->setQuery($query);
    if (!$database->query()){
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
      exit();  
    }
    
  }
 
  if (!$row->store()) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }
  
  mosRedirect('index2.php?option='. $option .'&task=pictures');
}


function Joom_ShowMovePictures($id) {
  global $database, $mainframe;

  $catid = $mainframe->getUserStateFromRequest("catid", 'catid', 0);
  // query to list items from pictures
  $ids = implode(',', $id);
  $query = "SELECT *
      FROM #__joomgallery
      WHERE id IN ( " . $ids . " )
      ORDER BY id, imgtitle";
  $database->setQuery($query);
  $items = $database->loadObjectList();
  // category select list
  $options = array(mosHTML::makeOption('1', '_JGA_SELECT_CATEGORY'));
  $Lists['catgs'] = Joom_ShowDropDownCategoryList($catid, 'catid', 'class="inputbox" size="1" ');

  HTML_Joom_AdminPictures::Joom_ShowMovePictures_HTML($id, $Lists, $items);
}


/**
* Fuehrt den Verschiebe-Prozess fuer die unter Move im Picture Manager ausgewaehlten
* Bilder durch. Verschiebt bzw. Kopiert die Bilder und aendert die Datenbank-
* Eintraege.
* @param $id: Array mit den ID's der zu verschiebenden Bilder
*/
function Joom_SaveMovePicture($id) {
  global $database, $my, $absolut_picturepath, $absolut_thumbnailpath,
         $absolut_originalpath;
//TODO: Fehlermeldungen anpassen

  // Ermittelt die ID der Kategorie, in die die Bilder verschoben werden sollen
  $pictureMove = mosGetParam($_POST, 'catid', '');
  // Wenn keine Kategorie in der DropDown-Liste ausgewaehlt wurde ...
  if (!$pictureMove || $pictureMove == 0) {
      // ...Ruecksprung zur Ausgangsseite und Ausgabe der Fehlermeldung ...
      echo "<script> alert('" . _JGA_ALERT_PLEASE_SELECT_CATEGORY  . "');
            window.history.go(-1);</script>\n";
      // ...und Abbruch dieser Funktion
      exit;
  // Wenn eine Kategorie ausgewaehlt wurde ...
  } else {
    // ...und wenn das Array Bilder enthaelt ...
    if (count($id)) {
      // ...wird ein neues Array erstellt, welches zur Aufnahme der ID's
      // derjenigen Bilder dient, die erfolgreich verschoben werden konnten;
      // dieses Array wird einer moeglichen Fehlermeldung mitgegeben
      $successids = array();
      // Die folgende Schleife wird so oft durchlaufen, wie es Bilder-ID's im
      // Array gibt; also genau einmal fuer jedes Bild ;-)
      for ($i = 0; $i < count($id); $i++) {
        // Datenbankabfrage zur Ermittlung des Bildernamens und der ID der
        // Kategorie, aus der das Bild stammt
        $database->setQuery("SELECT id, catid, imgfilename, imgthumbname
            FROM #__joomgallery
            WHERE id = $id[$i]" );
        // Wenn die Abfrage erfolgreich ausgefuehrt werden konnte ...
        if ($database->query()) {
          // ...wird das Abfrage-Ergebnis in ein Array geschrieben
          $rows = $database->loadObjectList();
          // Das Abfrageergebnis an Stelle 0 im Array wird in ein neues Array
          // geschrieben
          $row = $rows[0];
          // Aus dem Abfrageergebnis wird der Wert des Keys imgfilename in eine
          // neue Variable geschrieben
          $this->imgfilename = $row->imgfilename;
          // Aus dem Abfrageergebnis wird der Wert des Keys imgthumbname in eine
          // neue Variable geschrieben
          $this->imgthumbname = $row->imgthumbname;
          // Aus dem Abfrageergebnis wird der Wert des Keys catid in eine
          // neue Variable geschrieben
          $old_catid = $row->catid;
          // Ermittlung des catpath fuer die neue Kategorie
          $catpath = Joom_GetCatPath($pictureMove);
          // Ermittlung des catpath fuer die alte Kategorie
          $catpath_ori = Joom_GetCatPath($row->catid);
          // Datenbankabfrage zur Ermittlung, ob es in der Ursprungskategorie
          // noch weitere Bilder gibt, die die Bilddatei des zu verschiebenden
          // Bildes als Thumbnail nutzen und wenn ja, wieviele
          $database->setQuery("SELECT COUNT(id)
              FROM #__joomgallery
              WHERE imgthumbname = '".$this->imgthumbname."'
              AND id != '".$id[$i]."'
              AND catid = '".$old_catid."'" );
          $count2 = $database->loadResult();
          // Ueberpruefung, ob das Thumbnail im Ursprungsordner existiert und
          // ob es nicht bereits im Zielordner vorhanden ist. Wenn eine der
          // beiden Bedingungen nicht erfuellt ist, wird das Bild nicht
          // verschoben oder kopiert
          if ((is_file($absolut_thumbnailpath.$catpath_ori.$this->imgthumbname)) &&
             (!is_file($absolut_thumbnailpath.$catpath.$this->imgthumbname))) {
            // Wenn es kein weiteres Bild in der Ursprungskategorie gibt,
            // welches die Bilddatei benutzt ...
            if ($count2 < 1) {
              // ...wird das Thumbnail per rename() vom Ursprungsordner in
              // den Zielordner verschoben
              $result = rename($absolut_thumbnailpath.$catpath_ori.$this->imgthumbname,
                               $absolut_thumbnailpath.$catpath.$this->imgthumbname);
            // ...ansonsten ...
            } else {
              // ...wird das Thumbnail vom Ursprungsordner in den Zielordner
              // kopiert und somit das Thumbnail im Ursprungsordner belassen
              $result = Joom_CopyPicture($absolut_thumbnailpath.$catpath_ori.$this->imgthumbname,
                                         $absolut_thumbnailpath.$catpath.$this->imgthumbname);
            }
            // Wenn Kopier- bzw. Verschiebe-Vorgang nicht erfolgreich durchgefuehrt
            // werden konnten, dann Abbruch dieser Funktion und Ausgabe der
            // entsprechenden Fehlermeldung ...
            if (!$result) {
              Joom_AlertErrorMessage(0, 0, 0, $successids);
            }
            // ...wenn der Kopier- bzw. Verschiebe-Vorgang erfolgreich
            // durchgefuehrt wurde, wird eine Steuerungsvariable auf 1 gesetzt
            $thumb = 1;
          // Wenn der Kopier- bzw. Verschiebe-Vorgang nicht durchgefuehrt werden
          // mußte, dann wird die Steuerungsvariable auf 0 gesetzt.
          } else {
            $thumb = 0;
          }
          // Gleiche Vorgehensweise wie oben beim Thumbnail, nur dass im Falle
          // eines Abbruchs die vorangegangenen Kopier- bzw. Verschiebe-Schritte
          // wieder rueckgaengig gemacht werden.
          $database->setQuery("SELECT COUNT(id)
              FROM #__joomgallery
              WHERE imgfilename = '".$this->imgfilename."'
              AND id != '".$id[$i]."'
              AND catid = '".$old_catid."'");
          $count = $database->loadResult();
          if ((is_file($absolut_picturepath.$catpath_ori.$this->imgfilename)) &&
             (!is_file($absolut_picturepath.$catpath.$this->imgfilename))) {
            if ($count < 1) {
              $result2 = rename($absolut_picturepath.$catpath_ori.$this->imgfilename,
                               $absolut_picturepath.$catpath.$this->imgfilename);
            } else {
              $result2 = Joom_CopyPicture($absolut_picturepath.$catpath_ori.$this->imgfilename,
                                          $absolut_picturepath.$catpath.$this->imgfilename);
            }
            if (!$result2) {
              if ($thumb == 1) {
                if ($count2 < 1) {
                  rename($absolut_thumbnailpath.$catpath.$this->imgthumbname,
                         $absolut_thumbnailpath.$catpath_ori.$this->imgthumbname);
                } else {
                  Joom_DeletePicture($absolut_thumbnailpath.$catpath.$this->imgthumbname);
                }
              }
            Joom_AlertErrorMessage(0, 0, 0, $successids);
            }
            $picture = 1;
          } else {
            $picture = 0;
          }
          if ((is_file($absolut_originalpath.$catpath_ori.$this->imgfilename)) &&
             (!is_file($absolut_originalpath.$catpath.$this->imgfilename))) {
            if ($count < 1) {
              $result3 = rename($absolut_originalpath.$catpath_ori.$this->imgfilename,
                                $absolut_originalpath.$catpath.$this->imgfilename);
            } else {
              $result3 = Joom_CopyPicture($absolut_originalpath.$catpath_ori.$this->imgfilename,
                                          $absolut_originalpath.$catpath.$this->imgfilename);
            }
            if (!$result3) {
              if ($thumb == 1) {
                if ($count2 < 1) {
                  rename($absolut_thumbnailpath.$catpath.$this->imgthumbname,
                         $absolut_thumbnailpath.$catpath_ori.$this->imgthumbname);
                } else {
                  Joom_DeletePicture($absolut_thumbnailpath.$catpath.$this->imgthumbname);
                }
              }
              if ($picture == 1) {
                if ($count < 1) {
                  rename($absolut_picturepath.$catpath.$this->imgfilename,
                         $absolut_picturepath.$catpath_ori.$this->imgfilename);
                } else {
                  Joom_DeletePicture($absolut_picturepath.$catpath.$this->imgfilename);
                }
              }
              Joom_AlertErrorMessage(0, 0, 0, $successids);
            }
          }
        // Wenn die Datenbankabfrage zur Ermittlung des Bildernamens und der ID
        // der Kategorie, aus der das Bild stammt, fehlgeschlagen ist,
        // Fehlermeldung und Ruecksprung auf die Ausgangs-Seite
        } else {
          echo "<script> alert('".$database->getErrorMsg()."');
                window.history.go(-1); </script>\n";
        }
      // Hinzufuegen der erfolgreich verarbeiteten Bild-ID zum Array
      array_push($successids,$id[$i]);
      // Wenn alle Verzeichnisoperationen fuer das Bild erfolgreich durchlaufen
      // wurden, wird der Datenbankeintrag geaendert
      // Aufruf der Klasse mosjoomgallery zur Erstellung eines neuen Objekts
      $pic = new mosjoomgallery($database);
      // Uebergabe der notwendigen Daten an die Funktion Joom_MovePictures zur Aenderung
      // des Datenbankeintrages fuer das Bild
      $pic->Joom_MovePictures($id[$i], $pictureMove);
      // Aufruf der Klasse mosCatgs zur Erstellung eines neuen Objekts
      $cat = new mosCatgs($database);
      // Laedt die Tabellenzeile mit der Kategorie, in die die Bilder verschoben
      // wurden
      $cat->load($pictureMove);
      }
    }
    // Zusammensetzen der Erfolsmeldung
    // Anzahl der verschobenen Bilder
    $total = count($successids);
//TODO: MSG 'x Bilder verschoben zu y' anpassen
    // Erfolgsmeldung
    $msg = $total . " Pictures moved to " . $cat->name;
    // Rueckkehr zum Picture Manager mit Ausgabe der Erfolgsmeldung
    mosRedirect('index2.php?option=com_joomgallery&task=pictures&mosmsg=' . $msg);
  }
}


/**
* Loescht Bilder aus den Verzeichnissen und entfernt die dazugehoerigen Eintraege
* aus den Datenbank-Tabellen
*
* @param    Array     $cid: Array mit den ID's der zu loeschenden Bilder
* @param    string    $option: Joomla-Variable z.B. "com_joomgallery"
*/
function Joom_RemovePictures($cid, $option) {
  global $absolut_originalpath, $absolut_picturepath, $absolut_thumbnailpath,
         $database;

  // Ueberpruefung, ob es sich um mehrere Bilder handelt oder wenigstens um eins
  if (!is_array($cid) || count($cid) < 1) {
    // Wenn nicht, dann Fehlermeldung und Ruecksprung auf die Ausgangsseite
    echo "<script> alert('" . _JGA_ALERT_SELECT_AN_ITEM_TO_DELETE . "');
          window.history.go(-1);</script>\n";
    exit;
  }
  // Initialisierung von zwei Arrays zur Aufnahme der erfolgreich geloeschten
  // Bilder bzw. der nicht geloeschten Bilder zur Weiterverarbeitung in den
  // Fehlermeldungen
// TODO: Fehlermeldungen anpassen
  $deleted_items    = array();
  $notdeleted_items = array();
  // Wenn die Variable nicht leer ist ...
  if (count($cid)) {
    // ...wird die Schleife zur Loeschung betreten und solange durchlaufen, wie
    // es Bild-ID's im Array $cid gibt
    for ($i = 0; $i < count($cid); $i++) {
      // Datenbankabfrage zur Ermittlung von Kategorie des Bildes, Bildnamen
      // und Namen des Thumbnails
      $database->setQuery("SELECT id, catid, imgfilename, imgthumbname
          FROM #__joomgallery
          WHERE id = $cid[$i]" );
      if ($database->query()) {
        $rows    = $database->loadObjectList();
        $row     = $rows[0];
        // Ermittlung des catpath fuer die Kategorie, zu der das Bild gehoert
        $catpath = Joom_GetCatPath($row->catid);
        // Datenbankabfrage zur Ermittlung, ob das Thumbnail noch anderen Bildern
        // aus der gleichen Kategorie als Thumbnail zugeordnet ist und wenn ja,
        // wievielen
        $database->setQuery("SELECT COUNT(id)
            FROM #__joomgallery
            WHERE imgthumbname = '".$row->imgthumbname."'
            AND id != '".$row->id."'
            AND catid = '".$row->catid."'" );
        $count = $database->loadResult();
        // Datenbankabfrage zur Ermittlung, ob das Bild noch anderen Bildern
        // aus der gleichen Kategorie als Detail- oder Original-Bild zugeordnet
        // ist und wenn ja, wievielen
        $database->setQuery("SELECT COUNT(id)
            FROM #__joomgallery
            WHERE imgfilename = '".$row->imgfilename."'
            AND id != '".$row->id."'
            AND catid = '".$row->catid."'" );
        $count2 = $database->loadResult();
        // Ueberpruefung, ob die Thumbnail-Datei beschreibbar (und damit loeschbar)
        // ist
        if (Joom_CheckWriteable($absolut_thumbnailpath.$catpath,
                                $row->imgthumbname)) {
          // Ueberpruefung, ob die Detail-Bild-Datei beschreibbar (und damit
          // loeschbar) ist
          if (Joom_CheckWriteable($absolut_picturepath.$catpath,
                                  $row->imgfilename)) {
            // Wenn sich keine anderen Bilder in der Kategorie befinden, die das
            // Thumbnail benutzen ...
            if ($count < 1) {
              // ...wird das Thumbnail geloescht
              $this->Joom_DeletePicture($absolut_thumbnailpath.$catpath,
                                 $row->imgthumbname);
            }
            // Wenn weder Detail- noch Originalbild von anderen Bildern aus
            // der gleichen Kategorie benutzt werden, ...
            if ($count2 < 1) {
              // wird das Detailbild geloescht
              $this->Joom_DeletePicture($absolut_picturepath.$catpath,
                                 $row->imgfilename);
              // Wenn das Original vorhanden ist ...
              if (is_file($absolut_originalpath.$catpath.$row->imgfilename)) {
                // ...und wenn es beschreibbar (und damit loeschbar) ist ...
                if (Joom_CheckWriteable($absolut_originalpath.$catpath,
                                        $row->imgfilename)) {
                  // wird es geloescht
                  $this->Joom_DeletePicture($absolut_originalpath.$catpath,
                                     $row->imgfilename);
                // Wenn das Original vorhanden ist und von keinem anderen Bild
                // aus der Kategorie benutzt wird, aber nicht loeschbar ist, ...
                } else {
                  // dann Abbruch der Funktion mit entsprechender Fehlermeldung
                  Joom_AlertErrorMessages(0, $row->catid,
                                          $absolut_originalpath.$catpath,
                                          $row->imgfilename);
                }
              }
            }
          // Wenn das Detail-Bild nicht beschreibbar (und damit loeschbar ist) ...
          } else {
            // dann Abbruch der Funktion mit entsprechender Fehlermeldung
            Joom_AlertErrorMessages(0, $row->catid, $absolut_picturepath.$catpath,
                                    $row->imgfilename);
          }
        // Wenn das Thumbnail nicht beschreibbar (und damit loeschbar ist) ...
        } else {
          // dann Abbruch der Funktion mit entsprechender Fehlermeldung
          Joom_AlertErrorMessages(0, $row->catid, $absolut_thumbnailpath.$catpath,
                                  $row->imgthumbname);
        }
      // wenn die Datenbankabfrage nicht durchgefuehrt werden konnte, Abbruch mit
      // entsprechender Fehlermeldung
      } else {
        echo "<script> alert('".$database->getErrorMsg()."');
              window.history.go(-1); </script>\n";
      }
      // Loeschung des Datenbank-Eintrages fuer das Bild
      $database->setQuery("DELETE
          FROM #__joomgallery
          WHERE id = $cid[$i]");
      if (!$database->query()) {
        echo "<script> alert('".$database->getErrorMsg()."');
              window.history.go(-1); </script>\n";
      }
      // Loeschung der Datenbank-Eintraege fuer alle Kommentare auf das Bild
      $database->setQuery("DELETE
          FROM #__joomgallery_comments
          WHERE cmtpic = $cid[$i]" );
      if (!$database->query()) {
        echo "<script> alert('".$database->getErrorMsg()."');
              window.history.go(-1); </script>\n";
      }
      // Loeschung der Datenbank-Eintraege fuer ggf. vorhandene Namensschilder
      $database->setQuery("DELETE
          FROM #__joomgallery_nameshields
          WHERE npicid = $cid[$i]" );
      if (!$database->query()) {
        echo "<script> alert('".$database->getErrorMsg()."');
              window.history.go(-1); </script>\n";
      }      

      // Aufnahme der ID des erfolgreich geloeschten Bildes in das Array
      array_push($deleted_items, $cid[$i]);
    }
  }
  mosRedirect('index2.php?option='. $option .'&task=pictures');
}


/**
* Loescht eine Datei oder ein Bild aus einem Verzeichnis.
*
* @param    string    $path: Pfad zur zu loeschenden Datei
* @param    string    $file: die zu loeschende Datei
* @return   boolean   $result: "true" oder "false"
*/
function Joom_DeletePicture($path, $file) {
// TODO: results an Fehlermeldungen anpassen
  // Wenn die Datei im angegebenen Verzeichnis existiert...
  if (is_file($path.$file)) {
    // ...wird versucht, die Datei zu loeschen...
    if (unlink($path.$file)) {
        // ...und wenn der Loeschvorgang erfolgreich war, wird das Verzeichnis
        // geschlossen und 0 ausgegeben
        $result = true;;
      // ...wenn die Datei nicht geloescht werden kann, wird false ausgegeben
    } else {
      $result = false;
    }
  // Wenn die Datei im angegebenen Verzeichnis nicht existiert, wird eine
  // Fehlernummer ausgegeben
  } else {
    $result = false;
  }
return $result;
}


function Joom_CancelEditPicture ($option) {
  mosRedirect('index2.php?option='. $option .'&task=pictures');
}


}

?>
