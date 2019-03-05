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

global $option, $Itemid, $comcfg, $captcha, $is_editor;

//Get right Language file
if ( file_exists( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/language/" . $mainframe->getCfg( 'lang' ) . '.php' ) ) {
	include_once( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/language/" . $mainframe->getCfg( 'lang' ) . '.php' );
} else {
	include_once( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/language/english.php" );
}

// Read configuration file
include_once( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/configuration.php" );

// Read a file containing the jxTemplate class
require_once( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/jxtemplate.php" );

// Read frontend html classes
require_once( $mainframe->getPath( 'front_html' ) );

// Read database class information
require_once( $mainframe->getPath( 'class' ) );

// Read a file with common functions
require_once( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/jambook.common.php" );

// Read a file with the CAPTCHA class
require_once( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/ocr_captcha.class.php" );

// Load request parameters.
$id     = intval( mosGetParam( $_REQUEST ,'id', '' ) );
$task   = mosGetParam( $_REQUEST ,'task', '' );
$view   = mosGetParam( $_REQUEST ,'view', '' );
$Itemid = intval( mosGetParam( $_REQUEST ,'Itemid', '' ) );
$type   = mosGetParam( $_REQUEST ,'type', '' );
$limit  = intval( trim( mosGetParam( $_REQUEST, 'limit', intval( $comcfg['item_limit'] ) ) ) );
$limitstart = intval( trim( mosGetParam( $_REQUEST, 'limitstart', 0 ) ) );
$sort   = trim( mosGetParam( $_REQUEST, 'sort', $comcfg['sort_order'] ) );
$msg    = trim( stripslashes( mosGetParam( $_REQUEST, 'msg', '' ) ) );
$search = mosGetParam( $_REQUEST, 'search','' );

// Create CAPTCHA object
if ( intval( $comcfg['usecaptcha'] ) == 1 ) {
	$captcha = new ocr_captcha(6,120,30,25,$mainframe->getCfg( 'secret' ),"png","components/$option/captcha/","en",$mainframe->getCfg( 'absolute_path' )."/components/$option/Dustismo.ttf",$mainframe->getCfg( 'absolute_path' ),$mainframe->getCfg( 'live_site' ));
}

// Determine what to do
switch ( $task ) {
	case "add":
		editItem( 0 );
		break;
	case "edit":
		editItem( $id );
		break;
	case "preview":
		previewItem();
		break;
	case "save":
		saveItem();
		break;
	case "reedit":
		editItemFromForm();
		break;
	case "cancel":
		cancelItem();
		break;
	case "thankyou":
		showThankYou( $msg, $id );
		break;
	case "error":
		showError( $msg );
		break;
	case "view":
		viewItem( $id, true );
		break;
	case "results":
		searchItems( $search, $sort, $type );
		break;
	case "search":
		showSearchForm( $search );
		break;
	case "delete":
		deleteItem( $id );
		break;
	case "list":
		listItems( $type, $sort, $limit, $limitstart );
		break;
	default:
		showFirstPage( $type, $sort, $limit, $limitstart );
}

/* ******************** Main functions ******************** */

/**
 * What to show on the default first page of Jambook depends on commentformplacement config option.
 */
function showFirstPage( $type, $sort, $limit, $limitstart ) {
	global $comcfg;

	if ( $comcfg['commentformplacement'] == "firstpage" ) {
		editItem( 0 );
	} else {
		listItems( $type, $sort, $limit, $limitstart );
	}
}

/**
 * Save an item to the database.
 */
function saveItem() {
	global $database, $option, $comcfg, $mainframe, $my, $Itemid, $captcha;

	if ( $comcfg['postitems'] > $my->gid ) {
		mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=error&msg=" . _JX_POSTINGNOTALLOWED );
		exit;
	}
	
	// Check for spoof value token
	if (!checkSpoofValueJx()) {
		showError(_JX_ERR_SPOOF_CHECK_INVALID);
		return;
	}

	// CAPTCHA Spam Protection code.
	if ( checkCaptchaJx() && intval( $comcfg['usecaptcha'] ) == 1 ) {
		$public = mosGetParam( $_REQUEST, 'public_key', '' );
		$private = mosGetParam( $_REQUEST, 'private_key', '' );
		if ( isset( $_REQUEST['private_key'] ) ) {
			$cansend = $captcha->check_captcha( $public, $private ) ? 1 : 2;
		} else {
			$cansend = 0;
		}

		// cansend == 1 if correct private key is entered
		// cansend == 2 if incorrect private key is entered
		// cansend == 0 if no private key was entered
		if ( $cansend !== 1 ) {
			#mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=error&msg=" . _JX_ERR_INCORRECT_CAPTCHA );
			echo "<script> alert('". _JX_ERR_INCORRECT_CAPTCHA ."');</script>\n";
			editItemFromForm( $cansend );
			return;
		}
	}

	$row = new mosJambook( $database );
	if (!$row->bind( $_POST, JXFORBIDDENFIELDS )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	// Remove Html from selected fields.
	removeHtmlJx( $row, JXNOHTMLFIELDS );
	$row->content = safeHtmlJx( $row->content );
	if ( $row->id ) {
		$row->modified = date( "Y-m-d H:i:s" );
		$row->modified_by = $my->id;

		// Load old data
		$dbrow = new mosJambook( $database );
		$dbrow->load( $row->id );
	} else {
		$row->created = date( "Y-m-d H:i:s" );
		$row->created_by = $my->id;
		if ( $comcfg['autoapprove'] ) {
			$row->state = 1;
		} else {
			$row->state = 0;
		}
	}

	if ( $row->id ) {
		if ( $my->id ) {
			if ( $dbrow->created_by != $my->id && $my->usertype!="Super Administrator" && $my->usertype!="Administrator") {
				mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=error&msg=" . _JX_NOTOWNER );
				return;
			}
			if ( !$dbrow->allowedit() && $my->usertype!="Super Administrator" && $my->usertype!="Administrator") {
				mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=error&msg=" . _JX_EDITTIMEPASSED );
				return;
			}
		} else {
			mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=error&msg=" . _JX_NOTLOGGEDIN );
			return;
		}
	}

	// Save remote IP
	$row->fromip = mosGetParam( $_SERVER, 'REMOTE_ADDR', '' );

	// Add http:// to start of string if it doesn't exist to ensure a proper url.
	if ( trim( $row->url ) && !preg_match( "#^https?://#i", $row->url ) ) {
		$row->url = "http://" . $row->url;
	}

	// Build the attrib fields from all request values starting with attrib_
    // and merge with the saved attrib fields.
	$newattribs = getItemAttribs();
	if ( isset( $dbrow->id ) ) {
		$attribs = parseAttribsJx( $dbrow->attribs );
		mergeArraysJx( $attribs, $newattribs );
	} else {
		$attribs = $newattribs;
	}
	$row->attribs = createAttribField( $attribs );

	// Flood protection, make sure last comment from this IP is within set parameters.
	if ( $row->floodprotectioncheck() ) {
		mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=error&msg=" . _JX_TOOMANYPOSTSWITHINTIMEFRAME );
		return;
	}

	// Check for a double post
	if ( $row->doublepostcheck() ) {
		mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=error&msg=" . _JX_DOUBLEPOSTNOTALLOWED );
		return;
	}

	// Spam shield, check if comment seems to be spam, act accordingly
	$row->spamscore = $row->spamcheck();
	#print "Spamscore: $row->spamscore<br />"; exit;
	$emailwarning = false;
	if ( ( $comcfg['spamtreatment'] != "nothing" ) && ( $row->spamscore > 0 ) ) {
		switch ( $comcfg['spamtreatment'] ) {
			case "delete": 
				mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=error&msg=" . _JX_NOSPAMALLOWED );
				return;
				break;
			case "emailwarning":
				$emailwarning = true;
				break;
			case "dontpublish":
			default:
				$row->state = 0;
		}
	}
 
	$row->ordering = 99999;
	
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->version++;
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	$row->updateOrder( "state >= 0" );

	// Get some extra information needed for the emails.
	addExtraValues( $row );
	list( $mailfromaddress, $mailfromname ) = getAdminInfoJx();

	// Send mail to admin about this item posting.
	if ( !$row->modified_by && ( $emailwarning || $comcfg['emailcommenttoadmin'] ) && $comcfg['adminemail'] ) {
		$msg = _JX_NEWITEM_MSG;
		$pub = ( $row->state == 1 ) ? _JX_A_YES : _JX_A_NO;
		$msg = str_replace( "<<AUTHOR>>", $row->author, $msg );
		$msg = str_replace( "<<TITLE>>", $row->title, $msg );
		$msg = str_replace( "<<SPAMSCORE>>", $row->spamscore, $msg );
		$msg = str_replace( "<<PUBLISHED>>", $pub, $msg );
		$msg = str_replace( "<<ENTRY>>", $row->content, $msg );
		$msg = str_replace( "<<SITEURL>>", $mainframe->getCfg( 'live_site' ), $msg );
        #$adminmailto = createMailtoJx( $comcfg['adminemail'], $comcfg['adminname'] );
		$ret = sendEmailJx( $comcfg['adminemail'], _JX_NEWITEMPOSTED, $msg, $mailfromname, $mailfromaddress );
	}

	// Send mail to item poster
	if ( !$row->modified_by && trim( $comcfg['mailfromaddress'] ) 
		 && ( $comcfg['sendthankyouemail'] == "1" ) ) {
		$user = new mosUser( $my->id );
		if ( trim( $user->email ) ) {
			$msg = _JX_YOUPOSTEDITEM_MSG;
			$msg = str_replace( "<<TITLE>>", $row->title, $msg );
			$msg = str_replace( "<<SITEURL>>", $mainframe->getCfg( 'live_site' ), $msg );
			$usermailname = trim( $user->name ) ? $user->name : $user->username;
			#$usermailto = createMailtoJx( $user->email, $usermailname );
			$ret = sendEmailJx( $user->email, _JX_YOUPOSTEDITEM, $msg, $mailfromname, $mailfromaddress );
		}
	}

	mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=thankyou&msg=" . urlencode( _JX_ITEMSENT ) );
}

/**
 * Show the item and give the user the option to save or re-edit.
 */
function previewItem() {
	global $database, $option, $comcfg, $mainframe, $my;

	if ( $comcfg['postitems'] > $my->gid ) {
		mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=error&msg=" . _JX_POSTINGNOTALLOWED );
		exit;
	}

	// Bind the posted form variables to a new database object for viewing.
	$row = new mosJambook( $database );
	if (!$row->bind( $_POST, JXFORBIDDENFIELDS )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	// Remove Html from selected fields.
	removeHtmlJx( $row, JXNOHTMLFIELDS );
	$row->content = safeHtmlJx( $row->content );
	// Make sure created time and modified time will show as well
	if ($row->id) {
		$row->modified = date( "Y-m-d H:i:s" );
		$row->modified_by = $my->id;
	} else {
		$row->created = date( "Y-m-d H:i:s" );
		$row->created_by = $my->id;
	}

	# Add http:// to start of string if it doesn't exist to ensure a proper url.
	if ( trim( $row->url ) && !preg_match( "#^https?://#i", $row->url ) ) {
		$row->url = "http://" . $row->url;
	}

	// Build the attrib fields from all request values starting with attrib_
	$row->attribs = createAttribField( getItemAttribs() );

	// Add extra row values for showing the comment
	addExtraValues( $row );

	// Insert linebreaks before newlines for the viewing
	#$row->description = str_replace( "\n", "<br />\n", $row->description );

	HTML_jambook::show( $row, "preview" );

	// Remove the linebreaks for the posting
	#$row->description = str_replace( "<br />\n", "\n", $row->description );

	HTML_jambook::previewItem( $row );
}

/**
* Cancels an edit operation
* @param database A database connector object
*/
function cancelItem( ) {
	global $mainframe, $database, $option, $Itemid;

	if ( $comcfg['postitems'] > $my->gid ) {
		mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=error&msg=" . _JX_POSTINGNOTALLOWED );
		exit;
	}

	$row = new mosJambook( $database );
	$row->bind( $_POST, JXFORBIDDENFIELDS );
	$row->checkin();

	// Return to own items if logged in, otherwise list all entries.
	if ( $my->id ) {
		mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=list&type=own" );
	} else {
		mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=list" );
	}
}

/**
 * Edit an item, if no id is given, a new item will be created.
 * @param int id ID of the item to edit.
 */
function editItem( $pid ) {
	global $database, $option, $comcfg, $mainframe, $Itemid, $my;

	if ( $comcfg['postitems'] > $my->gid ) {
		mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=error&msg=" . _JX_POSTINGNOTALLOWED );
		exit;
	}

	$row = new mosJambook( $database );
	// load the row from the db table
	$row->load( $pid );

	// fail if checked out not by 'me'
	if ( $row->checked_out && $row->checked_out != $my->id ) {
		mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index2.php?option=content",
		_JX_ERR_CHECKED_OUT1 . " $row->title " . _JX_ERR_CHECKED_OUT2 );
	}

	if ( $row->id ) {
		if ( $my->id ) {
			if ( $row->created_by != $my->id && $my->usertype!="Super Administrator" && $my->usertype!="Administrator") {
				showError( _JX_NOTOWNER );
				return;
			}
			if ( !$row->allowedit() && $my->usertype!="Super Administrator" && $my->usertype!="Administrator") {
				showError( _JX_EDITTIMEPASSED );
				return;
			}
		} else {
			showError( _JX_NOTLOGGEDIN );
			return;
		}
		$row->checkout( $my->id );

	} else {
		$row->version = 0;
		if ( $comcfg['autoapprove'] ) {
			$row->state = 1;
		} else {
			$row->state = -2;
		}
		$row->access = 0;
		$row->ordering = 9999;
	}

	editItemObject( $row );
}

/**
 * Populate an edit form for an item with the data given.
 */
function editItemFromForm( $cansend=null ) {
	global $database, $option, $comcfg, $mainframe, $my;

	if ( $comcfg['postitems'] > $my->gid ) {
		mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=error&msg=" . _JX_POSTINGNOTALLOWED );
		exit;
	}

	$row = new mosJambook( $database );
	if (!$row->bind( $_POST, JXFORBIDDENFIELDS )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// Build the attrib fields from all request values starting with attrib_
	$row->attribs = createAttribField( getItemAttribs() );

	editItemObject( $row, $cansend );
}

/**
 * Edit a item based on the info in the given object.
 *
 * @param object A mosJambook object that is either empty or contains
 * data to be changed.
 */
function editItemObject( $row, $cansend=null ) {
	global $database, $option, $comcfg, $mainframe, $my, $captcha;

	// Initialize wysiwyg html editor?
	if ( $comcfg['initeditor'] && !$my->id ) {
		print initEditorJx();
	}

	$lists = array();

	// Add the attrib fields as elements in the array.
	addArrayToObjectJx( $row, parseAttribsJx( $row->attribs ), 'attrib_' );

	if ( checkCaptchaJx() && intval( $comcfg['usecaptcha'] ) == 1 && isset( $captcha ) ) {
		HTML_jambook::editItem( $row, $lists, $captcha, $cansend );
	} else {
		HTML_jambook::editItem( $row, $lists );
	}
}


/**
 * Delete an item
 *
 * @param pid int ID of the item to delete.
 */
function deleteItem( $pid ) {
	global $database, $option, $comcfg, $mainframe, $my;

	$row = new mosJambook( $database );

	// load the row from the db table
	$row->load( $pid );
		
	if ( $my->id > 0 ) {
		if ( $row->created_by != $my->id && $my->usertype!="Super Administrator" && $my->usertype!="Administrator") {
			showError( _JX_NOTOWNER );
			return;
		}
		if ( !$row->allowedit() && $my->usertype!="Super Administrator" && $my->usertype!="Administrator") {
			showError( _JX_EDITTIMEPASSED );
			return;
		}
	} else {
		showError( _JX_NOTLOGGEDIN );
		return;
	}
	
	if ( isset( $_REQUEST['cancelbutton'] ) ) {
		mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=list&type=own" );
	} elseif ( isset( $_REQUEST['deletebutton'] ) ) {
		// actually deleting
		$row->delete( $pid );
		mosRedirect( $mainframe->getCfg( 'live_site' ) . "/index.php?option=$option&Itemid=$Itemid&task=thankyou&msg=" . urlencode(_JX_ITEMDELETED) );
	} else {
		// showing 'view' with delete-button
		
		HTML_jambook::show( $row, "delete" );
	}
}


/**
 * Show a search form
 *
 * @param string String to prefill the search form with.
 */
function showSearchForm( $search ) {
	global $database, $option, $is_editor, $my, $mainframe, $comcfg, $Itemid;

	HTML_jambook::showSearch( $search );
}

/**
 * Search through all items based on the given searchword.
 *
 * @param string The word to search for.
 * @param string How to sort the result list.
 */
function searchItems( $searchword, $sort, $type ) {
	global $database, $option, $is_editor, $my, $mainframe, $comcfg, $limit, $limitstart, $Itemid;

	mosLogSearch( $searchword );

	$ordering = getOrderingJx( $sort );

	// Search the items based on seleccted criteria
	$obj = new mosJambook( $database );
	$rows = $obj->search( $searchword, $ordering, $limitstart, $limit, $totalRows );

	if ( $totalRows > 0 ) {
		if ( $totalRows > $limit ) {
			// Include page navigation script
			require_once( $mainframe->getCfg( 'absolute_path' ) . "/includes/pageNavigation.php" );
			$pageNav = new mosPageNav( $totalRows, $limitstart, $limit );
		} else {
			$pageNav = null;
		}

		$link = "index.php?option=$option&Itemid=$Itemid&task=results&search=$searchword";

		// List items
		HTML_jambook::listItems( $rows, $totalRows, $searchword, $pageNav, $link, $type, $sort );
	} else {
		showError( _JX_NO_RESULTS, _JX_NOTHING_FOUND );
		showSearchForm( $searchword );
	}
}

/*
 * Shows information about an item.
 *
 * @param integer ID of the item to show.
 * @param boolean Show full description? 
 */
function viewItem( $id, $full=true ) {
	global $database, $option, $is_editor, $my, $mainframe, $pop, $comcfg, $mosConfig_offset;
	$gid = $my->gid;

	$access = !$mainframe->getCfg( 'shownoauth' );
	$now = getTimeJx();
	echo "date: " . $now;
	$nullDate = $database->getNullDate();

	$row = new mosJambook( $database );
	$row->load( $id );

	if ( $row->id ) {
		if ( $row->state != "1" && !$is_editor ) {
			showError( _JX_ACCESS_DENIED );
			return;
		}
		if ( $access && $row->access > $gid ) {
			showError( _JX_ACCESS_DENIED );
			return;
		}
		if ( ( $comcfg['publishinglimit'] > 0 ) && ( strtotime( $row->created ) < ( time() - ( intval( $comcfg['publishinglimit'] ) * 86400 ) ) ) ) {
			showError( _JX_NOTACCESIBLE );
			return;
		}
		if ( ( $row->publish_up != $nullDate ) && ( $row->publish_up > $now ) ||
			 ( $row->publish_down != $nullDate ) && ( $row->publish_down < $now ) ) {
			showError( _JX_NOTACCESIBLE );
			return;
		}

		// Insert linebreaks before newlines for the viewing
		$row->content = str_replace( "\n", "<br />\n", $row->content );

		// Record this hit
		$row->hit();

		HTML_jambook::show( $row );
	} else {
		showError( _JX_ITEM_NOT_FOUND );
	}
}

/**
 * List items in the database
 *
 * @param string Type of items to list, "own" to show only items owned by user, empty for all items.
 * @param string What to order the list by (titleasc, titledesc, orderingasc, orderingdesc, jobiddesc, jobidasc, createdasc, createddesc)
 * @param int How many items to show on the page
 * @param int What item to start the list at
 */
function listItems( $type, $sort, $limit, $limitstart ) {
	global $database, $option, $is_editor, $my, $mainframe, $comcfg, $Itemid, $mosConfig_offset;
	$gid = $my->gid;

	$access = !$mainframe->getCfg( 'shownoauth' );

	// Remove items if they are too old.
	$prefix = checkItemPruning();

	// Only show one job type
	$typequery = "";
	if ( $type != "" ) {
		switch ( $type ) {
			case "own": 
				// ...acceppt 'own' only if logged in
				if ( $my->id ) {
					$typequery = "\n    AND ( jc.created_by = " . $my->id . ")"; 
				} else {
					showError( _JX_NOTLOGGEDIN );
					return;
				}
				break;
			default:
				$typequery = "";
		}
	}

	// Check out of we need to show only published items
	$publishedquery = "";
	if ( $comcfg['publishinglimit'] > 0 ) {
		$ptime = date( "Y-m-d H:i:s", time() - intval( $comcfg['publishinglimit'] ) * 86400 );
		$publishedquery = "\n	AND jc.created >= '$ptime'";
	}
	$now = date( "Y-m-d H:i:s", time()+$mosConfig_offset*60*60 );
	$publishedquery .= "\n	AND (jc.publish_up = '0000-00-00 00:00:00' OR jc.publish_up <= '$now')";
	$publishedquery .= "\n	AND (jc.publish_down = '0000-00-00 00:00:00' OR jc.publish_down >= '$now')";

	$ordering = getOrderingJx( $sort );

	// Read properties from db.
	$query = "SELECT jc.*, u.name AS author_name, u.username AS author_username "
		. "\nFROM #__jx_jambook AS jc"
        . "\nLEFT OUTER JOIN #__users AS u ON jc.created_by = u.id"
		. "\nWHERE jc.state='1' "
		. ($access ? "\n	AND jc.access<='$gid'" : "" )
        . $publishedquery
		. $typequery
		. "\nORDER BY $ordering";
	$database->setQuery( $query, $limitstart, $limit );
	$items = $database->loadObjectList();
#	print $database->getQuery();

	// get the total number of records
	$database->setQuery( "SELECT count(id)"
		. "\nFROM #__jx_jambook AS jc"
		. "\nWHERE jc.state='1' "
		. ($access ? "\n	AND jc.access<='$gid'" : "" )
		. $publishedquery
		. $typequery
	);
	$totalRows = $database->loadResult();
#	print $database->getQuery();

	// Include page navigation script
	if ( $totalRows > $limit ) {
		require_once( $mainframe->getCfg( 'absolute_path' ) . "/includes/pageNavigation.php" );
		$pageNav = new mosPageNav( $totalRows, $limitstart, $limit );
	} else {
		$pageNav = null;
	}

	$link = "index.php?option=$option&Itemid=$Itemid&task=list";
	if (isset($sort)) {
		$link .= '&amp;sort=' . $sort;
	}

	// Show comment form above guestbook?
	if ( $comcfg['commentformplacement'] == "above" ) {
		editItem( 0 );
	}

	// List items
	HTML_jambook::listItems( $items, $totalRows, "", $pageNav, $link, $type, $sort );

	// Show comment form below guestbook?
	if ( $comcfg['commentformplacement'] == "below" ) {
		editItem( 0 );
	}

}

/**
 * Show a thank you message.
 *
 * @param int ID of a job to link back to.
 */
function showThankYou( $msg, $id ) {
	HTML_jambook::showThankYou( $msg, $id );
}


/* ******************** Some helper functions ******************** */

function showError( $error, $error_header = _JX_ERROR ) {
	HTML_jambook::showError( $error, $error_header );
}

