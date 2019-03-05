<?php
/**
* @version $Id: admin.attend_events.html.php 29 2007-03-17 02:22:41Z pcarr $
* @package Attend Events
* @copyright (C) 2004 Tony Blair
* @copyright (C) 2005-06 Peter Carr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* Events Session Admin HTML Class
* 
* Class that defines the methods used to display the various admin forms
*/


class HTML_Events_Sessions {

    /**
    * Method that displays the Sessions list
    * 
    */
function listSessions( &$rows, &$pageNav, $option, $search, $lists, $sortLinks ) {
	global $my, $mosConfig_live_site, $eSess;
	
 	mosCommonHTML::loadOverlib();       
?>
<script type="text/javascript">
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		
		  if ((pressbutton == 'edit') || (pressbutton == 'new')) {
			form.hidemainmenu.value = "1";
		  }
	
		submitform( pressbutton );	
		return;  
	}

    function changeSorting(newSort) {
        document.adminForm.sorting.value=newSort;
        document.adminForm.submit();
    }
</script>
<form action="index2.php" method="post" name="adminForm">
  <input type="hidden" name="sorting" value="<?php echo $sortLinks["sorting"]; ?>" />
  <table class="adminheading">
    <tr>
      <th class="categories">
        <?php echo _ESESS_FORM_SLIST; ?>
      </th>
      <td><?php echo _SEARCH_TITLE; ?>:</td>
      <td><input type="text" name="search" value="<?php echo $search; ?>" class="inputbox" onchange="document.adminForm.submit();" /></td>
      <td><?php echo $lists["filters"]; ?></td>
    </tr>
  </table>
  
  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
    <tr>
      <th width="20" align="center" nowrap="nowrap"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" /></th>
      <th class="title" width="20%" nowrap="nowrap"><?php echo _ESESS_SLIST_NAME.$sortLinks["N"]; ?></th>
      <th width="10%" align="center" nowrap="nowrap"><?php echo _ESESS_SLIST_SESSION_UP; ?></th>
      <th width="10%" align="center" nowrap="nowrap"><?php echo _ESESS_SLIST_SESSION_DOWN; ?></th>
      <th width="10%" align="center" nowrap="nowrap"><?php echo _ESESS_SLIST_REGISTRATION_UP.$sortLinks["SD"]; ?></th>
      <th width="10%" align="center" nowrap="nowrap"><?php echo _ESESS_SLIST_REGISTRATION_DOWN.$sortLinks["ED"]; ?></th>
      <th width="10%" align="center" nowrap="nowrap"><?php echo _ESESS_SLIST_NUM_REGISTRATIONS; ?></th>
      <th width="10%" nowrap="nowrap"><?php echo _ESESS_SLIST_STATUS.$sortLinks["S"]; ?></th>
      <th width="10%" nowrap="nowrap"><?php echo _ESESS_SLIST_AVAIL.$sortLinks["A"]; ?></th>
      <th width="10%" nowrap="nowrap"><?php echo _ESESS_SLIST_PUB.$sortLinks["P"]; ?></th>
    </tr>
<?php
        $k = 0;
        for ($i=0; $i < count( $rows ); $i++) {
            $row = &$rows[$i];
            $img = $row->published ? 'tick.png' : 'publish_x.png';
            $task = $row->published ? 'unpublish' : 'publish';
            $alt = $row->published ? 'Published' : 'Unpublished';

            /*
             * Since $row does not contain a field named "id", which is required
             * by the built-in mosCommonHTML::CheckedOutProcessing, create an
             * "id" field with the "session_id" value.
             */
            $row->id = $row->session_id;
            $checked = mosCommonHTML::CheckedOutProcessing( $row, $i );
?>
    <tr class="<?php echo "row$k"; ?>">

      <td width="20" align="center">
<?php  /*
        * Dispaly the lock icon if already checked out, or, if available, display a checkbox
        */
           echo $checked;
?>
      </td>
      <td width="20%">
<?php  /*
        * If availble, or checked out by the current user, make an active link.  Otherwise, just show the title.
        */
        
        if ($row->checked_out) {
            if ($row->checked_out != $my->id) {
                // checked out by someone else
                echo $row->title;
            } else {
                // checked out by me (and therefore able to edit)
                // Since there is not checkbox, store the session_id in the hidden form field "id"
?>
    <a href="#edit" onclick="document.adminForm.id.value=<?php echo $row->session_id; ?>; submitbutton('edit');"><?php echo  $row->title; ?></a>
<?php
            } // who checked it out?
        } else { 
       /* No one checked it out */
?>
      <a href="#edit" onclick="return listItemTask('cb<?php echo $i; ?>','edit')"><?php echo $row->title; ?></a>
<?php   } ?>      
      </td>
      <td width="10%" align="center"><?php echo mosFormatDate($row->session_up,$eSess["shortDateFormat"]); ?></td>
      <td width="10%" align="center"><?php echo mosFormatDate($row->session_down,$eSess["shortDateFormat"]); ?></td>
      <td width="10%" align="center"><?php echo mosFormatDate($row->registration_up,$eSess["shortDateFormat"]); ?></td>
      <td width="10%" align="center"><?php echo mosFormatDate($row->registration_down,$eSess["shortDateFormat"]); ?></td>
      <td width="10%" align="center"><?php echo $row->numregistrations; if ($row->maxregistrations>0) echo " " . _ESESS_OUT_OF . " " . $row->maxregistrations; ?></td>
      <td width="10%" align="center">
<?php
            switch ($row->status) {
                case 0:
                    echo _ESESS_STATUS_NEW;
                    break;
                    
                case 1:
                    echo _ESESS_STATUS_OPEN;
                    break;
                    
                case 2:
                    echo _ESESS_STATUS_FULL;
                    break;
                    
                case 3:
                    echo _ESESS_STATUS_CLOSED;
                    break;
                    
                case 4:
                    echo _ESESS_STATUS_CANCEL;
                    break;
            }
?>
      </td>
      <td width="10%" align="center">
<?php
		/* 
		 * Resolve "Global"
		 */
			if ($row->availability == 3) {
				$availability = $eSess["registrationsFrom"];
			} else {
				$availability = $row->availability;
			}
            switch ($availability) {
                case 0:
                    echo _ESESS_AVAIL_EVERY;
                    break;
                    
                case 1:
                    echo _ESESS_AVAIL_REG;
                    break;
                    
                case 2:
                    echo _ESESS_AVAIL_GUEST;
                    break;
                
                case 3:
                    echo _ESESS_AVAIL_GLOBAL;
                    break;
            }
?>
      </td>
      <td width="10%" align="center">
        <a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i; ?>','<?php echo $task; ?>')">
          <img src="images/<?php echo $img; ?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" />
        </a>
      </td>
    </tr>
<?php
            $k = 1 - $k;
        }
?>
  </table>
  <table cellpadding="4" cellspacing="0" border="0" class="adminlist">
    <tr>
      <th align="center" colspan="3"> <?php echo $pageNav->writePagesLinks(); ?></th>
    </tr>
    <tr>
      <td align="right" width="48%"><?php echo _PN_DISPLAY_NR; ?></td>
      <td> <?php echo $pageNav->writeLimitBox(); ?> </td>
      <td align="left" width="48%">
        <?php echo $pageNav->writePagesCounter()."\n"; ?>
      </td>
    </tr>
  </table>
  <input type="hidden" name="option" value="<?php echo $option; ?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="boxchecked" value="0" />
  <input type="hidden" name="act" value="sessions" />
  <input type="hidden" name="hidemainmenu" value ="0" />
<?php  /* 
        * The lock icon for checked out items means there is no corresponding
        * checkbox to indicate which item the user wants to edit (through $cid).
        * Instead, a hidden field $id is used...
        */
?>
    <input type="hidden" name="id" value="" />
</form>
<?php

    } // listSessions()
    
    
