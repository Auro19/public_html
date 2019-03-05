<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/admin.votes.php $
// $Id: admin.votes.php 396 2009-03-15 16:06:21Z aha $
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

class Joom_AdminVotes  {
  function Joom_AdminVotes(){
    global $mosConfig_absolute_path, $database, $option;

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

    $adminincludepath      = $mosConfig_absolute_path .
                         '/administrator/components/com_joomgallery/includes/';
 
    $sync = mosGetParam($_POST, 'votes_sync', '');
    $reset = mosGetParam($_POST, 'votes_reset', '');
    
    if ($sync){ // Synchronize user-votes
      $query = "DELETE v from #__joomgallery_votes AS v \n"
      			."LEFT JOIN #__users AS u ON v.userid = u.id \n"
                ."WHERE v.userid != 0 \n"
                ."AND u.id IS NULL";
                
      $database->setQuery($query);             
      if (!$database->query()) {
        echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
        return false;
      }
      
      $query = "UPDATE #__joomgallery AS p set \n" 
  				."p.imgvotes = \n" 
  				."(select count(*) FROM #__joomgallery_votes as v \n"
				. "WHERE v.picid = p.id), \n"
                . "p.imgvotesum = \n" 
				. "(select sum(vote) FROM #__joomgallery_votes as v \n"
				. "WHERE v.picid = p.id)";
    
	  $database->setQuery($query);             
      if (!$database->query()) {
        echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
        return false;
      }
      // done:
      mosRedirect('index2.php?option='. $option .'&act=votes',_JGA_USERVOTES_SYNCHRONIZED);
      
    } else if ($reset){ // delete all votes
      $query = "DELETE FROM #__joomgallery_votes";
      $database->setQuery($query);
      if (!$database->query()) {
        echo "<script> alert('".$database->getErrorMsg() ."'); window.history.go(-1); </script>\n";
        return false;
      }
      
      $query = "UPDATE #__joomgallery SET imgvotes = 0, imgvotesum = 0";
      $database->setQuery($query);
      if (!$database->query()) {
        echo "<script> alert('".$database->getErrorMsg() ."'); window.history.go(-1); </script>\n";
        return;
      }
      
      // done:
      mosRedirect('index2.php?option='. $option .'&act=votes',_JGA_ALL_VOTES_DELETED);
      
    }
    
    require_once ($adminincludepath . 'html/admin.votes.html.php');
    $htmladminvotes=new HTML_Joom_AdminVotes();

  }
}
?>
