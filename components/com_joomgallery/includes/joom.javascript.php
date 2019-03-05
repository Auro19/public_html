<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/joom.javascript.php $
// $Id: joom.javascript.php 396 2009-03-15 16:06:21Z aha $
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
defined ('_VALID_MOS') or die( 'Direct Access to this location is not allowed.' );

if(defined('_JOOM_PARENT_MODULE') && !defined('_JOOM_ABSOLUTE_PATH')) {
  //global $mainframe; 
  //$path = preg_replace("!(\\\)!i","/",dirname(__FILE__));
  define( '_JOOM_ABSOLUTE_PATH', $mainframe->getCfg( 'absolute_path' ) );
  define( '_JOOM_FRONTEND_PATH', $mainframe->getCfg( 'absolute_path' )."/components/com_joomgallery" );
}

#if ($func=="detail" || $jg_favourites == 1) {
?>
  <script  type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
<?php
  if (defined ('_JEXEC')) {
?>
    <script type="text/javascript">overlib_pagedefaults(WIDTH,250,VAUTO,RIGHT,AUTOSTATUSCAP, CSSCLASS,TEXTFONTCLASS,'jl-tips-font',FGCLASS,'jl-tips-fg',BGCLASS,'jl-tips-bg',CAPTIONFONTCLASS,'jl-tips-capfont', CLOSEFONTCLASS, 'jl-tips-closefont');</script>
<?php
  }
#}
$files = "<script language=\"javascript\" type=\"text/javascript\" src=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/joomscript.js\"></script>\n"
        . "<script language=\"javascript\" type=\"text/javascript\">\n"
        .  "var resizeSpeed = ".$jg_lightbox_speed.";\n"
        .  "var resizeJsImage = ".$jg_resize_js_image.";\n"
        .  "var borderSize = ".$jg_openjs_padding.";\n"
        .  "</script>\n";
if( ( $func=="detail" && $jg_bigpic_open==4 ) || $jg_detailpic_open==4) {
 $files  .=  "<script language=\"javascript\" type=\"text/javascript\" src=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/lightbox/js/lightningload.js\"></script>\n"
         . "<script language=\"javascript\" type=\"text/javascript\" src=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/lightbox/js/prototype.js\"></script>\n"
        .  "<script language=\"javascript\" type=\"text/javascript\" src=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/lightbox/js/scriptaculous.js?load=effects\"></script>\n"
        .  "<script language=\"javascript\" type=\"text/javascript\" src=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/lightbox/js/lightbox.js\"></script>\n"
        .  "<link href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/lightbox/css/lightbox.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
 require_once( _JOOM_FRONTEND_PATH . '/assets/js/lightbox/css/lightbox.css.php' );
}

//Thickbox3
if( ( $func=="detail" && $jg_bigpic_open==5 ) || $jg_detailpic_open==5 ) {
 $files .= "<script language=\"javascript\" type=\"text/javascript\" src=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/thickbox3/js/jquery-latest.pack.js\"></script>\n"
        .  "<script language=\"javascript\" type=\"text/javascript\" src=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/thickbox3/js/thickbox.js\"></script>\n"
        .  "<link href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/thickbox3/css/thickbox.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
}

//Slimbox
if( ( $func=="detail" && $jg_bigpic_open==6 ) || $jg_detailpic_open==6 ) {
  if (defined ('_JEXEC')) {
    $files .= "<script language=\"javascript\" type=\"text/javascript\" src=\"".$mosConfig_live_site."/media/system/js/mootools.js\"></script>\n";      
  } else {
    $files .= "<script language=\"javascript\" type=\"text/javascript\" src=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/slimbox/js/mootools111.js\"></script>\n"; 
  }
  $files .= "<script language=\"javascript\" type=\"text/javascript\" src=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/slimbox/js/slimbox.js\"></script>\n"
        . "<link href=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/slimbox/css/slimbox.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />\n";
 require_once( _JOOM_FRONTEND_PATH . '/assets/js/lightbox/css/lightbox.css.php' );
}

