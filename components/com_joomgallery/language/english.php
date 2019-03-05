<?php
// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/language/english.php $
// $Id: english.php 892 2008-12-31 14:21:06Z mab $
/******************************************************************************\
**   JoomGallery  1.0                                                        **
**   By: JoomGallery::ProjectTeam                                            **
**   Copyright (C) 2008  M. Andreas Boettcher                                **
**   Based on: PonyGallery ML 2.5.1 by PonyGallery-ML-Team                   **
**   Released under GNU GPL Public License                                   **
**   License: http://www.gnu.org/copyleft/gpl.html or have a look            **
**   at administrator/components/com_joomgallery/LICENSE.TXT                 **
\******************************************************************************/

#### Original Copyright ########################################################
## PonyGallery ML 2.5.1                                                       ##
## By: M. Andreas Boettcher & Benjamin Malte Meier                            ##
## & Andreas Hartmann & The ML-Team                                           ##
## Copyright (C) 2007 M. Andreas Boettcher, All rights reserved.              ##
## Released under GNU GPL Public License                                      ##
################################################################################


/*     English language for the Frontend
**     By: tante.thekla
**     mailto:uk@ukm-edv-service.de
**     last modified on 11/28/2008
**
*/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//components/com_joomgallery/classes/modules.class.php
DEFINE('_JGS_ALERT_NO_DETAILVIEW_FOR_GUESTS','Guests are not allowed to view picture details. Please login.');//ALERT
DEFINE('_JGS_CATEGORY','Category');
DEFINE('_JGS_DESCRIPTION','Description');
DEFINE('_JGS_UPLOAD_DATE','Upload date ');
DEFINE('_JGS_HITS','Hits');
DEFINE('_JGS_RATING','Rating');
DEFINE('_JGS_NO_RATINGS','No Ratings');
DEFINE('_JGS_LAST_COMMENT_DATE','Latest comment on ');
DEFINE('_JGS_NUMBER_OF_COMMENTS','Number of comments ');
DEFINE('_JGS_LAST_COMMENT_BY','left from ');

//components/com_joomgallery/classes/upload.class.php
DEFINE('_JGS_YOU_ARE_NOT_LOGGED','You are not logged in.');//ALERT
DEFINE('_JGS_ALERT_MAX_ALLOWED_FILESIZE','Error: Max allowed file size is ');//ALERT
DEFINE('_JGS_ALERT_BYTES',' bytes');//ALERT
DEFINE('_JGS_ALERT_SAME_PICTURE_ALREADY_EXIST','An image with the same name already exists, please choose another name for your file and then try again');//ALERT
DEFINE('_JGS_UPLOAD_COMPLETE','Upload complete...');
DEFINE('_JGS_PROBLEM_COPYING','Problem copying file to: ');
DEFINE('_JGS_CHECK_PERMISSIONS','Check permissions.');
DEFINE('_JGS_THUMBNAIL_CREATED','Thumbnail created...');
DEFINE('_JGS_RESIZED_TO_MAXWIDTH','Resize to maximum width complete...');
DEFINE('_JGS_ORIGINAL_DELETED','The picture has been deleted from the directory containing the original files.');
DEFINE('_JGS_PROBLEM_DELETING_ORIGINAL','The picture could not be deleted from the directory containing the original files.');
DEFINE('_JGS_APPROVED_OWNER_PUBLISHED','approved owner published');
DEFINE('_JGS_NEW_PICTURE_UPLOADED','New Picture Uploaded');//ALERT
DEFINE('_JGS_NEW_CONTENT_SUBMITTED','A new content item has been submitted by');//ALERT
DEFINE('_JGS_TITLED','titled');//ALERT
DEFINE('_JGS_ALERT_PICTURE_SUCCESSFULLY_ADDED','Picture successfully added');//ALERT
DEFINE('_JGS_NEW_FILENAME','New Filename');
DEFINE('_JGS_WRONG_FILENAME','Filename bad, or unable to copy uploaded image to originals directory.');
DEFINE('_JGS_ALERT_INVALID_IMAGE_TYPE','Invalid Image Type');//ALERT
DEFINE('_JGS_MORE_UPLOADS','Upload more Pictures');
DEFINE('_JGS_BACK_TO_USER_PANEL','Back to &quot;My Gallery&quot;');
DEFINE('_JGS_BACK_TO_GALLERY','Back to Gallery Overview');

