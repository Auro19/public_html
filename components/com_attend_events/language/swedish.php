<?php
/**
* @version $Id: english.php,v 1.0 2005/12/17 17:47:15 pcarr Exp $
* @package Attend Events
* @copyright (C) 2006 Johan Sundmark
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Check
DEFINE("_ESESS_LANG_INCLUDED", 1);

// Front-End :: Title
DEFINE("_ESESS_COMPONENT_TITLE", "Kursanm�lan");

// Front-End :: List
DEFINE("_ESESS_NAME", "Namn");
DEFINE("_ESESS_SESSION_UP", "Startdatum anm�lan");
DEFINE("_ESESS_REGISTRATION_DOWN", "Slutdatum anm�lan");
DEFINE("_ESESS_NUM_LEFT", "# platser kvar");
DEFINE("_ESESS_NUM_AVAIL", "# tillg�ngliga platser");
DEFINE("_ESESS_AVAIL_STATUS", "Status");
DEFINE("_ESESS_AVAIL_STATUS_AVAIL", "Plats finns");
DEFINE("_ESESS_AVAIL_STATUS_FULL", "Fullbokad");

// Front-End :: View
DEFINE("_ESESS_REG_HOSTED_BY", "Skapad av");
DEFINE("_ESESS_REG_DATETIME", "Datum &amp; Tid");
DEFINE("_ESESS_REG_LOCATION", "Plats");
DEFINE("_ESESS_REG_MAPTEXT", "Hur hittar jag dit?");
DEFINE("_ESESS_REG_AVAIL", "Tillg�ngliga ");
DEFINE("_ESESS_REG_CLOSE", "Registrering avslutas");
DEFINE("_ESESS_UNLIMITED", "Obegr�nsat");
DEFINE("_ESESS_OUT_OF", "out of");
DEFINE("_ESESS_FIELD_COMMENTS", "Kommentarer");
DEFINE("_ESESS_FIELD_COMMENTS_DESC", "");
DEFINE("_ESESS_ERROR_ONLY_REGISTERED", "Bara registrerade anv�ndare kan anm�la sig f�r denna session.");
DEFINE("_ESESS_ERROR_ONLY_GUESTS", "Bara g�ster kan anm�ls sig till denna session.");
DEFINE("_ESESS_ERROR_FULL", "Kursen �r fullbokad.");
DEFINE("_ESESS_REG_LIST", "Personen/erna �r redan registrerade");

// Front End :: Vy -> Anm�lningsblankett
DEFINE("_ESESS_FIELD_FULLNAME", "Namn");
DEFINE("_ESESS_FIELD_FULLNAME_DESC", "Skriv in ditt fullst�ndiga namn F�rnamn Efternamn.");
DEFINE("_ESESS_FIELD_EMAIL", "E-post");
DEFINE("_ESESS_FIELD_EMAIL_DESC", "Skriv in din E-post adress f�r att f� bekr�ftelse p� registrering.");
DEFINE("_ESESS_FIELD_NUM_PEOPLE", "Antal registrerade");
DEFINE("_ESESS_FIELD_NUM_PEOPLE_DESC", "Antal personer att registrera?");
DEFINE("_ESESS_BUTTON_REGISTER", "Anm�l");
DEFINE("_ESESS_BUTTON_RESET", "Rensa");
DEFINE("_ESESS_BUTTON_UPDATE", "Uppdatera Anm�lning");
DEFINE("_ESESS_BUTTON_CANCEL", "Avanm�lning");
DEFINE("_ESESS_VAL_REG_ALERT", "Felmeddelande Anm�lan:");
DEFINE("_ESESS_VAL_REG_FULLNAME", "Skriv in ditt fullst�ndiga namn.");
DEFINE("_ESESS_VAL_REG_EMAIL", "Skriv in din e-postadress.");
DEFINE("_ESESS_VAL_REG_NUMBER", "Antal personer �r inte ett heltal mellan 1 - ");

// Back-End -> Allm�nt
DEFINE("_ESESS_REQUIRED", "<span style=\"color: red;\">*</span>");
DEFINE("_ESESS_STYLE_TITLE", "style=\"background-color: #E0E0E0; font-weight: bold; border-bottom: 1px solid #B0B0B\"");

// Back-End -> Menyer
DEFINE("_ESESS_MENU_SESSIONS", "Sessioner");
DEFINE("_ESESS_MENU_VENUES", "Platser");
DEFINE("_ESESS_MENU_REGISTRATIONS", "Registrerade");
DEFINE("_ESESS_MENU_CONFIGURATION", "Konfiguration");

// Back-End :: Sessioner :: Lista
DEFINE("_ESESS_FORM_SLIST", "Session Manager");
DEFINE("_ESESS_SLIST_NAME", "Namn");
DEFINE("_ESESS_SLIST_SESSION_UP", "Startdatum Sess.");
DEFINE("_ESESS_SLIST_SESSION_DOWN", "Slutdatum Sess.");
DEFINE("_ESESS_SLIST_REGISTRATION_UP", "Startdatum Anm�lan");
DEFINE("_ESESS_SLIST_REGISTRATION_DOWN", "Slutdatum Anm�lan");
DEFINE("_ESESS_SLIST_NUM_REGISTRATIONS", "Anm�lningar");
DEFINE("_ESESS_SLIST_STATUS", "Status");
DEFINE("_ESESS_SLIST_AVAIL", "Tillg�nglighet");
DEFINE("_ESESS_SLIST_PUB", "Publiserad");
// Back-End :: Sessioner :: Lista -> Filter
DEFINE("_ESESS_SFILTER_CHOOSE", "V�lj ett Filter");
DEFINE("_ESESS_SFILTER_NONE", "Inga Filter");
DEFINE("_ESESS_SFILTER_STATUS", "- Statusfilter");
DEFINE("_ESESS_SFILTER_AVAIL", "- Tillg�nglighetsfilter");
DEFINE("_ESESS_SFILTER_EVENT", "- Evenemangsfilter");
DEFINE("_ESESS_RFILTER_CHOOSE", "V�lj en Session");
DEFINE("_ESESS_RFILTER_ALL", "- Alla Sessioner");
// Back-End :: Sessioner :: List -> Javascript Felmeddelande
DEFINE("_ESESS_PUBLISH_MSG", "V�lj en Session f�r att ");
DEFINE("_ESESS_DELETE_SESSION_MSG", "V�lj en session f�r att ta bort.");


// Back-End :: Sessioner :: Redigera
DEFINE("_ESESS_FORM_SESS_ADD", "L�gg till Session");
DEFINE("_ESESS_FORM_SESS_EDIT", "Redigera Session");
DEFINE("_ESESS_TITLE_DESCRIPTION", "Sessionsdetaljer");
DEFINE("_ESESS_TITLE_SESSION_GENERAL","Allm�nt");
DEFINE("_ESESS_TITLE_SESSION_DATETIME","Datum & Tid");
DEFINE("_ESESS_FIELD_EVENT", "Evenemang");
DEFINE("_ESESS_FIELD_EVENT_DESC", "V�lj ett existerande evenemang f�r att skapa en session till.");
DEFINE("_ESESS_NO_EVENT", "Inga Evenemang");
DEFINE("_ESESS_FIELD_TITLE", "Titel");
DEFINE("_ESESS_FIELD_TITLE_DESC", "Skriv in en titel f�r Sessionen.");
DEFINE("_ESESS_FIELD_INTRO", "Beskrivning");
DEFINE("_ESESS_FIELD_INTRO_DESC", "N�gon introduktionstext om denna Session.  Bra hj�lp om den inte �r l�nkad till ett evenemang.");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE", "Startdatum Session");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE_DESC", "Datum n�r sessionen b�rjar.");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME", "Starttid Session");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE", "Slutdtaum Session");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE_DESC", "Datum n�r sessionen slutar.");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME", "Sluttid Session");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_FIELD_STATUS", "Status");
DEFINE("_ESESS_FIELD_STATUS_DESC", "�vergripande Sessionsstatus:<br />Ny �r inte tillg�nglig<br />Anm�lan kan g�ras om Plats finns<br />St�ngd �r sj�lvklart St�ngd.<br />Fullbokad har n�tt Max Anm�lningar");
DEFINE("_ESESS_FIELD_MAX", "Max # Anm�lningar");
DEFINE("_ESESS_FIELD_MAX_DESC", "Maximalt antal anm�lningar som till�ts f�r sessionen.<br />N�r maxantalet n�tts �ndras status till Fullbokad");
DEFINE("_ESESS_FIELD_AVAIL", "Tillg�nglighet");
DEFINE("_ESESS_FIELD_AVAIL_DESC", "Indikerar vem som till�ts anm�la sig f�r sessioner.<br />Anv�nd Global f�r att s�tta preferenserna i konfigurationen");
DEFINE("_ESESS_FIELD_PUBLISH", "Publisera");
DEFINE("_ESESS_FIELD_PUBLISH_DESC", "Indikerar att sessionen �r publicerad.");
DEFINE("_ESESS_FIELD_SESSION_HOST", "Sessionsv�rd");
DEFINE("_ESESS_FIELD_SESSION_HOST_DESC", "V�lj en v�rd f�r denna session.  F�r attfinnas i denna lista, m�ste en anv�ndare ha grupp�tkomstbeh�righet (group access level) av &quot;author&quot; eller h�gre.");
DEFINE("_ESESS_TAB_SESSION_REGISTRATION","Anm�lan");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE", "Startdatum anm�lan");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE_DESC", "Datum f�r att b�rja ta emot anm�lningar. L�nk visas inte innan detta datum.");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME", "Starttid anm�lan.");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE", "Slutdatum anm�lan");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE_DESC", "Datum f�r att sluta ta emot anm�lningar. L�nk visas inte efter detta datum.");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME", "Sluttid anm�lan.");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_TAB_SESSION_VENUE","PLats");
DEFINE("_ESESS_FIELD_VENUE_LIST", "Vanliga platser");
DEFINE("_ESESS_FIELD_VENUE_LIST_DESC", "V�lj en plats som finns i Platstabellen, eller skriv in platsinformation i f�ltet nedan.");


// Back-End :: Plats
DEFINE("_ESESS_FORM_VLIST", "Evenemangsplatser");
DEFINE("_ESESS_VLIST_NAME", "Platsnamn");

// Back-End :: Platser :: �ndra
DEFINE("_ESESS_FORM_VENUE_ADD", "L�gg till Plats");
DEFINE("_ESESS_FORM_VENUE_EDIT", "Redigera Plats");
DEFINE("_ESESS_FIELD_VENUE_TITLE", "Namn");
DEFINE("_ESESS_FIELD_VENUE_TITLE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS", "Adress");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_CITY", "Stad");
DEFINE("_ESESS_FIELD_VENUE_CITY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_STATE", "L�n");
DEFINE("_ESESS_FIELD_VENUE_STATE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE", "Postnummer");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY", "Land");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS", "Webbadress");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS_DESC", "Se till att inkludera &quot;http://&quot;");
DEFINE("_ESESS_JSERROR_VENUE_TITLE", "Du m�ste skriva in platsens namn.");
DEFINE("_ESESS_JSERROR_VENUE_ADDRESS", "Du m�ste skriva in platsens adress.");

// Back-End :: Anm�lningar :: Lista
DEFINE("_ESESS_FORM_RLIST", "Evenemangsanm�lningar");
DEFINE("_ESESS_RLIST_NAME", "Namn");
DEFINE("_ESESS_RLIST_EMAIL", "E-post");
DEFINE("_ESESS_RLIST_TITLE", "Session");
DEFINE("_ESESS_RLIST_RDATE", "Anm�lningsdatum");
DEFINE("_ESESS_RLIST_STATUS", "Status");
DEFINE("_ESESS_RLIST_NUM", "# Anm�lningar");
DEFINE("_ESESS_RLIST_VIEWED", "Visad");
DEFINE("_ESESS_REGISTRATION_STATUS_REGISTERED", "Anm�ld");
DEFINE("_ESESS_REGISTRATION_STATUS_CANCELLED", "Avanm�ld");
DEFINE("_ESESS_REGISTRATION_STATUS_CLOSED", "St�ngt");
DEFINE("_ESESS_DELETE_REG_MSG", "V�lj en anm�lan f�r att ta bort den");

// Back-End :: Anm�lningar :: Visa
DEFINE("_ESESS_FORM_REG_VIEW", "Visa anm�lan");
DEFINE("_ESESS_FIELD_SESSION", "Session");
DEFINE("_ESESS_FIELD_REGISTRATION_DATE", "Anm�lningsdatum");
DEFINE("_ESESS_FIELD_CANCELLATION_DATE", "Avanm�lningsdatum");
DEFINE("_ESESS_FIELD_REGISTRATION_STATUS", "Status");

// Back-End :: Anm�lningar :: Exportera
DEFINE("_ESESS_FORM_EXPORT", "Exportera anm�lningar");
DEFINE("_ESESS_FIELD_METHOD", "Exportmetod");
DEFINE("_ESESS_FIELD_METHOD_CSV", "CSV");
DEFINE("_ESESS_FIELD_FILENAME", "Filnamn");
// Back-End :: Anm�lningar :: Exportera -> Javascript Felmeddelande
DEFINE("_ESESS_VAL_EXPORT_FILENAME", "Filnamn kan inte vara tomt.");
DEFINE("_ESESS_EXPORT_MSG", "Ok�nd exportmetod");

// Back-End :: Konfiguration
DEFINE("_ESESS_FORM_CONFIG", "Konfiguration");
DEFINE("_ESESS_FORM_CONFIG_CONFIRM", "Konfigurera Bekr�fta E-post");
DEFINE("_ESESS_FORM_CONFIG_NOTIFY", "Konfigurera Meddelande E-post");
DEFINE("_ESESS_FORM_CONFIG_CANCEL", "Konfigurera Borttagande av E-post");
DEFINE("_ESESS_ACTION_REGISTER", "Anm�lan");
DEFINE("_ESESS_ACTION_UPDATE", "Updatera");
DEFINE("_ESESS_ACTION_CANCEL", "Avbryt");
DEFINE("_ESESS_BUTTON_OPTIONS","Inst�llningar");
DEFINE("_ESESS_BUTTON_OPTIONS_IMG","images/config.png");
DEFINE("_ESESS_BUTTON_THANK","Visa Tack");
DEFINE("_ESESS_BUTTON_THANK_IMG","images/menu.png");
DEFINE("_ESESS_BUTTON_CONFIRM","Bekr�fta E-post");
DEFINE("_ESESS_BUTTON_CONFIRM_IMG","images/messaging.png");
DEFINE("_ESESS_BUTTON_NOTIFY","Meddela E-post");
DEFINE("_ESESS_BUTTON_NOTIFY_IMG","images/message_config.png");
DEFINE("_ESESS_BUTTON_CANCELLATION","Ta bort E-post");
DEFINE("_ESESS_BUTTON_CANCELLATION_IMG","images/inbox.png");

// Admin :: Konfig :: Inst�llningar
DEFINE("_ESESS_FORM_CONFIG_OPTIONS", "Konfigurera Inst�llningar");
DEFINE("_ESESS_TAB_CONFIG_GENERAL","Allm�nt");
DEFINE("_ESESS_TITLE_INTEGRATION", "Integration men andra Komponenter");
DEFINE("_ESESS_FIELD_INTEGRATE", "Integrera med <b>Events</b> Component");
DEFINE("_ESESS_FIELD_INTEGRATE_DESC", "Till�t en session att vara ansluten till ett evenemang fr�n <i>Events</i> Component.<br><b>Note:   p�&quot;Apply&quot; knappen efter att ha �ndrat det h�r v�rdet</b>.");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT", "Visa Evenemangs�mne");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY", "Visa Evenemangsaktivitet");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_LOCATION", "Visa Evenemangsplats");
DEFINE("_ESESS_FIELD_SHOW_LOCATION_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_CONTACT", "Visa Evenemangskontakt");
DEFINE("_ESESS_FIELD_SHOW_CONTACT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_EXTRA", "Visa Evenemangsextra");
DEFINE("_ESESS_FIELD_SHOW_EXTRA_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_TIME", "Visa Evenemangstid");
DEFINE("_ESESS_FIELD_SHOW_TIME_DESC", "");
DEFINE("_ESESS_FIELD_CBINTEGRATED","Integrera med <b>Community Builder</b> Component");
DEFINE("_ESESS_FIELD_CBINTEGRATED_DESC","Standardv�rden f�r varje registrationsf�lt kan genereras genom att anv�nda informationen som sparats i en  Community Builder anv�ndares profil (see \'Fields\' tab).<br><b>Obs:  Klicka p� &quot;Apply&quot; knappen efter att ha �ndrat v�rden</b>.");
DEFINE("_ESESS_FIELD_SHOWAVATAR", "Visa Avatar");
DEFINE("_ESESS_FIELD_SHOWAVATAR_DESC", "");
DEFINE("_ESESS_TITLE_REGISTRATIONCONTROL", "Anm�lningskontroll");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW", "Till�t anm�lningar fr�n");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW_DESC", "");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL", "Till�t bara enskilda anm�lningar");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL_DESC", "");
DEFINE("_ESESS_FIELD_FULL_PROC", "Till�t Full processing");
DEFINE("_ESESS_FIELD_FULL_PROC_DESC", "");
DEFINE("_ESESS_FIELD_REG_CANCEL", "Till�t registrerade anv�ndare att avanm�la sig");
DEFINE("_ESESS_FIELD_REG_CANCEL_DESC", "");
DEFINE("_ESESS_TITLE_DATETIME", "Datum och Tid. Formatering.");
DEFINE("_ESESS_FIELD_DATE_SHORT", "Datumformat (kort)");
DEFINE("_ESESS_FIELD_DATE_SHORT_DESC", "");
DEFINE("_ESESS_FIELD_DATE_LONG", "Datumformat (l�ngt)");
DEFINE("_ESESS_FIELD_DATE_LONG_DESC", "");
DEFINE("_ESESS_FIELD_TIME", "Tidsformat");
DEFINE("_ESESS_FIELD_TIME_DESC", "");
DEFINE("_ESESS_FIELD_TIME1", "24 Timmar, Ex 01,02..");
DEFINE("_ESESS_FIELD_TIME2", "24 Timmar, Ex  1, 2..");
DEFINE("_ESESS_FIELD_TIME3", "12 Timmar, Ex 01,02..");
DEFINE("_ESESS_FIELD_TIME4", "12 Timmar, Ex  1, 2..");
DEFINE("_ESESS_TITLE_FRONTENDCONTROL", "Front-End Kontroll");
DEFINE("_ESESS_FIELD_LIST_START", "Starta Lista Sessioner");
DEFINE("_ESESS_FIELD_LIST_START_DESC", "");
DEFINE("_ESESS_FIELD_LIST_STOP", "Stoppa Lista Sessioner");
DEFINE("_ESESS_FIELD_LIST_STOP_DESC", "");
DEFINE("_ESESS_FIELD_LIST_CASE0","Omedelbart");
DEFINE("_ESESS_FIELD_LIST_CASE1","N�r Anm�lan b�rjar");
DEFINE("_ESESS_FIELD_LIST_CASE2","N�r Anm�lan slutar");
DEFINE("_ESESS_FIELD_LIST_CASE3","N�r Sessionen b�rjar");
DEFINE("_ESESS_FIELD_LIST_CASE4","When Sessionen slutar");
DEFINE("_ESESS_FIELD_LIST_FULL", "Lista Session som �r fullbelagd");
DEFINE("_ESESS_FIELD_LIST_FULL_DESC", "");
DEFINE("_ESESS_FIELD_LIST_EVERYONE", "Lista Sessioner oavsett tillg�nglighet.");
DEFINE("_ESESS_FIELD_LIST_EVERYONE_DESC", "");
DEFINE("_ESESS_FIELD_USER_NUM", "Visa antal deltagares registereringar");
DEFINE("_ESESS_FIELD_USER_NUM_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER", "Visa Footer i Front-End");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP", "Visa l�nk till Google Maps");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED", "Visa lista p� redan registrerade deltagare.");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED_DESC", "");
DEFINE("_ESESS_TAB_CONFIG_FIELDS","F�lt");

// Back-End :: Configuration :: Valm�jligheter -> Javascript Felbekr�ftelse
DEFINE("_ESESS_VAL_SESS_TITLE", "Du m�ste skriva in en titel");
DEFINE("_ESESS_VAL_REGISTRATION_UP_DATE", "Skriv in Startdatum anm�lan.");
DEFINE("_ESESS_VAL_REGISTRATION_DOWN_DATE", "Skriv in Slutdatum anm�lan.");
DEFINE("_ESESS_VAL_SESSION_UP_DATE", "Sessionens startdatum kan inte vara tomt.");
DEFINE("_ESESS_VAL_SESS_MAX", "Max # Anm�lningar m�ste vara ett heltal");
DEFINE("_ESESS_VAL_SESS_MAXMIN", "Max # Anm�lningar kan inte vara mindre �n Min # Anm�lningar");


// Admin :: Konfiguration :: Tack HTML
DEFINE("_ESESS_FORM_CONFIG_THANK", "Konfigurera Tackmeddelande");
DEFINE("_ESESS_FIELD_THANKYOU", "Tack f�r din anm�lan Sk�rm");
DEFINE("_ESESS_FIELD_THANKYOU_DESC", "");
DEFINE("_ESESS_DEFAULT_THANKYOU", "<h1>Tack {fullname}</h1><p>f�r din anm�lan till (title}<p /><p>Om vi beh�ver kontakta dig senare ang�ende din anm�lan g�r vi det p� {email}</p><p>Du kan se detljerna f�r denna anm�lan <a href=\"{url}\">h�r</a>.</p><p>{data}<br /></p>");

// Back-End :: Konfiguration :: Bekr�fta E-post
DEFINE("_ESESS_FIELD_CONFIRM_SEND", "Skicka Bekr�fta E-post");
DEFINE("_ESESS_FIELD_CONFIRM_SEND_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL", "Bekr�fta E-postadress(er)");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT", "Bekr�fta E-post�mne");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_MSG", "Bekr�fta E-postmeddelande");
DEFINE("_ESESS_FIELD_CONFIRM_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_CONFIRM_SUBJECT", "{title} {action}");
DEFINE("_ESESS_DEFAULT_CONFIRM_MESSAGE", "<p>V�lkommen {fullname}!</p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Vi har mottagit din anm�lan till{title}!</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Om vi beh�bver kontakta dig senare ang�ende din anm�lan g�r vi det p� {email}</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Du kan se detaljerna p� din anm�lan<a href=\"{url}\">h�r</a></span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">{data}<br /></span></p>");

// Back-End :: Konfiguration :: Bekr�fta E-post -> Replacement tag notes
DEFINE("_ESESS_REPLACE_TAGS", "&lt;em&gt;Ers�ttningstaggar&lt;/em&gt;&lt;br /&gt;\nKopiera dessa och s�tt in dem p� respektive plats.");
DEFINE("_ESESS_REPLACE_NAME", "Anv�ndarens Fullst�ndiga namn");
DEFINE("_ESESS_REPLACE_EMAIL", "Anv�ndaren E-postadress");
DEFINE("_ESESS_REPLACE_URL", "URL-adress f�r att visa Sessionsinfo");
DEFINE("_ESESS_REPLACE_TITLE", "Sessionstitel");
DEFINE("_ESESS_REPLACE_ACTION", "Anm�lningshandling (Anm�lan, Uppdatering, Avanm�lan)");
DEFINE("_ESESS_REPLACE_DATA", "Tabell inneh�llande inskrivna data");


// Back-End :: Konfiguration :: Notering om E-post
DEFINE("_ESESS_FIELD_NOTIFY_SEND", "Skicka notering om Epost");
DEFINE("_ESESS_FIELD_NOTIFY_SEND_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT", "Notera �mne E-post");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_MSG", "Notera E-postmeddelande");
DEFINE("_ESESS_FIELD_NOTIFY_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_NOTIFY_SUBJECT", "Ny {title} {action}"); 
DEFINE("_ESESS_DEFAULT_NOTIFY_MESSAGE", "<p>{fullname} {email} �r anm�ld till {title}</p><p>{data} </p>"); 

// Back-End :: Konfiguration :: Avbryt sida
DEFINE("_ESESS_DEFAULT_CANCEL_TITLE", "Anm�lan avbruten");
DEFINE("_ESESS_DEFAULT_CANCEL_TEXT", "{fullname}, din anm�lan har avbrutits f�r{title}<br />Klicka <a href=\"{url}\">h�r</a> f�r att komma tillbaka.");

// Allm�nt -> Kursstatus
DEFINE("_ESESS_STATUS_NEW", "Ny");
DEFINE("_ESESS_STATUS_OPEN", "Plats finns");
DEFINE("_ESESS_STATUS_FULL", "Fullbokat");
DEFINE("_ESESS_STATUS_CLOSED", "St�ngt");

// Allm�nt -> Kurs tillg�nglig f�r
DEFINE("_ESESS_AVAIL_EVERY", "Alla");
DEFINE("_ESESS_AVAIL_REG", "Bara registerade anv�ndare");
DEFINE("_ESESS_AVAIL_GUEST", "Endast g�ster");
DEFINE("_ESESS_AVAIL_GLOBAL", "Global");
DEFINE("_ESESS_AVAIL_GLOBAL2", "Anv�nd Global");

// General -> Traditionella Ikoner Verktygsf�lt
DEFINE("_ESESS_TOOLBAR_VIEW", "Visa");
DEFINE("_ESESS_TOOLBAR_EXPORT", "Exportera");
DEFINE("_ESESS_TOOLBAR_EXPORTALL", "Exportera Allt");
DEFINE("_ESESS_TOOLBAR_EMAIL", "E-post");

// Allm�nt -> File I/O fel
DEFINE("_ESESS_CONFIG_ERR", "Konfigurationsfilen �r inte skrivbar!");
DEFINE("_ESESS_CONFIG_ERR_OPEN", "Konfigurationsfilen kan inte �ppnas f�r skrivning");
DEFINE("_ESESS_CONFIG_ERR_WRITE", "Om�jligt att skriva till Konfigurationsfilen");
DEFINE("_ESESS_CONFIG_SAVE", "Konfigurationen riktigt sparad!");

// Allm�nt -> Bilder anv�nda f�r sortering.
DEFINE("_ESESS_ARROW_UP", "images/uparrow-1.png");
DEFINE("_ESESS_ARROW_DOWN", "images/downarrow-1.png");
DEFINE("_ESESS_ARROW_UNSET", "images/uparrow.png");

// Allm�nt -> Javascript Felmeddelande
DEFINE("_ESESS_VAL_ERROR", "Felmeddelande:");

// Allm�nt -> Dynamiska f�lt
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD","Nytt f�lt");
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD_DESC","Klicka f�r att skapa ett nytt f�lt.");
DEFINE("_ESESS_DYNAMICFIELDS_LOADTABLEERROR","Ett fel uppstod vid h�mtning av registrerade f�lt.");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDNAME","F�ltnamn");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE","F�lttyp");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDPARAMETERS","Skriv specifika parametrar");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXT","Text");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXTAREA","Textarea");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_CHECKBOX","Checkbox");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_RADIO","Radio List");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_SELECT","Select List");
DEFINE("_ESESS_DYNAMICFIELDS_LAYOUT","Layout");
DEFINE("_ESESS_DYNAMICFIELDS_SIZE","Storlek");
DEFINE("_ESESS_DYNAMICFIELDS_ROWS","Rader");
DEFINE("_ESESS_DYNAMICFIELDS_COLS","Kolumner");
DEFINE("_ESESS_DYNAMICFIELDS_INPUTCONTROL","Input Kontroll");
DEFINE("_ESESS_DYNAMICFIELDS_REQUIRED","Obligatorisk");
DEFINE("_ESESS_DYNAMICFIELDS_MAXLENGTH","Max l�ngd");
DEFINE("_ESESS_DYNAMICFIELDS_USERINTERFACE","Anv�ndargr�nssnitt");
DEFINE("_ESESS_DYNAMICFIELDS_DEFAULT","Standard");
DEFINE("_ESESS_DYNAMICFIELDS_CBDEFAULT","Anslutet Community Builder f�lt");
DEFINE("_ESESS_DYNAMICFIELDS_TOOLTIP","R�d");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONS","Valm�jligheter");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONNAME","Ben�mning Valm�jlighet");
DEFINE("_ESESS_DYNAMICFIELDS_ADDOPTION","L�gg till Valm�jlighet");
?>
