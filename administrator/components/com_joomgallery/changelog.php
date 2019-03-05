<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/changelog.php $
// $Id: changelog.php 396 2009-03-15 16:06:21Z aha $
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
defined( '_VALID_MOS' ) or defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
?>

CHANGELOG JOOMGALLERY (since Version 1.0 BETA 1 -20080720-)

Legende / Legend:

* -> Security Fix
# -> Bug Fix
+ -> Addition
^ -> Change
- -> Removed
! -> Note

===============================================================================
                                    Release 1.0.1 
                                       20090315
===============================================================================                    

20090308
+ Comments functions in interface

20090303
# actual version of slimbox.js

20090217
# Saving usercatorderlist
* Comments settings checked after form submission
# catid of pictures in global var for lightbox popup

20090131
+ optional category filtering in Interface
+ function returning gallery version string ported from JG 1.5

20090113
# wrong pathway in gallery-footer on special-sites

20090111
# Migration creates wrong catpaths if iteration depth > 2, 
  instead test1_1/test2_2/test3_3 it generates test1_1test2_2/test3_3

20090109
# Cooliris does not show all pictures on paginated categories
^ new JAVA applet version V 4.0.0
# Thickbox 3, keys for next and previous interchanged
^ little hack to show a category thumb in gallery view without showing them in 
  category view, only working with 'own choice' and approved/not published

20090105
# Module output PHP warnings about getimagesize, if gallery configured in 
  opening the picture directly from category view with DHTML or JS

20090103
# wrong thumbnailpath for allow_url_fopen=OFF
http://www.joomgallery.net/forum/index.php/topic,1049.msg4818.html#msg4818
# ItemID in interface with SEF:
http://www.joomgallery.net/forum/index.php/topic,1049.msg4820.html#msg4820

20090101
# Slimbox: dynamically ignore of doublets
# Thickbox3: dynamically ignore of doublets
# accordion.js included, even when deactivated in backend
# accordion.js gives a javascript error with function 'load' -> 'domready'

20081231
# pagination in userpanel fixed sorting (imgtitle instead of imgtext)
# pagination in userpanel fixed for Joomla 1.5.x

20081230
^ Chmod uploaded originals to 644 (like resized pics)

20081229
# wrong variable name in admin.pictures.php:
  $absolut_thumbnailpath instead of $absolut_thumnailpath
+ Navigation in User panel  

20081228
# htmlspecialchars_decode does not work under PHP < 5; added a new function in
  joom.iptcdata.html.php to fix this 

20081227
# Fixed Bug with special characters and symbols in IPTC (iconv)


===============================================================================
                                Stable release 1.0.0 
                                      20081223 
===============================================================================                    

20081223
# Fixed overlib minithumbs w. spaces in filenames
# User panel: the full path of the categories not shown in upload and creation
  of user categories
  http://www.joomgallery.net/forum/index.php/topic,914

20081222
^ TYPE=MyISAM changed to ENGINE=MyISAM in joomgallery.xml
+ Overlib on Minithumbs for Category Manager, Picture Manager and Comments Manager
+ Usergalleries: overlib also for unapproved pictures
+ Usergalleries: overlib in picture view integrated
^ to avoid multiple submits in 'new category' disable the buttons after click

20081221
# [13825] Small fix in language files (english)
# [14080] http://joomlacode.org/gf/project/joomgallery/tracker/?action=TrackerItemEdit&tracker_item_id=14080
  1) with activated page navigation in category view the user sorting does not work
     in subpages > 1
  2) with activated page navigation a change in user sorting on a subpage > 1 opens
     subpage 1, not the actual
# Slimbox does not work in detail view if backend setting 
  'Frontend settings->Downsize pictures by Javascript:' set to 'No'

20081220
# Call-time pass-by-reference removed in iptc-data
# small fix in interface

20081217
# Space in image name breaks display of thumb in admin:
  http://www.forum.en.joomgallery.net/index.php?topic=33.0;topicseen
