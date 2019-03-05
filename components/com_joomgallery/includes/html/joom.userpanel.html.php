<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/html/joom.userpanel.html.php $
// $Id: joom.userpanel.html.php 397 2009-03-15 17:42:26Z aha $
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

class HTML_Joom_UserPanel {

  function Joom_User_PanelShow_HTML(&$showcats,&$showpicupload,&$olist,&$slist,&$rows,&$pageNav) {
    global $database, $my,$jg_approve,$jg_category, $jg_usercategory,
           $jg_pathimages, $jg_paththumbs,$mosConfig_live_site,$jg_detailpic_open, 
           $jg_showminithumbs,$thumbnailpath, $jg_showallpicstoadmin, 
           $jg_usercat, $absolut_thumbnailpath;

    if ( $jg_showminithumbs ) {
?>
  <script  type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
<?php
    }
?>
  <div class="jg_userpanelview">
    <div class="jg_up_head">
<?php
    if ($showpicupload) {
?>
      <input type="button" name="Button" value="<?php echo _JGS_NEW_PICTURE; ?>"
      onclick = "javascript:location.href='<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=showupload'._JOOM_ITEMID); ?>';"
      class="button" />

<?php
  }
  if ($showcats) {
?>
      <input type="button" name="Button" value="<?php echo _JGS_CATEGORIES; ?>"
      onclick = "javascript:location.href='<?php echo sefRelToAbs("index.php?option=com_joomgallery&func=showusercats&uid=".$my->id._JOOM_ITEMID); ?>';"
      class="button" />
<?php
  }
  $limit = (defined('_JEXEC') AND is_object($pageNav)) ? '&amp;limitstart='.$pageNav->limitstart : '';
?>
      <form action="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=userpanel'._JOOM_ITEMIDX.$limit)?>" method="post" name="adminForm">
<?php
      //navigation, only if pictures exist
      if (!is_null($pageNav)){
        echo '<span class="jg_usernavbox">'._JGS_DISPLAY.': ';
        echo $pageNav->writeLimitBox().'</span>';
        echo $pageNav->writePagesLinks().'<br /><br />';
        echo $pageNav->writePagesCounter();
      }
?>
	    <p>
<?php	  
        echo $slist;
        echo $olist;
?>
        </p>
      </form>
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
<?php
    if ($jg_approve) {
?>
        <div class="jg_up_eappr">
          <?php echo _JGS_APPROVED; ?>
        </div>
<?php
      }
?>
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
?>
        <div class="jg_up_ename">
<?php
          if ( $jg_showminithumbs ) {
            if ( $row->imgthumbname != '' && (is_file($absolut_thumbnailpath.$catpath.$row->imgthumbname)) ) {
              $tnfile = _JOOM_ABSOLUTE_PATH.$jg_paththumbs.'/'.$catpath.$row->imgthumbname;
              $imginfo = getimagesize($tnfile);
              $srcWidth = $imginfo[0];
              $srcHeight = $imginfo[1];
              if ($row->approved){
?>
            <a href="<?php echo $link; ?>" onmouseover="return overlib('<img src=\'<?php echo $thumbnailpath.$catpath.$row->imgthumbname; ?>\' />',WIDTH,<?php echo $srcWidth; ?>, HEIGHT,<?php echo $srcHeight; ?>)" onmouseout="return nd()" >
<?php
              } else {
?>
            <a href="#" onmouseover="return overlib('<img src=\'<?php echo $thumbnailpath.$catpath.$row->imgthumbname; ?>\' />',WIDTH,<?php echo $srcWidth; ?>, HEIGHT,<?php echo $srcHeight; ?>)" onmouseout="return nd()" >
<?php
              }
?>
              <img src="<?php echo $thumbnailpath.$catpath.$row->imgthumbname; ?>" border="0" height="30" alt="" />
            </a>
<?php
            } else {
?>
              &nbsp;
<?php
            }
          } else {
?>
          <div class="jg_floatleft">
            <img src="<?php echo $mosConfig_live_site;?>/images/M_images/arrow.png" width="9" height="9" alt="arrow" />
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
        <?php echo Joom_ShowCategoryPath( $row->catid ); ?>
        </div>
        <div class="jg_up_esub1">
          <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=editpic&amp;uid=$my->id&amp;id=$row->id"._JOOM_ITEMIDX); ?>" title="<?php echo _JGS_EDIT; ?>">
            <img src= "<?php echo $mosConfig_live_site ?>/components/com_joomgallery/assets/images/edit.png" border="0" width="16" height="16" alt="<?php echo _JGS_EDIT; ?>" class="pngfile" />
          </a>
        </div>
        <div class="jg_up_esub2">
          <a href="javascript:if (confirm('<?php echo _JGS_ALERT_SURE_DELETE_SELECTED_ITEM; ?>')){ location.href='<?php echo sefRelToAbs("index.php?option=com_joomgallery&func=deletepic&uid=".$my->id.'&id='.$row->id._JOOM_ITEMID);?>';}" title="<?php echo _JGS_DELETE; ?>">
            <img src="<?php echo $mosConfig_live_site ?>/components/com_joomgallery/assets/images/edit_trash.png" border="0" width="16" height="16"  alt="<?php echo _JGS_DELETE; ?>" class="pngfile" />
          </a>
        </div>
<?php
        if ( $jg_approve ) {
          if ($row->approved) {
            $a_pic = 'tick.png';
          } else {
            $a_pic = 'cross.png';
          }
?>
        <div class="jg_up_eappr">
          <img src="<?php echo $mosConfig_live_site ?>/components/com_joomgallery/assets/images/<?php echo $a_pic; ?>" height="16" width="16" border="0" alt="pngfile" class="pngfile" />
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
        <img src="<?php echo $mosConfig_live_site;?>/images/M_images/arrow.png" alt="arrow" />
      <?php echo _JGS_YOU_DO_NOT_HAVE_PICTURE; ?>
      </div>
    </div>

<?php
    }
?>
  </div>
<?php
  }

  function Joom_User_CatsShow_HTML(&$rows) {
    global $my,$jg_pathimages, $jg_paththumbs,
           $mosConfig_live_site,$jg_detailpic_open, $jg_showminithumbs,
           $thumbnailpath, $jg_showallpicstoadmin,
           $jg_newpicnote,$jg_maxusercat;
  
    $count_cat=count($rows);
?>
    <div class="jg_userpanelview">
  
<?php   
        if ( $jg_newpicnote && !$this->adminlogged) {
?>
      <div class="jg_uploadquotas">
        <span class="jg_quotatitle">
          <?php echo _JGS_NEW_CATEGORY_NOTE?> 
        </span><br />
        <?php echo _JGS_NEW_CATEGORY_MAXCOUNT . $jg_maxusercat;?><br />
        <?php echo _JGS_NEW_CATEGORY_YOURCOUNT . $count_cat;?><br />
        <?php echo _JGS_NEW_CATEGORY_REMAINDER . ($jg_maxusercat- $count_cat);?><br />
      </div>
<?php
    }
    //wenn max. Anzahl Kategorien erreicht, Button nicht anzeigen
    //nicht fuer Admins
    if ($this->adminlogged || ($jg_maxusercat- $count_cat) > 0) {
?> 
    <div class="jg_up_head">
      <input type="button" name="Button" value="<?php echo _JGS_NEW_CATEGORY;?>"
      onclick = "javascript:location.href='<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=newusercat'._JOOM_ITEMID); ?>';"
      class="button" />
    </div>
 <?php
    }
 ?>
    <div class="sectiontableheader">
      <div class="jg_up_entry">
        <div class="jg_up_ename">
        <?php echo _JGS_CATEGORY; ?>
        </div>
        <div class="jg_up_ehits">
        <?php echo _JGS_PICTURES; ?>
        </div>
        <div class="jg_up_ecat">
        <?php echo _JGS_PARENT_CATEGORY;?>
        </div>
        <div class="jg_up_eact">
        <?php echo _JGS_ACTION;?>
        </div>
        <div class="jg_up_eappr">
        <?php echo _JGS_PUBLISHED;?>
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
          //Link auf Kategorieansicht in Usergalerie, nur wenn published
          if ($row->published){
            $catlink=sefRelToAbs($mosConfig_live_site."/index.php?option=com_joomgallery"
              ."&amp;func=viewcategory"
              ."&amp;catid=".$row->cid
            ._JOOM_ITEMIDX);
            $catpath=Joom_GetCatPath($row->cid);            
          }
?>
    <div class="<?php echo "sectiontableentry".$p; ?>">
      <div class="jg_up_entry">
        <div class="jg_up_ename">
<?php
          if ( $jg_showminithumbs ) {
            if ( $row->catimage != '' ) {
?>
            <img src="<?php echo $thumbnailpath.$catpath.$row->catimage; ?>" border="0" height="30" alt="" />
<?php
            } else {
?>
          <div class="jg_floatleft">
            <img src="<?php echo $mosConfig_live_site;?>/images/M_images/arrow.png" width="9" height="9" alt="arrow" />
          </div>
<?php
            }
            if ($row->published){                               
?>
          <a href="<?php echo $catlink; ?>">
<?php
            }
?>
          <?php echo $row->name; ?>
          </a>
<?php
        }
?>
        </div>
        <div class="jg_up_ehits">
        <?php echo $row->piccount; ?>
        </div>        
        <div class="jg_up_ecat">
 <?php 
          if ($row->parent==0) {
            echo '-'; 
          } else {
            echo Joom_ShowCategoryPath( $row->parent ); 
          }
  ?>
        
        </div>     
        <div class="jg_up_esub1"> 
          <a href="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=editusercat&amp;catid=$row->cid"._JOOM_ITEMIDX); ?>" title="<?php echo _JGS_EDIT; ?>">
            <img src= "<?php echo $mosConfig_live_site;?>/components/com_joomgallery/assets/images/edit.png" border="0" height="16" height="16" alt="<?php echo _JGS_EDIT; ?>" class="pngfile" />
          </a>
        </div>
        <div class="jg_up_esub2">
<?php
        if ($row->allowdel == true) {
?>
          <a href="javascript:if (confirm('<?php echo _JGS_ALERT_SURE_DELETE_SELECTED_ITEM; ?>')){ location.href='<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=deleteusercat&catid='.$row->cid._JOOM_ITEMID); ?>';}" title="<?php echo _JGS_DELETE; ?>">
            <img src="<?php echo $mosConfig_live_site;?>/components/com_joomgallery/assets/images/edit_trash.png" border="0" height="16" height="16" alt="<?php echo _JGS_DELETE; ?>" class="pngfile" />
          </a>
<?php
        } else {
         echo '&nbsp;'; 
        }
?>
        </div>
<?php
        if ($row->published) {
          $a_pic = 'tick.png';
        } else {
          $a_pic = 'cross.png';
        }
?>
        <div class="jg_up_eappr">
          <img src="<?php echo $mosConfig_live_site ?>/components/com_joomgallery/assets/images/<?php echo $a_pic; ?>" height="16" width="16" border="0" alt="pngfile" class="pngfile" />
        </div> 
      </div>
    </div>
<?php
      }
    } else {
      $p = $k+1;
?>
    <div class="jg_txtrow">
      <div class="<?php echo "sectiontableentry".$p; ?>">
        <img src="<?php echo $mosConfig_live_site . '/images/M_images/arrow.png';?>" alt="arrow" />
      <?php echo _JGS_YOU_NOT_HAVE_CATEGORY; ?>
      </div>
    </div>
<?php
    }
