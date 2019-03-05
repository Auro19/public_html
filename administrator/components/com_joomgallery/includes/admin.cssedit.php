<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/admin.cssedit.php $
// $Id: admin.cssedit.php 396 2009-03-15 16:06:21Z aha $
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

class Joom_AdminCssEdit  {
  function Joom_AdminCssEdit($task){
    global $mosConfig_absolute_path;
    $this->cssPath = $mosConfig_absolute_path . 
                    '/components/com_joomgallery/assets/css/';
    $this->localCssFile = $this->cssPath . 'joom_local.css'; 
    
    $filecontent = mosGetParam($_REQUEST, "csscontent", '');
    
    switch($task){
      case "cancelcss":
        $this->cancelCss();
        break;

      case "savecss":
        $this->saveCss($filecontent);
        break;
        
      case "deletecss":
        $this->deleteCss();
        break;
        
      default:
        $this->displayCssEdit();
    }
    
   
  }
  
  function displayCssEdit(){
    $msg = ''; // error / warning msg for CSS editor
    global $mosConfig_absolute_path;
    $adminincludepath  = $mosConfig_absolute_path .
                       '/administrator/components/com_joomgallery/includes/';
    
 
    $cssfile = $this->cssPath . 'joom_local.css.README';
    $editExistingFile = file_exists($this->localCssFile); 
    if ($editExistingFile){
      $cssfile = $this->localCssFile;
      // test permissions:
      @chmod($cssfile, 0766);
      if (!is_writable($cssfile)){
        $msg = _JGA_CSS_WARNING_PERMS;
      }
    } else{
      if (!is_writable($this->cssPath)){
        $msg = _JGA_CSS_WARNING_PERMS;
      }
    }
    
    $content = '';
    if ($f = fopen($cssfile, "r")){
	  $content = fread($f, filesize($cssfile));
	  $content = htmlspecialchars($content);
    } else{
      // output error, overwrite last error (this one more important)
      $msg = _JGA_CSS_ERROR_READING . $cssfile;
    }
	  
    require_once ($adminincludepath . 'html/admin.cssedit.html.php');
	$htmladmincss=new HTML_Joom_AdminCssEdit($content, $this->localCssFile, $editExistingFile, $msg);
    
  }
  
  function saveCss($content){
    if (file_exists($this->localCssFile) && !is_writable($this->localCssFile))
      mosRedirect("index2.php?option=com_joomgallery", 'Error: CSS file not writable at '.$this->localCssFile);
    
    if ($f = fopen($this->localCssFile, "w")){
      fputs($f, stripslashes($content));
      fclose ($f);
      mosRedirect("index2.php?option=com_joomgallery", _JGA_CSS_SAVED);
    } else{
      mosRedirect("index2.php?option=com_joomgallery", _JGA_CSS_ERROR_WRITING .$this->localCssFile);
    }
  }
  
  function deleteCss(){
    if (unlink($this->localCssFile)){
      mosRedirect("index2.php?option=com_joomgallery", _JGA_CSS_DELETED);
    }else{
      mosRedirect("index2.php?option=com_joomgallery", _JGA_CSS_ERROR_DELETING .$this->localCssFile);
    }
  }
  
  function cancelCss(){
    mosRedirect("index2.php?option=com_joomgallery", _JGA_CSS_CANCELED);
  }
  
  var $cssPath;
  var $localCssFile;
}
?>
