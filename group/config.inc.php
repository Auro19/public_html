<?php

//version
define('PHPR_VERSION', '5.2.2');  // installed version

//paths
define('PHPR_HOST_PATH', 'http://miguel.ladai.telecom.unam.mx/');  // absolute path to host, e.g. http://myhost/
define('PHPR_INSTALL_DIR', 'group/');  // installation directory below host, e.g. myInstallation/of/phprojekt5/

//database
define('PHPR_DB_TYPE', 'mysql');  // Type of database system
define('PHPR_DB_HOST', 'localhost');  // Location of the database
define('PHPR_DB_USER', 'miguel');  // Username for the access
define('PHPR_DB_PASS', 'm1g23l');  // Password for the access
define('PHPR_DB_NAME', 'grupo');  // Name of the database
define('PHPR_DB_PREFIX', 'phpr_');  // Prefix of tables

//system
define('PHPR_SESSION_NAME', 'PHPRA9D66');  // name of the PHProjekt session
define('PHPR_ACC_DEFAULT', '1');  // Default access mode: private=0, group=1
define('PHPR_ACC_WRITE_DEFAULT', '1');  // Default write access mode: private=0, group=1
define('PHPR_ALTER_ACC', '0');  // Access rights: 0 = only author can change it, 1 = all users with write access can change
define('PHPR_SESSION_TIME_LIMIT', '0');  // Time limit for sessions
define('PHPR_MAXHITS', '50');  // number of hits found in search form
define('PHPR_ERROR_REPORTING_LEVEL', '0');  // displays error messages
define('PHPR_SUPPORT_PDF', '1');  // activates pdf library
define('PHPR_SUPPORT_HTML', '1');  // activates html editor for textareas
define('PHPR_SUPPORT_CHART', '1');  // activates chart generation
define('PHPR_DOC_PATH', 'docs');  // path for files related to forms
define('PHPR_ATT_PATH', 'attach');  // path for mail attachments
define('PHPR_FILE_PATH', '/home/miguel/public_html/group/upload');  // path for uploads in filemanager
define('PHPR_FILTER_MAXHITS', '50');  // number of hits in selector
define('PHPR_ROLES', '1');  // activates role based access system
define('PHPR_DEFAULT_VISI', '0');  // default visibility of calendar events. 0: normal, 1: private, , 3: public
define('PHPR_ACCESS_GROUPS', '0');  // 0: current group only, 1: all groups the user is member of, 2: no restrictions = all groups
define('PHPR_COMPATIBILITY_MODE', '0');  // activates compatibility to V 4.x
define('PHPR_LOGS', '1');  // Logging
define('PHPR_HISTORY_LOG', '2');  // Log history of records
define('PHPR_ACC_ALL_GROUPS', '0');  // Option to release objects in all groups
define('PHPR_LOGIN_SHORT', '2');  // Login name - 0: last name, 1: short name, 2: login name
define('PHPR_LDAP', '0');  // use LDAP
define('PHPR_TIMEZONE', '0');  // Timezone difference [h] Server - user
define('PHPR_PW_CRYPT', '1');  // Encrypt passwords
define('PHPR_PW_CHANGE', '1');  // Password change

//modules
define('PHPR_VOTUM', '0');  // Voting system yes = 1, no = 0
define('PHPR_BOOKMARKS', '0');  // Bookmarks yes = 1, no = 0
define('PHPR_LINKS', '0');  // activates links module
define('PHPR_COSTS', '0');  // costs yes = 1, no = 0

//calendar
define('PHPR_CALENDAR', '1');  // Calendar
define('PHPR_CALENDAR_DATECONFLICTS_MAXDAYS', '10');  // Max number of days to search timeslots
define('PHPR_CALENDAR_DATECONFLICTS_MAXHITS', '10');  // Max number of hits to search timeslots
define('PHPR_CALENDAR_ACCESS_MODE', 'standard');  // Access modes for calendar events: standard, special-1
define('PHPR_GROUPVIEWUSERHEADER', '1');  // Header groupviews
define('PHPR_DAY_START', '8');  // First hour of the day:: 6,7,8,9
define('PHPR_DAY_END', '20');  // Last hour of the day:: 17,18,19,2

//reminder
define('PHPR_REMINDER', '1');  // Reminder
define('PHPR_REMIND_FREQ', '15');  // fequency of check for next events [min]

//projects
define('PHPR_PROJECTS', '2');  // Project management yes = 1, no = 0, additionally assign resources to events: = 2

//timecard
define('PHPR_TIMECARD', '2');  // Timecard, Mail to the chief: = 2
define('PHPR_TIMECARD_DELETE', '60');  //  allows users to change their timecard entries
define('PHPR_TIMECARD_ADD', '60');  // past days where it is possible to change entries

