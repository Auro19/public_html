<?php
/**
* @version $Id: fields.attend_events.php 28 2007-02-23 23:32:11Z pcarr $
* @package Attend Events
* @copyright (C) 2005-06 Peter Carr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/
 
class AE_CustomFields {


	function loadFieldTable(&$customFields) { 
		global $mosConfig_live_site; ?>
 	<table id="customFieldsTable" cellpadding="4" cellspacing="0" border="0" class="adminform" width="100%">
 		<thead>
			<tr>
				<th width="20"><img src="<?php echo $mosConfig_live_site; ?>/includes/js/ThemeOffice/categories.png" width="16" height="16" alt="<?php echo _ESESS_DYNAMICFIELDS_NEWFIELD; ?>" onclick="createFieldRow();" onmouseover="return overlib('<?php echo _ESESS_DYNAMICFIELDS_NEWFIELD_DESC; ?>', CAPTION, '<?php echo _ESESS_DYNAMICFIELDS_NEWFIELD; ?>', BELOW, RIGHT);" onmouseout="return nd();" /></th>
				<th colspan="2">&nbsp;</th>
				<th><?php echo _ESESS_DYNAMICFIELDS_FIELDNAME; ?></th>
				<th><?php echo _ESESS_DYNAMICFIELDS_FIELDTYPE; ?></th>
				<th><?php echo _ESESS_DYNAMICFIELDS_FIELDPARAMETERS; ?></th>
			</tr>  
		</thead>
		<tbody>
			<tr>
				<td colspan="5"><?php echo _ESESS_DYNAMICFIELDS_LOADTABLEERROR; ?></td>
			</tr>
		</tbody>
    </table> 
	<script type="text/javascript">
	<!--
		// Create the tbody element
		var theTable = document.getElementById('customFieldsTable');
		
		/*
		 * Firefox picks up more than just TR tags in TBODY.  Therefore,
		 * delete all children contained in the TBODY...
		 */
		while (theTable.tBodies[0].childNodes.length > 0) {
			theTable.tBodies[0].removeChild(theTable.tBodies[0].childNodes[0]);
		}		
	
		var loadingData = true;
	
		// Load previously saved custom fields for this session (if any)
		<?php
			$thisField = 0; 

			foreach ($customFields as $customField) {
				//mosMakeHtmlSafe($customField, ENT_NOQUOTES);
			 ?>

				
				createFieldRow('<?php echo $customField->field_id; ?>',
				               '<?php echo str_replace('\'','\\\'',$customField->name); ?>',
				               '<?php echo $customField->type; ?>', 
				               '<?php echo str_replace('\'','\\\'',$customField->tooltip); ?>', 
				               '<?php echo $customField->required; ?>', 
				               '<?php echo $customField->maxlength; ?>', 
				               '<?php echo $customField->size; ?>', 
				               '<?php echo str_replace('\'','\\\'',$customField->default); ?>',
				               '<?php echo $customField->rows; ?>', 
				               '<?php echo $customField->cols; ?>',
				               '<?php echo $customField->cb_integration; ?>');
		
		<?php
				if ( (strcmp($customField->type,'radio') == 0) || (strcmp($customField->type,'select') == 0) ) {
					foreach ($customField->options as $anOption) { ?>
						createOptionRow('', <?php echo $thisField; ?>,
										'<?php echo $anOption->option_id; ?>', 
										'<?php echo str_replace('\'','\\\'',$anOption->name); ?>', 
										 <?php echo ($anOption->name == $customField->default) ? '1' : '0'; ?>);
		<?php 		} // foreach option
				} // if radio or select	
		
				$thisField++;
			} // foreach field 
		?>
		loadingData = false;
		updateFields();	
		
	//-->
	</script>	