//components/com_joomgallery/includes/html/joom.comments.html.php
DEFINE('_JGS_ALERT_COMMENT_DELETED','The Comment has been deleted.');//ALERT
DEFINE('_JGS_AUTHOR','Author');
DEFINE('_JGS_COMMENT','Comment');
DEFINE('_JGS_COMMENT_ADDED','Comment added on');
DEFINE('_JGS_DELETE_COMMENT','Delete&nbsp;Comment');
DEFINE('_JGS_BACK','Back');

//components/com_joomgallery/includes/html/joom.favourites.html.php
DEFINE('_JGS_FAV_HEADING','My Favourites');//NEW
DEFINE('_JGS_ZIP_HEADING','Images chosen for the zip download');//NEW
DEFINE('_JGS_FAV_SWITCH_LAYOUT','Switch layout');//NEW
DEFINE('_JGS_FAV_REMOVE_ALL','Clear list');//NEW
DEFINE('_JGS_FAV_REMOVE_TOOLTIP_CAPTION','Remove image from your favourites');//NEW
DEFINE('_JGS_ZIP_REMOVE_TOOLTIP_CAPTION','Remove image from your download list');//NEW
DEFINE('_JGS_FAV_REMOVE_TOOLTIP_TEXT','Here you can remove this image from your favourites.');//NEW
DEFINE('_JGS_ZIP_REMOVE_TOOLTIP_TEXT','Here you can remove this image from your list for the zip download.');//NEW
DEFINE('_JGS_FAV_NO_PICS','You have not marked any image');//NEW
DEFINE('_JGS_ZIP_NO_PICS','You have not chosen any image');//NEW
DEFINE('_JGS_FAV_DOWNLOAD','Download Zipfile');//NEW
DEFINE('_JGS_ZIP_DOWNLOAD','Download Zipfile');//NEW
DEFINE('_JGS_ZIP_CREATE_TOOLTIP_TEXT','Please click here to generate a zipfile with all listed images which you can download afterwards.');//NEW
DEFINE('_JGS_ZIP_DOWNLOAD_READY','You can now download the zipfile here.');//NEW
DEFINE('_JGS_ZIP_DOWNLOAD_ERROR','An error occurred:');//NEW
DEFINE('_JGS_ZIP_FILESIZE_PART_ONE','It has a filesize of about');//NEW
DEFINE('_JGS_ZIP_FILESIZE_PART_TWO','.');//NEW
DEFINE('_JGS_FAV_CREATEZIP_REMOVE_ALL','If you want to remove all images from your favourites please click here.');//NEW
DEFINE('_JGS_ZIP_CREATEZIP_REMOVE_ALL','If you want to remove all images from your list for the zip download please click here.');//NEW

