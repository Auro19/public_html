<?php
// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/adminlanguage/admin.english.php $
// $Id: admin.english.php 959 2009-01-06 21:02:25Z mab $
/******************************************************************************\
**   JoomGallery  1.0                                                         **
**   By: JoomGallery::ProjectTeam                                             **
**   Copyright (C) 2008  M. Andreas Boettcher                                 **
**   Based on: PonyGallery ML 2.5.1 by PonyGallery-ML-Team                    **
**   Released under GNU GPL Public License                                    **
**   License: http://www.gnu.org/copyleft/gpl.html or have a look             **
**   at administrator/components/com_joomgallery/LICENSE.TXT                  **
\******************************************************************************/

#### Original Copyright ########################################################
## PonyGallery ML 2.5.1                                                       ##
## By: M. Andreas Boettcher & Benjamin Malte Meier                            ##
## & Andreas Hartmann & The ML-Team                                           ##
## Copyright (C) 2007 M. Andreas Boettcher, All rights reserved.              ##
## Released under GNU GPL Public License                                      ##
################################################################################


/*     English language for the Backend
**     By: tante.thekla
**     mailto:uk@ukm-edv-service.de
**     last modified on 11/28/2008
**
*/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//administrator/components/com_joomgallery/adminclasses/admin.migrate2j.class.php
DEFINE('_JGA_PONYGALLERY','PonyGallery ML ');
DEFINE('_JGA_PICTURES_DIRECTORY','Images Directory');
DEFINE('_JGA_ORIGINALS_DIRECTORY','Original Images Directory');
DEFINE('_JGA_THUMBNAILS_DIRECTORY','Thumbnails Directory');
DEFINE('_JGA_JOOMGALLERY','JoomGallery');
DEFINE('_JGA_SITESTATUS','Status of the site');
DEFINE('_JGA_SITE_OFFLINE','Site offline?');
DEFINE('_JGA_CHECK_DIRECTORIES','Existence of Directories');
DEFINE('_JGA_CHECK_DATABASETABLES','Existence and Integrity of Databasetables');
DEFINE('_JGA_EMPTY','empty');
DEFINE('_JGA_ROWS','row(s)');
DEFINE('_JGA_MIGRATION_FALSE','Migration is not possible.'); 
DEFINE('_JGA_MIGRATION_FALSE_LONG','Some errors were detected while testing the ability to migrate. Please check all red entries in the table above. Fix the mentioned errors, and open this page again afterwards. Migration can only be started when ALL lines above are checked green.'); 
DEFINE('_JGA_MIGRATION_TRUE','Migration is ready to start.');
DEFINE('_JGA_MIGRATION_TRUE_LONG','No errors were detected while testing your ability to migrate. Nevertheless, BEFORE starting a migration, you should back up your <b>Joomla files and database</b>. As soon as you have finished the backup, click the button to start migration. Please wait until migration is finished, before continueing working on the site.');
DEFINE('_JGA_MIGRATION_MANAGER','Migration-Manager');
DEFINE('_JGA_MIGRATE_PONYGALLERY','Migrate PonyGallery ML to JoomGallery');
DEFINE('_JGA_MIGRATION_CHECK','Results of the migration check');
DEFINE('_JGA_MIGRATION_ORPHANPICS','Orphans (Pictures without valid user): ');

//administrator/components/com_joomgallery/adminclasses/admin.upload.class.php
DEFINE('_JGA_FILES_IN_BATCH','Files found in batch');
DEFINE('_JGA_FILENAME','Filename');
DEFINE('_JGA_NEW_FILENAME','New Filename');
DEFINE('_JGA_UPLOAD_START','Upload started...');
DEFINE('_JGA_PROBLEM_COPYING','Problem copying file to: ');
DEFINE('_JGA_CHECK_PERMISSIONS','Check permissions.');
DEFINE('_JGA_UPLOAD_COMPLETE','Upload complete...');
DEFINE('_JGA_THUMBNAIL_CREATED','Thumbnail created...');
DEFINE('_JGA_RESIZED_TO_MAXWIDTH','Resize to maximum width complete...');
DEFINE('_JGA_ORIGINAL_DELETED','The picture has been deleted from the directory containing the original files.');
DEFINE('_JGA_PROBLEM_DELETING_ORIGINAL','The picture could not be deleted from the directory containing the original files.');
DEFINE('_JGA_COULD_NOT_DELETE_PICTURE','Could not delete the image file');
DEFINE('_JGA_WRONG_FILENAME','Filename bad, or unable to copy uploaded image to originals directory.');
DEFINE('_JGA_ALERT_YOU_MUST_SELECT_CATEGORY','You must select a category.');//ALERT
DEFINE('_JGA_UPLOAD_SUCCESSFULL','Upload successfull!');
DEFINE('_JGA_ERROR_PHP_MAXFILESIZE','The size of the file is larger than the \'upload_max_filesize \' limit set up in php.ini!');
DEFINE('_JGA_ERROR_HTML_MAXFILESIZE','The size of the file is larger than MAX_FILE_SIZE in the HTML form!');
DEFINE('_JGA_ERROR_FILE_PARTLY_UPLOADED','The file has been uploaded only partly!');
DEFINE('_JGA_ERROR_FILE_NOT_UPLOADED','No file has been uploaded!');
DEFINE('_JGA_ERROR_TEMP_MISSING','The temporary directory is missing!');
DEFINE('_JGA_ERROR_WRITING','Write error!');
DEFINE('_JGA_ERROR_EXTENSION','File upload has been stopped by an extension!!');
DEFINE('_JGA_ERROR_CODE','Error-Code: ');
DEFINE('_JGA_ERROR_UNKNOWN','Unknown Error!');

//administrator/components/com_joomgallery/includes/html/admin.categories.html.php
DEFINE('_JGA_CATEGORY_MANAGER','Category Manager');
DEFINE('_JGA_DISPLAY','Display');
DEFINE('_JGA_SEARCH','Search');
DEFINE('_JGA_SORT_BY_ORDER','Sort by order');
DEFINE('_JGA_SORT_BY_TYPE','Filter by ztpe');
DEFINE('_JGA_CATEGORY','Category');
DEFINE('_JGA_PARENT_CATEGORY','Parent Category');
DEFINE('_JGA_PUBLISHED','Published');
DEFINE('_JGA_OWNER','Owner');
DEFINE('_JGA_TYPE','Type');
DEFINE('_JGA_HIT','Access');
DEFINE('_JGA_REORDER','Reorder');
DEFINE('_JGA_SAVE_ORDER','Save Order');
DEFINE('_JGA_USER_UPLOAD','User Uploaded');
DEFINE('_JGA_ADMIN_UPLOAD','Admin Uploaded');
DEFINE('_JGA_UP','Up');
DEFINE('_JGA_DOWN','Down');
DEFINE('_JGA_ALERT_CATEGORY_MUST_HAVE_TITLE','Category must have a title');//ALERT
DEFINE('_JGA_ADD_CATEGORY','Add ');
DEFINE('_JGA_TITLE','Title');
DEFINE('_JGA_DESCRIPTION','Description');
DEFINE('_JGA_ORDERING','Ordering');
DEFINE('_JGA_EDIT_CATEGORY','Edit ');
DEFINE('_JGA_THUMBNAIL_ALIGN','Thumbnail Alignment');
DEFINE('_JGA_THUMBNAIL','Thumbnail');
DEFINE('_JGA_THUMBNAIL_PREVIEW','Thumbnail Preview');

//administrator/components/com_joomgallery/includes/html/admin.comments.html.php
DEFINE('_JGA_COMMENTS_MANAGER','Comments Manager');
DEFINE('_JGA_AUTHOR','Author');
DEFINE('_JGA_TEXT','Text');
DEFINE('_JGA_IP','IP');
DEFINE('_JGA_APPROVED','Approved');
DEFINE('_JGA_PICTURE','Picture');
DEFINE('_JGA_DATE','Date');