<?php
	} // loadFieldTable	
	
	

	function loadFields($session_id, $isTemplate = false) {
		global $database;
		/* 
		 * Load any custom fields...
		 * ...and sort by the saved order
		 */
		 
		if (!isset($session_id)) { 
			$session_id = 0;
		}
		
		// build the query to get the data to display
		$qrysql  = "SELECT *";
		$qrysql .= "\nFROM #__events_registration_fields";
		$qrysql .= "\nWHERE session_id=" . $session_id;
		$qrysql .= "\nORDER by ordering";
		$database->setQuery($qrysql);  
	
		$customFields = $database->loadObjectList();
		
		
	    /*
	 	 * Load any custom fields options...
		 */
		// build the query to get the data to display
		$qrysql  = "SELECT *";
		$qrysql .= "\nFROM #__events_registration_fields_options";
		$qrysql .= "\nWHERE session_id=" . $session_id;
		$qrysql .= "\nORDER by ordering";
		$database->setQuery($qrysql);  
	
		$customOptions = $database->loadObjectList();
	
	
		 /*
		  * For simplicity (in the HTML file), combine the custom field information into a single variable
		  */
		 for($thisCustomField = 0; $thisCustomField < count($customFields); $thisCustomField++) {
		 
			// Incorporate the list of options for "radio" and "select" types
			if (strcmp($customFields[$thisCustomField]->type,'radio')===0 || strcmp($customFields[$thisCustomField]->type,'select')===0) {
				$customFields[$thisCustomField]->options = array();
				for ($thisOption = 0; $thisOption < count($customOptions); $thisOption++) {
					if ($customOptions[$thisOption]->field_id == $customFields[$thisCustomField]->field_id) {
						if ( ($isTemplate) && ($session_id == 0) ) {
							$customOptions[$thisOption]->field_id = null;
							$customOptions[$thisOption]->option_id = null;
						}					
						$customFields[$thisCustomField]->options[] = $customOptions[$thisOption];
					}
				}  		
			}
			
			// Load the default value into the custom field's 'value' property
			$customFields[$thisCustomField]->value = $customFields[$thisCustomField]->default;  
			
			if ( ($isTemplate) && ($session_id == 0) ) {
				$customFields[$thisCustomField]->field_id = null;
			}   	
		 }
	
		return $customFields;
	} // loadFields


	function saveFields($session_id) {
		global $database;
		
	   /*
		* Save the custom field info.
		* First, delete previously stored fields about this session.
		* A better solution is to avoid deleting the fields unnecessarily.  To do this, the code
		* needs to compare the states of the custom fields before and after the user edited things.
		* For each edited custom field, three options are possible:
		*   1.  Custom fields with null $fieldId values represent new fields which need to be created.
		*   2.  Custom fields with non-null $fieldId values represent fields which need to be updated...
		*   3.  Or deleted.
		* By storing a list of of $fieldIds before the user edited anything, the code can track which
		* field need to be updated, and which need to be deleted afterards.
		*/
		$qrysql  = "SELECT f.field_id";
		$qrysql .= "\nFROM #__events_registration_fields AS f";
		$qrysql .= "\nWHERE f.session_id=" . $session_id;
		$database->setQuery($qrysql);  
		$previousCustomFields = $database->loadObjectList();
		
		$customFieldsToDelete = array();
		for($i = 0; $i < count($previousCustomFields); $i++) {
			$customFieldsToDelete[$i] = $previousCustomFields[$i]->field_id;
		}
		
		$qrysql  = "SELECT o.option_id";
		$qrysql .= "\nFROM #__events_registration_fields_options AS o";
		$qrysql .= "\nWHERE o.session_id=" . $session_id;
		$database->setQuery($qrysql);  
		$previousCustomFieldsOptions = $database->loadObjectList();
		
		$customOptionsToDelete = array();
		for($i = 0; $i < count($previousCustomFieldsOptions); $i++) {
			$customOptionsToDelete[$i] = $previousCustomFieldsOptions[$i]->option_id;
		}    
	
	
		/* 
		 * Need to use mosGetParam to avoid SQL injections (and other bad things...)
		 */
		$fieldNames =      mosGetParam($_POST,'fieldName',null);
		$fieldIDs =        mosGetParam($_POST,'fieldId',null);
		$fieldTypes =      mosGetParam($_POST,'fieldType',null);
		$tooltips =        mosGetParam($_POST,'fieldTooltip',null);
		$cbFields =        mosGetParam($_POST,'fieldCBIntegration',null);
		$fieldDefaults =   mosGetParam($_POST,'fieldDefault',null);
		$fieldRows =       mosGetParam($_POST,'fieldRows',null);
		$fieldCols =       mosGetParam($_POST,'fieldCols',null);
		$fieldSizes =      mosGetParam($_POST,'fieldSize',null);
		$fieldMaxLengths = mosGetParam($_POST,'fieldMaxLength',null);	
		$fieldRequireds =  mosGetParam($_POST,'fieldRequired',null);
		$optionIDs =       mosGetParam($_POST,'fieldOptionId',null);
		$optionNames =     mosGetParam($_POST,'fieldOption',null);
		
	
		// Now, save the information (one field at a time...)
		for ($thisField = 0; $thisField < count($fieldNames); $thisField++) {
			if (!$fieldIDs[$thisField]) {
				$customFieldRow = new mosEventsRegistrationFields( $database );
				
				$basicData = array();
				$basicData['name'] = $fieldNames[$thisField];
				if (!$customFieldRow->bind($basicData)) {
					echo "<script> alert('".$customFieldRow->getError()."'); window.history.go(-1); </script>\n";
					exit();
				}
				
				// attempt to insert/update the record    
				if (!$customFieldRow->store()) {
					echo "<script> alert('".$customFieldRow->getError()."'); window.history.go(-1); </script>\n";
					exit();
				}   
				
				$fieldIDs[$thisField] = $customFieldRow->field_id; 	
			}
		
		   /* 
			* The main component of the field information is now saved.  However, 'radio' and
			* 'select' inputs must save their list of possible options separately.
			* Actually, the fields should be deleted if the type of field was changed from, say, 'radio'
			* to 'text'.  Therefore, the 'if' statement for determining what fields to delete should
			* execute for all field types.  Only adding/updating should happen for 'radio' and 'select'.
			* The options need to be saved first, since the default value should be that of an option_id.
			* For new options, these are not defined until the field is saved.  So, if the default value
			* is to be correct, the options must be saved first.
			*/
			// Step One:  Does this field even have/require options?
			unset($optionId);
			$optionId = array();
			for($thisOption = 0; $thisOption < count($optionNames[$thisField]); $thisOption++) {
	
				unset($thisOptionsInfo);
				$thisOptionsInfo = array();
				$thisOptionsInfo["session_id"] = $session_id;
				$thisOptionsInfo["field_id"] = $fieldIDs[$thisField];
				$thisOptionsInfo['option_id'] = $optionIDs[$thisField][$thisOption];
				$thisOptionsInfo["name"] = $optionNames[$thisField][$thisOption];
				$thisOptionsInfo["ordering"] = $thisOption;
				
				$customOptionRow = new mosEventsRegistrationFieldsOptions( $database );
		
				// attempt to bind the class to the data posted
				if (!$customOptionRow->bind($thisOptionsInfo)) {
					echo "<script> alert('".$customOptionRow->getError()."'); window.history.go(-1); </script>\n";
					exit();
				}
				
				// attempt to check the data 
				if (!$customOptionRow->check()) {
					echo "<script> alert('".$customOptionRow->getError()."'); window.history.go(-1); </script>\n";
					exit();
				}
				
				// attempt to insert/update the record    
				if (!$customOptionRow->store()) {
					echo "<script> alert('".$customOptionRow->getError()."'); window.history.go(-1); </script>\n";
					exit();
				}
				
				// Get the option_id
				$optionId[$thisOption] = $customOptionRow->option_id;
					
				// remove this option from the list of options to delete
				unset($customOptionsToDelete[array_search($thisOptionsInfo['option_id'],$customOptionsToDelete)]);
			
			} // for $thisOption=0;...
	
			
			$thisFieldsInfo = array();
			$thisFieldsInfo['name'] = $fieldNames[$thisField];
			$thisFieldsInfo['type'] = $fieldTypes[$thisField];
			$thisFieldsInfo['tooltip'] = $tooltips[$thisField];
			$thisFieldsInfo['session_id'] = $session_id;
			$thisFieldsInfo['field_id'] = $fieldIDs[$thisField];
			$thisFieldsInfo['ordering'] = $thisField;
			$thisFieldsInfo['cb_integration'] = $cbFields[$thisField];
			
			// Load any fieldType specific options...
			switch ($thisFieldsInfo["type"]) {
				case 'radio' :  $thisFieldsInfo['default'] = $optionNames[$thisField][$fieldDefaults[$thisField]];
								$thisFieldsInfo['rows'] = $fieldRows[$thisField];
								$thisFieldsInfo['cols'] = $fieldRows[$thisField];
								$thisFieldsInfo['required'] = 0;
								$thisFieldsInfo['size'] = 0;
								$thisFieldsInfo['maxlength'] = 0;
								break;
				case 'select' : $thisFieldsInfo['default'] = $optionNames[$thisField][$fieldDefaults[$thisField]];
								$thisFieldsInfo['required'] = 0;
								$thisFieldsInfo['rows'] = 0;
								$thisFieldsInfo['cols'] = 0;
								$thisFieldsInfo['size'] = 0;
								$thisFieldsInfo['maxlength'] = 0;
								break;
				case 'text' :   $thisFieldsInfo['size'] = $fieldSizes[$thisField];
								$thisFieldsInfo['maxlength'] = $fieldMaxLengths[$thisField];
								$thisFieldsInfo['default'] = $fieldDefaults[$thisField];
								$thisFieldsInfo['required'] = strcmp($fieldRequireds[$thisField],'1')==0 ? 1 : 0;
								$thisFieldsInfo['fieldRows'] = 0;
								$thisFieldsInfo['fieldCols'] = 0;
								break;
				case 'textarea':$thisFieldsInfo['default'] = $fieldDefaults[$thisField];
								$thisFieldsInfo['required'] = strcmp($fieldRequireds[$thisField],'1')==0 ? 1 : 0;
								$thisFieldsInfo['rows'] = $fieldRows[$thisField];
								$thisFieldsInfo['cols'] = $fieldCols[$thisField];
								break;
				case 'check':   $thisFieldsInfo['default'] = strcmp($fieldDefaults[$thisField],'1')==0 ? 1 : 0;
								$thisFieldsInfo['required'] = strcmp($fieldRequireds[$thisField],'1')==0 ? 1 : 0;
								break;
				
			}     
				
			$customFieldRow = new mosEventsRegistrationFields( $database );
			// attempt to bind the class to the data posted
			if (!$customFieldRow->bind($thisFieldsInfo)) {
				echo "<script> alert('".$customFieldRow->getError()."'); window.history.go(-1); </script>\n";
				exit();
			}
			
			// attempt to check the data 
			if (!$customFieldRow->check()) {
				echo "<script> alert('".$customFieldRow->getError()."'); window.history.go(-1); </script>\n";
				exit();
			}
			
			// attempt to insert/update the record    
			if (!$customFieldRow->store()) {
				echo "<script> alert('".$customFieldRow->getError()."'); window.history.go(-1); </script>\n";
				exit();
			}
			
			
			// With the field saved, its options (if any) must have their "field_id" field updated.
			if (count($optionNames[$thisField]) > 0) {
				$query  = "UPDATE #__events_registrations_fields_options ";
				$query .= "SET field_id=" . $customFieldRow->field_id;
				$query .= "WHERE option_id in (" . implode(",",$optionId);  	
				$database->setQuery($qrysql);
				if (!$database->query()) {
					echo $database->getErrorMsg();
				}
			
			}
		  
			
		   /* 
			* If a $fieldId was specified for this custom field, it's row in the database has been updated.
			* Therefore, the row should not be deleted once all the custom fields have been processed.
			*/
			if ($fieldIDs[$thisField]) {
				unset($customFieldsToDelete[array_search($fieldIDs[$thisField],$customFieldsToDelete)]);
			}
		} // for ($thisField...
		
	   
	   /* 
		* All fields have been processed.  Any remainin elements in $customFieldsToDelete must now be deleted
		*/
		$customFieldRow = new mosEventsRegistrationFields( $database );
		foreach($customFieldsToDelete as $thisField) {		
			$customFieldRow->delete($thisField);
		}
	  
	
	  
		// Delete any options marked for deletion.    
		$customOptionRow = new mosEventsRegistrationFieldsOptions( $database );
		foreach($customOptionsToDelete as $thisOption) {
			$customOptionRow->delete($thisOption);
		}
	} // saveFields
	
	
	
	function loadSavedValues($registration_ids) {
		global $database; 
		
		$qrysql  = "SELECT f.name, fv.value ";
		$qrysql .= "FROM #__events_registration_fields_values AS fv ";
        $qrysql .= "left JOIN #__events_registration_fields AS f ON ( fv.field_id = f.field_id ) ";
        $qrysql .= "WHERE fv.registration_id IN ($registration_ids)";
		$database->setQuery($qrysql);  
		$rows = $database->loadAssocList();
	
		return $rows;
	} // loadSavedValues
	
	function loadFieldLabels($session_ids) {
		global $database; 
		
		$qrysql  = "SELECT f.name ";
		$qrysql .= "FROM #__events_registration_fields_values AS fv ";
        $qrysql .= "LEFT JOIN #__events_registration_fields AS f ON ( fv.field_id = f.field_id ) ";
        $qrysql .= "WHERE f.session_id IN ($session_ids) ";
        $qrysql .= "ORDER BY f.ordering";
		$database->setQuery($qrysql);  
		$rows = $database->loadObjectList();
	
		$fieldNames = array();
		foreach ($rows as $row) {
			$fieldNames[] = $row->name;
		}
		$fieldNames = array_unique($fieldNames);
		
		return $fieldNames;
		
	} // loadSavedValues
} 
 
 

