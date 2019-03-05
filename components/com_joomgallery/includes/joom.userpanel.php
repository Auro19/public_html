<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/joom.userpanel.php $
// $Id: joom.userpanel.php 396 2009-03-15 16:06:21Z aha $
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

class Joom_UserPanel {

  var $userid;
  var $picid;
  var $adminlogged;
    
  function Joom_UserPanel (&$option,&$func,&$cid) {
    global $my;
    include_once dirname(__FILE__) . '/html/joom.userpanel.html.php';
    $this->userid = intval( mosGetParam( $_REQUEST, 'uid', 0 ) );
    $this->picid = intval( mosGetParam( $_REQUEST, 'id', 0 ) );

    if ($my->usertype == 'Administrator' || $my->usertype == 'Super Administrator') {
      $this->adminlogged=true;
    } else {
      $this->adminlogged=false;
    }   
    
    switch ($func) {
      //Overview Pictures and Buttons New Picture and categories
      case 'userpanel':
        $this->Joom_User_PanelShow($option);
        break;
      case 'showusercats':
        $this->Joom_User_CatsShow($option);
        break;
      case 'newusercat':
      case 'editusercat':
        $this->Joom_User_EditUserCat($option,$cid);
        break;
      case 'saveusercat':
        $this->Joom_User_SaveUserCat($option,$cid);
        break;        
      case 'deleteusercat':
        $this->Joom_User_DeleteUserCat($option,$cid);
        break;  
      case 'editpic':
        $this->Joom_User_EditPic($option);
        break;
      case 'savepic':
        $this->Joom_User_SavePic($option);
        break;
      case 'deletepic':
        $this->Joom_User_DeletePic($option);
        break;
      case 'showupload':
        $this->Joom_User_ShowUpload($option);
        break;
      default:
        die();
        break;
    }
  }

