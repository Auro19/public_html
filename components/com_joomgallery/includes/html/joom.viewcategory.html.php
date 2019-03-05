<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/html/joom.viewcategory.html.php $
// $Id: joom.viewcategory.html.php 396 2009-03-15 16:06:21Z aha $
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


class HTML_Joom_Category {

  function Joom_ShowCategoryHead_HTML(&$catname, &$colum, &$count, &$catid,$order_by,&$order_dir) {
    global  $jg_showcathead, $database,$jg_showcatdescriptionincat,
            $jg_usercatorder,$jg_showrating, $jg_usercatorderlist,
            $mosConfig_live_site;

    if ( $count == 0 ) {
      echo '';
    } else {
?>
  <div class="jg_category">
<?php
      if ( $jg_showcathead ) {
?>
    <div class="sectiontableheader">
      <?php echo $catname; ?> 
    </div>
<?php
      }
      if ($jg_showcatdescriptionincat == 1) {
          $database->setQuery("SELECT cid,description
              FROM #__joomgallery_catg
              WHERE cid = '$catid'");
           $database->loadObject($catdescobj);
           $catdescription = $catdescobj->description;
?>
    <div class="jg_catdescr">
      <?php echo $catdescription; ?> 
    </div>
<?php
      }
      if ($jg_usercatorder) {
        $jg_usercatorderlist = explode (',', $jg_usercatorderlist);
        
        //if navigation active insert actual startpage and substartpage
        if (!empty($this->catstartpage)){
          if (!empty($this->substartpage)){
            $sortURL=sefRelToAbs("index.php?option=com_joomgallery&func=viewcategory&catid=".$catid."&startpage=".$this->catstartpage."&substartpage=".$this->substartpage)."#category";            
          } else {
            $sortURL=sefRelToAbs("index.php?option=com_joomgallery&func=viewcategory&catid=".$catid."&startpage=".$this->catstartpage)."#category";            
          }
        } else {
          $sortURL=sefRelToAbs("index.php?option=com_joomgallery&func=viewcategory&catid=".$catid)."#category";          
        }
?>
    <div style="white-space:nowrap;" align="right">
      <form action="<?php echo $sortURL;?>" method="POST">
        <?php echo _JGS_USER_ORDERBY; ?> 
        <select name="orderby" onchange='this.form.submit()' class="inputbox">
          <option value="default"><?php echo _JGS_USER_ORDERBY_DEFAULT; ?></option>
<?php
         if(in_array("date",$jg_usercatorderlist)) {
?>
          <option <?php if ($order_by == "date") echo "selected"; ?> value="date"><?php echo _JGS_USER_ORDERBY_DATE; ?></option>
<?php
         }
         if(in_array("user",$jg_usercatorderlist)) {
?>
          <option <?php if ($order_by == "user") echo "selected"; ?> value="user"><?php echo _JGS_USER_ORDERBY_AUTHOR; ?></option>
<?php
         }
         if(in_array("title",$jg_usercatorderlist)) {
?>
          <option <?php if ($order_by == "title") echo "selected"; ?> value="title"><?php echo _JGS_USER_ORDERBY_TITLE; ?></option>
<?php
         }
         if(in_array("hits",$jg_usercatorderlist)) {
?>
          <option <?php if ($order_by == "hits") echo "selected"; ?> value="hits"><?php echo _JGS_USER_ORDERBY_HITS; ?></option>
<?php
         }
         if(in_array("rating",$jg_usercatorderlist)) {
?>
          <option <?php if ($order_by == "rating") echo "selected"; ?> value="rating"><?php echo _JGS_USER_ORDERBY_RATING; ?></option>
<?php
         }
?>
        </select>
<?php
          if ($order_by != "title" && $order_by != "hits" && $order_by != "date" && $order_by != "user" && $order_by != "rating" ) {
?>
        <select<?php echo " disabled=\"true\""; ?> name="orderdir" onchange='this.form.submit()' class="inputbox">
<?php
          } else {
?>
        <select name="orderdir" onchange='this.form.submit()' class="inputbox">
<?php
          }
?>
          <option <?php if ($order_dir == "asc") echo "selected" ?> value="asc"><?php echo _JGS_USER_ORDERBY_ASC; ?></option>
          <option <?php if ($order_dir == "desc") echo "selected" ?> value="desc"><?php echo _JGS_USER_ORDERBY_DESC; ?></option>
        </select>
      </form>
    </div>
<?php
      }
?>
  </div>
<?php
    }
  }


  function Joom_ShowCategoryBody_HTML(&$rows, &$rowcounter, &$colum ,$order_by,&$order_dir) {
    global $thumbnailpath, $jg_showtitle, $jg_showhits,$jg_showauthor,
           $jg_showowner, $jg_showcatrate, $jg_showcatcom, $database, 
           $mosConfig_live_site, $jg_pathimages, $jg_pathoriginalimages, $picturepath,
           $jg_detailpic_open, $jg_showpicasnew,$jg_watermark, $orig, $id,
           $jg_showdetailpage, $my, $jg_showcatdescription,$jg_daysnew, $jg_showcathead,
           $jg_downloadfile, $jg_showcategorydownload, $jg_favourites, $jg_showcategoryfavourite,
           $jg_showdetailfavourite, $jg_usefavouritesforpubliczip, $jg_usefavouritesforzip,
           $jg_favouritesshownotauth,$jg_cooliris,$jg_coolirislink;
          
    //wenn jg_cooliris = true, dann zusaetzlich XML im head aufbauen
    if ($jg_cooliris && count($rows)>0){
      $headtext='<link id="joomgallery" rel="alternate" type="application/rss+xml" title="Cooliris" href="'
                 . $mosConfig_live_site."/index.php?option=com_joomgallery&func=viewcategory&catid=".$this->catid 
                 ."&startpage=".$this->catstartpage."&Itemid=53&cooliris=1" .'" />';       
      global $mainframe;
      $mainframe->addCustomHeadTag($headtext);

      if ($jg_coolirislink ) {
        $mainframe->addCustomHeadTag("<script language=\"javascript\" type=\"text/javascript\" src=\"http://lite.piclens.com/current/piclens.js\"></script>");
        echo '<a id="jg_cooliris" href="javascript:PicLensLite.start({feedUrl:\''.$mosConfig_live_site.'/index.php?option=com_joomgallery&func=viewcategory&catid='.$this->catid
          .'&startpage='.$this->catstartpage._JOOM_ITEMID.'&cooliris=1\'});">'._JGS_COOLIRISLINK_TEXT.'</a>';     
      }
    }     
    if (!$jg_showtitle &&
      !$jg_showhits &&
      !$jg_showauthor &&
      !$jg_showowner &&
      !$jg_showcatrate &&
      !$jg_showcatcom &&
      !$jg_showcatdescription ){
      $show_text = false;
    } else {
      $show_text = true;
    }
    $num_rows = ceil(count($rows ) / $colum );
    $index=0;
    $count_pics=count($rows);

?>
  <a name="category"></a>
<?php
    if ($count_pics > 0 ) {
      for ( $row_count=0; $row_count < $num_rows; $row_count++ ) {
        $linecolor=(($row_count+1) % 2) + 1;
?>
  <div class="jg_row <?php if ($linecolor == 1) echo "sectiontableentry1"; else echo "sectiontableentry2";?>">
<?php
        for ($col_count = 0; ($col_count < $colum) && ($index < $count_pics); $col_count++) {
          $ii = 1;
          $row1=$rows[$index];
          if ($jg_showpicasnew) {
            $isnew = Joom_CheckNew($row1->imgdate, $jg_daysnew);
          }
          $catpath = Joom_GetCatPath($row1->cid);
          if ( ( $jg_showdetailpage==0 && $my->gid!=0 ) || $jg_showdetailpage==1 ) {
            $link = Joom_OpenImage($jg_detailpic_open, $row1->id, $catpath, $row1->imgfilename, $row1->imgtitle, $row1->imgtext);
          } else {
            $link = "javascript:alert('"._JGS_ALERT_NO_DETAILVIEW_FOR_GUESTS."')";
          }
?>
    <div class="jg_element_cat">
      <a href="<?php echo $link; ?>" class="jg_catelem_photo">
        <img src="<?php echo $thumbnailpath.$catpath.$row1->imgthumbname; ?>" class="jg_photo" alt="<?php echo $row1->imgtitle; ?>" />
      </a>
<?php
         if ($show_text){
?>
      <div class="jg_catelem_txt">
        <ul>
<?php
              if ( $jg_showtitle || $jg_showpicasnew) {
?>
          <li>
<?php
                if ($jg_showtitle){ 
?>
            <b><?php echo $row1->imgtitle; ?></b>
<?php
                }
                if ($jg_showpicasnew) {
                  echo $isnew."\n"; 
                }
?>
          </li>
<?php
              }
              if ( $jg_showauthor ) {
                if ($row1->imgauthor) {
                  $authorowner = $row1->imgauthor;
                } elseif ($jg_showowner) {
                  $authorowner = getDisplayName($row1->owner);
                } else {
                  $authorowner = _JGS_NO_DATA;
                }
?>
          <li>
            <?php echo _JGS_AUTHOR . ": ".$authorowner; ?> 
          </li>
<?php
              }
              if ( $jg_showhits ) {
?>
          <li>
            <?php echo _JGS_HITS . ": " . $row1->imgcounter; ?> 
          </li>
<?php
              }
              if ( $jg_showcatrate ) {
                if ( $row1->imgvotes > 0 ) {
                  $fimgvotesum = number_format($row1->imgvotesum / $row1->imgvotes, 2, ',', '.');
                  if ($row1->imgvotes == 1) {
                    $frating = "$fimgvotesum ($row1->imgvotes " .  _JGS_ONE_VOTE . ')';
                  } else {
                  $frating = "$fimgvotesum ($row1->imgvotes " .  _JGS_VOTES . ')';
                  }
                } else {
                  $frating=_JGS_NO_VOTES;
                }
?>
          <li>
            <?php echo _JGS_RATING . ": " . $frating; ?> 
          </li>
<?php
              }
              if ( $jg_showcatcom ) {
                # Check how many comments exist
                $database->setQuery("SELECT count(cmtid)
                    FROM #__joomgallery_comments
                    WHERE cmtpic='$row1->id' AND published ='1' AND approved = '1'");
                $comments = $database->LoadResult();
?>
          <li>
            <?php echo _JGS_COMMENTS . ": " . $comments; ?> 
          </li>
<?php
              }
              if ( $jg_showcatdescription == 1  && $row1->imgtext ) {
?>
          <li>
            <?php echo _JGS_DESCRIPTION . ": " . $row1->imgtext; ?> 
          </li>
<?php
              }
              $li_tag_set = false;
              if((is_file(_JOOM_ABSOLUTE_PATH.$jg_pathoriginalimages.'/'.$catpath.$row1->imgfilename) 
                  || $jg_downloadfile!=1)){
                if((($jg_showcategorydownload == 1) && ($my->gid >= 1)) 
                    || (($jg_showcategorydownload == 2) && ($my->gid == 2)) 
                    || (($jg_showcategorydownload == 3))) {
?>
          <li>
            <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=download&amp;catid='.$row1->catid.'&amp;id='.$row1->id._JOOM_ITEMIDX); ?>"
                onMouseOver="return overlib('<?php echo _JGS_DOWNLOAD_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();">
              <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/download.png' ;?>" alt="<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>" class="pngfile jg_icon" />
            </a>
<?php
                  $li_tag_set = true;
                } elseif(($jg_showcategorydownload == 1) && ($user->gid < 1)){
?>
          <li>
            <span onMouseOver="return overlib('<?php echo _JGS_DOWNLOAD_TOOLTIP_TEXT_LOGIN; ?>', CAPTION, '<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
              <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/download_gr.png' ;?>" alt="<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>"  class="pngfile jg_icon" />
            </span>
<?php
                  $li_tag_set = true;
                }
              }
              if($jg_favourites == 1 && $jg_showcategoryfavourite) {
                if((($jg_showdetailfavourite == 0) && ($my->gid >= 1))
                    || (($jg_showdetailfavourite == 1) && ($my->gid == 2))
                    || ((defined('_JEXEC') && $jg_usefavouritesforpubliczip == 1) && ($my->gid < 1))) {
                  if($jg_usefavouritesforzip == 1
                      || ((defined('_JEXEC') && $jg_usefavouritesforpubliczip == 1) && ($my->gid < 1))) {
                    if(!$li_tag_set) {
                      $li_tag_set = true;
?>
          <li>
<?php
                    }
?>
            <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=addpicture&amp;id='.$row1->id.'&amp;catid='.$row1->catid._JOOM_ITEMIDX); ?>"
                onMouseOver="return overlib('<?php echo _JGS_ZIP_ADD_PICTURE_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_ZIP_ADD_PICTURE_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
              <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/basket_put.png' ;?>" alt="<?php echo _JGS_ZIP_ADD_PICTURE_TOOLTIP_CAPTION; ?>"  class="pngfile jg_icon" />
            </a>
<?php
                  } else {
                    if(!$li_tag_set) {
                      $li_tag_set = true;
?>
          <li>
<?php
                    }
?>
            <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=addpicture&amp;id='.$row1->id.'&amp;catid='.$row1->catid._JOOM_ITEMIDX); ?>"
                onMouseOver="return overlib('<?php echo _JGS_FAV_ADD_PICTURE_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_FAV_ADD_PICTURE_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();">
              <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/star.png' ;?>" alt="<?php echo _JGS_FAV_ADD_PICTURE_TOOLTIP_CAPTION; ?>" class="pngfile jg_icon" />
            </a>
<?php
                  }
                } elseif(($jg_favouritesshownotauth == 1)){
                  if($jg_usefavouritesforzip == 1) {
                    if(!$li_tag_set) {
                      $li_tag_set = true;
?>
          <li>
<?php
                    }
?>
            <span onMouseOver="return overlib('<?php echo _JGS_ZIP_ADD_PICTURE_NOT_ALLOWED_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_ZIP_ADD_PICTURE_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
              <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/basket_put_gr.png' ;?>" alt="<?php echo _JGS_ZIP_ADD_PICTURE_TOOLTIP_CAPTION; ?>"  class="pngfile jg_icon" />
            </span>
<?php
                  } else {
                    if(!$li_tag_set) {
                      $li_tag_set = true;
?>
          <li>
<?php
                    }
?>
            <span onMouseOver="return overlib('<?php echo _JGS_FAV_ADD_PICTURE_NOT_ALLOWED_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_FAV_ADD_PICTURE_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
              <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/star_gr.png' ;?>" alt="<?php echo _JGS_FAV_ADD_PICTURE_TOOLTIP_CAPTION; ?>"  class="pngfile jg_icon" />
            </span>
<?php
                  }
                }
              }
              if($li_tag_set) {
?>
          </li>
<?php
              }
?>
        </ul>
      </div>
<?php
          }
?>
    </div>
<?php
          $index++;
        } // for loop over cols in row
?>
  </div>
<?php
          $ii++;
      } // for loop over rows
      if ( $jg_showcathead ) {
?>
    <div class="sectiontableheader">
      &nbsp; 
    </div>
<?php
      }
    } // if count($pics) > 0
?>
<?php
  } // end of function


  function Joom_ShowSubCategories_HTML(&$rows) {
    global $mosConfig_live_site,$database,$my,$mainframe,$gid,$thumbnailpath,$jg_paththumbs,$jg_rmsm,
           $jg_showrandomsubthumb,$jg_colsubcat,$jg_showsubcathead,$jg_subcatthumbalign,
           $jg_showcatasnew,$jg_showsubthumbs, $jg_showtotalsubcathits,$jg_cooliris;

    $pic_count = count($rows);
    $num_rows = ceil($pic_count / $jg_colsubcat );
    $index=0;
?>
  <div class="jg_subcat">
<?php
    if ( $jg_showsubcathead ) {
?>
    <div class="sectiontableheader">
    <?php echo _JGS_SUBCATEGORIES; ?>
    </div>
<?php
    }
?>
  </div>
<?php

    //Ausrichtung entsprechend der globalen Vorgabe
    switch ($jg_subcatthumbalign) {
      case 1:
        $img_position = 'left';
        break;
      case 2:
        $img_position = 'right';
        break;
      case 3:
        $img_position = 'middle';
        break;
    }
    for ( $row_count=0; $row_count < $num_rows; $row_count++ ) {
      $linecolor=(($row_count+1) % 2) + 1;
?>
    <div class="jg_row <?php if ($linecolor == 1) echo "sectiontableentry1"; else echo "sectiontableentry2";?>">
<?php
      for ($col_count = 0; ($col_count < $jg_colsubcat) && ($index < $pic_count); $col_count++) {                       
        $cur_name=$rows[$index];
        
        if ($jg_showcatasnew) {
          $isnew = Joom_CheckNewCatg( $cur_name->cid );
        } else {
          $isnew = "";
        }
        $catpath = $cur_name->catpath.'/';
?>
      <div class="jg_subcatelem_cat">
<?php
        if ( $cur_name != NULL ) {
          if ($jg_showsubthumbs != 0 ){
?>
        <div class="jg_subcatelem_photo">
<?php
          }
          if ( $jg_showsubthumbs == 1 ) {
            if ( $gid >= $cur_name->access && $cur_name->catimage != '' ) {
?>
            <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$cur_name->cid"._JOOM_ITEMIDX); ?>">
              <img src="<?php echo $thumbnailpath.$catpath.$cur_name->catimage; ?>"  align="<?php echo $img_position; ?>" hspace="4" vspace="0" class="jg_photo" alt="<?php echo $cur_name->name; ?>" />
            </a>
<?php
            }
?>
        </div>
        <div class="jg_subcatelem_txt">
            <img src="<?php echo $mosConfig_live_site . '/images/M_images/arrow.png';?>" alt="arrow" />
<?php
            if ( $gid >= $cur_name->access ) {
?>
              <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$cur_name->cid"._JOOM_ITEMIDX); ?>">
                <?php echo $cur_name->name; ?>
              </a>
<?php
            } else {
?>
              <span class="jg_no_access" onMouseOver="return overlib('<?php echo _JGS_ALERT_YOU_NOT_ACCESS_THIS_DIRECTORY; ?>', CAPTION, '<?php echo $cur_name->name; ?>', BELOW, RIGHT);" onmouseout="return nd();">
                <?php echo $cur_name->name; ?>
              </span>
<?php
            }
?>
              (<?php echo Joom_GetNumberOfLinks( $cur_name->cid ); ?>)
              <?php echo $isnew; ?>
<?php
          }
          if ( $jg_showsubthumbs == 0 ) {
?>
          <div class="jg_subcatelem_txt">
            <ul>
              <li>
                <img src="<?php echo $mosConfig_live_site . '/images/M_images/arrow.png';?>" alt="arrow" />
<?php
            if ( $gid >= $cur_name->access ) {
?>
              <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$cur_name->cid"._JOOM_ITEMIDX); ?>">
                <?php echo $cur_name->name; ?>
              </a>
<?php
            } else {
?>
              <span class="jg_no_access" onMouseOver="return overlib('<?php echo _JGS_ALERT_YOU_NOT_ACCESS_THIS_DIRECTORY; ?>', CAPTION, '<?php echo $cur_name->name; ?>', BELOW, RIGHT);" onmouseout="return nd();">
                <?php echo $cur_name->name; ?>
              </span>
<?php
            }
?>
                (<?php echo Joom_GetNumberOfLinks( $cur_name->cid ); ?>)
                <?php echo $isnew; ?>
              </li>
<?php
          }
          if ( $jg_showsubthumbs == 2 ) {
            $allsubcats = Joom_GetAllSubCategories ($cur_name->cid, $jg_showrandomsubthumb);
            if ( $allsubcats ) {
              mt_srand();
              $randomsubcat = $allsubcats[mt_rand(0, count($allsubcats)-1)];
            } else {
              $randomsubcat = '0';
            }
          }
          if ( $jg_showtotalsubcathits ) {
            if ($jg_showrandomsubthumb > 2 && $jg_showsubthumbs == 2) {
              $totalsubcats = $allsubcats;
            } else {
              $totalsubcats = Joom_GetAllSubCategories ($cur_name->cid, 4);
            }
            $totalhits = Joom_GetTotalHits($totalsubcats );
          }
          if ( $jg_showsubthumbs == 2 ) {
            //random pic nur, wenn auch $randomsubcat(s) vorhanden
            if ($jg_showrandomsubthumb == 1 || ( $jg_showrandomsubthumb >= 2 && $randomsubcat != '0')) {
              $subcatid=$cur_name->cid;
              $query= "SELECT *,c.access FROM #__joomgallery AS p"
                  ."\n LEFT JOIN #__joomgallery_catg AS c ON c.cid=p.catid"
                  ."\n WHERE ";
              if ( $jg_showrandomsubthumb == 1 ) {
                $query.= " p.catid = $cur_name->cid";
              } elseif ( $jg_showrandomsubthumb >= 2 ) {
                $query.= " p.catid = $randomsubcat";
              }
              $query.= "\n AND p.published = '1' AND p.approved='1' AND c.access <= $my->gid AND c.published = '1'"
                    ."\n ORDER BY rand() LIMIT 1";
  
              $database->setQuery( $query );
              $rows2 = $database->loadObjectList();
              $count= count($rows2);              
            } else {
              $count=0; 
            }
            if ( $count > 0 ) {
              $row3=$rows2[0];
              $tnfile = 'tn_';
              if ( $row3->imgfilename != '' ) {
                if (is_file(_JOOM_ABSOLUTE_PATH . $jg_paththumbs . '/' .$row3->catpath.'/'.$row3->imgfilename)) {
?>
          <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$cur_name->cid"._JOOM_ITEMIDX); ?>">
            <img src="<?php echo $thumbnailpath.$row3->catpath.'/'.$row3->imgfilename; ?>" align="<?php echo $img_position; ?>" hspace="4" vspace="0" class="jg_photo" alt="<?php echo $cur_name->name." :: ".$row3->imgtitle; ?>" />
          </a>
<?php
                } else {
?>
          <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$cur_name->cid"._JOOM_ITEMIDX); ?>">
            <img src="<?php echo $thumbnailpath.$catpath.$tnfile.$row3->imgfilename; ?>" align="<?php echo $img_position; ?>" hspace="4" vspace="0" class="jg_photo" alt="<?php echo $cur_name->name." :: ".$row3->imgtitle; ?>" />
          </a>
<?php
                }
              }
            }
?>
        </div>
        <div class="jg_subcatelem_txt">
          <ul>
            <li>
              <img src="<?php echo $mosConfig_live_site . '/images/M_images/arrow.png';?>" alt="arrow" />
<?php
            if ( $gid >= $cur_name->access ) {
?>
              <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$cur_name->cid"._JOOM_ITEMIDX); ?>">
                <?php echo $cur_name->name; ?>
              </a>
<?php
            } else {
?>
              <span class="jg_no_access" onMouseOver="return overlib('<?php echo _JGS_ALERT_YOU_NOT_ACCESS_THIS_DIRECTORY; ?>', CAPTION, '<?php echo $cur_name->name; ?>', BELOW, RIGHT);" onmouseout="return nd();">
                <?php echo $cur_name->name; ?>
              </span>
<?php
            }
?>
              (<?php echo Joom_GetNumberOfLinks( $cur_name->cid ); ?>)
              <?php echo $isnew; ?>
            </li>
<?php
          }
          if ( $jg_rmsm > 0) {
            if ( $cur_name->access > 1 ) {
?>
            <li>
              <span class="jg_sm">
              <?php echo _JGS_SPECIAL_MEMBERS; ?>
              </span>
            </li>
<?php
            } elseif ($cur_name->access > 0) {
?>
            <li>
              <span class="jg_rm">
              <?php echo _JGS_REGISTERED_MEMBERS; ?>
              </span>
            </li>
<?php
            }
          }
        }
        if ( $gid >= $cur_name->access) {
          if ( $jg_showtotalsubcathits ) {
?>
            <li>
            <?php echo _JGS_HITS; ?>: <?php echo $totalhits; ?>
            </li>
<?php
          }
          if ( $cur_name->description ) {
?>
            <li>
            <?php echo $cur_name->description; ?>
            </li>
<?php
          }
        }
?>
          </ul>
        </div>
      </div>
<?php
        $index++;
      } // for loop over cols in row
?>
      </div>
<?php
    } // for loop over rows
?>

<?php
  }

  function Joom_ShowCategoryPageNav_HTML (&$count, &$start, &$startpage, &$gesamtseiten, &$catid) {
    global $jg_showpiccount, $jg_usercatorder;
    if ( !$jg_showpiccount && $gesamtseiten == 1 || $count == 0) return;
   
?>
  <div class="jg_pagination">
<?php
    if ( $jg_showpiccount ) {
      if ( $count == 1 ) {
?>
    <?php echo _JGS_THERE_IS ." ".$count." ". _JGS_PICTURE_IN_CATEGORY; ?> 
<?php
      } elseif ( $count > 1 ) {
?>
    <?php echo _JGS_THERE_ARE ." ".$count." ". _JGS_PICTURES_IN_CATEGORY; ?> 
<?php
      }
    }
    if ( $gesamtseiten > 1 ) {
      if ($jg_usercatorder) {
        $order_url = "";
        if ($this->order_by != "") {
          $order_url.= "&amp;orderby=$this->order_by";
        }
        if ($this->order_dir != "") {
          $order_url .= "&amp;orderdir=$this->order_dir";
        }
      } else {
        $order_url = "";
      }
      //Ausgeben '<< Anfang'
      if ($startpage != 1) {
?>
    <br />
    <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$catid&amp;startpage=1$order_url"._JOOM_ITEMIDX).'#category'; ?>" class="jg_pagenav">
    &laquo;&laquo;&nbsp;
    <?php echo _JGS_PAGENAVIGATION_BEGIN; ?></a>
    &nbsp;&nbsp;
<?php
      } else {
?>
    <br />
    <span class="jg_pagenav">
      &laquo;&laquo;&nbsp;
      <?php echo _JGS_PAGENAVIGATION_BEGIN; ?> 
    </span>
    &nbsp;&nbsp;
<?php
      }
      // Ausgeben der Seite zurueck Funktion
      $seiterueck=$startpage - 1;
      if ( $seiterueck > 0 ) {
?>
    <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$catid&amp;startpage=$seiterueck$order_url"._JOOM_ITEMIDX)."#category"; ?>" class="jg_pagenav">
    &laquo;&nbsp;
    <?php echo _JGS_PAGENAVIGATION_PREVIOUS; ?></a>
    &nbsp;
<?php
      } else {
?>
    <span class="jg_pagenav">
      &laquo;&nbsp;
      <?php echo _JGS_PAGENAVIGATION_PREVIOUS; ?> 
    </span>
    &nbsp;
<?php
      }
      // Ausgeben der einzelnen Seiten
?>
      <?php echo Joom_GenPagination("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$catid&amp;startpage=%u$order_url"._JOOM_ITEMIDX,$gesamtseiten,$startpage,"#category");?>
<?php
      // Ausgeben der Seite vorwaerts Funktion
      $seitevor=$startpage + 1;
      if ( $seitevor <= $gesamtseiten ) {
?>
    &nbsp;&nbsp;
    <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$catid&amp;startpage=$seitevor$order_url"._JOOM_ITEMIDX)."#category"; ?>" class="jg_pagenav">
    <?php echo _JGS_PAGENAVIGATION_NEXT; ?> 
    &nbsp;&raquo;</a>
    &nbsp;
<?php
      } else {
?>
    &nbsp;&nbsp;
    <span class="jg_pagenav">
      <?php echo _JGS_PAGENAVIGATION_NEXT; ?> 
      &nbsp;&raquo;&nbsp;
    </span>
<?php
      }
      //Ausgeben 'Ende >>'
      if ($startpage != $gesamtseiten) {
?>
    &nbsp;
    <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$catid&amp;startpage=$gesamtseiten$order_url"._JOOM_ITEMIDX)."#category"; ?>" class="jg_pagenav">
    <?php echo _JGS_PAGENAVIGATION_END; ?> 
    &nbsp;&raquo;&raquo;</a>
<?php
      } else {
?>
    &nbsp;
    <span class="jg_pagenav">
      <?php echo _JGS_PAGENAVIGATION_END; ?> 
      &nbsp;&raquo;&raquo;
    </span>
<?php
      }
    }
?>
  </div>
<?php
  }


  function Joom_ShowSubCategoryPageNav_HTML(&$count3, &$substart, &$substartpage, &$subgesamtseiten, &$catid) {
    global $startpage, $jg_showsubcatcount;
    if ( !$jg_showsubcatcount && $subgesamtseiten == 1 || $count3 == 0) return;
    $startpage=$this->catstartpage;
?>
  <div class="jg_pagination">
<?php
    if ($startpage == 0 ) $startpage = 1;
?>
              <a name="subcategory"></a>
<?php
    if ( $jg_showsubcatcount ) {
      if ( $count3 == 1 ) {
?>
                <?php echo _JGS_THERE_IS ." ".$count3." ". _JGS_SUBCATEGORY_IN_CATEGORY; ?>
<?php
      } elseif ( $count3 > 1 ) {
?>
                <?php echo _JGS_THERE_ARE ." ".$count3." ". _JGS_SUBCATEGORIES_IN_CATEGORY; ?>
<?php
      }
    }

    if ( $subgesamtseiten > 1 ) {
      //Ausgeben '<< Anfang'
      if ($substartpage != 1) {
?>
                <br />
                <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$catid&amp;startpage=$startpage&amp;substartpage=1"._JOOM_ITEMIDX)."#subcategory"; ?>">
                  &laquo;&laquo;&nbsp;<?php echo _JGS_PAGENAVIGATION_BEGIN; ?>&nbsp;
                </a>
<?php
      } else {
?>
                <br />
                &laquo;&laquo;&nbsp;<?php echo _JGS_PAGENAVIGATION_BEGIN; ?>&nbsp;
<?php
      }
      // Ausgeben der Seite zurueck Funktion
      $subseiterueck=$substartpage - 1;
      if ( $subseiterueck > 0 ) {
?>
                <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$catid&amp;startpage=$startpage&amp;substartpage=$subseiterueck"._JOOM_ITEMIDX)."#subcategory"; ?>">
                  &laquo;&nbsp;<?php echo _JGS_PAGENAVIGATION_PREVIOUS; ?>&nbsp;
                </a>
<?php
      } else {
?>
                &laquo;&nbsp;<?php echo _JGS_PAGENAVIGATION_PREVIOUS; ?>&nbsp;
<?php
      }
      // Ausgeben der einzelnen Seiten
?>
        <?php echo Joom_GenPagination("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$catid&amp;startpage=$startpage&amp;substartpage=%u"._JOOM_ITEMIDX,$subgesamtseiten,$substartpage,"#subcategory"); ?>
<?php
      // Ausgeben der Seite vorwaerts Funktion
      $subseitevor=$substartpage + 1;
      if ( $subseitevor <= $subgesamtseiten ) {
?>
                <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$catid&amp;startpage=$startpage&amp;substartpage=$subseitevor"._JOOM_ITEMIDX)."#subcategory"; ?>">
                  &nbsp;<?php echo _JGS_PAGENAVIGATION_NEXT; ?>&nbsp;&raquo;
                </a>
<?php
      } else {
  ?>
                &nbsp;<?php echo _JGS_PAGENAVIGATION_NEXT; ?>&nbsp;&raquo;
<?php
      }
      //Ausgeben 'Ende >>'
      if ($substartpage != $subgesamtseiten) {
?>
                <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$catid&amp;startpage=$startpage&amp;substartpage=$subgesamtseiten"._JOOM_ITEMIDX)."#subcategory"; ?>">
                  &nbsp;<?php echo _JGS_PAGENAVIGATION_END; ?>&nbsp;&raquo;&raquo;
                </a>
<?php
      } else {
?>
                &nbsp;<?php echo _JGS_PAGENAVIGATION_END; ?>&nbsp;&raquo;&raquo;
<?php
      }
    }
?>
  </div>
<?php
  }
}
?>