class HTML_AE_CustomFields {

	function printFieldTitle($customField) {
		mosMakeHtmlSafe($customField);
		echo $customField->name . ":";
	    echo ($customField->required) ? ' ' . _ESESS_REQUIRED : '';
	}
	
	function printFieldInput($customField) {
		mosMakeHtmlSafe($customField);
	
		switch ($customField->type) {
			case 'radio' :
					echo "<table align=\"left\">\n<tbody>";
					$thisCell = 1;
					foreach($customField->options as $option) {
						// create a new row?
						//echo "(" . ($thisCell % $customField->cols) . ")";
						if (($thisCell % $customField->cols) == 1)  echo "<tr>";
					
						echo "<td>";
						echo "<input type=\"radio\" name=\"customId[" . $customField->field_id . "]\" value=\"" . $option->name . "\"";
						echo ($customField->value == $option->name ) ? ' checked="checked"' : '';
						echo " />" . $option->name;
						echo "</td>";
						
						
						if (($thisCell % $customField->cols) == 0)  echo "</tr>";
						$thisCell++;
					}
					
					$placeHolders = ($customField->rows * $customField->cols) - ($thisCell-1);
					for ($i = 0; $i < $placeHolders; $i++) {
						echo "<td>&nbsp;</td>";
					}
					if ($placeHolders != 0) {
						echo "</tr>";
					}
					
					
					echo "</tbody>\n</table>";
				break;
                        
			case 'text' :
					echo "<input type=\"text\" name=\"customId[" . $customField->field_id . "]\" ";
					echo "size=\"" . $customField->size . "\" ";
					echo "maxlength=\"" . $customField->maxlength . "\" ";
					echo "value=\"" . $customField->value . "\" ";
					echo " />";
				break;
					
			case 'textarea' :
					echo "<textarea name=\"customId[" . $customField->field_id . "]\" rows=\"" . $customField->rows . "\" ";
					echo "cols=\"" . $customField->cols . "\">";
					echo $customField->value;                       
					echo "</textarea>";
				break; 
					
					
			case 'check' :
					echo "<input type=\"checkbox\" name=\"customId[" . $customField->field_id . "]\" value=\"1\"";
					echo ($customField->value == 1) ? ' checked=checked' : '';
					echo " />";	
				break; 
					
			case 'select' :
					echo "<select name=\"customId[" . $customField->field_id . "]\">\n";
					foreach ($customField->options as $option) {
						echo "<option value=\"" . $option->name . "\"";
						echo ($customField->value == $option->name ) ? ' selected="selected"' : '';
						echo ">" . $option->name . "</option>\n";
					}
					echo "</select>";
				break;
        } // switch type
	
		// Add a hidden field to store an index into the value table (if available)
		if (!empty($customField->value_id)) {
			echo "<input type=\"hidden\" name=\"valueId[" . $customField->field_id . "]\" value=\"" . $customField->value_id . "\" />\n";
		}
		
		// Show Tooltip
		if (!empty($customField->tooltip)) {
			echo mosToolTip(str_replace('&#039;','\\\'',$customField->tooltip), str_replace('&#039;','\\\'',$customField->name));
		}
	}
}

class JS_AE_CustomFields_FrontEnd {
	function insertCustomFieldScripts($session_id) {
		global $database;
	
		$query  = "SELECT f.field_id, f.required, f.name ";
		$query .= "FROM #__events_registration_fields AS f ";
		$query .= "WHERE f.session_id = " . $session_id;
		 
		$database->setQuery($query);
		$fieldIds = $database->loadObjectList(); 
	?>
	<script language="javascript" type="text/javascript">
	<!--	
	
		function validateInput() {
			var errorMsg = '';
			
			var requiredFields = new Array();
			var fieldNames = new Array();
			
			<?php 	$requiredFields = 0;
					for ($thisField = 0; $thisField < count($fieldIds); $thisField++) { 
						if ($fieldIds[$thisField]->required) { ?>
							requiredFields[<?php echo $requiredFields; ?>] = <?php echo	$fieldIds[$thisField]->field_id; ?>;
							fieldNames[<?php echo $requiredFields; ?>] = "<?php echo	$fieldIds[$thisField]->name; ?>";
			<?php			$requiredFields++;
						}
					}			
			?>		
			for (i = 0; i < document.registrationForm.elements.length; i++) {
				var elementName = document.registrationForm.elements[i].name;
				if (elementName.substring(0,8) == 'customId') {
					var elementNumber = elementName.substring(9,elementName.indexOf(']'));
					
				
					
					var isRequired = -1;
					for (thisField = 0; thisField < requiredFields.length; thisField++) {
						if (requiredFields[thisField] == elementNumber) {
							isRequired = thisField;
						}
					}
					
					if (isRequired != -1) {
						if (document.registrationForm.elements[i].type == 'checkbox') {
							if (!document.registrationForm.elements[i].checked) {
								errorMsg += fieldNames[isRequired] + " must be checked.\n";
							}
						}
					
						if (document.registrationForm.elements[i].type == 'text') {
							if (document.registrationForm.elements[i].value.length == 0) {
								errorMsg += fieldNames[isRequired] + " is required.\n";
							}
						}
						
						if (document.registrationForm.elements[i].type == 'textarea') {
							if (document.registrationForm.elements[i].value.length == 0) {
								errorMsg += fieldNames[isRequired] + " is required.\n";
							}
						}
					}
				}
			}
			
			return errorMsg;
		}
	

	//-->
	</script>
	<?php
	} // insertCustomFieldScripts
}


class JS_AE_CustomFields {