?>
  </div>
  <div class="jg_txtrow">
    <input type="button" name="Button" value="<?php echo _JGS_BACK_TO_USER_PANEL;?>"
    onclick = "javascript:location.href='<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=userpanel'._JOOM_ITEMID); ?>';"
    class="button" />
  </div>
<?php
  }
  
  /**
   * new category or modify existing category
   *
   * @param unknown_type $option
   * @param unknown_type $publist
   * @param unknown_type $Lists
   * @param unknown_type $orderlist
   */
  function Joom_User_EditUserCat_HTML($cid,$option, &$publist,&$glist,$Lists,$orderlist,
                                      &$thumblist,&$description,&$name) {
    global $jg_wrongvaluecolor,$mosConfig_live_site,$jg_paththumbs;
    $catpath = Joom_GetCatPath($cid);
?>
<script language="javascript" type="text/javascript">
  function submit_button() {
    var form = document.usercatForm;
    // do field validation
    form.name.style.backgroundColor = '';
    var ffwrong = '<?php echo $jg_wrongvaluecolor; ?>';
    try {
      document.usercatForm.onsubmit();
    }
    catch(e){}
    if (form.name.value == '' || form.name.value == null) {
      alert('<?php echo _JGS_ALERT_CATEGORY_MUST_HAVE_TITLE; ?>');
      form.name.style.backgroundColor = ffwrong;
      form.name.focus();      
    }
    else {
      form.Button[0].disabled=true;//save
      form.Button[1].disabled=true;//cancel
      form.submit();      
    } 
  }
  
</script>
<div class="sectiontableheader">
  <?php if ($cid == 0) echo _JGS_NEW_CATEGORY; else echo _JGS_MODIFY_CATEGORY;?>
</div>
<form action="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=saveusercat&amp;catid=".$cid._JOOM_ITEMIDX) ?>" method="post" name="usercatForm">
  <div class="jg_editpicture">
    <div class="jg_uprow">
      <div class="jg_uptext">
      <?php echo _JGS_TITLE . ':'; ?>
      </div>
      <input class="inputbox" type="text" name="name" size="25" value="<?php echo $name; ?>" />
    </div>
    <div class="jg_uprow">
      <div class="jg_uptext">
      <?php echo _JGS_PARENT_CATEGORY . ':'; ?>
      </div>
    <?php echo $Lists["catgs"]; ?>
    </div>
    <div class="jg_uprow">
      <div class="jg_uptext">
      <?php echo _JGS_DESCRIPTION . ':'; ?>
      </div>
      <textarea name="description" rows="5" cols="40" class="inputbox"><?php echo htmlspecialchars($description, ENT_QUOTES); ?></textarea>
    </div>
    <?php 
    if ($glist != null) {
    ?>
    <div class="jg_uprow">
      <div class="jg_uptext">
      <?php echo _JGS_ACCESS . ':'; ?> 
      </div>
      <?php echo $glist;?>
    </div>
    <?php 
    } 
    ?>
    <div class="jg_uprow">
      <div class="jg_uptext">
      <?php echo _JGS_PUBLISHED . ':'; ?> 
      </div>
    <?php echo $publist; ?>
    </div>    
    <div class="jg_uprow">
      <div class="jg_uptext">
        <?php echo _JGS_ORDERING . ':'; ?> 
      </div>
      <?php echo $orderlist;?>
    </div>
    <?php
      if ($cid!=0){
    ?>  
    <div class="jg_uprow">
      <div class="jg_uptext">
    <?php echo _JGS_THUMBNAIL .':'; ?> 
      </div>
    <?php echo $thumblist; ?>
    </div>
  
    <div class="jg_uprow">
      <div class="jg_uptext">      
      <?php echo _JGS_THUMBNAIL_PREVIEW .':'   ; ?>
      </div>
      <script language="javascript" type="text/javascript">
        if (document.usercatForm.catimage.options.value!='') {
          jsimg='<?php echo "$mosConfig_live_site/$jg_paththumbs/$catpath"; ?>' + getSelectedValue( 'usercatForm', 'catimage' );
        } else {
          jsimg='<?php echo $mosConfig_live_site."/images/M_images/blank.png"?>';
        }
        document.write('<img src=' + jsimg + ' name="imagelib" height="80" border="1" alt="<?php echo _JGS_THUMBNAIL_PREVIEW; ?>" />');
      </script>
    </div>
  <?php
      }
  ?>
    
    <div class="jg_txtrow">
      <input type="button" name="Button" value="<?php echo _JGS_SAVE; ?>"
      onclick = "javascript:submit_button();"
      class="button" />
  
      <input type="button" name="Button" value="<?php echo _JGS_CANCEL; ?>"
      onclick = "javascript:location.href='<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=showusercats'._JOOM_ITEMID); ?>';"
      class="button" />
    </div>     
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
  </div>
