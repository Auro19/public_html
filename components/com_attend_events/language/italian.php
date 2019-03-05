<?php
/**
* @version $Id: italian.php 25 2006-11-05 05:28:37Z pcarr $
* @package Attend Events
* @copyright (C) 2005-06 Peter Carr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*
*
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
*                                                         *
*       ITALIAN TRANSLATION BY   www.persuasione.net      *
*                                                         *
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
*
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'L\'accesso diretto a questa pagina non &egrave; permesso.' );

//Check
DEFINE("_ESESS_LANG_INCLUDED", 1);

// Front-End :: Title
DEFINE("_ESESS_COMPONENT_TITLE", "Prossimi Eventi");

// Front-End :: List
DEFINE("_ESESS_NAME", "Nome");
DEFINE("_ESESS_VENUE", "Luogo");
DEFINE("_ESESS_SESSION_UP", "Data della Sessione");
DEFINE("_ESESS_REGISTRATION_DOWN", "Scadenza della iscrizione");
DEFINE("_ESESS_NUM_LEFT", "# rimanenti");
DEFINE("_ESESS_NUM_AVAIL", "# disponibili");
DEFINE("_ESESS_AVAIL_STATUS", "Stato");
DEFINE("_ESESS_AVAIL_STATUS_AVAIL", "Disponibile");
DEFINE("_ESESS_AVAIL_STATUS_FULL", "Completo");

// Front-End :: View
DEFINE("_ESESS_REG_HOSTED_BY", "Ospitato da");
DEFINE("_ESESS_REG_DATETIME", "Data &amp; Ora");
DEFINE("_ESESS_REG_LOCATION", "Luogo");
DEFINE("_ESESS_REG_MAPTEXT", "How do I get there?");
DEFINE("_ESESS_REG_AVAIL", "iscrizione Disponibile");
DEFINE("_ESESS_REG_CLOSE", "Scadenza iscrizione");
DEFINE("_ESESS_UNLIMITED", "Illimitato");
DEFINE("_ESESS_OUT_OF", "scaduto da");
DEFINE("_ESESS_FIELD_COMMENTS", "Commenti");
DEFINE("_ESESS_FIELD_COMMENTS_DESC", "");
DEFINE("_ESESS_ERROR_ONLY_REGISTERED", "Solo gli utenti registrati possono iscriversi per questa sessione.");
DEFINE("_ESESS_ERROR_ONLY_GUESTS", "Solo gli ospiti possono iscriversi per questa sessione.");
DEFINE("_ESESS_ERROR_FULL", "Questa sessione &egrave; piena.");
DEFINE("_ESESS_ERROR_CLOSED", "Il periodo di iscrizione &egrave; terminato.");
DEFINE("_ESESS_REG_LIST", "Persone gi&agrave; iscritte.");

// Front End :: View -> Registration Form
DEFINE("_ESESS_FIELD_FULLNAME", "Nome Completo");
DEFINE("_ESESS_FIELD_FULLNAME_DESC", "Per favore, inserisci il tuo Nome Completo per essere contattato.");
DEFINE("_ESESS_FIELD_EMAIL", "Email");
DEFINE("_ESESS_FIELD_EMAIL_DESC", "Per favore inserisci qui il tuo indirizzo email.");
DEFINE("_ESESS_FIELD_NUM_PEOPLE", "Numero di persone");
DEFINE("_ESESS_FIELD_NUM_PEOPLE_DESC", "Quante persone vorresti iscrivere?");
DEFINE("_ESESS_BUTTON_REGISTER", "Iscriviti");
DEFINE("_ESESS_BUTTON_RESET", "Reset");
DEFINE("_ESESS_BUTTON_UPDATE", "Aggiorna iscrizione");
DEFINE("_ESESS_BUTTON_CANCEL", "Annulla iscrizione");
DEFINE("_ESESS_VAL_REG_ALERT", "Problemi di Validazione riscontrati nella iscrizione:");
DEFINE("_ESESS_VAL_REG_FULLNAME", "Devi fornire il tuo Nome Completo.");
DEFINE("_ESESS_VAL_REG_EMAIL", "Devi fornire il tuo Indirizzo Email.");
DEFINE("_ESESS_VAL_REG_NUMBER", "Il numero delle persone non &egrave; un valido numero intero tra 1 e ");

// Back-End -> General
DEFINE("_ESESS_REQUIRED", "<span style=\"color: red;\">*</span>");
DEFINE("_ESESS_STYLE_TITLE", "style=\"background-color: #E0E0E0; font-weight: bold; border-bottom: 1px solid #B0B0B\"");

// Back-End -> Menus
DEFINE("_ESESS_MENU_SESSIONS", "Sessioni");
DEFINE("_ESESS_MENU_VENUES", "Luoghi");
DEFINE("_ESESS_MENU_REGISTRATIONS", "iscrizioni");
DEFINE("_ESESS_MENU_CONFIGURATION", "Configurazione");

// Back-End :: Sessions :: List
DEFINE("_ESESS_FORM_SLIST", "Gestione delle Sessioni");
DEFINE("_ESESS_SLIST_NAME", "Nome");
DEFINE("_ESESS_SLIST_SESSION_UP", "Data Inizio Sess.");
DEFINE("_ESESS_SLIST_SESSION_DOWN", "Data Fine Sess.");
DEFINE("_ESESS_SLIST_REGISTRATION_UP", "Data Inizio Reg.");
DEFINE("_ESESS_SLIST_REGISTRATION_DOWN", "Data Fine Reg.");
DEFINE("_ESESS_SLIST_NUM_REGISTRATIONS", "iscrizioni");
DEFINE("_ESESS_SLIST_STATUS", "Stato");
DEFINE("_ESESS_SLIST_AVAIL", "Disponibilit&agrave;");
DEFINE("_ESESS_SLIST_PUB", "Publicata");
// Back-End :: Sessions :: List -> Filtri
DEFINE("_ESESS_SFILTER_CHOOSE", "Scegli un Filtro");
DEFINE("_ESESS_SFILTER_NONE", "Nessun Filtro");
DEFINE("_ESESS_SFILTER_STATUS", "- Filtri sullo Stato");
DEFINE("_ESESS_SFILTER_AVAIL", "- Filtri sulla Disponibilit&agrave;");
DEFINE("_ESESS_SFILTER_EVENT", "- Filtri sugli Eventi");
DEFINE("_ESESS_RFILTER_CHOOSE", "Scegli una Sessione");
DEFINE("_ESESS_RFILTER_ALL", "- Tutte le Sessioni");
// Back-End :: Sessions :: List -> Javascript Validation Errors
DEFINE("_ESESS_PUBLISH_MSG", "Scegli una Sessione da ");
DEFINE("_ESESS_DELETE_SESSION_MSG", "Scegli una Sessione da eliminare");


// Back-End :: Sessions :: Edit
DEFINE("_ESESS_FORM_SESS_ADD", "Aggiungi Sessione");
DEFINE("_ESESS_FORM_SESS_EDIT", "Modifica Sessione");
DEFINE("_ESESS_TITLE_DESCRIPTION", "Dettagli Sessione");
DEFINE("_ESESS_TITLE_SESSION_GENERAL","Generale");
DEFINE("_ESESS_TITLE_SESSION_DATETIME","Data e Ora");
DEFINE("_ESESS_FIELD_EVENT", "Evento");
DEFINE("_ESESS_FIELD_EVENT_DESC", "Scegli un evento esistente per creargli una sessione.");
DEFINE("_ESESS_NO_EVENT", "Nessun Evento");
DEFINE("_ESESS_FIELD_TITLE", "Titolo");
DEFINE("_ESESS_FIELD_TITLE_DESC", "Inserisci un Titolo per la Sessione.");
DEFINE("_ESESS_FIELD_INTRO", "Descrizione");
DEFINE("_ESESS_FIELD_INTRO_DESC", "Del testo introduttivo che spieghi questa Sessione.  Che sia d\'aiuto se non &egrave; collegata ad un Evento.");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE", "Data Inzio Sessione");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE_DESC", "Data in cui la session inizia.");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME", "Ora Inizio Sessione");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE", "Data Fine Sessione");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE_DESC", "Data in cui la sessione finisce.");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME", "Ora Fine Sessione");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_FIELD_STATUS", "Stato");
DEFINE("_ESESS_FIELD_STATUS_DESC", "Stato generale della Sessione:<br />Nuovo non &egrave; accessibile<br />Aperta pu&ograve; essere Registrata<br />Chiusa &egrave; ovviamente chiusa<br />Piena ha raggiunto il numero massimo di Iscrizioni");
DEFINE("_ESESS_FIELD_MAX", "Massimo # di Iscrizioni");
DEFINE("_ESESS_FIELD_MAX_DESC", "Il numero massimo di iscrizioni permesse per questa sessione.<br />Una volta che il numero massimo viene raggiunto, lo stato viene modificato come Piena");
DEFINE("_ESESS_FIELD_AVAIL", "Disponibilit&agrave;");
DEFINE("_ESESS_FIELD_AVAIL_DESC", "Indica a chi &egrave; permesso di iscriversi alle Sessioni.<br />Usa le impostazioni Global nella configurazione");
DEFINE("_ESESS_FIELD_PUBLISH", "Pubblica");
DEFINE("_ESESS_FIELD_PUBLISH_DESC", "Indica se questa sessione &egrave; Pubblicata.");
DEFINE("_ESESS_FIELD_SESSION_HOST", "Ospite della Sessione");
DEFINE("_ESESS_FIELD_SESSION_HOST_DESC", "Scegli un ospite per questa sessione.  Per apparire in questa lista,  un utente deve avere un livello di accesso di gruppo uguale o superiore di &quot;author&quot;.");
DEFINE("_ESESS_TAB_SESSION_REGISTRATION","Iscrizione");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE", "Data Inizio Iscrizione");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE_DESC", "Data da cui Iniziare ad accettare le Iscrizioni. Il collegamento non viene mostrato fino a questa data.");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME", "Ora Inizio Iscrizione");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE", "Data Fine Iscrizione");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE_DESC", "Data in cui Smette di accettare le Iscrizioni.  Il collegamento non viene mostrato dopo questa data.");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME", "Ora Fine Iscrizione");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_TAB_SESSION_VENUE","Luogo");
DEFINE("_ESESS_FIELD_VENUE_LIST", "Luoghi Comuni");
DEFINE("_ESESS_FIELD_VENUE_LIST_DESC", "Scegli un luogo definito nella tabella dei Luoghi, o inserisci le informazioni sul luogo nei campi sottostanti.");


// Back-End :: Venues
DEFINE("_ESESS_FORM_VLIST", "Luoghi degli Eventi");
DEFINE("_ESESS_VLIST_NAME", "Nome Luogo");

// Back-End :: Venues :: Edit
DEFINE("_ESESS_FORM_VENUE_ADD", "Aggiungi Luogo");
DEFINE("_ESESS_FORM_VENUE_EDIT", "Modifica Luogo");
DEFINE("_ESESS_FIELD_VENUE_TITLE", "Nome");
DEFINE("_ESESS_FIELD_VENUE_TITLE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS", "Indirizzo");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_CITY", "Citt&agrave;");
DEFINE("_ESESS_FIELD_VENUE_CITY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_STATE", "Stato");
DEFINE("_ESESS_FIELD_VENUE_STATE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE", "CAP");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY", "Paese");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS", "Indirizzo Web");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS_DESC", "Assicurati di includere &quot;http://&quot;");
DEFINE("_ESESS_JSERROR_VENUE_TITLE", "Devi inserire il nome del luogo.");
DEFINE("_ESESS_JSERROR_VENUE_ADDRESS", "Devi inserire l\'indirizzo del luogo.");

// Back-End :: Registrations :: List
DEFINE("_ESESS_FORM_RLIST", "iscrizioni agli Eventi");
DEFINE("_ESESS_RLIST_NAME", "Nome");
DEFINE("_ESESS_RLIST_EMAIL", "Email");
DEFINE("_ESESS_RLIST_TITLE", "Sessione");
DEFINE("_ESESS_RLIST_RDATE", "Data iscrizione");
DEFINE("_ESESS_RLIST_STATUS", "Stato");
DEFINE("_ESESS_RLIST_NUM", "# iscrizioni");
DEFINE("_ESESS_RLIST_VIEWED", "Visti");
DEFINE("_ESESS_REGISTRATION_STATUS_REGISTERED", "Iscriviti");
DEFINE("_ESESS_REGISTRATION_STATUS_CANCELLED", "Annullati");
DEFINE("_ESESS_REGISTRATION_STATUS_CLOSED", "Chiusi");
DEFINE("_ESESS_DELETE_REG_MSG", "Scegli una iscrizione da eliminare");

// Back-End :: Registrations :: View
DEFINE("_ESESS_FORM_REG_VIEW", "Mostra iscrizione");
DEFINE("_ESESS_FIELD_SESSION", "Sessione");
DEFINE("_ESESS_FIELD_REGISTRATION_DATE", "Data iscrizione");
DEFINE("_ESESS_FIELD_CANCELLATION_DATE", "Data Cancellazione");
DEFINE("_ESESS_FIELD_REGISTRATION_STATUS", "Stato");

// Back-End :: Registrations :: Export
DEFINE("_ESESS_FORM_EXPORT", "Esporta Iscrizioni");
DEFINE("_ESESS_FIELD_METHOD", "Metodo d\'Esportazione");
DEFINE("_ESESS_FIELD_METHOD_CSV", "CSV");
DEFINE("_ESESS_FIELD_FILENAME", "Nomefile");
// Back-End :: Registrations :: Export -> Javascript Validation Errors
DEFINE("_ESESS_VAL_EXPORT_FILENAME", "Il Nomefile non pu&ograve; essere vuoto.");
DEFINE("_ESESS_EXPORT_MSG", "Metodo d\'Esportazione Sconosciuto");

// Back-End :: Configuration
DEFINE("_ESESS_FORM_CONFIG", "Configurazione");
DEFINE("_ESESS_FORM_CONFIG_CONFIRM", "Configura l\'Email di Conferma");
DEFINE("_ESESS_FORM_CONFIG_NOTIFY", "Configura l\'Email di Notifica");
DEFINE("_ESESS_FORM_CONFIG_CANCEL", "Configura l\'Email di Cancellazione");
DEFINE("_ESESS_ACTION_REGISTER", "Iscrizione");
DEFINE("_ESESS_ACTION_UPDATE", "Aggiorna");
DEFINE("_ESESS_ACTION_CANCEL", "Annulla");
DEFINE("_ESESS_BUTTON_OPTIONS","Opzioni");
DEFINE("_ESESS_BUTTON_OPTIONS_IMG","images/config.png");
DEFINE("_ESESS_BUTTON_THANK","Mostra GRAZIE");
DEFINE("_ESESS_BUTTON_THANK_IMG","images/menu.png");
DEFINE("_ESESS_BUTTON_CONFIRM","Email di Conferma");
DEFINE("_ESESS_BUTTON_CONFIRM_IMG","images/messaging.png");
DEFINE("_ESESS_BUTTON_NOTIFY","Email di Notifica");
DEFINE("_ESESS_BUTTON_NOTIFY_IMG","images/message_config.png");
DEFINE("_ESESS_BUTTON_CANCELLATION","Email di Cancellazione");
DEFINE("_ESESS_BUTTON_CANCELLATION_IMG","images/inbox.png");

// Admin :: Config :: Options
DEFINE("_ESESS_FORM_CONFIG_OPTIONS", "Configura Opzioni");
DEFINE("_ESESS_TAB_CONFIG_GENERAL","Generale");
DEFINE("_ESESS_TITLE_INTEGRATION", "Integrazione con altri Componenti");
DEFINE("_ESESS_FIELD_INTEGRATE", "Integra con il Componente <b>JEvents</b>");
DEFINE("_ESESS_FIELD_INTEGRATE_DESC", "Permetti ad una sessione di essere associata con un evento del componente <i>JEvents</i>.<br><b>Nota:  Clicca il bottone &quot;Apply&quot; dopo aver cambiato questo valore</b>.");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT", "Mostra Oggetti Eventi");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY", "Mostra Attivit&agrave; Eventi");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_LOCATION", "Mostra Luoghi Eventi");
DEFINE("_ESESS_FIELD_SHOW_LOCATION_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_CONTACT", "Mostra Contatti Eventi");
DEFINE("_ESESS_FIELD_SHOW_CONTACT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_EXTRA", "Mostra Extra Eventi");
DEFINE("_ESESS_FIELD_SHOW_EXTRA_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_TIME", "Mostra Orari Eventi");
DEFINE("_ESESS_FIELD_SHOW_TIME_DESC", "");
DEFINE("_ESESS_FIELD_CBINTEGRATED","Integra con il Componente <b>Community Builder</b>");
DEFINE("_ESESS_FIELD_CBINTEGRATED_DESC","Valori di Default per ogni campo di registrazione pu&ograve;essere generato usando te informazioni salvate in un profilo utente di Community Builder (vedi il tab \'Fields\').<br><b>Nota:  Clicca il bottone &quot;Apply&quot; dopo aver cambiato questo v valore</b>.");
DEFINE("_ESESS_FIELD_SHOWAVATAR", "Mostra Avatar");
DEFINE("_ESESS_FIELD_SHOWAVATAR_DESC", "");
DEFINE("_ESESS_TITLE_REGISTRATIONCONTROL", "Controllo Iscrizione");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW", "Permetti Iscrizioni da");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW_DESC", "");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL", "Permetti solo Iscrizioni Individuali");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL_DESC", "");
DEFINE("_ESESS_FIELD_FULL_PROC", "Permetti elaborazione Completa");
DEFINE("_ESESS_FIELD_FULL_PROC_DESC", "");
DEFINE("_ESESS_FIELD_REG_CANCEL", "Permetti la cancellazione agli utenti iscritti");
DEFINE("_ESESS_FIELD_REG_CANCEL_DESC", "");
DEFINE("_ESESS_TITLE_DATETIME", "Formattazione Data e Ora");
DEFINE("_ESESS_FIELD_DATE_SHORT", "Formato Data (breve)");
DEFINE("_ESESS_FIELD_DATE_SHORT_DESC", "");
DEFINE("_ESESS_FIELD_DATE_LONG", "Formato Data (lunga)");
DEFINE("_ESESS_FIELD_DATE_LONG_DESC", "");
DEFINE("_ESESS_FIELD_TIME", "Formato Orario");
DEFINE("_ESESS_FIELD_TIME_DESC", "");
DEFINE("_ESESS_FIELD_TIME1", "24 ore, Leading Zero");
DEFINE("_ESESS_FIELD_TIME2", "24 ore, Leading Space");
DEFINE("_ESESS_FIELD_TIME3", "12 ore, Leading Zero");
DEFINE("_ESESS_FIELD_TIME4", "12 ore, Leading Space");
DEFINE("_ESESS_TITLE_FRONTENDCONTROL", "Controllo Front-End");
DEFINE("_ESESS_FIELD_LIST_START", "Inizia a Elencare Sessioni");
DEFINE("_ESESS_FIELD_LIST_START_DESC", "");
DEFINE("_ESESS_FIELD_LIST_STOP", "Smetti di Elencare Sessioni");
DEFINE("_ESESS_FIELD_LIST_STOP_DESC", "");
DEFINE("_ESESS_FIELD_LIST_CASE0","Immediatamente");
DEFINE("_ESESS_FIELD_LIST_CASE1","Quando l\'Iscrizione Inizia");
DEFINE("_ESESS_FIELD_LIST_CASE2","Quando l\'Iscrizione Finisce");
DEFINE("_ESESS_FIELD_LIST_CASE3","Quando la Sessione Inizia");
DEFINE("_ESESS_FIELD_LIST_CASE4","Quando la Sessione Finisce");
DEFINE("_ESESS_FIELD_LIST_FULL", "Elenca Le Sessioni che sono Piene");
DEFINE("_ESESS_FIELD_LIST_FULL_DESC", "");
DEFINE("_ESESS_FIELD_LIST_EVERYONE", "Elenca Sessioni Riguardo la Disponibilit&agrave;");
DEFINE("_ESESS_FIELD_LIST_EVERYONE_DESC", "");
DEFINE("_ESESS_FIELD_USER_NUM", "Mostra il numero di iscritti");
DEFINE("_ESESS_FIELD_USER_NUM_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER", "Mostra Footer nel Front-End");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP", "Mostra Collegamento a Google Maps");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED", "Mostra Lista degli Utenti 'Gi&agrave; Registrati' ");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_VENUE", "Mostra Luogo Nell\'Elenco");
DEFINE("_ESESS_FIELD_DISPLAY_VENUE_DESC", "");
DEFINE("_ESESS_TAB_CONFIG_FIELDS","Campi");
// Back-End :: Configuration :: Options -> Javascript Validation Errors
DEFINE("_ESESS_VAL_SESS_TITLE", "Il Titolo non pu&ograve; essere vuoto.");
DEFINE("_ESESS_VAL_REGISTRATION_UP_DATE", "Data Inizio Registrazione non pu&ograve; essere vuoto.");
DEFINE("_ESESS_VAL_REGISTRATION_DOWN_DATE", "Data Fine Registrazione non pu&ograve; essere vuoto.");
DEFINE("_ESESS_VAL_SESSION_UP_DATE", "Data Inizio Sessione non pu&ograve; essere vuoto.");
DEFINE("_ESESS_VAL_SESS_MAX", "Max # Iscrizioni dev\'essere un numero intero >=0.");
DEFINE("_ESESS_VAL_SESS_MAXMIN", "Max # Iscrizioni non pu&ograve; essere inferiore del Min # Iscrizioni");


// Admin :: Configuration :: Thank-You HTML
DEFINE("_ESESS_FORM_CONFIG_THANK", "Configura Messaggio di GRAZIE");
DEFINE("_ESESS_FIELD_THANKYOU", "Schermata di Ringraziamento Iscrizione");
DEFINE("_ESESS_FIELD_THANKYOU_DESC", "");
DEFINE("_ESESS_DEFAULT_THANKYOU", "<h1>Grazie {fullname}!</h1><p>Sei stato iscritto al {title}<p /><p>Se avremo necessit&agrave; di contattarti ulteriormente in merito a questa iscrizione, lo faremo attraverso l\'indirizzo {email}</p><p>Puoi vedere i dettagli di questa Sessione <a href=\"{url}\">QUI</a>.</p><p>{data}<br /></p>");

// Back-End :: Configuration :: Confirmation Email
DEFINE("_ESESS_FIELD_CONFIRM_SEND", "Manda Email di Conferma");
DEFINE("_ESESS_FIELD_CONFIRM_SEND_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL", "Indirizzo(i) Email di Conferma");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT", "Oggetto dell\'Email di Conferma");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_MSG", "Messaggio dell\'Email di Conferma");
DEFINE("_ESESS_FIELD_CONFIRM_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_CONFIRM_SUBJECT", "{title} {action}");
DEFINE("_ESESS_DEFAULT_CONFIRM_MESSAGE", "<p>Caro {fullname}</p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Sei stato iscritto al {title}!</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Se avremo necessit&agrave; di contattarti ulteriormente in merito a questa iscrizione, lo faremo attraverso l\'indirizzo {email}</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Puoi vedere i dettagli di questa Sessione <a href=\"{url}\">QUI</a></span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">{data}<br /></span></p>");

// Back-End :: Configuration :: Confirmation Email -> Replacement tag notes
DEFINE("_ESESS_REPLACE_TAGS", "&lt;em&gt;Replacment Tags&lt;/em&gt;&lt;br /&gt;\nCopia e Incolla questi nei campi per le sostituzioni.");
DEFINE("_ESESS_REPLACE_NAME", "Il Nome Completo degli Utenti");
DEFINE("_ESESS_REPLACE_EMAIL", "Gli indirizzi Email degli Utenti");
DEFINE("_ESESS_REPLACE_URL", "L\'URL in cui mostrare le info della Sessione");
DEFINE("_ESESS_REPLACE_TITLE", "Il Titolo della Sessione");
DEFINE("_ESESS_REPLACE_ACTION", "L\'Azione di Iscriversi (Register, Update, Cancel)");
DEFINE("_ESESS_REPLACE_DATA", "Tavola contante i dati immessi");


// Back-End :: Configuration :: Notification Email
DEFINE("_ESESS_FIELD_NOTIFY_SEND", "Manda Email di Notifica");
DEFINE("_ESESS_FIELD_NOTIFY_SEND_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT", "Oggetto Email di Notifica");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_MSG", "Messaggio Email di Notifica");
DEFINE("_ESESS_FIELD_NOTIFY_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_NOTIFY_SUBJECT", "Nuovo {title} {action}"); 
DEFINE("_ESESS_DEFAULT_NOTIFY_MESSAGE", "<p>{fullname} {email} s\'&agrave; iscritto al {title}</p><p>{data} </p>"); 

// Back-End :: Configuration :: Cancel Page
DEFINE("_ESESS_DEFAULT_CANCEL_TITLE", "Iscrizione Annullata");
DEFINE("_ESESS_DEFAULT_CANCEL_TEXT", "{fullname}, la tua iscrizione al (title) è stata annullata<br />Clicca <a href=\"{url}\">QUI</a> per tornare alla Sessione.");




// Back-End :: About
DEFINE("_ESESS_TOOLBAR_UNINSTALL", "Disinstalla");
DEFINE("_ESESS_TOOLBAR_SAVESETTINGS", "Impostazioni");
DEFINE("_ESESS_TOOLBAR_UPDATE", "Aggiorna");
DEFINE("_ESESS_UNINSTALL_CONFIRM", "Sei sicuro di volere rimuovere tutte le informazioni nel database relative ad Attend Events?");
DEFINE("_ESESS_UNINSTALL_MESSAGE", "Ogni dato di Attend Events &egrave; stato rimosso con successo!  Puoi ora disinstallare il componente.");
DEFINE("_ESESS_UPDATE_CONFIRM", "Hai backuppato il tuo database di Joomla?");




// General -> Session Status
DEFINE("_ESESS_STATUS_NEW", "Nuova");
DEFINE("_ESESS_STATUS_OPEN", "Apri");
DEFINE("_ESESS_STATUS_FULL", "Piena");
DEFINE("_ESESS_STATUS_CLOSED", "Chiusa");

// General -> Session Availability
DEFINE("_ESESS_AVAIL_EVERY", "Chiunque");
DEFINE("_ESESS_AVAIL_REG", "Solo Utenti Registrati");
DEFINE("_ESESS_AVAIL_GUEST", "Solo Ospiti");
DEFINE("_ESESS_AVAIL_GLOBAL", "Global");
DEFINE("_ESESS_AVAIL_GLOBAL2", "Usa Global");

// General -> Custom Toolbar Icons
DEFINE("_ESESS_TOOLBAR_VIEW", "Vedi");
DEFINE("_ESESS_TOOLBAR_EXPORT", "Esporta");
DEFINE("_ESESS_TOOLBAR_EXPORTALL", "Esporta Tutto");
DEFINE("_ESESS_TOOLBAR_EMAIL", "Email");

// General -> File I/O errors
DEFINE("_ESESS_CONFIG_ERR", "Il file Config non &egrave; scrivibile!");
DEFINE("_ESESS_CONFIG_ERR_OPEN", "Impossibile aprire il file di Configurazione per scriverlo");
DEFINE("_ESESS_CONFIG_ERR_WRITE", "Impossibile scrivere nel file di Configurazione");
DEFINE("_ESESS_CONFIG_SAVE", "Configurazione Salvata con successo!");

// General -> Images used for sorting
DEFINE("_ESESS_ARROW_UP", "images/uparrow-1.png");
DEFINE("_ESESS_ARROW_DOWN", "images/downarrow-1.png");
DEFINE("_ESESS_ARROW_UNSET", "images/uparrow.png");

// General -> Javascript Validation
DEFINE("_ESESS_VAL_ERROR", "Errori di Validazione:");

// General -> Dynamic Fields
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD","Nuovo Campo");
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD_DESC","Clicca per creare un nuovo campo.");
DEFINE("_ESESS_DYNAMICFIELDS_LOADTABLEERROR","S\&egrave; verificato un errore mentre caricavo i campi di iscrizione.");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDNAME","Nome Campo");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE","Tipo di Campo");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDPARAMETERS","Parametri Tipo-Specifici");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXT","Testo");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXTAREA","Textarea");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_CHECKBOX","Checkbox");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_RADIO","Radio List");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_SELECT","Select List");
DEFINE("_ESESS_DYNAMICFIELDS_LAYOUT","Layout");
DEFINE("_ESESS_DYNAMICFIELDS_SIZE","Size");
DEFINE("_ESESS_DYNAMICFIELDS_ROWS","Rows");
DEFINE("_ESESS_DYNAMICFIELDS_COLS","Cols");
DEFINE("_ESESS_DYNAMICFIELDS_INPUTCONTROL","Input Control");
DEFINE("_ESESS_DYNAMICFIELDS_REQUIRED","Richiesto");
DEFINE("_ESESS_DYNAMICFIELDS_MAXLENGTH","Lunghezza Massima");
DEFINE("_ESESS_DYNAMICFIELDS_USERINTERFACE","Interfaccia Utente");
DEFINE("_ESESS_DYNAMICFIELDS_DEFAULT","Default");
DEFINE("_ESESS_DYNAMICFIELDS_CBDEFAULT","Associated Community Builder Field");
DEFINE("_ESESS_DYNAMICFIELDS_TOOLTIP","Tooltip");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONS","Opzioni");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONNAME","Nome Opzione");
DEFINE("_ESESS_DYNAMICFIELDS_ADDOPTION","Aggiungi Opzione");
?>
