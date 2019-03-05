<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/joom.nameshields.php $
// $Id: joom.nameshields.php 396 2009-03-15 16:06:21Z aha $
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

//include_once dirname(__FILE__) . '/html/joom.comments.html.php';

class Joom_Nameshields {

  var $length;
  var $height;
  var $yvalue;
  var $xvalue;
  var $zindex;
  var $nuserid;
  var $npicid;
  
  var $userid;
  var $picid;

  function Joom_Nameshields(&$func) {
    $this->length = intval( mosGetParam( $_POST, 'length', "0") );
    $this->height = intval( mosGetParam( $_POST, 'height', "0") );
    $this->yvalue = intval( mosGetParam( $_POST, 'yvalue', "0") );
    $this->xvalue = intval( mosGetParam( $_POST, 'xvalue', "0") );
    $this->zindex = intval( mosGetParam( $_POST, 'zindex', "0") );
    $this->nuserid = intval( mosGetParam( $_REQUEST, 'nuserid', "0") );
    $this->npicid = intval( mosGetParam( $_REQUEST, 'npicid', "0") );
    
    $this->userid = intval( mosGetParam( $_REQUEST, 'uid', 0 ) );
    $this->picid = intval( mosGetParam( $_REQUEST, 'id', 0 ) );

    switch ($func) {
      case 'savenameshield':
       $this->Joom_SaveNameshield();
       break;
      case 'deletenameshield':
       $this->Joom_DeleteNameshield();
       break;
      default:
       break;
    }
  }

  function Joom_SaveNameshield() {
    global $option,$database;

    if (($this->xvalue < $this->height) && ($this->yvalue < $this->length)) {
  ?>
    <script>
    alert('<?php echo _JGS_ALERT_NAMESHIELD_NOT_SAVED;?>');
    location.href = '<?php echo "index.php?option=".$option."&func=detail&id=".$this->picid._JOOM_ITEMID; ?>';
    </script>
  <?php
    } else {

    $row = new mosNameshields($database);

    if (!$row->bind($_POST, "npicid nuserid nxvalue nyvalue nuserip ndate nzindex")) {
      echo "<script> alert('" . $row->getError() . "'); window.history.go(-1); </script>\n";
      exit();
    }

    $row->npicid = $this->picid;
    $row->nuserid = $this->userid;
    $row->nxvalue = $this->xvalue;
    $row->nyvalue = $this->yvalue;
    $row->nuserip=$_SERVER['REMOTE_ADDR'];
    $row->ndate=mktime();
    $row->nzindex = $this->zindex;

    if ( !$row->store() ) {
      echo "<script> alert('" . $row->getError() . "'); window.history.go(-1); </script>\n";
      exit();
    }
  ?>
    <script>
    alert('<?php echo _JGS_ALERT_NAMESHIELD_SAVED;?>');
    location.href = '<?php echo "index.php?option=".$option."&func=detail&id=".$this->picid._JOOM_ITEMID; ?>';
    </script>
  <?php
  }
  }


  function Joom_DeleteNameshield() {
    global $option,$database, $my;

    if ($my->id == $this->nuserid) {
      $database->setQuery("DELETE
          FROM #__joomgallery_nameshields
          WHERE npicid='$this->npicid' AND nuserid='$this->nuserid'");
      if (!$database->query()) {
        echo "<script> alert('" . $database->getErrorMsg() . "'); window.history.go(-1); </script>\n";
      }
    }

?>
  <script>
    alert('<?php echo _JGS_ALERT_NAMESHIELD_DELETED;?>');
    location.href = '<?php echo "index.php?option=".$option."&func=detail&id=".$this->npicid._JOOM_ITEMID; ?>';
  </script>
<?php
  }
}
?>