//administrator/components/com_joomgallery/includes/html/admin.configuration.html.php
DEFINE('_JGA_CONFIGURATION_MANAGER','Configuration Manager');
DEFINE('_JGA_GENERAL_BACKEND_SETTINGS','General Settings');
DEFINE('_JGA_PATH_DIRECTORIES','Paths and Directories');
DEFINE('_JGA_PATH_DIRECTORIES_INTRO','Here you can specify the paths where your pictures ought to be saved. Although paths generally can be chosen without any restriction they should remain in the gallery folder. Otherwise you risk access problems. It is indicated whether a folder is writable for the gallery resp. whether the files are present (green) or not (red). In addition you can specify the desired date and time format on this page.');
DEFINE('_JGA_CONFIGURATION_INTRO','The JoomGallery is using a configuration file in which all settings from the configuration manager are saved. You can find the file named joomgallery.config.php in the directory administrator/components/com_joomgallery. This file must be writable for the gallery. Regulary the file should have the <a href="http://en.wikipedia.org/wiki/File_system_permissions" target="_blank">File permissions</a> 766. In the following there will be shown a status message about the capability to write this file: ');//NEW
DEFINE('_JGA_PICTURES_PATH','Picture Path');
DEFINE('_JGA_PATH_PICTURES_STORED','Path to where pictures are saved. This is where downsized pictures are stored - provided that the automatic resizing is activated (see "Image Processing"). A copy of the original file will be saved if the automatic resizing is not activated. Images saved in this folder are used for display on the detail page.');
DEFINE('_JGA_ORIGINALS_PATH','Originals Picture Path: ');
DEFINE('_JGA_PATH_ORIGINALS_STORED','Path to where originals are saved. This is where the original files are stored without resizing. Images saved in this folder are used for popup display provided that the popup option has been chosen.');
DEFINE('_JGA_THUMBNAILS_PATH','Thumbnails Path');
DEFINE('_JGA_PATH_THUMBNAILS_STORED','Path to where thumbnails are saved. This is where the automatically generated thumbnails are stored. The thumbnails are displayed in the gallery overview, the category overview and the top list page. In addition the thumbnails are used to generate the Minis');
DEFINE('_JGA_FTPUPLOAD_PATH','FTP Upload Path');
DEFINE('_JGA_PATH_FOR_FTPUPLOAD','Path to the FTP upload folder. This folder is used for FTP uploads. Pictures that you choose to add to the gallery via FTP go into this folder.');
DEFINE('_JGA_TEMP_PATH','Temp Path');
DEFINE('_JGA_PATH_FOR_TEMP','Path to the Temp folder. This folder is used for temporary actions, for example extracting zip-Files.');
DEFINE('_JGA_WATERMARK_PATH','Watermark Path');
DEFINE('_JGA_PATH_WATERMARK_STORED','Path to where the watermark is saved. In this path/folder the image for generating the watermark is saved. You need to specify a path here even if you do not activate the watermark function.');
DEFINE('_JGA_WATERMARK_FILE','Watermark File');
DEFINE('_JGA_WATERMARK_FILE_LONG','Name of the watermark file. You can choose a name for the watermark file without restriction. The file format needs to be a transparent .png file though. Obviously the file needs to be stored in the specified path.');
DEFINE('_JGA_TIME','Date/Time Format');
DEFINE('_JGA_TIME_LONG','What date/time format do you want to use? This setting has an impact on all appearances of date and time throughout the gallery. In few cases the server settings might overwrite this setting.');
DEFINE('_JGA_BACKEND_REPLACEMENTS','Replacements');//NEW
DEFINE('_JGA_BACKEND_REPLACEMENTS_INTRO','The name of pictures and categories are arbitrary. In order to save the picture and category names on the server it is necessary to remove special characters. With the following options you chose how to replace the special characters. The replacements have to be composed of the standard characters A-Z or numeric characters 0-9. Underscores _ are also possible. The replacements are only concerned to the filenames and foldernames to be saved in the filesystem on the server. They have no influence on the names shown at the frontend! An avoidance of special characters is accomplished automatically in each case. If in the following option no corresponding replacement is chosen existing special characters will be cancelled without substitution.');//NEW
DEFINE('_JGA_FILENAME_WITHJS','Prevent special characters');
DEFINE('_JGA_FILENAME_WITHJS_LONG','If you chose &quot;Yes&quot; in the following option can be defined which special characters in which mode will be replaced. Especially country specific characters as &quot;&auml;&quot; or &quot;&eacute;&quot; thus are transferred easily into &quot;ae&quot; or &quot;e&quot.');//NEW CHANGED
DEFINE('_JGA_FILENAME_SEARCH','Special characters');
DEFINE('_JGA_FILENAME_SEARCH_LONG','Please fill in the special characters separated by | which should be replaced.');
DEFINE('_JGA_FILENAME_REPLACE','New characters');
DEFINE('_JGA_FILENAME_REPLACE_LONG','Please fill in the new characters separated by | which will be used to replace the special characters.');
DEFINE('_JGA_PICTURE_PROCESSING','Image Processing');
DEFINE('_JGA_PICTURE_CREATOR','Image Processor');
DEFINE('_JGA_NONE','None');
DEFINE('_JGA_GDLIB','GD Library');
DEFINE('_JGA_GD2LIB','GD2 Library');
DEFINE('_JGA_IMAGEMAGICK','ImageMagick');
DEFINE('_JGA_FAST_GD2_THUMBCREATION','Faster downsizing of pictures');
DEFINE('_JGA_FAST_GD2_THUMBCREATION_LONG','If image processor &quot;GD2 Library&quot; is chosen it is possible to define that for creation of thumbnails and optionally downsizing pictures an optimized function for the upload process shall be used. This function allows a much faster downsizing and therefore a shorter runtime of the upload script but is in need of four times bigger memory than the slower pendant. If there is only few memory available this option should not be chosen.');
DEFINE('_JGA_PATH_TO_IMAGEMAGICK','Path to ImageMagick');
DEFINE('_JGA_PICTURE_CREATOR_LONG','Choose the software for image processing. The software should already be installed on the server and is required for manipulating pictures such as resizing or adding a watermark to them. Most servers run a PHP version that already has the GD2 implemented. The GD version installed on your system is displayed in the line above this paragraph. If only the GD-Software is present you should always prefer GD2 because otherwise you will miss several manipulating functions. If ImageMagick is installed you should always prefer that software, because the results will be much more better.');
DEFINE('_JGA_RESIZING','Resizing');
DEFINE('_JGA_NO','No');
DEFINE('_JGA_YES','Yes');
DEFINE('_JGA_RESIZING_LONG','Do you want the pictures to be resized? If you enable the resizing all uploaded pictures will be resized to the maximum dimensions you have specified (one setting below this one). Those downsized pictures will be be used for display in the detail view. To prevent bursting the template it is good advice to enable this feature and to specify values that suit the template. If the feature remains disabled the pictures will be displayed in the size they have been uploaded. The resizing applies to the detail view only. The pictures used for the popup remain untouched and are displayed in their original upload size. If you want to affect the size of the popup you need to do that before you upload the pictures.');
DEFINE('_JGA_MAX_WIDTH','Max Width and Height');
DEFINE('_JGA_MAX_WIDTH_LONG','Maximum size of the pictures. This option works only if the resizing (one option above) is activated. The entered value (pixel) specifies the maximum dimensions of the picture and applies to both width and height. This means that the longest side will be taken to downsize the picture proportionally according to the entered value.');
DEFINE('_JGA_PICTURE_QUALITY','Quality');
DEFINE('_JGA_PICTURE_QUALITY_LONG','Quality of the picture after resizing. This option works only if the resizing (two options above) is activated. The entered value (percent) specifies the quality of the generated downsized pictures - in relation to the original picture. Mind that higher quality will require more server space.');
DEFINE('_JGA_THUMBNAILS_INTRO','Thumbnails are small copies of the picture. They are displayed as preview pictures on the category overview, the toplist pages and if desired on the gallery overview. All upload options of the front- and backend will automatically generate thumbnails. The settings you take here have an impact on all generated thumbnails.');
DEFINE('_JGA_DIRECTION_RESIZE','Thumbnail Conversion');
DEFINE('_JGA_SAMEHIGHT','by height');
DEFINE('_JGA_SAMEWIDTH','by width');
DEFINE('_JGA_DIRECTION_RESIZE_LONG','The purpose of the thumbnail conversion is to display all thumbs in either the same width or height without reference to the original picture format (portrait or landscape). Choosing "by height" for example will generate thumbs of the same height provided that the width is adequate. Entering equal values in the two options below in order to generate thumbnails with untouched aspect ratio will void the value entered here.');
DEFINE('_JGA_THUMBNAIL_WIDTH','Thumbnail Width');
DEFINE('_JGA_THUMBNAIL_WIDTH_LONG','Width of thumbnails. This is the maximum width if conversion is made by height.');
DEFINE('_JGA_THUMBNAIL_HEIGHT','Thumbnail Height');
DEFINE('_JGA_THUMBNAIL_HEIGHT_LONG','Height of thumbnails. This is the maximum height if conversion is made by width.');
DEFINE('_JGA_THUMBNAIL_QUALITY','Thumbnail Quality');
DEFINE('_JGA_THUMBNAIL_QUALITY_LONG','Quality of the generated thumbnails. The entered value (percent) specifies the quality of the generated thumbnails - in relation to the original picture. Mind that higher quality will require more server space.');
DEFINE('_JGA_BACKEND_UPLOAD','Backend-Upload');
DEFINE('_JGA_UPLOAD_ORDER','Ordering Numbers');
DEFINE('_JGA_NO_ORDER','none');
DEFINE('_JGA_DESCENDING','descending');
DEFINE('_JGA_ASCENDING','ascending');
DEFINE('_JGA_UPLOAD_ORDER_LONG','Do you want to assign ordering numbers to the pictures automatically? Which ordering sequence do you prefer? Ordering numbers are an important tool to control the arrangement of pictures in the frontend. Ordering numbers are stored in the data base and can be edited in the picture manager later on. Automatically assigning ordering numbers while uploading will make the arrangement of the picture in the frontend and the administrative management in the backend easier. Generally you should choose an ascending order. (This setting also applies to the frontend user upload.');
DEFINE('_JGA_ORIGINAL_FILENAME','Original Filename');
DEFINE('_JGA_ORIGINAL_FILENAME_LONG','Use original filename as picture title?');
DEFINE('_JGA_FILENAMENUMBER','Numbering');
DEFINE('_JGA_FILENAMENUMBER_LONG','Should the uploaded pictures be numbered consecutively?');
DEFINE('_JGA_DELETE_ORIGINAL','Delete original pictures after upload?');
DEFINE('_JGA_DELETE_ALL_ORIGINALS','Delete all original pictures');
DEFINE('_JGA_DELETE_ORIGINAL_CHECKBOX','Dialog box');
DEFINE('_JGA_DELETE_ORIGINAL_LONG','This option enables you to delete the original picture from the corresponding folder right after the upload. This is an interesting feature in case you have little server space and you do not depend on the popup function (popups are no longer displayed after the original file is deleted). If you choose the dialog box you will be asked every time you upload pictures in the backend whether or not to delete the original pictures.');
DEFINE('_JGA_WRONG_VALUE_COLOR','Background color for wrong entries');
DEFINE('_JGA_WRONG_VALUE_COLOR_LONG','The background of input boxes in the upload section containing a wrong or insufficient entry will be colored in the HEX value or color name you specify here.<br />Please leave the field empty if you do not want to change the color.');
DEFINE('_JGA_MORE_FUNCTIONS','Additional functions');//NEW
DEFINE('_JGA_COMBUILDER_SETTING_CB','Community Builder (and CBE up to v1)'); //NEW
DEFINE('_JGA_COMBUILDER_SETTING_CBE','Community Builder Enhanced'); //NEW
DEFINE('_JGA_COMBUILDER_SETTING_JOMSOCIAL','JomSocial'); //NEW
DEFINE('_JGA_COMBUILDER_SUPPORT','User Profiles Support'); // CHANGED
DEFINE('_JGA_COMBUILDER_SUPPORT_LONG','In case you have installed and activated <a href="http://www.joomlapolis.com/">Community Builder</a>, <a href="http://www.kolloczek.com">Community Builder Enhanced</a> or <a href="http://www.jomsocial.com/">JomSocial</a> you can state here whether users (e.g. authors of pictures or comments) should be linked to their profile. If you do not have CB / CBE installed set the option to &quot;No&quot;. Pick the third option for the <a href="http://www.joomla-cbe.de/">&quot;new&quot; CBE</a> (link and folder com_cbe).'); // new (changed)
DEFINE('_JGA_USERNAME_REALNAME','Real name instead of Username?'); //NEW
DEFINE('_JGA_USERNAME_REALNAME_LONG','Should the real name instead of the username be displayed in the gallery (e.g. authors of pictures or comments)?'); //NEW
DEFINE('_JGA_BRIDGE_SETTINGS','Bridges');
DEFINE('_JGA_BRIDGE_INSTALLED','Bridge installed?');
DEFINE('_JGA_BRIDGE_INSTALLED_LONG','Do you want to integrate a bridge? A bridge is an interface between the gallery and other joomla components or third party programmes. The opportunity to use individual bridges is fitted directly into the code of the gallery.  That way all environment variables of joomla and the gallery are made available. In case you do not use a bridge at the moment please enter &quot;No&quot; .');//NEW
DEFINE('_JGA_COOLIRIS_SUPPORT','Cooliris Support');//NEW
DEFINE('_JGA_COOLIRIS_SUPPORT_LONG','With the plug-in &quot;Cooliris&quot; (formerly PicLens) installed in the browser the pictures of a category can be displayed in a full screen gallery. Further information you will find <a href="http://www.cooliris.com/">here</a>. If the function is set to &quot;yes&quot; a small symbol is shown at the lower left of the thumbnail when moving the cursor over it. A click on it opens the Cooliris Gallery. At page by page design in the JoomGallery in the Cooliris Gallery the pictures will be loaded page after page dynamically by moving sidewards. Cooliris does not work with activated Lightbox in category view.');//NEW
DEFINE('_JGA_COOLIRIS_LINK','Link to start Cooliris');//NEW
DEFINE('_JGA_COOLIRIS_LINK_LONG','Should a link to the cooliris gallery be shown in category view? You can alter the thext by modifying the language constant _JGS_COOLIRISLINK_TEXT.');//NEW
DEFINE('_JGA_USER_RIGHTS','User Access Rights');
DEFINE('_JGA_USER_UPLOAD_SETTINGS','User Upload');
DEFINE('_JGA_ALLOWED_USERSPACE','Allow Userspace');
DEFINE('_JGA_ALLOWED_USERSPACE_LONG','Please select whether a user is allowed to upload images or create categories.<br /><b>If not, the following options and the settings in <i>Frontend Settings &raquo; User Panel</i> are ignored.</b>');
DEFINE('_JGA_APPROVAL_NEEDED','Admin Approval needed');
DEFINE('_JGA_APPROVAL_NEEDED_LONG','Pictures uploaded by users need to be approved by the administrator before they are displayed in the frontend (Yes). Otherwise they will be approved automatically and published to the frontend right away (No). ');
DEFINE('_JGA_ALLOWED_CAT','Allowed Category');
DEFINE('_JGA_ALLOWED_CAT_LONG','Choose from the list of categories to which one(s) users can upload pictures via &quot;My Gallery&quot; . Only these categories are displayed in the users upload selections. If nothing is selected here the frontend upload is disabled!');
DEFINE('_JGA_ALLOWED_USERCAT','Usercategories: ');
DEFINE('_JGA_ALLOWED_USERCAT_LONG','Select whether users can create their own categories'); 
DEFINE('_JGA_ALLOWED_USERCATPARENT','Allowed for usercategories: ');
DEFINE('_JGA_ALLOWED_USERCATPARENT_LONG','Choose the categories in which the user can create own categories ');
DEFINE('_JGA_USERCATACC','Allow users to change the acces level');
DEFINE('_JGA_USERCATACC_LONG','Choose if users are allowed to change the access level of the own categories. The user must not change the access level below the level setted in backend. at maximum the level can be set to the user access level. Adminstrators are free to change the level.');
DEFINE('_JGA_USERCATSOWNUPLOAD','Upload images only on own categories:');//NEW
DEFINE('_JGA_USERCATSOWNUPLOAD_LONG','If set to yes the user can upload only images to own created categories and to categories marked in backend for user upload but not in categories created by other users.');//NEW
DEFINE('_JGA_MAX_ALLOWED_USERCATS','max. Usercategories: ');
DEFINE('_JGA_MAX_ALLOWED_USERCATS_LONG','How many categories is each user allowed to create?'); 
DEFINE('_JGA_MAX_ALLOWED_PICS','Max number of images');
DEFINE('_JGA_MAX_ALLOWED_PICS_LONG','Frontend users can upload pictures up to the maximum number specified here. Once the maximum number is reached the user will be notified and the upload will be cancelled.');
DEFINE('_JGA_MAX_ALLOWED_FILESIZE','Max file size of images');
DEFINE('_JGA_MAX_ALLOWED_FILESIZE_LONG','Maximum file size in bytes permitted for frontend uploads. This setting apllies to frontend only and has no impact on backend uploads!');
DEFINE('_JGA_MAX_UPLOAD_FIELDS','Number of upload fields');
DEFINE('_JGA_MAX_UPLOAD_FIELDS_LONG','Specifies the number of upload fields the user will get to see.');
DEFINE('_JGA_USERUPLOAD_NUMBERING','Numbering');
DEFINE('_JGA_USERUPLOAD_NUMBERING_LONG','Do you want consecutive numbers applied to the picture titles while uploading? This is of particular importance in case SEF components are in use that require unique titles.');
DEFINE('_JGA_ALLOW_SPECIAL_GIF_UPLOAD','Permit upload of special pictures');
DEFINE('_JGA_ALLOW_SPECIAL_GIF_UPLOAD_LONG','Animated and transparent .gif and .png files can not be processed without loss by the integrated image processing software. With this option you permit users to upload animated and transparent images. They do not get downsized even when the resizing feature is turned on and are displayed in their full original size in detail view. A selection box with additional explanation is displayed to the user. ');
DEFINE('_JGA_DELETE_ORIGINAL_USER_LONG','This option enables the users to delete the original picture from the corresponding folder right after the upload. This is an interesting feature in case you have little server space and you do not depend on the popup function (popups are no longer displayed after the original file is deleted). If you choose the &quot;dialog box&quot; the user will be asked every time whether or not to delete the original pictures.');
DEFINE('_JGA_SHOW_COPYRIGHT','Display copyright notice?');
DEFINE('_JGA_SHOW_COPYRIGHT_LONG','Do you want to display a copyright notice in the upload form that informs the user on the fact that uploaded pictures need to be free of third party rights? The wording can be customised by editing the frontend constant _JGS_NEW_PICTURE_COPYRIGHT .<br /><b>NOTE!! The copyright text deposited under the aforementioned constant is only meant as sample. It does not lay a claim on legal security. In each individual case a legal advice should be consulted for the formulation of the text!<br /></b>');
DEFINE('_JGA_SHOW_UPLOADNOTE','Display upload quota?');
DEFINE('_JGA_SHOW_UPLOADNOTE_LONG','Do you want to display a notice that informs the user on the maximum size and the maximum number of uploaded pictures?');
DEFINE('_JGA_RATE_SETTINGS','Ratings');
DEFINE('_JGA_ALLOW_RATING','Allow Rating');
DEFINE('_JGA_ALLOW_RATING_LONG','This option displays a rating field in the detail view of the gallery and allows users to rate pictures. The range can be specified in the following setting. ');
DEFINE('_JGA_HIGHEST_RATING','Highest Rating');
DEFINE('_JGA_HIGHEST_RATING_LONG','If user ratings are activated (setting above) you can specify the range of numbers here. The value you enter is the highest possible value permitted. ');
DEFINE('_JGA_ALLOW_RATING_ONLY_REGUSER','Rating permitted for registered users only');
DEFINE('_JGA_ALLOW_RATING_ONLY_REGUSER_LONG','Should ratings be permitted for registered users only? By choosing this option only registered users will be alloud to vote for pictures. In addition this option will automtically prevent users from voting more than once for one picture.');
DEFINE('_JGA_COMMENT_SETTINGS','Comments');
DEFINE('_JGA_ALLOW_COMMENTS','Allow Comments');
DEFINE('_JGA_ALLOW_COMMENTS_LONG','This option displays a comment field in the detail view and permitts registered users to write comments. Existing comments are also displayed with this option. ');
DEFINE('_JGA_ALLOW_ANONYM_COMMENTS','Anonymous Comments');
DEFINE('_JGA_ALLOW_ANONYM_COMMENTS_LONG','With this option you permit unregistered users to leave comments. These comments will be marked as guest comments. ');
DEFINE('_JGA_NAMED_ANONYM_COMMENTS','Anonymous comments with names');
DEFINE('_JGA_NAMED_ANONYM_COMMENTS_LONG','Anonymous comments are usually marked as guest comment. With this option name field is supplied that allows guests to leave their name.');
DEFINE('_JGA_COMMENTS_APPROVE_NEEDED','Admin Approval Needed');
DEFINE('_JGA_ONLY_UNREGUSERS','only unregistered users');
DEFINE('_JGA_REG_AND_UNREGUSERS','also registered users');
DEFINE('_JGA_COMMENTS_APPROVE_NEEDED_LONG','Usually comments are published right away. With this option you can force that comments need to be approved by the admin before they are published (in this case the admin will a receive an email via the backend private messaging). If you choose Yes here, for what user group should the restriction be valid?');
DEFINE('_JGA_CAPTCHA_COMMENTS','Avoid Spam in Comments:');
DEFINE('_JGA_CAPTCHA_COMMENTS_LONG','Especially comment fields are often misused to enter spam. Since this is very often done by machines you can protect yourself by using a graphic file displaying a code (combination of letters and numbers) that can not be read by machines. Do you want to display such a file underneath the comment field and request users to enter the code? What user group should this apply to? ');
DEFINE('_JGA_ALLOW_COMMENTS_BBCODE','Allow BBCode');
DEFINE('_JGA_ALLOW_COMMENTS_BBCODE_LONG','Allow the use of simple BBCode in comments.');
DEFINE('_JGA_ALLOW_COMMENTS_SMILIES','Allow Smilies');
DEFINE('_JGA_ALLOW_COMMENTS_SMILIES_LONG','Allow the use of Smilies in comments.');
DEFINE('_JGA_ALLOW_COMMENTS_ANISMILIES','Animated Smilies');
DEFINE('_JGA_ALLOW_COMMENTS_ANISMILIES_LONG','Enables the use of animated smilies in comments in case smilies are enabled in general.');
DEFINE('_JGA_SMILIES_COLOR','Color scheme for Smilies');
DEFINE('_JGA_GREY','grey');
DEFINE('_JGA_ORANGE','orange');
DEFINE('_JGA_YELLOW','yellow');
DEFINE('_JGA_BLUE','blue');
DEFINE('_JGA_SMILIES_COLOR_LONG','What basic color should be applied to the Smilies?');
DEFINE('_JGA_FRONTEND_SETTINGS','Frontend Settings');
DEFINE('_JGA_PICORDER','Picture ordering');
DEFINE('_JGA_PICORDER_INTRO','The settings you take here will directly influence the ordering of the pictures on the frontend. There are three criteria by which your pictures can be sorted. The ordering number, the upload date, and the title of the picture. These criteria can be chosen in descending or ascending order. The priorities are processed successively.');
DEFINE('_JGA_PICORDER_FIRST','Ordering by first priority');
DEFINE('_JGA_ORDERBY_ORDERING_ASC','ascending by ordering number');
DEFINE('_JGA_ORDERBY_ORDERING_DESC','descending by ordering number');
DEFINE('_JGA_ORDERBY_UPLOADTIME_ASC','ascending by upload date');
DEFINE('_JGA_ORDERBY_UPLOADTIME_DESC','descending by upload date');
DEFINE('_JGA_ORDERBY_PICTITLE_ASC','ascending by image title');
DEFINE('_JGA_ORDERBY_PICTITLE_DESC','descending by image title');
DEFINE('_JGA_PICORDER_FIRST_LONG','By which criterion and by which sorting should the pictures be ordered in highest priority?');
DEFINE('_JGA_PICORDER_SECOND','Ordering by second priority');
DEFINE('_JGA_PICORDER_NO','');
DEFINE('_JGA_PICORDER_SECOND_LONG','By which criterion and by which sorting should the pictures be ordered in second priority?');
DEFINE('_JGA_PICORDER_THIRD','Ordering by third priority');
DEFINE('_JGA_PICORDER_THIRD_LONG','By which criterion and by which sorting should the pictures be ordered in third priority?');
DEFINE('_JGA_PAGETITLE_SETTINGS','Page Title');
DEFINE('_JGA_PAGETITLE_SETTINGS_INTRO','The page title is important for the following reasons: the page title is displayed in the headline of the web browser and on tabs. In addition the web browser uses it for bookmarks and for the history function. Besides that search engines consider the page title an important information and it is often displayed as a clickable link in listings. In the default setting the page title is &quot;Gallery&quot;. This can be changed in the constant _JGS_GALLERY in the frontend language file. In the following settings you can add more options to the page title, the category view and the detail view.');
DEFINE('_JGA_PAGETITLE_CATVIEW','Page Title Category View');
DEFINE('_JGA_PAGETITLE_CATVIEW_LONG','With this option you can manipulate the browser display of the category overviews page title. If you use <b>#cat</b> as placeholder in the input field you add the category name to the page title. Allowed are additional descriptions such as "<i>category:</i>".<br /><b>Attention:</b> For a multi-language display you can also make use of the variables from the frontend language files. "<i>[! _JGS_CATEGORY !]</i>" for instance will insert the language definition "<i>category</i>" from the gallery language file. Neither <b>HTML</b> nor <b>PHP</b> are permitted here!');
DEFINE('_JGA_PAGETITLE_DETAILVIEW','Page Title Detail View');
DEFINE('_JGA_PAGETITLE_DETAILVIEW_LONG','Formatting just like category view above except that the additional placeholder <b>#img</b> for image title is available. Inserting &quot;#cat - #img&quot; in the input field and provided that the category has the name &quot;vacation photos&quot; and the picture has the title &quot;Mallorca&quot; the displayed page title in the detail view will be: &quot;Gallery - vacation photos - Mallorca&quot; ;-)');
DEFINE('_JGA_HEADER_AND_FOOTER','Header and Footer');
DEFINE('_JGA_HEADER_AND_FOOTER_INTRO','Basically the gallery is divided in three vertical areas: the head area at the top, the content area in the middle and the footer area at the bottom. The content area changes according to the different galleries and functions while the header and footer area remain almost static.');
DEFINE('_JGA_SHOW_GALLERYHEAD','Gallery Title');
DEFINE('_JGA_SHOW_GALLERYHEAD_LONG','Do you want the gallery title to be displayed? The gallery title is displayed at the top of the page above the gallery pathway. By default it displays the name &quot;Gallery&quot;. You can change this by editing the constant _JGS_GALLERY in the frontend-language file.');
DEFINE('_JGA_SHOW_PATHWAY','Show Pathway');
DEFINE('_JGA_SHOW_IN_HEADER','in Header');
DEFINE('_JGA_SHOW_IN_FOOTER','in Footer');
DEFINE('_JGA_SHOW_IN_HEADERFOOTER','in Header and Footer');
DEFINE('_JGA_SHOW_PATHWAY_LONG','Where do you want the pathway to be displayed? The gallery pathway usually consists a link to the gallery overview page and the pathway itself displaying what part of the gallery you are looking at.');
DEFINE('_JGA_COMPLETE_BREADCRUMBS','Expand Joomla-Breadcrumbs?');//NEW
DEFINE('_JGA_COMPLETE_BREADCRUMBS_LONG','The breadcrumbs of Joomla can be completed with the pathway of JoomGallery. They will look like this, for example: <i>Home &raquo; Gallery &raquo; Category Name &raquo; Subcategory Name</i><br />This function is <b>only</b> available with <b>Joomla 1.5</b>.');//NEW
DEFINE('_JGA_SHOW_SEARCHFIELD','Show Search');
DEFINE('_JGA_SHOW_SEARCHFIELD_LONG','Show search option to user?');
DEFINE('_JGA_SHOW_ALLPICS','Show Total Number of Pictures?');
DEFINE('_JGA_NO_DISPLAY','No Display');
DEFINE('_JGA_SHOW_ALLPICS_LONG','Show total number of all pictures of all categories? If Yes, where should it be displayed?');
DEFINE('_JGA_SHOW_ALLHITS','Show total number of hits?');
DEFINE('_JGA_SHOW_ALLHITS_LONG','Show total number of hits of all pictures in all categories? This can only be displayed together with the total number of pictures.');
DEFINE('_JGA_SHOW_BACKLINK','Show Back Link?');
DEFINE('_JGA_SHOW_BACKLINK_LONG','Do you want the back link to be displayed and if so where? The back link will lead you either to the preceding page or to the gallery or category view depending on the part of the gallery you are looking at.');
DEFINE('_JGA_SHOW_CREDITS','Credit Block');
DEFINE('_JGA_SHOW_CREDITS_LONG','Show the JoomGallery credits ("Powered by ...") block?');
DEFINE('_JGA_USER_PANEL','User Panel');
DEFINE('_JGA_SHOW_USER_PANEL','Show User Panel');
DEFINE('_JGA_DISPLAY_TO_RMSM','Display only for RM and SM');
DEFINE('_JGA_DISPLAY_TO_SM','Display only for SM');
DEFINE('_JGA_DISPLAY_TO_ALL','Display for all');
DEFINE('_JGA_SHOW_USER_PANEL_LONG','To whom should the "My Gallery" link be visible? The &quot;My Gallery&quot; is more or less the administration panel for the frontend user. It is the place - depending on the settings - where users can upload, delete or edit pictures. The uploaded pictures are displayed in table view. In case more than one category is permitted for user upload the user can also move pictures to an other category.');
DEFINE('_JGA_SHOW_ALLPICSTOADMIN','Display all pictures for admins');
DEFINE('_JGA_SHOW_ALLPICSTOADMIN_LONG','Should admins get to see all pictures without reference to the uploader?');
DEFINE('_JGA_SHOW_MINITHUMBS','Show Mini Thumbs');
DEFINE('_JGA_SHOW_MINITHUMBS_LONG','Do you want mini thumbs to be displayed in "My Gallery"? Choosing this option will display a small thumbnail in front of the picture title for better orientation. If you run a gallery with many pictures this might lead to an unwanted delay while loading.');
DEFINE('_JGA_POPUP_SETTINGS','Popup Functions');
DEFINE('_JGA_POPUP_OPENJS_BORDERPX','Border Width');
DEFINE('_JGA_POPUP_OPENJS_BORDERPX_LONG','Width of the border around the lightbox and the DHTML container.');
DEFINE('_JGA_POPUP_OPENJS_BACKGROUND','Background Color');
DEFINE('_JGA_POPUP_OPENJS_BACKGROUND_LONG','Background color of the lightbox and the DHTML container.');
DEFINE('_JGA_STYLE_COLOR_HEX','Style color name or hex color code');
DEFINE('_JGA_POPUP_DHTML_BORDER','Border Color');
DEFINE('_JGA_POPUP_DHTML_BORDER_LONG','Border color of the DHTML containers.');
DEFINE('_JGA_POPUP_DHTML_SHOW_TITLE','Picture title in DHTML container');
DEFINE('_JGA_POPUP_DHTML_SHOW_TITLE_LONG','Insert picture title below picture in DHTML container.');
DEFINE('_JGA_POPUP_DHTML_SHOW_DESCRIPTION','Picture description in DTHML container');
DEFINE('_JGA_POPUP_DHTML_SHOW_DESCRIPTION_LONG','Insert picture description below picture in DHTML container.');
DEFINE('_JGA_POPUP_LIGHTBOX_OVERLAY','Screen Overlay');
DEFINE('_JGA_POPUP_LIGHTBOX_OVERLAY_LONG','Overlay color to dim the screen while showing the lightbox.');
DEFINE('_JGA_POPUP_LIGHTBOX_SPEED','Lightbox Speed');
DEFINE('_JGA_POPUP_LIGHTBOX_SPEED_LONG','Possible values 0 to 10, a higher value increases the speed of opening the Lightbox and the transition to the next pic');
DEFINE('_JGA_POPUP_LIGHTBOX_SLIDEALL','All pictures in lightbox');
DEFINE('_JGA_POPUP_LIGHTBOX_SLIDEALL_LONG','All pictures of a category are displayed in a lightbox. <b>Please note:</b> this causes slightly more traffic!');
DEFINE('_JGA_POPUP_JS_IMAGERESIZE','Downsize pictures by Javascript');
DEFINE('_JGA_POPUP_JS_IMAGERESIZE_LONG','Do you want pictures that are larger than the screen to be downsized by Javescript? This option affects the DHTML container, the lightbox and the Javascript window.');
DEFINE('_JGA_POPUP_DISABLE_RIGHTCLICK','Disable Right Click');
DEFINE('_JGA_POPUP_DISABLE_RIGHTCLICK_LONG','This option disables the context menu that appears after a right click on pictures (the picture is closed after a click).This prevents the saving dialog from popping up but is no secure means to avert theft of pictures!');
DEFINE('_JGA_GALLERY_VIEW','Gallery View');
DEFINE('_JGA_GENERAL_SETTINGS','General Settings');
DEFINE('_JGA_SHOW_GALLERY_PATHWAY','Gallery Pathway');
DEFINE('_JGA_SHOW_GALLERY_PATHWAY_LONG','Do you want the gallery pathway to be displayed in the gallery overview? The gallery pathway usually consists a link to the gallery overview page and the pathway itself displaying what part of the gallery you are looking at.');
DEFINE('_JGA_SHOW_GALLERYHEADER','Category Header');
DEFINE('_JGA_SHOW_GALLERYHEADER_LONG','Do you want to display the category headline? By default the category headline contains the word &quot;categories&quot; and is displayed right above the table showing all categories of the gallery. The displayed name can be adjusted by editing the constant _JGS_CATEGORIES in the frontend-language file.');
DEFINE('_JGA_NUMB_COLUMN','Number of Columns');
DEFINE('_JGA_ONECOLUMN','One Column');
DEFINE('_JGA_TWOCOLUMNS','Two Columns');
DEFINE('_JGA_THREECOLUMNS','Three Columns');
DEFINE('_JGA_FOURCOLUMNS','Four Columns');
DEFINE('_JGA_NUMB_GALLERY_COLUMN','Choose the number of columns to display in the list of Categories');
DEFINE('_JGA_GALLERYCATS_PER_PAGE','Categories per page');
DEFINE('_JGA_GALLERYCATS_PER_PAGE_LONG','Number of categories to be displayed in category overview. The number chosen should be devisible by the chosen number of columns in order to avoid empty fields.');
DEFINE('_JGA_ORDER_BY_ALPHA','Alphabetical Order');
DEFINE('_JGA_ORDER_GALLERYCATS_BY_ALPHA_LONG','Do you want the categories in the gallery overview arranged in alphabetical order? In this case the settings in the Category Manager will be overwritten.');
DEFINE('_JGA_SHOW_PAGENAVIGATION','Show Page Navigation');
DEFINE('_JGA_DISPLAY_TOP_ONLY','only on top');
DEFINE('_JGA_DISPLAY_TOP_AND_BOTTOM','top and bottom');
DEFINE('_JGA_DISPLAY_BOTTOM_ONLY','only bottom');
DEFINE('_JGA_GALLERY_PAGENAVIGATION','If the gallery contains more categories than the number chosen in the option &quot;Categories per page&quot; all further categories will be displayed on extra pages. Navigation elements can optionally be placed at the top only or - e.g. if you show a large number of categories - also underneath the categories to avoid unnecessary scrolling.');
DEFINE('_JGA_SHOW_NUMB_GALLERYCATS','Display number of categories');
DEFINE('_JGA_SHOW_NUMB_GALLERYCATS_LONG','Do you want the total number of categories to be displayed above the page navigation?');
DEFINE('_JGA_SHOW_CATEGORYTHUMBNAIL','Show Thumbnails');
DEFINE('_JGA_DISPLAY_NONE','No');
DEFINE('_JGA_DISPLAY_RANDOM','Random');
DEFINE('_JGA_DISPLAY_MYCHOISE','Own Choice');
DEFINE('_JGA_SHOW_CATEGORYTHUMBNAIL_LONG','You can display a thumbnail for each category and you have two options to achieve this: First option is to display a static thumbnail that you specify in the settings of the category. Second option is to display randomly chosen thumbs (see one option below) out of the category and - if present - the sub-categories (first sub level). The random thumbnails are chosen dynamically with every reload of the page. <br />ATTENTION! Using the random function may cause an increase in loading time for web pages when working with large numbers of categories or pictures!');
DEFINE('_JGA_RANDOMCATTHUMB','Random Thumbnail');
DEFINE('_JGA_FROM_PARENT_CAT_ONLY','only from parent category');
DEFINE('_JGA_FROM_CHILD_CAT_ONLY','only from sub-categories');
DEFINE('_JGA_FROM_FAMILY_CAT','from both');
DEFINE('_JGA_RANDOMCATTHUMB_LONG','Choose from which categories the thumbnails should be displayed (only for random)');
DEFINE('_JGA_CATTHUMB_ALIGN','Alignment of Thumbnails');
DEFINE('_JGA_LEFT','flush left');
DEFINE('_JGA_RIGHT','flush right');
DEFINE('_JGA_CHANGE','changing');
DEFINE('_JGA_CENTER','centered');
DEFINE('_JGA_CATTHUMB_ALIGN_LONG','Alignment of the thumbnails (random only). With this setting you specify the alignment of the thumbs when using the random display function. This setting also has an impact on the category description.');
DEFINE('_JGA_SHOW_CATEGORY_HITS','Display category hits');
DEFINE('_JGA_SHOW_CATEGORY_HITS_LONG','Do you want to display the total number of hits on all pictures throughout the categories? To determine the total number all hits on sub-category pictures are counted in also.');
DEFINE('_JGA_SHOW_CATEGORY_ASNEW','Highlight New Categories?');
DEFINE('_JGA_SHOW_CATEGORY_ASNEW_LONG','Do you want categories with new pictures to be highlighted by &quot;NEW&quot; icon?');
DEFINE('_JGA_SHOW_DAYSNEW','Highlighting Timeframe');
DEFINE('_JGA_SHOW_CATEGORY_DAYSNEW_LONG','Specify the timeframe in days in which categories are to be considered as new.');
DEFINE('_JGA_SHOW_RMSM','Show RM and SM');
DEFINE('_JGA_SHOW_RMSM_LONG','Show RM and SM for protected directories? If you are using protected directories (i.e. folders with restricted access rights) choose Yes, otherwise choose No ');
DEFINE('_JGA_SHOW_RMSM_CATEGORIES','Display RM- and SM Categories');
DEFINE('_JGA_SHOW_RMSM_CATEGORIES_LONG','Do you want to display category names of categories with restricted access to all users anyway? Choosing &quot;Yes&quot; will display the categories in the overview with name and status (RM or SM). Choosing &quot;No&quot; will hide all categories that exceed the users access rights.');
DEFINE('_JGA_CATEGORY_VIEW','Category View');
DEFINE('_JGA_SHOW_SUBCATEGORYHEADER','Sub-category Headline');
DEFINE('_JGA_SHOW_CATEGORYHEADER_LONG','Do you want to display the sub-category headline? By default the sub-category headline contains the word &quot;sub-categories&quot; and is displayed right above the table showing all sub-categories of the category. The displayed name can be adjusted by editing the frontend constant _JGS_SUBCATEGORIES in the language file.');
DEFINE('_JGA_SHOW_CATEGORYTITLE','Headline for Single Category');
DEFINE('_JGA_SHOW_CATEGORYTITLE_LONG','Do you want to display the headline for the single category? This headline is displayed right above the thumbnails of the content and displays the name of the active category.');
DEFINE('_JGA_CATEGORY_ORDERBY_USER','User specified Category Order');
DEFINE('_JGA_CATEGORY_ORDERBY_USER_LONG','Should users have the option to arrange pictures in categories according to certain criteria? Below you can specify the options the user will be able to choose from. In this case the settings in <i>Frontend Settings &raquo; Picture ordering</i> will be overwritten by the choice of the user. ');
DEFINE('_JGA_CATEGORY_ORDERBY_USER_LIST','Content of the Option List');
DEFINE('_JGA_USER_ORDERBY_DATE','Date');
DEFINE('_JGA_USER_ORDERBY_AUTHOR','Author');
DEFINE('_JGA_USER_ORDERBY_TITLE','Title');
DEFINE('_JGA_USER_ORDERBY_HITS','Number of Hits');
DEFINE('_JGA_USER_ORDERBY_RATING','Rating');
DEFINE('_JGA_CATEGORY_ORDERBY_USER_LIST_LONG','If users are permitted to arrange pictures by the option above you can determine the sorting criteria the user can choose from. You can specify more than one (Ctrl).');
DEFINE('_JGA_SHOW_CATDESCRIPTIONINCAT','Category Description');
DEFINE('_JGA_SHOW_CATDESCRIPTIONINCAT_LONG','Do you want the category description to be displayed beneath the category title?');
DEFINE('_JGA_NUMB_CATEGORY_COLUMN','Choose the number of columns to display your pictures');
DEFINE('_JGA_CATEGORYPICS_PER_PAGE','Pics per Page');
DEFINE('_JGA_CATEGORYPICS_PER_PAGE_LONG','Number of pictures displayed per page.');
DEFINE('_JGA_CATEGORY_THUMBALIGN','Alignment of Thumbnails / Details');
DEFINE('_JGA_CATEGORY_THUMBALIGN_LONG','Alignment of the Thumbnails and/or the category details within the columns.');
DEFINE('_JGA_CATEGORY_TEXTALIGN','In case a thumbnail is displayed the details of the category will be shown under the thumbnail.');
DEFINE('_JGA_CATEGORY_TEXTALIGN_CENTER','If you choose &quot;left&quot; or &quot;right&quot; the details of the category will be shown - as far as a thumbnail is displayed - besides the thumbnail. If you choose &quot;center&quot; all details will be shown under the thumbnail.');
DEFINE('_JGA_CATEGORY_PAGENAVIGATION','If the category contains more pictures than specified in &quot;Thumbnails per page&quot; the thumbs will be displayed on the following page. The navigation bar can be displayed at the top only or - in case you show a large number of thumbs - also at the bottom to avoid unnecessary scrolling.');
DEFINE('_JGA_SHOW_NUMB_CATEGORYPICS','Display number of pictures');
DEFINE('_JGA_SHOW_NUMB_CATEGORYPICS_LONG','Do you want the total number of pictures of the categories to be displayed above the page navigation?');
DEFINE('_JGA_OPEN_DETAIL_VIEW','Entering Detail View');
DEFINE('_JGA_OPEN_NORMAL','Default View');
DEFINE('_JGA_OPEN_BLANK_WINDOW','New Window');
DEFINE('_JGA_OPEN_JS_WINDOW','JavaScript Window');
DEFINE('_JGA_OPEN_DHTML','DHTML Container');
DEFINE('_JGA_OPEN_LIGHTBOX','Lightbox');
DEFINE('_JGA_OPEN_THICKBOX3','Thickbox3');
DEFINE('_JGA_OPEN_SLIMBOX','Slimbox');
DEFINE('_JGA_OPEN_DETAIL_VIEW_LONG','Ususally a mouse click on a thumbnail in category view will open the detail view that shows the picture and the corresponding info as title, author, description, etc.. The default detail view also shows ratings and comments - provided that these options have been chosen. With this selection here you can choose different display options for opening single pictures. Mind that the detail picture info will no longer be displayed: <ul type="square"><li> &quot;new window&quot; will open a new browser window that displays the detail picture centered</li> <li> &quot;JavaScript window&quot; will display the detail picture in a popup of matching size. </li> <li> &quot;DHTM container&quot; will display a layer containing the picture (with a border if chosen) above  the category view (no new window is opened)</li><li> &quot;Lightbox&quot; will display an animated lightbox containing the picture. The background (the category view) will appear dimmed.</li><li>&quot;Thickbox3&quot; shows the picture like the Lightbox with a dimmed background. The navigation links are here at the bottom left corner. It uses the jquery javascript-library.</li><li>&quot;Slimbox&quot; shows the picture like the lightbox. The only difference: it uses the mootools javascript library.</li></ul> You find more options concerning the lightbox and the other popup functions under <i>Frontend Settings &raquo; Popup Functions</i>.');
DEFINE('_JGA_LIGHTBOX_ORIGINAL','Lightbox original picture');
DEFINE('_JGA_LIGHTBOX_ORIGINAL_LONG','Given that the lightbox has been chosen above you can specify here whether the original picture (Yes) or the detail picture (No) will be displayed in the lightbox.');
DEFINE('_JGA_SHOW_PICTURE_TITLE','Display Picture Title');
DEFINE('_JGA_SHOW_PICTURE_TITLE_LONG','The following settings specify which picture detail info is displayed in category view. This info is displayed underneath the corresponding thumbnail. <br />Do you want to display titles?');
DEFINE('_JGA_SHOW_PICTURE_ASNEW','Highlight New Pictures?');
DEFINE('_JGA_SHOW_PICTURE_ASNEW_LONG','Do you want new pictures to be highlighted by &quot;NEW&quot; icon?');
DEFINE('_JGA_SHOW_PICTURE_DAYSNEW_LONG','Specify the timeframe in days in which pictures are to be considered as new.');
DEFINE('_JGA_SHOW_PICTURE_HITS','Show Hits');
DEFINE('_JGA_SHOW_PICTURE_HITS_LONG','Show picture hits to user?');
DEFINE('_JGA_SHOW_PICTURE_AUTHOR','Show Author');
DEFINE('_JGA_SHOW_PICTURE_AUTHOR_LONG','Show author to user?');
DEFINE('_JGA_SHOW_PICTURE_OWNER','Show Owner instead');
DEFINE('_JGA_SHOW_PICTURE_OWNER_LONG','Show owner instead of author if no author exists?');
DEFINE('_JGA_SHOW_PICTURE_COMMENTS','Show Comments');
DEFINE('_JGA_SHOW_PICTURE_COMMENTS_LONG','Show comments to user?');
DEFINE('_JGA_SHOW_PICTURE_RATINGS','Show Ratings');
DEFINE('_JGA_SHOW_PICTURE_RATINGS_LONG','Show ratings to user?');
DEFINE('_JGA_SHOW_PICTURE_DESCRIPTION','Show Description');
DEFINE('_JGA_SHOW_PICTURE_DESCRIPTION_LONG','Show descriptions to user?');
DEFINE('_JGA_SHOW_FAVOURITES_LINK','Display favorites link?');//NEW
DEFINE('_JGA_SHOW_FAVOURITES_LINK_LONG','Here you can choose whether there should be a link which allowes users to add images to their favourites in the category view or not. This option will only be available if favourites are activated.');//NEW
DEFINE('_JGA_SUBCAT_SETTINGS','Sub-Categories');
DEFINE('_JGA_NUMB_SUBCATEGORY_COLUMN','Number of Columns for Sub-Categories');
DEFINE('_JGA_NUMB_SUBCATEGORY_COLUMN_LONG','Choose the number of columns to display in the list of sub-categories');
DEFINE('_JGA_CATEGORYSUBCATS_PER_PAGE','Subcategories per page');
DEFINE('_JGA_CATEGORYSUBCATS_PER_PAGE_LONG','Number of subcategories to be displayed in category overview. The number chosen should be devisible by the chosen number of columns in order to avoid empty fields.');
DEFINE('_JGA_SHOW_NUMB_SUBCATEGORIES','Display number of subcategories');
DEFINE('_JGA_SHOW_NUMB_SUBCATEGORIES_LONG','Do you want the total number of subcategories to be displayed above the page navigation?');
DEFINE('_JGA_ORDER_SUBCATEGORIES_BY_ALPHA_LONG','Should sub-categories in category view be sorted alphabetically? In this case the settings in the category manager will be overwritten.');
DEFINE('_JGA_DETAIL_VIEW','Detail View');
DEFINE('_JGA_ALLOW_DETAILPAGE','Show Detail Page:');
DEFINE('_JGA_ALLOW_DETAILPAGE_LONG','Do you want to permit the detail view for unregistered users? Choosing &quot;No&quot;  will hide the detail page for guests and will request the user to login.');
DEFINE('_JGA_SHOW_DETAIL_NUMBEROFPICS','Show Counter?');
DEFINE('_JGA_SHOW_DETAIL_NUMBEROFPICS_LONG','In the detail view you find links above each picture to navigate from on to the other. Choosing &quot;Yes&quot; here will add a counter below the links that indicates the number of the picture: e.g &quot;picture 10 out of 30&quot;.');
DEFINE('_JGA_DETAIL_CURSOR_NAVIGATION','Navigation with Arrow Keys');
DEFINE('_JGA_DETAIL_CURSOR_NAVIGATION_LONG','This option enables keyboard navigation with the arrow keys for navigating between pictures.');
DEFINE('_JGA_DETAIL_DISABLE_RIGHTCLICK','Disable Right Mouseclick');
DEFINE('_JGA_DETAIL_DISABLE_RIGHTCLICK_LONG','This option disables the context menu that appears after a right click on pictures (the picture is closed after a click). This prevents the saving dialog from popping up but it is no secure means to avert theft of pictures!');
DEFINE('_JGA_SHOW_DETAIL_INFORMATION','Show Details:');
DEFINE('_JGA_SHOW_DETAIL_INFORMATION_LONG','Show picture details to user? Choosing &quot;No&quot; will disable the following settings for controlling the display of picture details.');
DEFINE('_JGA_SHOW_DETAIL_ACCORDION','Show details as Accordion?');//NEW
DEFINE('_JGA_SHOW_DETAIL_ACCORDION_LONG', 'If the picture details and the other functions of the detail view shall be shown as Accordion (the single functions can be toggled on or off) choose the function &quot;Yes&quot;. The Accordion is only applicable if the original picture will <b>not</b> be opened with the Lightbox.');//NEW
DEFINE('_JGA_SHOW_DETAIL_TITLE','Show title?');
DEFINE('_JGA_TOP','upside');//NEW
DEFINE('_JGA_BOTTOM','below');//NEW
DEFINE('_JGA_SHOW_DETAIL_TITLE_LONG','Do you want the title of the picture to be displayed above it in the detail view?');
DEFINE('_JGA_SHOW_DETAIL_DESCRIPTION','Show Description?');
DEFINE('_JGA_SHOW_DETAIL_DESCRIPTION_LONG','Do you want the description to be displayed?');
DEFINE('_JGA_SHOW_DETAIL_DATE','Show Date?');
DEFINE('_JGA_SHOW_DETAIL_DATE_LONG','Do you want the date of the picture to be displayed?');
DEFINE('_JGA_SHOW_DETAIL_HITS','Show Hits?');
DEFINE('_JGA_SHOW_DETAIL_HITS_LONG','Do you want the number of hits to be displayed?');
DEFINE('_JGA_SHOW_DETAIL_RATING','Show Rating?');
DEFINE('_JGA_SHOW_DETAIL_RATING_LONG','Do you want the average rating and the number of ratings to be displayed?');
DEFINE('_JGA_SHOW_DETAIL_FILESIZE','Show File Size?');
DEFINE('_JGA_SHOW_DETAIL_FILESIZE_LONG','Do you want the file size to be displayed?');
DEFINE('_JGA_SHOW_DETAIL_AUTHOR','Show Author?');
DEFINE('_JGA_SHOW_DETAIL_AUTHOR_LONG','Do you want the author to be displayed?');
DEFINE('_JGA_SHOW_DETAIL_ORIGFILESIZE','Show Size of the Original File?');
DEFINE('_JGA_SHOW_DETAIL_ORIGFILESIZE_LONG','Do you want to display the size of the original picture? Of course this setting only work in case you have not deleted the original file.');
DEFINE('_JGA_SHOW_DETAIL_DOWNLOAD','Show Download?');
DEFINE('_JGA_SHOW_DETAIL_DOWNLOAD_LONG','This link provides the option for users to download the displayed picture. To what group do you want to make this available?');
DEFINE('_JGA_DETAIL_DOWNLOADFILE','Download Pictures');
DEFINE('_JGA_RESIZED_ONLY','Detail Pictures Only');
DEFINE('_JGA_ORIGINAL_ONLY','Originals Only');
DEFINE('_JGA_RESIZED_IFNO_ORIGINAL','Use detail picture if original is not present');
DEFINE('_JGA_DETAIL_DOWNLOADFILE_LONG','Which picture do you want to make available for download? &quot;Detail Pictures Only&quot; will choose the pictures as displayed in detail view. &quot;Originals Only&quot; will choose the original pictures as displayed in the popup (provided that it is still present). Of course this setting only works in case you made the download itself available.');
DEFINE('_JGA_DETAIL_DOWNLOADWITHWATERMARK','Download with Watermark?');
DEFINE('_JGA_DETAIL_DOWNLOADWITHWATERMARK_LONG','Do you want to add a watermark to the downloaded picture? Choosing &quot;Yes&quot; will add a watermark to the downloaded picture without regard whether or not a watermark is displayed in detail view.');
DEFINE('_JGA_DETAIL_INSERT_WATERMARK','Add Watermark?');
DEFINE('_JGA_DETAIL_INSERT_WATERMARK_LONG','Do you want to add a watermark to the detail view of the pictures? (By default the watermark graphics file is located in components/com_joomgallery/assets/images with the file name watermark.png. You can change both path and file name but you will also have to adjust the path and filename in <i>General Settings &raquo; Paths, Directories, Files and Formats</i> accordingly.)');
DEFINE('_JGA_DETAIL_WATERMARK_POSITION','Position of Watermark');
DEFINE('_JGA_TOP_LEFT','top left');
DEFINE('_JGA_TOP_CENTER','top center');
DEFINE('_JGA_TOP_RIGHT','top right');
DEFINE('_JGA_MIDDLE_LEFT','middle left');
DEFINE('_JGA_MIDDLE_CENTER','middle center');
DEFINE('_JGA_MIDDLE_RIGHT','middle right');
DEFINE('_JGA_BOTTOM_LEFT','bottom left');
DEFINE('_JGA_BOTTOM_CENTER','bottom center');
DEFINE('_JGA_BOTTOM_RIGHT','bottom right');
DEFINE('_JGA_DETAIL_WATERMARK_POSITION_LONG','Choose the position of the watermark to be shown in the picture.');
DEFINE('_JGA_SHOW_DETAIL_LINKTOORIGINAL','Show Link to Original Pictures?');
DEFINE('_JGA_SHOW_DETAIL_LINKTOORIGINAL_LONG','Do you want to display a link to the original picture and if so, who is permitted to see this link? Choosing this option will display a link to the original picture underneath the detail view of the picture. This reference is displayed only in case the original picture is larger than the detail picture.');
DEFINE('_JGA_OPEN_ORIGINAL_VIEW','Open Original Picture in');
DEFINE('_JGA_OPEN_ORIGINAL_VIEW_LONG','This option controls how the original picture is displayed: <ul type="square"><li> &quot;new window&quot; will open a new browser window that displays the detail picture centered</li> <li> &quot;JavaScript window&quot; will display the detail picture in a popup of matching size. </li> <li> &quot;DHTM container&quot; will display a layer containing the picture (with a border if chosen) above  the category view (no new window is opened)</li> <li> &quot;Lightbox&quot; will display an animated lightbox containing the picture. The background (the category view) will appear dimmed.</li><li>&quot;Thickbox3&quot; shows the picture like the Lightbox with a dimmed background. The navigation links are here at the bottom left corner. It uses the jquery javascript-library.</li><li>&quot;Slimbox&quot; shows the picture like the lightbox. The only difference: it uses the mootools javascript library.</li></ul> This function is only available in case you show the link to the original pictures at all. You find more options concerning the lightbox and the other popup functions under <i>Frontend Settings &raquo; Popup Functions</i>.');
DEFINE('_JGA_SHOW_DETAIL_BBCODELINK','Show BBcode image links?');
DEFINE('_JGA_BBCODE_IMG_ONLY','Only IMG-Tag');
DEFINE('_JGA_BBCODE_URL_ONLY','Only URL-Tag');
DEFINE('_JGA_BBCODE_BOTH','Both tags');
DEFINE('_JGA_SHOW_DETAIL_BBCODELINK_LONG','Should a textfield with IMG and/or URL tags be displayed? Users can copy and paste the text to link to the image in Forums.');
DEFINE('_JGA_SHOW_DETAIL_COMMENTS','Show comment for registered users only ');
DEFINE('_JGA_SHOW_DETAIL_COMMENTS_LONG','Shall the posted comments shown to registered users only?');
DEFINE('_JGA_SHOW_DETAIL_COMMENTSAREA','Show Comments Area');
DEFINE('_JGA_SHOW_DETAIL_COMMENTSAREA_LONG','Display the comments area above or underneath the existing comments? This option is only available, if comments are allowed');
DEFINE('_JGA_ABOVE_COMMENTS','above comments');
DEFINE('_JGA_UNDERNEATH_COMMENTS','underneath comments');
DEFINE('_JGA_SHOW_DETAIL_SEND2FRIEND','Show SendFriend?');
DEFINE('_JGA_SHOW_DETAIL_SEND2FRIEND_LONG','Show SendFriend to user?');
DEFINE('_JGA_MOTIONGALLERY_SETTINGS','Motiongallery');
DEFINE('_JGA_SHOW_DETAIL_MOTIONGALLERY','Show Minis?');
DEFINE('_JGA_SHOW_DETAIL_MOTIONGALLERY_LONG','Do you want to display mini thumbs underneath the detail view? Mini thumbs are rather small previews of the category content. They provide an overview of the category. If your categories contain many pictures this might lead to an unwanted delay while loading.');
DEFINE('_JGA_MOTIONGALLERY_DISPLAYMODE','Display mode for mini thumbs?');
DEFINE('_JGA_STATIC','static');
DEFINE('_JGA_MOVEABLE','movable');
DEFINE('_JGA_MOTIONGALLERY_DISPLAYMODE_LONG','You can choose between two display modes for the mini thumbs: &quot;static&quot; means that all mini thumbs of a category are aligned next to and underneath each othe. This may take up a lot of space in case you have a large number of pictures. Selecting &quot;movable&quot; will display all mini thumbs i a single line. Height and width of this "motion bar" can be specified in the following settings. Pointing your mouse to the bar will set off the forward or backward movement and assigns the speed. This has no effect on the loading speed though because all mini thumbs are already loaded at first page call.');
DEFINE('_JGA_MOTIONGALLERY_WIDTH','Width of the motion bar');
DEFINE('_JGA_MOTIONGALLERY_WIDTH_LONG','Available for movable mini thumbs only! This specifies the visible width of the motion bar. Choose a value in pixels (e.g. 400)!');
DEFINE('_JGA_MOTIONGALLERY_HEIGHT','Height of the motion bar');
DEFINE('_JGA_MOTIONGALLERY_HEIGHT_LONG','Available for movable mini thumbs only! This specifies the visible height of the motion bar. Choose a value in pixels (e.g. 50)!');
DEFINE('_JGA_MOTIONMINIS_MAXWIDTH','Max Width of Minis');
DEFINE('_JGA_MOTIONMINIS_MAXWIDTH_LONG','Max width of minis in pixel. It is recommended to use equal values for width and height.');
DEFINE('_JGA_MOTIONMINIS_MAXHEIGHT','Max Height of Minis');
DEFINE('_JGA_MOTIONMINIS_MAXHEIGHT_LONG','Max height of minis in pixel. It is recommended to use equal values for width and height.');
DEFINE('_JGA_MOTIONMINIS_PROPORTIONS','Proportions of the mini thumbs');
DEFINE('_JGA_SAMEWIDTHANDHEIGHT','according to height and width');
DEFINE('_JGA_MOTIONMINIS_PROPORTIONS_LONG','Regarding proportions the mini thumbs can be displayed in three different ways: choosing &quot;according to height and width&quot; will display the proprtions according to the values specified in &quot;Max Width of the Minis&quot;&quot; and &quot;Max Height of the Minis&quot; in the two settings above. This might possibly lead to distorted proportions. <br />The option &quot;according to hight&quot; will scale all minis to the specified height and leave the proportions untouched. The width of the minis may vary depending on the picture format. <br />The option &quot;according to width&quot; will scale all minis to the specified width and leave the proportions untouched. The height of the minis may vary depending on the picture format.');
DEFINE('_JGA_NAMESHIELD_SETTINGS','Nametags');
DEFINE('_JGA_SHOW_DETAIL_NAMESHIELDS','Use Nametags?');
DEFINE('_JGA_SHOW_DETAIL_NAMESHIELDS_LONG','Should registered useres have the option to attach name tags to the detail view of the pictures? These name tags are - dependant on the choices below - either visible to registered users only or also to guests. IF CB/CBE support is activated the name tags will link to the user profiles. The design of the name tags can be changed in the CSS files. If you enable name tags, the original image can no longer be opened by clicking on the image, but by an icon intstead.');
DEFINE('_JGA_NAMESHIELDS_GUEST_VISIBLE','Visible for Guests?');
DEFINE('_JGA_NAMESHIELDS_GUEST_VISIBLE_LONG','Should existing name tags be visible for guests?');
DEFINE('_JGA_NAMESHIELDS_GUEST_INFORMATION','Information for Guests?');
DEFINE('_JGA_NAMESHIELDS_GUEST_INFORMATION_LONG','Should guests be given a hint that name tags are in use? This option expects that name tags are indeed enabled.');
DEFINE('_JGA_NAMESHIELDS_HEIGHT','Height of nametags');
DEFINE('_JGA_NAMESHIELDS_HEIGHT_LONG','Enter the height for nametags in pixel (please enter numbers only).');
DEFINE('_JGA_NAMESHIELDS_WIDTH','Width of nametags');
DEFINE('_JGA_NAMESHIELDS_WIDTH_LONG','Here you can enter the relative value for width. The number you enter is not a absolute value but rather a factor dependant of the font size. For a font size of 10 pt a value of 8 is a good choice. Check it out!');
DEFINE('_JGA_SLIDESHOW_SETTINGS','Slideshow Settings');
DEFINE('_JGA_SHOW_DETAIL_SLIDESHOW','Allow Slideshows');
DEFINE('_JGA_SHOW_DETAIL_SLIDESHOW_LONG','With this option a slide show is offered to users on the detail page which displays the content of the respective category starting with the active picture. All further settings controlling the appearance are without effect if you choose &quot;No&quot; here.');
DEFINE('_JGA_SLIDESHOW_TIMEFRAME','Display Time');
DEFINE('_JGA_SLIDESHOW_TIMEFRAME_LONG','Timeframe in seconds in which a single pictures is displayed until the next picture appears.');
DEFINE('_JGA_SLIDESHOW_TRANSITION','Transition Effect');
DEFINE('_JGA_SLIDESHOW_TRANSITION_LONG','Do you want to use transition effects in the slide show? Internet Explorer offers several effects to place between two slides. These effects solely work with IE.');
DEFINE('_JGA_SLIDESHOW_TRANSITION_RANDOM','Random Transition.');
DEFINE('_JGA_SLIDESHOW_TRANSITION_RANDOM_LONG','Use random transition effects. With this option and activated transition effects (above) the transitions will be chosen randomly. The alternative to random effects is a static soft cross-fade effect. These effects solely work with IE.');
DEFINE('_JGA_SLIDESHOW_TRANSITION_TIME','Transition Time');
DEFINE('_JGA_SLIDESHOW_TRANSITION_TIME_LONG','Time of transition in seconds.');
DEFINE('_JGA_SLIDESHOW_ENDLESS_SLIDE','Endless Slide');
DEFINE('_JGA_SLIDESHOW_ENDLESS_SLIDE_LONG','Show Endless Slide checkbox to user?');
DEFINE('_JGA_EXIF_SETTINGS','Exif data');//NEW
DEFINE('_JGA_EXIF_SETTINGS_INTRO','The exchangeable image file format (Exif) is a standard for the file format in which modern digital cameras record informations of the picture (JPEG and TIFF). The Exif data are written into the header of the image file information and contain important recording parameters such as camera manufacturer, camera model, date and time of recording, exposure time etc.<br /> Please note that by announcing the Exif data some details may be published unintentionally, which are not intended for the viewers!');//NEW
DEFINE('_JGA_EXIF_SETTINGS_INTRO2','The EXIF data can only be read from the original files. When the originals are deleted during the upload the EXIF data are not available.<br />In addition on the webserver the reading of EXIF data has to be installed and activated. Results of the check on your server: ');//NEW
DEFINE('_JGA_SHOW_DETAIL_EXIFDATA','Show Exif data');//NEW
DEFINE('_JGA_SHOW_DETAIL_EXIFDATA_LONG','Shall the Exif data of the chosen picture be shown if available? If &quot;Yes&quot; by the following options you can decide which information will be published. Otherwise they are ineffective.');//NEW
DEFINE('_JGA_IPTC_SETTINGS','IPTC-Data');//NEW
DEFINE('_JGA_IPTC_SETTINGS_INTRO','As with EXIF data, also IPTC data are stored in a dedicated area within the header of a digital image file (as well as other media). The IPTC-NAA Standard was developed by the <b>I</b>nternational <b>P</b>ress <b>T</b>elecommunications <b>C</b>ouncil (IPTC) in cooperation the <b>N</b>ewspaper <b>A</b>ssociation of <b>A</b>merica (NAA) and allows to store authorship and copyright information as well as title and relevant keywords for context related search directly within the image file itself, and as such represent an important asset in image file management. As opposed to the EXIF standart, IPTC data are not generated automatically, but need to be written into the image header with the help of special software.');//NEW
DEFINE('_JGA_IPTC_SETTINGS_INTRO2','Only fields that comply to IPTC-NAA standards will be displayed. The recent NewsML format and the alternative XMP format are not (yet) supported. Note also that IPTC data can only be read from original files. Thus, if you choose to delete the original images after upload, IPTC data will become unavailable.');//NEW
DEFINE('_JGA_SHOW_DETAIL_IPTCDATA','Show IPTC data');//NEW
DEFINE('_JGA_SHOW_DETAIL_IPTCDATA_LONG','Shall the IPTC data of the chosen picture be shown if available? If &quot;Yes&quot; by the following options you can decide which information will be published. Otherwise they are ineffective.');//NEW
DEFINE('_JGA_IPTC_COPYRIGHT','IPTC standard specifications (tag, tag-nr. description, defintion) are copyright of the International Press Telecommunications Council (<a href="http://www.iptc.org." target="_blank">www.iptc.org</a>). The use of these specifications is only permitted if they remain unaltered from those defined in official IPTC publications. The specifications used here are from the document &quot;<a href="http://iptc.cms.apa.at/std/photometadata/2008/specification/IPTC-PhotoMetadata-2008_2.pdf" target="_blank">Photo Metadata 2008, which also contains all respective licensing details.');//NEW
DEFINE('_JGA_IPTC_COPYRIGHT_LANGUAGE','');//NEW
DEFINE('_JGA_TOPLIST_SETTINGS','Toplists');
DEFINE('_JGA_SHOW_TOPLIST','Show Toplist');
DEFINE('_JGA_SHOW_TOPLIST_LONG','Where do you want the top list to be displayed? The toplist contains links to the toplist pages that display lists such as last added or last commented pictures. If you choose &quot;No Display&quot; the following settings will have no effect!');
DEFINE('_JGA_SHOW_TOPLIST_ON_VIEWS','Toplist Display Pages');
DEFINE('_JGA_ALL_VIEWS','on all pages');
DEFINE('_JGA_ONLY_GALLERYVIEW','gallery view only');
DEFINE('_JGA_GALLERY_AND_CATEGORYVIEW','gallery and category view');
DEFINE('_JGA_SHOW_TOPLIST_ON_VIEWS_LONG','Which pages should display the toplist? Here you can choose the gallery pages that are supposed to display the toplist. It will be hidden on all other pages.');
DEFINE('_JGA_TOPLIST_NUMB_COLS','Columns');
DEFINE('_JGA_TOPLIST_NUMB_COLS_LONG','Number of columns in toplist');
DEFINE('_JGA_TOPLIST_NUMB_ENTRIES','Toplist entries');
DEFINE('_JGA_TOPLIST_NUMB_ENTRIES_LONG','Number of pictures to be displayed in toplist. The value you enter here will specify the maximum number of pictures to be displayed on toplist pages. Of course this number also relates to the number of pictures that meet the criteria. If you only have three commented pictures then only three pictures will be displayed in &quot;last commented&quot; no matter what number you entered here.');
DEFINE('_JGA_TOPLIST_THUMBALIGN','Alignment of the thumbnails');
DEFINE('_JGA_TOPLIST_THUMBALIGN_LONG','Alignment of the thumbnails within the columns. At single-column view the thumbnails will be aligned along a fictive tripline left sided as defined in this option. At multi column view this option defines the alignment both for the thumbnails and for the details across the whole width of the site.');
DEFINE('_JGA_TOPLIST_TEXTALIGN','Alignment of the details');
DEFINE('_JGA_TOPLIST_TEXTALIGN_LONG','This option only works at single-column view of the toplist. In this case the pictures will be aligned right sided along a fictive middle tripline.');
DEFINE('_JGA_TOPLIST_SHOW_RATING','Last voted pictures');
DEFINE('_JGA_TOPLIST_SHOW_RATING_LONG','Show link to last voted pictures?');
DEFINE('_JGA_TOPLIST_SHOW_LATEST','Show last added');
DEFINE('_JGA_TOPLIST_SHOW_LATEST_LONG','Show link to last added pictures to users?');
DEFINE('_JGA_TOPLIST_SHOW_COMMENTS','Last commented pictures');
DEFINE('_JGA_TOPLIST_SHOW_COMMENTS_LONG','Show link to last commented pictures?');
DEFINE('_JGA_TOPLIST_THISCOMMENT','Show the comment');
DEFINE('_JGA_TOPLIST_THISCOMMENT_LONG','This option will display the comments on the top list page &quot;last commented&quot; including author and date.');
DEFINE('_JGA_TOPLIST_SHOW_MOSTVIEWED','Most viewed pictures');
DEFINE('_JGA_TOPLIST_SHOW_MOSTVIEWED_LONG','Show link to most viewed pictures?');
DEFINE('_JGA_FAVOURITES_SETTINGS','Favourites');//NEW
DEFINE('_JGA_USE_FAVOURITES','Use Favourites:');//NEW
DEFINE('_JGA_USE_FAVOURITES_LONG','This activates the favourites and makes available all following functions. Logged-in users can mark images they like and call them up again with the link "My Favourites" everytime they want.');//NEW
DEFINE('_JGA_FAVOURITES_USERS','Who is legitimated to do so?');//NEW
DEFINE('_JGA_FAVOURITES_USERS_LONG','Here you can decide whether registered users and special ones are allowed to use the favourites or only the special users (group "Author" and higher).');//NEW
DEFINE('_JGA_FAVOURITES_REG_SPEC','registered and special');//NEW
DEFINE('_JGA_FAVOURITES_ONLY_SPEC','only special users');//NEW
DEFINE('_JGA_FAVOURITES_GUEST_INFORMATION','Advice in the case of not enough rights:');//NEW
DEFINE('_JGA_FAVOURITES_GUEST_INFORMATION_LONG','Should users with not enough rights be given a hint that using favourites only is possible as registered user?');//NEW
DEFINE('_JGA_MAX_FAVOURITES','Max number of images:');//NEW
DEFINE('_JGA_MAX_FAVOURITES_LONG','Here you can set the maximum number of images which users are allowed to mark as their favourites. This is primarily important to avoid that the users create excessively great zipfiles in the case that the zip-download-function is activated at the same time. (To set no limit please use 0.)');//NEW
DEFINE('_JGA_ZIPDOWNLOAD','Zip Download:');//NEW
DEFINE('_JGA_ZIPDOWNLOAD_LONG','Do you want to give the users the possibility to create downloadable zipfiles with their favourites?');//NEW
DEFINE('_JGA_FAVOURITES_FOR_PUBLIC_ZIP','Public Zip Download:');//NEW
DEFINE('_JGA_FAVOURITES_FOR_PUBLIC_ZIP_LONG','Due to the fact that unregistered users are not able to use the favourites you can give them at least the possibility to use the zip download. This function is <b>only</b> available with <b>Joomla 1.5</b>.');//NEW
DEFINE('_JGA_FAVOURITES_FOR_ZIP','Use Zip Download only:');//NEW
DEFINE('_JGA_FAVOURITES_FOR_ZIP_LONG','If you activate this, the favourites will not be labeled as "Favourites". All registered users are just using the zip download then.');//NEW