function editSessions(&$row, $option, $lists, &$customFields) {
        global $my, $mosConfig_live_site, $mosConfig_editor, $eSess, $mosConfig_absolute_path;
        
		require_once($mosConfig_absolute_path."/administrator/components/$option/fields.attend_events.php");
        

        if ((strpos($eSess["timeFormat"],'%I') === false) && (strpos($eSess["timeFormat"],'%l') === false)) {
        	$TwelveHrFormat = false;
        } else {
        	$TwelveHrFormat = true;
        }
        
        // make sure the row data is safe to show 
        mosMakeHtmlSafe( $row );     
        
        // display the html of the form
        ?>
    <script language="javascript" type="text/javascript">
    <!--		
    	// Mimic prototype library...
    	function $(nodeId) {
    		return document.getElementById(nodeId);
    	}
    
		function getCheckedValue(radioObj) {
			if(!radioObj)
					return "";
			var radioLength = radioObj.length;
			if(radioLength == undefined)
					if(radioObj.checked)
							return radioObj.value;
					else
							return "";
			for(var i = 0; i < radioLength; i++) {
					if(radioObj[i].checked) {
							return radioObj[i].value;
					}
			}
			return "";
		}
            
        function toSQLDateTimeFormat(theField) {
             if (!$(theField + '_date')) { alert('Missing Field: document.adminForm.' + theField + '_date'); }
             if (!$(theField + '_hrs')) { alert('Missing Field: document.adminForm.' + theField + '_hrs'); }
             if (!$(theField + '_mins')) { alert('Missing Field: document.adminForm.' + theField + '_mins'); }
             if (!$(theField)) { alert('Missing Field: document.adminForm.' + theField + '_datetime'); }             
        <?php if ($TwelveHrFormat) { ?>
            if (!$(theField + '_am')) { alert('Missing Field: document.adminForm.' + theField + '_ampm'); }
            if (!$(theField + '_pm')) { alert('Missing Field: document.adminForm.' + theField + '_ampm'); }
        <?php } ?>
            
            
            // Extract the time information from the form fields
            var theHours = parseInt( $(theField + '_hrs').value * 1);
        <?php if ($TwelveHrFormat) { ?>
            // Normally, add twelve hours for equivalent twenty-four hour time.
            // Not the case for 12:xx AM/PM
            
            if (theHours == 12) {
                if ($(theField + '_am').checked) theHours = 0;
            } else {
            	if ($(theField + '_pm').checked) theHours += 12;
            } 
        <?php } ?>
            var theMinutes = parseInt( $(theField + '_mins').value * 1);

			// SQL time format has leading zeros
			if (theHours < 10) theHours = '0' + theHours;
			if (theMinutes < 10) theMinutes = '0' + theMinutes;

            
            var theTime = theHours + ":" + theMinutes + ":00";

            // Save result to form field
            $(theField).value = $(theField + '_date').value + ' ' + theTime;
        }  
    
    	/**
    	 *  Ensures that the time inputs are valid (ie minutes between 0 and 59, hours between 1-12 or 0-23).
    	 *  If this is not the case, an error message is returned.  If the input is valid, and empty string is
    	 *  returned.
    	 */
        function CheckTime(theField) {
             // Make sure the fields exist
             if (!$(theField + '_hrs')) { alert('Missing Field: document.adminForm.' + theField + '_hrs'); }
             if (!$(theField + '_mins')) { alert('Missing Field: document.adminForm.' + theField + '_mins'); }
        
            // Extract the time information from the form fields
            var theHours = parseInt( $(theField + '_hrs').value * 1);
            var theMinutes = parseInt( $(theField + '_mins').value * 1);
            
            var errorMsg = '';
        
            // Test the field contents
        <?php if ($TwelveHrFormat) { ?>
            if ( ( theHours < 1 ) || ( theHours > 12 ) ) errorMsg += 'Hours are invalid!\n';
       	<?php } else { ?>  
       		if ( ( theHours < 0 ) || ( theHours > 23 ) ) errorMsg += 'Hours are invalid!\n';
       	<?php } ?>
        	if ( ( theMinutes < 0 ) || ( theMinutes > 59 ) ) errorMsg += 'Minutes are invalid!\n';
        
        	// identify which field is causing the problems
        	if ( errorMsg.length != 0 ) errorMsg = theField + '\n' + errorMsg;
        	
        	return errorMsg;
        }
    
    
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      
      // if cancel then dont validate
      if (pressbutton == 'cancel') {
        submitform(pressbutton);
        return;
      }

      // do field validation
      var msg = "";
      // validate title
      if (form.title.value=='') {
        msg += "<?php echo _ESESS_VAL_SESS_TITLE; ?>\n";
      }
      // validate introtext
      
      // validate registration start date
      if (form.registration_up_date.value=="") {
        msg += "<?php echo _ESESS_VAL_REGISTRATION_UP_DATE; ?>\n";
      }
      
      // validate registration stop date
      if (form.registration_down_date.value=="") {
        msg += "<?php echo _ESESS_VAL_REGISTRATION_DOWN_DATE; ?>\n";
      }
      
      // validate session start date
      if (form.session_up_date.value=="") {
        msg += "<?php echo _ESESS_VAL_SESSION_UP_DATE; ?>\n";
      }
      
      // validate maxregistrations
      if (form.maxregistrations.value=="") form.maxregistrations.value=0;
      if (!isPosInteger(form.maxregistrations.value)) {
        msg += "<?php echo _ESESS_VAL_SESS_MAX; ?>\n"; 
      } 
      
      // for single day events, the down date would be empty.  In this case, copy the up date into this field. 
      if (form.session_down_date.value.length == 0) form.session_down_date.value = form.session_up_date.value;
        
      // ensure the times are correct
	msg += CheckTime('session_up');
	msg += CheckTime('session_down');
	msg += CheckTime('registration_up');
	msg += CheckTime('registration_down');
	
	 // Create Unix Time Stamps for Delimiting Event Duration
	toSQLDateTimeFormat('session_up');
	toSQLDateTimeFormat('session_down');
	toSQLDateTimeFormat('registration_up');
	toSQLDateTimeFormat('registration_down');
     
     
     // Check Custom Fields
   	msg += validateFields();
   
      
      
      // display validation error or submit
      if (msg!="") {
        alert( "<?php echo _ESESS_VAL_ERROR; ?>\n"+msg );
      } else {
<?php getEditorContents( 'editor1', 'introtext' ) ; ?>
		enableFields();
        submitform( pressbutton );
      }

  
    }
    
    function isPosInteger(inputVal) {
    	if (inputVal.length > 0) {
      		inputStr = inputVal.toString();
      		for (var i = 0; i < inputStr.length; i++) {
        		var oneChar = inputStr.charAt(i);
        		if (oneChar < "0" || oneChar > "9") {
          			return false;
        		}
      		}
      		return true;
      	} else {
      		return false;
      	}
    }
    

   
   
    //-->
    </script>

<?php
	mosCommonHTML::loadCalendar();
	mosCommonHTML::loadOverlib();
?>
    <form action="index2.php" method="post" name="adminForm">
	
	<table class="adminheading">
    <tr>
    	<th class="categories">
        	<?php echo $row->session_id ? _ESESS_FORM_SESS_EDIT : _ESESS_FORM_SESS_ADD; ?>
        </th>
    </tr>
    </table>
    <table cellpadding="4" cellspacing="1" border="0" class="adminform">
    	<tr>
      		<th colspan="2"><?php echo _ESESS_TITLE_DESCRIPTION; ?></th>
      	</tr>
      	<tr>
      		<td valign="top" align="left" width="60%">
      			<table>
      				<tr>
    					<td><?php echo _ESESS_FIELD_TITLE.":&nbsp;"._ESESS_REQUIRED; ?></td>
						<td>
							<input class="inputbox" type="text" name="title" value="<?php echo $row->title; ?>" size="50" maxlength="50" />
						  	<?php echo returnToolTip( "_ESESS_FIELD_TITLE" )."\n"; ?>
						</td>
					</tr>
					<tr>
						<td valign="top"><?php echo _ESESS_FIELD_INTRO; ?>:</td>
						<td valign="top">
						  	<?php editorArea( 'editor1',  $row->introtext , 'introtext', 500, 250, '50', '15' )."\n" ; ?>
						  	<?php echo returnToolTip( "_ESESS_FIELD_INTRO" )."\n"; ?>
						</td>
					</tr>
				</table>
			</td>
			<td valign="top" align="right" width="40%">
				<table>
					<tr>
						<td valign="top" width="40%">    
							<table class="adminform">
								<tr>
									<th colspan="2"><?php echo _ESESS_TITLE_SESSION_GENERAL; ?></th>
								</tr>
								<tr>
									<td valign="bottom"><?php echo _ESESS_FIELD_STATUS; ?>:</td>
									<td valign="bottom">
									<?php
										switch ($row->status) {
											case 0:
												echo _ESESS_STATUS_NEW;
												break;
												
											case 1:
												echo _ESESS_STATUS_OPEN;
												break;
												
											case 2:
												echo _ESESS_STATUS_FULL;
												break;
												
											case 3:
												echo _ESESS_STATUS_CLOSED;
												break;
												
											case 4:
												echo _ESESS_STATUS_CANCEL;
												break;
										}
									?>
									<?php echo returnToolTip( "_ESESS_FIELD_STATUS" )."\n"; ?>
									</td>
								</tr>
								<tr>
									<td><? echo _ESESS_FIELD_SESSION_HOST; ?></td>
									<td>
										<?php echo $lists["host_id"]."\n"; ?>
										<?php echo returnToolTip( "_ESESS_FIELD_SESSION_HOST" )."\n"; ?>
									</td>
								</tr>
								<?php if ($eSess["eventIntegrated"]) { ?>
								<tr>
									<td><?php echo _ESESS_FIELD_EVENT; ?>:</td>
									<td>
										<?php echo $lists["event_id"]."\n"; ?>
										<?php echo returnToolTip( "_ESESS_FIELD_EVENT" )."\n"; ?>
									</td>
								</tr>
								<?php } /* if (eventIntegrated) */ ?>
								<tr>
									<td><?php echo _ESESS_FIELD_PUBLISH; ?>:</td>
									<td>
										<input type="checkbox" name="published" value="1" <?php echo $row->published ? 'checked="checked"' : ''; ?>/>
										<?php echo returnToolTip( "_ESESS_FIELD_PUBLISH" )."\n"; ?>
									</td>
								</tr>
								<tr>
									<th colspan="2"><?php echo _ESESS_TITLE_SESSION_DATETIME; ?></th>
								</tr>
								<tr>
									<td><?php echo _ESESS_FIELD_SESSION_UP_DATE.":&nbsp;"._ESESS_REQUIRED; ?></td>
									<td>
										<input class="inputbox" type="text" name="session_up_date" id="session_up_date" value="<?php $theDate = substr($row->session_up,0,10); echo strcmp($theDate,'0000-00-00') ? $theDate : '' ; ?>" size="10" maxlength="10" />
										<input type="reset" class="button" value="..." onclick="return showCalendar('session_up_date', 'yyyy-mm-dd');" />
										<?php echo returnToolTip( "_ESESS_FIELD_SESSION_UP_DATE" )."\n"; ?>
									</td>
								</tr>
								<tr>
									<td><?php echo _ESESS_FIELD_SESSION_UP_TIME; ?></td>
									<td>
										<?php HTML_Events_Sessions::displayTimeFields($row,'session_up'); ?>
										<?php echo returnToolTip( "_ESESS_FIELD_EVENT_STARTTIME" ); ?>
									</td>
								</tr>
								<tr>
									<td><?php echo _ESESS_FIELD_SESSION_DOWN_DATE; ?></td>
									<td>
										<input class="inputbox" type="text" name="session_down_date" id="session_down_date" value="<?php $theDate = substr($row->session_down,0,10); echo strcmp($theDate,'0000-00-00') ? $theDate : '' ; ?>" size="10" maxlength="10" />
										<input type="reset" class="button" value="..." onclick="return showCalendar('session_down_date', 'yyyy-mm-dd');" />
										<?php echo returnToolTip( "_ESESS_FIELD_SESSION_DOWN_DATE" )."\n"; ?>
									</td>
								</tr>
								<tr>
									<td><?php echo _ESESS_FIELD_SESSION_DOWN_TIME; ?></td>
									<td>
										<?php HTML_Events_Sessions::displayTimeFields($row,'session_down'); ?>
										<?php echo returnToolTip( "_ESESS_FIELD_SESSION_DOWN_TIME" ); ?>
									</td>
								</tr>	
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
 	<br /><br />
<?php

    /* 
     * Implemented WebFX tab DHTML to streamline the layout of the edit event page
     */
    $tabs = new mosTabs( 0 );

    /*
     * Implementing WebFX "Tab DHTML" code to streamline interface for editing events
     * This tab will control all of the registration information
     */
	$tabs->startPane("content-pane");
	$tabs->startTab(_ESESS_TAB_SESSION_REGISTRATION,"registration-page");
