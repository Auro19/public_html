<?php
/**
* @version $Id: admin.attend_events.php 28 2007-02-23 23:32:11Z pcarr $
* @package Attend Events
* @copyright (C) 2004 Tony Blair
* @copyright (C) 2005-06 Peter Carr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* Events Session Admin Processing
* 
* Determines the functions to call based on the task and action
*/


require_once( $mainframe->getPath( "admin_html" ) );
require_once( $mainframe->getPath( "class" ) );
require_once( $mosConfig_absolute_path."/components/$option/config.attend_events.php");
require_once( $mosConfig_absolute_path."/administrator/components/$option/fields.attend_events.php");
require_once( $mosConfig_absolute_path."/administrator/components/$option/version.attend_events.php");

$attendEventsVersionInfo = new AttendEventsComponentVersion();

// CHECK LANGUAGE
if (!defined( '_ESESS_LANG_INCLUDED' )) {
    if (file_exists($mosConfig_absolute_path."/components/com_attend_events/language/".$mosConfig_lang.".php") ) { 
        include_once($mosConfig_absolute_path."/components/com_attend_events/language/".$mosConfig_lang.".php");
    } else { 
        include_once($mosConfig_absolute_path."/components/com_attend_events/language/english.php");
    }
}
setlocale(LC_TIME, $mosConfig_lang);

// determine if we can/should integrate with Events
$disableEvents = ( !is_dir($mosConfig_absolute_path."/components/com_events") || !in_array($database->getPrefix().'events', $database->getTableList()) );
if ($disableEvents) $eSess["eventIntegrated"] = false;
if ($eSess["eventIntegrated"]) {
	// Version 1.3 Compatibility
	if (file_exists($mosConfig_absolute_path . '/administrator/components/com_events/lib/config.php')) {
		$cfgclass = $mosConfig_absolute_path . '/administrator/components/com_events/lib/config.php';
		require_once($cfgclass);
		$cfg = & EventsConfig::getInstance();
	}
}


// determine if we can/should integrate with Community Builder
$disableCB = (!is_dir($mosConfig_absolute_path."/components/com_comprofiler"));
if ($disableCB) { $eSess["cbIntegrated"] = false; } 


// get the ids and table passed
$id = 		intval( mosGetParam( $_REQUEST, 'id', 0 ) );
$cid = 		mosGetParam( $_REQUEST, 'cid', array(0));
$table =	strval( mosGetParam( $_REQUEST, 'table', 'index' ) );
/* 
 * Since no checkbox is available for items which are already checked-out,
 * the reference of the item being editied is passed via $id, not $cid.
 */
if (empty($id)) $id = $cid[0];


/*
 * CSS code for disabled items and mandatory items
 * TODO:  A better place for this?
 */
DEFINE("_STYLE_DISABLED","<span style=\"color:#808080;\">");



// determine the action which helps to determine the final task
if (!empty($act)) {
    $table = $act;
} 

//echo $table.$task;

// determine the task and process it accordingly
switch ($table.$task) {
    case "sessions":
        // show the sessions information
        showSessions($option);
        break;
         
    case "sessionsnew":
        // create a new session
        editSessions(null, $option);
        break;
        
    case "sessionsedit":
        // edit the first of the selected sessions
        editSessions($id, $option);
        break;
        
    case "sessionssave":
        // save the session
        saveSessions($option);
        break;
        
    case "sessionscancel":
        // cancel the session editing
        cancelSessions($option);
        break;
        
    case "sessionspublish":
        // publish the selected sessions
        publishSessions($cid, 1, $option);
        break;
        
    case "sessionsunpublish":
        // unpublish the selected sessions
        publishSessions($cid, 0, $option);
        break;
         
    case "sessionsremove":
        // remove the selected sessions
        removeSessions($cid, $option);
        break;
         
    case "config":
    case "configcancel":
        // show the config options
        showConfigurationOptions($option);
        break;
        
    case "configoptions":
        // edit the config options
        editConfigOptions($option);
        break;
        
    case "configthank":
        // edit the config thank options
        editConfigThanks($option);
        break;
        
    case "configconfirm":
        // edit the config confirm options
        editConfigConfirm($option);
        break;
        
    case "confignotify":
        // edit the config notify options
        editConfigNotify($option);
        break;
        
    case "configcancellation":
        // edit the config cancellation options
        editConfigCancel($option);
        break;
        
    case "configsave":
        // save the config
        saveConfiguration($option);
        break;
        
    case "configapply":
        // save the config
        saveConfiguration($option);
        mosRedirect( "index2.php?option=$option&amp;act=config&amp;task=options" );
        break;
        
    case "registrations":
        // display the registrations
        showRegistrations($option);
        break;
        
    case "registrationsview":
        // view the first selected registration
        viewRegistrations($cid[0], $option);
        break;
        
    case "registrationsremove":
        // delete all of the selected registrations
        removeRegistrations($cid, $option);
        break;
        
    case "registrationscancel":
        cancelRegistrations($option);
        break;
        
    case "registrationsexport":
        displayExportRegistrations($cid, $option);
        break;   	
        
    case "registrationsemail":
        emailRegistrants($cid, $option);
        break;
        
    case "registrationssend":
        sendRegistrantsEmail($cid, $option);
        break;
    
    case "registrationssave":
        exportRegistrations($cid, $option);
        break;
        
    case "venues":
    	showVenues($option);
    	break;
    	
   	case "venuesnew":
   		editVenues(null, $option);
   		break;
   		
   	case "venuesedit":
   		editVenues($id, $option);
   		break;
   		
   	case "venuessave":
   		saveVenues($option);
   		break;
   	
   	case "venuescancel":
   		cancelVenues($option);
   		break;
   		
   	case "venuesremove":
   		removeVenues($cid, $option);
   		break;
   		
    case "indexupdate":
    	upgrade();
    	break;
    	
    case "indexuninstall":
    	uninstall($option);
    	break;
    	
    case "indexconfig":
    	exportConfigurationFile($option);
    	break;
        
    default:
    	echo "<script type=\"text/javascript\">\n";
    	echo "<!--\n";
    	echo "    function submitbutton( pressbutton ) {\n";
    	echo "		  if ( pressbutton == 'uninstall' ) {\n";
    	echo "			  if ( confirm('" . _ESESS_UNINSTALL_CONFIRM . "') ) {\n";
    	echo "				  submitform( pressbutton );\n";
    	echo "			  }\n";
    	echo "        } else if ( pressbutton == 'update' ) {\n";
    	echo "			  if ( confirm('" . _ESESS_UPDATE_CONFIRM . "') ) {\n";
    	echo "				  submitform( pressbutton );\n";
    	echo "			  }\n";
    	echo "		  } else {\n";
    	echo "            submitform( pressbutton );\n";
    	echo "        }\n";
    	echo "        return;\n";
    	echo "    }\n";
    	echo "//-->\n";
    	echo "</script>\n";
		
		echo "<form action=\"index2.php\" method=\"post\" name=\"adminForm\">";
		echo "<input type=\"hidden\" name=\"task\" value=\"\" />";
		echo "<input type=\"hidden\" name=\"option\" value=\"" . $option . "\" />";
	    echo "<input type=\"hidden\" name=\"act\" value=\"index\" />";
		echo "</form>";
        
        // display the index.html page that shows information about the component
        echo "<table border=\"0\" class=\"adminform\">\n";
        echo "  <tr>\n";
        echo "    <td>\n";
        echo "      <div style=\"text-align:left;\" >\n";
        require_once($mosConfig_absolute_path."/administrator/components/$option/index.html");
        echo "      </div>\n";
        echo "    </td>\n";
        echo "  </tr>\n";
        echo "</table>\n";
        break;
}

// display a footer for these admin pages
?>
	<p align="center"><b><a href="http://developer.joomla.org/sf/sfmain/do/viewProject/projects.attendevents">Attend Events</a> <?php echo $attendEventsVersionInfo->currentVersion(); ?></b><br />
    <span style="font-size: 8pt;">A fork of <b><a href="http://mamboforge.net/projects/eventssessions/">Events Sessions</a> 0.6.0 Beta</b> by Tony Blair and <a href="http://www.sm2.com.au" target="_blank">SM2</a></span></p>
<?php

/**
* Main functions start here
*/


