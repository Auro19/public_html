<?php
/**
* @version $Id: attend_events.class.php 26 2007-01-06 00:03:24Z pcarr $
* @package Attend Events
* @copyright (C) 2004 Tony Blair
* @copyright (C) 2005-06 Peter Carr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* Events Session Classes
* 
* Database Table classes for the Events_Sessions and Events_Registrations tables 
*/

class mosEventsSessions extends mosDBTable {
    /**
    * @var int Primary Key
    */
    var $session_id = null;
    
    /**
    * @var int Event_id - foreign key
    */
    var $event_id = 0;
    
    /**
    * @var string Title - only used if event_id null
    */
    var $title = null;
    
    /**
    * @var string Intro Text for the Session - HTML
    */
    var $introtext = null;
    
    /**
    * @var date Start Date for registrations
    */
    var $session_up = "0000-00-00 00:00:00";
    var $session_down = "0000-00-00 00:00:00";
    var $registration_up = "0000-00-00 00:00:00";
    var $registration_down = "0000-00-00 00:00:00";
    
    /**
    * @var int Status Flag 0 new, 1 open, 2 closed, 3 full, 4 cancelled
    */
    var $status = null;
    
    /**
    * @var int Maximun number of Registrations allowed before full (0 unlimited)
    */
    var $maxregistrations = 0;
    
    /**
    * @var int Availablity of Session:  3 Global, 0 Everyone, 1 Registered Users, 2 Guests
    */
    var $availability = 3;
    
    /**
    * @var int User who checked out the record
    */
    var $checked_out = null;
    var $checked_out_time = null;
    
    /**
    * @var int Published flag
    */
    var $published = 1;
    
    var $venue_id = null;
    var $venue_name = null;
    var $venue_address = null;
    var $venue_city = null;
    var $venue_state = null;
    var $venue_postalcode = null;
    var $venue_country = null;
    var $venue_webaddress = null;
    
    var $host_id = null;
    
    /**
    * Constructor
    */
    function mosEventsSessions() {
        global $database;
        $this->mosDBTable( '#__events_sessions', 'session_id', $database );
    } // mosEventsSessions()
    
    
    /**
    * Generic Publish/Unpublish function
    * 
    * Modified by Tony Blair because there is an error in the publish_array code
    * @param array An array of id numbers
    * @param integer 0 if unpublishing, 1 if publishing
    * @param integer The id of the user performnig the operation
    */
    function publish_array( $cid=null, $publish=1, $myid=0 ) {
        if (!is_array( $cid ) || count( $cid ) < 1) {
            $this->_error = "No items selected.";
            return false;
        }

        $cids = implode( ',', $cid );

        $this->_db->setQuery( "UPDATE $this->_tbl SET published='$publish'"
        . "\nWHERE $this->_tbl_key IN ($cids) AND (checked_out=0 OR (checked_out='$myid'))"
        );
        if (!$this->_db->query()) {
            $this->_error = $this->_db->getErrorMsg();
            return false;
        }

        if (count( $cid ) == 1) {
            $this->checkin( $cid[0] );
        }
        $this->_error = '';
        return true;
    } // publish_array()
    
    
    /**
    *   Overloaded delete method
    *
    *   @return true if successful otherwise returns and error message
    */
    function delete( $oid=null ) {

        $ids = implode( ',', $oid );

        $this->_db->setQuery( "UPDATE $this->_tbl SET published='-1' WHERE $this->_tbl_key IN ($ids) AND (checked_out=0 OR (checked_out='$myid'))" );
        
        if ($this->_db->query()) {
            return true;
        } else {
            $this->_error = $this->_db->getErrorMsg();
            return false;
        }
    } // delete()
    