//administrator/components/com_joomgallery/includes/html/admin.help.html.php
DEFINE('_JGA_HELP_MANAGER','Help and Information');
DEFINE('_JGA_HELP_TEAM','The Team');
DEFINE('_JGA_HELP_CHIEF','Project lead');
DEFINE('_JGA_HELP_CHIEF2','Deputies');
DEFINE('_JGA_HELP_PROGRAMMING','Programming');
DEFINE('_JGA_HELP_ADVISORY','Consulting');
DEFINE('_JGA_HELP_QUALITY','Quality assurance');
DEFINE('_JGA_HELP_SUPPORT','Support');
DEFINE('_JGA_LANGUAGE_COORDINATION','Coordination of the Language-Files');
DEFINE('_JGA_HELP_ENGLISH','English');
DEFINE('_JGA_HELP_DUTCH','Dutch');
DEFINE('_JGA_HELP_RUSSIAN','Russian');
DEFINE('_JGA_HELP_FINNISH','Finnish');
DEFINE('_JGA_HELP_CHINESE','Chinese, traditional & simplified');
DEFINE('_JGA_HELP_SPANISH','Spanish');
DEFINE('_JGA_HELP_FRENCH','French');
DEFINE('_JGA_HELP_HUNGARIAN','Hungarian');
DEFINE('_JGA_HELP_DANISH','Danish');
DEFINE('_JGA_HELP_BRAZILIAN','Brazilian-Portuguese');
DEFINE('_JGA_HELP_JAPANESE','Japanese');//NEW
DEFINE('_JGA_HELP_TRANSLATION','Translation');
DEFINE('_JGA_HELP_LINKS','Links / Help');
DEFINE('_JGA_HELP_PROJECT_WEBSITE','Project website (Roadmap, Documentation, FAQ, Downloads)');
DEFINE('_JGA_HELP_SUPPORT_FORUM','Support Forum');
DEFINE('_JGA_HELP_PROJECTSITE','Project website (Bug-Tracker, Feature Request, SVN)');
DEFINE('_JGA_HELP_AVALIABLE_TRANSLATIONS','Available translations / language files');
DEFINE('_JGA_HELP_DOWNLOAD_TRANSLATIONS','Click a flag to download the corresponding language file.');
DEFINE('_JGA_HELP_THANKS','Thanks / Credits');
DEFINE('_JGA_HELP_DONATIONS','Support / donate to the JoomGallery project');
DEFINE('_JGA_HELP_DONATIONS_LONG','Besides a lot of spare time, the development and support of this project also costs money.<br /> Please support Joomgallery with a donation, so we can continue to offer this software for free.<br />Thank you!');
DEFINE('_JGA_HELP_SPONSORS','If you want to support our project in any other way - be it by participation or as sponsor - just write an email to:<br />');
DEFINE('_JGA_HELP_LICENCE','License / Warranty');
DEFINE('_JGA_HELP_NO_GUARANTEE','The component <a href="http://www.en.joomgallery.net" target="_blank">JoomGallery</a> for <a href="http://www.joomla.org" target="_blank">Joomla!</a> is free Software, released under the license <a href="http://www.gnu.org/licenses/gpl-2.0.html">GNU/GPL</a>.<br /><br />Despite thorough testing, our software comes with absolutely no warranty and we do not guarantee a certain functionality.');
DEFINE('_JGA_HELP_PROMOTE','Supported by:');

