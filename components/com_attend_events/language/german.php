<?php
/**
* @version $Id: german.php 17 2006-11-04 03:41:21Z pcarr $
* @package Attend Events
* @copyright (C) 2006 Michael Ruck
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Check
DEFINE("_ESESS_LANG_INCLUDED", 1);

// Front-End :: Title
DEFINE("_ESESS_COMPONENT_TITLE", "Unser aktuelles Schulungsangebot");

// Front-End :: List
DEFINE("_ESESS_NAME", "Kursbezeichnung");
DEFINE("_ESESS_SESSION_UP", "Kursbeginn");
DEFINE("_ESESS_REGISTRATION_DOWN", "Registrierung bis");
DEFINE("_ESESS_NUM_LEFT", "Plätze &Uuml;brig");
DEFINE("_ESESS_NUM_AVAIL", "Plätze Verf&uuml;gbar");
DEFINE("_ESESS_AVAIL_STATUS", "Status");
DEFINE("_ESESS_AVAIL_STATUS_AVAIL", "Verf&uuml;gbar");
DEFINE("_ESESS_AVAIL_STATUS_FULL", "Voll");

// Front-End :: View
DEFINE("_ESESS_REG_HOSTED_BY", "Veranstaltet von");
DEFINE("_ESESS_REG_DATETIME", "Datum &amp; Zeit");
DEFINE("_ESESS_REG_LOCATION", "Veranstaltungsort");
DEFINE("_ESESS_REG_MAPTEXT", "Wie komme ich da hin?");
DEFINE("_ESESS_REG_MAP","Anfahrt");
DEFINE("_ESESS_REG_MAP_URL","");
DEFINE("_ESESS_REG_MAP_ID","32bce8b5");
DEFINE("_ESESS_REG_AVAIL", "Verf&uuml;gbare Plätze");
DEFINE("_ESESS_REG_CLOSE", "Registrierung m&ouml;glich bis");
DEFINE("_ESESS_UNLIMITED", "unbegrenzt");
DEFINE("_ESESS_OUT_OF", "von"); // out of
DEFINE("_ESESS_FIELD_COMMENTS", "Kommentare");
DEFINE("_ESESS_FIELD_COMMENTS_DESC", "");
DEFINE("_ESESS_ERROR_REG_NOT_OPEN","Sonderveranstaltung - Leider wird eine Registrierung für diese Veranstaltung erst kurzfristig möglich ab: ");
DEFINE("_ESESS_ERROR_ONLY_REGISTERED", "Nur registrierte Benutzer k&ouml;nen sich für diese Veranstaltung anmelden.");
DEFINE("_ESESS_ERROR_ONLY_GUESTS", "Nur G&auml;ste k&ouml;nnen sich für diese Veranstaltung anmelden.");
DEFINE("_ESESS_ERROR_FULL", "Diese Veranstaltung ist leider ausgebucht");
DEFINE("_ESESS_ERROR_CLOSED", "Die Registrierungsfrist ist abgelaufen.");
DEFINE("_ESESS_REG_LIST", "Bereits registrierte Teilnehmer");

// Front End :: View -> Registration Form
DEFINE("_ESESS_FIELD_FULLNAME", "Vollständiger Name");
DEFINE("_ESESS_FIELD_FULLNAME_DESC", "Bitte geben Sie Ihren vollst&auml;ndigen Namen an, damit wir Sie kontaktieren k&ouml;nnen.");
DEFINE("_ESESS_FIELD_EMAIL", "eMail");
DEFINE("_ESESS_FIELD_EMAIL_DESC", "Bitte geben Sie Ihre eMail-Adresse an, damit wir Sie kontaktieren k&ouml;nnen.");
DEFINE("_ESESS_FIELD_NUM_PEOPLE", "Anzahl Teilnehmer");
DEFINE("_ESESS_FIELD_NUM_PEOPLE_DESC", "Wie viele Personen möchten Sie für die Veranstaltung anmelden?");
DEFINE("_ESESS_BUTTON_REGISTER", "Zur Bestätigung");
DEFINE("_ESESS_BUTTON_RESET", "Zurücksetzen");
DEFINE("_ESESS_BUTTON_UPDATE", "Registrierung aktualisieren");
DEFINE("_ESESS_BUTTON_CANCEL", "Registrierung abbrechen");
DEFINE("_ESESS_VAL_REG_ALERT", "Probleme bei der Registrierung:");
DEFINE("_ESESS_VAL_REG_FULLNAME", "Sie müssen Ihren vollständigen Namen angeben.");
DEFINE("_ESESS_VAL_REG_EMAIL", "Sie müssen Ihre eMail-Adresse angeben.");
DEFINE("_ESESS_VAL_REG_NUMBER", "Diese Anzahl der Teilnehmer ist nicht möglich. Möglich sind Teilnehmerzahlen zwischen 1 und ");

// Front-End :: View -> Payment Options
DEFINE("_ESESS_PAY_TOTAL", "Gesamtkosten");
DEFINE("_ESESS_PAY_MUST_CALCULATE", "Neu berechnen");
DEFINE("_ESESS_PAY_SUBMIT","Buchung bestätigen und absenden");

// Front-End :: Cancel
DEFINE("_ESESS_SESS_CANCEL_TITLE", "Registrierung storniert");
DEFINE("_ESESS_SESS_CANCEL_MSG", "<?php echo $fullname; ?>, Ihre Registrierung für die Veranstaltung <?php echo $title; ?> wurde erfolgreich storniert! <br />Klicken Sie <a href=\"<?php echo $url; ?>\">hier</a> um zur Veranstaltung zurückzukehren.");

// Back-End -> General
DEFINE("_ESESS_REQUIRED", "<span style=\"color: red;\">*</span>");
DEFINE("_ESESS_STYLE_TITLE", "style=\"background-color: #E0E0E0; font-weight: bold; border-bottom: 1px solid #B0B0B\"");

// Back-End -> Menus
DEFINE("_ESESS_MENU_SESSIONS", "Veranstaltungen");
DEFINE("_ESESS_MENU_VENUES", "Veranstaltungsorte");
DEFINE("_ESESS_MENU_REGISTRATIONS", "Registrierungen");
DEFINE("_ESESS_MENU_CONFIGURATION", "Konfiguration");

// Back-End :: Sessions :: List
DEFINE("_ESESS_FORM_SLIST", "Veranstaltungen verwalten");
DEFINE("_ESESS_SLIST_NAME", "Bezeichnung");
DEFINE("_ESESS_SLIST_SESSION_UP", "Beginn Veranst.");
DEFINE("_ESESS_SLIST_SESSION_DOWN", "Ende Veranst.");
DEFINE("_ESESS_SLIST_REGISTRATION_UP", "Beginn Reg.");
DEFINE("_ESESS_SLIST_REGISTRATION_DOWN", "Ende Reg.");
DEFINE("_ESESS_SLIST_NUM_REGISTRATIONS", "Registrierungen");
DEFINE("_ESESS_SLIST_STATUS", "Status");
DEFINE("_ESESS_SLIST_AVAIL", "Wer kann sich reg.?");
DEFINE("_ESESS_SLIST_PUB", "Veröffentlicht");

// Back-End :: Sessions :: List -> Filters
DEFINE("_ESESS_SFILTER_CHOOSE", "Wähle einen Filter");
DEFINE("_ESESS_SFILTER_NONE", "Kein Filter");
DEFINE("_ESESS_SFILTER_STATUS", "- Status Filter");
DEFINE("_ESESS_SFILTER_AVAIL", "- Verfügbarkeit Filtern");
DEFINE("_ESESS_SFILTER_EVENT", "- Event Filtern");
DEFINE("_ESESS_RFILTER_CHOOSE", "Wähle Veranstaltung");
DEFINE("_ESESS_RFILTER_ALL", "- Alle Veranstaltungen");

// Back-End :: Sessions :: List -> Javascript Validation Errors
DEFINE("_ESESS_PUBLISH_MSG", "Wählen Sie eine Veranstaltung um sie zu ");
DEFINE("_ESESS_DELETE_SESSION_MSG", "Wählen Sie eine Veranstaltung um sie zu löschen");

// Back-End :: Sessions :: Edit
DEFINE("_ESESS_FORM_SESS_ADD", "Veranstaltung hinzufügen");
DEFINE("_ESESS_FORM_SESS_EDIT", "Veranstaltung bearbeiten");
DEFINE("_ESESS_TITLE_DESCRIPTION", "Einzelheiten zu Veranstaltung");
DEFINE("_ESESS_TITLE_SESSION_GENERAL","Allgemein");
DEFINE("_ESESS_TITLE_SESSION_DATETIME","Datum &amp; Zeit");
DEFINE("_ESESS_FIELD_EVENT", "Event");
DEFINE("_ESESS_FIELD_EVENT_DESC", "Wählen Sie ein existierendes Event, um eine Veranstaltung dafür zu erstellen.");
DEFINE("_ESESS_NO_EVENT", "Kein Event");
DEFINE("_ESESS_FIELD_EVENT_GROUPS","Event-Kategorie");
DEFINE("_ESESS_FIELD_EVENT_GROUPS_DESC","Wählen Sie eine Kategorie aus der Komponente Events");
DEFINE("_ESESS_FIELD_EVENT_GROUPS","Event-Gruppe");
DEFINE("_ESESS_NO_EVENT_GROUP", "Keine Event-Kategorie");
DEFINE("_ESESS_FIELD_TITLE","Veranstaltung");
DEFINE("_ESESS_FIELD_TITLE_DESC", "Geben Sie einen Titel für die Veranstaltung ein.");
DEFINE("_ESESS_FIELD_INTRO", "Beschreibung");
DEFINE("_ESESS_FIELD_INTRO_DESC", "Geben Sie einige erklärende Worte über die Veranstaltung ein. Sinnvoll, wenn Sie sir nicht mit einem bestehenden Event verknüpft haben.");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE", "Beginndatum der Veranstaltung");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE_DESC", "Das Datum an dem die Veranstaltung beginnt.");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME", "Beginnzeit der Veranstaltung");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME_DESC", "Die Uhrzeit wann die Veranstaltung beginnt.");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE", "Endedatum der Veranstaltung");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE_DESC", "Das Datum an dem die Veranstaltung endet.");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME", "Endezeit der Veranstaltung");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME_DESC", "Die Uhrzeit wann die Veranstaltung endet.");
DEFINE("_ESESS_FIELD_STATUS", "Status");
DEFINE("_ESESS_FIELD_STATUS_DESC", "Gesamtstatus der Veranstaltung:<br /><b>Neu</b> ist nicht auswählbar<br /><b>Offen</b> kann registriert werden<br /><b>Geschlossen</b> ist sehr wahrscheinlich geschlossen<br /><b>Voll</b> hat die maximale Anzahl an Registrierungen erreicht");
DEFINE("_ESESS_FIELD_MAX", "Max Anzahl an Registierungen");
DEFINE("_ESESS_FIELD_MAX_DESC", "Die maximale Anzahl an erlaubten Registrierungen für die Veranstaltung.<br />Wurde diese Anzahl erreicht wird die Veranstaltung automatisch als <b>Voll</b> gekennzeichnet.");
DEFINE("_ESESS_FIELD_AVAIL", "Verfügbarkeit");
DEFINE("_ESESS_FIELD_AVAIL_DESC", "Zeigt an, wem es erlaubt ist, sich bei der Veranstaltung zu registrieren.<br />Benutzen Sie <b>Global</b> um die Einstellungen aus der Konfiguration zu übernehmen.");
DEFINE("_ESESS_FIELD_PUBLISH", "Veröffentlichen");
DEFINE("_ESESS_FIELD_PUBLISH_DESC", "Gibt an, ob die Veranstaltung veröffentlicht wurde.");
DEFINE("_ESESS_FIELD_SESSION_HOST", "Veranstalter");
DEFINE("_ESESS_FIELD_SESSION_HOST_DESC", "Wählen Sie einen Veranstalter für diese Veranstaltung. Damit dieser in dieser Liste auftritt muss der Joomla-Benutzer mindestens die Zugriffsberechtigung <b>Autor</b> oder höher angehören.");
DEFINE("_ESESS_FIELD_SESSION_HOST_NOHOST", "Kein Veranstalter");
DEFINE("_ESESS_TAB_SESSION_REGISTRATION","Registrierung");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE", "Beginndatum der Registrierung");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE_DESC", "Date to Start accepting Registrations. Link is not displayed until this date.");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME", "Beginnzeit der Registrierung");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE", "Endedatum der Registerierung");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE_DESC", "Date to finish accepting Registrations.  Link is not displayed after this date.");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME", "Endezeit der Registrierung");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_TAB_SESSION_VENUE","Veranst.ort");
DEFINE("_ESESS_FIELD_VENUE_LIST", "Allgemeine Veranstaltungsorte");
DEFINE("_ESESS_FIELD_VENUE_LIST_DESC", "Select a venue defined in the Venues table, or enter the venue\'s information in the fields below.");

// Back-End :: Sessions :: Edit -> Fees / Payment
DEFINE("_ESESS_SESS_FEES_TITLE", "Kosten");
DEFINE("_ESESS_SESS_FEES_FEE", "Kosten");
DEFINE("_ESESS_SESS_PAY_TITLE", "Bezahlung");

// Back-End :: Venues
DEFINE("_ESESS_FORM_VLIST", "Veranstaltungsorte für Events");
DEFINE("_ESESS_VLIST_NAME", "Bezeichung Veranstaltungsort");

// Back-End :: Venues :: Edit
DEFINE("_ESESS_FORM_VENUE_ADD", "Veranstaltungsort hinzufügen");
DEFINE("_ESESS_FORM_VENUE_EDIT", "Veranstaltungsort bearbeiten");
DEFINE("_ESESS_FIELD_VENUE_TITLE", "Name");
DEFINE("_ESESS_FIELD_VENUE_TITLE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS", "Addresse");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_CITY", "Stadt");
DEFINE("_ESESS_FIELD_VENUE_CITY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_STATE", "Bundesland");
DEFINE("_ESESS_FIELD_VENUE_STATE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE", "PLZ");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY", "Land");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS", "Webseite");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS_DESC", "Bitte darauf achten, dass der Link mit <b>http://</b> beginnt");
DEFINE("_ESESS_JSERROR_VENUE_TITLE", "Sie müssen einen Namen für den Veranstaltungsort angeben.");
DEFINE("_ESESS_JSERROR_VENUE_ADDRESS", "Sie müssen eine Adresse für den Veranstaltungsort angeben.");

// Back-End :: Registrations :: List
DEFINE("_ESESS_FORM_RLIST", "Registrierungen");
DEFINE("_ESESS_RLIST_NAME", "Name");
DEFINE("_ESESS_RLIST_EMAIL", "eMail");
DEFINE("_ESESS_RLIST_TITLE", "Veranstaltung");
DEFINE("_ESESS_RLIST_RDATE", "Registrierungsdatum");
DEFINE("_ESESS_RLIST_STATUS", "Status");
DEFINE("_ESESS_RLIST_NUM", "# Registrierungen");
DEFINE("_ESESS_RLIST_VIEWED", "Angezeigt");
DEFINE("_ESESS_REGISTRATION_STATUS_REGISTERED", "Registriert");
DEFINE("_ESESS_REGISTRATION_STATUS_CANCELLED", "Storniert");
DEFINE("_ESESS_REGISTRATION_STATUS_CLOSED", "Geschlossen");
DEFINE("_ESESS_DELETE_REG_MSG", "Wählen Sie eine Registrierung um diese zu löschen");
DEFINE("_ESESS_PAID_PARTIALLY", "Teilweise");
DEFINE("_ESESS_PAID_FULLY", "Vollständig");
DEFINE("_ESESS_PAID_UNDEFINED", "Undefiniert");

// Back-End :: Registrations :: View
DEFINE("_ESESS_FORM_REG_VIEW", "Zeige Registrierung");
DEFINE("_ESESS_FIELD_SESSION", "Veranstaltung");
DEFINE("_ESESS_FIELD_REGISTRATION_DATE", "Registrierungsdatum");
DEFINE("_ESESS_FIELD_CANCELLATION_DATE", "Datum des Storno");
DEFINE("_ESESS_FIELD_REGISTRATION_STATUS", "Status");
DEFINE("_ESESS_SHOW_PAY_BALANCE", "Kontostand");
DEFINE("_ESESS_SHOW_PAY_BALANCE_CURRENCY", "EUR");

// Back-End :: Registrations :: Export
DEFINE("_ESESS_FORM_EXPORT", "Registrierungen exportieren");
DEFINE("_ESESS_FIELD_METHOD", "Export Methode");
DEFINE("_ESESS_FIELD_METHOD_CSV", "CSV");
DEFINE("_ESESS_FIELD_FILENAME", "Dateiname");

// Back-End :: Registrations :: Export -> Javascript Validation Errors
DEFINE("_ESESS_VAL_EXPORT_FILENAME", "Der Dateiname darf nicht leer sein.");
DEFINE("_ESESS_EXPORT_MSG", "Unbekannte Export Methode");

// Back-End :: Registrations :: eMail
DEFINE("_ESESS_EMAIL_TITLE", "eMail an Registrierte");
DEFINE("_ESESS_EMAIL_SUBTITLE", "Details");
DEFINE("_ESESS_EMAIL_SEND_HTML", "In HTML senden");
DEFINE("_ESESS_EMAIL_SUBJECT", "Betreff");
DEFINE("_ESESS_EMAIL_MSG", "Nachricht");
DEFINE("_ESESS_EMAIL_RESULT_NAME", "Name der Registrierten");
DEFINE("_ESESS_EMAIL_RESULT_OUTCOME", "Versand der eMail");
DEFINE("_ESESS_EMAIL_RESULT_SUCC", "Erfoglreich");
DEFINE("_ESESS_EMAIL_RESULT_FAIL", "Fehler");

// Back-End :: Configuration
DEFINE("_ESESS_FORM_CONFIG", "Konfiguration");
DEFINE("_ESESS_FORM_CONFIG_CONFIRM", "Bestätigungs-eMail einstellen");
DEFINE("_ESESS_FORM_CONFIG_NOTIFY", "Benachrichtigungs-eMail einstellen");
DEFINE("_ESESS_FORM_CONFIG_CANCEL", "Storno-eMail einstellen");
DEFINE("_ESESS_ACTION_REGISTER", "Registrierung");
DEFINE("_ESESS_ACTION_UPDATE", "Aktualisierung");
DEFINE("_ESESS_ACTION_CANCEL", "Storno");
DEFINE("_ESESS_BUTTON_OPTIONS","Optionen");
DEFINE("_ESESS_BUTTON_OPTIONS_IMG","images/config.png");
DEFINE("_ESESS_BUTTON_THANK","Danke-Seite");
DEFINE("_ESESS_BUTTON_THANK_IMG","images/menu.png");
DEFINE("_ESESS_BUTTON_CONFIRM","Bestätigungs-eMail");
DEFINE("_ESESS_BUTTON_CONFIRM_IMG","images/messaging.png");
DEFINE("_ESESS_BUTTON_NOTIFY","Benachrichtigungs-eMail");
DEFINE("_ESESS_BUTTON_NOTIFY_IMG","images/message_config.png");
DEFINE("_ESESS_BUTTON_CANCELLATION","Storno-eMail");
DEFINE("_ESESS_BUTTON_CANCELLATION_IMG","images/inbox.png");

// Admin :: Config :: Options
DEFINE("_ESESS_FORM_CONFIG_OPTIONS", "Optionen einstellen");
DEFINE("_ESESS_TAB_CONFIG_GENERAL","Allgemein");
DEFINE("_ESESS_TITLE_INTEGRATION", "Integration von anderen Komponenten");
DEFINE("_ESESS_FIELD_INTEGRATE", "Integration mit <b>JEvents</b>-Komponente");
DEFINE("_ESESS_FIELD_INTEGRATE_DESC", "Allows a session to be associated with an event from the <i>JEvents</i> component.<br><b>Note:  Click the &quot;Apply&quot; button after changing this value</b>.");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT", "Zeige Event Betreff");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY", "Zeige Event Beschreibung");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_LOCATION", "Zeige Event Veranstaltungsort");
DEFINE("_ESESS_FIELD_SHOW_LOCATION_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_CONTACT", "Zeige Event Kontakt");
DEFINE("_ESESS_FIELD_SHOW_CONTACT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_EXTRA", "Zeige Event Extras");
DEFINE("_ESESS_FIELD_SHOW_EXTRA_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_TIME", "Zeige Event Zeiten");
DEFINE("_ESESS_FIELD_SHOW_TIME_DESC", "");
DEFINE("_ESESS_FIELD_CBINTEGRATED","Integration mit <b>Community Builder</b> Komponente");
DEFINE("_ESESS_FIELD_CBINTEGRATED_DESC","Default values for each registration field can be generated using the information stored in a user\'s Community Builder profile (see \'Fields\' tab).<br><b>Note:  Click the &quot;Apply&quot; button after changing this value</b>.");
DEFINE("_ESESS_FIELD_SHOWAVATAR", "Zeige Avatar");
DEFINE("_ESESS_FIELD_SHOWAVATAR_DESC", "");
DEFINE("_ESESS_TITLE_REGISTRATIONCONTROL", "Registrierungskontrolle");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW", "Erlaube Registrierungen von");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW_DESC", "");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL", "Erlaube nur einzelne Registrierungen");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL_DESC", "");
DEFINE("_ESESS_FIELD_FULL_PROC", "Erlaube Voll Markierungen");
DEFINE("_ESESS_FIELD_FULL_PROC_DESC", "");
DEFINE("_ESESS_FIELD_REG_CANCEL", "Erlaube Stornierung registrierter Benutzer");
DEFINE("_ESESS_FIELD_REG_CANCEL_DESC", "");
DEFINE("_ESESS_TITLE_DATETIME", "Datum und Zeit Formatierung");
DEFINE("_ESESS_FIELD_DATE_SHORT", "Datumsformat (kurz)");
DEFINE("_ESESS_FIELD_DATE_SHORT_DESC", "");
DEFINE("_ESESS_FIELD_DATE_LONG", "Datumsformat (lang)");
DEFINE("_ESESS_FIELD_DATE_LONG_DESC", "");
DEFINE("_ESESS_FIELD_TIME", "Zeitformat");
DEFINE("_ESESS_FIELD_TIME_DESC", "");
DEFINE("_ESESS_FIELD_TIME1", "24 Stunden, führende Null (00:mm)");
DEFINE("_ESESS_FIELD_TIME2", "24 Stunden, führendes Leerzeichen (_0:mm)");
DEFINE("_ESESS_FIELD_TIME3", "12 Stunden, führende Null (00:mm)");
DEFINE("_ESESS_FIELD_TIME4", "12 Stunden, führendes Leerzeichen (_0:mm)");
DEFINE("_ESESS_TITLE_FRONTENDCONTROL", "Kontrolle vom Front-End");
DEFINE("_ESESS_FIELD_LIST_START", "Starte Auflistung Veranstaltungen");
DEFINE("_ESESS_FIELD_LIST_START_DESC", "");
DEFINE("_ESESS_FIELD_LIST_STOP", "Stoppe Auflistung Veranstaltungen");
DEFINE("_ESESS_FIELD_LIST_STOP_DESC", "");
DEFINE("_ESESS_FIELD_LIST_CASE0","Sofort");
DEFINE("_ESESS_FIELD_LIST_CASE1","Wenn Registrierungszeit beginnt");
DEFINE("_ESESS_FIELD_LIST_CASE2","Wenn Registrierungszeit endet");
DEFINE("_ESESS_FIELD_LIST_CASE3","Wenn Veranstaltungszeit beginnt");
DEFINE("_ESESS_FIELD_LIST_CASE4","Wenn Veranstaltung endet");
DEFINE("_ESESS_FIELD_LIST_FULL", "Zeige volle Veranstaltungen");
DEFINE("_ESESS_FIELD_LIST_FULL_DESC", "");
DEFINE("_ESESS_FIELD_LIST_EVERYONE", "Zeige Veranstaltungen abhängig von der Verfügbarkeit");
DEFINE("_ESESS_FIELD_LIST_EVERYONE_DESC", "");
DEFINE("_ESESS_FIELD_USER_NUM", "Zeige Anzahl registrierter Teilnehmer");
DEFINE("_ESESS_FIELD_USER_NUM_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER", "Zeige Fußbereich im Front-End");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_MAP", "Zeige Link mit Anfahrt");
DEFINE("_ESESS_FIELD_DISPLAY_MAP_DESC", "");
DEFINE("_ESESS_FIELD_MAPTYPE1","Map24");
DEFINE("_ESESS_FIELD_MAPTYPE2","Google Maps");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED", "Zeige Liste bereits registrierter Benutzer");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED_DESC", "");
DEFINE("_ESESS_TAB_CONFIG_FIELDS","Felder");
DEFINE("_ESESS_TITLE_EMAILCONTROL","Einstellungen für eMail-Verkehr");
DEFINE("_ESESS_FIELD_EMAIL_HTML","eMails im HTML-Format");
DEFINE("_ESESS_FIELD_EMAIL_HTML_TT","Stellen Sie hier ein, ob eMails im HTML-Format oder als PLAINTEXT versendet werden sollen.");

// Back-End :: Configuration :: Options -> Javascript Validation Errors
DEFINE("_ESESS_VAL_SESS_TITLE", "Titel darf nicht leer sein.");
DEFINE("_ESESS_VAL_REGISTRATION_UP_DATE", "Beginndatum der Registrierung darf nicht leer sein.");
DEFINE("_ESESS_VAL_REGISTRATION_DOWN_DATE", "Endedatum der Registrierung darf nicht leer sein.");
DEFINE("_ESESS_VAL_SESSION_UP_DATE", "Beginndatum der Veranstaltung darf nicht leer sein.");
DEFINE("_ESESS_VAL_SESS_MAX", "Max Anzahl an Registrierungen muss eine Ganzzahl >= 0 sein.");
DEFINE("_ESESS_VAL_SESS_MAXMIN", "Max Anzahl an Registrierungen kann nicht kleiner sein als Min Anzahl von Registrierungen");

// Back-End :: Configuration :: Options -> Fees and Payment
DEFINE("_ESESS_FEES_TITLE", "Währung und Bezahlung");
DEFINE("_ESESS_FEES_CURRENCY", "Standard-Währung");
DEFINE("_ESESS_FEES_PAYPAL_MODE", "PayPal-Modus");
DEFINE("_ESESS_FEES_FORMAT_TITLE", "Währungsformat");
DEFINE("_ESESS_FEES_FORMAT_SYMBOL", "Währungssymbol");
DEFINE("_ESESS_FEES_FORMAT_PLACEMENT", "Symbolplatzierung");
DEFINE("_ESESS_FEES_FORMAT_PLACEMENT_LEFT", "links");
DEFINE("_ESESS_FEES_FORMAT_PLACEMENT_RIGHT", "rechts");
DEFINE("_ESESS_FEES_FORMAT_DECIMALSYMBOL", "Dezimalzeichen");
DEFINE("_ESESS_FEES_FORMAT_DECIMALPLACES", "Dezimalplätze");
DEFINE("_ESESS_FEES_FORMAT_SEPERATOR", "Trennzeichen");
DEFINE("_ESESS_CURRENCY_AUD", "Australische Dollar");
DEFINE("_ESESS_CURRENCY_CAD", "Kanadische Dollar");
DEFINE("_ESESS_CURRENCY_EUR", "Euro");
DEFINE("_ESESS_CURRENCY_GBP", "Pfund Sterling");
DEFINE("_ESESS_CURRENCY_JPY", "Japanische Yen");
DEFINE("_ESESS_CURRENCY_USD", "US Dollar");
DEFINE("_ESESS_CURRENCY_ERROR", "FEHLER: Unbekannte Währung!");
DEFINE("_ESESS_PAYPAL_SANDBOX", "PayPal Sandbox");
DEFINE("_ESESS_PAYPAL_LIVE", "PayPal Live");
DEFINE("_ESESS_PAYPAL_NONE", "Kein PayPal");
DEFINE("_ESESS_FIELD_TAX","Preise inkl. MwSt.");
DEFINE("_ESESS_FIELD_TAX_TT","Legen Sie hier fest, ob alle auf der Webseite angezeigte Preise inkl. oder zzgl. MwSt. gelten");
DEFINE("_ESESS_PAY_TAX_EXCLUDE_MSG","zzgl. MwSt.");
DEFINE("_ESESS_PAY_TAX_INCLUDE_MSG","inkl. MwSt.");

// Admin :: Configuration :: Thank-You HTML
DEFINE("_ESESS_FORM_CONFIG_THANK", "Konfiguriere Danke-Nachricht");
DEFINE("_ESESS_FIELD_THANKYOU", "Danke-Seite für Registrierung");
DEFINE("_ESESS_FIELD_THANKYOU_DESC", "");
DEFINE("_ESESS_DEFAULT_THANKYOU", "<h1>Vielen Dank {fullname}!</h1><p>Sie wurden erfolgreich für die Veranstaltung <b>{title}</b> registriert.<p /><p>Weitere Informationen erhalten Sie bei Bedarf an Ihre eMail-Adresse {email}, die Sie uns mit Ihrer Registrierung mitgeteilt haben.</p><p>Einzelheiten zu der Veranstaltung finden Sie <a href=\"{url}\">hier</a>.</p><p>{data}<br /></p>Austehende Kosten: {balance}");

// Back-End :: Configuration :: Confirmation Email
DEFINE("_ESESS_FIELD_CONFIRM_SEND", "Sende Bestätigungs-eMail");
DEFINE("_ESESS_FIELD_CONFIRM_SEND_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL", "eMail-Adresse(n) für Bestätigung");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT", "Betreff");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_MSG", "Nachricht");
DEFINE("_ESESS_FIELD_CONFIRM_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_CONFIRM_SUBJECT", "{action} bei Veranstaltung {title}");
DEFINE("_ESESS_DEFAULT_CONFIRM_MESSAGE", "<p>Hallo {fullname}!</p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Sie wurden erfolgreich für die Veranstaltung <b>{title}</b> angemeldet!</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Weitere Informationen erhalten Sie bei Bedarf an Ihre eMail-Adresse {email}, die Sie uns mit Ihrer Registrierung mitgeteilt haben.</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Einzelheiten zu der Veranstaltung finden Sie <a href=\"{url}\">hier</a>.</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">{data}<br /></span></p>");

// Back-End :: Configuration :: Confirmation Email -> Replacement tag notes
DEFINE("_ESESS_REPLACE_TAGS", "&lt;em&gt;Ersetzungstags&lt;/em&gt;&lt;br /&gt;\nKopieren Sie diese in Ihre Nachricht, damit diese automatisch vom System ersetzt werden.");
DEFINE("_ESESS_REPLACE_NAME", "Der volle Name des Benutzers");
DEFINE("_ESESS_REPLACE_EMAIL", "Die eMail-Adresse des Benutzers");
DEFINE("_ESESS_REPLACE_URL", "Die URL, um Informationen zur Veranstaltung anzuzeigen.");
DEFINE("_ESESS_REPLACE_TITLE", "Der Name der Veranstaltung");
DEFINE("_ESESS_REPLACE_ACTION", "Die Aktion der Registierung (Registrieren, Aktualisieren, Storno)");
DEFINE("_ESESS_REPLACE_DATA", "Tabelle mit den eingegebenen Daten");


// Back-End :: Configuration :: Notification Email
DEFINE("_ESESS_FIELD_NOTIFY_SEND", "Sende Benachrichtigungs-eMail");
DEFINE("_ESESS_FIELD_NOTIFY_SEND_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT", "Betreff");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_MSG", "Nachricht");
DEFINE("_ESESS_FIELD_NOTIFY_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_NOTIFY_SUBJECT", "Neue {action} bei Veranstaltung {title}"); 
DEFINE("_ESESS_DEFAULT_NOTIFY_MESSAGE", "<p>{fullname} ({email}) hat sich für die Veranstaltung{title} angemeldet</p><p>{data} </p>"); 

// General -> Session Status
DEFINE("_ESESS_STATUS_NEW", "Neu");
DEFINE("_ESESS_STATUS_OPEN", "Offen");
DEFINE("_ESESS_STATUS_FULL", "Voll");
DEFINE("_ESESS_STATUS_CLOSED", "Geschlossen");

// General -> Session Availability
DEFINE("_ESESS_AVAIL_EVERY", "Jeder");
DEFINE("_ESESS_AVAIL_REG", "Nur angemeldete Benutzer");
DEFINE("_ESESS_AVAIL_GUEST", "Nur Gäste");
DEFINE("_ESESS_AVAIL_GLOBAL", "Global");
DEFINE("_ESESS_AVAIL_GLOBAL2", "Benutzer Globale Einstellung");

// General -> Custom Toolbar Icons
DEFINE("_ESESS_TOOLBAR_VIEW", "Anzeigen");
DEFINE("_ESESS_TOOLBAR_EXPORT", "Export");
DEFINE("_ESESS_TOOLBAR_EXPORTALL", "Alle Exportieren");
DEFINE("_ESESS_TOOLBAR_EMAIL", "eMail");

// General -> File I/O errors
DEFINE("_ESESS_CONFIG_ERR", "Konfigurations-Datei ist nicht beschreibbar!");
DEFINE("_ESESS_CONFIG_ERR_OPEN", "Konfigurations-Datei kann nicht zum Schreiben geöffnet werden");
DEFINE("_ESESS_CONFIG_ERR_WRITE", "Konfigurations-Datei kann nicht beschrieben werden");
DEFINE("_ESESS_CONFIG_SAVE", "Konfiguration wurde erfolgreich gespeichert!");

// General -> Images used for sorting
DEFINE("_ESESS_ARROW_UP", "images/uparrow-1.png");
DEFINE("_ESESS_ARROW_DOWN", "images/downarrow-1.png");
DEFINE("_ESESS_ARROW_UNSET", "images/uparrow.png");

// General -> Javascript Validation
DEFINE("_ESESS_VAL_ERROR", "Fehler bei der Überprüfung:");

// General -> Dynamic Fields
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD","Neues Feld");
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD_DESC","Klicken Sie hier um ein neues Feld zu erstellen.");
DEFINE("_ESESS_DYNAMICFIELDS_LOADTABLEERROR","Beim Laden der Registrierungsfelder ist ein Fehler aufgetreten.");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDNAME","Feld Name");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE","Feld Typ");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDPARAMETERS","Typ-spezifische Parameter");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXT","Text");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXTAREA","Textfeld");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_CHECKBOX","Checkbox");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_RADIO","Radio Liste");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_SELECT","Auswahliste");
DEFINE("_ESESS_DYNAMICFIELDS_LAYOUT","Layout");
DEFINE("_ESESS_DYNAMICFIELDS_SIZE","Größe");
DEFINE("_ESESS_DYNAMICFIELDS_ROWS","Zeilen");
DEFINE("_ESESS_DYNAMICFIELDS_COLS","Spalten");
DEFINE("_ESESS_DYNAMICFIELDS_INPUTCONTROL","Eingabekontrolle");
DEFINE("_ESESS_DYNAMICFIELDS_REQUIRED","Erforderlich");
DEFINE("_ESESS_DYNAMICFIELDS_MAXLENGTH","Maximale Länge");
DEFINE("_ESESS_DYNAMICFIELDS_USERINTERFACE","Benutzer-Interface");
DEFINE("_ESESS_DYNAMICFIELDS_DEFAULT","Standard");
DEFINE("_ESESS_DYNAMICFIELDS_CBDEFAULT","Verknüpfte Community Builder Felder");
DEFINE("_ESESS_DYNAMICFIELDS_TOOLTIP","Tooltip");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONS","Optionen");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONNAME","Optionen Name");
DEFINE("_ESESS_DYNAMICFIELDS_ADDOPTION","Option hinzufügen");

// Payment Processing
DEFINE("_AE_PAYMENT_DESCRIPTION","Beschreibung");
DEFINE("_AE_PAYMENT_DESCRIPTION_DESC","Wie die Bezahl-Option dem Benutzer angezeigt wird &mdash; z.B., &quot;Bezahlung vor Ort&quot;, &quot;Verrechnungsscheck&quot; oder &quot;PayPal&quot;");
DEFINE("_AE_PAYMENT_PROCESSING_METHOD","Bezahlmethode");
DEFINE("_AE_PAYMENT_PROCESSING_METHOD_DESC","Select how this payment method will be processed.  Manual implies the administrator will enter any payments received (cheque, cash) through the back-end registration interface.  Automatic processing can be accomplished using PayPals IPN interface (REQUIRES A PAYPAL BUSINESS ACCOUNT).");
DEFINE("_AE_PAYMENT_ACCESS","Zugriff");
DEFINE("_AE_PAYMENT_ACCESS_DESC","Select the groups for which this payment method is allowed.  Hold the control key to select multiple groups simultaneously.");
DEFINE("_AE_PAYMENT_OPTIONS","Method-Specific Options");
DEFINE("_AE_PAYMENT_OPTIONS_DESC","Additional configurable parameters which depend on the selected processing method for this payment option.");
DEFINE("_AE_PAYMENT_DISCOUNT","Aufpreis für Bezahlmethode");
DEFINE("_AE_PAYMENT_DISCOUNT_DESC","The dollar amount by which the final price should be reduced when using this payment method.");
DEFINE("_AE_PAYMENT_INSTRUCTIONS","Anweisungen");
DEFINE("_AE_PAYMENT_INSTRUCTIONS_DESC","Text to display to the user after a payment method has been selected &mdash; i.e., &quot;Please make your cheque payable to...&quot;.");
DEFINE("_AE_PAYMENT_PAYPALID","PayPal ID");
DEFINE("_AE_PAYMENT_PAYPALID_DESC","The email address associated with your PayPal account.");

// Transactions
DEFINE("_AE_TRANSACTION_ID","ID");
DEFINE("_AE_TRANSACTION_ID_DESC","An ID associated with the payment method &mdash; i.e., the cheque number.  With PayPal, this is generated automatically (and links to the transaction record in your PayPal account.");
DEFINE("_AE_TRANSACTION_TYPE","Typ");
DEFINE("_AE_TRANSACTION_TYPE_DESC","The type of transaction &mdash; i.e., &quot;cash&quot; or &quot;cheque&quot;.  <b>Note:</b>  PayPal appears as &quot;instant&quot;");
DEFINE("_AE_TRANSACTION_STATUS","Status");
DEFINE("_AE_TRANSACTION_STATUS_DESC","Mainly for PayPal integration.  I suppose the status of manual payments would be &quot;Completed&quot; (or something like that).");
DEFINE("_AE_TRANSACTION_AMOUNT","Bezahlt");
DEFINE("_AE_TRANSACTION_AMOUNT_DESC","The amount received.  This is the net amount received from PayPal &mdash; i.e., after the transaction fee has occured.");
DEFINE("_AE_TRANSACTION_TIMESTAMP","Zeitstempel");
DEFINE("_AE_TRANSACTION_TIMESTAMP_DESC","");
DEFINE("_AE_TRANSACTION_PROCESSEDBY","eingetragen von");
DEFINE("_AE_TRANSACTION_PROCESSEDBY_DESC","");
DEFINE("_AE_TRANSACTION_DELETE","Wollen Sie diesen Eintrag wirklich löschen?");

// DynFramework
DEFINE("_AE_DYN_FEE_DESCRIPTION", "Beschreibung");
DEFINE("_AE_DYN_FEE_TYPE", "Typ");
DEFINE("_AE_DYN_FEE_SPECIFIC_OPTIONS", "Weitere Optionen");
DEFINE("_AE_DYN_FEE_MANDATORY", "erforderlich");
DEFINE("_AE_DYN_FEE_CHECKBOX", "CheckBox");
DEFINE("_AE_DYN_FEE_RADIO", "Radio Liste");
DEFINE("_AE_DYN_FEE_SELECT", "Auswahlliste");
DEFINE("_AE_DYN_FEE_AMOUNT", "Geldbetrag");
DEFINE("_AE_DYN_FEE_PAYPAL", "PayPal");
DEFINE("_AE_DYN_FEE_MANUAL", "Sonstiges");
DEFINE("_AE_DYN_PAYMENT_METHOD", "Bezahlmethode");

// Install / Upgrade / Uninstall
DEFINE("_AE_INSTALL_ADM_MENU_SESS", "Veranstaltungen");
DEFINE("_AE_INSTALL_ADM_MENU_VEN", "Veranstaltungsorte");
DEFINE("_AE_INSTALL_ADM_MENU_REG", "Registrierungen");
DEFINE("_AE_INSTALL_ADM_MENU_CONFIG", "Konfiguration");
?>
