<?php
/**
* @version $Id: attend_events.php 28 2007-02-23 23:32:11Z pcarr $
* @package Attend Events
* @copyright (C) 2004 Tony Blair
* @copyright (C) 2005-06 Peter Carr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* Events Session Module
* 
* Looks at the components to see if it is com_events
* Then checks for the task of view
* Then grabs the ID to see if this event has sessions
* 
* Finally displays a list of the sessions that can be registered in
* 
* If no sessions exist or we are not viewing the Events component then display nothing
* 
*/


require_once( $mainframe->getPath( "front_html" ) );
require_once( $mainframe->getPath( "class" ) );
require_once( $mosConfig_absolute_path."/components/$option/config.attend_events.php");

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
	// Version 1.3+ Compatibility
	if (file_exists($mosConfig_absolute_path . '/administrator/components/com_events/lib/config.php')) {
		$cfgclass = $mosConfig_absolute_path . '/administrator/components/com_events/lib/config.php';
		require_once($cfgclass);
		$cfg = & EventsConfig::getInstance();
	}
}


// determine if we can/should integrate with Community Builder
$disableCB = (!is_dir($mosConfig_absolute_path."/components/com_comprofiler"));
if ($disableCB) { $eSess["cbIntegrated"] = false; } 





// get the parameters passed
$task = strval( mosGetParam( $_REQUEST, 'task', '') );
$id = 	intval( mosGetParam( $_REQUEST, 'id', 	0 ) );
$pop = 	intval( mosGetParam( $_REQUEST, 'pop', 	0 ) );


// PREVENT Itemid MISSING
if (!isset($Itemid) || empty($Itemid)){
    $database->setQuery("SELECT id FROM #__menu WHERE link = 'index.php?option=$option'");
    $_REQUEST['Itemid'] = $database->loadResult();   
} 
$Itemid = intval( mosgetParam( $_REQUEST, 'Itemid') );

// determine what to do
switch ($task) {
    case "view":
        // view the details of the selected session
        viewSession($id, $option, $Itemid, $pop);
        break;
        
    case "register":
        // save the registration details
        saveRegistration($id, $option, $Itemid);
        break;
    
    case "update":
        // update the registration details - registered users only
        saveRegistration($id, $option, $Itemid);
        break;
    
    case "cancel":
        // cancel the registration - registered users only
        cancelRegistration($id, $option, $Itemid);
        break;
        
    default:
        // display the default list of sessions available
        listSessions($option, $Itemid);
        break;
}

// display a footer for these pages
if ($eSess["displayFooter"]) {
?>
    <hr />
	<p align="center"><b><a href="http://developer.joomla.org/sf/sfmain/do/viewProject/projects.attendevents">Attend Events</a> 0.8.2</b><br />
    <span style="font-size: 8pt;">A fork of <b><a href="http://mamboforge.net/projects/eventssessions/">Events Sessions</a> 0.6.0 Beta</b> by Tony Blair and <a href="http://www.sm2.com.au" target="_blank">SM2</a></span></p>
<?php
}

/**
* Main functions start here
*/

