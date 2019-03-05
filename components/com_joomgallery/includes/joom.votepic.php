<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/joom.votepic.php $
// $Id: joom.votepic.php 396 2009-03-15 16:06:21Z aha $
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
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Check for hacking attempt
$query = "SELECT count(id)"
        ." FROM #__joomgallery as a"
        ." LEFT JOIN #__joomgallery_catg"
        ." AS c ON c.cid=a.catid"
        ." WHERE a.published = '1' AND a.approved = '1'"
        ." AND a.id = '".$id."' AND c.access <= '".$my->gid."'";

$database->setQuery($query);
$result = $database->loadResult();

if($result!=1) {
  die("Stop Hacking attempt!");
}

$ip = getenv('REMOTE_ADDR');
$date=date('Y-m-d');
$time = time ();

if ( $jg_onlyreguservotes && $gid > 0 ) {
  // get voted or not
  $query = "SELECT *
      FROM #__joomgallery_votes
      WHERE userid='$my->id' AND picid='$id'";
  $database->setQuery($query);
  $rows = $database->loadObjectList();

  // vote or print error
  if (count($rows) >= 1) {
    # Print Error and Get back to details page
    echo '<SCRIPT> alert("' . _JGS_ALERT_YOUR_VOTE_NOT_COUNTED . '"); document.location.href="'.sefRelToAbs('index.php?option=com_joomgallery&func=detail&id=' . $id . _JOOM_ITEMID) .'";</SCRIPT>';
  }
}

if ( ( $jg_onlyreguservotes && $gid > 0 && (count($rows) == 0) ) || !$jg_onlyreguservotes ) {
  # Get old values from database
  $database->setQuery("SELECT imgvotes, imgvotesum
      FROM #__joomgallery
      WHERE id = '$id'");
  $result1=$database->LoadRow();
  list($imgvotes, $imgvotesum) = $result1;
  
  # Recalculate with the new vote
  $imgvotes++;
  $imgvotesum=$imgvotesum + $imgvote;
  # Save new values
  $database->setQuery( "UPDATE #__joomgallery
      SET imgvotes='$imgvotes', imgvotesum='$imgvotesum'
      WHERE id=$id" );
  $database->query();

  # Get back to details page
  echo '<SCRIPT> alert("' . _JGS_ALERT_YOUR_VOTE_COUNTED . '"); document.location.href="'.sefRelToAbs('index.php?option=com_joomgallery&func=detail&id=' . $id . _JOOM_ITEMID) .'";</SCRIPT>';
	
  // store log of vote:
  $query = "INSERT INTO #__joomgallery_votes VALUES('','$id','$my->id','$ip','$date','$time','$imgvote')";
  $database->setQuery($query);
  $database->query();
}


?>
