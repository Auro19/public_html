<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/joom.viewspecial.php $
// $Id: joom.viewspecial.php 396 2009-03-15 16:06:21Z aha $
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

include_once (_JOOM_FRONTEND_PATH . '/includes/html/joom.viewspecial.html.php');

//Parameter
global $sorting;
$sorting = $database->getEscaped(trim( mosGetParam( $_POST, 'sorting', "" )) );
if ($sorting == "") { $sorting = $database->getEscaped(trim( mosGetParam( $_REQUEST, 'sorting', "" )) ); }

//Suche
$sstring = $database->getEscaped( trim( mosGetParam( $_POST, 'sstring', "" ) ) );
if ($sstring == "") { $sstring = $database->getEscaped( trim( mosGetParam( $_REQUEST, 'sstring', "" ) ) ); }

switch ( $sorting ) {
  case 'find':
    $suchstring=trim( strtolower( $sstring ) );

    $query1="SELECT a.*, a.owner as owner,u.username, ca.name AS name
        FROM #__joomgallery AS a, #__joomgallery_catg AS ca, #__users as u
        WHERE a.catid=ca.cid AND a.owner=u.id AND
        (u.username LIKE '%$suchstring%'
        OR a.imgtitle LIKE '%$suchstring%'
        OR a.imgtext LIKE '%$suchstring%')
        AND a.published = '1' " . " AND ca.published = '1' " . " AND a.approved='1' " . " AND ca.access<=$gid
        GROUP BY a.id
        ORDER BY a.id DESC ";

    $tl_title=_JGS_SEARCH_RESULTS."<b> $sstring</b>";
    break;

  case 'lastcomment':
    $query1="SELECT a.*,cc.*, ca.*,u.username, a.owner as owner
        FROM #__joomgallery AS a, #__joomgallery_catg AS ca, #__joomgallery_comments AS cc 
        LEFT JOIN #__users AS u on cc.userid = u.id
        WHERE a.id=cc.cmtpic AND a.catid=ca.cid AND a.published = '1' " . " AND a.approved='1' " . " AND cc.published = '1' " . " AND ca.published = '1' " . " AND cc.approved='1' " . " AND ca.access<=$gid". "\n
        ORDER BY cc.cmtdate DESC LIMIT $jg_toplist";
    $tl_title=_JGS_TOP." $jg_toplist "._JGS_LAST_COMMENTED_PICTURE;
    break;

  case 'lastadd':
    $query1="SELECT *, a.owner as owner
        FROM #__joomgallery As a, #__joomgallery_catg AS ca
        WHERE a.catid=ca.cid AND a.published ='1' " . " AND a.approved='1' " . " AND ca.published = '1' " . " AND ca.access<=$gid ". "\n
        ORDER BY a.id DESC LIMIT $jg_toplist";
    $tl_title=_JGS_TOP." $jg_toplist "._JGS_LAST_ADDED_PICTURE;
    break;

  case 'rating':
    $query1="SELECT *, a.owner as owner, ROUND(imgvotesum/imgvotes, 2) AS rating
        FROM #__joomgallery AS a, #__joomgallery_catg AS ca
        WHERE a.catid=ca.cid AND a.imgvotes > '0' AND a.published = '1' " . " AND a.approved='1' " . " AND ca.published = '1' " . " AND ca.access<=$gid " . "\n
        ORDER BY rating DESC,imgvotesum DESC LIMIT $jg_toplist";
    $tl_title=_JGS_TOP." $jg_toplist "._JGS_BEST_RATED_PICTURE;
    break;

  default:
    $query1="SELECT *, a.owner as owner
        FROM #__joomgallery AS a, #__joomgallery_catg AS ca
        WHERE a.imgcounter > 0 AND a.catid=ca.cid AND a.published = '1' " . "\n AND a.approved='1' " . " AND ca.published = '1' " . " AND ca.access<=$gid". "\n
        ORDER BY imgcounter DESC LIMIT $jg_toplist";
    $tl_title=_JGS_TOP." $jg_toplist "._JGS_MOST_VIEWED_PICTURE;
    break;
}

# Database Query
$database->setQuery( $query1 );
$rows=$database->loadObjectList();

HTML_Joom_Specials::Joom_ShowSpecials_HTML( $tl_title, $rows);

?>