/**
* Display a list of session records
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @param int $Itemid Id of the Mambo Item that displayed this
* @return void
*/
function listSessions($option, $Itemid) {
    global $database, $mosConfig_absolute_path, $my, $eSess;
    
    // create an instance of the table class
    $row = new mosEventsSessions($database);
    
    // check for any new status changed
    $row->updateStatus();
    unset($row);
    
    // determine which sessions are available to the user
    if (!$eSess["showAll"]) {
		$isRegistered = true;
		if (empty($my->usertype)) $isRegistered = false;
		
		$allowedAvail = array(0);
		// set the session avail
		if ($isRegistered) {
			$allowedAvail[]=1;
		} else {
			 $allowedAvail[]=2;
		}
	
		// determine what the global value is
		switch ($eSess["registrationsFrom"]) {
			case 0:
				// Everyone
				$allowedAvail[]=3;
				break;
			case 1:
				// Registered
				if ($isRegistered) $allowedAvail[]=3;
				break;
			case 2:
				// Guest
				if (!$isRegistered) $allowedAvail[]=3;
				break;
		}
	} else {
		$allowedAvail = array(0,1,2,3);
	}
    
    /* 
     * Determine what sessions to list (based on new config options).
     * Original code did this based on session status... 
     */
    switch ($eSess["startListing"]) {
    	case 0:
    		$startCondition = "1=1";
    		break;
    	case 1:
    		$startCondition = "s.registration_up <= now()";
    		break;
    	case 2:
    		$startCondition = "s.registration_down <= now()";
    		break;
       	case 3:
    		$startCondition = "s.session_up <= now()";
    		break;
    	case 4:
    		$startCondition = "s.session_down <= now()";
    		break;
    }
    switch ($eSess["stopListing"]) {
    	case 1:
    		$stopCondition = "registration_up >= now()";
    		break;
    	case 2:
    		$stopCondition = "registration_down >= now()";
    		break;
       	case 3:
    		$stopCondition = "session_up >= now()";
    		break;
    	case 4:
    		$stopCondition = "session_down >= now()";
    		break;
    }     
     
     
 /*    
    $allowedStatus = array(1);
    if (!$eSess["autoFull"] || $eSess["showFull"]) $allowedStatus[]=2;
    if ($eSess["startListing"] == 0) $allowedStatus[]=0;
    
    // build the query to get the data to display
    if ($eSess["eventIntegrated"]) {
        // this query uses the events components because it exists
        */
        /* 
         * Modified query to use fields created in Attend Events 0.0.2 
         * Only show linked event title if this has been selected as a configuration option
         */
         /*
        if ($eSess["showSubject"]) {
        	// include the event subject when displaying
        	$qrysql  = "SELECT s.session_id, case s.event_id when 0 then s.title else concat(s.title,' (',e.title,')') end as title, ";
        } else {
        	// only show the session name (no event info)
        	$qrysql  = "SELECT s.session_id, s.title, ";
        }        $qrysql .= "s.registration_down, s.session_up, s.maxregistrations ";
        $qrysql .= "FROM #__events_sessions s left join #__events e on (s.event_id=e.id) ";
        $qrysql .= "WHERE (e.state=1 or e.state is null) and ";
    } else {
        // this query doesnt look at events because it probably doesnt exist
        $qrysql  = "select s.session_id, s.title, s.session_up, ";
        $qrysql .= "s.registration_down, s.close_after, s.maxregistrations ";
        $qrysql .= "from #__events_sessions s ";
        $qrysql .= "WHERE ";
    }
	$qrysql .= "s.published>=0 and s.availability in (".implode(",",$allowedAvail).") ";
	$qrysql .= "and s.status in (".implode(",",$allowedStatus).") ";
	$qrysql .= "ORDER by 2 ";
*/
	$qrysql  = "SELECT s.session_id, s.title, s.session_up, s.registration_down, s.maxregistrations ";
	$qrysql .= "FROM #__events_sessions s ";
	$qrysql .= "WHERE s.published=1 and " . $startCondition . " and " . $stopCondition;
	if (!$eSess["showFull"]) {
		$qrysql .= " and s.status != 2";
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
    
    // call the object to display the list
    HTML_Events_Sessions::listSessions($rows, $option, $Itemid);
    
} // showSessions()


/**
* View the Session information and display the registration fields
* 
* @access private
* @param string $option Name of the component - used by some mos functions
* @param int $id Id of the session to display - 0 means new
* @param int $Itemid Id of the Mambo Item that displayed this
* @return void
*/
function viewSession($id, $option, $Itemid, $pop) {
    global $database, $my, $mainframe, $mosConfig_absolute_path, $eSess;
    
    // build the query to get the data to display
    if ($eSess["eventIntegrated"]) {
        // this query uses the events components because it exists
		/* 
		 * Modified query to use fields created in Attend Events 0.0.2 
		 */
        $qrysql  = "SELECT s.*, ";
        $qrysql .= "e.title as subject, e.catid, e.content as activity, e.adresse_info as location, ";
        $qrysql .= "e.contact_info as contact, e.extra_info as extra, ";
        $qrysql .= "e.publish_up, e.publish_down ";
        $qrysql .= "FROM #__events_sessions s LEFT JOIN #__events e on (s.event_id=e.id) ";
        $qrysql .= "WHERE s.session_id=$id ";
    } else {
        // this query doesnt look at events because it probably doesnt exist
        $qrysql  = "SELECT * ";
        $qrysql .= "FROM #__events_sessions ";
        $qrysql .= "WHERE session_id=$id ";
    }
    
    // get the session data to display 
    $database->setQuery($qrysql);
    $database->loadObject($row);
    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    }
    
    // determine the number of active registrations for this session
    $qrysql = "select sum(numregistrations) from #__events_registrations where (session_id=$row->session_id) and ((cancel_date = '0') or (cancel_date is null))";
    $database->setQuery($qrysql);
    $row->numregistrations = $database->loadResult();
    if (empty($row->numregistrations)) {
        $row->numregistrations=0;
    }
    
    /*
    * Include the necessary code to perform the start and end date calculations for the event
    */
    if (!empty($row->event_id)) {
        require_once( $mosConfig_absolute_path."/components/com_events/events.html.php");
        if (!class_exists("mosEvents")) {
                require_once( $mosConfig_absolute_path."/components/com_events/events.class.php");
        }
        // CHECK LANGUAGE
        if (!defined( '_CAL_LANG_INCLUDED' )) {
            if (file_exists($mosConfig_absolute_path."/components/com_events/language/".$mosConfig_lang.".php") ) { 
                include_once($mosConfig_absolute_path."/components/com_events/language/".$mosConfig_lang.".php");
            } else { 
                include_once($mosConfig_absolute_path."/components/com_events/language/english.php");
            }
        }
        
        // taken directly from components/com_events/events.php
        // Id: events.php,v 1.17 2004/10/05 07:11:02 davemac2 Exp
        $event_up = new mosEventDate( $row->publish_up );           
        $row->start_date = mosEventsHTML::getDateFormat($event_up->year,$event_up->month,$event_up->day,0);
        $row->start_time = (defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME == "YES") ? $event_up->get12hrTime() : $event_up->get24hrTime();
        $event_down = new mosEventDate( $row->publish_down );           
        $row->stop_date = mosEventsHTML::getDateFormat($event_down->year,$event_down->month,$event_down->day,0);
        $row->stop_time = (defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME == "YES") ? $event_down->get12hrTime() : $event_down->get24hrTime();
        // jul 8th/04  dmcd - kludge for overnite events, advance the displayed stop_date by 1 day
        // when an overniter is detected
        if($row->stop_time < $row->start_time) $event_down->addDays(1);
    }
        
     $lists = array();    
    
    // fix the data in the row slightly
    // copied from events.php
    // Parse http and mailto
    $alphadigit = "([a-z]|[A-Z]|[0-9])";
    
    // Adresse
    $row->location = @preg_replace("/(mailto:\/\/)?((-|$alphadigit|\.)+)@((-|$alphadigit|\.)+)(\.$alphadigit+)/i","<A HREF='mailto:$2@$5$8'>$2@$5$8</A>", $row->location);       
    $row->location = @preg_replace("/(http:\/\/)((-|$alphadigit|\.)+)(\.$alphadigit+)/i", "<A HREF='http://$2$5$8'>$1$2$5$8</A>", $row->location); 
    
    //Contact
    $row->contact = @preg_replace("/(mailto:\/\/)?((-|$alphadigit|\.)+)@((-|$alphadigit|\.)+)(\.$alphadigit+)/i","<A HREF='mailto:$2@$5$8'>$2@$5$8</A>", $row->contact);       
    $row->contact = @preg_replace("/(http:\/\/)((-|$alphadigit|\.)+)(\.$alphadigit+)/i", "<A HREF='http://$2$5$8'>$1$2$5$8</A>", $row->contact); 
    
    //Extra
    $row->extra = @preg_replace("/(mailto:\/\/)?((-|$alphadigit|\.)+)@((-|$alphadigit|\.)+)(\.$alphadigit+)/i","<A HREF='mailto:$2@$5$8'>$2@$5$8</A>", $row->extra);       
    $row->extra = @preg_replace("/(http:\/\/)((-|$alphadigit|\.)+)(\.$alphadigit+)/i", "<A HREF='http://$2$5'>$1$2$5</A>", $row->extra); 
    
    
    // build the query to get the registration data to display
    // this should fetch the data for registered users and nothing for guests
    $qrysql  = "SELECT * FROM #__events_registrations WHERE (session_id=" . $id . ") AND (status=0) ";
    if (!empty($my->usertype)) {
        $qrysql .= "and (userid=$my->id)";
    } else {
        $qrysql .= "and (userid=-1)";
    }
    // get the registration data to display 
    $database->setQuery($qrysql);
    $database->loadObject($registration);
    if ($database->getErrorNum()) {
        echo $database->stderr();
        return false;
    }

    /*
     * Load Any Custom Fields (and their respective options)...
     */
    $qry  = "SELECT *";
    $qry .= "\nFROM #__events_registration_fields";
    $qry .= "\nWHERE session_id=" . $id;
    $qry .= "\nORDER by ordering";
    $database->setQuery($qry);  
    $customFields = $database->loadObjectList();
    
    $qry  = "SELECT *";
    $qry .= "\nFROM #__events_registration_fields_options";
    $qry .= "\nWHERE session_id=" . $id;
    $qry .= "\nORDER by ordering";
    $database->setQuery($qry);  
    $customOptions = $database->loadObjectList();

    /*
     * Load Any Previously Saved Registration Custom Field Data
     */
    if (!isset($registration->registration_id)) {
    	$registration->registration_id = 0;
    }     
     
    $qry  = "SELECT *";
    $qry .= "\nFROM #__events_registration_fields_values";
    $qry .= "\nWHERE registration_id=" . $registration->registration_id;
    $database->setQuery($qry);  
    $customValues = $database->loadObjectList();
    
    /*
     * For simplicity (in the HTML file), combine the custom field information into a single variable
     * If integrating with the Community Builder profile, load the community builder profile for this user
     */
    if ($my->id) {
		if ($eSess["cbIntegrated"]) {
			$database->setQuery( "SELECT * FROM #__comprofiler c, #__users u WHERE c.id=u.id AND c.id='".$my->id."'");
			$users = $database->loadObjectList();
			$userProfile = $users[0]; 
		}
	}
     
     
	for($thisCustomField = 0; $thisCustomField < count($customFields); $thisCustomField++) {
	
		// Incorporate the list of options for "radio" and "select" types
		if (strcmp($customFields[$thisCustomField]->type,'radio')===0 || strcmp($customFields[$thisCustomField]->type,'select')===0) {
			$customFields[$thisCustomField]->options = array();
			for ($thisOption = 0; $thisOption < count($customOptions); $thisOption++) {
				if ($customOptions[$thisOption]->field_id == $customFields[$thisCustomField]->field_id) {
					$customFields[$thisCustomField]->options[] = $customOptions[$thisOption];
				}
			}  		
		}
	
     	// Load the default value into the custom field's 'value' property
     	$customFields[$thisCustomField]->value = $customFields[$thisCustomField]->default;
     	
     	/*
     	 * If integrated with CB, override the default value if a corresponding Community Builder field contains
     	 * an appropriate value
     	 */
     	if ($eSess["cbIntegrated"]) {
     		// Was an appropriate CB field defined?
     		$cbField = $customFields[$thisCustomField]->cb_integration;
     		if (!empty($cbField)) {
     			
     			// Does the value in the profile match the requested field format? (really only applies to limited selections, such 
     			// as radio or select lists...
     			switch ($customFields[$thisCustomField]->type) {
     				case 'textarea':
					case 'text':	if (!empty($userProfile->$cbField)) {
     									$customFields[$thisCustomField]->value = $userProfile->$cbField;
     								}
     							break;
     				case 'select':
     				case 'radio':	$optionValues = array();
     								$optionIDs = array();
     								for ($thisOption = 0; $thisOption < count($customFields[$thisCustomField]->options); $thisOption++) {
     									$optionValues[$thisOption] = $customFields[$thisCustomField]->options[$thisOption]->name;
     									$optionIDs[$thisOption] = $customFields[$thisCustomField]->options[$thisOption]->option_id;
     								}
     								if (in_array($userProfile->$cbField,$optionValues)) {
     									$customFields[$thisCustomField]->value = $userProfile->$cbField;
     								}
     							break;
     			} // switch
     		} // if $cbField is not empty
     	} // if integrated
     	
     	// If this user has already registered, include this field's index into the custom fields values table.
		for ($thisValue = 0; $thisValue < count($customValues); $thisValue++) {
			if ($customValues[$thisValue]->field_id == $customFields[$thisCustomField]->field_id) {
				$customFields[$thisCustomField]->value_id = $customValues[$thisValue]->value_id;
				
				// Also, override the field's default value with the user's previously entered information
				$customFields[$thisCustomField]->value = $customValues[$thisValue]->value;
			}
		}
     }

	/*
	 * Implementation of scubaguy's code to display the event host
	 * Simplified code using $database->loadResult()
	 */
	$query = "SELECT name FROM #__users WHERE id = " . $row->host_id;
	$database->setQuery($query);
	$registration->host_name = $database->loadResult();


	/*
	 * Pull venue information from events_venue table, if necessary.
	 * BUGFIX:  Venue_id was being loaded (and it isn't needed).
	 */
	if ($row->venue_id) {
		$query = "SELECT name, address, city, state, postalcode, country, webaddress FROM #__events_venues WHERE venue_id = " . $row->venue_id;
		$database->setQuery($query);
		list($row->venue_name,$row->venue_address,$row->venue_city,$row->venue_state,$row->venue_postalcode,$row->venue_country,$row->venue_webaddress) = $database->loadRow();
	}


	/*
	 * Moved code from HTML file -- it didn't really belong there.
	 * Also, currently saved registration information will not be over-ridden with
	 * content from the #__users table (it was before)
	 */
	// get the users name and email if possible
	if (empty($registration->fullname)) {
		$qrysql = "select name from #__users where id=" . $my->id;
		$database->setQuery($qrysql);
		list($registration->fullname) = $database->loadRow();
	}
	if (empty($registration->email)) {
		$qrysql = "select email from #__users where id=$my->id";
		$database->setQuery($qrysql);
		list($registration->email) = $database->loadRow();
	}
	



	/*
	 * Make sure the content is safe to display
	 * Can't call mosMakeHtmlSafe($row), since $row contains textarea content (which may contain some HTML tags)
	 */ 
	mosMakeHtmlSafe($row->title);
	mosMakeHtmlSafe($row->subject);
	mosMakeHtmlSafe($registration->host_name);
	mosMakeHtmlSafe($row->venue_name);
	mosMakeHtmlSafe($row->venue_city);
	mosMakeHtmlSafe($row->venue_state);
	mosMakeHtmlSafe($row->venue_postalcode);
	mosMakeHtmlSafe($row->venue_country);
	mosMakeHtmlSafe($row->venue_webaddress);
	mosMakeHtmlSafe($row->activity);
	mosMakeHtmlSafe($row->contact);
	mosMakeHtmlSafe($row->location);
	mosMakeHtmlSafe($row->extra);
	mosMakeHtmlSafe($registration);

	// account for server time zone offset
	$row->session_up = mosFormatDate( $row->session_up, '%Y-%m-%d %H:%M:%S' );
	$row->session_down = mosFormatDate( $row->session_down, '%Y-%m-%d %H:%M:%S' );
	$row->registration_up = mosFormatDate( $row->registration_up, '%Y-%m-%d %H:%M:%S' );
	$row->registration_down = mosFormatDate( $row->registration_down, '%Y-%m-%d %H:%M:%S' );

    // display the form
    HTML_Events_Sessions::viewSession($row, $registration, $option, $lists, $Itemid, $customFields, $pop);
} // viewSession()