?>    
    <table cellpadding="4" cellspacing="1" border="0" class="adminform">
        <tr>
            <td><?php echo _ESESS_FIELD_REGISTRATION_UP_DATE.":&nbsp;"._ESESS_REQUIRED; ?></td>
            <td>
              <input class="inputbox" type="text" name="registration_up_date" id="registration_up_date" value="<?php $theDate = substr($row->registration_up,0,10); echo strcmp($theDate,'0000-00-00') ? $theDate : '' ; ?>" size="10" maxlength="10" />
              <input type="reset" class="button" value="..." onclick="return showCalendar('registration_up_date', 'yyyy-mm-dd');" />
              <?php echo returnToolTip( "_ESESS_FIELD_REGISTRATION_UP_DATE" )."\n"; ?>
            </td>
        </tr>
        <tr>
            <td><?php echo _ESESS_FIELD_REGISTRATION_UP_TIME; ?></td>
            <td>
                <?php HTML_Events_Sessions::displayTimeFields($row,'registration_up'); ?>
                <?php echo returnToolTip( "_ESESS_FIELD_REGISTRATION_UP_TIME" ); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo _ESESS_FIELD_REGISTRATION_DOWN_DATE.":&nbsp;"._ESESS_REQUIRED; ?></td>
            <td>
                <input class="inputbox" type="text" name="registration_down_date" id="registration_down_date" value="<?php $theDate = substr($row->registration_down,0,10); echo strcmp($theDate,'0000-00-00') ? $theDate : '' ; ?>" size="10" maxlength="10" />
                <input type="reset" class="button" value="..." onclick="return showCalendar('registration_down_date', 'yyyy-mm-dd');" />
                <?php echo returnToolTip( "_ESESS_FIELD_REGISTRATION_DOWN_DATE" )."\n"; ?>
            </td>
        </tr> 
        <tr>
            <td><?php echo _ESESS_FIELD_REGISTRATION_DOWN_TIME; ?></td>
            <td>
                <?php HTML_Events_Sessions::displayTimeFields($row,'registration_down'); ?>
                <?php echo returnToolTip( "_ESESS_FIELD_REGISTRATION_DOWN_TIME" ); ?>
            </td>
        </tr>
    </table>
    
    <br /><br />
     <table cellpadding="4" cellspacing="1" border="0" class="adminform">
          <tr>
        <td><?php echo _ESESS_FIELD_MAX; ?>:</td>
        <td>
          <input class="inputbox" type="text" name="maxregistrations" value="<?php echo $row->maxregistrations; ?>" size="10" maxlength="10" />
          <?php echo returnToolTip( "_ESESS_FIELD_MAX" )."\n"; ?>
        </td>
      </tr>
      <tr>
        <td><?php echo _ESESS_FIELD_AVAIL; ?>:</td>
        <td>
          <?php echo $lists["availability"]."\n"; ?>
          <?php echo returnToolTip( "_ESESS_FIELD_AVAIL" )."\n"; ?>
        </td>
      </tr>
     </table>
    
<?php 
	/*
	 * Create a bare-bones table for holding the information about the custom fields.
     */
     
    $tabs->endTab();
    $tabs->startTab(_ESESS_TAB_CONFIG_FIELDS,"fields-page");
    require_once( $mosConfig_absolute_path."/administrator/components/com_attend_events/fields.attend_events.php" ); 
    JS_AE_CustomFields::insertCustomFieldScripts();
	AE_CustomFields::loadFieldTable($customFields);
    $tabs->endTab();

    /*
     * Implementing WebFX "Tab DHTML" code to streamline interface for editing events
     * This tab will control all of the session's venue information
     */
	$tabs->startTab(_ESESS_TAB_SESSION_VENUE,"venue-page");
?>
	<table cellpadding="4" cellspacing="1" border="0" class="adminform">
		<tr>
			<td><? echo _ESESS_FIELD_VENUE_LIST; ?>:</td>
			<td>
				<?php echo $lists["venue_id"]."\n"; ?>
				<?php echo returnToolTip( "_ESESS_FIELD_VENUE_LIST" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td><? echo _ESESS_FIELD_VENUE_TITLE; ?>:</td>
			<td>
				<input class="inputbox" type="text" name="venue_name" value="<?php echo $row->venue_name; ?>" size="50" maxlength="50" />
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_TITLE" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td valign="baseline"><? echo _ESESS_FIELD_VENUE_ADDRESS; ?>:</td>
			<td>
				<textarea name="venue_address" cols="47" rows="6"><?php echo $row->venue_address; ?></textarea>
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_ADDRESS" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td><? echo _ESESS_FIELD_VENUE_CITY; ?>:</td>
			<td>
				<input class="inputbox" type="text" name="venue_city" value="<?php echo $row->venue_city; ?>" size="50" maxlength="50" />
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_CITY" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td><? echo _ESESS_FIELD_VENUE_STATE; ?>:</td>
			<td>
				<input class="inputbox" type="text" name="venue_state" value="<?php echo $row->venue_state; ?>" size="50" maxlength="50" />
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_STATE" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td><? echo _ESESS_FIELD_VENUE_POSTALCODE; ?>:</td>
			<td>
				<input class="inputbox" type="text" name="venue_postalcode" value="<?php echo $row->venue_postalcode; ?>" size="50" maxlength="50" />
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_POSTALCODE" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td><? echo _ESESS_FIELD_VENUE_COUNTRY; ?>:</td>
			<td>
				<input class="inputbox" type="text" name="venue_country" value="<?php echo $row->venue_country; ?>" size="50" maxlength="50" />
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_COUNTRY" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td><? echo _ESESS_FIELD_VENUE_WEBADDRESS; ?>:</td>
			<td>
				<input class="inputbox" type="text" name="venue_webaddress" value="<?php echo $row->venue_webaddress; ?>" size="50" maxlength="50" />
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_WEBADDRESS" )."\n"; ?>
			</td>
		</tr>
	</table> 



<?php
    $tabs->endTab();
    $tabs->endPane();
    	
	//$tabs->startTab(_ESESS_TAB_SESSION_FEE,"fee-page");
    //$tabs->endTab();
?>

    
    
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="session_id" value="<?php echo $row->session_id; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="table" value="sessions" />
    
<?php
        if (!$eSess["eventIntegrated"]) {
?>
    <input type="hidden" name="event_id" value="0" />
<?php
        }
?>
    </form>
<br />
<?php
    }  // editSessions()


    function displayTimeFields(&$row, $fieldName) {
    	global $eSess;
    	
    	// Pase the timeFormat string to figure out how the hour is displayed
    	if (!(strpos($eSess["timeFormat"],'%H') === false)) {
    		$hourFormat = '%H';
    		$TwelveHour = false;
    	}
    	if (!(strpos($eSess["timeFormat"],'%k') === false)) {
    		$hourFormat = '%k';
    		$TwelveHour = false;
    	} 
    	if (!(strpos($eSess["timeFormat"],'%I') === false)) {
    		$hourFormat = '%I';
    		$TwelveHour = true;
    	} 
    	if (!(strpos($eSess["timeFormat"],'%l') === false)) {
    		$hourFormat = '%l';
    		$TwelveHour = true;
    	}
    	
    	if (empty($row->$fieldName)) {
    		$theTimeStamp = strtotime(date('Y-m-d ') . '00:00:00');
    	} else {
    		$theTimeStamp = strtotime($row->$fieldName);
    	}
    ?>
    	<input type="hidden" id="<?php echo $fieldName; ?>" name="<?php echo $fieldName; ?>" value="" />
        <input class="inputbox" type="text" id="<?php echo $fieldName; ?>_hrs" name="<?php echo $fieldName; ?>_hrs" value="<?php echo trim(strftime($hourFormat,$theTimeStamp)); ?>" size="2" maxlength="2" />
        :
        <input class="inputbox" type="text" id="<?php echo $fieldName; ?>_mins" name="<?php echo $fieldName; ?>_mins" value="<?php echo strftime('%M',$theTimeStamp); ?>" size="2" maxlength="2" />
<?php
    	if (!(strpos($eSess["timeFormat"],'%p') === false)) {
?>
		<input id="<?php echo $fieldName; ?>_am" name="<?php echo $fieldName; ?>_ampm" type="radio"  value="0" <?php if (strcmp(strftime('%p',$theTimeStamp),strftime('%p',strtotime(date('Y-m-d')." 01:00:00")))==0) echo "checked=\"checked\""; ?> />am
        <input id="<?php echo $fieldName; ?>_pm" name="<?php echo $fieldName; ?>_ampm" type="radio"  value="1" <?php if (strcmp(strftime('%p',$theTimeStamp),strftime('%p',strtotime(date('Y-m-d')." 13:00:00")))==0) echo "checked=\"checked\""; ?> />pm
<?php  		
    	}


    } // displayTimeFields
    
    
function displayConfigurationOptions($option, $msg="") {
        global $mosConfig_absolute_path, $mosConfig_live_site;
        
        // display the html
        
        ?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      
      // if cancel then dont validate
      if (pressbutton == 'cancel') {
        submitform(pressbutton);
        return;
      }

      submitform( pressbutton );
    }
    </script>
    <form action="index2.php" method="post" name="adminForm">
    <table class="adminheading">
      <tr>
        <th class="cpanel">
          <?php echo _ESESS_FORM_CONFIG."\n"; ?>
        </td>
        <td width="50%" align="right">
<?php 
    if (is_writable($mosConfig_absolute_path."/components/$option/config.attend_events.php")) {
        echo "&nbsp;\n";
    } else {
        echo _ESESS_CONFIG_ERR."\n";
    }
