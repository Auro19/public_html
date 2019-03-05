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
DEFINE("_ESESS_COMPONENT_TITLE", "Kursanmälan");

// Front-End :: List
DEFINE("_ESESS_NAME", "Namn");
DEFINE("_ESESS_SESSION_UP", "Startdatum anmälan");
DEFINE("_ESESS_REGISTRATION_DOWN", "Slutdatum anmälan");
DEFINE("_ESESS_NUM_LEFT", "# platser kvar");
DEFINE("_ESESS_NUM_AVAIL", "# tillgängliga platser");
DEFINE("_ESESS_AVAIL_STATUS", "Status");
DEFINE("_ESESS_AVAIL_STATUS_AVAIL", "Plats finns");
DEFINE("_ESESS_AVAIL_STATUS_FULL", "Fullbokad");

// Front-End :: View
DEFINE("_ESESS_REG_HOSTED_BY", "Skapad av");
DEFINE("_ESESS_REG_DATETIME", "Datum &amp; Tid");
DEFINE("_ESESS_REG_LOCATION", "Plats");
DEFINE("_ESESS_REG_MAPTEXT", "Hur hittar jag dit?");
DEFINE("_ESESS_REG_AVAIL", "Tillgängliga ");
DEFINE("_ESESS_REG_CLOSE", "Registrering avslutas");
DEFINE("_ESESS_UNLIMITED", "Obegränsat");
DEFINE("_ESESS_OUT_OF", "out of");
DEFINE("_ESESS_FIELD_COMMENTS", "Kommentarer");
DEFINE("_ESESS_FIELD_COMMENTS_DESC", "");
DEFINE("_ESESS_ERROR_ONLY_REGISTERED", "Bara registrerade användare kan anmäla sig för denna session.");
DEFINE("_ESESS_ERROR_ONLY_GUESTS", "Bara gäster kan anmäls sig till denna session.");
DEFINE("_ESESS_ERROR_FULL", "Kursen är fullbokad.");
DEFINE("_ESESS_REG_LIST", "Personen/erna är redan registrerade");

// Front End :: Vy -> Anmälningsblankett
DEFINE("_ESESS_FIELD_FULLNAME", "Namn");
DEFINE("_ESESS_FIELD_FULLNAME_DESC", "Skriv in ditt fullständiga namn Förnamn Efternamn.");
DEFINE("_ESESS_FIELD_EMAIL", "E-post");
DEFINE("_ESESS_FIELD_EMAIL_DESC", "Skriv in din E-post adress för att få bekräftelse på registrering.");
DEFINE("_ESESS_FIELD_NUM_PEOPLE", "Antal registrerade");
DEFINE("_ESESS_FIELD_NUM_PEOPLE_DESC", "Antal personer att registrera?");
DEFINE("_ESESS_BUTTON_REGISTER", "Anmäl");
DEFINE("_ESESS_BUTTON_RESET", "Rensa");
DEFINE("_ESESS_BUTTON_UPDATE", "Uppdatera Anmälning");
DEFINE("_ESESS_BUTTON_CANCEL", "Avanmälning");
DEFINE("_ESESS_VAL_REG_ALERT", "Felmeddelande Anmälan:");
DEFINE("_ESESS_VAL_REG_FULLNAME", "Skriv in ditt fullständiga namn.");
DEFINE("_ESESS_VAL_REG_EMAIL", "Skriv in din e-postadress.");
DEFINE("_ESESS_VAL_REG_NUMBER", "Antal personer är inte ett heltal mellan 1 - ");

