<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/admin.comments.php $
// $Id: admin.comments.php 396 2009-03-15 16:06:21Z aha $
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

include_once dirname(__FILE__) . '/html/admin.comments.html.php';

class Joom_AdminComments {


  function Joom_AdminComments($task) {
    global $option, $id;

    switch($task) {
      case 'comments':
        $this->Joom_ShowComments($option);
        break;

      case 'publishcmt':
        $this->Joom_PublishComments($id, 1, $option);
        break;

      case 'unpublishcmt':
        $this->Joom_PublishComments($id, 0, $option);
        break;

      case 'approvecmt':
        $this->Joom_ApproveComments($id, 1, $option);
        break;

      case 'rejectcmt':
        $this->Joom_ApproveComments($id, 0, $option);
        break;

      case 'removecmt':
        $this->Joom_RemoveComments($id, $option);
        break;
    }
  }


/******************************************************************************\
*                            Functions / Comments                              *
\******************************************************************************/


function Joom_ShowComments($option) {
  global $database;

  # Prepare pagelimit choices
  $limit = intval(mosGetParam($_POST, 'limit', 10));
  $limitstart = intval( mosGetParam($_POST, 'limitstart', 0));

  # Prepare search choices
  $search = trim(strtolower(mosGetParam($_POST, 'search', '')));
  $where = array();
  if ($search) {
    $where[] = "LOWER(cmttext) LIKE '%$search%' OR LOWER(u.username) LIKE '%$search%' OR LOWER(cmtname) LIKE '%$search%' ";
  }

  # Get total number of records
  $database->setQuery("SELECT count(*) 
      FROM #__joomgallery_comments AS a "
      ."LEFT JOIN #__users as u ON userid = u.id " 
      .(count( $where ) ? 'WHERE ' . implode( ' AND ', $where ) : '') );
  $total = $database->loadResult();
  echo $database->getErrorMsg();
  if ($limit > $total) {
    $limitstart = 0;
  }

  # Do the main database query
  $database->setQuery("SELECT * 
      FROM #__joomgallery_comments "
      ."LEFT JOIN #__users as u ON userid = u.id " 
      . (count( $where ) ? 'WHERE ' . implode( ' AND ', $where ) : '')
      . " ORDER BY cmtdate DESC LIMIT $limitstart,$limit" );
  $rows = $database->loadObjectList();
  if ($database->getErrorNum()) {
    echo $database->stderr();
    return false;
  }

  # Set up page navigation
  include_once("includes/pageNavigation.php");
  $pageNav = new mosPageNav($total, $limitstart, $limit);

  # Bring it all to the screen
  HTML_Joom_AdminComments::Joom_ShowComments_HTML($option, $rows, $search, 
                                                  $pageNav);
}


function Joom_PublishComments($cid=null, $publish=1, $option) {
  global $database;

  if (!is_array($cid) || count($cid) < 1) {
    $action = $publish ? 'publish' : 'unpublish';
    echo "<script> alert('"._JGA_ALERT_SELECT_AN_ITEM." $action'); 
          window.history.go(-1);</script>\n";
    exit;
  }

  $cids = implode(',', $cid);

  $database->setQuery( "UPDATE #__joomgallery_comments
      SET published='$publish'
      WHERE cmtid IN ($cids)" );
  if (!$database->query()) {
    echo "<script> alert('".$database->getErrorMsg()."'); 
          window.history.go(-1); </script>\n";
    exit();
  }
  mosRedirect('index2.php?option='. $option .'&task=comments');
}


function Joom_ApproveComments($cid=null, $approve=1, $option) {
  global $database;

  if (!is_array($cid) || count($cid) < 1) {
    $action = $approve ? 'approvecmt' : 'rejectcmt';
    echo "<script> alert('" . _JGA_ALERT_SELECT_AN_ITEM . " $action');
          window.history.go(-1);</script>\n";
    exit;
  }

  $cids = implode(',', $cid);

  $database->setQuery( "UPDATE #__joomgallery_comments
      SET approved='$approve'
      WHERE cmtid IN ($cids)" );
  if (!$database->query()) {
    echo "<script> alert('".$database->getErrorMsg()."'); 
          window.history.go(-1); </script>\n";
    exit();
  }
  mosRedirect('index2.php?option='. $option .'&task=comments');
}


function Joom_RemoveComments($cid, $option) {
  global $database;
  if (!is_array( $cid ) || count( $cid ) < 1) {
    echo "<script> alert('"._JGA_ALERT_SELECT_AN_ITEM_TO_DELETE."'); 
          window.history.go(-1);</script>\n";
    exit;
  }
  if (count($cid)) {
    $cids = implode(',', $cid);
    $database->setQuery( "DELETE 
        FROM #__joomgallery_comments 
        WHERE cmtid IN ($cids)" );
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); 
            window.history.go(-1); </script>\n";
    }
  }
  mosRedirect('index2.php?option='. $option .'&task=comments');
}

}

?>
