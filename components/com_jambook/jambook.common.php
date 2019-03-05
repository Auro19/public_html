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

/* Some default constants used by the scripts */
/* ------------------------------------------ */

DEFINE('JXSPLITCHAR', ';');
DEFINE('JXFORBIDDENFIELDS', 'state hits access section ordering checked_out checked_out_time created created_by modified modified_by publish_up publish_down replyto fromip spamscore author_username author_name author version');
DEFINE('JXCONTENTSHORTLEN', 100);
DEFINE('JXSITE', 'http://www.jxdevelopment.com');
DEFINE('JXNOHTMLFIELDS', 'title email url authoralias');

// Setup for Joomla 1.5
if (defined('_JEXEC')) {
	JHTML::_('behavior.tooltip');
	jimport('joomla.html.html.email');
}

/* Html output functions */
/* --------------------- */

/**
 * Show an error message.
 *
 * @param string The error message to show.
 * @param string Heading for the error message.
 */
function showErrorJx( $error, $error_header = _JX_ERROR ) {
	HTML_jambook::showError( $error, $error_header );
}

/* Miscellaneous functions to check stuff. */
/* --------------------------------------- */

/**
 * Checks if given URI is valid.
 *
 * @param string $uri URI to check for validity.
 * @return boolean True if $uri is valid.
 */