// Back-End -> Allmänt
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
DEFINE("_ESESS_SLIST_REGISTRATION_UP", "Startdatum Anmälan");
DEFINE("_ESESS_SLIST_REGISTRATION_DOWN", "Slutdatum Anmälan");
DEFINE("_ESESS_SLIST_NUM_REGISTRATIONS", "Anmälningar");
DEFINE("_ESESS_SLIST_STATUS", "Status");
DEFINE("_ESESS_SLIST_AVAIL", "Tillgänglighet");
DEFINE("_ESESS_SLIST_PUB", "Publiserad");
// Back-End :: Sessioner :: Lista -> Filter
DEFINE("_ESESS_SFILTER_CHOOSE", "Välj ett Filter");
DEFINE("_ESESS_SFILTER_NONE", "Inga Filter");
DEFINE("_ESESS_SFILTER_STATUS", "- Statusfilter");
DEFINE("_ESESS_SFILTER_AVAIL", "- Tillgänglighetsfilter");
DEFINE("_ESESS_SFILTER_EVENT", "- Evenemangsfilter");
DEFINE("_ESESS_RFILTER_CHOOSE", "Välj en Session");
DEFINE("_ESESS_RFILTER_ALL", "- Alla Sessioner");
// Back-End :: Sessioner :: List -> Javascript Felmeddelande
DEFINE("_ESESS_PUBLISH_MSG", "Välj en Session för att ");
DEFINE("_ESESS_DELETE_SESSION_MSG", "Välj en session för att ta bort.");


// Back-End :: Sessioner :: Redigera
DEFINE("_ESESS_FORM_SESS_ADD", "Lägg till Session");
DEFINE("_ESESS_FORM_SESS_EDIT", "Redigera Session");
DEFINE("_ESESS_TITLE_DESCRIPTION", "Sessionsdetaljer");
DEFINE("_ESESS_TITLE_SESSION_GENERAL","Allmänt");
DEFINE("_ESESS_TITLE_SESSION_DATETIME","Datum & Tid");
DEFINE("_ESESS_FIELD_EVENT", "Evenemang");
DEFINE("_ESESS_FIELD_EVENT_DESC", "Välj ett existerande evenemang för att skapa en session till.");
DEFINE("_ESESS_NO_EVENT", "Inga Evenemang");
DEFINE("_ESESS_FIELD_TITLE", "Titel");
DEFINE("_ESESS_FIELD_TITLE_DESC", "Skriv in en titel för Sessionen.");
DEFINE("_ESESS_FIELD_INTRO", "Beskrivning");
DEFINE("_ESESS_FIELD_INTRO_DESC", "Någon introduktionstext om denna Session.  Bra hjälp om den inte är länkad till ett evenemang.");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE", "Startdatum Session");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE_DESC", "Datum när sessionen börjar.");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME", "Starttid Session");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE", "Slutdtaum Session");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE_DESC", "Datum när sessionen slutar.");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME", "Sluttid Session");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_FIELD_STATUS", "Status");
DEFINE("_ESESS_FIELD_STATUS_DESC", "Övergripande Sessionsstatus:<br />Ny är inte tillgänglig<br />Anmälan kan göras om Plats finns<br />Stängd är självklart Stängd.<br />Fullbokad har nått Max Anmälningar");
DEFINE("_ESESS_FIELD_MAX", "Max # Anmälningar");
DEFINE("_ESESS_FIELD_MAX_DESC", "Maximalt antal anmälningar som tillåts för sessionen.<br />När maxantalet nåtts ändras status till Fullbokad");
DEFINE("_ESESS_FIELD_AVAIL", "Tillgänglighet");
DEFINE("_ESESS_FIELD_AVAIL_DESC", "Indikerar vem som tillåts anmäla sig för sessioner.<br />Använd Global för att sätta preferenserna i konfigurationen");
DEFINE("_ESESS_FIELD_PUBLISH", "Publisera");
DEFINE("_ESESS_FIELD_PUBLISH_DESC", "Indikerar att sessionen är publicerad.");
DEFINE("_ESESS_FIELD_SESSION_HOST", "Sessionsvärd");
DEFINE("_ESESS_FIELD_SESSION_HOST_DESC", "Välj en värd för denna session.  För attfinnas i denna lista, måste en användare ha gruppåtkomstbehörighet (group access level) av &quot;author&quot; eller högre.");
DEFINE("_ESESS_TAB_SESSION_REGISTRATION","Anmälan");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE", "Startdatum anmälan");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE_DESC", "Datum för att börja ta emot anmälningar. Länk visas inte innan detta datum.");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME", "Starttid anmälan.");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE", "Slutdatum anmälan");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE_DESC", "Datum för att sluta ta emot anmälningar. Länk visas inte efter detta datum.");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME", "Sluttid anmälan.");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_TAB_SESSION_VENUE","PLats");
DEFINE("_ESESS_FIELD_VENUE_LIST", "Vanliga platser");
DEFINE("_ESESS_FIELD_VENUE_LIST_DESC", "Välj en plats som finns i Platstabellen, eller skriv in platsinformation i fältet nedan.");


