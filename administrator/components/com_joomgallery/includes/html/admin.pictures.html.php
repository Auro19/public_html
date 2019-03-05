<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/html/admin.pictures.html.php $
// $Id: admin.pictures.html.php 396 2009-03-15 16:06:21Z aha $
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
*                            Functions / Pictures                              *
\******************************************************************************/

class HTML_Joom_AdminPictures {


  function Joom_ShowPictures_HTML($option, &$rows, &$clist, &$slist, &$search,
                                  &$pageNav, &$olist) {
    global $database,$thumbnailpath, $absolut_thumbnailpath, $jg_dateformat, $mosConfig_live_site;

?>
<script  type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
<form action="index2.php" method="post" name="adminForm">
<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td width="100%" class="sectionname"  align="left">
      <p>
      <a href='http://www.joomgallery.net/' target='_blank'>
      <img src="../administrator/components/com_joomgallery/assets/images/main2.png" hspace="6" border="0" align="top" width="16" height="16" alt="<?php echo _JGA_JOOMGALLERY; ?>" /></a>&nbsp;
      <span style="font-size:13px; font-weight:bold;">
        <?php echo _JGA_JOOMGALLERY.' :: '._JGA_PICTURE_MANAGER; ?> 
      </span>
      </p>
    </td>
  </tr>
</table>
<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td width="100%"></td>
    <td nowrap><?php echo _JGA_DISPLAY; ?><br />
      <?php echo $pageNav->writeLimitBox(); ?>
    </td>
    <td><?php echo _JGA_SEARCH; ?><br />
      <input type="text" name="search" value="<?php echo $search;?>"
       class="inputbox" onChange="document.adminForm.submit();" />
    </td>
    <td nowrap>
      <?php echo _JGA_SORT_BY_ORDER; ?><br />
      <?php echo $olist;?>
    </td>
    <td nowrap>
      <?php echo _JGA_SORT_BY_CATEGORY; ?><br />
      <?php echo $clist;?>
    </td>
    <td><?php echo _JGA_SORT_BY_TYPE; ?><br />
      <?php echo $slist;?>
    </td>
  </tr>
</table>
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
  <tr>
    <th width="20">
      <input type="checkbox" name="toggle" value=""
       onclick="checkAll(<?php echo count($rows); ?>);" />
    </th>
    <th width="5%"></th>
    <th class="title" width="20%">
      <?php echo _JGA_TITLE; ?>
    </th>
    <th width="20%">
      <div align="left">
        <?php echo _JGA_CATEGORY; ?>
      </div>
    </th>
    <th width="5%">
      <div align="center">
        <?php echo _JGA_HITS; ?>
      </div>
    </th>
    <th width="10%" colspan="2">
      <div align="center">
        <?php echo _JGA_ORDERING; ?>
      </div>
    </th>
    <th width="5%">
      <div align="center">
        <a href="javascript: saveorder( <?php echo count($rows)-1; ?> )">
          <img src="images/filesave.png" border="0" width="16" height="16"
           alt="<?php echo _JGA_SAVE_ORDER; ?>" />
        </a>
      </div>
    </th>
    <th width="5%">
      <?php echo _JGA_PUBLISHED; ?>
    </th>
    <th width="5%">
      <?php echo _JGA_APPROVED; ?>
    </th>
    <th width="5%">
      <?php echo _JGA_OWNER; ?>
    </th>
    <th width="5%">
      <?php echo _JGA_AUTHOR; ?>
    </th>
    <th width="5%">
      <?php echo _JGA_TYPE; ?>
    </th>
    <th width="15%">
      <?php echo _JGA_DATE; ?>
    </th>
  </tr>
<?php
    $k = 0;
    for ($i=0, $n=count($rows); $i < $n; $i++) {
      $row = &$rows[$i];
      $taska = $row->approved ? 'rejectpic' : 'approvepic';
      $imga = $row->approved ? 'tick.png' : 'publish_x.png';
      $task = $row->published ? 'unpublishpic' : 'publishpic';
      $img = $row->published ? 'tick.png' : 'publish_x.png';

      $userid = $row->owner;
      $catpath = Joom_GetCatPath($row->catid);
      $tnfile = 'tn_';
      if (is_file($absolut_thumbnailpath.$catpath.$row->imgthumbname)) {
        $imginfo = getimagesize($absolut_thumbnailpath.$catpath.$row->imgthumbname);
        $imgsource = $thumbnailpath.$catpath.$row->imgthumbname;
        $srcWidth = $imginfo[0];
        $srcHeight = $imginfo[1];
        $thumbexists = 1;
      } else if (is_file($absolut_thumbnailpath.$catpath.$tnfile.$row->imgthumbname)) {
        $imginfo = getimagesize($thumbnailpath.$catpath.$tnfile.$row->imgthumbname);
        $imgsource = $thumbnailpath.$catpath.$tnfile.$row->imgthumbname;
        $srcWidth = $imginfo[0];
        $srcHeight = $imginfo[1];
        $thumbexists = 1;
      } else {
        $thumbexists = 0;
      }

?>
  <tr class="<?php echo "row$k"; ?>">
    <td>
      <input type="checkbox" id="cb<?php echo $i;?>" name="id[]"
       value="<?php echo $row->id; ?>" onclick="isChecked(this.checked);" />
    </td>
    <td>
<?php
      if ($thumbexists) {
?>
      <a href="#edit" onmouseover="return overlib('<img src=\'<?php echo $imgsource; ?>\' />',WIDTH,<?php echo $srcWidth; ?>, HEIGHT,<?php echo $srcHeight; ?>)"  onmouseout="return nd()"; onclick="return listItemTask('cb<?php echo $i;?>','editpic')" alt=""/>
        <img src="<?php echo $imgsource; ?>" border="0" width="24" height="24" alt="" />
      </a>
<?php
      } else {
?>
      &nbsp;
<?php
      }
?>
    </td>
    <td>
      <div align="left">
        <a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','editpic')">
          <?php echo $row->imgtitle; ?>
        </a>
      </div>
    </td>
    <td>
      <div align="left">
        <?php echo Joom_ShowCategoryPath($row->catid); ?>
      </div>
    </td>
    <td>
      <div align="center">
        <?php echo $row->imgcounter; ?>
      </div>
    </td>
    <td align="center">
      <?php echo $pageNav->orderUpIcon($i, ($row->catid == @$rows[$i-1]->catid)); ?>
      <?php echo $pageNav->orderDownIcon($i, $n, ($row->catid == @$rows[$i+1]->catid)); ?>
    </td>
    <td align="center" colspan="2">
      <input type="text" name="order[]" size="5" value="<?php echo $row->ordering;?>"
       class="text_area" style="text-align: center" />
    </td>
    <td align='center'>
      <a href="javascript: void(0);" onClick="return listItemTask('cb<?php echo $i;?>','<?php echo $task;?>')">
        <img src="images/<?php echo $img;?>" border="0" alt="" />
      </a>
    </td>
    <td align='center'>
      <a href="javascript: void(0);" onClick="return listItemTask('cb<?php echo $i;?>','<?php echo $taska;?>')">
        <img src="images/<?php echo $imga;?>" border="0" alt="" />
      </a>
    </td>
    <td width="5%" align="center">
	  <?php echo getDisplayName($row->owner, true); ?>
    </td>
    <td width="5%" align="center">
<?php
      if ($row->imgauthor) {
?>
        <?php echo $row->imgauthor; ?>
<?php
      }
?>
    </td>
    <td width="5%" align="center">
<?php
      if ($row->useruploaded) {
?>
      <img src="../includes/js/ThemeOffice/users.png"
       alt="<?php echo _JGA_USER_UPLOAD; ?>"
       title="<?php echo _JGA_USER_UPLOAD; ?>" />
<?php
      } else {
?>
      <img src="../includes/js/ThemeOffice/credits.png"
       alt="<?php echo _JGA_ADMIN_UPLOAD; ?>"
       title="<?php echo _JGA_ADMIN_UPLOAD; ?>" />
<?php
      }
?>
    </td>
    <td width="10%" align="center">
      <?php echo strftime("$jg_dateformat", $row->imgdate); ?>
    </td>
<?php
      $k = 1 - $k;
?>
  </tr>
<?php
    }
?>
  <tr>
    <th align="center" colspan="14">
      <?php echo $pageNav->writePagesLinks(); ?>
    </th>
  </tr>
  <tr>
    <td align="center" colspan="14">
      <?php echo $pageNav->writePagesCounter(); ?>
    </td>
  </tr>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="task" value="pictures" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="returntask" value="pictures" />
<?php
if (defined( '_JEXEC' )) {
?>
<input type="hidden" name="limitstart" value="0" />
<?php
}
?>
</form>
<?php
  }


