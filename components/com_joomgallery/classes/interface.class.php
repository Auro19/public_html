<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/classes/interface.class.php $
// $Id: interface.class.php 396 2009-03-15 16:06:21Z aha $
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

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
 * The JoomGallery interface class provides an interface / API
 * to other Joomla extensions to use functions of the Gallery,
 * e.g. to display thumbnails in a Mambot or Module.
 * 
 * You just need to include this file, create an interface object
 * and set some options if you want to adjust the output, before
 * using one of the functions. 
 * If you display any HTML output, you should once call getPageHeader()
 * first
 *
 */
class joominterface{
  var $_config    = array();
  var $_itemId = NULL;
  
  function joominterface(){
    global $database, $mosConfig_absolute_path, $mosConfig_live_site, 
      $mainframe,$mosConfig_lang,  $jg_paththumbs,
      $jg_showhits, $jg_showpicasnew, $jg_showtitle, 
      $jg_showauthor, $jg_showcatrate, $jg_showcatcom,
      $jg_showcatdescr, $jg_daysnew, $jg_combuild, 
      $jg_realname, $jg_detailpic_open;
      
    // some definitions for joom_javascript
    if (!defined('_JOOM_PARENT_MODULE'))
      define('_JOOM_PARENT_MODULE', "1");
    $func = "";
//    if (!defined('_JOOM_ABSOLUTE_PATH'))
//      define('_JOOM_ABSOLUTE_PATH',$mosConfig_absolute_path);
    
    // include language for display
    if (file_exists($mosConfig_absolute_path."/components/com_joomgallery/language/".$mosConfig_lang.".php")) 
        include_once($mosConfig_absolute_path."/components/com_joomgallery/language/".$mosConfig_lang.".php");
    else 
        include_once($mosConfig_absolute_path."/components/com_joomgallery/language/english.php");
        
    
    require($mosConfig_absolute_path . "/administrator/components/com_joomgallery/joomgallery.config.php");
    require_once($mosConfig_absolute_path . "/administrator/components/com_joomgallery/common.joomgallery.php");
    require_once($mosConfig_absolute_path . "/components/com_joomgallery/classes/modules.class.php" );
    require_once($mosConfig_absolute_path . "/components/com_joomgallery/includes/joom.javascript.php");
    
    // set some default values for options given in global JG config
    // (may be overridden)
    $this->_config['showhits'] = $jg_showhits;
    $this->_config['showpicasnew'] = $jg_showpicasnew;
    $this->_config['showtitle'] = $jg_showtitle;
    $this->_config['showauthor'] = $jg_showauthor;
    $this->_config['showrate'] = $jg_showcatrate;
    $this->_config['shownumcomments'] = $jg_showcatcom;
    $this->_config['showdescription'] = $jg_showcatdescr;
    
    // further defaults (not given by JG config)
    
    // Category path links to category
    $this->_config['showcatlink'] = 1; 
    
    // comma-separated list of categories to filter from (empty: all categories, default)
    $this->_config['categoryfilter']     = ""; 
    
    // display last comment (see Module JoomImages). Not implemented yet!
    $this->_config['showlastcomment'] = 0; 
  }
  
  /**
   * Returns version string of installed JoomGallery
   *
   * @return string
   */
  function getGalleryVersion() {
    return Joom_GetGalleryVersion();
  }
  
  /**
   * Passes a whole array of config items, existing (default)
   * values are overwritten if a new item with the same key
   * is passed.
   *
   * @param array $config
   */
  function setConfig($config) {
    foreach ($config as $key => $value){
      $config['$key'] = $database->getEscaped($value);
    }
    
    //Merge new array into existing one, overwriting if needed:
    $this->_config = array_merge($this->_config, $config);  
  }
  
  /**
   * Sets a single option in the interface settings
   *
   * @param string $key
   * @param string $value
   */
  function addConfig($key, $value="") {
    global $database;
    $this->_config[$key] = $database->getEscaped($value);
  }
  
  /**
   * Requests string (e.g. modification of a SQL query or true/false)
   * associated with config option $key.
   * If the according value has not been set with addConfig
   * before, a default is returned. Config options are not used
   * directly for security.
   *
   * @param string $key
   * 
   * @return string
   */
  function getConfig($key){
    global $database;
    
    switch ($key){
      // default values are set in ctor to JG defaults (no checking)
      // unset values are assumed to be "false"
      case "showhits":
      case "showpicasnew":
      case "showauthor":
      case "showtitle":
      case "showrate":
      case "shownumcomments":
      case "showdescription":
      case "showcategory":
      case "showcatlink":
      case "showlastcomment":
        if (isset($this->_config[$key]))
          return $this->_config[$key];
        else 
          return false;
        break;       
      
      // further config options (may be set or not)
      case "hidebackend": 
        if (isset($this->_config['hidebackend']) && $this->_config['hidebackend'] == "true")
          return " AND jg.useruploaded = '1' ";
        else 
          return "";        
        break;
      case "categoryfilter": 
        $catids = trim($database->getEscaped($this->_config['categoryfilter']));
      	if ($catids != "")
      	  return " AND jg.catid IN (".$catids.") ";
      	else 
      	  return "";
      break;
      default:
        die("Unknown config option key specified for the JoomGallery Interface: \"$key\"");
      
    }
  }
  
