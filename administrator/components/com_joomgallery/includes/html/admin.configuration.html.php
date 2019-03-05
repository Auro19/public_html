<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/html/admin.configuration.html.php $
// $Id: admin.configuration.html.php 396 2009-03-15 16:06:21Z aha $
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

/******************************************************************************\
*                        Functions / Configuration                             *
\******************************************************************************/

class HTML_Joom_AdminConfig {


  function Joom_ShowConfig_HTML(&$option, &$clist,&$clist2, &$write_pathimages,
                                &$write_pathoriginalimages, &$write_paththumbs,
                                &$write_pathtemp, &$write_wmpath,
                                &$write_pathftpupload, &$write_wmfile,
                                &$gdmsg,$immsg, &$easycaptchamsg, &$exifmsg,
                                &$configmsg) {
    global $mosConfig_absolute_path, $joom_configfile;
    require($joom_configfile);

?>
<script language="javascript" src="../administrator/components/com_joomgallery/assets/js/admin.joomscript.js"></script>
<form action="index2.php" method="post" onSubmit="joom_testDefaultValues();" name="adminForm">
  <table cellpadding="4" cellspacing="0" border="0" width="100%" >
    <tr>
      <td width="100%" class="sectionname" align="left">
        <p>
        <a href='http://www.joomgallery.net/' target='_blank'>
        <img src="../administrator/components/com_joomgallery/assets/images/main2.png" hspace="6" border="0" align="top" width="16" height="16" alt="<?php echo _JGA_JOOMGALLERY; ?>" /></a>&nbsp;
        <span style="font-size:13px; font-weight:bold;">
          <?php echo _JGA_JOOMGALLERY.' :: '._JGA_CONFIGURATION_MANAGER; ?> 
        </span>
        </p>
      </td>
    </tr>
  </table>
<script language="javascript" src="../includes/js/joomla.javascript.js"></script>
<?php

// instantiate new tab system
$tabs = new jmosTabs(1); 
?>
<style type="text/css"> 
.dynamic-tab-pane-control .tab-row .tab {
  width: auto; 
  padding: 5px 5px 2px 5px;
  background: #E7E7E7;
  border:1px solid #949a9c;
}

.dynamic-tab-pane-control .tab-row .tab.selected {
  width: auto !important;
  background: #fff !important;
  border-top-color:#949a9c;
  border-top-width:1px;
  border-top-style:solid;
  border-left-color:#949a9c;
  border-left-width:1px;
  border-left-style:solid;
  border-right-color:#949a9c;
  border-right-width:1px;
  border-right-style:solid;
  border-bottom-color: #fff;
  border-bottom-width:1px;
  border-bottom-style:solid;
  padding: 3px 2px 2px 5px;
  margin: 1px 0px 1px 3px;
  top: 0px;
  height: 17px;
}

.dynamic-tab-pane-control .tab-row .tab.hover {
  width: auto;
  background: #fff;
}
</style>
<?php
// start nested MainPane
$tabs->startPane("NestedmainPane");
// start first nested MainTab "Grundlegende Einstellungen"
$tabs->startNestedTab(_JGA_GENERAL_BACKEND_SETTINGS);
// start first nested tabs pane
$tabs->startPane("NestedPaneTwo");
// start Tab "Grundlegende Einstellungen->Pfade und Verzeichnisse"
$tabs->startTab(_JGA_PATH_DIRECTORIES, "nested-three");
?>
  <div id="page1">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr>
      <td colspan="3"><?php echo _JGA_CONFIGURATION_INTRO . $configmsg; ?></td>
    </tr>
    <tr>
      <td colspan="3"><?php echo _JGA_PATH_DIRECTORIES_INTRO; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td width="15%" align="left" valign="top"><strong><?php echo _JGA_PICTURES_PATH . ':'; ?></strong></td>
      <td width="35%" align="left" valign="top"><input size="50" type="text" name="jg_pathimages" value="<?php echo $jg_pathimages; ?>" /><br />[<?php echo $write_pathimages; ?>]</td>
      <td width="50%" align="left" valign="top"><?php echo _JGA_PATH_PICTURES_STORED; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ORIGINALS_PATH . ':'; ?></strong></td>
      <td align="left" valign="top"><input size="50" type="text" name="jg_pathoriginalimages" value="<?php echo $jg_pathoriginalimages; ?>" /><br />[<?php echo $write_pathoriginalimages; ?>]</td>
      <td align="left" valign="top"><?php echo _JGA_PATH_ORIGINALS_STORED; ?> </td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_THUMBNAILS_PATH . ':'; ?></strong></td>
      <td align="left" valign="top"><input size="50" type="text" name="jg_paththumbs" value="<?php echo $jg_paththumbs; ?>" /><br />[<?php echo $write_paththumbs; ?>]</td>
      <td align="left" valign="top"><?php echo _JGA_PATH_THUMBNAILS_STORED; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_FTPUPLOAD_PATH . ':'; ?></strong></td>
      <td align="left" valign="top"><input size="50" type="text" name="jg_pathftpupload" value="<?php echo $jg_pathftpupload; ?>" /><br />[<?php echo $write_pathftpupload; ?>]</td>
      <td align="left" valign="top"><?php echo _JGA_PATH_FOR_FTPUPLOAD; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_TEMP_PATH . ':'; ?></strong></td>
      <td align="left" valign="top"><input size="50" type="text" name="jg_pathtemp" value="<?php echo $jg_pathtemp; ?>" /><br />[<?php echo $write_pathtemp; ?>]</td>
      <td align="left" valign="top"><?php echo _JGA_PATH_FOR_TEMP; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_WATERMARK_PATH . ':'; ?></strong></td>
      <td align="left" valign="top"><input size="50" type="text" name="jg_wmpath" value="<?php echo $jg_wmpath; ?>" /><br />[<?php echo $write_wmpath; ?>]</td>
      <td align="left" valign="top"><?php echo _JGA_PATH_WATERMARK_STORED; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_WATERMARK_FILE . ':'; ?></strong></td>
      <td align="left" valign="top"><input size="50" type="text" name="jg_wmfile" value="<?php echo $jg_wmfile; ?>" /><br />[<?php echo $write_wmfile; ?>]</td>
      <td align="left" valign="top"><?php echo _JGA_WATERMARK_FILE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_TIME . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $date[] = mosHTML::makeOption('%d-%m-%Y %H:%M:%S', strftime("%d-%m-%Y %H:%M:%S"));
    $date[] = mosHTML::makeOption('%d.%m.%Y %H:%M:%S', strftime("%d.%m.%Y %H:%M:%S"));
    $date[] = mosHTML::makeOption('%m-%d-%Y %H:%M:%S', strftime("%m-%d-%Y %H:%M:%S"));
    $date[] = mosHTML::makeOption('%m.%d.%Y %H:%M:%S', strftime("%m.%d.%Y %H:%M:%S"));
    $date[] = mosHTML::makeOption('%m/%d/%Y %I:%M:%S %p', strftime("%m/%d/%Y %I:%M:%S %p"));
    $date[] = mosHTML::makeOption('%c', strftime("%c"));
    $mc_jg_dateformat= mosHTML::selectList($date, 'jg_dateformat', 'class="inputbox" size="1"', 'value', 'text', $jg_dateformat);
    echo $mc_jg_dateformat;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_TIME_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Grundlegende Einstellungen->Pfade und Verzeichnisse"
$tabs->endTab();
// start Tab "Grundlegende Einstellungen->Ersetzungen"
$tabs->startTab(_JGA_BACKEND_REPLACEMENTS, "nested-twentyeight");
?>
  <div id="page26">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr>
      <td  colspan="3"><div align="center"><?php echo _JGA_BACKEND_REPLACEMENTS_INTRO; ?></div></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_FILENAME_WITHJS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yesno[] = mosHTML::makeOption('0', _JGA_NO);
    $yesno[] = mosHTML::makeOption('1', _JGA_YES);
    $yn_jg_filenamewithjs = mosHTML::selectList($yesno, 'jg_filenamewithjs', 'class="inputbox" size="2"', 'value', 'text', $jg_filenamewithjs);
    echo $yn_jg_filenamewithjs;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_FILENAME_WITHJS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_FILENAME_SEARCH . ':'; ?></strong></td>
      <td align="left" valign="top">
       <input size="50" type="text" name="jg_filenamesearch" value="<?php echo $jg_filenamesearch ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_FILENAME_SEARCH_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_FILENAME_REPLACE . ':'; ?></strong></td>
      <td align="left" valign="top">
       <input size="50" type="text" name="jg_filenamereplace" value="<?php echo $jg_filenamereplace; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_FILENAME_REPLACE_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Grundlegende Einstellungen->Ersetzungen"
$tabs->endTab();
// start Tab "Grundlegende Einstellungen->Bildmanipulation"
$tabs->startTab(_JGA_PICTURE_PROCESSING, "nested-four");
?>
  <div id="page2">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr>
      <td  colspan="3"><div align="center"><strong><?php echo $gdmsg; ?></strong></div></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_PICTURE_CREATOR . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $thumbcreator[] = mosHTML::makeOption('none', _JGA_NONE);
    $thumbcreator[] = mosHTML::makeOption('gd1', _JGA_GDLIB);
    $thumbcreator[] = mosHTML::makeOption('gd2', _JGA_GD2LIB);
    $thumbcreator[] = mosHTML::makeOption('im', _JGA_IMAGEMAGICK);
    $mc_jg_thumbcreation = mosHTML::selectList($thumbcreator, 'jg_thumbcreation', 'class="inputbox" size="4"', 'value', 'text', $jg_thumbcreation);
    echo $mc_jg_thumbcreation;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_PICTURE_CREATOR_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_FAST_GD2_THUMBCREATION . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_fastgd2 = mosHTML::selectList($yesno, 'jg_fastgd2thumbcreation', 'class="inputbox" size="2"', 'value', 'text', $jg_fastgd2thumbcreation);
    echo $yn_jg_fastgd2;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_FAST_GD2_THUMBCREATION_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><b><?php echo _JGA_PATH_TO_IMAGEMAGICK . ':'; ?></b></td>
      <td align="left" valign="top"><input size="50" type="text" name="jg_impath" value="<?php echo $jg_impath; ?>" /></td>
      <td align="left" valign="top"><?php echo $immsg; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_RESIZING . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_resize = mosHTML::selectList($yesno, 'jg_resizetomaxwidth', 'class="inputbox" size="2"', 'value', 'text', $jg_resizetomaxwidth);
    echo $yn_jg_resize;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_RESIZING_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_MAX_WIDTH . ':'; ?></strong></td>
      <td align="left" valign="top">
      <input type="text" name="jg_maxwidth" value="<?php echo $jg_maxwidth; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_MAX_WIDTH_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_PICTURE_QUALITY . ':'; ?></strong></td>
      <td align="left" valign="top">
      <input type="text" name="jg_picturequality" value="<?php echo $jg_picturequality; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_PICTURE_QUALITY_LONG; ?></td>
    </tr>
    <tr>
      <td  colspan="3"><div align="center"><?php echo _JGA_THUMBNAILS_INTRO; ?></div></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_DIRECTION_RESIZE . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $directionresize[] = mosHTML::makeOption('0', _JGA_SAMEHIGHT);
    $directionresize[] = mosHTML::makeOption('1', _JGA_SAMEWIDTH);
    $mc_jg_useforresizedirection = mosHTML::selectList($directionresize, 'jg_useforresizedirection', 'class="inputbox" size="2"', 'value', 'text', $jg_useforresizedirection);
    echo $mc_jg_useforresizedirection;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_DIRECTION_RESIZE_LONG ;?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_THUMBNAIL_WIDTH . ':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_thumbwidth" value="<?php echo "$jg_thumbwidth"; ?>"/></td>
      <td align="left" valign="top"><?php echo _JGA_THUMBNAIL_WIDTH_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_THUMBNAIL_HEIGHT . ':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_thumbheight" value="<?php echo "$jg_thumbheight"; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_THUMBNAIL_HEIGHT_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_THUMBNAIL_QUALITY . ':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_thumbquality" value="<?php echo "$jg_thumbquality"; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_THUMBNAIL_QUALITY_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Grundlegende Einstellungen->Bildmanipulation"
$tabs->endTab();
// start Tab "Grundlegende Einstellungen->Backend-Upload"
$tabs->startTab(_JGA_BACKEND_UPLOAD, "nested-seven");
?>
  <div id="page5">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_UPLOAD_ORDER . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $uploadordering[] = mosHTML::makeOption('0', _JGA_NO_ORDER);
    $uploadordering[] = mosHTML::makeOption('1', _JGA_DESCENDING);
    $uploadordering[] = mosHTML::makeOption('2', _JGA_ASCENDING);
    $mc_jg_uploadorder = mosHTML::selectList($uploadordering, 'jg_uploadorder', 'class="inputbox" size="3"', 'value', 'text', $jg_uploadorder);
    echo $mc_jg_uploadorder;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_UPLOAD_ORDER_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ORIGINAL_FILENAME . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_useorigfilename = mosHTML::selectList($yesno, 'jg_useorigfilename', 'class="inputbox" size="2"', 'value', 'text', $jg_useorigfilename);
    echo $yn_jg_useorigfilename;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ORIGINAL_FILENAME_LONG ;?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_FILENAMENUMBER . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_filenamenumber = mosHTML::selectList($yesno, 'jg_filenamenumber', 'class="inputbox" size="2"', 'value', 'text', $jg_filenamenumber);
    echo $yn_jg_filenamenumber;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_FILENAMENUMBER_LONG ;?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_DELETE_ORIGINAL; ?></strong></td>
      <td align="left" valign="top">
<?php
    $delete_original[] = mosHTML::makeOption('0', _JGA_NO);
    $delete_original[] = mosHTML::makeOption('1', _JGA_DELETE_ALL_ORIGINALS);
    $delete_original[] = mosHTML::makeOption('2', _JGA_DELETE_ORIGINAL_CHECKBOX);
    $mc_jg_delete_original = mosHTML::selectList($delete_original, 'jg_delete_original', 'class="inputbox" size="3"', 'value', 'text', $jg_delete_original);
    echo $mc_jg_delete_original;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_DELETE_ORIGINAL_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_WRONG_VALUE_COLOR . ':'; ?></strong></td>
      <td align="left" valign="top">
       <input size="50" type="text" name="jg_wrongvaluecolor" value="<?php echo $jg_wrongvaluecolor; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_WRONG_VALUE_COLOR_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Grundlegende Einstellungen->Backend-Upload"
$tabs->endTab();
// start Tab "Grundlegende Einstellungen->Zusaetzliche Funktionen"
$tabs->startTab(_JGA_MORE_FUNCTIONS, "nested-eight");
?>
  <div id="page6">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_COMBUILDER_SUPPORT . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $combuild_options[] = mosHTML::makeOption('0', _JGA_NO);
    $combuild_options[] = mosHTML::makeOption('1', _JGA_COMBUILDER_SETTING_CB);
    $combuild_options[] = mosHTML::makeOption('2', _JGA_COMBUILDER_SETTING_CBE);
    $combuild_options[] = mosHTML::makeOption('3', _JGA_COMBUILDER_SETTING_JOMSOCIAL);
    $mc_jg_combuild = mosHTML::selectList($combuild_options, 'jg_combuild', 'class="inputbox" size="4"', 'value', 'text', $jg_combuild);

    echo $mc_jg_combuild;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_COMBUILDER_SUPPORT_LONG; ?></td>
    </tr>
    
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_USERNAME_REALNAME; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_realname = mosHTML::selectList($yesno, 'jg_realname', 'class="inputbox" size="2"', 'value', 'text', $jg_realname);
    echo $yn_jg_realname;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_USERNAME_REALNAME_LONG; ?></td>
    </tr>
    
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_BRIDGE_INSTALLED; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_bridge = mosHTML::selectList($yesno, 'jg_bridge', 'class="inputbox" size="2"', 'value', 'text', $jg_bridge);
    echo $yn_jg_bridge;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_BRIDGE_INSTALLED_LONG; ?></td>
    </tr>

    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_COOLIRIS_SUPPORT; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_cooliris = mosHTML::selectList($yesno, 'jg_cooliris', 'class="inputbox" size="2"', 'value', 'text', $jg_cooliris);
    echo $yn_jg_cooliris;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_COOLIRIS_SUPPORT_LONG; ?></td>
    </tr>    
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_COOLIRIS_LINK; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_coolirislink = mosHTML::selectList($yesno, 'jg_coolirislink', 'class="inputbox" size="2"', 'value', 'text', $jg_coolirislink);
    echo $yn_jg_coolirislink;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_COOLIRIS_LINK_LONG; ?></td>
    </tr>     
  </table>
  </div>
<?php
// end Tab "Grundlegende Einstellungen->Zusaetzliche Funktionen"
$tabs->endTab();
// end first nested tabs pane NestedPaneTwo
$tabs->endPane();
// end first nested MainTab "Grundlegende Einstellungen"
$tabs->endTab();

// start second nested MainTab "Benutzer-Rechte"
$tabs->startNestedTab(_JGA_USER_RIGHTS);
// start second nested tabs pane
$tabs->startPane("NestedPaneThree");
// start Tab "Benutzer-Rechte->Benutzer-Upload ueber "Meine Galerie""
$tabs->startTab(_JGA_USER_UPLOAD_SETTINGS, "nested-ten");
?>
  <div id="page8">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><b><?php echo _JGA_ALLOWED_USERSPACE . ':';?></b></td>
      <td align="left" valign="top">
<?php
    $yn_jg_userspace = mosHTML::selectList($yesno, 'jg_userspace', 'class="inputbox" size="2"', 'value', 'text', $jg_userspace);
    echo $yn_jg_userspace;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOWED_USERSPACE_LONG;?></td>
    </tr> 
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_APPROVAL_NEEDED . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_approve = mosHTML::selectList($yesno, 'jg_approve', 'class="inputbox" size="2"', 'value', 'text', $jg_approve);
    echo $yn_jg_approve;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_APPROVAL_NEEDED_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ALLOWED_CAT . ':'; ?></strong></td>
      <td align="left" valign="top">
      <?php echo $clist; ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOWED_CAT_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><b><?php echo _JGA_ALLOWED_USERCAT;?></b></td>
      <td align="left" valign="top">
<?php
    $yn_jg_usercat = mosHTML::selectList($yesno, 'jg_usercat', 'class="inputbox" size="2"', 'value', 'text', $jg_usercat);
    echo $yn_jg_usercat;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOWED_USERCAT_LONG;?></td>
    </tr> 
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ALLOWED_USERCATPARENT; ?></strong></td>
      <td align="left" valign="top">
      <?php echo $clist2; ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOWED_USERCATPARENT_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><b><?php echo _JGA_USERCATACC;?></b></td>
      <td align="left" valign="top">
<?php
    $yn_jg_usercatacc = mosHTML::selectList($yesno, 'jg_usercatacc', 'class="inputbox" size="2"', 'value', 'text', $jg_usercatacc);
    echo $yn_jg_usercatacc;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_USERCATACC_LONG;?></td>
    </tr>        
    <tr align="center" valign="middle">
        <td align="left" valign="top"><b><?php echo _JGA_MAX_ALLOWED_USERCATS;?></b></td>
      <td align="left" valign="top">
      <input type="text" name="jg_maxusercat" value="<?php echo $jg_maxusercat; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_MAX_ALLOWED_USERCATS_LONG;?></td>
    </tr>
      
    <tr align="center" valign="middle">
      <td align="left" valign="top"><b><?php echo _JGA_USERCATSOWNUPLOAD;?></b></td>
      <td align="left" valign="top">
<?php
    $yn_jg_userowncatsupload = mosHTML::selectList($yesno, 'jg_userowncatsupload', 'class="inputbox" size="2"', 'value', 'text', $jg_userowncatsupload);
    echo $yn_jg_userowncatsupload;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_USERCATSOWNUPLOAD_LONG;?></td>
    </tr>       
    
    <tr align="center" valign="middle">
      <td align="left" valign="top"><b><?php echo _JGA_MAX_ALLOWED_PICS . ':'; ?></b></td>
      <td align="left" valign="top">
      <input type="text" name="jg_maxuserimage" value="<?php echo $jg_maxuserimage; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_MAX_ALLOWED_PICS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_MAX_ALLOWED_FILESIZE . ':'; ?></strong></td>
      <td align="left" valign="top">
        <input type="text" name="jg_maxfilesize" value="<?php echo $jg_maxfilesize; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_MAX_ALLOWED_FILESIZE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_MAX_UPLOAD_FIELDS . ':'; ?></strong></td>
      <td align="left" valign="top">
        <input type="text" name="jg_maxuploadfields" value="<?php echo $jg_maxuploadfields; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_MAX_UPLOAD_FIELDS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_USERUPLOAD_NUMBERING . ':'; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_jg_useruploadnumber = mosHTML::selectList( $yesno, 'jg_useruploadnumber', 'class="inputbox" size="2"', 'value', 'text', $jg_useruploadnumber );
        echo $yn_jg_useruploadnumber;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_USERUPLOAD_NUMBERING_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ALLOW_SPECIAL_GIF_UPLOAD . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_special_gif_upload = mosHTML::selectList($yesno, 'jg_special_gif_upload', 'class="inputbox" size="2"', 'value', 'text', $jg_special_gif_upload);
    echo $yn_jg_special_gif_upload;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOW_SPECIAL_GIF_UPLOAD_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_DELETE_ORIGINAL; ?></strong></td>
      <td align="left" valign="top">
<?php
    $delete_original_user[] = mosHTML::makeOption('0', _JGA_NO);
    $delete_original_user[] = mosHTML::makeOption('1', _JGA_DELETE_ALL_ORIGINALS);
    $delete_original_user[] = mosHTML::makeOption('2', _JGA_DELETE_ORIGINAL_CHECKBOX);
    $mc_jg_delete_original_user = mosHTML::selectList($delete_original_user, 'jg_delete_original_user', 'class="inputbox" size="3"', 'value', 'text', $jg_delete_original_user);
    echo $mc_jg_delete_original_user;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_DELETE_ORIGINAL_USER_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_COPYRIGHT; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_newpiccopyright = mosHTML::selectList($yesno, 'jg_newpiccopyright', 'class="inputbox" size="2"', 'value', 'text', $jg_newpiccopyright);
    echo $yn_jg_newpiccopyright;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_COPYRIGHT_LONG ;?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_UPLOADNOTE; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_newpicnote = mosHTML::selectList($yesno, 'jg_newpicnote', 'class="inputbox" size="2"', 'value', 'text', $jg_newpicnote);
    echo $yn_jg_newpicnote;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_UPLOADNOTE_LONG ;?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Benutzer-Rechte->Benutzer-Upload ueber "Meine Galerie""
$tabs->endTab();
// start Tab "Benutzer-Rechte->Bewertungen"
$tabs->startTab(_JGA_RATE_SETTINGS, "nested-eleven");
?>
  <div id="page9">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ALLOW_RATING . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showrating = mosHTML::selectList($yesno, 'jg_showrating', 'class="inputbox" size="2"', 'value', 'text', $jg_showrating);
    echo $yn_jg_showrating;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOW_RATING_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_HIGHEST_RATING . ':' ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_maxvoting" value="<?php echo "$jg_maxvoting"; ?>"></td>
      <td align="left" valign="top"><?php echo _JGA_HIGHEST_RATING_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ALLOW_RATING_ONLY_REGUSER . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_onlyreguservotes = mosHTML::selectList($yesno, 'jg_onlyreguservotes', 'class="inputbox" size="2"', 'value', 'text', $jg_onlyreguservotes);
    echo $yn_jg_onlyreguservotes;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOW_RATING_ONLY_REGUSER_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Benutzer-Rechte->Bewertungen"
$tabs->endTab();
// start Tab "Benutzer-Rechte->Kommentare"
$tabs->startTab(_JGA_COMMENT_SETTINGS, "nested-twelve");
?>
  <div id="page10">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ALLOW_COMMENTS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showcomment = mosHTML::selectList($yesno, 'jg_showcomment', 'class="inputbox" size="2"', 'value', 'text', $jg_showcomment);
    echo $yn_jg_showcomment;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOW_COMMENTS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ALLOW_ANONYM_COMMENTS .':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_anoncomment = mosHTML::selectList($yesno, 'jg_anoncomment', 'class="inputbox" size="2"', 'value', 'text', $jg_anoncomment);
    echo $yn_jg_anoncomment;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOW_ANONYM_COMMENTS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_NAMED_ANONYM_COMMENTS .':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_namedanoncomment = mosHTML::selectList($yesno, 'jg_namedanoncomment', 'class="inputbox" size="2"', 'value', 'text', $jg_namedanoncomment);
    echo $yn_jg_namedanoncomment;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_NAMED_ANONYM_COMMENTS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_COMMENTS_APPROVE_NEEDED . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $commentsapprove[] = mosHTML::makeOption('0', _JGA_NO);
    $commentsapprove[] = mosHTML::makeOption('1', _JGA_ONLY_UNREGUSERS);
    $commentsapprove[] = mosHTML::makeOption('2', _JGA_REG_AND_UNREGUSERS);
    $mc_jg_approvecom = mosHTML::selectList($commentsapprove, 'jg_approvecom', 'class="inputbox" size="3"', 'value', 'text', $jg_approvecom);
    echo $mc_jg_approvecom;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_COMMENTS_APPROVE_NEEDED_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_CAPTCHA_COMMENTS; ?></strong></td>
      <td align="left" valign="top">
<?php
    $secimages[] = mosHTML::makeOption('0', _JGA_NO);
    $secimages[] = mosHTML::makeOption('1', _JGA_ONLY_UNREGUSERS);
    $secimages[] = mosHTML::makeOption('2', _JGA_REG_AND_UNREGUSERS);
    $mc_jg_secimages = mosHTML::selectList($secimages, 'jg_secimages', 'class="inputbox" size="3"', 'value', 'text', $jg_secimages);
    echo $mc_jg_secimages;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_CAPTCHA_COMMENTS_LONG . $easycaptchamsg; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ALLOW_COMMENTS_BBCODE . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_bbcodesupport = mosHTML::selectList($yesno, 'jg_bbcodesupport', 'class="inputbox" size="2"', 'value', 'text', $jg_bbcodesupport);
    echo $yn_jg_bbcodesupport;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOW_COMMENTS_BBCODE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ALLOW_COMMENTS_SMILIES . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_smiliesupport = mosHTML::selectList($yesno, 'jg_smiliesupport', 'class="inputbox" size="2"', 'value', 'text', $jg_smiliesupport);
    echo $yn_jg_smiliesupport;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOW_COMMENTS_SMILIES_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ALLOW_COMMENTS_ANISMILIES . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_anismilie = mosHTML::selectList($yesno, 'jg_anismilie', 'class="inputbox" size="2"', 'value', 'text', $jg_anismilie);
    echo $yn_jg_anismilie;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOW_COMMENTS_ANISMILIES_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SMILIES_COLOR; ?></strong></td>
      <td align="left" valign="top">
<?php
    $smiliescolor[] = mosHTML::makeOption('grey', _JGA_GREY);
    $smiliescolor[] = mosHTML::makeOption('orange', _JGA_ORANGE);
    $smiliescolor[] = mosHTML::makeOption('yellow', _JGA_YELLOW);
    $smiliescolor[] = mosHTML::makeOption('blue', _JGA_BLUE);
    $mc_jg_smiliescolor = mosHTML::selectList($smiliescolor, 'jg_smiliescolor', 'class="inputbox" size="4"', 'value', 'text', $jg_smiliescolor);
    echo $mc_jg_smiliescolor;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SMILIES_COLOR_LONG; ?></td>
    </tr>
    <tr>
  </table>
  </div>
<?php
// end Tab "Benutzer-Rechte->Kommentare"
$tabs->endTab();
// end second nested tabs pane NestedPaneThree
$tabs->endPane();
// end first nested MainTab "Benutzer-Rechte"
$tabs->endTab();


// start third nested MainTab "Frontend Einstellungen"
$tabs->startNestedTab(_JGA_FRONTEND_SETTINGS);
// start third nested tabs pane
$tabs->startPane("NestedPaneFour");
// start Tab "Frontend Einstellungen->Anordnung der Bilder"
$tabs->startTab(_JGA_PICORDER, "nested-thirteen");
?>
  <div id="page11">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr>
      <td  colspan="3"><div align="center"><?php echo _JGA_PICORDER_INTRO; ?></div></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_PICORDER_FIRST . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $picorder[] = mosHTML::makeOption('ordering ASC', _JGA_ORDERBY_ORDERING_ASC);
    $picorder[] = mosHTML::makeOption('ordering DESC', _JGA_ORDERBY_ORDERING_DESC);
    $picorder[] = mosHTML::makeOption('imgdate ASC', _JGA_ORDERBY_UPLOADTIME_ASC);
    $picorder[] = mosHTML::makeOption('imgdate DESC', _JGA_ORDERBY_UPLOADTIME_DESC);
    $picorder[] = mosHTML::makeOption('imgtitle ASC', _JGA_ORDERBY_PICTITLE_ASC);
    $picorder[] = mosHTML::makeOption('imgtitle DESC', _JGA_ORDERBY_PICTITLE_DESC);
    $mc_jg_firstorder = mosHTML::selectList($picorder, 'jg_firstorder', 'class="inputbox" size="1"', 'value', 'text', $jg_firstorder);
    echo $mc_jg_firstorder;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_PICORDER_FIRST_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_PICORDER_SECOND . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $picorder2[] = mosHTML::makeOption('', _JGA_PICORDER_NO);
    $picorder2[] = mosHTML::makeOption('ordering ASC', _JGA_ORDERBY_ORDERING_ASC);
    $picorder2[] = mosHTML::makeOption('ordering DESC', _JGA_ORDERBY_ORDERING_DESC);
    $picorder2[] = mosHTML::makeOption('imgdate ASC', _JGA_ORDERBY_UPLOADTIME_ASC);
    $picorder2[] = mosHTML::makeOption('imgdate DESC', _JGA_ORDERBY_UPLOADTIME_DESC);
    $picorder2[] = mosHTML::makeOption('imgtitle ASC', _JGA_ORDERBY_PICTITLE_ASC);
    $picorder2[] = mosHTML::makeOption('imgtitle DESC', _JGA_ORDERBY_PICTITLE_DESC);
    $mc_jg_secondorder = mosHTML::selectList($picorder2, 'jg_secondorder', 'class="inputbox" size="1"', 'value', 'text', $jg_secondorder);
    echo $mc_jg_secondorder;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_PICORDER_SECOND_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_PICORDER_THIRD . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $picorder3[] = mosHTML::makeOption('', _JGA_PICORDER_NO);
    $picorder3[] = mosHTML::makeOption('ordering ASC', _JGA_ORDERBY_ORDERING_ASC);
    $picorder3[] = mosHTML::makeOption('ordering DESC', _JGA_ORDERBY_ORDERING_DESC);
    $picorder3[] = mosHTML::makeOption('imgdate ASC', _JGA_ORDERBY_UPLOADTIME_ASC);
    $picorder3[] = mosHTML::makeOption('imgdate DESC', _JGA_ORDERBY_UPLOADTIME_DESC);
    $picorder3[] = mosHTML::makeOption('imgtitle ASC', _JGA_ORDERBY_PICTITLE_ASC);
    $picorder3[] = mosHTML::makeOption('imgtitle DESC', _JGA_ORDERBY_PICTITLE_DESC);
    $mc_jg_thirdorder = mosHTML::selectList($picorder3, 'jg_thirdorder', 'class="inputbox" size="1"', 'value', 'text', $jg_thirdorder);
    echo $mc_jg_thirdorder;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_PICORDER_THIRD_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Frontend Einstellungen->Anordnung der Bilder"
$tabs->endTab();
// start Tab "Frontend Einstellungen->Seitentitel"
$tabs->startTab(_JGA_PAGETITLE_SETTINGS, "nested-fourteen");
?>
  <div id="page12">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr>
      <td colspan="3"><?php echo _JGA_PAGETITLE_SETTINGS_INTRO; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_PAGETITLE_CATVIEW .':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_pagetitle_cat" value="<?php echo $jg_pagetitle_cat; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_PAGETITLE_CATVIEW_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_PAGETITLE_DETAILVIEW .':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_pagetitle_detail" value="<?php echo $jg_pagetitle_detail; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_PAGETITLE_DETAILVIEW_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Frontend Einstellungen->Seitentitel"
$tabs->endTab();
// start Tab "Frontend Einstellungen->Kopf- und Fussbereich"
$tabs->startTab(_JGA_HEADER_AND_FOOTER, "nested-fifteen");
?>
  <div id="page13">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr>
      <td colspan="3"><?php echo _JGA_HEADER_AND_FOOTER_INTRO; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_GALLERYHEAD . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showgalleryhead = mosHTML::selectList($yesno, 'jg_showgalleryhead', 'class="inputbox" size="2"', 'value', 'text', $jg_showgalleryhead);
    echo $yn_jg_showgalleryhead;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_GALLERYHEAD_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_PATHWAY . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $pathway[] = mosHTML::makeOption('0', _JGA_NO_DISPLAY);
    $pathway[] = mosHTML::makeOption('1', _JGA_SHOW_IN_HEADER);
    $pathway[] = mosHTML::makeOption('2', _JGA_SHOW_IN_FOOTER);
    $pathway[] = mosHTML::makeOption('3', _JGA_SHOW_IN_HEADERFOOTER);
    $mc_jg_showpathway = mosHTML::selectList($pathway, 'jg_showpathway', 'class="inputbox" size="4"', 'value', 'text', $jg_showpathway);
    echo $mc_jg_showpathway;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_PATHWAY_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_COMPLETE_BREADCRUMBS; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_completebreadcrumbs = mosHTML::selectList($yesno, 'jg_completebreadcrumbs', 'class="inputbox" size="2"', 'value', 'text', $jg_completebreadcrumbs);
    echo $yn_jg_completebreadcrumbs;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_COMPLETE_BREADCRUMBS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_SEARCHFIELD . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $search[] = mosHTML::makeOption('0', _JGA_NO_DISPLAY);
    $search[] = mosHTML::makeOption('1', _JGA_SHOW_IN_HEADER);
    $search[] = mosHTML::makeOption('2', _JGA_SHOW_IN_FOOTER);
    $search[] = mosHTML::makeOption('3', _JGA_SHOW_IN_HEADERFOOTER);
    $mc_jg_search = mosHTML::selectList($search, 'jg_search', 'class="inputbox" size="4"', 'value', 'text', $jg_search);
    echo $mc_jg_search;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_SEARCHFIELD_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_ALLPICS; ?></strong></td>
      <td align="left" valign="top">
<?php
    $shownumbpics[] = mosHTML::makeOption('0', _JGA_NO_DISPLAY);
    $shownumbpics[] = mosHTML::makeOption('1', _JGA_SHOW_IN_HEADER);
    $shownumbpics[] = mosHTML::makeOption('2', _JGA_SHOW_IN_FOOTER);
    $shownumbpics[] = mosHTML::makeOption('3', _JGA_SHOW_IN_HEADERFOOTER);
    $mc_jg_showallpics = mosHTML::selectList($shownumbpics, 'jg_showallpics', 'class="inputbox" size="4"', 'value', 'text', $jg_showallpics);
    echo $mc_jg_showallpics;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_ALLPICS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_ALLHITS; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showallhits = mosHTML::selectList($yesno, 'jg_showallhits', 'class="inputbox" size="2"', 'value', 'text', $jg_showallhits);
    echo $yn_jg_showallhits;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_ALLHITS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_BACKLINK; ?></strong></td>
      <td align="left" valign="top">
<?php
    $showbacklink[] = mosHTML::makeOption('0', _JGA_NO_DISPLAY);
    $showbacklink[] = mosHTML::makeOption('1', _JGA_SHOW_IN_HEADER);
    $showbacklink[] = mosHTML::makeOption('2', _JGA_SHOW_IN_FOOTER);
    $showbacklink[] = mosHTML::makeOption('3', _JGA_SHOW_IN_HEADERFOOTER);
    $mc_jg_showbacklink = mosHTML::selectList($showbacklink, 'jg_showbacklink', 'class="inputbox" size="4"', 'value', 'text', $jg_showbacklink);
    echo $mc_jg_showbacklink;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_BACKLINK_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_CREDITS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_suppress = mosHTML::selectList($yesno, 'jg_suppresscredits', 'class="inputbox" size="2"', 'value', 'text', $jg_suppresscredits);
    echo $yn_jg_suppress;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_CREDITS_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Frontend Einstellungen->Kopf- und Fussbereich"
$tabs->endTab();
// start Tab "Frontend Einstellungen->Meine Galerie"
$tabs->startTab(_JGA_USER_PANEL, "nested-sixteen");
?>
  <div id="page14">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_USER_PANEL . _JGA_USER_PANEL . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $suserpanel[] = mosHTML::makeOption('0', _JGA_NO_DISPLAY);
    $suserpanel[] = mosHTML::makeOption('1', _JGA_DISPLAY_TO_RMSM);
    $suserpanel[] = mosHTML::makeOption('2', _JGA_DISPLAY_TO_SM);
    $suserpanel[] = mosHTML::makeOption('3', _JGA_DISPLAY_TO_ALL);
    $mc_jg_showuserpanel = mosHTML::selectList($suserpanel, 'jg_showuserpanel', 'class="inputbox" size="4"', 'value', 'text', $jg_showuserpanel);
    echo $mc_jg_showuserpanel;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_USER_PANEL_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_ALLPICSTOADMIN . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showallpicstoadmin = mosHTML::selectList($yesno, 'jg_showallpicstoadmin', 'class="inputbox" size="2"', 'value', 'text', $jg_showallpicstoadmin);
    echo $yn_jg_showallpicstoadmin;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_ALLPICSTOADMIN_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_MINITHUMBS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showminithumbs = mosHTML::selectList($yesno, 'jg_showminithumbs', 'class="inputbox" size="2"', 'value', 'text', $jg_showminithumbs);
    echo $yn_jg_showminithumbs;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_MINITHUMBS_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Frontend Einstellungen->Meine Galerie"
$tabs->endTab();
// start Tab "Frontend Einstellungen->PopUp-Funktionen"
$tabs->startTab(_JGA_POPUP_SETTINGS, "nested-eighteen");
?>
  <div id="page16">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_POPUP_OPENJS_BORDERPX .':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_openjs_padding" value="<?php echo $jg_openjs_padding; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_POPUP_OPENJS_BORDERPX_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_POPUP_OPENJS_BACKGROUND .':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_openjs_background" value="<?php echo $jg_openjs_background; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_POPUP_OPENJS_BACKGROUND_LONG . ' ' . _JGA_STYLE_COLOR_HEX; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_POPUP_DHTML_BORDER .':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_dhtml_border" value="<?php echo $jg_dhtml_border; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_POPUP_DHTML_BORDER_LONG . ' ' . _JGA_STYLE_COLOR_HEX; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_POPUP_DHTML_SHOW_TITLE .':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_show_title_in_dhtml = mosHTML::selectList($yesno, 'jg_show_title_in_dhtml', 'class="inputbox" size="2"', 'value', 'text', $jg_show_title_in_dhtml);
    echo $yn_jg_show_title_in_dhtml;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_POPUP_DHTML_SHOW_TITLE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_POPUP_DHTML_SHOW_DESCRIPTION .':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_show_description_in_dhtml = mosHTML::selectList($yesno, 'jg_show_description_in_dhtml', 'class="inputbox" size="2"', 'value', 'text', $jg_show_description_in_dhtml);
    echo $yn_jg_show_description_in_dhtml;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_POPUP_DHTML_SHOW_DESCRIPTION_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_POPUP_LIGHTBOX_OVERLAY .':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_lightbox_overlay" value="<?php echo $jg_lightbox_overlay; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_POPUP_LIGHTBOX_OVERLAY_LONG . ' ' . _JGA_STYLE_COLOR_HEX; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_POPUP_LIGHTBOX_SPEED .':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_lightbox_speed" value="<?php echo $jg_lightbox_speed; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_POPUP_LIGHTBOX_SPEED_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_POPUP_LIGHTBOX_SLIDEALL .':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_lightbox_slide_all = mosHTML::selectList($yesno, 'jg_lightbox_slide_all', 'class="inputbox" size="2"', 'value', 'text', $jg_lightbox_slide_all);
    echo $yn_jg_lightbox_slide_all;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_POPUP_LIGHTBOX_SLIDEALL_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_POPUP_JS_IMAGERESIZE .':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_resize_js_image = mosHTML::selectList($yesno, 'jg_resize_js_image', 'class="inputbox" size="2"', 'value', 'text', $jg_resize_js_image);
    echo $yn_jg_resize_js_image;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_POPUP_JS_IMAGERESIZE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_POPUP_DISABLE_RIGHTCLICK .':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_disable_rightclick_original = mosHTML::selectList($yesno, 'jg_disable_rightclick_original', 'class="inputbox" size="2"', 'value', 'text', $jg_disable_rightclick_original);
    echo $yn_jg_disable_rightclick_original;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_POPUP_DISABLE_RIGHTCLICK_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Frontend Einstellungen->PopUp-Funktionen"
$tabs->endTab();
// end third nested tabs pane NestedPaneFour
$tabs->endPane();
// end third nested MainTab "Frontend Einstellungen"
$tabs->endTab();


// start fourth nested MainTab "Galerie-Ansicht"
$tabs->startNestedTab(_JGA_GALLERY_VIEW);
// start fourth nested tabs pane
$tabs->startPane("NestedPaneFive");
// start Tab "Galerie-Ansicht->Generelle Einstellungen"
$tabs->startTab(_JGA_GENERAL_SETTINGS, "nested-nineteen");
?>
  <div id="page17">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_GALLERY_PATHWAY . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showgallerysubhead = mosHTML::selectList($yesno, 'jg_showgallerysubhead', 'class="inputbox" size="2"', 'value', 'text', $jg_showgallerysubhead);
    echo $yn_jg_showgallerysubhead;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_GALLERY_PATHWAY_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_GALLERYHEADER . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showallcathead = mosHTML::selectList($yesno, 'jg_showallcathead', 'class="inputbox" size="2"', 'value', 'text', $jg_showallcathead);
    echo $yn_jg_showallcathead;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_GALLERYHEADER_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_NUMB_COLUMN . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $numbercatcols[] = mosHTML::makeOption('1', _JGA_ONECOLUMN);
    $numbercatcols[] = mosHTML::makeOption('2', _JGA_TWOCOLUMNS);
    $numbercatcols[] = mosHTML::makeOption('3', _JGA_THREECOLUMNS);
    $numbercatcols[] = mosHTML::makeOption('4', _JGA_FOURCOLUMNS);
    $mc_jg_colcat = mosHTML::selectList($numbercatcols, 'jg_colcat', 'class="inputbox" size="4"', 'value', 'text', $jg_colcat);
    echo $mc_jg_colcat;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_NUMB_GALLERY_COLUMN; ?></td>
    </tr>
    <tr align="center" valign="middle"   >
      <td align="left" valign="top"><strong><?php echo _JGA_GALLERYCATS_PER_PAGE . ':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_catperpage" value="<?php echo "$jg_catperpage"; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_GALLERYCATS_PER_PAGE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ORDER_BY_ALPHA . ':'; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_jg_ordercatbyalpha = mosHTML::selectList( $yesno, 'jg_ordercatbyalpha', 'class="inputbox" size="2"', 'value', 'text', $jg_ordercatbyalpha );
        echo $yn_jg_ordercatbyalpha;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ORDER_GALLERYCATS_BY_ALPHA_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_PAGENAVIGATION . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $showpagecatnavi[] = mosHTML::makeOption('1', _JGA_DISPLAY_TOP_ONLY);
    $showpagecatnavi[] = mosHTML::makeOption('2', _JGA_DISPLAY_TOP_AND_BOTTOM);
    $showpagecatnavi[] = mosHTML::makeOption('3', _JGA_DISPLAY_BOTTOM_ONLY);
    $mc_jg_showgallerypagenav = mosHTML::selectList($showpagecatnavi, 'jg_showgallerypagenav', 'class="inputbox" size="3"', 'value', 'text', $jg_showgallerypagenav);
    echo $mc_jg_showgallerypagenav;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_GALLERY_PAGENAVIGATION; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_NUMB_GALLERYCATS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showcatcount = mosHTML::selectList($yesno, 'jg_showcatcount', 'class="inputbox" size="2"', 'value', 'text', $jg_showcatcount);
    echo $yn_jg_showcatcount;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_NUMB_GALLERYCATS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_CATEGORYTHUMBNAIL . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $catthumbs[] = mosHTML::makeOption('0', _JGA_DISPLAY_NONE);
    $catthumbs[] = mosHTML::makeOption('1', _JGA_DISPLAY_RANDOM);
    $catthumbs[] = mosHTML::makeOption('2', _JGA_DISPLAY_MYCHOISE);
    $mc_jg_showcatthumb = mosHTML::selectList($catthumbs, 'jg_showcatthumb', 'class="inputbox" size="3"', 'value', 'text', $jg_showcatthumb);
    echo $mc_jg_showcatthumb;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_CATEGORYTHUMBNAIL_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_RANDOMCATTHUMB . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $randomcatthumbs[] = mosHTML::makeOption('1', _JGA_FROM_PARENT_CAT_ONLY);
    $randomcatthumbs[] = mosHTML::makeOption('2', _JGA_FROM_CHILD_CAT_ONLY);
    $randomcatthumbs[] = mosHTML::makeOption('3', _JGA_FROM_FAMILY_CAT);
    $mc_jg_showrandomcatthumb = mosHTML::selectList($randomcatthumbs, 'jg_showrandomcatthumb', 'class="inputbox" size="3"', 'value', 'text', $jg_showrandomcatthumb);
    echo $mc_jg_showrandomcatthumb;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_RANDOMCATTHUMB_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_CATTHUMB_ALIGN . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $cthumbalign[] = mosHTML::makeOption('1', _JGA_LEFT);
    $cthumbalign[] = mosHTML::makeOption('2', _JGA_RIGHT);
    $cthumbalign[] = mosHTML::makeOption('0', _JGA_CHANGE);
    $cthumbalign[] = mosHTML::makeOption('3', _JGA_CENTER);
    $mc_jg_ctalign = mosHTML::selectList($cthumbalign, 'jg_ctalign', 'class="inputbox" size="4"', 'value', 'text', $jg_ctalign);
    echo $mc_jg_ctalign;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_CATTHUMB_ALIGN_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_CATEGORY_HITS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showtotalcathits = mosHTML::selectList($yesno, 'jg_showtotalcathits', 'class="inputbox" size="2"', 'value', 'text', $jg_showtotalcathits);
    echo $yn_jg_showtotalcathits;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_CATEGORY_HITS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_CATEGORY_ASNEW; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_jg_showcatasnew = mosHTML::selectList( $yesno, 'jg_showcatasnew', 'class="inputbox" size="2"', 'value', 'text', $jg_showcatasnew );
        echo $yn_jg_showcatasnew;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_CATEGORY_ASNEW_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle"   >
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DAYSNEW . ':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_catdaysnew" value="<?php echo "$jg_catdaysnew"; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_CATEGORY_DAYSNEW_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_RMSM . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_rmsm = mosHTML::selectList($yesno, 'jg_rmsm', 'class="inputbox" size="2"', 'value', 'text', $jg_rmsm);
    echo $yn_jg_rmsm;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_RMSM_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_RMSM_CATEGORIES . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showrmsmcats = mosHTML::selectList($yesno, 'jg_showrmsmcats', 'class="inputbox" size="2"', 'value', 'text', $jg_showrmsmcats);
    echo $yn_jg_showrmsmcats;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_RMSM_CATEGORIES_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Galerie-Ansicht->Generelle Einstellungen"
$tabs->endTab();
// end fourth nested tabs pane NestedPaneFive
$tabs->endPane();
// end fourth nested MainTab "Galerie-Ansicht"
$tabs->endTab();


// start fifth nested MainTab "Kategorie-Ansicht"
$tabs->startNestedTab(_JGA_CATEGORY_VIEW);
// start fifth nested tabs pane
$tabs->startPane("NestedPaneSix");
// start Tab "Kategorie-Ansicht->Generelle Einstellungen"
$tabs->startTab(_JGA_GENERAL_SETTINGS, "nested-twenty");
?>
  <div id="page18">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_CATEGORYTITLE . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showcathead = mosHTML::selectList($yesno, 'jg_showcathead', 'class="inputbox" size="2"', 'value', 'text', $jg_showcathead);
    echo $yn_jg_showcathead;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_CATEGORYTITLE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_CATEGORY_ORDERBY_USER . '?'; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_jg_usercatorder = mosHTML::selectList( $yesno, 'jg_usercatorder', 'class="inputbox" size="2"', 'value', 'text', $jg_usercatorder );
        echo $yn_jg_usercatorder;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_CATEGORY_ORDERBY_USER_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_CATEGORY_ORDERBY_USER_LIST . '?'; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $obj_jg_usercatorderlist = Joom_CreateArrayObject($jg_usercatorderlist);
        $catorderlist[] = mosHTML::makeOption( 'date', _JGA_USER_ORDERBY_DATE );
        $catorderlist[] = mosHTML::makeOption( 'user', _JGA_USER_ORDERBY_AUTHOR );
        $catorderlist[] = mosHTML::makeOption( 'title', _JGA_USER_ORDERBY_TITLE );
        $catorderlist[] = mosHTML::makeOption( 'hits', _JGA_USER_ORDERBY_HITS );
        $catorderlist[] = mosHTML::makeOption( 'rating', _JGA_USER_ORDERBY_RATING );
        $mc_jg_usercatorderlist = mosHTML::selectList( $catorderlist, 'jg_usercatorderlist[]', 'class="inputbox" size="5" multiple="multiple"', 'value', 'text', $obj_jg_usercatorderlist );
        echo $mc_jg_usercatorderlist;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_CATEGORY_ORDERBY_USER_LIST_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_CATDESCRIPTIONINCAT . ':'; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_jg_showcatdescriptionincat = mosHTML::selectList( $yesno, 'jg_showcatdescriptionincat', 'class="inputbox" size="2"', 'value', 'text', $jg_showcatdescriptionincat );
        echo $yn_jg_showcatdescriptionincat;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_CATDESCRIPTIONINCAT_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_NUMB_COLUMN . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $numbercols[] = mosHTML::makeOption('1', _JGA_ONECOLUMN);
    $numbercols[] = mosHTML::makeOption('2', _JGA_TWOCOLUMNS);
    $numbercols[] = mosHTML::makeOption('3', _JGA_THREECOLUMNS);
    $numbercols[] = mosHTML::makeOption('4', _JGA_FOURCOLUMNS);
    $mc_jg_colnumb = mosHTML::selectList($numbercols, 'jg_colnumb', 'class="inputbox" size="4"', 'value', 'text', $jg_colnumb);
    echo $mc_jg_colnumb;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_NUMB_CATEGORY_COLUMN; ?></td>
    </tr>
    <tr align="center" valign="middle"   >
      <td align="left" valign="top"><strong><?php echo _JGA_CATEGORYPICS_PER_PAGE . ':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_perpage" value="<?php echo "$jg_perpage"; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_CATEGORYPICS_PER_PAGE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_CATEGORY_THUMBALIGN . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $catthumbalign[] = mosHTML::makeOption('1', _JGA_LEFT);
    $catthumbalign[] = mosHTML::makeOption('3', _JGA_CENTER);
    $catthumbalign[] = mosHTML::makeOption('2', _JGA_RIGHT);
    $mc_jg_catthumbalign = mosHTML::selectList($catthumbalign, 'jg_catthumbalign', 'class="inputbox" size="3"', 'value', 'text', $jg_catthumbalign);
    echo $mc_jg_catthumbalign;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_CATEGORY_THUMBALIGN_LONG.' '._JGA_CATEGORY_TEXTALIGN; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_PAGENAVIGATION . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $showpagenavi[] = mosHTML::makeOption('1', _JGA_DISPLAY_TOP_ONLY);
    $showpagenavi[] = mosHTML::makeOption('2', _JGA_DISPLAY_TOP_AND_BOTTOM);
    $showpagenavi[] = mosHTML::makeOption('3', _JGA_DISPLAY_BOTTOM_ONLY);
    $mc_jg_showpagenav = mosHTML::selectList($showpagenavi, 'jg_showpagenav', 'class="inputbox" size="3"', 'value', 'text', $jg_showpagenav);
    echo $mc_jg_showpagenav;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_CATEGORY_PAGENAVIGATION; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_NUMB_CATEGORYPICS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showpiccount = mosHTML::selectList($yesno, 'jg_showpiccount', 'class="inputbox" size="2"', 'value', 'text', $jg_showpiccount);
    echo $yn_jg_showpiccount;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_NUMB_CATEGORYPICS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_OPEN_DETAIL_VIEW . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $detailpic_open[] = mosHTML::makeOption('0', _JGA_OPEN_NORMAL);
    $detailpic_open[] = mosHTML::makeOption('1', _JGA_OPEN_BLANK_WINDOW);
    $detailpic_open[] = mosHTML::makeOption('2', _JGA_OPEN_JS_WINDOW);
    $detailpic_open[] = mosHTML::makeOption('3', _JGA_OPEN_DHTML);
    $detailpic_open[] = mosHTML::makeOption('4', _JGA_OPEN_LIGHTBOX);
    $detailpic_open[] = mosHTML::makeOption('5', _JGA_OPEN_THICKBOX3);
    $detailpic_open[] = mosHTML::makeOption('6', _JGA_OPEN_SLIMBOX);
    $mc_jg_detailpic_open = mosHTML::selectList($detailpic_open, 'jg_detailpic_open', 'class="inputbox" size="7"', 'value', 'text', $jg_detailpic_open);
    echo $mc_jg_detailpic_open;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_OPEN_DETAIL_VIEW_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_LIGHTBOX_ORIGINAL . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_lightboxbigpic = mosHTML::selectList($yesno, 'jg_lightboxbigpic', 'class="inputbox" size="2"', 'value', 'text', $jg_lightboxbigpic);
    echo $yn_jg_lightboxbigpic;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_LIGHTBOX_ORIGINAL_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_PICTURE_TITLE . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showtitle = mosHTML::selectList($yesno, 'jg_showtitle', 'class="inputbox" size="2"', 'value', 'text', $jg_showtitle);
    echo $yn_jg_showtitle;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_PICTURE_TITLE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_PICTURE_ASNEW; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_jg_showpicasnew = mosHTML::selectList( $yesno, 'jg_showpicasnew', 'class="inputbox" size="2"', 'value', 'text', $jg_showpicasnew );
        echo $yn_jg_showpicasnew;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_PICTURE_ASNEW_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle"   >
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DAYSNEW . ':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_daysnew" value="<?php echo "$jg_daysnew"; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_PICTURE_DAYSNEW_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_PICTURE_HITS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showhits = mosHTML::selectList($yesno, 'jg_showhits', 'class="inputbox" size="2"', 'value', 'text', $jg_showhits);
    echo $yn_jg_showhits;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_PICTURE_HITS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_PICTURE_AUTHOR . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showauthor = mosHTML::selectList($yesno, 'jg_showauthor', 'class="inputbox" size="2"', 'value', 'text', $jg_showauthor);
    echo $yn_jg_showauthor;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_PICTURE_AUTHOR_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_PICTURE_OWNER . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showowner = mosHTML::selectList($yesno, 'jg_showowner', 'class="inputbox" size="2"', 'value', 'text', $jg_showowner);
    echo $yn_jg_showowner;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_PICTURE_OWNER_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_PICTURE_COMMENTS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showcatcom = mosHTML::selectList($yesno, 'jg_showcatcom', 'class="inputbox" size="2"', 'value', 'text', $jg_showcatcom);
    echo $yn_jg_showcatcom;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_PICTURE_COMMENTS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_PICTURE_RATINGS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showcatrate = mosHTML::selectList($yesno, 'jg_showcatrate', 'class="inputbox" size="2"', 'value', 'text', $jg_showcatrate);
    echo $yn_jg_showcatrate;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_PICTURE_RATINGS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_PICTURE_DESCRIPTION . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showcatdescription = mosHTML::selectList($yesno, 'jg_showcatdescription', 'class="inputbox" size="2"', 'value', 'text', $jg_showcatdescription);
    echo $yn_jg_showcatdescription;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_PICTURE_DESCRIPTION_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_DOWNLOAD; ?></strong></td>
      <td align="left" valign="top">
<?php
    $showcategorydownload[] = mosHTML::makeOption('0', _JGA_NO_DISPLAY);
    $showcategorydownload[] = mosHTML::makeOption('1', _JGA_DISPLAY_TO_RMSM);
    $showcategorydownload[] = mosHTML::makeOption('2', _JGA_DISPLAY_TO_SM);
    $showcategorydownload[] = mosHTML::makeOption('3', _JGA_DISPLAY_TO_ALL);
    $mc_jg_showcategorydownload = mosHTML::selectList($showcategorydownload, 'jg_showcategorydownload', 'class="inputbox" size="4"', 'value', 'text', $jg_showcategorydownload);
    echo $mc_jg_showcategorydownload;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_DOWNLOAD_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_FAVOURITES_LINK; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showcategoryfavourite = mosHTML::selectList($yesno, 'jg_showcategoryfavourite', 'class="inputbox" size="2"', 'value', 'text', $jg_showcategoryfavourite);
    echo $yn_jg_showcategoryfavourite;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_FAVOURITES_LINK_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Kategorie-Ansicht->Generelle Einstellungen"
$tabs->endTab();
// start Tab "Kategorie-Ansicht->Unterkategorien"
$tabs->startTab(_JGA_SUBCAT_SETTINGS, "nested-twentyone");
?>
  <div id="page19">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_SUBCATEGORYHEADER . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showsubcathead = mosHTML::selectList($yesno, 'jg_showsubcathead', 'class="inputbox" size="2"', 'value', 'text', $jg_showsubcathead);
    echo $yn_jg_showsubcathead;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_CATEGORYHEADER_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_NUMB_SUBCATEGORIES . ':'; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_jg_showsubcatcount = mosHTML::selectList( $yesno, 'jg_showsubcatcount', 'class="inputbox" size="2"', 'value', 'text', $jg_showsubcatcount );
        echo $yn_jg_showsubcatcount;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_NUMB_SUBCATEGORIES_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_NUMB_SUBCATEGORY_COLUMN . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $numbersubcols[] = mosHTML::makeOption('1', _JGA_ONECOLUMN);
    $numbersubcols[] = mosHTML::makeOption('2', _JGA_TWOCOLUMNS);
    $numbersubcols[] = mosHTML::makeOption('3', _JGA_THREECOLUMNS);
    $numbersubcols[] = mosHTML::makeOption('4', _JGA_FOURCOLUMNS);
    $mc_jg_colsubcat = mosHTML::selectList($numbersubcols, 'jg_colsubcat', 'class="inputbox" size="4"', 'value', 'text', $jg_colsubcat);
    echo $mc_jg_colsubcat;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_NUMB_SUBCATEGORY_COLUMN_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle"   >
      <td align="left" valign="top"><strong><?php echo _JGA_CATEGORYSUBCATS_PER_PAGE . ':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_subperpage" value="<?php echo "$jg_subperpage"; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_CATEGORYSUBCATS_PER_PAGE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_CATEGORY_THUMBALIGN . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $subcatthumbalign[] = mosHTML::makeOption('1', _JGA_LEFT);
    $subcatthumbalign[] = mosHTML::makeOption('3', _JGA_CENTER);
    $subcatthumbalign[] = mosHTML::makeOption('2', _JGA_RIGHT);
    $mc_jg_subcatthumbalign = mosHTML::selectList($subcatthumbalign, 'jg_subcatthumbalign', 'class="inputbox" size="3"', 'value', 'text', $jg_subcatthumbalign);
    echo $mc_jg_subcatthumbalign;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_CATEGORY_THUMBALIGN_LONG.' '._JGA_CATEGORY_TEXTALIGN_CENTER; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_CATEGORYTHUMBNAIL . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $subthumbs[] = mosHTML::makeOption('0', _JGA_DISPLAY_NONE);
    $subthumbs[] = mosHTML::makeOption('1', _JGA_DISPLAY_MYCHOISE);
    $subthumbs[] = mosHTML::makeOption('2', _JGA_DISPLAY_RANDOM);
    $mc_jg_showsubthumbs = mosHTML::selectList($subthumbs, 'jg_showsubthumbs', 'class="inputbox" size="3"', 'value', 'text', $jg_showsubthumbs);
    echo $mc_jg_showsubthumbs;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_CATEGORYTHUMBNAIL_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_RANDOMCATTHUMB . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $randomsubthumbs[] = mosHTML::makeOption('1', _JGA_FROM_PARENT_CAT_ONLY);
    $randomsubthumbs[] = mosHTML::makeOption('2', _JGA_FROM_CHILD_CAT_ONLY);
    $randomsubthumbs[] = mosHTML::makeOption('3', _JGA_FROM_FAMILY_CAT);
    $mc_jg_showrandomsubthumb = mosHTML::selectList($randomsubthumbs, 'jg_showrandomsubthumb', 'class="inputbox" size="3"', 'value', 'text', $jg_showrandomsubthumb);
    echo $mc_jg_showrandomsubthumb;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_RANDOMCATTHUMB_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ORDER_BY_ALPHA . ':'; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_jg_ordersubcatbyalpha = mosHTML::selectList( $yesno, 'jg_ordersubcatbyalpha', 'class="inputbox" size="2"', 'value', 'text', $jg_ordersubcatbyalpha );
        echo $yn_jg_ordersubcatbyalpha;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ORDER_SUBCATEGORIES_BY_ALPHA_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_CATEGORY_HITS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showtotalsubcathits = mosHTML::selectList($yesno, 'jg_showtotalsubcathits', 'class="inputbox" size="2"', 'value', 'text', $jg_showtotalsubcathits);
    echo $yn_jg_showtotalsubcathits;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_CATEGORY_HITS_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Kategorie-Ansicht->Unterkategorien"
$tabs->endTab();
// end fifth nested tabs pane NestedPaneSix
$tabs->endPane();
// end fifth nested MainTab "Kategorie-Ansicht"
$tabs->endTab();


// start sixth nested MainTab "Detail-Ansicht"
$tabs->startNestedTab(_JGA_DETAIL_VIEW);
// start sixth nested tabs pane
$tabs->startPane("NestedPaneSeven");
// start Tab "Detail-Ansicht->Generelle Einstellungen"
$tabs->startTab(_JGA_GENERAL_SETTINGS, "nested-twentytwo");
?>
  <div id="page20">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ALLOW_DETAILPAGE; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showdetailpage = mosHTML::selectList($yesno, 'jg_showdetailpage', 'class="inputbox" size="2"', 'value', 'text', $jg_showdetailpage);
    echo $yn_jg_showdetailpage;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ALLOW_DETAILPAGE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_NUMBEROFPICS; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showdetailnumberofpics = mosHTML::selectList($yesno, 'jg_showdetailnumberofpics', 'class="inputbox" size="2"', 'value', 'text', $jg_showdetailnumberofpics);
    echo $yn_jg_showdetailnumberofpics;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_NUMBEROFPICS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_DETAIL_CURSOR_NAVIGATION; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_cursor_navigation = mosHTML::selectList($yesno, 'jg_cursor_navigation', 'class="inputbox" size="2"', 'value', 'text', $jg_cursor_navigation);
    echo $yn_jg_cursor_navigation;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_DETAIL_CURSOR_NAVIGATION_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_DETAIL_DISABLE_RIGHTCLICK .':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_disable_rightclick_detail = mosHTML::selectList($yesno, 'jg_disable_rightclick_detail', 'class="inputbox" size="2"', 'value', 'text', $jg_disable_rightclick_detail);
    echo $yn_jg_disable_rightclick_detail;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_DETAIL_DISABLE_RIGHTCLICK_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_TITLE; ?></strong></td>
      <td align="left" valign="top">
<?php
    $showdetailtitle[] = mosHTML::makeOption('0', _JGA_NO_DISPLAY);
    $showdetailtitle[] = mosHTML::makeOption('1', _JGA_TOP);
    $showdetailtitle[] = mosHTML::makeOption('2', _JGA_BOTTOM);
    $mc_jg_showdetailtitle = mosHTML::selectList($showdetailtitle, 'jg_showdetailtitle', 'class="inputbox" size="3"', 'value', 'text', $jg_showdetailtitle);
    echo $mc_jg_showdetailtitle;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_TITLE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_INFORMATION; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showdetail = mosHTML::selectList($yesno, 'jg_showdetail', 'class="inputbox" size="2"', 'value', 'text', $jg_showdetail);
    echo $yn_jg_showdetail;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_INFORMATION_LONG; ?></td>
    </tr>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_ACCORDION; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showdetailaccordion = mosHTML::selectList($yesno, 'jg_showdetailaccordion', 'class="inputbox" size="2"', 'value', 'text', $jg_showdetailaccordion);
    echo $yn_jg_showdetailaccordion;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_ACCORDION_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_DESCRIPTION; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showdetaildescription = mosHTML::selectList($yesno, 'jg_showdetaildescription', 'class="inputbox" size="2"', 'value', 'text', $jg_showdetaildescription);
    echo $yn_jg_showdetaildescription;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_DESCRIPTION_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_DATE; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showdetaildatum = mosHTML::selectList($yesno, 'jg_showdetaildatum', 'class="inputbox" size="2"', 'value', 'text', $jg_showdetaildatum);
    echo $yn_jg_showdetaildatum;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_DATE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_HITS; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showdetailhits = mosHTML::selectList($yesno, 'jg_showdetailhits', 'class="inputbox" size="2"', 'value', 'text', $jg_showdetailhits);
    echo $yn_jg_showdetailhits;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_HITS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_RATING; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showdetailrating = mosHTML::selectList($yesno, 'jg_showdetailrating', 'class="inputbox" size="2"', 'value', 'text', $jg_showdetailrating);
    echo $yn_jg_showdetailrating;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_RATING_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_FILESIZE; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showdetailfilesize = mosHTML::selectList($yesno, 'jg_showdetailfilesize', 'class="inputbox" size="2"', 'value', 'text', $jg_showdetailfilesize);
    echo $yn_jg_showdetailfilesize;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_FILESIZE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_AUTHOR; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showdetailauthor = mosHTML::selectList($yesno, 'jg_showdetailauthor', 'class="inputbox" size="2"', 'value', 'text', $jg_showdetailauthor);
    echo $yn_jg_showdetailauthor;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_AUTHOR_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_ORIGFILESIZE; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showoriginalfilesize = mosHTML::selectList($yesno, 'jg_showoriginalfilesize', 'class="inputbox" size="2"', 'value', 'text', $jg_showoriginalfilesize);
    echo $yn_jg_showoriginalfilesize;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_ORIGFILESIZE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_DOWNLOAD; ?></strong></td>
      <td align="left" valign="top">
<?php
    $showdownload[] = mosHTML::makeOption('0', _JGA_NO_DISPLAY);
    $showdownload[] = mosHTML::makeOption('1', _JGA_DISPLAY_TO_RMSM);
    $showdownload[] = mosHTML::makeOption('2', _JGA_DISPLAY_TO_SM);
    $showdownload[] = mosHTML::makeOption('3', _JGA_DISPLAY_TO_ALL);
    $mc_jg_showdetaildownload = mosHTML::selectList($showdownload, 'jg_showdetaildownload', 'class="inputbox" size="4"', 'value', 'text', $jg_showdetaildownload);
    echo $mc_jg_showdetaildownload;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_DOWNLOAD_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_DETAIL_DOWNLOADFILE . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $downloadfile[] = mosHTML::makeOption('0', _JGA_RESIZED_ONLY);
    $downloadfile[] = mosHTML::makeOption('1', _JGA_ORIGINAL_ONLY);
    $downloadfile[] = mosHTML::makeOption('2', _JGA_RESIZED_IFNO_ORIGINAL);
    $mc_jg_downloadfile = mosHTML::selectList($downloadfile, 'jg_downloadfile', 'class="inputbox" size="3"', 'value', 'text', $jg_downloadfile);
    echo $mc_jg_downloadfile;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_DETAIL_DOWNLOADFILE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_DETAIL_DOWNLOADWITHWATERMARK; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_downloadwithwatermark = mosHTML::selectList($yesno, 'jg_downloadwithwatermark', 'class="inputbox" size="2"', 'value', 'text', $jg_downloadwithwatermark);
    echo $yn_jg_downloadwithwatermark;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_DETAIL_DOWNLOADWITHWATERMARK_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_DETAIL_INSERT_WATERMARK; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_watermark = mosHTML::selectList($yesno, 'jg_watermark', 'class="inputbox" size="2"', 'value', 'text', $jg_watermark);
    echo $yn_jg_watermark;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_DETAIL_INSERT_WATERMARK_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_DETAIL_WATERMARK_POSITION . ':' ; ?></strong></td>
      <td align="left" valign="top">
<?php
    $watermarkpos[] = mosHTML::makeOption('1', _JGA_TOP_LEFT);
    $watermarkpos[] = mosHTML::makeOption('2', _JGA_TOP_CENTER);
    $watermarkpos[] = mosHTML::makeOption('3', _JGA_TOP_RIGHT);
    $watermarkpos[] = mosHTML::makeOption('4', _JGA_MIDDLE_LEFT);
    $watermarkpos[] = mosHTML::makeOption('5', _JGA_MIDDLE_CENTER);
    $watermarkpos[] = mosHTML::makeOption('6', _JGA_MIDDLE_RIGHT);
    $watermarkpos[] = mosHTML::makeOption('7', _JGA_BOTTOM_LEFT);
    $watermarkpos[] = mosHTML::makeOption('8', _JGA_BOTTOM_CENTER);
    $watermarkpos[] = mosHTML::makeOption('9', _JGA_BOTTOM_RIGHT);
    $mc_jg_watermarkpos = mosHTML::selectList($watermarkpos, 'jg_watermarkpos', 'class="inputbox" size="1"', 'value', 'text', $jg_watermarkpos);
    echo $mc_jg_watermarkpos;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_DETAIL_WATERMARK_POSITION_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_LINKTOORIGINAL; ?></strong></td>
      <td align="left" valign="top">
<?php
    $showbigpic[] = mosHTML::makeOption('0', _JGA_NO_DISPLAY);
    $showbigpic[] = mosHTML::makeOption('1', _JGA_DISPLAY_TO_RMSM);
    $showbigpic[] = mosHTML::makeOption('2', _JGA_DISPLAY_TO_ALL);
    $mc_jg_bigpic = mosHTML::selectList($showbigpic, 'jg_bigpic', 'class="inputbox" size="3"', 'value', 'text', $jg_bigpic);
    echo $mc_jg_bigpic;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_LINKTOORIGINAL_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_OPEN_ORIGINAL_VIEW . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $showbigpic_open[] = mosHTML::makeOption('1', _JGA_OPEN_BLANK_WINDOW);
    $showbigpic_open[] = mosHTML::makeOption('2', _JGA_OPEN_JS_WINDOW);
    $showbigpic_open[] = mosHTML::makeOption('3', _JGA_OPEN_DHTML);
    $showbigpic_open[] = mosHTML::makeOption('4', _JGA_OPEN_LIGHTBOX);
    $showbigpic_open[] = mosHTML::makeOption('5', _JGA_OPEN_THICKBOX3);
    $showbigpic_open[] = mosHTML::makeOption('6', _JGA_OPEN_SLIMBOX);
    $mc_jg_bigpic_open = mosHTML::selectList($showbigpic_open, 'jg_bigpic_open', 'class="inputbox" size="6"', 'value', 'text', $jg_bigpic_open);
    echo $mc_jg_bigpic_open;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_OPEN_ORIGINAL_VIEW_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_BBCODELINK; ?></strong></td>
      <td align="left" valign="top">
<?php
    $bbcodelinks[] = mosHTML::makeOption('0', _JGA_NO_DISPLAY);
    $bbcodelinks[] = mosHTML::makeOption('1', _JGA_BBCODE_IMG_ONLY);
    $bbcodelinks[] = mosHTML::makeOption('2', _JGA_BBCODE_URL_ONLY);
    $bbcodelinks[] = mosHTML::makeOption('3', _JGA_BBCODE_BOTH);
    $mc_jg_bbcodelinks = mosHTML::selectList($bbcodelinks, 'jg_bbcodelink', 'class="inputbox" size="4"', 'value', 'text',$jg_bbcodelink);
    echo $mc_jg_bbcodelinks;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_BBCODELINK_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_COMMENTS; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showcommentsunreg = mosHTML::selectList($yesno, 'jg_showcommentsunreg', 'class="inputbox" size="2"', 'value', 'text', $jg_showcommentsunreg);
    echo $yn_jg_showcommentsunreg;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_COMMENTS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_COMMENTSAREA; ?></strong></td>
      <td align="left" valign="top">
<?php
    $showcommentsarea[] = mosHTML::makeOption('1', _JGA_ABOVE_COMMENTS);
    $showcommentsarea[] = mosHTML::makeOption('2', _JGA_UNDERNEATH_COMMENTS);
    $mc_jg_showcommentsarea = mosHTML::selectList($showcommentsarea, 'jg_showcommentsarea', 'class="inputbox" size="2"', 'value', 'text', $jg_showcommentsarea);
    echo $mc_jg_showcommentsarea;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_COMMENTSAREA_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_SEND2FRIEND; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_send2friend = mosHTML::selectList($yesno, 'jg_send2friend', 'class="inputbox" size="2"', 'value', 'text', $jg_send2friend);
    echo $yn_jg_send2friend;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_SEND2FRIEND_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Detail-Ansicht->Generelle Einstellungen"
$tabs->endTab();
// start Tab "Detail-Ansicht->Motiongallery"
$tabs->startTab(_JGA_MOTIONGALLERY_SETTINGS, "nested-twentythree");
?>
  <div id="page21">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_MOTIONGALLERY; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_minis = mosHTML::selectList($yesno, 'jg_minis', 'class="inputbox" size="2"', 'value', 'text', $jg_minis);
    echo $yn_jg_minis;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_MOTIONGALLERY_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_MOTIONGALLERY_DISPLAYMODE; ?></strong></td>
      <td align="left" valign="top">
<?php
    $joom_ShowMotionMinis[] = mosHTML::makeOption('1', _JGA_STATIC);
    $joom_ShowMotionMinis[] = mosHTML::makeOption('2', _JGA_MOVEABLE);
    $mc_jg_motionminis = mosHTML::selectList($joom_ShowMotionMinis, 'jg_motionminis', 'class="inputbox" size="2"', 'value', 'text', $jg_motionminis);
    echo $mc_jg_motionminis;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_MOTIONGALLERY_DISPLAYMODE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_MOTIONGALLERY_WIDTH .':' ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_motionminiWidth" value="<?php echo $jg_motionminiWidth; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_MOTIONGALLERY_WIDTH_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_MOTIONGALLERY_HEIGHT .':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_motionminiHeight" value="<?php echo $jg_motionminiHeight; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_MOTIONGALLERY_HEIGHT_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_MOTIONMINIS_MAXWIDTH .':' ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_miniWidth" value="<?php echo $jg_miniWidth; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_MOTIONMINIS_MAXWIDTH_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_MOTIONMINIS_MAXHEIGHT .':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_miniHeight" value="<?php echo $jg_miniHeight; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_MOTIONMINIS_MAXHEIGHT_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_MOTIONMINIS_PROPORTIONS; ?></strong></td>
      <td align="left" valign="top">
<?php
    $joom_minisprop[] = mosHTML::makeOption('0', _JGA_SAMEWIDTHANDHEIGHT);
    $joom_minisprop[] = mosHTML::makeOption('1', _JGA_SAMEWIDTH);
    $joom_minisprop[] = mosHTML::makeOption('2', _JGA_SAMEHIGHT);
    $mc_jg_minisprop = mosHTML::selectList($joom_minisprop, 'jg_minisprop', 'class="inputbox" size="3"', 'value', 'text', $jg_minisprop);
    echo $mc_jg_minisprop;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_MOTIONMINIS_PROPORTIONS_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Detail-Ansicht->Motiongallery"
$tabs->endTab();
// start Tab "Detail-Ansicht->Namensschilder"
$tabs->startTab(_JGA_NAMESHIELD_SETTINGS, "nested-twentyfour");
?>
  <div id="page22">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_NAMESHIELDS; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_jg_nameshields = mosHTML::selectList( $yesno, 'jg_nameshields', 'class="inputbox" size="2"', 'value', 'text', $jg_nameshields );
        echo $yn_jg_nameshields;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_NAMESHIELDS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_NAMESHIELDS_GUEST_VISIBLE; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_jg_nameshields_unreg = mosHTML::selectList( $yesno, 'jg_nameshields_unreg', 'class="inputbox" size="2"', 'value', 'text', $jg_nameshields_unreg );
        echo $yn_jg_nameshields_unreg;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_NAMESHIELDS_GUEST_VISIBLE_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_NAMESHIELDS_GUEST_INFORMATION; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $yn_jg_show_nameshields_unreg = mosHTML::selectList( $yesno, 'jg_show_nameshields_unreg', 'class="inputbox" size="2"', 'value', 'text', $jg_show_nameshields_unreg );
        echo $yn_jg_show_nameshields_unreg;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_NAMESHIELDS_GUEST_INFORMATION_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_NAMESHIELDS_HEIGHT . ':'; ?></strong></td>
      <td align="left" valign="top">
      <input type="text" name="jg_nameshields_height" value="<?php echo $jg_nameshields_height; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_NAMESHIELDS_HEIGHT_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_NAMESHIELDS_WIDTH . ':'; ?></strong></td>
      <td align="left" valign="top">
      <input type="text" name="jg_nameshields_width" value="<?php echo $jg_nameshields_width; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_NAMESHIELDS_WIDTH_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Detail-Ansicht->Namensschilder"
$tabs->endTab();
// start Tab "Detail-Ansicht->Slideshow"
$tabs->startTab(_JGA_SLIDESHOW_SETTINGS, "nested-twentyfive");
?>
  <div id="page23">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_SLIDESHOW . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_slideshow = mosHTML::selectList($yesno, 'jg_slideshow', 'class="inputbox" size="2"', 'value', 'text', $jg_slideshow);
    echo $yn_jg_slideshow;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_SLIDESHOW_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SLIDESHOW_TIMEFRAME . ':'; ?></strong></td>
      <td align="left" valign="top">
       <input size="10" type="text" name="jg_slideshow_timer" value="<?php echo $jg_slideshow_timer; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_SLIDESHOW_TIMEFRAME_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SLIDESHOW_TRANSITION . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_slideshow_usefilter = mosHTML::selectList($yesno, 'jg_slideshow_usefilter', 'class="inputbox" size="2"', 'value', 'text', $jg_slideshow_usefilter);
    echo $yn_jg_slideshow_usefilter;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SLIDESHOW_TRANSITION_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SLIDESHOW_TRANSITION_RANDOM . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_slideshow_filterbychance = mosHTML::selectList($yesno, 'jg_slideshow_filterbychance', 'class="inputbox" size="2"', 'value', 'text', $jg_slideshow_filterbychance);
    echo $yn_jg_slideshow_filterbychance;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SLIDESHOW_TRANSITION_RANDOM_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SLIDESHOW_TRANSITION_TIME . ':'; ?></strong></td>
      <td align="left" valign="top">
       <input size="10" type="text" name="jg_slideshow_filtertimer" value="<?php echo $jg_slideshow_filtertimer; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_SLIDESHOW_TRANSITION_TIME_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SLIDESHOW_ENDLESS_SLIDE . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showsliderepeater = mosHTML::selectList($yesno, 'jg_showsliderepeater', 'class="inputbox" size="2"', 'value', 'text', $jg_showsliderepeater);
    echo $yn_jg_showsliderepeater;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SLIDESHOW_ENDLESS_SLIDE_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Detail-Ansicht->Slideshow"
$tabs->endTab();
// start Tab "Detail-Ansicht->Exif-Daten"
$tabs->startTab(_JGA_EXIF_SETTINGS, "nested-twentyseven");
?>
  <div id="page25">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr>
      <td colspan="3"><?php echo _JGA_EXIF_SETTINGS_INTRO; ?><br /><?php echo _JGA_EXIF_SETTINGS_INTRO2; ?><br /><?php echo $exifmsg; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_EXIFDATA . '?'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showexifdata = mosHTML::selectList($yesno, 'jg_showexifdata', 'class="inputbox" size="2"', 'value', 'text', $jg_showexifdata);
    echo $yn_jg_showexifdata;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_EXIFDATA_LONG; ?></td>
    </tr>
  </table><p/>
  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
<?php
        Joom_BuildExifConfig();
?>
  </table>
  </div>
<?php
// end Tab "Detail-Ansicht->Exif-Daten"
$tabs->endTab();
// start Tab "Detail-Ansicht->IPTC-Daten"
$tabs->startTab(_JGA_IPTC_SETTINGS, "nested-thirty");
?>
  <div id="page25">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr>
      <td colspan="3"><?php echo _JGA_IPTC_SETTINGS_INTRO; ?><br /><?php echo _JGA_IPTC_SETTINGS_INTRO2; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_DETAIL_IPTCDATA . '?'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showiptcdata = mosHTML::selectList($yesno, 'jg_showiptcdata', 'class="inputbox" size="2"', 'value', 'text', $jg_showiptcdata);
    echo $yn_jg_showiptcdata;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_DETAIL_IPTCDATA_LONG; ?></td>
    </tr>
  </table><p/>
  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
<?php
        Joom_BuildIptcConfig();
?>
  </table>
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr>
      <td colspan="3">&sup1;&nbsp;<?php echo _JGA_IPTC_COPYRIGHT; ?><br /><?php echo _JGA_IPTC_COPYRIGHT_LANGUAGE; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Detail-Ansicht->IPTC-Daten"
$tabs->endTab();
// end sixth nested tabs pane NestedPaneSeven
$tabs->endPane();
// end sixth nested MainTab "Detail-Ansicht"
$tabs->endTab();
// start seventh nested MainTab "Toplisten"
$tabs->startNestedTab(_JGA_TOPLIST_SETTINGS);
// start seventh nested tabs pane
$tabs->startPane("NestedPaneEight");
// start Tab "Toplisten->Generelle Einstellungen"
$tabs->startTab(_JGA_GENERAL_SETTINGS, "nested-twentysix");
?>
  <div id="page15">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_TOPLIST . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $toplist[] = mosHTML::makeOption('0', _JGA_NO_DISPLAY);
    $toplist[] = mosHTML::makeOption('1', _JGA_SHOW_IN_HEADER);
    $toplist[] = mosHTML::makeOption('2', _JGA_SHOW_IN_HEADERFOOTER);
    $toplist[] = mosHTML::makeOption('3', _JGA_SHOW_IN_FOOTER);
    $mc_jg_showtoplist = mosHTML::selectList($toplist, 'jg_showtoplist', 'class="inputbox" size="4"', 'value', 'text', $jg_showtoplist);
    echo $mc_jg_showtoplist;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_TOPLIST_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_SHOW_TOPLIST_ON_VIEWS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $wheretoplist[] = mosHTML::makeOption('0', _JGA_ALL_VIEWS);
    $wheretoplist[] = mosHTML::makeOption('1', _JGA_ONLY_GALLERYVIEW);
    $wheretoplist[] = mosHTML::makeOption('2', _JGA_GALLERY_AND_CATEGORYVIEW);
    $mc_jg_whereshowtoplist = mosHTML::selectList($wheretoplist, 'jg_whereshowtoplist', 'class="inputbox" size="3"', 'value', 'text', $jg_whereshowtoplist);
    echo $mc_jg_whereshowtoplist;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_SHOW_TOPLIST_ON_VIEWS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_TOPLIST_NUMB_COLS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $topcol[] = mosHTML::makeOption('1', 1);
    $topcol[] = mosHTML::makeOption('2', 2);
    $topcol[] = mosHTML::makeOption('3', 3);
    $topcol[] = mosHTML::makeOption('4', 4);
    $topcol[] = mosHTML::makeOption('5', 5);
    $mc_jg_toplistcol = mosHTML::selectList($topcol, 'jg_toplistcols', 'class="inputbox" size="1"', 'value', 'text', $jg_toplistcols);
    echo $mc_jg_toplistcol;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_TOPLIST_NUMB_COLS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_TOPLIST_NUMB_ENTRIES . ':'; ?></strong></td>
      <td align="left" valign="top"><input type="text" name="jg_toplist" value="<?php echo $jg_toplist; ?>" /></td>
      <td align="left" valign="top"><?php echo _JGA_TOPLIST_NUMB_ENTRIES_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_TOPLIST_THUMBALIGN . ':'; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $topthumbalign[] = mosHTML::makeOption( '1', _JGA_LEFT );
        $topthumbalign[] = mosHTML::makeOption( '3', _JGA_CENTER );
        $topthumbalign[] = mosHTML::makeOption( '2', _JGA_RIGHT );
        $mc_jg_topthumbalign = mosHTML::selectList( $topthumbalign, 'jg_topthumbalign', 'class="inputbox" size="3"', 'value', 'text', $jg_topthumbalign );
        echo $mc_jg_topthumbalign;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_TOPLIST_THUMBALIGN_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_TOPLIST_TEXTALIGN . ':'; ?></strong></td>
      <td align="left" valign="top">
      <?php
        $toptextalign[] = mosHTML::makeOption( '1', _JGA_LEFT );
        $toptextalign[] = mosHTML::makeOption( '3', _JGA_CENTER );
        $toptextalign[] = mosHTML::makeOption( '2', _JGA_RIGHT );
        $mc_jg_toptextalign = mosHTML::selectList( $toptextalign, 'jg_toptextalign', 'class="inputbox" size="3"', 'value', 'text', $jg_toptextalign );
        echo $mc_jg_toptextalign;
      ?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_TOPLIST_TEXTALIGN_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_TOPLIST_SHOW_RATING . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showrate = mosHTML::selectList($yesno, 'jg_showrate', 'class="inputbox" size="2"', 'value', 'text', $jg_showrate);
    echo $yn_jg_showrate;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_TOPLIST_SHOW_RATING_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_TOPLIST_SHOW_LATEST . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showlatest = mosHTML::selectList($yesno, 'jg_showlatest', 'class="inputbox" size="2"', 'value', 'text', $jg_showlatest);
    echo $yn_jg_showlatest;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_TOPLIST_SHOW_LATEST_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_TOPLIST_SHOW_COMMENTS . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showcom = mosHTML::selectList($yesno, 'jg_showcom', 'class="inputbox" size="2"', 'value', 'text', $jg_showcom);
    echo $yn_jg_showcom;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_TOPLIST_SHOW_COMMENTS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_TOPLIST_THISCOMMENT . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showthiscomment = mosHTML::selectList($yesno, 'jg_showthiscomment', 'class="inputbox" size="2"', 'value', 'text', $jg_showthiscomment);
    echo $yn_jg_showthiscomment;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_TOPLIST_THISCOMMENT_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_TOPLIST_SHOW_MOSTVIEWED . ':'; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_showmostviewed = mosHTML::selectList($yesno, 'jg_showmostviewed', 'class="inputbox" size="2"', 'value', 'text', $jg_showmostviewed);
    echo $yn_jg_showmostviewed;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_TOPLIST_SHOW_MOSTVIEWED_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Frontend Einstellungen->Toplisten"
$tabs->endTab();
// end sixth nested tabs pane NestedPaneEight
$tabs->endPane();
// end sixth nested MainTab "Toplisten"
$tabs->endTab();
// start eighth nested MainTab "Favoriten"
$tabs->startNestedTab(_JGA_FAVOURITES_SETTINGS);
// start eighth nested tabs pane
$tabs->startPane("NestedPaneNine");
// start Tab "Favoriten->Generelle Einstellungen"
$tabs->startTab(_JGA_GENERAL_SETTINGS, "nested-twentynine");
?>
  <div id="page24">
  <table width="100%" border="0" cellpadding="4" cellspacing="0" class="adminlist">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_USE_FAVOURITES; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_favourites = mosHTML::selectList($yesno, 'jg_favourites', 'class="inputbox" size="2"', 'value', 'text', $jg_favourites);
    echo $yn_jg_favourites;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_USE_FAVOURITES_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_FAVOURITES_USERS; ?></strong></td>
      <td align="left" valign="top">
<?php
    $showdetailfavourite[] = mosHTML::makeOption('0', _JGA_FAVOURITES_REG_SPEC);
    $showdetailfavourite[] = mosHTML::makeOption('1', _JGA_FAVOURITES_ONLY_SPEC);
    $mc_jg_showdetailfavourite = mosHTML::selectList($showdetailfavourite, 'jg_showdetailfavourite', 'class="inputbox" size="2"', 'value', 'text', $jg_showdetailfavourite);
    echo $mc_jg_showdetailfavourite;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_FAVOURITES_USERS_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_FAVOURITES_GUEST_INFORMATION; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_favouritesshownotauth = mosHTML::selectList($yesno, 'jg_favouritesshownotauth', 'class="inputbox" size="2"', 'value', 'text', $jg_favouritesshownotauth);
    echo $yn_jg_favouritesshownotauth;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_FAVOURITES_GUEST_INFORMATION_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_MAX_FAVOURITES; ?></strong></td>
      <td align="left" valign="top">
      <input type="text" name="jg_maxfavourites" value="<?php echo $jg_maxfavourites; ?>" />
      </td>
      <td align="left" valign="top"><?php echo _JGA_MAX_FAVOURITES_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_ZIPDOWNLOAD; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_zipdownload = mosHTML::selectList($yesno, 'jg_zipdownload', 'class="inputbox" size="2"', 'value', 'text', $jg_zipdownload);
    echo $yn_jg_zipdownload;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_ZIPDOWNLOAD_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_FAVOURITES_FOR_PUBLIC_ZIP; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_usefavouritesforpubliczip = mosHTML::selectList($yesno, 'jg_usefavouritesforpubliczip', 'class="inputbox" size="2"', 'value', 'text', $jg_usefavouritesforpubliczip);
    echo $yn_jg_usefavouritesforpubliczip;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_FAVOURITES_FOR_PUBLIC_ZIP_LONG; ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo _JGA_FAVOURITES_FOR_ZIP; ?></strong></td>
      <td align="left" valign="top">
<?php
    $yn_jg_usefavouritesforzip = mosHTML::selectList($yesno, 'jg_usefavouritesforzip', 'class="inputbox" size="2"', 'value', 'text', $jg_usefavouritesforzip);
    echo $yn_jg_usefavouritesforzip;
?>
      </td>
      <td align="left" valign="top"><?php echo _JGA_FAVOURITES_FOR_ZIP_LONG; ?></td>
    </tr>
  </table>
  </div>
<?php
// end Tab "Favoriten->Generelle Einstellungen"
$tabs->endTab();
// end eighth nested tabs pane NestedPaneNine
$tabs->endPane();
// end eighth nested MainTab "Favoriten"
$tabs->endTab();
// end nested MainPane
$tabs->endPane();
?>
  <input type="hidden" name="option" value="<?php echo $option; ?>" />
<?php
    if (isset($act)) {
?>
  <input type="hidden" name="act" value="<?php echo $act; ?>" />
<?php
    }
?>
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="boxchecked" value="0" />
</form>
<?php
  }


}
?>
