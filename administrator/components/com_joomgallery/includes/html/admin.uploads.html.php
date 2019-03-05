<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/html/admin.uploads.html.php $
// $Id: admin.uploads.html.php 396 2009-03-15 16:06:21Z aha $
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
*                            Functions / Uploads                               *
\******************************************************************************/

class HTML_Joom_AdminUploads {


  function Joom_ShowUpload_HTML($batchul, $option) {
    global $my, $database, $bugtest, $mainframe, $jg_useorigfilename, 
           $jg_delete_original;

?>
<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td width="100%" class="sectionname" align="left">
      <p>
      <a href='http://www.joomgallery.net/' target='_blank'>
      <img src="../administrator/components/com_joomgallery/assets/images/main2.png" hspace="6" border="0" align="top" width="16" height="16" alt="<?php echo _JGA_JOOMGALLERY; ?>" /></a>&nbsp;
      <span style="font-size:13px; font-weight:bold;">
        <?php echo _JGA_JOOMGALLERY.' :: '._JGA_PICTURE_UPLOAD_MANAGER; ?> 
      </span>
      </p>
    </td>
  </tr>
</table>
<form action="index2.php?task=uploadhandler" method="post" name="adminForm" enctype="multipart/form-data" onsubmit="return joom_checkme();">
<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminlist">
  <tr>
    <td colspan="2" align="center">
<?php
    if ($batchul) {
?>
      <span style="color:green"><b><?php echo _JGA_UPLOAD_COMPLETE_CHOOSE_NEXT; ?></b></span>
<?php
    } else {
?>
      &nbsp;
<?php
    }
?>
    </td>
  </tr>
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="approved" value="1" />
<input type="hidden" name="owner" value="<?php echo $my->username; ?>" />
<input type="hidden" name="bugtest" value="<?php echo $bugtest; ?>" />
<?php
    for ($i=0; $i < 10; $i++) {
?>
  <tr>
    <td align="right" width="50%">
      <div align="right">
       <?php echo _JGA_PLEASE_SELECT_IMAGE; ?>
      </div>
    </td>
    <td align="left" width="50%">
      <input type="file" name="arrscreenshot[<?php echo $i; ?>]" />
    </td>
  </tr>
<?php
    }
?>
  <tr>
    <td align="right">
      <div align="right">
        <?php echo _JGA_PICTURE_ASSIGN_TO_CATEGORY; ?>
      </div>
    </td>
    <td align="left">
<?php
    $clist = Joom_ShowDropDownCategoryList(0,'catid',' class="inputbox" size="1" style="width:228;"');
    global $gentitle;
    echo $clist;
?>
    </td>
  </tr>
<?php
    if (!$jg_useorigfilename) {
?>
  <tr>
    <td align="right">
      <div align="right">
        <?php echo _JGA_GENERIC_TITLE; ?>
      </div>
    </td>
    <td align="left">
      <input type="text" name="gentitle" size="34" maxlength="256" default="<?php echo $gentitle; ?>" />
    </td>
  </tr>
<?php
    }
?>
  <tr>
    <td align="right">
      <div align="right">
        <?php echo _JGA_GENERIC_DESCRIPTION . ' ' . _JGA_OPTION; ?>
      </div>
    </td>
    <td align="left">
      <input type="text" name="gendesc" size="34" maxlength="1000" />
    </td>
  </tr>
  <tr>
    <td align="right">
      <div align="right">
        <?php echo _JGA_AUTHOR . ' ' . _JGA_OPTION; ?>
      </div>
    </td>
    <td align="left">
      <input type="text" name="photocred" size="34" maxlength="256" />
    </td>
  </tr>
<?php
    if ($jg_delete_original != 2) {
      $sup2 = "&sup1;";
    } else {
      $sup2 = "&sup2;";
?>
  <tr>
    <td align="right">
        <?php echo _JGA_DELETE_ORIGINAL_AFTER_UPLOAD; ?>&nbsp;&sup1;
    </td>
    <td align="left">
      <input type="checkbox" name="original_delete" value="1" />
    </td>
  </tr>
<?php
    }
?>
  <tr>
    <td align="right">
      <div align="right">
        <?php echo _JGA_CREATE_SPECIAL_GIF; ?>&nbsp;<?php echo $sup2; ?>
      </div>
    </td>
    <td align="left">
      <input type="checkbox" name="create_special_gif" value="1" />
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <div align="center">
        <br /><input type="submit" value="<?php echo _JGA_UPLOAD; ?>" />
      </div>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <div align="center" class="smallgrey">
<?php
    if ($jg_delete_original == 2) {
?>
        <br />&sup1;&nbsp;<?php echo _JGA_DELETE_ORIGINAL_AFTER_UPLOAD_ASTERISK; ?>
<?php
    }
?>
        <br /><?php echo $sup2; ?>&nbsp;<?php echo _JGA_CREATE_SPECIAL_GIF_ASTERISK; ?>
      </div>
    </td>
  </tr>
</table>
</form>
<?php
  }