^ Category image thumbnail in full size in admin, no longer 80x80

20081216
# when no values were changed in configuration of EXIFs/IPTC and category/usercategory
  these config variables are set to blank and saved to the configuration
#/^ Favourites CSS style now separately named, follows settings of Toplist properly
  (no liststyle-bullets, etc)

20081215
+ Display of IPTC-data in the frontend, if available (configurable)
+ changing linecolor in subcategory-view
^ Exif-Tag Flash completed
^ padding in gallery view (align right)
# wrong redirect with activated SEF
  http://www.joomlaportal.de/joomla-komponenten/165823-joomgallery-url-redirect-problem-beim-userkategorien-anlegen.html

20081214
^ Warnings from exif_read_data are no longer displayed
# Empty exif-tag no longer break div-table layout 

20081212
# slideshow loads the original pictures instead of the detail pictures


20081208
+ DE: Japanische Language-Files hinzugefuegt
  
  EN: Japanese Language Files added
  
+ DE: Unterstützung für JomSocial-Nutzerprofile

  EN: Support for JomSocial user profiles

20081206
^ DE: bei Speicherung der Konfiguration Pruefung per Javascript welche Variablen tatsaechlich
  geaendert wurden. Dem $_POST werden auch nur diese uebergeben
  
  EN: when saving the configuration a javascript will test for changed variables
  these only are then part of the $_POST

^ DE: finnische language file Referenz geloescht 
  EN: finnish language file reference deleted

# DE: Kommentare wurden in der Kategorie-Ansicht mitgezaehlt, obwohl sie 
      nicht genehmigt und veroeffentlicht waren
  
  EN: Comments counted in category view though they are not published and approved


# DE: Fehler bei aktiviertem SEF mit Anker #joomimg in der Detailansicht
  http://www.joomgallery.net/forum/index.php/topic,954.msg4284.html
  
  EN: Bug with anchor #joomimg and activated SEF in detail view

===============================================================================
Summary of changes (detailed list in German below - Deutsche Liste folgt unten)
from  1.0 BETA 1 20080720 up to 1.0 RC1
===============================================================================
+ Display of EXIF-data in the frontend, if available (configurable)

+ CoolIris(lite)-Slideshow in category view

+ Interface class, API makes images available in other components (and more)

+ Support for CBE in links to user profiles

+ Possibility to display real name instead of username

^# Optimization of all database queries, category path views

+ Accordion Javscript effect for the detail view (optional)

+ Favourites: users can save their favourite images and download them in a 
  package
  
# Various fixes in Migration

# Many smaller fixes in the gallery code here and there


===============================================================================
Zusammenfassung der Änderungen (Detaillierte Liste unten)
from 1.0 BETA 1 20080720 up to 1.0 RC1
===============================================================================
+ Anzeige von EXIF-Daten im Frontend, wenn vorhanden (konfigurierbar)

+ CoolIris(lite)-Slideshow in Kategorieansicht

+ Interface-Klasse, API ermöglicht Bildanzeige und mehr in anderen Komponenten

+ Unterstützung für CBE in Link zu Nutzern

+ Möglichkeit, vollen Namen statt Nutzernamen anzuzeigen

^# Optimierung aller Datenbankabfragen, Kategoriepfadanzzeigen

+ Accordion-Javascript-Effekt für Detailansicht (optional)

+ Favoriten: Nutzer können Bild-Favoriten speichern und gesammelt herunterladen

^ Nutzergallerien umgeschrieben: jetzt in bel. Oberkategorie

# versch. Fixes in der Migration

# jede Menge kleinere Fixes hier und dort


===============================================================================
Detailliertes Changelog nach Datum
===============================================================================