//administrator/components/com_joomgallery/includes/html/admin.migration.html.php
DEFINE('_JGA_CHECKMIGRATION_PONY','Verify the ability to migrate from Ponygallery ML to JoomGallery:'); 
DEFINE('_JGA_CHECKMIGRATION_4IMAGES','Verify the ability to migrate from 4image to JoomGallery:');

//administrator/components/com_joomgallery/includes/html/admin.pictures.html.php
DEFINE('_JGA_PICTURE_MANAGER','Picture Manager');
DEFINE('_JGA_SORT_BY_CATEGORY','Filter by category:');
DEFINE('_JGA_HITS','Hits');
DEFINE('_JGA_ALERT_PICTURE_MUST_HAVE_TITLE','Picture must have a title');//ALERT
DEFINE('_JGA_ALERT_YOU_MUST_SELECT_PICTURE_FILENAME','You must have a picture filename.');//ALERT
DEFINE('_JGA_ALERT_YOU_MUST_SELECT_THUMBNAIL_FILENAME','You must have a thumbnail filename.');//ALERT
DEFINE('_JGA_PICTURE_ADD','Add Picture');
DEFINE('_JGA_DOES_ORIGINAL_EXIST','Original exist?');
DEFINE('_JGA_ORIGINAL_EXIST','The Original do exist!');
DEFINE('_JGA_ORIGINAL_NOT_EXIST','The Original does not exist!');
DEFINE('_JGA_NO_PICTURE_SELECTED','No picture selected!');
DEFINE('_JGA_ASSIGN_ORIGINAL','Assign Original?');
DEFINE('_JGA_COMPULSORYFIELDS','Compulsory Fields');
DEFINE('_JGA_ASSIGN_ORIGINAL_LONG','Please state whether an original image should be assigned to the picture. Because it could have been chosen to delete the original when uploading the picture, it is possible that there is no original image available. <br />Please note that you can only assign an original image with the same filename as the detail image, and this original image needs to be in the directory &quot;originals_directory / name_of_category&quot; .<br />After selecting the picture, you will see a status message stating the availability of an original image. If you choose &quot;Yes&quot; and the original does not exist, the detail image will be used as original. Otherwise, no original image will be assigned to the picture.');
DEFINE('_JGA_PICTURE_PREVIEW','Picture Preview');
DEFINE('_JGA_PICTURE_EDIT','Edit Picture');
DEFINE('_JGA_PICTURE_RATING','Picture Rating');
DEFINE('_JGA_PICTURE_VOTES',' Votes');
DEFINE('_JGA_CLEAR_PICTURE_VOTES', 'Clear all votes for this image'); 
DEFINE('_JGA_MOVE_PICTURE','Move pictures to a different category');
DEFINE('_JGA_MOVE_PICTURE_TO_CATEGORY','Target category to move pictures to');
DEFINE('_JGA_PICTURES_TO_MOVE','Pictures to move');
DEFINE('_JGA_PREVIOUS_CATEGORY','previous category');