//components/com_joomgallery/includes/html/joom.userpanel.html.php
DEFINE('_JGS_DISPLAY','Display');//NEW
DEFINE('_JGS_NEW_PICTURE','New picture');
DEFINE('_JGS_PICTURE_NAME','Picture Name');
DEFINE('_JGS_ACTION','Action');
DEFINE('_JGS_APPROVED','Approved');
DEFINE('_JGS_ALERT_SURE_DELETE_SELECTED_ITEM','Are you sure you want to delete selected item?');//ALERT
DEFINE('_JGS_DELETE','Delete');
DEFINE('_JGS_YOU_DO_NOT_HAVE_PICTURE','You do not have any pictures.');
DEFINE('_JGS_NEW_CATEGORY_NOTE','Limits:');
DEFINE('_JGS_NEW_CATEGORY_MAXCOUNT','Maximal number of categories, you can create: ');
DEFINE('_JGS_NEW_CATEGORY_YOURCOUNT','Number of categories you have already created: ');
DEFINE('_JGS_NEW_CATEGORY_REMAINDER','Number of categories left that can be created: ');
DEFINE('_JGS_NEW_CATEGORY','New category');
DEFINE('_JGS_PICTURES','pictures');
DEFINE('_JGS_PARENT_CATEGORY','Parent Category');
DEFINE('_JGS_ACCESS','Access');
DEFINE('_JGS_PUBLISHED','Published');
DEFINE('_JGS_EDIT','Edit');
DEFINE('_JGS_YOU_NOT_HAVE_CATEGORY','You do not have any category.');
DEFINE('_JGS_ALERT_CATEGORY_MUST_HAVE_TITLE','Category must have a title');//ALERT
DEFINE('_JGS_MODIFY_CATEGORY','Edit category');
DEFINE('_JGS_TITLE','Title');
DEFINE('_JGS_ORDERING','Ordering');
DEFINE('_JGS_THUMBNAIL','Thumbnail');
DEFINE('_JGS_THUMBNAIL_PREVIEW','Thumbnail Preview');
DEFINE('_JGS_SAVE','Save');
DEFINE('_JGS_CANCEL','Cancel');
DEFINE('_JGS_ALERT_MAY_ADD_MAX_OF_PARTONE','You may add a maximum of');//ALERT
DEFINE('_JGS_ALERT_MAY_ADD_MAX_OF_PARTTWO','pictures. Contact the administrator if you want to upload more pictures.');//ALERT
DEFINE('_JGS_NEW_PICTURE_COPYRIGHT','<b>COPYRIGHT NOTICE:</b> <br /><div align="justify">The owner of this website grants you the right to upload pictures on the server that will then be visible to and accessible by the public. Pictures underlie copyrights and third party rights. Solely upload pictures that you have taken yourself and that are certainly free of third party rights. The owner of the website rejects any responsiblility for pictures uploaded by you and will pass on all third party claims that subject copyright violation or other forms of misuse. By uploading picture you give your explicit consent to this agreement.</div>');
DEFINE('_JGS_NEW_PICTURE_NOTE','Upload Quota:');
DEFINE('_JGS_NEW_PICTURE_MAXSIZE','Maximum size of single pictures to be uploaded: ');
DEFINE('_JGS_BYTES',' bytes');
DEFINE('_JGS_NEW_PICTURE_MAXCOUNT','Maximum number of pictures that you can upload: ');
DEFINE('_JGS_NEW_PICTURE_YOURCOUNT','Number of pictures you have already uploaded: ');
DEFINE('_JGS_NEW_PICTURE_REMAINDER','Number of pictures left that can be uploaded: ');
DEFINE('_JGS_AUTHOR_OWNER','Author/Owner');
DEFINE('_JGS_PICTURE_PATH','Path to the picture');
DEFINE('_JGS_DELETE_ORIGINAL_AFTER_UPLOAD','Delete pictures from the original folder after upload');
DEFINE('_JGS_CREATE_SPECIAL_GIF','Transparent or animated picture files?');
DEFINE('_JGS_UPLOAD','Upload');
DEFINE('_JGS_DELETE_ORIGINAL_AFTER_UPLOAD_ASTERISK','Choosing this option will delete the original files from the server after they have been uploaded. Only choose this if you run short of server space. Although the thumbnail and the detailed picture are left untouched from this option the popup will no longer be displayed.');
DEFINE('_JGS_CREATE_SPECIAL_GIF_ASTERISK','This option allows the upload of special picture files. Solely choose this option in case your upload exclusively consists of animated or transparent .png or .gif files. Keep in mind that the files do not get resized and therefore are displayed full size in detail view!');
DEFINE('_JGS_EDIT_PICTURE','Edit Picture');
DEFINE('_JGS_PICTURE','Picture');