/**
* Function to save a Registration
* 
* @param int $id Id field of the session being viewed
* @param string $option Component being accessed
* @param int $Itemid Id of the Mambo Item that displayed this
* @return void  
*/
function saveRegistration($id, $option, $Itemid) {
    global $database, $eSess, $mosConfig_mailfrom, $mosConfig_fromname, $mosConfig_live_site;
    
    // create an instance of the table class
    $row = new mosEventsRegistrations( $database );
    
    // set the extra fields needed
    // BUGFIX: Date string doesn't require % symbol
    $row->registration_date = date('Y-m-d H:i:s');
    
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
    
    // update the status of all records    
    if (!$row->updateStatus()) {
        echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
        exit();
    }

    
    
   /* 
    * Need to store any information entered for the custom fields.
    * First, need to load the information about the custom fields that were displayed
    * to the user.  Why?  Some fields, like checkboxes, if left blank may not be returned
    * in the $_POST array.  So, we can't go by that...
    */
    $qry  = "SELECT *";
    $qry .= "\nFROM #__events_registration_fields";
    $qry .= "\nWHERE session_id=" . $id;
    $qry .= "\nORDER by ordering";
    $database->setQuery($qry);  
    $customFields = $database->loadObjectList();
        
   /* Now, loop through each field that was presented to the user.
    */
    for ($thisField = 0; $thisField < count($customFields); $thisField++) {
       /* Portions of $_POST relating to this custom field must be extracted to bind
        * the information to its class object.  Make sure the temporary storage is blank
        * (and doesn't contain information from a previous loop iteration.
        */
        unset($thisFieldsInfo);
        $thisFieldsInfo = array();
        
        // Get the registration_id based on the $row->store() call  
        $thisFieldsInfo["registration_id"] = $row->registration_id;
        // Get the field_id of this field
        $thisFieldsInfo["field_id"] = $customFields[$thisField]->field_id;
        // If $_POST contains info about a previously stored registration database, use it.
        $thisFieldsInfo["value_id"] = $_POST["valueId"][$customFields[$thisField]->field_id];

        // Get the type of this field...
        $qry  = "SELECT cf.type";
        $qry .= "\nFROM #__events_registration_fields AS cf";
        $qry .= "\nWHERE cf.field_id=" . $customFields[$thisField]->field_id;
        $database->setQuery($qry);  
        $fieldType = $database->loadObjectList();
        
   
		/* 
		 * Revised code for new "value" field
		 */
        switch ($fieldType[0]->type) {
            case 'text' :
            case 'textarea' :
            case 'radio' :      
            case 'select' : 
                    $thisFieldsInfo["value"] = $_POST["customId"][$customFields[$thisField]->field_id];
                    break; 
            case 'check' :
                    if ($_POST["customId"][$customFields[$thisField]->field_id] == 1) {
                        $thisFieldsInfo["value"] = 1;
                    } else {
                        $thisFieldsInfo["value"] = 0;
                    }
                    break;
        }
        
        
        unset($customFieldValueRow);
        $customFieldValueRow = new mosEventsRegistrationFieldValue( $database );
        
        // attempt to bind the class to the data posted
        if (!$customFieldValueRow->bind($thisFieldsInfo)) {
            echo "<script> alert('".$customFieldValueRow->getError()."'); window.history.go(-1); </script>\n";
            exit();
        }
    
    	/* 
    	 * New input error checking
    	 */
        // attempt to check the record    
        if (!$customFieldValueRow->check()) {
            echo "<script> alert('".$customFieldValueRow->getError()."'); window.history.go(-1); </script>\n";
            exit();
        }
    
        // attempt to insert/update the record    
        if (!$customFieldValueRow->store()) {
            echo "<script> alert('".$customFieldValueRow->getError()."'); window.history.go(-1); </script>\n";
            exit();
        }
        
    }
    
    
    // prepare the data used in the emails and the thankyou message
    $replacements = array();
    $replacements[] = array("{fullname}"=>$row->fullname);
    $replacements[] = array("{email}"=>$row->email);
    $replacements[] = array("{url}"=>"$mosConfig_live_site/index.php?option=$option&task=view&id=$id&Itemid=$Itemid");
    // get the title
    $qrysql = "select title from #__events_sessions where session_id=$id";
    $database->setQuery($qrysql);
    $title = $database->loadResult();
    $replacements[] = array("{title}"=>$title);
    
    // determine the action
    if (empty($row->registration_id)) {
        $replacements[] = array("{action}"=>_ESESS_ACTION_REGISTER);
    } else {
        $replacements[] = array("{action}"=>_ESESS_ACTION_UPDATE);
    }
    
    // build the html table that displays the data entered for the registration
    $data  = "<table>\n" .
        "<tr>\n" .
        "<th align=\"left\">"._ESESS_FIELD_FULLNAME."</th>\n" .
        "<td>$row->fullname</td>\n" .
        "</tr>\n" .
        "<tr>\n" .
        "<th align=\"left\">"._ESESS_FIELD_EMAIL."</th>\n" .
        "<td>$row->email</td>\n" .
        "</tr>\n" .
        "<tr>\n" .
        "<th align=\"left\">"._ESESS_FIELD_NUM_PEOPLE."</th>\n" .
        "<td>$row->numregistrations</td>\n" .
        "</tr>\n";
    $data .= "</table>\n";
    $replacements[] = array("{data}"=>$data);
    
    // do the replacement all all email and message parts
    foreach ($replacements as $replacement) {
        foreach ($replacement as $search=>$replace) {
            $eSess["thankHTML"] = str_replace($search,$replace,$eSess["thankHTML"]);
            $eSess["confirmEmailSubject"] = str_replace($search,$replace,$eSess["confirmEmailSubject"]);
            $eSess["confirmEmailMsg"] = str_replace($search,$replace,$eSess["confirmEmailMsg"]);
            $eSess["notifyEmailSubject"] = str_replace($search,$replace,$eSess["notifyEmailSubject"]);
            $eSess["notifyEmailMsg"] = str_replace($search,$replace,$eSess["notifyEmailMsg"]);
        }
    }


    // Get the email address of this session's host
	$query = "SELECT u.name, u.email FROM #__users u LEFT JOIN #__events_sessions s ON (s.host_id = u.id) WHERE (s.session_id = '$id')";
	$database->setQuery($query);
	$database->loadObject($hostInfo); 
	if (empty($hostInfo->name) || empty($hostInfo->email)) {
		$mailFrom = $mosConfig_mailfrom;
		$fromName = $mosConfig_fromname;
	} else {
		$mailFrom = $hostInfo->email;
		$fromName = $hostInfo->name;		
	}
	
    // send confirmation email to the registrant
    if ($eSess["confirmEmailSend"]) {
        $mail = mosCreateMail($mailFrom,$fromName,$eSess["confirmEmailSubject"],$eSess["confirmEmailMsg"]);
        $mail->AddAddress($row->email);
        $mail->IsHTML(true);
        $mail->Send();
    } // send confirm
        
    // send the notification to the session host
    if ($eSess["notifyEmailSend"]) {
        $mail = mosCreateMail($mosConfig_mailfrom,$mosConfig_fromname,$eSess["notifyEmailSubject"],$eSess["notifyEmailMsg"]);
        $mail->AddAddress($mailFrom);
        $mail->IsHTML(true);
        $mail->Send();
    } // send notify
    
    // display the thankyou page
    echo $eSess["thankHTML"];
} // saveRegistration()


