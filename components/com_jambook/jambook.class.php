<?php
/**
 * Jambook guestbook component for Joomla.
 *
 * Distributed under the terms of the GNU General Public License v2
 * http://www.gnu.org/copyleft/gpl.html
 * This software may be used without warrany provided and
 * copyright statements are left intact.
 *
 * @package JX Development
 * @subpackage Jambook
 * @copyright Copyright (C) 2007-2008 Olle Johansson
 * @author Olle Johansson - http://www.jxdevelopment.com
 * @version $Id$
 **/

if ( !defined( '_VALID_MOS' ) && !defined('_JEXEC') ) die( 'Direct Access to this location is not allowed.' );

// State info
// -3 = rejected
// -2 = unapproved
// -1 = archived
// 0 = unpublished
// 1 = published

class mosJambook extends mosDBTable {
/** @var int Primary key */
	var $id=null;
/** @var string */
	var $title=null;
/** @var string */
	var $content=null;
/** @var string */
	var $email=null;
/** @var string */
	var $url=null;
/** @var string */
	var $authoralias=null;
/** @var int */
	var $replyto=null;
/** @var int */
	var $spamscore=null;
/** @var string */
	var $fromip=null;
/** @var int */
	var $guestbook_id=null;
/** @var string */
	var $section=null;
/** @var string */
	var $attribs=null;
/** @var int */
	var $state=null;
/** @var datetime */
	var $created=null;
/** @var int User id*/
	var $created_by=null;
/** @var datetime */
	var $modified=null;
/** @var int User id*/
	var $modified_by=null;
/** @var boolean */
	var $checked_out=null;
/** @var time */
	var $checked_out_time=null;
/** @var datetime */
	var $publish_up=null;
/** @var datetime */
	var $publish_down=null;
/** @var int */
	var $hits=null;
/** @var int */
	var $version=null;
/** @var int */
	var $access=null;
/** @var int */
	var $ordering=null;


/**
* @param database A database connector object
*/
	function mosJambook( &$db ) {
		$this->mosDBTable( '#__jx_jambook', 'id', $db );
	}