?>
        </td>
      </tr>
    </table>
    <table cellpadding="4" cellspacing="1" border="0" class="adminform">
      <tr>
        <td>
          <a href="javascript:submitbutton('options');" style="text-decoration: none;"><img src="<?php echo _ESESS_BUTTON_OPTIONS_IMG; ?>" align="middle" alt="<?php echo _ESESS_BUTTON_OPTIONS; ?>" border="0" />
            &nbsp;<?php echo _ESESS_BUTTON_OPTIONS; ?></a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="javascript:submitbutton('thank');" style="text-decoration: none;"><img src="<?php echo _ESESS_BUTTON_THANK_IMG; ?>" align="middle" alt="<?php echo _ESESS_BUTTON_THANK; ?>" border="0" />
            &nbsp;<?php echo _ESESS_BUTTON_THANK; ?></a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="javascript:submitbutton('confirm');" style="text-decoration: none;"><img src="<?php echo _ESESS_BUTTON_CONFIRM_IMG; ?>" align="middle" alt="<?php echo _ESESS_BUTTON_CONFIRM; ?>" border="0" />
            &nbsp;<?php echo _ESESS_BUTTON_CONFIRM; ?></a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="javascript:submitbutton('notify');" style="text-decoration: none;"><img src="<?php echo _ESESS_BUTTON_NOTIFY_IMG; ?>" align="middle" alt="<?php echo _ESESS_BUTTON_NOTIFY; ?>" border="0" />
            &nbsp;<?php echo _ESESS_BUTTON_NOTIFY; ?></a>
        </td>
      </tr>
      <!--<tr>
        <td>
          <a href="javascript:submitbutton('cancellation');" style="text-decoration: none;"><img src="<?php echo _ESESS_BUTTON_CANCELLATION_IMG; ?>" align="middle" alt="<?php echo _ESESS_BUTTON_CANCELLATION; ?>" border="0" />
            &nbsp;<?php echo _ESESS_BUTTON_CANCELLATION; ?></a>
        </td>
      </tr>-->
    </table>
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="table" value="config" />
    </form>
<?php
    } // displayConfigurationOptions()


function editConfigOptions(&$eSess, $option, $lists, $customFields) {
       /*
        * $database added to the list of global variables so that a call to the SQL database can
        * be made below (for getting community builder fields).  This should be done in the PHP-only filee
        * "admin.events_sessions.php" and passed as an additional parameter.  Something to work on...
        */
        global $mosConfig_live_site, $mosConfig_absolute_path, $database, $disableEvents, $disableCB;
        
        // make sure the row data is safe to show 
        mosMakeHtmlSafe( $eSess );
        
        // display the html of the form
        ?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      
      // if cancel then dont validate
      if (pressbutton == 'cancel') {
        submitform(pressbutton);
        return;
      }

      // do field validation
      var msg = "";
      
      // display validation error or submit
      if (msg!="") {
        alert( "<?php echo _ESESS_VAL_ERROR; ?>\n"+msg );
      } else {
        submitform( pressbutton );
      }
    }
    
    </script>
    
    
<?php
	mosCommonHTML::loadOverlib();
?>

    <form action="index2.php" method="post" name="adminForm">
    <table class="adminheading">
      <tr>
        <th class="config">
          <?php echo _ESESS_FORM_CONFIG_OPTIONS."\n"; ?>
        </th>
        <td width="50%" align="right">
<?php 
    if (is_writable($mosConfig_absolute_path."/components/$option/config.attend_events.php")) {
        echo "&nbsp;\n";
    } else {
        echo _ESESS_CONFIG_ERR."\n";
    }
?>
        </td>
      </tr>
    </table>
    
<?php  /*
        * Implemented WebFX tab code to organize the layout of this page.
        * First Tab:  General Configuration Options
        * Also, created multiple tables to divide the configuration options into logical sections.
        */
       
        $tabs = new mosTabs( 0 );
	    $tabs->startPane("content-pane");
        $tabs->startTab(_ESESS_TAB_CONFIG_GENERAL,"general-page");    
?>
	<table cellpadding="4" cellspacing="1" border="0" width="100%" class="adminform">
    	<tr <?php echo _ESESS_STYLE_TITLE; ?>>
        	<td colspan="6" align="left"><b><?php echo _ESESS_TITLE_INTEGRATION; ?></b></td>
		</tr>
		<tr>
        	<td width="30%" colspan="2"><?php echo $disableEvents ? _STYLE_DISABLED . _ESESS_FIELD_INTEGRATE . "</span>" : _ESESS_FIELD_INTEGRATE;?>:</td>
        	<td width="20%">
          		<input type="checkbox" name="eSess_eventIntegrated" value="1" <?php echo $eSess["eventIntegrated"] ? 'checked="checked"' : ''; echo $disableEvents ? "disabled" : ""; ?> />
          		<?php echo returnToolTip( "_ESESS_FIELD_INTEGRATE" )."\n"; ?>
        	</td>
        
<?php  /* 
        * HTML to allow the user to toggle whether to integrate with "Community Builder" component (if available)
        */
?>
        <td width="30%" colspan="2"><?php echo $disableCB ? _STYLE_DISABLED . _ESESS_FIELD_CBINTEGRATED . "</span>" : _ESESS_FIELD_CBINTEGRATED; ?>:</td>
        <td width="20%">
           <input type="checkbox" name="eSess_cbIntegrated" value="1" <?php echo $eSess["cbIntegrated"] ? 'checked="checked"' : ''; echo $disableCB ? "disabled" : ""; ?> />
          <?php echo returnToolTip( "_ESESS_FIELD_CBINTEGRATED" )."\n"; ?>
        </td>
    </tr>
    
<?php  /* 
        * For clarity, all configuration options pertaining to how Attend Events should integrate with Events are placed here...
        */
