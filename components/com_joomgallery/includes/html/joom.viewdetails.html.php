<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/html/joom.viewdetails.html.php $
// $Id: joom.viewdetails.html.php 396 2009-03-15 16:06:21Z aha $
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
defined ('_VALID_MOS') or die('Direct Access to this location is not allowed.');

# Don't allow passed settings
if(isset($_REQUEST['is_editor']) && $_REQUEST['is_editor']) {
  print "<script>location.href='".$mosConfig_live_site ."'</script>\n";
  exit();
}


class HTML_Joom_Detail {


  function Joom_PagingCategory_HTML($pid, $nid, $fileinfo, $act_key) {
    global $catid, $database, $jg_slideshow, $ordering, $slideshow, $jg_minis,
           $jg_showdetail, $jg_showdetaildescription, $jg_showdetaildatum, 
           $mosConfig_live_site, $jg_showdetailhits, $jg_showdetailrating, 
           $jg_showdetailfilesize, $jg_showdetailauthor, $jg_slideshow_timer,
           $jg_showdetailnumberofpics, $jg_slideshow_usefilter, $jg_dateformat, 
           $jg_slideshow_filterbychance, $jg_slideshow_filtertimer, $jg_maxwidth,
           $jg_showsliderepeater, $jg_resizetomaxwidth;

    $database->setQuery( "SELECT *
        FROM #__joomgallery
        WHERE catid=$catid AND approved='1' AND published='1' " );
    $rows = $database->loadObjectList();
    $number_pics = count($rows);

    if($jg_slideshow && $slideshow) {
      include(_JOOM_FRONTEND_PATH."/includes/joom.slideshow.php");
    }
?>

  <a name="joomimg" >&nbsp;</a>

<?php
   //Slideshow controls
    if($jg_slideshow) {
?>
    <div class="jg_displaynone">
      <script type="text/javascript">
        document.write('</div>');
        document.write('<div class="jg_detailnavislide">');
      </script>
      <?php echo _JGS_SLIDESHOW; ?>
<?php
      if(!$slideshow) {
?>
      <br />
      <a href="javascript:joom_startslideshow()">
      <img src="<?php echo $mosConfig_live_site.'/components/com_joomgallery/assets/images/control_play.png' ;?>" border="0" width="16" height="16" alt="<?php echo _JGS_START; ?>" class="pngfile jg_icon" /></a>
<?php
      } else {
?>
      <br />
      <a href="javascript:photo.pause()" id="jg_pause" style="visibility:visible;display:inline;">
      <img src="<?php echo $mosConfig_live_site.'/components/com_joomgallery/assets/images/control_pause.png' ;?>" border="0" width="16" height="16" alt="<?php echo _JGS_PAUSE; ?>" class="pngfile jg_icon" /></a>
      <a href="javascript:photo.goon()" id="jg_goon" style="visibility:hidden;display:inline;"></a>
      <a href="javascript:photo.stop()">
      <img src="<?php echo $mosConfig_live_site.'/components/com_joomgallery/assets/images/control_stop.png' ;?>" border="0" width="16" height="16" alt="<?php echo _JGS_STOP; ?>" class="pngfile jg_icon" /></a>
<?php
        if($jg_showsliderepeater) {
?>
      -
      <form>
        <?php echo _JGS_REPEAT_ENDLESS; ?>:
        <input type="checkbox" onclick="photo.repeatstatus()" />
      </form>
<?php
        } else {
?>
      </a>
<?php
        }
      }
?>    
    </div>
    <script type="text/javascript">
      document.write('<div class="jg_displaynone">');
    </script>
    <div class="jg_detailnavislide">
      <div class="jg_no_script">
        <?php echo _JGS_SLIDESHOW_NO_SCRIPT; ?>
      </div>
    </div>
    <script type="text/javascript">
      document.write('</div>');
    </script>
<?php
    }
?>  
  <div class="jg_detailnavi">
<?php
    if($pid > 0 && !$slideshow) {
      //previous pic
      $backlink = sefRelToAbs("index.php?option=com_joomgallery&amp;func=detail&amp;id=$pid"._JOOM_ITEMIDX)."#joomimg";
?>
    <div class="jg_detailnaviprev">
      <form  name="form_jg_back_link" action="<?php echo $backlink;?>">
        <input type="hidden" name="jg_back_link" readonly="readonly" />
      </form>
      <a href="<?php echo $backlink; ?> ">
        <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/arrow_left.png' ;?>" border="0" width="16" height="16" alt="<?php echo _JGS_PREVIOUS_IMAGE; ?>" class="pngfile jg_icon" /></a>
      <a href="<?php echo $backlink; ?> ">
        <?php echo _JGS_PREVIOUS_IMAGE; ?> 
      </a>
<?php
      if($jg_showdetailnumberofpics) {
?>
      <?php echo '<br />('._JGS_PICTURE.' '.$act_key.' '._JGS_OF.' '.$number_pics.')'; ?> 
<?php
      }
?>
    </div>
<?php
    }
    if($nid > 0 && !$slideshow) {
      //next pic
      $act_key = ($act_key + 2);
      $forwardlink = sefRelToAbs("index.php?option=com_joomgallery&amp;func=detail&amp;id=$nid"._JOOM_ITEMIDX)."#joomimg";
?>
    <div class="jg_detailnavinext">
      <form name="form_jg_forward_link" action="<?php echo $forwardlink;?>">
        <input type="hidden" name="jg_forward_link" readonly="readonly" />
      </form>
      <a href="<?php echo $forwardlink; ?>">
      <?php echo _JGS_NEXT_IMAGE; ?></a>
      <a href="<?php echo $forwardlink; ?>">
      <img src="<?php echo $mosConfig_live_site.'/components/com_joomgallery/assets/images/arrow_right.png' ;?>" border="0" width="16" height="16" alt="<?php echo _JGS_NEXT_IMAGE; ?>" class="pngfile jg_icon" /></a>
<?php
      if($jg_showdetailnumberofpics) {
?>
      <?php echo '<br />('._JGS_PICTURE.' '.$act_key.' '._JGS_OF.' '.$number_pics.')'; ?> 
<?php
      }
?>
    </div>
<?php
    }
?>
  </div>
<?php
  }


  function Joom_ShowPicture_HTML($picture_src,$catpath, $imgfilename, 
                                 $srcWidth_ori, $srcHeight_ori, $srcWidth, 
                                 $srcHeight) {
    global $id, $mosConfig_live_site, $jg_bigpic, $jg_bigpic_open, $jg_watermark, 
           $origpicturepath, $joompath, $jg_watermarkpos, $slideshow, $gid, 
           $jg_maxwidth, $imgtitle, $imgtext, $jg_disable_rightclick_detail,
           $jg_pathoriginalimages, $jg_resizetomaxwidth, $catid, $my, 
           $database, $jg_nameshields, $jg_nameshields_width, 
           $jg_nameshields_unreg, $jg_show_nameshields_unreg, 
           $jg_nameshields_height, $jg_showdetailtitle, $jg_showdetaildownload,
           $jg_downloadfile, $jg_favourites, $jg_showdetailfavourite,
           $jg_usefavouritesforpubliczip, $jg_usefavouritesforzip,$jg_favouritesshownotauth;


    if($jg_resizetomaxwidth) {
      $ratio = max($srcWidth,$srcHeight);
      $ratio = ($ratio/$jg_maxwidth);
      $ratio = max($ratio, 1.0);
      $width = (int)($srcWidth / $ratio);
      $height = (int)($srcHeight / $ratio);
    } else {
      $width=$srcWidth;
      $height=$srcHeight;
    }
    $link = "";

    if($jg_nameshields && $my->username && !$slideshow) {
?>
  <script language="javascript" type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/components/com_joomgallery/assets/js/wz_dragdrop/js/wz_dragdrop.js"></script>
<?php
    }
?>
  <div style="text-align:center;">
<?php
    $linkOverImage = false;
    // Link zu Originalbild anzeigen:
    if((($jg_bigpic == 1 && $gid > 0) || ($jg_bigpic == 2)) && !$slideshow 
          && is_file(_JOOM_ABSOLUTE_PATH. $jg_pathoriginalimages.'/'.$catpath.$imgfilename)
          && ($srcWidth_ori > $srcWidth && $srcHeight_ori > $srcHeight)) {
      $link = Joom_OpenImage($jg_bigpic_open, $id, $catpath, $imgfilename, $imgtitle, $imgtext);
      // Originalbild ueber Detailbild verlinkt, wenn keine Namensschilder verwendet werden:
      if(!$jg_nameshields || (!$jg_show_nameshields_unreg && !$my->username)) {
        $linkOverImage = true;
?>
    <a href="<?php echo $link;?>"> 
<?php
      }
    }
    //Namensschilder nur in der DB suchen, wenn Slideshow nicht aktiviert und
    //Berechtigung zum Ansehen vorliegt
    //ebenso den DIV fuer die Namensschilder nur in diesen Faellen ausgeben
    if(!$slideshow && $jg_nameshields && ($my->username || ( $jg_nameshields_unreg && !$my->username))) {
      $database->setQuery( "SELECT COUNT(nid)
          FROM #__joomgallery_nameshields
          WHERE npicid='$id' AND nuserid = '$my->id'" );
      $count = $database->loadResult();

      $database->setQuery( "SELECT *
          FROM #__joomgallery_nameshields
          WHERE npicid='$id'" );
      $rows = $database->loadObjectList();

      $database->setQuery( "SELECT MAX(nzindex)
          FROM #__joomgallery_nameshields
          WHERE npicid='$id'" );
      $zindex = $database->loadResult();

      if(!$zindex) {
        $zindex=500;
      }
      $length = strlen($my->username)*$jg_nameshields_width;
      if($rows != NULL) {
        $output ='';
        $i = 1;
        foreach ($rows as $row) {
          $length2 = getDisplayNameLength($row->nuserid)*$jg_nameshields_width;
          $output .= '<div id="id'.$i.'" style="position:absolute; top:'.$row->nxvalue.'px; left:'.$row->nyvalue.'px; width:'.$length2.'px; z-index:'.$row->nzindex.'" class="nameshield">';
          $output .= getDisplayName($row->nuserid, false);
          $output .= '</div>';
          $output .= "\n                ";
          $i++;
        }
      }
?>
      <div id="pic" style="position:relative; margin:10px auto; width:<?php echo $srcWidth+1; ?>px; height: <?php echo $srcHeight+1; ?>px; z-index:1;">
<?php
    }
    //TODO cbe joomgallerytab
?>
      <img src="<?php echo $picture_src ?>" class="jg_photo" id="jg_photo_big" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="<?php echo $imgtitle;?>" <?php if($jg_disable_rightclick_detail==1){?> onmouseover="javascript:joom_hover();" onmouseout="javascript:joom_hover();"<?php } ?> />
<?php
    // eg. Namensschild platzieren:
    if($jg_nameshields && $my->username) {
      if(!$slideshow && $count < 1 && $my->username) {
?>
        <div id="u1" style="position:absolute; top:0px; left:0px; width:<?php echo $length; ?>px; z-index: 500;" class="nameshield"><?php echo $my->username; ?></div>
<?php
      }
    }
    if(($jg_nameshields_unreg && $jg_nameshields && !$my->username) || ($jg_nameshields && $my->username)) {
      if(isset($rows) && $rows != NULL) {
?>
       <?php echo $output; ?> 
<?php
      }
    }
    if(!$slideshow && $jg_nameshields && ($my->username || ($jg_nameshields_unreg && !$my->username))) {
?>
        </div>
<?php
    }
    if($jg_nameshields && $my->username && !$slideshow) {
      $Itemid = '';
      $Itemid_array = explode('=',_JOOM_ITEMID);
      if(isset($Itemid_array[1])) $Itemid = $Itemid_array[1];
?>
      <form name="nameshieldform" action="index.php" target="_top" method="post">
        <input type="hidden" name="option" value="com_joomgallery" />
        <input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />
        <input type="hidden" name="func" value="savenameshield" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input type="hidden" name="uid" value="<?php echo $my->id; ?>" />
        <input type="hidden" name="xvalue" value="" />
        <input type="hidden" name="yvalue" value="" />
        <input type="hidden" name="zindex" value="<?php echo $zindex-1; ?>" />
        <input type="hidden" name="length" value="<?php echo $length; ?>" />
        <input type="hidden" name="height" value="<?php echo $jg_nameshields_height; ?>" />
      </form>
<?php
    }
    if($linkOverImage){
?>
    </a>
<?php
    }
    // Parameter fuer Icons:
    $showZoomIcon = 0;
    $showDownloadIcon = 0;
    $showTagIcon = "none";
    $showFavouritesIcon = 0;
    
    if(is_file(_JOOM_ABSOLUTE_PATH.$jg_pathoriginalimages.'/'.$catpath.$imgfilename)
        && ($srcWidth_ori > $srcWidth && $srcHeight_ori > $srcHeight)){
      if(($jg_bigpic == 1 && $gid > 0) || ($jg_bigpic == 2)) { 
          //$link = Joom_OpenImage($jg_bigpic_open, $id, $catpath, $imgfilename, $imgtitle, $imgtext);
        $showZoomIcon = 1;
      }elseif($jg_bigpic == 1 && $gid < 1){
        $showZoomIcon = -1;
      }
    }

    if((is_file(_JOOM_ABSOLUTE_PATH.$jg_pathoriginalimages.'/'.$catpath.$imgfilename) 
         || $jg_downloadfile!=1)){
      if((($jg_showdetaildownload == 1) && ($gid >= 1)) 
           || (($jg_showdetaildownload == 2) && ($gid == 2)) 
           || (($jg_showdetaildownload == 3))) {
        $showDownloadIcon = 1;
      } elseif(($jg_showdetaildownload == 1) && ($gid < 1)){
        $showDownloadIcon = -1;
      }
    }

    if($jg_nameshields && $my->username && !$slideshow) {
      if($count < 1){
        $showTagIcon = "save";
      } elseif($count == 1){
        $showTagIcon = "delete";
      }
    } elseif($jg_nameshields && !$my->username && $jg_show_nameshields_unreg){
      $showTagIcon = "login";
    }

    if($jg_favourites == 1) {
      if((($jg_showdetailfavourite == 0) && ($my->gid >= 1))
          || (($jg_showdetailfavourite == 1) && ($my->gid == 2)) 
          || ((defined('_JEXEC') && $jg_usefavouritesforpubliczip == 1) && ($my->gid < 1))) {
        if($jg_usefavouritesforzip == 1
            || ((defined('_JEXEC') && $jg_usefavouritesforpubliczip == 1) && ($my->gid < 1))) {
          $showFavouritesIcon = 2;
        } else {
          $showFavouritesIcon = 1;
        }
      } elseif(($jg_favouritesshownotauth == 1)){
        if($jg_usefavouritesforzip == 1) {
          $showFavouritesIcon = -2;
        } else {
          $showFavouritesIcon = -1;
        }
      }
    }
    
    if(!$slideshow){
      HTML_Joom_Detail::Joom_ShowIcons_HTML($showZoomIcon, $showDownloadIcon, $showTagIcon, $showFavouritesIcon, $link);
    }
    if(!$slideshow && $jg_nameshields && $my->username) {
      global $jg_ownborder;
      if($jg_ownborder) {
        $space  = $jg_styl_borderpadding;
        $space2 = $space*2;
      } else {
        $space  = 0;
        $space2 = 0;
      }
?>
    <script type="text/javascript">
    SET_DHTML("u1"+CURSOR_MOVE+MAXOFFLEFT+0+MAXOFFRIGHT+<?php echo $srcWidth+$space2-$length; ?>+MAXOFFTOP+0+MAXOFFBOTTOM+<?php echo $srcHeight-$space; ?>);
    </script>
<?php
    }
?>
  </div>
<?php
  }

  function Joom_ShowMinis_HTML ($rows, $id) {
    global $jg_paththumbs, $thumbnailpath, $jg_miniWidth, $jg_miniHeight, 
           $jg_minisprop, $jg_motionminis, $catpath;

?>
  <div class="jg_minis">
<?php
    if( $jg_motionminis==2 ) { //moveable
?>
    <div id="motioncontainer">
      <div id="motiongallery">
        <div style="white-space:nowrap;" id="trueContainer">
<?php
  }
    if(count($rows) > 0) {
      foreach ($rows as $row1) {
        if(is_file(_JOOM_ABSOLUTE_PATH.$jg_paththumbs.'/'.$catpath.$row1->imgthumbname)) {
          $tnfile = '';
        } else {
          $tnfile = 'tn_';
        }
?>
          <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=detail&amp;id=$row1->id"._JOOM_ITEMIDX)."#joomimg"; ?>">
<?php

        if($row1->id == $id) {
?>
          <img src="<?php echo $thumbnailpath.$catpath.$tnfile.$row1->imgthumbname; ?>" name="jg_mini_akt" class="jg_minipic" alt="<?php echo $row1->imgtitle; ?>" id="jg_mini_<?php echo $row1->id; ?>" /></a>
<?php
        } elseif ($row1->id != $id) {
?>
          <img src="<?php echo $thumbnailpath.$catpath.$tnfile.$row1->imgthumbname; ?>" class="jg_minipic" alt="<?php echo $row1->imgtitle; ?>" id="jg_mini_<?php echo $row1->id; ?>" /></a>
<?php
        }
      }
    }
    if($jg_motionminis==2) {
?>
        </div>
      </div>
    </div>
<?php
    }
?>
  </div>
<?php
  }


  function Joom_ShowPictureTitle_HTML() { 
    global $imgtitle;
?>
  <h3 class="jg_imgtitle" id="jg_photo_title">
    <?php echo Joom_BBDecode($imgtitle); ?> 
  </h3>
<?php
  }


  function Joom_ShowPictureData_HTML($imgauthorid, $imgauthor, $imgcounter, 
                                     $fimgdate, $fimgsize, $foriginalimgsize, 
                                     $frating, $pxWidth, $pxHeight, $pxorigWidth,
                                     $pxorigHeight ) {
    global $imgtitle, $jg_showdetaildescription, $jg_showdetaildatum, $gid, $id,
           $jg_showdetaildownload, $imgtext, $jg_showdetailhits,  
           $jg_showdetailrating, $jg_showdetailfilesize,  $jg_showdetailauthor, 
           $jg_showoriginalfilesize, $jg_downloadfile, $joompath,  $imgfilename, 
           $slideshow, $mosConfig_live_site, $jg_pathoriginalimages, 
           $catpath, $catid, $jg_dateformat, $jg_showdetailaccordion;

    $ii=0;
    if($imgtitle=="") { $imgtitle = "&nbsp;"; }
?>
<div class="jg_details">
  <div class="sectiontableheader">
    <h4 <?php echo $jg_showdetailaccordion?"class=\"joomgallery-toggler\"":"class=\"joomgallery-notoggler\""; ?>>
    <?php echo _JGS_PICTUREDETAILS; ?> 
  </h4>
  </div>
  <div <?php echo $jg_showdetailaccordion?"class=\"joomgallery-slider\"":""; ?>>
    <p>
<?php
    if($jg_showdetaildescription) {
      if($imgtext=="") { $imgtext = "&nbsp;<br />"; }
?>
    <div class="sectiontableentry1">
      <div class="jg_photo_left">
        <?php echo _JGS_DESCRIPTION; ?>:
      </div>
      <div class="jg_photo_right" id="jg_photo_description">
        <?php echo Joom_BBDecode($imgtext); ?> 
      </div>
    </div>
<?php
    }
    if($jg_showdetaildatum) {
      if($fimgdate=="") { $fimgdate = "&nbsp;"; }
      $ii++;
?>
    <div class="sectiontableentry<?php echo ($ii%2)+1; ?>">
      <div class="jg_photo_left">
        <?php echo _JGS_DATE; ?>:
      </div>
      <div class="jg_photo_right" id="jg_photo_date">
        <?php echo $fimgdate; ?> 
      </div>
    </div>
<?php
    }
    if($jg_showdetailhits) {
      if($imgcounter=="") { $imgcounter = "&nbsp;"; }
      $ii++;
?>
    <div class="sectiontableentry<?php echo ($ii%2)+1; ?>">
      <div class="jg_photo_left">
        <?php echo _JGS_HITS; ?>:
      </div>
      <div class="jg_photo_right" id="jg_photo_hits">
        <?php echo $imgcounter; ?> 
      </div>
    </div>
<?php
    }
    if($jg_showdetailrating) {
      $ii++;
?>
    <div class="sectiontableentry<?php echo ($ii%2)+1; ?>">
      <div class="jg_photo_left">
        <?php echo _JGS_RATING; ?>:
      </div>
      <div class="jg_photo_right" id="jg_photo_rating">
        <?php echo $frating; ?> 
      </div>
    </div>
<?php
    }
    if($jg_showdetailfilesize) {
      $ii++;
?>
    <div class="sectiontableentry<?php echo ($ii%2)+1; ?>">
      <div class="jg_photo_left">
        <?php echo _JGS_FILESIZE; ?>:
      </div>
      <div class="jg_photo_right" id="jg_photo_filesize">
        <?php echo $fimgsize; ?> KB 
        (<?php echo $pxWidth; ?> x <?php echo $pxHeight; ?> px)
      </div>
    </div>
<?php
    }
    if($jg_showdetailauthor) {
      $ii++;
?>
    <div class="sectiontableentry<?php echo ($ii%2)+1; ?>">
      <div class="jg_photo_left">
        <?php echo _JGS_AUTHOR; ?>:
      </div>
      <div class="jg_photo_right" id="jg_photo_author">
<?php
      if($imgauthor != '') {
?>
        <?php echo $imgauthor; ?> 
<?php
      } else {
?>
		<?php echo getDisplayName($imgauthorid); ?>
<?php        
      }
?>
      </div>
    </div>
<?php
    }
    if(is_file(_JOOM_ABSOLUTE_PATH.$jg_pathoriginalimages.'/'.$catpath.$imgfilename) 
        && $jg_showoriginalfilesize==1 && (!$slideshow)) {
      $ii++;
?>
    <div class="sectiontableentry<?php echo ($ii%2)+1; ?>">
      <div class="jg_photo_left">
        <?php echo _JGS_FILESIZE_ORIGINAL; ?>:
      </div>
      <div class="jg_photo_right" id="jg_photo_filesize">
        <?php echo $foriginalimgsize; ?> 
        (<?php echo $pxorigWidth; ?> x <?php echo $pxorigHeight; ?> px)
      </div>
    </div>
<?php
    }
?>
    &nbsp;
    </p>
    </div>
  </div>
<?php
  }


  function Joom_ShowIcons_HTML($showZoomIcon, $showDownloadIcon, $showTagIcon, $showFavouritesIcon,
                               $fullLink){
    global $catpath, $catid, $imgfilename, $id, $gid, $my,
           $mosConfig_live_site;

?>
  <div class="jg_iconbar">
<?php
    // Fullview Icon
    if($showZoomIcon == 1){
?>
    <a href="<?php echo $fullLink;?>" onMouseOver="return overlib('<?php echo _JGS_FULLSIZE_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_FULLSIZE_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();">
    <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/zoom.png' ;?>" class="pngfile jg_icon" alt="<?php echo _JGS_FULLSIZE_TOOLTIP_CAPTION; ?>" /></a>
<?php
    } elseif($showZoomIcon == -1){
?>
    <span onMouseOver="return overlib('<?php echo _JGS_FULLSIZE_TOOLTIP_TEXT_LOGIN; ?>', CAPTION, '<?php echo _JGS_FULLSIZE_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/zoom_gr.png' ;?>" alt="<?php echo _JGS_FULLSIZE_TOOLTIP_CAPTION; ?>" class="pngfile jg_icon" />
    </span>
<?php
    }
    // Download Icon:
    if($showDownloadIcon == 1) {
?>
    <a href="<?php echo  $mosConfig_live_site; ?>/index.php?option=com_joomgallery&amp;func=download&amp;catid=<?php echo $catid; ?>&amp;id=<?php echo $id; ?><?php echo _JOOM_ITEMIDX; ?>"
      onMouseOver="return overlib('<?php echo _JGS_DOWNLOAD_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();">
    <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/download.png' ;?>" alt="<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>" class="pngfile jg_icon" /></a>
<?php
    } elseif($showDownloadIcon == -1){
?>
    <span onMouseOver="return overlib('<?php echo _JGS_DOWNLOAD_TOOLTIP_TEXT_LOGIN; ?>', CAPTION, '<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/download_gr.png' ;?>" alt="<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>"  class="pngfile jg_icon" />
    </span>
<?php
    }
    // name-tagging icons:
    if($showTagIcon == "save"){
?>
    <a href="javascript:joom_getcoordinates();" onMouseOver="return overlib('<?php echo _JGS_NAMESHIELD_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_NAMESHIELD_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" > 
    <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/tag_add.png' ;?>" alt="<?php echo _JGS_NAMESHIELD_TOOLTIP_CAPTION; ?>" class="pngfile jg_icon" /></a>
<?php
    } elseif($showTagIcon == "delete"){
?>
    <a href="javascript:if(confirm('<?php echo _JGS_ALERT_SURE_DELETE_NAMESHIELD_; ?>')){ location.href='<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=deletenameshield&amp;npicid=".$id."&amp;nuserid=".$my->id._JOOM_ITEMIDX);?>';}"
    onMouseOver="return overlib('<?php echo _JGS_NAMESHIELD_DELETE_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_NAMESHIELD_DELETE_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();">  
    <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/tag_delete.png' ;?>" alt="<?php echo _JGS_NAMESHIELD_DELETE_TOOLTIP_CAPTION; ?>" class="pngfile jg_icon" /></a>
<?
    } elseif($showTagIcon == "login"){
?>
    <span onMouseOver="return overlib('<?php echo _JGS_NAMESHIELD_UNREGISTERED_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_NAMESHIELD_UNREGISTERED_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/tag_add_gr.png' ;?>"  alt="<?php echo _JGS_NAMESHIELD_UNREGISTERED_TOOLTIP_CAPTION; ?>" class="pngfile jg_icon" />  
    </span>
<?php
    }
    // Favourites Icon:
    if($showFavouritesIcon == 1) {
?>
    <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=addpicture&id='.$id._JOOM_ITEMIDX); ?>"
        onMouseOver="return overlib('<?php echo _JGS_FAV_ADD_PICTURE_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_FAV_ADD_PICTURE_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();">
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/star.png' ;?>" alt="<?php echo _JGS_FAV_ADD_PICTURE_TOOLTIP_CAPTION; ?>" class="pngfile jg_icon" />
    </a>
<?php
    } elseif($showFavouritesIcon == -1) {
?>
    <span onMouseOver="return overlib('<?php echo _JGS_FAV_ADD_PICTURE_NOT_ALLOWED_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/star_gr.png' ;?>" alt="<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>"  class="pngfile jg_icon" />
    </span>
<?php
    } elseif($showFavouritesIcon == 2) {
?>
    <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=addpicture&id='.$id._JOOM_ITEMIDX); ?>"
        onMouseOver="return overlib('<?php echo _JGS_ZIP_ADD_PICTURE_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_ZIP_ADD_PICTURE_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/basket_put.png' ;?>" alt="<?php echo _JGS_ZIP_ADD_PICTURE_TOOLTIP_CAPTION; ?>"  class="pngfile jg_icon" />
    </a>
<?php
    } elseif($showFavouritesIcon == -2) {
?>
    <span onMouseOver="return overlib('<?php echo _JGS_ZIP_ADD_PICTURE_NOT_ALLOWED_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_ZIP_ADD_PICTURE_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/basket_put_gr.png' ;?>" alt="<?php echo _JGS_ZIP_ADD_PICTURE_TOOLTIP_CAPTION; ?>"  class="pngfile jg_icon" />
    </span>
<?php
    }
?>
  </div>
<?php
  }


  function Joom_ShowSlideshow_HTML() {
    global $slideshow, $id, $catid;
?>
  <form name="jg_slideshow_form" target="_top" method="post" action="">
  <input type="hidden" name="jg_number" value="<?php echo $id;?>" readonly="readonly" />
<?php
  if(!$slideshow) {
?>
  <input type="hidden" name="jg_slideshow" value="true" readonly="readonly" />
<?php
  }
?>
  </form>
<?php
    if($slideshow) {
?>
  <script language = "javascript" type = "text/javascript">
    if(document.getElementById("jg_photo_big").style.filter=="") {
      photo.filter = true;
 }
    photo.start();
  </script>
<?php
    } else {
?>
  <script language = "javascript" type = "text/javascript">
    function joom_startslideshow() {
      document.jg_slideshow_form.submit();
    }
  </script>
<?php
    }
  }


  //TODO AH:
  function Joom_ShowBBCodeLink_HTML($pic_src, $img=1, $url=1){
    global $id, $jg_showdetailaccordion;

    $pic_addr = sefRelToAbs("index.php?option=com_joomgallery&amp;func=detail&amp;id=$id"._JOOM_ITEMIDX)."#joomimg";
    $line = 0;
?>
<div class="jg_bbcode">
  <div class="sectiontableheader">
    <h4 <?php echo $jg_showdetailaccordion?"class=\"joomgallery-toggler\"":"class=\"joomgallery-notoggler\""; ?>>
    <?php echo _JGS_BBCODE_SHARE; ?> 
  </h4>
  </div>
  <div <?php echo $jg_showdetailaccordion?"class=\"joomgallery-slider\"":""; ?>>
    <p>

<?php
    if($img){
      $line++;
?>
      <div class="sectiontableentry<?php echo $line; ?>">
        <div class="jg_bbcode_left">
          <?php echo _JGS_BBCODE_IMG; ?>:
        </div>
        <div class="jg_bbcode_right">
          <input class="inputbox jg_img_BB_box" size="50" value="[IMG]<?php echo $pic_src; ?>[/IMG]" readonly="readonly" onClick="select()" type="text"> 
        </div>
      </div>
<?php
    }
     
    if($url){
      $line++;
?>
      <div class="sectiontableentry<?php echo $line; ?>">
        <div class="jg_bbcode_left">
          <?php echo  _JGS_BBCODE_LINK; ?>:
        </div>
        <div class="jg_bbcode_right">
          <input class="inputbox jg_img_BB_box" size="50" value="[URL]<?php echo $pic_addr; ?>[/URL]" readonly="readonly" onClick="select()" type="text">
        </div>
      </div>
<?php
    }
?>
      &nbsp;
    </p>
  </div>
</div>
<?php
  }


  function Joom_ShowVotingArea_HTML($id) {
    global $jg_maxvoting, $checked, $my, $imgownerid, $jg_onlyreguservotes, $gid,
           $jg_showdetailaccordion;
?>
<div class="jg_voting">
  <div class="sectiontableheader">
    <h4 <?php echo $jg_showdetailaccordion?"class=\"joomgallery-toggler\"":"class=\"joomgallery-notoggler\""; ?>>
    <?php echo _JGS_PICTURE_RATING; ?> 
  </h4>
  </div>
  <div <?php echo $jg_showdetailaccordion?"class=\"joomgallery-slider\"":""; ?>>
    <div class="sectiontableentry1">
<?php
    if($jg_onlyreguservotes && $gid == 0){
?>
      <?php echo _JGS_LOGIN_FIRST; ?> 
<?php
    } elseif($jg_onlyreguservotes && $imgownerid == $my->id){
?>
      <?php echo _JGS_NO_RATING_ON_OWN_PICTURES; ?> 
<?php
    } else{ // all OK, display voting now
      $Itemid = '';
      $Itemid_array = explode('=',_JOOM_ITEMID);
      if(isset($Itemid_array[1])) $Itemid = $Itemid_array[1];
?>
      <form name="ratingform" action="index.php" target="_top" method="post">
      <input type="hidden" name="option" value="com_joomgallery" />
      <input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />
      <input type="hidden" name="func" value="votepic" />
      <input type="hidden" name="id" value="<?php echo $id; ?>" />
      <p>
      1 (<?php echo _JGS_BAD; ?>) 
<?php
  $selitem=floor( $jg_maxvoting / 2 ) + 1;
  for($i=1; $i <= $jg_maxvoting; $i++) {
    if($i == $selitem) {
      $checked = 'checked="checked"';
    } else {
      $checked = "";
    }
?>
        <input type="radio" value="<?php echo $i; ?>" name="imgvote" <?php echo $checked; ?> />
<?php
  }
    $i--;
?>
        <?php echo $i; ?> (<?php echo _JGS_GOOD; ?>)
      </p>
      <p>
        <input class="button" type="submit" value="<?php echo _JGS_VOTE; ?>" name="<?php echo _JGS_VOTE; ?>" />
      </p>
      </form>
<?php
    }
?>
    </div>
  </div>
</div>
<?php
  }


  function Joom_ShowCommentsHead_HTML() {
    global $jg_showdetailaccordion;
?>
<div class="jg_commentsarea">
  <div class="sectiontableheader">
    <h4 <?php echo $jg_showdetailaccordion?"class=\"joomgallery-toggler\"":"class=\"joomgallery-notoggler\""; ?>>
    <?php echo _JGS_EXISTING_COMMENTS; ?> 
  </h4>
  </div>
  <div <?php echo $jg_showdetailaccordion?"class=\"joomgallery-slider\"":""; ?>>
    <table width="100%" border="0px" cellspacing="0px" cellpadding="0px">
<?php
  }


  function Joom_ShowCommentsEnd_HTML() {
?>
    </table>
  </div>
</div>
<?php
  }


  function Joom_ShowCommentsArea_HTML($allowcomment) {
    global $database, $id, $my, $jg_smiliescolor,
           $jg_bbcodesupport, $linecolor, $is_editor, $jg_showcommentsarea, 
           $jg_dateformat, $mosConfig_live_site, $jg_smiliesupport, $smiley,
           $jg_showcommentsunreg;
?>
      <a name="joomcomments"></a>
<?php 
    if ($my->username || (!$my->username && $jg_showcommentsunreg == 0)) {
      if($jg_showcommentsarea == 1) {
        $order = "DESC";
      } else {
        $order = "ASC";
      }
      $query = "SELECT cm.*
          FROM #__joomgallery_comments as cm
          WHERE cm.cmtpic = '$id' AND cm.published = '1' AND cm.approved = '1'
          ORDER BY cmtid $order"; 
      $database->setQuery($query);
      $result1=$database->LoadObjectList();
      $count=count($result1);
      if( $count > 0 ) {
?>
      <tr class="sectiontableheader">
        <td class="jg_cmtl">
          <?php echo _JGS_AUTHOR; ?> 
        </td> 
        <td class="jg_cmtr">
          <?php echo _JGS_COMMENT; ?> 
        </td>
      </tr>
<?php
        foreach($result1 as $row1) {
          $linecolor=($linecolor % 2) + 1;
?>
      <tr class="<?php echo "sectiontableentry".$linecolor; ?>">
        <td class="jg_cmtl">
<?php
        if ($row1->userid > 0) {
?>
      <?php echo getDisplayName($row1->userid, false); ?> 
<?php
      } else if ($row1->cmtname == constant("_JGS_GUEST")) {
?>
      <?php echo $row1->cmtname; ?> 
<?php
        } else {
?>
      <?php echo $row1->cmtname.' ('._JGS_GUEST.') '; ?> 
<?php
        }

        if($is_editor) {
?>
          <div class="jg_cmticons">
            <a href="http://openrbl.org/query?i=<?php echo $row1->cmtip;?>">
              <img src="<?php echo $mosConfig_live_site; ?>/components/com_joomgallery/assets/images/ip.gif" alt="<?php echo $row1->cmtip; ?>" title="<?php echo $row1->cmtip; ?>" hspace="3" border="0" />
            </a>
            <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=deletecomment&amp;cmtid=$row1->cmtid"._JOOM_ITEMIDX); ?>">
              <img src="<?php echo $mosConfig_live_site; ?>/components/com_joomgallery/assets/images/del.gif" alt="<?php echo _JGS_DELETE_COMMENT; ?>" hspace="3" border="0" />
            </a>
        </div>
<?php
        }
?>
      </td>
<?php
        $signtime=strftime("$jg_dateformat", $row1->cmtdate);
        $origtext=$row1->cmttext;
        $origtext = Joom_ProcessText($origtext);
        if( $jg_bbcodesupport )
          $origtext=Joom_BBDecode($origtext);
        if($jg_smiliesupport) {
          foreach($smiley as $i=>$sm) {
            $origtext = str_replace ("$i", "<img src='$mosConfig_live_site/components/com_joomgallery/assets/images/smilies/$jg_smiliescolor/$sm' border='0' alt='$i' title='$i' />", $origtext);
          }
        }
?>
      <td class="jg_cmtr">
        <span class="small">
          <?php echo _JGS_COMMENT_ADDED; ?>: <?php echo $signtime; ?> 
          <hr/>
        </span>
        <?php echo stripslashes($origtext); ?> 
      </td>
    </tr>
<?php
        }
      } else {
?>
      <tr class="<?php echo "sectiontableentry".$linecolor; ?>">
        <td colspan="2" class="jg_cmtf"> 
          <p>
          <?php echo _JGS_NO_EXISTING_COMMENTS; ?> 
<?php
        if ($allowcomment==1) {
?>
          <?php echo ' ' . _JGS_WRITE_FIRST_COMMENT; ?> 
<?php
        }
?>
          </p>
        </td>
      </tr>
<?php
      }
    } else {
?>
      <tr class="<?php echo "sectiontableentry".$linecolor; ?>">
        <td colspan="2" class="jg_cmtf"> 
          <p>
          <?php echo _JGS_NO_COMMENTS_FOR_UNREG; ?> 
          </p>
        </td>
      </tr>
<?php
    }
  }


  function Joom_BuildCommentsForm_HTML($allowcomment){
    global $database, $gid, $my, $jg_bbcodesupport, $id, $jg_secimages, 
           $cmttext, $linecolor, $jg_showcommentsarea, $mosConfig_live_site, 
           $jg_smiliesupport, $smiley, $jg_namedanoncomment, $jg_smiliescolor;
          
  if (!$allowcomment) {
?>    
        <tr class="sectiontableentry1">
          <td class="jg_cmtf" colspan="2">
            <?php echo _JGS_NO_COMMENTS_BY_GUEST; ?>
          </td>
        </tr>
<?php     
    return;
  }
           
           
  if($jg_secimages==2 || ($jg_secimages==1 && $my->gid <1)) {
    if(file_exists(_JOOM_ABSOLUTE_PATH . '/components/com_easycaptcha/class.easycaptcha.php')) {
      include_once(_JOOM_ABSOLUTE_PATH . '/components/com_easycaptcha/class.easycaptcha.php');
      $captcha = new easyCaptcha();
    } else {
      $jg_secimages = 0;
    }
  }
?>
      <a name="joomcommentform"></a>
<?php
    $bbcodestatus=array(_JGS_BBCODE_OFF, _JGS_BBCODE_ON);
    if(isset($_COOKIE['sessioncookie']) && $_COOKIE['sessioncookie'] != '' ) {
      $cryptSessionID = md5($_COOKIE['sessioncookie']);
      $database->setQuery("SELECT username
          FROM #__session
          WHERE session_ID='$cryptSessionID'");
      $cmtname = $database->LoadResult();
      //$cmtname = $result2->cmtname;
    }
    $Itemid = '';
    $Itemid_array = explode('=',_JOOM_ITEMID);
    if(isset($Itemid_array[1])) $Itemid = $Itemid_array[1];
?>
        <form name="commentform" action="index.php" target="_top" method="post">
        <input type="hidden" name="option" value="com_joomgallery" />
        <input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />
        <input type="hidden" name="func" value="commentpic" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
<?php
      if($jg_secimages==2 || ($jg_secimages==1 && $my->gid <1)) {
?>
        <input type="hidden" name="jg_captcha_id" value="<?php echo $captcha->getCaptchaId();?>" />
<?php
      }
      if(!$my->username) {
        $ip = $_SERVER['REMOTE_ADDR'];
?>
        <input type="hidden" name="cmtip" value="<?php echo $ip; ?>" />
<?php
     }
     $linecolor=($linecolor % 2) + 1;
?>
        <tr class="sectiontableentry1">
          <td class="jg_cmtl">
            <?php echo $my->username; ?> 
<?php
      if($gid < 1) {
        if($jg_namedanoncomment) {
?>
            <input type="text" class="inputbox" name="cmtname" value="<?php echo _JGS_GUEST; ?>" />
<?php
        } else {
?>
            <input type="hidden" class="inputbox" name="cmtname" value="<?php echo _JGS_GUEST; ?>" />
<?php
        }
      } else {
?>
            <input type="hidden" class="inputbox" name="cmtname" value="<?php echo $my->username; ?>" />
<?php
      }
      if($jg_smiliesupport) {
?>
            <div style="padding:0.4em 0;">
<?php
        $count=1;
        foreach($smiley as $i=>$sm) {
?>
              <a href="javascript:joom_smilie('<?php echo $i; ?>')" title="<?php echo $i; ?>">
              <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/smilies/'. $jg_smiliescolor . '/' . $sm ; ?>" border="0" alt="<?php echo $sm; ?>" /></a>
<?php
          if($count%4 == 0) {
?>
              <br />
<?php
          }
          $count++;
        }
?>
            </div>
<?php
      }
?>
            <p class="small">
              <?php echo _JGS_BBCODE_IS; ?> <b>
              <?php echo $bbcodestatus[$jg_bbcodesupport]; ?></b>.
            </p>
          </td>
          <td class="jg_cmtr">
<?php
      if($jg_smiliesupport) {
        $rows = "8";
      } else {
        $rows = "4";
      }
?>
            <p>
            <textarea cols="40" rows="<?php echo $rows; ?>" name="cmttext" class="inputbox" onfocus="jg_comment_active=1" onchange="jg_comment_active=0" onblur="jg_comment_active=0"></textarea>
            </p>
          </td>
        </tr>
<?php
      if($jg_secimages==2 || ($jg_secimages==1 && $my->gid <1)) {
?>
        <tr class="sectiontableentry1">
          <td class="jg_cmtl">
            &nbsp;
          </td>
          <td class="jg_cmtr">
            <img src="<?php echo $captcha->getImageUrl(); ?>" alt="<?php echo $captcha->getAltText(); ?>" border="0" id="jg_captcha_image" />
          </td>
        </tr>
        <tr class="sectiontableentry1">
          <td class="jg_cmtl">
            <?php echo _JGS_ENTER_CODE; ?> 
          </td>
          <td class="jg_cmtr">
            <input class="inputbox" type='text' value="" name='jg_code' /> 
            <?php echo $captcha->getReloadButton("jg_captcha_image");?> 
            <?php echo $captcha->getReloadCode();?> 
          </td>
        </tr>
<?php
      }
?>
        <tr class="sectiontableentry1">
          <td class="jg_cmtl">
          </td>
          <td class="jg_cmtr">
            <p>
              <input type="button" name="send" value="<?php echo _JGS_COMMENT_SEND; ?>" class="button" onclick="joom_validatecomment()" /> 
              &nbsp;
              <input type="reset" value="<?php echo _JGS_DELETE; ?>" name="reset" class="button" /> 
            </p>
          </td>
        </tr>
        </form>
<?php
  }


  function Joom_ShowSend2FriendArea_HTML() {
    global $my, $id, $database, $jg_showdetailaccordion;
?>
<div class="jg_send2friend">
  <div class="sectiontableheader">
    <h4 <?php echo $jg_showdetailaccordion?"class=\"joomgallery-toggler\"":"class=\"joomgallery-notoggler\""; ?>>
    <?php echo _JGS_SEND_TO_FRIEND; ?> 
  </h4>
  </div>
  <div <?php echo $jg_showdetailaccordion?"class=\"joomgallery-slider\"":""; ?>>
    <p>

<?php

    if($my->username) {
      $sql = $database->setQuery( "SELECT name,email
          FROM #__users
          WHERE username='$my->username'" );
      $s2y = $database->loadObjectList();
      $Itemid = '';
      $Itemid_array = explode('=',_JOOM_ITEMID);
      if(isset($Itemid_array[1])) $Itemid = $Itemid_array[1];
?>
    <form name="send2friend" action="index.php" target=_top method="post">
    <input type="hidden" name="option" value="com_joomgallery" />
    <input type="hidden" name="func" value="send2friend" />
    <input type="hidden" name="from2friendname" value="<?php echo $s2y[0]->name; ?>" />
    <input type="hidden" name="from2friendemail" value="<?php echo $s2y[0]->email; ?>" />
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />

    <table width="100%" width="100%" border="0px" cellspacing="0px" cellpadding="0px">
      <tr class="sectiontableentry1">
        <td class="jg_s2fl">
          <?php echo _JGS_YOUR_NAME; ?>:
        </td>
        <td class="jg_s2fr">
          <?php echo $s2y[0]->name; ?> 
        </td>
      </tr>
      <tr class="sectiontableentry2">
        <td class="jg_s2fl">
          <?php echo _JGS_YOUR_MAIL; ?>: 
        </td>
        <td class="jg_s2fr">
          <?php echo $s2y[0]->email; ?>
        </td>
      </tr>
      <tr class="sectiontableentry1">
        <td class="jg_s2fl">
          <?php echo _JGS_FRIENDS_NAME; ?>:
        </td>
        <td class="jg_s2fr">
          <input type="text" name="send2friendname" size="15" class="inputbox" onfocus="jg_comment_active=1" onreset="jg_comment_active=0" onchange="jg_comment_active=0" onblur="jg_comment_active=0" />
        </td>
      </tr>
      <tr class="sectiontableentry2">
        <td class="jg_s2fl">
          <?php echo _JGS_FRIENDS_MAIL; ?>:
        </td>
        <td class="jg_s2fr">
          <input type="text" name="send2friendemail" size="15" class="inputbox" onfocus="jg_comment_active=1" onreset="jg_comment_active=0" onchange="jg_comment_active=0" onblur="jg_comment_active=0" />
        </td>
      </tr>
      <tr class="sectiontableentry1">
        <td class="jg_s2fl">
          &nbsp;
        </td>
        <td class="jg_s2fr">
          <p>
          <input type="button" name="send" value="<?php echo _JGS_EMAILSEND; ?>" class="button" onclick="joom_validatesend2friend()" />&nbsp;
          </p>
        </td>
      </tr>
    </table>
    </form>
<?php
    } else {
?>
    <div class="sectiontableentry1">
      <?php echo _JGS_LOGIN_FIRST; ?> 
    </div>
<?php
    }
?>
  </p>
  </div>
</div>
<?php
  }

}
?>