//administrator/components/com_joomgallery/includes/admin.uploads.html.php
DEFINE('_JGA_PICTURE_UPLOAD_MANAGER','Picture Upload');
DEFINE('_JGA_UPLOAD_COMPLETE_CHOOSE_NEXT','Upload succesfully completed. Choose next picture!');
DEFINE('_JGA_PLEASE_SELECT_IMAGE','Select Image');
DEFINE('_JGA_PICTURE_ASSIGN_TO_CATEGORY','Category photos will be assigned to');
DEFINE('_JGA_GENERIC_TITLE','Generic Title');
DEFINE('_JGA_GENERIC_DESCRIPTION','Generic Description');
DEFINE('_JGA_OPTION','(optional)');
DEFINE('_JGA_DELETE_ORIGINAL_AFTER_UPLOAD','Delete pictures from the original folder after upload');
DEFINE('_JGA_CREATE_SPECIAL_GIF','Transparent or animated picture files?');
DEFINE('_JGA_UPLOAD','Upload');
DEFINE('_JGA_DELETE_ORIGINAL_AFTER_UPLOAD_ASTERISK','Choosing this option will delete the original files from the server after they have been uploaded. Only choose this if you run short of server space. Although the thumbnail and the detailed picture are left untouched from this option the popup will no longer be displayed.');
DEFINE('_JGA_CREATE_SPECIAL_GIF_ASTERISK','This option allows the upload of special picture files. Solely choose this option in case your upload exclusively consists of animated or transparent .png or .gif files. Keep in mind that the files do not get resized and therefore are displayed full size in detail view!');
DEFINE('_JGA_BATCH_UPLOAD_MANAGER','Batch Upload');
DEFINE('_JGA_BATCH_UPLOAD_NOTE','I M P O R T A N T &nbsp;&nbsp;&nbsp; N O T E ! !<br />Please do not upload zipped directories! <br /> Only zipped Picture-Files will be stored correctly.');
DEFINE('_JGA_BATCH_ZIP_FILE','Image Package File (.zip)');
DEFINE('_JGA_COUNTER_NUMBER','numbering start');
DEFINE('_JGA_START_BATCHUPLOAD','Begin Upload');
DEFINE('_JGA_COUNTER_NUMBER_ASTERISK','With the general title consecutive numbers are assigned to the pictures. In case you want the numbering to start with a chosen value enter it in this field. Otherwise leave the field empty');
DEFINE('_JGA_FTP_UPLOAD_MANAGER','FTP Upload');
DEFINE('_JGA_SELECT_DIRECTORY','New Directory');
DEFINE('_JGA_CHANGE_FOLDER','Change Path');
DEFINE('_JGA_PLEASE_SELECT_PICTURES','Please select the pictures ');
DEFINE('_JGA_DELETE_AFTER_UPLOAD','Delete pictures after upload?');
DEFINE('_JGA_JAVA_UPLOAD_MANAGER','Java Upload');
DEFINE('_JGA_JUPLOAD_NOTE', 'I M P O R T A N T &nbsp;&nbsp;&nbsp; N O T I C E ! !<br />To use the Java upload, your browser needs a Java plugin of version 1.5 or higher, otherwise the applet cannot be started. Furthermore, you need to accept the certificate for this applet.');
DEFINE('_JGA_JUPLOAD_YOU_MUST_SELECT_CATEGORY','You must select a category.');
DEFINE('_JGA_JUPLOAD_PICTURE_MUST_HAVE_TITLE','Picture must have a title');