?>    
	<tr>
		<td width="5%">&nbsp;</td>
		<td width="25%"><?php echo !$eSess["eventIntegrated"] ? _STYLE_DISABLED . _ESESS_FIELD_SHOW_SUBJECT . "</span>" : _ESESS_FIELD_SHOW_SUBJECT;?>:</td>
		<td width="20%">
			<input type="checkbox" name="eSess_showSubject" value="1" <?php echo $eSess["showSubject"] ? 'checked="checked"' : ''; ?> <?php echo $eSess["eventIntegrated"] ? '' : 'disabled'; ?> />
			<?php echo returnToolTip( "_ESESS_FIELD_SHOW_SUBJECT" )."\n"; ?>
		</td>
		<td width="5%">&nbsp;</td>
		<td width="25%"><?php echo !$eSess["cbIntegrated"] ? _STYLE_DISABLED . _ESESS_FIELD_SHOWAVATAR . "</span>" : _ESESS_FIELD_SHOWAVATAR;?>:</td>
		<td width="20%">
			<input type="checkbox" name="eSess_showAvatar" value="1" <?php echo $eSess["showAvatar"] ? 'checked="checked"' : ''; ?> <?php echo $eSess["cbIntegrated"] ? '' : 'disabled'; ?> />
			<?php echo returnToolTip( "_ESESS_FIELD_SHOWAVATAR" )."\n"; ?>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo !$eSess["eventIntegrated"] ? _STYLE_DISABLED . _ESESS_FIELD_SHOW_ACTIVITY . "</span>" : _ESESS_FIELD_SHOW_ACTIVITY;?>:</td>
		<td>
        	<input type="checkbox" name="eSess_showActivity" value="1" <?php echo $eSess["showActivity"] ? 'checked="checked"' : ''; ?> <?php echo $eSess["eventIntegrated"] ? '' : 'disabled'; ?> />
          	<?php echo returnToolTip( "_ESESS_FIELD_SHOW_ACTIVITY" )."\n"; ?>
		</td>	
		<td colspan="3">&nbsp;</td>	
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo !$eSess["eventIntegrated"] ? _STYLE_DISABLED . _ESESS_FIELD_SHOW_LOCATION . "</span>" : _ESESS_FIELD_SHOW_LOCATION;?>:</td>
		<td>
        	<input type="checkbox" name="eSess_showLocation" value="1" <?php echo $eSess["showLocation"] ? 'checked="checked"' : ''; ?> <?php echo $eSess["eventIntegrated"] ? '' : 'disabled'; ?> />
          	<?php echo returnToolTip( "_ESESS_FIELD_SHOW_LOCATION" )."\n"; ?>
		</td>
		<td colspan="3">&nbsp;</td>	
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo !$eSess["eventIntegrated"] ? _STYLE_DISABLED . _ESESS_FIELD_SHOW_CONTACT . "</span>" : _ESESS_FIELD_SHOW_CONTACT;?>:</td>
		<td>
        	<input type="checkbox" name="eSess_showContact" value="1" <?php echo $eSess["showContact"] ? 'checked="checked"' : ''; ?> <?php echo $eSess["eventIntegrated"] ? '' : 'disabled'; ?> />
          	<?php echo returnToolTip( "_ESESS_FIELD_SHOW_CONTACT" )."\n"; ?>
		</td>	
		<td colspan="3">&nbsp;</td>	
	</tr>	
	<tr>
		<td>&nbsp;</td>
		<td><?php echo !$eSess["eventIntegrated"] ? _STYLE_DISABLED . _ESESS_FIELD_SHOW_EXTRA . "</span>" : _ESESS_FIELD_SHOW_EXTRA;?>:</td>
		<td>
        	<input type="checkbox" name="eSess_showExtra" value="1" <?php echo $eSess["showExtra"] ? 'checked="checked"' : ''; ?> <?php echo $eSess["eventIntegrated"] ? '' : 'disabled'; ?> />
          	<?php echo returnToolTip( "_ESESS_FIELD_SHOW_EXTRA" )."\n"; ?>
		</td>	
		<td colspan="3">&nbsp;</td>	
	</tr>	
	<tr>
		<td>&nbsp;</td>
		<td><?php echo !$eSess["eventIntegrated"] ? _STYLE_DISABLED . _ESESS_FIELD_SHOW_TIME . "</span>" : _ESESS_FIELD_SHOW_TIME;?>:</td>
		<td>
        	<input type="checkbox" name="eSess_showTimes" value="1" <?php echo $eSess["showTimes"] ? 'checked="checked"' : ''; ?> <?php echo $eSess["eventIntegrated"] ? '' : 'disabled'; ?> />
          	<?php echo returnToolTip( "_ESESS_FIELD_SHOW_TIME" )."\n"; ?>
		</td>	
		<td colspan="3">&nbsp;</td>	
	</tr>	
    </table>
    <br /><br />
    

      

    <table cellpadding="4" cellspacing="1" border="0" class="adminform">
      <tr <?php echo _ESESS_STYLE_TITLE; ?>>
        <td colspan="4" align="left"><b><?php echo _ESESS_TITLE_REGISTRATIONCONTROL; ?></b></td>
    </tr>
      <tr>
        <td width="30%"><?php echo _ESESS_FIELD_AVAIL_ALLOW; ?>:</td>
        <td width="20%">
          <?php echo $lists["registrationsFrom"]."\n"; ?>
          <?php echo returnToolTip( "_ESESS_FIELD_AVAIL_ALLOW" )."\n"; ?>
        </td>
        <td width="30%"><?php echo _ESESS_FIELD_ALLOW_INDIVIDUAL; ?>:</td>
        <td width="20%">
        	<input type="checkbox" name="eSess_individualOnly" value="1" <?php echo $eSess["individualOnly"] ? 'checked="checked"' : ''; ?> />
        	<?php echo returnToolTip( "_ESESS_FIELD_ALLOW_INDIVIDUAL" )."\n"; ?>
        </td>
      </tr>
      <tr>
        <td><?php echo _ESESS_FIELD_FULL_PROC; ?>:</td>
        <td>
          <input type="checkbox" name="eSess_autoFull" value="1" <?php echo $eSess["autoFull"] ? 'checked="checked"' : ''; ?> />
          <?php echo returnToolTip( "_ESESS_FIELD_FULL_PROC" )."\n"; ?>
        </td>
        <td><?php echo _ESESS_FIELD_REG_CANCEL; ?>:</td>
        <td>
          <input type="checkbox" name="eSess_userCancellation" value="1" <?php echo $eSess["userCancellation"] ? 'checked="checked"' : ''; ?> />
          <?php echo returnToolTip( "_ESESS_FIELD_REG_CANCEL" )."\n"; ?>
        </td>
      </tr>
    </table>
    <br /><br />
    
	<table cellpadding="4" cellspacing="1" border="0" class="adminform">
	<tr <?php echo _ESESS_STYLE_TITLE; ?>>
        <td colspan="4" align="left"><b><?php echo _ESESS_TITLE_DATETIME; ?></b></td>
    </tr>
		<tr>
        	<td width="30%"><?php echo _ESESS_FIELD_DATE_SHORT; ?>:</td>
        	<td width="20%">
        		<?php echo $lists["shortDateFormat"]."\n"; ?>
        		<?php echo returnToolTip( "_ESESS_FIELD_DATE_SHORT" )."\n"; ?>
        	</td>
        	<td width="30%"><?php echo _ESESS_FIELD_DATE_LONG; ?>:</td>
        	<td width="20%">
        		<?php echo $lists["longDateFormat"]."\n"; ?>
        		<?php echo returnToolTip( "_ESESS_FIELD_DATE_LONG" )."\n"; ?>
        	</td>
      	</tr>
		<tr>
        	<td><?php echo _ESESS_FIELD_TIME; ?>:</td>
        	<td>
        		<?php echo $lists["timeFormat"]."\n"; ?>
        		<?php echo returnToolTip( "_ESESS_FIELD_TIME" )."\n"; ?>
        	</td>
        	<td colspan="2">&nbsp;</td>
      	</tr>
    </table>
    <br /><br />
    
    
    
    <table cellpadding="4" cellspacing="1" border="0" class="adminform">
      <tr <?php echo _ESESS_STYLE_TITLE; ?>>
        <td colspan="4" align="left"><b><?php echo _ESESS_TITLE_FRONTENDCONTROL; ?></b></td>
    </tr>
      <tr>
        <td valign="baseline" width="30%"><?php echo _ESESS_FIELD_LIST_START; ?>:</td>
        <td valign="baseline" width="20%">
          		<?php echo $lists["startListing"]."\n"; ?>
          		<?php echo returnToolTip( "_ESESS_FIELD_LIST_START" )."\n"; ?>
        	</td>
        	<td valign="baseline" width="30%"><?php echo _ESESS_FIELD_LIST_STOP; ?>:</td>
        	<td valign="baseline" width="20%">
        		<?php echo $lists["stopListing"]."\n"; ?>
        		<?php echo returnToolTip( "_ESESS_FIELD_LIST_STOP" )."\n"; ?>
      	  	</td>
      </tr>
      <tr>
          <td><?php echo _ESESS_FIELD_LIST_FULL; ?>:</td>
		  <td>
        		<input type="checkbox" name="eSess_showFull" value="1" <?php echo ($eSess["showFull"]) ? 'checked="checked"' : ''; ?> />
        		<?php echo returnToolTip( "_ESESS_FIELD_LIST_FULL" )."\n"; ?>
        	</td>
        	<td><?php echo _ESESS_FIELD_LIST_EVERYONE; ?>:</td>
        	<td>
        		<input type="checkbox" name="eSess_showAll" value="1" <?php echo ($eSess["showAll"]) ? 'checked="checked"' : ''; ?> />
        		<?php echo returnToolTip( "_ESESS_FIELD_LIST_EVERYONE" )."\n"; ?>
        	</td>
        </tr>    
    
      <tr>
        <td valign="baseline"  width="30%"><?php echo _ESESS_FIELD_USER_NUM; ?>:</td>
        <td width="20%">
        	<input type="checkbox" name="eSess_userNumber" value="1" <?php echo $eSess["userNumber"] ? 'checked="checked"' : ''; ?> />
        	<?php echo returnToolTip( "_ESESS_FIELD_USER_NUM" )."\n"; ?>
        </td>
        <td valign="top" width="30%"><?php echo _ESESS_FIELD_DISPLAY_FOOTER; ?>:</td>
        <td width="20%">
          <input type="checkbox" name="eSess_displayFooter" value="1" <?php echo $eSess["displayFooter"] ? 'checked="checked"' : ''; ?> />
          <?php echo returnToolTip( "_ESESS_FIELD_DISPLAY_FOOTER" )."\n"; ?>
        </td>
      </tr>
      <tr>
        <td valign="baseline"><?php echo _ESESS_FIELD_DISPLAY_GOOGLEMAP; ?>:</td>
        <td>
          <input type="checkbox" name="eSess_showMap" value="1" <?php echo $eSess["showMap"] ? 'checked="checked"' : ''; ?> />
          <?php echo returnToolTip( "_ESESS_FIELD_DISPLAY_GOOGLEMAP" )."\n"; ?>
        </td>
        <td valign="top"><?php echo _ESESS_FIELD_DISPLAY_REGISTERED; ?></td>
        <td>
        	<input type="checkbox" name="eSess_showRegistered" value="1" <?php echo $eSess["showRegistered"] ? 'checked="checked"' : ''; ?> />
        	<?php echo returnToolTip( "_ESESS_FIELD_DISPLAY_REGISTERED" )."\n"; ?>
        </td>
      </tr>
      
      
    </table>
<?php  /* 
        * Implemented WebFX tab code to organize the layout of this page.
        * End of the "General Configuration" tab.  The second tab will control
        * parameters associated with the registration fields, such as visibility.
        * Further, if integrating with the "Community Builder" component, each
        * registration field may extract a default value from the user's CB profile.
        */
	
        $tabs->endTab();
	    $tabs->startTab(_ESESS_TAB_CONFIG_FIELDS,"fields-page");
	    
	    /*
	     * Load Default Field Template
	     */
		require_once( $mosConfig_absolute_path."/administrator/components/com_attend_events/fields.attend_events.php" ); 
		JS_AE_CustomFields::insertCustomFieldScripts();
		AE_CustomFields::loadFieldTable($customFields);
?>
    
    
    
    
<?php  /*
        * End of HTML for controlling registration field properties
        * Also, the end of the second tab.
        */
        $tabs->endTab();
        $tabs->endPane();
?>    
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="table" value="config" />
    
    </form>
<br />
<?php
    }  // editConfigOptions()
    


    
function editConfigThanks(&$eSess, $option) {
        global $mosConfig_live_site, $mosConfig_editor, $mosConfig_absolute_path;
        
        // make sure the row data is safe to show 
        mosMakeHtmlSafe( $eSess );
        
        // determine if the events should be disabled
        $disableEvents = false;
        if (!is_dir($mosConfig_absolute_path."/components/com_events")) {
            $disableEvents = true;
        }
        
        mosCommonHTML::loadOverlib();
        
        // display the html of the form
        ?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      
      // if cancel then dont validate
      if (pressbutton == 'cancel') {
        submitform(pressbutton);
        return;
      }

      // do field validation
      var msg = "";
      
      // display validation error or submit
      if (msg!="") {
        alert( "<?php echo _ESESS_VAL_ERROR; ?>\n"+msg );
      } else {
<?php getEditorContents( 'editor1', 'eSess_thankHTML' ) ; ?>
        submitform( pressbutton );
      }
    }
    
    </script>

    <form action="index2.php" method="post" name="adminForm">
    <table cellpadding="4" cellspacing="0" border="0" width="100%">
      <tr>
        <td width="50%" class="sectionname" align="left">
          <img src="<?php echo _ESESS_BUTTON_THANK_IMG; ?>" border="0" />
          <?php echo _ESESS_FORM_CONFIG_THANK."\n"; ?>
        </td>
        <td width="50%" align="right">
<?php 
    if (is_writable($mosConfig_absolute_path."/components/$option/config.attend_events.php")) {
        echo "&nbsp;\n";
    } else {
        echo _ESESS_CONFIG_ERR."\n";
    }
?>
        </td>
      </tr>
    </table>
    <table cellpadding="4" cellspacing="1" border="0" class="adminform">
      <tr>
        <td valign="top"><?php echo _ESESS_FIELD_THANKYOU; ?>:</td>
        <td>
          <?php editorArea( 'editor1',  $eSess["thankHTML"] , 'eSess_thankHTML', 500, 250, '50', '15' ) ; ?>
          
          <?php echo returnToolTip( "_ESESS_FIELD_THANKYOU" )."\n"; ?>
        </td>
        <td valign="top">
          <?php echo _ESESS_REPLACE_TAGS."\n"; ?>
          <dl>
            <dt>{fullname}</dt>
            <dd><?php echo _ESESS_REPLACE_NAME; ?></dd>
            <dt>{email}</dt>
            <dd><?php echo _ESESS_REPLACE_EMAIL; ?></dd>
            <dt>{url}</dt>
            <dd><?php echo _ESESS_REPLACE_URL; ?></dd>
            <dt>{title}</dt>
            <dd><?php echo _ESESS_REPLACE_TITLE; ?></dd>
            <dt>{action}</dt>
            <dd><?php echo _ESESS_REPLACE_ACTION; ?></dd>
            <dt>{data}</dt>
            <dd><?php echo _ESESS_REPLACE_DATA; ?></dd>
          </dl>
        </td>
      </tr>
    </table>
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="table" value="config" />
    
    </form>
<br />
<?php
    }  // editConfigThanks()
    
    