  function Joom_ShowBatchUpload_HTML($option) {
    global $database, $mainframe, $jg_useorigfilename, $jg_delete_original, 
           $jg_filenamenumber;
?>
<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td width="100%" class="sectionname" align="left">
      <p>
      <a href='http://www.joomgallery.net/' target='_blank'>
      <img src="../administrator/components/com_joomgallery/assets/images/main2.png" hspace="6" border="0" align="top" width="16" height="16" alt="<?php echo _JGA_JOOMGALLERY; ?>" /></a>&nbsp;
      <span style="font-size:13px; font-weight:bold;">
        <?php echo _JGA_JOOMGALLERY.' :: '._JGA_BATCH_UPLOAD_MANAGER; ?> 
      </span>
      </p>
    </td>
  </tr>
</table>
<form action="index2.php?task=batchuploadhandler" method="post" name="adminForm" enctype="multipart/form-data" onSubmit="return joom_checkme();">
<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminlist">
  <tr align="center" valign="middle">
    <td colspan="2">
      <div align="center">
        <?php echo _JGA_BATCH_UPLOAD_NOTE; ?>
        <br /><br />
      </div>
    </td>
  </tr>
  <input type="hidden" name="option" value="<?php echo $option; ?>" />
  <tr>
    <td align="right" width="50%">
      <?php echo _JGA_BATCH_ZIP_FILE; ?>
    </td>
    <td align="left" width="50%">
      <input type="file" name="zippack" accept="application/zip, application/x-zip-compressed">
    </td>
  </tr>
  <tr>
    <td align="right">
      <?php echo _JGA_PICTURE_ASSIGN_TO_CATEGORY; ?>
    </td>
    <td align="left">
<?php
    $clist = Joom_ShowDropDownCategoryList(0,'catid',' class="inputbox" size="1" style="width:228px;"');
    echo $clist;
?>
    </td>
  </tr>
<?php
    if (!$jg_useorigfilename && $jg_filenamenumber) {
      $sup1 = "&sup1;";
      $sup2 = "&sup2;";
    } else {
      $sup2 = "&sup1;";
    }
    if (!$jg_useorigfilename && $jg_filenamenumber) {
?>
  <tr>
    <td align="right">
      <?php echo _JGA_COUNTER_NUMBER; ?>&nbsp;<?php echo $sup1; ?>
    </td>
    <td align="left">
      <input type="text" name="filecounter" size="5" maxlength="5" />
    </td>
  </tr>
<?php
    }
    if (!$jg_useorigfilename) {
?>
  <tr>
    <td align="right">
      <?php echo _JGA_GENERIC_TITLE; ?>
    </td>
    <td align="left">
      <input type="text" name="gentitle" size="34" maxlength="256" />
    </td>
  </tr>
<?php
    }
?>
  <tr>
    <td align="right">
      <?php echo _JGA_GENERIC_DESCRIPTION . ' ' . _JGA_OPTION; ?>
    </td>
    <td align="left">
      <input type="text" name="gendesc" size="34" maxlength="1000" />
    </td>
  </tr>
  <tr>
    <td align="right">
      <?php echo _JGA_AUTHOR . ' ' . _JGA_OPTION; ?>
    </td>
    <td align="left">
      <input type="text" name="photocred" size="34" maxlength="256" />
    </td>
  </tr>
<?php
    if ($jg_delete_original == 2) {
?>
  <tr>
    <td align="right">
      <?php echo _JGA_DELETE_ORIGINAL_AFTER_UPLOAD; ?>&nbsp;<?php echo $sup2; ?>
    </td>
    <td align="left">
      <input type="checkbox" name="original_delete" value="1" />
    </td>
  </tr>
<?php
    }
?>
  <tr>
    <td colspan="2" align="center">
      <br /><input type="submit" value="<?php echo _JGA_START_BATCHUPLOAD; ?>" />
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <div align="center" class="smallgrey">
<?php
    if (!$jg_useorigfilename && $jg_filenamenumber) {
?>
        <br /><?php echo $sup1; ?>&nbsp;<?php echo _JGA_COUNTER_NUMBER_ASTERISK; ?>
<?php
    }
    if ($jg_delete_original == 2) {
?>
        <br /><?php echo $sup2; ?>&nbsp;<?php echo _JGA_DELETE_ORIGINAL_AFTER_UPLOAD_ASTERISK; ?>
<?php
    }
?>
      </div>
    </td>
  </tr>
</table>
</form>
<?php
  }


