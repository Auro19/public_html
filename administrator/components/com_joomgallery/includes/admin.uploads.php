<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/admin.uploads.php $
// $Id: admin.uploads.php 396 2009-03-15 16:06:21Z aha $
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

include_once dirname(__FILE__) . '/html/admin.uploads.html.php';

class Joom_AdminUploads {
  var $subdirectory;

  function Joom_AdminUploads($task) {
    global $option, $batchul;

    $batchul = mosGetParam($_REQUEST, 'batchul', null);
    $this->subdirectory = mosGetParam($_POST, 'subdirectory', null);
    
    switch($task) {
      case 'upload':
        $this->Joom_ShowUpload($option, $batchul);
        break;

      case 'batchupload':
        $this->Joom_ShowBatchUpload($option);
        break;

      case 'ftpupload':
        $this->Joom_ShowFTPUpload($option, $batchul);
        break;
        
      case 'jupload':
        $this->Joom_ShowJUpload($option, $batchul);
        break;
   }
  }


/******************************************************************************\
*                            Functions / Uploads                               *
\******************************************************************************/


function Joom_ShowUpload($option, $batchul) {
  global $my, $database, $mainframe, $jg_wrongvaluecolor, $jg_filenamewithjs,
         $jg_useorigfilename;

  echo "  <script language = \"javascript\" type = \"text/javascript\">\n";
  echo "  <!--\n";
  echo "function submitbutton(pressbutton) {\n";
  echo "  if (pressbutton == 'cpanel') {\n";
  echo "   location.href = \"index2.php?option=com_joomgallery\";\n";
  echo "  }\n";
  echo "}\n";
  echo "  function joom_checkme() {\n";
  echo "    var form = document.adminForm;\n";
  echo "    var ffwrong = '".$jg_wrongvaluecolor."';\n";
  echo "    form.catid.style.backgroundColor = '';\n";
  echo "    var doublefiles = false;\n";
  // do field validation
  if(!$jg_useorigfilename) {
    echo "    form.gentitle.style.backgroundColor = '';\n";
    echo "    if (form.gentitle.value == '' || form.gentitle.value == null) {\n";
    echo "      alert('"._JGA_ALERT_PICTURE_MUST_HAVE_TITLE."');\n";
    echo "      form.gentitle.style.backgroundColor = ffwrong;\n";
    echo "      form.gentitle.focus();\n";
    echo "      return false;\n";
    echo "    }\n";
  }
  echo "    if (form.catid.value == '0') {\n";
  echo "      alert('"._JGA_ALERT_YOU_MUST_SELECT_CATEGORY."');\n";
  echo "      form.catid.style.backgroundColor = ffwrong;\n";
  echo "      form.catid.focus();\n";
  echo "      return false;\n";
  echo "    }\n";
  //Prueft ob ueberhaupt Dateien angeben wurden.
  echo "    else {\n";
  echo "     var zaehl = 0;\n";
  echo "     var arenofiles = true;\n";
  echo "     var fullfields = new Array();\n";
  echo "     var screenshotfieldname = new Array();\n";
  echo "     var screenshotfieldvalue = new Array();\n";
  echo "     for(i=0;i<10;i++) {\n";
  echo "      screenshotfieldname[i] = 'arrscreenshot['+i+']';\n";
  echo "      screenshotfieldvalue[i] = document.getElementsByName(screenshotfieldname[i])[0].value;\n";
  echo "      document.getElementsByName(screenshotfieldname[i])[0].style.backgroundColor='';\n";
  echo "      if(screenshotfieldvalue[i] != '') {\n";
  echo "       arenofiles = false;\n";
  echo "       fullfields[zaehl] = i;\n";
  echo "       zaehl++;\n";
  echo "      }\n";
  echo "     }\n";
  echo "    }\n";
  echo "    if(arenofiles) {\n";
  echo "     alert('". _JGA_ALERT_YOU_MUST_SELECT_ONE_PICTURE."');\n";
  echo "     document.getElementsByName(screenshotfieldname[0])[0].focus();\n";
  echo "     return false;\n";
  echo "    }\n";
  //Prueft ob die Dateitypen auch .jpg,.gif und .png sind
  echo "    else {\n";
  echo "     var extensionsnotok = false;\n";
  echo "     var searchextensiontest = new Array();\n";
  echo "     var searchextension = new Array();\n";
  //However you have to define this RegExp for each item.
  for ($i=0; $i < 10; $i++) {
    echo "      searchextension[$i] = new RegExp('\.jpg$|\.jpeg$|\.jpe$|\.gif$|\.png$','ig');\n";
  }
  echo "     for(i=0;i<fullfields.length;i++) {\n";
  echo "      searchextensiontest = searchextension[i].test(screenshotfieldvalue[fullfields[i]]);\n";
  echo "      if(searchextensiontest!=true) {\n";
  echo "       extensionsnotok = true;\n";
  echo "       document.getElementsByName(screenshotfieldname[fullfields[i]])[0].style.backgroundColor = ffwrong;\n";
  echo "      }\n";
  echo "     }\n";
  echo "    }\n";
  echo "    if(extensionsnotok) {\n";
  echo "     alert('"._JGA_ALERT_WRONG_EXTENSION."');\n";
  echo "     document.getElementsByName(screenshotfieldname[0])[0].focus();\n";
  echo "     return false;\n";
  echo "    }\n";
  echo "    else {\n";
  echo "     var filenamesnotok = false;\n";
  if($jg_filenamewithjs!=0) {
    echo "     var searchwrongchars = /[^ a-zA-Z0-9_-]/;\n";
    echo "     var lastbackslash = new Array();\n";
    echo "     var endoffilename = new Array();\n";
    echo "     var filename = new Array();\n";
    echo "     for(i=0;i<fullfields.length;i++) {\n";
    echo "      lastbackslash[i] = screenshotfieldvalue[fullfields[i]].lastIndexOf('\\\\');\n";
    echo "      if(lastbackslash[i]<1) {\n";
    echo "       lastbackslash[i] = screenshotfieldvalue[fullfields[i]].lastIndexOf('/');\n";
    echo "      }\n";
    echo "      endoffilename[i] = screenshotfieldvalue[fullfields[i]].lastIndexOf('\\.')-screenshotfieldvalue[fullfields[i]].length;\n";
    echo "      filename[i] = screenshotfieldvalue[fullfields[i]].slice(lastbackslash[i]+1,endoffilename[i]);\n";
    echo "      if(searchwrongchars.test(filename[i])) {\n";
    echo "       filenamesnotok = true;\n";
    echo "       document.getElementsByName(screenshotfieldname[fullfields[i]])[0].style.backgroundColor = ffwrong;\n";
    echo "      }\n";
    echo "     }\n";
  }
  echo "    }\n";
  echo "    if(filenamesnotok) {\n";
  echo "     alert('"._JGA_ALERT_WRONG_FIILENAME."');\n";
  echo "     document.getElementsByName(screenshotfieldname[0])[0].focus();\n";
  echo "     return false;\n";
  echo "    }\n";
  echo "    else if(fullfields.length>1) {\n";
  echo "     var feld1 = new Number();\n";
  echo "     var feld2 = new Number();\n";
  echo "     for(i=0;i<fullfields.length;i++) {\n";
  echo "      for(j=fullfields.length-1;j>i;j--) {\n";
  echo "       if(screenshotfieldvalue[fullfields[i]].indexOf(screenshotfieldvalue[fullfields[j]])==0) {\n";
  echo "        doublefiles = true;\n";
  echo "        document.getElementsByName(screenshotfieldname[fullfields[i]])[0].style.backgroundColor = ffwrong;\n";
  echo "        document.getElementsByName(screenshotfieldname[fullfields[j]])[0].style.backgroundColor = ffwrong;\n";
  echo "        feld1 = i+1;\n";
  echo "        feld2 = j+1\n";
  echo "        alert('"._JGA_ALERT_FILENAME_DOUBLE1." '+feld1+' "._JGA_ALERT_FILENAME_DOUBLE2." '+feld2+'.');\n";
  echo "       }\n";
  echo "      }\n";
  echo "     }\n";
  echo "    }\n";
  echo "    if(doublefiles) {\n";
  echo "     document.getElementsByName(screenshotfieldname[0])[0].focus();\n";
  echo "     return false;\n";
  echo "    }\n";
  echo "    else {\n";
  echo "     form.submit();\n";
  echo "     return true;\n";
  echo "   }\n";
  echo "  }\n";
  echo "  //-->\n";
  echo "  </script>\n";

  HTML_Joom_AdminUploads::Joom_ShowUpload_HTML($batchul, $option);
}


function Joom_ShowBatchUpload($option) {
  global $database, $mainframe, $jg_filenamenumber, $jg_wrongvaluecolor,
         $jg_filenamewithjs, $jg_useorigfilename;

  echo "<script language=\"Javascript\" type=\"text/javascript\">\n";
  echo "<!--\n";
  echo "function submitbutton(pressbutton) {\n";
  echo "  if (pressbutton == 'cpanel') {\n";
  echo "   location.href = \"index2.php?option=com_joomgallery\";\n";
  echo "  }\n";
  echo "}\n";
  echo "function joom_checkme() {\n";
  echo "\n";
  echo "    var form = document.adminForm;\n";
  echo "    var ffwrong = '".$jg_wrongvaluecolor."';\n";
  echo "    form.zippack.style.backgroundColor = '';\n";
  echo "    form.catid.style.backgroundColor = '';\n";
  if(!$jg_useorigfilename) {
    echo "    form.gentitle.style.backgroundColor = '';\n";
  }
  echo "    if (form.zippack.value == '' || form.zippack.value == null) {\n";
  echo "     alert('"._JGA_ALERT_YOU_MUST_SELECT_ONE_FILE."');\n";
  echo "     form.zippack.style.backgroundColor = ffwrong;\n";
  echo "     form.zippack.focus();\n";
  echo "     return false;\n";
  echo "    }\n";
  if(!$jg_useorigfilename) {
    echo "    else if (form.gentitle.value == '' || form.gentitle.value == null) {\n";
    echo "     alert('"._JGA_ALERT_PICTURE_MUST_HAVE_TITLE."');\n";
    echo "     form.gentitle.style.backgroundColor = ffwrong;\n";
    echo "     form.gentitle.focus();\n";
    echo "     return false;\n";
    echo "    }\n";
  }
  echo "\n";
  echo "    var filecounterok = true;\n";
  if ( !$jg_useorigfilename && $jg_filenamenumber) {
    echo "    form.filecounter.style.backgroundColor = '';\n";
    echo "    if (form.filecounter.value != '') {\n";
    echo "     var searchwrongchars1 = /[^0-9]/;\n";
    echo "     if(searchwrongchars1.test(form.filecounter.value)) {\n";
    echo "      filecounterok = false;\n";
    echo "      alert('"._JGA_ALERT_WRONG_VALUE."');\n";
    echo "      form.filecounter.style.backgroundColor = ffwrong;\n";
    echo "      form.filecounter.focus();\n";
    echo "      return false;\n";
    echo "     }\n";
    echo "    }\n";
    echo "\n";
  }
  echo "    if (form.catid.value == '0' && filecounterok) {\n";
  echo "     alert('"._JGA_ALERT_YOU_MUST_SELECT_CATEGORY."');\n";
  echo "     form.catid.style.backgroundColor = ffwrong;\n";
  echo "     form.catid.focus();\n";
  echo "     return false;\n";
  echo "    }\n";
  echo "\n";
  echo "    else {\n";
  echo "     var filenamesnotok = false;\n";
  if($jg_filenamewithjs!=0  && $jg_useorigfilename==0) {
    echo "     var searchwrongchars = /[^ a-zA-Z0-9_-]/;\n";
    echo "     if(searchwrongchars.test(form.gentitle.value)) {\n";
    echo "      filenamesnotok = true;\n";
    echo "     }\n";
  }
  echo "    }\n";
  echo "    if(filenamesnotok) {\n";
  echo "     alert('"._JGA_ALERT_WRONG_FIILENAME."');\n";
  echo "     form.gentitle.style.backgroundColor = ffwrong;\n";
  echo "     form.gentitle.focus();\n";
  echo "     return false;\n";
  echo "    }\n";
  echo "    else {\n";
  echo "     form.submit();\n";
  echo "    return true;\n";
  echo "     }\n";
  echo "\n";
  echo "}\n";
  echo "//-->\n";
  echo "</script>\n";

  HTML_Joom_AdminUploads::Joom_ShowBatchUpload_HTML($option);
}


function Joom_ShowFTPUpload($option, $batchul) {
  global $my,$database, $mainframe, $mosConfig_absolute_path, $jg_filenamenumber,
         $jg_wrongvaluecolor, $jg_filenamewithjs, $jg_useorigfilename;

  echo "<script language=\"Javascript\" type=\"text/javascript\">\n";
  echo "<!--\n";
  echo "function submitbutton(pressbutton) {\n";
  echo "  if (pressbutton == 'cpanel') {\n";
  echo "   location.href = \"index2.php?option=com_joomgallery\";\n";
  echo "  }\n";
  echo "}\n";
  echo "function joom_checkme() {\n";
  echo "\n";
  echo "    var form = document.adminForm;\n";
  echo "    var ffwrong = '".$jg_wrongvaluecolor."';\n";
  echo "    form.catid.style.backgroundColor = '';\n";
  if($jg_useorigfilename==0) {
    echo "    form.gentitle.style.backgroundColor = '';\n";
    echo "    if (form.gentitle.value == '' || form.gentitle.value == null) {\n";
    echo "     alert('"._JGA_ALERT_PICTURE_MUST_HAVE_TITLE."');\n";
    echo "     form.gentitle.style.backgroundColor = ffwrong;\n";
    echo "     form.gentitle.focus();\n";
    echo "     return false;\n";
    echo "    }\n";
  }
  echo "\n";
  echo "    var filecounterok = true;\n";
  if ( !$jg_useorigfilename && $jg_filenamenumber) {
    echo "    form.filecounter.style.backgroundColor = '';\n";
    echo "    if (form.filecounter.value != '') {\n";
    echo "     var searchwrongchars1 = /[^0-9]/;\n";
    echo "     if(searchwrongchars1.test(form.filecounter.value)) {\n";
    echo "      filecounterok = false;\n";
    echo "      alert('"._JGA_ALERT_WRONG_VALUE."');\n";
    echo "      form.filecounter.style.backgroundColor = ffwrong;\n";
    echo "      form.filecounter.focus();\n";
    echo "      return false;\n";
    echo "     }\n";
    echo "    }\n";
    echo "\n";
  }
  echo "    if (form.catid.value == '0' && filecounterok) {\n";
  echo "     alert('"._JGA_ALERT_YOU_MUST_SELECT_CATEGORY."');\n";
  echo "     form.catid.style.backgroundColor = ffwrong;\n";
  echo "     form.catid.focus();\n";
  echo "     return false;\n";
  echo "    }\n";
  echo "\n";
  echo "    else {\n";
  echo "     var filenamesnotok = false;\n";
  if($jg_filenamewithjs!=0  && $jg_useorigfilename==0) {
    echo "     var searchwrongchars = /[^ a-zA-Z0-9_-]/;\n";
    echo "     if(searchwrongchars.test(form.gentitle.value)) {\n";
    echo "      filenamesnotok = true;\n";
    echo "     }\n";
  }
  echo "    }\n";
  echo "    if(filenamesnotok) {\n";
  echo "     alert('"._JGA_ALERT_WRONG_FIILENAME."');\n";
  echo "     form.gentitle.style.backgroundColor = ffwrong;\n";
  echo "     form.gentitle.focus();\n";
  echo "     return false;\n";
  echo "    }\n";
  echo "    else {\n";
  echo "     form.submit();\n";
  echo "    return true;\n";
  echo "     }\n";
  echo "\n";
  echo "}\n";
  echo "//-->\n";
  echo "</script>\n";

  HTML_Joom_AdminUploads::Joom_ShowFTPUpload_HTML($option, $batchul);
}


function Joom_ShowJUpload($option, $batchul) {
  global $my, $database, $mainframe, $jg_wrongvaluecolor, $jg_filenamewithjs,
         $jg_useorigfilename;

  HTML_Joom_AdminUploads::Joom_ShowJUpload_HTML($option, $batchul);
}


}

?>
