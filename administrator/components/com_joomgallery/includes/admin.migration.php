<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/admin.migration.php $
// $Id: admin.migration.php 396 2009-03-15 16:06:21Z aha $
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

defined('_VALID_MOS') or die('Direct Access to this location is not allowed.');

/**
 * Migration Manager
 *
 *
 */
class Joom_AdminMigration  {
  function Joom_AdminMigration(){
    global $mosConfig_absolute_path;
    $adminincludepath      = $mosConfig_absolute_path .
                         '/administrator/components/com_joomgallery/includes/';
    $adminclassespath      = $mosConfig_absolute_path .
                         '/administrator/components/com_joomgallery/adminclasses/';


    //Migrationsart feststellen
    //GET Parameter 'migration'
    //'p2jcontinue' lfd. Migration Pony -> Joom
    //'4i2jcontinue' lfd. Migration 4images -> Joom
    //'exit'  Abbruch der Migration

    $action_get = mosGetParam($_GET, 'migration', '');

    //pruefen, ob eine Migration gerade laeuft
    if (isset($action_get) && $action_get != '') {
      switch($action_get) {
        case 'p2jcontinue':
          require_once ($adminclassespath . 'admin.migratep2j.class.php');
          $migrateclass = new Joom_Migrate_P2J('continue');
          exit;
        break;
        case '4i2jcontinue':
          //TODO Migration von 4images
          exit;
        break;
        case 'exit':
          echo 'exit';
          exit;
        break;
      }
    }

    //keine laufende Migration
    //POST migratep2j und migrate4i2j abfragen
    //check: pruefen der Voraussetzungen
    //start: Voraussetzungen erfuellt, start wird angeboten
    //beide leer: Auswahl der Migrationsarten wird angeboten

    $migrate_action_p2j = mosGetParam($_POST, 'migratep2j', '');
    $migrate_action_4i2j = mosGetParam($_POST, 'migrate4i2j', '');

    //liegt Migration Pony -> Joom vor ?
    if (!empty($migrate_action_p2j)) {
      switch ($migrate_action_p2j) {
        case 'start':
          //Start Migration Pony -> Joom
          require_once ($adminclassespath . 'admin.migratep2j.class.php');
          $migrateclass = new Joom_Migrate_P2J('start');
          break;
        case 'check':
          //Check Migration Pony -> Joom
          require_once ($adminclassespath . 'admin.migratep2j.class.php');
          $migrateclass = new Joom_Migrate_P2J('check');
          break;
      }
      return;
    }

    //liegt Migration 4Images -> Joom vor ?
    if (!empty($migrate_action_4i2j)) {
      switch ($migrate_action_4i2j) {
        case 'check':
          //TODO Integration 4images
          break;
        case 'start':
          //TODO Integration 4images
          break;
      }
      return;
    }

    //Anzeige der Migrationsauswahl
    require_once ($adminincludepath . 'html/admin.migration.html.php');
    $htmladminmigration=new HTML_Joom_AdminMigration();

  }
}
?>