	function insertCustomFieldScripts() {
		global $mosConfig_live_site, $database, $eSess, $mosConfig_absolute_path;
		
		
		$disableCB = (!is_dir($mosConfig_absolute_path."/components/com_comprofiler"));
		if ($disableCB) { $eSess["cbIntegrated"] = false; }

	?>
	
	<style type="text/css">
		.AE_Title { 
			background-color: #E0E0E0;
			font-weight: bold;
			border-bottom: 1px solid #B0B0B0;
		}
	</style>
	
	<script language="javascript" type="text/javascript">
	<!--

	// Browser Test
	if (!(document.getElementById && document.createElement)) {
		alert('Your browser does not appear to support the W3C DOM Specification.\nAs a result, the interface for controlling custom fields may not function correctly!');
	}
	
	/* 
	 * Function to identify the target/trigger of an event.  
	 * Based on code from:
	 * http://www.quirksmode.org/js/events_properties.html
	 */
	function getEventTarget(theEvent) {
        var theTarget;
        
        if (!theEvent) var theEvent = window.event;
        
        if (theEvent.target) theTarget = theEvent.target;
        else if (theEvent.srcElement) theTarget = theEvent.srcElement;
        
        if (theTarget.nodeType == 3) // defeat Safari bug
                theTarget = targ.parentNode;
        
                
		return theTarget;
	}


	// From: http://www.thunderguy.com/semicolon/2005/05/23/setting-the-name-attribute-in-internet-explorer/
	function createElement(type, name, inputType) {
		if (!name) name = '';
		if (!inputType) inputType = '';
	   var element = null;
	   // First try the IE way; if this fails then use the standard way
	   try {
			if ((name != '') && (inputType != '')) {
		 	 	element = document.createElement('<'+type+' name="'+name+'" type="' + inputType + '">');
			}
	   } catch (e) {
		  // Probably failed because we're not running on IE
	   }
	   if (!element) {
		  element = document.createElement(type);
		  element.name = name;
		  if (inputType) {
		  	element.setAttribute('type',inputType);
		  }
	   }
	   return element;
	}	
		
	function createFieldRow() {
	    argv=arguments;
        argc=arguments.length;
        fieldId            = (argc > 0) ? argv[0] : '';
        fieldName          = (argc > 1) ? argv[1] : '';
        fieldType          = (argc > 2) ? argv[2] : 'text';
        fieldTooltip       = (argc > 3) ? argv[3] : '';
        fieldRequired      = (argc > 4) ? argv[4] : '';
        fieldMaxLength     = (argc > 5) ? argv[5] : '';
        fieldSize          = (argc > 6) ? argv[6] : '';
        fieldDefault       = (argc > 7) ? argv[7] : '';
        fieldRows          = (argc > 8) ? argv[8] : '';
        fieldCols          = (argc > 9) ? argv[9] : '';
        fieldCBIntegration = (argc > 10) ? argv[10] : '';
        
	
		var theTable = document.getElementById('customFieldsTable');
		var rowNumber = theTable.tBodies[0].rows.length;
		
		// insert the row
		theTable.tBodies[0].insertRow(rowNumber);
		var theRow = theTable.tBodies[0].rows[rowNumber];
		var theCell;
		
		// Delete Button
		theCell = document.createElement('td');
		theCell.appendChild(document.createElement('img'));
		theCell.childNodes[0].setAttribute('src','<?php echo $mosConfig_live_site; ?>/administrator/images/publish_x.png');
		theCell.childNodes[0].setAttribute('width','12');
		theCell.childNodes[0].setAttribute('height','12');
		theCell.childNodes[0].setAttribute('alt','Delete Field');
		theRow.appendChild(theCell);
		
		// Order Buttons
		theCell = document.createElement('td');
		theCell.setAttribute('width','12');
		theCell.appendChild(document.createElement('img'));
		theCell.childNodes[0].setAttribute('src','<?php echo $mosConfig_live_site; ?>/administrator/images/uparrow.png');
		theCell.childNodes[0].setAttribute('width','12');
		theCell.childNodes[0].setAttribute('height','12');
		theCell.childNodes[0].setAttribute('alt','Up');
		theRow.appendChild(theCell);
		
		theCell = document.createElement('td');
		theCell.setAttribute('width','12');
		theCell.appendChild(document.createElement('img'));
		theCell.childNodes[0].setAttribute('src','<?php echo $mosConfig_live_site; ?>/administrator/images/downarrow.png');
		theCell.childNodes[0].setAttribute('width','12');
		theCell.childNodes[0].setAttribute('height','12');
		theCell.childNodes[0].setAttribute('alt','Down');
		theRow.appendChild(theCell);		
		
		// Field Name
		theRow.insertCell(3);
		theRow.cells[3].setAttribute('width','250');
		var theField = document.createElement('input','');
		theField.type = 'text';
		theRow.cells[3].appendChild(theField);
		theRow.cells[3].childNodes[0].value = fieldName;
		
		// FieldID
		var theField = document.createElement('input','');
		theField.type = 'hidden';
		theRow.cells[3].appendChild(theField);
		theRow.cells[3].childNodes[1].value = fieldId;

		// Field Select
		theCell = document.createElement('td');
		theCell.setAttribute('width','200');
		createFieldTypesSelect(theCell,fieldType);
		theRow.appendChild(theCell);

		// Field Options
		theCell = document.createElement('td');
		theRow.appendChild(theCell);
		generateTypeSpecificParameters('',theCell.previousSibling.childNodes[0], fieldTooltip, fieldRequired, fieldMaxLength, fieldSize, fieldDefault, fieldRows, fieldCols, fieldCBIntegration);
		
		updateFields();
	}
	

	function deleteFieldRow(theEvent) {
		var theImg = getEventTarget(theEvent);  
		var theRow = theImg.parentNode.parentNode;
		
		if (theRow) {   
			theRow.parentNode.removeChild(theRow);
		} else {
			alert('Error:  Couldn\'t find target of event!');
		}
		
		updateFields();
	}

	function moveUp(theEvent) {
		var theImg = getEventTarget(theEvent);
		var srcRow = theImg.parentNode.parentNode;
		var dstRow = srcRow.previousSibling;
		
		var theTable = srcRow.parentNode;
		
		theTable.removeChild(srcRow);
		theTable.insertBefore(srcRow,dstRow);
		updateFields();
	}
	
	function moveDown(theEvent) {
		var theImg = getEventTarget(theEvent);
		var srcRow = theImg.parentNode.parentNode;
		var dstRow = srcRow.nextSibling;
		    dstRow = dstRow.nextSibling;
		
		var theTable = srcRow.parentNode;
		
		theTable.removeChild(srcRow);
		theTable.insertBefore(srcRow,dstRow);
		updateFields();
	}	
	
	function collapseTable(theEvent) {
		var theCollapseImg = getEventTarget(theEvent);
		var theExpandImg = theCollapseImg.nextSibling;
		var theTargetTable = theCollapseImg.parentNode.parentNode.parentNode.parentNode.nextSibling;
		
		try {
			theTargetTable.style.display = 'none';
			theCollapseImg.style.display = 'none';
			theExpandImg.style.display = 'inline';
		} catch (e) {}
		
		try {
			theTargetTable.style.setAttribute('display','none');
			theCollapseImg.style.setAttribute('display','none');
			theExpandImg.style.setAttribute('display','inline');
		} catch (e) {}
	}
	
	function expandTable(theEvent) {
		var theExpandImg = getEventTarget(theEvent);
		var theCollapseImg = theExpandImg.previousSibling;
		var theTargetTable = theExpandImg.parentNode.parentNode.parentNode.parentNode.nextSibling;
		
		try {
			theTargetTable.style.display = 'table';
			theCollapseImg.style.display = 'inline';
			theExpandImg.style.display = 'none';
		} catch (e) {}
		
		try {
			theTargetTable.style.setAttribute('display','inline');
			theCollapseImg.style.setAttribute('display','inline');
			theExpandImg.style.setAttribute('display','none');
		} catch (e) {}
	}
	
	
	function generateTypeSpecificParameters(theEvent, theNode) {
		if (theNode) {
			var theSelect = theNode;
		} else {
			var theSelect = getEventTarget(theEvent);
		}
		
		
		// Initalize Defaults
	    argv=arguments;
        argc=arguments.length;
        fieldTooltip       = (argc > 2) ? argv[2] : '';
        fieldRequired      = (argc > 3) ? argv[3] : '';
        fieldMaxLength     = (argc > 4) ? argv[4] : '';
        fieldSize          = (argc > 5) ? argv[5] : '';
        fieldDefault       = (argc > 6) ? argv[6] : '';
        fieldRows          = (argc > 7) ? argv[7] : '';
        fieldCols          = (argc > 8) ? argv[8] : '';
        fieldCBIntegration = (argc > 9) ? argv[9] : '';
    	
    	var theCell = theSelect.parentNode.nextSibling; 
    	  
        
 		// Removing any existing cell contents            
		while (theCell.childNodes.length > 0) {
			theCell.removeChild(theCell.childNodes[0]);
		} 
		
      
		switch (theSelect.selectedIndex) {
			case 0:
					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_LAYOUT; ?>'));
					theCell.appendChild(createParameterTable());
					if (!fieldSize) fieldSize = 50;
					createParameter(theCell.childNodes[1], 'text', '<?php echo _ESESS_DYNAMICFIELDS_SIZE; ?>:', 'fieldSize', fieldSize);
					
					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_INPUTCONTROL; ?>'));
					theCell.appendChild(createParameterTable());
					createParameter(theCell.childNodes[3], 'checkbox', '<?php echo _ESESS_DYNAMICFIELDS_REQUIRED; ?>:', 'fieldRequired', fieldRequired);	
					if (!fieldMaxLength) fieldMaxLength = 100;				
					createParameter(theCell.childNodes[3], 'text', '<?php echo _ESESS_DYNAMICFIELDS_MAXLENGTH; ?>:', 'fieldMaxLength', fieldMaxLength);	

					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_USERINTERFACE; ?>'));
					theCell.appendChild(createParameterTable());				
					createParameter(theCell.childNodes[5], 'text', '<?php echo _ESESS_DYNAMICFIELDS_DEFAULT; ?>:', 'fieldDefault', fieldDefault);	
					<?php if ($eSess['cbIntegrated']) { ?>
					createCBIntegrationParameter(theCell.childNodes[5], fieldCBIntegration);
					<?php } ?>				
					createParameter(theCell.childNodes[5], 'text', '<?php echo _ESESS_DYNAMICFIELDS_TOOLTIP; ?>:', 'fieldTooltip', fieldTooltip);
					
				break;	
			case 1:
					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_LAYOUT; ?>'));
					theCell.appendChild(createParameterTable());
					if (!fieldRows) fieldRows = 6;
    				if (!fieldCols) fieldCols = 40;
					createParameter(theCell.childNodes[1], 'text', '<?php echo _ESESS_DYNAMICFIELDS_ROWS; ?>:', 'fieldRows', fieldRows);	
					createParameter(theCell.childNodes[1], 'text', '<?php echo _ESESS_DYNAMICFIELDS_COLS; ?>:', 'fieldCols', fieldCols);	
					
					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_INPUTCONTROL; ?>'));
					theCell.appendChild(createParameterTable());				
					createParameter(theCell.childNodes[3], 'checkbox', '<?php echo _ESESS_DYNAMICFIELDS_REQUIRED; ?>:', 'fieldRequired', fieldRequired);						
					
					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_USERINTERFACE; ?>'));
					theCell.appendChild(createParameterTable());			
					createParameter(theCell.childNodes[5], 'text', '<?php echo _ESESS_DYNAMICFIELDS_DEFAULT; ?>:', 'fieldDefault', fieldDefault);		
					<?php if ($eSess['cbIntegrated']) { ?>
					createCBIntegrationParameter(theCell.childNodes[5], fieldCBIntegration);
					<?php } ?>				
					createParameter(theCell.childNodes[5], 'text', '<?php echo _ESESS_DYNAMICFIELDS_TOOLTIP; ?>:', 'fieldTooltip', fieldTooltip);
				break;
			case 2:
					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_INPUTCONTROL; ?>'));
					theCell.appendChild(createParameterTable());				
					createParameter(theCell.childNodes[1], 'checkbox', '<?php echo _ESESS_DYNAMICFIELDS_REQUIRED; ?>:', 'fieldRequired', fieldRequired);						
					
					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_USERINTERFACE; ?>'));
					theCell.appendChild(createParameterTable());			
					createParameter(theCell.childNodes[3], 'checkbox', '<?php echo _ESESS_DYNAMICFIELDS_DEFAULT; ?>:', 'fieldDefault', fieldDefault);		
					<?php if ($eSess['cbIntegrated']) { ?>
					createCBIntegrationParameter(theCell.childNodes[3], fieldCBIntegration);
					<?php } ?>				
					createParameter(theCell.childNodes[3], 'text', '<?php echo _ESESS_DYNAMICFIELDS_TOOLTIP; ?>:', 'fieldTooltip', fieldTooltip);
				break;
			case 3:	
					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_OPTIONS; ?>'));
					theCell.appendChild(createOptionTable());
									
					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_LAYOUT; ?>'));
					theCell.appendChild(createParameterTable());
					if (!fieldRows) fieldRows = 1;
    				if (!fieldCols) fieldCols = 1;
					createParameter(theCell.childNodes[3], 'text', '<?php echo _ESESS_DYNAMICFIELDS_ROWS; ?>:', 'fieldRows', fieldRows);	
					createParameter(theCell.childNodes[3], 'text', '<?php echo _ESESS_DYNAMICFIELDS_COLS; ?>:', 'fieldCols', fieldCols);	
					
					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_USERINTERFACE; ?>'));
					theCell.appendChild(createParameterTable());					
					<?php if ($eSess['cbIntegrated']) { ?>
					createCBIntegrationParameter(theCell.childNodes[5], fieldCBIntegration);
					<?php } ?>				
					createParameter(theCell.childNodes[5], 'text', '<?php echo _ESESS_DYNAMICFIELDS_TOOLTIP; ?>:', 'fieldTooltip', fieldTooltip);
				break;
			case 4:
					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_OPTIONS; ?>'));
					theCell.appendChild(createOptionTable());


					theCell.appendChild(createTitleRow('<?php echo _ESESS_DYNAMICFIELDS_USERINTERFACE; ?>'));
					theCell.appendChild(createParameterTable());					
					<?php if ($eSess['cbIntegrated']) { ?>
					createCBIntegrationParameter(theCell.childNodes[3], fieldCBIntegration);
					<?php } ?>				
					createParameter(theCell.childNodes[3], 'text', '<?php echo _ESESS_DYNAMICFIELDS_TOOLTIP; ?>:', 'fieldTooltip', fieldTooltip);
				break;		
		}
		
		updateFields();
	}
	


	
	function createFieldTypesSelect(theCell,theDefaultOption) {
		var theSelect = document.createElement('select');
		var theSelectedIndex = '';
	  
        textOption = document.createElement('option');
        textOption.text = '<?php echo _ESESS_DYNAMICFIELDS_FIELDTYPE_TEXT; ?>';
        textOption.value = 'text';
        if (theDefaultOption == 'text') {
            theSelectedIndex = 0;
        }
        
        textareaOption = document.createElement('option');
        textareaOption.text = '<?php echo _ESESS_DYNAMICFIELDS_FIELDTYPE_TEXTAREA; ?>';
        textareaOption.value = 'textarea'; 
        if (theDefaultOption == 'textarea') {
            theSelectedIndex = 1;
        }       
        
        checkOption = document.createElement('option');
        checkOption.text = '<?php echo _ESESS_DYNAMICFIELDS_FIELDTYPE_CHECKBOX; ?>';
        checkOption.value = 'check';
        if (theDefaultOption == 'check') {
            theSelectedIndex = 2;
        } 
        
        radioOption = document.createElement('option');
        radioOption.text = '<?php echo _ESESS_DYNAMICFIELDS_FIELDTYPE_RADIO; ?>';
        radioOption.value = 'radio'; 
        if (theDefaultOption == 'radio') {
            theSelectedIndex = 3;
        }    
        
        selectOption = document.createElement('option');
        selectOption.text = '<?php echo _ESESS_DYNAMICFIELDS_FIELDTYPE_SELECT; ?>';
        selectOption.value = 'select';
        if (theDefaultOption == 'select') {
            theSelectedIndex = 4;
        }     
     
        
        // Link the Nodes together
        /* 
         * BUGFIX: Mozilla/Firefox doesn't support ADD method
         */
        try {
			theSelect.add(textOption,0);
			theSelect.add(textareaOption,1);
			theSelect.add(checkOption,2);
			theSelect.add(radioOption,3);
			theSelect.add(selectOption,4);
		} catch (e) {
			// Probably using Mozilla...
			theSelect.appendChild(textOption);
        	theSelect.appendChild(textareaOption);
        	theSelect.appendChild(checkOption);
        	theSelect.appendChild(radioOption);
        	theSelect.appendChild(selectOption);
        }
        theCell.appendChild(theSelect);
        theSelect.selectedIndex = theSelectedIndex;
	} // createFieldTypesSelect
	
	function updateFields() {
		var theTable = document.getElementById('customFieldsTable');

		for (var thisRow = 0; thisRow < theTable.tBodies[0].rows.length; thisRow++) {
			var theRow = theTable.tBodies[0].rows[thisRow];
			
			theRow.className = 'row' + (thisRow % 2);
			
			// Delete Button
			theRow.cells[0].childNodes[0].onclick = deleteFieldRow;
				
			
			// Up Button
			if (thisRow == 0) {
				try { theRow.cells[1].childNodes[0].style.display = 'none'; } catch (e) {}
				try { theRow.cells[1].childNodes[0].style.setAttribute('display','none'); } catch (e) {}
			} else {
				try { theRow.cells[1].childNodes[0].style.display = 'inline'; } catch (e) {}
				try { theRow.cells[1].childNodes[0].style.setAttribute('display','inline'); } catch (e) {}
				
				theRow.cells[1].childNodes[0].onclick = moveUp;
			}
			
			// Down Button
			if (thisRow == (theTable.tBodies[0].rows.length - 1)) {
				try { theRow.cells[2].childNodes[0].style.display = 'none'; } catch (e) {}
				try { theRow.cells[2].childNodes[0].style.setAttribute('display','none'); } catch (e) {}
			} else {
				try { theRow.cells[2].childNodes[0].style.display = 'inline'; } catch (e) {}
				try { theRow.cells[2].childNodes[0].style.setAttribute('display','inline'); } catch (e) {}

				theRow.cells[2].childNodes[0].onclick = moveDown;
			}			
			
			// Field Name
			theRow.cells[3].childNodes[0].setAttribute('name','fieldName[' + thisRow + ']');
			
			// Field ID
			theRow.cells[3].childNodes[1].setAttribute('name','fieldId[' + thisRow + ']');
			
			// Select Type
			theRow.cells[4].childNodes[0].setAttribute('name','fieldType[' + thisRow + ']');
			theRow.cells[4].childNodes[0].onchange = generateTypeSpecificParameters;			
			
			
			// Type Specific Parameters
			updateParameters(thisRow);
		} // for thisRow...
	} // updateFields
	
	
	function updateParameters(fieldNumber) {
		var fieldTable = document.getElementById('customFieldsTable');
		var fieldType = fieldTable.tBodies[0].rows[fieldNumber].cells[4].childNodes[0].selectedIndex;
		var parameterTables = fieldTable.tBodies[0].rows[fieldNumber].cells[5];



		// If properly constructed, tables which contain actual parameters only occur as odd children... 
		for (thisTable = 1; thisTable < parameterTables.childNodes.length; thisTable += 2) {
		
			// Make sure there is at least one row in the tbody element...
			if (parameterTables.childNodes[thisTable].tBodies[0].rows.length > 0) {
			
				// Make sure this isn't an "Options" table
				if (parameterTables.childNodes[thisTable].tBodies[0].rows[0].cells[0].childNodes[0].nodeType == 3) {
					for (thisParameter = 0; thisParameter < parameterTables.childNodes[thisTable].tBodies[0].rows.length; thisParameter++) {
						var theInput = parameterTables.childNodes[thisTable].tBodies[0].rows[thisParameter].cells[1].childNodes[0];
						var inputName = theInput.name;
						var parameterName = inputName.substring(0,inputName.indexOf('['));
						theInput.name = parameterName + '[' + fieldNumber + ']';
					}
				
			
				// But, if it is, update it too...
				} else if (parameterTables.childNodes[thisTable].tBodies[0].rows[0].cells[0].childNodes[0].nodeName == 'IMG') {
					var theOptionTable = parameterTables.childNodes[thisTable];
					
					var hasDefault = false;
					for (thisOption = 0; thisOption < theOptionTable.tBodies[0].rows.length; thisOption++) {
						// Hide the Delete Button (if necessary)
						if (theOptionTable.tBodies[0].rows.length == 1) {
							try { theOptionTable.tBodies[0].rows[thisOption].cells[0].childNodes[0].style.display = 'none'; } catch (e) {}
							try { theOptionTable.tBodies[0].rows[thisOption].cells[0].childNodes[0].style.setAttribute('display','none'); } catch (e) {}
						} else {
							try { theOptionTable.tBodies[0].rows[thisOption].cells[0].childNodes[0].style.display = 'inline'; } catch (e) {}
							try { theOptionTable.tBodies[0].rows[thisOption].cells[0].childNodes[0].style.setAttribute('display','inline'); } catch (e) {}
						}
						
						// Hide the Up Button (if necessary)
						if (thisOption == 0) {
							try { theOptionTable.tBodies[0].rows[thisOption].cells[1].childNodes[0].style.display = 'none'; } catch (e) {}
							try { theOptionTable.tBodies[0].rows[thisOption].cells[1].childNodes[0].style.setAttribute('display','none'); } catch (e) {}
						} else {
							try { theOptionTable.tBodies[0].rows[thisOption].cells[1].childNodes[0].style.display = 'inline'; } catch (e) {}
							try { theOptionTable.tBodies[0].rows[thisOption].cells[1].childNodes[0].style.setAttribute('display','inline'); } catch (e) {}
						}
						
						// Hide the Down Button (if necessary)
						if (thisOption == theOptionTable.tBodies[0].rows.length-1) {
							try { theOptionTable.tBodies[0].rows[thisOption].cells[2].childNodes[0].style.display = 'none'; } catch (e) {}
							try { theOptionTable.tBodies[0].rows[thisOption].cells[2].childNodes[0].style.setAttribute('display','none'); } catch (e) {}
						} else {
							try { theOptionTable.tBodies[0].rows[thisOption].cells[2].childNodes[0].style.display = 'inline'; } catch (e) {}
							try { theOptionTable.tBodies[0].rows[thisOption].cells[2].childNodes[0].style.setAttribute('display','inline'); } catch (e) {}
						}
						
						// Update the optionName form input
						theOptionTable.tBodies[0].rows[thisOption].cells[3].childNodes[0].setAttribute('name','fieldOption[' + fieldNumber + '][' + thisOption + ']');
						
						// Update the optionId form input
						theOptionTable.tBodies[0].rows[thisOption].cells[3].childNodes[1].setAttribute('name','fieldOptionId[' + fieldNumber + '][' + thisOption + ']');
						
						// Update the fieldDefault form input
						theOptionTable.tBodies[0].rows[thisOption].cells[4].childNodes[0].childNodes[0].setAttribute('name','fieldDefault[' + fieldNumber + ']');
						theOptionTable.tBodies[0].rows[thisOption].cells[4].childNodes[0].childNodes[0].value = thisOption;
						
						// Does this row contain a default selection?
						if (theOptionTable.tBodies[0].rows[thisOption].cells[4].childNodes[0].childNodes[0].checked == true) {
							hasDefault = true;
						}
					} // for thisOption...
					if (!hasDefault && !loadingData) {
						theOptionTable.tBodies[0].rows[0].cells[4].childNodes[0].childNodes[0].checked = true;
					}
					
				
					if (fieldType == 3) {
						// The contents of the 'Type Specific Parameters' Cell may be empty...
						var parameterTable = fieldTable.tBodies[0].rows[fieldNumber].cells[5].childNodes[3];
						if (parameterTable) {
							var rowsInput = parameterTable.tBodies[0].rows[0].cells[1].childNodes[0];
							var colsInput = parameterTable.tBodies[0].rows[1].cells[1].childNodes[0];
							
							// Disable Rows Input
							rowsInput.disabled = true;
							
							// Update the Row and Column Counters
								// Case #1:  Additional rows are needed: 
								while (rowsInput.value * colsInput.value < (theOptionTable.tBodies[0].rows.length)) {
									rowsInput.value++;										
								}
							
								// Case #2:  Too many rows!			
								while ((rowsInput.value-1) * colsInput.value >= (theOptionTable.tBodies[0].rows.length)) {
									rowsInput.value = rowsInput.value-1;										
								}
								
							// Update onchange	
							colsInput.onchange = determineRowsAndColumns;									
						} // if table cell not empty
					}
				} 
			} else {
				// if tBodies[0].rows.length > 0
				if (thisTable == 1) {
					if (fieldType == 3) {
						var parameterTable = fieldTable.tBodies[0].rows[fieldNumber].cells[5].childNodes[3];
						var rowsInput = parameterTable.tBodies[0].rows[0].cells[1].childNodes[0];
						// Disable Rows Input
						rowsInput.disabled = true;
					}
					
					if (!loadingData) {
						createOptionRow('',fieldNumber);
					}
				}
			}

		} // for thisTable...
	} //updateParameters
	
	
	function determineRowsAndColumns(theEvent) {
		var colsInput = getEventTarget(theEvent);
		var rowsInput = colsInput.parentNode.parentNode.previousSibling.childNodes[1].childNodes[0];
		var optionTable = colsInput.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling;
		
		// Based on the inputted value into colsInput, set rowsInput and colsInput accordingly
		if (!isPosInteger(colsInput.value) || (colsInput.value > (optionTable.rows.length - 1))) {
			colsInput.value = 1;
		}
		rowsInput.value = Math.ceil((optionTable.rows.length - 1)/colsInput.value);
	}
	
	
	
	
	
	
	
	
	
	function createTitleRow(theTitleText) {
		var theTable = document.createElement('table');		
			theTable.className = 'adminform';
         	theTable.insertRow(0);    
         	theTable.rows[0].className = 'AE_Title';           
			theTable.rows[0].insertCell(0);
			theTable.rows[0].cells[0].setAttribute('colspan','2');
			
			// The Collapse All Button
			theTable.rows[0].cells[0].appendChild(document.createElement('img'));
			theTable.rows[0].cells[0].childNodes[0].setAttribute('src','<?php echo $mosConfig_live_site; ?>/administrator/images/collapseall.png');
			theTable.rows[0].cells[0].childNodes[0].setAttribute('width','13');
			theTable.rows[0].cells[0].childNodes[0].setAttribute('height','13');
			theTable.rows[0].cells[0].childNodes[0].setAttribute('alt','');
			theTable.rows[0].cells[0].childNodes[0].onclick = collapseTable;
			try { theTable.rows[0].cells[0].childNodes[0].style.display = 'visible'; } catch (e) {}
			try { theTable.rows[0].cells[0].childNodes[0].style.setAttribute('display','visible'); } catch (e) {}
                        
            // The Expand All Button            
			theTable.rows[0].cells[0].appendChild(document.createElement('img'));
			theTable.rows[0].cells[0].childNodes[1].setAttribute('src','<?php echo $mosConfig_live_site; ?>/administrator/images/expandall.png');
			theTable.rows[0].cells[0].childNodes[1].setAttribute('width','13');
			theTable.rows[0].cells[0].childNodes[1].setAttribute('height','13');
			theTable.rows[0].cells[0].childNodes[1].setAttribute('alt','');
			theTable.rows[0].cells[0].childNodes[1].onclick = expandTable;
			try { theTable.rows[0].cells[0].childNodes[1].style.display = 'none'; } catch (e) {}
			try { theTable.rows[0].cells[0].childNodes[1].style.setAttribute('display','none'); } catch (e) {}
			
			
			theTable.rows[0].cells[0].appendChild(document.createTextNode(' ' + theTitleText));
			
		return theTable;
	}

	
	
	
	function createParameterTable() {
		var parameterTable = document.createElement('table');
		parameterTable.className = 'adminform'; 
		parameterTable.appendChild(document.createElement('tbody'));
		
		return parameterTable;	
	}	
	
	function createParameter(parameterTable, optionType, optionTitle, optionName, optionValue) {
		var newRow = parameterTable.tBodies[0].insertRow(parameterTable.tBodies[0].rows.length);
		newRow.insertCell(0);
		newRow.insertCell(0);
		newRow.cells[0].setAttribute('width','150');
		newRow.cells[0].appendChild(document.createTextNode(optionTitle));
		
		var theInput = document.createElement('input');
			theInput.setAttribute('type',optionType);
			theInput.setAttribute('name',optionName + '[]');
			theInput.value = optionValue;
			
			if (optionType == 'checkbox') {
				theInput.value = 1;
				if (optionValue == 1) {
					theInput.checked = true;
				} else {
					theInput.checked = false;
				}
			}
		newRow.childNodes[1].appendChild(theInput);	
		
	}

	function createCBIntegrationParameter(parameterTable, fieldCBIntegration) {
	
		var newRow = parameterTable.tBodies[0].insertRow(parameterTable.tBodies[0].rows.length);
		newRow.insertCell(0);
		newRow.insertCell(0);
		newRow.childNodes[0].setAttribute('width','150');
		newRow.childNodes[0].appendChild(document.createTextNode('<?php echo _ESESS_DYNAMICFIELDS_CBDEFAULT; ?>:'));
		
		
		var theInput = document.createElement('select');
			theInput.setAttribute('name','fieldCBIntegration[]');

		// Blank Option
        var theOption = document.createElement('option');
        	theOption.value = '';
        	theOption.text  = '';
        	/* 
        	 * Mozillia/Firefox doesn't support ADD
        	 */
        	try {
        		theInput.add(theOption);
        	} catch (e) {
        		theInput.appendChild(theOption);
        	}


		<?php
			/* 
			 * Load Community Builder's language file...
			 */
			global $mainframe, $mosConfig_lang;
			$UElanguagePath=$mainframe->getCfg( 'absolute_path' ).'/components/com_comprofiler/plugin/language';
			
			// CB RC2...
			if (file_exists($UElanguagePath.'/'.$mosConfig_lang.'/'.$mosConfig_lang.'.php')) {
				include_once($UElanguagePath.'/'.$mosConfig_lang.'/'.$mosConfig_lang.'.php');
			} 
			if (file_exists($UElanguagePath.'/default_language/default_language.php')) {
				include_once($UElanguagePath.'/default_language/default_language.php');
			}			
			
			// CB RC1
			if (file_exists($mainframe->getCfg( 'absolute_path' ) .'/administrator/components/com_comprofiler/language/'.$mosConfig_lang.'.php')) {
				include_once($mainframe->getCfg( 'absolute_path' ) .'/administrator/components/com_comprofiler/language/'.$mosConfig_lang.'.php');
			} 
			

			$previousSelection = false;
            $database->setQuery( "SELECT f.title, f.name "
                               . "FROM #__comprofiler_fields AS f");
            $rows = $database->loadObjectList();
            if (!$database->getErrorNum()) {
				$previousSelection = false;
				$thisOption = 1;
				foreach ($rows as $row) { ?>
					theOption = document.createElement('option');
					theOption.value = '<?php echo $row->name; ?>';
					<?php if (defined($row->title)) {
							$cbFieldName = constant($row->title);
						} else {
							$cbFieldName = $row->title;
						}
						$cbFieldName = html_entity_decode($cbFieldName);
						$cbFieldName = str_replace("\\\'","\'",$cbFieldName);
					?>
					      	
					theOption.text  = '<?php echo $cbFieldName; ?>';
					try {
						theInput.add(theOption);
					} catch (e) {
						theInput.appendChild(theOption);
					}
					if (fieldCBIntegration == '<?php echo $row->name; ?>') {	
						theInput.selectedIndex = <?php echo $thisOption; ?>;
						<?php $previousSelection = true; ?>
					}
        <?php
        			$thisOption++;
        		} // foreach rows as row
        	} // if no DB error
        
        	if (!$previousSelection) { ?>
        		theInput.selectedIndex = 0;
        <?php
        	}
		?>
		
		newRow.childNodes[1].appendChild(theInput);	 		
	}


	
	function createOptionTable() {
		var optionsTable = document.createElement('table');
			optionsTable.className = 'adminform';
	
		// Create the Header Row
		/* 
		 * Mozilla/Firefox requires a number is passed for insertRow and insertCell
		 */
		optionsTable.createTHead();
		var headerRow = optionsTable.tHead.insertRow(0);
		headerRow.className = 'AE_Title';
		headerRow.insertCell(0);
		headerRow.insertCell(1);
		headerRow.insertCell(2);
		headerRow.insertCell(3);
		headerRow.insertCell(4);
				
		// Add Button
		headerRow.cells[0].setAttribute('width','20');
		headerRow.cells[0].appendChild(document.createElement('img'));
		headerRow.cells[0].childNodes[0].setAttribute('src','<?php echo $mosConfig_live_site; ?>/includes/js/ThemeOffice/categories.png');
		headerRow.cells[0].childNodes[0].setAttribute('height','16');
		headerRow.cells[0].childNodes[0].setAttribute('width','16');	
		headerRow.cells[0].childNodes[0].setAttribute('alt','<?php echo _ESESS_DYNAMICFIELDS_ADDOPTION; ?>');
		headerRow.cells[0].childNodes[0].onclick = createOptionRow;	
		
		// Option Name Text
		headerRow.cells[3].appendChild(document.createTextNode('<?php echo _ESESS_DYNAMICFIELDS_OPTIONNAME; ?>'));
	
		// Default Text
		headerRow.cells[4].appendChild(document.createElement('div'));
		headerRow.cells[4].childNodes[0].setAttribute('align','center');
		headerRow.cells[4].childNodes[0].appendChild(document.createTextNode('<?php echo _ESESS_DYNAMICFIELDS_DEFAULT; ?>'));
	
		// Create the TBODY
		optionsTable.appendChild(document.createElement('tbody'));
	
		return optionsTable;
	}
	
	function createOptionRow(theEvent) {
		argv=arguments;
        argc=arguments.length;
        var theField      = (argc > 1) ? argv[1] : '';
        var optionId      = (argc > 2) ? argv[2] : '';
		var optionName    = (argc > 3) ? argv[3] : '';
		var optionDefault = (argc > 4) ? argv[4] : ''; 

		if ((theField == '') && (theEvent != '')) {
			var theImg = getEventTarget(theEvent);
			var theTable = theImg.parentNode.parentNode.parentNode.parentNode;
				theField = theTable.parentNode.parentNode.rowIndex - 1;
		} else {
			var theFieldTable = document.getElementById('customFieldsTable');
			var theTable = theFieldTable.tBodies[0].rows[theField].cells[5].childNodes[1];
		}
		
		var rowNumber = theTable.tBodies[0].rows.length;
		var theRow = theTable.tBodies[0].insertRow(rowNumber);

		/* 
		 * Mozilla/Firefox requires a number to be passed
		 */
		theRow.insertCell(0);
		theRow.insertCell(1);
		theRow.insertCell(2);
		theRow.insertCell(3);
		theRow.insertCell(4);
	
		
		// Delete Button
		theRow.cells[0].appendChild(document.createElement('img'));
		theRow.cells[0].childNodes[0].setAttribute('src','<?php echo $mosConfig_live_site; ?>/administrator/images/publish_x.png');
		theRow.cells[0].childNodes[0].setAttribute('height','12');
		theRow.cells[0].childNodes[0].setAttribute('width','12');	
		theRow.cells[0].childNodes[0].setAttribute('alt','Delete Option');	
		theRow.cells[0].childNodes[0].onclick = deleteFieldRow;		

		// Order Buttons
		theRow.cells[1].setAttribute('width','12');
		theRow.cells[1].appendChild(document.createElement('img'));
		theRow.cells[1].childNodes[0].setAttribute('src','<?php echo $mosConfig_live_site; ?>/administrator/images/uparrow.png');
		theRow.cells[1].childNodes[0].setAttribute('width','12');
		theRow.cells[1].childNodes[0].setAttribute('height','12');
		theRow.cells[1].childNodes[0].setAttribute('alt','Up');
		theRow.cells[1].childNodes[0].onclick = moveUp;	
		
		theRow.cells[2].setAttribute('width','12');
		theRow.cells[2].appendChild(document.createElement('img'));
		theRow.cells[2].childNodes[0].setAttribute('src','<?php echo $mosConfig_live_site; ?>/administrator/images/downarrow.png');
		theRow.cells[2].childNodes[0].setAttribute('width','12');
		theRow.cells[2].childNodes[0].setAttribute('height','12');
		theRow.cells[2].childNodes[0].setAttribute('alt','Down');
		theRow.cells[2].childNodes[0].onclick = moveDown;	

		// Option Name
		var theInput = document.createElement('input');
		theInput.setAttribute('type','text');
		theInput.setAttribute('name','optionName[]');
		theInput.value = optionName;
		theRow.cells[3].appendChild(theInput);
		
		// Option Id	
		var theInput = document.createElement('input');
		theInput.setAttribute('type','hidden');
		theInput.setAttribute('name','optionId[]');
		theInput.value = optionId;
		theRow.cells[3].appendChild(theInput);
		
		// Option Default
		theRow.cells[4].appendChild(document.createElement('div'));
		theRow.cells[4].childNodes[0].setAttribute('align','center');
		var theInput = createElement('input','fieldDefault[' + theField + ']','radio');
		if (optionDefault == 1) {
			theInput.checked = true;
			theInput.defaultChecked = true;
		} else {
			theInput.checked = false;
		}
		theRow.cells[4].childNodes[0].appendChild(theInput);
	
		updateFields();
		
	}
	
	
	


	function enableFields() {
		var fieldTable = document.getElementById('customFieldsTable');

		for (var fieldNumber = 0; fieldNumber < fieldTable.tBodies[0].rows.length; fieldNumber++) {
			theRow = fieldTable.tBodies[0].rows[fieldNumber];
			
			// Field Name
			if (theRow.cells[3].childNodes[0].value.length == 0) {
				errorMsg += 'Invalid Field Name for field #' + (fieldNumber+1) + '\n';
			}
			
			// Type Specific Parameters
			var parameterTables = fieldTable.tBodies[0].rows[fieldNumber].cells[5];
			
			// If properly constructed, tables which contain actual parameters only occur as odd children... 
			for (var thisTable = 1; thisTable < parameterTables.childNodes.length; thisTable += 2) {
			
				// Make sure there is at least one row in the tbody element...
				if (parameterTables.childNodes[thisTable].tBodies[0].rows.length > 0) {
				
					// Make sure this isn't an "Options" table
					if (parameterTables.childNodes[thisTable].tBodies[0].rows[0].cells[0].childNodes[0].nodeType == 3) {
						for (var thisParameter = 0; thisParameter < parameterTables.childNodes[thisTable].tBodies[0].rows.length; thisParameter++) {
							var theInput = parameterTables.childNodes[thisTable].tBodies[0].rows[thisParameter].cells[1].childNodes[0];
							
							if (theInput.disabled) {
								theInput.disabled = false;
							}
						}
					} // if parameterTables.nodeType == 3...
				} // if parameterTables.row.length > 0...
			} // for thisTable=1...
		} // for fieldNumber = 0...
	} // enableFields
	
	function validateFields() {
		var errorMsg = '';
		var fieldTable = document.getElementById('customFieldsTable');

		for (var fieldNumber = 0; fieldNumber < fieldTable.tBodies[0].rows.length; fieldNumber++) {
			theRow = fieldTable.tBodies[0].rows[fieldNumber];
			
			// Field Name
			if (theRow.cells[3].childNodes[0].value.length == 0) {
				errorMsg += 'Invalid Field Name for field #' + (fieldNumber+1) + '\n';
			}
			
			// Type Specific Parameters
			var parameterTables = fieldTable.tBodies[0].rows[fieldNumber].cells[5];
			
			// If properly constructed, tables which contain actual parameters only occur as odd children... 
			for (thisTable = 1; thisTable < parameterTables.childNodes.length; thisTable += 2) {
			
				// Make sure there is at least one row in the tbody element...
				if (parameterTables.childNodes[thisTable].tBodies[0].rows.length > 0) {
				
					// Make sure this isn't an "Options" table
					if (parameterTables.childNodes[thisTable].tBodies[0].rows[0].cells[0].childNodes[0].nodeType == 3) {
						for (thisParameter = 0; thisParameter < parameterTables.childNodes[thisTable].tBodies[0].rows.length; thisParameter++) {
							var theInput = parameterTables.childNodes[thisTable].tBodies[0].rows[thisParameter].cells[1].childNodes[0];
							var inputName = theInput.name;
							var parameterName = inputName.substring(0,inputName.indexOf('['));
							theInput.name = parameterName + '[' + fieldNumber + ']';
							
							switch (parameterName) {
								case 'fieldSize':	
										if (!isPosInteger(theInput.value)) {
											errorMsg += 'Invalid Field Size for field #' + (fieldNumber+1) + '\n';
										}
									break;
								case 'fieldMaxLength':
										if (!isPosInteger(theInput.value)) {
											errorMsg += 'Invalid Field Maximum Length for field #' + (fieldNumber+1) + '\n';
										}
									break;	
								case 'fieldRows':
										if (!isPosInteger(theInput.value)) {
											errorMsg += 'Invalid Field Rows for field #' + (fieldNumber+1) + '\n';
										}
									break;
								case 'fieldCols':
										if (!isPosInteger(theInput.value)) {
											errorMsg += 'Invalid Field Columns for field #' + (fieldNumber+1) + '\n';
										}
									break;							
							} // switch							
						} // for thisParameter=0...
					
				
					// But, if it is, update it too...
					} else if (parameterTables.childNodes[thisTable].tBodies[0].rows[0].cells[0].childNodes[0].nodeName == 'IMG') {
						var theOptionTable = parameterTables.childNodes[thisTable];
					
						for (thisOption = 0; thisOption < theOptionTable.tBodies[0].rows.length; thisOption++) {
							if (theOptionTable.tBodies[0].rows[thisOption].cells[3].childNodes[0].value.length == 0) {	
								errorMsg += 'Invalid Option Name for option #' + optionRow + ' of field #' + (fieldNumber+1) + '\n'
							}
						} 
					} 
				} else {
					// There are no rows in this parameter tables tbody element
					if (thisTable == 1) {
						errorMsg += 'At least one option is required for field #' + (fieldNumber+1) + '\n'
					}
				}
			} // for thisTable=1...
		} // for fieldNumber = 0...
		
		return errorMsg;
		
	} // validateFields


	
	//-->
	</script>
<?php	} // insertCustomFieldScripts

} // class