    /**
    * Function to check to see if there is a status change needed
    * 
    * Check for the following in order<br />
    * <dl>
    *   <dt>Close -> Open</dt>
    *   <dd>Any Sessions that were Closed but had their end date extended will be set to Open again</dd>
    *   <dt>Full (optional)</dt>
    *   <dd>This can be optionally processed<br />
    *       Any Sessions that are Open and their number of registrations is greater than 
    *       their max registrations will be set to Full<br />
    *       Any Sessions that are Full and their number of registrations is less than
    *       their max registrations (because a registration has been cancelled) will be set to Open</dd>
    *   <dt>New -> Open</dt>
    *   <dd>Any Sessions that were new and it is => their start date will be set to Open</dd>
    *   <dt>Open -> Closed</dt>
    *   <dd>Any Sessions that were open and it is > their end date will be set to Closed</dd>
    * </dl>
    * Note: it is important that the order of this is done correctly to ensure that the status is correct
    * 
    * @return void
    */
    function updateStatus() {
        global $eSess, $mosConfig_offset;
        
        /* 
         * Define "now" based on the built-in server offset
         * Borrowed from "components/com_rss"
         * This replaces the mySQL function now() in all queries...
         */
        $now 	= date( 'Y-m-d H:i:s', time() );

        
        /*
         * CASE #1:  Session is "new" if the current date/time is before its registration_up date/time
         */
        $qrysql = "UPDATE $this->_tbl SET status=0 WHERE (registration_up >= '$now')";
        $this->_db->setQuery($qrysql);
        if (!$this->_db->query()) {
            $this->_error = $this->_db->getErrorMsg();
            return false;
        }

        /*
         * CASE #2: Session is "open" if the current date/time is after its registration_up date/time
         * and before its registration_down date/time
         */
        $qrysql = "UPDATE $this->_tbl SET status=1 WHERE (registration_up <= '$now') AND (registration_down >= '$now')";
        $this->_db->setQuery($qrysql);
        if (!$this->_db->query()) {
            $this->_error = $this->_db->getErrorMsg();
            return false;
        }

        /*
         * CASE #3: Session is "closed" if the current date/time is after its registration_down date/time
         */
        $qrysql = "UPDATE $this->_tbl SET status=3 WHERE (registration_down <= '$now')";
        $this->_db->setQuery($qrysql);
        if (!$this->_db->query()) {
            $this->_error = $this->_db->getErrorMsg();
            return false;
        }


        
        
        
        // check to see if we should do the auto full processing
        if ($eSess["autoFull"]) {
            // determine if this item is full
            // must be done first incase this happens after the close date
            
            // query to find out how many registrations have been taken
            $qrysql  = "select s.session_id, s.status, " .
                "sum( r.numregistrations ) as currentregistrations, s.maxregistrations " .
                "from #__events_sessions s " .
                "left join #__events_registrations r on ( s.session_id = r.session_id ) " .
                "where s.status in ( 1, 2 ) and r.cancel_date = '0' " .
                "group by s.session_id, s.status, s.maxregistrations";
            $this->_db->setQuery($qrysql);
            $data = $this->_db->loadObjectList();
            
            // inistalise some variables 
            $full = $open = array();
            
            // look at all the records found
            foreach ($data as $row) {
                // skip if the maxregistrations = 0
                if ($row->maxregistrations==0) continue;
                
                // see if this session is open and should be full
                if (($row->currentregistrations >= $row->maxregistrations) and ($row->status=1)) {
                    // this needs to be set to full
                    $full[]=$row->session_id;
                }
                // see if this session is full and should be open
                if (($row->currentregistrations < $row->maxregistrations) and ($row->status=2)) {
                    // this needs to be set back to open because a registration has been cancelled
                    $open[]=$row->session_id;
                }
            } // foreach data
            
            // process any full
            if (count($full)>0) {
                // get the ids to update
                $ids = implode(",",$full);
                // set these to full
                $qrysql = "update $this->_tbl set status=2 where $this->_tbl_key in ($ids)";
                $this->_db->setQuery($qrysql);
                // execute the query
                if (!$this->_db->query()) {
                    $this->_error = $this->_db->getErrorMsg();
                    return false;
                }
            }
            
            // process any open
            if (count($open)>0) {
                // get the ids to update
                $ids = implode(",",$open);
                // set these to open
                $qrysql = "update $this->_tbl set status=1 where $this->_tbl_key in ($ids)";
                $this->_db->setQuery($qrysql);
                // execute the query
                if (!$this->_db->query()) {
                    $this->_error = $this->_db->getErrorMsg();
                    return false;
                }
            }
        } // autoFull
        
        // everything ok so return true
        return true;
    } // updateStatus()
} // class - mosEventsSessions