20081128
# Spalte 'piclist' der Users-Tabelle mit falschen Wert, jetzt vom Typ text
# Der gesamte Bildtitel jedes Bildes wurde beim FTP-Upload in Kleinbuchstaben verwandelt.
  Ausserdem erfolgt jetzt auch die automatische Nummerierung der Bildtitel beim FTP-Upload.

20081125
# Anzeige von Exif-Daten unterdrueckt, wenn nicht vorhanden

20081124
# falscher Aufbau der Links innerhalb der Slideshow bei aktiviertem Wasserzeichen
  http://www.joomlaportal.de/joomla-erweiterungen-komponenten/162885-joom-gallery-kollidiert-mit-lightbox-von-yootheme-template.html

# bei aktiviertem SEF wird das loading.gif und das close.gif nicht angezeigt
  Einbindung der Bilder von lightbox.js in lightbox.css verlagert

20081123
+ Interface erweitert fuer Searchbot

^ Kl. Aenderungen in engl. Sprachdatei

# CSS geaendert
  http://www.joomgallery.net/forum/index.php/topic,745.0.html

# 'catid=' wurde im Link des Moduls aufgebaut, 
  wenn direkte Darstellung in Box mit Wasserzeichen
  http://www.joomgallery.net/forum/index.php/topic,910  

# Pfad zum Image 'close.png' bei DHTML-Ansicht korrigiert
  http://www.forum.en.joomgallery.net/index.php?topic=357

20081121
# [Forum: http://www.forum.en.joomgallery.net/index.php?topic=373]
  Der Name einer Kategorie wurde in der Kategorieansicht
  im Seitentitel (<title>) nicht ausgegeben.

20081112
+ Interface-Funktionen erweitert

20081109
^ DB-Queries in interface.class.php optimiert

+ Interface-Funktionen erweitert


------ zip 20081103 --------

20081029
+ CB-Integration für CBE (neu)

+ Name anstatt Username anzeigen (konfigurierbar)

- jg_combuild aus Frontend-globals entfernt

20081028
^ Darstellung und Links von Usernamen im Backend auch aus 
  common.joomgallery.php

^ Nachtrag: Bild-author nicht mehr bei jedem Upload füllen in Admin-upload

20081027
^ Darstellung von Usernamen komplett nach Common verschoben 
  (inkl. Community Builder Links, wenn aktiviert)

^ Index über uuserid in Tabelle #__joomgallery_users

# cooliris: Fehlendes urlencode, wenn nur eine Seite vorhanden

20081026
# Kategorie-owner hat Bild-owner in Kategorieansicht überdeckt (SQL-query)

^ Bild-author nicht mehr bei jedem Upload füllen
 
# Joom_GetAllSubCategories(), DB Abfrage, order by parent falsch nach char
  cat->subcat1->subcat2: Wenn subcat1 keine Bilder beinhaltete, wurde nicht
  subcat2 für die Randomauswahl zurückgegeben. Jetzt Ermittlung der kompletten
  Catstruktur

20081025
# kleinere Fixes in der Coolirisklasse

20081023
# Exif-Anzeige bei nicht-JPEGs gibt Warnung aus, siehe:
  http://www.forum.en.joomgallery.net/index.php?topic=301.msg763#msg763

# Warning: Call-time pass-by-reference has been deprecated
  http://www.forum.en.joomgallery.net/index.php?topic=301.msg760#msg760

20081022
^ Backend-Vorschaubilder nicht mehr 80x80: 
  http://www.forum.en.joomgallery.net/index.php?topic=60.0

+ Integration Cooliris(Piclens)