// Back-End :: Plats
DEFINE("_ESESS_FORM_VLIST", "Evenemangsplatser");
DEFINE("_ESESS_VLIST_NAME", "Platsnamn");

// Back-End :: Platser :: Ändra
DEFINE("_ESESS_FORM_VENUE_ADD", "Lägg till Plats");
DEFINE("_ESESS_FORM_VENUE_EDIT", "Redigera Plats");
DEFINE("_ESESS_FIELD_VENUE_TITLE", "Namn");
DEFINE("_ESESS_FIELD_VENUE_TITLE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS", "Adress");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_CITY", "Stad");
DEFINE("_ESESS_FIELD_VENUE_CITY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_STATE", "Län");
DEFINE("_ESESS_FIELD_VENUE_STATE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE", "Postnummer");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY", "Land");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS", "Webbadress");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS_DESC", "Se till att inkludera &quot;http://&quot;");
DEFINE("_ESESS_JSERROR_VENUE_TITLE", "Du måste skriva in platsens namn.");
DEFINE("_ESESS_JSERROR_VENUE_ADDRESS", "Du måste skriva in platsens adress.");

// Back-End :: Anmälningar :: Lista
DEFINE("_ESESS_FORM_RLIST", "Evenemangsanmälningar");
DEFINE("_ESESS_RLIST_NAME", "Namn");
DEFINE("_ESESS_RLIST_EMAIL", "E-post");
DEFINE("_ESESS_RLIST_TITLE", "Session");
DEFINE("_ESESS_RLIST_RDATE", "Anmälningsdatum");
DEFINE("_ESESS_RLIST_STATUS", "Status");
DEFINE("_ESESS_RLIST_NUM", "# Anmälningar");
DEFINE("_ESESS_RLIST_VIEWED", "Visad");
DEFINE("_ESESS_REGISTRATION_STATUS_REGISTERED", "Anmäld");
DEFINE("_ESESS_REGISTRATION_STATUS_CANCELLED", "Avanmäld");
DEFINE("_ESESS_REGISTRATION_STATUS_CLOSED", "Stängt");
DEFINE("_ESESS_DELETE_REG_MSG", "Välj en anmälan för att ta bort den");

// Back-End :: Anmälningar :: Visa
DEFINE("_ESESS_FORM_REG_VIEW", "Visa anmälan");
DEFINE("_ESESS_FIELD_SESSION", "Session");
DEFINE("_ESESS_FIELD_REGISTRATION_DATE", "Anmälningsdatum");
DEFINE("_ESESS_FIELD_CANCELLATION_DATE", "Avanmälningsdatum");
DEFINE("_ESESS_FIELD_REGISTRATION_STATUS", "Status");

// Back-End :: Anmälningar :: Exportera
DEFINE("_ESESS_FORM_EXPORT", "Exportera anmälningar");
DEFINE("_ESESS_FIELD_METHOD", "Exportmetod");
DEFINE("_ESESS_FIELD_METHOD_CSV", "CSV");
DEFINE("_ESESS_FIELD_FILENAME", "Filnamn");
// Back-End :: Anmälningar :: Exportera -> Javascript Felmeddelande
DEFINE("_ESESS_VAL_EXPORT_FILENAME", "Filnamn kan inte vara tomt.");
DEFINE("_ESESS_EXPORT_MSG", "Okänd exportmetod");

