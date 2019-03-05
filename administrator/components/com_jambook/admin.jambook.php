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

global $option, $Itemid, $cfgfile, $comcfg;

//Get right Language file
if ( file_exists( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/language/" . $mainframe->getCfg( 'lang' ) . '.php' ) ) {
	include_once( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/language/" . $mainframe->getCfg( 'lang' ) . '.php' );
} else {
	include_once( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/language/english.php" );
}

// Read a file containing the jxTemplate class
require_once( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/jxtemplate.php" );

// Read html classes
require_once( $mainframe->getPath( 'front_html' ) );
require_once( $mainframe->getPath( 'admin_html' ) );

// Read database class information
require_once( $mainframe->getPath( 'class' ) );

// Read a file with common functions
require_once( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/jambook.common.php" );

$cfgfile = $mainframe->getCfg( 'absolute_path' ) . "/components/$option/configuration.php";
include_once( $cfgfile );

// Create a html object
$jxadmin = new HTML_jambook_admin();

// Read parameter values.
$nohtml = mosGetParam( $_REQUEST, 'nohtml', '0' );
$pid = mosGetParam( $_REQUEST, 'pid', '0' );

// Titles and files for the information page.
$pages = array();
$pages[1]['title'] = "Readme";
$pages[1]['file'] = "readme.html";
$pages[2]['title'] = "TODO";
$pages[2]['file'] = "TODO.txt";
$pages[3]['title'] = "Changes";
$pages[3]['file'] = "CHANGES.txt";
$pages[4]['title'] = "License";
$pages[4]['file'] = "gnu_gpl.txt";

// Define which admin page to show.
switch ($task) {
	case "conf":
		showConfig();
		break;
	case "saveconf":
		saveConfig();
		break;
	case "list":
		listItems();
		break;
	case "new":
		editItem( 0 );
		break;
	case "edit":
		editItem( $pid[0] );
		break;
	case "save":
		saveItem();
		break;
	case "cancel":
		cancelItem();
		break;
	case "remove":
		removeItem( $pid );
		break;
	case "publish":
		changeItem( $pid, 1, $nohtml );
		break;
	case "unpublish":
		changeItem( $pid, 0, $nohtml );
		break;
	case "orderup":
		orderItem( $pid[0], -1 );
		break;
	case "orderdown":
		orderItem( $pid[0], 1 );
		break;
	case "edittemplate":
		editTemplate( $pid[0] );
		break;
	case "savetemplate":
		saveTemplate();
		break;
	case "canceltemplate":
		cancelTemplate();
		break;
	case "listtemplates":
		listTemplates();
		break;
	case "info":
		showPages( $pages );
		break;
	case "import":
		importSelection();
		break;
	case "importentries":
		importEntries();
		break;
	case "deinstall":
		deinstallAsk();
		break;
	case "deletedbtables":
		deleteDBTables();
		break;
	case "preview":
		previewItem();
		break;
	default:
		showIntroPage();
}

// Include a standard footer.
if ($task != 'preview') {
	include_once( $mainframe->getCfg( 'absolute_path' ) . "/administrator/components/$option/footer.php" );
}

/**
 * Show a preview an item.
 */
function previewItem() {
	global $database;

	if ( defined( '_JEXEC' ) ) {
		// Get the current default template
		$query = "SELECT template" .
				"\n FROM #__templates_menu" .
				"\n WHERE client_id = 0" .
				"\n AND menuid = 0";
		$database->setQuery($query);
		$template = $database->loadResult();

		$document =& JFactory::getDocument();
		$editor   =& JFactory::getEditor();

		// Set page title
		$document->setTitle( _JX_A_PREVIEW );
		$document->addStyleSheet('../templates/'.$template.'/css/editor.css');

	} else {
		// Read the current template for the preview
		if ( $_VERSION->PRODUCT == "Joomla!" || $_VERSION->RELEASE >= "4.5" ) {
			$sql = "SELECT template FROM #__templates_menu WHERE client_id='0' AND menuid='0'";
		} else {
			$sql = "SELECT cur_template FROM #__templates";
		}
		$database->setQuery( $sql );
		$cur_template = $database->loadResult();
		echo "<link rel='stylesheet' href='../../../templates/$cur_template/css/template_css.css' type='text/css'>";
	}

	HTML_jambook_admin::previewItem();
	
	if (!defined('_JEXEC')) {
		HTML_jambook_admin::previewItemFooter();
	}
}

/**
 * Ask whether the user really wants to deinstall the database tables.
 */
function deinstallAsk() {
}

/**
 * Delete the database table, used prior to a complete deinstallation.
 */
function deleteDBTables() {
}

/**
 * Show an intro page with links to all administration pages.
 */
function showIntroPage() {
	$latestversion = getExternalInfoJx( 'jambook-version' );

	HTML_jambook_admin::introPage( $latestversion );
}

/**
 * Shows a page for the user to select which source to import entries from.
 */
function importSelection() {
	// Create a list of available import sources
	$sources = array();
	$sources[] = mosHTML::makeOption( 'akobook', _JX_A_SOURCE_AKOBOOK );
	$sources[] = mosHTML::makeOption( 'easybook', _JX_A_SOURCE_EASYBOOK );

	// Configuration options
	$lists = array();

	$lists['sources'] = mosHTML::selectList( $sources, 'source', 'class="inputbox" size="1"', 'value', 'text', 'akobook' );

	HTML_jambook_admin::importSelection( $lists );
}

function importEntriesStaggered() {
	global $database, $comcfg;
	
	$mainframe = getApplicationJx();

	$source = mosGetParam( $_REQUEST ,'source', '' );
	$importer =& getImporterJx($source);
	
	$importer->init($database, $comcfg['import_published']);
	
	$count = 0;
	$content = "";
	$errorlist = "";
	while ($row =& $importer->getNextEntry()) {
		if ( $row->store() ) {
			$count++;
			$content .= "$row->created - $row->title - $row->authoralias<br />\n"; 
		} else {
			$errorlist .= "$row->created - $row->title - $row->authoralias<br />\n";
		}
	}

	$title = _JX_A_IMPORT_FINISHED;
	$content = str_replace( "<<NUMBER>>", $count, _JX_A_IMPORT_FINISHED_DESCR ) . ":<br /><br />" . $content;

	if ( trim( $errorlist ) ) {
		$content .= _JX_ERR_IMPORT_LIST . "<br /><br />" . $errorlist;
	}

	HTML_jambook_admin::showPage( $content, $title );
}

function getImporterJx($source) {
	$mainframe =& getApplicationJx();
	
	switch ( $source ) {
		case "easybook":
			require($mainframe->getCfg( 'absolute_path' ) . '/administrator/components/com_jambook/importers/jximporter_easybook.php');
			$importer = new jxImporterEasybook();
			break;
		case "akobook":
			require($mainframe->getCfg( 'absolute_path' ) . '/administrator/components/com_jambook/importers/jximporter_akobook.php');
			$importer = new jxImporterAkobook();
			break;
		default:
			showErrorJx( _JX_ERR_INVALID_SOURCE );
			exit;
	}
	return $importer;
}	

/**
 * Import guestbook entries from a selected import source.
 *
 * @param string Import from selected guestbook system
 */
function importEntries() {
	global $database, $comcfg;

	$content = "";
	$count = 0;
	$errorlist = "";
	
	$source = mosGetParam( $_REQUEST ,'source', '' );
	
	$rows = array();

	switch ( $source ) {
		case "easybook":
			importEasybook( $rows );
			break;
		case "akobook":
			importAkobook( $rows );
			break;
		default:
			showErrorJx( _JX_ERR_INVALID_SOURCE );
			exit;
	}

	// Insert the rows into the database.
	while ( list( $k, $row ) = each( $rows ) ) {
		if ( $row->store() ) {
			$count++;
			$content .= "$row->created - $row->title - $row->authoralias<br />\n"; 
		} else {
			$errorlist .= "$row->created - $row->title - $row->authoralias<br />\n";
		}
		#$row->checkin();
		#$row->updateOrder( "state >= 0" );
	}

	$title = _JX_A_IMPORT_FINISHED;
	$content = str_replace( "<<NUMBER>>", $count, _JX_A_IMPORT_FINISHED_DESCR ) . ":<br /><br />" . $content;

	if ( trim( $errorlist ) ) {
		$content .= _JX_ERR_IMPORT_LIST . "<br /><br />" . $errorlist;
	}

	HTML_jambook_admin::showPage( $content, $title );
}

/**
 * Import entries from EasyBook v1.1 and return an array of Jambook entry objects.
 *
 * @param array An empty array to be filled with imported entries.
 */
function importEasybook( &$entries ) {
	global $database, $comcfg;

	// Read the entries from AkoBook and create Jambook objects.
	$query = "
     SELECT gbid, gbip, gbname, gbmail, gbmailshow, gbloca, gbpage, gbvote, gbtext, 
            gbdate, gbcomment, gbedit, gbeditdate, published, gbicq, gbaim, gbmsn, gbyah, gbskype
     FROM   #__easybook
     ORDER BY gbid ASC
    ";
	$database->setQuery( $query );
	$items = $database->loadObjectList();
	$entries = array();
	while ( list( $k, $abrow ) = each( $items ) ) {
		$row = new mosJambook( $database );

		$row->title        = $abrow->gbname;
		$row->content      = removeBBCode( stripslashes( $abrow->gbtext ), 1 );
		$row->fromip       = $abrow->gbip;
		$row->email        = $abrow->gbmail;
		$row->authoralias  = $abrow->gbname;
		$row->url          = $abrow->gbpage;
		$row->created      = date( "Y-m-d H:i:s", $abrow->gbdate );
		$row->publish_up   = $row->created;
		$row->publish_down = "0000-00-00 00:00:00";
		$row->version      = 0;
		$row->ordering     = 9999;
		$row->state        = intval( $comcfg['import_published'] );
		$row->created_by   = 0;
		$row->modified_by  = 0;
		$row->checked_out  = 0;
		$row->checked_out_time = "0000-00-00 00:00:00";
		$row->spamscore    = $row->spamcheck();

		// Some values aren't available in Jambook (yet), these will be saved as extra attribs.
		$admincomment = str_replace( "\n", "<br />", removeBBCode( stripslashes( $abrow->gbcomment ), 1 ) );
		$attribs = "";
		$attribs .= "icq=" . $abrow->gbicq . "\n";
		$attribs .= "aim=" . $abrow->gbaim . "\n";
		$attribs .= "msn=" . $abrow->gbmsn . "\n";
		$attribs .= "yahoo=" . $abrow->gbyah . "\n";
		$attribs .= "skype=" . $abrow->gbskype . "\n";
		$attribs .= "hometown=" . $abrow->gbloca . "\n";
		$attribs .= "admincomment=" . $admincomment . "\n";
		$attribs .= "vote=" . $abrow->gbvote . "\n";

		$hideemail = ( $abrow->gbmailshow == 1 ) ? 0 : 1;
		$attribs .= "hideemail=" . $hideemail . "\n";

		$row->attribs = $attribs;

		$entries[] = $row;
	}

}

/**
 * Import entries from AkoBook and return an array of Jambook entry objects.
 *
 * @param array An empty array to be filled with imported entries.
 */
function importAkobook( &$entries ) {
	global $database, $comcfg;

	// Read the entries from AkoBook and create Jambook objects.
	$query = "
     SELECT gbid, gbip, gbname, gbmail, gbloca, gbpage, gbvote, gbtext, 
            gbdate, gbcomment, gbedit, gbeditdate, published, gbicq, gbaim, gbmsn
     FROM   #__akobook
     ORDER BY gbid ASC
    ";
	$database->setQuery( $query );
	$items = $database->loadObjectList();
	$entries = array();
	while ( list( $k, $abrow ) = each( $items ) ) {
		$row = new mosJambook( $database );

		$row->title        = $abrow->gbname;
		$row->content      = removeBBCode( stripslashes( $abrow->gbtext ), 1 );
		$row->fromip       = $abrow->gbip;
		$row->email        = $abrow->gbmail;
		$row->authoralias  = $abrow->gbname;
		$row->url          = $abrow->gbpage;
		$row->created      = date( "Y-m-d H:i:s", $abrow->gbdate );
		$row->publish_up   = $row->created;
		$row->publish_down = "0000-00-00 00:00:00";
		$row->version      = 0;
		$row->ordering     = 9999;
		$row->state        = intval( $comcfg['import_published'] );
		$row->created_by   = 0;
		$row->modified_by  = 0;
		$row->checked_out  = 0;
		$row->checked_out_time = "0000-00-00 00:00:00";
		$row->spamscore    = $row->spamcheck();

		// Some values aren't available in Jambook (yet), these will be saved as extra attribs.
		$admincomment = str_replace( "\n", "<br />", removeBBCode( stripslashes( $abrow->gbcomment ), 1 ) );
		$attribs = "";
		$attribs .= "icq=" . $abrow->gbicq . "\n";
		$attribs .= "aim=" . $abrow->gbaim . "\n";
		$attribs .= "msn=" . $abrow->gbmsn . "\n";
		$attribs .= "hometown=" . $abrow->gbloca . "\n";
		$attribs .= "admincomment=" . $admincomment . "\n";
		$attribs .= "vote=" . $abrow->gbvote . "\n";

		$row->attribs = $attribs;

		$entries[] = $row;
	}

}

/**
 * Converts common bbcodes in given string into the html equivavelent.
 *
 * @param string A string with bbcodes to be removed.
 */
function removeBBCode( $str, $cfgcheck=0 ) {
	global $comcfg;

	// Check if we should remove bbcode or return the string as it is.
	if ( $cfgcheck != 0 && intval( $comcfg['import_removebbcode'] ) == 0 ) {
		return $str;
	}

	// Convert code bbcode and strip html from all text inside.
	$count = preg_match_all( "#\[code\](.*?)\[/code\]#si", $str, $matches );
	for ( $i = 0; $i < $count; $i++ ) {
        $code_raw = preg_quote( $matches[1][$i] );
        $code_enc = htmlspecialchars( $matches[1][$i] );
        $str = preg_replace( "#\[code\]$code_raw\[/code\]#si",
							 "<div class='bbcode'><b>Code:</b><hr />$code_enc<hr /></div>", 
							 $str );
	}

	// Convert simple bbcode into html
	$str = eregi_replace( "\[b\]",  "<b>",  $str );
	$str = eregi_replace( "\[/b\]", "</b>", $str );
	$str = eregi_replace( "\[i\]",  "<i>",  $str );
	$str = eregi_replace( "\[/i\]", "</i>", $str );
	$str = eregi_replace( "\[u\]",  "<u>",  $str );
	$str = eregi_replace( "\[/u\]", "</u>", $str );

	// Convert advanced bbcodes into html
	$str = preg_replace( "#\[url\]((http|https|ftp)://)([^\"']*?)\[/url\]#si", "<a href='\\1\\3' target='_blank'>\\3</a>", $str );
	$str = preg_replace( "#\[url\]([^\"']*?)\[/url\]#si", "<a href='http://\\1' target='_blank'>\\1</a>", $str );
	$str = preg_replace( "#\[url=((http|https|ftp)://)([^\"']*?)\](.*?)\[/url\]#si", "<a href='\\1\\3' target='_blank'>\\4</a>", $str );
	$str = preg_replace( "#\[url=([^\"']*?)\](.*?)\[/url\]#si", "<a href='http://\\1' target='_blank'>\\2</a>", $str );
	$str = preg_replace( "#\[email\]([^'\"]*?)\[/email\]#si", "<a href='mailto:\\1'>\\1</a>", $str );
	$str = preg_replace( "#\[email=([^'\"]*?)\](.*?)\[/email\]#si", "<a href='mailto:\\1'>\\2</a>", $str );
	$str = preg_replace( "#\[(img|image)\]([^'\"]*?)\[/(img|image)\]#i", "<img src='\\2' border='0' alt='\\2' title='\\2' />", $str );
	$str = preg_replace( "#\[(q|quote)\](.*?)\[/(q|quote)\]#si", "<div class='bbquote'><b>Quote:</b><hr /><blockquote>\\2</blockquote><hr /></div>", $str );
	$str = preg_replace( "#\[(q|quote)=([^<>\[\]]*?)\](.*?)\[/(q|quote)\]#si", "<div class='bbquote'><b>Quote by \\2:</b><hr /><blockquote>\\3</blockquote><hr /></div>", $str );
	$str = preg_replace( "#\[color=(\#[\dABCDEF]{6}|[a-zA-Z]+?)\](.*?)\[/color\]#si", "<font color='\\1'>\\2<!-- color --></font>", $str );

	// Convert lists
	$count = preg_match_all( "#\[list(=([a1]))?\](.*?)\[/list\]#si", $str, $matches );
	for ( $i = 0; $i < $count; $i++ ) {
        $list_raw = preg_quote( $matches[3][$i] );
        $list_conv = preg_replace( "#\[\*\]#si", "<li>", $matches[3][$i] );
		if ( trim( $matches[2][$i] ) ) {
			$str = preg_replace( "#\[list=([a1])\]$list_raw\[/list\]#si",
								 "<ul type='\\1'>$list_conv</ul>",
								 $str );
		} else {
			$str = preg_replace( "#\[list\]$list_raw\[/list\]#si",
								 "<ul>$list_conv</ul>",
								 $str );
		}
	}
	

    // Shorten long url titles

	// Get maximum length of URL titles and calc shortened length
	$maxurllen = intval( $comcfg['import_longurl'] );
	$urlpostlen = intval( $maxurllen / 3 );
	$urlprelen = intval( $maxurllen - $urlpostlen );

	if ( $maxurllen > 0 ) {
		$matches = array();
		preg_match_all( "#<a href=(\"|')([^\"'>]+?)(\"|')>([^<]*?)</a>#si", $str, $matches, PREG_SET_ORDER );
		$count = count( $matches );
		if ( $count ) {
			for ( $i = 0; $i < $count; $i++ ) {
				$shorturl = $matches[$i][2];
				// Only shorten link titles starting with known protocols.
				if ( ( preg_match( "#^(http|https|ftp)://#si", $shorturl ) ) 
					 && ( strlen( $shorturl ) > $maxurllen ) ) {
					$shortenedurl = substr( $shorturl, 0, $urlprelen ) . "..." 
						. substr( $shorturl, (0-$urlpostlen) );
					$shorturl = preg_quote( $shorturl, "#" );
					$str = preg_replace( "#>$shorturl</a>#si", ">$shortenedurl</a>", $str, 1 );
				}
			}
		}
	}

	// Convert linebreaks into br tag
	$str = preg_replace( "/\n|\r|\r\n/", "<br />\n", $str );

	return $str;
}

/**
 * List guestbook entries.
 *
 * @param int Set to 1 to only show entries with a state of 1 (published)
 */
function listItems( $listbystate = 0 ) {
	global $database, $option, $cfgfile, $comcfg, $mainframe;

	// Remove items if they are too old.
	$prefix = checkItemPruning();

	$category = null;
	$search = "";

	$limit = $mainframe->getUserStateFromRequest( "view{$option}limit", 'limit', $comcfg['item_limit'] );
	$limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart",
													   'limitstart', 0 );
	$levellimit = $mainframe->getUserStateFromRequest( "view{$option}limit",
													   'levellimit', 10 );

	$where = array();
	if ( $listbystate == "1" ) {
		$where[] = "c.state = 1";
	} else {
		$where[] = "c.state >= 0";
	}
	if ($category) {
		$where[] = "catid='$category->id'";
	}
	if ($search) {
		$where[] = "LOWER(title) LIKE '%$search%'";
	}

	$database->setQuery( "SELECT COUNT(*) FROM #__jx_jambook AS c"
						 . (count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : "")
		);
	$total = $database->loadResult();

	require_once( $mainframe->getCfg( 'absolute_path' ) . "/administrator/includes/pageNavigation.php" );
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

/*
	switch ( $comcfg['adminlistorder'] ) {
		case "pricedesc": $ordering = "c.price DESC"; break;
		case "priceasc": $ordering = "c.price ASC"; break;
		case "orderingdesc": $ordering = "c.ordering DESC"; break;
		case "orderingasc": $ordering = "c.ordering ASC"; break;
		case "addressdesc": $ordering = "c.address DESC"; break;
		case "addressasc": $ordering = "c.address ASC"; break;
		case "createddesc": $ordering = "c.created DESC"; break;
		case "createdasc": $ordering = "c.created ASC"; break;
		default: $ordering = "c.id DESC";
	}
*/

#	$ordering = "c.created DESC";
	$ordering = getOrderingJx( $comcfg['sort_order'] );
	
	if ($limit) {
		$limitquery = "\nLIMIT $limitstart, $limit";
	} else {
		$limitquery = '';
	}

	// Read items from db.
	$database->setQuery( "SELECT c.*, u.name AS editor"
						 . "\nFROM #__jx_jambook AS c"
						 . "\nLEFT JOIN #__users AS u ON u.id = c.checked_out"
						 // . "\nWHERE c.catid='$category->id' AND c.access<='$gid' $xwhere "
						 . (count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : "")
						 . "\nORDER BY $ordering"
						 . $limitquery
		);
	$items = $database->loadObjectList();
	if ( $database->getErrorNum() ) {
		echo $database->getQuery();
		echo $database->stderr();
		return false;
	}

	HTML_jambook_admin::listItems( $items, $pageNav, $prefix );

}

/**
 * Edit an item, if no id is given, a new item will be created.
 * @param int id ID of the item to edit.
 */
function editItem( $pid ) {
	global $database, $mosConfig_absolute_path, $option, $comcfg, $mainframe;
	global $my, $_VERSION;

	$row = new mosJambook( $database );
	// load the row from the db table
	$row->load( $pid );

	// fail if checked out not by 'me'
	if ( $row->checked_out && $row->checked_out <> $my->id ) {
		mosRedirect( "index2.php?option=content",
					 _JX_ERR_CHECKED_OUT1 . " $row->title " . _JX_ERR_CHECKED_OUT2 );
	}

	// Read the current template for the preview
	if ( $_VERSION->PRODUCT == "Joomla!" || $_VERSION->RELEASE >= "4.5" ) {
		$sql = "SELECT template FROM #__templates_menu WHERE client_id='0' AND menuid='0'";
	} else {
		$sql = "SELECT cur_template FROM #__templates";
	}
	$database->setQuery( $sql );
	$cur_template = $database->loadResult();

	if ( $pid ) {
		$row->checkout( $my->id );
		if (trim( $row->publish_down ) == "0000-00-00 00:00:00") {
			$row->publish_down = "Never";
		}
	} else {
		$row->version = 0;
		$row->ordering = 9999;
		if ( $comcfg['autoapprove'] ) {
			$row->state = 1;
		} else {
			$row->state = 0;
		}
		$row->publish_up = date( "Y-m-d", time() );
		$row->publish_down = "Never";
		$row->fromip = mosGetParam( $_SERVER, 'REMOTE_ADDR', '' );
	}

	// Fix values in the object for viewing.
	mosMakeHtmlSafe( $row );
	addExtraValues( $row );

	// Set access restriction for item
	$access = array();
	$access[] = mosHTML::makeOption( '0', _JX_A_ACCESS_ALL );
	$access[] = mosHTML::makeOption( '1', _JX_A_ACCESS_REGISTERED );
	$access[] = mosHTML::makeOption( '2', _JX_A_ACCESS_USER );

	// Find out start and end year for the the expiration year drop-down
	$thisyear = date( "Y" );
	$lastyear = $thisyear + 10;

	// Add the html select options
	$lists = array();
	$lists['published'] = mosHTML::yesnoSelectList( 'state',  'class="inputbox" size="1"',
													$row->state );
	$lists['access'] = mosHTML::selectList( $access, 'access', 'class="inputbox" size="1"',
											'value', 'text', $row->access );
	$lists['hideemail'] = mosHTML::yesnoSelectList( 'attrib_hideemail',  'class="inputbox" size="1"',
													$row->attrib_hideemail );
	$lists['hideurl'] = mosHTML::yesnoSelectList( 'attrib_hideurl',  'class="inputbox" size="1"',
													$row->attrib_hideurl );

	HTML_jambook_admin::editItem( $row, $lists, $cur_template );
}

function saveItem() {
	global $database, $mosConfig_absolute_path, $option, $comcfg, $mainframe, $my;

	$row = new mosJambook( $database );
	if ( !$row->bind( $_POST ) ) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if ( $row->id ) {
		$row->modified = date( "Y-m-d H:i:s" );
		$row->modified_by = $my->id;

		// Load old data
		$dbrow = new mosJambook( $database );
		$dbrow->load( $row->id );
	} else {
		$row->created = date( "Y-m-d H:i:s" );
		$row->created_by = $my->id;

		// Save remote IP
		$row->fromip = mosGetParam( $_SERVER, 'REMOTE_ADDR', '' );
	}

	$row->ordering = 99999;

	if ( trim( $row->publish_down ) == "Never" ) {
		$row->publish_down = "0000-00-00 00:00:00";
	}

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

	if ( !$row->check() ) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->version++;
	if ( !$row->store() ) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	$row->updateOrder( "state >= 0" );

	mosRedirect( "index2.php?option=$option&task=list" );
}

/**
 * Cancels an edit operation and checks in the item
 */
function cancelItem() {
	global $database, $option;

	$row = new mosJambook( $database );
	$row->bind( $_POST );
	$row->checkin();

	mosRedirect( "index2.php?option=$option&task=list" );
}

/**
 * Removes the given items from the database
 * @param pid An array of ids to delete
 */
function removeItem( &$pid ) {
	global $database, $option, $mosConfig_absolute_path;

	if (count( $pid ) < 1) {
		echo "<script> alert('" . _JX_A_SELECTDELITEM . "'); window.history.go(-1);</script>\n";
		exit;
	}

	$pids = implode( ',', $pid );

	$database->setQuery( "DELETE FROM #__jx_jambook WHERE id IN ($pids)" );
	if ( !$database->query() ) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
	}

	mosRedirect( "index2.php?option=$option&task=list" );
}

/**
 * Changes the state of one or more items
 * @param integer A unique item id (passed from an edit form)
 * @param integer 0 if unpublishing, 1 if publishing
 */
function changeItem( $pid=null, $state=0, $nohtml=0 ) {
	global $database, $option, $my;

	if (count( $pid ) < 1) {
		$action = $state == 1 ? 'publish' : ($state == -1 ? 'archive' : 'unpublish');
		echo "<script> alert('" . _JX_A_SELECTITEM . " $action'); window.history.go(-1);</script>\n";
		exit;
	}

	$pids = implode( ',', $pid );

	$database->setQuery( "UPDATE #__jx_jambook SET state='$state'"
						 . "\nWHERE id IN ($pids) AND (checked_out=0 OR (checked_out='$my->id'))"
		);
	if ( !$database->query() ) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if ( count( $pid ) == 1 ) {
		$row = new mosJambook( $database );
		$row->checkin( $pid[0] );
	}

	if ( $nohtml ) {
		print ( $state == 1 ) ? 'publish_g' : 'publish_x';
		exit;
	} else {
		mosRedirect( "index2.php?option=$option&task=list" );
	}
}

/**
 * Moves the order of a record
 * @param integer The increment to reorder by
 * @param integer 1 to move up, -1 to move down.
 */
function orderItem( $uid, $inc ) {
	global $database, $option;

	$row = new mosJambook( $database );
	$row->load( $uid );
	$row->move( $inc, "state >= 0" );

	mosRedirect( "index2.php?option=$option&task=list" );
}


function listTemplates() {
	global $database, $mosConfig_absolute_path, $option, $comcfg, $mainframe;

	$tmpldir = $mainframe->getCfg( 'absolute_path' ) . "/components/com_jambook/templates/{$comcfg['template']}";
	// Find the available template files
	$templates = array();
	if ( $handle = opendir( $tmpldir ) ) {
		while ( false !== ( $file = readdir( $handle ) ) ) {
			if ( $file != "." && $file != ".." && substr( $file, -5 ) == ".tmpl" ) {
				if ( is_file( "$tmpldir/$file" ) ) {
					$templates[] = substr( $file, 0, -5 );
				}
			}
		}
	}

	HTML_jambook_admin::listTemplates( $templates );
}

function editTemplate( $template ) {
	global $database, $mosConfig_absolute_path, $option, $comcfg, $mainframe;

	$tmpldir = $mainframe->getCfg( 'absolute_path' ) . "/components/com_jambook/templates/{$comcfg['template']}";
	if ( file_exists( "$tmpldir/$template.tmpl" ) ) {
		$template_content = file_get_contents( "$tmpldir/$template.tmpl" );
		$template_content = htmlspecialchars( $template_content );
		
		HTML_jambook_admin::editTemplate( $template, $template_content, "$tmpldir/$template.tmpl" );
	} else {
		showErrorJx( _JX_ERR_READTEMPLATE . " $tmpldir/$template.tmpl" );
	}
}

function saveTemplate() {
	global $database, $mosConfig_absolute_path, $mosConfig_live_site, $option, $comcfg, $mainframe;

	$template = mosGetParam( $_POST, 'template', '' );
	$tmplcontent = mosGetParam( $_POST, 'content', '', _MOS_ALLOWHTML );
	$tmplcontent = stripslashes( $tmplcontent );

	$tmpldir = $mainframe->getCfg( 'absolute_path' ) . "/components/com_jambook/templates/{$comcfg['template']}";
	$tmplfile = "$tmpldir/$template.tmpl";
	@chmod( $tmplfile, 0766 );
	if ( !is_writable( $tmplfile ) ) {
		mosRedirect( "index2.php?option=$option&task=listtemplates", _JX_ERR_TMPL_NOT_WRITEABLE );
		exit;
	}

	if ( $fp = fopen( $tmplfile, "w" ) ) {
		fputs( $fp, $tmplcontent, strlen( $tmplcontent ) );
		fclose( $fp );
		mosRedirect( "index2.php?option=$option&task=listtemplates", _JX_A_TEMPLATE_SAVED );
	} else {
		mosRedirect( "index2.php?option=$option&task=listtemplates", _JX_ERR_OPEN_FILE );
	}
}

function cancelTemplate() {
	global $database, $mosConfig_absolute_path, $mosConfig_live_site, $option, $comcfg, $mainframe;

	mosRedirect( "index2.php?option=$option&task=listtemplates", _JX_A_CANCEL_TMPL );
}

function showConfig() {
	global $database, $mosConfig_absolute_path, $option, $cfgfile, $comcfg;

	@chmod( $cfgfile, 0766 );
	$permission = is_writable( $cfgfile );
	if ( !$permission ) {
		$err = "<b>" . _JX_ERR_YOURCONFIG . " $cfgfile</b><br />";
		$err .= "<b>". _JX_ERR_CHMODFILE . "</b></div><br /><br />";
		showErrorJx ( $err, _JX_ERR_WARNING );
	}

	// Make a select list for list sort order
	$listso = array();
	$listso[] = mosHTML::makeOption( 'titleasc', _JX_TITLEASC );
	$listso[] = mosHTML::makeOption( 'titledesc', _JX_TITLEDESC );
	$listso[] = mosHTML::makeOption( 'orderingasc', _JX_ORDERINGASC );
	$listso[] = mosHTML::makeOption( 'orderingdesc', _JX_ORDERINGDESC );
	$listso[] = mosHTML::makeOption( 'idasc', _JX_IDASC );
	$listso[] = mosHTML::makeOption( 'iddesc', _JX_IDDESC );
	$listso[] = mosHTML::makeOption( 'createdasc', _JX_A_CREATEDASC );
	$listso[] = mosHTML::makeOption( 'createddesc', _JX_A_CREATEDDESC );
	
	// Set access rights for who can post items.
	$postitems = array();
	$postitems[] = mosHTML::makeOption( '99', _JX_A_ACCESS_NONE );
	$postitems[] = mosHTML::makeOption( '0', _JX_A_ACCESS_ALL );
	$postitems[] = mosHTML::makeOption( '1', _JX_A_ACCESS_REGISTERED );
	$postitems[] = mosHTML::makeOption( '2', _JX_A_ACCESS_USER );

	// Find the available template sets
	$templatelist = getTemplateSetsJx();
	$templates = array();
	foreach ( $templatelist as $tmp ) {
		$templates[] = mosHTML::makeOption( "$tmp", "$tmp" );
	}

	$edits = array();
	$edits[] = mosHTML::makeOption( '_jx_none', _JX_A_NO_EDITOR );
	$edits[] = mosHTML::makeOption( '_jx_default', _JX_A_DEFAULT_EDITOR );

	// Placement of comment form
	$commentformplacement = array();
	$commentformplacement[] = mosHTML::makeOption( 'firstpage', _JX_A_COMMENTFORMONFIRSTPAGE );
	$commentformplacement[] = mosHTML::makeOption( 'linkedto', _JX_A_COMMENTFORMLINKEDTO );
	$commentformplacement[] = mosHTML::makeOption( 'above', _JX_A_COMMENTFORMABOVE );
	$commentformplacement[] = mosHTML::makeOption( 'below', _JX_A_COMMENTFORMBELOW );
	$commentformplacement[] = mosHTML::makeOption( 'none', _JX_A_COMMENTFORMNONE );

	// What to do with comments marked as spam?
	$spamtreatment = array();
	$spamtreatment[] = mosHTML::makeOption( 'nothing', _JX_A_DONTTREATSPAM );
	$spamtreatment[] = mosHTML::makeOption( 'delete', _JX_A_DELETESPAM );
	$spamtreatment[] = mosHTML::makeOption( 'dontpublish', _JX_A_DONTPUBLISHSPAM );
	$spamtreatment[] = mosHTML::makeOption( 'emailwarning', _JX_A_EMAILSPAMWARNING );

	// How should html in content be treated?
	$striphtml = array();
	$striphtml[] = mosHTML::makeOption( 'keephtml', _JX_A_KEEPHTML );
	$striphtml[] = mosHTML::makeOption( 'uselist', _JX_A_REMOVENOTINLIST );
	$striphtml[] = mosHTML::makeOption( 'removeall', _JX_A_REMOVEALLHTML );

	// Configuration options
	$cfg = array();

	$cfg['sortorder'] = mosHTML::selectList( $listso, 'cfg_sort_order', 'class="inputbox" size="1"', 'value', 'text', $comcfg['sort_order'] );
	$cfg['postitems'] = mosHTML::selectList( $postitems, 'cfg_postitems', 'class="inputbox" size="1"', 'value', 'text', $comcfg['postitems'] );
	$cfg['templates'] = mosHTML::selectList( $templates, 'cfg_template', 'class="inputbox" size="1"', 'value', 'text', $comcfg['template'] );
	$cfg['autoapprove'] = mosHTML::yesnoRadioList( 'cfg_autoapprove', 'class="inputbox" size="1"', $comcfg['autoapprove'] );
	$cfg['editor'] = mosHTML::selectList( $edits, 'cfg_editor', 'class="inputbox" size="1"', 'value', 'text', $comcfg['editor'] );
	$cfg['initeditor'] = mosHTML::yesnoRadioList( 'cfg_initeditor', 'class="inputbox" size="1"', $comcfg['initeditor'] );
	$cfg['sendthankyouemail'] = mosHTML::yesnoRadioList( 'cfg_sendthankyouemail', 'class="inputbox" size="1"', $comcfg['sendthankyouemail'] );
	$cfg['emailcommenttoadmin'] = mosHTML::yesnoRadioList( 'cfg_emailcommenttoadmin', 'class="inputbox" size="1"', $comcfg['emailcommenttoadmin'] );
	$cfg['cloakemail'] = mosHTML::yesnoRadioList( 'cfg_cloakemail', 'class="inputbox" size="1"', $comcfg['cloakemail'] );
	$cfg['commentformplacement'] = mosHTML::selectList( $commentformplacement, 'cfg_commentformplacement', 'class="inputbox" size="1"', 'value', 'text', $comcfg['commentformplacement'] );
	$cfg['doublepostings'] = mosHTML::yesnoRadioList( 'cfg_doublepostings', 'class="inputbox" size="1"', $comcfg['doublepostings'] );
	$cfg['spam_url'] = mosHTML::yesnoRadioList( 'cfg_spam_url', 'class="inputbox" size="1"', $comcfg['spam_url'] );
	$cfg['spam_image'] = mosHTML::yesnoRadioList( 'cfg_spam_image', 'class="inputbox" size="1"', $comcfg['spam_image'] );
	$cfg['spam_onlysmileys'] = mosHTML::yesnoRadioList( 'cfg_spam_onlysmileys', 'class="inputbox" size="1"', $comcfg['spam_onlysmileys'] );
	#$cfg['spam_datainunusedfields'] = mosHTML::yesnoRadioList( 'cfg_spam_datainunusedfields', 'class="inputbox" size="1"', $comcfg['spam_datainunusedfields'] );
	$cfg['spamtreatment'] = mosHTML::selectList( $spamtreatment, 'cfg_spamtreatment', 'class="inputbox" size="1"', 'value', 'text', $comcfg['spamtreatment'] );
	$cfg['allowguestname'] = mosHTML::yesnoRadioList( 'cfg_allowguestname', 'class="inputbox" size="1"', $comcfg['allowguestname'] );
	$cfg['previewpage'] = mosHTML::yesnoRadioList( 'cfg_previewpage', 'class="inputbox" size="1"', $comcfg['previewpage'] );
	$cfg['showusername'] = mosHTML::yesnoRadioList( 'cfg_showusername', 'class="inputbox" size="1"', $comcfg['showusername'] );
	$cfg['import_published'] = mosHTML::yesnoRadioList( 'cfg_import_published', 'class="inputbox" size="1"', $comcfg['import_published'] );
	$cfg['import_removebbcode'] = mosHTML::yesnoRadioList( 'cfg_import_removebbcode', 'class="inputbox" size="1"', $comcfg['import_removebbcode'] );
	$cfg['usecaptcha'] = mosHTML::yesnoRadioList( 'cfg_usecaptcha', 'class="inputbox" size="1"', $comcfg['usecaptcha'] );
	$cfg['striphtml'] = mosHTML::selectList( $striphtml, 'cfg_striphtml', 'class="inputbox" size="1"', 'value', 'text', $comcfg['striphtml'] );

	// Create tooltip icons.
	$tip = array();
	$tip['DELETEAFTERDAYS'] = jxToolTip( _JX_A_DELETEAFTERDAYS, _JX_A_DELETEAFTERDAYS_NAME, null, _JX_A_DELETEAFTERDAYS_NAME);
	$tip['ITEMSNEWFOR'] = jxToolTip( _JX_A_ITEMSNEWFOR, _JX_A_ITEMSNEWFOR_NAME );
	$tip['PUBLISHINGLIMIT'] = jxToolTip( _JX_A_PUBLISHINGLIMIT, _JX_A_PUBLISHINGLIMIT_NAME );
	$tip['SORTORDER'] = jxToolTip( _JX_A_SORTORDER, _JX_A_SORTORDER_NAME );
	$tip['ITEMLIMIT'] = jxToolTip( _JX_A_ITEMLIMIT, _JX_A_ITEMLIMIT_NAME );
	$tip['DATEFORMAT'] = jxToolTip( htmlspecialchars( _JX_A_DATEFORMAT ), _JX_A_DATEFORMAT_NAME );
	$tip['SHOW_USERNAME'] = jxToolTip( _JX_A_SHOW_USERNAME, _JX_A_SHOW_USERNAME_NAME );
	$tip['SELECTTEMPLATE'] = jxToolTip( _JX_A_SELECTTEMPLATE, _JX_A_SELECTTEMPLATE_NAME );
	$tip['CLOAKEMAILADDRESS'] = jxToolTip( _JX_A_CLOAKEMAILADDRESS, _JX_A_CLOAKEMAILADDRESS_NAME );
	$tip['COMMENTFORMPLACEMENT'] = jxToolTip( _JX_A_COMMENTFORMPLACEMENT, _JX_A_COMMENTFORMPLACEMENT_NAME );
	$tip['PREVIEWPAGE'] = jxToolTip( _JX_A_PREVIEWPAGE, _JX_A_PREVIEWPAGE_NAME );
	$tip['ALLOWGUESTNAME'] = jxToolTip( _JX_A_ALLOWGUESTNAME, _JX_A_ALLOWGUESTNAME_NAME );
	$tip['POSTITEMS'] = jxToolTip( _JX_A_POSTITEMS, _JX_A_POSTITEMS_NAME );
	$tip['AUTOAPPROVEITEMS'] = jxToolTip( _JX_A_AUTOAPPROVEITEMS, _JX_A_AUTOAPPROVEITEMS_NAME );
	$tip['USEREDITHOURS'] = jxToolTip( _JX_A_USEREDITHOURS, _JX_A_USEREDITHOURS_NAME );
	$tip['FLOODPROTECTION'] = jxToolTip( _JX_A_FLOODPROTECTION, _JX_A_FLOODPROTECTION_NAME );
	$tip['DISALLOWDOUBLEPOSTINGS'] = jxToolTip( _JX_A_DISALLOWDOUBLEPOSTINGS, _JX_A_DISALLOWDOUBLEPOSTINGS_NAME );
	$tip['SELECTEDITOR'] = jxToolTip( _JX_A_SELECTEDITOR, _JX_A_SELECTEDITOR_NAME );
	$tip['INITIALIZE_HTML_EDITOR'] = jxToolTip( _JX_A_INITIALIZE_HTML_EDITOR, _JX_A_INITIALIZE_HTML_EDITOR_NAME );
	$tip['EDITORWIDTH'] = jxToolTip( _JX_A_EDITORWIDTH, _JX_A_EDITORWIDTH_NAME );
	$tip['EDITORHEIGHT'] = jxToolTip( _JX_A_EDITORHEIGHT, _JX_A_EDITORHEIGHT_NAME );
	$tip['MAILFROMADDRESS'] = jxToolTip( _JX_A_MAILFROMADDRESS, _JX_A_MAILFROMADDRESS_NAME );
	$tip['MAILFROMNAME'] = jxToolTip( _JX_A_MAILFROMNAME, _JX_A_MAILFROMNAME_NAME );
	$tip['ADMINEMAIL'] = jxToolTip( _JX_A_ADMINEMAIL, _JX_A_ADMINEMAIL_NAME );
	$tip['ADMINNAME'] = jxToolTip( _JX_A_ADMINNAME, _JX_A_ADMINNAME_NAME );
	$tip['SENDTHANKYOUEMAIL'] = jxToolTip( _JX_A_SENDTHANKYOUEMAIL, _JX_A_SENDTHANKYOUEMAIL_NAME );
	$tip['EMAILCOMMENTTOADMIN'] = jxToolTip( _JX_A_EMAILCOMMENTTOADMIN, _JX_A_EMAILCOMMENTTOADMIN_NAME );
	$tip['USE_CAPTCHA'] = jxToolTip( _JX_A_USE_CAPTCHA, _JX_A_USE_CAPTCHA_NAME );
	$tip['HOWTOTREATSPAM'] = jxToolTip( _JX_A_HOWTOTREATSPAM, _JX_A_HOWTOTREATSPAM_NAME );
	$tip['SPAM_URL'] = jxToolTip( _JX_A_SPAM_URL, _JX_A_SPAM_URL_NAME );
	$tip['SPAM_IMAGE'] = jxToolTip( _JX_A_SPAM_IMAGE, _JX_A_SPAM_IMAGE_NAME );
	$tip['SPAM_ONLYSMILEYS'] = jxToolTip( _JX_A_SPAM_ONLYSMILEYS, _JX_A_SPAM_ONLYSMILEYS_NAME );
	$tip['SPAM_DATAINUNUSEDFIELDS'] = jxToolTip( _JX_A_SPAM_DATAINUNUSEDFIELDS, _JX_A_SPAM_DATAINUNUSEDFIELDS_NAME );
	$tip['SPAM_FORBIDDEN_WORDS'] = jxToolTip( _JX_A_SPAM_FORBIDDEN_WORDS, _JX_A_SPAM_FORBIDDEN_WORDS_NAME );
	$tip['SPAM_BANNEDIP'] = jxToolTip( _JX_A_SPAM_BANNEDIP, _JX_A_SPAM_BANNEDIP_NAME );
	$tip['SPAM_SMILEYLIST'] = jxToolTip( _JX_A_SPAM_SMILEYLIST, _JX_A_SPAM_SMILEYLIST_NAME );
	$tip['IMPORT_PUBLISHITEMS'] = jxToolTip( _JX_A_IMPORT_PUBLISHITEMS, _JX_A_IMPORT_PUBLISHITEMS_NAME );
	$tip['IMPORT_MAXURLLEN'] = jxToolTip( _JX_A_IMPORT_MAXURLLEN, _JX_A_IMPORT_MAXURLLEN_NAME );
	$tip['IMPORT_REMOVEBBCODE'] = jxToolTip( _JX_A_IMPORT_REMOVEBBCODE, _JX_A_IMPORT_REMOVEBBCODE_NAME );
	$tip['STRIPHTML'] = jxToolTip( _JX_A_STRIPHTML, _JX_A_STRIPHTML_NAME );
	$tip['ALLOWEDHTML'] = jxToolTip( _JX_A_ALLOWEDHTML, _JX_A_ALLOWEDHTML_NAME );
#	$tip[''] = jxToolTip( _JX_A_, _JX_A__NAME );

	// Make sure all configuration variables can be used in a form.
	foreach ( $comcfg as $cfgkey => $cfgval ) {
		$comcfg[$cfgkey] = htmlspecialchars( $cfgval );
	}

	HTML_jambook_admin::showConfig( $comcfg, $cfg, $tip );
}

function saveConfig() {
	global $mainframe, $database, $option, $cfgfile;

	@chmod( $cfgfile, 0766 );
	if ( !is_writable( $cfgfile ) ) {
		mosRedirect( "index2.php?option=$option", _JX_ERR_NOT_WRITEABLE );
	}

	$txt = "<?php\n";
	$txt .= "if ( !defined( '_VALID_MOS' ) && !defined('_JEXEC') ) die( 'Direct Access to this location is not allowed.' );\n";
	foreach ( $_POST as $k => $v ) {
		if ( strpos( $k, 'cfg_' ) === 0 ) {
			if ( !get_magic_quotes_gpc() ) {
				$v = addslashes( $v );
			}
			$v = str_replace( "\r\n", "\n", $v ); # Make sure DOS and Mac don't b0rk things up.
			$v = str_replace( "\r", "\n", $v ); # Make sure DOS and Mac don't b0rk things up.
			$txt .= "\$comcfg['" . substr( $k, 4 ) . "']='$v';\n";
		}
	}
	$txt .= "foreach( \$comcfg as \$_k => \$_v ) { \$comcfg[\$_k] = stripslashes( \$_v ); }\n";
	$txt .= "?>";

	if ( $fp = fopen( $cfgfile, "w" ) ) {
		fputs( $fp, $txt, strlen( $txt ) );
		fclose( $fp );
		mosRedirect( "index2.php?option=$option&task=conf", _JX_A_CONFIG_SAVED );
	} else {
		mosRedirect( "index2.php?option=$option", _JX_ERR_OPEN_FILE );
	}
}

function showPages( $pages ) {
	global $mainframe, $option;

	// Read all files and convert if necessary.
	$pc = count( $pages );
	for ( $i = 1; $i <= $pc; $i++ ) {
		$filecontent = implode( '',  @file( $mainframe->getCfg( 'absolute_path' ) . "/administrator/components/$option/" . $pages[$i]['file'] ) );

		// Text files get newlines added after each line.
		if ( substr($pages[$i]['file'], -4) == ".txt" ) {
			$filecontent = nl2br($filecontent);
		}
		$pages[$i]['content'] = $filecontent;
	}

	HTML_jambook_admin::showAdminPages( $pages, _JX_A_INFORMATION );
}

