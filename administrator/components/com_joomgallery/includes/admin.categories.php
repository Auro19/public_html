<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/admin.categories.php $
// $Id: admin.categories.php 396 2009-03-15 16:06:21Z aha $
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

include_once dirname(__FILE__) . '/html/admin.categories.html.php';

class Joom_AdminCategories {


  function Joom_AdminCategories($task, $cid) {
    global $option,$ordering,$parent,$access;

    $access                = mosGetParam($_REQUEST, 'access', '');
    $ordering              = mosGetParam($_REQUEST, 'ordering', '');
    $parent                = mosGetParam($_REQUEST, 'parent', '');
/*
    $name                  = Joom_FixUserEntrie(mosGetParam($_REQUEST, 'name', ''));
    $description           = Joom_FixAdminEntrie(mosGetParam($_REQUEST, 'description', ''));
    $img_position          = mosGetParam($_REQUEST, 'img_position', '');
    $catimage              = mosGetParam($_REQUEST, 'catimage', '');
    $catpath               = mosGetParam($_REQUEST, 'catpath', '');
    $sordercat             = mosGetParam($_REQUEST, 'sordercat', null);
*/

    switch($task) {
      case 'categories':
        $this->Joom_ShowCategories($option);
        break;

      case 'orderupcatg':
        $this->Joom_OrderCategory($cid[0], -1, $option);
        break;

      case 'orderdowncatg':
        $this->Joom_OrderCategory($cid[0], 1, $option);
        break;

      case 'publishcatg':
        $this->Joom_PublishCategories($cid, 1, $option);
        break;

      case 'unpublishcatg':
        $this->Joom_PublishCategories($cid, 0, $option);
        break;

      case 'newcatg':
        $this->Joom_ShowNewCategory($option,$cid);
      break;

      case 'savenewcatg':
        $this->Joom_SaveNewCategory($option);
        break;

      case 'editcatg':
        $this->Joom_ShowEditCategory($cid[0], $option);
        break;

      case 'saveeditcatg':
        $this->Joom_SaveEditCategory($option,$cid);
        break;

//   case 'movecatg':
//     $this->Joom_ShowMoveCategories($option);
//     break;
//
//   case 'savemovecatg':
//     $this->Joom_SaveMoveCategories($option);
//     break;

      case 'removecatg':
        $this->Joom_RemoveCategories($cid, $option);
        break;

      case 'cancelcatg':
        $this->Joom_CancelCategory($option);
        break;
    }
  }

/******************************************************************************\
*                           Functions / Categories                             *
\******************************************************************************/

/**
* Ermittelt alle notwendigen Daten zur Anzeige aller Kategorien ueber den
* Category Manager und stellt diese Daten der gleichnamigen HTML-Funktion zur
* Verfuegung
*
* @param    string    $option: Joomla-Variable z.B. "com_joomgallery"
*/
function Joom_ShowCategories($option) {
  global $database, $mainframe, $mosConfig_list_limit;

  $limit      = $mainframe->getUserStateFromRequest('viewlistlimit','limit',$mosConfig_list_limit);
  $limitstart = $mainframe->getUserStateFromRequest("view{$option}limitstart",'limitstart',0);
  $search     = $mainframe->getUserStateFromRequest("search{$option}",'search','');
  $search     = $database->getEscaped(trim(strtolower($search)));

  $sortcat    = $mainframe->getUserStateFromRequest("sortcat{$option}",'sortcat',0);
  $sordercat  = $mainframe->getUserStateFromRequest("sordercat{$option}",'sordercat',0);

  //Sortierung
  $sortorder  = '';
  switch($sordercat) {
    case 0:
      $sortorder = 'a.ordering ASC';
      break;
    case 1:
      $sortorder = 'a.ordering DESC';
      break;
    case 2:
      $sortorder = 'a.catpath ASC';
      break;
    case 3:
      $sortorder = 'a.catpath DESC';
      break;
    case 4:
      $sortorder = 'a.cid ASC';
      break;
    case 5:
      $sortorder = 'a.cid DESC';
      break;
    case 6:
      $sortorder = 'a.name ASC';
      break;
    case 7:
      $sortorder = 'a.name DESC';
      break;
    case 8:
      $sortorder = 'a.owner ASC';
      break;
    case 9:
      $sortorder = 'a.owner DESC';
      break;
  }
  if ($sortorder != '') {
    $sortorder = 'ORDER BY '.$sortorder;
  }

  $where = array();
  //Filter by Type
  switch($sortcat) {
    case 1: //published
      $where[] = 'published = 1';
      break;
    case 2: //not published
      $where[] = 'published = 0';
      break;
    case 3: //UserCats
      $where[] = 'owner IS NOT NULL';
      break;
    case 4: //AdminCats
      $where[] = 'owner IS NULL';
      break;
  }

  if ($search) {
    $where[] = " a.name LIKE '%$search%' OR a.description LIKE '%$search%'";
  }

  $whereclause = count($where) ? 'WHERE ' . implode(' AND ', $where) : '';

  //Navigation festlegen
  $database->setQuery("SELECT COUNT(*)
      FROM #__joomgallery_catg AS a
      LEFT JOIN #__groups AS g ON g.id = a.access
      $whereclause");
  $total = $database->loadResult();

  require_once("includes/pageNavigation.php");
  $pageNav = new mosPageNav( $total, $limitstart, $limit  );

  //DB-Abfrage
  $query="SELECT a.*, g.name AS groupname
      FROM #__joomgallery_catg AS a
      LEFT JOIN #__groups AS g ON g.id = a.access
      $whereclause
      $sortorder";
  
  if ($limit != 0) {
    $query .= " LIMIT $limitstart, $limit";
  }

  $database->setQuery($query);

  $rows = $database->loadObjectList();

  $o_options[] = mosHTML::makeOption(_JGA_ORDERBY_ORDERING_ASC, 0);
  $o_options[] = mosHTML::makeOption("1", _JGA_ORDERBY_ORDERING_DESC);
  $o_options[] = mosHTML::makeOption("2", _JGA_ORDERBY_CATPATH_ASC);
  $o_options[] = mosHTML::makeOption("3", _JGA_ORDERBY_CATPATH_DESC);
  $o_options[] = mosHTML::makeOption("4", _JGA_ORDERBY_DBID_ASC);
  $o_options[] = mosHTML::makeOption("5", _JGA_ORDERBY_DBID_DESC);
  $o_options[] = mosHTML::makeOption("6", _JGA_ORDERBY_CATNAME_ASC);
  $o_options[] = mosHTML::makeOption("7", _JGA_ORDERBY_CATNAME_DESC);
  $o_options[] = mosHTML::makeOption("6", _JGA_ORDERBY_DBOWNERID_ASC);
  $o_options[] = mosHTML::makeOption("7", _JGA_ORDERBY_DBOWNERID_DESC);
  
  $olist = mosHTML::selectList($o_options, 'sordercat',
           'class="inputbox" size="1" onchange="document.adminForm.submit();"',
           'value', 'text', $sordercat);

  $s_options[] = mosHTML::makeOption('', 0);
  $s_options[] = mosHTML::makeOption("1", _JGA_PUBLISHED);
  $s_options[] = mosHTML::makeOption("2", _JGA_NOT_PUBLISHED);
  $s_options[] = mosHTML::makeOption("3", _JGA_USERCATEGORIES_ONLY);
  $s_options[] = mosHTML::makeOption("4", _JGA_BACKENDCATEGORIES_ONLY);

  $slist = mosHTML::selectList($s_options, 'sortcat',
           'class="inputbox" size="1" onchange="document.adminForm.submit();"',
           'value', 'text', $sortcat);

  HTML_Joom_AdminCategories::Joom_ShowCategories_HTML($rows, $search, $slist,
                                                      $olist, $pageNav, $option);
}


/**
* Stellt die Funktionalitaet zur Anordnung der Kategorien ueber die Pfeil-Symbole
* zur Verfuegung
*
* @param    integer    $uid: ID der Kategorie z.B. "10"
* @param    integer    $inc: Steuerungsvariable Up oder Down, "1" oder "-1"
* @param    string     $option: Joomla-Variable z.B. "com_joomgallery"
*/
function Joom_OrderCategory($uid, $inc, $option) {
  global $database;

  // Erstellt ein neues Objekt in der Klasse mosCatgs
  $fp = new mosCatgs($database);
  // Laedt die Datenbank-Tabellenzeile
  $fp->load($uid);
  // Verschiebt die Datenbankzeile entweder um einen nach oben oder um einen
  // nach unten
  $fp->move($inc);
  // Erstellt die korrigierte Anordnung fuer alle Kategorien und speichert sie
  $fp->updateOrder();
  // Redirect zum Category Manager
  mosRedirect('index2.php?option='. $option .'&task=categories');
}


/**
* Kann mehrere ueber die Kategorie-Liste ausgewaehlte Kategorien gleichzeitig
* veroeffentlichen oder unveroeffentlichen
*
* @param    integer    $cid: ID der Kategorie z.B. "10"
* @param    integer    $publish: Published oder Unpublished, "1" oder "0"
* @param    string     $option: Joomla-Variable z.B. "com_joomgallery"
*/
function Joom_PublishCategories($cid=null, $publish=1, $option) {
  global $database;

  if (!is_array($cid) || count($cid) < 1) {
    $action = $publish ? 'publish' : 'unpublish';
    echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
    exit;
  }

  $cids = implode(',', $cid);
  $database->setQuery("UPDATE #__joomgallery_catg
      SET published='$publish'
      WHERE cid IN ($cids)");
  if (!$database->query()) {
    echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
    exit();
  }

  if (count($cid) == 1) {
    $row = new mosCatgs($database);
    $row->checkin($cid[0]);
  }
  // Redirect zum Category Manager
  mosRedirect('index2.php?option='. $option .'&task=categories');
}


/**
* Ermittelt alle notwendigen Daten zur Erstellung einer neuen Kategorie ueber New
* aus dem Category Manager und stellt diese Daten der gleichnamigen HTML-
* Funktion zur Verfuegung
*
* @param    string    $option: Joomla-Variable z.B. "com_joomgallery"
*/
function Joom_ShowNewCategory($option,$cid) {
  global $database,$ordering, $published, $access, $parent,$jg_wrongvaluecolor;

  // Erstellung der DropDown-Kategorie-Liste fuer die uebergeordnete Kategorie
  $Lists['catgs'] = Joom_ShowDropDownCategoryList(0, 'parent');

  // Holt die Liste der verfuegbaren Gruppen (Public, Registered, Special)
  $database->setQuery("SELECT id AS value, name AS text
      FROM #__groups
      ORDER BY id");
  $groups = $database->loadObjectList();
  // Erstellung der Liste fuer den Zugriff
  $glist = mosHTML::selectList($groups, 'access', 'class="inputbox" size="1"',
  'value', 'text', intval($access));

  // Erstellung der Auswahlliste fuer die Veroeffentlichung
  $yesno[] = mosHTML::makeOption('1', _JGA_YES);
  $yesno[] = mosHTML::makeOption('0', _JGA_NO);
  // build the html select list
  $publist = mosHTML::selectList($yesno, 'published', 'class="inputbox" size="1"',
                                 'value', 'text', $published);

  // Erstellung der Liste fuer die Anordnung der Kategorie
  $orders = mosGetOrderingList("SELECT ordering AS value, name AS text
      FROM #__joomgallery_catg
      ORDER BY ordering");
  $orderlist = mosHTML::selectList($orders, 'ordering', 'class="inputbox" size="1"',
                                   'value', 'text', intval($ordering));

  // Uebergabe der Daten an die Funktion Joom_NewCategory_HTML
  HTML_Joom_AdminCategories::Joom_ShowNewCategory_HTML($option, $publist, $glist,
                                                       $Lists, $orderlist,
                                                       $jg_wrongvaluecolor);
}


/**
* Speichert eine neu angelegte Kategorie.
* Die Funktion erstellt zunaechst den Datenbankeintrag und prueft danach, ob die
* erforderlichen Verzeichnisse fuer die Kategorie angelegt werden koennen. Ist
* dies erfolgreich, wird der Datenbankeintrag um den Kategorie-Pfad ergaenzt.

* @param    string    $option: Joomla-Variable z.B. "com_joomgallery"
*/
function Joom_SaveNewCategory($option) {
  global $database, $my, $absolut_originalpath, $absolut_picturepath,
         $absolut_thumbnailpath;

  // Anlegen einer neuen Datenbank-Zeile durch die Klasse mosCatgs
  $row = new mosCatgs($database);
  // Wenn die neue Datenbank-Zeile nicht hinzugefuegt werden kann, Ausgabe des
  // Fehlers und Ruecksprung auf die vorangegangene Seite; Abbruch dieser Funktion
  if (!$row->bind($_POST)) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }
  if(get_magic_quotes_gpc()) {
    $row->name=stripslashes($row->name);
    $row->description=stripslashes($row->description);
  }
  // Macht die Variable sicher
  mosMakeHtmlSafe($row->name);
  // Ueberprueft, ob aus der Kategorie-ID eine Integer-Zahl gemacht werden kann.
  // Wenn nicht, Ausgabe des Fehlers und Ruecksprung auf die vorangegangene
  // Seite und Abbruch dieser Funktion
  if (!$row->check()) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }

  // Wenn die neue Zeile in der Datenbank-Tabelle nicht erstellt , Abbruch dieser
  // Funktion mit Fehlermeldung und Ruecksprung auf die vorangegangene Seite
  if (!$row->store()) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }
  // Checkt das neue Objekt ein
  $row->checkin();
  // Ordnet die Datenbank-Tabelle neu an
  $row->updateOrder('');
  // Wenn die neue Kategorie einer anderen Kategorie als Unterkategorie
  //zugeordnet werden soll ...
  if ($row->parent) {
    // ...wird der Kategorie-Pfad der Eltern-Kategorie in einer Variable
    // gespeichert ...
    $parentpath = Joom_GetCatPath($row->parent);
  // ...ansonsten bleibt die Variable leer
  } else {
    $parentpath="";
  }
  // Erstellung des catpath
  // "Saeuberung" des eingegebenen Kategorie-Titels durch die Funktion
  // Joom_FixFilename; Umlaute werden umgewandelt und alle Sonderzeichen bis auf
  // den Unterstrich entfernt, gilt nur fuer den catpath
  $newcatname = Joom_FixFilename($row->name);
  // An den gesaeuberten Kategorie-Titel wird ein Unterstrich und die Kategorie-
  // ID angehaengt, gilt nur fuer den catpath
  $newcatname = $newcatname . '_' . $row->cid;
  // Dem Kategorie-Pfad wird - sofern vorhanden - der Eltern-Kategorie-Pfad
  // vorangestellt
  $newcatname = $parentpath . $newcatname;
  // Zusammensetzen der einzelnen Pfade der Kategorie fuer Originals, Pictures
  // und Thumbnails
  $cat_originalpath  = $absolut_originalpath.$newcatname;
  $cat_picturepath   = $absolut_picturepath.$newcatname;
  $cat_thumbnailpath = $absolut_thumbnailpath.$newcatname;
//TODO: Fehlermeldungen anpassen
  // Erstellung des neuen Originals-Verzeichnisses fuer die Kategorie
  $resorig = Joom_MakeDirectory($cat_originalpath);
  // Wenn die Erstellung des Original-Verzeichnisses fuer die Kategorie
  // fehlgeschlagen ist, Loeschung des bereits erstellten Datenbankeintrages
  // und Ausgabe der entsprechenden Fehlermeldung; Abbruch
  if ($resorig != 0) {
    $row->delete();
    Joom_AlertErrorMessages(0, 0, 0, 0);
  } else {
    //Kopieren der index.html in das neue Verzeichnis
    Joom_CopyFile($absolut_originalpath.'index.html',$cat_originalpath,'index.html');
  }
  // Erstellung des neuen Pictures-Verzeichnisses fuer die Kategorie
  $respic = Joom_MakeDirectory($cat_picturepath);
  // Wenn die Erstellung des Pictures-Verzeichnisses fuer die Kategorie
  // fehlgeschlagen ist, Loeschung des bereits erstellten Datenbankeintrages,
  // Loeschung des bereits erstellten Originals-Verzeichnisses
  // und Ausgabe der entsprechenden Fehlermeldung; Abbruch
  if ($respic != 0) {
    $row->delete();
    if ($resorig == 0) {
      Joom_DeleteDirectory($cat_originalpath);
    }
    Joom_AlertErrorMessages(0, 0, 0, 0);
  } else {
    //Kopieren der index.html in das neue Verzeichnis
    Joom_CopyFile($absolut_picturepath.'index.html',$cat_picturepath,'index.html');
  }
  // Erstellung des neuen Thumbnails-Verzeichnisses fuer die Kategorie
  $resthumb = Joom_MakeDirectory($cat_thumbnailpath);
  // Wenn die Erstellung des Thumbnails-Verzeichnisses fuer die Kategorie
  // fehlgeschlagen ist, Loeschung des bereits erstellten Datenbankeintrages,
  // Loeschung des bereits erstellten Originals- und Pictures-Verzeichnisses
  // und Ausgabe der entsprechenden Fehlermeldung; Abbruch
  if ($resthumb != 0) {
    $row->delete();
    if ($resorig == 0) {
      Joom_DeleteDirectory($cat_originalpath);
    }
    if ($respic == 0) {
      Joom_DeleteDirectory($cat_picturepath);
    }
    Joom_AlertErrorMessages(0, 0, 0, 0);
  }  else {
    //Kopieren der index.html in das neue Verzeichnis
    Joom_CopyFile($absolut_thumbnailpath.'index.html',$cat_thumbnailpath,'index.html');
  }

  // Wenn alle Verzeichnisse ordnungsgemaess angelegt wurden...
  if ($resorig == 0 && $respic == 0 && $resthumb == 0) {
    // ...Update des Datenbankeintrages fuer die Kategorie; dabei wird der
    // Kategorie ihr neuer catpath zugewiesen.
    $database->setQuery("UPDATE #__joomgallery_catg
        SET catpath='$newcatname'
        WHERE cid=$row->cid");
    $database->query();
  }
  // Redirect zum Category Manager
  mosRedirect('index2.php?option='. $option .'&task=categories');
}


/**
* Setzt die Daten fuer das Edit einer Kategorie ueber den Category Manager
* zusammen und stellt diese der gleichnamigen HTML-Funktion zur Verfuegung

* @param    integer   $uid: Die ID der Kategorie z.B. "10"
* @param    string    $option: Joomla-Variable z.B. "com_joomgallery"
*/
function Joom_ShowEditCategory($uid, $option) {
  global $database,$jg_paththumbs,$jg_wrongvaluecolor;

  // Mit Hilfe der Klasse mosCatgs wird eine neues Objekt angelegt
  $row = new mosCatgs($database);
  // Laedt die Tabellenzeile fuer die Kategorie aus der Datenbank
  $row->load($uid);
  $parent = $row->parent;

  // Erstellung der DropDown-Kategorie-Liste fuer die Uebergeordnete Kategorie
  $Lists['catgs'] = Joom_ShowDropDownCategoryList($parent, 'parent', '', $uid);

  // Holt die Liste der verfuegbaren Gruppen (Public, Registered, Special)
  $database->setQuery("SELECT id AS value, name AS text
      FROM #__groups
      ORDER BY id");
  $groups = $database->loadObjectList();
  // Erstellung der Liste fuer den Zugriff
  $glist = mosHTML::selectList($groups, 'access', 'class="inputbox" size="1"',
  'value', 'text', intval($row->access));

  // Erstellung der Liste fuer die Anordnung der Kategorie
  $orders = mosGetOrderingList("SELECT ordering AS value, name AS text
      FROM #__joomgallery_catg
      ORDER BY ordering");
  $orderlist = mosHTML::selectList($orders, 'ordering', 'class="inputbox" size="1"',
  'value', 'text', intval($row->ordering));

  // Erstellung der Liste fuer die Thumbnail-Position
  $align[]    = mosHTML::makeOption('0' , _JGA_LEFT);
  $align[]    = mosHTML::makeOption('1' , _JGA_RIGHT);
  $align[]    = mosHTML::makeOption('2' , _JGA_CENTER);
  $align_list = mosHTML::selectList($align, 'img_position', 'class="inputbox" size="1"',
  'value', 'text', $row->img_position);

  // Erstellung der Liste der verfuegbaren Kategorie-Thumbnails
  $database->setQuery("SELECT imgthumbname
      FROM #__joomgallery
      WHERE catid=$uid
      ORDER BY imgthumbname");
  $thuFiles2 = $database->loadObjectList();
  $thumbs2   = array(mosHTML::makeOption('', _JGA_PLEASE_SELECT_THUMBNAIL));
  foreach ($thuFiles2 as $tfile2) {
    if (eregi("bmp|gif|jpg|jpeg|jpe|png", $tfile2->imgthumbname)) {
      $thumbs2[] = mosHTML::makeOption( $tfile2->imgthumbname);
    }
  }
  // Ermittelt den catpath fuer die Kategorie
  $catpath    = Joom_GetCatPath($row->cid);
  // Stellt die Funktionalitaet zur Anzeige des Thumbnails zur Verfuegung
  $thumblist2 = mosHTML::selectList($thumbs2, 'catimage', 'class=\"inputbox\" size=\"1\"'
  . " onchange=\"javascript:"
  . "if (document.forms[0].catimage.options[selectedIndex].value!='') {"
  .   "document.imagelib.src='..$jg_paththumbs/$catpath' "
  .   "+ document.forms[0].catimage.options[selectedIndex].value"
  . "} else {"
  .   "document.imagelib.src='../images/M_images/blank.png'}\"",
    'value', 'text', $row->catimage);

  // Uebergabe der Daten an die gleichnamige HTML-Funktion
  HTML_Joom_AdminCategories::Joom_ShowEditCategory_HTML($row, $publist, $option,
                                                        $glist, $Lists, $orderlist,
                                                        $thumblist2, $align_list,
                                                        $jg_paththumbs, $catpath,
                                                        $jg_wrongvaluecolor);
}


/**
* Speichert eine ueber Edit im Category Manager veraenderte Kategorie; erstellt
* den neuen, veraenderten Datenbankeintrag
* verschiebt ggf. bei Aenderung der Parentzuordnung die Bildordner
*
* @param    string    $option: Joomla-Variable z.B. "com_joomgallery"
*/
function Joom_SaveEditCategory(&$option,&$cid) {
  global $database,$absolut_originalpath, $absolut_picturepath,
         $absolut_thumbnailpath;

  $row = new mosCatgs($database);
  // Kategorie aus DB einlesen
  $row->load( $cid );

  //alte Parentzuordnung lesen
  $parentold = $row->parent;
  //alten Namen lesen
  $catnameold = $row->name;

  //neue Werte einlesen
  if (!$row->bind($_POST)) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }
  if(get_magic_quotes_gpc()) {
    $row->name=stripslashes($row->name);
    $row->description=stripslashes($row->description);
  }

  // Macht den neuen Kategorienamen sicher, wenn geaendert
  if ($catnameold != $row->name){
    mosMakeHtmlSafe($row->name);
    // Joom_FixCatname; Umlaute werden umgewandelt und alle Sonderzeichen bis auf
    // den Unterstrich entfernt, gilt nur fuer den catpath
    $catname = Joom_FixFilename($row->name);
    $catnamemodif = true;
  } else {
    $catname = $catnameold;
    $catnamemodif = false;
  }

  //Kategorieordner verschieben, wenn die Parentzuordnung oder der Kategoriename
  //geaendert wurde
  if ($parentold != $row->parent || $catnamemodif == true){
    //alten Pfad sichern
    $catpathold = $row->catpath;
    $parentpathnew = Joom_GetCatPath($row->parent);

    $catpathnew = $parentpathnew . $catname . '_' . $row->cid;

    $cat_originalpathold  = $absolut_originalpath.$catpathold;
    $cat_picturepathold   = $absolut_picturepath.$catpathold;
    $cat_thumbnailpathold = $absolut_thumbnailpath.$catpathold;

    $cat_originalpathnew  = $absolut_originalpath.$catpathnew;
    $cat_picturepathnew   = $absolut_picturepath.$catpathnew;
    $cat_thumbnailpathnew = $absolut_thumbnailpath.$catpathnew;

    //Ordner verschieben

    //Kategoriepfad in DB aktualisieren
    $row->catpath=$catpathnew;

    //TODO Fehlermeldungen
    Joom_MoveDir($cat_originalpathold,$cat_originalpathnew);
    Joom_MoveDir($cat_picturepathold,$cat_picturepathnew);
    Joom_MoveDir($cat_thumbnailpathold,$cat_thumbnailpathnew);

    //wenn Parentkategorie geaendert wurde, den Catpath aller Unterkategorien
    //in DB anpassen
    $rowid=$row->cid;
    Joom_UpdateNewCatpath($rowid,$catpathold,$catpathnew);
  }

  if (!$row->store()) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }
  // Redirect zum Category Manager
  mosRedirect('index2.php?option='. $option .'&task=categories');
}


/**
* Ermittelt, ob fuer die zu loeschende Kategorie noch Bilder oder zugeordnete
* Unterkategorien in der Datenbank eingetragen sind; wenn ja, dann wird der
* Loeschvorgang abgebrochen, wenn nein, wird ein Array mit den Kategorie-ID's
* an die Funktion Joom_DeleteCategory uebergeben, die dann Verzeichnisse und
* DB-Eintraege der Kategorie loescht.
*
* @param    Array     $cid: die ID's der entsprechenden Kategorien
* @param    string    $option: Joomla-Variable z.B. "com_joomgallery"
*/
function Joom_RemoveCategories($cid, $option) {
  global $database;

//TODO: Error-Messages anpassen
  // Prueft, ob Kategorien ausgewaehlt wurden
  if (count($cid)) {
    // Erstellt zwei neue Arrays
    $notemptycids = array();// dient zur Aufnahme der ID's derjenigen Kategorien,
                            // die noch Bilder enthalten
    $emptycids    = array();// dient zur Aufnahme der ID's derjenigen Kategorien,
                            // die keine Bilder enthalten
    // Schleife zur Ueberpruefung der ausgewaehlten Kategorien
    foreach ($cid as $cc) {
      // Datenbankabfrage zur Ermittlung, ob in der jeweiligen Kategorie noch
      // Bilder existieren
      $database->setQuery("SELECT COUNT(id)
          FROM #__joomgallery
          WHERE catid = '$cc'");
      $is_notempty = $database->loadResult();
      // Je nachdem, ob sich in der Kategorie noch Bilder befinden, werden die
      // ID's der Kategorien in die entsprechenden Arrays geschrieben
      if (!$is_notempty) {
        array_push($emptycids , $cc);
      } else {
        array_push($notemptycids, $cc);
      }
    }
    // Ueberpruefung, ob es ueberhaupt leere Kategorien gibt und gleichzeitig keine
    // nicht leeren Kategorien
    if (count($emptycids) && !count($notemptycids)) {
      //Schleife zur Ueberpruefung der leeren Kategorien
      foreach ($emptycids as $ecids ) {
        // Datenbankabfrage: Ermittlung, ob der Kategorie noch Unterkategorien
        // zugeordnet sind
        $database->setQuery("SELECT COUNT(cid)
            FROM #__joomgallery_catg
            WHERE parent = '$ecids'");
        $is_nosubcat = $database->loadResult();
        //Erstellt zwei neue Arrays
        $nosubcats = array();// dient zur Aufnahme der Kategorie-ID's,
                             // denen keine Unterkategorien mehr zugeordnet sind
        $subcats   = array();// dient zur Aufnahme der Kategorie-ID's,
                             // denen noch Unterkategorien zugeordnet sind
        // Je nachdem, ob der Kategorie noch Unterkategorien zugeordnet sind,
        // werden die Kategorie-ID's in die entsprechenden Arrays geschrieben
        if (!$is_nosubcat) {
          array_push($nosubcats , $ecids);
        } else {
          array_push($subcats, $ecids);
        }
        // Ueberpruefung, ob es ueberhaupt Kategorien ohne zugeordnete
        // Unterkategorien gibt und gleichzeitig keine Kategorien, denen noch
        // Unterkategorien zugeordnet sind
        if (count($nosubcats) && !count($subcats)) {
          // Schleife zur Loeschung der Kategorien ohne Unterkategorien
          foreach ($nosubcats as $nosubs) {
            // Uebergabe des Loeschvorgangs an die Funktion Joom_DeleteCategory
            $this->Joom_DeleteCategory($nosubs);
          }
        // Wenn es unter den leeren Kategorien keine ohne zugeordente
        // Unterkategorien gibt oder nur Kategorien mit zugeordneten
        // Unterkategorien, dann Fehlermeldung und Abbruch
        } else {
          Joom_AlertErrorMessages(0, $subcats, 0, 0);
        }
      }
    // Wenn es keine Kategorien ohne Bilder oder nur Kategorien mit Bildern
    // gibt, dann Fehlermeldung und Abbruch
    } else {
      Joom_AlertErrorMessages(1001, $notemptycids, 0, 0);
    }
  }
  // Redirect zum Category Manager
  mosRedirect('index2.php?option='. $option .'&task=categories');
}


/**
* Loescht sowohl die Verzeichnisse als auch den Datenbankeintrag der Kategorie.
*
* @param    integer   $catid: die ID der entsprechenden Kategorie, z.B. "10"
*/
function Joom_DeleteCategory($catid) {
  global $database, $absolut_originalpath, $absolut_picturepath,
         $absolut_thumbnailpath;

  // Ermittlung des Pfades fuer die Kategorie
  $catpath = Joom_GetCatPath($catid);
  // Zusammensetzen der Pfade fuer Originalbilder, Detailbilder und Thumbnails
  $catorigdir  = $absolut_originalpath . $catpath;
  $catpicdir   = $absolut_picturepath . $catpath;
  $catthumbdir = $absolut_thumbnailpath . $catpath;
  // Uebergabe der Pfade an die Funktion Joom_CheckEmptyDirectory zur
  // Ueberpruefung, ob die Verzeichnisse leer und beschreibbar sind bzw.
  // ausreichende Rechte fuer eine Loeschung vorhanden sind
  Joom_CheckEmptyDirectory($catorigdir, $catid);
  Joom_CheckEmptyDirectory($catpicdir, $catid);
  Joom_CheckEmptyDirectory($catthumbdir, $catid);
// TODO: fuer den Einsatz dieser Funktion im Frontend ist @rmdir zu empfehlen,
// um die Pfade unsichtbar zu halten
  // Loeschen des Original-Verzeichnisses
  $resorig = Joom_DeleteDirectory($catorigdir);
  // Wenn das Loeschen des Originals-Verzeichnisses nicht erfolgreich war,
  // Abbruch und entsprechende Fehlermeldung
  if (!$resorig) Joom_AlertErrorMessages(0, $catid, $catorigdir, 0);
  // Loeschen des Pictures-Verzeichnisses
  $respic = Joom_DeleteDirectory($catpicdir);
  // Wenn das Loeschen des Pictures-Verzeichnisses nicht erfolgreich war...
  if (!$respic) {
     //   wird versucht, das Originals-Verzeichnis wiederherzustellen...
    $resdiro = Joom_MakeDirectory($catorigdir);
    //   wenn das Wiederherstellen des Originals-Verzeichnis fehlschlaegt...
    if ($resdiro != 0) {
      //   Abbruch und entsprechende Fehlermeldung...
      if ($resdiro == -1) Joom_AlertErrorMessages(0, $catid, $catorigdir, 0);
      if ($resdiro == -2) Joom_AlertErrorMessages(0, $catid, $catorigdir, 0);
    } else {
      //   ansonsten Abbruch und Fehlermeldung zum Pictures-Verzeichnis
      Joom_AlertErrorMessages(0, $catid, $catpicdir, 0);
    }
  }
  // Loeschen des Thumbnails-Verzeichnisses
  $resthumb = Joom_DeleteDirectory($catthumbdir);
  // Wenn das Loeschen des Thumbnails-Verzeichnisses nicht erfolgreich war...
  if (!$resthumb) {
    //   wird versucht, das Originals-Verzeichnis wiederherzustellen...
    $resdiro = Joom_MakeDirectory($catorigdir);
    //   wenn das Wiederherstellen des Originals-Verzeichnisses fehlschlaegt...
    if ($resdiro != 0) {
      //   Abbruch und entsprechende Fehlermeldung...
      if ($resdiro == -1) Joom_AlertErrorMessages(0, $catid, $catorigdir, 0);
      if ($resdiro == -2) Joom_AlertErrorMessages(0, $catid, $catorigdir, 0);
    } else {
      //   ansonsten Abbruch und Fehlermeldung zum Thumbnails-Verzeichnis
      Joom_AlertErrorMessages(0, $catid, $catthumbdir, 0);
    }
    //..und es wird versucht, das Pictures-Verzeichnis wiederherzustellen...
    $resdirp = Joom_MakeDirectory($catpicdir);
    //   wenn das Wiederherstellen des Pictures-Verzeichnisses fehlschlaegt...
    if ($resdirp != 0) {
      //   Abbruch und entsprechende Fehlermeldung...
      if ($resdirp == -1) Joom_AlertErrorMessages(0, $catid, $catpicdir, 0);
      if ($resdirp == -2) Joom_AlertErrorMessages(0, $catid, $catpicdir, 0);
    } else {
      //   ansonsten Abbruch und Fehlermeldung zum Thumbnails-Verzeichnis
      Joom_AlertErrorMessages(0, $catid, $catthumbdir, 0);
    }
  }
  // Nur wenn alle drei Verzeichnisse erfolgreich geloescht wurden, wird der
  // Datenbankeintrag auch geloescht
  $database->setQuery("DELETE
      FROM #__joomgallery_catg
      WHERE cid = $catid");
  $database->query();
  echo $database->getErrorMsg();
  // Update des Orderings
  $fp = new mosCatgs($database);
  $fp->updateOrder();
}


/**
* Bricht einen Bearbeitungsvorgang im Category Manager ab (Cancel).
*
* @param    string    $option: Joomla-Variable z.B. "com_joomgallery"
*/
function Joom_CancelCategory($option) {
  global $database;

  $row = new mosCatgs($database);
  $row->bind($_POST);
  $row->checkin();
  // Redirect zum Category Manager
  mosRedirect('index2.php?option='. $option .'&task=categories');
}


}
?>