// Back-End :: Konfiguration
DEFINE("_ESESS_FORM_CONFIG", "Konfiguration");
DEFINE("_ESESS_FORM_CONFIG_CONFIRM", "Konfigurera Bekräfta E-post");
DEFINE("_ESESS_FORM_CONFIG_NOTIFY", "Konfigurera Meddelande E-post");
DEFINE("_ESESS_FORM_CONFIG_CANCEL", "Konfigurera Borttagande av E-post");
DEFINE("_ESESS_ACTION_REGISTER", "Anmälan");
DEFINE("_ESESS_ACTION_UPDATE", "Updatera");
DEFINE("_ESESS_ACTION_CANCEL", "Avbryt");
DEFINE("_ESESS_BUTTON_OPTIONS","Inställningar");
DEFINE("_ESESS_BUTTON_OPTIONS_IMG","images/config.png");
DEFINE("_ESESS_BUTTON_THANK","Visa Tack");
DEFINE("_ESESS_BUTTON_THANK_IMG","images/menu.png");
DEFINE("_ESESS_BUTTON_CONFIRM","Bekräfta E-post");
DEFINE("_ESESS_BUTTON_CONFIRM_IMG","images/messaging.png");
DEFINE("_ESESS_BUTTON_NOTIFY","Meddela E-post");
DEFINE("_ESESS_BUTTON_NOTIFY_IMG","images/message_config.png");
DEFINE("_ESESS_BUTTON_CANCELLATION","Ta bort E-post");
DEFINE("_ESESS_BUTTON_CANCELLATION_IMG","images/inbox.png");

// Admin :: Konfig :: Inställningar
DEFINE("_ESESS_FORM_CONFIG_OPTIONS", "Konfigurera Inställningar");
DEFINE("_ESESS_TAB_CONFIG_GENERAL","Allmänt");
DEFINE("_ESESS_TITLE_INTEGRATION", "Integration men andra Komponenter");
DEFINE("_ESESS_FIELD_INTEGRATE", "Integrera med <b>Events</b> Component");
DEFINE("_ESESS_FIELD_INTEGRATE_DESC", "Tillåt en session att vara ansluten till ett evenemang från <i>Events</i> Component.<br><b>Note:   på&quot;Apply&quot; knappen efter att ha ändrat det här värdet</b>.");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT", "Visa Evenemangsämne");
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
DEFINE("_ESESS_FIELD_CBINTEGRATED_DESC","Standardvärden för varje registrationsfält kan genereras genom att använda informationen som sparats i en  Community Builder användares profil (see \'Fields\' tab).<br><b>Obs:  Klicka på &quot;Apply&quot; knappen efter att ha ändrat värden</b>.");
DEFINE("_ESESS_FIELD_SHOWAVATAR", "Visa Avatar");
DEFINE("_ESESS_FIELD_SHOWAVATAR_DESC", "");
DEFINE("_ESESS_TITLE_REGISTRATIONCONTROL", "Anmälningskontroll");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW", "Tillåt anmälningar från");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW_DESC", "");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL", "Tillåt bara enskilda anmälningar");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL_DESC", "");
DEFINE("_ESESS_FIELD_FULL_PROC", "Tillåt Full processing");
DEFINE("_ESESS_FIELD_FULL_PROC_DESC", "");
DEFINE("_ESESS_FIELD_REG_CANCEL", "Tillåt registrerade användare att avanmäla sig");
DEFINE("_ESESS_FIELD_REG_CANCEL_DESC", "");
DEFINE("_ESESS_TITLE_DATETIME", "Datum och Tid. Formatering.");
DEFINE("_ESESS_FIELD_DATE_SHORT", "Datumformat (kort)");
DEFINE("_ESESS_FIELD_DATE_SHORT_DESC", "");
DEFINE("_ESESS_FIELD_DATE_LONG", "Datumformat (långt)");
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
DEFINE("_ESESS_FIELD_LIST_CASE1","När Anmälan börjar");
DEFINE("_ESESS_FIELD_LIST_CASE2","När Anmälan slutar");
DEFINE("_ESESS_FIELD_LIST_CASE3","När Sessionen börjar");
DEFINE("_ESESS_FIELD_LIST_CASE4","When Sessionen slutar");
DEFINE("_ESESS_FIELD_LIST_FULL", "Lista Session som är fullbelagd");
DEFINE("_ESESS_FIELD_LIST_FULL_DESC", "");
DEFINE("_ESESS_FIELD_LIST_EVERYONE", "Lista Sessioner oavsett tillgänglighet.");
DEFINE("_ESESS_FIELD_LIST_EVERYONE_DESC", "");
DEFINE("_ESESS_FIELD_USER_NUM", "Visa antal deltagares registereringar");
DEFINE("_ESESS_FIELD_USER_NUM_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER", "Visa Footer i Front-End");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP", "Visa länk till Google Maps");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED", "Visa lista på redan registrerade deltagare.");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED_DESC", "");
DEFINE("_ESESS_TAB_CONFIG_FIELDS","Fält");