//components/com_joomgallery/includes/html/joom.viewcategory.html.php
DEFINE('_JGS_USER_ORDERBY','Sort by ');
DEFINE('_JGS_USER_ORDERBY_DEFAULT','General Settings');
DEFINE('_JGS_USER_ORDERBY_DATE','Date');
DEFINE('_JGS_USER_ORDERBY_AUTHOR','Author');
DEFINE('_JGS_USER_ORDERBY_TITLE','Title');
DEFINE('_JGS_USER_ORDERBY_HITS','Number of Hits');
DEFINE('_JGS_USER_ORDERBY_RATING','Rating');
DEFINE('_JGS_USER_ORDERBY_ASC','ascending');
DEFINE('_JGS_USER_ORDERBY_DESC','descending');
DEFINE('_JGS_NO_DATA','No Data');
DEFINE('_JGS_ONE_VOTE',' Vote');//NEW
DEFINE('_JGS_VOTES',' Votes');
DEFINE('_JGS_NO_VOTES','No Votes');
DEFINE('_JGS_COMMENTS','Comments');
DEFINE('_JGS_SUBCATEGORIES','Sub-Categories');
DEFINE('_JGS_SPECIAL_MEMBERS','[SM]');
DEFINE('_JGS_REGISTERED_MEMBERS','[RM]');
DEFINE('_JGS_THERE_IS','There is');
DEFINE('_JGS_PICTURE_IN_CATEGORY','picture in this category.');
DEFINE('_JGS_THERE_ARE','There are');
DEFINE('_JGS_PICTURES_IN_CATEGORY','pictures in this category.');
DEFINE('_JGS_PAGENAVIGATION_BEGIN','Start');
DEFINE('_JGS_PAGENAVIGATION_PREVIOUS','Prev');
DEFINE('_JGS_PAGENAVIGATION_NEXT','Next');
DEFINE('_JGS_PAGENAVIGATION_END','End');
DEFINE('_JGS_SUBCATEGORY_IN_CATEGORY','Sub-category in this category');
DEFINE('_JGS_SUBCATEGORIES_IN_CATEGORY','Sub-categories in this category');
DEFINE('_JGS_COOLIRISLINK_TEXT','Start Cooliris!');//NEW