function checkURIJX($uri) {
	return ( ! preg_match('/^(http|https):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $uri)) ? false : true;
}

/**
 * Check if all prerequisities for CAPTCHA is available.
 *
 * @return boolean True if CAPTCHA functionality is available.
 */
function checkCaptchaJx() {
	if (!function_exists('ImageTTFText')) {
		return false;
	}
	if (!function_exists('imagecreatetruecolor')) {
		return false;
	}
	if (!function_exists('imagepng')) {
		return false;
	}
	return true;
}

/* Functions for returning information */
/* ----------------------------------- */

function checkSpoofValueJx() {
	if (defined('_JEXEC')) {
		return JRequest::checkToken();
	} else {
		josSpoofCheck();
		return true;
	}
}

/**
 * Wrapper function to get spoof value token depending on Joomla version.
 *
 * @return string Spoof value token.
 */
function getSpoofValueJx() {
	if (defined('_JEXEC')) {
		return JUtility::getToken();
	} else {
		return josSpoofValue();
	}
}

/**
 * Get current time.
 *
 * @return string Current date as ISO string.
 */
function getTimeJx() {
	if (defined('_JEXEC')) {
		$datenow =& JFactory::getDate();
		return $datenow->toMySQL();
	} else {
		return _CURRENT_SERVER_TIME;
	}
}

/**
 * Wrapper function to return $mainframe in Joomla 1.0 and 
 * JApplication::getInstance() in Joomla 1.5
 */
function getApplicationJx() {
	if (defined('_JEXEC')) {
		$mainframe =& JFactory::getApplication();
	} else {
		global $mainframe;
	}
	return $mainframe;
}

/**
 * Wrapper to get an empty date.
 */
function getNullDateJx() {
	if (defined('_JEXEC')) {
		$db =& JFactory::getDBO();
		$emptydate = $db->getNullDate();
	} else {
		$emptydate = "0000-00-00 00:00:00";
	}
	return $emptydate;
}

/**
 * Wrapper around the Joomla mosToolTip/mosWarning functions to use addslashes on strings.
 */
function jxToolTip( $descr, $title='', $type='' ) {
	if (defined('_JEXEC')) {
		$descr = htmlspecialchars( $descr, ENT_QUOTES );
		$title = htmlspecialchars( $title, ENT_QUOTES );
	} else {
		$descr = htmlspecialchars( addslashes( $descr ) );
		$title = htmlspecialchars( addslashes( $title ) );
	}
	switch ( $type ) {
		case "warning":
			if (defined('_JEXEC')) {
				return JHTML::tooltip($descr, $title, 'warning.png', null, null, null);
			} else {
				return mosWarning( $descr, $title );
			}
			break;
		default:
			if (defined('_JEXEC')) {
				#return JHTML::_('tooltip', $descr, $title);
				return JHTML::tooltip($descr, $title, null, $title, null, null);
			} else {
				return mosToolTip( $descr, $title, null, null, $title );
			}
	}
}

/**
 * Returns the menu id (Itemid) of the given option.
 *
 * @param string Name of option to return Itemid for.
 */
function getItemIdJx( $option ) {
	global $database;

	$query = "SELECT id FROM #__menu WHERE link='index.php?option=$option' AND published=1";
	$database->setQuery( $query );
	$id = $database->loadResult();

	return $id;
}

/**
 * Calls external page and returns given information.
 *
 * @param string Type of information to retrieve.
 */
function getExternalInfoJx( $type ) {
	global $comcfg, $option;

	$type = urlencode( $type );
	$str = @file_get_contents( JXSITE . "/index2.php?option=com_getinfo&type=$type&component=$option&version={$comcfg['version']}" );

	return $str;
}

/**
 * Returns the language string for the given month.
 *
 * @param int Month number.
 * @return string Name of the month based on current Joomla language.
 */
function getMonthJx( $month ) {
	$month = intval( $month );
	switch( $month ) {
		case 1: $m = _JAN; break;
		case 2: $m = _FEB; break;
		case 3: $m = _MAR; break;
		case 4: $m = _APR; break;
		case 5: $m = _MAY; break;
		case 6: $m = _JUN; break;
		case 7: $m = _JUL; break;
		case 8: $m = _AUG; break;
		case 9: $m = _SEP; break;
		case 10: $m = _OCT; break;
		case 11: $m = _NOV; break;
		case 12: $m = _DEC; break;
		default: $m = ""; break;
	}
	return $m;
}

/**
 * Return a list of the available Jambook template sets.
 *
 * @return array An array of strings with the names of the available template sets.
 */
function getTemplateSetsJx() {
	global $mainframe;
	$templates = array();
	if ( $handle = opendir( $mainframe->getCfg( 'absolute_path' ) . "/components/com_jambook/templates" ) ) {
		while ( false !== ( $file = readdir( $handle ) ) ) {
			if ( $file != "." && $file != ".." && $file != "index.html" ) {
				if ( is_dir( $mainframe->getCfg( 'absolute_path' ) . "/components/com_jambook/templates/$file" ) ) {
					$templates[] = $file;
				}
			}
		}
	}
	return $templates;
}

/**
 * Return an array containing an email and a name, either of the admin email and name
 * set in the configuration or if those don't exit, from the first superadministrator user.
 *
 * @return array Admin email and name.
 */
function getAdminInfoJx() {
	global $database, $mainframe, $my, $acl, $comcfg;

	if ( trim( $comcfg['mailfromaddress'] ) || trim( $comcfg['mailfromname'] ) ) {
		$adminName = $comcfg['mailfromname'];
		$adminEmail = $comcfg['mailfromaddress'];
	} else if ( $mainframe->getCfg( 'mailfrom' ) != "" 
				&& $mainframe->getCfg( 'fromname' ) != "" ) {
		$adminName = $mainframe->getCfg( 'fromname' );
		$adminEmail = $mainframe->getCfg( 'mailfrom' );
	} else {
		$database->setQuery( "SELECT name, email FROM #__users"
		."\n WHERE usertype='superadministrator'" );
		$rows = $database->loadObjectList();
		$row2 = $rows[0];
		$adminName = $row2->name;
		$adminEmail = $row2->email;
	}
	return array( $adminEmail, $adminName );
}

/**
 * Return an ORDER BY value based on the given string
 *
 * @param string What kind of order by statement to use
 * @return string A string to be used in an order by query.
 */
function getOrderingJx( $sort ) {
	switch ( $sort ) {
		case "titledesc": $ordering = "title DESC"; break;
		case "titleasc": $ordering = "title ASC"; break;
		case "orderingdesc": $ordering = "ordering DESC"; break;
		case "orderingasc": $ordering = "ordering ASC"; break;
		case "iddesc": $ordering = "id DESC"; break;
		case "idasc": $ordering = "id ASC"; break;
		case "createddesc": $ordering = "created DESC"; break;
		case "createdasc": $ordering = "created ASC"; break;
		default: $ordering = "id DESC";
	}
	return $ordering;
}

/**
 * Return an ordering string based on the input.
 * 
 * If $type matches first part of $sort, then $sort is returned with
 * the asc or desc part changed to desc or asc, respectively.
 * Otherwise the type is returned with the same asc or desc as in $sort
 * This is used to find out what to print for each sort link in lists.
 *
 * @param string Field name currently sorted on.
 * @param string A string contained of a type with either asc or desc appended.
 * @return string A string with switched asc/desc if type matches.
 */
function getSortArgJx( $type, $sort ) {
	$mat = array();
	if ( preg_match( "/(\w+)(asc|desc)/i", $sort, $mat ) ) {
		if ( $type == $mat[1] ) {
			return ( $mat[2] == "asc" ) ? "{$type}desc" : "{$type}asc";
		} else {
			return $type . $mat[2];
		}
	}
	return "iddesc";
}

/**
 * Check if the owner is allowed to edit this comment.
 *
 * @param string A string with a date to check against useredithours.
 * @return boolean True if date is not older than useredithours hours.
 */
function allowEditItem( $created ) {
	global $comcfg;

	$usereditseconds = intval( $comcfg['useredithours'] ) * 60 * 60;
	$createdtime = strtotime( $created );
	$now = time();
	if ( $createdtime < ( $now - $usereditseconds ) ) {
		return false;
	}
	return true;
}


/**
 * Returns 1 if string only contains smileys and whitespace, 0 otherwise.
 *
 * @param string The string to check if it only contains smileys.
 * @param array Array of strings with extra smileys to check for.
 * @return int Returns 1 if string only contains smileys and whitespace, otherwise 0.
 */
function checkSmileys( $string, $extrasmileys=array() ) {
	$smileys = array();
	$smileys = array_merge( $smileys, $extrasmileys );
	$sc = count( $smileys );
	$oldstring = $string;
	for ( $i = 0; $i < $sc; $i++ ) {
		$string = str_replace( $smileys[$i], "", $string );
	}
	if ( ( $string != $oldstring ) && trim( $string ) == "" ) {
		return 1;
	}
	return 0;
}

/**
 * Checks if an email address seems to be valid.
 *
 * Taken from the PHP manual comment by 
 * I_Hate_Bogus_Email_Addresses made on the eregi function.
 *
 * @param string $email The email to check for validity.
 * @return boolean Returns true if the email seems to be valid.
 * @access public
 * @author I_Hate_Bogus_Email_Addresses @ PHP.net manual
 */
function checkEmailJx( $email ) {
  if (
      strlen( $email ) > 60
      or !preg_match( "/[!@]/", $email )
      or preg_match( "/\s/m", $email )
      or preg_match( "/^[^A-Za-z0-9]/m", $email )
      or preg_match( "/[^A-Za-z0-9]\@/m", $email )
      or preg_match( "/\@[^A-Za-z0-9]/m", $email )
      or preg_match( "/.*[^A-Za-z0-9]\./m", $email )
      or !preg_match( "/.*\.[A-Za-z]{2,4}$/m", $email )
      or preg_match( "/www/m", $email )
      or preg_match( "/^[(\d|\D)]\@[(\d|\D)]\.[A-Za-z]{2,4}$/m", $email )
      or preg_match( "/^.*[~!@#%\^&*()[\]{}\|;:\"'<,>?\/].*\@/m", $email )
      or preg_match( "/^.*\@.*[~!@#%\^&*()_[\]{}\|;:\"'<,>?\/].*\./m", $email )
      ) {
    return false;
  } else {
    return true;
  }
}

/**
 * Return an array containing all values from request
 * starting with "attribs_", with the "attribs_" part removed.
 *
 * @return array An associative array of attrib values.
 */
function getItemAttribs() {
	$attribs = array();
	foreach ( $_REQUEST as $k => $v) {
		if ( substr( $k, 0, 7 ) == "attrib_" ) {
			$key = substr( $k, 7 );
			if ( !isset( $attribs[$key] ) ) {
				$attribs[$key] = mosHTML::cleanText( trim( $v ) );
			}
		}
	}
	return $attribs;
}



/* Action functions which handles data in some way */
/* ----------------------------------------------- */

/**
 * Removes HTML from selected variables in an object.
 *
 * @param object The object to remove html from.
 * @param string A space separated list of variable names to remove html from.
 */
function removeHtmlJx( &$row, $fields ) {
	$ffields = explodeTrimJx( $fields, " " );
	if ( count( $ffields ) ) {
		foreach ( $ffields as $f ) {
			if ( isset( $row->$f ) ) {
				$row->$f = mosHTML::cleantext( $row->$f );
			}
		}
	}
}

/**
 * Nuke some tags and their contents.
 *
 * @param string String to nuke possibly malicious tags from.
 */
function nukeContentsJx( $str ) {
    $disallowed = array( "script", "head", "title", "style", "applet", "object", "embed", "link", "meta", "iframe" );
    foreach ( $disallowed as $tag ) {
        $str = preg_replace( "'<\s*?{$tag}[^>]*?>(.*?<\s*?/\s*?{$tag}[^>]*?>)?'si", "", $str );
    }
    return $str;
}

/**
 * Strip unwanted tags.
 *
 * If HTML stripping is turned off in component settings, nothing is done.
 *
 * @param string The string to remove html from.
 */
function safeHtmlJx( $str ) {
	global $comcfg;

	// If running Joomla 1.5, we'll start with an internal stripping function.	
	if (defined('_JEXEC')) {
		$filter = & JFilterInput::getInstance();
		return $filter->clean($str, 'STRING');
	}

	// Always nuke some tags
	$str = nukeContentsJx( $str );
	$str = preg_replace( '/<!--.+?-->/', '', $str );

	// Only strip HTML if it's activated in the settings.
	if ( $comcfg['striphtml'] == 'uselist' ) {
		// Listed of tags that will not be stripped but whose attributes will be.
		$allowed = implode( '|', explodeTrimJx( $comcfg['allowedhtml'], "," ) );

		// Start removing unwanted tags and attributes to wanted tags.
		$str = preg_replace("/<((?!\/?($allowed)\b)[^>]*>)/xis", "", $str);
		$str = preg_replace("/<(($allowed)[^>]*?)>/xis", "<\\1>", $str);
		$str = str_replace("<br>", "<br />", $str);
		$str = str_replace("<hr>", "<hr />", $str);
	} else if ( $comcfg['striphtml'] == 'removeall' ) {
		$str = mosHTML::cleanText( $str );
	}
    
    return $str;
}


/**
 * Adds some extra values to an entry, used for viewing.
 * 
 * @param object A mosJambook object to add values to.
 */
function addExtraValues( &$row ) {
	global $comcfg, $database, $my;

	$row->_created_formatted = FormatDateJx( $row->created, $comcfg['dateformat'] );

	// Create a short content
	if ( strlen( $row->content ) > JXCONTENTSHORTLEN ) {
		$row->_content_short = substr( safeStrip( $row->content ), 0, JXCONTENTSHORTLEN ) . "...";
	} else {
		$row->_content_short = $row->content;
	}

	// If username doesn't exist and there is a user id, try reading username and name from users table.
	if ( !isset( $row->author_username ) || !trim( $row->author_username ) ) {
		$userid = isset( $row->created_by ) ? $row->created_by : $my->id;
		$query = "
         SELECT u.name AS author_name, u.username AS author_username
         FROM #__users AS u
         WHERE u.id = '$userid'
        ";
		$database->setQuery( $query );
		list( $row->author_name, $row->author_username ) = $database->loadRow();
	}

	// Add author name
	if ( trim( $row->authoralias ) ) {
		$row->author = $row->authoralias;
	} else {
		$row->author = ($comcfg['showusername']) ? $row->author_username : $row->author_name;
	}
	if ( !trim( $row->author ) ) {
		$row->author = _JX_GUEST;
	}
	
	// Use email cloaking?
	$emailimg = "<img src='images/M_images/emailButton.png' border='0' alt='"._JX_EMAIL."' title='"._JX_EMAIL."' />";
	#$emailimg = '<img src="images/M_images/emailButton.png" border="0" alt="'._JX_EMAIL.'" title="'._JX_EMAIL.'" />';
	if ( ( intval( $comcfg['cloakemail'] ) > 0 ) && strstr( $row->email, "@" ) ) {
		$row->_email_link = emailCloakingJx( $row->email, 1, $emailimg, 2 );
	} else {
		$row->_email_link = "<a href='mailto:{$row->email}'>$emailimg</a>";
	}

	// Check if items has been created in the last $comcfg['newdays'] days.
	if ( $row->created ) {
		if ( strtotime( $row->created ) > ( time() - intval( $comcfg['newdays'] ) * 24 * 60 * 60 ) ) {
			$row->_newitem = "1";
		} else {
			$row->_newitem = "0";
		}
	} else {
		$row->_newitem = "1";
	}

	// Add all values in attrib field as separate values.
	if ( trim( $row->attribs ) ) {
		addArrayToObjectJx( $row, parseAttribsJx( $row->attribs ), 'attrib_' );
	}

	// Add a couple of specific extra attributes.
	$row->attrib_hideemail = isset( $row->attrib_hideemail ) ? $row->attrib_hideemail : 0;
	$row->attrib_hideurl = isset( $row->attrib_hideurl ) ? $row->attrib_hideurl : 0;

}

/**
 * Adds config values and all values from given row to $tmplvars
 *
 * @param array Array to add values to.
 * @param object Posting object to read values from.
 */
function addTmplVarsJx( &$tmplvars, $row ) {
	global $comcfg;

	$tmplvars = array_merge( $tmplvars, get_object_vars( $row ) );

	mergeArraysJx( $tmplvars, $comcfg, "config_" );

}

/**
 * Adds all elements in array as variables in the object.
 *
 * @param object The object to add array elements to.
 * @param array An array to read elements from.
 * @param string Optional prefix to prepend all element key names with.
 */
function addArrayToObjectJx( &$obj, $arr, $prefix='' ) {
	if ( count( $arr ) > 0 ) {
		foreach ( $arr as $k => $v ) {
			$kk = $prefix.$k;
			$obj->$kk = $v;
		}
	}
}

/**
 * Returns an array of all attributes in argument.
 *
 * @param string String containing attribute values.
 * @return array An array of all attributes in $attribs
 */ 
function parseAttribsJx( $attribs ) {
	if ( trim( $attribs ) ) {
		// Read all attributes from the item.
		$attribs = mosParseParams( $attribs );
		$attribs = get_object_vars( $attribs );
	} else {
		$attribs = array();
	}
	return $attribs;
}

/**
 * Returns a string with key=value lines based on given array.
 *
 * @param array The array to create an attrib field out of.
 * @return string The attrib field created from the given array.
 */
function createAttribField( $arr ) {
	$attribs = "";
	if ( count( $arr ) > 0 ) {
		foreach ( $arr as $k => $v ) {
			$attribs .= "$k=$v\n";
		}
	}
	return $attribs;
}

/**
 * Delete items older than config option deleteafterday if non-zero.
 */
function checkItemPruning() {
	global $comcfg, $database;

	// delete all postings older than x days (x from config)
	// paz, 20050719
	$prefix = "";
	$deleteafterdays = intval( $comcfg['deleteafterdays'] );
	if ( $deleteafterdays > 0) {
		$database->setQuery( "SELECT id FROM #__jx_jambook
                   \n WHERE created <= DATE_SUB( CURDATE(), INTERVAL $deleteafterdays DAY)"
			);
			
		$database->query();
		$delRows = $database->loadResultArray();

		if ( count( $delRows ) > 0 ) {
			$database->setQuery( "DELETE FROM #__jx_jambook
                           \n WHERE id in (" . implode( ", ", $delRows ) . ")" );
			if ($database->query()) {
				$prefix = sprintf( _JX_A_DELETEDITEMS, count( $delRows ) );
			} else {
				$prefix = _JX_A_ERRORDELETEITEMS;
			}
		}
	}
	return $prefix;	
}

/**
 * Send an email using the mosMail function if it exists otherwise uses the PHP mail function.
 *
 * @param string email Email adress
 * @param string subject Subject of the email
 * @param string message The message body of the email
 * @param string fromname Name of the sender of the email
 * @param string fromemail Email address of the sender
 * @param string replyto Email address in Reply-To header
 * @return boolean Returns true if mail was sent, false if not.
 */
function sendEmailJx( $email, $subject, $message, $fromname='', $fromemail='', $replyto='') {
	if ( defined( '_JEXEC' ) ) {
		JUTility::sendMail($fromemail, $fromname, $email, $subject, $message);
	} else if ( function_exists( "mosMail" ) ) {
		$ret = mosMail($fromemail, $fromname, $email, $subject, $message);
	} else {
		$headers = "";
		if ( trim( $fromemail ) ) {
			$headers = "From: $fromname <$fromemail>\r\n";
		}
		if ( trim( $replyto ) ) {
			$headers .= "Reply-To: <$replyto>\r\n";
		}
		$headers .= "X-Priority: 3\r\n";
		$headers .= "X-MSMail-Priority: Low\r\n";
		$headers .= "X-Mailer: Mambo Open Source 4.5\r\n";
		$ret = @mail($email, $subject, $message, $headers);
	}
	return $ret;
}

/**
 * Create a string to use in To: of emails.
 *
 * @param string Email to send to.
 * @param string Name of receiver.
 * @return string A mailto string in format: Name <Email>
 */
function createMailtoJx( $email, $name='' ) {
	return trim( $name ) ? "$name <$email>" : $email;
}

/**
 * Cleanup a string and replace any odd characters with a similar equivalent.
 * 
 * @param string String to cleanup.
 * @return string A cleaned-up version of the string
 */
function cleanStringJx( $string ) {
	// First we'll replace some characters with accents with their alphabetical counterparts.
	strtr($string, "\x{0160}\x{0152}\x{017D}\x{0161}\x{0153}\x{017E}\x{0178}¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ", "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");
	// Now we'll remove any unwanted characters that are left.
	$set = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_";
	$first = strtr( $string, $set,
                    str_repeat("#", strlen($set)) );
	$second = strtr( $string, $first,
					 str_repeat("_", strlen($first)) );
	return $second;
}

/**
 * Wrapper for mosFormatDate so that it works with an empty format string as well.
 *
 * @param string Date to format
 * @param format How to format the date, uses on strftime() syntax, leave empty to use default language file date format
 * @return string Formatted date string.
 */
function formatDateJx( $date, $format=_DATE_FORMAT_LC ) {
	global $comcfg;
	if ( trim( $format ) ) {
		return mosFormatDate( $date, $format );
	}
	if ( trim( $comcfg['dateformat'] ) ) {
		return mosFormatDate( $date, $comcfg['dateformat'] );
	}
	return mosFormatDate( $date );
}

/**
 * Convert html entities to their corresponding characters.
 * Only needed in PHP < 4.3.0.
 * Taken from a comment in the PHP manual.
 */
function decodeEntities ($string, $opt = ENT_COMPAT) {
	if (phpversion() >= "4.3.0") {
		$string = html_entity_decode ($string, $opt);
		return $string;
	} else {

		$trans_tbl = get_html_translation_table (HTML_ENTITIES);
		$trans_tbl = array_flip ($trans_tbl);
		
		if ($opt & 1) { // Translating single quotes

			// Add single quote to translation table;
			// doesn't appear to be there by default
			$trans_tbl["&apos;"] = "'";
		}
		
		if (!($opt & 2)) { // Not translating double quotes
			
			// Remove double quote from translation table
			unset($trans_tbl["&quot;"]);
		}

		return strtr ($string, $trans_tbl);
	}
}
// Just to be safe ;o)
if (!defined("ENT_COMPAT")) define("ENT_COMPAT", 2);
if (!defined("ENT_NOQUOTES")) define("ENT_NOQUOTES", 0);
if (!defined("ENT_QUOTES")) define("ENT_QUOTES", 3);

/**
 * Strips tags without removing possible white space between words.
 *
 * @param string String to strip tags from.
 * @return string A string stripped of all html.
 */
function safeStrip( $text ) {
	#$text = strip_tags( $text );
	$text = preg_replace( '/</', ' <', $text);
	$text = preg_replace( '/>/', '> ', $text);
	$desc = decodeEntities( strip_tags( $text ) );
	#$desc = preg_replace( '/[\n\r\t]/', ' ', $desc );
	$desc = preg_replace( '/  /', ' ', $desc );

	return $desc;
}

/**
 * Split a string by $split and trim each element.
 *
 * @param string A string to split into an array.
 * @param string What to split on, JXSPLITCHAR is used if argument is missing.
 * @return array An array consisting of all elements in $string when split on $split.
 */
function explodeTrimJx( $string, $split=JXSPLITCHAR ) {
	$arr = explode( $split, $string );
	$count = count( $arr );
	for ( $i=0; $i < $count; $i++ ) {
		$arr[$i] = trim( $arr[$i] );
	}
	return $arr;
}

/**
 * Add all values in arr2 to arr1.
 * If prefix is given, all value key names are prefixed with this string.
 *
 * @param array Array to add values to
 * @param array Array to read values from
 * @param string Prefix to add to keys from arr2.
 */
function mergeArraysJx( &$arr1, &$arr2, $prefix="" ) {
	if ( is_array( $arr2 ) ) {
		foreach ( $arr2 as $k => $v ) {
			$arr1[$prefix.$k] = $v;
		}
	}
}

/**
 * simple Javascript Cloaking
 * email cloaking
 * This is the same as in Joomla, but adds the possibility to not convert
 * the link text ( set $email to 2 for this functionality ).
 * by default replaces an email with a mailto link with email cloacked
 * If $mailto is set, creates a link, otherwise just prints the email cloaked.
 * If $text and $email is set, all vowels are replaced with corresponding html entities,
 * the text is then split at the @ symbol, the second part is then split by
 * "." and the whole string is then written out with javascript, but
 * combining all parts with the html entities corresponding to the split characters.
 * If $text is set, but $email is set to 0/false, the text is converted by replacing
 * the vowels with html entities and used as link text.
 * If $mailto is set, but $text isn't, the link text is the same as the email.
 * If $text is set, and $email is set to 2, then no conversion is done on the link text.
 */
function emailCloakingJx( $mail, $mailto=1, $text='', $email=1 ) {
/*
	if (defined('_JEXEC')) {
		return JHTML::_( 'email.cloak', $mail, $mailto, $text, $email );
	} else {
		return mosHTML::emailCloaking($mail, $mailto, $text, $email);
	}
*/
	// convert text
	$mail 			= emailEncodingConverterJx( $mail );
	// split email by @ symbol
	$mail			= explode( '@', $mail );
	$mail_parts		= explode( '.', $mail[1] );
	// random number
	$rand			= rand( 1, 100000 );
	
	$replacement 	= "\n <script language='JavaScript' type='text/javascript'>";
	$replacement 	.= "\n <!--";
	$replacement 	.= "\n var prefix = '&#109;a' + 'i&#108;' + '&#116;o';";
	$replacement 	.= "\n var path = 'hr' + 'ef' + '=';";
	$replacement 	.= "\n var addy". $rand ." = '". @$mail[0] ."' + '&#64;';";
	$replacement 	.= "\n addy". $rand ." = addy". $rand ." + '". implode( "' + '&#46;' + '", $mail_parts ) ."';";
		
	if ( $mailto ) {
		// special handling when mail text is different from mail addy
		if ( $text ) {
			if ( $email == 2 ) {
				$text = addslashes( $text );
				$replacement .= "var addy_text". $rand ." = \"$text\"; \n";
			} else if ( $email ) {
				// convert text
				$text 			= emailEncodingConverterJx( $text );
				// split email by @ symbol
				$text 			= explode( '@', $text );
				$text_parts		= explode( '.', $text[1] );
				$replacement 	.= "\n var addy_text". $rand ." = '". @$text[0] ."' + '&#64;' + '". implode( "' + '&#46;' + '", @$text_parts ) ."';";
			} else {
				#$text 	= mosHTML::encoding_converter( $text );
				$replacement 	.= "var addy_text". $rand ." = '". $text ."';\n";
			}
			$replacement 	.= "\n document.write( '<a ' + path + '\"' + prefix + ':' + addy". $rand ." + '\">' );";
			$replacement 	.= "\n document.write( addy_text". $rand ." );";
			$replacement 	.= "\n document.write( '<\/a>' );";
		} else {
			$replacement 	.= "\n document.write( '<a ' + path + '\"' + prefix + ':' + addy". $rand ." + '\">' );";
			$replacement 	.= "\n document.write( addy". $rand ." );";
			$replacement 	.= "\n document.write( '<\/a>' );";
		}
	} else {
		$replacement 	.= "\n document.write( addy". $rand ." );";
	}
	$replacement 	 .= "\n //-->";
	$replacement 	 .= "\n </script>";
		
	// XHTML compliance `No Javascript` text handling
	$replacement 	 .= "<script language='JavaScript' type='text/javascript'>";
	$replacement 	 .= "\n <!--";
	$replacement 	 .= "\n document.write( '<span style=\"display: none;\">' );";
	$replacement 	 .= "\n //-->";
	$replacement 	 .= "\n </script>";
	if (defined('_JEXEC')) {
		$replacement .= JText::_('CLOAKING');
	} else {
		$replacement .= _CLOAKING;
	}
	$replacement 	 .= "\n <script language='JavaScript' type='text/javascript'>";
	$replacement 	 .= "\n <!--";
	$replacement 	 .= "\n document.write( '</' );";
	$replacement 	 .= "\n document.write( 'span>' );";
	$replacement 	 .= "\n //-->";
	$replacement 	 .= "\n </script>";

	return $replacement;
}

/**
 * Wrapper function for mosHTML::encoding_converter() in Joomla 1.0 and
 * JHTML::_('email._convertencoding') in Joomla 1.5
 */
function emailEncodingConverterJx($mail) {
	if (defined('_JEXEC')) {
		return JHTML::_('email._convertencoding', $mail);
	} else {
		return mosHTML::encoding_converter($mail);
	}
}

/* **** Mambo functions that might not exist in the backend for some reason. **** */

/**
* Mambo function to log searches.
*/
if ( !function_exists( "mosLogSearch" ) ) {
	function mosLogSearch( $search_term ) {
		global $database, $mainframe;
		
		if ( @$mainframe->getCfg( 'enable_log_searches' ) ) {
			$database->setQuery( "SELECT hits"
								 . "\nFROM #__core_log_searches"
								 . "\nWHERE LOWER(search_term)='$search_term'" );
			$hits = intval( $database->loadResult() );
			echo $database->getErrorMsg();
			if ($hits) {
				$database->setQuery( "UPDATE #__core_log_searches SET hits=(hits+1)"
									 . "\nWHERE LOWER(search_term)='$search_term'" );
				$database->query();
				echo $database->getErrorMsg();
			} else {
				$database->setQuery( "INSERT INTO #__core_log_searches VALUES"
									 . "\n('$search_term','1')" );
				$database->query();
				echo $database->getErrorMsg();
			}
		}
	}
}


/*  *********************************************************** */
/** FUNCTIONS TO MAKE SURE JOOMLA WYSIWYG EDITOR WORKS PROPERLY */

if ( !function_exists( "editorArea" ) ) {
	function editorArea( $name, $content, $hiddenField, $width, $height, $col, $row  ) {
		?>
	<textarea class="inputbox" name="<?php echo $hiddenField; ?>" id="<?php echo $hiddenField; ?>" cols="<?php echo $col; ?>" rows="<?php echo $row; ?>" style="width:<?php echo $width; ?>; height:<?php echo $height; ?>"><?php echo $content; ?></textarea>
        <?php
	}
}
if ( !function_exists( "initEditor" ) ) {
	function initEditor() {
	}
}
if ( !function_exists( "getEditorContents" ) ) {
	function getEditorContents( $editorArea, $hiddenField ) {
	}
}

function editorAreaJx( $name, $editorcontent, $hiddenField, $col, $row ) {
	global $comcfg;
	$editorwidth = intval( $comcfg['editorwidth'] );
	$editorheight = intval( $comcfg['editorheight'] );
	
	$content = "";

/*
	global $_MAMBOTS;
	$results = $_MAMBOTS->trigger( 'onEditorArea', array( $name, $content, $hiddenField, $editorwidth, $editorheight, $col, $row ), 0, "3" );
	$content = "";
	foreach ($results as $result) {
		if (trim($result)) {
			$content .= $result;
		}
	}
	return $content;
*/

	if ( strtolower( $comcfg['editor'] ) == '_jx_default' ) {
		if ( defined( '_JEXEC' ) ) {
			// Load the JEditor object
			$editor =& JFactory::getEditor();
			$content .= $editor->display($hiddenField, $editorcontent, $editorwidth, $editorheight, $col, $row);
		} else {
			ob_start();
			editorArea( $name, $editorcontent, $hiddenField, $editorwidth, $editorheight, $col, $row  );
			$content = ob_get_contents();
			ob_end_clean();
		}
	} else {
		$content = "<textarea class='inputbox' name='$hiddenField' id='$hiddenField' cols='$col' rows='$row' style='width: $editorwidth; height: $editorheight'>$editorcontent</textarea>";
	}
	return $content;
}

function getEditorContentsJx( $editorArea, $hiddenField ) {
	global $comcfg;

/*
	global $_MAMBOTS;
	$results = $_MAMBOTS->trigger( 'onGetEditorContents', array( $editorArea, $hiddenField ), 1, "3" );
	foreach ($results as $result) {
		if (trim($result)) {
			$content .= $result;
		}
	}
	return $content;
*/

	$content = "";
	if ( strtolower( $comcfg['editor'] ) == '_jx_default' ) {
		if ( defined( '_JEXEC' ) ) {
			// Load the JEditor object
			$editor =& JFactory::getEditor();
			$content = $editor->save($hiddenField);
		} else {
			ob_start();
			getEditorContents( $editorArea, $hiddenField );
			$content = ob_get_contents();
			ob_end_clean();
		}
	}
	return $content;
}

function initEditorJx() {
	global $mainframe, $_VERSION, $comcfg;

	if ( defined( '_JEXEC' ) ) {
		return "";
	}
	
/*
		global $_MAMBOTS;
		$_MAMBOTS->loadBot( 'editors', "tinymce", 1 );
		$_MAMBOTS->loadBotGroup( 'editors-xtd' );
*/

/*
	global $_MAMBOTS;
	$results = $_MAMBOTS->trigger( 'onInitEditor', array(), 1, "3" );
	foreach ($results as $result) {
		if (trim($result)) {
			$content .= $result;
		}
	}
	return $content;
*/

	// Make sure editor script is called.
	if ( !defined( '_JEXEC' ) && !defined( '_MOS_EDITOR_INCLUDED' ) ) {
		include( $mainframe->getCfg( 'absolute_path' ) . "/editor/editor.php" );
	}

	// Make sure that the editor will be loaded, needed for Joomla 1.0.3
	if ( $_VERSION->PRODUCT == "Joomla!" && 
		 ( ( $_VERSION->RELEASE == "1.0" && $_VERSION->DEV_LEVEL >= "3" )
		   || $_VERSION->RELEASE > "1.0" ) ) {
		$mainframe->set( 'loadEditor', true );
	}

	// Only initialize editor if editor config option is set to default Joomla editor.
	$content = "";
	if ( strtolower( $comcfg['editor'] ) == '_jx_default' ) {
		ob_start();
		initEditor();
		$content = ob_get_contents();
		ob_end_clean();
	}
	return $content;
}