  function Joom_ShowFTPUpload_HTML($option, $batchul) {
    global $mosConfig_absolute_path, $my, $database, $mainframe, $gentitle, 
           $jg_useorigfilename, $jg_delete_original, $jg_pathftpupload, 
           $jg_filenamenumber, $bugtest;

    $subdirectory=$this->subdirectory;
?>
<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td width="100%" class="sectionname" align="left">
      <p>
      <a href='http://www.joomgallery.net/' target='_blank'>
      <img src="../administrator/components/com_joomgallery/assets/images/main2.png" hspace="6" border="0" align="top" width="16" height="16" alt="<?php echo _JGA_JOOMGALLERY; ?>" /></a>&nbsp;
      <span style="font-size:13px; font-weight:bold;">
        <?php echo _JGA_JOOMGALLERY.' :: '._JGA_FTP_UPLOAD_MANAGER; ?> 
      </span>
      </p>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminlist">
  <tr align="center" valign="middle">
    <td colspan="2" align="center" valign="top">
<?php
    if ($batchul) {
?>
      <span style="color:green"><b><?php echo _JGA_UPLOAD_COMPLETE_CHOOSE_NEXT; ?></b></span>
<?php
    }
?>
    </td>
  </tr>
  <p />
  <tr align="center" valign="middle">
    <td align="right" width="50%">
      <?php echo _JGA_PICTURES_PATH; ?>:
    </td>
    <td align="left" width="50%">
      <?php echo $mosConfig_absolute_path.$jg_pathftpupload.$subdirectory; ?>
    </td>
  </tr>
<?php
    $dirs = Joom_RecursiveListDir($mosConfig_absolute_path.$jg_pathftpupload);
    if(count($dirs)>0) {
      sort($dirs);
?>
  <tr>
    <td align="right">
      <?php echo _JGA_SELECT_DIRECTORY; ?>:
    </td>
    <td align="left">
  <form action="index2.php?option=com_joomgallery&act=ftpupload" method="post" name="dirForm">
  <select name="subdirectory"  size="1">
  <option>/</option>
<?php
      foreach($dirs as $dir) {
       $dir = str_replace($mosConfig_absolute_path.$jg_pathftpupload,"",$dir);
       $selected = ($dir."/" == $subdirectory) ? " selected = \"selected\"" : "";
?>
    <option<?php echo $selected.">".$dir; ?>/</option>
<?php
      }
?>
  </select>
  <input type="submit" value="<?php echo _JGA_CHANGE_FOLDER; ?>" />
  </form>
    </td>
  </tr>
<?php
    }
?>
<form action="index2.php?task=ftpuploadhandler" method="post" name="adminForm" enctype="multipart/form-data" onsubmit="return joom_checkme();">
  <input type="hidden" name="option" value="<?php echo $option; ?>" />
  <input type="hidden" name="approved" value="1" />
  <input type="hidden" name="owner" value="<?php echo $my->username; ?>" />
  <input type="hidden" name="bugtest" value="<?php echo $bugtest; ?>" />
  <input type="hidden" name="subdirectory" value="<?php echo $subdirectory; ?>" />
  <tr>
    <td align="right">
      <?php echo _JGA_PLEASE_SELECT_PICTURES; ?>:
    </td>
    <td align="left">
<?php
     $imgFiles = mosReadDirectory("$mosConfig_absolute_path$jg_pathftpupload$subdirectory");
?>
      <select name="ftpfiles[]"  multiple size="20">
<?php
    foreach ($imgFiles as $file) {
      if (eregi("gif|jpe|jpeg|jpg|png", $file)) {
?>
        <option><?php echo $file; ?></option>
<?php
      }
    }
?>
      </select>
    </td>
  </tr>
  <tr>
    <td align="right">
      <?php echo _JGA_PICTURE_ASSIGN_TO_CATEGORY; ?>
    </td>
    <td align="left">
<?php
    $clist = Joom_ShowDropDownCategoryList(0,'catid',' class="inputbox" size="1" style="width:194;"');
    echo $clist;
?>
    </td>
  </tr>
<?php
    if (!$jg_useorigfilename && $jg_filenamenumber) {
      $sup1 = "&sup1;";
      $sup2 = "&sup2;";
      if (!$jg_delete_original == 2) {
        $sup3 = "&sup2;";
      } else {
        $sup3 = "&sup3;";
      }
    } else {
      if (!$jg_delete_original == 2) {
        $sup3 = "&sup1;";
      } else {
        $sup2 = "&sup1;";
        $sup3 = "&sup2;";
      }
    }
    if (!$jg_useorigfilename && $jg_filenamenumber) {
?>
  <tr>
    <td align="right">
      <?php echo _JGA_COUNTER_NUMBER; ?>&nbsp;<?php echo $sup1; ?>
    </td>
    <td align="left">
      <input type="text" name="filecounter" size="5" maxlength="5" />
    </td>
  </tr>
<?php
    }
    if (!$jg_useorigfilename) {
?>
  <tr>
    <td align="right">
      <?php echo _JGA_GENERIC_TITLE; ?>
    </td>
    <td align="left">
      <input type="text" name="gentitle" size="34" maxlength="256" default="<?php echo $gentitle; ?>" />
    </td>
  </tr>
<?php
    }
?>
  <tr>
    <td align="right">
      <?php echo _JGA_GENERIC_DESCRIPTION . ' ' . _JGA_OPTION; ?>
    </td>
    <td align="left">
      <input type="text" name="gendesc" size="34" maxlength="1000" />
    </td>
  </tr>
  <tr>
    <td align="right">
      <?php echo _JGA_AUTHOR . ' ' . _JGA_OPTION; ?>
    </td>
    <td align="left">
      <input type="text" name="photocred" size="34" maxlength="256" />
    </td>
  </tr>
  <tr>
    <td align="right">
      <?php echo _JGA_DELETE_AFTER_UPLOAD; ?>
    </td>
    <td align="left">
      <input type="checkbox" name="file_delete" value="1" checked="checked" />
    </td>
  </tr>
<?php
   if ($jg_delete_original == 2) {
?>
  <tr>
    <td align="right">
      <?php echo _JGA_DELETE_ORIGINAL_AFTER_UPLOAD; ?>&nbsp;<?php echo $sup2; ?>
    </td>
    <td align="left">
      <input type="checkbox" name="original_delete" value="1" />
    </td>
  </tr>
<?php
   }
?>
  <tr>
    <td align="right">
      <?php echo _JGA_CREATE_SPECIAL_GIF; ?>&nbsp;<?php echo $sup3; ?>
    </td>
    <td align="left">
      <input type="checkbox" name="create_special_gif" value="1" />
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <br /><input type="submit" value="<?php echo _JGA_UPLOAD; ?>" />
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <div align="center" class="smallgrey">
<?php
    if (!$jg_useorigfilename && $jg_filenamenumber) {
?>
        <br /><?php echo $sup1; ?>&nbsp;<?php echo _JGA_COUNTER_NUMBER_ASTERISK; ?>
<?php
    }
    if ($jg_delete_original == 2) {
?>
        <br /><?php echo $sup2; ?>&nbsp;<?php echo _JGA_DELETE_ORIGINAL_AFTER_UPLOAD_ASTERISK; ?>
<?php
    }
?>
        <br /><?php echo $sup3; ?>&nbsp;<?php echo _JGA_CREATE_SPECIAL_GIF_ASTERISK; ?>
      </div>
    </td>
  </tr>
</form>
</table>
<?php
  }