//components/com_joomgallery/includes/html/joom.viewdetails.html.php
DEFINE('_JGS_PREVIOUS_IMAGE','Previous');
DEFINE('_JGS_OF','of');
DEFINE('_JGS_PICTUREDETAILS','Picture information');//NEW
DEFINE('_JGS_SLIDESHOW','SlideShow');
DEFINE('_JGS_START','Start');
DEFINE('_JGS_PAUSE','Pause');
DEFINE('_JGS_STOP','Stop');
DEFINE('_JGS_REPEAT_ENDLESS','Repeat endlessly');
DEFINE('_JGS_SLIDESHOW_NO_SCRIPT','[Please activate JavaScript in order to see the slideshow]');//NEW
DEFINE('_JGS_NEXT_IMAGE','Next');
DEFINE('_JGS_DATE','Date');
DEFINE('_JGS_FILESIZE','Filesize');
DEFINE('_JGS_FILESIZE_ORIGINAL','File size of the original picture');
DEFINE('_JGS_FULLSIZE_TOOLTIP_TEXT','Click the magnifying glass to display the picture in original size in a new window.');
DEFINE('_JGS_FULLSIZE_TOOLTIP_CAPTION','View full size');
DEFINE('_JGS_FULLSIZE_TOOLTIP_TEXT_LOGIN','You need to login to view the full size picture!');
DEFINE('_JGS_DOWNLOAD_TOOLTIP_TEXT','Click to download the image.'); 
DEFINE('_JGS_DOWNLOAD_TOOLTIP_CAPTION','Download');
DEFINE('_JGS_DOWNLOAD_TOOLTIP_TEXT_LOGIN','You need to login to download the image!'); 
DEFINE('_JGS_NAMESHIELD_TOOLTIP_TEXT','If you spot yourself in a picture you may add a name tag to it. The name tag is already visible in the top left corner of the picture. Use your mouse to drag it to the desired place within the picture. Make sure you do not cover any existing name tags! Existing name tags have priority and will cover the ones added later! Once you positioned your name tag click on this link. You can remove the tag anytime.');
DEFINE('_JGS_NAMESHIELD_TOOLTIP_CAPTION','Save my name tag');
DEFINE('_JGS_ALERT_SURE_DELETE_NAMESHIELD_','Are you sure you want to remove your name tag?');//ALERT
DEFINE('_JGS_NAMESHIELD_DELETE_TOOLTIP_TEXT','You can remove your name tag by clicking this link. After it has been removed you can add a new one.');
DEFINE('_JGS_NAMESHIELD_DELETE_TOOLTIP_CAPTION','Remove my name tag');
DEFINE('_JGS_NAMESHIELD_UNREGISTERED_TOOLTIP_TEXT','Only registered users are permitted to add name tags. Please register!');
DEFINE('_JGS_NAMESHIELD_UNREGISTERED_TOOLTIP_CAPTION','Add my name tag?');
DEFINE('_JGS_BBCODE_SHARE','Share this image in Forums (BBcode)'); 
DEFINE('_JGS_BBCODE_IMG','Include image'); 
DEFINE('_JGS_BBCODE_LINK','Link image'); 
DEFINE('_JGS_PICTURE_RATING','Picture Rating');
DEFINE('_JGS_LOGIN_FIRST','Please login first...');
DEFINE('_JGS_NO_RATING_ON_OWN_PICTURES','You can not vote for your own pictures!');
DEFINE('_JGS_BAD','Bad');
DEFINE('_JGS_GOOD','Good');
DEFINE('_JGS_VOTE','Vote!');
DEFINE('_JGS_BBCODE_OFF','off');
DEFINE('_JGS_BBCODE_ON','on');
DEFINE('_JGS_GUEST','Guest');
DEFINE('_JGS_BBCODE_IS','BBCode is');
DEFINE('_JGS_ENTER_CODE','Please enter picture code:');
DEFINE('_JGS_SEND','Send');
DEFINE('_JGS_COMMENT_SEND','Post comment');//NEW
DEFINE('_JGS_EMAILSEND','Send Email');//NEW 
DEFINE('_JGS_EXISTING_COMMENTS','Comments for this picture');//NEW 
DEFINE('_JGS_NO_EXISTING_COMMENTS','There are not any comments for this picture yet.');//NEW 
DEFINE('_JGS_WRITE_FIRST_COMMENT','Post the first comment!');//NEW 
DEFINE('_JGS_NO_COMMENTS_FOR_UNREG', 'Comments are not shown to unregistered users. Please register');//NEW 
DEFINE('_JGS_NEW_COMMENT','Post new comment');//NEW
DEFINE('_JGS_NO_COMMENTS_BY_GUEST','Guests are not allowed to post comments. Please register...');
DEFINE('_JGS_SEND_TO_FRIEND','Send to Friend');
DEFINE('_JGS_YOUR_NAME','Your Name');
DEFINE('_JGS_YOUR_MAIL','Your Email');
DEFINE('_JGS_FRIENDS_NAME','Your Friend\'s Name');
DEFINE('_JGS_FRIENDS_MAIL','Your Friend\'s Email');
DEFINE('_JGS_FAV_ADD_PICTURE_TOOLTIP_CAPTION','Add image to favourites');//NEW
DEFINE('_JGS_ZIP_ADD_PICTURE_TOOLTIP_CAPTION','Add image to list of zip download');//NEW
DEFINE('_JGS_FAV_ADD_PICTURE_TOOLTIP_TEXT','Here you can add this image to your favourites. With the link <i>My Favourites</i> you can see all images chosen by you.');//NEW
DEFINE('_JGS_ZIP_ADD_PICTURE_TOOLTIP_TEXT','Here you can add this image to your list for the zip download. With the link <i>Zip Download</i> you can see all chosen images and download them in a zipfile.');//NEW
DEFINE('_JGS_FAV_ADD_PICTURE_NOT_ALLOWED_TOOLTIP_TEXT','Sorry, you have not enough rights to use the favourites function.');//NEW
DEFINE('_JGS_ZIP_ADD_PICTURE_NOT_ALLOWED_TOOLTIP_TEXT','Sorry, you have not enough rights to use the favourites function.');//NEW

//components/com_joomgallery/includes/html/joom.viewspecial.html.php
DEFINE('_JGS_NO_COMMENTS','No Comments');
DEFINE('_JGS_WROTE','wrote');
DEFINE('_JGS_AT','on');

//components/com_joomgallery/includes/html/joom.viewusergalleries.html.php
DEFINE('_JGS_USERNAME','Username');
DEFINE('_JGS_CATEGORIES','Categories');
DEFINE('_JGS_NUMB_HITS','Number of Hits');
DEFINE('_JGS_TO_GALLERY','To Gallery');