  /**
   * Uebersicht aller Bilder
   *
   * @param string $option
   */
  function Joom_User_PanelShow (&$option) {
    global $database,$my,$mainframe,$mosConfig_list_limit,$mosConfig_absolute_path,
           $jg_showallpicstoadmin,$jg_usercat,$jg_usercategory,$jg_category,$jg_userowncatsupload;

    //Pagination part
    if(defined('_JEXEC')) {
      $list_limit = $mainframe->getUserStateFromRequest('viewlistlimit','limit',$mosConfig_list_limit);
    } else {
      $list_limit = intval(mosGetParam($_POST,'limit',$mosConfig_list_limit));
    }
    // read the limitstart from $_REQUEST, default = 1
    $limitstart = intval( mosGetParam( $_REQUEST, 'limitstart', 1 ) );
    if ($limitstart==0){
      $limitstart=1;   
    }       
    
    //Button 'Kategorien' wird nur angezeigt, wenn vom User angelegte Kategorien
    //vorhanden sind, die auch im Acces Level gueltig sind oder Backendkategorie
    //mit zutreffendem Acces Level zur Verfuegung steht
    //fuer Admin/SuperAdmin werden alle Backendkategorien angezeigt, Button
    //wird dort immer angezeigt
    if ($this->adminlogged) {
      $showcats=true;
      $showpicupload=true;
    } else {
      //Userkategorien lesen, die bereits angelegt sind und dem Acces Level 
      //des User entsprechen und zusaetzlich dem Acces Level entsprechende
      //Backendkategorien, wenn globale Freigabe im Backend eingestellt
      
      $query="SELECT cid FROM #__joomgallery_catg";

      if (!$jg_userowncatsupload){
        $query .= " WHERE owner IS NOT NULL";    
      }else{
        $query .= " WHERE owner=$my->id";    
      }
                    
      if (!empty($jg_category)){
        $query .= " OR cid in ($jg_category)";         
      }

      if ($jg_usercat && !empty($jg_usercategory)) {
        $query .= " OR (cid in ($jg_usercategory) AND access <= $my->gid)"; 
      }
      $database->setQuery($query);
      $result= $database->loadResultArray();
      
      if (!empty($jg_category)){
        $jgcats=explode(',',$jg_category);      
      } else {
        $jgcats=array();        
      }
      if ($jg_usercat && !empty($jg_usercategory)){
        $jgusercats=explode(',',$jg_usercategory);        
      } else {
        $jgusercats=array();
      }
      
      //soll Button fuer Upload angezeigt werden
      //Pruefung, ob im Backend Kategorien fuer den Upload freigegeben sind
      //oder vom User angelegte Kategorien
      //Catids von jg_usercat aus $result entfernen, wenn vorhanden
      //nicht, wenn die Kategorie gleichzeitig fuer den Upload freigegeben ist
      $resultarr=$result;
      if ($jg_usercat && !empty($jg_usercategory)){        
        $resultarr=array_diff($resultarr,array_diff($jgusercats,$jgcats));       
      }
      if (count($resultarr)==0){
        $showpicupload=false;
      }else{
        $showpicupload=true;
      }
      
      //soll Button Kategorien angezeigt werden
      //Catid von jg_category aus $result entfernen, wenn vorhanden
      //nicht, wenn die Kategorie gleichzeitig fuer Usercats freigegeben ist
      if ($jg_usercat && count($jgusercats)){
        $resultarr=$result;
        if (!empty($jg_category)){
          $resultarr=array_diff($resultarr, array_diff($jgusercats,$jgcats));
        }
        if (count($resultarr)==0){
          $showcats=false;
        }else{
          $showcats=true;
        }          
      }else{
        $showcats=false;
      }
    }

    //Sortierung
    if(defined('_JEXEC')) {
      $sordercat  = JRequest::getInt('sordercat',null);
      if(is_null($sordercat)) {
        $sordercat = $mainframe->getUserState('joom.userpanel.sordercat');
        if(is_null($sordercat)) {
          $sordercat = 0;
        }
      } else {
        $mainframe->setUserState('joom.userpanel.sordercat',$sordercat);
      }
    } else {
      $sordercat  = intval(mosGetParam($_REQUEST,"sordercat",0));
    }
    $sortorder  = '';
    switch($sordercat) {
      case 0:
        $sortorder = 'imgdate ASC';
        break;
      case 1:
        $sortorder = 'imgdate DESC';
        break;
      case 2:
        $sortorder = 'imgtitle ASC';
        break;
      case 3:
        $sortorder = 'imgtitle DESC';
        break;
      case 4:
        $sortorder = 'imgcounter ASC';
        break;
      case 5:
        $sortorder = 'imgcounter DESC';
        break;      
      case 6:
        $sortorder = 'catid ASC,imgtitle ASC';
        break;
      case 7:
        $sortorder = 'catid ASC,imgtitle DESC';
        break;
    }

    //Filter by Type
    if(defined('_JEXEC')) {
      $sortcat = JRequest::getInt('sortcat',null);
      $sortcat_state = $mainframe->getUserState('joom.userpanel.sortcat');
      if(is_null($sortcat)) {
        $sortcat = $sortcat_state;
        if(is_null($sortcat)) {
          $sortcat = 0;
        }
      } else {
        $mainframe->setUserState('joom.userpanel.sortcat',$sortcat);
        if($sortcat != $sortcat_state) {
          $limitstart = 1;  //number of images changes now, so go to first page
        }
      }
    } else {
      $sortcat = intval(mosGetParam($_REQUEST,"sortcat",0));
    }
    $where = '';
    switch($sortcat) {
      case 1: //approved
        $where = 'approved = 1';
        break;
      case 2: //not approved
        $where = 'approved = 0';
        break;
    }

    $query='';
    //Dem Admin/SuperAdmin werden alle veroeffentlichten Bilder abgezeigt, 
    //wenn die Option im Backend aktiviert ist
    if (($this->adminlogged) && $jg_showallpicstoadmin == 1 ) {
      $query= "SELECT *
          FROM #__joomgallery
          WHERE published = '1'";
    } else {
      $query="SELECT *
          FROM #__joomgallery
          WHERE owner=$my->id
          AND published = '1'";
    }

    if (!empty($where)) {
      $query .= ' AND '.$where;
    } 
    
    if (!empty($sortorder)) {
      $query .= ' ORDER BY '.$sortorder;
    } 

    //execute the query with the $limits
    //if list_limit = 0, then all pictures
    if ($list_limit == 0) {
      $database->setQuery($query);
      $rows = $database->loadObjectList();
      $totalcount=count($rows);    
    } else {
      //take the query and replace the 'select *' with 'select count(id)' -> $querycount
      //to count total rows for navigation
      $querycount=str_replace('SELECT *','SELECT COUNT(id)',$query);
      $database->setQuery($querycount);
      $totalcount=$database->loadResult();               
      
      if ($totalcount <= $list_limit) {
        $limitstart=1;        
      }
      if ($limitstart == 1) {
        $limitstart--;
      }
      $database->setQuery($query,$limitstart,$list_limit);              
      $rows = $database->loadObjectList();      
    }

    //create the navigation, only if pictures exist
    if ($totalcount){
      require_once( $mosConfig_absolute_path . '/administrator/includes/pageNavigation.php' );
      $pageNav = new mosPageNav($totalcount,$limitstart,$list_limit);                  
    } else {
      $pageNav=null;
    }

    //Sortierung der Bilder
    $o_options[] = mosHTML::makeOption("0", _JGS_USER_ORDERBY_DATE_ASC);
    $o_options[] = mosHTML::makeOption("1", _JGS_USER_ORDERBY_DATE_DESC);
    $o_options[] = mosHTML::makeOption("2", _JGS_USER_ORDERBY_TITLE_ASC);
    $o_options[] = mosHTML::makeOption("3", _JGS_USER_ORDERBY_TITLE_DESC);
    $o_options[] = mosHTML::makeOption("4", _JGS_USER_ORDERBY_HITS_ASC);
    $o_options[] = mosHTML::makeOption("5", _JGS_USER_ORDERBY_HITS_DESC);
    $o_options[] = mosHTML::makeOption("6", _JGS_USER_ORDERBY_CATNAME_ASC .' - '. _JGS_USER_ORDERBY_TITLE_ASC);
    $o_options[] = mosHTML::makeOption("7", _JGS_USER_ORDERBY_CATNAME_DESC .' - '. _JGS_USER_ORDERBY_TITLE_DESC);

    $olist = mosHTML::selectList($o_options, 'sordercat',
            'class="inputbox" size="1" onchange="adminForm.submit();"',
            'value', 'text', $sordercat);

    //Filter
    $s_options[] = mosHTML::makeOption("0",_JGS_ALL);
    $s_options[] = mosHTML::makeOption("1", _JGS_APPROVED_ONLY);
    $s_options[] = mosHTML::makeOption("2", _JGS_NOT_APPROVED_ONLY);
    
    $slist = mosHTML::selectList($s_options, 'sortcat',
            'class="inputbox" size="1" onchange="adminForm.submit();"',
            'value', 'text', $sortcat);
    
    
    HTML_Joom_UserPanel::Joom_User_PanelShow_HTML($showcats,$showpicupload,$olist,$slist,$rows,$pageNav);
  }
  
