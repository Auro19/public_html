<?php
/**
* @version $Id: attend_events.html.php 28 2007-02-23 23:32:11Z pcarr $
* @package Attend Events
* @copyright (C) 2004 Tony Blair
* @copyright (C) 2005-06 Peter Carr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );



class HTML_Events_Sessions {

/**
* Method that displays the Sessions list
*
* @param array $rows Array of Row objects
* @param string $option Component being accessed
* @param int $Itemid Id of the Mambo Item that displayed this
* @return void  
*/
function listSessions( &$rows, $option, $Itemid) {
        global $my, $mosConfig_live_site, $eSess;
        
		mosCommonHTML::loadOverlib();
?>
  <table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">
    <tr>
      <th><div class="componentheading"><?php echo _ESESS_COMPONENT_TITLE; ?></div></th>
    </tr>
  </table>
  
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="contentpane">
 		<thead>
 			<tr class="sectiontableheader">
      			<th style="text-align: left;"><?php echo _ESESS_NAME; ?></th>
      			<th style="text-align: center;"><?php echo _ESESS_SESSION_UP; ?></th>
      			<th style="text-align: center;"><?php echo _ESESS_REGISTRATION_DOWN;?></th>
				<?php
        		if ($eSess["autoFull"] && $eSess["userNumber"]) { ?>
      				<th style="text-align: center;"><?php echo _ESESS_NUM_LEFT; ?></th>
      				<th style="text-align: center;"><?php echo _ESESS_NUM_AVAIL; ?></th>
      				<?php
      			} ?>
      			<?php
      			if ($eSess["autoFull"] && !$eSess["userNumber"]) { ?>
      				<th style="text-align: center;"><?php echo _ESESS_AVAIL_STATUS; ?></th>
      				<?php
      			} ?>
    		</tr>
    	</thead>
    	<tbody>
<?php
        $k = 0;
        for ($i=0; $i < count( $rows ); $i++) {
            $row = &$rows[$i];
            // determine the number of registrations left
            if ($row->maxregistrations=='0') {
                $maxregistrations = $availregistrations = _ESESS_UNLIMITED;
            } else {
                $maxregistrations = $row->maxregistrations;
                $availregistrations = ($row->maxregistrations-$row->numregistrations);
                if ($availregistrations<0) $availregistrations=0;
            }
            
            $url = "index.php?option=$option&amp;task=view&amp;id=$row->session_id&amp;Itemid=$Itemid";
?>
    		<tr class="<?php echo "sectiontableentry" . (($k % 2) + 1); ?>">
				<td style="text-align: left;"><a href="<?php echo $url; ?>"><?php echo $row->title; ?></a></td>
      			<td style="text-align: center;"><?php echo mosFormatDate($row->session_up,$eSess["shortDateFormat"]); ?></td>
      			<td style="text-align: center;"><?php echo mosFormatDate($row->registration_down,$eSess["shortDateFormat"]); ?></td>

				<?php
        		if ($eSess["autoFull"] && $eSess["userNumber"]) { ?>
      				<td style="text-align: center;"><?php echo $availregistrations; ?></td>
      				<td style="text-align: center;"><?php echo $maxregistrations; ?></td>
      				<?php
      			} ?>
      			<?php
      			/*
      			 * BUGFIX:  Displayed 'Full' for 'Unlimited' spaces
      			 */
      			if ($eSess["autoFull"] && !$eSess["userNumber"]) { ?>
      				<td style="text-align: center;"><?php echo (($availregistrations > 0) || ($maxregistrations == 0)) ? _ESESS_AVAIL_STATUS_AVAIL : _ESESS_AVAIL_STATUS_FULL; ?></td>
      				<?php
        		} ?>
    		</tr>
<?php
            $k = 1 - $k;
        }
?>
		</tbody>
  </table>
<?php

    } // listSessions()
    
    
