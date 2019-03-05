<?php
/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* Events Session Config File
* Contains no actualy php code
*/
$eSess = array();
$eSess["eventIntegrated"]=false;
$eSess["cbIntegrated"]=false;
$eSess["registrationsFrom"]=0;
$eSess["closeAfter"]=1;
$eSess["autoFull"]=true;
$eSess["showFull"]=false;
$eSess["showAll"]=true;
$eSess["startListing"]=0;
$eSess["stopListing"]=2;
$eSess["individualOnly"]=true;
$eSess["userCancellation"]=true;
$eSess["userNumber"]=false;
$eSess["showSubject"]=false;
$eSess["showActivity"]=false;
$eSess["showLocation"]=false;
$eSess["showMap"]=true;
$eSess["showVenue"]=false;
$eSess["showContact"]=false;
$eSess["showExtra"]=false;
$eSess["showTimes"]=false;
$eSess["showRegistered"]=false;
$eSess["showAvatar"]=false;
$eSess["timeFormat"]="%H:%M";
$eSess["shortDateFormat"]="%m/%d/%y";
$eSess["longDateFormat"]="%A, %e %B %Y";
$eSess["displayFooter"]=true;
$eSess["thankHTML"]="<h1>Thankyou {fullname}!</h1><p>You have been registered for {title}<p /><p>If we need to contact you further reguarding this registration we will do so on {email}</p><p>You can view the details of this Session <a href=\"{url}\">here</a>.</p><p>{data}<br /></p>";
$eSess["confirmEmail"]="someone@yoursite.com";
$eSess["confirmEmailSend"]=false;
$eSess["confirmEmailSubject"]="{title} {action}";
$eSess["confirmEmailMsg"]="<p>Dear {fullname}</p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">You have been registered for {title}!</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">If we need to contact you further reguarding this registration we will do so on {email}</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">You can view the details of this Session <a href=\"{url}\">here</a></span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">{data}<br /></span></p>";
$eSess["notifyEmailSend"]=false;
$eSess["notifyEmailSubject"]="New {title} {action}";
$eSess["notifyEmailMsg"]="<p>{fullname} {email} has registered for {title}</p><p>{data} </p>";
$eSess["cancelTitle"]="Registration Cancelled";
$eSess["cancelText"]="{fullname}, your registration has been cancelled for {title}<br />Click <a href=\"{url}\">here</a> to return to the Session.";
?>