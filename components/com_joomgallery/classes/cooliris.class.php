<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/classes/cooliris.class.php $
// $Id: cooliris.class.php 396 2009-03-15 16:06:21Z aha $
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

// based on code example at http://developer.cooliris.com/rss/php_rss.html

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );


class Joom_Cooliris{

  var $thumbnailpath;
  var $picturepath;

  var $catid;
  var $catpath;
  var $catallpages;
  var $currentpage;
  var $rows;

  /**
   * dynamically output of a RSS feed to display them in Cooliris
   *
   * @param integer $catid
   * @param integer $catallpages, Count of pages, if navigation active
   *                              otherwise 1
   * @param integer $currentpage, curennt site if navigation active, otherwise 0
   * @param array $rows, Pictures
   */
  function getxmlfeed($catid,$catallpages,$currentpage,$rows){
    global $thumbnailpath,$picturepath;

    header('Content-type: text/xml');

    $this->thumbnailpath=$thumbnailpath;
    $this->picturepath=$picturepath;

    $this->catid=$catid;
    $this->catpath=Joom_GetCatPath($this->catid);
    $this->catallpages=$catallpages;
    $this->currentpage=$currentpage;
    $this->rows=$rows;

    ob_clean();
    echo $this->getRss();
    exit;
  }

  function getRss(){
    global $jg_detailpic_open;
    $rss  = $this->getRssHeader();
    $rss .= $this->getRssItems();
    $rss .= $this->getRssFooter();
    return $rss;
  }

  function getRssHeader(){
    global $mosConfig_live_site,$mosConfig_lang,$mosConfig_sitename;

    $rssHeader  = '<?xml version="1.0" encoding="utf-8" standalone="yes"?>
                  <rss version="2.0"
                   xmlns:media="http://search.yahoo.com/mrss/"
                   xmlns:atom="http://www.w3.org/2005/Atom">
                     <channel>
                       <title>'.$mosConfig_sitename.'</title>
                       <link>'.$mosConfig_live_site.'</link>
                       <description>JoomGallery</description>
                       ';

    if ($this->catallpages==1){
      $rssHeader .= '<atom:link rel="self" href="'
                 .htmlspecialchars($mosConfig_live_site.'/index.php?option=com_joomgallery&func=viewcategory&catid='
                 .$this->catid.'&cooliris=1').'" />
                 ';
    } else {
      $rssHeader .= '<atom:link rel="self" href="'
                 .htmlspecialchars($mosConfig_live_site.'/index.php?option=com_joomgallery&func=viewcategory&catid='
                 .$this->catid.'&startpage='.$this->currentpage.'&cooliris=1').'" />
                 ';
    }

    //only if showing more than one site analyze prev-next links
    //und output them 
    if ($this->catallpages > 1) {
      //prev link only if currentpage > 1
      if ($this->currentpage > 1) {
        $prevpage=$this->currentpage-1;
        $rssHeader .= '<atom:link rel="previous" href="'
                   .htmlspecialchars($mosConfig_live_site.'/index.php?option=com_joomgallery&func=viewcategory&catid='
                   .$this->catid.'&startpage='.$prevpage.'&cooliris=1').'" />
                   ';
      }

      //next link only if not reached last site
      if ($this->currentpage < $this->catallpages){
        $nextpage = $this->currentpage + 1;
        $rssHeader .= '<atom:link rel="next" href="'
                   .htmlspecialchars($mosConfig_live_site.'/index.php?option=com_joomgallery&func=viewcategory&catid='
                   .$this->catid.'&startpage='.$nextpage.'&cooliris=1').'" />
                   ';
      }
    }

    return $rssHeader;
  }

  function getRssFooter(){
    $rssFooter = '  </channel>
</rss>';
    return $rssFooter;
  }

  function getRssItems(){
    global $mosConfig_live_site,$func,$absolut_originalpath;
    $rssItems = "";
    $thumbnailpath=$this->thumbnailpath.$this->catpath;
    $picturepath=$this->picturepath.$this->catpath;
    $origpicturepath=$absolut_originalpath.'/'.$this->catpath;

    foreach ($this->rows as $picture) {
      $id = $picture->id;

      if (defined('_JEXEC')) {
        $title = $this->getBareText($picture->imgtitle);
        $text = $this->getBareText($picture->imgtext);
      }else{
        $title = utf8_encode($this->getBareText($picture->imgtitle));
        $text = utf8_encode($this->getBareText($picture->imgtext));
      }

      $link = sefRelToAbs("index.php?option=com_joomgallery&func=detail&id=".$picture->id);
      $name = $picture->imgauthor;
      $img_id = $picture->id;

      $link_big = 1;

      //check if original picture exists, otherwise use detail picture
      if (file_exists($origpicturepath.$picture->imgfilename)) {
        $func="detail";
      }
      
      $contenturl = Joom_OpenImage($link_big, $picture->id, $this->catpath, $picture->imgfilename, $picture->imgtitle, $picture->imgtext);
      $contenturl = str_replace('" target="_blank','',$contenturl);
            
      $rssItems .= "<item>
      <title>".$title."</title>
      <link>".$link."</link>
      <media:thumbnail url=\"".$thumbnailpath.$picture->imgthumbname ."\" />
      <media:content url=\"". $contenturl ."\" />
      <media:description>".$text."</media:description>
      <guid isPermaLink=\"false\">".$mosConfig_live_site.'/joomgallery-'.$picture->id."</guid>
    </item>\n";

    }
    return $rssItems;
  }

  function getBareText($text){
    $text = htmlspecialchars($text, ENT_QUOTES);
    $text = trim($text);
    return $text;
  }
}
?>