//components/com_joomgallery/includes/joom.comments.php
DEFINE('_JGS_ALERT_NEW_COMMENT','New Comment');//ALERT
DEFINE('_JGS_ALERT_NEW_COMMENT_MESSAGE_PARTONE','A new comment from ');//ALERT
DEFINE('_JGS_ALERT_NEW_COMMENT_MESSAGE_PARTTWO',' has been submitted. This comment needs to be approved before it can be published.');//ALERT
DEFINE('_JGS_ALERT_COMMENT_SAVED','Your comment has been saved.');//ALERT
DEFINE('_JGS_ALERT_COMMENT_SAVED_BUT_NEEDS_ARROVAL','Your comment has been saved, but needs to be approved by admin'); //ALERT
DEFINE('_JGS_ALERT_SECURITY_CODE_WRONG','The entered security code (CAPTCHA) is wrong!');//Alert

//components/com_joomgallery/includes/joom.favourites.php
DEFINE('_JGS_FAV_ALREADY_IN','This image is already marked as one of your favourites.');//NEW
DEFINE('_JGS_ZIP_ALREADY_IN','This image is already in your list for the zip download.');//NEW
DEFINE('_JGS_FAV_ALREADY_MAX','Sorry, you have already marked the maximum number of images as favourites.');//NEW
DEFINE('_JGS_ZIP_ALREADY_MAX','Sorry, you have already the maximum number of images in your list for the zip download.');//NEW
DEFINE('_JGS_FAV_SUCCESSFULLY_ADDED','This image was successfully added to your favourites.');//NEW
DEFINE('_JGS_ZIP_SUCCESSFULLY_ADDED','This image was successfully added to your list for the zip download.');//NEW
DEFINE('_JGS_FAV_NOT_IN','This image isn\'t marked as one of your favourites.');//NEW
DEFINE('_JGS_ZIP_NOT_IN','This image isn\'t in your list for the zip download.');//NEW
DEFINE('_JGS_FAV_SUCCESSFULLY_REMOVED','This image was successfully removed from your favourites.');//NEW
DEFINE('_JGS_ZIP_SUCCESSFULLY_REMOVED','This image was successfully removed from your list for the zip download.');//NEW
DEFINE('_JGS_FAV_ALL_REMOVED','All images were removed from your favourites.');//NEW
DEFINE('_JGS_ZIP_ALL_REMOVED','All images were removed from your list for the zip download.');//NEW
DEFINE('_JGS_FAV_NOT_ALLOWED','Zip download is not allowed.');//NEW
DEFINE('_JGS_FAV_ZIPLIBRARY_NOT_FOUND','PCL-Zip-Library was not found -> Zip download not possible');//NEW
DEFINE('_JGS_FAV_NO_PICTURES','You haven\'t any images marked as your favourites.');//NEW
DEFINE('_JGS_ZIP_NO_PICTURES','You haven\'t any images in your list for the zip download.');//NEW

//components/com_joomgallery/includes/joom.javascript.php
DEFINE('_JGS_ALERT_YOU_MUST_SELECT_CATEGORY','You must select a category.');//ALERT
DEFINE('_JGS_ALERT_YOU_MUST_SELECT_ONE_FILE','Please select a file.'); //ALERT
DEFINE('_JGS_ALERT_PICTURE_MUST_HAVE_TITLE','Picture must have a title');//ALERT
DEFINE('_JGS_ALERT_FILENAME_DOUBLE1','Identical Files!\nIn field'); //ALERT
DEFINE('_JGS_ALERT_FILENAME_DOUBLE2','and field'); //ALERT
DEFINE('_JGS_ALERT_WRONG_FIILENAME','No special characters are allowed in this field. \n a-z, A-Z, -, and _ are acceptable.'); //ALERT
DEFINE('_JGS_ALERT_WRONG_EXTENSION','Wrong Filetype!\nOnly .jpg, .jpeg, .jpe, .gif and .png are acceptable.'); //ALERT
DEFINE('_JGS_ALERT_YOU_MUST_SELECT_ONE_PICTURE','Please select a picture.');  //ALERT
DEFINE('_JGS_ALERT_ENTER_NAME_EMAIL','Please enter name and email!');//ALERT
DEFINE('_JGS_ALERT_ENTER_COMMENT','Please enter your comment!');  //ALERT
DEFINE('_JGS_ALERT_ENTER_CODE','Please enter picture code!');//Alert
DEFINE('_JGS_CLOSE','Close');
DEFINE('_JGS_PREVIOUS',' Previous');
DEFINE('_JGS_NEXT','Next');
DEFINE('_JGS_ESC','(Esc)');