  function Joom_ShowNewPicture_HTML($option, &$Lists, $original_message) {
    global $my, $database,$jg_pathimages, $jg_paththumbs, $jg_wrongvaluecolor;

?>
<script language="javascript" type="text/javascript">
<!--
  function submitbutton(pressbutton) {
    var form = document.adminForm;
    if (pressbutton == 'canceleditpic') {
      submitform(pressbutton);
      return;
    }
    // do field validation
    form.imgtitle.style.backgroundColor = '';
    form.catid.style.backgroundColor = '';
    form.imgfilename.style.backgroundColor = '';
    form.imgthumbname.style.backgroundColor = '';
    var ffwrong = '<?php echo $jg_wrongvaluecolor; ?>';
    if (form.imgtitle.value == '' || form.imgtitle.value == null){
      alert('<?php echo _JGA_ALERT_PICTURE_MUST_HAVE_TITLE;?>');
      form.imgtitle.style.backgroundColor = ffwrong;
      form.imgtitle.focus();
    }
    else if (form.catid.value == "0"){
      alert('<?php echo _JGA_ALERT_YOU_MUST_SELECT_CATEGORY;?>');
      form.catid.style.backgroundColor = ffwrong;
      form.catid.focus();
    }
    else if (form.imgfilename.value == ''|| form.imgfilename.value == null){
      alert('<?php echo _JGA_ALERT_YOU_MUST_SELECT_PICTURE_FILENAME;?>');
      form.imgfilename.style.backgroundColor = ffwrong;
      form.imgfilename.focus();
    }
    else if (form.imgthumbname.value == '' || form.imgthumbname.value == null){
      alert('<?php echo _JGA_ALERT_YOU_MUST_SELECT_THUMBNAIL_FILENAME;?>');
      form.imgthumbname.style.backgroundColor = ffwrong;
      form.imgthumbname.focus();
    }
    else {
      submitform(pressbutton);
    }
  }
//-->
</script>
<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td width="100%" class="sectionname"  align="left">
      <p>
      <a href='http://www.joomgallery.net/' target='_blank'>
      <img src="../administrator/components/com_joomgallery/assets/images/main2.png" hspace="6" border="0" align="top" width="16" height="16" alt="<?php echo _JGA_JOOMGALLERY; ?>" /></a>&nbsp;
      <span style="font-size:13px; font-weight:bold;">
        <?php echo _JGA_JOOMGALLERY.' :: '._JGA_PICTURE_MANAGER.' :: '._JGA_PICTURE_ADD; ?> 
      </span>
      </p> 
    </td>
  </tr>
</table>
<form action="index2.php" method="post" name="adminForm" id="adminForm">
<table cellpadding="4" cellspacing="1" border="0" width="100%" class="adminform">
  <tr>
    <td width="20%" align="right">
      <?php echo _JGA_TITLE .': *' ; ?>
    </td>
    <td width="80%">
      <input class="inputbox" type="text" name="imgtitle" size="50"
      maxlength="100" value="<?php echo htmlspecialchars($this->imgtitle, ENT_QUOTES);?>" />
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_CATEGORY .': *'; ?>
    </td>
    <td>
      <?php echo $Lists['clist']; ?>
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_DESCRIPTION .':'; ?>
    </td>
    <td>
      <?php echo editorArea('editor1', str_replace('&','&amp;',$this->imgtext) ,
                            'imgtext', '500', '200', '70', '10' ) ; ?>
    </td>
  </tr>
    <tr>
    <td valign="top" align="right">
      <?php echo _JGA_OWNER .':'   ; ?>
    </td>
    <td>
      <?php echo $Lists['users'];?>
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_AUTHOR .':'; ?>
    </td>
    <td>
      <input class="inputbox" type="text" name="imgauthor"
       value="<?php echo $this->imgauthor; ?>" size="50" maxlength="100" />
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_PICTURE . '-' . _JGA_CATEGORY .': *'; ?>
    </td>
    <td>
      <?php echo $Lists['cplist']; ?>
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_PICTURE .': *'; ?>
    </td>
    <td>
      <?php echo $Lists['imagelist']; ?>
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_DOES_ORIGINAL_EXIST; ?>
    </td>
    <td>
<?php
    if ($original_message == 1) {
      $orig_msg =  '<div style="color:green;">[ '._JGA_ORIGINAL_EXIST.' ]</div>';
    } else if ($original_message == 0) {
      $orig_msg = '<div style="color:red;">[ '._JGA_ORIGINAL_NOT_EXIST.' ]</div>';
    }
?>
    <script language="javascript" type="text/javascript">
      if (document.forms[0].imgfilename.options.value=='') {
        document.write('<?php echo "<div>["._JGA_NO_PICTURE_SELECTED." ]</div>"; ?>');
      } else {
        document.write('<?php echo $orig_msg; ?>');
      }
    </script>
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_ASSIGN_ORIGINAL; ?>&nbsp; &sup1;
    </td>
    <td>
      <?php echo $Lists['copy_original']; ?>
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_THUMBNAIL . '-' . _JGA_CATEGORY .': *'; ?>
    </td>
    <td>
      <?php echo $Lists['ctlist']; ?>
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_THUMBNAIL .': *'; ?>
    </td>
    <td>
      <?php echo $Lists['thumblist']; ?>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <br />
      <div class="smallgrey">
        *&nbsp;<?php echo _JGA_COMPULSORYFIELDS; ?><br />
        &sup1;&nbsp;<?php echo _JGA_ASSIGN_ORIGINAL_LONG; ?>
      </div>
    </td>
  </tr>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="task" value="newpic" />
<input type="hidden" name="imgdate" value="<?php echo mktime(); ?>" />
<input type="hidden" name="approved" value="<?php echo "1"; ?>" />
</form>
<p />
<?php
    $pcatpath = Joom_GetCatPath($this->pcatid);
    $tcatpath = Joom_GetCatPath($this->tcatid);
?>
<table cellpadding="4" cellspacing="1" border="0" width="100%" class="adminform">
  <tr>
    <td valign="top" align="center">
      <b><?php echo _JGA_THUMBNAIL_PREVIEW .':'   ; ?></b><br />
      <script language="javascript" type="text/javascript">
        if (document.forms[0].imgthumbname.options.value!='') {
          jsimg='<?php echo "..$jg_paththumbs/$tcatpath"; ?>' + getSelectedValue( 'adminForm', 'imgthumbname' );
        } else {
          jsimg='../images/M_images/blank.png';
        }
        document.write('<img src=' + jsimg + ' name="imagelib" border="2" alt="<?php echo _JGA_THUMBNAIL_PREVIEW; ?>" />');
      </script>
    </td>
    <td valign="top" align="center">
      <b><?php echo _JGA_PICTURE_PREVIEW .':'  ; ?></b><br />
      <script language="javascript" type="text/javascript">
        if (document.forms[0].imgfilename.options.value!='') {
          jsimg='<?php echo "..$jg_pathimages/$pcatpath"; ?>' + getSelectedValue( 'adminForm', 'imgfilename' );
        } else {
          jsimg='../images/M_images/blank.png';
        }
        document.write('<img src=' + jsimg + ' name="imagelib2" border="2" alt="<?php echo _JGA_PICTURE_PREVIEW; ?>" />');
      </script>
    </td>
  </tr>
</table>
<?php
  }