//contacts
define('PHPR_CONTACTS', '1');  // Address book  = 1, nein = 0
define('PHPR_CONTACTS_PROFILES', '1');  // Profiles for contacts
define('PHPR_CALLTYPE', 'calltype');  // defines type of cti telephone
define('PHPR_CONT_USRDEF1', 'Userdefined');  // Name of userdefined field 1
define('PHPR_CONT_USRDEF2', 'Userdefined');  // Name of userdefined field 2

//notes
define('PHPR_NOTES', '1');  // Notes

//todo
define('PHPR_TODO', '1');  // Todo-Lists yes = 1, no = 0
define('PHPR_TODO_OPTION_ACCEPTED', '0');  // Select-Option accepted available = 1, not available = 0

//mail
define('PHPR_SYSADMIN_EMAIL', '');  // System Administrator Mail Address
define('PHPR_QUICKMAIL', '1');  // Mail no = 0, only send = 1, send and receive = 2
define('PHPR_MAIL_SEND_ARG', '0');  // Adds '-f' as 5. parameter to mail(), see php manual
define('PHPR_MAIL_EOL', "\n");  // end of line in body; e.g. \r\n (conform to RFC 2821 / 2822)
define('PHPR_MAIL_EOH', "\n");  // end of header line; e.g. \r\n (conform to RFC 2821 / 2822)
define('PHPR_MAIL_MODE', '0');  // Sendmail mode: 0: use mail(); 1: use socket
define('PHPR_MAIL_AUTH', '0');  // Authentication - 0:No Authentication,1:with POP before SMTP,2:SMTP auth (via socket only!)
define('PHPR_SMTP_HOSTNAME', 'localhost');  // the real address of the SMTP mail server, you have access to (maybe localhost)
define('PHPR_LOCAL_HOSTNAME', 'hereiam');  // name of the local server to identify it while HELO procedure
define('PHPR_POP_ACCOUNT', 'itsme');  // real username for POP before SMTP
define('PHPR_POP_PASSWORD', 'mypw');  // password for this pop account
define('PHPR_POP_HOSTNAME', 'mypop.domain.net');  // the POP server
define('PHPR_SMTP_ACCOUNT', 'itsme');  // real username for SMTP auth
define('PHPR_SMTP_PASSWORD', 'mypw');  // password for this account
define('PHPR_FAXPATH', '');  // Path to sendfax

//file manager
define('PHPR_FILEMANAGER', '1');  // File management no = 0,  yes = 1
define('PHPR_FILEMANAGER_NOTIFY', '1');  // Enables mail notification on new elements
define('PHPR_DOWNLOAD_INLINE_OPTION', '0');  // Allow inline download of files
define('PHPR_FILE_VERSIONING', '1');  // Enables file versioning

//forum
define('PHPR_FORUM', '1');  // Forum yes = 1, no = 0
define('PHPR_FORUM_TREE_OPEN', '0');  // default mode for forum tree: 1 - open, 0 - closed
define('PHPR_FORUM_NOTIFY', '0');  // Enables mail notification on new elements

//helpdesk - rts
define('PHPR_RTS', '1');  // Help desk
define('PHPR_RTS_WORK', '0');  // 0 = without workflow functionality - 1 = with workflow functionality
define('PHPR_RTS_DUEDATE', '0');  // Helpdesk: Customer can set a due date
define('PHPR_RTS_CUST_ACC', '0');  // Helpdesk: Customer Authentication, 0: open to all, email-address is sufficient<br />1: registered contact enter his family name<br />2: his email
define('PHPR_RTS_MAIL', '');  // Email Address of the support
define('PHPR_SERVER_IP', '132.248.59.180');  // IP address of server where cronjob is activated

//chat
define('PHPR_CHAT', '1');  // activates chat module
define('PHPR_CHAT_ALIVE_FREQ', '30');  // Minutes to keep alive an user on chat from last comment
define('PHPR_CHAT_CONTENT_FREQ', '5');  // Seconds to refresh the chat log
define('PHPR_CHAT_LAST_HOURS', '24');  // Number of hours of log to be displayed on chat page

//layout
define('PHPR_DEFAULT_SIZE', '40');  // Default size of form elements
define('PHPR_CUR_SYMBOL', '');  // Currency symbol
define('PHPR_SKIN', 'default');  // Default skin
define('PHPR_BGCOLOR_MARK', '#E6DE90');  // Color to mark rows
define('PHPR_BGCOLOR_HILI', '#FFFFFF');  // Color to highlight rows
define('PHPR_LOGO', '');  // path to customized company logo (e.g. layout/default/img/logo.png)
define('PHPR_HP_URL', 'http://www.phprojekt.com');  // URL to the homepage of the company, no = leave empty
define('PHPR_TR_HOVER', '1');  // Highlight list records with 'mouseover'

?>