function editConfigConfirm(&$eSess, $option) {
        global $mosConfig_live_site, $mosConfig_editor, $mosConfig_absolute_path;
        
        // make sure the row data is safe to show 
        mosMakeHtmlSafe( $eSess );
        
        // determine if the events should be disabled
        $disableEvents = false;
        if (!is_dir($mosConfig_absolute_path."/components/com_events")) {
            $disableEvents = true;
        }
        
        mosCommonHTML::loadOverlib();
        
        // display the html of the form
        ?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      
      // if cancel then dont validate
      if (pressbutton == 'cancel') {
        submitform(pressbutton);
        return;
      }

      // do field validation
      var msg = "";
      
      // display validation error or submit
      if (msg!="") {
        alert( "<?php echo _ESESS_VAL_ERROR; ?>\n"+msg );
      } else {
<?php getEditorContents( 'editor1', 'eSess_confirmEmailMsg' ) ; ?>
        submitform( pressbutton );
      }
    }
    
    </script>

    <form action="index2.php" method="post" name="adminForm">
    <table class="adminheading">
      <tr>
        <th class="inbox">
          <?php echo _ESESS_FORM_CONFIG_CONFIRM."\n"; ?>
        </th>
        <td width="50%" align="right">
<?php 
    if (is_writable($mosConfig_absolute_path."/components/$option/config.attend_events.php")) {
        echo "&nbsp;\n";
    } else {
        echo _ESESS_CONFIG_ERR."\n";
    }
?>
        </td>
      </tr>
    </table>
    <table cellpadding="4" cellspacing="1" border="0" class="adminform">
      <tr>
        <td valign="top"><?php echo _ESESS_FIELD_CONFIRM_SEND; ?>:</td>
        <td>
          <input type="checkbox" name="eSess_confirmEmailSend" value="1" <?php echo $eSess["confirmEmailSend"] ? 'checked="checked"' : ''; ?> />
          <?php echo returnToolTip( "_ESESS_FIELD_CONFIRM_SEND" )."\n"; ?>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><?php echo _ESESS_FIELD_CONFIRM_SUBJECT; ?>:</td>
        <td>
          <input class="inputbox" type="text" name="eSess_confirmEmailSubject" value="<?php echo $eSess["confirmEmailSubject"]; ?>" size="50" maxlength="100" />
          <?php echo returnToolTip( "_ESESS_FIELD_CONFIRM_SUBJECT" )."\n"; ?>
        </td>
        <td rowspan="2" valign="top">
          <?php echo _ESESS_REPLACE_TAGS."\n"; ?>
          <dl>
            <dt>{fullname}</dt>
            <dd><?php echo _ESESS_REPLACE_NAME; ?></dd>
            <dt>{email}</dt>
            <dd><?php echo _ESESS_REPLACE_EMAIL; ?></dd>
            <dt>{url}</dt>
            <dd><?php echo _ESESS_REPLACE_URL; ?></dd>
            <dt>{title}</dt>
            <dd><?php echo _ESESS_REPLACE_TITLE; ?></dd>
            <dt>{action}</dt>
            <dd><?php echo _ESESS_REPLACE_ACTION; ?></dd>
            <dt>{data}</dt>
            <dd><?php echo _ESESS_REPLACE_DATA; ?></dd>
          </dl>
        </td>
      </tr>
      <tr>
        <td valign="top"><?php echo _ESESS_FIELD_CONFIRM_MSG; ?>:</td>
        <td>
          <?php editorArea( 'editor1',  $eSess["confirmEmailMsg"] , 'eSess_confirmEmailMsg', 500, 250, '50', '15' ) ; ?>
          
          <?php echo returnToolTip( "_ESESS_FIELD_CONFIRM_MSG" )."\n"; ?>
        </td>
      </tr>
    </table>
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="table" value="config" />
    </form>
<br />
<?php
    }  // editConfigConfirm()
    
    
function editConfigNotify(&$eSess, $option) {
        global $mosConfig_live_site, $mosConfig_editor, $mosConfig_absolute_path;
        
        // make sure the row data is safe to show 
        mosMakeHtmlSafe( $eSess );
        
        // determine if the events should be disabled
        $disableEvents = false;
        if (!is_dir($mosConfig_absolute_path."/components/com_events")) {
            $disableEvents = true;
        }
        
        mosCommonHTML::loadOverlib();
        
        // display the html of the form
        ?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      
      // if cancel then dont validate
      if (pressbutton == 'cancel') {
        submitform(pressbutton);
        return;
      }

      // do field validation
      var msg = "";
      
      // display validation error or submit
      if (msg!="") {
        alert( "<?php echo _ESESS_VAL_ERROR; ?>\n"+msg );
      } else {
<?php getEditorContents( 'editor1', 'eSess_notifyEmailMsg' ) ; ?>
        submitform( pressbutton );
      }
    }
    
    </script>

    <form action="index2.php" method="post" name="adminForm">
    <table class="adminheading">
      <tr>
        <th class="msgconfig">
          <?php echo _ESESS_FORM_CONFIG_NOTIFY."\n"; ?>
        </td>
        <td width="50%" align="right">
<?php 
    if (is_writable($mosConfig_absolute_path."/components/$option/config.attend_events.php")) {
        echo "&nbsp;\n";
    } else {
        echo _ESESS_CONFIG_ERR."\n";
    }
?>
        </td>
      </tr>
    </table>
    <table cellpadding="4" cellspacing="1" border="0" class="adminform">
      <tr>
        <td valign="top"><?php echo _ESESS_FIELD_NOTIFY_SEND; ?>:</td>
        <td>
          <input type="checkbox" name="eSess_notifyEmailSend" value="1" <?php echo $eSess["notifyEmailSend"] ? 'checked="checked"' : ''; ?> />
          <?php echo returnToolTip( "_ESESS_FIELD_NOTIFY_SEND" )."\n"; ?>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><?php echo _ESESS_FIELD_NOTIFY_SUBJECT; ?>:</td>
        <td>
          <input class="inputbox" type="text" name="eSess_notifyEmailSubject" value="<?php echo $eSess["notifyEmailSubject"]; ?>" size="50" maxlength="100" />
          <?php echo returnToolTip( "_ESESS_FIELD_NOTIFY_SUBJECT" )."\n"; ?>
        </td>
        <td rowspan="2" valign="top">
          <?php echo _ESESS_REPLACE_TAGS."\n"; ?>
          <dl>
            <dt>{fullname}</dt>
            <dd><?php echo _ESESS_REPLACE_NAME; ?></dd>
            <dt>{email}</dt>
            <dd><?php echo _ESESS_REPLACE_EMAIL; ?></dd>
            <dt>{url}</dt>
            <dd><?php echo _ESESS_REPLACE_URL; ?></dd>
            <dt>{title}</dt>
            <dd><?php echo _ESESS_REPLACE_TITLE; ?></dd>
            <dt>{action}</dt>
            <dd><?php echo _ESESS_REPLACE_ACTION; ?></dd>
            <dt>{data}</dt>
            <dd><?php echo _ESESS_REPLACE_DATA; ?></dd>
          </dl>
        </td>
      </tr>
      <tr>
        <td valign="top"><?php echo _ESESS_FIELD_NOTIFY_MSG; ?>:</td>
        <td>
          <?php editorArea( 'editor1',  $eSess["notifyEmailMsg"] , 'eSess_notifyEmailMsg', 500, 250, '50', '15' ) ; ?>
          
          <?php echo returnToolTip( "_ESESS_FIELD_NOTIFY_MSG" )."\n"; ?>
        </td>
      </tr>
    </table>
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="table" value="config" />
    
    </form>
<br />
<?php
    }  // editConfigNotify()
    
    
function editConfigCancel(&$eSess, $option) {
        global $mosConfig_live_site, $mosConfig_editor, $mosConfig_absolute_path;
        
        // make sure the row data is safe to show 
        mosMakeHtmlSafe( $eSess );
        
        // determine if the events should be disabled
        $disableEvents = false;
        if (!is_dir($mosConfig_absolute_path."/components/com_events")) {
            $disableEvents = true;
        }
        
        mosCommonHTML::loadOverlib();
        
        // display the html of the form
        ?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      
      // if cancel then dont validate
      if (pressbutton == 'cancel') {
        submitform(pressbutton);
        return;
      }

      // do field validation
      var msg = "";
      
      // display validation error or submit
      if (msg!="") {
        alert( "<?php echo _ESESS_VAL_ERROR; ?>\n"+msg );
      } else {
<?php getEditorContents( 'editor1', 'eSess_notifyEmailMsg' ) ; ?>
        submitform( pressbutton );
      }
    }
    
    </script>

    <form action="index2.php" method="post" name="adminForm">
    <table cellpadding="4" cellspacing="0" border="0" width="100%">
      <tr>
        <td width="50%" class="sectionname" align="left">
          <img src="<?php echo _ESESS_BUTTON_CANCELLATION_IMG; ?>" border="0" />
          <?php echo _ESESS_FORM_CONFIG_CANCEL."\n"; ?>
        </td>
        <td width="50%" align="right">
<?php 
    if (is_writable($mosConfig_absolute_path."/components/$option/config.attend_events.php")) {
        echo "&nbsp;\n";
    } else {
        echo _ESESS_CONFIG_ERR."\n";
    }
?>
        </td>
      </tr>
    </table>
    <table cellpadding="4" cellspacing="1" border="0" class="adminform">
      <tr>
        <td valign="top"><?php echo _ESESS_FIELD_NOTIFY_SEND; ?>:</td>
        <td>
          <input type="checkbox" name="eSess_notifyEmailSend" value="1" <?php echo $eSess["notifyEmailSend"] ? 'checked="checked"' : ''; ?> />
          <?php echo returnToolTip( "_ESESS_FIELD_NOTIFY_SEND" )."\n"; ?>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><?php echo _ESESS_FIELD_NOTIFY_SUBJECT; ?>:</td>
        <td>
          <input class="inputbox" type="text" name="eSess_notifyEmailSubject" value="<?php echo $eSess["notifyEmailSubject"]; ?>" size="50" maxlength="100" />
          <?php echo returnToolTip( "_ESESS_FIELD_NOTIFY_SUBJECT" )."\n"; ?>
        </td>
        <td rowspan="2" valign="top">
          <?php echo _ESESS_REPLACE_TAGS."\n"; ?>
          <dl>
            <dt>{fullname}</dt>
            <dd><?php echo _ESESS_REPLACE_NAME; ?></dd>
            <dt>{email}</dt>
            <dd><?php echo _ESESS_REPLACE_EMAIL; ?></dd>
            <dt>{url}</dt>
            <dd><?php echo _ESESS_REPLACE_URL; ?></dd>
            <dt>{title}</dt>
            <dd><?php echo _ESESS_REPLACE_TITLE; ?></dd>
            <dt>{action}</dt>
            <dd><?php echo _ESESS_REPLACE_ACTION; ?></dd>
            <dt>{data}</dt>
            <dd><?php echo _ESESS_REPLACE_DATA; ?></dd>
          </dl>
        </td>
      </tr>
      <tr>
        <td valign="top"><?php echo _ESESS_FIELD_NOTIFY_MSG; ?>:</td>
        <td>
          <?php editorArea( 'editor1',  $eSess["notifyEmailMsg"] , 'eSess_notifyEmailMsg', 500, 250, '50', '15' ) ; ?>
          
          <?php echo returnToolTip( "_ESESS_FIELD_NOTIFY_MSG" )."\n"; ?>
        </td>
      </tr>
    </table>
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="table" value="config" />
    
    </form>