class mosEventsRegistrationFields extends mosDBTable {
    
    var $field_id = null;       // A unique id for each field
    var $session_id = null;     // The id of the session for which this field is used.
    var $name = null;
    var $type = null;
    var $required = null;
    var $ordering = null;
    var $tooltip = null;
    
    // Type Specific Parameters
    var $size = null;
    var $maxlength = null;
    var $rows = null;
    var $cols = null;
    var $default = null;
    var $cb_integration = null;
    
    /**
    * Constructor
    */
    function mosEventsRegistrationFields() {
        global $database;
        $this->mosDBTable( '#__events_registration_fields', 'field_id', $database );
    } // mosEventsSessions()

	function check() {
		$iFilter = new inputFilter();

        $this->name = $iFilter->process($this->name);
		$this->tooltip = $iFilter->process($this->tooltip);
		$this->default = $iFilter->process($this->default);

        return true;
	} // check()
}

class mosEventsRegistrationFieldsOptions extends mosDBTable {
    
    var $option_id = null;       // A unique id for each field
    var $field_id = null;     // The id of the session for which this field is used.
    var $session_id = null;
    var $name = null;
    var $ordering = null;

    /**
    * Constructor
    */
    function mosEventsRegistrationFieldsOptions() {
        global $database;
        $this->mosDBTable( '#__events_registration_fields_options', 'option_id', $database );
    } // mosEventsSessions()

	function check() {
		$iFilter = new inputFilter();
		
		return true;
	} // check()
}



class mosEventsRegistrationFieldValue extends mosDBTable {
    
    var $value_id = null;       // A unique id for each field
    var $registration_id = null;     // The id of the session for which this field is used.
    var $field_id = null;
    var $value = null;
    
    /**
    * Constructor
    */
    function mosEventsRegistrationFieldValue() {
        global $database;
        $this->mosDBTable( '#__events_registration_fields_values', 'value_id', $database );
    } // mosEventsSessions()

	function check() {
    	// Input Checking
    	$iFilter = new InputFilter();
    	
    	$this->value = $iFilter->process($this->value);
	
		return true;
	} // check()
}









class mosEventsRegistrations extends mosDBTable {
    /**
    * @var int Primary Key
    */
    var $registration_id = null;
    
    /**
    * @var int Session_id - foreign key to _events_sessions table
    */
    var $session_id = null;
    
    /**
    * @var int Userid - only used if Registered User
    */
    var $userid = null;
    
    /**
    * @var string FullName of the user - only used if Guest
    */
    var $fullname = null;
    
    /**
    * @var string Email of the user - only used if Guest
    */
    var $email = null;
    
    /**
    * @var datetime Registration Date for user
    */
    var $registration_date = null;
    
    /**
    * @var datetime Cancellation date for the user
    */
    var $cancel_date = null;
    
    /**
    * @var int Number of registrations for the user
    */
    var $numregistrations = 1;
    
    var $status = 0;
    
    var $comments = null;
    
    function mosEventsRegistrations() {
        global $database;
        $this->mosDBTable( '#__events_registrations', 'registration_id', $database );
    } // mosEventsRegistrations()
        
    function check() {
        // Input Checking
    	$iFilter = new InputFilter();
    	
    	$this->fullname = $iFilter->process($this->fullname);
    	$this->email = $iFilter->process($this->email);
    	$this->numregistrations = $iFilter->process($this->numregistrations);
    	$this->comments = $iFilter->process($this->comments);
    	
    	return true;
    } // check
    