20081018
^# Aenderungen hinsichtlich Performance/unnoetiger DB-Aufrufe
   ca. Halbierung der DB-Aufrufe in default-view bei Aktivierung aller Optionen
   common.joomgallery.php: 
   - Joom_GetAllSubCategories() neu gefasst, pro Seitenaufruf nur noch
     ein DB-Query notwendig durch Speicherung aller Cat in static array
   joomgallery.html.php: 
   - DB-Aufruf fuer random nur noch, wenn auch vorher entsprechende cat 
     ermittelt wurden
   - Aufruf Joom_GetPath() entfernt, weil catpath schon vorher ermittelt
   - Joom_ShowGalleryAllPics() DB-Aufruf in Verbindung mit $jg_showallhits
     geaendert
   joom.viewcategory.html.php
   - Aufruf Joom_GetPath() entfernt, weil catpath schon vorher ermittelt
   - DB-Aufruf fuer random nur noch, wenn auch vorher entsprechende cat 
     ermittelt wurden   
   joomgallery.php:
   - DB-Abfrage: 'WHERE user is not null' entfernt

^ JAVA-Applet: 3.5.1

^ Cursortasten zum naechsten/vorherigen Bild in Detailansicht funktionieren nicht:
  http://www.forum.en.joomgallery.net/index.php?topic=282.0


20081017
# engl. Übersetzung: http://www.forum.en.joomgallery.net/index.php?topic=283.0
^ Leerzeichen aus Link der Toplists (Frontend) entfernt
# Warning: Call-time pass-by-reference has been deprecated bei Aufruf von usort() mit 
  Referenz als Parameter
  http://www.joomgallery.net/forum/index.php/topic,837.msg3857.html
# siehe 20080913
  auch fuer die Usergalerien 
  http://www.joomgallery.net/forum/index.php?topic=638.msg3511#msg3511

20081016
# mit aktiviertem SEF (sh404) führt das Absenden eines Kommentars zu einer 404 Seite
  ebenso bei der send2friend Funktion
  http://www.forum.en.joomgallery.net/index.php?topic=271
^ Verzicht auf die JS-Box nach Absenden eines Kommentars, jetzt redirect

------ zip 20081015 --------

20081015
+ Sortiermöglichkeit im Interface (pro DB-Abfrage)

20081014
# nicht angemeldete Besucher können Kommentare eingeben, auch wenn dies gem.
  Backendeinstellung nicht erlaubt ist
  http://www.joomgallery.net/forum/index.php/topic,833
^ Vereinfachung der Abfragen hinsichtlich Kommentarmoeglichkeit, vorzeitiges Return,
  wenn Slideshow aktiviert, damit Vermeiden unnoetiger folgender Abfragen.

20081012
+ Implementation interface-Klasse

20081011
# [#13139] $catpath wird nun in Joom_OpenImage korrigiert, wenn im falschen Format
^ Pfad-Handling in Joom_OpenImage von defined('_JOOM_PARENT_MODULE') enkoppelt

20081010
+ neue Variable $jg_userowncatsupload
  duerfen User nur in eigene oder auch in Kategorien anderer User uploaden?
  http://www.forum.en.joomgallery.net/index.php?topic=207

20081006
# Verwaistes "li" in Kategorieansicht, wenn kein Bildtitel angezeigt wurde

20081005
^ common.joomgallery.php:
  Joom_ShowDropDownCategoryList neu geschrieben, Joom_CatgSub weggefallen, dadurch
  bessere Geschwindigkeit bei grosser Anzahl von Kategorien 
  (Aufrufe statt (Kategorie^Kategorie+x) jetzt (Kategorie+x), x=je nach Schachtelungstiefe)
  Bei 9000 Kategorien jetzt Laufzeit von ca. 0.5 s statt vorher ca. 45s
  neue Callbackfunktion fuer Objektsort
  Joom_ShowDropDown_UserCategoryList entfernt
  Usergalerien:
  Joom_User_ShowDropDownCategoryList jetzt alleinige Funktion zur Anzeige der Kategorien/Parents
  Joom_User_GetCats weggefallen
  In Auswahlboxen für Kategorien jetzt Anzeige der Pfaddarstellung aehnlich wie im Backend
  Buttons "Neues Bild" und "Kategorien" werden nur noch angezeigt, wenn auch entsprechende
  Kategorien im Backend freigegeben sind
  Link auf Kategorie in Übersicht wird nur aufgebaut, wenn published=true

