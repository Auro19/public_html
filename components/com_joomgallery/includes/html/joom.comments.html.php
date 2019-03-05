<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/html/joom.comments.html.php $
// $Id: joom.comments.html.php 396 2009-03-15 16:06:21Z aha $
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
*                           Functions / Comments                               *
\******************************************************************************/

class HTML_Joom_Comments {

  //Loeschen von Kommentaren
  function Joom_DeleteComment_HTML() {
    global $is_editor, $database,$submit,$jg_dateformat,$mosConfig_live_site;

    Joom_GalleryHeader();

    // Main Part of Subfunction
    if ( $is_editor ) {
      if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != '') {
        $database->setQuery( "DELETE
            FROM #__joomgallery_comments
            WHERE cmtid = $this->cmtid" );
        $database->query();
?>
        <script>
          alert('<?php echo _JGS_ALERT_COMMENT_DELETED;?>');
          location.href
          = '<?php echo sefRelToAbs("index.php?option=com_joomgallery&func=detail&id=".$this->cmtpic._JOOM_ITEMID); ?>';
        </script>
<?php
      } else {
?>
      <div class="sectiontableheader jg_cmtl">
        <?php echo _JGS_AUTHOR; ?>
      </div>
      <div class="sectiontableheader jg_cmtr">
        <?php echo _JGS_COMMENT; ?>
      </div>

<?php
        $database->setQuery("SELECT cmtid, cmtip, userid, cmtname, cmttext, cmtdate, cmtpic,username
            FROM #__joomgallery_comments as cm
            LEFT JOIN #__users as u ON cm.userid=u.id
            WHERE cmtid = $this->cmtid" );
        $result1=$database->LoadRow();
        list( $cmtid, $cmtip, $userid,$cmtname, $cmttext, $cmtdate, $cmtpic,$username) = $result1;
?>
      <div class="sectiontableentry1">
        <div class="jg_cmtl">
          <b>
<?php 
        if ($userid > 0) {
          echo $username;         
        } else{
          echo $cmtname;
        }
?>
          </b>
          <br />
          <a href="http://openrbl.org/query?i=<?php echo $cmtip;?>">
            <img src="<?php echo $mosConfig_live_site; ?>/components/com_joomgallery/assets/images/ip.gif" alt="<?php echo $cmtip; ?>" title="<?php echo $cmtip; ?>" hspace="3" border="0" />
          </a>                 
        </div>
<?php
        $signtime=strftime( "$jg_dateformat", $cmtdate );
        $origtext=$cmttext;
?>
        <div class="jg_cmtr small">
          <?php echo _JGS_COMMENT_ADDED . ": " . $signtime; ?><hr>
          <?php echo $origtext; ?>
        </div>
      </div>
      <div class="jg_cmtronly">
        <form action="<?php echo sefRelToAbs("index.php?option=com_joomgallery&amp;func=deletecomment&amp;cmtid=".$cmtid."&amp;cmtpic=".$cmtpic._JOOM_ITEMIDX); ?>" method="post">
          <input class="button" type="submit" name="submit" value="<?php echo _JGS_DELETE_COMMENT; ?>" />
        </form>
      </div>
<?php
      }
    } else {
?>
      <p />
      <a href="<?php echo sefRelToAbs('index.php?option=com_joomgallery'._JOOM_ITEMID); ?>">
        <?php echo _JGS_BACK; ?>
      </a>
<?php
    }
  }
}
?>
