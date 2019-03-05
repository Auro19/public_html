<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/joomgallery.html.php $
// $Id: joomgallery.html.php 396 2009-03-15 16:06:21Z aha $
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

function Joom_GalleryHeader() {
  global $gid,$func,$jg_showuserpanel,$jg_showgalleryhead,$jg_showallpics,
         $jg_showtoplist, $jg_showbacklink,$jg_whereshowtoplist,$jg_userspace,
         $jg_search, $jg_showpathway, $catid, $database, $id, $jg_favourites;
?>
<div class="gallery">
<?php
  if ( $jg_showgalleryhead ) {
?>
  <div class="componentheading">
    <?php echo _JGS_GALLERY ;?> 
  </div>
<?php
  }
  if ( $jg_showpathway == 1 || $jg_showpathway == 3 ) Joom_ShowGalleryPathway();
  if ( $jg_search == 1 || $jg_search == 3) Joom_ShowGallerySearch();
  if ( $jg_showbacklink == 1 || $jg_showbacklink == 3 ) Joom_ShowGalleryBackLink_HTML();
  if ( $jg_userspace == 1 ){
    if ( ( ( $jg_showuserpanel == 1 ) && ( $gid > 0 ) )
      || ( ( $jg_showuserpanel > 0 ) && ( $gid == 2 ) )
      || ( $jg_showuserpanel == 3 ) ) {
      if( $gid != 0 ) {
?>
  <div class="jg_mygal">
    <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=userpanel'._JOOM_ITEMIDX) ;?>">
      <?php echo _JGS_USER_PANEL ;?> 
    </a>
  </div>
<?php
      } else {
?>
  <div class="jg_mygal">
    <span class="jg_no_access" onMouseOver="return overlib('<?php echo _JGS_YOU_ARE_NOT_LOGGED; ?>', CAPTION, '<?php echo _JGS_USER_PANEL; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
      <?php echo _JGS_USER_PANEL; ?>
    </span>
  </div>
<?php
      }
    }
  }
  if ( $jg_favourites ) Joom_ShowFavouritesLink();
  if ( $jg_showallpics == 1 || $jg_showallpics == 3 ) Joom_ShowGalleryAllPics ();
  if ( $jg_whereshowtoplist == 0 || ( $jg_whereshowtoplist > 0 && $func == '' ) || ( $jg_whereshowtoplist == 2 && $func == 'viewcategory' ) ) {
    if ( $jg_showtoplist > 0 && $jg_showtoplist < 3 ) Joom_ShowGalleryTopList_HTML();
  }
  return;
}