/**
* Function to display the details of a session in the front end
* and to display the registration fields
* @param array $rows Array of Row objects
* @param object $registration Registration Data object
* @param string $option Component being accessed
* @param array $lists Array of select list html
* @param int $Itemid Id of the Mambo Item that displayed this
* @return void
*/
function viewSession(&$row, &$registration, $option, &$lists, $Itemid, $customFields, $pop) {
        global $my, $eSess, $mainframe, $disableEvents, $database, $mosConfig_absolute_path, $mosConfig_lang, $mosConfig_live_site;
       
        // get the userid
        if (isset($registration->userid)) {
            $userid = $registration->userid;
        } else {
            $userid = $my->id;
        }
        
        // determine what event information is displayed
        // check for subject
        $title = $row->title;
        if ($eSess["showSubject"] and !empty($row->subject)) {
            $title .= "(".$row->subject.")";
        }
        $title .= "\n";
        // check for times
        if ($eSess["showTimes"]) {
            $times = "";
            if (!empty($row->event_id)) {
                $times .= "<font size=\"1\">\n";
                
                // taken directly from components/com_events/events.html.php (with minor changes)
                // Id: events.html.php,v 1.23 2004/10/05 20:18:34 mleinmueller Exp
                require_once( $mosConfig_absolute_path."/components/com_events/events.html.php");
                // CHECK LANGUAGE
                if (!defined( '_CAL_LANG_INCLUDED' )) {
                    if (file_exists($mosConfig_absolute_path."/components/com_events/language/".$mosConfig_lang.".php") ) { 
                        include_once($mosConfig_absolute_path."/components/com_events/language/".$mosConfig_lang.".php");
                    } else { 
                        include_once($mosConfig_absolute_path."/components/com_events/language/english.php");
                    }
                }
                if ($row->start_date == $row->stop_date) {
                    $times .= $row->start_date .",&nbsp;".$row->start_time."&nbsp;-&nbsp;".$row->stop_time."<br/>";
                } else {
                    $times .= _CAL_LANG_FROM."&nbsp;".$row->start_date."&nbsp;-&nbsp;".$row->start_time."<br />".
                        _CAL_LANG_TO."&nbsp;".$row->stop_date."&nbsp;-&nbsp;".$row->stop_time."<br/>";
                
                    if ($row->reccurtype > 0) {                
                        switch ($row->reccurtype) {
                            case "1": $reccur = _CAL_LANG_REP_WEEK;break;               
                            case "2": $reccur = _CAL_LANG_REP_WEEK;break;
                            case "3": $reccur = _CAL_LANG_REP_MONTH;break;
                            case "4": $reccur = _CAL_LANG_REP_MONTH;break;
                            case "5": $reccur = _CAL_LANG_REP_YEAR;break;                   
                        }
                        if ($row->reccurday >= 0) {
                            $dayname = mosEventsHTML::getLongDayName($row->reccurday);         
                            if ($row->reccurtype == 1) {                
                                $times .= $dayname."&nbsp;"._CAL_LANG_EACHOF."&nbsp;".$reccur; 
                            } elseif (($row->reccurtype == 1) || ($row->reccurtype == 2)) {
                                $pairorimpair = $row->reccurweeks == "pair" ? _CAL_LANG_REP_WEEKPAIR : ($row->reccurweeks == "impair" ? _CAL_LANG_REP_WEEKIMPAIR : _CAL_LANG_REP_WEEK);
                                $times .= _CAL_LANG_EACH."&nbsp;".$dayname."&nbsp;".$pairorimpair."";
                            } else {
                                $times .= _CAL_LANG_EACH."&nbsp;".$reccur;
                            }
                        } else {
                            $times .= _CAL_LANG_EACH."&nbsp;".$reccur;
                        }           
                    } else {
                        if($row->start_date != $row->stop_date) $times .= _CAL_LANG_ALLDAYS;
                    }
                }
                
                $times .= "          </font>\n" .
                "          <br />\n";
            }
        }
        // check for activity
        if ($eSess["showActivity"] and !empty($row->activity)) {
            $activity = "<tr align=\"left\" valign=\"top\">\n" . 
                "        <td colspan=\"2\">\n" . 
                "          $row->activity\n" . 
                "        </td>\n" . 
                "      </tr>\n";
        }
        // check for contact and location
        if (($eSess["showContact"] and !empty($row->contact)) or ($eSess["showLocation"] and !empty($row->location))) {
            $contactLocation = "<tr>\n" . 
                "        <td colspan=\"2\" align=\"left\" valign=\"top\">\n" . 
                "          <br />\n" .
                "          <font size=\"1\">\n"; 
            if ($eSess["showContact"] and isset($row->contact)) {
                $contactLocation .= "          $row->contact<br />\n";
            }
            if ($eSess["showLocation"] and isset($row->location)) {
                $contactLocation .= "          $row->location<br />\n";
            }
            $contactLocation .= "          </font>\n" . 
                "        </td>\n" . 
                "      </tr>\n";
        }
        // check for extra
        if ($eSess["showExtra"] and !empty($row->extra)) {
            $extra = "<tr>\n" . 
                "        <td colspan=\"2\" align=\"left\" valign=\"top\">$row->extra</td>\n" . 
                "      </tr>\n";
        }
        
        // determine the number of available registrations
        if (!$eSess["autoFull"]) {
            $availregistrations = -1;
        } elseif ($row->maxregistrations=='0') {
            $availregistrations = -1;
        } else {
            $availregistrations = ($row->maxregistrations-$row->numregistrations);
            if ($availregistrations<0) $availregistrations=0;
        }
        
        // check for numbers
        if ($eSess["userNumber"]) {
            $number = "<tr>\n<td>" . _ESESS_REG_AVAIL . ":</td>\n<td>";
                
            if ($row->maxregistrations==0) {
                $number .= _ESESS_UNLIMITED."\n";
            } else {
                 if ($availregistrations<0) {
                    $number .= "0";
                 } else {
                    $number .= $availregistrations;
                 }
                $number .= " "._ESESS_OUT_OF." $row->maxregistrations\n";
            }
            $number .="        </td>\n" . 
                "      </tr>\n";
        }
        


        
		// prepare the form action
		$action = "index.php?option=$option&amp;Itemid=$Itemid";
		
		// display the html of the form
		require_once($mosConfig_absolute_path . '/administrator/components/com_attend_events/fields.attend_events.php');
		JS_AE_CustomFields_FrontEnd::insertCustomFieldScripts($row->session_id);
?>     
        
    <script language="javascript" type="text/javascript">
		<!--  to hide script contents from old browsers
		function submitbutton(pressbutton) {
		  var form = document.registrationForm;
		  var availableRegistrations = <?php echo $availregistrations; ?>;
		  var msg = "";
		  
		  if (pressbutton!='cancel') {
			// do some validation first
			
			// check that name is entered
			if (form.fullname.value=='') {
				msg += "<?php echo _ESESS_VAL_REG_FULLNAME; ?>\n";
			}
			
			// check the email address
			if (form.email.value=='') {
				msg += "<?php echo _ESESS_VAL_REG_EMAIL; ?>\n";
			} else {
				// any extra email validation here
			}
			
			// check numregistrations
			var numOk = true;
			if (form.numregistrations.value=='') {
				numOk = false;
			} else if (!isPosInteger(form.numregistrations.value)) {
				numOk = false;
			} else if (form.numregistrations.value=='0') {
				numOk = false;
			} else if (form.numregistrations.value > availableRegistrations) {
				if (availableRegistrations!=-1) numOk = false;
			}
			if (!numOk) {
				msg += "<?php echo _ESESS_VAL_REG_NUMBER; ?>"+availableRegistrations+".\n";
			}
			// end of validation
		  }
		  
		  // check custom fields
		  msg += validateInput();
		  
		  // check to see if we are ok to submit
		  if (msg=='') {
			// no message so we can submit
			form.task.value=pressbutton;
			form.submit();
		  } else {
			// display validation error
			alert("<?php echo _ESESS_VAL_REG_ALERT; ?>\n\n"+msg);
		  }
		} 
		
		function isPosInteger(inputVal) {
		  inputStr = inputVal.toString();
		  for (var i = 0; i < inputStr.length; i++) {
			var oneChar = inputStr.charAt(i);
			if (oneChar < "0" || oneChar > "9") {
			  return false;
			}
		  }
		  return true;
		} // isPosInteger()
		
		// end hiding contents from old browsers  -->
    </script>
<?php
	mosCommonHTML::loadOverlib();
?>

    <form action="<?php echo $action; ?>" method="post" name="registrationForm">
	<table class="contentpaneopen" width="100%">
		<tr>
			<td class="contentheading" width="100%"><?php echo $title; ?></td>
<?php


// Set-up the parameters object.
$params = & new mosParameters( '' );
$params->def( 'print', true );
if ($pop) {
$params->def( 'popup', true );
} else {
$params->def( 'popup', false );
}
$params->def( 'icons', true );
 
// Set-up the URL that will be opened if the print icon is clicked.
$url = $mosConfig_live_site . '/index2.php?option=' . $option . '&amp;task=view&amp;pop=1&amp;id=' .
      $row->session_id;
 
 
// Draw the Print icon.
global $hide_js;
mosHTML::PrintIcon( $row, $params, $hide_js, $url );



?>
		</tr>
	</table> 
	<table class="contentpaneopen">
<?php		 
	 	if (!empty($registration->host_name)) { ?>
		<tr>
			<td colspan="2" class="small">
				<?php echo _ESESS_REG_HOSTED_BY; ?> <?php echo $registration->host_name; ?>
			</td>
		</tr>
<?php } /* if host_name not empty */ ?>
    	<tr>
			<td align="right" valign="top"><?php echo @$times; ?></td>    
        	<td>&nbsp;</td>    
      	</tr>
      	<tr align="left" valign="top">
        	<td colspan="2">
          		<?php echo $row->introtext; ?>
        	</td>
      	</tr>
      	<?php echo @$activity; ?>
      	<?php echo @$contactLocation; ?>
      	<?php echo @$extra; ?>
      	<tr>
      		<td valign="baseline"><?php echo _ESESS_REG_DATETIME; ?>:</td>
      		<td valign="baseline">
      			<?php  
      				
      					$up_date = strftime($eSess["shortDateFormat"],strtotime($row->session_up));
      					$down_date = strftime($eSess["shortDateFormat"],strtotime($row->session_down));
      					
      					
      					$singleDaySession = ((strtotime($row->session_down) - strtotime($row->session_up)) < 12*60*60) ? 1 : 0;
      					
      					if ($singleDaySession) {
      						echo strftime($eSess["longDateFormat"],strtotime($row->session_up));
      						echo ", ";
      						echo strftime($eSess["timeFormat"],strtotime($row->session_up));
      						echo " &mdash; ";
      						echo strftime($eSess["timeFormat"],strtotime($row->session_down));
      					} else {
      						echo strftime($eSess["longDateFormat"],strtotime($row->session_up)) . ", " . strftime($eSess["timeFormat"],strtotime($row->session_up)) . " &mdash; " . strftime($eSess["longDateFormat"],strtotime($row->session_down)) . ", " . strftime($eSess["timeFormat"],strtotime($row->session_down));
      					}
      			?>
      		</td>
      	</tr>
      	
      	<?php /* Show Session Location? */
      		  if (!empty($row->venue_name) or !empty($row->venue_address) or !empty($row->venue_city) or !empty($row->venue_state) or !empty($row->venue_postalcode) or !empty($row->venue_country)) {
        ?>
      	<tr>
      		<td valign="top">
      			<?php echo _ESESS_REG_LOCATION; ?>:
      		</td>
      		<td valign="top">
      			<?php if (!empty($row->venue_name)) echo $row->venue_name . "<br />"; ?>
      			<?php if (!empty($row->venue_address)) {
      			       echo $row->venue_address;
      			       if ($eSess["showMap"]) echo " ( <a href=\"http://maps.google.com/maps?q=" . $row->venue_address . "+" . $row->venue_city . "+" . $row->venue_state . "+" . $row->venue_postalcode . "+" . $row->venue_country ."\" title=\"" . _ESESS_REG_MAPTEXT . "\">map</a> )";
      			       echo "<br />";
      			   } ?>
      			<?php if (!empty($row->venue_city)) echo $row->venue_city . ", "; ?>
      			<?php if (!empty($row->venue_state)) echo $row->venue_state . "<br />"; ?>
      			<?php if (!empty($row->venue_postalcode)) echo $row->venue_postalcode . "<br />"; ?>
      			<?php if (!empty($row->venue_country)) echo $row->venue_country . "<br />"; ?>
      			<?php if (!empty($row->venue_webaddress)) echo "<a href=\"" . $row->venue_webaddress . "\">" . $row->venue_webaddress . "</a><br />"; ?>
      		</td>
      	</tr>
      	<?php } ?>
      	<?php echo @$number; ?>
      	<tr>
      		<td>
      			<?php echo _ESESS_REG_CLOSE; ?>:
      		</td>
        	<td>
          		<?php echo mosFormatDate($row->registration_down); ?>
        	</td>
        </tr>
    </table>
   
   
<?php	/*
         * Check to see whether the registration form should be displayed.
         * For instance, a session may be listed even though the registration
         * period hasn't begun, or sessions may be displayed to all users
         * including guests, but only registered users can register.
         */
         
         $errorMsg = "";
         
         if ($row->status==0)  $errorMsg = "Registration for this session opens on " . strftime($eSess["longDateFormat"],strtotime($row->registration_up));
         
         $allowedUsers = array();
         switch ($row->availability) {
         	case "0" :	// Session Set to Everyone
         			$allowedUsers[] = "Guest";
         			$allowedUsers[] = "Registered";
         		break;
         	case "1" :	// Session Set to Registrered Users Only
         			$allowedUsers[] = "Registered";
         		break;
         	case "2" :
         			$allowedUsers[] = "Guest";
         		break;
         	case "3" :
					switch ($eSess["registrationsFrom"]) {
						case "0" :	// Session Set to Everyone
								$allowedUsers[] = "Guest";
								$allowedUsers[] = "Registered";
							break;
						case "1" :	// Session Set to Registrered Users Only
								$allowedUsers[] = "Registered";
							break;
						case "2" :
								$allowedUsers[] = "Guest";
							break;
					}	
         		break;
         }

         
		if ((array_search("Guest",$allowedUsers) === false) && (!$my->id)) {
			$errorMsg = _ESESS_ERROR_ONLY_REGISTERED;
		}
		if ((array_search("Registered",$allowedUsers) === false) && ($my->id)) {
			$errorMsg = _ESESS_ERROR_ONLY_GUESTS;
		}

        
        if ($eSess["autoFull"] && ($availregistrations <= 0) && ($row->maxregistrations > 0)) {
        	$errorMsg = _ESESS_ERROR_FULL;
        }
        
       
       	if ($row->status == 3) {
       		$errorMsg = _ESESS_ERROR_CLOSED;
       	}
        
        
        if (empty($errorMsg)) {
        	 HTML_Events_Sessions::displayRegistrationForm($option, $registration, $customFields);
		} else {
?>
	<table cellpadding="4" cellspacing="1" border="0" class="adminform">
		<tr>
			<td>
				<h3><?php echo $errorMsg; ?></h3>
			</td>
		</tr>
	</table>
<?php
		} // else of if (empty($errorMsg)) 
		
		/*
		 * If necessary, call function to display who has already registered
		 */
		if ($eSess["showRegistered"]) {
			HTML_Events_Sessions::displayRegistrations($row);
		}
?>
	

<?php	if ($eSess["individualOnly"]) { ?>
    <input type="hidden" name="numregistrations" value="1" />
<?php	} ?>
    <input type="hidden" name="registration_id" value="<?php echo $registration->registration_id; ?>" />
    <input type="hidden" name="session_id" value="<?php echo $row->session_id; ?>" />
    <input type="hidden" name="id" value="<?php echo $row->session_id; ?>" />
    <input type="hidden" name="userid" value="<?php echo $userid; ?>" />
    <input type="hidden" name="task" value="" />
    </form>
    <br />
<?php
    }  // viewSession()
   
   
	function displayRegistrations(&$row) {
		global $database, $mosConfig_live_site, $mosConfig_lang, $eSess;
		
		/* 
		 * Original Code from Michael Spredemann (scubaguy), which was based on
	     * Buddy Hack by Ford on http://www.mambojoe.com
	     * Revised by pcarr to conditionally deal with guests and community builder
	     */

		// query for people already registered
		$query  = "SELECT * FROM #__events_registrations ";
		$query .= "WHERE session_id='".$row->session_id."' AND cancel_date='0000-00-00 00:00:00' ";
		$query .= "ORDER BY fullname ASC";
		$database->setQuery($query);
		$registrants = $database->loadObjectList();


		if (count($registrants) > 0) {
			echo "<h3>" . _ESESS_REG_LIST . "</h3>";
		
			foreach ($registrants as $registrant) {			
				if ($eSess["cbIntegrated"] && $eSess["showAvatar"]) {
					// Load the avatar picture.  For guests, display the appropriate no_picture file...
					if ($registrant->userid) {
						$query = "SELECT avatar FROM #__comprofiler WHERE user_id='".$registrant->userid."' AND avatarapproved=1";
						$database->setQuery( $query );
						$avatarFileName = $database->loadObjectList();
						if ($avatarFileName[0]->avatar) {
							/* 
							 * Some photos may be from the gallery, while others may be user submitted
							 */
							if (strcmp("gallery", substr($avatarFileName[0]->avatar, 0, 7))) {
								$avatarImgPath = $mosConfig_live_site . "/images/comprofiler/tn" . $avatarFileName[0]->avatar;
							} else {
								$avatarImgPath = $mosConfig_live_site . "/images/comprofiler/" . $avatarFileName[0]->avatar;
							}
						} else {
							$avatarImgPath = $mosConfig_live_site . "/components/com_comprofiler/images/" . $mosConfig_lang . "/tnnophoto.jpg";
						}
					} else {
						$avatarImgPath = $mosConfig_live_site . "/components/com_comprofiler/images/" . $mosConfig_lang . "/tnnophoto.jpg";
					}
					
					echo "<img src=\"" . $avatarImgPath . "\" alt=\"\" align=\"left\" />";
				}
				
				// Display User Details
				echo $registrant->fullname . "<br />";
				echo $registrant->comments . "<br clear=\"left\" /><br />";
			
			} //foreach ($registrants as $registrant)
		} // if (count($registrants) > 0) 
	} // displayRegistrations
	
	
	
	
	
	
	
   
	function displayRegistrationForm($option, &$registration, &$customFields) {
   		global $eSess, $mosConfig_absolute_path;
?>
	<table cellpadding="4" cellspacing="1" border="0" class="adminform">
		<tr>
			<td>
				<?php echo _ESESS_FIELD_FULLNAME.":&nbsp;"._ESESS_REQUIRED; ?>
			</td>
        	<td>
        		<input class="inputbox" type="text" name="fullname" tabindex="1" value="<?php echo $registration->fullname; ?>" size="50" maxlength="100" /><?php echo returnToolTip( "_ESESS_FIELD_FULLNAME" )."\n"; ?>
        	</td>
      	</tr>
      	<tr>
			<td>
				<?php echo _ESESS_FIELD_EMAIL.":&nbsp;"._ESESS_REQUIRED; ?>
			</td>
        	<td>
        		<input class="inputbox" type="text" name="email" tabindex="2" value="<?php echo $registration->email; ?>" size="50" maxlength="254" /><?php echo returnToolTip( "_ESESS_FIELD_EMAIL" )."\n"; ?>
        	</td>
      	</tr>
<?php	if (!$eSess["individualOnly"]) { ?>
      	<tr>
        	<td>
        		<?php echo _ESESS_FIELD_NUM_PEOPLE.":&nbsp;"._ESESS_REQUIRED; ?>
        	</td>
        	<td>
        		<input class="inputbox" type="text" name="numregistrations" tabindex="3" value="<?php echo $registration->numregistrations ? $registration->numregistrations : '1'; ?>" size="4" maxlength="4" /><?php echo returnToolTip( "_ESESS_FIELD_NUM_PEOPLE" )."\n"; ?>
        	</td>
      	</tr>
<?php	} // individual only
	
	   /*
        * Show custom fields...
        * Code incorporated into a class for ease of use.
        */
        
		require_once( $mosConfig_absolute_path."/administrator/components/$option/fields.attend_events.php" );
        
        foreach($customFields as $customField) {
            echo "<tr>\n";
            echo "\t<td>";
            HTML_AE_CustomFields::printFieldTitle($customField);
            echo "</td>\n";
            
            echo "\t<td>\n";
            HTML_AE_CustomFields::printFieldInput($customField);
            echo "\t</td>\n";
            echo "</tr>\n";
        }



        if ($eSess["showRegistered"]) { ?>
      		<tr>
        		<td valign="baseline"><?php echo _ESESS_FIELD_COMMENTS; ?></td>
        		<td>
          			<textarea name="comments" rows="4" cols="40"><?php echo @$registration->comments; ?></textarea>
          			<?php echo returnToolTip( "_ESESS_FIELD_COMMENTS" )."\n"; ?>
        		</td>
      		</tr>
<?php	} ?>
 


		<tr>
			<td colspan="2" align="center">
<?php
			if (isset($registration->userid)) {
			// registered user with previous registration
			// so display all buttons
?>
				<input type="button" name="register" value="<?php echo _ESESS_BUTTON_UPDATE; ?>" onclick="submitbutton('update');" />
				<input type="reset" value="<?php echo _ESESS_BUTTON_RESET; ?>" />
<?php
            	if ($eSess["userCancellation"]) {
                // allow the user to cancel
?>
          			<input type="button" name="cancel" value="<?php echo _ESESS_BUTTON_CANCEL; ?>" onclick="submitbutton('cancel');" />
<?php
            	}
        	} else {
            // guest or registered user without previous registration
?>
          		<input type="button" name="register" value="<?php echo _ESESS_BUTTON_REGISTER; ?>" onclick="submitbutton('register');" />
          		<input type="reset" value="<?php echo _ESESS_BUTTON_RESET; ?>" />

<?php
        	}
?>
			</td>
		</tr>
	</table>
<?php	
   } // displayRegistrationForm
   
   
   
   
   
   
   
    
    
    /**
    * Function to display the cancellation message
    * 
    * @param string $title Title of the session just cancelled from
    * @param string $url Url that leads back to the session just cancelled from
    * @oaram string $fullname Name of the person who just cancelled
    * @return void
    */
function cancelSession($title, $text) {
?>
    <div class="contentheading"><?php echo $title ?></div>
    <?php echo $text; ?>
<?php 
    } // cancelSession()








} // class - HTML_Events_Sessions
?>