^ Slimbox, neue Version v1.53
  Aenderungen von b2m wegen automatischem Resize und Sprachdateien ergaenzt
  Zusaetzlich Einstellung des Animationsdauer über der vom Backend gesteuerten Variable resizeSpeed
  aehnlich wie bei der Lightbox

# http://www.joomgallery.net/forum/index.php/topic,799
  Im Frontendupload war die Einstellung 'Nummerierung' nicht wirksam

20081004
^ JAVA-Applet: 3.4.2rc6
^ Links bezueglich der Itemid-Konstanten bearbeitet ([#12749])

20081003
^ neue CSS-Klassen: .jg_displaynone, .jg_fav_switchlayout, .jg_fav_clearlist

20081002
# [#12054] Links, zu denen man keine Berechtigung hat werden jetzt nicht mehr angezeigt,
  stattdessen grauer Text mit Overlib-Hinweis
# [#12114] Der Link zur Slideshow wird bei deaktiviertem JavaScript jetzt nicht mehr eingeblendet,
  sondern nur noch ein kleiner Hinweis darauf.
# Bei Deinstallation wurde die Tabelle __joomgallery_users nicht geloescht


20080930
+ Erstes Geruest fuer die Interface-Klasse hinuzgefuegt, grundlegende Funktionalitaet
+ Ueberpruefung auf Exif-Unterstuetzung eingebaut

20080925
# http://www.joomgallery.net/forum/index.php?topic=781.msg3621
  JAVA-Upload: wenn die Originaldateinamen uebernommen werden sollen wird bei leerem Input Feld
  'Alert - Das Bild muss einen Titel haben' angezeigt
  Danke an 'Erftralle'


20080923
+ Favoriten eingefuegt neue Dateien: joom.favourites.php, joom.favourites.html.php, joom_favourites.css und Icons
+ [#12749] Itemid steht jetzt auch in der Konstanten '_JOOM_ITEMID' zur Verfuegung (als String, z.B. '&Itemid=63')
  fuer XHTML-valide Links gibt '_JOOM_ITEMIDX' z.B. '&amp;Itemid=63' zurueck.
  Um den Bug vollstaendig zu fixen, sollten nach und nach alle Links in der Galerie bearbeitet werden.

20080921
# Migration: http://www.joomgallery.net/forum/index.php?topic=697.msg3603#msg3603
  Kommentare von angemeldeten Usern werden nicht migriert, weil die Userid falsch ermittelt wird
  Danke an 'Erftralle'
# Migration: statt der Bildid wurde die Catid in den Kommentaren gespeichert
^ Style der Accordion-Header an nicht-Acc-Header angepasst, Bildtitel als <h3>
# offene divs geschlossen, verwaistes "Please login first..." in Send to Friend interiert

20080919
# Migration: wenn PonyGallery nicht installiert, wurde PHP-Warning ausgegeben
# Wenn Wasserzeichen aktiviert und Öffnen des Detailbildes in der Kategorieansicht per z.B. Slimbox
  eingestellt, wurden nach durchgeführter Suche in den Links falsche catid ausgegeben
  http://www.forum.en.joomgallery.net/index.php?topic=172

20080918
# Engl. Sprachdatei: "informations" ersetzt durch "information"

20080913
# bei aktivierter Slideshow wurden bei Bildwechsel nicht die Details aktualisiert
# Wenn die Bildbeschreibung oder der Autor in den Details leer ist wird per JS ein &nbsp; eingefügt
^ Bei laufender Slideshow werden jetzt nur die Bilddetails angezeigt, der Rest wird ausgeblendet
+ Ersetzungen hinzugefuegt


# http://www.joomgallery.net/forum/index.php?topic=638.msg3511#msg3511
  Wenn gpc_magic_quotes=On, vor dem Speichern in die DB stripslashes() ausführen
  Bild: Titel,Beschreibung, Autor
  Kategorie: Name, Beschreibung
  
# Fixes in Joom_SaveNewPicture(): Bei Refresh durch Thumbwechsel wurden die Felder 
  Titel, Beschreibung und Autor wieder leer angezeigt
  Klassenvariablen eingeführt, Verzicht auf globals

20080912
# Fehlerhaften Pfad zu Originalbildern gefixt (joom.javascript.php)

20080910
+ EXIF

20080902
# Fehlerhaften Pfad zu Bridge gefixt

20080901
+ Accordion in Detailansicht optional gemacht
# Bug bei anonymen Kommentaren gefixt (http://www.forum.en.joomgallery.net/index.php?topic=83.0)
^ prev.png und next.png durch arrow_left.png und arrow_right.png ersetzt
^ Pathway und Search getrennt, mehr Anzeigeoptionen
+ Bild-Titel in Detailansicht waehlbar, oberhalb/unterhalb des Bildes
+ abschliessenden sectiontableheader in allen Ansichten
+ Kommentar-Ansicht fuer anonyme User optional

20080830
+ Accordion in Detailansicht

20080828
+ "sort($dirs);" eingefügt um die Liste der Pfade im FTP-Upload-Manager sortiert auszugeben.

20080827
# [#12485] Namensschild im IE7 nicht angezeigt, BOM in Detailansicht gefixt

20080824
# In send2friend fehlte im Link in der Mail die Angabe der Itemid (danke an Steve)

20080823
# CSS Fehler in Userpanel

20080822
^ Aenderung aller PHP Dateien auf UTF-8 ohne BOM und UNIX Linefeed
# fehlerhafte Navigation im Bilder- und Kategoriemanager, 
  Fehler bei Begrenzung der anzuzeigenden Bilder/Kategorien
  http://www.joomgallery.net/forum/index.php?topic=687

20080821
^ Ordner 'tools' entfernt

20080819
^ Änderungen für Usergalerien:
  - eigenen Frontendbereich für die Anzeige der usergalerien entfernt, jetzt vollständige Integration in die Galerie
  - joom.viewusergalleries.php und joom.viewusergalleries.html.php entfernt
  neue Variablen in der Konfiguration:
  - jg_usercategory (Kategorien, in denen User eigene Kategorien anlegen dürfen)
  - jg_usercatacc (User dürfen den Access Level ihrer Kategorie ändern)
  entsprechend neue Languagekonstanten (JGA_ALLOWED_USERCATPARENT, JGA_USERCATACC)
  teilweise JS-Alerts durch Redirects im Frontend ersetzt
  Überflüssige DB-Abfragen für den Aufbau der Kategorielisten in allen Uploads entfernt
# [Forum http://www.forum.en.joomgallery.net/index.php?topic=100.0]
  $catpath beim Aufruf von 'Joom_OpenImage' hinzugefuegt und unnoetige Slashes entfernt

20080818
# [#12182] Pfade werden vor dem Speichern jetzt bezueglich der Slashes am Anfang und Ende gefixt.
# admin.categories.html.php: ueberfluessige Slashes entfernt und fehlende Anfuehrungszeichen gesetzt

20080814
# Picture Manager: bei dem Hover über den Uparrow wird ein Unterstrich angezeigt
# Im Konfigurations Manager werden ggf. Teile des Footer rechts angezeigt

20080813
# Wenn mit gedrückter CTRL-Taste alle Optionen ausgeschaltetet werden,
  wird in der Konfiguration ein leerer Inhalt gespeichert

20080809
# "/" hat im Bildpfad gefehlt, wenn Joom_OpenImage von einem Modul aus  aufgerufen wurde

20080808
# falsche Ausgabe des Kategorielinks, wenn interne Suche gestartet
# [#12125] Kategorien können nicht gelöscht werden

20080803
# Fehlende Dateien für CSS-Bearbeitung in joomgallery.xml ergänzt
^ joom_local.css.README jetzt in UTF-8

20080802
# onClick -> onclick
# [#11968] Usergalerien: Zuordnung eines Bildes zur Kategorie kann verloren gehen
^ Version BETA 1 20080802
+ [#11266] CSS-Bearbeitung im Backend

20080731
# [#12056] JAVA Upload: Paramater "lang" entfernt, das Applet wählt dann die Sprache
  über Locale.getDefault

20080729
# CSS für Anzeige des zu löschenden Kommentars ergänzt (joom_detail.css)
^ common.joomgallery.php: wenn Joomla! 1.5 -> htmlentities($text, ENT_QUOTES, 'UTF-8')
  [Forum: http://www.joomgallery.net/forum/index.php?topic=623] auch in Ergänzung zu [#12020]
# [Forum: http://www.joomgallery.net/forum/index.php?topic=627] fehlerhafte Weiterleitung nach Loeschen eines Kommentars
^ Backenduploads: in bestehenden redirects nach Erfolg jeweils _JGA_UPLOAD_SUCCESSFULL ergänzt
# Typo Admin Languagefiles _JGA_ORIGINAL_DELETED
# Fixes wg. überflüssigem '/' in Verbindung mit Joom_MoveFile
# div. Korrekturen der Pfade bei eingeschaltetem sh404SEF in Joomla 1.5.5

20080728
# [Forum http://www.forum.en.joomgallery.net/index.php?topic=29.0] _JGS_CATEGORIES anstatt 'Kategorien'
# [#12020] Wrong danish characters æ ø å Æ Ø Å in comments
^ engl. Sprachkonstante zur Titeleinblendung in Detailansicht

20080726
# falscher Pfad zu 'ip.gif' // 'title'-Attribut eingefuegt
+ JGA_MIGRATIONCHECK in JGA_MIGRATION_CHECK geändert
  Neu/geändert: JGA_MIGRATION_ORPHANPICS - Bilder ohne gültigen User
^ Unterkategorien: '(Anzahl Bilder:x)' nicht mehr innerhalb des <a> Tags
  ^ Anpassungen für Modul JoomImages und CBeTab
+ [#11937] Bildüberschrift deaktivierbar in Detailansicht (Dank an vs)
^ engl. Sprachdateien: "Nameplate" und "Nameshield" ersetzt durch nametag
^ germani.php Zeile 303 an german.php angeglichen

20080725
+/^ vor der Migration wird zusätzlich überprüft, ob Bilder mit fehlender Userzuordnung existieren
    wenn ja, wird die Migration nicht zugelassen, neue LF Konstante _JGA_MIGRATIONORPHANPICS

#   wenn alle Tables in der PonyGallery ML leer sind, wird die Migration nicht freigegeben

20080724
+ bei Änderung der Sprache auch Ausgabe im Menü anpassen

20080723
# <div> in Galerieansicht in falscher Abfrage (siehe http://www.joomgallery.net/forum/index.php?topic=600.0)

20080722
# [#11932] JC: User Uploads nicht möglich, wenn "" Kategorie mit ausgewählt wurde (Dank an vs)
# <div> in Kategorieansicht in falscher Abfrage geschachtelt
# [#11926] JC: PHP Warnung 'Call-time pass-by-reference has been deprecated' nach Klick auf Kategorie
# [#11919] JC: Fehler bei Bilder-Upload, wenn Originalbild gelöscht werden soll.
# kleinere Fixes: fehlendes </div> in Detailansicht ergänzt, in Userpanel Icongröße korrigiert

20080721
# [#11913] JC: (Migration) Bilder auch verschieben, wenn das Originalbild nach dem Upload gelöscht wurde (danke vs)

20080720
# [#11904] JC: fehlerhafter Pfad zur Bilddatei in components/com_joomgallery/classes/upload.class.php (danke vs)