  /**
   * Creates HTML for linked thumbnail of one picture-$obj,
   * with display options & stlye just like in JG
   *
   * @param db-obj $obj DB-row coming from this interface, e.g. getPicsByCategory
   * 
   * @return string HTML displaying thumbnail (linked, like configured in JG)
   */
  function displayThumb($obj){
    global $mosConfig_live_site, $jg_paththumbs, $jg_detailpic_open, $catid;
    
    $output = "";
    if( $obj->picid != "" ) {
      // Lightbox popups require the catid of pic in global var
      $catid = $obj->catid;
      $link = Joom_OpenImage($jg_detailpic_open, $obj->picid,$obj->catpath, $obj->imgfilename, $obj->imgtitle, $obj->imgtext);
     
      $output .= "  <a href=\"$link\" class=\"jg_catelem_photo\">";
      $output .= "    <img src=\"".$mosConfig_live_site . $jg_paththumbs . '/'.$obj->catpath.'/'.$obj->imgthumbname."\" class=\"jg_photo\" alt=\"$obj->imgtitle\" />";
      $output .= "  </a>";
    } else {
      $output .= "    &nbsp;\n";
    }
    
    return $output;
  }
  
  /**
   * Creates HTML for description of one picture-$obj,
   * with display options & style just like in JG.
   * Adjustments are possible via the interface options
   *
   * @param db-obj $obj DB-row coming from this interface, e.g. getPicsByCategory
   * 
   * @return string HTML of thumb description (like configured in JG or in the interface)
   */
  function displayDesc($obj){
    global $jg_daysnew, $jg_combuild;
      
    $output = "<ul>\n";
    
    if ($this->getConfig("showtitle") || $this->getConfig("showpicasnew")) {
      $output .= "  <li>";
      if ($this->getConfig("showtitle")){
        $output .= "<b>$obj->imgtitle</b>";
      }
      if ($this->getConfig("showpicasnew")) {
        $output.= Joom_CheckNew($obj->imgdate, $jg_daysnew);;
      }
      $output .= "  </li>\n";
    }
    
    if ($this->getConfig("showauthor")) {
      if ($obj->imgauthor) {
        $authorowner = $obj->imgauthor;
      } else {
        $authorowner = getDisplayName($obj->owner);
      }
      
      $output .= "  <li>"._JGS_AUTHOR . ": ".$authorowner;
      $output .= "</li>\n";

    }
    
    if ($this->getConfig("showcategory")) {
      $catpath = 
      $output .= "  <li>"._JGS_CATEGORY . ": ";
      
      if ($this->getConfig("showcatlink"))
        $output .= "<a href=\"".sefRelToAbs("index.php?option=com_joomgallery&func=viewcategory&catid=".$obj->catid.$this->getJoomId()) ."\">";
      
      $output .= $obj->cattitle;
      
      if ($this->getConfig("showcatlink"))
        $output .= "</a>";  
      
      $output .= "  </li>";
      
    }
    
    if ($this->getConfig("showhits")) {
      $output .= "  <li>"._JGS_HITS . ": $obj->imgcounter</li>";
    }
    if ($this->getConfig("showrate")) {
      if ( $obj->imgvotes > 0 ) {
        $fimgvotesum = number_format($obj->vote, 2, ',', '.');
        $frating = "$fimgvotesum ($obj->imgvotes" .  _JGS_VOTES . ')';
      } else {
        $frating=_JGS_NO_VOTES;
      }

      $output .= "  <li>". _JGS_RATING . ": $frating</li>";
    }
    if ( $this->getConfig("shownumcomments")) {
      $output .="  <li>". _JGS_COMMENTS . ": $obj->cmtcount</li>";
    }
    if ($this->getConfig("showdescription")  && $obj->imgtext ) {
      $output .= "  <li>". _JGS_DESCRIPTION . ": $obj->imgtext</li>";
    }
      
    $output .= "</ul>";
   
    return $output;    
  }
  
  /**
   * Returns the number of pictures of a user
   *
   * @param integer $userId Joomla-ID of user
   * @param integer $gid GroupID of user (for restricted access images)
   * @return integer number of pictures
   */
  function getNumPicsOfUser($userId, $gid = 0){
    global $database;
    $userId = intval($userId);
    $gid = intval($gid);

    $query = "SELECT count(jg.id) FROM #__joomgallery as jg  
    			LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid
    			WHERE jgc.published = 1
                AND jgc.access <= $gid
                AND jg.published = 1"
                . $this->getConfig('categoryfilter')
                . $this->getConfig('hidebackend')
                . " AND jg.approved = 1
                AND jg.owner = $userId";
    $database->setQuery($query);
    return $database->loadResult();
  }
  