// Back-End :: Configuration :: Valmöjligheter -> Javascript Felbekräftelse
DEFINE("_ESESS_VAL_SESS_TITLE", "Du måste skriva in en titel");
DEFINE("_ESESS_VAL_REGISTRATION_UP_DATE", "Skriv in Startdatum anmälan.");
DEFINE("_ESESS_VAL_REGISTRATION_DOWN_DATE", "Skriv in Slutdatum anmälan.");
DEFINE("_ESESS_VAL_SESSION_UP_DATE", "Sessionens startdatum kan inte vara tomt.");
DEFINE("_ESESS_VAL_SESS_MAX", "Max # Anmälningar måste vara ett heltal");
DEFINE("_ESESS_VAL_SESS_MAXMIN", "Max # Anmälningar kan inte vara mindre än Min # Anmälningar");


// Admin :: Konfiguration :: Tack HTML
DEFINE("_ESESS_FORM_CONFIG_THANK", "Konfigurera Tackmeddelande");
DEFINE("_ESESS_FIELD_THANKYOU", "Tack för din anmälan Skärm");
DEFINE("_ESESS_FIELD_THANKYOU_DESC", "");
DEFINE("_ESESS_DEFAULT_THANKYOU", "<h1>Tack {fullname}</h1><p>för din anmälan till (title}<p /><p>Om vi behöver kontakta dig senare angående din anmälan gör vi det på {email}</p><p>Du kan se detljerna för denna anmälan <a href=\"{url}\">här</a>.</p><p>{data}<br /></p>");

