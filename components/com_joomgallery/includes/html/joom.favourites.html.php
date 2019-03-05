<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/html/joom.favourites.html.php $
// $Id: joom.favourites.html.php 396 2009-03-15 16:06:21Z aha $
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
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class HTML_Joom_Favourites {
  function Joom_ShowFavourites_HTML1 ( $rows, $showDownloadIcon ) {
    global $database, $my,
           $thumbnailpath, $picturepath, $catid,
           $smiley, $mosConfig_live_site,
           $jg_toplistcols,$jg_showdetailpage,$jg_detailpic_open,$jg_showauthor,
           $jg_showowner,$jg_showhits,$jg_showcatrate,$jg_showcatcom,
           $jg_showthiscomment,$jg_smiliesupport,$jg_smiliescolor;

    $num_rows = ceil(count($rows ) / $jg_toplistcols );
    $index=0;
    $line=1;

?>
  <div class="jg_favview">
    <div class="sectiontableheader">
      <?php echo $this->Output('HEADING'); ?>
    </div>
    <div class="jg_fav_switchlayout">
      <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=switchlayout'._JOOM_ITEMIDX); ?>">
        <?php echo _JGS_FAV_SWITCH_LAYOUT; ?>
      </a>
    </div>
    <div class="jg_fav_clearlist">
      <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=removeall'._JOOM_ITEMIDX); ?>">
        <?php echo _JGS_FAV_REMOVE_ALL; ?>
      </a>
    </div>
<?php
  $count_rows=count($rows);
  if ( $count_rows  ) {
    for ( $row_count=0; $row_count < $num_rows; $row_count++ ) {
      $line++;
      $linecolor=($line % 2) + 1;
?>
    <div class="jg_row <?php if ($linecolor == 1) echo "sectiontableentry1"; else echo "sectiontableentry2";?>">
<?php
      for ($col_count = 0; ($col_count < $jg_toplistcols) && ($index < $count_rows); $col_count++) {
        $row=$rows[$index];
?>
      <div class="jg_favelement">
<?php
          $catpath = Joom_GetCatPath($row->catid);
          if (($jg_showdetailpage==0 && $my->gid!=0) || $jg_showdetailpage==1) {
            $catid = $row->catid;
            $link = Joom_OpenImage($jg_detailpic_open, $row->id, $catpath, $row->imgfilename, $row->imgtitle, $row->imgtext);
          } else {
            $link = "javascript:alert('"._JGS_ALERT_NO_DETAILVIEW_FOR_GUESTS."')";
          }
?>
		<div  class="jg_favelem_photo">
          <a href="<?php echo $link; ?>">
            <img src="<?php echo $thumbnailpath . $catpath . $row->imgthumbname; ?>" class="jg_photo" alt="<?php echo $row->imgtitle; ?>" />
          </a>
        </div>
        <div class="jg_favelem_txt">
          <ul>
            <li>
              <b><?php echo $row->imgtitle; ?></b>
            </li>
            <li>
              <?php echo _JGS_CATEGORY . ":" ?>
              <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=viewcategory&catid='.$row->catid._JOOM_ITEMIDX); ?>">
                <?php echo $row->name; ?>
              </a>
            </li>
<?php
              if ( $jg_showauthor ) {
                if ($row->imgauthor) {
                  $authorowner = $row->imgauthor;
                } elseif ($jg_showowner) {
                  $authorowner = getDisplayName($row->imgowner);
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
              <?php echo _JGS_HITS . ": " . $row->imgcounter; ?>
            </li>
<?php
          }
          if ( $jg_showcatrate ) {
?>
            <li>
<?php
            if ( $row->imgvotes > 0 ) {
              $fimgvotesum=number_format( $row->imgvotesum / $row->imgvotes, 2, ",", "" );
              $frating="$fimgvotesum ($row->imgvotes"._JGS_VOTES.")";
            } else {
              $frating = '(' . _JGS_NO_RATINGS .')';
            }
?>
              <?php echo _JGS_RATING . ": " . $frating; ?>
            </li>
<?php
          }
          if ( $jg_showcatcom ) {
            # Check how many comments exist
            $database->setQuery( "SELECT count(*)
                FROM #__joomgallery_comments
                WHERE cmtpic='$row->id' AND approved = '1' and published = '1' " );
            $comments=$database->loadResult();
?>
            <li>
<?php
            switch ($comments) {
              case 0:
?>
              <?php echo _JGS_NO_COMMENTS; ?>
<?php
                break;
              case 1:
?>
              <?php echo $comments.' '._JGS_COMMENT; ?>
<?php
                break;
              default:
?>
              <?php echo $comments.' '._JGS_COMMENTS; ?>
<?php
                break;
            }
?>
            </li>
<?php
          }
?>
            <li>
<?php
            // Download Icon
            if($showDownloadIcon == 1) {
?>
              <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=download&catid='.$row->catid.'&id='.$row->id._JOOM_ITEMIDX); ?>"
                  onMouseOver="return overlib('<?php echo _JGS_DOWNLOAD_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();">
                <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/download.png' ;?>" border="0" width="16" height="16" alt="<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>" class="pngfile jg_icon" />
              </a>
<?php
            } elseif($showDownloadIcon == -1) {
?>
              <span onMouseOver="return overlib('<?php echo _JGS_DOWNLOAD_TOOLTIP_TEXT_LOGIN; ?>', CAPTION, '<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
                <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/download_gr.png' ;?>" alt="<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>"  class="pngfile jg_icon" />
              </span>
<?php
            }
?>
              <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=removepicture&id='.$row->id._JOOM_ITEMIDX); ?>"
                  onMouseOver="return overlib('<?php echo $this->Output('REMOVE_TOOLTIP_TEXT'); ?>', CAPTION, '<?php echo $this->Output('REMOVE_TOOLTIP_CAPTION'); ?>', BELOW, RIGHT);" onmouseout="return nd();">
                <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/basket_remove.png' ;?>" alt="<?php echo $this->Output('REMOVE_TOOLTIP_CAPTION');; ?>" class="pngfile jg_icon" />
              </a>
            </li>
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
    } else {
?>
    <div class="jg_txtrow">
      <div class="sectiontableentry1">
        <img src="<?php echo $mosConfig_live_site; ?>/images/M_images/arrow.png" alt="arrow" />
      <?php echo $this->Output('NO_PICS'); ?>
      </div>
    </div>
<?php
    }
?>
    <div class="sectiontableheader">
      &nbsp;
    </div>
  </div>
<?php
  } // end of function
  
  function Joom_ShowFavourites_HTML2 ( $rows, $showDownloadIcon ) {
    global $database,$my,
           $mosConfig_live_site, $thumbnailpath,
           $jg_detailpic_open,$jg_showminithumbs;
?>
    <div class="sectiontableheader">
      <?php echo $this->Output('HEADING'); ?>
    </div>
    <div class="jg_fav_switchlayout">
      <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=switchlayout'._JOOM_ITEMIDX); ?>">
        <?php echo _JGS_FAV_SWITCH_LAYOUT; ?>
      </a>
    </div>
    <div class="jg_fav_clearlist">
      <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=removeall'._JOOM_ITEMIDX); ?>">
        <?php echo _JGS_FAV_REMOVE_ALL; ?>
      </a>
    </div>
    <div class="sectiontableheader">
      <div class="jg_up_entry">
        <div class="jg_up_ename">
          <?php echo _JGS_PICTURE_NAME; ?>
        </div>
        <div class="jg_up_ehits">
          <?php echo _JGS_HITS; ?>
        </div>
        <div class="jg_up_ecat">
          <?php echo _JGS_CATEGORY; ?>
        </div>
        <div class="jg_up_eact">
          <?php echo _JGS_ACTION; ?>
        </div>
      </div>
    </div>
  <?php
      $k=0;
      $joompath = $mosConfig_live_site . "/components/com_joomgallery";
      if (count($rows)) {
        foreach($rows as $row) {
          $k = 1 - $k;
          $p = $k+1;
          $catpath = Joom_GetCatPath($row->catid);
  ?>
    <div class="<?php echo "sectiontableentry".$p; ?>">
      <div class="jg_up_entry">
<?php
          if ($row->approved){
            $link = Joom_OpenImage($jg_detailpic_open, $row->id,"",$row->imgfilename, $row->imgtitle, $row->imgtext,$row->catid);
          }
          if ( $jg_showminithumbs ) {
?>
        <div class="jg_up_ename">
<?php
            if ( $row->imgthumbname != '' ) {
              if ($row->approved){
?>
          <a href="<?php echo $link; ?>">
<?php
              }
?>
            <img src="<?php echo $thumbnailpath.$catpath.$row->imgthumbname; ?>" border="0" height="30" alt="" />
<?php
              if ($row->approved){
?>
          </a>
<?php
              }
            }
          } else {
?>
          <div class="jg_floatleft">
            <img src="<?php echo $mosConfig_live_site; ?>/images/M_images/arrow.png" width="9" height="9" alt="arrow" />
          </div>
<?php
          }
          if ($row->approved){
?>
          <a href="<?php echo $link; ?>">
<?php
          }
?>
          <?php echo $row->imgtitle; ?>
<?php        
          if ($row->approved){
?>
          </a>
<?php
          }
?>
        </div>
        <div class="jg_up_ehits">
        <?php echo $row->imgcounter; ?>
        </div>
        <div class="jg_up_ecat">
          <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=viewcategory&catid='.$row->catid._JOOM_ITEMIDX); ?>">
            <?php echo Joom_CategoryPathLink( $row->catid, false ); /*<?php echo $row->name; ?>*/?>
          </a>
        </div>
      <?php
      // Download Icon
      if($showDownloadIcon == 1) {
      ?>
        <div class="jg_up_esub1">
          <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=download&catid='.$row->catid.'&id='.$row->id._JOOM_ITEMIDX); ?>"
            onMouseOver="return overlib('<?php echo _JGS_DOWNLOAD_TOOLTIP_TEXT; ?>', CAPTION, '<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();">
          <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/download.png' ;?>" border="0" width="16" height="16" alt="<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>" class="pngfile" /></a>
        </div>
      <?php
      } elseif($showDownloadIcon == -1) {
      ?>
        <div class="jg_up_esub1" onMouseOver="return overlib('<?php echo _JGS_DOWNLOAD_TOOLTIP_TEXT_LOGIN; ?>', CAPTION, '<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>', BELOW, RIGHT);" onmouseout="return nd();" >
          <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/download_gr.png' ;?>" alt="<?php echo _JGS_DOWNLOAD_TOOLTIP_CAPTION; ?>"  class="pngfile" />
        </div>
      <?php
      }
      ?>
        <div class="jg_up_esub2">
          <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=removepicture&id='.$row->id._JOOM_ITEMIDX); ?>"
            onMouseOver="return overlib('<?php echo $this->Output('REMOVE_TOOLTIP_TEXT');; ?>', CAPTION, '<?php echo $this->Output('REMOVE_TOOLTIP_CAPTION');; ?>', BELOW, RIGHT);" onmouseout="return nd();">
          <img src="<?php echo $mosConfig_live_site . '/components/com_joomgallery/assets/images/basket_remove.png' ;?>" alt="<?php echo $this->Output('REMOVE_TOOLTIP_CAPTION'); ?>" class="pngfile jg_icon" /></a>
        </div>
      <?php
      if($row->imgowner AND $row->imgowner == $my->id) {
      ?>
        <div class="jg_up_esub3">
          <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=editpic&uid='.$my->id.'&id='.$row->id._JOOM_ITEMIDX); ?>" title="<?php echo _JGS_EDIT; ?>">
            <img src= "<?php echo $mosConfig_live_site ?>/components/com_joomgallery/assets/images/edit.png" border="0" width="16" height="16" alt="<?php echo _JGS_EDIT; ?>" class="pngfile" />
          </a>
        </div>
        <div class="jg_up_esub4">
          <a href="javascript:if (confirm('<?php echo _JGS_ALERT_SURE_DELETE_SELECTED_ITEM; ?>')){ location.href='<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=deletepic&uid='.$my->id.'&id='.$row->id._JOOM_ITEMID);?>';}" title="<?php echo _JGS_DELETE; ?>">
            <img src="<?php echo $mosConfig_live_site ?>/components/com_joomgallery/assets/images/edit_trash.png" border="0" width="16" height="16" alt="<?php echo _JGS_DELETE; ?>" class="pngfile" />
          </a>
        </div>
      <?php
      }
      ?>
      </div>
    </div>
<?php
      }
    } else {
      $p = $k+1;
?>
    <div class="jg_txtrow">
      <div class="<?php echo "sectiontableentry".$p; ?>">
        <img src="<?php echo $mosConfig_live_site; ?>/images/M_images/arrow.png" alt="arrow" />
      <?php echo $this->Output('NO_PICS'); ?>
      </div>
    </div>
<?php
    }
?>
    <div class="sectiontableheader">
      &nbsp;
    </div>
<?php
  } // end of function

  function Joom_Favourites_CreateZip_HTML($zipname,$zipsize) {
    global $mosConfig_live_site;
?>
    <div class="sectiontableheader">
      <?php echo $this->Output('DOWNLOAD'); ?>
    </div>
    <div class="jg_createzip">
      <a href="<?php echo $zipname; ?>"><?php echo _JGS_ZIP_DOWNLOAD_READY; ?></a>
      <br />
      <a href="<?php echo $zipname; ?>">
        <img src="<?php echo $mosConfig_live_site; ?>/components/com_joomgallery/assets/images/disk.png" border="0" align="middle" alt="<?php echo _JGS_ZIP_DOWNLOAD; ?>" />
      </a>
      <br />
      <?php echo _JGS_ZIP_FILESIZE_PART_ONE.' '.$zipsize.' '._JGS_ZIP_FILESIZE_PART_TWO; ?>
      <br /><br />
      <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=removeall'._JOOM_ITEMIDX); ?>">
        <?php echo $this->Output('CREATEZIP_REMOVE_ALL'); ?>
      </a>
    </div>
    <div class="sectiontableheader">
      &nbsp;
    </div>
<?php
  }
  
  function Joom_Favourites_CreateZip_Error_HTML($zipfile) {
?>
    <div class="sectiontableheader">
      <?php echo $this->Output('DOWNLOAD'); ?>
    </div>
    <div class="jg_createzip">
      <i><?php echo _JGS_ZIP_DOWNLOAD_ERROR; ?></i>
      <br />
      <p>
      <?php echo $zipfile->errorInfo(true); ?>
      </p>
    </div>
    <div class="sectiontableheader">
      &nbsp;
    </div>
<?php
  }
}
?>
