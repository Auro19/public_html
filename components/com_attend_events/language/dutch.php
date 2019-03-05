<?php
/**
* @version $Id: dutch.php 02 2006-12-28 22:05 CET carry2web $
* @package Attend Events
* @copyright (C) 2006 Carry Megens
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Check
DEFINE("_ESESS_LANG_INCLUDED", 1);

// Front-End :: Title
DEFINE("_ESESS_COMPONENT_TITLE", "Inschrijven Evenementen");

// Front-End :: List
DEFINE("_ESESS_NAME", "Naam");
DEFINE("_ESESS_VENUE", "Locatie");
DEFINE("_ESESS_SESSION_UP", "Sessie Datum");
DEFINE("_ESESS_REGISTRATION_DOWN", "Inschrijving sluitdatum");
DEFINE("_ESESS_NUM_LEFT", "# Over");
DEFINE("_ESESS_NUM_AVAIL", "# Beschikbaar");
DEFINE("_ESESS_AVAIL_STATUS", "Status");
DEFINE("_ESESS_AVAIL_STATUS_AVAIL", "Beschikbaar");
DEFINE("_ESESS_AVAIL_STATUS_FULL", "Volgeboekt");

// Front-End :: View
DEFINE("_ESESS_REG_HOSTED_BY", "opgezet door ");
DEFINE("_ESESS_REG_DATETIME", "Datum &amp; Tijd");
DEFINE("_ESESS_REG_LOCATION", "Plaats");
DEFINE("_ESESS_REG_MAPTEXT", "Hoe kom ik daar?");
DEFINE("_ESESS_REG_AVAIL", "Inschrijvingen beschikbaar");
DEFINE("_ESESS_REG_CLOSE", "Einde inschrijvingstermijn");
DEFINE("_ESESS_UNLIMITED", "Ongelimiteerd");
DEFINE("_ESESS_OUT_OF", "van ");
DEFINE("_ESESS_FIELD_COMMENTS", "Commentaar");
DEFINE("_ESESS_FIELD_COMMENTS_DESC", "");
DEFINE("_ESESS_ERROR_ONLY_REGISTERED", "Alleen geregistreerde gebruikers mogen zich inschrijven voor deze sessie.");
DEFINE("_ESESS_ERROR_ONLY_GUESTS", "Alleen bezoekers mogen zich inschrijven voor deze sessie.");
DEFINE("_ESESS_ERROR_FULL", "Deze sessie is volgeboekt.");
DEFINE("_ESESS_ERROR_CLOSED", "De inschrijvingstermijn is voorbij.");
DEFINE("_ESESS_REG_LIST", "Reeds ingeschreven personen");

// Front End :: View -> Registration Form
DEFINE("_ESESS_FIELD_FULLNAME", "Volledige Naam");
DEFINE("_ESESS_FIELD_FULLNAME_DESC", "Graag volledige naam opgeven in geval we contact met je willen opnemen.");
DEFINE("_ESESS_FIELD_EMAIL", "Email");
DEFINE("_ESESS_FIELD_EMAIL_DESC", "Graag hier je email adres opgeven.");
DEFINE("_ESESS_FIELD_NUM_PEOPLE", "Aantal personen");
DEFINE("_ESESS_FIELD_NUM_PEOPLE_DESC", "Voor hoeveel mensen wil je inschrijven?");
DEFINE("_ESESS_BUTTON_REGISTER", "Schrijf in");
DEFINE("_ESESS_BUTTON_RESET", "Leegmaken");
DEFINE("_ESESS_BUTTON_UPDATE", "Bijwerken Inschrijving");
DEFINE("_ESESS_BUTTON_CANCEL", "Inschrijving Afbreken");
DEFINE("_ESESS_VAL_REG_ALERT", "Problemen met de inschrijving:");
DEFINE("_ESESS_VAL_REG_FULLNAME", "Je Volledige Naam moest worden ingevuld.");
DEFINE("_ESESS_VAL_REG_EMAIL", "Je Email adres moest worden ingevuld.");
DEFINE("_ESESS_VAL_REG_NUMBER", "Aantal personen is geen geldig geheel getal tussen 1 en ");

// Back-End -> General
DEFINE("_ESESS_REQUIRED", "<span style=\"color: red;\">*</span>");
DEFINE("_ESESS_STYLE_TITLE", "style=\"background-color: #E0E0E0; font-weight: bold; border-bottom: 1px solid #B0B0B\"");

// Back-End -> Menus
DEFINE("_ESESS_MENU_SESSIONS", "Sessies");
DEFINE("_ESESS_MENU_VENUES", "Locaties");
DEFINE("_ESESS_MENU_REGISTRATIONS", "Inschrijvingen");
DEFINE("_ESESS_MENU_CONFIGURATION", "Instellingen");

// Back-End :: Sessions :: List
DEFINE("_ESESS_FORM_SLIST", "Sessies Beheer");
DEFINE("_ESESS_SLIST_NAME", "Naam");
DEFINE("_ESESS_SLIST_SESSION_UP", "Sess. Startdatum");
DEFINE("_ESESS_SLIST_SESSION_DOWN", "Sess. Einddatum");
DEFINE("_ESESS_SLIST_REGISTRATION_UP", "Startdatum inschrijven");
DEFINE("_ESESS_SLIST_REGISTRATION_DOWN", "Einddatum inschrijven");
DEFINE("_ESESS_SLIST_NUM_REGISTRATIONS", "Inschrijvingen");
DEFINE("_ESESS_SLIST_STATUS", "Status");
DEFINE("_ESESS_SLIST_AVAIL", "Beschikbaarheid");
DEFINE("_ESESS_SLIST_PUB", "Gepubliceerd");
// Back-End :: Sessions :: List -> Filters
DEFINE("_ESESS_SFILTER_CHOOSE", "Kies een Filter");
DEFINE("_ESESS_SFILTER_NONE", "Geen Filters");
DEFINE("_ESESS_SFILTER_STATUS", "- Status Filters");
DEFINE("_ESESS_SFILTER_AVAIL", "- Beschikbaarheid Filters");
DEFINE("_ESESS_SFILTER_EVENT", "- Evenement Filters");
DEFINE("_ESESS_RFILTER_CHOOSE", "Kies een Sessie");
DEFINE("_ESESS_RFILTER_ALL", "- Alle Sessies");
// Back-End :: Sessions :: List -> Javascript Validation Errors
DEFINE("_ESESS_PUBLISH_MSG", "Selecteer een Sessie om te ");
DEFINE("_ESESS_DELETE_SESSION_MSG", "Selecteer een Sessie om te verwijderen");


// Back-End :: Sessions :: Edit
DEFINE("_ESESS_FORM_SESS_ADD", "Voeg Sessie toe");
DEFINE("_ESESS_FORM_SESS_EDIT", "Wijzig Sessie");
DEFINE("_ESESS_TITLE_DESCRIPTION", "Sessie Details");
DEFINE("_ESESS_TITLE_SESSION_GENERAL","Algemeen");
DEFINE("_ESESS_TITLE_SESSION_DATETIME","Datum & Tijd");
DEFINE("_ESESS_FIELD_EVENT", "Evenement");
DEFINE("_ESESS_FIELD_EVENT_DESC", "Selecteer een bestaand Evenement om een sessie voor te maken.");
DEFINE("_ESESS_NO_EVENT", "Geen Evenement");
DEFINE("_ESESS_FIELD_TITLE", "Titel");
DEFINE("_ESESS_FIELD_TITLE_DESC", "Voer een Titel in voor de sessie.");
DEFINE("_ESESS_FIELD_INTRO", "Beschrijving");
DEFINE("_ESESS_FIELD_INTRO_DESC", "Korte beschrijvende introductie tekst voor deze sessie. Handig als er geen link is naar een Evenement.");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE", "Startdatum Sessie");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE_DESC", "Datum wanneer de sessie begint.");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME", "Aanvangstijd Sessie");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE", "Einddatum Sessie");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE_DESC", "Eind datum van de sessie.");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME", "Eindtijd Sessie");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_FIELD_STATUS", "Status");
DEFINE("_ESESS_FIELD_STATUS_DESC", "Status van de Sessie:<br />Nieuw is niet beschikbaar<br />Open voor inschrijving<br />Gesloten is uiteraard gesloten<br />Volgeboekt heeft max. aantal inschrijvingen bereikt");
DEFINE("_ESESS_FIELD_MAX", "Max # Inschrijvingen");
DEFINE("_ESESS_FIELD_MAX_DESC", "Het maximum aantal inschrijvingen voor deze sessie.<br />Als dit maximum bereikt is wordt de status gewijzigd in Volgeboekt");
DEFINE("_ESESS_FIELD_AVAIL", "Beschikbaarheid");
DEFINE("_ESESS_FIELD_AVAIL_DESC", "Geeft aan wie zich mag inschrijven voor de sessie.<br />Gebruik Globaal gebruikt de voorkeur zoals in de globale instellingen is opgeslagen");
DEFINE("_ESESS_FIELD_PUBLISH", "Publiceren");
DEFINE("_ESESS_FIELD_PUBLISH_DESC", "Geeft aan of deze sessie is gepubliceerd.");
DEFINE("_ESESS_FIELD_SESSION_HOST", "Sessie gastheer/vrouw");
DEFINE("_ESESS_FIELD_SESSION_HOST_DESC", "Selecteer een gastheer/gastvrouw voor deze sessie. Om in deze lijst voor te komen moet een gebruiker auteur of hoger zijn.");
DEFINE("_ESESS_TAB_SESSION_REGISTRATION","Inschrijving");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE", "Startdatum Inschrijvingen");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE_DESC", "Datum vanaf wanneer inschrijvingen geaccepteerd worden. De link wordt pas weergegeven vanaf deze datum.");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME", "Starttijd Inschrijvingen");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE", "Einddatum Inschrijvingen");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE_DESC", "Einde inschrijvingstermijn. Link is niet langer weergegeven na deze datum.");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME", "Eindtijd Inschrijvingen");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_TAB_SESSION_VENUE","Locatie");
DEFINE("_ESESS_FIELD_VENUE_LIST", "Voorgedefinieerde Locaties");
DEFINE("_ESESS_FIELD_VENUE_LIST_DESC", "Selecteer een locatie voorgedefinieerd in de locaties tabel of gebruik de velden hieronder om aan te geven waar de sessie is.");


// Back-End :: Venues
DEFINE("_ESESS_FORM_VLIST", "Evenement Locatie");
DEFINE("_ESESS_VLIST_NAME", "Locatie naam");

// Back-End :: Venues :: Edit
DEFINE("_ESESS_FORM_VENUE_ADD", "Voeg locatie toe");
DEFINE("_ESESS_FORM_VENUE_EDIT", "Wijzig locatie");
DEFINE("_ESESS_FIELD_VENUE_TITLE", "Naam");
DEFINE("_ESESS_FIELD_VENUE_TITLE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS", "Adres");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_CITY", "Plaats");
DEFINE("_ESESS_FIELD_VENUE_CITY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_STATE", "Provincie");
DEFINE("_ESESS_FIELD_VENUE_STATE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE", "Postcode");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY", "Land");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS", "Website adres");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS_DESC", "Zorg ervoor dat &quot;http://&quot; in website adres voorkomt");
DEFINE("_ESESS_JSERROR_VENUE_TITLE", "Je moet de locatie naam invoeren");
DEFINE("_ESESS_JSERROR_VENUE_ADDRESS", "Je moet het locatie adres invoeren.");

// Back-End :: Registrations :: List
DEFINE("_ESESS_FORM_RLIST", "Evenementen Inschrijvingen");
DEFINE("_ESESS_RLIST_NAME", "Naam");
DEFINE("_ESESS_RLIST_EMAIL", "Email");
DEFINE("_ESESS_RLIST_TITLE", "Sessie");
DEFINE("_ESESS_RLIST_RDATE", "Inschrijfdatum");
DEFINE("_ESESS_RLIST_STATUS", "Status");
DEFINE("_ESESS_RLIST_NUM", "# Inschrijvingen");
DEFINE("_ESESS_RLIST_VIEWED", "Bekeken");
DEFINE("_ESESS_REGISTRATION_STATUS_REGISTERED", "Ingeschreven");
DEFINE("_ESESS_REGISTRATION_STATUS_CANCELLED", "Geannuleerd");
DEFINE("_ESESS_REGISTRATION_STATUS_CLOSED", "Gesloten");
DEFINE("_ESESS_DELETE_REG_MSG", "Selecteer een inschrijving om te verwijderen");

// Back-End :: Registrations :: View
DEFINE("_ESESS_FORM_REG_VIEW", "Bekijk Inschrijving");
DEFINE("_ESESS_FIELD_SESSION", "Sessie");
DEFINE("_ESESS_FIELD_REGISTRATION_DATE", "Inschrijfdatum");
DEFINE("_ESESS_FIELD_CANCELLATION_DATE", "Annuleerdatum");
DEFINE("_ESESS_FIELD_REGISTRATION_STATUS", "Status");

// Back-End :: Registrations :: Export
DEFINE("_ESESS_FORM_EXPORT", "Exporteer Inschrijvingen");
DEFINE("_ESESS_FIELD_METHOD", "Exporteer Methode");
DEFINE("_ESESS_FIELD_METHOD_CSV", "CSV");
DEFINE("_ESESS_FIELD_FILENAME", "Bestandsnaam");
// Back-End :: Registrations :: Export -> Javascript Validation Errors
DEFINE("_ESESS_VAL_EXPORT_FILENAME", "Bestandsnaam mag niet leeg zijn.");
DEFINE("_ESESS_EXPORT_MSG", "Onbekende Exporteer Methode");

// Back-End :: Configuration
DEFINE("_ESESS_FORM_CONFIG", "Instellingen");
DEFINE("_ESESS_FORM_CONFIG_CONFIRM", "Stel Bevestigingsemail bericht op");
DEFINE("_ESESS_FORM_CONFIG_NOTIFY", "Stel Notificatieemail bericht op");
DEFINE("_ESESS_FORM_CONFIG_CANCEL", "Stel Annuleringsemail bericht op");
DEFINE("_ESESS_ACTION_REGISTER", "Inschrijven");
DEFINE("_ESESS_ACTION_UPDATE", "Bijwerken");
DEFINE("_ESESS_ACTION_CANCEL", "Annuleer");
DEFINE("_ESESS_BUTTON_OPTIONS","Opties");
DEFINE("_ESESS_BUTTON_OPTIONS_IMG","images/config.png");
DEFINE("_ESESS_BUTTON_THANK","Dank u weergave");
DEFINE("_ESESS_BUTTON_THANK_IMG","images/menu.png");
DEFINE("_ESESS_BUTTON_CONFIRM","Bevestigings Email");
DEFINE("_ESESS_BUTTON_CONFIRM_IMG","images/messaging.png");
DEFINE("_ESESS_BUTTON_NOTIFY","Notificatie Email");
DEFINE("_ESESS_BUTTON_NOTIFY_IMG","images/message_config.png");
DEFINE("_ESESS_BUTTON_CANCELLATION","Annulerings Email");
DEFINE("_ESESS_BUTTON_CANCELLATION_IMG","images/inbox.png");

// Admin :: Config :: Options
DEFINE("_ESESS_FORM_CONFIG_OPTIONS", "Instellingen Opties");
DEFINE("_ESESS_TAB_CONFIG_GENERAL","Algemeen");
DEFINE("_ESESS_TITLE_INTEGRATION", "Integratie met andere componenten");
DEFINE("_ESESS_FIELD_INTEGRATE", "Integreer met <b>JEvents</b> Component");
DEFINE("_ESESS_FIELD_INTEGRATE_DESC", "Een sessie kan geassocieerd worden met een evenement uit de <i>JEvents</i> component.<br><b>NB:  Klik op de &quot;Apply&quot; knop na het wijzigen van deze waarde</b>.");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT", "Toon Evenement onderwerp");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY", "Toon Evenement activiteit");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_LOCATION", "Toon Evenement locatie");
DEFINE("_ESESS_FIELD_SHOW_LOCATION_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_CONTACT", "Toon Evenement Contact");
DEFINE("_ESESS_FIELD_SHOW_CONTACT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_EXTRA", "Toon Evenement Extras");
DEFINE("_ESESS_FIELD_SHOW_EXTRA_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_TIME", "Toon Evenement Tijden");
DEFINE("_ESESS_FIELD_SHOW_TIME_DESC", "");
DEFINE("_ESESS_FIELD_CBINTEGRATED","Integreer met de <b>Community Builder</b> Component");
DEFINE("_ESESS_FIELD_CBINTEGRATED_DESC","Standaard waardes voor ieder inschrijvings veld kan worden gegenereerd uit de gegevens opgeslagen in een gebruikers profiel uit Community Builder (zie \'Velden\' tab).<br><b>NB:  Klik de &quot;Apply&quot; knop na het wijzigen van deze waarde</b>.");
DEFINE("_ESESS_FIELD_SHOWAVATAR", "Toon Avatar");
DEFINE("_ESESS_FIELD_SHOWAVATAR_DESC", "");
DEFINE("_ESESS_TITLE_REGISTRATIONCONTROL", "Inschrijvingen Controle");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW", "Sta inschrijvingen toe van");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW_DESC", "");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL", "Sta uitsluitend individuele inschrijvingen toe");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL_DESC", "");
DEFINE("_ESESS_FIELD_FULL_PROC", "Sta volledige verwerking toe");
DEFINE("_ESESS_FIELD_FULL_PROC_DESC", "");
DEFINE("_ESESS_FIELD_REG_CANCEL", "Sta annulering van geregistreerde gebruikers toe");
DEFINE("_ESESS_FIELD_REG_CANCEL_DESC", "");
DEFINE("_ESESS_TITLE_DATETIME", "Datum en Tijd opmaak");
DEFINE("_ESESS_FIELD_DATE_SHORT", "Datum Formaat (verkort)");
DEFINE("_ESESS_FIELD_DATE_SHORT_DESC", "");
DEFINE("_ESESS_FIELD_DATE_LONG", "Datum Formaat (lang)");
DEFINE("_ESESS_FIELD_DATE_LONG_DESC", "");
DEFINE("_ESESS_FIELD_TIME", "Tijd Formaat");
DEFINE("_ESESS_FIELD_TIME_DESC", "");
DEFINE("_ESESS_FIELD_TIME1", "24 uurs, Leidende nul");
DEFINE("_ESESS_FIELD_TIME2", "24 uurs, Leidende spatie");
DEFINE("_ESESS_FIELD_TIME3", "12 uurs, Leidende nul");
DEFINE("_ESESS_FIELD_TIME4", "12 uurs, Leidende spatie");
DEFINE("_ESESS_TITLE_FRONTENDCONTROL", "Presentatie Controle");
DEFINE("_ESESS_FIELD_LIST_START", "Start Weergave Sessies");
DEFINE("_ESESS_FIELD_LIST_START_DESC", "");
DEFINE("_ESESS_FIELD_LIST_STOP", "Stop Weergave Sessies");
DEFINE("_ESESS_FIELD_LIST_STOP_DESC", "");
DEFINE("_ESESS_FIELD_LIST_CASE0","Direkt");
DEFINE("_ESESS_FIELD_LIST_CASE1","Als Inschrijving begint");
DEFINE("_ESESS_FIELD_LIST_CASE2","Als Inschrijving eindigt");
DEFINE("_ESESS_FIELD_LIST_CASE3","Als Sessie begint");
DEFINE("_ESESS_FIELD_LIST_CASE4","Als Sessie eindigt");
DEFINE("_ESESS_FIELD_LIST_FULL", "Geef volgeboekte sessies weer");
DEFINE("_ESESS_FIELD_LIST_FULL_DESC", "");
DEFINE("_ESESS_FIELD_LIST_EVERYONE", "Geef Sessies weer ongeacht beschikbaarheid");
DEFINE("_ESESS_FIELD_LIST_EVERYONE_DESC", "");
DEFINE("_ESESS_FIELD_USER_NUM", "Toon aantal ingeschreven gebruikers");
DEFINE("_ESESS_FIELD_USER_NUM_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER", "Toon voetnote in weergave");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP", "Geef Link weer naar Google Maps");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED", "Toon Lijst van 'Reeds Ingeschreven' gebruikers");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_VENUE", "Toon Locatie in lijsten");
DEFINE("_ESESS_FIELD_DISPLAY_VENUE_DESC", "");
DEFINE("_ESESS_TAB_CONFIG_FIELDS","Velden");
// Back-End :: Configuration :: Options -> Javascript Validation Errors
DEFINE("_ESESS_VAL_SESS_TITLE", "Titel kan niet leeg zijn.");
DEFINE("_ESESS_VAL_REGISTRATION_UP_DATE", "Startdatum Inschrijving kan niet leeg zijn.");
DEFINE("_ESESS_VAL_REGISTRATION_DOWN_DATE", "Einddatum Inschrijving kan niet leeg zijn.");
DEFINE("_ESESS_VAL_SESSION_UP_DATE", "Startdatum Sessie kan niet leeg zijn");
DEFINE("_ESESS_VAL_SESS_MAX", "Max # Inschrijvingen moet een geheel getal >=0 zijn.");
DEFINE("_ESESS_VAL_SESS_MAXMIN", "Max # Inschrijvingen kan niet minder zijn dan Min # Inschrijvingen");


// Admin :: Configuration :: Thank-You HTML
DEFINE("_ESESS_FORM_CONFIG_THANK", "Instellen Dank U bericht");
DEFINE("_ESESS_FIELD_THANKYOU", "Inschrijving Dank U scherm");
DEFINE("_ESESS_FIELD_THANKYOU_DESC", "");
DEFINE("_ESESS_DEFAULT_THANKYOU", "<h1>Dank u {fullname}!</h1><p>Je hebt je ingeschreven voor {title}<p /><p>Als we contact willen opnemen over deze inschrijving gebruiken we daarvoor dit mail adres {email}</p><p>De <a href=\"{url}\">sessie details</a> waarvoor je je hebt ingeschreven kun je online nakijken.</p><p>{data}<br /></p>");

// Back-End :: Configuration :: Confirmation Email
DEFINE("_ESESS_FIELD_CONFIRM_SEND", "Stuur Bevestigings Email");
DEFINE("_ESESS_FIELD_CONFIRM_SEND_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL", "Bevestigings Email Adres(sen)");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT", "Bevestigings Email Onderwerp");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_MSG", "Bevestigings Email Bericht");
DEFINE("_ESESS_FIELD_CONFIRM_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_CONFIRM_SUBJECT", "{title} {action}");
DEFINE("_ESESS_DEFAULT_CONFIRM_MESSAGE", "<p>Beste {fullname}</p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Je bent ingeschreven voor {title}!</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Als we contact op willen nemen over deze inschrijving gebruiken we daartoe dit email adres {email}</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Online kun je de <a href=\"{url}\">details van de sessie</a> waarvoor je je hebt ingeschreven nakijken.</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">{data}<br /></span></p>");

// Back-End :: Configuration :: Confirmation Email -> Replacement tag notes
DEFINE("_ESESS_REPLACE_TAGS", "&lt;em&gt;Replacment Tags&lt;/em&gt;&lt;br /&gt;\nKnip en plak deze in velden voor vervanging.");
DEFINE("_ESESS_REPLACE_NAME", "Volledige Naam gebruiker");
DEFINE("_ESESS_REPLACE_EMAIL", "Email adres gebruiker");
DEFINE("_ESESS_REPLACE_URL", "De URL voor weergave sessie details");
DEFINE("_ESESS_REPLACE_TITLE", "De Sessie Titel");
DEFINE("_ESESS_REPLACE_ACTION", "De Inschrijvingen Actie (Inschrijven, Wijzig, Annuleer)");
DEFINE("_ESESS_REPLACE_DATA", "Tabel met ingevoerde gegevens");


// Back-End :: Configuration :: Notification Email
DEFINE("_ESESS_FIELD_NOTIFY_SEND", "Stuur Notificatie Email");
DEFINE("_ESESS_FIELD_NOTIFY_SEND_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT", "Notificatie Email Onderwerp");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_MSG", "Notificatie Email Bericht");
DEFINE("_ESESS_FIELD_NOTIFY_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_NOTIFY_SUBJECT", "Nieuw evenement {title} {action}"); 
DEFINE("_ESESS_DEFAULT_NOTIFY_MESSAGE", "<p>{fullname} {email} heeft zich ingeschreven voor {title}</p><p>{data} </p>"); 

// Back-End :: Configuration :: Cancel Page
DEFINE("_ESESS_DEFAULT_CANCEL_TITLE", "Inschrijving Geannuleerd");
DEFINE("_ESESS_DEFAULT_CANCEL_TEXT", "{fullname}, je inschrijving voor {title} is geannuleerd<br />Klik <a href=\"{url}\">hier</a> om naar deze sessie toe te gaan.");




// Back-End :: About
DEFINE("_ESESS_TOOLBAR_UNINSTALL", "De-Installatie");
DEFINE("_ESESS_TOOLBAR_SAVESETTINGS", "Instellingen");
DEFINE("_ESESS_TOOLBAR_UPDATE", "Bijwerken");
DEFINE("_ESESS_UNINSTALL_CONFIRM", "Weet je zeker dat je alle Attend Events database informatie wilt verwijderen?");
DEFINE("_ESESS_UNINSTALL_MESSAGE", "Alle Attend Events data is met succes verwijderd!  Je kunt nu de component de-installeren.");
DEFINE("_ESESS_UPDATE_CONFIRM", "Heb je een backup gemaakt van je Joomla database?");




// General -> Session Status
DEFINE("_ESESS_STATUS_NEW", "Nieuw");
DEFINE("_ESESS_STATUS_OPEN", "Open");
DEFINE("_ESESS_STATUS_FULL", "Volgeboekt");
DEFINE("_ESESS_STATUS_CLOSED", "Gesloten");

// General -> Session Availability
DEFINE("_ESESS_AVAIL_EVERY", "Iedereen");
DEFINE("_ESESS_AVAIL_REG", "Alleen Geregistreerde gebruikers");
DEFINE("_ESESS_AVAIL_GUEST", "Alleen bezoekers");
DEFINE("_ESESS_AVAIL_GLOBAL", "Globale instelling");
DEFINE("_ESESS_AVAIL_GLOBAL2", "Gebruik Globale instelling");

// General -> Custom Toolbar Icons
DEFINE("_ESESS_TOOLBAR_VIEW", "Bekijk");
DEFINE("_ESESS_TOOLBAR_EXPORT", "Exporteer");
DEFINE("_ESESS_TOOLBAR_EXPORTALL", "Exporteer Alles");
DEFINE("_ESESS_TOOLBAR_EMAIL", "Email");

// General -> File I/O errors
DEFINE("_ESESS_CONFIG_ERR", "Configuratie bestand is niet beschrijfbaar!");
DEFINE("_ESESS_CONFIG_ERR_OPEN", "Kan Configuratie bestand niet openen om te beschrijven");
DEFINE("_ESESS_CONFIG_ERR_WRITE", "Kan Configuratie bestand niet wegschrijven");
DEFINE("_ESESS_CONFIG_SAVE", "Configuratie opgeslagen!");

// General -> Images used for sorting
DEFINE("_ESESS_ARROW_UP", "images/uparrow-1.png");
DEFINE("_ESESS_ARROW_DOWN", "images/downarrow-1.png");
DEFINE("_ESESS_ARROW_UNSET", "images/uparrow.png");

// General -> Javascript Validation
DEFINE("_ESESS_VAL_ERROR", "Validatie Fouten:");

// General -> Dynamic Fields
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD","Nieuw Invoerveld");
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD_DESC","Klik om een nieuw invoerveld te maken.");
DEFINE("_ESESS_DYNAMICFIELDS_LOADTABLEERROR","Er is een fout opgetreden bij het laden van de registratie velden.");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDNAME","Invoerveld naam");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE","Soort invoerveld");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDPARAMETERS","Soort Specifieke Parameters");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXT","Tekst");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXTAREA","Tekstgebied");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_CHECKBOX","Meerkeuze Aanvinken");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_RADIO","Enkelvoudig Aanvinken");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_SELECT","Keuze Lijst");
DEFINE("_ESESS_DYNAMICFIELDS_LAYOUT","Opmaak");
DEFINE("_ESESS_DYNAMICFIELDS_SIZE","Grootte");
DEFINE("_ESESS_DYNAMICFIELDS_ROWS","Rijen");
DEFINE("_ESESS_DYNAMICFIELDS_COLS","Kolommen");
DEFINE("_ESESS_DYNAMICFIELDS_INPUTCONTROL","Invoer Control");
DEFINE("_ESESS_DYNAMICFIELDS_REQUIRED","Verplicht");
DEFINE("_ESESS_DYNAMICFIELDS_MAXLENGTH","Maximale Lengte");
DEFINE("_ESESS_DYNAMICFIELDS_USERINTERFACE","Gebruikers Interface");
DEFINE("_ESESS_DYNAMICFIELDS_DEFAULT","Standaard");
DEFINE("_ESESS_DYNAMICFIELDS_CBDEFAULT","Overeenkomstig Community Builder Veld");
DEFINE("_ESESS_DYNAMICFIELDS_TOOLTIP","Tooltip");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONS","Keuzes");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONNAME","Keuze Naam");
DEFINE("_ESESS_DYNAMICFIELDS_ADDOPTION","Voeg Keuze toe");
?>