if ( $func=="detail" && $jg_minis==1 && $jg_motionminis==2 ) {
  $files .= "<!-- Do not edit IE conditional style below -->"
         .  "\n"
         .  "<!--[if gte IE 5.5]>"
         .  "\n"
         .  "<style type=\"text/css\">\n"
         .  "#motioncontainer {\n"
         .  "  width:expression(Math.min(this.offsetWidth, maxwidth)+'px');\n"
         .  "}\n"
         .  "</style>\n"
         .  "<![endif]-->"
         .  "\n"
         .  "<!-- End Conditional Style -->"
         .  "\n"
         .  "<script type=\"text/javascript\" src=\"".$mosConfig_live_site."/components/com_joomgallery/assets/js/motiongallery/js/joom_motiongallery.js\">\n"
         .  "/***********************************************\n"
         .  "* CMotion Image Gallery- © Dynamic Drive DHTML code library (www.dynamicdrive.com)\n"
         .  "* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts\n"
         .  "* This notice must stay intact for legal use\n"
         .  "* Modified by Jscheuer1 for autowidth and optional starting positions\n"
         .  "***********************************************/\n"
         .  "</script>\n"
         .  "<style type=\"text/css\">\n"
         .  ".pngfile, #lightboxImage {\n"
         .  "  behavior: url(\"components/com_joomgallery/assets/js/pngbehavior.htc\");\n"
         .  "}\n";
if(isset($slideshow) &&( !$slideshow || ($slideshow && $jg_slideshow_usefilter==0) )) {
  $files .= "#jg_photo_big {\n"
         . "  behavior: url(\"components/com_joomgallery/assets/js/pngbehavior.htc\")\n"
         . "}\n";
}
  $files .= "</style>\n";
}

if(method_exists($mainframe, 'addCustomHeadTag') && !defined('_JOOM_PARENT_MODULE')) {
  $mainframe->addCustomHeadTag($files);
} else {
  echo $files;
}
?>

<script language="javascript" type="text/javascript">
var jg_ffwrong = "<?php echo $jg_wrongvaluecolor; ?>";
var jg_padding = "<?php echo $jg_openjs_padding; ?>";
var jg_filenamewithjs = "<?php echo $jg_filenamewithjs; ?>";
var jg_dhtml_border = "<?php echo $jg_dhtml_border; ?>";
var jg_openjs_background = "<?php echo $jg_openjs_background; ?>";
var jg_disableclick = "<?php echo $jg_disable_rightclick_original; ?>";
var jg_use_code = "<?php echo ($jg_secimages==2 || ($jg_secimages==1 && $my->gid <1)) ? 1 : 0; ?>";
var jg_show_title_in_dhtml = "<?php echo $jg_show_title_in_dhtml; ?>";
var jg_show_description_in_dhtml = "<?php echo $jg_show_description_in_dhtml; ?>";
//Language
var joomgallery_select_category = "<?php echo _JGS_ALERT_YOU_MUST_SELECT_CATEGORY; ?>";
var joomgallery_select_file = "<?php echo _JGS_ALERT_YOU_MUST_SELECT_ONE_FILE; ?>";
var joomgallery_pic_must_have_title = "<?php echo _JGS_ALERT_PICTURE_MUST_HAVE_TITLE; ?>";
var joomgallery_filename_double1 = "<?php echo _JGS_ALERT_FILENAME_DOUBLE1; ?>";
var joomgallery_filename_double2 = "<?php echo _JGS_ALERT_FILENAME_DOUBLE2; ?>";
var joomgallery_wrong_filename = "<?php echo _JGS_ALERT_WRONG_FIILENAME; ?>";
var joomgallery_wrong_extension = "<?php echo _JGS_ALERT_WRONG_EXTENSION; ?>";
var joomgallery_must_have_fname = "<?php  echo _JGS_ALERT_YOU_MUST_SELECT_ONE_PICTURE; ?>";
var joomgallery_enter_name_email = "<?php  echo _JGS_ALERT_ENTER_NAME_EMAIL; ?>";
var joomgallery_enter_comment = "<?php  echo _JGS_ALERT_ENTER_COMMENT; ?>";
var joomgallery_enter_code = "<?php echo _JGS_ALERT_ENTER_CODE; ?>";
var joomgallery_image = "<?php  echo _JGS_PICTURE; ?>";
var joomgallery_of = "<?php echo _JGS_OF; ?>";
var joomgallery_close = "<?php echo (defined('_JGS_CLOSE')) ? _JGS_CLOSE : "close"; ?>";
var joomgallery_prev = "<?php echo (defined('_JGS_PREVIOUS')) ? _JGS_PREVIOUS : " Prev"; ?>";
var joomgallery_next = "<?php echo (defined('_JGS_NEXT')) ? _JGS_NEXT : "Next"; ?>";
var joomgallery_press_esc = "<?php echo (defined('_JGS_ESC')) ? _JGS_ESC : "(Esc)"; ?>";
</script>
<?php
if($func=='detail' || defined('_JOOM_PARENT_MODULE') ) {
?>
<script language="javascript" type="text/javascript">
<?php
  if($jg_disable_rightclick_detail==1 && !defined('_JOOM_PARENT_MODULE')) {
?>
var jg_photo_hover = 0;
document.oncontextmenu = function() {
  if(jg_photo_hover==1) {
    return false;
  }
}
function joom_hover() {
  jg_photo_hover = (jg_photo_hover==1) ? 0 : 1;
}
<?php
  }
  if($jg_cursor_navigation==1) {
    echo  "document.onkeydown = joom_cursorchange;\n";
  }
?>
var jg_comment_active = 0;
</script>
<?php
}