  /**
   * Returns the number of pictures a user is tagged in
   *
   * @param integer $userId
   * @param integer $gid GroupID of user (for restricted access images)
   * @return integer
   */
  function getNumPicsUserTagged($userId, $gid=0){
    global $database;
    $userId = intval($userId);
    $gid = intval($gid);

    $query = "SELECT count(nid) FROM #__joomgallery_nameshields as jgn 
    			LEFT JOIN #__joomgallery as jg ON jgn.npicid = jg.id
    			LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid
    			WHERE jgc.published = 1
                AND jgc.access <= $gid
                AND jg.published = 1"
                . $this->getConfig('categoryfilter')
                . $this->getConfig('hidebackend')
                . " AND jg.approved = 1
                AND jgn.nuserid = $userId";
    $database->setQuery($query);
    return $database->loadResult();
  }
  
  /**
   * Returns the number of pictures a user has favoured
   *
   * @param integer $userId
   * @param integer $gid GroupID of viewing user (for restricted access images)
   * @return integer
   */
  function getNumPicsUserFavoured($userId, $gid=0){
    global $database;
    $userId = intval($userId);
    $query = "SELECT piclist FROM #__joomgallery_users
    			WHERE uuserid = $userId";
    $database->setQuery($query);
    $piclist = $database->loadResult();
    
    if (!isset($piclist))
    	return 0;
    
    $query = "SELECT count(jg.id) FROM #__joomgallery as jg  
    			LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid
    			WHERE jgc.published = 1
                AND jgc.access <= $gid
                AND jg.published = 1"
                . $this->getConfig('categoryfilter')    
                . $this->getConfig('hidebackend')
                . " AND jg.approved = 1
                AND jg.id IN ($piclist)";
     
    $database->setQuery($query);
    return $database->loadResult();
  }
  
  /**
   * Returns the number of pictures a user has commented on
   *
   * @param integer $userId
   * @param integer $aid GroupID of viewing user (for restricted access images)
   * @return integer
   */
  function getNumCommentsUser($userId, $aid=0){
    global $database; 
    $userId = intval($userId);
    $aid = intval($aid);

    $query = "SELECT count(cmtid) FROM #__joomgallery_comments as jgco
    			LEFT JOIN #__joomgallery as jg ON jgco.cmtpic = jg.id
    			LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid
    			WHERE jgc.published = 1
                AND jgc.access <= $aid
                AND jgco.published = 1
                AND jgco.approved = 1
                AND jg.published = 1"
                . $this->getConfig('categoryfilter')
                . $this->getConfig('hidebackend')
                . " AND jg.approved = 1
                AND jgco.userid = $userId";
    $database->setQuery($query);
    
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
      exit();
    }
    
    return $database->loadResult();
  }
  
  