  /**
   * Uebersicht aller Userkategorien
   *
   * @param string $option
   */
  function Joom_User_CatsShow (&$option) {
    global $my,$database, $jg_showallpicstoadmin;
    
    //wenn user = admin* und alle cat angezeigt werden sollen
    if ($this->adminlogged && $jg_showallpicstoadmin == 1 ) {
      $database->setQuery("SELECT cid,name,catpath,catimage,parent,published
          FROM #__joomgallery_catg" );
    } else {
      $database->setQuery("SELECT cid,name,catpath,catimage,parent,published
          FROM #__joomgallery_catg
          WHERE owner=$my->id" );                     
    }
    $rows=$database->loadObjectList();
    
    foreach ($rows as $key => $catobj) {
      //zusaetzlich pruefen, ob die Kategorie Parent ist
      $database->setQuery("SELECT count(cid)
          FROM #__joomgallery_catg
          WHERE parent = $catobj->cid" );
      
      $resultparent=$database->loadResult();
      
      //Bilder in Kategorie
      $database->setQuery("SELECT count(id)
          FROM #__joomgallery
          WHERE catid = $catobj->cid" );       

      $resultpics=$database->loadResult();
      $rows[$key]->piccount = $resultpics;
          
      if ($resultparent > 0 || $resultpics > 0) {
        $rows[$key]->allowdel = false;        
      } else {
        $rows[$key]->allowdel = true;
      }
    }
    
    HTML_Joom_UserPanel::Joom_User_CatsShow_HTML($rows);
  }
  
  /**
   * Aendern einer bestehenden Kategorie oder Anlegen einer neuen Kategorie
   *
   * @param string $option
   * @param int $cid category, if null -> new category
   */
  function Joom_User_EditUserCat (&$option,$cid) {
    global $database,$my,$mosConfig_live_site,$jg_paththumbs,$jg_usercatacc;
     
    // Erstellung der Auswahlliste fuer die Veroeffentlichung
    $yesno[] = mosHTML::makeOption('1', _JGS_YES);
    $yesno[] = mosHTML::makeOption('0', _JGS_NO);    
    
    // Erstellung der Liste fuer die Anordnung der Kategorie
    $orders = mosGetOrderingList("SELECT ordering AS value, name AS text
        FROM #__joomgallery_catg
        WHERE owner = $my->id
        ORDER BY ordering");
       
    if ($cid != 0){
      // existierende Kategorie
      $row = new mosCatgs($database);
      $row->load( $cid );
      
      //dem Admin/SuperAdmin werden alle Kategorien angezeigt
      if ($this->adminlogged) {
        $Lists['catgs'] = Joom_ShowDropDownCategoryList($row->parent,'parent','',$cid); 
      } else {        
        $Lists['catgs'] = $this->Joom_User_ShowDropDownCategoryList($row->parent,$cid,'parent');
      }
      // Auswahlliste fuer die Veroeffentlichung
      $publist = mosHTML::selectList($yesno, 'published', 
                                     'class="inputbox" size="1"',
                                     'value', 'text', $row->published);
      
      //Anordnung der Kategorie
      $orderlist = mosHTML::selectList($orders, 'ordering', 'class="inputbox" size="1"',
                                       'value', 'text', intval($row->ordering));
      $description = $row->description;
      $name = $row->name;

      //wenn Acces Level im Frontend geaendert werden duerfen ,die Access Level
      //suchen,die zwischen der $gid des user und dem im Backend eingestellten
      //Level der parent Kategorie liegen
      $glist=null;            
      if ($jg_usercatacc || $this->adminlogged) {
        $query="SELECT id AS value, name AS text FROM #__groups";       
        
        //wenn Admin oder SuperAdmin werden alle Level angezeigt
        if (!$this->adminlogged) {
          //parent Kategorie lesen
          $row2 = new mosCatgs($database);
          $row2->load( $row->parent );        
          $query .= " WHERE id >= $row2->access AND id <= $my->gid";                              
        }
        $query .= " ORDER BY id";      
        $database->setQuery($query);      
        $groups = $database->loadObjectList();
        
        //wenn nur ein Eintrag gefunden wurde, wird die Auswahl nicht angezeigt
        if (count($groups) > 1) {
          $glist = mosHTML::selectList($groups, 'access', 'class="inputbox" size="1"',
          'value', 'text', intval($row->access));          
        }
      }           
    } else {
      //Neue Kategorie
      //dem Admin/SuperAdmin werden alle Kategorien angezeigt
      if ($this->adminlogged) {
        $Lists['catgs'] = Joom_ShowDropDownCategoryList(0, 'parent', '');
      } else {        
        $Lists['catgs'] = $this->Joom_User_ShowDropDownCategoryList(0,null,'parent');
      }      
      
      //Admin/SuperAdmin werden bei Neuanlage alle Access Level angezeigt
      //sonst keine -> dann wird der Level des Parent übernommen
      $glist=null;            
      if ($this->adminlogged) {
        $query="SELECT id AS value, name AS text FROM #__groups
                ORDER BY id";

        $database->setQuery($query);      
        $groups = $database->loadObjectList();
        
        if (count($groups) > 1) {
          $glist = mosHTML::selectList($groups, 'access', 'class="inputbox" size="1"',
          'value', 'text', 0);          
        }
      } 
                
      // Auswahlliste fuer die Veroeffentlichung
      $publist = mosHTML::selectList($yesno, 'published', 
                                     'class="inputbox" size="1"',
                                     'value', 'text',0);
      //Anordnung der Kategorie
      $orderlist = mosHTML::selectList($orders, 'ordering', 
                                       'class="inputbox" size="1"',
                                       'value', 'text',1);
      $description = '';
      $name = ''; 
                           
    }
           
    // Erstellung der Liste der verfuegbaren und genehmigten
    // Kategorie-Thumbnails, nur bei existierenden Kategorien
    $thumblist=null;
    if ($cid!=0) {
      $database->setQuery("SELECT imgthumbname
          FROM #__joomgallery
          WHERE catid=$cid
          AND approved = 1
          ORDER BY imgthumbname");
      
      $thuFiles2 = $database->loadObjectList();
      $thumbs   = array(mosHTML::makeOption('', _JGS_SELECT_THUMBNAIL));
      foreach ($thuFiles2 as $tfile2) {
          $thumbs[] = mosHTML::makeOption( $tfile2->imgthumbname);
      }
      $catpath    = Joom_GetCatPath($cid);
  
      $thumblist = mosHTML::selectList($thumbs, 'catimage', 'class=\"inputbox\" size=\"1\"'
      . " onchange=\"javascript:"
      . "if (document.usercatForm.catimage.options[selectedIndex].value!='') {"
      .   "document.imagelib.src='$mosConfig_live_site/$jg_paththumbs/$catpath' "
      .   "+ document.usercatForm.catimage.options[selectedIndex].value"
      . "} else {"
      .   "document.imagelib.src='$mosConfig_live_site/images/M_images/blank.png'}\"",
        'value', 'text', $row->catimage);
    }
    HTML_Joom_UserPanel::Joom_User_EditUserCat_HTML($cid,$option, $publist,$glist,
                                                    $Lists, $orderlist,$thumblist,
                                                    $description,$name);
  } 
  
  /**
   * Speichern einer geaenderten oder einer neuen Kategorie
   *
   * @param string $option
   * @param integer $cid, if null -> new category
   */
  function Joom_User_SaveUserCat (&$option,&$cid){
    global $database,$my,$absolut_originalpath, $absolut_picturepath,
           $absolut_thumbnailpath;

    $row = new mosCatgs($database);        

    if ($cid == 0) {
      $newcat = true;
    } else {
      $newcat = false;
      //bestehende Kategorie einlesen
      $row->load( $cid );
      //alte Parentzuordnung lesen
      $parentold = $row->parent;
      //alten Namen lesen
      $catnameold = $row->name;
    }

    //neue Werte einlesen
    if (!$row->bind($_POST)) {
      echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
      exit();
    }
    
    if(get_magic_quotes_gpc()) {
      $row->name=stripslashes($row->name);
      $row->description=stripslashes($row->description);
    } 
    
    if (!$newcat) {
      if ($catnameold != $row->name){             
        // Macht den neuen Kategorienamen sicher, wenn geaendert        
        mosMakeHtmlSafe($row->name);
        // Joom_FixCatname; Umlaute werden umgewandelt und alle Sonderzeichen bis auf
        // den Unterstrich entfernt, gilt nur fuer den catpath
        $catname = Joom_FixCatname($row->name);
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
        
        //Kategoriepfad der Parent-Kategorie lesen, nur noetig wenn parent != 0
        if ($row->parent != 0) {
          $row_parent = new mosCatgs($database);
          $row_parent->load($row->parent);          
          $catpathnew = $row_parent->catpath . '/' .$catname . '_' . $row->cid;
        } else {
          $catpathnew = $catname . '_' . $row->cid;
        }        
        
        //Kategoriepfad in DB aktualisieren
        $row->catpath=$catpathnew;
        
        $cat_originalpathold  = $absolut_originalpath.$catpathold;
        $cat_picturepathold   = $absolut_picturepath.$catpathold;
        $cat_thumbnailpathold = $absolut_thumbnailpath.$catpathold;
    
        $cat_originalpathnew  = $absolut_originalpath.$catpathnew;
        $cat_picturepathnew   = $absolut_picturepath.$catpathnew;
        $cat_thumbnailpathnew = $absolut_thumbnailpath.$catpathnew;

        
        //Ordner verschieben    
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
    } else { 
      //Neue Kategorie      
      //Kategorienamen absichern
      mosMakeHtmlSafe($row->name);
      // Joom_FixCatname; Umlaute werden umgewandelt und alle Sonderzeichen bis auf
      // den Unterstrich entfernt, gilt nur fuer den catpath
      $catname = Joom_FixCatname($row->name);
      $row->img_position=0;
      $row->catimage=null;
      
      //access von der Elternkategorie erben, wenn nicht Admin/SuperAdmin      
      if (!$this->adminlogged) {            
        $row->owner=$my->id;
        $rowparent = new mosCatgs($database);      
        $rowparent->load( $row->parent );
        $row->access = $rowparent->access;              
      } else {
        $row->owner=null;
      }
      
      //Anlegen des DB Eintrages
      if (!$row->store()) {
        echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
        exit();
      }

      //catpath mit vergebener cid aufbauen
      $parentpathnew = Joom_GetCatPath($row->parent);
            
      $catpathnew = $parentpathnew . $catname . '_' . $row->cid;
      $row->catpath=$catpathnew;

      $row->store();

      //Kategorieverzeichnisse anlegen
      Joom_MakeDirectory($absolut_originalpath.$catpathnew);
      Joom_MakeDirectory($absolut_picturepath.$catpathnew);
      Joom_MakeDirectory($absolut_thumbnailpath.$catpathnew);        
    }

    // Redirect zur Kategorieuebersicht
    mosRedirect(sefRelToAbs("index.php?option=". $option ."&func=showusercats&uid=".$my->id._JOOM_ITEMID));
  }
   
/**
* Loeschen einer Kategorie
*
* @param string $option
*/
  function Joom_User_DeleteUserCat(&$option,&$cid) {
    global $database,$my,$absolut_originalpath, $absolut_picturepath,
           $absolut_thumbnailpath;
           
    //ueberpruefen, ob der User Owner der Kategorie ist
    $row = new moscatgs( $database );
    $row->load($cid);

    if (!$this->adminlogged){
      if ( $row->owner != $my->id) {
        //sie sind nicht berechtigt...
        mosNotAuth();
        return;
      }      
    }

    //direkte URL-Aufrufe verhindern
    //zusaetzlich pruefen, ob die Kategorie Parent ist oder Bilder enthaelt
    $database->setQuery("SELECT count(cid)
        FROM #__joomgallery_catg
        WHERE parent = $cid" );

    $resultparent=$database->loadResult();
     if ($resultparent > 0) {
      //sie sind nicht berechtigt...
      mosNotAuth();
      return;
    }
    //Bilder in Kategorie
    $database->setQuery("SELECT count(id)
        FROM #__joomgallery
        WHERE catid = $cid" );       

    $resultpics=$database->loadResult();

    if ($resultpics > 0) {
      //sie sind nicht berechtigt...
      mosNotAuth();
      return;
    }

    $returnval=Joom_DeleteDirectory($absolut_originalpath .  $row->catpath.'/');
    $returnval=Joom_DeleteDirectory($absolut_picturepath .  $row->catpath.'/');    
    $returnval=Joom_DeleteDirectory($absolut_thumbnailpath .  $row->catpath.'/');    

    if ($returnval == false) {
      mosRedirect(sefRelToAbs("index.php?option=com_joomgallery&func=showusercats&uid=".$my->id._JOOM_ITEMID), _JGS_ERROR_DELETING_CATEGORY_DIRECTORY);
      return;
    }

    //DB-Eintrag loeschen
    if ($row->delete() != true) {
      mosRedirect(sefRelToAbs("index.php?option=com_joomgallery&func=showusercats&uid=".$my->id._JOOM_ITEMID), _JGS_ERROR_DELETING_CATEGORY_DATABASE_ENTRY);
      return;
    }
    
    mosRedirect(sefRelToAbs("index.php?option=com_joomgallery&func=showusercats&uid=".$my->id._JOOM_ITEMID),_JGS_SUCCESS_DELETING_CATEGORY);
  }

/**
* Aendern eines bestehenden Bildes
*
* @param string $option
*/
  function Joom_User_EditPic (&$option) {
    global $my,$database,$jg_category;

    $row = new mosjoomgallery( $database );
    $row->load( $this->picid );

    if ($row->owner != $my->id && !$this->adminlogged) {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID),_JGS_ALERT_NOT_ALLOWED_TO_EDIT_PICTURE);
    }
    if ($this->adminlogged){
      $clist = Joom_ShowDropDownCategoryList($row->catid, 'catid');          
    } else {
      $clist = $this->Joom_User_ShowDropDownCategoryList($row->catid);      
    }

    //wenn $clist = null, wurde das Bild in eine Backend-Kategorie geladen, 
    //die nicht mehr freigeschaltet ist. Oder es handelt sich um die einzige 
    //Kategorie. In diesem Fall nur den Text der Kategorie ausgeben
    if ($clist==null){
      $rowcat = new mosCatgs($database);
      $rowcat->load( $row->catid );
      $clist=$rowcat->name;
    }
    HTML_Joom_UserPanel::Joom_User_EditPic_HTML($option,$row,$clist);
  }

/**
* Sicherung der Aenderungen an dem Bild
*
* @param string $option
*/
  function Joom_User_SavePic (&$option) {
    global $database, $jg_approve, $my,$absolut_originalpath,
          $absolut_picturepath,$absolut_thumbnailpath;

    $row = new mosjoomgallery($database);

    //bestehenden DB Eintrag einlesen
    $row->load($this->picid);

    //alte Angaben sichern
    $catid_old=$row->catid;
    $catpath_old=Joom_GetCatPath($row->catid);

    if (!$row->bind($_POST)) {
      echo "<script> alert('" . $row->getError() . "'); window.history.go(-1); </script>\n";
      exit();
    }
    
    if(get_magic_quotes_gpc()) {
      $row->imgtitle=stripslashes($row->imgtitle);
      $row->imgtext=stripslashes($row->imgtext);
    }

    //wenn sich die Kategorie geaendert hat, die Bilddateien verschieben
    if ($catid_old != $row->catid){
        $catpathold = $catpath_old;
        $catpathnew = Joom_GetCatPath($row->catid);

        $cat_originalpathold  = $absolut_originalpath.$catpath_old;
        $cat_picturepathold   = $absolut_picturepath.$catpath_old;
        $cat_thumbnailpathold = $absolut_thumbnailpath.$catpath_old;

        $cat_originalpathnew  = $absolut_originalpath.$catpathnew;
        $cat_picturepathnew   = $absolut_picturepath.$catpathnew;
        $cat_thumbnailpathnew = $absolut_thumbnailpath.$catpathnew;

        Joom_MoveFile($cat_originalpathold.$row->imgfilename,$cat_originalpathnew,$row->imgfilename);
        Joom_MoveFile($cat_picturepathold.$row->imgfilename,$cat_picturepathnew,$row->imgfilename);
        Joom_MoveFile($cat_thumbnailpathold.$row->imgfilename,$cat_thumbnailpathnew,$row->imgfilename);
    }

    if ( !$row->store() ) {
      echo "<script> alert('" . $row->getError() . "'); window.history.go(-1); </script>\n";
      exit();
    }
    mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=userpanel'._JOOM_ITEMID),_JGS_ALERT_PICTURE_SUCCESSFULLY_UPDATED);
  }

/**
* Loeschen eines Bildes
*
* @param string $option
*/
  function Joom_User_DeletePic (&$option) {
    global $database, $my, $jg_pathimages, $jg_paththumbs,
           $jg_pathoriginalimages, $Itemid;

    if ($this->userid != $my->id && !$this->adminlogged) {
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=userpanel'._JOOM_ITEMID), _JGS_ALERT_NOT_ALLOWED_DELETE_PICTURE);
      die();
    }
    if ($this->picid) {
      $row = new mosjoomgallery($database);
      $row->load($this->picid);
      $catpath=Joom_GetCatPath($row->catid);
      //Detailbild loeschen
      if (unlink( _JOOM_ABSOLUTE_PATH . $jg_pathimages . "/" . $catpath . $row->imgfilename)) {
        //Thumb loeschen
        if ( unlink( _JOOM_ABSOLUTE_PATH . $jg_paththumbs . "/" . $catpath . $row->imgthumbname )) {
          // ggf. Originalbild loeschen
          if (file_exists(_JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . "/" . $catpath . $row->imgfilename)) {
            unlink( _JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . "/" . $catpath . $row->imgfilename);
          }
          //Kommentare loeschen
          $database->setQuery("DELETE FROM #__joomgallery_comments
            WHERE cmtpic=$this->picid");
          if (!$database->query()) {
            echo "<script> alert('" . $database->getErrorMsg() . "'); window.history.go(-1); </script>\n";
          }

          //Namensschilder loeschen
          $database->setQuery("DELETE FROM #__joomgallery_nameshields
            WHERE nid=$this->picid");
          if (!$database->query()) {
            echo "<script> alert('" . $database->getErrorMsg() . "'); window.history.go(-1); </script>\n";
          }

          //Bild loeschen
          $database->setQuery("DELETE FROM #__joomgallery
            WHERE id=$this->picid");
          if (!$database->query()) {
            echo "<script> alert('" . $database->getErrorMsg() . "'); window.history.go(-1); </script>\n";
          }
        } else {
          die(_JGS_COULD_NOT_DELETE_THUMBNAIL_FILE);
        }
      } else {
        die(_JGS_COULD_NOT_DELETE_PICTURE_FILE);
      }
      mosRedirect(sefRelToAbs('index.php?option=com_joomgallery&func=userpanel'._JOOM_ITEMID), _JGS_ALERT_PICTURE_AND_COMMENTS_DELETED);
    }
  }

/**
* Upload eines oder mehrerer Bilder
*
* @param string $option
*/
  function Joom_User_ShowUpload (&$option) {
  
    //fuer Admin/SuperAdmin werden alle Kategorien angezeigt
    if ($this->adminlogged) {
      $clist = Joom_ShowDropDownCategoryList(0,'catid',' class="inputbox"');      
    } else {
      //wenn $jg_userowncatsupload=true, duerfen user nur in eigens erstellte
      //User-Kategorien hochladen
      $clist = $this->Joom_User_ShowDropDownCategoryList(0,null,'catid',true);        
    }
    HTML_Joom_UserPanel::Joom_User_ShowUpload_HTML($option,$clist);
  }

/**
 * Aufbau HTML Auswahlliste der vom User angelegten Kategorien
 * und der fuer den Upload freigegebenen Katgeorien
 * @param int catid akt cat oder parent
 * @param int $ignoreme cid, ignoriere die Untercats dieser cat
 * @param string Name fuer das HTML Element, catid oder parent
 * @param bool wenn true, 
 * @return string HTML
 */
	function Joom_User_ShowDropDownCategoryList($cid,$ignoreme=null,$cname="catid",$upload=false) {
	  global $database,$my,$jg_usercategory,$jg_category,$jg_userowncatsupload;
	
	  //im Backend fuer den Userupload freigegebene Kategorien
	  if ($upload){
	    if (!empty($jg_category)) {
	      $allowedcats = $jg_category;
	    } 
	  }else{
	    //im Backend fuer die Anlage von Userkategorien freigegebene Kategorien    
	    if (!empty($jg_usercategory)) {
	      $allowedcats = $jg_usercategory;
	    } else {
	      $allowedcats = "";    
	    }      
	  }
	  
	  $query = "SELECT cid, parent, name ,'0' as ready
	      FROM #__joomgallery_catg";
	
	  if ($upload && !$jg_userowncatsupload){
	    $query .= " WHERE owner IS NOT NULL";    
	  }else{
	    $query .= " WHERE owner=$my->id";    
	  }
	
	  if (!empty($allowedcats)) {
	     $query .= " OR cid in ($allowedcats)";
	  }
	
	  $database->setQuery($query);
	  $rows = $database->loadObjectList("cid");
	  
	  $countrows=count($rows);
	  
	  if ($countrows==0 && $upload) {
	    return null;
	  }
	  
	  $output = "<select name=\"".$cname."\" class=\"inputbox\">\n";
	  
	  if ($countrows==0){
	    $output .= "</select>\n";
	    return $output;    
	  }
	  
	  //wenn cname = parent und ignoreme != null, dann die Cats loeschen, die direkt
	  //oder indirekt child der cat=ignoreme sind, 
	  //$cid = Cat des Parent, $ignoreme=akt. Cat
	  //nur bei Edit Cat
	  if ($cname=="parent" && $ignoreme != null){
	    $ignorearr=array();//zu ignorierende cats
	    $ignorearr[]=$ignoreme;//akt. Cat aufnehmen
	    $backendcats=explode(',',$allowedcats);
	    foreach ($rows as $key => $obj){
	      //wenn Backendcat -> ueberspringen
	      //ebenso die aktuelle Cat
	      if (in_array($key,$backendcats) || $key == $ignoreme){
	        continue;
	      }
	      $found=false;
	      $parent=$obj->parent;
	      while (array_key_exists($parent,$rows) && !in_array($key,$ignorearr) && !$found) {
	        $ignore[]=$key;
	        if ($parent==$ignoreme){
	          $found=true;          
	          break;
	        }
	        $parent=$rows[$parent]->parent;
	      }
	      if (!$found){
	        $ignore=array();
	      } else {
	        $ignorearr=array_merge($ignorearr,$ignore);
	      }
	    }
	
	    //aus Array die in $ignore gesammelten nicht auszugebenden cats entfernen
	    foreach ($ignorearr as $catignore){
	      unset ($rows[$catignore]);  
	    }
	  }
	  
	  //Iteration through array and completion of the shown path in the input box
	  foreach ($rows as $key => $obj) {
	    $parent=$obj->parent;
	
	    //at first try to complete the name with a look in the array
	    //to avoid unnecessary db queries
	    while ($parent != 0) {
	      if (isset($rows[$parent])) {
	        $rows[$key]->name = $rows[$parent]->name . ' &raquo; ' . $rows[$key]->name;
	        //if found parent element includes completed pathname
	        //leave the while to set the actual element to ready
	        if ($rows[$parent]->ready == true) {
	          break;
	        } else {
	          $parent = $rows[$parent]->parent;            
	        }          
	      } else {
	        $query = "SELECT parent,name FROM #__joomgallery_catg 
	                  WHERE cid = ".$parent;
	        $database->setQuery($query);
	        $database->loadObject($parentcat);
	        $parent = $parentcat->parent;        
	        $rows[$key]->name = $parentcat->name . ' &raquo; ' . $rows[$key]->name; 
	      }
	    }
	    //mark cat element as ready when path of them completed
	    $rows[$key]->ready=true;
	  }
	
	  //sort the array with key pathname if more than one element
	  if (count($rows)>1){
	    usort( $rows , "Joom_SortCatArray" );      
	  }
	  
	  //build the html  
	  foreach ($rows as $key => $obj) {
	    $output .="<option value=\"".$obj->cid."\"";
	    if($cid==$obj->cid) {
	      $output .= " selected=\"selected\"";
	    }
	    $output .=">".$obj->name."</option>\n";            
	  }
	  $output .= "</select>\n";
	  
	  return $output; 
	}
}
?>