//administrator/components/com_joomgallery/includes/html/admin.votes.html
DEFINE('_JGA_VOTES_MANAGER','Votes Manager');
DEFINE('_JGA_SYNCHRONIZE_VOTES', 'Synchronize votes'); 
DEFINE('_JGA_SYNCHRONIZE_VOTES_LONG', 'Synchronizes all votes with the user table. Votes of deleted users will be purged. WARNING: Deletes all votes that were not previously logged (e.g. when imported from PonyGallery ML)'); 
DEFINE('_JGA_RESET_VOTES', 'Reset votes'); 
DEFINE('_JGA_RESET_VOTES_LONG', 'Resets the votes for all images.');
DEFINE('_JGA_ALERT_RESET_VOTES_CONFIRM', 'Are you sure you want to proceed? Some or all votes might be deleted!');//ALERT

//administrator/components/com_joomgallery/includes/admin.cssedit.php
DEFINE('_JGA_CSS_CANCELED','CSS editing canceled.');//NEW
DEFINE('_JGA_CSS_SAVED','Customized CSS file saved.');//NEW
DEFINE('_JGA_CSS_DELETED','Customized CSS file deleted.');//NEW
DEFINE('_JGA_CSS_ERROR_WRITING','Error trying to write CSS file: ');//NEW
DEFINE('_JGA_CSS_ERROR_DELETING','Error trying to delete CSS file: ');//NEW
DEFINE('_JGA_CSS_ERROR_READING','Error trying to read CSS file: ');//NEW
DEFINE('_JGA_CSS_WARNING_PERMS','Warning: write permissions not available on CSS file!');//NEW