//components/com_joomgallery/includes/joom.nameshields.php
DEFINE('_JGS_ALERT_NAMESHIELD_NOT_SAVED','Your name tag can not be saved because it is located in a reserved area (start position for all name tags) on the top left of the picture. Please choose a different location outside the reserved area.');//ALERT
DEFINE('_JGS_ALERT_NAMESHIELD_SAVED','Your name tag has successfully been added to the picture');//ALERT
DEFINE('_JGS_ALERT_NAMESHIELD_DELETED','Your name tag has successfully been removed from the picture.');//ALERT

//components/com_joomgallery/includes/joom.slideshow.php
DEFINE('_JGS_GO_ON','Continue');
DEFINE('_JGS_ALERT_ONCE_AGAIN','Once again?'); //ALERT

//components/com_joomgallery/includes/joom.specialimages.php
DEFINE('_JGS_ALERT_NOT_ALLOWED_VIEW_PICTURE','You are not allowed to view this picture!');//ALERT
DEFINE('_JGS_ALERT_FILE_NOT_EXIST','The picture does not exist!'); //ALERT

//components/com_joomgallery/includes/joom.userpanel.php
DEFINE('_JGS_USER_ORDERBY_DATE_ASC','ascending by Upload-Date');
DEFINE('_JGS_USER_ORDERBY_DATE_DESC','descending by Upload-Date');
DEFINE('_JGS_USER_ORDERBY_TITLE_ASC','ascending by Picture-Title');
DEFINE('_JGS_USER_ORDERBY_TITLE_DESC','descending by Picture-Title');
DEFINE('_JGS_USER_ORDERBY_HITS_ASC','ascending by Hits');
DEFINE('_JGS_USER_ORDERBY_HITS_DESC','descending by Hits');
DEFINE('_JGS_USER_ORDERBY_CATNAME_ASC','ascending by Category-Name');
DEFINE('_JGS_USER_ORDERBY_CATNAME_DESC','descending by Category-Name');
DEFINE('_JGS_ALL','All');
DEFINE('_JGS_APPROVED_ONLY','only approved');
DEFINE('_JGS_NOT_APPROVED_ONLY','only not approved');
DEFINE('_JGS_NO','No');
DEFINE('_JGS_YES','Yes');
DEFINE('_JGS_SELECT_THUMBNAIL','Select Thumbnail');
DEFINE('_JGS_ERROR_DELETING_CATEGORY_DIRECTORY','An error occured when trying to delete the category directory!');
DEFINE('_JGS_ERROR_DELETING_CATEGORY_DATABASE_ENTRY','An error occured when trying to delete the category in the database!'); 
DEFINE('_JGS_SUCCESS_DELETING_CATEGORY','Category successfully deleted.'); 
DEFINE('_JGS_ALERT_NOT_ALLOWED_TO_EDIT_PICTURE','You are not allowed to edit this picture');//ALERT
DEFINE('_JGS_ALERT_PICTURE_SUCCESSFULLY_UPDATED','Picture successfully updated');//ALERT
DEFINE('_JGS_ALERT_NOT_ALLOWED_DELETE_PICTURE','You are not allowed to delete this picture');//ALERT
DEFINE('_JGS_COULD_NOT_DELETE_THUMBNAIL_FILE','could not delete the image thumbnail file');
DEFINE('_JGS_COULD_NOT_DELETE_PICTURE_FILE','Could not delete the image file');
DEFINE('_JGS_ALERT_PICTURE_AND_COMMENTS_DELETED','Picture and related comments and nametags were successfully deleted.');//ALERT

//components/com_joomgallery/includes/joom.viewdetails.php
DEFINE('_JGS_ALERT_NOPICTURE_OR_NOTAPPROVED','Picture does not exist anymore or is not yet approved by administrators!');//ALERT
DEFINE('_JGS_NO_ORIGINAL_FILE','Original picture is not available!');

//components/com_joomgallery/includes/joom.viewspecial.php
DEFINE('_JGS_SEARCH_RESULTS','Search results for');
DEFINE('_JGS_TOP','TOP');
DEFINE('_JGS_LAST_COMMENTED_PICTURE','last commented pictures');
DEFINE('_JGS_LAST_ADDED_PICTURE','last added pictures');
DEFINE('_JGS_BEST_RATED_PICTURE','best rated pictures');
DEFINE('_JGS_MOST_VIEWED_PICTURE','most viewed pictures');