<br />
<?php
    }  // editConfigCancel()
    
    
/**
* Method that displays the Registrations list
* 
*/
function listRegistrations( &$rows, &$pageNav, $option, $search, $lists, $sortLinks ) {
    global $my, $mosConfig_live_site, $eSess;
	mosCommonHTML::loadOverlib();
?>
<script language="Javascript">
    function changeSorting(newSort) {
        document.adminForm.sorting.value=newSort;
        document.adminForm.submit();
    }
    
    function submitbutton(pressbutton) {
		var form = document.adminForm;
		
		  if ( (pressbutton == 'view') || (pressbutton == 'export') || (pressbutton == 'email') ){
			form.hidemainmenu.value = "1";
		  }
	
		submitform( pressbutton );	
		return;  
	}
    
</script>
<form action="index2.php" method="post" name="adminForm">
  <input type="hidden" name="sorting" value="<?php echo $sortLinks["sorting"]; ?>" />
  <table class="adminheading">
    <tr>
      <th class="user">
        <?php echo _ESESS_FORM_RLIST; ?>
      </th>
      <td><?php echo _SEARCH_TITLE; ?>:</td>
      <td><input type="text" name="search" value="<?php echo $search; ?>" class="inputbox" onChange="document.adminForm.submit();" /></td>
      <td><?php echo $lists["filter"]; ?></td>
    </tr>
  </table>
  
  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
    <tr>
      <th width="20" align="center" nowrap><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" /></th>
      <th width="20%" align="left" nowrap><?php echo _ESESS_RLIST_NAME.$sortLinks["N"]; ?></th>
      <th width="20%" align="left" nowrap><?php echo _ESESS_RLIST_EMAIL.$sortLinks["E"]; ?></th>
      <th width="20%" align="left" nowrap><?php echo _ESESS_RLIST_TITLE.$sortLinks["T"]; ?></th>
      <th width="10%" align="center" nowrap><?php echo _ESESS_RLIST_STATUS; ?></th>
      <th width="10%" align="center" nowrap><?php echo _ESESS_RLIST_RDATE.$sortLinks["D"]; ?></th>
      <th width="10%" align="center" nowrap><?php echo _ESESS_RLIST_NUM.$sortLinks["#"]; ?></th>
      <th width="10%" nowarp><?php echo _ESESS_RLIST_VIEWED.$sortLinks["V"]; ?></th>
    </tr>
<?php
        $k = 0;
        for ($i=0; $i < count( $rows ); $i++) {
            $row = &$rows[$i];
            $img = $row->viewed ? 'tick.png' : 'publish_x.png';
            $alt = $row->viewed ? _ESESS_RLIST_VIEWED : _CMN_NEW;
?>
    <tr class="<?php echo "row$k"; ?>">

      <td width="20" align="center">
        <input type="checkbox" id="cb<?php echo $i; ?>" name="cid[]" value="<?php echo $row->registration_id; ?>" onclick="isChecked(this.checked);" />
      </td>
      <td width="20%"><a href="#view" onclick="return listItemTask('cb<?php echo $i; ?>','view')"><?php echo $row->fullname; ?></a></td>
      <td width="20%"><?php echo $row->email; ?></td>
      <td width="20%"><?php echo $row->title; ?></td>
      <td width="10%" align="center">
<?php
      		switch ($row->status) {
                case 0:
                    echo _ESESS_REGISTRATION_STATUS_REGISTERED;
                    break;
                  
                case 1:
                	echo _ESESS_REGISTRATION_STATUS_CANCELLED;
                	break;
                	
                case 2:
                	echo _ESESS_REGISTRATION_STATUS_CLOSED;
                	break;                
                    
            }
?>
      
      </td>
      <td width="10%" align="center"><?php echo mosFormatDate($row->registration_date,$eSess["shortDateFormat"]); ?></td>
      <td width="10%" align="center"><?php echo $row->numregistrations; ?></td>
      <td width="10%" align="center">
        <img src="images/<?php echo $img; ?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" />
      </td>
    </tr>
<?php
            $k = 1 - $k;
        }
?>
  </table>
  <table cellpadding="4" cellspacing="0" border="0" class="adminlist">
    <tr>
      <th align="center" colspan="3"> <?php echo $pageNav->writePagesLinks(); ?></th>
    </tr>
    <tr>
      <td align="right" width="48%"><?php echo _PN_DISPLAY_NR; ?></td>
      <td> <?php echo $pageNav->writeLimitBox(); ?> </td>
      <td align="left" width="48%"><?php echo $pageNav->writePagesCounter(); ?></td>
    </tr>
  </table>
  <input type="hidden" name="option" value="<?php echo $option; ?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="boxchecked" value="0" />
  <input type="hidden" name="act" value="registrations" />
  <input type="hidden" name="hidemainmenu" value ="0" />
</form>
<?php

    } // listRegistrations()
    
    
function viewRegistrations(&$row, $option, $customFields, $customValues) {
        global $eSess, $mosConfig_live_site;
        
        // make sure the row data is safe to show 
        mosMakeHtmlSafe( $row );
        
        // $countries = getcountry();
        
        // display the html of the form
        ?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      
      submitform(pressbutton);
      return;
    }
    </script>
    <form action="index2.php" method="post" name="adminForm">
    <table class="adminheading">
      <tr>
        <th class="user">
          <?php echo _ESESS_FORM_REG_VIEW."\n"; ?>
        </th>
      </tr>
    </table>
    <table cellpadding="4" cellspacing="1" border="0" class="adminform">
      <tr>
        <td><?php echo _ESESS_FIELD_SESSION; ?>:</td>
        <td>
          <?php echo $row->title."\n"; ?>
        </td>
      </tr>
      <tr>
        <td><?php echo _ESESS_FIELD_REGISTRATION_STATUS; ?>:</td>
        <td>
<?php
      		switch ($row->status) {
                case 0:
                    echo _ESESS_REGISTRATION_STATUS_REGISTERED;
                    break;
                  
                case 1:
                	echo _ESESS_REGISTRATION_STATUS_CANCELLED;
                	break;
                	
                case 2:
                	echo _ESESS_REGISTRATION_STATUS_CLOSED;
                	break;                     
            }
?>          
        </td>
      </tr>
      <tr>
        <td><?php echo _ESESS_FIELD_FULLNAME; ?>:</td>
        <td>
          <?php echo $row->fullname."\n"; ?>
        </td>
      </tr>
      <tr>
        <td><?php echo _ESESS_FIELD_EMAIL; ?>:</td>
        <td>
          <?php echo $row->email."\n"; ?>
        </td>
      </tr>
      <tr>
        <td><?php echo _ESESS_FIELD_REGISTRATION_DATE; ?>:</td>
        <td>
          <?php echo mosFormatDate($row->registration_date,$eSess["shortDateFormat"]); ?>
        </td>
      </tr>
      <tr>
        <td><?php echo _ESESS_FIELD_CANCELLATION_DATE; ?>:</td>
        <td>
          <?php echo mosFormatDate($row->cancel_date,$eSess["shortDateFormat"]); ?>
        </td>
      </tr>
      <tr>
        <td><?php echo _ESESS_FIELD_NUM_PEOPLE; ?>:</td>
        <td>
          <?php echo $row->numregistrations."\n"; ?>
        </td>
      </tr>
<?php
    /*
     * Show values for custom fields...
     */
        $customValueFieldIDs = array();
        for ($thisValue = 0; $thisValue < count($customValues); $thisValue++) {
            $customValueFieldIDs[$thisValue] = $customValues[$thisValue]->field_id;
        }
     
     
		/*
		 * Revised for new "value" field
		 */     
        foreach($customFields as $customField) {
            echo "<tr>\n";
            echo "<td>" . $customField->name . ":";
            echo "</td>\n";
            
            echo "<td>";
            switch ($customField->type) {
                case 'radio' :
                case 'text' :
                case 'select' :        
                case 'textarea' :
                        echo $customValues[array_search($customField->field_id,$customValueFieldIDs)]->value;
                        break; 
                        
                case 'check' :
                        echo ($customValues[array_search($customField->field_id,$customValueFieldIDs)]->value) ? 'Checked' : 'Unchecked';
                        break; 
            }
            echo "</td>\n";
            echo "</tr>\n";
        } // foreach     
             
        
        
        
?>




    </table>
    
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="registration_id" value="<?php echo $row->registration_id; ?>" />
    <input type="hidden" name="cid[]" value="<?php echo $row->registration_id; ?>" />
    <input type="hidden" name="boxchecked" value="1" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="table" value="registrations" />
    </form>
<br />
<?php
    }  // viewRegistrations()
    
    
    /**
    * Function to display the export page
    */
