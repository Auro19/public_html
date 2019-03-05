<?php
/**
* @version $Id: version.attend_events.php 26 2007-01-06 00:03:24Z pcarr $
* @package Attend Events
* @copyright (C) 2005-06 Peter Carr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

require_once( $mosConfig_absolute_path . '/includes/domit/xml_domit_lite_include.php' );


class AttendEventsComponentVersion {

	// constructor
	function AttendEventsComponentVersion() {
	}


	function currentVersion() {

		global $mosConfig_absolute_path;
	
		$xmlDoc = & new DOMIT_Lite_Document();
		$xmlDoc->resolveErrors( true );

		if (!$xmlDoc->loadXML( $mosConfig_absolute_path . '/administrator/components/com_attend_events/attend_events.xml', false, true )) {
			continue;
		}

		$root = &$xmlDoc->documentElement;
	
		$element 			= &$root->getElementsByPath('version', 1);
		$version 			= $element ? $element->getText() : '';
		
		return $version;

	}


function latestVersion() {
	global $eSess;
	
	// When was the server last contacted?
	$lastContactedOn = $eSess["lastCheckedOn"];
	
	// Is it time to check again?
	// This will default to "true" if $eSess["lastCheckedOn"] didn't load successfully (which is good)
	if ( ($lastContactedOn + (7 * 24 * 60 * 60)) < time()) {
		$contactServer = true;
	} else {
		$contactServer = false;
	}

	// If checking the server, make sure to cache the results...
	if ($contactServer) {
		$latestVersion = $this->getLatestVersion();
		$eSess["latestVersion"] = $latestVersion;
		$eSess["lastCheckedOn"] = time();
		// @todo: must modfiy this function in admin.attend_events.php as it also contains
		// code to display a response back to the user...
		$this->saveConfiguration("com_attend_events");
	} else {
		$latestVersion = $eSess["latestVersion"];
	}
	
	// Return the latest available version of this software
	return $latestVersion;
}

// @todo error checking in this function
function getLatestVersion() {
	ini_set('user_agent', 'PHP'); 

	$contents = file_get_contents("http://developer.joomla.org/sf/wiki/do/viewPage/projects.attendevents/wiki/About");
	$versionStart = strpos($contents, "Current Stable Release:");
	$matchTextLenth = 23;
	$versionStop = strpos($contents, "</h4>", $versionStart + $matchTextLenth);
	
	return substr($contents, strpos($contents, "Current Stable Release:") + $matchTextLenth, $versionStop - $versionStart - $matchTextLenth);
}


// Parses a version string into majorVersion, minorVersion, and revision
// Returned as array elements labelled "majorVersion", "minorVersion" and "revision"
// Returns null on failure
function parseVersionString($versionString) {
	$versionInfo = null;
	
	if (preg_match("^([0-9]+)\.([0-9]+)\.([0-9]+)^", $versionString, $matches)) {
		$versionInfo = array();
		$versionInfo["majorVersion"] = $matches[1];
		$versionInfo["minorVersion"] = $matches[2];
		$versionInfo["revision"] = $matches[3];
	}
	
	return $versionInfo;
}


// main interface function
// input should be two strings
// @todo better error checking
function isUpToDate($thisVersion, $latestVersion) {

	if (!is_array($thisVersion)) $thisVersion = parseVersionString($thisVersion);
	if (!is_array($latestVersion)) $latestVersion = parseVersionString($latestVersion);


	
	// Decide whether the current version is up to date or not
	// (will return true for future releases that are checking against the current release)
	// (ie 0.9.0 beta is current when latest stable is 0.8.5)

	if ($thisVersion["majorVersion"] < $latestVersion["majorVersion"]) {
		return false;
	} elseif ($thisVersion["majorVersion"] > $latestVersion["majorVersion"]) {
		return true;
	} else {
		if ($thisVersion["minorVersion"] < $latestVersion["minorVersion"]) {
			return false;
		} elseif ($thisVersion["minorVersion"] > $latestVersion["minorVersion"]) {
			return true;
		} else {
			if ($thisVersion["revision"] < $latestVersion["revision"]) {
				return false;
			} else {
				return true;
			}
		}
	}
}


/* Simulating what is will be like when running within the Joomla framework */
function saveConfiguration() {
	global $eSess;
	
    $config  = "<?php\n/** ensure this file is being included by a parent file */\n";
    $config .= "\n/**\n* Events Session Config File\n* Contains no actualy php code\n*/\n\$eSess = array();\n";

 	foreach (array_keys($eSess) as $index) {
 	
 	
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
    if (!$fh=fopen("config.attend_events.php","w")) {
        echo "<script> alert('"._ESESS_CONFIG_ERR_OPEN."'); window.history.go(-1); </script>\n";
        exit();
    }
    
    if (fwrite($fh,$config)===false) {
        echo "<script> alert('"._ESESS_CONFIG_ERR_WRITE."'); window.history.go(-1); </script>\n";
        exit();
    }
    
    fclose($fh);   
    
}





} // class
?>