</form>
<?php
  }
  
  
  function Joom_User_ShowUpload_HTML(&$option,&$clist) {
    global $my, $database, $jg_maxuserimage, $jg_category, $row,
           $jg_filenamewithjs, $jg_wrongvaluecolor,$jg_delete_original_user,
           $jg_special_gif_upload, $catid, $bugtest, $jg_maxfilesize,
           $jg_newpiccopyright,$jg_newpicnote, $jg_maxuploadfields,$batchul;

    //fuer Admin/SuperAdmin gelten keine Beschraenkungen
    if (!$this->adminlogged) {    
      $database->setQuery("SELECT COUNT(id)
          FROM #__joomgallery
          WHERE owner = $my->id");
      $count_pic = $database->loadResult();
      $inputcounter = $jg_maxuserimage - $count_pic;
      $remainder = $inputcounter;
      $inputcounter = ($inputcounter<$jg_maxuploadfields) ? $inputcounter : $jg_maxuploadfields;
      $maxfilesizekb = number_format($jg_maxfilesize / 1024, 2, ',', '.');
      if ( $count_pic >= $jg_maxuserimage ) {
?>
      <script>
        alert('<?php echo _JGS_ALERT_MAY_ADD_MAX_OF_PARTONE . " " . $jg_maxuserimage . " " . _JGS_ALERT_MAY_ADD_MAX_OF_PARTTWO;?>');
        location.href
        = '<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=userpanel'._JOOM_ITEMID); ?>';
      </script>
<?php
        die();
      }
    } else {
      $inputcounter = $jg_maxuploadfields;
    }
?>
    <script language="javascript" type="text/javascript">
       var jg_inputcounter = <?php echo $inputcounter; ?>;
    </script>
    <div class="sectiontableheader">
      <?php echo _JGS_NEW_PICTURE; ?>
    </div>
    <div class="jg_uploadform">
      <form action="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=uploadhandler'._JOOM_ITEMIDX); ?>" method="post" name="adminForm" enctype="multipart/form-data" onsubmit="return joom_checkme()" >
<?php
    if ( $jg_newpiccopyright && !$this->adminlogged) {
?>
      <div class="jg_uploadcopyright sectiontableentry2">
      <?php echo _JGS_NEW_PICTURE_COPYRIGHT; ?>
      </div>
<?php
    }
    if ( $jg_newpicnote && !$this->adminlogged) {
?>
      <div class="jg_uploadquotas">
        <span class="jg_quotatitle"><?php echo _JGS_NEW_PICTURE_NOTE; ?></span><br />
        <?php echo _JGS_NEW_PICTURE_MAXSIZE . $jg_maxfilesize . _JGS_BYTES . ' (' . $maxfilesizekb . ' KB)'; ?><br />
        <?php echo _JGS_NEW_PICTURE_MAXCOUNT . $jg_maxuserimage; ?><br />
        <?php echo _JGS_NEW_PICTURE_YOURCOUNT . $count_pic; ?><br />
        <?php echo _JGS_NEW_PICTURE_REMAINDER . $remainder; ?><br />
      </div>
<?php
    }
?>
      <div class="jg_uprow">
        <div class="jg_uptext">
        <?php echo _JGS_TITLE; ?>:
        </div>
        <input class="inputbox" type="text" name="imgtitle" size="42" maxlength="100" value="<?php if(isset($_POST['$row->imgtitle'])) echo htmlspecialchars( $row->imgtitle, ENT_QUOTES); ?>" />
      </div>
      <div class="jg_uprow">
        <div class="jg_uptext">
          <?php echo _JGS_CATEGORY; ?>:
        </div>
        <?php echo $clist; ?>
      </div>
      <div class="jg_uprow">
        <div class="jg_uptext">
          <?php echo _JGS_DESCRIPTION; ?>:
        </div>
        <textarea class="inputbox" cols="40" rows="5" name="imgtext"><?php if(isset($_POST['$row->imgtext'])) echo htmlspecialchars( $row->imgtext, ENT_QUOTES); ?></textarea>
      </div>
      <div class="jg_uprow">
        <div class="jg_uptext">
          <?php echo _JGS_AUTHOR_OWNER;?>:
        </div>
        <b><?php echo $my->username; ?></b>
      </div>
<?php
    for ($i=0; $i < $inputcounter; $i++) {
?>
      <div class="jg_uprow">
        <div class="jg_uptext">
        <?php echo _JGS_PICTURE_PATH;?>:
        </div>
      <?php echo "<input type ='file' name = 'arrscreenshot[$i]' class='inputbox'/>"; ?>
      </div>
<?php
    }
    if ( $jg_delete_original_user!=2 ) {
      $sup2 = "&sup1;";
    } else {
      $sup2 = "&sup2;";
    }
    if ( $jg_delete_original_user==2 ) {
?>
      <div class="jg_uprow">
        <div class="jg_uptext">
          <input type="checkbox" name="original_delete" value="1" />
        </div>
      <?php echo _JGS_DELETE_ORIGINAL_AFTER_UPLOAD; ?>&nbsp;&sup1;
      </div>
<?php
    }
    if( $jg_special_gif_upload==1 ) {
?>
      <div class="jg_uprow">
        <div class="jg_uptext">
          <input type="checkbox" name="create_special_gif" value="1" />
        </div>
      <?php echo _JGS_CREATE_SPECIAL_GIF; ?>&nbsp;<?php echo $sup2; ?>
      </div>
<?php
    }
?>
      <div class="jg_txtrow">
        <input type="submit" value="<?php echo _JGS_UPLOAD; ?>" class="button" />

        <input type="button" name="Button" value="<?php echo _JGS_CANCEL; ?>"
          onclick = "javascript:location.href='<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=userpanel'._JOOM_ITEMID); ?>';"
          class="button" />
      </div>
<?php
    if ( $jg_delete_original_user==2 ) {
?>
      <div class="jg_uploadnotice small sectiontableentry2">
        &sup1;&nbsp;<?php echo _JGS_DELETE_ORIGINAL_AFTER_UPLOAD_ASTERISK; ?>
      </div>
<?php
    }
    if ( $jg_special_gif_upload==1 ) {
?>
      <div class="jg_uploadnotice small sectiontableentry2">
      <?php echo $sup2; ?>&nbsp;<?php echo _JGS_CREATE_SPECIAL_GIF_ASTERISK; ?>
      </div>
<?php
    }
?>
    <input type="hidden" name="id" value="<?php if(isset($_POST['$row->id'])) echo $row->id;?>" />
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="bugtest" value="<?php echo $bugtest; ?>" />
    </form>
  </div>
<?php
  }


  /**
   * Aenderung der Eintraege zu dem Bild
   *
   * @param unknown_type $option
   * @param unknown_type $row
   */
  function Joom_User_EditPic_HTML (&$option,&$row,&$clist) {
    global $my,$jg_wrongvaluecolor, $thumbnailpath;   
    $catpath = Joom_GetCatPath($row->catid);    
  ?>
    <div class="sectiontableheader">
      <?php echo _JGS_EDIT_PICTURE; ?>
    </div>
    <div class="jg_editpicture">
      <form action = "<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=savepic'._JOOM_ITEMIDX); ?>" method="post" name="adminForm"
      enctype="multipart/form-data" onsubmit="return joom_checkme2();" >
      <div class="jg_uprow">
        <div class="jg_uptext">
        <?php echo _JGS_TITLE ; ?>:
        </div>
        <input class="inputbox" type="text" name="imgtitle" size="42" maxlength="100"
        value = "<?php echo htmlspecialchars($row->imgtitle, ENT_QUOTES); ?>" />
      </div>
      <div class="jg_uprow">
        <div class="jg_uptext">
          <?php echo _JGS_CATEGORY; ?>:
        </div>
        <?php echo $clist; ?>
      </div>
      <div class="jg_uprow">
        <div class="jg_uptext">
          <?php echo _JGS_DESCRIPTION; ?>:
        </div>
        <textarea class="inputbox" cols="40" rows="5" name="imgtext"><?php echo htmlspecialchars($row->imgtext, ENT_QUOTES); ?></textarea>
      </div>
      <div class="jg_uprow">
        <div class="jg_uptext">
          <?php echo _JGS_AUTHOR_OWNER; ?>:
        </div>
        <b><?php echo $my->username; ?></b>
      </div>
      <div class="jg_uprow">
        <div class="jg_uptext">
        <?php echo _JGS_PICTURE; ?>:
        </div>
        <img src="<?php echo $thumbnailpath.$catpath.$row->imgthumbname; ?>" name="imagelib" width="80" border="2" alt="<?php echo _JGS_THUMBNAIL_PREVIEW; ?>" />
      </div>
      <div class="jg_txtrow">
        <input type="submit" value="<?php echo _JGS_SAVE; ?>" class="button" />       
        <input type="button" name="Button" value="<?php echo _JGS_CANCEL; ?>"
          onclick = "javascript:location.href='<?php echo sefRelToAbs('index.php?option=com_joomgallery&func=userpanel'._JOOM_ITEMID); ?>';"
          class="button" />
      </div>
      <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
      <input type="hidden" name="option" value="<?php echo $option; ?>" />
      <input type="hidden" name="task" value="savepic" />
      </form>
    </div>
<?php
  }

}
?>