/**
   * Returns the total number of comments (published) in the gallery
   *
   * @param integer $aid GroupID of viewing user (for restricted access images)
   * @return integer
   */
  function getNumComments($aid=0){
    global $database; 
    $userId = intval($userId);
    $aid = intval($aid);

    $query = "SELECT count(cmtid) FROM #__joomgallery_comments as jgco
    			LEFT JOIN #__joomgallery as jg ON jgco.cmtpic = jg.id
    			LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid
    			WHERE jgc.published = 1
                AND jgc.access <= $aid
                AND jgco.published = 1
                AND jgco.approved = 1
                AND jg.published = 1"
                . $this->getConfig('categoryfilter')
                . $this->getConfig('hidebackend')
                . " AND jg.approved = 1";
    $database->setQuery($query);
    
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
      exit();
    }
    
    return $database->loadResult();
  }
  
  /**
   * Returns pictures of a user
   *
   * @param integer $userId Joomla ID of user
   * @param integer $gid Joomla GroupID of viewing user (access rights). 0 for public viewable!
   * @param string $sorting string for DB sorting
   * @param integer $numPics limit number of pictures; leave away to return all
   * @param integer $limitStart where to start returning $numPics pictures
   * @return db-objs
   */
  function getPicsOfUser($userId, $gid, $sorting, $numPics = NULL, $limitStart = 0){
    global $database;
    // validation:
    $userId = intval($userId);
    $gid = intval($gid);
    $sorting = $database->getEscaped($sorting);    
    if (is_null($numPics)){ // no limit given: return all pictures
      $limit = "";
    } else{
      $limitStart = intval($limitStart);
      $numPics = intval($numPics);
      
      $limit = "\n LIMIT ".$limitStart.",".$numPics;
    }
    	
	$query = "SELECT ";
	if ($this->getConfig('shownumcomments')){
	  $query .= "(SELECT count(cmtid) FROM #__joomgallery_comments WHERE cmtpic=jg.id) AS cmtcount, ";
	}
	$query .= "jg.id AS picid, jg.catid, jg.imgthumbname, jg.imgfilename,
            jg.owner, jg.imgauthor,
            jg.imgdate, jg.imgtitle, jg.imgtext, jg.imgcounter, jg.imgvotes,
            (jg.imgvotesum/jg.imgvotes) AS vote,jgc.name AS cattitle,jgc.catpath as catpath \n";
    if ($this->getConfig('showlastcomment')){
      $query .= ",jgco.cmttext, jgco.cmtdate, jgco.userid , jgco.cmtid \n";
    }
    $query .="FROM #__joomgallery AS jg
            LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid \n";
	if ($this->getConfig('showlastcomment')){
	  $query .= "LEFT JOIN #__joomgallery_comments AS jgco ON jg.id = jgco.cmtpic
	  		LEFT JOIN #__joomgallery_comments jgco2 ON jgco.cmtpic = jgco2.cmtpic
            AND jgco.cmtdate < jgco2.cmtdate
            WHERE jgco2.cmtpic IS NULL
            AND ";
	} else{
	  $query .= "WHERE ";
	}
	$query .="jgc.published = 1
            AND jgc.access <= $gid
            AND jg.published = 1"
            . $this->getConfig('categoryfilter')	
            . $this->getConfig('hidebackend')
            . " AND jg.approved = 1
            AND jg.owner = $userId
            ORDER BY ".$sorting." \n"
            . $limit;
            
    $database->setQuery($query);
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
      exit();
    }
    
    return $database->loadObjectList();    
  }
  
   /**
   * Returns pictures a user is tagged in
   *
   * @param integer $userId Joomla ID of user
   * @param integer $gid Joomla GroupID of viewing user (access rights). 0 for public viewable!
   * @param string $sorting string for DB sorting
   * @param integer $numPics limit number of pictures; leave away to return all
   * @param integer $limitStart where to start returning $numPics pictures
   * @return db-objs
   */
  function getPicsUserTagged($userId, $gid, $sorting, $numPics = NULL, $limitStart = 0){
    global $database;
    // validation:
    $userId = intval($userId);
    $gid = intval($gid);    
    $sorting = $database->getEscaped($sorting);   
    if (is_null($numPics)){ // no limit given: return all pictures
      $limit = "";
    } else{
      $limitStart = intval($limitStart);
      $numPics = intval($numPics);
      
      $limit = "\n LIMIT ".$limitStart.",".$numPics;
    }
    $query = "SELECT ";
	if ($this->getConfig('shownumcomments')){
	  $query .= "(SELECT count(cmtid) FROM #__joomgallery_comments WHERE cmtpic=jg.id) AS cmtcount, ";
	}
	$query .= "jg.id AS picid, jg.catid, jg.imgthumbname, jg.imgfilename,
            jg.imgdate, jg.imgtitle, jg.imgtext, jg.imgcounter, jg.imgvotes,
            jg.owner, jg.imgauthor,
            (jg.imgvotesum/jg.imgvotes) AS vote,jgc.name AS cattitle,jgc.catpath as catpath \n";
    if ($this->getConfig('showlastcomment')){
      $query .= ",jgco.cmttext, jgco.cmtdate, jgco.userid , jgco.cmtid \n";
    }
    $query .="FROM #__joomgallery_nameshields AS jgn
            LEFT JOIN #__joomgallery as jg ON jgn.npicid = jg.id
            LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid \n";
	if ($this->getConfig('showlastcomment')){
	  $query .= "LEFT JOIN #__joomgallery_comments AS jgco ON jg.id = jgco.cmtpic
	  		LEFT JOIN #__joomgallery_comments jgco2 ON jgco.cmtpic = jgco2.cmtpic
            AND jgco.cmtdate < jgco2.cmtdate
            WHERE jgco2.cmtpic IS NULL
            AND ";
	} else{
	  $query .= "WHERE ";
	}
    $query .="jgc.published = 1
            AND jgc.access <= $gid
            AND jg.published = 1"
            . $this->getConfig('categoryfilter')    
            . $this->getConfig('hidebackend')
            . " AND jg.approved = 1
            AND jgn.nuserid = $userId
            ORDER BY ".$sorting."\n"
            . $limit;
    
    $database->setQuery($query);
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
      exit();
    }
    return $database->loadObjectList();    
  }
  
  /**
   * Returns the pictures a user has favoured
   *
   * @param integer $userId Joomla ID of user
   * @param integer $gid Joomla GroupID of viewing user (access rights). 0 for public viewable!
   * @param string $sorting string for DB sorting
   * @param integer $numPics limit number of pictures; leave away to return all
   * @param integer $limitStart where to start returning $numPics pictures
   * @return db-objs
   */
  function getPicsUserFavoured($userId, $gid, $sorting, $numPics = NULL, $limitStart = 0){
    global $database;
    // validation:
    $userId = intval($userId);
    $gid = intval($gid);    
    $sorting = $database->getEscaped($sorting);   
    if (is_null($numPics)){ // no limit given: return all pictures
      $limit = "";
    } else{
      $limitStart = intval($limitStart);
      $numPics = intval($numPics);
      
      $limit = "\n LIMIT ".$limitStart.",".$numPics;
    }
    
    $query = "SELECT piclist FROM #__joomgallery_users
    			WHERE uuserid = $userId";
    $database->setQuery($query);
    $piclist = $database->loadResult();
    
    if (!isset($piclist) || $piclist == "")
      return NULL;
    
    $query = "SELECT ";
	if ($this->getConfig('shownumcomments')){
	  $query .= "(SELECT count(cmtid) FROM #__joomgallery_comments WHERE cmtpic=jg.id) AS cmtcount, ";
	}
	$query .= "jg.id AS picid, jg.catid, jg.imgthumbname, jg.imgfilename,
            jg.owner, jg.imgauthor,
            jg.imgdate, jg.imgtitle, jg.imgtext, jg.imgcounter, jg.imgvotes,
            (jg.imgvotesum/jg.imgvotes) AS vote,jgc.name AS cattitle,jgc.catpath as catpath \n";
    if ($this->getConfig('showlastcomment')){
      $query .= ",jgco.cmttext, jgco.cmtdate, jgco.userid , jgco.cmtid \n";
    }
    $query .="FROM #__joomgallery AS jg
            LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid \n";
	if ($this->getConfig('showlastcomment')){
	  $query .= "LEFT JOIN #__joomgallery_comments AS jgco ON jg.id = jgco.cmtpic
	  		LEFT JOIN #__joomgallery_comments jgco2 ON jgco.cmtpic = jgco2.cmtpic
            AND jgco.cmtdate < jgco2.cmtdate
            WHERE jgco2.cmtpic IS NULL
            AND ";
	} else{
	  $query .= "WHERE ";
	}
	$query .="jgc.published = 1
            AND jgc.access <= $gid
            AND jg.published = 1"
            . $this->getConfig('categoryfilter')	
            . $this->getConfig('hidebackend')
            . " AND jg.approved = 1
            AND jg.id IN (".$piclist .")
            ORDER BY ".$sorting." \n"
            . $limit;
            
    $database->setQuery($query);
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
      exit();
    }
    
    return $database->loadObjectList();
  }
  
  /**
   * Returns the comments of a user on pictures
   *
   * @param integer $userId Joomla ID of user
   * @param integer $aid Joomla GroupID of viewing user (access rights). 0 for public viewable!
   * @param string $sorting string for DB sorting (default: newest by ID)
   * @param integer $numPics limit number of pictures; leave away to return all
   * @param integer $limitStart where to start returning $numPics pictures
   * @return db-objs
   */
  function getCommentsUser($userId, $aid, $sorting = "jgco.cmtid DESC", $numComments = NULL, $limitStart = 0){
    global $database; 
    $userId = intval($userId);
    $aid = intval($aid);
    $sorting = $database->getEscaped($sorting);
    if (is_null($numComments)){ // no limit given: return all pictures
      $limit = "";
    } else{
      $limitStart = intval($limitStart);
      $numComments = intval($numComments);

      $limit = "\n LIMIT ".$limitStart.",".$numComments;
    }
    
    $query = "SELECT jgco.cmttext, jgco.cmtdate,
    			jg.id AS picid, jg.catid, jg.imgthumbname, jg.imgfilename,
            	jg.owner, jg.imgauthor,
            	jg.imgdate, jg.imgtitle, jg.imgtext, jg.imgcounter, jg.imgvotes,
            	(jg.imgvotesum/jg.imgvotes) AS vote,jgc.name AS cattitle,jgc.catpath as catpath
    			FROM #__joomgallery_comments as jgco
    			LEFT JOIN #__joomgallery as jg ON jgco.cmtpic = jg.id
    			LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid
    			WHERE jgc.published = 1
                AND jgc.access <= $aid
                AND jgco.published = 1
                AND jgco.approved = 1
                AND jg.published = 1"
                . $this->getConfig('categoryfilter')
                . $this->getConfig('hidebackend')
                . " AND jg.approved = 1
                AND jgco.userid = $userId
                ORDER BY ".$sorting."\n"
                . $limit;
    $database->setQuery($query);
    
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
      exit();
    }
    
    return $database->loadObjectList();
  }
  
  /**
   * Returns the all (or some ;) ) comments in the gallery as
   * DB-rows
   *
   * @param integer $userId Joomla ID of user
   * @param integer $aid Joomla GroupID of viewing user (access rights). 0 for public viewable!
   * @param string $sorting string for DB sorting (default: newest by ID)
   * @param integer $numPics limit number of pictures; leave away to return all
   * @param integer $limitStart where to start returning $numPics pictures
   * @return db-objs
   */
  function getComments($aid = 0, $sorting = "jgco.cmtid DESC", $numComments = NULL, $limitStart = 0){
    global $database; 
    $aid = intval($aid);
    $sorting = $database->getEscaped($sorting);
    if (is_null($numComments)){ // no limit given: return all pictures
      $limit = "";
    } else{
      $limitStart = intval($limitStart);
      $numComments = intval($numComments);

      $limit = "\n LIMIT ".$limitStart.",".$numComments;
    }
    
    $query = "SELECT jgco.cmttext, jgco.cmtdate,
    			jg.id AS picid, jg.catid, jg.imgthumbname, jg.imgfilename,
            	jg.owner, jg.imgauthor,
            	jg.imgdate, jg.imgtitle, jg.imgtext, jg.imgcounter, jg.imgvotes,
            	(jg.imgvotesum/jg.imgvotes) AS vote,jgc.name AS cattitle,jgc.catpath as catpath
    			FROM #__joomgallery_comments as jgco
    			LEFT JOIN #__joomgallery as jg ON jgco.cmtpic = jg.id
    			LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid
    			WHERE jgc.published = 1
                AND jgc.access <= $aid
                AND jgco.published = 1
                AND jgco.approved = 1
                AND jg.published = 1"
                . $this->getConfig('categoryfilter')
                . $this->getConfig('hidebackend')
                . " AND jg.approved = 1
                ORDER BY ".$sorting."\n"
                . $limit;
    $database->setQuery($query);
    
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
      exit();
    }
    
    return $database->loadObjectList();
  }
  
  /**
   * Fetches ItemID of JoomGallery from a Menu Item in the DB
   * and constructs "&ItemID=X"-Link from it. To prevent malformed
   * URLs e.g. for SEF, an empty string is returned if no valid
   * ItemID can be found in the database.
   * 
   * Can also be called statically, not creating any joominterface-Object.
   * For efficency (prevent multiple DB-queries for multiple calles), an 
   * instance of the interface caches the ItemID
   *
   * @return string 
   */
  function getJoomId() {
    global $database;
    if (!isset($this->_itemId) || is_null($this->_itemId)){
	    $database->setQuery("SELECT id FROM #__menu WHERE link LIKE '%com_joomgallery%' AND access='0' ORDER BY id DESC Limit 1");
	    $Itemid_jg = $database->loadResult();
	    if ($Itemid_jg=='' || $Itemid_jg==NULL) {
	      $database->setQuery("SELECT id FROM #__menu WHERE link LIKE '%com_joomgallery%' AND access='1' ORDER BY id DESC Limit 1");
	      $Itemid_jg = $database->loadResult();
	    }
	    $Itemid_jg = ($Itemid_jg=="" || $Itemid_jg==NULL) ? "" : "&Itemid=".$Itemid_jg;
	    
	    $this->_itemId = $Itemid_jg;
    }
    return $this->_itemId;
  }
  
  /**
   * Simple forwarding of Joom_OpenImage:
   * Returns the link to the detail image, as set in JoomGallery
   *
   * @param integer $picid
   * @param string $catpath
   * @param string $imgfilename
   * @param string $imgtitle
   * @param string $imgtext
   * @return string
   */
  function getPictureLink($picid, $catpath, $imgfilename, $imgtitle, $imgtext){
    global $mosConfig_live_site, $jg_paththumbs, $jg_detailpic_open, $catid;
    return Joom_OpenImage($jg_detailpic_open, $picid,$catpath, $imgfilename, $imgtitle, $imgtext);
  }
  
  /**
   * Simple forwarding of Joom_OpenImage:
   * Returns the link to the detail image, as set in JoomGallery
   * 
   * @param db-row $obj 
   * 
   */
  function getPictureLinkO($obj){
    global $mosConfig_live_site, $jg_paththumbs, $jg_detailpic_open, $catid;
    $catid = $obj->catid;
    return $this->getPictureLink($obj->picid, $obj->catpath, $obj->imgfilename, $obj->imgtitle, $obj->imgtext);
  }
  
  /**
   * Returns all elements needed to display JoomGallery pictures
   * properly like CSS. At the moment, Javascript is included in
   * the JG-javascript.
   * 
   * When the template supports adding custom CSS, it will be added 
   * and an empty string returned.
   * Otherwise, the CSS includes will be returned, which need to be
   * put in the HTML output.
   * 
   * Should be called before calling any output function!
   * 
   * @param bool $xhtml Whether Joomla's XHTML-compliant addCustomHeadTag should be used for inclusion - does not always work (e.g. for Modules)
   * @return string Stylesheet inclusions (HTML), when no XHTML-compliant inclusion is possible
   *
   */
  function getPageHeader($xhtml = true){
    global $mosConfig_live_site, $mosConfig_absolute_path, $mainframe;
    if($xhtml && method_exists($mainframe, 'addCustomHeadTag')){
      $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_settings.css\" />");
      $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common.css\" />");
      $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common2.css\" />");
      $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_category.css\" />");
      if(file_exists($mosConfig_absolute_path . 
           '/components/com_joomgallery/assets/css/joom_local.css')) 
      {
        $mainframe->addCustomHeadTag("\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_local.css\" />");
      }
      return "";
    } else {
      $return = "";
      $return .= "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_settings.css\" />";
      $return .= "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common.css\" />";
      $return .= "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_common2.css\" />";
      $return .= "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_category.css\" />";
      if(file_exists($mosConfig_absolute_path . 
           '/components/com_joomgallery/assets/css/joom_local.css')) 
      {
        $return .= "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/css/joom_local.css\" />";
      }
      
      return $return;
    }
  }
  
  /**
   * Returns db-row of one image, with optional access verification
   *
   * @param integer $picid ID of picture in gallery
   * @param integer $gid (optional, leave away for public access)
   * @return db-obj
   */
  function getPicture($picid, $gid=0){
    global $database;
    $picid = intval($picid);
    $gid = intval($gid);
    
    $query = "SELECT ";
	if ($this->getConfig('shownumcomments')){
	  $query .= "(SELECT count(cmtid) FROM #__joomgallery_comments WHERE cmtpic=jg.id) AS cmtcount, ";
	}
	$query .= "jg.id AS picid, jg.catid, jg.imgthumbname, jg.imgfilename,
            jg.owner, jg.imgauthor,
            jg.imgdate, jg.imgtitle, jg.imgtext, jg.imgcounter, jg.imgvotes,
            (jg.imgvotesum/jg.imgvotes) AS vote,jgc.name AS cattitle,jgc.catpath as catpath \n";
    if ($this->getConfig('showlastcomment')){
      $query .= ",jgco.cmttext, jgco.cmtdate, jgco.userid , jgco.cmtid \n";
    }
    $query .="FROM #__joomgallery AS jg
            LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid \n";
	if ($this->getConfig('showlastcomment')){
	  $query .= "LEFT JOIN #__joomgallery_comments AS jgco ON jg.id = jgco.cmtpic
	  		LEFT JOIN #__joomgallery_comments jgco2 ON jgco.cmtpic = jgco2.cmtpic
            AND jgco.cmtdate < jgco2.cmtdate
            WHERE jgco2.cmtpic IS NULL
            AND ";
	} else{
	  $query .= "WHERE ";
	}
	$query .="jgc.published = 1
            AND jgc.access <= $gid
            AND jg.published = 1
            AND jg.approved = 1
            AND jg.id = $picid";
            
    $database->setQuery($query);
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
      exit();
    }
    $row = NULL;
    $database->loadObject($row);
    return $row;       
  }
  
  /**
   * Returns the db-row of a random image, to which a 
   * user with GroupID=$gid has access to 
   * (e.g. for a simple 1pic module)
   *
   * @param integer $gid (optional access verification, leave away for public access)
   * @return db-objs
   */
  function getRandomPicture($gid=0){
    global $database;
    $gid = intval($gid);
    
    $query = "SELECT ";
	if ($this->getConfig('shownumcomments')){
	  $query .= "(SELECT count(cmtid) FROM #__joomgallery_comments WHERE cmtpic=jg.id) AS cmtcount, ";
	}
	$query .= "jg.id AS picid, jg.catid, jg.imgthumbname, jg.imgfilename,
            jg.owner, jg.imgauthor,
            jg.imgdate, jg.imgtitle, jg.imgtext, jg.imgcounter, jg.imgvotes,
            (jg.imgvotesum/jg.imgvotes) AS vote,jgc.name AS cattitle,jgc.catpath as catpath \n";
    if ($this->getConfig('showlastcomment')){
      $query .= ",jgco.cmttext, jgco.cmtdate, jgco.userid , jgco.cmtid \n";
    }
    $query .="FROM #__joomgallery AS jg
            LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid \n";
	if ($this->getConfig('showlastcomment')){
	  $query .= "LEFT JOIN #__joomgallery_comments AS jgco ON jg.id = jgco.cmtpic
	  		LEFT JOIN #__joomgallery_comments jgco2 ON jgco.cmtpic = jgco2.cmtpic
            AND jgco.cmtdate < jgco2.cmtdate
            WHERE jgco2.cmtpic IS NULL
            AND ";
	} else{
	  $query .= "WHERE ";
	}
	$query .="jgc.published = 1
            AND jgc.access <= $gid
            AND jg.published = 1
            AND jg.approved = 1
            ORDER BY RAND()
            LIMIT 1;";
            
    $database->setQuery($query);
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
      exit();
    }
    $row = NULL;
    $database->loadObject($row);
    return $row;    
    
  }
 /**
  * Returns the number of pictures in a category
  *
  * @param integer $catid ID of category
  * @param integer $gid GroupID of user (for restricted access images)
  * @return integer
  */
  function getNumPicsByCategory($catid, $gid=0){
    global $database;
    $catid = intval($catid);
    $gid = intval($gid);
    $query = "SELECT count(jg.id) FROM #__joomgallery as jg  
    			LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid
    			WHERE jgc.published = 1
                AND jgc.access <= $gid
                AND jg.published = 1"
                . $this->getConfig('categoryfilter')    
                . $this->getConfig('hidebackend')
                . " AND jg.approved = 1
                AND jg.catid = $catid";
    $database->setQuery($query);
    
    return $database->loadResult();
  }
  
  /**
   * Returns picture-objs of all images in Category $catid
   *
   * @param integer $catid
   * @param integer $gid
   * @param string $sorting sorting string
   * @param integer $numPics limit number of pictures; leave away to return all
   * @param integer $limitStart where to start returning $numPics pictures
   * @return db-objs
   * 
   */
  function getPicsByCategory($catid, $gid, $sorting, $numPics = NULL, $limitStart = 0){
    global $database;
    // validation
    $catid = intval($catid);
    $gid = intval($gid);    
    $sorting = $database->getEscaped($sorting);   
    if (is_null($numPics)){ // no limit given: return all pictures
      $limit = "";
    } else{
      $limitStart = intval($limitStart);
      $numPics = intval($numPics);
      
      $limit = "\n LIMIT ".$limitStart.",".$numPics;
    }
    
    $query = "SELECT ";
	if ($this->getConfig('shownumcomments')){
	  $query .= "(SELECT count(cmtid) FROM #__joomgallery_comments WHERE cmtpic=jg.id) AS cmtcount, ";
	}
	$query .= "jg.id AS picid, jg.catid, jg.imgthumbname, jg.imgfilename,
            jg.owner, jg.imgauthor,
            jg.imgdate, jg.imgtitle, jg.imgtext, jg.imgcounter, jg.imgvotes,
            (jg.imgvotesum/jg.imgvotes) AS vote,jgc.name AS cattitle,jgc.catpath as catpath \n";
    if ($this->getConfig('showlastcomment')){
      $query .= ",jgco.cmttext, jgco.cmtdate, jgco.userid , jgco.cmtid \n";
    }
    $query .="FROM #__joomgallery AS jg
            LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid \n";
	if ($this->getConfig('showlastcomment')){
	  $query .= "LEFT JOIN #__joomgallery_comments AS jgco ON jg.id = jgco.cmtpic
	  		LEFT JOIN #__joomgallery_comments jgco2 ON jgco.cmtpic = jgco2.cmtpic
            AND jgco.cmtdate < jgco2.cmtdate
            WHERE jgco2.cmtpic IS NULL
            AND ";
	} else{
	  $query .= "WHERE ";
	}
	$query .="jgc.published = 1
            AND jgc.access <= $gid
            AND jg.published = 1"
            . $this->getConfig('categoryfilter')	
            . $this->getConfig('hidebackend')
            . " AND jg.approved = 1
            AND jg.catid = $catid
            ORDER BY ".$sorting." \n"
            . $limit;
            
    $database->setQuery($query);
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
      exit();
    }
    
    return $database->loadObjectList();  
  }
  
  /**
   * Returns number of DB-rows of pictures matching the search string
   * (e.g. for pre-filtering, pagination)
   *
   * @param string $searchstring
   * @param integer $gid Group of viewing user (for access rights)
   * @return integer
   */
  function getNumPicsBySearch($searchstring, $gid=0){
    global $database;
    $gid = intval($gid);
    $searchstring = $database->getEscaped(strtolower(trim($searchstring)));
    
    $query = "SELECT count(jg.id) FROM #__joomgallery as jg  
    			LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid
    			WHERE jgc.published = 1
                AND jgc.access <= $gid
                AND jg.published = 1"
                . $this->getConfig('categoryfilter')    
                . $this->getConfig('hidebackend')
                . " AND jg.approved = 1
                 AND (jg.imgtitle LIKE '%$searchstring%'
                    OR jg.imgtext LIKE '%$searchstring%')";
    $database->setQuery($query);
    
    return $database->loadResult();
  }
  
  /**
   * Returns DB-rows of pictures matching the search string
   * E.g. useful for a search mambot
   *
   * @param string $searchstring
   * @param integer $gid
   * @param string $sorting sorting string
   * @param integer $numPics
   * @param integer $limitStart
   * @return db-objs
   */
  function getPicsBySearch($searchstring, $gid, $sorting, $numPics = NULL, $limitStart = 0){
    global $database;
    $gid = intval($gid);
    $searchstring = $database->getEscaped(strtolower(trim($searchstring)));
    $sorting = $database->getEscaped($sorting);  
    if (is_null($numPics)){ // no limit given: return all pictures
      $limit = "";
    } else{
      $limitStart = intval($limitStart);
      $numPics = intval($numPics);
      
      $limit = "\n LIMIT ".$limitStart.",".$numPics;
    }
    
    $query = "SELECT ";
	if ($this->getConfig('shownumcomments')){
	  $query .= "(SELECT count(cmtid) FROM #__joomgallery_comments WHERE cmtpic=jg.id) AS cmtcount, ";
	}
	$query .= "jg.id AS picid, jg.catid, jg.imgthumbname, jg.imgfilename,
            jg.owner, jg.imgauthor,
            jg.imgdate, jg.imgtitle, jg.imgtext, jg.imgcounter, jg.imgvotes,
            (jg.imgvotesum/jg.imgvotes) AS vote,jgc.name AS cattitle,jgc.catpath as catpath \n";
    if ($this->getConfig('showlastcomment')){
      $query .= ",jgco.cmttext, jgco.cmtdate, jgco.userid , jgco.cmtid \n";
    }
    $query .="FROM #__joomgallery AS jg
            LEFT JOIN #__joomgallery_catg AS jgc ON jgc.cid = jg.catid \n";
	if ($this->getConfig('showlastcomment')){
	  $query .= "LEFT JOIN #__joomgallery_comments AS jgco ON jg.id = jgco.cmtpic
	  		LEFT JOIN #__joomgallery_comments jgco2 ON jgco.cmtpic = jgco2.cmtpic
            AND jgco.cmtdate < jgco2.cmtdate
            WHERE jgco2.cmtpic IS NULL
            AND ";
	} else{
	  $query .= "WHERE ";
	}
	$query .="jgc.published = 1
            AND jgc.access <= $gid
            AND jg.published = 1"
            . $this->getConfig('categoryfilter')
            . $this->getConfig('hidebackend')
            . " AND jg.approved = 1
            AND (jg.imgtitle LIKE '%$searchstring%'
                   OR jg.imgtext LIKE '%$searchstring%')
            ORDER BY ".$sorting." \n"
            . $limit;
            
    $database->setQuery($query);
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
      exit();
    }
    
    return $database->loadObjectList(); 
    
  }
  
}


?>