    function updateStatus() {
    	$qrysql  = "SELECT r.registration_id ";
        $qrysql .= "FROM #__events_registrations r ";
        $qrysql .= "left join #__events_sessions s on ( s.session_id = r.session_id ) ";
        $qrysql .= "WHERE s.status=3 and r.status=0 ";
        $this->_db->setQuery($qrysql);
        $rows = $this->_db->loadObjectList(); 
        
        foreach ($rows as $row) {
        	$this->_db->setQuery("UPDATE $this->_tbl set status=2 where $this->_tbl_key=" . $row->registration_id);
			if (!$this->_db->query()) {
				$this->_error = $this->_db->getErrorMsg();
				return false;
			}
        }
        return true;
    } // checkStatus()
    
    
    /**
    * Generic Publish/Unpublish function
    * 
    * Modified by Tony Blair because there is an error in the publish_array code
    * @param array An array of id numbers
    * @param integer 0 if unpublishing, 1 if publishing
    * @param integer The id of the user performnig the operation
    */
    function publish_array( $cid=null, $publish=1, $myid=0 ) {
        if (!is_array( $cid ) || count( $cid ) < 1) {
            $this->_error = "No items selected.";
            return false;
        }

        $cids = implode( ',', $cid );

        $this->_db->setQuery( "UPDATE $this->_tbl SET published='$publish'"
        . "\nWHERE $this->_tbl_key IN ($cids) AND (checked_out=0 OR (checked_out='$myid'))"
        );
        if (!$this->_db->query()) {
            $this->_error = $this->_db->getErrorMsg();
            return false;
        }

        $this->_error = '';
        return true;
    } // publish_array()
    
    /**
    * Function to set the viewed flag on the record
    */
    function viewed( $rid ) {
        $this->_db->setQuery("update $this->_tbl set viewed='1' where $this->_tbl_key=$rid");
        
        if (!$this->_db->query()) {
            $this->_error = $this->_db->getErrorMsg();
            return false;
        }
        
        $this->_error = '';
        return true;
    } // viewed()
    
    /**
    *   Overloaded delete method
    *
    *   @return true if successful otherwise returns and error message
    */
    function delete( $oid=null ) {
        /*
         * Define "now" based on the built-in server offset
         * Borrowed from "components/com_rss"
         * This replaces the mySQL function now() in all queries...
         */
        $now 	= date( 'Y-m-d H:i:s', time() - $mosConfig_offset * 60 * 60 );

        $ids = implode( ',', $oid );

		/* 
		 * Added status = 1
		 */
        $this->_db->setQuery( "UPDATE $this->_tbl SET cancel_date='$now', status=1 WHERE $this->_tbl_key IN ($ids)" );
        
        if ($this->_db->query()) {
            return true;
        } else {
            $this->_error = $this->_db->getErrorMsg();
            return false;
        }
    } // delete()
    
} // class - mosEventsRegistrations


class mosEventsVenues extends mosDBTable {
    var $venue_id = null;
    var $name = null;
    var $address = null;
    var $city = null;
    var $state = null;
    var $postalcode = null;
    var $country = null;
    var $webaddress = "http://";
    var $checked_out = null;
    var $checked_out_time = null;


    /**
    * Constructor
    */
    function mosEventsVenues() {
        global $database;
        $this->mosDBTable( '#__events_venues', 'venue_id', $database );
    } // mosEventsSessions()
    
	function check() {
		$iFilter = new inputFilter();
		
		return true;
	} // check()
}




/**
* Function to return the tooltip data from the language file
* 
* Relies on the constants having the same name but a extra suffix for the description
* i.e. _ESESS_FIELD_FULLNAME and _ESESS_FIELD_FULLNAME_DESC
* 
* @access private
* @param string $constant Name of the constant to check on
* @return string
*/
function returnToolTip($constant) {
    
    // determine if the constant exists
    if (!defined($constant)) return "";
    // determine if the constant is empty
    $name = constant($constant);
    if (empty($name)) return "";
        
    // determine if the desciption constant exists
    if (!defined($constant."_DESC")) return "";
    // determine if the desciption constant is empty
    $desc = constant($constant."_DESC");
    if (empty($desc)) return "";
    
    // if we get this far then we should build the tool tip
    return mosToolTip($desc, $name);
    
} // returnToolTip()


