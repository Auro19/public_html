<?php
/**
* @version $Id: french.php 17 2006-11-04 03:41:21Z pcarr $
* @package Attend Events
* @copyright (C) 2005-06 Laurent Belloeil
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Check
DEFINE("_ESESS_LANG_INCLUDED", 1);

// Front-End :: Title
DEFINE("_ESESS_COMPONENT_TITLE", "Attend Events");

// Front End :: List
DEFINE("_ESESS_NAME", "Nom");
DEFINE("_ESESS_SESSION_UP", "Date de la Manifestation");
DEFINE("_ESESS_REGISTRATION_DOWN", "Limite des Inscriptions");
DEFINE("_ESESS_NUM_LEFT", "Places disponibles");
DEFINE("_ESESS_NUM_AVAIL", "Places Totales");
DEFINE("_ESESS_AVAIL_STATUS", "Statut");
DEFINE("_ESESS_AVAIL_STATUS_AVAIL", "Ouvert");
DEFINE("_ESESS_AVAIL_STATUS_FULL", "Complet");

// Front End :: View
DEFINE("_ESESS_REG_HOSTED_BY", "Organis&eacute;e par");
DEFINE("_ESESS_REG_DATETIME", "Date & heure");
DEFINE("_ESESS_REG_LOCATION", "Lieu");
DEFINE("_ESESS_REG_MAPTEXT", "Comment y aller?");
DEFINE("_ESESS_REG_AVAIL", "Inscriptions en cours");
DEFINE("_ESESS_REG_CLOSE", "Fin des inscriptions");
DEFINE("_ESESS_UNLIMITED", "Illimit&eacute;es");
DEFINE("_ESESS_OUT_OF", "en dehors"); 
DEFINE("_ESESS_FIELD_COMMENTS", "Commentaires");
DEFINE("_ESESS_FIELD_COMMENTS_DESC", "");
DEFINE("_ESESS_ERROR_ONLY_REGISTERED", "Seuls les membres peuvent s&#8217;inscrire à cette Manifestation.");
DEFINE("_ESESS_ERROR_ONLY_GUESTS", "Seuls les invit&eacute;s peuvent s&#8217;inscrire à cette Manifestation.");
DEFINE("_ESESS_ERROR_FULL", "Cette Manifestation est compl&egrave;te.");
DEFINE("_ESESS_ERROR_CLOSED", "La p&eacute;riode des inscriptions est termin&eacute;e.");
DEFINE("_ESESS_REG_LIST", "Liste des personnes d&eacute;j&agrave; inscrites");

// Front End :: View -> Registration Form
DEFINE("_ESESS_FIELD_FULLNAME", "Pr&eacute;nom et Nom");
DEFINE("_ESESS_FIELD_FULLNAME_DESC", "Veuillez renseigner votre nom pour que nous puissions vous recontacter.");
DEFINE("_ESESS_FIELD_EMAIL", "Courriel");
DEFINE("_ESESS_FIELD_EMAIL_DESC", "Veuillez renseigner adresse de courriel ici.");
DEFINE("_ESESS_FIELD_NUM_PEOPLE", "Nombre de personnes");
DEFINE("_ESESS_FIELD_NUM_PEOPLE_DESC", "Combien de personnes d&eacute;sirez-vous inscrire?");
DEFINE("_ESESS_BUTTON_REGISTER", "S&#8217;inscrire");
DEFINE("_ESESS_BUTTON_RESET", "Recommencer");
DEFINE("_ESESS_BUTTON_UPDATE", "Mettre à jour votre inscription");
DEFINE("_ESESS_BUTTON_CANCEL", "Annuler votre inscription");
DEFINE("_ESESS_VAL_REG_ALERT", "Conditions d&#8217;inscription:");
DEFINE("_ESESS_VAL_REG_FULLNAME", "Vous devez renseigner votre nom.");
DEFINE("_ESESS_VAL_REG_EMAIL", "Vous devez renseigner votre adresse de courriel.");
DEFINE("_ESESS_VAL_REG_NUMBER", "Le nombre de personnes n&#8217;est pas compris entre 1 and ");

// Display of required fields
DEFINE("_ESESS_REQUIRED", "<span style=\"color: red;\">*</span>");
DEFINE("_ESESS_STYLE_TITLE", "style=\"background-color: #E0E0E0; font-weight: bold; border-bottom: 1px solid #B0B0B\"");

// Back-End -> Menus
DEFINE("_ESESS_MENU_SESSIONS", "Manifestations");
DEFINE("_ESESS_MENU_VENUES", "Lieux");
DEFINE("_ESESS_MENU_REGISTRATIONS", "Inscriptions");
DEFINE("_ESESS_MENU_CONFIGURATION", "Configuration");

// Back-End :: Sessions :: list
DEFINE("_ESESS_FORM_SLIST", "Manifestations");
DEFINE("_ESESS_SLIST_NAME", "Nom");
DEFINE("_ESESS_SLIST_SESSION_UP", "Date de d&eacute;but");
DEFINE("_ESESS_SLIST_SESSION_DOWN", "Date de fin");
DEFINE("_ESESS_SLIST_REGISTRATION_UP", "D&eacute;but des Inscriptions");
DEFINE("_ESESS_SLIST_REGISTRATION_DOWN", "Fin des Inscriptions");
DEFINE("_ESESS_SLIST_NUM_REGISTRATIONS", "Inscriptions");
DEFINE("_ESESS_SLIST_STATUS", "Etat");
DEFINE("_ESESS_SLIST_AVAIL", "Accessibilit&eacute;");
DEFINE("_ESESS_SLIST_PUB", "Publi&eacute;");
// Back-End :: Sessions :: List -> Filters
DEFINE("_ESESS_SFILTER_CHOOSE", "Choisissez un filtre");
DEFINE("_ESESS_SFILTER_NONE", "Pas de filtre");
DEFINE("_ESESS_SFILTER_STATUS", "- Filtres par Etat");
DEFINE("_ESESS_SFILTER_AVAIL", "- Filtres par diponibilit&eacute;");
DEFINE("_ESESS_SFILTER_EVENT", "- Filtres par manifestation");
DEFINE("_ESESS_RFILTER_CHOOSE", "Choisissez une manifestation");
DEFINE("_ESESS_RFILTER_ALL", "- Toutes les manifestations");
// Back-End :: Sessions :: List -> Javascript Validation Errors
DEFINE("_ESESS_PUBLISH_MSG", "S&eacute;clectionner la manifestation à ");
DEFINE("_ESESS_DELETE_SESSION_MSG", "S&eacute;clectionner une manifestation à effacer");


// Admin :: Manifestations :: Edit
DEFINE("_ESESS_FORM_SESS_ADD", "Ajouter une Manifestation");
DEFINE("_ESESS_FORM_SESS_EDIT", "Modifier une Manifestation");
DEFINE("_ESESS_TITLE_DESCRIPTION", "Description de la manifestation");
DEFINE("_ESESS_TITLE_SESSION_GENERAL","G&eacute;n&eacute;ral");
DEFINE("_ESESS_TITLE_SESSION_DATETIME","Date & Heure");
DEFINE("_ESESS_FIELD_EVENT", "Manifestation");
DEFINE("_ESESS_FIELD_EVENT_DESC", "S&eacute;lectionnez un Ev&egrave;nement existant pour lequel cr&eacute;er la Manifestation<br />Ou entrer un titre pour une manifestation ind&eacute;pendante.");
DEFINE("_ESESS_NO_EVENT", "Pas de manifestation");
DEFINE("_ESESS_FIELD_TITLE", "Titre");
DEFINE("_ESESS_FIELD_TITLE_DESC", "Entrez le titre de la manifestation.");
DEFINE("_ESESS_FIELD_INTRO", "Texte de pr&eacute;sentation");
DEFINE("_ESESS_FIELD_INTRO_DESC", "Une introduction d&eacute;crivant la manifestation.  Tr&egrave;s utile si elle n&#8217;est pas li&eacute;e &agrave; un &eacute;v&egrave;nement.");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE", "Date d&#8217;ouverture.");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE_DESC", "Date &agrave; laquelle la Manifestation commence.");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME", "Heure d&#8217;ouverture.");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME_DESC", "Heure &agrave; laquelle la Manifestation commence");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE", "Date de fermeture");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE_DESC", "Date &agrave; laquelle la Manifestation se termine.");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME", "Heure de fermeture");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME_DESC", "Heure &agrave; laquelle la Manifestation se termine.");
DEFINE("_ESESS_FIELD_STATUS", "Etat");
DEFINE("_ESESS_FIELD_STATUS_DESC", "Etat g&eacute;n&eacute;ral de la manifestation.<br />&#8217;Nouveau&#8217; est &#8217;non accessible&#8217;.<br />&#8217;Ouvert&#8217; autorise les inscriptions.<br />&#8217;Fern&eacute;&#8217;est bien s&ucirc;r d&eacute;sactiv&eacute;.<br />&#8217;Complet&#8217; il n&#8217;y a plus de place<br />&#8217;Annul&eacute;&#8217; n&#8217;aura pas lieu.");
DEFINE("_ESESS_FIELD_MAX", "Max # Inscriptions");
DEFINE("_ESESS_FIELD_MAX_DESC", "Le nombre maximum d&#8217;inscription pour la manifestation.<br />Une fois ce nombre atteint, l&#8217;&eacute;tat passe &agrave; &#8217;Complet&#8217;");
DEFINE("_ESESS_FIELD_AVAIL", "Disponibilit&eacute;");
DEFINE("_ESESS_FIELD_AVAIL_MAX", "Indique qui est autoris&eacute; à s&#8217;inscrire aux manifestations.<br />&#8217;GlobaL&#8217; applique les pr&eacute;f&eacute;rences de configuration");
DEFINE("_ESESS_FIELD_PUBLISH", "Publier");
DEFINE("_ESESS_FIELD_PUBLISH_DESC", "Indique si cette manifestation est publi&eacute;e.");
DEFINE("_ESESS_FIELD_SESSION_HOST", "Organisateur");
DEFINE("_ESESS_TAB_SESSION_REGISTRATION","Inscription");
DEFINE("_ESESS_FIELD_SESSION_HOST_DESC", "Choisissez un organisateur pour cette Manifestation.  Pour apparaitre dans la liste,  l\utilisateur doit appartenir au moins au groupe d&#8217;acc&egrave;s.");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE", "Date de d&eacute;but des inscriptions");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE_DESC", "Date &agrave; laquelle commencer l&#8217;enregistrement des inscriptions. Le lien n&#8217;est pas affich&eacute; avant cette date.");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME", "Heure de d&eacute;but des inscriptions");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE", "Date de fin des inscriptions");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE_DESC", "Date &agrave; laquelle arr&ecirc;ter l\'enregistrement des inscriptions. Le lien n\'est plus affich&eacute; apr&egrave;s cette date.");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME", "Heure de fin des inscriptions");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_TAB_SESSION_VENUE","Lieux");
DEFINE("_ESESS_FIELD_VENUE_LIST", "Lieux fr&eacute;quemment utili&eacute;s");
DEFINE("_ESESS_FIELD_VENUE_LIST_DESC", "S&eacute;lectionnez un lieu d&eacute;fini dans la table, ou entrez les informations sur le lieu dans le champ ci-dessous.");


// Back-End :: Venues
DEFINE("_ESESS_FORM_VLIST", "Lieux communs");
DEFINE("_ESESS_VLIST_NAME", "Nom du lieu");

// Admin :: Venues :: Edit
DEFINE("_ESESS_FORM_VENUE_ADD", "Ajouter un lieu");
DEFINE("_ESESS_FORM_VENUE_EDIT", "Modifier un lieu");
DEFINE("_ESESS_FIELD_VENUE_TITLE", "Nom");
DEFINE("_ESESS_FIELD_VENUE_TITLE_DESC", "Description");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS", "Adresse");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS_DESC", "Description");
DEFINE("_ESESS_FIELD_VENUE_CITY", "Ville");
DEFINE("_ESESS_FIELD_VENUE_CITY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_STATE", "D&eacute;partement");
DEFINE("_ESESS_FIELD_VENUE_STATE_DESC", "Nom du d&eacute;partement");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE", "Code Postal");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY", "Pays");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS", "Adresse Internet");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS_DESC", "Assurez-vous de commencer par &quot;http://&quot;");
DEFINE("_ESESS_JSERROR_VENUE_TITLE", "Vous devez indiquer le nom du lieu.");
DEFINE("_ESESS_JSERROR_VENUE_ADDRESS", "Vous devez indiquer l'adresse du lieu.");

// Back-End :: Registrations :: list
DEFINE("_ESESS_FORM_RLIST", "Inscriptions");
DEFINE("_ESESS_RLIST_NAME", "Nom");
DEFINE("_ESESS_RLIST_EMAIL", "Courriel");
DEFINE("_ESESS_RLIST_TITLE", "Titre");
DEFINE("_ESESS_RLIST_RDATE", "date d&#8217;inscription");
DEFINE("_ESESS_RLIST_STATUS", "Statut");
DEFINE("_ESESS_RLIST_NUM", "nb. de personnes");
DEFINE("_ESESS_RLIST_VIEWED", "Vue");
DEFINE("_ESESS_REGISTRATION_STATUS_REGISTERED", "Inscris");
DEFINE("_ESESS_REGISTRATION_STATUS_CANCELLED", "Annul&eacute;");
DEFINE("_ESESS_REGISTRATION_STATUS_CLOSED", "Termin&eacute;");
DEFINE("_ESESS_DELETE_REG_MSG", "S&eacute;clectionner une inscription à effacer");

// Back-End :: Registrations :: View
DEFINE("_ESESS_FORM_REG_VIEW", "Voir L&#8217;inscription");
DEFINE("_ESESS_FIELD_SESSION", "Manifestation");
DEFINE("_ESESS_FIELD_REGISTRATION_DATE", "Date d&#8217;inscription");
DEFINE("_ESESS_FIELD_CANCELLATION_DATE", "Date d&#8217;annulation");
DEFINE("_ESESS_FIELD_REGISTRATION_STATUS", "Statut");

// Back-End :: Registrations :: Export
DEFINE("_ESESS_FORM_EXPORT", "Exporter les inscriptions");
DEFINE("_ESESS_FIELD_METHOD", "Methode d&#8217;export");
DEFINE("_ESESS_FIELD_METHOD_CSV", "CSV");
DEFINE("_ESESS_FIELD_FILENAME", "Nom du fichier");
// Back-End :: Registrations :: Export -> Javascript Validation Errors
DEFINE("_ESESS_VAL_EXPORT_FILENAME", "Le nom de fichier ne peut pas être vide.");
DEFINE("_ESESS_EXPORT_MSG", "M&eacute;thode d&#8217;export inconnue");

// Back-End :: Configuration
DEFINE("_ESESS_FORM_CONFIG", "Configuration");
DEFINE("_ESESS_FORM_CONFIG_CONFIRM", "Configurer le courriel de Confirmation");
DEFINE("_ESESS_FORM_CONFIG_NOTIFY", "Configurer le courriel d&#8217;Avertissement");
DEFINE("_ESESS_FORM_CONFIG_CANCEL", "Configurer le courriel d&#8217;annulation");
DEFINE("_ESESS_ACTION_REGISTER", "Inscription");
DEFINE("_ESESS_ACTION_UPDATE", "Mettre à jour");
DEFINE("_ESESS_ACTION_CANCEL", "Annuler");
DEFINE("_ESESS_BUTTON_OPTIONS","Options");
DEFINE("_ESESS_BUTTON_OPTIONS_IMG","images/config.png");
DEFINE("_ESESS_BUTTON_THANK","Message de remerciement");
DEFINE("_ESESS_BUTTON_THANK_IMG","images/menu.png");
DEFINE("_ESESS_BUTTON_CONFIRM","Couriel de confirmation");
DEFINE("_ESESS_BUTTON_CONFIRM_IMG","images/messaging.png");
DEFINE("_ESESS_BUTTON_NOTIFY","Courriel d&#8217;avertissement");
DEFINE("_ESESS_BUTTON_NOTIFY_IMG","images/message_config.png");
DEFINE("_ESESS_BUTTON_CANCELLATION","courriel d&#8217;annulation");
DEFINE("_ESESS_BUTTON_CANCELLATION_IMG","images/inbox.png");

// Admin :: Config :: Options
DEFINE("_ESESS_FORM_CONFIG_OPTIONS", "Configurer les Options");
DEFINE("_ESESS_TAB_CONFIG_GENERAL","General");
DEFINE("_ESESS_TITLE_INTEGRATION", "Integration avec d&#8217;autres Composants");
DEFINE("_ESESS_FIELD_INTEGRATE", "Int&eacute;gration avec le composant 'JEvents'");
DEFINE("_ESESS_FIELD_INTEGRATE_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT", "Montrer le sujet de la manifestation");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY", "Montrer L&#8217;activit&eacute; de la manifestation");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_LOCATION", "Montrer le lieu de la manifestation");
DEFINE("_ESESS_FIELD_SHOW_LOCATION_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_CONTACT", "Montrer le contact de la manifestation");
DEFINE("_ESESS_FIELD_SHOW_CONTACT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_EXTRA", "Montrer d&#8217;autres informations sur la manifestation");
DEFINE("_ESESS_FIELD_SHOW_EXTRA_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_TIME", "Montrer L&#8217;heure de la manifestation");
DEFINE("_ESESS_FIELD_SHOW_TIME_DESC", "");
DEFINE("_ESESS_FIELD_CBINTEGRATED","Int&egrave;gre les comptes utilisateurs du composant &#8217;Community Builder&#8217;");
DEFINE("_ESESS_FIELD_CBINTEGRATED_DESC","Valeurs par d&eacute;faut pour chaque champ d&#8217;inscription &agrave; une Manifestation peut &ecirc;tre g&eacute;n&eacute;r&eacute; en utilisant les informations contenues dans le profil utilisateur du composant &#8217;Community Builder&#8217; (voir l&#8217;onglet &#8217;Champs&#8217;).");
DEFINE("_ESESS_FIELD_SHOWAVATAR", "Montrer l&#8217;avatar");
DEFINE("_ESESS_FIELD_SHOWAVATAR_DESC", "");
DEFINE("_ESESS_TITLE_REGISTRATIONCONTROL", "Contrôle des Inscriptions");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW", "Inscriptions autoris&eacute;es pour ");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW_DESC", "");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL", "Autoriser seulement 1 personne par inscription");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL_DESC", "");
DEFINE("_ESESS_FIELD_FULL_PROC", "Traitement complet autoris&eacute;");
DEFINE("_ESESS_FIELD_FULL_PROC_DESC", "");
DEFINE("_ESESS_FIELD_REG_CANCEL", "Autoriser les d&eacute;sinscriptions (annulations)");
DEFINE("_ESESS_FIELD_REG_CANCEL_DESC", "");
DEFINE("_ESESS_TITLE_DATETIME", "Formatage de la date et de l&#8217;heure");
DEFINE("_ESESS_FIELD_DATE_SHORT", "Format de la Date (court)");
DEFINE("_ESESS_FIELD_DATE_SHORT_DESC", "");
DEFINE("_ESESS_FIELD_DATE_LONG", "Format de la Date (long)");
DEFINE("_ESESS_FIELD_DATE_LONG_DESC", "");
DEFINE("_ESESS_FIELD_TIME", "Format de l&#8217;heure");
DEFINE("_ESESS_FIELD_TIME_DESC", "");
DEFINE("_ESESS_FIELD_TIME1", "24 Heures, commen&ccedil;ant par Z&eacute;ro");
DEFINE("_ESESS_FIELD_TIME2", "24 Heures, commen&ccedil;ant par un espace");
DEFINE("_ESESS_FIELD_TIME3", "12 Heures, commen&ccedil;ant par Z&eacute;ro");
DEFINE("_ESESS_FIELD_TIME4", "12 Heures, commen&ccedil;ant par un espace");
DEFINE("_ESESS_TITLE_FRONTENDCONTROL", "Controle de l&#8217;interface");
DEFINE("_ESESS_FIELD_LIST_START", "Commencer &agrave; afficher les Manifestations");
DEFINE("_ESESS_FIELD_LIST_START_DESC", "");
DEFINE("_ESESS_FIELD_LIST_STOP", "Arr&ecirc;ter d&#8217;afficher les Manifestations");
DEFINE("_ESESS_FIELD_LIST_STOP_DESC", "");
DEFINE("_ESESS_FIELD_LIST_CASE0","Imm&eacute;diatement");
DEFINE("_ESESS_FIELD_LIST_CASE1","Quand les Inscriptions commencent");
DEFINE("_ESESS_FIELD_LIST_CASE2","Quand les Inscriptions se terminent");
DEFINE("_ESESS_FIELD_LIST_CASE3","Quand la Manifestation commence");
DEFINE("_ESESS_FIELD_LIST_CASE4","Quand la Manifestation se termine");
DEFINE("_ESESS_FIELD_LIST_FULL", "Afficher les Manifestations qui sont compl&egrave;tes");
DEFINE("_ESESS_FIELD_LIST_FULL_DESC", "");
DEFINE("_ESESS_FIELD_LIST_EVERYONE", "Liste des Manifestations sans tenir compte de leur accessibilité");
DEFINE("_ESESS_FIELD_LIST_EVERYONE_DESC", "");
DEFINE("_ESESS_FIELD_USER_NUM", "Montrer le num&eacute;ro d&#8217;inscription");
DEFINE("_ESESS_FIELD_USER_NUM_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER", "Afficher le pied de page dans L&#8217;interface");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP", "Afficher le lien vers Google Maps");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED", "Afficher la liste des personnes &#8217;D&eacute;j&agrave; inscrites&#8217;");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED_DESC", "");
DEFINE("_ESESS_TAB_CONFIG_FIELDS","Champ");
// Back-End :: Configuration :: Options -> Javascript Validation Errors
DEFINE("_ESESS_VAL_SESS_TITLE", "Le titre ne peut pas être vide.");
DEFINE("_ESESS_VAL_REGISTRATION_UP_DATE", "La date de début des inscriptions ne peut pas être vide.");
DEFINE("_ESESS_VAL_REGISTRATION_DOWN_DATE", "La date de fin des inscriptions ne peut pas être vide.");
DEFINE("_ESESS_VAL_SESSION_UP_DATE", "La date de début de la manifestation ne peut pas être vide.");
DEFINE("_ESESS_VAL_SESS_MIN", "Le nombre min d\'inscriptions doit être >=0.");
DEFINE("_ESESS_VAL_SESS_MAXMIN", "Le nombre max d&#8217;inscriptions ne peut pas être inf&eacute;rieur au nombre min d&#8217;inscriptions");


// Admin :: Configuration :: Thank-You HTML
DEFINE("_ESESS_FORM_CONFIG_THANK", "Configurer Le Message de Remerciement");
DEFINE("_ESESS_FIELD_THANKYOU", "Texte de remerciement d&#8217;inscription");
DEFINE("_ESESS_FIELD_THANKYOU_DESC", "");
DEFINE("_ESESS_DEFAULT_THANKYOU", '<h1>Merci {fullname}!</h1><p>Vous avez ét&eacute; inscris à {title}<p /><p>En cas de besoin, nous vous contacterons &agrave; cette adresse: {email}</p><p>Vous pouvez consulter les détails de votre inscription <a href=\"{url}\">ici</a>.</p><p>{data}<br /></p>');

// Back-End :: Configuration :: Confirmation Email
DEFINE("_ESESS_FIELD_CONFIRM_SEND", "Envoyer un Email de Confirmation");
DEFINE("_ESESS_FIELD_CONFIRM_SEND_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL", "Adresse(s) Email de Confirmation");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT", "Sujet du courriel de Confirmation");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_MSG", "Texte du courriel de Confirmation");
DEFINE("_ESESS_FIELD_CONFIRM_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_CONFIRM_SUBJECT", "{title} {action}");
DEFINE("_ESESS_DEFAULT_CONFIRM_MESSAGE", "<p>Cher(e) {fullname}</p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Vous avez été inscrit à {title}!</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">En cas de besoin, nous vous contacterons à cette adresse: {email}</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Vous pouvez consulter les détails de votre inscription <a href=\"{url}\">ici</a></span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">{data}<br /></span></p>");
// Back-End :: Configuration :: Confirmation Email -> Replacement tag notes
DEFINE("_ESESS_REPLACE_TAGS", "<em>Balises d&#8217;insertion</em><br />\nCopiez et collez ces noms de champs. Ils seront remplac&eacute;s par leur valeur.<br />\n<b>Champ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Valeur</b>");
DEFINE("_ESESS_REPLACE_NAME", "Le nom complet de la personne");
DEFINE("_ESESS_REPLACE_EMAIL", "L&#8217;adresse Email de la personne");
DEFINE("_ESESS_REPLACE_URL", "L&#8217;URL d&#8217;infos de la manifestation");
DEFINE("_ESESS_REPLACE_TITLE", "Le titre de la manifestation");
DEFINE("_ESESS_REPLACE_ACTION", "L&#8217;action d&#8217;inscription (Register, Update, Cancel)");
DEFINE("_ESESS_REPLACE_DATA", "Table contenant les donn&eacute;es entr&eacute;es");


// Back-End :: Configuration :: Notification Email
DEFINE("_ESESS_FIELD_NOTIFY_SEND", "Envoyer un courriel d&#8217;avertissement");
DEFINE("_ESESS_FIELD_NOTIFY_SEND_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT", "Sujet du courriel d&#8217;avertissement");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_MSG", "Sujet du courriel d&#8217;avertissement");
DEFINE("_ESESS_FIELD_NOTIFY_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_NOTIFY_SUBJECT", "Nouveau {title} {action}"); 
DEFINE("_ESESS_DEFAULT_NOTIFY_MESSAGE", "<p>{fullname} {email} s&#8217;est inscrit à {title}</p><p>{data} </p>"); 


DEFINE("_ESESS_DEFAULT_CANCEL_TITLE", "Inscription annulée");
DEFINE("_ESESS_DEFAULT_CANCEL_TEXT", "{fullname}, votre inscription à {title} a été annulée<br />Cliquez <a href=\"{url}\">ici</a> pour retourner à la manifestation.");


// General -> Session Status
DEFINE("_ESESS_STATUS_NEW", "Nouveau");
DEFINE("_ESESS_STATUS_OPEN", "Ouvert");
DEFINE("_ESESS_STATUS_FULL", "Complet");
DEFINE("_ESESS_STATUS_CLOSED", "Ferm&eacute;");

// General -> Session Availability
DEFINE("_ESESS_AVAIL_EVERY", "Tout le monde");
DEFINE("_ESESS_AVAIL_REG", "Membres");
DEFINE("_ESESS_AVAIL_GUEST", "Visiteurs");
DEFINE("_ESESS_AVAIL_GLOBAL", "Global");
DEFINE("_ESESS_AVAIL_GLOBAL2", "Utiliser les param&egrave;tres par d&eacute;faut");

// General -> Custom Toolbar Icons
DEFINE("_ESESS_TOOLBAR_VIEW", "Voir");
DEFINE("_ESESS_TOOLBAR_EXPORT", "Exporter");
DEFINE("_ESESS_TOOLBAR_EXPORTALL", "Exporter Tout");
DEFINE("_ESESS_TOOLBAR_EMAIL", "Courriel");

// General -> File I/O errors
DEFINE("_ESESS_CONFIG_ERR", "Impossible de cr&eacute;er le fichier de configuration!");
DEFINE("_ESESS_CONFIG_ERR_OPEN", "Impossible d&#8217;ouvrir le fichier de configuration");
DEFINE("_ESESS_CONFIG_ERR_WRITE", "Impossible d&#8217;&eacute;crire le fichier de configuration");
DEFINE("_ESESS_CONFIG_SAVE", "Configuration sauvegard&eacute;e!");

// General -> Images used for sorting
DEFINE("_ESESS_ARROW_UP", "images/uparrow-1.png");
DEFINE("_ESESS_ARROW_DOWN", "images/downarrow-1.png");
DEFINE("_ESESS_ARROW_UNSET", "images/uparrow.png");

// General -> Javascript Validation
DEFINE("_ESESS_VAL_ERROR", "Erreurs de validation:");

// General -> Dynamic Fields
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD","Nouv. Champ");
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD_DESC","Cliquez pour cr&eacute;er un nouveau champ.");
DEFINE("_ESESS_DYNAMICFIELDS_LOADTABLEERROR","Une erreur est survenue en chargeant les champs d&#8217;inscription.");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDNAME","Nom du champ");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE","Type de champ");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDPARAMETERS","Entrez les param&egrave;tres");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXT","Texte");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXTAREA","Zone de texte");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_CHECKBOX","Bouton de choix");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_RADIO","Bouton Radio");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_SELECT","Liste de choix");
DEFINE("_ESESS_DYNAMICFIELDS_LAYOUT","Agencement");
DEFINE("_ESESS_DYNAMICFIELDS_SIZE","Taille");
DEFINE("_ESESS_DYNAMICFIELDS_ROWS","Lignes");
DEFINE("_ESESS_DYNAMICFIELDS_COLS","Colonnes"); // if it's too long, you can keep "Cols"
DEFINE("_ESESS_DYNAMICFIELDS_INPUTCONTROL","Controle de saisie");
DEFINE("_ESESS_DYNAMICFIELDS_REQUIRED","Obligatoire");
DEFINE("_ESESS_DYNAMICFIELDS_MAXLENGTH","Longueur Maximale");
DEFINE("_ESESS_DYNAMICFIELDS_USERINTERFACE","Interface utilisateur");
DEFINE("_ESESS_DYNAMICFIELDS_DEFAULT","Defaut");
DEFINE("_ESESS_DYNAMICFIELDS_CBDEFAULT","Champ Community Builder associe");
DEFINE("_ESESS_DYNAMICFIELDS_TOOLTIP","Aide");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONS","Options");
//DEFINE("_ESESS_DYNAMICFIELDS_OPTIONNAME","Nom d&#8217;Option"); DOES NOT WORK : ADD A FIELD CREATE A JS ERROR, as [']
// here is th good way:
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONNAME","Nom d\'Option");
DEFINE("_ESESS_DYNAMICFIELDS_ADDOPTION","Ajouter Option");
?>