function showExport($ids, $option, $sessionid, $search) {
        global $mosConfig_live_site;
        
        // display the html of the form
        ?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      
      // if cancel then dont validate
      if (pressbutton == 'cancel') {
        submitform(pressbutton);
        return;
      }

      // do field validation
      var msg = "";
      // validate filename
      if (form.filename.value=='') {
        msg += "<?php echo _ESESS_VAL_EXPORT_FILENAME; ?>\n";
      }
      
      if (msg!="") {
        alert( "<?php echo _ESESS_VAL_ERROR; ?>\n"+msg );
      } else {
        submitform(pressbutton);
      }
    }
    </script>
    <form action="index2.php" method="post" name="adminForm">
    <table class="adminheading">
      <tr>
        <th class="user">
          <?php echo _ESESS_FORM_EXPORT."\n"; ?>
        </th>
      </tr>
    </table>
    <table cellpadding="4" cellspacing="1" border="0" class="adminform">
      <tr>
        <td width="10%"><?php echo _ESESS_FIELD_METHOD; ?>:</td>
        <td width="90%">
          <input type="radio" name="export_method" value="csv" checked />
          <?php echo _ESESS_FIELD_METHOD_CSV."\n"; ?><br />
        </td>
      </tr>
      <tr>
        <td width="10%"><?php echo _ESESS_FIELD_FILENAME; ?>:</td>
        <td width="90%">
          <input type="text" name="filename" value="" />
        </td>
      </tr>
    </table>
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="session_id" value="<?php echo $sessionid; ?>" />
    <input type="hidden" name="search" value="<?php echo $search; ?>" />
    <input type="hidden" name="cid" value="<?php echo implode(",",$ids); ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="table" value="registrations" />
    </form>
<br />
<?php
    }  // showExport()
    
    
function composeEmail($ids, $option) {
		?>
		<script language="javascript" type="text/javascript">
		<!--
			function submitbutton(pressbutton) {
				var form = document.adminForm;
				if (pressbutton == 'cancel') {
					submitform( pressbutton );
					return;
				}
				// do field validation
				if (form.mm_subject.value == ""){
					alert( "Please fill in the subject" );
				} else if (form.mm_message.value == ""){
					alert( "Please fill in the message" );
				} else {
					submitform( pressbutton );
				}
			}
			// -->
		</script>

		<form action="index2.php" name="adminForm" method="post">
		<table class="adminheading">
		<tr>
			<th class="massemail">
			Email Registrants
			</th>
		</tr>
		</table>

		<table class="adminform">
		<tr>
			<th colspan="2">
			Details
			</th>
		</tr>
		<tr>
			<td>
			Send in HTML mode:
			</td>
			<td>
			<input type="checkbox" name="mm_mode" value="1" />
			</td>
		</tr>
		<tr>
			<td>
			Subject:
			</td>
			<td>
			<input class="inputbox" type="text" name="mm_subject" value="" size="50"/>
			</td>
		</tr>
		<tr>
			<td valign="top">
			Message:
			</td>
			<td>
			<textarea cols="80" rows="25" name="mm_message" class="inputbox"></textarea>
			</td>
		</tr>
		</table>

<?php	for ($thisId = 0; $thisId < count($ids); $thisId++) { ?>
		<input type="hidden" name="cid[<?php echo $thisId; ?>]" value="<?php echo $ids[$thisId]; ?>" />
<?php	} ?>
		<input type="hidden" name="table" value="registrations" />
		<input type="hidden" name="option" value="<?php echo $option; ?>"/>
		<input type="hidden" name="task" value="" />
		</form>		
		
		<?php
} // composeEmail();

function displaySendEmailResult($results, $option) {
?>
		<script language="javascript" type="text/javascript">
		<!--
			function submitbutton(pressbutton) {
				submitform( pressbutton );
			}
			// -->
		</script>


	<table class="adminform">
		<thead>
			<tr>
				<th>Registrant's Name</th>
				<th>Outcome of Sending Email</th>
			</tr>
		</thead>
		<tbody>
<?php	$rowCounter = 0;
		foreach($results as $result) { ?>
			<tr class="row<?php $rowCounter % 2; ?>">
				<td>
					<?php echo $result->name; ?>
				</td>
				<td>
					<?php echo ($result->outcome) ? 'Success' : 'Failure'; ?>
				</td>
			</tr>
<?php		$rowCounter++;
		} ?>
		</tbody>
	</table>
	
	<form action="index2.php" name="adminForm" method="post">
		<input type="hidden" name="table" value="registrations" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
	</form>
		
<?php
} // displaySendEmailResult


function listVenues(&$rows, $pageNav, $option, $search) {
	global $my;
	mosCommonHTML::loadOverlib();
?>
<script type="text/javascript">
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		
		  if ((pressbutton == 'edit') || (pressbutton == 'new')) {
			form.hidemainmenu.value = "1";
		  }
	
		submitform( pressbutton );	
		return;  
	}
</script>


<form action="index2.php" method="post" name="adminForm">
  <table class="adminheading">
    <tr>
      <th><?php echo _ESESS_FORM_VLIST; ?></th>
      <td><?php echo _SEARCH_TITLE; ?>:</td>
      <td><input type="text" name="search" value="<?php echo $search; ?>" class="inputbox" onchange="document.adminForm.submit();" /></td>
    </tr>
  </table>
  
  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
    <tr>
      <th width="20" align="center"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" /></th>
      <th align="left"><?php echo _ESESS_VLIST_NAME; ?></th>
    </tr>
<?php
        for ($i=0; $i < count( $rows ); $i++) {
            $row = &$rows[$i];
            
            $row->id = $row->venue_id;
            $checked = mosCommonHTML::CheckedOutProcessing( $row, $i );
?>
    <tr class="<?php echo "row" . ($i % 2); ?>">

      <td width="20" align="center">
      	<?php echo $checked; ?>
      </td>
      <td width="100%">
<?php  /*
        * If availble, or checked out by the current user, make an active link.  Otherwise, just show the title.
        */
        
        if ($row->checked_out) {
            if ($row->checked_out != $my->id) {
                // checked out by someone else
                echo $row->name;
            } else {
                // checked out by me (and therefore able to edit)
                // Since there is not checkbox, store the session_id in the hidden form field "id"
?>
    <a href="#edit" onclick="document.adminForm.id.value=<?php echo $row->venue_id; ?>; submitbutton('edit');"><?php echo  $row->name; ?></a>
<?php
            } // who checked it out?
        } else { 
       /* No one checked it out */
?>
      <a href="#edit" onclick="return listItemTask('cb<?php echo $i; ?>','edit')"><?php echo $row->name; ?></a>
<?php   } ?>      
      </td>
    </tr>
<?php
        }
?>
  </table>
  <table cellpadding="4" cellspacing="0" border="0" class="adminlist">
    <tr>
      <th align="center" colspan="3"> <?php echo $pageNav->writePagesLinks(); ?></th>
    </tr>
    <tr>
      <td align="right" width="48%"><?php echo _PN_DISPLAY_NR; ?></td>
      <td> <?php echo $pageNav->writeLimitBox(); ?> </td>
      <td align="left" width="48%"><?php echo $pageNav->writePagesCounter(); ?></td>
    </tr>
  </table>
  <input type="hidden" name="option" value="<?php echo $option; ?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="boxchecked" value="0" />
  <input type="hidden" name="act" value="venues" />
  <input type="hidden" name="hidemainmenu" value ="0" />
  <input type="hidden" name="id" value="" />
</form>
<?php
} // listVenues
    
function editVenues(&$row, $option) {
	global $mosConfig_live_site;
	
	mosCommonHTML::loadOverlib();
?>
		<script language="javascript" type="text/javascript">
		<!--
			function submitbutton(pressbutton) {
		    	var form = document.adminForm;

				// if cancel then dont validate
				if (pressbutton == 'cancel') {
					submitform(pressbutton);
					return;
				}
			
				// do field validation
				var msg = "";
				
				// validate title
				if (form.name.value == "") {
					msg += "<?php echo _ESESS_JSERROR_VENUE_TITLE; ?>\n";
				}				
				// validate title
				if (form.address.value == "") {
					msg += "<?php echo _ESESS_JSERROR_VENUE_ADDRESS; ?>\n";
				}
				
			    // display validation error or submit
			    if (msg != "") {
					alert( "<?php echo _ESESS_VAL_ERROR; ?>\n"+msg );
			    } else {
					submitform( pressbutton );
			    }

			}
			// -->
		</script>
<form action="index2.php" name="adminForm" method="post">
	<table class="adminheading">
    	<tr>
    		<th class="categories">
          		<?php echo $row->venue_id ? _ESESS_FORM_VENUE_EDIT."\n" : _ESESS_FORM_VENUE_ADD."\n"; ?>
        	</td>
      	</tr>
    </table>
	<table cellpadding="4" cellspacing="1" border="0" class="adminform">
		<tr>
			<td><?php echo _ESESS_FIELD_VENUE_TITLE.":&nbsp;"._ESESS_REQUIRED; ?></td>
			<td>
				<input class="inputbox" type="text" name="name" value="<?php echo $row->name; ?>" size="50" maxlength="50" />
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_TITLE" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td valign="baseline"><?php echo _ESESS_FIELD_VENUE_ADDRESS.":&nbsp;"._ESESS_REQUIRED; ?></td>
			<td>
				<textarea name="address" cols="47" rows="6"><?php echo $row->address; ?></textarea>
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_ADDRESS" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td><?php echo _ESESS_FIELD_VENUE_CITY; ?>:</td>
			<td>
				<input class="inputbox" type="text" name="city" value="<?php echo $row->city; ?>" size="50" maxlength="50" />
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_CITY" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td><?php echo _ESESS_FIELD_VENUE_STATE; ?>:</td>
			<td>
				<input class="inputbox" type="text" name="state" value="<?php echo $row->state; ?>" size="50" maxlength="50" />
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_STATE" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td><?php echo _ESESS_FIELD_VENUE_POSTALCODE; ?>:</td>
			<td>
				<input class="inputbox" type="text" name="postalcode" value="<?php echo $row->postalcode; ?>" size="50" maxlength="50" />
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_POSTALCODE" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td><?php echo _ESESS_FIELD_VENUE_COUNTRY; ?>:</td>
			<td>
				<input class="inputbox" type="text" name="country" value="<?php echo $row->country; ?>" size="50" maxlength="50" />
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_COUNTRY" )."\n"; ?>
			</td>
		</tr>
		<tr>
			<td><?php echo _ESESS_FIELD_VENUE_WEBADDRESS; ?>:</td>
			<td>
				<input class="inputbox" type="text" name="webaddress" value="<?php echo $row->webaddress; ?>" size="50" maxlength="50" />
          		<?php echo returnToolTip( "_ESESS_FIELD_VENUE_WEBADDRESS" )."\n"; ?>
			</td>
		</tr>
	</table> 
	
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="venue_id" value="<?php echo $row->venue_id; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="table" value="venues" />
</form>
<?php
}
    
} // class - HTML_Events_Sessions
?>
