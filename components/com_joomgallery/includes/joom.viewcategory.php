<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/joom.viewcategory.php $
// $Id: joom.viewcategory.php 396 2009-03-15 16:06:21Z aha $
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

class Joom_CategoryView {

  var $catid;
  var $catname;
  var $order_dir;
  var $order_by;

  //Cat Navi
  var $catcount;
  var $catstart;
  var $catstartpage;
  var $catgesamtseiten;

  //Subcat Navi
  var $subcatcount;
  var $substart;
  var $substartpage;
  var $subgesamtseiten;

  //Cat Body
  var $catrows;
  var $catrowcounter;
  var $orderclause;
  
  //Cooliris
  var $cooliris;


  function Joom_CategoryView (&$catid) {
    global $database;

    require_once(_JOOM_FRONTEND_PATH . '/includes/html/joom.viewcategory.html.php');
    $this->catstartpage = intval( mosGetParam( $_REQUEST, 'startpage', 0 ) );
    $this->substartpage = intval( mosGetParam( $_REQUEST, 'substartpage', 0 ) );

    //User ordered view
    $this->order_dir = $database->getEscaped(trim( mosGetParam( $_REQUEST, 'orderdir', "" ) ));
    $this->order_by =  $database->getEscaped(trim( mosGetParam( $_REQUEST, 'orderby', "" ) ));
    if ($this->order_dir == "") {
      $this->order_dir = $database->getEscaped(trim( mosGetParam( $_POST, 'orderdir', "" ) ));
    }
    if ($this->order_by == "") {
      $this->order_by =  $database->getEscaped(trim( mosGetParam( $_POST, 'orderby', "" ) ));
    }

    $this->catid = $catid;
       
    //Cooliris
    $this->cooliris = intval( mosGetParam( $_REQUEST, 'cooliris', 0));
  }