function Joom_GalleryDefault() {
  global $database, $gid, $jg_showallcathead, $jg_ctalign,
         $jg_showcatthumb, $jg_showrandomcatthumb, $thumbnailpath,
         $numberofpictures, $jg_showrmsmcats, $jg_showtotalcathits,$jg_rmsm,$jg_colcat,$start,
         $jg_catperpage, $jg_ordercatbyalpha, $jg_catdaysnew, $jg_showcatasnew;
         
  $query1="SELECT *
      FROM #__joomgallery_catg
      WHERE published = '1' AND parent = 0";
  if($jg_showrmsmcats==0) {
   $query1 .= " and access<= '$gid'";
  }
  if ($jg_ordercatbyalpha) {
    $query1.=" ORDER BY name LIMIT $start,$jg_catperpage";
  } else {
    $query1.=" ORDER BY ordering LIMIT $start,$jg_catperpage";
  }
  $database->setQuery( $query1 );
  $rows=$database->loadObjectList();

  if ( !$rows == NULL ) {
    $num_rows = ceil(count($rows ) / $jg_colcat );
    $count_pics=count($rows);
    $index=0;

    if ( $jg_showallcathead ) {
?>
  <div class="sectiontableheader">
    <?php echo _JGS_CATEGORIES; ?> 
  </div>
<?php
    }
    for ( $row_count=0; $row_count < $num_rows; $row_count++ ) {
      $linecolor=($row_count % 2) + 1;
      //Ausrichtung der Thumbs nur wirksam, wenn Random-Anzeige aktiviert
      if ($jg_showcatthumb == 1) { //random
        if ( $jg_ctalign == 0 ) {
          $ctalign=($row_count % 2) + 1;
          if ( $ctalign == 1 ) {
            $ctalign='left';
          } else{
            $ctalign='right';
          }
        }
        if ( $jg_ctalign == 1 ) { //links
          $ctalign='left';
        } elseif ( $jg_ctalign == 2 ) {//rechts
          $ctalign='right';
        } elseif ( $jg_ctalign == 3 ) {//zentriert
          $ctalign='center';
        }
      }else{
        $ctalign='left';
      }
?>
  <div class="jg_row <?php if ($linecolor == 1) echo "sectiontableentry1"; else echo "sectiontableentry2";?>">
<?php
      for ($col_count = 0; (($col_count < $jg_colcat) && ($index < $count_pics)); $col_count++) {
        if (($jg_ctalign==0 && $linecolor==1) || $jg_ctalign > 0){
?>
    <div class="jg_element_gal">
<?php     
        } else {
?>
    <div class="jg_element_gal_r">
<?php  
        } 
        $row1=$rows[$index];
        if ($jg_showcatasnew) {
          $isnew = Joom_CheckNewCatg( $row1->cid );
        } else {
          $isnew ="";
        }
        $pictures=Joom_GetNumberOfLinks( $row1->cid );
        $numberofpictures = number_format($pictures, 0, ',', '.');
        if ( $pictures == 1 ) {
          $picorpics = _JGS_PICTURE;
        } else {
          $picorpics = _JGS_PICTURES;
        }
        if ( $row1->img_position == 0 || $row1->img_position == NULL ) {
          $img_position = 'left';
        } elseif ( $row1->img_position == 1) {
          $img_position = 'right';
        } elseif ( $row1->img_position == 2) {
          $img_position = 'middle';
        }
        if ($jg_showcatthumb == 1) {
          $allsubcats = Joom_GetAllSubCategories ($row1->cid, $jg_showrandomcatthumb);
          if ( $allsubcats ) {
            $randomcat = $allsubcats[mt_rand(0, count($allsubcats)-1)];
          } else {
            //keine Kategorie mit Bildern gefunden
            $randomcat = '0';
          }
        }
        if ( $jg_showtotalcathits ) {
          if ($jg_showrandomcatthumb > 2 && $jg_showcatthumb == 1) {
            //wenn Zufallsbild aus Cat oder Cat und Subcats und Anzeige des 
            //Cat Bildes, die schon vorher festgestellten Cats uebernehmen
            $totalsubcats = $allsubcats;
          } else {
            $totalsubcats = Joom_GetAllSubCategories ($row1->cid, 4);
          }
          $totalhits = Joom_GetTotalHits($totalsubcats);
        }
        if ( $jg_showcatthumb > 0 ) {
          if ( $gid >= $row1->access ) {
            if ( $jg_showcatthumb == 1 ) {
              //random pic, nur wenn $randomcat(s) vorhanden
              if ($jg_showrandomcatthumb == 1 || ($jg_showrandomcatthumb >= 2 && $randomcat != '0')){
                $catid = $row1->cid;
                $query= "SELECT *,c.access FROM #__joomgallery AS p"
                    ."\n LEFT JOIN #__joomgallery_catg AS c ON c.cid=p.catid";
                if ( $jg_showrandomcatthumb == 1 ) {
                  $query.= " WHERE p.catid = $catid";
                } elseif ( $jg_showrandomcatthumb >= 2 ) {
                  $query.= " WHERE p.catid = $randomcat";
                }
                $query.= "\n AND p.published = '1' AND p.approved='1' 
                             AND c.access <= $gid AND c.published = '1'"
                      ."\n ORDER BY rand() LIMIT 1";
                $database->setQuery( $query );
                $rows1 = $database->LoadObjectList();
                $count = count($rows1);
                if ( isset( $rows1[0] ) ) $row=$rows1[0];
              } else {
                $count=0;
              }

              if ( $count > 0 ) {
                if (($jg_ctalign==0 && $linecolor==1) || $jg_ctalign > 0) {
?>
  <div class="jg_photo_container">
<?php
} else {
?>
  <div class="jg_photo_container_r">
<?php
} 
?>
        <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$row1->cid"._JOOM_ITEMIDX); ?>">
          <img src="<?php echo $thumbnailpath.$row->catpath.'/'.$row->imgthumbname; ?>" align="<?php if ($ctalign=='center')echo 'middle'; else echo $ctalign;?>" class="jg_photo" alt="<?php echo $row->imgtitle; ?>" />
        </a>
      </div>
<?php
              }
            } elseif ( $jg_showcatthumb == 2 && $row1->catimage != '' ) { //Own Choice and Pic exist
?>
      <div class="jg_photo_container">
        <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$row1->cid"._JOOM_ITEMIDX); ?>">
          <img src="<?php echo $thumbnailpath.$row1->catpath.'/'.$row1->catimage; ?>" align="<?php echo $img_position;?>" class="jg_photo" alt="<?php echo $row1->name; ?>" />
        </a>
      </div>
<?php
            }
          }
          if ( $jg_showcatthumb == 2 ) {
            $ctalign = $img_position;
            if ( $ctalign == 'middle' ) $ctalign = 'center';
          }
        if (($jg_ctalign==0 && $linecolor==1) || $jg_ctalign > 0){
?>
      <div class="jg_element_txt">
<?php     
        } else {
?>
      <div class="jg_element_txt_r">
<?php  
        } 
?>
        <ul>
          <li>
<?php
          if( $gid >= $row1->access ) {
?>
            <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$row1->cid"._JOOM_ITEMIDX); ?>">
              <b><?php echo $row1->name; ?></b>
            </a>
<?php
          } else {
?>
            <span class="jg_no_access" onMouseOver="return overlib('<?php echo _JGS_ALERT_YOU_NOT_ACCESS_THIS_DIRECTORY; ?>', CAPTION, '<?php echo $row1->name; ?>', BELOW, RIGHT);" onmouseout="return nd();">
              <b><?php echo $row1->name; ?></b>
            </span>
<?php
          }
?>
          </li>
<?php
          if ( $gid >= $row1->access ) {
?>
          <li>
            (<?php echo $numberofpictures; ?> <?php echo $picorpics; ?>)<?php echo $isnew; ?>
          </li>
<?php
          }
        } else { //no thumb
          if ($jg_ctalign==0 && $linecolor==1){
?>
      <div class="jg_element_txt">
<?php     
          } else {
?>
      <div class="jg_element_txt_r">
<?php  
          } 
?>
        <ul>
          <li>
<?php
          if( $gid >= $row1->access ) {
?>
            <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$row1->cid"._JOOM_ITEMIDX); ?>">
              <b><?php echo $row1->name; ?></b>
            </a>
            (<?php echo $numberofpictures; ?> <?php echo $picorpics; ?>)<?php echo $isnew; ?> 
<?php
          } else {
?>
            <span class="jg_no_access" onMouseOver="return overlib('<?php echo _JGS_ALERT_YOU_NOT_ACCESS_THIS_DIRECTORY; ?>', CAPTION, '<?php echo $row1->name; ?>', BELOW, RIGHT);" onmouseout="return nd();">
              <b><?php echo $row1->name; ?></b>
            </span>
            (<?php echo $numberofpictures; ?> <?php echo $picorpics; ?>)<?php echo $isnew; ?> 
<?php
          }
?> 
          </li>
<?php
        }
        if ( $jg_rmsm > 0 ) {
          if ( $row1->access > 1 ) {
?>
          <li>
            <span class="jg_sm">
              <?php echo _JGS_SPECIAL_MEMBERS; ?> 
            </span>
          </li>
<?php
          } elseif ( $row1->access > 0 ) {
            if ( ( $gid >= $row1->access && !$jg_showrmsmcats ) || $jg_showrmsmcats ) {
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
        if ( $jg_showtotalcathits ) {
?>
          <li>
            <?php echo _JGS_HITS; ?>: <?php echo $totalhits; ?> 
          </li>
<?php
        }
        if ( $row1->description ) {
?>
          <li>
            <?php echo $row1->description; ?> 
          </li>
<?php
        }
?>
        </ul>
      </div>
    </div>
<?php
      $index++;
      }
?>
  </div>
<?php
    }
    if ( $jg_showallcathead ) {
?>
  <div class="sectiontableheader">
    &nbsp; 
  </div>
<?php
    }
  } 
}


function Joom_GalleryFooter() {
  global $jg_rmsm, $jg_suppresscredits,$jg_showallpics,$jg_showbacklink,
         $jg_showtoplist,$jg_showpathway, $jg_whereshowtoplist, $func,
         $mosConfig_live_site, $jg_search;

  if ( $func=='detail' ) {
?>
  <div class="sectiontableheader">
    &nbsp; 
  </div>
<?php
  }
  if ( $jg_whereshowtoplist == 0 || ( $jg_whereshowtoplist > 0 && $func == '' )
       || ( $jg_whereshowtoplist == 2 && $func == 'viewcategory' ) ) {
    if ( $jg_showtoplist > 1 ) {
      Joom_ShowGalleryTopList_HTML();
    }
  }
  if ($jg_rmsm == 1  && ( $func == '' || $func == 'viewcategory') ) {
?>
  <div class="jg_rm">
    <?php echo _JGS_REGISTERED_MEMBERS; ?>: <?php echo  _JGS_REGISTERED_MEMBERS_LONG; ?>
  </div>
  <div class="jg_sm">
    <?php echo _JGS_SPECIAL_MEMBERS; ?>: <?php echo  _JGS_SPECIAL_MEMBERS_LONG; ?>
  </div>
<?php
  }
  if ( $jg_showallpics >= 2 ) Joom_ShowGalleryAllPics();
  if ( $jg_showbacklink >= 2 ) Joom_ShowGalleryBackLink_HTML();
  if ( $jg_search >= 2 ) Joom_ShowGallerySearch();
  if ( $jg_showpathway >= 2 ) Joom_ShowGalleryPathway();
  if ($jg_suppresscredits) {
?>
  <div align="center">
    <a href="http://www.joomgallery.net" target="_blank">
      <img src="<?php echo $mosConfig_live_site; ?>/components/com_joomgallery/assets/images/powered_by.gif" class="jg_poweredby" alt="Powered by JoomGallery" />
    </a>
  </div>
<?php
  }
?>
</div>
<?php
}

function Joom_ShowFavouritesLink() {
  global $mosConfig_live_site,$func,$my,
         $jg_showdetailfavourite, $jg_usefavouritesforpubliczip, $jg_usefavouritesforzip,
         $jg_favouritesshownotauth, $jg_zipdownload;
  
  if($func != 'showfavourites') {
    if((($jg_showdetailfavourite == 0) && ($my->gid >= 1)) 
        || (($jg_showdetailfavourite == 1) && ($my->gid == 2)) 
        || ((defined('_JEXEC') && $jg_usefavouritesforpubliczip == 1) && ($my->gid < 1))) {
      if(($jg_usefavouritesforzip == 1)
          || ((defined('_JEXEC') && $jg_usefavouritesforpubliczip == 1) && ($my->gid < 1))) {
?>
  <div class="jg_my_favourites">
    <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=showfavourites'._JOOM_ITEMIDX); ?>"
        onMouseOver="return overlib('<?php echo _JGS_ZIP_DOWNLOAD_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_ZIP_MY; ?>', BELOW, RIGHT);" onmouseout="return nd();">
      <?php echo _JGS_ZIP_MY; ?>
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/basket.png' ;?>" alt="<?php echo _JGS_ZIP_MY; ?>" class="pngfile jg_icon" />
    </a>
  </div>
<?php
      } else {
        $tooltip_text = _JGS_FAV_DOWNLOAD_TOOLTIP_TEXT;
        if($jg_zipdownload && $func != 'createzip') {
          $tooltip_text .= ' '._JGS_ZIP_DOWNLOAD_ALLOWED_TOOLTIP_TEXT;
        }
?>
  <div class="jg_my_favourites">
    <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=showfavourites'._JOOM_ITEMIDX); ?>"
        onMouseOver="return overlib('<?php echo $tooltip_text; ?>', CAPTION, '<?php echo _JGS_FAV_MY; ?>', BELOW, RIGHT);" onmouseout="return nd();">
      <?php echo _JGS_FAV_MY; ?>
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/star.png' ;?>" alt="<?php echo _JGS_FAV_MY; ?>" class="pngfile jg_icon" />
    </a>
  </div>
<?php
      }
    } elseif(($jg_favouritesshownotauth == 1/*) && ($my->gid < 1*/)){
      if($jg_usefavouritesforzip == 1) {
?>
  <div class="jg_my_favourites">
    <span class="jg_no_access" onMouseOver="return overlib('<?php echo _JGS_ZIP_DOWNLOAD_NOT_ALLOWED_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_ZIP_MY; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
      <?php echo _JGS_ZIP_MY; ?>
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/basket_gr.png' ;?>" alt="<?php echo _JGS_ZIP_MY; ?>"  class="pngfile jg_icon" />
    </span>
  </div>
<?php
      } else {
?>
  <div class="jg_my_favourites">
    <span class="jg_no_access" onMouseOver="return overlib('<?php echo _JGS_FAV_DOWNLOAD_NOT_ALLOWED_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_FAV_MY; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
      <?php echo _JGS_FAV_MY; ?>
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/star_gr.png' ;?>" alt="<?php echo _JGS_FAV_MY; ?>"  class="pngfile jg_icon" />
    </span>
  </div>
<?php
      }
    }
  } elseif($jg_zipdownload == 1 || (defined('_JEXEC') && $jg_usefavouritesforpubliczip && $my->gid < 1)) {
?>
  <div class="jg_my_favourites">
    <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=createzip'._JOOM_ITEMIDX); ?>"
        onMouseOver="return overlib('<?php echo _JGS_ZIP_CREATE_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_ZIP_DOWNLOAD; ?>', BELOW, RIGHT);" onmouseout="return nd();">
      <?php echo _JGS_ZIP_DOWNLOAD; ?>
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/package_go.png' ;?>" alt="<?php echo _JGS_ZIP_DOWNLOAD; ?>" class="pngfile jg_icon" />
    </a>
  </div>
<?php
  }
}

function Joom_ShowGallerySearch() {
  global $database;
?>
  <div class = "jg_search">
    <form action="<?php echo sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMIDX); ?>" target="_top" method="post">
      <input type="hidden" name="option" value="com_joomgallery" />
      <?php /*<input type="hidden" name="Itemid" value="<?php echo $Itemid ;?>" />*/ ?>
      <input type="hidden" name="func" value="special" />
      <input type="hidden" name="sorting" value="find" />
      <input type="text" name="sstring" class="inputbox" onblur="if(this.value=='') this.value='<?php echo _JGS_SEARCH ;?>';" onfocus="if(this.value=='<?php echo  _JGS_SEARCH ;?>') this.value='';" value="<?php echo  _JGS_SEARCH ;?>" />
    </form>
  </div>
<?php
}


function Joom_ShowGalleryPathway() {
  global $database, $catid, $jg_showgallerysubhead, $id,
         $gid, $jg_search, $mosConfig_live_site, $func;

  $path1 = "$mosConfig_live_site/index.php?option=com_joomgallery"._JOOM_ITEMID;
  $path2 = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
  $path3 = "$mosConfig_live_site/index.php?option=com_joomgallery&amp;Itemid=99999999";

  if ( !(( $jg_showgallerysubhead == 0 ) && ( ( $path1 == $path2 ) || ( $path3 == $path2 ) )) ) {
?>
  <div class="jg_pathway" >
    <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMIDX) ;?>">
      <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/home.png' ;?>" hspace="6" border="0" align="middle" alt="" /></a>
<?php
    if ( $catid != '' && $func != 'special' ) {
      echo Joom_CategoryPathLink($catid);
    } elseif ($id) {
      $database->setQuery("SELECT a.*, cc.name AS category
          FROM #__joomgallery AS a, #__joomgallery_catg AS cc
          WHERE a.catid = cc.cid AND a.id = $id AND cc.access <= '$gid'");
      $rows = $database->loadObjectList();
      $row = &$rows[0];
      echo Joom_CategoryPathLink($row->catid);
    }
?>
  </div>
<?php
  }
}

function Joom_CompleteBreadcrumbs($catid,$id,$func = '') {
  global $jg_usefavouritesforzip;
  if(!defined('_JEXEC')) return;
  $mainframe = & JFactory::getApplication('site');
  $database = & Jfactory::getDBO();
  $user = & JFactory::getUser();
  $pathway = & $mainframe->getPathway();

  // Sonderfaelle zuerst
  switch($func) {
    case 'userpanel':
      $pathway->addItem(_JGS_USER_PANEL);
      break;
    case 'uploadhandler':
    case 'showupload':
      $pathway->addItem(_JGS_USER_PANEL,'index.php?option=com_joomgallery&func=userpanel'._JOOM_ITEMID);
      $pathway->addItem(_JGS_NEW_PICTURE);
      break;
    case 'showusercats':
      $pathway->addItem(_JGS_USER_PANEL,'index.php?option=com_joomgallery&func=userpanel'._JOOM_ITEMID);
      $pathway->addItem(_JGS_CATEGORIES);
      break;
    case 'newusercat':
      $pathway->addItem(_JGS_USER_PANEL,'index.php?option=com_joomgallery&func=userpanel'._JOOM_ITEMID);
      $pathway->addItem(_JGS_NEW_CATEGORY);
      break;
    case 'showfavourites':
      if($user->get('id') && $jg_usefavouritesforzip != 1) {
        $pathway->addItem(_JGS_FAV_MY);
      } else {
        $pathway->addItem(_JGS_ZIP_MY);
      }
      break;
    case 'createzip':
      $pathway->addItem(_JGS_ZIP_DOWNLOAD);
      break;
  }
  if($func != ''
    && $func != 'viewcategory'
    && $func != 'detail') {
    return;
  }

  // falls keine catid vorhanden
  if($catid == 0 || $func == 'detail') {
    if($id != 0) {
      $database->setQuery("SELECT a.id,a.imgtitle,a.catid
                           FROM #__joomgallery AS a, #__joomgallery_catg AS cc
                           WHERE a.catid = cc.cid AND a.id = $id AND cc.access <= '".$user->get('aid')."'");
      if(!$row = $database->loadObject()) {
        return false;
      }
      $catid = $row->catid;
    } else {
      return false;
    }
  }
  // catid ist hier auf jeden Fall gesetzt

  // id's und Namen aller uebergeordneten Kategorien aus der Datenbank holen
  $cat_ids = array($catid);
  $cat_names = array();
  while($catid != 0) {
    $database->setQuery("SELECT name,parent FROM #__joomgallery_catg
                         WHERE cid = '".$catid."' AND published = '1' AND access <= '".$user->get('aid')."'");
    if(!$cat_row = $database->loadObject()) {
      $catid = 0;
    } else {
      $catid = $cat_row->parent;
    }
    if($catid != 0) {
      array_unshift($cat_ids,$catid);
    }
    array_unshift($cat_names,$cat_row->name);
  }

  // Breadcrumbs mit Kategorien vervollstaendigen
  for($i = 0;$i<count($cat_names);$i++) {
    $pathway->addItem($cat_names[$i],'index.php?option=com_joomgallery&func=viewcategory&catid='.$cat_ids[$i]._JOOM_ITEMID);
  }
  
  // eventuell Bildnamen hinzufuegen
  if(isset($row->id)) {
    $pathway->addItem($row->imgtitle,'index.php?option=com_joomgallery&func=detail&id='.$row->id._JOOM_ITEMID);
  }
}

function Joom_ShowGalleryAllPics() {
  global $database, $jg_showallhits, $gid;
  
  if ($jg_showallhits){
    $query="SELECT COUNT(id), SUM(imgcounter)";
  }else{
    $query="SELECT COUNT(id)";    
  } 
  $query .="\nFROM #__joomgallery as a
        LEFT JOIN #__joomgallery_catg as c ON c.cid=a.catid
        WHERE a.published = 1 AND a.approved = 1 AND c.published = '1' AND c.access <= $gid";
    
  $database->setQuery($query); 
  $numberarr=$database->loadRow();  
  $numberofpics = number_format($numberarr[0], 0, ',', '.');
?>
  <div class="jg_gallerystats">
      <?php echo _JGS_NUMB_PICTURES_ALL . $numberofpics; ?> 
<?php
    if ( $jg_showallhits ) {
      Joom_ShowGalleryAllHits($numberarr[1]);
    }
?>
  </div>
<?php
}

/**
* Counts the hits of all published and approved pics in the gallery
* if the cats are published
*/
function Joom_ShowGalleryAllHits(&$numberofhits) {
  if ( $numberofhits == NULL ) {
    $numberofhits = 0;
  }
?>
    <br />
    <?php echo _JGS_NUMB_HITS_ALL_PICTURES . $numberofhits; ?> 
<?php
}


function Joom_ShowGalleryTopList_HTML() {
  global $jg_showtoplist, $jg_toplist, $jg_showrate, $jg_showlatest, $jg_showcom,
         $jg_showmostviewed;
  $separator = "-\n";
?>
  <div class="jg_toplist">
    <?php echo _JGS_TOP.' '.$jg_toplist; ?>:
<?php
  if ( $jg_showrate ) {
?>
    <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=special&amp;sorting=rating'._JOOM_ITEMIDX); ?>">
      <?php echo _JGS_TOP_RATED; ?></a>
<?php
    if ( $jg_showlatest || $jg_showcom || $jg_showmostviewed ) {
      echo $separator;
    }
  }
  if ( $jg_showlatest ) {
?>
    <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=special&amp;sorting=lastadd'._JOOM_ITEMIDX); ?>">
      <?php echo _JGS_LAST_ADDED; ?></a>
<?php
    if ( $jg_showcom || $jg_showmostviewed ) {
      echo $separator;
    }
  }
  if ( $jg_showcom ) {
?>
    <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=special&amp;sorting=lastcomment'._JOOM_ITEMIDX); ?>">
      <?php echo _JGS_LAST_COMMENTED; ?></a>
<?php
    if ( $jg_showmostviewed ) {
      echo $separator;
    }
  }
  if ( $jg_showmostviewed ) {
?>
    <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=special'._JOOM_ITEMIDX); ?>">
      <?php echo _JGS_MOST_VIEWED; ?></a>
<?php
  }
?>
  </div>
<?php
}


function Joom_ShowGalleryPageNav_HTML($count2, $start, $startpage, $gesamtseiten) {
  global $jg_showcatcount;
  if ( !$jg_showcatcount && $gesamtseiten == 1 || $count2 == 0) return;
?>
  <div class="jg_pagination">
<?php
  if ( $jg_showcatcount ) {
    if ( $count2 == 1 ) {
?>
    <?php echo _JGS_THERE_IS ." ".$count2." ". _JGS_CATEGORY_IN_GALLERY; ?> 
<?php
    } elseif ( $count2 > 1 ) {
?>
    <?php echo _JGS_THERE_ARE ." ".$count2." ". _JGS_CATEGORIES_IN_GALLERY; ?> 
<?php
    }
  }
?>
    <br />
<?php

  //Wenn nur eine Seite, keine Ausgabe der Navigation
  if ( $gesamtseiten > 1 ) {
    //Ausgeben '<< Anfang'
    if ($startpage != 1) {
?>
            <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;startpage=1'._JOOM_ITEMIDX); ?>" class="jg_pagenav">
              &laquo;&laquo;&nbsp;<?php echo _JGS_PAGENAVIGATION_BEGIN; ?>&nbsp;
            </a>
<?php
    } else {
?>
            <span class="jg_pagenav">&laquo;&laquo;&nbsp;<?php echo _JGS_PAGENAVIGATION_BEGIN; ?></span>&nbsp;
<?php
    }
    // Ausgeben der Seite zurueck Funktion
    $seiterueck=$startpage - 1;
    if ( $seiterueck > 0 ) {
?>
            <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;startpage=$seiterueck"._JOOM_ITEMIDX); ?>" class="jg_pagenav">
              &laquo;&nbsp;<?php echo _JGS_PAGENAVIGATION_PREVIOUS; ?>&nbsp;
            </a>
<?php
    } else {
?>
            <span class="jg_pagenav">&laquo;&nbsp;<?php echo _JGS_PAGENAVIGATION_PREVIOUS; ?></span>&nbsp;
<?php
    }
    // Ausgeben der einzelnen Seiten
?>
       <?php echo Joom_GenPagination("index.php?option=com_joomgallery&amp;startpage=%u"._JOOM_ITEMIDX,$gesamtseiten,$startpage,""); ?>

<?php
    // Ausgeben der Seite vorwaerts Funktion
    $seitevor=$startpage + 1;
    if ( $seitevor <= $gesamtseiten ) {
?>
            <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;startpage=$seitevor"._JOOM_ITEMIDX); ?>" class="jg_pagenav">
              &nbsp;<?php echo _JGS_PAGENAVIGATION_NEXT; ?>&nbsp;&raquo;
            </a>
<?php
    } else {
?>
            &nbsp;<span class="jg_pagenav"><?php echo _JGS_PAGENAVIGATION_NEXT; ?>&nbsp;&raquo;</span>
<?php
    }
    //Ausgeben 'Ende >>'
    if ($startpage != $gesamtseiten) {
?>
            <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;startpage=$gesamtseiten"._JOOM_ITEMIDX); ?>" class="jg_pagenav">
              &nbsp;<?php echo _JGS_PAGENAVIGATION_END; ?>&nbsp;&raquo;&raquo;
            </a>
<?php
    } else {
?>
            &nbsp;<span class="jg_pagenav"><?php echo _JGS_PAGENAVIGATION_END; ?>&nbsp;&raquo;&raquo;</span>
<?php
    }
  }
?>
  </div>
<?php
}


function Joom_ShowGalleryBackLink_HTML() {
  global $database, $func, $id, $catid;

  if ( !empty($func) ) {
    $backtarget ="";
    $backtext = "";
    
    //Unter/Kategorieansicht
    if($func=="viewcategory") {
      $query="SELECT parent
          FROM #__joomgallery_catg
          WHERE cid='$catid'";
      $database->setQuery($query);
      $newcatid=$database->loadResult();
      if($newcatid!=0) {
        //Unterkategorieansicht -> Parentkategorie
        $backtarget = sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$newcatid"._JOOM_ITEMIDX);
        $backtext = _JGS_BACK_TO_CATEGORY; 
      } else {
        //Kategorieansicht -> Galerieansicht
        $backtarget = sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMIDX);
        $backtext = _JGS_BACK_TO_GALLERY;
      }
    } elseif ( $func=="detail" ) {
      //Detailansicht ->Kategorieansicht
      $query="SELECT catid
          FROM #__joomgallery
          WHERE id='$id'";
      $database->setQuery($query);
      $newcatid=$database->loadResult();

      $backtarget = sefRelToAbs('index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid='.$newcatid._JOOM_ITEMIDX)."#category";
      $backtext = _JGS_BACK_TO_CATEGORY;
    } else {
      $backtarget = "javascript:history.back();";
      $backtext = _JGS_BACK;
    }
?>
  <div class="jg_back">
    <a href="<?php echo $backtarget; ?>">
      <?php echo $backtext; ?> 
    </a>
  </div>
<?php
  }
}

?>