  function Joom_ShowEditPicture_HTML($option, &$row, $catname, &$Lists) {
    global $my, $database, $absolut_picturepath, $absolut_thumbnailpath,
           $jg_wrongvaluecolor, $joom_configfile;
    require $joom_configfile;

?>
<script language="javascript" type="text/javascript">
<!--
  function submitbutton(pressbutton) {
    var form = document.adminForm;
    if (pressbutton == 'canceleditpic') {
      submitform( pressbutton );
      return;
    }
    // do field validation
    form.imgtitle.style.backgroundColor = '';
    form.catid.style.backgroundColor = '';
    var ffwrong = '<?php echo $jg_wrongvaluecolor; ?>';
    if (form.imgtitle.value == '' || form.imgtitle.value == null){
      alert('<?php echo _JGA_ALERT_PICTURE_MUST_HAVE_TITLE;?>');
      form.imgtitle.style.backgroundColor = ffwrong;
      form.imgtitle.focus();
    } else if (form.catid.value == "0"){
      alert('<?php echo _JGA_ALERT_YOU_MUST_SELECT_CATEGORY;?>');
      form.catid.style.backgroundColor = ffwrong;
      form.catid.focus();
    } else {
      submitform( pressbutton );
    }
  }
//-->
</script>
<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td width="100%" class="sectionname"  align="left">
      <p>
      <a href='http://www.joomgallery.net/' target='_blank'>
      <img src="../administrator/components/com_joomgallery/assets/images/main2.png" hspace="6" border="0" align="top" width="16" height="16" alt="<?php echo _JGA_JOOMGALLERY; ?>" /></a>&nbsp;
      <span style="font-size:13px; font-weight:bold;">
        <?php echo _JGA_JOOMGALLERY.' :: '._JGA_PICTURE_MANAGER.' :: '._JGA_PICTURE_EDIT; ?> 
      </span>
      </p> 
    </td>
  </tr>
</table>
<form action="index2.php" method="post" name="adminForm" id="adminForm">
<table cellpadding="4" cellspacing="1" border="0" width="100%" class="adminform">
  <tr>
    <td width="20%" align="right">
      <?php echo _JGA_TITLE .':' ; ?>
    </td>
    <td width="80%">
      <input class="inputbox" type="text" name="imgtitle" size="50" maxlength="100" value="<?php echo htmlspecialchars( $row->imgtitle, ENT_QUOTES );?>" />
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_CATEGORY .':'   ; ?>
    </td>
    <td>
      <?php echo $catname; ?>&nbsp;(<?php echo $row->catid; ?>)
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_DESCRIPTION .':'   ; ?>
    </td>
    <td>
      <?php echo editorArea('editor1', str_replace('&','&amp;',$row->imgtext) , 'imgtext', '500', '200', '70', '10' ) ; ?>
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_OWNER .':'   ; ?>
    </td>
    <td>
      <?php echo $Lists['users'];?>
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_AUTHOR .':'   ; ?>
    </td>
    <td>
      <input class="inputbox" type="text" name="imgauthor" value="<?php echo $row->imgauthor; ?>" size="50" maxlength="100" />
    </td>
  </tr>
  <tr>
    <td valign="top" align="right">
      <?php echo _JGA_PICTURE_RATING .':'; ?> 
    </td>
    <td>
<?php 
      $voteavg = 0;
      if ($row->imgvotes > 0)
        $voteavg = number_format($row->imgvotesum / $row->imgvotes, 2, ',', '.');
?>
      <?php echo $voteavg .' (' .$row->imgvotes .' ' .  _JGA_PICTURE_VOTES . ')'; ?>
      <br />
      <input type="checkbox" value="clearpicvotes" name="clearpicvotes"> 
        <?php echo _JGA_CLEAR_PICTURE_VOTES; ?> 
    </td>
  </tr>
</table>
<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
<input type="hidden" name="catid" value="<?php echo $row->catid; ?>" />
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="approved" value="<?php if ($row->approved == "") {echo "1";} else {echo $row->approved;} ?>" />
<?php
  if ($row->id) {
?>
  <input type="hidden" name="returntask" value="edit" />
<?php
  } else {
?>
  <input type="hidden" name="returntask" value="new" />
<?php
  }
?>
</form>
<p />
<?php
    $catpath = Joom_GetCatPath($row->catid);
    $thumbnailpath = $jg_paththumbs.'/'.$catpath.$row->imgthumbname;
    $picturepath = $jg_pathimages.'/'.$catpath.$row->imgfilename;
?>
<table align="center" cellpadding="4" cellspacing="1" border="0" width="100%" class="adminform">
  <tr>
    <td>
      <b><?php echo _JGA_THUMBNAIL_PREVIEW .':'; ?></b>
	</td>
    <td>
      <b><?php echo _JGA_PICTURE_PREVIEW .':'; ?></b><br />
    </td>
  </tr>
  <tr>
    <td valign="top" align="center">
      <img src="<?php echo "..$thumbnailpath"; ?>" border="2" alt="<?php echo _JGA_THUMBNAIL_PREVIEW; ?>" />
    </td>
    <td valign="top" >
      <img src="<?php echo "..$picturepath"; ?>" border="2" alt="<?php echo _JGA_PICTURE_PREVIEW; ?>" />
    </td>
  </tr>
</table>
<?php
  }


