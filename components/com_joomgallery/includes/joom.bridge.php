<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/joom.bridge.php $
// $Id: joom.bridge.php 396 2009-03-15 16:06:21Z aha $
/******************************************************************************\
**   JoomGallery  1.0.1                                                       **
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

// Wichtig, damit diese Datei nicht direkt per URL aufgerufen werden kann
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.');

// Einbinden der Configuration der Bridge
require_once(_JOOM_FRONTEND_PATH."/bridge/config.bridge.php");
// Einbinden der Sprachdatei fuer die Bridge
require_once(_JOOM_FRONTEND_PATH."/bridge/language.bridge.php");
// Optionales Einbinden des CSS-Style-Definitionen der Bridge
if($bridge_use_bridge_css==1) {
  require_once(_JOOM_FRONTEND_PATH."/bridge/bridge.css.php");
}
?>
<!-- Start der Beispielbridge -->

<h2 class="bridgeheading"><?php echo _JOOMGALLERY_BRIDGE_HEADING; ?></h2>
<p class="warning"><?php echo _JOOMGALLERY_BRIDGE_WARNING; ?></p>
<!-- Ende der Beispielbridge -->
<?php
// Es stehen folgende Variabeln zur Verfuegung:
// - Komplette Joomla-Umgebungsvariabeln wie
//   + $mosConfig_live_site = URL des Joomlaverzeichnisses
//   + $database = Objekt fuer Datenbankoperationen innerhalb von Joomla
//   + ...
// - Spezielle Joom-Definitionen wie
//   + _JOOM_ABSOLUTE_PATH = Absolutpfad zum Joomlaverzeichnis
//   + _JOOM_FRONTEND_PATH = Absolutpfad zum Frontendverzeichnis der JoomGallery
// - Variablen aus der Configuration der Joomgallery
//   + $jg_paththumbs = Pfad zu den Thumbbildern vom Joomlaverzeichnis aus
//   + $jg_pathimages = Pfad zu den Detailbildern vom Joomlaverzeichnis aus
//   + $jg_pathoriginalimages = Pfad zu den Originalbildern vom Joomlavereichnis aus
//   + ...
// - Bildvariabeln aus der JoomGallery-Datenbank
//   + $id = Id des Bildes
//   + $imgthumbname = Thumbnailname des Bildes
//   + $imgname = Dateiname des Bildes
//   + $imtitle = Titel des Bildes
//   + $imgtext = Beschreibungstext des Bildes
//   + ...
?>
