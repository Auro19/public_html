<?php
/**
* @version $Id: install.attend_events.php 26 2007-01-06 00:03:24Z pcarr $
* @package Attend Events
* @copyright (C) 2004 Tony Blair
* @copyright (C) 2005-06 Peter Carr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );



/**
* Events Session Installation file
* 
*/
function com_install() {
    global $database, $mosConfig_lang, $mosConfig_absolute_path;
    
    $msg = "";
    
	// CHECK LANGUAGE
	if (!defined( '_ESESS_LANG_INCLUDED' )) {
		if (file_exists($mosConfig_absolute_path."/components/com_attend_events/language/".$mosConfig_lang.".php") ) { 
			include_once($mosConfig_absolute_path."/components/com_attend_events/language/".$mosConfig_lang.".php");
		} else { 
			include_once($mosConfig_absolute_path."/components/com_attend_events/language/english.php");
		}
	}    
    
    
    $successfulInstall = true;
    
    
    // update the components table to use icons for the menu items
    $qrysql  = "UPDATE #__components SET admin_menu_img='js/ThemeOffice/categories.png', ";
    $qrysql .= "name='" . _ESESS_MENU_SESSIONS . "', admin_menu_alt='" . _ESESS_MENU_SESSIONS . "' ";
    $qrysql .= "WHERE admin_menu_link='option=com_attend_events&act=sessions'";
    $database->setQuery($qrysql);
    $database->query();

    $qrysql  = "UPDATE #__components SET admin_menu_img='js/ThemeOffice/component.png', ";
    $qrysql .= "name='" . _ESESS_MENU_VENUES . "', admin_menu_alt='" . _ESESS_MENU_VENUES . "' ";    
    $qrysql .= "WHERE admin_menu_link='option=com_attend_events&act=venues'";
    $database->setQuery($qrysql);
    $database->query();
    
    $qrysql  = "UPDATE #__components SET admin_menu_img='js/ThemeOffice/users.png', ";
    $qrysql .= "name='" . _ESESS_MENU_REGISTRATIONS . "', admin_menu_alt='" . _ESESS_MENU_REGISTRATIONS . "' ";    
    $qrysql .= "WHERE admin_menu_link='option=com_attend_events&act=registrations'";
    $database->setQuery($qrysql);
    $database->query();
    
    $qrysql  = "UPDATE #__components SET admin_menu_img='js/ThemeOffice/controlpanel.png', ";
    $qrysql .= "name='" . _ESESS_MENU_CONFIGURATION . "', admin_menu_alt='" . _ESESS_MENU_CONFIGURATION . "' ";
    $qrysql .= "WHERE admin_menu_link='option=com_attend_events&act=config'";
    $database->setQuery($qrysql);
    $database->query();    
    
    require_once( $mosConfig_absolute_path."/components/com_attend_events/config.attend_events.php");

    // prepare the data to write
    $config  = "<?php\n/** ensure this file is being included by a parent file */\n";
    $config .= "defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );\n";
    $config .= "\n/**\n* Events Session Config File\n* Contains no actualy php code\n*/\n\$eSess = array();\n";
    
    // loop through the eSess and look for values in the post
    // and write the data to the config var
    foreach (array_keys($eSess) as $index) {
        // determine how to process the fields passed
        switch ($index) {
			case "thankHTML":
				$eSess[$index] = _ESESS_DEFAULT_THANKYOU;
				break;
			case "confirmEmailSubject":
				$eSess[$index] = _ESESS_DEFAULT_CONFIRM_SUBJECT;
				break;
			case "confirmEmailMsg":
				$eSess[$index] = _ESESS_DEFAULT_CONFIRM_MESSAGE;
				break;
			case "notifyEmailSubject":
				$eSess[$index] = _ESESS_DEFAULT_NOTIFY_SUBJECT;
				break;
			case "notifyEmailMsg":
				$eSess[$index] = _ESESS_DEFAULT_NOTIFY_MESSAGE;
				break;
            case "cancelTitle":
            	$eSess[$index] = _ESESS_DEFAULT_CANCEL_TITLE;
            	break;
            case "cancelText":    
                $eSess[$index] = _ESESS_DEFAULT_CANCEL_TEXT;
                break;
                
            default:
                break;
                
        } // switch
        
        $config .= "\$eSess[\"$index\"]=";
        if (is_bool($eSess[$index])) {
            if ($eSess[$index]) {
                $config .= "true";
            } else {
                $config .= "false";
            }
        } elseif (is_numeric($eSess[$index])) {
            $config .= $eSess[$index];
        } else {
            $config .= "\"".addslashes($eSess[$index])."\"";
        }
        $config .= ";\n";
    }
    $config .= "?>";
    
    // save the config data to the file
    if (!$fh=fopen($mosConfig_absolute_path."/components/com_attend_events/config.attend_events.php","w")) {
        echo "<script> alert('"._ESESS_CONFIG_ERR_OPEN."'); window.history.go(-1); </script>\n";
        exit();
    }
    
    if (fwrite($fh,$config)===false) {
        echo "<script> alert('"._ESESS_CONFIG_ERR_WRITE."'); window.history.go(-1); </script>\n";
        exit();
    }
    
    fclose($fh);

    
    
    // Well done
    if ($successfulInstall) {
        $msg .= file_get_contents("index.html",$mosConfig_absolute_path . "/administrator/components/com_attend_events/");
    }
    return $msg;
}

/**
* Tasks (Global)
* This is a list of tasks that need to be done
* Kept in this file because it is out of the way
*/
// @todo - #495 Modify the HTML classes so that everything is more modular (rows in their own functions etc) - make it easier for someone to modify the look and feel (commenting)
// @todo - #497 maxregistrations per registration on a per session basis as well as global
// @todo - #498 option to limit by email (same email only register once per session)
// @todo - #499 registration verification via email link
// @todo - #500 cancellation email and display
// @todo - #503 config options per session (param?)
// @todo - #504 Front end sort of Sessions
// @todo - #506 Editor Mambot for Session Links
// @todo - #507 Editor Mambot for Config
// @todo - #509 Events Calendar Integration
