<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/joom.viewdetails.php $
// $Id: joom.viewdetails.php 396 2009-03-15 16:06:21Z aha $
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

$joompath = $mosConfig_live_site . "/components/com_joomgallery";

# Don't allow passed settings
if (isset($_REQUEST['is_editor']) && $_REQUEST['is_editor']) {
  echo "<SCRIPT>document.location.href='".$mosConfig_live_site."'</SCRIPT>\n";
  exit();
}

include_once (_JOOM_FRONTEND_PATH . '/includes/html/joom.viewdetails.html.php');

//Parameters
global $slideshow,$jg_showdetailaccordion,$jg_bigpic_open;
$slideshow = $database->getEscaped(trim( mosGetParam( $_POST, 'jg_slideshow', "" ) ));

# Database Query
$database->setQuery("SELECT c.access
    FROM #__joomgallery_catg as c
    LEFT JOIN #__joomgallery as a ON a.catid = c.cid
    WHERE a.id= '$id'");
$c_access=$database->loadResult();
if ( $gid < $c_access ) {
?>
  <script>
    alert('<?php echo  _JGS_ALERT_NOT_ALLOWED_VIEW_PICTURE;?>');
    document.location.href
    = '<?php echo sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID); ?>';
  </script>
<?php
}

$database->setQuery("SELECT a.id, a.catid, a.imgtitle, a.imgauthor,
    a.imgtext, a.imgdate, a.imgcounter, a.imgvotes,
    a.imgvotesum, a.published, a.imgfilename, a.imgthumbname,
    a.ordering, u.username, a.owner
    FROM #__joomgallery AS a
    LEFT JOIN #__users AS u ON u.id = a.owner
    WHERE a.id = '$id' AND a.approved=1");
$result1 = $database->LoadRow();

list( $id, $catid, $imgtitle, $imgauthor,
$imgtext, $imgdate, $imgcounter, $imgvotes,
$imgvotesum, $published, $imgfilename, $imgthumbname, $ordering,
$imgowner,  $imgownerid ) = $result1;

if ($published!=1) {
//  mosRedirect(sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID), _JGS_ALERT_NOPICTURE_OR_NOTAPPROVED );
?>
  <script>
    alert('<?php echo _JGS_ALERT_NOPICTURE_OR_NOTAPPROVED;?>');
    document.location.href
    = '<?php echo sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID); ?>';
  </script>
<?php
}
$database->setQuery("SELECT name
    FROM #__joomgallery_catg
    WHERE cid= '".$catid."'");
$cattitle = $database->loadResult();
$pagetitle = Joom_MakePagetitle($jg_pagetitle_detail, $cattitle,$imgtitle);
$mainframe->setPageTitle(_JGS_GALLERY." - ".$pagetitle);
$catpath = Joom_GetCatPath($catid);

Joom_PagingCategory();

if($jg_showdetailtitle == 1) {
  HTML_Joom_Detail::Joom_ShowPictureTitle_HTML();
}


# Update View counter
$imgcounter++;
if($jg_watermark==0) {
  $database->setQuery("UPDATE #__joomgallery
      SET imgcounter='$imgcounter'
      WHERE id=$id");
  $database->query();
}
if (!$slideshow) {
  Joom_LightboxImages(0,1);
}


// TODO: cleaner if whole src / path etc of image is computed here instead of
// HTML_details...
$picture_src = Joom_ShowPicture();

if (!$slideshow) {
  Joom_LightboxImages(0,2);
}

if ($jg_minis) {
  Joom_ShowMinis();
}

//Accordion
//wenn Slimbox aktiviert nur das more js mit den zusätzlichen Funktionen laden
//sonst das komplette Mootools Paket
//nicht, wenn Lightbox aktiviert
if ($jg_showdetailaccordion) { 
  if (!$slideshow && $jg_bigpic_open != 4){
    $accordion = "";
    if ($jg_bigpic_open != 6) {
      if (defined ('_JEXEC')) {
        $accordion = "<script language=\"javascript\" type=\"text/javascript\" src=\"".$mosConfig_live_site."/media/system/js/mootools.js\"></script>\n";      
      } else {
        $accordion = "<script language=\"javascript\" type=\"text/javascript\" src=\"".$joompath."/assets/js/slimbox/js/mootools111.js\"></script>\n"; 
      } 
    }
    $accordion .= "<script language=\"javascript\" type=\"text/javascript\" src=\"".$joompath."/assets/js/accordion/js/accordion.js\"></script>";
    $mainframe->addCustomHeadTag($accordion);
  }
}
if($jg_showdetailtitle == 2) {
  HTML_Joom_Detail::Joom_ShowPictureTitle_HTML();
}

if ( $jg_showdetail ) {
  Joom_ShowPictureData();
}

if ( $jg_bridge ) {
  include_once (_JOOM_FRONTEND_PATH . '/includes/joom.bridge.php');
}

if ( $jg_slideshow ) {
  HTML_Joom_Detail::Joom_ShowSlideshow_HTML();
}

//*********************
//wenn die Slideshow aktiviert ist, sind die folgenden Abfragen hinfallig
if ($slideshow) return;
//*********************

if ( $jg_showexifdata && extension_loaded('exif') && function_exists('exif_read_data')) {
  include_once (_JOOM_FRONTEND_PATH . '/includes/exif/joom.exifdata.php');
}

if ( $jg_showiptcdata ) {
  include_once (_JOOM_FRONTEND_PATH . '/includes/iptc/joom.iptcdata.php');
}

if ( $jg_showrating) {
  HTML_Joom_Detail::Joom_ShowVotingArea_HTML( $id );
}
if ($jg_bbcodelink && $my->id){
  $show_img = false;
  $show_url = false;
  if ($jg_bbcodelink == 1 || $jg_bbcodelink == 3 )
    $show_img = true;
    
  if ($jg_bbcodelink == 2 || $jg_bbcodelink == 3 )
    $show_url = true;
    
  HTML_Joom_Detail::Joom_ShowBBCodeLink_HTML($picture_src, $show_img, $show_url);
}

if ( $jg_showcomment) {
  //darf der Besucher Kommentare eingeben
  if ($jg_anoncomment || (!$jg_anoncomment && $my->id)) {
    $allowcomment=1;
  }else{
    $allowcomment=0;
  }     
  
  HTML_Joom_Detail::Joom_ShowCommentsHead_HTML();
  if ( $jg_showcommentsarea == 2 ) {
    HTML_Joom_Detail::Joom_ShowCommentsArea_HTML($allowcomment);
    HTML_Joom_Detail::Joom_BuildCommentsForm_HTML($allowcomment);      
  } else {
    HTML_Joom_Detail::Joom_BuildCommentsForm_HTML($allowcomment);
    HTML_Joom_Detail::Joom_ShowCommentsArea_HTML($allowcomment);
  }
  HTML_Joom_Detail::Joom_ShowCommentsEnd_HTML();
}

if ( $jg_send2friend) {
  HTML_Joom_Detail::Joom_ShowSend2FriendArea_HTML();
}

/**
* Paging of detailpics in detailview
*/
function Joom_PagingCategory() {
  global $database, $id_cache, $jg_firstorder, $jg_secondorder, $jg_thirdorder,
         $catid, $id, $mosConfig_live_site, $jg_wmpath, $jg_wmfile, $jg_watermarkpos,
         $jg_watermark, $picturepath, $joompath, $jg_pathimages, $slideshow,
         $jg_showdetaildescription, $jg_showdetaildatum, $jg_showdetailhits, $jg_showdetailrating,
         $jg_showdetailfilesize, $jg_showdetailauthor, $catpath;
             
  $id_cache          = array();
  $source_cache      = array();
  $title_cache       = array();
  $description_cache = array();
  $date_cache        = array();
  $hits_cache        = array();
  $rating1_cache     = array();
  $rating2_cache     = array();
  $author_cache      = array();
  $filesize_cache    = array();

  if ($jg_secondorder != '' && $jg_thirdorder == '') {
    $orderclause = "$jg_firstorder, $jg_secondorder";
  } elseif ($jg_secondorder != '' && $jg_thirdorder != '') {
    $orderclause = "$jg_firstorder, $jg_secondorder, $jg_thirdorder";
  } else {
    $orderclause = "$jg_firstorder";
  }
  $database->setQuery( "SELECT *
        FROM #__joomgallery
        WHERE catid=$catid AND approved='1' AND published='1'
        ORDER BY $orderclause" );
  $result1 = $database->LoadObjectList();

  foreach( $result1 as $row1 ) {
    $database->setQuery("select username from #__users where id=$row1->owner");
    $ownername = $database->loadResult();

    $id_cache[]            =                               $row1->id;
    if($slideshow) {
      $title_cache[]       =                               $row1->imgtitle;
      $description_cache[] = ($jg_showdetaildescription) ? $row1->imgtext : "";
      $date_cache[]        = ($jg_showdetaildatum)       ? $row1->imgdate : "";
      $hits_cache[]        = ($jg_showdetailhits)        ? $row1->imgcounter : "";
      $rating1_cache[]     = ($jg_showdetailrating)      ? $row1->imgvotes : "";
      $rating2_cache[]     = ($jg_showdetailrating)      ? $row1->imgvotesum : "";
      $filesize_cache[]    = ($jg_showdetailfilesize)    ? @filesize( _JOOM_ABSOLUTE_PATH.$jg_pathimages.'/'.$catpath.$row1->imgfilename ) : "";
      if($jg_showdetailauthor) {
        $author_cache[]    = ($row1->imgauthor!="")      ? $row1->imgauthor : $ownername;
      } else {
        $author_cache[]    =  "";
      }
    }
    if ($jg_watermark == 1) {
      $source_cache[] = $mosConfig_live_site."/index.php?option=com_joomgallery&func=watermark&id=".$row1->id."&catid=".$catid._JOOM_ITEMID;
    } else {
      $source_cache[]=$picturepath . $catpath . $row1->imgfilename;
    }
  }
  $fileinfo = array(
    'id'          => $id_cache,
    'source'      => $source_cache,
    'title'       => $title_cache,
    'description' => $description_cache,
    'date'        => $date_cache,
    'hits'        => $hits_cache,
    'rating1'     => $rating1_cache,
    'rating2'     => $rating2_cache,
    'filesize'    => $filesize_cache,
    'author'      => $author_cache
  );

  $act_key=array_search( $id, $id_cache );
  $nid=(isset( $id_cache[$act_key + 1] )) ? $id_cache[$act_key + 1] : 0;
  $pid=(isset( $id_cache[$act_key - 1] )) ? $id_cache[$act_key - 1] : 0;
  unset($id_cache);

  HTML_Joom_Detail::Joom_PagingCategory_HTML( $pid, $nid, $fileinfo, $act_key );
}


function Joom_ShowPicture() {
  global $imgfilename, $imginfo_ori,$jg_pathimages, $jg_wmfile, $jg_wmpath, $catid, $id,
         $mosConfig_live_site, $jg_pathoriginalimages, $catpath, $jg_watermark, $picturepath;

  if (is_file(_JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . '/' . $catpath . $imgfilename)) {
    $imginfo_ori = getimagesize(_JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . '/' . $catpath . $imgfilename);
  }
  $imginfo = getimagesize(_JOOM_ABSOLUTE_PATH . $jg_pathimages . '/' . $catpath . $imgfilename);

  // height/width
  $srcWidth_ori = $imginfo_ori[0];
  $srcHeight_ori = $imginfo_ori[1];
  $srcWidth = $imginfo[0];
  $srcHeight = $imginfo[1];

  $picture_src = "";
    
  if ( $jg_watermark == 1) {
    $picture_src = $mosConfig_live_site."/index.php?option=com_joomgallery&amp;func=watermark&amp;catid=".$catid."&amp;id=".$id._JOOM_ITEMIDX;
  } else {
    $picture_src = $picturepath.$catpath.$imgfilename;
  }

  HTML_Joom_Detail::Joom_ShowPicture_HTML($picture_src,$catpath, $imgfilename, $srcWidth_ori, $srcHeight_ori, $srcWidth, $srcHeight);

  return $picture_src;
}


function Joom_ShowMinis () {
  global $database, $catid, $id, $jg_firstorder, $jg_secondorder, $jg_thirdorder;

  if ($jg_secondorder != '' && $jg_thirdorder == '') {
      $orderclause = "$jg_firstorder, $jg_secondorder";
    } elseif ($jg_secondorder != '' && $jg_thirdorder != '') {
      $orderclause = "$jg_firstorder, $jg_secondorder, $jg_thirdorder";
    } else {
      $orderclause = "$jg_firstorder";
    }
    $database->setQuery( "SELECT *
          FROM #__joomgallery
          WHERE catid=$catid AND approved='1' AND published='1'
          ORDER BY $orderclause" );

  $rows = $database->loadObjectList();
  $number_pics = count($rows);

  HTML_Joom_Detail::Joom_ShowMinis_HTML($rows, $id);

}


function Joom_ShowPictureData() {
  global $jg_pathimages, $jg_pathoriginalimages, 
         $catid,  $jg_dateformat, $catpath, $database, $id;

  $database->setQuery("SELECT a.imgauthor, a.imgdate, 
      a.imgcounter, a.imgvotes, a.imgvotesum, a.imgfilename, 
       a.imgcounter, a.owner
      FROM #__joomgallery AS a
      WHERE a.id = '$id' AND a.approved=1");
  $result1 = $database->LoadRow();
  
  list($imgauthor, $imgdate, $imgcounter, $imgvotes, $imgvotesum, $imgfilename, 
       $imgcounter, $owner ) = $result1;

  $fimgdate=strftime( "$jg_dateformat", $imgdate );
  $imgsize=filesize( _JOOM_ABSOLUTE_PATH.$jg_pathimages.'/'.$catpath.$imgfilename );
  $fimgsize=number_format( $imgsize / 1024, 2, ",", "." );
  $imgpxinfo = getimagesize( _JOOM_ABSOLUTE_PATH.$jg_pathimages.'/'.$catpath.$imgfilename );
  $pxWidth = $imgpxinfo[0];
  $pxHeight = $imgpxinfo[1];

  if(is_file(_JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . '/' . $catpath .$imgfilename)) {
    $originalimgsize=filesize( _JOOM_ABSOLUTE_PATH.$jg_pathoriginalimages.'/'.$catpath.$imgfilename );
    $foriginalimgsize=number_format( $originalimgsize / 1024, 2, ",", "." )." KB";
    $imgorigpxinfo = getimagesize( _JOOM_ABSOLUTE_PATH.$jg_pathoriginalimages.'/'.$catpath.$imgfilename );
    $pxorigWidth = $imgorigpxinfo[0];
    $pxorigHeight = $imgorigpxinfo[1];
  } else {
    $foriginalimgsize=_JGS_NO_ORIGINAL_FILE;
    $pxorigWidth = "";
    $pxorigHeight = "";
  }
  if ( $imgvotes > 0 ) {
    $fimgvotesum=number_format( $imgvotesum / $imgvotes, 2, ",", "." );
    if ($imgvotes == 1) {
      $frating = "$fimgvotesum ($imgvotes " .  _JGS_ONE_VOTE . ')';
    } else {
      $frating = "$fimgvotesum ($imgvotes " .  _JGS_VOTES . ')';
    }
  } else {
    $frating=_JGS_NO_VOTES;
  }

  HTML_Joom_Detail::Joom_ShowPictureData_HTML($owner, $imgauthor, $imgcounter, $fimgdate, $fimgsize, $foriginalimgsize, $frating, $pxWidth, $pxHeight, $pxorigWidth, $pxorigHeight);
}

?>