  function Joom_ShowCategoryHead () {
    global $gid,$database;

    $database->setQuery("SELECT name
        FROM #__joomgallery_catg
        WHERE cid = '$this->catid'");
    $this->catname = $database->loadResult();

    $database->setQuery( "SELECT count(*)
        FROM #__joomgallery AS a
        LEFT JOIN #__joomgallery_catg AS c 
        ON c.cid=a.catid
        WHERE a.published = '1' AND a.catid = '$this->catid' AND a.approved = '1' AND c.access <= '$gid'");
    $this->count = $database->loadResult();

    HTML_Joom_Category::Joom_ShowCategoryHead_HTML($this->catname,$jg_colnumb,$this->count,$this->catid,$this->order_by,$this->order_dir);
  }


  function Joom_ShowCategoryBody () {
    global $jg_firstorder,$jg_pagetitle_cat,$jg_perpage,$jg_secondorder,
          $jg_thirdorder,$jg_usercatorder,$jg_colnumb,$mainframe,$database,$gid,
          $jg_cooliris;

    if ($jg_secondorder != '' && $jg_thirdorder == '') {
      $this->orderclause = "a.$jg_firstorder, a.$jg_secondorder";
    } elseif ($jg_secondorder != '' && $jg_thirdorder != '') {
      $this->orderclause = "a.$jg_firstorder, a.$jg_secondorder, a.$jg_thirdorder";
    } else {
      $this->orderclause = "a.$jg_firstorder";
    }

    if ($jg_usercatorder) {
      switch ($this->order_by){
        case "user":
          $this->orderclause = "a.owner";
          break;
        case "date":
          $this->orderclause = "a.imgdate";
          break;
        case "rating":
          $this->orderclause = "rating";
          break;
        case "title":
          $this->orderclause = "a.imgtitle";
          break;
        case "hits":
          $this->orderclause = "a.imgcounter";
          break;
        default:
          break;
      }
      if ($this->order_by == "title"
          || $this->order_by == "hits"
          || $this->order_by == "user"
          || $this->order_by == "date"
          || $this->order_by == "rating" ) {
        if ($this->order_dir == "desc") {
          $this->orderclause .= " DESC";
        } else if ($this->order_dir == "asc") {
          $this->orderclause .= " ASC";
        }
      }
      if ($this->order_by == "rating" ) {
        $moreorderclause = ",imgvotesum DESC";
      } else {
        $moreorderclause = "";
      }
    } else {
      $moreorderclause = "";
    }

    $database->setQuery( "SELECT *, a.owner as owner, ROUND(imgvotesum/imgvotes, 2) AS rating
        FROM #__joomgallery AS a
        LEFT JOIN #__joomgallery_catg AS c ON c.cid=a.catid
        WHERE a.published = '1' AND a.catid = '$this->catid' AND a.approved = '1' AND c.access <= '$gid'
        ORDER BY $this->orderclause $moreorderclause
        LIMIT $this->catstart,$jg_perpage");

    $this->catrows = $database->loadObjectList();
    $this->catrowcounter=0;
   
    //wenn jg_cooliris und this->cooliris = true, dann gerade laufende
    //Cooliris Darstellung. In diesem Fall nur den XML Feed ausgeben            
    if ($jg_cooliris && $this->cooliris){
        require_once(_JOOM_FRONTEND_PATH . '/classes/cooliris.class.php');  
        $coolirisclass= new Joom_Cooliris(); 
        $coolirisclass->getxmlfeed($this->catid,$this->catgesamtseiten,$this->catstartpage,$this->catrows);
    } 
    HTML_Joom_Category::Joom_ShowCategoryBody_HTML($this->catrows, $this->catrowcounter, $jg_colnumb,$this->order_by,$this->order_dir );      
  }


  function Joom_ShowSubcategories() {
    global $database,$gid,$jg_showrmsmcats,$jg_ordersubcatbyalpha,$jg_subperpage;

    $query = "SELECT d.*
            FROM #__joomgallery_catg AS d
            WHERE d.parent=$this->catid and d.published='1'";

    if($jg_showrmsmcats==0) {
      $query .= " and d.access<= '$gid'";
    }

    if ($jg_ordersubcatbyalpha) {
      $query .= " ORDER BY d.name LIMIT $this->substart,$jg_subperpage";
    } else {
      $query .= " ORDER BY d.ordering LIMIT $this->substart,$jg_subperpage";
    }

    $database->setQuery($query);
    $rows = $database->loadObjectList();

    if ( $rows != NULL ) {
      HTML_Joom_Category::Joom_ShowSubCategories_HTML($rows);
    }
  }


  function Joom_CatPageNav() {
    global $jg_showrmsmcats,$jg_perpage,$gid,$database;

    if ($jg_showrmsmcats && $gid == 0) {
      $andaccess = "";
    } else {
      $andaccess = "AND c.access <= '$gid'";
    }
    // Kategorie
    // Navigation und Feststellen der Anzahl der verfuegbaren Datensaetze
    $database->setQuery("SELECT count(id)
        FROM #__joomgallery AS a
        LEFT JOIN #__joomgallery_catg AS c ON c.cid=a.catid
        WHERE a.published = '1' AND a.catid = '$this->catid' AND a.approved = '1' $andaccess");
    $this->catcount = $database->loadResult();
    // Berechnen der Gesamtseiten
    $this->catgesamtseiten=floor( $this->catcount / $jg_perpage );
    $seitenrest=$this->catcount % $jg_perpage;
    if ( $seitenrest > 0 ) {
      $this->catgesamtseiten++;
    }
    $this->catcount = number_format($this->catcount, 0, ',', '.');
    // Feststellen der aktuellen Seite
    if ( isset( $this->catstartpage ) ) {
      if ( $this->catstartpage > $this->catgesamtseiten ) {
        $this->catstartpage = $this->catgesamtseiten;
      } elseif ( $this->catstartpage < 1 ) {
        $this->catstartpage=1;
      }
    } else {
      $this->catstartpage=1;
    }
    // Limit und Seite Vor- & Rueckfunktionen
    $this->catstart=($this->catstartpage - 1) * $jg_perpage;
  }


  function Joom_SubcatPageNav(){
    global $jg_showrmsmcats,$jg_subperpage,$gid,$database;

    // Subkategorien
    // Navigation und Anzahl der verfuegbaren Datensaetze
    if ($jg_showrmsmcats && $gid == 0) {
      $andaccess = "";
    } else {
      $andaccess = "AND d.access <= '$gid'";
    }

    $database->setQuery("SELECT count(cid)
        FROM #__joomgallery_catg AS d
        WHERE d.parent=$this->catid AND d.published='1' $andaccess");
    $this->subcatcount = $database->loadResult();
    // Berechnen der Gesamtseiten
    $this->subgesamtseiten=floor( $this->subcatcount / $jg_subperpage );
    $subseitenrest = $this->subcatcount % $jg_subperpage;
    if ( $subseitenrest > 0 ) {
      $this->subgesamtseiten++;
    }
    $this->subcatcount = number_format($this->subcatcount, 0, ',', '.');
    // Feststellen der aktuellen Seite
    if ( isset( $this->substartpage ) ) {
      if ( $this->substartpage > $this->subgesamtseiten ) {
        $this->substartpage=$this->subgesamtseiten;
      } elseif ( $this->substartpage < 1 ) {
        $this->substartpage=1;
      }
    } else {
      $this->substartpage=1;
    }
    // Limit und Seite Vor- & Rueckfunktionen
    $this->substart=($this->substartpage - 1) * $jg_subperpage;

    HTML_Joom_Category::Joom_ShowSubCategoryPageNav_HTML($this->subcatcount, $this->substart, $this->substartpage, $this->subgesamtseiten, $this->catid);
  }


  function Joom_ShowCategoryPageNav () {

    HTML_Joom_Category::Joom_ShowCategoryPageNav_HTML($this->catcount, $this->catstart, $this->catstartpage, $this->catgesamtseiten, $this->catid);
  }
  
}
?>
