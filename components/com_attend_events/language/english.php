<?php
/**
* @version $Id: english.php 17 2006-11-04 03:41:21Z pcarr $
* @package Attend Events
* @copyright (C) 2005-06 Peter Carr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Check
DEFINE("_ESESS_LANG_INCLUDED", 1);

// Front-End :: Title
DEFINE("_ESESS_COMPONENT_TITLE", "Attend Events");

// Front-End :: List
DEFINE("_ESESS_NAME", "Name");
DEFINE("_ESESS_VENUE", "Venue");
DEFINE("_ESESS_SESSION_UP", "Session Date");
DEFINE("_ESESS_REGISTRATION_DOWN", "Registration Deadline");
DEFINE("_ESESS_NUM_LEFT", "# Left");
DEFINE("_ESESS_NUM_AVAIL", "# Available");
DEFINE("_ESESS_AVAIL_STATUS", "Status");
DEFINE("_ESESS_AVAIL_STATUS_AVAIL", "Available");
DEFINE("_ESESS_AVAIL_STATUS_FULL", "Full");

// Front-End :: View
DEFINE("_ESESS_REG_HOSTED_BY", "Hosted by");
DEFINE("_ESESS_REG_DATETIME", "Date &amp; Time");
DEFINE("_ESESS_REG_LOCATION", "Location");
DEFINE("_ESESS_REG_MAPTEXT", "How do I get there?");
DEFINE("_ESESS_REG_AVAIL", "Registrations Available");
DEFINE("_ESESS_REG_CLOSE", "Registration Deadline");
DEFINE("_ESESS_UNLIMITED", "Unlimited");
DEFINE("_ESESS_OUT_OF", "out of");
DEFINE("_ESESS_FIELD_COMMENTS", "Comments");
DEFINE("_ESESS_FIELD_COMMENTS_DESC", "");
DEFINE("_ESESS_ERROR_ONLY_REGISTERED", "Only registered users may register for this session.");
DEFINE("_ESESS_ERROR_ONLY_GUESTS", "Only guests may register for this session.");
DEFINE("_ESESS_ERROR_FULL", "This session is full.");
DEFINE("_ESESS_ERROR_CLOSED", "The registration period is over.");
DEFINE("_ESESS_REG_LIST", "People Already Registered");

// Front End :: View -> Registration Form
DEFINE("_ESESS_FIELD_FULLNAME", "Full Name");
DEFINE("_ESESS_FIELD_FULLNAME_DESC", "Please enter your Full Name here for contact purposes.");
DEFINE("_ESESS_FIELD_EMAIL", "Email");
DEFINE("_ESESS_FIELD_EMAIL_DESC", "Please enter your contact email address here.");
DEFINE("_ESESS_FIELD_NUM_PEOPLE", "Number of people");
DEFINE("_ESESS_FIELD_NUM_PEOPLE_DESC", "How many people would you like to register for?");
DEFINE("_ESESS_BUTTON_REGISTER", "Register");
DEFINE("_ESESS_BUTTON_RESET", "Reset");
DEFINE("_ESESS_BUTTON_UPDATE", "Update Registration");
DEFINE("_ESESS_BUTTON_CANCEL", "Cancel Registration");
DEFINE("_ESESS_VAL_REG_ALERT", "Registration Validation Issues:");
DEFINE("_ESESS_VAL_REG_FULLNAME", "Your Full Name must be supplied.");
DEFINE("_ESESS_VAL_REG_EMAIL", "Your email address must be supplied.");
DEFINE("_ESESS_VAL_REG_NUMBER", "Number of people is not a valid whole number between 1 and ");

// Back-End -> General
DEFINE("_ESESS_REQUIRED", "<span style=\"color: red;\">*</span>");
DEFINE("_ESESS_STYLE_TITLE", "style=\"background-color: #E0E0E0; font-weight: bold; border-bottom: 1px solid #B0B0B\"");

// Back-End -> Menus
DEFINE("_ESESS_MENU_SESSIONS", "Sessions");
DEFINE("_ESESS_MENU_VENUES", "Venues");
DEFINE("_ESESS_MENU_REGISTRATIONS", "Registrations");
DEFINE("_ESESS_MENU_CONFIGURATION", "Configuration");

// Back-End :: Sessions :: List
DEFINE("_ESESS_FORM_SLIST", "Session Manager");
DEFINE("_ESESS_SLIST_NAME", "Name");
DEFINE("_ESESS_SLIST_SESSION_UP", "Sess. Start Date");
DEFINE("_ESESS_SLIST_SESSION_DOWN", "Sess. End Date");
DEFINE("_ESESS_SLIST_REGISTRATION_UP", "Reg. Start Date");
DEFINE("_ESESS_SLIST_REGISTRATION_DOWN", "Reg. End Date");
DEFINE("_ESESS_SLIST_NUM_REGISTRATIONS", "Registrations");
DEFINE("_ESESS_SLIST_STATUS", "Status");
DEFINE("_ESESS_SLIST_AVAIL", "Availability");
DEFINE("_ESESS_SLIST_PUB", "Published");
// Back-End :: Sessions :: List -> Filters
DEFINE("_ESESS_SFILTER_CHOOSE", "Choose a Filter");
DEFINE("_ESESS_SFILTER_NONE", "No Filters");
DEFINE("_ESESS_SFILTER_STATUS", "- Status Filters");
DEFINE("_ESESS_SFILTER_AVAIL", "- Availability Filters");
DEFINE("_ESESS_SFILTER_EVENT", "- Event Filters");
DEFINE("_ESESS_RFILTER_CHOOSE", "Choose a Session");
DEFINE("_ESESS_RFILTER_ALL", "- All Sessions");
// Back-End :: Sessions :: List -> Javascript Validation Errors
DEFINE("_ESESS_PUBLISH_MSG", "Select a Session to be ");
DEFINE("_ESESS_DELETE_SESSION_MSG", "Select a Session to delete");


// Back-End :: Sessions :: Edit
DEFINE("_ESESS_FORM_SESS_ADD", "Add Session");
DEFINE("_ESESS_FORM_SESS_EDIT", "Edit Session");
DEFINE("_ESESS_TITLE_DESCRIPTION", "Session Details");
DEFINE("_ESESS_TITLE_SESSION_GENERAL","General");
DEFINE("_ESESS_TITLE_SESSION_DATETIME","Date & Time");
DEFINE("_ESESS_FIELD_EVENT", "Event");
DEFINE("_ESESS_FIELD_EVENT_DESC", "Select an existing event to create a session for.");
DEFINE("_ESESS_NO_EVENT", "No Event");
DEFINE("_ESESS_FIELD_TITLE", "Title");
DEFINE("_ESESS_FIELD_TITLE_DESC", "Enter a Title for the Session.");
DEFINE("_ESESS_FIELD_INTRO", "Description");
DEFINE("_ESESS_FIELD_INTRO_DESC", "Some introductory text explaining about this Session.  Helpful if not linked to an Event.");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE", "Session Start Date");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE_DESC", "Date on which the session begins.");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME", "Session Start Time");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE", "Session End Date");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE_DESC", "Date on which the session ends.");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME", "Session End Time");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_FIELD_STATUS", "Status");
DEFINE("_ESESS_FIELD_STATUS_DESC", "Overall Status of the Session:<br />New is not accessible<br />Open can be Registered<br />Closed is obviously closed<br />Full has reached Max Regs");
DEFINE("_ESESS_FIELD_MAX", "Max # Registrations");
DEFINE("_ESESS_FIELD_MAX_DESC", "The maximum number of registrations allowed for the session.<br />Once the max is reached the status is changed to Full");
DEFINE("_ESESS_FIELD_AVAIL", "Availability");
DEFINE("_ESESS_FIELD_AVAIL_DESC", "Indicates who is allowed to register for Sessions.<br />Use Global uses the prefernce in configuration");
DEFINE("_ESESS_FIELD_PUBLISH", "Publish");
DEFINE("_ESESS_FIELD_PUBLISH_DESC", "Indicates whether this session is Published.");
DEFINE("_ESESS_FIELD_SESSION_HOST", "Session Host");
DEFINE("_ESESS_FIELD_SESSION_HOST_DESC", "Select a host for this session.  To appear in this list,  a user must have a group access level of &quot;author&quot; or higher.");
DEFINE("_ESESS_TAB_SESSION_REGISTRATION","Registration");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE", "Registration Start Date");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE_DESC", "Date to Start accepting Registrations. Link is not displayed until this date.");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME", "Registration Start Time");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE", "Registration End Date");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE_DESC", "Date to finish accepting Registrations.  Link is not displayed after this date.");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME", "Registration End Time");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_TAB_SESSION_VENUE","Venue");
DEFINE("_ESESS_FIELD_VENUE_LIST", "Common Venues");
DEFINE("_ESESS_FIELD_VENUE_LIST_DESC", "Select a venue defined in the Venues table, or enter the venue\'s information in the fields below.");


// Back-End :: Venues
DEFINE("_ESESS_FORM_VLIST", "Events Venues");
DEFINE("_ESESS_VLIST_NAME", "Venue Name");

// Back-End :: Venues :: Edit
DEFINE("_ESESS_FORM_VENUE_ADD", "Add Venue");
DEFINE("_ESESS_FORM_VENUE_EDIT", "Edit Venue");
DEFINE("_ESESS_FIELD_VENUE_TITLE", "Name");
DEFINE("_ESESS_FIELD_VENUE_TITLE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS", "Address");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_CITY", "City");
DEFINE("_ESESS_FIELD_VENUE_CITY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_STATE", "State");
DEFINE("_ESESS_FIELD_VENUE_STATE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE", "Postal Code");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY", "Country");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS", "Web Address");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS_DESC", "Make sure to include &quot;http://&quot;");
DEFINE("_ESESS_JSERROR_VENUE_TITLE", "You must enter the venue\'s name.");
DEFINE("_ESESS_JSERROR_VENUE_ADDRESS", "You must enter the venue\'s address.");

// Back-End :: Registrations :: List
DEFINE("_ESESS_FORM_RLIST", "Events Registratons");
DEFINE("_ESESS_RLIST_NAME", "Name");
DEFINE("_ESESS_RLIST_EMAIL", "Email");
DEFINE("_ESESS_RLIST_TITLE", "Session");
DEFINE("_ESESS_RLIST_RDATE", "Registration Date");
DEFINE("_ESESS_RLIST_STATUS", "Status");
DEFINE("_ESESS_RLIST_NUM", "# Registrations");
DEFINE("_ESESS_RLIST_VIEWED", "Viewed");
DEFINE("_ESESS_REGISTRATION_STATUS_REGISTERED", "Registered");
DEFINE("_ESESS_REGISTRATION_STATUS_CANCELLED", "Cancelled");
DEFINE("_ESESS_REGISTRATION_STATUS_CLOSED", "Closed");
DEFINE("_ESESS_DELETE_REG_MSG", "Select a Registration to delete");

// Back-End :: Registrations :: View
DEFINE("_ESESS_FORM_REG_VIEW", "View Registration");
DEFINE("_ESESS_FIELD_SESSION", "Session");
DEFINE("_ESESS_FIELD_REGISTRATION_DATE", "Registration Date");
DEFINE("_ESESS_FIELD_CANCELLATION_DATE", "Cancellation Date");
DEFINE("_ESESS_FIELD_REGISTRATION_STATUS", "Status");

// Back-End :: Registrations :: Export
DEFINE("_ESESS_FORM_EXPORT", "Export Registrations");
DEFINE("_ESESS_FIELD_METHOD", "Export Method");
DEFINE("_ESESS_FIELD_METHOD_CSV", "CSV");
DEFINE("_ESESS_FIELD_FILENAME", "Filename");
// Back-End :: Registrations :: Export -> Javascript Validation Errors
DEFINE("_ESESS_VAL_EXPORT_FILENAME", "Filename cannot be empty.");
DEFINE("_ESESS_EXPORT_MSG", "Unknown Export Method");

// Back-End :: Configuration
DEFINE("_ESESS_FORM_CONFIG", "Configuration");
DEFINE("_ESESS_FORM_CONFIG_CONFIRM", "Configure Confirmation Email");
DEFINE("_ESESS_FORM_CONFIG_NOTIFY", "Configure Notification Email");
DEFINE("_ESESS_FORM_CONFIG_CANCEL", "Configure Cancellation Email");
DEFINE("_ESESS_ACTION_REGISTER", "Registration");
DEFINE("_ESESS_ACTION_UPDATE", "Update");
DEFINE("_ESESS_ACTION_CANCEL", "Cancel");
DEFINE("_ESESS_BUTTON_OPTIONS","Options");
DEFINE("_ESESS_BUTTON_OPTIONS_IMG","images/config.png");
DEFINE("_ESESS_BUTTON_THANK","Thank you Display");
DEFINE("_ESESS_BUTTON_THANK_IMG","images/menu.png");
DEFINE("_ESESS_BUTTON_CONFIRM","Confirm Email");
DEFINE("_ESESS_BUTTON_CONFIRM_IMG","images/messaging.png");
DEFINE("_ESESS_BUTTON_NOTIFY","Notify Email");
DEFINE("_ESESS_BUTTON_NOTIFY_IMG","images/message_config.png");
DEFINE("_ESESS_BUTTON_CANCELLATION","Cancellation Email");
DEFINE("_ESESS_BUTTON_CANCELLATION_IMG","images/inbox.png");

// Admin :: Config :: Options
DEFINE("_ESESS_FORM_CONFIG_OPTIONS", "Configure Options");
DEFINE("_ESESS_TAB_CONFIG_GENERAL","General");
DEFINE("_ESESS_TITLE_INTEGRATION", "Integration with other Components");
DEFINE("_ESESS_FIELD_INTEGRATE", "Integrate with <b>JEvents</b> Component");
DEFINE("_ESESS_FIELD_INTEGRATE_DESC", "Allows a session to be associated with an event from the <i>JEvents</i> component.<br><b>Note:  Click the &quot;Apply&quot; button after changing this value</b>.");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT", "Show Event Subject");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY", "Show Event Activity");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_LOCATION", "Show Event Location");
DEFINE("_ESESS_FIELD_SHOW_LOCATION_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_CONTACT", "Show Event Contact");
DEFINE("_ESESS_FIELD_SHOW_CONTACT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_EXTRA", "Show Event Extras");
DEFINE("_ESESS_FIELD_SHOW_EXTRA_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_TIME", "Show Event Times");
DEFINE("_ESESS_FIELD_SHOW_TIME_DESC", "");
DEFINE("_ESESS_FIELD_CBINTEGRATED","Integrate with <b>Community Builder</b> Component");
DEFINE("_ESESS_FIELD_CBINTEGRATED_DESC","Default values for each registration field can be generated using the information stored in a user\'s Community Builder profile (see \'Fields\' tab).<br><b>Note:  Click the &quot;Apply&quot; button after changing this value</b>.");
DEFINE("_ESESS_FIELD_SHOWAVATAR", "Show Avatar");
DEFINE("_ESESS_FIELD_SHOWAVATAR_DESC", "");
DEFINE("_ESESS_TITLE_REGISTRATIONCONTROL", "Registration Control");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW", "Allow Registrations from");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW_DESC", "");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL", "Allow Individual Registrations Only");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL_DESC", "");
DEFINE("_ESESS_FIELD_FULL_PROC", "Allow Full processing");
DEFINE("_ESESS_FIELD_FULL_PROC_DESC", "");
DEFINE("_ESESS_FIELD_REG_CANCEL", "Allow registered user cancellation");
DEFINE("_ESESS_FIELD_REG_CANCEL_DESC", "");
DEFINE("_ESESS_TITLE_DATETIME", "Date and Time Formatting");
DEFINE("_ESESS_FIELD_DATE_SHORT", "Date Format (short)");
DEFINE("_ESESS_FIELD_DATE_SHORT_DESC", "");
DEFINE("_ESESS_FIELD_DATE_LONG", "Date Format (long)");
DEFINE("_ESESS_FIELD_DATE_LONG_DESC", "");
DEFINE("_ESESS_FIELD_TIME", "Time Format");
DEFINE("_ESESS_FIELD_TIME_DESC", "");
DEFINE("_ESESS_FIELD_TIME1", "24 Hour, Leading Zero");
DEFINE("_ESESS_FIELD_TIME2", "24 Hour, Leading Space");
DEFINE("_ESESS_FIELD_TIME3", "12 Hour, Leading Zero");
DEFINE("_ESESS_FIELD_TIME4", "12 Hour, Leading Space");
DEFINE("_ESESS_TITLE_FRONTENDCONTROL", "Front-End Control");
DEFINE("_ESESS_FIELD_LIST_START", "Starting Listing Sessions");
DEFINE("_ESESS_FIELD_LIST_START_DESC", "");
DEFINE("_ESESS_FIELD_LIST_STOP", "Stop Listing Sessions");
DEFINE("_ESESS_FIELD_LIST_STOP_DESC", "");
DEFINE("_ESESS_FIELD_LIST_CASE0","Immediately");
DEFINE("_ESESS_FIELD_LIST_CASE1","When Registration Begins");
DEFINE("_ESESS_FIELD_LIST_CASE2","When Registration Ends");
DEFINE("_ESESS_FIELD_LIST_CASE3","When Session Begins");
DEFINE("_ESESS_FIELD_LIST_CASE4","When Session Ends");
DEFINE("_ESESS_FIELD_LIST_FULL", "List Sessions that are Full");
DEFINE("_ESESS_FIELD_LIST_FULL_DESC", "");
DEFINE("_ESESS_FIELD_LIST_EVERYONE", "List Sessions Regardless of Availability");
DEFINE("_ESESS_FIELD_LIST_EVERYONE_DESC", "");
DEFINE("_ESESS_FIELD_USER_NUM", "Show user number registrations");
DEFINE("_ESESS_FIELD_USER_NUM_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER", "Display Footer in Front-End");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP", "Display Link to Google Maps");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED", "Display List of 'Already Registered' Users");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_VENUE", "Display Venue in Listing");
DEFINE("_ESESS_FIELD_DISPLAY_VENUE_DESC", "");
DEFINE("_ESESS_TAB_CONFIG_FIELDS","Fields");
// Back-End :: Configuration :: Options -> Javascript Validation Errors
DEFINE("_ESESS_VAL_SESS_TITLE", "Title cannot be empty.");
DEFINE("_ESESS_VAL_REGISTRATION_UP_DATE", "Registration Start Date cannot be empty.");
DEFINE("_ESESS_VAL_REGISTRATION_DOWN_DATE", "Registration End Date cannot be empty.");
DEFINE("_ESESS_VAL_SESSION_UP_DATE", "Session Start Date cannot be empty.");
DEFINE("_ESESS_VAL_SESS_MAX", "Max # Registrations must be a whole number >=0.");
DEFINE("_ESESS_VAL_SESS_MAXMIN", "Max # Registrations cannot be less than Min # Registrations");


// Admin :: Configuration :: Thank-You HTML
DEFINE("_ESESS_FORM_CONFIG_THANK", "Configure Thankyou Message");
DEFINE("_ESESS_FIELD_THANKYOU", "Registration Thank you Screen");
DEFINE("_ESESS_FIELD_THANKYOU_DESC", "");
DEFINE("_ESESS_DEFAULT_THANKYOU", "<h1>Thankyou {fullname}!</h1><p>You have been registered for {title}<p /><p>If we need to contact you further reguarding this registration we will do so on {email}</p><p>You can view the details of this Session <a href=\"{url}\">here</a>.</p><p>{data}<br /></p>");

// Back-End :: Configuration :: Confirmation Email
DEFINE("_ESESS_FIELD_CONFIRM_SEND", "Send Confirmation Email");
DEFINE("_ESESS_FIELD_CONFIRM_SEND_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL", "Confirmation Email Address(s)");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT", "Confirmation Email Subject");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_MSG", "Confirmation Email Message");
DEFINE("_ESESS_FIELD_CONFIRM_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_CONFIRM_SUBJECT", "{title} {action}");
DEFINE("_ESESS_DEFAULT_CONFIRM_MESSAGE", "<p>Dear {fullname}</p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">You have been registered for {title}!</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">If we need to contact you further reguarding this registration we will do so on {email}</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">You can view the details of this Session <a href=\"{url}\">here</a></span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">{data}<br /></span></p>");

// Back-End :: Configuration :: Confirmation Email -> Replacement tag notes
DEFINE("_ESESS_REPLACE_TAGS", "&lt;em&gt;Replacment Tags&lt;/em&gt;&lt;br /&gt;\nCopy and paste these into fields for replacement.");
DEFINE("_ESESS_REPLACE_NAME", "The Users Full Name");
DEFINE("_ESESS_REPLACE_EMAIL", "The Users Email address");
DEFINE("_ESESS_REPLACE_URL", "The URL to display Session info");
DEFINE("_ESESS_REPLACE_TITLE", "The Session Title");
DEFINE("_ESESS_REPLACE_ACTION", "The Registration Action (Register, Update, Cancel)");
DEFINE("_ESESS_REPLACE_DATA", "Table containing the data entered");


// Back-End :: Configuration :: Notification Email
DEFINE("_ESESS_FIELD_NOTIFY_SEND", "Send Notification Email");
DEFINE("_ESESS_FIELD_NOTIFY_SEND_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT", "Notification Email Subject");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_MSG", "Notification Email Message");
DEFINE("_ESESS_FIELD_NOTIFY_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_NOTIFY_SUBJECT", "New {title} {action}"); 
DEFINE("_ESESS_DEFAULT_NOTIFY_MESSAGE", "<p>{fullname} {email} has registered for {title}</p><p>{data} </p>"); 

// Back-End :: Configuration :: Cancel Page
DEFINE("_ESESS_DEFAULT_CANCEL_TITLE", "Registration Cancelled");
DEFINE("_ESESS_DEFAULT_CANCEL_TEXT", "{fullname}, your registration has been cancelled for {title}<br />Click <a href=\"{url}\">here</a> to return to the Session.");




// Back-End :: About
DEFINE("_ESESS_TOOLBAR_UNINSTALL", "Uninstall");
DEFINE("_ESESS_TOOLBAR_SAVESETTINGS", "Settings");
DEFINE("_ESESS_TOOLBAR_UPDATE", "Update");
DEFINE("_ESESS_UNINSTALL_CONFIRM", "Are you sure you want to remove all Attend Events related database information?");
DEFINE("_ESESS_UNINSTALL_MESSAGE", "All Attend Events data was removed successfully!  You can now uninstall the component.");
DEFINE("_ESESS_UPDATE_CONFIRM", "Have you backed-up your Joomla database?");




// General -> Session Status
DEFINE("_ESESS_STATUS_NEW", "New");
DEFINE("_ESESS_STATUS_OPEN", "Open");
DEFINE("_ESESS_STATUS_FULL", "Full");
DEFINE("_ESESS_STATUS_CLOSED", "Closed");

// General -> Session Availability
DEFINE("_ESESS_AVAIL_EVERY", "Everyone");
DEFINE("_ESESS_AVAIL_REG", "Registered Users Only");
DEFINE("_ESESS_AVAIL_GUEST", "Guests Only");
DEFINE("_ESESS_AVAIL_GLOBAL", "Global");
DEFINE("_ESESS_AVAIL_GLOBAL2", "Use Global");

// General -> Custom Toolbar Icons
DEFINE("_ESESS_TOOLBAR_VIEW", "View");
DEFINE("_ESESS_TOOLBAR_EXPORT", "Export");
DEFINE("_ESESS_TOOLBAR_EXPORTALL", "Export All");
DEFINE("_ESESS_TOOLBAR_EMAIL", "Email");

// General -> File I/O errors
DEFINE("_ESESS_CONFIG_ERR", "Config file is not writable!");
DEFINE("_ESESS_CONFIG_ERR_OPEN", "Unable to open Configuration file for writing");
DEFINE("_ESESS_CONFIG_ERR_WRITE", "Unable to write to Configuration file");
DEFINE("_ESESS_CONFIG_SAVE", "Configuration Saved successfully!");

// General -> Images used for sorting
DEFINE("_ESESS_ARROW_UP", "images/uparrow-1.png");
DEFINE("_ESESS_ARROW_DOWN", "images/downarrow-1.png");
DEFINE("_ESESS_ARROW_UNSET", "images/uparrow.png");

// General -> Javascript Validation
DEFINE("_ESESS_VAL_ERROR", "Validation Errors:");

// General -> Dynamic Fields
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD","New Field");
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD_DESC","Click to create a new field.");
DEFINE("_ESESS_DYNAMICFIELDS_LOADTABLEERROR","An error occurred while loading the registration fields.");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDNAME","Field Name");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE","Field Type");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDPARAMETERS","Type Specific Parameters");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXT","Text");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXTAREA","Textarea");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_CHECKBOX","Checkbox");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_RADIO","Radio List");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_SELECT","Select List");
DEFINE("_ESESS_DYNAMICFIELDS_LAYOUT","Layout");
DEFINE("_ESESS_DYNAMICFIELDS_SIZE","Size");
DEFINE("_ESESS_DYNAMICFIELDS_ROWS","Rows");
DEFINE("_ESESS_DYNAMICFIELDS_COLS","Cols");
DEFINE("_ESESS_DYNAMICFIELDS_INPUTCONTROL","Input Control");
DEFINE("_ESESS_DYNAMICFIELDS_REQUIRED","Required");
DEFINE("_ESESS_DYNAMICFIELDS_MAXLENGTH","Maximum Length");
DEFINE("_ESESS_DYNAMICFIELDS_USERINTERFACE","User Interface");
DEFINE("_ESESS_DYNAMICFIELDS_DEFAULT","Default");
DEFINE("_ESESS_DYNAMICFIELDS_CBDEFAULT","Associated Community Builder Field");
DEFINE("_ESESS_DYNAMICFIELDS_TOOLTIP","Tooltip");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONS","Options");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONNAME","Option Name");
DEFINE("_ESESS_DYNAMICFIELDS_ADDOPTION","Add Option");
?>