//components/com_joomgallery/includes/joom.viewusergalleries.php
DEFINE('_JGS_NO_USERGALLERIES','No usergalleries available.');
DEFINE('_JGS_NO_PICTURES_IN_USERGALLERIES','No pictures in usergalleries available.');

//components/com_joomgallery/includes/joom.votepic.php
DEFINE('_JGS_ALERT_YOUR_VOTE_NOT_COUNTED','You can only vote once for every picture! Your rating has not been counted.');
DEFINE('_JGS_ALERT_YOUR_VOTE_COUNTED','Your vote has been counted.');//ALERT

//components/com_joomgallery/joomgallery.html.php
DEFINE('_JGS_GALLERY','Gallery');
DEFINE('_JGS_USER_PANEL','User Panel');
DEFINE('_JGS_USERGALLERIES','Usergalleries');
DEFINE('_JGS_REGISTERED_MEMBERS_LONG','Registered Members');
DEFINE('_JGS_SPECIAL_MEMBERS_LONG','Special Members');
DEFINE('_JGS_SEARCH','Search gallery...');
DEFINE('_JGS_NUMB_PICTURES_ALL','Total pictures in all categories: ');
DEFINE('_JGS_NUMB_HITS_ALL_PICTURES','Total number of hits on all pictures: ');
DEFINE('_JGS_TOP_RATED','Top Rated');
DEFINE('_JGS_LAST_ADDED','Last Added');
DEFINE('_JGS_LAST_COMMENTED','Last Commented');
DEFINE('_JGS_MOST_VIEWED','Most Viewed');
DEFINE('_JGS_CATEGORY_IN_GALLERY','category in this gallery.');
DEFINE('_JGS_CATEGORIES_IN_GALLERY','categories in this gallery.');
DEFINE('_JGS_BACK_TO_CATEGORY','Back to Category Overview');
DEFINE('_JGS_FAV_MY','My Favourites');//NEW
DEFINE('_JGS_ZIP_MY','Zip Download');//NEW
DEFINE('_JGS_FAV_DOWNLOAD_TOOLTIP_TEXT','Here you can see all your favourite images. In order to add an image to your favourites you have to click on the respective symbol near to the image.');//NEW
DEFINE('_JGS_ZIP_DOWNLOAD_ALLOWED_TOOLTIP_TEXT','You are then able to download these images all together in a zipfile, too.');//NEW
DEFINE('_JGS_ZIP_DOWNLOAD_TOOLTIP_TEXT','Here you can see all the images chosen by you for the zip download (These images can be downloaded all together in a zipfile). In order to add an image to this list you have to click on the respective symbol near to the image.');//NEW
DEFINE('_JGS_FAV_DOWNLOAD_NOT_ALLOWED_TOOLTIP_TEXT','Sorry, you have not enough rights to use the favourites function.');//NEW
DEFINE('_JGS_ZIP_DOWNLOAD_NOT_ALLOWED_TOOLTIP_TEXT','Sorry, you have not enough rights to use the zip download.');//NEW

//components/com_joomgallery/joomgallery.php
DEFINE('_JGS_ALERT_YOU_NOT_ACCESS_THIS_DIRECTORY','You are not allowed to access this directory');//ALERT
DEFINE('_JGS_INVITE_YOU_VIEW_PICTURE','has invited you to view a picture. Please use the link below to display it.');
DEFINE('_JGS_RECOMMENDED_PICTURE_FROM_FRIEND',' A recommended Picture from your friend');
DEFINE('_JGS_MAIL_SENT','Mail was sent...');//ALERT

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

//mod_joomimage
DEFINE('_JGS_JOOMGALLERY_NOT_INSTALLED','The JoomGallery is not installed!');
DEFINE('_JGS_JOOMGALLERY_NOT_UPTODATE','The JoomGallery is not up to date! This module only works with the latest version of the JoomGallery.');
DEFINE('_JGS_NO_PICTURES_AVAILABLE','There are no pictures available in the gallery.');

?>