  function Joom_ShowJUpload_HTML($option, $batchul) {
    global $mosConfig_live_site, $my, $database, $bugtest, $mainframe, $jg_useorigfilename, 
           $jg_delete_original, $jg_filenamenumber,$jg_maxwidth,$jg_picturequality,
           $jg_resizetomaxwidth;

    //cpanel
    echo "<script language = \"javascript\" type = \"text/javascript\">\n";
    echo "<!--\n";
    echo "function submitbutton(pressbutton) {\n";
    echo "  var form = document.adminForm;\n";
    echo "  if (pressbutton == 'cpanel') {\n";
    echo "    location.href = \"index2.php?option=com_joomgallery\";\n";
    echo "  }\n";
    echo "}\n";
    echo "//-->\n";
    echo "</script>\n";
    echo "</form>";
?>
<!-- --------------------------------------------------------------------------------------------------- -->
<!-- --------     A DUMMY APPLET, THAT ALLOWS THE NAVIGATOR TO CHECK THAT JAVA IS INSTALLED   ---------- -->
<!-- --------               If no Java: Java installation is prompted to the user.            ---------- -->
<!-- --------------------------------------------------------------------------------------------------- -->
<!--"CONVERTED_APPLET"-->
<!-- HTML CONVERTER -->
<script language="JavaScript" type="text/javascript"><!--
    var _info = navigator.userAgent;
    var _ns = false;
    var _ns6 = false;
    var _ie = (_info.indexOf("MSIE") > 0 && _info.indexOf("Win") > 0 && _info.indexOf("Windows 3.1") < 0);
//--></script>
    <comment>
        <script language="JavaScript" type="text/javascript"><!--
        var _ns = (navigator.appName.indexOf("Netscape") >= 0 && ((_info.indexOf("Win") > 0 && _info.indexOf("Win16") < 0 && java.lang.System.getProperty("os.version").indexOf("3.5") < 0) || (_info.indexOf("Sun") > 0) || (_info.indexOf("Linux") > 0) || (_info.indexOf("AIX") > 0) || (_info.indexOf("OS/2") > 0) || (_info.indexOf("IRIX") > 0)));
        var _ns6 = ((_ns == true) && (_info.indexOf("Mozilla/5") >= 0));
//--></script>
    </comment>

<script language="JavaScript" type="text/javascript"><!--
    if (_ie == true) document.writeln('<object classid="clsid:8AD9C840-044E-11D1-B3E9-00805F499D93" WIDTH = "0" HEIGHT = "0" NAME = "JUploadApplet"  codebase="http://java.sun.com/update/1.5.0/jinstall-1_5-windows-i586.cab#Version=5,0,0,3"><noembed><xmp>');
    else if (_ns == true && _ns6 == false) document.writeln('<embed ' +
      'type="application/x-java-applet;version=1.5" \
            CODE = "wjhk.jupload2.EmptyApplet" \
            ARCHIVE = "<?php echo $mosConfig_live_site?>/administrator/components/com_joomgallery/assets/java/wjhk.jupload.jar" \
            NAME = "JUploadApplet" \
            WIDTH = "0" \
            HEIGHT = "0" \
            type ="application/x-java-applet;version=1.6" \
            scriptable ="false" ' +
      'scriptable=false ' +
      'pluginspage="http://java.sun.com/products/plugin/index.html#download"><noembed><xmp>');
//--></script>
<applet  code = "wjhk.jupload2.EmptyApplet" ARCHIVE = "<?php echo $mosConfig_live_site?>/administrator/components/com_joomgallery/assets/java/wjhk.jupload.jar" WIDTH = "0" HEIGHT = "0" NAME = "JUploadApplet"></xmp>
    <param name = CODE VALUE = "wjhk.jupload2.EmptyApplet" >
    <param name = ARCHIVE VALUE = "<?php echo $mosConfig_live_site?>/administrator/components/com_joomgallery/assets/java/wjhk.jupload.jar" >
    <param name = NAME VALUE = "JUploadApplet" >
    <param name = "type" value="application/x-java-applet;version=1.5">
    <param name = "scriptable" value="false">
    <param name = "type" VALUE="application/x-java-applet;version=1.6">
    <param name = "scriptable" VALUE="false">
</xmp>
Java 1.5 or higher plugin required.
</applet>
</noembed>
</embed>
</object>

<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td width="100%" class="sectionname" align="left">
      <p>
      <a href='http://www.joomgallery.net/' target='_blank'>
      <img src="../administrator/components/com_joomgallery/assets/images/main2.png" hspace="6" border="0" align="top" width="16" height="16" alt="<?php echo _JGA_JOOMGALLERY; ?>" /></a>&nbsp;
      <span style="font-size:13px; font-weight:bold;">
        <?php echo _JGA_JOOMGALLERY.' :: '._JGA_JAVA_UPLOAD_MANAGER; ?> 
      </span>
      </p>
    </td>
  </tr>
</table>
<form name="adminForm">
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="approved" value="1" />
<input type="hidden" name="owner" value="<?php echo $my->username; ?>" />
<input type="hidden" name="bugtest" value="<?php echo $bugtest; ?>" />
<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminlist">
  <tr>
    <td colspan="2">
      <div align="center">
        <?php echo _JGA_JUPLOAD_NOTE; ?>
      </div>
    </td>
  </tr>
  <tr>
    <td align="right" width="50%">
      <div align="right">
        <?php echo _JGA_PICTURE_ASSIGN_TO_CATEGORY; ?>
      </div>
    </td>
    <td align="left"  width="50%">
<?php
    $clist = Joom_ShowDropDownCategoryList(0,'catid',' class="inputbox" size="1" style="width:228;"');
    global $gentitle;
    echo $clist;
?>
    </td>
  </tr>
<?php
    if (!$jg_useorigfilename && $jg_filenamenumber) {
      $sup1 = "&sup1;";
      $sup2 = "&sup2;";
      if (!$jg_delete_original == 2) {
        $sup3 = "&sup2;";
      } else {
        $sup3 = "&sup3;";
      }
    } else {
      if (!$jg_delete_original == 2) {
        $sup3 = "&sup1;";
      } else {
        $sup2 = "&sup1;";
        $sup3 = "&sup2;";
      }
    }
      
    if (!$jg_useorigfilename && $jg_filenamenumber) {
?>
  <tr>
    <td align="right">
      <?php echo _JGA_COUNTER_NUMBER; ?>&nbsp;<?php echo $sup1; ?>
    </td>
    <td align="left">
      <input type="text" name="filecounter" size="5" maxlength="5" />
    </td>
  </tr>
<?php
    }
    if (!$jg_useorigfilename) {
?>
  <tr>
    <td align="right">
      <div align="right">
        <?php echo _JGA_GENERIC_TITLE; ?>
      </div>
    </td>
    <td align="left">
      <input type="text" name="gentitle" size="34" maxlength="256" default="<?php echo $gentitle; ?>" />
    </td>
  </tr>
<?php
    }
?>
  <tr>
    <td align="right">
      <div align="right">
        <?php echo _JGA_GENERIC_DESCRIPTION . ' ' . _JGA_OPTION; ?>
      </div>
    </td>
    <td align="left">
      <input type="text" name="gendesc" size="34" maxlength="1000" />
    </td>
  </tr>
  <tr>
    <td align="right">
      <div align="right">
        <?php echo _JGA_AUTHOR . ' ' . _JGA_OPTION; ?>
      </div>
    </td>
    <td align="left">
      <input type="text" name="photocred" size="34" maxlength="256" />
    </td>
  </tr>
  <tr>
    <td align="right">
        <?php echo _JGA_DELETE_ORIGINAL_AFTER_UPLOAD; ?>&nbsp;&sup2;
    </td>
    <td align="left">
      <input type="checkbox" name="original_delete" value="1" />
    </td>
  </tr>
  <tr>
    <td align="right">
      <div align="right">
        <?php echo _JGA_CREATE_SPECIAL_GIF; ?>&nbsp;<?php echo $sup3; ?>
      </div>
    </td>
    <td align="left">
      <input type="checkbox" name="create_special_gif" value="1" />
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <div align="center" class="smallgrey">
<?php
    if (!$jg_useorigfilename && $jg_filenamenumber) {
?>
        <br /><?php echo $sup1; ?>&nbsp;<?php echo _JGA_COUNTER_NUMBER_ASTERISK; ?>
<?php
    }
    if ($jg_delete_original == 2) {
?>
        <br /><?php echo $sup2; ?>&nbsp;<?php echo _JGA_DELETE_ORIGINAL_AFTER_UPLOAD_ASTERISK; ?>
<?php
    }
?>
        <br /><?php echo $sup3; ?>&nbsp;<?php echo _JGA_CREATE_SPECIAL_GIF_ASTERISK; ?>
      </div>
    </td>
  </tr>     
  <tr>
  <?php
  //TODOs
  //maxFileSize von Servereinstellungen abhaengig machen post_max_size/upload_max_filesize
  //  <param name="maxFileSize" value="2000000">
  // Files per Request dynamisch einstellen?
  //  <param name="nbFilesPerRequest" value="4"> 
  //Bugtest?? Kann auch ueber das Applet direkt eingeschaltet werden
  //<param name="debugLevel" value="90">
  
  //Wenn 'Originale loeschen' im Backend eingestellt ist UND das Bild resized
  //werden soll, erfolgt dies lokal im Applet, es wird nur das Detailbild
  //hochgeladen
  ?>
    <td colspan="2" align="center">
      <applet name="JUpload" code="wjhk.jupload2.JUploadApplet" archive="<?php echo $mosConfig_live_site?>/administrator/components/com_joomgallery/assets/java/wjhk.jupload.jar" width="800" height="600" mayscript>
      <param name="postURL" value="<?php echo $mosConfig_live_site?>/administrator/index2.php?option=com_joomgallery&task=juploadhandler_receive">
      <param name="lookAndFeel" value="system">
      <param name="showLogWindow" value=false>
      <param name="showStatusBar" value="true">
      <param name="serverProtocol" value="null">
      <param name="formdata" value="adminForm">
      <param name="debugLevel" value="0">
      <param name="afterUploadURL" value="javascript:alert('<?php echo _JGA_UPLOAD_COMPLETE ?>');">
      <param name="nbFilesPerRequest" value="4">
      <param name="stringUploadSuccess" value="JOOMGALLERYUPLOADSUCCESS">
      <param name="stringUploadError" value="JOOMGALLERYUPLOADERROR (.*)">
      <param name="uploadPolicy" value="PictureUploadPolicy">
      <param name="allowedFileExtensions" value="jpg/jpeg/jpe/png/gif">
      <param name="pictureCompressionQuality" value="<?php echo ($jg_picturequality/100); ?>">
<?php
    if ($jg_delete_original && $jg_resizetomaxwidth) {
?>     
      <param name="maxPicHeight" value="<?php echo $jg_maxwidth; ?>">
      <param name="maxPicWidth" value="<?php echo $jg_maxwidth; ?>">   
<?php
    }
?>      
      <param name="fileChooserImagePreview" value="false">
      <param name="fileChooserIconFromFileContent" value="-1">
      Java 1.5 or higher plugin required.
      </applet>
    </td>
  </tr>
</table>
</form>
<?php
  }

}
?>