if($func=='detail' || $func=='special') {

  $smiley[':smile:']          = "sm_smile.gif";
  $smiley[':cool:']           = "sm_cool.gif";
  $smiley[':grin:']           = "sm_biggrin.gif";
  $smiley[':wink:']           = "sm_wink.gif";
  $smiley[':none:']           = "sm_none.gif";
  $smiley[':mad:']            = "sm_mad.gif";
  $smiley[':sad:']            = "sm_sad.gif";
  $smiley[':dead:']           = "sm_dead.gif";

  if ( $jg_anismilie ) {
    $smiley[':yes:']            = "sm_yes.gif";
    $smiley[':lol:']            = "sm_laugh.gif";
    $smiley[':smilewinkgrin:']  = "sm_smilewinkgrin.gif";
    $smiley[':razz:']           = "sm_bigrazz.gif";
    $smiley[':roll:']           = "sm_rolleyes.gif";
    $smiley[':eek:']            = "sm_bigeek.gif";
    $smiley[':no:']             = "sm_no.gif";
    $smiley[':cry:']            = "sm_cry.gif";
  }
}


function Joom_FixForJS($text,$bbcode=0) {
global $jg_bbcodesupport;

  if($bbcode==1 && $jg_bbcodesupport==1) {
    if(!function_exists('Joom_BBDecode')) {
      include(_JOOM_ABSOLUTE_PATH.'/administrator/components/com_joomgallery/common.joomgallery.php');
    }
  $text = Joom_BBDecode($text);
  }
  $text = str_replace("\"","\'",$text);
  $text = preg_replace("/[\n\t\r]*/","",$text);
  return $text;
}

function Joom_OpenImage($open, $id, $catpath, $imgfilename, $imgtitle="", $imgdescription="",$usercatid="") {
  global $mosConfig_live_site, $func, $picturepath, $origpicturepath,
         $jg_show_description_in_dhtml, $jg_pathimages, $jg_pathoriginalimages,
         $jg_watermark, $jg_detailpic_open, $jg_lightboxbigpic, $catid;
 
  // Sanitize $catpath for robustness:
  // assumed to have no starting and one trailing slash aftewards  
  $catpath = preg_replace("/^[\/]*(.*[^\/])[\/]*$/", "$1/", $catpath);
  
  if (!empty($usercatid)){
    $catid=$usercatid;
  }
  
  if (is_null($picturepath) || is_null($origpicturepath) || !defined('_JOOM_ITEMID')){
    require( _JOOM_ABSOLUTE_PATH . '/administrator/components/com_joomgallery/joomgallery.config.php' );
  }
  
  if (is_null($picturepath))
    $picturepath = $mosConfig_live_site . $jg_pathimages . '/';
  if (is_null($origpicturepath))  
    $origpicturepath = $mosConfig_live_site .$jg_pathoriginalimages . '/';

  // TODO: switch to interface when completed
  if (!defined('_JOOM_ITEMID')){
    $Itemid_jg = joommodule::getJoomId();
    define('_JOOM_ITEMID', $Itemid_jg);
  }
    
  //if(!defined('_JOOM_PARENT_MODULE')) {
  // TODO: necessary?
    $Itemid = '';
    if(defined('_JOOM_ITEMID')) {
      $Itemid_array = explode('=',_JOOM_ITEMID);
      if(isset($Itemid_array[1])) $Itemid = $Itemid_array[1];
    }
    $Itemid_jg = ($Itemid!="") ? "&amp;Itemid=".$Itemid : "";
  //}
  $imgpath = ( $func=="detail" && !defined( '_JOOM_PARENT_MODULE' ) ) ? $jg_pathoriginalimages.'/'.$catpath : $jg_pathimages.'/'.$catpath;
  if ( $jg_watermark == 1 ) {
    if ( ($jg_detailpic_open > 3 ) && $jg_lightboxbigpic ) {
      $orig = 1;
    } else {
      $orig = ($func=="detail") ? 1 : 0;
    }
    $js_imgpath = $mosConfig_live_site . "/index.php?option=com_joomgallery&amp;func=watermark&amp;id=".$id."&amp;catid=".$catid."&amp;orig=".$orig."&amp;no_html=1".$Itemid_jg;
  } else {
    if ( ($jg_detailpic_open > 3 ) && $jg_lightboxbigpic ) {
      $js_imgpath  = $origpicturepath.$catpath;
    } else {
      $js_imgpath  = ( $func=="detail" && defined( '_JOOM_ABSOLUTE_PATH' ) ) ? $origpicturepath.$catpath : $picturepath.$catpath;
    }
    $js_imgpath .= $imgfilename;
  }

  switch ($open) {
    case 1:
      $link = $js_imgpath."\" target=\"_blank";
      break;
    case 2:
      $imginfo = getimagesize(_JOOM_ABSOLUTE_PATH . $imgpath.$imgfilename);
      $link = "javascript:joom_openjswindow('".$js_imgpath."','".Joom_FixForJS($imgtitle)."', '".$imginfo[0]."','".$imginfo[1]."')";
      break;
    case 3:
      $imginfo = getimagesize(_JOOM_ABSOLUTE_PATH . $imgpath.$imgfilename);
      $link = "javascript:joom_opendhtml('".$js_imgpath."','".Joom_FixForJS($imgtitle)."','";
      if($jg_show_description_in_dhtml) {
        $link .= Joom_FixForJS($imgdescription,1) ."','";
      } else {
        $link .= "','";
      }
      $link .= $imginfo[0]."','".$imginfo[1]."')";
      break;
    case 4: case 6: //lightbox and slimbox
      $link = $js_imgpath."\" rel=\"lightbox[joomgallery]\" title=\"".$imgtitle;
      break;
    case 5: //thickbox3
      $link = $js_imgpath."\" class=\"thickbox\" rel=\"joomgallery\" title=\"".$imgtitle;
      break;
    default:
      $link = sefRelToAbs("index.php?option=com_joomgallery&amp;func=detail&amp;id=".$id.$Itemid_jg);
      break;
  }
    return $link;
}