/**
* Display a list of session records
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @return void
*/
function showSessions($option) {
    global $database, $mainframe, $mosConfig_list_limit, $mosConfig_absolute_path, $eSess;
    
    // create an instance of the table class
    $row = new mosEventsSessions($database);
    
    // check for any new status changed
    $row->updateStatus();
    unset($row);
    
    // get some data from the request information
    $filter = $mainframe->getUserStateFromRequest( "filter{$option}", 'filter', 0 );
    $sorting = $mainframe->getUserStateFromRequest( "sorting", 'sorting', '' );
    $limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit );
    $limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );
    $search = $mainframe->getUserStateFromRequest("search{$option}", "search", '');
    $search = $database->getEscaped(trim(strtolower($search)));
    
    // determine if there is anything to search for
    $where = "where s.published>=0 ";
    if (!empty($search)) {
        if ($eSess["eventIntegrated"]) {
            $where .= "and ((lower(s.title) like '%$search%') ";
            $where .= "or (lower(e.title) like '%$search%')) ";
        } else {
            $where .= "and (lower(s.title) like '%$search%') ";
        }
    }
    
    // look at the filter passed and process
    if (strlen($filter)>1) {
        $id = substr($filter,1);
        // determine which filter was selected
        switch ($filter[0]) {
            case "S":
                // Status filter
                $where .= "and (s.status=$id) ";
                break;
            case "A":
                // availability filter
                if ($eSess["registrationsFrom"]==$id) {
                    // find this avail and global
                    $where .= "and ((s.availability=$id) ";
                    $where .= "or (s.availability=3)) ";
                } else {
                    // find just this avail
                    $where .= "and (s.availability=$id) ";
                }
                break;
            case "E":
                // event filter
                $where .= "and (s.event_id=$id) ";
                break;
        }
    } // filter
    
    // initialise the array of sort links
    $uparrow = (defined("_ESESS_ARROW_UP")) ? _ESESS_ARROW_UP : "images/uparrow-1.png";
    $downarrow = (defined("_ESESS_ARROW_DOWN")) ? _ESESS_ARROW_DOWN : "images/downarrow-1.png";
    $unsetarrow = (defined("_ESESS_ARROW_UNSET")) ? _ESESS_ARROW_UNSET : "images/uparrow.png";
    $sortLinks = array();
    $sortLinks["sorting"]=$sorting;
    $sortLinks["N"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('N-A');\"><img src=\"$unsetarrow\" border=\"0\" alt=\"\" /></a>";
    $sortLinks["SD"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('SD-A');\"><img src=\"$unsetarrow\" border=\"0\" alt=\"\" /></a>";
    $sortLinks["ED"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('ED-A');\"><img src=\"$unsetarrow\" border=\"0\" alt=\"\" /></a>";
    $sortLinks["S"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('S-A');\"><img src=\"$unsetarrow\" border=\"0\" alt=\"\" /></a>";
    $sortLinks["A"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('A-A');\"><img src=\"$unsetarrow\" border=\"0\" alt=\"\" /></a>";
    $sortLinks["P"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('P-A');\"><img src=\"$unsetarrow\" border=\"0\" alt=\"\" /></a>";
    $sortLinks["C"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('C-A');\"><img src=\"$unsetarrow\" border=\"0\" alt=\"\" /></a>";
    
    // determine which ordering to use - order by whichever field and title, if not ordering by title already
    switch ($sorting) {
        case "SD-A":
            // start date asc
            $order = "order by s.registration_up, 2 ";
            $sortLinks["SD"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('SD-D');\"><img src=\"$uparrow\" border=\"0\" alt=\"\" /></a>";
            break;
            
        case "SD-D":
            // start date desc
            $order = "order by s.registration_up desc, 2 ";
            $sortLinks["SD"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('SD-A');\"><img src=\"$downarrow\" border=\"0\" alt=\"\" /></a>";
            break;
            
        case "ED-A":
            // end date asc
            $order = "order by s.registration_down, 2 ";
            $sortLinks["ED"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('ED-D');\"><img src=\"$uparrow\" border=\"0\" alt=\"\" /></a>";
            break;
            
        case "ED-D":
            // end date desc
            $order = "order by s.registration_down desc, 2 ";
            $sortLinks["ED"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('ED-A');\"><img src=\"$downarrow\" border=\"0\" alt=\"\" /></a>";
            break;
            
        case "S-A":
            // status asc
            $order = "order by s.status, 2 ";
            $sortLinks["S"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('S-D');\"><img src=\"$uparrow\" border=\"0\" alt=\"\" /></a>";
            break;
            
        case "S-D":
            // status desc
            $order = "order by s.status desc, 2 ";
            $sortLinks["S"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('S-A');\"><img src=\"$downarrow\" border=\"0\" alt=\"\" /></a>";
            break;
            
        case "A-A":
            // availability asc
            $order = "order by s.availability, 2 ";
            $sortLinks["A"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('A-D');\"><img src=\"$uparrow\" border=\"0\" alt=\"\" /></a>";
            break;
            
        case "A-D":
            // availability desc
            $order = "order by s.availability desc, 2 ";
            $sortLinks["A"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('A-A');\"><img src=\"$downarrow\" border=\"0\" alt=\"\" /></a>";
            break;
            
        case "P-A":
            // published asc
            // not this is desc because we really want 1 before 0
            $order = "order by s.published desc, 2 ";
            $sortLinks["P"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('P-D');\"><img src=\"$uparrow\" border=\"0\" alt=\"\" /></a>";
            break;
            
        case "P-D":
            // published desc
            // not this is asc because we really want 1 after 0
            $order = "order by s.published, 2 ";
            $sortLinks["P"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('P-A');\"><img src=\"$downarrow\" border=\"0\" alt=\"\" /></a>";
            break;
            
        case "N-D":
            // name desc
            $order = "order by 2 desc ";
            $sortLinks["N"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('N-A');\"><img src=\"$downarrow\" border=\"0\" alt=\"\" /></a>";
            break;
            
        case "N-A":
        default:
            // name desc
            $order = "order by 2 ";
            $sortLinks["N"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('N-D');\"><img src=\"$uparrow\" border=\"0\" alt=\"\" /></a>";
            break;
            
    } // switch sorting
    
    // Get the total number of records
    if ($eSess["eventIntegrated"]) {
        $qrysql  = "select count(*) ";
        $qrysql .= "from #__events_sessions s left join #__events e on (s.event_id=e.id) ";
        $qrysql .= " $where ";
    } else {
        $qrysql  = "select count(*) ";
        $qrysql .= "from #__events_sessions s ";
        $qrysql .= " $where ";
    }
    $database->setQuery($qrysql);
    $total = $database->loadResult();
    
    // handle the page navigation
    include_once( "includes/pageNavigation.php" );
    $pageNav = new mosPageNav($total, $limitstart, $limit);
    
    // build the query to get the data to display
    if ($eSess["eventIntegrated"]) {
        // this query uses the events components because it exists
        /* 
         * Updated to use new fields created in Attend Events 0.0.2
         */
        $qrysql  = "select s.session_id, case s.event_id when 0 then s.title else concat(s.title,' (',e.title,')') end as title, ";
        $qrysql .= "s.session_up, s.session_down, s.maxregistrations, s.status, s.availability, s.published, ";
        $qrysql .= "s.registration_up, s.registration_down, ";
        $qrysql .= "s.checked_out, s.checked_out_time, u.name as editor ";
        $qrysql .= "from #__events_sessions s left join #__events e on (s.event_id=e.id) ";
        $qrysql .= "left join #__users u on (s.checked_out=u.id) ";
        $qrysql .= " $where ";
        $qrysql .= $order;
        $qrysql .= "limit ".$pageNav->limitstart.", ".$pageNav->limit;
    } else {
        // this query doesnt look at events because it probably doesnt exist
        $qrysql  = "select s.session_id, s.title, ";
        $qrysql .= "s.registration_up, s.registration_down, s.maxregistrations, s.status, s.availability, s.published, ";
        $qrysql .= "s.checked_out, s.checked_out_time, s.session_up, s.session_down, u.name as editor ";
        $qrysql .= "from #__events_sessions s ";
        $qrysql .= "left join #__users u on (s.checked_out=u.id) ";
        $qrysql .= " $where ";
        $qrysql .= $order;
        $qrysql .= "limit ".$pageNav->limitstart.", ".$pageNav->limit;
    }
    
    // get the data to display 
    $database->setQuery($qrysql);
    $rows = $database->loadObjectList();
    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    }
    
    // determine the number of active registrations per session
    foreach ($rows as $i=>$row) {
        $qrysql = "select sum(numregistrations) from #__events_registrations where (session_id=$row->session_id) and ((cancel_date = '0') or (cancel_date is null))";
        $database->setQuery($qrysql);
        $rows[$i]->numregistrations = $database->loadResult();
        if (empty($rows[$i]->numregistrations)) {
            $rows[$i]->numregistrations=0;
        }
    }
    
    // get the filter list information
    $filters = array();
    $filters[] = mosHTML::makeOption('0',_ESESS_SFILTER_CHOOSE);
    $filters[] = mosHTML::makeOption('1',_ESESS_SFILTER_NONE);
    $filters[] = mosHTML::makeOption('S',_ESESS_SFILTER_STATUS);
    $filters[] = mosHTML::makeOption('S0',_ESESS_STATUS_NEW);
    $filters[] = mosHTML::makeOption('S1',_ESESS_STATUS_OPEN);
    $filters[] = mosHTML::makeOption('S2',_ESESS_STATUS_FULL);
    $filters[] = mosHTML::makeOption('S3',_ESESS_STATUS_CLOSED);
    $filters[] = mosHTML::makeOption('A',_ESESS_SFILTER_AVAIL);
    $filters[] = mosHTML::makeOption('A0',_ESESS_AVAIL_EVERY);
    $filters[] = mosHTML::makeOption('A1',_ESESS_AVAIL_REG);
    $filters[] = mosHTML::makeOption('A2',_ESESS_AVAIL_GUEST);
    
    /* 
     * Only provide an "Event" filter, if integrated with Events
     */
    if ($eSess["eventIntegrated"]) {
		$filters[] = mosHTML::makeOption('E',_ESESS_SFILTER_EVENT);
		
		$qrysql  = "select distinct concat('E', s.event_id) as value, e.title as text from #__events_sessions s ";
		$qrysql .= "left join #__events e on (s.event_id=e.id) ";
		$qrysql .= "where s.event_id != 0 order by 2";
		$database->setQuery( $qrysql );
		$filters = array_merge( $filters, $database->loadObjectList() );
	}
    $lists["filters"] = mosHTML::selectList( $filters, 'filter', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $filter );
    unset($filters);
    
    // call the object to display the list
    HTML_Events_Sessions::listSessions( $rows, $pageNav, $option, $search, $lists, $sortLinks );
    
} // showSessions()

/**
* Displays the new/edit Sessions form
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @param int $id Id of the session to display - 0 means new
* @return void
*/
function editSessions($id, $option) {
    global $database, $my, $disableEvents;
    
    // create an instance of the table class
    $row = new mosEventsSessions($database);
    
    // check for any new status changed
    $row->updateStatus();
    
    // Load the row from the db table
    $row->load($id);
    
    // initialise lists
    $lists = array();
    
    if (!$disableEvents) {
        // get the event list
        $events = array();
        $events[] = mosHTML::makeOption( '0', _ESESS_NO_EVENT );
        $database->setQuery("select id as value, title as text from #__events order by 2");
        $events = array_merge($events, $database->loadObjectList());
        
        $lists["event_id"] = mosHTML::selectList( $events, 'event_id', 'class="inputbox" size="1"', 'value', 'text', $row->event_id );
        unset($events);
    }
        
    
    // get the availability list
   /* 
    * Renumber values to that 'use global' is the default
    */
    $avail = array();
    $avail[] = mosHTML::makeOption('3',_ESESS_AVAIL_GLOBAL2);
    $avail[] = mosHTML::makeOption('0',_ESESS_AVAIL_EVERY);
    $avail[] = mosHTML::makeOption('1',_ESESS_AVAIL_REG);
    $avail[] = mosHTML::makeOption('2',_ESESS_AVAIL_GUEST);
    $lists["availability"] = mosHTML::selectList($avail, "availability", 'class="inputbox" size="1"', "value", "text", $row->availability);
    unset($avail);
    
    
    
    
    if ($id!=0) {
        $row->checkout( $my->id );
    }
    
    /*
     * Moved this code into the fields file, since it will be used more than once
     */
	$customFields = AE_CustomFields::loadFields($id,true);



	// load a list of users who may host this session
	$query = "SELECT id, name FROM #__users WHERE (gid >= '19')";
	$database->setQuery($query);
	$authors = $database->loadObjectList();
	
	$sessionHosts = array();
	foreach ($authors as $author) {
		$sessionHosts[] = mosHTML::makeOption($author->id,$author->name);
	}
	$lists["host_id"] = mosHTML::selectList($sessionHosts, "host_id", 'class="inputbox" size="1"', "value", "text", $row->host_id);
    


	/*
	 * Support for 'favourite venues'
	 */
    // build the query to get the data to display
    $qrysql  = "SELECT v.name, v.venue_id "; 
    $qrysql .= "FROM #__events_venues AS v";

    // get the data to display 
    $database->setQuery($qrysql);
    $venues = $database->loadObjectList();
    if ($database->getErrorNum()) {
        echo $database->stderr();
    }
	$savedVenues = array();
	$savedVenues[] = mosHTML::makeOption('','');
	foreach ($venues as $venue) {
		$savedVenues[] = mosHTML::makeOption($venue->venue_id,$venue->name);
	}
	$lists["venue_id"] = mosHTML::selectList($savedVenues, "venue_id", 'class="inputbox" size="1"', "value", "text", $row->venue_id);


	// account for server time zone offset
	$row->session_up = mosFormatDate( $row->session_up, '%Y-%m-%d %H:%M:%S' );
	$row->session_down = mosFormatDate( $row->session_down, '%Y-%m-%d %H:%M:%S' );
	$row->registration_up = mosFormatDate( $row->registration_up, '%Y-%m-%d %H:%M:%S' );
	$row->registration_down = mosFormatDate( $row->registration_down, '%Y-%m-%d %H:%M:%S' );

	// Attend Events assumes invalid dates are empty, not "-" (which is what mosFormatDate does)
	if (strcmp($row->session_up, "-") == 0) $row->session_up = "";
	if (strcmp($row->session_down, "-") == 0) $row->session_down = "";
	if (strcmp($row->registration_up, "-") == 0) $row->registration_up = "";
	if (strcmp($row->registration_down, "-") == 0) $row->registration_down = "";

    // display the form
    HTML_Events_Sessions::editSessions($row, $option, $lists, $customFields);
    
} // editSessions()

/**
* Saves the Session Record
* @param string $option Name of the component - used by some mos functions
*/
function saveSessions( $option ) {
    global $database, $mosConfig_offset; 

    // create an instance of the table class
    $row = new mosEventsSessions( $database );
    
    // attempt to bind the class to the data posted
    if (!$row->bind($_POST)) {
        echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
        exit();
    }
    
    // express all dates and times relative to the server offset
    $row->session_up = mosFormatDate( $row->session_up, '%Y-%m-%d %H:%M:%S', -$mosConfig_offset );
    $row->session_down = mosFormatDate( $row->session_down, '%Y-%m-%d %H:%M:%S', -$mosConfig_offset );
    $row->registration_up = mosFormatDate( $row->registration_up, '%Y-%m-%d %H:%M:%S', -$mosConfig_offset );
    $row->registration_down = mosFormatDate( $row->registration_down, '%Y-%m-%d %H:%M:%S', -$mosConfig_offset );
    
    // check the record
    if (!$row->check()) {
        echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
        exit();
    }
    
    // attempt to insert/update the record    
    if (!$row->store()) {
        echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
        exit();
    }

    // attempt to update status of all records    
    if (!$row->updateStatus()) {
        echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
        exit();
    }    
    
    // save succesful.  Check-in the row to allow others to access it
    $row->checkin();
    
    AE_CustomFields::saveFields($row->session_id);
    
	cancelSessions($option);
} // saveSessions()

/**
* Cancels an Session processing
*
* Returns to the list page of an option
*
* @access   private
* @param    string $option Name of the component - use by some mos functions
* @return   void  
*/
function cancelSessions($option) {
    global $database;
    
    // perform any check-ins needed
    $row = new mosEventsSessions( $database );
    $row->bind( $_POST );
    $row->checkin();
    
    // redirect back to the list page
    mosRedirect( "index2.php?option=$option&amp;act=sessions" );
} // cancelSessions()


/**
* Publishes a session
* @access   private
* @param    string $option Name of the component - use by some mos functions
* @return   void
*/
function publishSessions( $id=null, $publish=1,  $option ) {
    global $database, $my;
    
    // check to make sure something to publish has been selected
    if (!is_array( $id ) || count( $id ) < 1) {
        $action = $publish ? _CMN_PUBLISHED : _CMN_UNPUBLISHED;
        echo "<script> alert('"._ESESS_PUBLISH_MSG."$action'); window.history.go(-1);</script>\n";
        exit;
    }
    
    // load the table object and perform a publish
    $row = new mosEventsSessions( $database );
    $row->bind( $_POST );
    if (!$row->publish_array($id,$publish,$my->id)) {
        echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
        exit();
    }
    
    cancelSessions($option);
} // publishSessions


/**
* Deletes the selected Sessions
* 
* Does not actually delete but sets the published to -1 
* 
* @access   private
* @param     array $cid Array of ids to delete
* @param    string $option Name of the component - use by some mos functions
* @return   void
*/
function removeSessions($cid, $option) {
    global $database;

    /*
     * Tony Blair's original code didn't actually delete any information.  It simply
     * prevented it from being listed.   Instead, a new strategy (based off the tutorial
     * at mambohut.com) is used.
     */

    // validate that cid is ok
    if (!is_array($cid) or count($cid) < 1) {
        echo "<script> alert('"._ESESS_DELETE_SESSION_MSG."'); window.history.go(-1);</script>\n";
        exit;
    }
    
	if (count( $cid )) {
		$cids = implode( ',', $cid );		
		
		// remove the events
		$database->setQuery( "DELETE FROM #__events_sessions WHERE session_id IN ($cids)" );
		if (!$database->query()) {
		  	echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
		  	exit;
		}
		
		/*
		 * Delete custom fields for these sessions
		 */
		$database->setQuery( "DELETE FROM #__events_registration_fields WHERE session_id IN ($cids)" );
		if (!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
		  	exit;
		}	
		$database->setQuery( "DELETE FROM #__events_registration_fields_options WHERE session_id IN ($cids)" );
		if (!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
		  	exit;
		}	
	}
    
    // return to the list page
    cancelSessions($option);
} // removeSessions()


/**
* Displays the Configuration Options page
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @return void
*/
function showConfigurationOptions($option, $msg="") {
    global $database, $my, $eSess;
    
    // display the form
    HTML_Events_Sessions::displayConfigurationOptions($option, $msg);
    
} // showConfigurationOptions()


/**
* Displays the edit Configuration Options
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @return void
*/
function editConfigOptions($option) {
    global $database, $my, $eSess;
    
    // get the availability list
   /* 
    * Changed constant values so that 'use gloabl' = 0
    */
    $avail = array();
    $avail[] = mosHTML::makeOption('0',_ESESS_AVAIL_EVERY);
    $avail[] = mosHTML::makeOption('1',_ESESS_AVAIL_REG);
    $avail[] = mosHTML::makeOption('2',_ESESS_AVAIL_GUEST);
    $lists["registrationsFrom"] = mosHTML::selectList($avail, "eSess_registrationsFrom", 'class="inputbox" size="1"', "value", "text", $eSess["registrationsFrom"]);
    unset($avail);
    
    
    
   /* 
    * Create option list for setting how the time should be displayed
    * New formatting idea -- deal with the time components individually.
    */
    $timeFormat = array();
    $timeFormat[] = mosHTML::makeOption('%H:%M',_ESESS_FIELD_TIME1);
    $timeFormat[] = mosHTML::makeOption('%k:%M',_ESESS_FIELD_TIME2);
    $timeFormat[] = mosHTML::makeOption('%I:%M %p',_ESESS_FIELD_TIME3);
	$timeFormat[] = mosHTML::makeOption('%l:%M %p',_ESESS_FIELD_TIME4);
    $lists["timeFormat"] = mosHTML::selectList($timeFormat, "eSess_timeFormat", 'class="inputbox" size="1"', "value", "text", $eSess["timeFormat"]);




   	// short date formats
    $shortDateFormat = array();
    $shortDateFormat[] = mosHTML::makeOption('%Y-%m-%d',strftime('%Y-%m-%d',time()));
    $shortDateFormat[] = mosHTML::makeOption('%m/%d/%y',strftime('%m/%d/%y',time()));
    $shortDateFormat[] = mosHTML::makeOption('%d/%m/%y',strftime('%d/%m/%y',time()));
    $lists["shortDateFormat"] = mosHTML::selectList($shortDateFormat, "eSess_shortDateFormat", 'class="inputbox" size="1"', "value", "text", $eSess["shortDateFormat"]);

	// long date formats
	$longDateFormat = array();
    $longDateFormat[] = mosHTML::makeOption('%A, %e %B %Y',strftime('%A, %e %B %Y',time()));
    $lists["longDateFormat"] = mosHTML::selectList($longDateFormat, "eSess_longDateFormat", 'class="inputbox" size="1"', "value", "text", $eSess["longDateFormat"]); 
    
	/*
	 * Create options for controlling when sessions are listed in the front-end
	 */
	$startListing = array();
    $startListing[] = mosHTML::makeOption('0',_ESESS_FIELD_LIST_CASE0);
    $startListing[] = mosHTML::makeOption('1',_ESESS_FIELD_LIST_CASE1);
	$startListing[] = mosHTML::makeOption('2',_ESESS_FIELD_LIST_CASE2);
	$startListing[] = mosHTML::makeOption('3',_ESESS_FIELD_LIST_CASE3);
	$startListing[] = mosHTML::makeOption('4',_ESESS_FIELD_LIST_CASE4);	 
	$lists["startListing"] = mosHTML::selectList($startListing, "eSess_startListing",'class="inputbox" size="1"', "value", "text", $eSess["startListing"]);  
	$stopListing = array();
    $stopListing[] = mosHTML::makeOption('1',_ESESS_FIELD_LIST_CASE1);
	$stopListing[] = mosHTML::makeOption('2',_ESESS_FIELD_LIST_CASE2);
	$stopListing[] = mosHTML::makeOption('3',_ESESS_FIELD_LIST_CASE3);
	$stopListing[] = mosHTML::makeOption('4',_ESESS_FIELD_LIST_CASE4);	 
	$lists["stopListing"] = mosHTML::selectList($stopListing, "eSess_stopListing",'class="inputbox" size="1"', "value", "text", $eSess["stopListing"]); 
    
    
    /*
     * Load the template fields
     */
	$customFields = AE_CustomFields::loadFields(0);
    
    
    // display the form
    HTML_Events_Sessions::editConfigOptions($eSess, $option, $lists, $customFields);
    
} // editConfigOptions()


/**
* Displays the edit Configuration Thank Options
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @return void
*/
function editConfigThanks($option) {
    global $database, $my, $eSess;
    
    // display the form
    HTML_Events_Sessions::editConfigThanks($eSess, $option);
    
} // editConfigThanks()


/**
* Displays the edit Configuration Confirm Options
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @return void
*/
function editConfigConfirm($option) {
    global $database, $my, $eSess;
    
    // display the form
    HTML_Events_Sessions::editConfigConfirm($eSess, $option);
    
} // editConfigConfirm()


/**
* Displays the edit Configuration Notify Options
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @return void
*/
function editConfigNotify($option) {
    global $database, $my, $eSess;
    
    // display the form
    HTML_Events_Sessions::editConfigNotify($eSess, $option);
    
} // editConfigNotify()


/**
* Displays the edit Configuration Cancellation Options
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @return void
*/
function editConfigCancel($option) {
    global $database, $my, $eSess;
    
    // display the form
    HTML_Events_Sessions::editConfigCancel($eSess, $option);
    
} // editConfigCancel()


/**
* Saves the configuration file
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @return void
*/
function saveConfiguration($option) {
    global $eSess, $mosConfig_absolute_path, $database;
    
    
    AE_CustomFields::saveFields(0);
    
    // prepare the data to write
    $config  = "<?php\n/** ensure this file is being included by a parent file */\n";
    $config .= "defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );\n";
    $config .= "\n/**\n* Events Session Config File\n* Contains no actualy php code\n*/\n\$eSess = array();\n";
    
    // loop through the eSess and look for values in the post
    // and write the data to the config var
    foreach (array_keys($eSess) as $index) {
        // determine how to process the fields passed
        switch ($index) {
            case "eventIntegrated":
            case "cbIntegrated":
            case "autoFull":
            case "individualOnly":
            case "userCancellation":
            case "userNumber":
            case "showSubject":
            case "showActivity":
            case "showLocation":
            case "showMap":
            case "showContact":
            case "showExtra":
            case "showTimes":
            case "displayFooter":
            case "showFull":
            case "showAll":
            case "showRegistered":
            case "showAvatar":
                // flags on the options form
                if (isset($_POST["eSess_registrationsFrom"])) {
                    if (isset($_POST["eSess_$index"])) {
                        $eSess[$index]=true;
                    } else {
                        $eSess[$index]=false;
                    }
                }
                break;
                
            case "confirmEmailSend":
                // flag on the confirm form
                if (isset($_POST["eSess_confirmEmailSubject"])) {
                    if (isset($_POST["eSess_$index"])) {
                        $eSess[$index]=true;
                    } else {
                        $eSess[$index]=false;
                    }
                }
                break;
                
            case "notifyEmailSend":
                // flag on the notify form
                if (isset($_POST["eSess_notifyEmailSubject"])) {
                    if (isset($_POST["eSess_$index"])) {
                        $eSess[$index]=true;
                    } else {
                        $eSess[$index]=false;
                    }
                }
                break;
                
            case "cancelEmailSend":
                // flag on the cancel form
                if (isset($_POST["eSess_cancelEmailSubject"])) {
                    if (isset($_POST["eSess_$index"])) {
                        $eSess[$index]=true;
                    } else {
                        $eSess[$index]=false;
                    }
                }
                break;
                
            default:
                // process the string fields
                if (isset($_POST["eSess_$index"])) {
                    $eSess[$index]=stripslashes($_POST["eSess_$index"]);
                }
                break;
                
        } // switch
        
        $config .= "\$eSess[\"$index\"]=";
        if (is_bool($eSess[$index])) {
            if ($eSess[$index]) {
                $config .= "true";
            } else {
                $config .= "false";
            }
        } elseif (is_numeric($eSess[$index])) {
            $config .= $eSess[$index];
        } else {
            $config .= "\"".$database->getEscaped($eSess[$index])."\"";
        }
        $config .= ";\n";
    }
    $config .= "?>";
    
    // save the config data to the file
    if (!$fh=fopen($mosConfig_absolute_path."/components/$option/config.attend_events.php","w")) {
        echo "<script> alert('"._ESESS_CONFIG_ERR_OPEN."'); window.history.go(-1); </script>\n";
        exit();
    }
    
    if (fwrite($fh,$config)===false) {
        echo "<script> alert('"._ESESS_CONFIG_ERR_WRITE."'); window.history.go(-1); </script>\n";
        exit();
    }
    
    fclose($fh);
    
    // redisplay with message
    showConfigurationOptions($option, "Configuration Saved successfully!");
} // saveConfiguration()


/**
* Display a list of session registration records
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @return void
*/
function showRegistrations($option) {
    global $database, $mainframe, $mosConfig_list_limit;

    $row = new mosEventsRegistrations($database);
    $row->updateStatus();
    unset($row);

    
    // get some data from the request information
    $filter = intval($mainframe->getUserStateFromRequest( "filter{$option}", 'filter', 0 ));
    $sorting = $mainframe->getUserStateFromRequest( "sorting", 'sorting', '' );
    $limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit );
    $limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );
    $search = $mainframe->getUserStateFromRequest("search".$option, "search", '');
    $search = $database->getEscaped(trim(strtolower($search)));
    

    $where = "WHERE (r.numregistrations > 0) ";
    
    // determine if there is anything to search for
    //$where = "where ((r.cancel_date=0) or (r.cancel_date is null)) and (r.numregistrations > 0) ";
    if (!empty($search)) {
        $where .= "and ((lower(s.title) like '%$search%') or";
        $where .= " (lower(r.fullname) like '%$search%') or ";
        $where .= " (lower(u.name) like '%$search%') or ";
        $where .= " (lower(r.email) like '%$search%')) ";
    }
    
    // determine if there was a session selected
    if ($filter>0) {
        $where .= "and (r.session_id=$filter) ";
    }
    
    // initialise the array of sort links
    $uparrow = _ESESS_ARROW_UP;
    $downarrow = _ESESS_ARROW_DOWN;
    $unsetarrow = _ESESS_ARROW_UNSET;
    $sortLinks = array();
    $sortLinks["sorting"]=$sorting;
    $sortLinks["N"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('N-A');\"><img src=\"$unsetarrow\" border=\"0\"></a>";
    $sortLinks["E"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('E-A');\"><img src=\"$unsetarrow\" border=\"0\"></a>";
    $sortLinks["T"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('T-A');\"><img src=\"$unsetarrow\" border=\"0\"></a>";
    $sortLinks["D"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('D-A');\"><img src=\"$unsetarrow\" border=\"0\"></a>";
    $sortLinks["#"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('#-A');\"><img src=\"$unsetarrow\" border=\"0\"></a>";
    $sortLinks["V"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('V-A');\"><img src=\"$unsetarrow\" border=\"0\"></a>";
    
    // determine which ordering to use
    switch ($sorting) {
        case "E-A":
            // email asc
            $order = "order by r.email ";
            $sortLinks["E"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('E-D');\"><img src=\"$uparrow\" border=\"0\"></a>";
            break;
            
        case "E-D":
            // email desc
            $order = "order by r.email desc ";
            $sortLinks["E"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('E-A');\"><img src=\"$downarrow\" border=\"0\"></a>";
            break;
            
        case "T-A":
            // title asc
            $order = "order by s.title ";
            $sortLinks["T"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('T-D');\"><img src=\"$uparrow\" border=\"0\"></a>";
            break;
            
        case "T-D":
            // title desc
            $order = "order by s.title desc ";
            $sortLinks["T"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('T-A');\"><img src=\"$downarrow\" border=\"0\"></a>";
            break;
            
        case "D-A":
            // date asc
            $order = "order by r.registration_date ";
            $sortLinks["D"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('D-D');\"><img src=\"$uparrow\" border=\"0\"></a>";
            break;
            
        case "D-D":
            // date desc
            $order = "order by r.registration_date desc ";
            $sortLinks["D"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('D-A');\"><img src=\"$downarrow\" border=\"0\"></a>";
            break;
            
        case "#-A":
            // # asc
            $order = "order by r.numregistrations ";
            $sortLinks["#"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('#-D');\"><img src=\"$uparrow\" border=\"0\"></a>";
            break;
            
        case "#-D":
            // # desc
            $order = "order by r.numregistrations desc ";
            $sortLinks["#"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('#-A');\"><img src=\"$downarrow\" border=\"0\"></a>";
            break;
            
        case "V-A":
            // viewed asc
            // not this is desc because we really want 1 before 0
            $order = "order by r.viewed desc ";
            $sortLinks["V"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('V-D');\"><img src=\"$uparrow\" border=\"0\"></a>";
            break;
            
        case "V-D":
            // viewed desc
            // not this is asc because we really want 1 after 0
            $order = "order by r.viewed ";
            $sortLinks["V"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('V-A');\"><img src=\"$downarrow\" border=\"0\"></a>";
            break;
            
        case "N-D":
            // name desc
            $order = "order by 2 desc ";
            $sortLinks["N"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('N-A');\"><img src=\"$downarrow\" border=\"0\"></a>";
            break;
            
        case "N-A":
        default:
            // name desc
            $order = "order by 2 ";
            $sortLinks["N"]="<a href=\"javascript: void(0);\" onclick=\"return changeSorting('N-D');\"><img src=\"$uparrow\" border=\"0\"></a>";
            break;
            
    } // switch ordering
    
    // Get the total number of records
    $qrysql  = "select count(*) ";
    $qrysql .= "from #__events_registrations r left join #__events_sessions s on (r.session_id=s.session_id) ";
    $qrysql .= "left join #__users u on (r.userid=u.id) ";
    $qrysql .= " $where ";
    $database->setQuery($qrysql);
    $total = $database->loadResult();
    
    // handle the page navigation
    include_once( "includes/pageNavigation.php" );
    $pageNav = new mosPageNav($total, $limitstart, $limit);
    
    // get the session list so we can filter
    $sessionFilters = array();
    $sessionFilters[] = mosHTML::makeOption('0',_ESESS_RFILTER_CHOOSE);
    $sessionFilters[] = mosHTML::makeOption('-1',_ESESS_RFILTER_ALL);
    $qrysql  = "select distinct r.session_id as value, s.title as text from #__events_registrations r ";
    $qrysql .= "inner join #__events_sessions s on (r.session_id=s.session_id) ";

    //$qrysql .= "where (r.cancel_date is null) or (r.cancel_date = '0') order by 2";
    $qrysql .= "ORDER by 2";
    $database->setQuery( $qrysql );
    $sessionFilters = array_merge( $sessionFilters, $database->loadObjectList() );
    $lists["filter"] = mosHTML::selectList( $sessionFilters, 'filter', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $filter );
    unset($sessions);
    
    // build the query to get the data to display
    $qrysql  = "select r.registration_id, r.fullname, ";
    $qrysql .= "r.email, s.title, r.registration_date, r.numregistrations, r.viewed, ";
    $qrysql .= "r.status "; 
    $qrysql .= "from #__events_registrations r left join #__events_sessions s on (r.session_id=s.session_id) ";
    $qrysql .= " $where ";
    $qrysql .= "$order";
    $qrysql .= "limit ".$pageNav->limitstart.", ".$pageNav->limit;
    
    // get the data to display 
    $database->setQuery($qrysql);
    $rows = $database->loadObjectList();
    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    }
    
    // call the object to display the list
    HTML_Events_Sessions::listRegistrations( $rows, $pageNav, $option, $search, $lists, $sortLinks );
    
} // showRegistrations()


/**
* View the Registration information for a given record
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @param int $id Id of the session to display - 0 means new
* @return void
*/
function viewRegistrations($id, $option) {
    global $database, $my;
    
    // create an instance of the table class
    $row = new mosEventsRegistrations($database);
    
    // set this record as viewed
    $row->viewed($id);
    unset($row);
    
    // build the query to get the data to display
    $qrysql  = "SELECT r.registration_id, r.fullname, ";
    $qrysql .= "r.email, s.title, r.registration_date, r.numregistrations, r.cancel_date, r.status ";
    $qrysql .= "FROM #__events_registrations r left join #__events_sessions s on (r.session_id=s.session_id) ";
    $qrysql .= "WHERE r.registration_id=$id ";
    
    // get the data to display 
    $database->setQuery($qrysql);
    $database->loadObject($row);
    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    }
    
    
    
    /*
     * Load Any Custom Fields (and their respective options)...
     */
    $qry  = "SELECT session_id";
    $qry .= "\nFROM #__events_registrations";
    $qry .= "\nWHERE registration_id=" . $id;
    $database->setQuery($qry);
    $database->loadObject($thisRegistration);
    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    }
         
     
    $qry  = "SELECT *";
    $qry .= "\nFROM #__events_registration_fields";
    $qry .= "\nWHERE session_id=" . $thisRegistration->session_id;
    $qry .= "\nORDER by ordering";
    $database->setQuery($qry);  
    $customFields = $database->loadObjectList();
    

    /*
     * Load Any Previously Saved Registration Custom Field Data
     */
    $qry  = "SELECT *";
    $qry .= "\nFROM #__events_registration_fields_values";
    $qry .= "\nWHERE registration_id=" . $id;
    $database->setQuery($qry);  
    $customValues = $database->loadObjectList();
    
    
    // display the form
    HTML_Events_Sessions::viewRegistrations($row, $option, $customFields, $customValues);
} // viewRegistrations()


/**
* Cancels an Registration processing
*
* Returns to the list page of an option
*
* @access   private
* @param    string $option Name of the component - use by some mos functions
* @return   void  
*/
function cancelRegistrations($option) {
    global $database;
    
    // redirect back to the list page
    mosRedirect( "index2.php?option=$option&amp;act=registrations" );
} // cancelRegistrations()


/**
* Deletes the selected Registrations
* 
* Does not actually delete but sets the cancel_date to now
* 
* @access private
* @param array $cid Array of ids to delete
* @param string $option Name of the component - use by some mos functions
* @return void
*/
function removeRegistrations($cid, $option) {
    global $database;
    
    // validate that cid is ok
    if (!is_array($cid) or count($cid) < 1) {
        echo "<script> alert('"._ESESS_DELETE_REG_MSG."'); window.history.go(-1);</script>\n";
        exit;
    }
    
    /*
     * Delete registration and custom field values
     */
    
	if (count( $cid )) {
		$cids = implode( ',', $cid );		
		
		// remove the events
		$database->setQuery( "DELETE FROM #__events_registrations WHERE registration_id IN ($cids)" );
		if (!$database->query()) {
		  	echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
		  	exit;
		}
		
		/*
		 * Delete custom fields for these sessions
		 */
		$database->setQuery( "DELETE FROM #__events_registration_fields_values WHERE registration_id IN ($cids)" );
		if (!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
		  	exit;
		}	
	}
    
    // return to the list page
    cancelRegistrations($option);
} // removeRegistrations()




function emailRegistrants($ids, $option) {

    HTML_Events_Sessions::composeEmail($ids, $option);
}


function sendRegistrantsEmail($ids, $option) {
	global $database, $my, $acl;
	global $mosConfig_sitename;
	global $mosConfig_mailfrom, $mosConfig_fromname;

	$mode				= mosGetParam( $_POST, 'mm_mode', 0 );
	$subject			= mosGetParam( $_POST, 'mm_subject', '' );
	
	// pulls message inoformation either in text or html format
	if ( $mode ) {
		$message_body	= $_POST['mm_message'];
	} else {
		// automatically removes html formatting
		$message_body	= mosGetParam( $_POST, 'mm_message', '' );
	}
	$message_body 		= stripslashes( $message_body );

	if (!$message_body || !$subject === null) {
		mosRedirect( 'index2.php?option=com_attend_events&amp;task=email' );
	}
	
	
	// Build e-mail message format
	$message_header 	= sprintf( _MASSMAIL_MESSAGE, $mosConfig_sitename );
	$message 			= $message_header . $message_body;
	$subject 			= $mosConfig_sitename. ' / '. stripslashes( $subject);

	$results = array();
	for ($thisId = 0; $thisId < count($ids); $thisId++) {
	
		// Get registrants email address
		$query  =    "SELECT r.email, r.fullname";
		$query .= "\n FROM #__events_registrations as r";
		$query .= "\n WHERE r.registration_id = " . $ids[$thisId];
		$database->setQuery( $query );
		$registrant = $database->loadObjectList();


		$results[$thisId]->name = $registrant[0]->fullname;
		$results[$thisId]->outcome = mosMail( $mosConfig_mailfrom, $mosConfig_fromname, $registrant[0]->email, $subject, $message, $mode );
	}

	HTML_Events_Sessions::displaySendEmailResult($results, $option);
	
}



/**
* Displays the Export Details page
*
* @access private
* @param array $cid Array of ids to delete
* @param string $option Name of the component - use by some mos functions
* @return void
*/
function displayExportRegistrations($ids, $option) {
    global $database, $mainframe;
    
    // get some data from the request information
    $sessionid = $mainframe->getUserStateFromRequest( "session_id", 'session_id', 0 );
    $search = $mainframe->getUserStateFromRequest("search".$option, "search", '');
    $search = $database->getEscaped(trim(strtolower($search)));
    
    // display the form
    HTML_Events_Sessions::showExport($ids, $option, $sessionid, $search);
} // displayExportRegistrations()





/**
* Determine the export type and return the data
* 
* @access private
* @param array $ids Array of ids to delete
@return void
*/
function exportRegistrations($ids, $option) {
    global $mainframe;
    
    // determine the method
    $method = $mainframe->getUserStateFromRequest( "export_method", "export_method", "" );
    $filename = $mainframe->getUserStateFromRequest( "filename", "filename", "" );
    
    // process based on the method
    switch ($method) {
        case "csv":
            $data = exportCSV($ids, $option);
            break;
        
        default:
            echo "<script> alert('"._ESESS_EXPORT_MSG."'); window.history.go(-1);</script>\n";
            exit;
            break;
    }
    
    
    $size = strlen($data);
    
    @ob_end_clean();
    @ini_set("zlib.output_compression", "Off");
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: private");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$filename");
    header("Accept-Ranges: bytes");
    header("Content-Length: $size");
    echo $data;
    exit();
    
} //exportRegistrations()


/*
* Function to export data as CSV
* 
* Currently uses a default CSV format
* 
* @access private
* @param array $cid Array of ids to delete
* @return string CSV data
*/
function exportCSV($ids, $option) {
    global $database, $mainframe;
    
    // get some data from the request information
    $filter = intval($mainframe->getUserStateFromRequest( "filter{$option}", 'filter', 0 ));
    $search = $mainframe->getUserStateFromRequest("search".$option, "search", '');
    $search = $database->getEscaped(trim(strtolower($search)));
    
    // default csv options
    $titles = true;
    $fieldTerminator = ",";
    $fieldEnclosed = "\"";
    $fieldEscaped = "\\";
    $lineTerminator = "\n";

    
    // determine if there is anything to search for
    $where = "WHERE (r.numregistrations > 0) ";
    //$where = "where ((r.cancel_date=0) or (r.cancel_date is null))";
    if (!empty($search)) {
        $where .= "and ((lower(s.title) like '%$search%') or";
        $where .= " (lower(r.fullname) like '%$search%') or ";
        $where .= " (lower(u.name) like '%$search%') or ";
        $where .= " (lower(r.email) like '%$search%')) ";
    }
    
    
    
    // check to see if we need to process ids
    if (strlen($ids)>0) {
    	if (strcmp($ids,'0') != 0) {
        	// add the where clause
        	$where .= "and (r.registration_id in ($ids)) ";
        }
    }
    
    // determine if there was a session selected
    if ($filter>0) {
        $where .= "and (r.session_id=$filter) ";
    }
    
    // build the query to get the data to display
    
    //$qrysql  = "select case when r.userid=0 then r.fullname else u.name end as fullname, ";
    $qrysql  = "SELECT r.fullname, ";
    $qrysql .= "r.email, s.title, r.registration_date, r.numregistrations, r.viewed, r.registration_id ";
    //$qrysql .= "r.address, r.city, r.state, r.pcode, r.country, r.phone, r.fax, r.notes "; 
    $qrysql .= "FROM #__events_registrations AS r left JOIN #__events_sessions AS s ON (r.session_id=s.session_id) ";
    //$qrysql .= "left join #__users u on (r.userid=u.id) ";
    $qrysql .= " $where ";
          
      
    // get the data to display 
    $database->setQuery($qrysql);
    $rows = $database->loadAssocList();
    if ($database->getErrorNum()) {
        echo "<script> alert('".$database->stderr()."'); window.history.go(-1);</script>\n";
        return false;
    }
    
    // figure out what sessions are involved
    $query = "SELECT r.session_id FROM #__events_registrations AS r " . $where . " GROUP BY r.session_id";
    $database->setQuery($query);
    $sessions = $database->loadResultArray();
    if ($database->getErrorNum()) {
        echo "<script> alert('".$database->stderr()."'); window.history.go(-1);</script>\n";
        return false;
    }  
    $sessions = implode(',',$sessions);
  
  
    // initialise the data 
    $data = "";
    
    
    if ($titles) {
    	$fieldLabels = array();
    	$fieldLabels[] = constant("_ESESS_FIELD_FULLNAME");
    	$fieldLabels[] = constant("_ESESS_FIELD_EMAIL");
    	$fieldLabels[] = constant("_ESESS_FIELD_TITLE");
    	$fieldLabels[] = constant("_ESESS_RLIST_RDATE");
    	$fieldLabels[] = constant("_ESESS_FIELD_NUM_PEOPLE");
    	
    	$fieldNames = array();
    	$fieldNames[] = "fullname";
    	$fieldNames[] = "email";
    	$fieldNames[] = "title";
    	$fieldNames[] = "registration_date";
    	$fieldNames[] = "numregistrations";
    	
        
        $fieldLabels = array_merge($fieldLabels,AE_CustomFields::loadFieldLabels($sessions));
        $fieldNames = array_merge($fieldNames,AE_CustomFields::loadFieldLabels($sessions));
        
        foreach ($fieldLabels as $fieldLabel) {
			$value = $fieldLabel;
			$data .= $fieldEnclosed.str_replace($fieldEnclosed, $fieldEscaped.$fieldEnclosed, $value).$fieldEnclosed;
			$data .= $fieldTerminator;
        }
        
        // Remove the dangling fieldTerminator, and add a lineTerminator
        $data = substr($data,0,strlen($data) - strlen($fieldTerminator)) . $lineTerminator; 
    } // titles
        
    // parse each row
    foreach ($rows as $row) {
    	// Load data stored in dynamic registration fields
    	$fieldValues = AE_CustomFields::loadSavedValues($row["registration_id"]);
		
    	foreach ($fieldValues as $fieldValue) {
    		$row = array_merge( $row, array( $fieldValue["name"] => $fieldValue["value"] ) );
    	}
    	
        // parse each field
        foreach ($fieldNames as $fieldName) {
			$value = $row[$fieldName];
			$data .= $fieldEnclosed.str_replace($fieldEnclosed, $fieldEscaped.$fieldEnclosed, $value).$fieldEnclosed;
			$data .= $fieldTerminator;
        } // foreach row
        
        // Remove the dangling fieldTerminator, and add a lineTerminator
        $data = substr($data,0,strlen($data) - strlen($fieldTerminator)) . $lineTerminator; 

    } // foreach rows
    
    return $data;
} // exportCSV()


function showVenues($option) {
	global $mainframe, $database, $mosConfig_list_limit;

    $limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit );
    $limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );
    $search = $mainframe->getUserStateFromRequest("search{$option}", "search", '');
    $search = $database->getEscaped(trim(strtolower($search)));


    // Get the total number of records
    $qrysql  = "SELECT count(*) ";
    $qrysql .= "FROM #__events_venues AS v ";
    if (!empty($search)) {
    	$qrysql .= "WHERE (lower(v.name) like '%$search%') ";
    }
    $database->setQuery($qrysql);
    $total = $database->loadResult();
    
    // handle the page navigation
    include_once( "includes/pageNavigation.php" );
    $pageNav = new mosPageNav($total, $limitstart, $limit);
    
    // build the query to get the data to display
    $qrysql  = "SELECT v.venue_id, v.name, v.address, v.city, v.state, v.postalcode, v.country, v.webaddress, ";
    $qrysql .= "v.checked_out, v.checked_out_time, u.name as editor ";
    $qrysql .= "FROM #__events_venues AS v ";
    $qrysql .= "left join #__users u on (v.checked_out=u.id) ";
    if (!empty($search)) {
    	$qrysql .= "WHERE (lower(v.name) like '%$search%') ";
    }
    $qrysql .= "LIMIT ".$pageNav->limitstart.", ".$pageNav->limit;

    // get the data to display 
    $database->setQuery($qrysql);
    $rows = $database->loadObjectList();
    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    }
    
    // call the object to display the list
    HTML_Events_Sessions::listVenues( $rows, $pageNav, $option, $search );



}


function editVenues($id, $option) {
    global $database, $my;
    
    // create an instance of the table class
    $row = new mosEventsVenues($database);
    
    // Load the row from the db table
    $row->load($id);
    
    if ($id!=0) {
        $row->checkout( $my->id );
    }

 	HTML_Events_Sessions::editVenues($row, $option);
}

function saveVenues($option) {
    global $database; 

    // create an instance of the table class
    $row = new mosEventsVenues( $database );    
    
    // attempt to bind the class to the data posted
    if (!$row->bind($_POST)) {
        echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
        exit();
    }
    
    // check the record
    if (!$row->check()) {
        echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
        exit();
    }
    
    // attempt to insert/update the record    
    if (!$row->store()) {
        echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
        exit();
    }
    
    // save succesful.  Check-in the row to allow others to access it
    $row->checkin();

	cancelVenues($option);
}

function cancelVenues($option) {
    global $database;
    
    // perform any check-ins needed
    $row = new mosEventsVenues( $database );
    $row->bind( $_POST );
    $row->checkin();
    
    // redirect back to the list page
    mosRedirect( "index2.php?option=$option&amp;act=venues" );
} // cancelSessions()

function removeVenues($cid, $option) {
	global $database;

    // validate that cid is ok
    if (!is_array($cid) or count($cid) < 1) {
        echo "<script> alert('"._ESESS_DELETE_VENUE_MSG."'); window.history.go(-1);</script>\n";
        exit;
    }
    
    /* 
     * Code based on Tony Blair's removeSessions didn't seem to work...  Instead, this code 
     * is based off the tutorial at mambohut.com.  It appears to work correctly.
     */
	if (count( $cid )) {
		$cids = implode( ',', $cid );
		
		// Remove any venue information in the sessions table that links to these events
		$database->setQuery( "UPDATE #__events_sessions SET venue_id = NULL WHERE venue_id IN ($cids)" );
		if (!$database->query()) {
		  echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
		}		
		
		// remove the events
		$database->setQuery( "DELETE FROM #__events_venues WHERE venue_id IN ($cids)" );
		if (!$database->query()) {
		  echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>n";
		}
		
	
	}
    
    // return to the list page
    cancelVenues($option);
    
}


function uninstall() {
	global $database;
	
	$database->setQuery("DROP TABLE IF EXISTS `#__events_sessions`");
	$database->query();
	
	$database->setQuery("DROP TABLE IF EXISTS `#__events_registrations`");
	$database->query();	

	$database->setQuery("DROP TABLE IF EXISTS `#__events_registration_fields`");
	$database->query();	
	
	$database->setQuery("DROP TABLE IF EXISTS `#__events_registration_fields_options`");
	$database->query();	

	$database->setQuery("DROP TABLE IF EXISTS `#__events_registration_fields_values`");
	$database->query();

	$database->setQuery("DROP TABLE IF EXISTS `#__events_venues`");
	$database->query();					
		
	$msg = urlencode(_ESESS_UNINSTALL_MESSAGE);	
		
	mosRedirect( "index2.php?option=com_installer&amp;element=component&amp;mosmsg=$msg" );
}



function exportConfigurationFile($option) {
	global $mosConfig_absolute_path;

	if (!($data = file_get_contents($mosConfig_absolute_path."/components/$option/config.attend_events.php"))) {
		trigger_error("Could not locate Attend Events configuration file!",E_ERROR);
	} else {
		$size = strlen($data);
		$filename = "config.attend_events.php";
    
		@ob_end_clean();
		@ini_set("zlib.output_compression", "Off");
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: private");
		header("Content-Type: text/plain");
		header("Content-Disposition: attachment; filename=$filename");
		header("Accept-Ranges: bytes");
		header("Content-Length: $size");
		echo $data;
		exit();
	}
}



/**
* Performs any actins required to upgrade the table structure
* 
* @access private
* @return void
*/
function upgrade() {
    global $database, $mosConfig_dbprefix;
    
    $queries = array();
    
    /*
     * Upgrade from previous versions to 0.8.0
     */
    echo "<table class=\"adminform\">";
    echo "<tr><th colspan=\"2\">UPGRADING TO 0.8.0</th></tr>";

	if (!in_array($mosConfig_dbprefix . "events_registration_fields",$database->getTableList())) {
	
		/* Create the dynamic fields table */
		echo "<tr><td>Creating `#__events_registration_fields`</td>";
		$database->setQuery("CREATE TABLE IF NOT EXISTS `#__events_registration_fields` (
			`field_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
			`session_id` INT UNSIGNED NOT NULL DEFAULT 0,
			`name` VARCHAR(100),
			`type` VARCHAR(100),
			`ordering` INT UNSIGNED DEFAULT 0,
			`size` INT UNSIGNED DEFAULT 50,
			`maxlength` INT UNSIGNED DEFAULT 100,
			`default` VARCHAR(50),
			`cb_integration` VARCHAR(100) DEFAULT NULL,
			`tooltip` TEXT,
			`rows` INT UNSIGNED DEFAULT 0,
			`cols` INT UNSIGNED DEFAULT 0,
			`required` TINYINT(1) NOT NULL DEFAULT 0,
			PRIMARY KEY(field_id)
			) TYPE=MYISAM;");
		$database->query();
		if ($database->getErrorMsg()) {
			echo "<td>" . stripslashes($database->getErrorMsg()) . "</td></tr>";
		} else {
			echo "<td>Success</td></tr>";
		}
	
		/* Create the dynamic fields options table */
		echo "<tr><td>Creating `#__events_registration_fields_options`</td>";
		$database->setQuery("CREATE TABLE IF NOT EXISTS `#__events_registration_fields_options` (
				`option_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`field_id` INT UNSIGNED NOT NULL DEFAULT 0,
				`session_id` INT UNSIGNED NOT NULL DEFAULT 0,
				`name` VARCHAR(100),
				`ordering` INT UNSIGNED DEFAULT 0,
                PRIMARY KEY(option_id)
                ) TYPE=MYISAM;");
		$database->query();
		if ($database->getErrorMsg()) {
			echo "<td>" . stripslashes($database->getErrorMsg()) . "</td></tr>";
		} else {
			echo "<td>Success</td></tr>";
		}
		
		echo "<tr><td>Converting 0.7.x static fields to 0.8.x dynamic structures</td>";
		$database->setQuery("SELECT session_id FROM #__events_sessions");
		$database->query();
		$rows = $database->loadObjectList();
		$sessions = array();
		foreach ($rows as $row) {
			$fieldNames = array("address", "city", "state", "country", "pcode", "phone", "fax", "notes");
			for ($i = 0; $i < count($fieldNames); $i++) {
				unset($thisFieldsInfo);
				unset($dynamicFieldRow);
				$dynamicFieldRow = new mosEventsRegistrationFields( $database );
				$thisFieldsInfo = array();
				$thisFieldsInfo['name'] = $fieldNames[$i];
				$thisFieldsInfo['type'] = 'text';
				$thisFieldsInfo['tooltip'] = null;
				$thisFieldsInfo['session_id'] = $row->session_id;
				$thisFieldsInfo['ordering'] = $i;
				$thisFieldsInfo['cb_integration'] = null;
				$thisFieldsInfo['size'] = null;
				$thisFieldsInfo['maxlength'] = null;
				$thisFieldsInfo['default'] = null;
				$thisFieldsInfo['required'] = 0;
				$thisFieldsInfo['fieldRows'] = 0;
				$thisFieldsInfo['fieldCols'] = 0; 
				$dynamicFieldRow->bind($thisFieldsInfo);
				$dynamicFieldRow->check();
				$dynamicFieldRow->store();
			}
		}
		echo "<td>Success</td></tr>";
	} else {
		echo "<tr><td>Creating `#__events_registration_fields`</td><td>Not Necessary</td></tr>";
		echo "<tr><td>Creating `#__events_registration_fields_options`</td><td>Not Necessary</td></tr>";
		echo "<tr><td>Converting 0.7.x static fields to 0.8.x dynamic structures</td><td>Not Necessary</td></tr>";
	}
	
	if (!in_array($mosConfig_dbprefix . "events_registration_fields_values",$database->getTableList())) {
		echo "<tr><td>Creating `#__events_registration_fields_values`</td>";
		$database->setQuery("CREATE TABLE IF NOT EXISTS `#__events_registration_fields_values` (
			    `value_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`registration_id` INT UNSIGNED NOT NULL DEFAULT 0,
				`field_id` INT UNSIGNED NOT NULL DEFAULT 0,
				`value` TEXT,
                PRIMARY KEY(value_id)
                ) TYPE=MYISAM;");
		$database->query();
		if ($database->getErrorMsg()) {
			echo "<td>" . stripslashes($database->getErrorMsg()) . "</td></tr>";
		} else {
			echo "<td>Success</td></tr>";
		}
		
		echo "<tr><td>Loading 0.7.x static field values into 0.8.x dynamic structures</td><td>";
		$errorMsg = "";
		// Convert registration information...
		$database->setQuery("SELECT * FROM #__events_registrations");
		$rows = $database->loadObjectList();
		foreach ($rows as $row) {
			$fieldNames = array("address", "city", "state", "country", "pcode", "phone", "fax", "notes");
			for ($i = 0; $i < count($fieldNames); $i++) {
				unset($dynamicFieldRow);
				unset($thisFieldsInfo);
				$dynamicFieldRow = new mosEventsRegistrationFieldValue( $database );
				$thisFieldsInfo = array();
				
				
				$database->setQuery("SELECT field_id FROM #__events_registration_fields WHERE (STRCMP(name,'" . $fieldNames[$i] . "') = 0) AND (session_id=" . $row->session_id . ")");
			
				$thisFieldsInfo["registration_id"] = $row->registration_id;
				$thisFieldsInfo["field_id"] = $database->loadResult();
				$thisFieldsInfo["value"] = $row->{$fieldNames[$i]};
				
				$dynamicFieldRow->bind($thisFieldsInfo);
				$dynamicFieldRow->check();
				if (!$dynamicFieldRow->store()) {
					$errorMsg .= $dynamicFieldRow->getError();
				}
			}
		}
		if (!empty($errorMsg)) {
			echo $errorMsg;
		} else {
			echo "Success";
		}
		echo "</td></tr>";
		
		
		
		if (!empty($errorMsg)) {
			echo "<tr><td>Updating `#__events_registrations` table</td><td>Not Necessary</td></tr>";
		} else {
			echo "<tr><td>Updating `#__events_registrations` table</td>";
			$database->setQuery("ALTER TABLE  `#__events_registrations` DROP `address`, DROP `city`, DROP `state`, DROP `country`, DROP `pcode`, DROP `phone` ,DROP `fax`, DROP `notes`, ADD `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0, ADD `comments` TEXT");
			$database->query();
			if ($database->getErrorMsg()) {
				echo "<td>" . stripslashes($database->getErrorMsg()) . "</td></tr>";
			} else {
				echo "<td>Success</td></tr>";
			}			
		}
		
	} else {
		echo "<tr><td>Creating `#__events_registration_fields_values`</td><td>Not Necessary</td></tr>";
		echo "<tr><td>Loading 0.7.x static field values into 0.8.x dynamic structures</td><td>Not Necessary</td></tr>";
	}


    echo "<tr><td>Creating `#__events_venues`</td><td>";
    if (!in_array($mosConfig_dbprefix . "events_venues",$database->getTableList())) {

		$database->setQuery("CREATE TABLE IF NOT EXISTS `#__events_venues` (
			    `venue_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`name` VARCHAR(100),
				`address` VARCHAR(100),
				`city` VARCHAR(100),
				`state` VARCHAR(100),
				`postalcode` VARCHAR(100),
				`country` VARCHAR(100),
				`webaddress` VARCHAR(100),
				`checked_out` INT UNSIGNED NOT NULL DEFAULT 0,
				`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                PRIMARY KEY(venue_id)
                ) TYPE=MYISAM;");
		$database->query();
		$errorMsg = $database->getErrorMsg();
    	
    	if (!empty($errorMsg)) {
    		echo $errorMsg;
    	} else {
    		echo "Success";
    	}
    } else {
    	echo "Not Necessary";
    }
    echo "</td></tr>";



	echo "<tr><td>Updating `#__events_sessions` table</td><td>";
	$errorMsg = "";
	$updatePerformed = false;
	$sessionFields = getTableFields("#__events_sessions");
	if (in_array("startdate",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` CHANGE  `startdate`  `registration_up` DATETIME NOT NULL DEFAULT  '0000-00-00 00:00:00'");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}
	if (in_array("enddate",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` CHANGE  `enddate`  `registration_down` DATETIME NOT NULL DEFAULT  '0000-00-00 00:00:00'");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}    
	if (!in_array("session_up",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` ADD `session_up` DATETIME NOT NULL DEFAULT  '0000-00-00 00:00:00'");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	} 
	if (!in_array("session_down",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` ADD `session_down` DATETIME NOT NULL DEFAULT  '0000-00-00 00:00:00'");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	} 
	if (in_array("minregistrations",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` DROP `minregistrations`");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}
	if (in_array("created_by",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` DROP `created_by`");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}
	if (in_array("flags",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` DROP `flags`");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}
	if (in_array("thankyou",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` DROP `thankyou`");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}			
	if (in_array("confirm_email",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` DROP `confirm_email`");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}
	if (in_array("confirm_subject",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` DROP `confirm_subject`");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}
	if (in_array("confirm_msg",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` DROP `confirm_msg`");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}
	if (in_array("notify_subject",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` DROP `notify_subject`");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}
	if (in_array("notify_msg",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` DROP `notify_msg`");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}
	if (in_array("cancel_subject",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` DROP `cancel_subject`");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}
	if (in_array("cancel_msg",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` DROP `cancel_msg`");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}
	if (!in_array("venue_id",$sessionFields)) {
		$updatePerformed = true;
		$database->setQuery("ALTER TABLE  `#__events_sessions` ADD `venue_id` INT UNSIGNED DEFAULT NULL,
				ADD `venue_name` VARCHAR(50),
				ADD `venue_address` TEXT,
				ADD `venue_city` VARCHAR(50),
				ADD `venue_state` VARCHAR(50),
				ADD `venue_postalcode` VARCHAR(50),
				ADD `venue_country` VARCHAR(50),
				ADD `venue_webaddress` VARCHAR(255)");
		$database->query();
		$errorMsg .= $database->getErrorMsg();
	}	
	
	
	if (!empty($errorMsg)) {
		echo $errorMsg;
	} else {
		if ($updatePerformed) {
			echo "Success";
		} else {
			echo "Not Necessary";
		}
	}
	echo "</td></tr>";
    
    
    
    echo "<tr><td>Updating Admin Menus</td><td>";
    $database->setQuery("SELECT id FROM #__components WHERE admin_menu_link='option=com_attend_events' ");
    $parentID = $database->loadResult();
    $database->setQuery("SELECT count(*) FROM #__components WHERE admin_menu_link='option=com_attend_events&act=venues' ");
    if ($database->loadResult() == 0) {
    	$database->setQuery("INSERT INTO  `#__components` (  `id` ,  `name` ,  `link` ,  `menuid` ,  `parent` ,  `admin_menu_link` ,  `admin_menu_alt` ,  `option` ,  `ordering` ,  `admin_menu_img` ,  `iscore` ,  `params` ) 
VALUES (
'',  'Venues',  '',  '0',  '" . $parentID . "',  'option=com_attend_events&act=venues',  'Venues',  'com_attend_events',  '1',  'js/ThemeOffice/component.png',  '0',  '');");
		$database->query();
		$errorMsg = $database->getErrorMsg();
		if (!empty($errorMsg)) {
			echo $errorMsg;
		} else {
			echo "Success";
		}
    } else {
    	echo "Not Necessary";
    }
    echo "</td></tr>";
    
    
    
    echo "</table>";
    
    


    
    // make sure the admin menu icons are correct

        $qrysql  = "UPDATE #__components SET admin_menu_img='js/ThemeOffice/categories.png' ";
        $qrysql .= "WHERE admin_menu_link='option=com_attend_events&act=sessions'";
        $database->setQuery($qrysql);
        $database->query();
        
        $qrysql  = "UPDATE #__components SET admin_menu_img='js/ThemeOffice/users.png', ordering=2 ";
        $qrysql .= "WHERE admin_menu_link='option=com_attend_events&act=registrations'";
        $database->setQuery($qrysql);
        $database->query();
        
        $qrysql  = "UPDATE #__components SET admin_menu_img='js/ThemeOffice/controlpanel.png', ordering=3 ";
        $qrysql .= "WHERE admin_menu_link='option=com_attend_events&act=config'";
        $database->setQuery($qrysql);
        $database->query();
    
    
} // upgrade()



function getTableFields($tableName) {
	global $database;

    $dbColumns = array();
    $database->setQuery("SHOW COLUMNS FROM " . $tableName);
    $database->query();
    $rows = $database->loadRowList();
        
    foreach ($rows as $row) {
    	$dbColumns[] = $row[0];
    }
    
    
	return $dbColumns;
}

?>