// Back-End :: Konfiguration :: Bekräfta E-post
DEFINE("_ESESS_FIELD_CONFIRM_SEND", "Skicka Bekräfta E-post");
DEFINE("_ESESS_FIELD_CONFIRM_SEND_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL", "Bekräfta E-postadress(er)");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT", "Bekräfta E-postämne");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_MSG", "Bekräfta E-postmeddelande");
DEFINE("_ESESS_FIELD_CONFIRM_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_CONFIRM_SUBJECT", "{title} {action}");
DEFINE("_ESESS_DEFAULT_CONFIRM_MESSAGE", "<p>Välkommen {fullname}!</p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Vi har mottagit din anmälan till{title}!</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Om vi behöbver kontakta dig senare angående din anmälan gör vi det på {email}</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Du kan se detaljerna på din anmälan<a href=\"{url}\">här</a></span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">{data}<br /></span></p>");

// Back-End :: Konfiguration :: Bekräfta E-post -> Replacement tag notes
DEFINE("_ESESS_REPLACE_TAGS", "&lt;em&gt;Ersättningstaggar&lt;/em&gt;&lt;br /&gt;\nKopiera dessa och sätt in dem på respektive plats.");
DEFINE("_ESESS_REPLACE_NAME", "Användarens Fullständiga namn");
DEFINE("_ESESS_REPLACE_EMAIL", "Användaren E-postadress");
DEFINE("_ESESS_REPLACE_URL", "URL-adress för att visa Sessionsinfo");
DEFINE("_ESESS_REPLACE_TITLE", "Sessionstitel");
DEFINE("_ESESS_REPLACE_ACTION", "Anmälningshandling (Anmälan, Uppdatering, Avanmälan)");
DEFINE("_ESESS_REPLACE_DATA", "Tabell innehållande inskrivna data");


// Back-End :: Konfiguration :: Notering om E-post
DEFINE("_ESESS_FIELD_NOTIFY_SEND", "Skicka notering om Epost");
DEFINE("_ESESS_FIELD_NOTIFY_SEND_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT", "Notera ämne E-post");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_MSG", "Notera E-postmeddelande");
DEFINE("_ESESS_FIELD_NOTIFY_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_NOTIFY_SUBJECT", "Ny {title} {action}"); 
DEFINE("_ESESS_DEFAULT_NOTIFY_MESSAGE", "<p>{fullname} {email} är anmäld till {title}</p><p>{data} </p>"); 

// Back-End :: Konfiguration :: Avbryt sida
DEFINE("_ESESS_DEFAULT_CANCEL_TITLE", "Anmälan avbruten");
DEFINE("_ESESS_DEFAULT_CANCEL_TEXT", "{fullname}, din anmälan har avbrutits för{title}<br />Klicka <a href=\"{url}\">här</a> för att komma tillbaka.");

// Allmänt -> Kursstatus
DEFINE("_ESESS_STATUS_NEW", "Ny");
DEFINE("_ESESS_STATUS_OPEN", "Plats finns");
DEFINE("_ESESS_STATUS_FULL", "Fullbokat");
DEFINE("_ESESS_STATUS_CLOSED", "Stängt");

// Allmänt -> Kurs tillgänglig för
DEFINE("_ESESS_AVAIL_EVERY", "Alla");
DEFINE("_ESESS_AVAIL_REG", "Bara registerade användare");
DEFINE("_ESESS_AVAIL_GUEST", "Endast gäster");
DEFINE("_ESESS_AVAIL_GLOBAL", "Global");
DEFINE("_ESESS_AVAIL_GLOBAL2", "Använd Global");

// General -> Traditionella Ikoner Verktygsfält
DEFINE("_ESESS_TOOLBAR_VIEW", "Visa");
DEFINE("_ESESS_TOOLBAR_EXPORT", "Exportera");
DEFINE("_ESESS_TOOLBAR_EXPORTALL", "Exportera Allt");
DEFINE("_ESESS_TOOLBAR_EMAIL", "E-post");

// Allmänt -> File I/O fel
DEFINE("_ESESS_CONFIG_ERR", "Konfigurationsfilen är inte skrivbar!");
DEFINE("_ESESS_CONFIG_ERR_OPEN", "Konfigurationsfilen kan inte öppnas för skrivning");
DEFINE("_ESESS_CONFIG_ERR_WRITE", "Omöjligt att skriva till Konfigurationsfilen");
DEFINE("_ESESS_CONFIG_SAVE", "Konfigurationen riktigt sparad!");

// Allmänt -> Bilder använda för sortering.
DEFINE("_ESESS_ARROW_UP", "images/uparrow-1.png");
DEFINE("_ESESS_ARROW_DOWN", "images/downarrow-1.png");
DEFINE("_ESESS_ARROW_UNSET", "images/uparrow.png");

// Allmänt -> Javascript Felmeddelande
DEFINE("_ESESS_VAL_ERROR", "Felmeddelande:");

// Allmänt -> Dynamiska fält
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD","Nytt fält");
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD_DESC","Klicka för att skapa ett nytt fält.");
DEFINE("_ESESS_DYNAMICFIELDS_LOADTABLEERROR","Ett fel uppstod vid hämtning av registrerade fält.");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDNAME","Fältnamn");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE","Fälttyp");
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
DEFINE("_ESESS_DYNAMICFIELDS_MAXLENGTH","Max längd");
DEFINE("_ESESS_DYNAMICFIELDS_USERINTERFACE","Användargränssnitt");
DEFINE("_ESESS_DYNAMICFIELDS_DEFAULT","Standard");
DEFINE("_ESESS_DYNAMICFIELDS_CBDEFAULT","Anslutet Community Builder fält");
DEFINE("_ESESS_DYNAMICFIELDS_TOOLTIP","Råd");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONS","Valmöjligheter");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONNAME","Benämning Valmöjlighet");
DEFINE("_ESESS_DYNAMICFIELDS_ADDOPTION","Lägg till Valmöjlighet");
?>