  function Joom_ShowMovePictures_HTML($id, &$Lists, &$items) {
    global  $thumbnailpath, $database, $absolut_thumbnailpath, $joom_configfile;
    require $joom_configfile;

?>
<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td width="100%" class="sectionname"  align="left">
      <p>
      <a href='http://www.joomgallery.net/' target='_blank'>
      <img src="../administrator/components/com_joomgallery/assets/images/main2.png" hspace="6" border="0" align="top" width="16" height="16" alt="<?php echo _JGA_JOOMGALLERY; ?>" /></a>&nbsp;
      <span style="font-size:13px; font-weight:bold;">
        <?php echo _JGA_JOOMGALLERY.' :: '._JGA_PICTURE_MANAGER.' :: '._JGA_MOVE_PICTURE; ?> 
      </span>
      </p>
    </td>
  </tr>
</table>
<form action="index2.php" method="post" name="adminForm" >
<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td align="center">
      <b><?php echo _JGA_MOVE_PICTURE_TO_CATEGORY;?>:</b> <?php echo $Lists['catgs'] ?>
    </td>
  </tr>
</table>
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
  <tr>
    <td align="left" valign="top" width="20%">
      <strong>
        <?php echo _JGA_PICTURES_TO_MOVE;?>:
      </strong>
    </td>
  </tr>
</table>
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
  <tr>
    <th width="5%"></th>
    <th class="title" width="40%">
      <?php echo _JGA_TITLE; ?>
    </th>
    <th width="55%">
      <div align="left">
        <?php echo _JGA_PREVIOUS_CATEGORY; ?>
      </div>
    </th>
  </tr>

<?php
    foreach ($items as $item) {
      $catpath = Joom_GetCatPath($item->catid);
?>
  <tr>
    <td>
<?php
      if (is_file($absolut_thumbnailpath.$catpath.$item->imgfilename)) {
?>
        <img src="<?php echo $thumbnailpath.$catpath.$item->imgfilename; ?>"
         border="0" width="24" height="24" alt="" />
<?php
      } else {
        $tnfile = 'tn_';
?>
        <img src="<?php echo $thumbnailpath.$catpath.$tnfile.$item->imgfilename; ?>"
         border="0" width="24" height="24" alt="" />
<?php
      }
?>
    </td>
    <td align="left">
      <?php echo $item->imgtitle ;?>
    </td>
    <td>
      <div align="left">
        <?php echo Joom_ShowCategoryPath($item->catid); ?>
      </div>
    </td>
  </tr>
<?php
    }
?>
  <tr>
    <th align="center" colspan="3">
    </th>
  </tr>
</table>
<input type="hidden" name="option" value="com_joomgallery" />
<input type="hidden" name="task" value="savemovepic" />
<input type="hidden" name="boxchecked" value="1" />
<?php
    foreach ($id as $ids) {
      echo "\n <input type=\"hidden\" name=\"id[]\" value=\"$ids\" />";
    }
?>
</form>
<?php
  }

}
?>