//administrator/components/com_joomgallery/includes/html/admin.cssedit.html.php
DEFINE('_JGA_CSS_MANAGER','Customize CSS');//NEW
DEFINE('_JGA_EDIT_CSS_EXPLANATION','You can edit your current CSS customization for Joomgallery below, or edit the file directly on the server. Using the button in the toobar, you can also delete your customizations, falling back to the default template.');//NEW
DEFINE('_JGA_NEW_CSS_EXPLANATION','You can create a new CSS customization based on the template below, or edit the file directly on the server. Click &quot;Save&quot; when done to create the new customization.');//NEW
DEFINE('_JGA_CSS_CONFIRM_DELETE','Are you sure you want to delete your customized CSS file?'); //ALERT //NEW

//administrator/components/com_joomgallery/includes/admin.categories.php
DEFINE('_JGA_ORDERBY_CATPATH_ASC','ascending by categorypath');  
DEFINE('_JGA_ORDERBY_CATPATH_DESC','descending by categorypath'); 
DEFINE('_JGA_ORDERBY_DBID_ASC','ascending by ID'); 
DEFINE('_JGA_ORDERBY_DBID_DESC','descending by ID'); 
DEFINE('_JGA_ORDERBY_CATNAME_ASC','ascending by category title'); 
DEFINE('_JGA_ORDERBY_CATNAME_DESC','descending by category title'); 
DEFINE('_JGA_ORDERBY_DBOWNERID_ASC','ascending by owner ID'); 
DEFINE('_JGA_ORDERBY_DBOWNERID_DESC','descending by owner ID'); 
DEFINE('_JGA_NOT_PUBLISHED','Not published');
DEFINE('_JGA_USERCATEGORIES_ONLY','Only User-Categories');
DEFINE('_JGA_BACKENDCATEGORIES_ONLY','Only Backend-Categories');
DEFINE('_JGA_PLEASE_SELECT_THUMBNAIL','Select Thumbnail');

