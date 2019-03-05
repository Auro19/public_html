<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/html/joom.viewspecial.html.php $
// $Id: joom.viewspecial.html.php 396 2009-03-15 16:06:21Z aha $
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

class HTML_Joom_Specials {
  function Joom_ShowSpecials_HTML ( $tl_title, $rows ) {
    global $database, $gid, $thumbnailpath,$jg_showhits, $jg_showcatrate,
           $jg_showcatcom, $jg_showauthor, $jg_showowner,$jg_showlatestcom,
           $sorting, $jg_showthiscomment, $my, $jg_showdetailpage,$jg_detailpic_open,
           $jg_pathimages, $picturepath, $jg_watermark, $jg_smiliesupport,$jg_smiliescolor,
           $smiley, $mosConfig_live_site,$jg_toplistcols,$catid;

    $num_rows = ceil(count($rows ) / $jg_toplistcols );
    $index=0;
    $line=1;

?>
  <div class="jg_topview">
    <div class="sectiontableheader">
      <?php echo $tl_title; ?>
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
        $row1=$rows[$index];
?>
      <div class="jg_topelement">
<?php
           $catpath = Joom_GetCatPath($row1->catid);
           if (($jg_showdetailpage==0 && $my->gid!=0) || $jg_showdetailpage==1) {
             $catid=$row1->catid;
             $link = Joom_OpenImage($jg_detailpic_open, $row1->id, $catpath, $row1->imgfilename, $row1->imgtitle, $row1->imgtext);
           } else {
              $link = "javascript:alert('"._JGS_ALERT_NO_DETAILVIEW_FOR_GUESTS."')";
           }
?>
        <div  class="jg_topelem_photo">
          <a href="<?php echo $link; ?>">
            <img src="<?php echo $thumbnailpath . $catpath . $row1->imgthumbname; ?>" class="jg_photo" alt="<?php echo $row1->imgtitle; ?>" />
          </a>
        </div>
        <div class="jg_topelem_txt">
          <ul>
            <li>
              <b><?php echo $row1->imgtitle; ?></b>
            </li>
            <li>
              <?php echo _JGS_CATEGORY . ":" ?>
              <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=viewcategory&amp;catid=$row1->catid"._JOOM_ITEMIDX); ?>">
                <?php echo $row1->name; ?>
              </a>
            </li>
<?php
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
?>
            <li>
<?php
            if ( $row1->imgvotes > 0 ) {
              $fimgvotesum=number_format( $row1->imgvotesum / $row1->imgvotes, 2, ",", "" );
              if ($row1->imgvotes == 1) {
                $frating="$fimgvotesum ($row1->imgvotes "._JGS_ONE_VOTE.")";
              } else {
                $frating="$fimgvotesum ($row1->imgvotes "._JGS_VOTES.")";
              }
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
                WHERE cmtpic='$row1->id' AND approved = '1' and published = '1' " );
            $comments=$database->LoadResult();
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
            if ( $sorting == 'lastcomment' && $jg_showthiscomment ) {
              for ( $ii=0; $ii < $comments; $ii++ ) {
                $userid = $row1->userid;
                $cmtname = $row1->cmtname;
                if ($userid > 0)
                   $cmtname = $row1->username;
                
                $cmttext = $row1->cmttext;
                $cmtdate = $row1->cmtdate;
                $cmtdate = strftime( "%d-%m-%Y %H:%M:%S", $cmtdate );
              }
              
?>
            <li>
<?php
              if($userid > 0){
?>
			<?php echo getDisplayName($userid, false); ?>
<?php
              } else{              
                echo $cmtname;
              }
    
              echo " "._JGS_WROTE . " (" . _JGS_AT . " " . $cmtdate . "):";
              $cmttext = Joom_ProcessText($cmttext );
              if ( $jg_smiliesupport ) {
                foreach ( $smiley as $i=>$sm ) {
                $cmttext = str_replace ("$i", "<img src='$mosConfig_live_site/components/com_joomgallery/assets/images/smilies/$jg_smiliescolor/$sm' border='0' alt='$i' title='$i' />", $cmttext);
                }
              }
?>
              <?php echo stripslashes($cmttext); ?>
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
      }
?>
    </div>
<?php
      }
    }
?>
  </div>
<?php
  } // end of function
}
?>