	function check() {
		if ( trim( $this->title ) == '' ) {
			$this->_error = _JX_ERR_NOTITLE;
			return false;
		}
		if ( trim( $this->content ) == '' ) {
			$this->_error = _JX_ERR_NOCONTENT;
			return false;
		}
		if ( trim( $this->email ) && !checkEmailJx( $this->email ) ) {
			$this->_error = _JX_ERR_EMAILINVALID;
			return false;
		}
		if ( trim( $this->url ) && ($this->url != 'http://') && !checkURIJX($this->url)) {
			$this->_error = _JX_ERR_URLINVALID;
			return false;
		}
		if ( trim( $this->email ) && !checkEmailJX($this->email)) {
			$this->_error = _JX_ERR_EMAILINVALID;
			return false;
		}
		return true;
	}


/**
 * Check if the owner is allowed to edit this comment.
 */
	function allowedit() {
		return allowEditItem( $this->created );
	}


/**
 * Returns true if this item is treated as spam, false if not.
 */
	function spamcheck() {
		global $comcfg;
		
		$spamscore = 0;
		if ( intval( $comcfg['spam_url'] ) == 1 ) {
			$spamscore += preg_match_all( "#(\[url(=(.*))?\]|(f|ht)tps?://)#i", $this->content, $matches );
			$spamscore += trim( $this->url ) ? 1 : 0;
			#if ( $spamscore > 0 ) print "SPAM: Url, score: $spamscore<br />";
		}
		if ( intval( $comcfg['spam_image'] ) == 1 ) {
			$spamscore += preg_match_all( "/(\[(img|image)\](.*)\[\/(img|image)\]|\{mosimage\})/i", $this->content, $matches );
			#if ( $spamscore > 0 ) print "SPAM: Image, score: $spamscore<br />";
		}
		if ( intval( $comcfg['spam_onlysmileys'] ) == 1 ) {
			$smileylist = explodeTrimJx( $comcfg['spam_smileylist'], " " );
			$spamscore += checkSmileys( $this->content, $smileylist ) ? 1 : 0;
			#if ( $spamscore > 0 ) print "SPAM: Only smileys, score: $spamscore<br />";
		}
		if ( trim( $comcfg['spam_forbiddenwords'] ) ) {
			$forbiddenwords = explodeTrimJx( $comcfg['spam_forbiddenwords'], "\n" );
			while( list( $k, $w ) = each( $forbiddenwords ) ) {
				$pat = preg_quote( $w, "/" );
				$spamscore += preg_match( "/$pat/i", $this->content );
				#if ( $spamscore > 0 ) print "SPAM: Forbidden word: $w, score: $spamscore<br />";
			}
		}
		$bannedhosts = explodeTrimJx( $comcfg['spam_bannedip'], "\n" );
		if ( in_array( $this->fromip, $bannedhosts ) ) {
			$spamscore += 1;
			#if ( $spamscore > 0 ) print "SPAM: Banned host: {$this->fromip}, score: $spamscore<br />";
		}

		return $spamscore;
	}

/**
 * Returns true if a comment has already been made within the flood protection time limit.
 */
	function floodprotectioncheck() {
		global $comcfg;

		$floodtime = intval( $comcfg['floodprotection'] );
		$now = time();
		$fromuser = "";
		if ( $this->created_by > 0 ) {
			$fromuser = "OR created_by = " . intval( $this->created_by );
		}
		$query = "
         SELECT UNIX_TIMESTAMP( created ) AS created_unixtime
         FROM #__jx_jambook
         WHERE fromip = '{$this->fromip}' $fromuser
         ORDER BY created DESC
         LIMIT 1
        ";
		$this->_db->setQuery( $query );
		$lastposttime = $this->_db->loadResult();

		if ( $lastposttime < ( $now - $floodtime ) ) {
			return false;
		}
		return true;
	}

/**
 * Returns true if a similar comment already exists in database.
 */
	function doublepostcheck() {
		global $comcfg;

		// Return directly if double post check isn't turned on.
		if ( intval( $comcfg['doublepostings'] ) == 0 ) {
			return false;
		}

        // Return directly if we are editing an item.
		if ( $this->id ) {
			return false;
		}

		$query = "
         SELECT id FROM #__jx_jambook
         WHERE title='{$this->title}'
         AND content='{$this->content}'
         AND ( created_by = '{$this->created_by}'
         OR authoralias = '{$this->authoralias}' )
        ";
		$this->_db->setQuery( $query );
		$commentid = $this->_db->loadResult();
		
		if ( $commentid ) {
			return true;
		}
		return false;
	}

/**
* Search method
*
* The sql must return the following fields that are used in a common display
* routine: href, title, section, created, text, browsernav
* @param string Target search string
* @param string ORDER BY string
* @param int Start of limit query
* @param int Number of items to return.
* @param int Total number of rows in table will be returned in this variable.
* @param integer The state to search for -1=archived, 0=unpublished, 1=published [default]
* @param string A prefix for the section label, eg, 'Archived ' Not used.
* @param string Type of search: exact|any|all
*/
	function search( $text, $ordering='created DESC', $limitstart="", $limit="", &$totalRows, $state='1', $sectionPrefix='', $phrase='' ) {
		global $my, $comcfg, $database;

		$text = strtolower( trim( $text ) );
		$state = intval( $state );
		/*
		if ($text == '') {
			return array();
		}
		*/

		$now = getTimeJx();
		$nullDate = $this->_db->getNullDate();

		if ( $limit > 0 ) {
			$limitquery = "\nLIMIT $limitstart, $limit";
		} else {
			$limitquery = '';
		}

		$whereOR = array();
		$whereAND = array();

		$words = explode( ' ', $text );
		$wheres = array();
		foreach ($words as $word) {
			$wheres2 = array();
			$wheres2[] = "LOWER(c.title) LIKE '%$word%'";
			$wheres2[] = "LOWER(c.content) LIKE '%$word%'";
			$wheres2[] = "LOWER(c.authoralias) LIKE '%$word%'";
			$wheres[] = implode( ' OR ', $wheres2 );
		}

		switch ($phrase) {
			case 'exact':
				$whereOR[] = "LOWER(c.title) LIKE '%$text%'";
				$whereOR[] = "LOWER(c.content) LIKE '%$text%'";
				$whereOR[] = "LOWER(c.authoralias) LIKE '%$text%'";
			break;
			
			case 'all':
				mergeArraysJx( $whereAND, $wheres );
				break;

			case 'any':
			default:
				mergeArraysJx( $whereOR, $wheres );
				break;
		}
		if ( count( $whereOR ) == 0 ) $whereOR[] = "1<>1";

		$whereAND[] = "(publish_up = '$nullDate' OR publish_up <= '$now')";
		$whereAND[] = "(publish_down = '$nullDate' OR publish_down >= '$now')";

		// Check out of we need to show only published items
		if ( $comcfg['publishinglimit'] > 0 ) {
			$ptime = date( "Y-m-d H:i:s", time() - intval( $comcfg['publishinglimit'] ) * 86400 );
			$whereAND[] = "c.created >= '$ptime'";
		}

		$this->_db->setQuery( "SELECT *"
		. "\nFROM #__jx_jambook AS c"
		. "\nWHERE (".(implode( ' OR ', $whereOR ) ).")"
	    . "\n	AND (".(implode( ' AND ', $whereAND ) ).")"
		. "\n	AND c.state='$state' AND c.access<='$my->gid'"
		. "\nORDER BY $ordering"
        . "$limitquery"
		);
		#. "\nINNER JOIN #__categories AS b ON b.id=a.catid AND b.access <='$my->gid'"
		#print $this->_db->getQuery();

		$list = $this->_db->loadObjectList();

		$this->_db->setQuery( "SELECT count(id)"
		. "\nFROM #__jx_jambook AS c"
		. "\nWHERE (".(implode( ' OR ', $whereOR ) ).")"
	    . "\n	AND (".(implode( ' AND ', $whereAND ) ).")"
		. "\n	AND c.state='$state' AND c.access<='$my->gid'"
		);
		$totalRows = $this->_db->loadResult();

		return $list;
	}


}