//administrator/components/com_joomgallery/includes/admin.comments.php
DEFINE('_JGA_ALERT_SELECT_AN_ITEM','Select an item to');//ALERT
DEFINE('_JGA_ALERT_SELECT_AN_ITEM_TO_DELETE','Select an item to delete');//ALERT

//administrator/components/com_joomgallery/includes/admin.configuration.php
DEFINE('_JGA_EASYCAPTCHA_INSTALLED','EasyCaptcha is installed and should work correctly');
DEFINE('_JGA_EASYCAPTCHA_NOT_INSTALLED','EasyCaptcha does not seem to be installed');
DEFINE('_JGA_GD_INSTALLED_PARTONE','It appears that GD is installed and working properly.  Your system seems to have GD version ');
DEFINE('_JGA_GD_INSTALLED_PARTTWO','. Thumbnails and resizing should work correctly.');
DEFINE('_JGA_GD_NO_VERSION','GD appears to be installed, but we can not verify the version. Check the SYSTEM | SYSTEM INFO | PHP INFO screen in Joomla! 1.0.x or the HELP | SYSTEM INFO | PHP INFORMATION screen in Joomla! 1.5.x to verify your GD installation and version.');//new changed
DEFINE('_JGA_GD_NOT_INSTALLED','GD does not seem to be installed on your system. JoomGallery requires GD in order to create thumbnails or resize your images.  Without GD you will have to manually create your thumbnails and upload them individually.  If you do not intend to use GD, then set GD to None.  If you need help installing GD, refer to ');
DEFINE('_JGA_GD_MORE_INFO',' for more information.');
DEFINE('_JGA_IM_INSTALLED','<b>It seems ImageMagick is installed and should work correctly</b><br />The path has been detected automatically. Leave the field blank. '); 
DEFINE('_JGA_IM_NOT_INSTALLED','Path to ImageMagick. Last sign must be /. Leave this field blank to detect ImageMagick automatically.<br /><b>ImageMagick is not installed on your system. Maybe the path to ImageMagick is not configured properly. In case of doubt ask your webhoster if ImageMagick is installed. Alternatively you can try  GD or GD2.</b>');
DEFINE('_JGA_EXIF_NOT_INSTALLED','Reading of EXIF data is not installed on your server.');//NEW
DEFINE('_JGA_EXIF_INSTALLED','Reading of EXIF data is installed on your server. The EXIF data should be shown properly.');//NEW
DEFINE('_JGA_EXIF_INSTALLED_BUT','Reading of EXIF data is installed on your server but not activated.');//NEW
DEFINE('_JGA_EXIF_NO_OPTIONS','The following options therefore are ineffective. Please contact your system administrator or provider.');//NEW
DEFINE('_JGA_DIRECTORY_WRITEABLE','Directory is writeable');
DEFINE('_JGA_DIRECTORY_UNWRITEABLE','Unable to Write to Directory, check permissions');
DEFINE('_JGA_FILE_EXIST','The file exist');
DEFINE('_JGA_ALERT_FILE_NOT_EXIST','The file does not exist');//ALERT
DEFINE('_JGA_ALERT_THUMBNAIL_PATH_SUPPORT','Thumbnails path must be provided!');//ALERT
DEFINE('_JGA_CSS_NOT_WRITEABLE','Error saving CSS file!'); 
DEFINE('_JGA_CONFIGURATION_WRITEABLE','Config file writeable!');//NEW
DEFINE('_JGA_CONFIGURATION_NOT_WRITEABLE','Config file not writeable!');
DEFINE('_JGA_SETTINGS_SAVED','Settings saved');
DEFINE('_JGA_OF','of');

//administrator/components/com_joomgallery/includes/admin.pictures.php
DEFINE('_JGA_ALL_PICTURES','Show All Pictures');
DEFINE('_JGA_NOT_APPROVED_ONLY','Only Not Approved Pictures');
DEFINE('_JGA_APPROVED_ONLY','Only Approved Pictures');
DEFINE('_JGA_USER_UPLOADED_ONLY','Only User Uploaded Pictures');
DEFINE('_JGA_ADMIN_UPLOADED_ONLY','Only Admin Uploaded Pictures');
DEFINE('_JGA_SELECT_CATEGORY ','Choose Category');
DEFINE('_JGA_ALERT_PLEASE_SELECT_CATEGORY','Please choose a category!');//ALERT

//administrator/components/com_joomgallery/includes/admin.uploads.php
DEFINE('_JGA_ALERT_YOU_MUST_SELECT_ONE_PICTURE','Please select a picture.');  //ALERT
DEFINE('_JGA_ALERT_WRONG_EXTENSION','Wrong Filetype!\nOnly .jpg, .jpeg, .jpe, .gif und .png are acceptable.'); //ALERT
DEFINE('_JGA_ALERT_WRONG_FIILENAME','No special characters are allowed in this field. \n a-z, A-Z, -, and _ are acceptable.'); //ALERT
DEFINE('_JGA_ALERT_FILENAME_DOUBLE1','Identical Files!\nIn field'); //ALERT
DEFINE('_JGA_ALERT_FILENAME_DOUBLE2','and field'); //ALERT
DEFINE('_JGA_ALERT_YOU_MUST_SELECT_ONE_FILE','Please select a file.'); //ALERT
DEFINE('_JGA_ALERT_WRONG_VALUE','Incorrect entry in field!'); //ALERT

//administrator/components/com_joomgallery/includes/admin.votes.php
DEFINE('_JGA_USERVOTES_SYNCHRONIZED','All votes are now in sync with the users'); 
DEFINE('_JGA_ALL_VOTES_DELETED','All votes deleted!'); 

//administrator/components/com_joomgallery/admin.joomgallery.html.php
DEFINE('_JGA_ADMINMENU','JoomGallery Admin-Menu');

//administrator/components/com_joomgallery/common.joomgallery.php
DEFINE('_JG_FILE_NOT_FOUND','ERROR: Source file not found!');
DEFINE('_JG_GD_ONLY_JPG_PNG','ERROR: GD can only handle JPG and PNG files!');
DEFINE('_JG_RESIZE_TO_MAX','Resizing to max width...');
DEFINE('_JG_CREATE_THUMBNAIL_FROM','Creating thumbnail from');
DEFINE('_JG_GD_LIBARY_NOT_INSTALLED','GD image library not installed!');
DEFINE('_JG_GD_NO_TRUECOLOR','GD image library does not support truecolor thumbnailing!');
DEFINE('_JG_NEW_ORDERING_SAVED','New ordering saved');
DEFINE('_JG_HOME','Home');
DEFINE('_JG_PAGE','Page'); 

//administrator/components/com_joomgallery/install.joomgallery.php
DEFINE('_JGA_JOOMGALLERY_SUCCESSFULLY_INSTALLED','JoomGallery was installed succesfull.');

//administrator/components/com_joomgallery/joomgallery.class.php
DEFINE('_JGA_SELECT_AN_ITEM_TO_MOVE','Please make a selection from the list to move!'); 

//administrator/components/com_joomgallery/toolbar.joomgallery.html.php
DEFINE('_JGA_TOOLBAR_PUBLISH','Publish');
DEFINE('_JGA_TOOLBAR_UNPUBLISH','Unpublish');
DEFINE('_JGA_TOOLBAR_NEW','New');
DEFINE('_JGA_TOOLBAR_EDIT','Edit');
DEFINE('_JGA_TOOLBAR_REMOVE','Remove');
DEFINE('_JGA_TOOLBAR_CPANEL','CPanel');
DEFINE('_JGA_TOOLBAR_HELP','Help');
DEFINE('_JGA_TOOLBAR_APPROVE','Approve');
DEFINE('_JGA_TOOLBAR_SAVE','Save');
DEFINE('_JGA_TOOLBAR_CANCEL','Cancel');
DEFINE('_JGA_TOOLBAR_MOVE','Move');
DEFINE('_JGA_TOOLBAR_PUBLISH_COMMENT','Publish Comment');
DEFINE('_JGA_TOOLBAR_UNPUBLISH_COMMENT','Unpublish Comment');
DEFINE('_JGA_TOOLBAR_APPROVE_COMMENT','Approve Comment');
DEFINE('_JGA_TOOLBAR_REMOVE_COMMENT','Remove Comment');
DEFINE('_JGA_TOOLBAR_DEL_CSS','Delete CSS');//NEW

//Errors
DEFINE('_JGA_ALERT_ERROR_BR','\n');//ALERT //PLEASE DO NOT CHANGE THIS LINE
DEFINE('_JGA_ALERT_ERROR','An error occured!\n');//ALERT
DEFINE('_JGA_ALERT_ERROR_NUMBER','Error-Number: ');//ALERT
DEFINE('_JGA_ALERT_ERROR_BREAK','The whole process has been stopped!');//ALERT
DEFINE('_JGA_ALERT_ERROR_CATID','Category-ID: ');//ALERT
DEFINE('_JGA_ALERT_ERROR_DIRECTORY','Directory: ');//ALERT
DEFINE('_JGA_ALERT_ERROR_NAME','Name: ');//ALERT
DEFINE('_JGA_ALERT_ERROR_SEE_FAQS','For more information about this error please visit our FAQs: ');//ALERT
DEFINE('_JGA_ALERT_ERROR_NOTE','If the FAQ will not help please note the error-number and any possibly given information above and visit our Support-Forum: ');//ALERT
DEFINE('_JGA_ALERT_ERROR_FORUM','http://www.forum.en.joomgallery.net/');//ALERT //PLEASE DO NOT CHANGE THIS LINE
DEFINE('_JGA_ALERT_ERROR_FAQ','http://www.en.joomgallery.net/faq/errors/error');//ALERT //PLEASE DO NOT CHANGE THIS LINE
DEFINE('_JGA_ALERT_ERROR_HTML','.html');//ALERT //PLEASE DO NOT CHANGE THIS LINE
DEFINE('_JGA_ALERT_ERROR_0','Error already not defined!');//ALERT 
DEFINE('_JGA_ALERT_ERROR_1001','The category with the below given ID could not be deleted because there are still pictures or subcategories inside. Please first delete/move all pictures or subcategories.');//ALERT

?>
