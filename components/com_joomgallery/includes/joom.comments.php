<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/joom.comments.php $
// $Id: joom.comments.php 396 2009-03-15 16:06:21Z aha $
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

class Joom_Comments {
  var $cmtid;
  var $cmtname;
  var $cmtpic;
  var $userid;
  var $cmttext;
  var $jg_captcha_id;
  var $jg_code;

  function Joom_Comments(&$func,&$id) {
    global $my;
    include_once dirname(__FILE__) . '/html/joom.comments.html.php';

    $this->jg_code = Joom_FixUserEntrie2( mosGetParam( $_POST, 'jg_code', "") );
    $this->cmtname = Joom_FixUserEntrie( mosGetParam( $_POST, 'cmtname', "") );
    $this->cmttext = Joom_FixUserEntrie( mosGetParam( $_POST, 'cmttext', "") );
    $this->jg_captcha_id = intval( mosGetParam( $_POST, 'jg_captcha_id', "") );
    $this->cmtid = intval( mosGetParam( $_REQUEST, 'cmtid', 0 ) );
    $this->userid = $my->id;
    // do not save user name name when registered user:
    if ($this->userid > 0){
      $this->cmtname = '';  
    }
    $this->cmtpic = intval( mosGetParam( $_POST, 'cmtpic', 0 ) );
    if ($this->cmtpic == "") { 
      $this->cmtpic = intval( mosGetParam( $_REQUEST, 'cmtpic', "" ) ); 
    }

    switch ($func) {
      case 'commentpic':
       $this->Joom_CommentPic($id);
       break;
      case 'deletecomment':
       $this->Joom_DeleteComment();
       break;
    }
  }

/******************************************************************************\
*                           Functions / Comments                              *
\******************************************************************************/

  function Joom_CommentPic($id) {
    global $database,$my, $gid,$jg_secimages,$jg_approvecom, $jg_showcomment, $jg_anoncomment;

    //Check for hacking attempt
    $query = "SELECT count(id)"
            ." FROM #__joomgallery as a"
            ." LEFT JOIN #__joomgallery_catg"
            ." AS c ON c.cid=a.catid"
            ." WHERE a.published = 1 AND a.approved = 1"
            ." AND a.id = ".$id." AND c.access <= ".$gid;

    $database->setQuery($query);
    $result = $database->loadResult();

    if($result!=1 
        || $jg_showcomment == 0 
        || $jg_anoncomment == 0 && $my->gid < 1) 
    {
      die("Hacking attempt, aborted!");
    }

    $codeisright = 1;
    if($jg_secimages==2 || ($jg_secimages==1 && $gid <1)) {
      if(file_exists(_JOOM_ABSOLUTE_PATH .'/components/com_easycaptcha/class.easycaptcha.php')) {
        include_once(_JOOM_ABSOLUTE_PATH .'/components/com_easycaptcha/class.easycaptcha.php');
        $captcha = new easyCaptcha($this->jg_captcha_id);
        $codeisright = $captcha->checkEnteredCode($this->jg_code) ? 1 : 0;
      }
    }

    if($codeisright==1) {
      // Save new values
      $cmtip=$_SERVER['REMOTE_ADDR'];
      $cmtdate=time();
      if ( ( $jg_approvecom == 0 ) || ( $jg_approvecom == 1 && $gid > 0 ) ) {
        $approve = 1;
      } elseif ( ( $jg_approvecom == 1 && $gid < 1 ) || ( $jg_approvecom == 2 ) ) {
        $approve = 0;
        // message about new comment TODO
        $cmtsenderid = ($my->gid<1) ? "62" : $my->id;
        if (defined('_JEXEC')) {
          require_once(_JOOM_ABSOLUTE_PATH."/administrator/components/com_messages/tables/message.php" );
        } else {
          require_once(_JOOM_ABSOLUTE_PATH."/components/com_messages/messages.class.php" );
        }
        $database->setQuery("SELECT id FROM #__users WHERE sendEmail=1");
        $users = $database->loadResultArray();
        foreach ($users as $user_id) {
        if (defined('_JEXEC')) {
          $msg = new TableMessage($database); 
        } else {
          $msg = new mosMessage($database);
        }
          $msg->send($cmtsenderid,$user_id, _JGS_ALERT_NEW_COMMENT, _JGS_ALERT_NEW_COMMENT_MESSAGE_PARTONE.$this->cmtname._JGS_ALERT_NEW_COMMENT_MESSAGE_PARTTWO);
        }
      }

      $database->setQuery("INSERT INTO #__joomgallery_comments
        VALUES ('', '$id', '$cmtip','$this->userid', '$this->cmtname', '$this->cmttext', '$cmtdate', '1', '$approve')" );
      $database->query();

      # Get back to details page
      if ( ( $jg_approvecom == 0 ) || ( $jg_approvecom == 1 && $gid > 0 ) ) {
        mosRedirect("index.php?option=com_joomgallery&func=detail&id=" . $id . _JOOM_ITEMID,_JGS_ALERT_COMMENT_SAVED);
      } else {
        mosRedirect("index.php?option=com_joomgallery&func=detail&id=" . $id . _JOOM_ITEMID,_JGS_ALERT_COMMENT_SAVED_BUT_NEEDS_ARROVAL);
      }
    } else {
    ?>
          <form id="send_form" name="commentform" action="<?php echo sefRelToAbs('index.php?option=com_joomgallery&amp;func=detail&amp;id=' . $id._JOOM_ITEMIDX.'#joomcommentform'); ?>" method="post" class="jg_displaynone">
            <textarea cols="40" rows="8" name="cmttext" class="inputbox" wrap="virtual"><?php echo $this->cmttext?></textarea>
          </form>
         <script type="text/javascript">
           alert("<?php echo _JGS_ALERT_SECURITY_CODE_WRONG; ?>");
           document.getElementById('send_form').submit();
         </script>
    <?php
    }
  }


  function Joom_DeleteComment() {
    global $mosConfig_live_site;
    // Don't allow passed settings
    if (isset($_REQUEST['is_editor']) && $_REQUEST['is_editor']) {
      echo "<script>location.href='". $mosConfig_live_site."'</script>\n";
      exit();
    }
    HTML_Joom_Comments::Joom_DeleteComment_HTML();
  }

}
?>