/**
* Function that returns an array of country and codes
* 
* Pinched from philaform
*/
function getcountry() {
    $country_list = array('AF' => 'Afghanistan',
    'AL' => 'Albania',
    'DZ' => 'Algeria',
    'AD' => 'Andorra',
    'AO' => 'Angola',
    'AI' => 'Anguilla',
    'AG' => 'Antigua and Barbuda',
    'AR' => 'Argentina',
    'AM' => 'Armenia',
    'AW' => 'Aruba',
    'AU' => 'Australia',
    'AT' => 'Austria',
    'AZ' => 'Azerbaijan',
    'BS' => 'Bahamas',
    'BH' => 'Bahrain',
    'BD' => 'Bangladesh',
    'BB' => 'Barbados',
    'BY' => 'Belarus',
    'BE' => 'Belgium',
    'BZ' => 'Belize',
    'BJ' => 'Benin',
    'BM' => 'Bermuda',
    'BT' => 'Bhutan',
    'BO' => 'Bolivia',
    'BA' => 'Bosnia-Herzegovina',
    'BW' => 'Botswana',
    'BR' => 'Brazil',
    'VG' => 'British Virgin Islands',
    'BN' => 'Brunei Darussalam',
    'BG' => 'Bulgaria',
    'BF' => 'Burkina Faso',
    'MM' => 'Burma',
    'BI' => 'Burundi',
    'KH' => 'Cambodia',
    'CM' => 'Cameroon',
    'CA' => 'Canada',
    'CV' => 'Cape Verde',
    'KY' => 'Cayman Islands',
    'CF' => 'Central African Republic',
    'TD' => 'Chad',
    'CL' => 'Chile',
    'CN' => 'China',
    'CX' => 'Christmas Island (Australia)',
    'CC' => 'Cocos Island (Australia)',
    'CO' => 'Colombia',
    'KM' => 'Comoros',
    'CG' => 'Congo (Brazzaville),Republic of the',
    'ZR' => 'Congo, Democratic Republic of the',
    'CK' => 'Cook Islands (New Zealand)',
    'CR' => 'Costa Rica',
    'CI' => 'Cote d\'Ivoire (Ivory Coast)',
    'HR' => 'Croatia',
    'CU' => 'Cuba',
    'CY' => 'Cyprus',
    'CZ' => 'Czech Republic',
    'DK' => 'Denmark',
    'DJ' => 'Djibouti',
    'DM' => 'Dominica',
    'DO' => 'Dominican Republic',
    'TP' => 'East Timor (Indonesia)',
    'EC' => 'Ecuador',
    'EG' => 'Egypt',
    'SV' => 'El Salvador',
    'GQ' => 'Equatorial Guinea',
    'ER' => 'Eritrea',
    'EE' => 'Estonia',
    'ET' => 'Ethiopia',
    'FK' => 'Falkland Islands',
    'FO' => 'Faroe Islands',
    'FJ' => 'Fiji',
    'FI' => 'Finland',
    'FR' => 'France',
    'GF' => 'French Guiana',
    'PF' => 'French Polynesia',
    'GA' => 'Gabon',
    'GM' => 'Gambia',
    'GE' => 'Georgia, Republic of',
    'DE' => 'Germany',
    'GH' => 'Ghana',
    'GI' => 'Gibraltar',
    'GB' => 'Great Britain and Northern Ireland',
    'GR' => 'Greece',
    'GL' => 'Greenland',
    'GD' => 'Grenada',
    'GP' => 'Guadeloupe',
    'GT' => 'Guatemala',
    'GN' => 'Guinea',
    'GW' => 'Guinea-Bissau',
    'GY' => 'Guyana',
    'HT' => 'Haiti',
    'HN' => 'Honduras',
    'HK' => 'Hong Kong',
    'HU' => 'Hungary',
    'IS' => 'Iceland',
    'IN' => 'India',
    'ID' => 'Indonesia',
    'IR' => 'Iran',
    'IQ' => 'Iraq',
    'IE' => 'Ireland',
    'IL' => 'Israel',
    'IT' => 'Italy',
    'JM' => 'Jamaica',
    'JP' => 'Japan',
    'JO' => 'Jordan',
    'KZ' => 'Kazakhstan',
    'KE' => 'Kenya',
    'KI' => 'Kiribati',
    'KW' => 'Kuwait',
    'KG' => 'Kyrgyzstan',
    'LA' => 'Laos',
    'LV' => 'Latvia',
    'LB' => 'Lebanon',
    'LS' => 'Lesotho',
    'LR' => 'Liberia',
    'LY' => 'Libya',
    'LI' => 'Liechtenstein',
    'LT' => 'Lithuania',
    'LU' => 'Luxembourg',
    'MO' => 'Macao',
    'MK' => 'Macedonia, Republic of',
    'MG' => 'Madagascar',
    'MW' => 'Malawi',
    'MY' => 'Malaysia',
    'MV' => 'Maldives',
    'ML' => 'Mali',
    'MT' => 'Malta',
    'MQ' => 'Martinique',
    'MR' => 'Mauritania',
    'MU' => 'Mauritius',
    'YT' => 'Mayotte (France)',
    'MX' => 'Mexico',
    'MD' => 'Moldova',
    'MC' => 'Monaco (France)',
    'MN' => 'Mongolia',
    'MS' => 'Montserrat',
    'MA' => 'Morocco',
    'MZ' => 'Mozambique',
    'NA' => 'Namibia',
    'NR' => 'Nauru',
    'NP' => 'Nepal',
    'NL' => 'Netherlands',
    'AN' => 'Netherlands Antilles',
    'NC' => 'New Caledonia',
    'NZ' => 'New Zealand',
    'NI' => 'Nicaragua',
    'NE' => 'Niger',
    'NG' => 'Nigeria',
    'KP' => 'North Korea (Korea, Democratic People\'s Republic of)',
    'NO' => 'Norway',
    'OM' => 'Oman',
    'PK' => 'Pakistan',
    'PA' => 'Panama',
    'PG' => 'Papua New Guinea',
    'PY' => 'Paraguay',
    'PE' => 'Peru',
    'PH' => 'Philippines',
    'PN' => 'Pitcairn Island',
    'PL' => 'Poland',
    'PT' => 'Portugal',
    'QA' => 'Qatar',
    'RE' => 'Reunion',
    'RO' => 'Romania',
    'RU' => 'Russia',
    'RW' => 'Rwanda',
    'SH' => 'Saint Helena',
    'KN' => 'Saint Kitts (St. Christopher and Nevis)',
    'LC' => 'Saint Lucia',
    'PM' => 'Saint Pierre and Miquelon',
    'VC' => 'Saint Vincent and the Grenadines',
    'SM' => 'San Marino',
    'ST' => 'Sao Tome and Principe',
    'SA' => 'Saudi Arabia',
    'SN' => 'Senegal',
    'YU' => 'Serbia-Montenegro',
    'SC' => 'Seychelles',
    'SL' => 'Sierra Leone',
    'SG' => 'Singapore',
    'SK' => 'Slovak Republic',
    'SI' => 'Slovenia',
    'SB' => 'Solomon Islands',
    'SO' => 'Somalia',
    'ZA' => 'South Africa',
    'GS' => 'South Georgia (Falkland Islands)',
    'KR' => 'South Korea (Korea, Republic of)',
    'ES' => 'Spain',
    'LK' => 'Sri Lanka',
    'SD' => 'Sudan',
    'SR' => 'Suriname',
    'SZ' => 'Swaziland',
    'SE' => 'Sweden',
    'CH' => 'Switzerland',
    'SY' => 'Syrian Arab Republic',
    'TW' => 'Taiwan',
    'TJ' => 'Tajikistan',
    'TZ' => 'Tanzania',
    'TH' => 'Thailand',
    'TG' => 'Togo',
    'TK' => 'Tokelau (Union) Group (Western Samoa)',
    'TO' => 'Tonga',
    'TT' => 'Trinidad and Tobago',
    'TN' => 'Tunisia',
    'TR' => 'Turkey',
    'TM' => 'Turkmenistan',
    'TC' => 'Turks and Caicos Islands',
    'TV' => 'Tuvalu',
    'UG' => 'Uganda',
    'UA' => 'Ukraine',
    'AE' => 'United Arab Emirates',
    'US' => 'United States of America',
    'UY' => 'Uruguay',
    'UZ' => 'Uzbekistan',
    'VU' => 'Vanuatu',
    'VA' => 'Vatican City',
    'VE' => 'Venezuela',
    'VN' => 'Vietnam',
    'WF' => 'Wallis and Futuna Islands',
    'WS' => 'Western Samoa',
    'YE' => 'Yemen',
    'ZM' => 'Zambia',
    'ZW' => 'Zimbabwe');
    return $country_list;
}
?>