/**
* Performs a Registration cancellation for a registered user
* 
* Uses the delete method from the table class so things are neat and tidy
* 
* @param int $id Id field of the session being viewed
* @param string $option Component being accessed
* @param int $Itemid Id of the Mambo Item that displayed this
* @return void  
*/
function cancelRegistration($id, $option, $Itemid) {
    global $database, $eSess, $mosConfig_live_site;
    
    // get the title
    $qrysql = "select title from #__events_sessions where session_id=$id";
    $database->setQuery($qrysql);
    $title = $database->loadResult();
    
    // determine the url to return to the session page
    $url = "$mosConfig_live_site/index.php?option=$option&task=view&id=$id&Itemid=$Itemid";
    
    // create an instance of the table class
    $row = new mosEventsRegistrations( $database );
    
    // determine the registration_id to delete
    $registration_id = intval( mosGetParam( $_REQUEST, 'registration_id', 0 ) );
    $row->load($registration_id);
    
    // delete this record (sets it cancel date)
    // requires the parameter as an array
    $row->delete(array($registration_id));
    
    $row->updateStatus();
    
    
    /* 
     * Load the text to display and replace dummy text with appropriate values
     */
    $pageTitle = $eSess["cancelTitle"]; 
    $pageText  = $eSess["cancelText"];;

    // prepare the data which replaces the dummy text
    $replacements = array();
    $replacements[] = array("{fullname}"=>$row->fullname);
    $replacements[] = array("{url}"=>"$mosConfig_live_site/index.php?option=$option&task=view&id=$id&Itemid=$Itemid");
    $replacements[] = array("{title}"=>$title);
    
    // do the replacement all all email and message parts
    foreach ($replacements as $replacement) {
        foreach ($replacement as $search=>$replace) {
            $pageTitle = str_replace($search,$replace,$pageTitle);
            $pageText = str_replace($search,$replace,$pageText);
        }
    }
    
    // display the cancel page
    HTML_Events_Sessions::cancelSession($pageTitle, $pageText);
} // cancelRegistration()

?>