function Joom_LightboxImages($start, $end, $orderclause=null) {
  global $database, $func, $gid, $catid, $id, $jg_bigpic, $jg_bigpic_open, $jg_detailpic_open, $jg_showdetailpage,
         $jg_pathoriginalimages, $jg_lightbox_slide_all, $jg_firstorder, $jg_secondorder, $jg_thirdorder;

  if( ( ( $func=="viewcategory" && $jg_detailpic_open > 3 && ( $jg_showdetailpage == 1 || ( $jg_showdetailpage==0 && $gid>0 ) ) )
    || ( $func=="detail" && ( ( $jg_bigpic==1 && $gid>0 ) || $jg_bigpic==2 ) && $jg_bigpic_open > 3 ) )
    && ( $end != 0 ) && ( $start<$end ) && ( $jg_lightbox_slide_all==1 ) ) {
    if($orderclause==null) {
      if ($jg_secondorder != '' && $jg_thirdorder == '') {
        $orderclause = "a.$jg_firstorder, a.$jg_secondorder";
      } elseif ($jg_secondorder != '' && $jg_thirdorder != '') {
        $orderclause = "a.$jg_firstorder, a.$jg_secondorder, a.$jg_thirdorder";
      } else {
        $orderclause = "a.$jg_firstorder";
      }
    }
    if( $func=="detail" ) {
      $type = ($end==1) ? "before" : "after";
      $database->setQuery( "SELECT count(id)
          FROM #__joomgallery
          WHERE catid=$catid AND approved='1' AND published='1'" );
       $end = $database->loadResult();
    }
    $database->setQuery( "SELECT id, imgfilename, imgthumbname, imgtitle
        FROM #__joomgallery AS a
        LEFT JOIN #__joomgallery_catg AS c ON c.cid=a.catid
        WHERE a.published = '1' AND a.catid = '$catid' AND a.approved = '1' AND c.access <= '$gid'
        ORDER BY $orderclause
        LIMIT $start,".($end-$start));
    $rows = $database->loadObjectList();
    $zaehl = 0;
    $check = 0;

    if( $func=="detail" && $type=="after" ) {
      while($rows[$zaehl]->id!=$id) {
        $zaehl++;
      }
      $zaehl++;
    } elseif( $func=="detail" && $type=="before" && $rows[$zaehl]->id==$id ) {
      $check = 1;
    }
    echo "  <div class=\"jg_displaynone\">\n";
    while( $zaehl<sizeof($rows) && $check!=1 ) {
      if($func=="detail" && $type=="before" && $rows[$zaehl]->id==$id ) {
        $check = 1;
      }
      $row = $rows[$zaehl];
      $catpath = Joom_GetCatPath($catid);
      if( ( $func=="detail" && is_file(_JOOM_ABSOLUTE_PATH . $jg_pathoriginalimages . "/" .$catpath.$row->imgfilename ) )
        || $func=="viewcategory") {
        $link = Joom_OpenImage($jg_bigpic_open, $row->id, $catpath, $row->imgfilename, $row->imgtitle,"");
        echo "    <a href=\"".$link."\">".$row->id."</a>\n";
      }
      $zaehl++;
    }
    echo "  </div>\n";
  }
}
?>
