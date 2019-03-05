<?php
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
// German language file for Jambook
//
// Distributed under the terms of the GNU General Public License
// This software may be used without warrany provided and
// copyright statements are left intact.

// Edit December, 09th 2006 by b2m@gmx.de
// No html-entities in definitions with //ALERT

// Frontend language strings
DEFINE('_JX_ERROR', 'Ein Fehler ist aufgetreten');
DEFINE('_JX_NOSUBCATS', 'Keine Sub-Kategorien.');
DEFINE('_JX_CATEGORIES', 'Kategorien');
DEFINE('_JX_NOTFOUND', 'Seite nicht gefunden.');
DEFINE('_JX_HACKING_ATTEMPT', 'Hackversuch, beenden!');
DEFINE('_JX_POSTINGNOTALLOWED', 'Du hast keine Berechtigung um in das G&auml;stebuch zu schreiben.');
DEFINE('_JX_NOTOWNER', 'Du bist nicht der Eigent&uuml;mer dieses Eintrages' );
DEFINE('_JX_NOTLOGGEDIN', 'Du mu&szlig;t eingeloggt sein um Eintr&auml;ge bearbeiten zu k&ouml;nnen.');
DEFINE('_JX_NEWITEMPOSTED', 'Ein neuer Eintrag in das G&auml;stebuch wurde erstellt.');
DEFINE('_JX_NEWITEM_MSG', 'Ein neuer Eintrag in das G&auml;stebuch wurde erstellt.
Um den Eintrag zu best&auml;tigen, gehe zu:
<<SITEURL>>/administrator/index2.php?option=com_jambook&task=list

Autor: <<AUTHOR>>
Titel: <<TITLE>>
Spamscore: <<SPAMSCORE>>
Ver&ouml;ffentlicht: <<PUBLISHED>>
Eintrag:
<<ENTRY>>
');
DEFINE('_JX_YOUPOSTEDITEM', 'Danke f&uuml;r deinen Eintrag im G&auml;stebuch');
DEFINE('_JX_YOUPOSTEDITEM_MSG', 'Wir haben den G&auml;stebucheintrag mit dem Titel \'<<TITLE>>\' erhalten. Dieser wird am %s ver&ouml;ffentlicht, wenn er best&auml;tigt wird.

Besuche unsere Website: <<SITEURL>>');
DEFINE('_JX_ITEMSENT', 'Danke f&uuml;r deinen Eintrag in unserem G&auml;stebuch. Wir werden uns den Eintrag in K&uuml;rze ansehen.');
DEFINE('_JX_ITEMDELETED', 'G&auml;stebucheintrag wurde gel&ouml;scht.');
DEFINE('_JX_NO_RESULTS', 'Keine Ergebnisse');
DEFINE('_JX_NOTHING_FOUND', 'Keine passenden Ergebnisse zu deine Suchanfrage.');
DEFINE('_JX_ACCESS_DENIED', 'Keine Berechtigung. Bitte logge dich ein oder registriere dich.');
DEFINE('_JX_NOTACCESIBLE', 'Dieser G&auml;stebucheintrag ist nicht l&auml;nger verf&uuml;gbar.');
DEFINE('_JX_ITEM_NOT_FOUND', 'Der G&auml;stebucheintrag konnte nicht gefunden werden.');
DEFINE('_JX_ITEMID', 'ID');
DEFINE('_JX_DATE_POSTED', 'Eintrag am');
DEFINE('_JX_ITEM_TITLE', 'Titel');
DEFINE('_JX_GOTOSEARCH', 'G&auml;stebucheintr&auml;ge suchen');
DEFINE('_JX_POSTITEM', 'In das G&auml;stebuch eintragen');
DEFINE('_JX_SEARCH_RESULTS', 'Suchen');
DEFINE('_JX_SEARCH_DESCRIPTION', 'Die Suche brachte folgende Anzahl an Ergebnissen: ');
DEFINE('_JX_LIST_OWNITEMS', 'Eigene G&auml;stebucheintr&auml;ge auflisten');
DEFINE('_JX_LIST_DESCRIPTION', 'Hier sind die Eintr&auml;ge in unserem G&auml;stebuch');
DEFINE('_JX_LIST_ITEMS', 'G&auml;stebuch ansehen');
DEFINE('_JX_BACKTOSEARCH', '&laquo; zur&uuml;ck zur Suche');
DEFINE('_JX_THANKYOU_MESSAGE', 'Danke.');
DEFINE('_JX_PREVIEW_ITEM', 'Vorschau');
DEFINE('_JX_EDITTIMEPASSED', 'Seit dem Eintrag ist zuviel Zeit vergangen. Er kann nicht mehr bearbeitet werden.');
DEFINE('_JX_ENTER_COMMENT', 'Eintrag');
DEFINE('_JX_ENTER_EMAIL', 'Email-Adresse');
DEFINE('_JX_ENTER_URL', 'Homepage');
DEFINE('_JX_ENTERITEMINFO', 'In das G&auml;stebuch eintragen');
DEFINE('_JX_ENTER_TITLE', 'Titel');
DEFINE('_JX_USERNAME', 'Autor');
DEFINE('_JX_GUEST', 'Gast');
DEFINE('_JX_URL', 'Homepage');
DEFINE('_JX_EMAIL', 'Email');
DEFINE('_JX_TOOMANYPOSTSWITHINTIMEFRAME', 'Jemand mit der gleichen IP-Adresse hat sich erst vor kurzem in das G&auml;stebuch eingetragen. F&uuml;r einen weiteren Eintrag bitte kurze Zeit warten.');
DEFINE('_JX_DOUBLEPOSTNOTALLOWED', 'Ein &auml;hnlicher EIntrag existiert bereits in unserem G&auml;stebuch, der Euintrag wurde nicht gespeichert.');
DEFINE('_JX_NOSPAMALLOWED', 'Dieser Eintrag wurde als Spam behandelt und gel&ouml;scht. Bitte in unserem G&auml;stebuch nicht spammen.');
DEFINE('_JX_NOITEMS', 'Keine Eintr&auml;ge im G&auml;stebuch.');
DEFINE('_JX_NOCONTENT', 'Bitte etwas in das Inhaltsfeld eingeben.');//ALERT
DEFINE('_JX_SAVE_ITEM', 'Speichern');
DEFINE('_JX_CANCEL_ITEM', 'Abrechen');
DEFINE('_JX_DELETE_ITEM', 'L&ouml;schen');
DEFINE('_JX_NOTITLE', 'Bitte einen Titel eingeben.');//ALERT
DEFINE('_JX_EDIT_ITEM', 'Bearbeiten');
DEFINE('_JX_REALLYDELETE_QUESTION', 'Den G&auml;stebucheintrag wirklich l&ouml;schen?');
DEFINE('_JX_SAVEOREDIT', 'Speichern oder weiterbearbeiten?');
DEFINE('_JX_SHOWGUESTBOOK', 'G&auml;stebucheintr&auml;ge anzeigen');
DEFINE('_JX_HIDEEMAIL', 'Email f&uuml;r Besucher verstecken.');
DEFINE('_JX_HIDEURL', 'Homepage f&uuml;r Besucher verstecken.');
DEFINE('_JX_THANKYOU', 'Danke sch&ouml;n');
DEFINE('_JX_GOTOLIST', 'G&auml;stebuch ansehen');
DEFINE('_JX_NOSEARCHWORD', 'Bitte Suchwort eingeben.');//ALERT
DEFINE('_JX_NEW_SEARCH', 'G&auml;stebucheintr&auml;ge suchen');
DEFINE('_JX_SEARCH', 'Suchen');
DEFINE('_JX_CAPTCHA_IMAGE', 'Spamschutz');
DEFINE('_JX_CAPTCHA_IMAGE_DESC', 'Bitte die Zeichen aus dem unteren Bild eingeben.');
DEFINE('_JX_INCORRECT_CAPTCHA', 'Die eingegebenen Zeichen entsprechen nicht denen im Bild.');
DEFINE('_JX_DISPLAY_NR', 'Display #');
DEFINE('_JX_BACK', 'Back');
DEFINE('_JX_ENTRIES_IN_GUESTBOOK', 'Number of entries in guestbook:');
#DEFINE('', '');
#DEFINE('', '');

// Admin footer
DEFINE('_OJ_VERSION', 'Version');
DEFINE('_OJ_CREATED_BY', 'Diese Komponente wurde erstellt von');
DEFINE('_OJ_VISIT', 'Besuche');
DEFINE('_OJ_EXCITING_ADDONS', 'f&uuml;r weitere aufregende AddOns.');

// Admin strings
DEFINE('_JX_A_YES', 'ja');
DEFINE('_JX_A_NO', 'nein');
DEFINE('_JX_A_CONFIG_SAVED', 'Konfigurationsdatei gespeichert');
DEFINE('_JX_A_CONFIGURATION', 'JamBook Konfiguration');
DEFINE('_JX_A_INFORMATION', 'Information');
DEFINE('_JX_A_AREYOUSURE', 'Bist Du sicher ?');
DEFINE('_JX_A_SETTINGS', 'Einstellungen');
DEFINE('_JX_A_NO_EDITOR', 'Kein Editor');
DEFINE('_JX_A_DEFAULT_EDITOR', 'Standard Joomla! Editor');
DEFINE('_JX_A_ACCESS', 'Zugriffs-Level');
DEFINE('_JX_A_ACCESS_ALL', 'Public');
DEFINE('_JX_A_ACCESS_REGISTERED', 'Registered');
DEFINE('_JX_A_ACCESS_USER', 'Special');
DEFINE('_JX_A_ACCESS_NONE', 'None');
DEFINE('_JX_A_MAILFROMNAME', 'Absender-Name f&uuml;r automatische Emails');
DEFINE('_JX_A_MAILFROMADDRESS', 'Absender-Emailadresse f&uuml;r automatische Emails');
DEFINE('_JX_A_DELETEAFTERDAYS', 'Anzahl der Tage, ab der G&auml;stebucheintr&auml;ge automatisch in der Datenbank gel&ouml;scht werden (Vorsicht bitte! Eingabe von 0 entspricht niemals l&ouml;schen)');
DEFINE('_JX_A_ITEMSNEWFOR', 'Anzahl der Tage, w&auml;hrend der die G&auml;stebucheintr&auml;ge als neu gekennzeichnet werden.');
DEFINE('_JX_A_PUBLISHINGLIMIT', 'Anzahl der Tage in der G&auml;stebucheintr&auml;ge angezeigt werden (0 f&uuml;r unbegrenzten Zeitraum eingeben).');
DEFINE('_JX_A_SORTORDER', 'Sortier-Reihenfolge der Eintr&auml;ge');
DEFINE('_JX_A_POSTITEMS', 'Einschr&auml;nken, wer bei diesem Zugriffs-Level in das G&auml;stebuch schreiben darf.');
DEFINE('_JX_A_AUTOAPPROVEITEMS', 'G&auml;stebucheintr&auml;ge automatisch best&auml;tigen.');
DEFINE('_JX_A_SENDTHANKYOUEMAIL', 'Danke-Email nach dem Eintragen an den Autor verschicken.');
DEFINE('_JX_A_DATEFORMAT', 'Datumsformat, für Standard leer lassen (uses strftime() syntax)');
DEFINE('_JX_A_SELECTEDITOR', 'Den Standard-Html-Editor f&uuml;r Joomla! im Frontend benutzen?.');
DEFINE('_JX_A_INITIALIZE_HTML_EDITOR', 'WYSIWYG HTML Editor f&uuml;r unregistrierte Benutzer initialisieren?');
DEFINE('_JX_A_EDITORWIDTH', 'Breite des HTML-Editorfensters in Pixels');
DEFINE('_JX_A_EDITORHEIGHT', 'H&ouml;he des HTML-Editorfensters in Pixels');
DEFINE('_JX_A_SELECTTEMPLATE', 'Template ausw&auml;hlen');
DEFINE('_JX_A_TEMPLATE_SAVED', 'Template-Datei wurde gespeichert.');
DEFINE('_JX_A_LISTTEMPLATES', 'Templates des Template-Sets auflisten');
DEFINE('_JX_A_CANCEL_TMPL', 'Template wurde nicht gespeichert.');
DEFINE('_JX_A_EDITING_TEMPLATE', 'Template bearbeiten');
DEFINE('_JX_A_TEMPLATE_FILE', 'Template-Datei');
DEFINE('_JX_A_PATH', 'Pfad:');
DEFINE('_JX_A_WRITEABLE', 'beschreibbar');
DEFINE('_JX_A_UNWRITEABLE', 'nicht beschreibbar');
DEFINE('_JX_TITLEASC', 'Titel aufsteigend');
DEFINE('_JX_TITLEDESC', 'Titel absteigend');
DEFINE('_JX_ORDERINGASC', 'Reihenfolge aufsteigend');
DEFINE('_JX_ORDERINGDESC', 'Reihenfolge absteigend');
DEFINE('_JX_IDASC', 'Job ID aufsteigend');
DEFINE('_JX_IDDESC', 'Job ID absteigend');
DEFINE('_JX_A_CREATEDASC', 'Einstellungsdatum aufsteigend');
DEFINE('_JX_A_CREATEDDESC', 'Einstellungsdatum absteigend');
DEFINE('_JX_A_ITEMLIMIT', 'Anzahl der Eintr&auml;ge pro Seite');
DEFINE('_JX_A_DELETEDITEMS', '%s alte G&auml;stebucheintr&auml;ge in der Datenbank gel&ouml;scht.');
DEFINE('_JX_A_ERRORDELETEITEMS', 'Ein Fehler  beim L&ouml;schen von G&auml;stebucheintr&auml;gen in der Datenbank aufgetreteb, bitte den Administrator kontaktieren.');
DEFINE('_JX_A_ITEMID', 'ID');
DEFINE('_JX_A_TITLE', 'Title');
DEFINE('_JX_A_DELETE', 'Eintrag l&ouml;schen');
DEFINE('_JX_A_SELECTDELITEM', 'Eintrag auswählen zum Löschen.');//ALERT
DEFINE('_JX_A_SELECTITEM', 'Eintrag auswählen zum ');//ALERT
DEFINE('_JX_A_INFO', 'Info');
DEFINE('_JX_A_LISTITEMS', 'G&auml;stebucheintr&auml;ge');
DEFINE('_JX_A_DISPLAY', 'Anzeige #');
DEFINE('_JX_A_DATE_POSTED', 'Eintragsdatum');
DEFINE('_JX_A_PUBLISHED', 'ver&ouml;ffentlicht');
DEFINE('_JX_A_CHECKEDOUT', 'ausgechecked');
DEFINE('_JX_A_REORDER', 'umsortieren');
DEFINE('_JX_A_MOVEUP', 'auf');
DEFINE('_JX_A_MOVEDOWN', 'ab');
DEFINE('_JX_A_ADDING', 'Hinzuf&uuml;gen');
DEFINE('_JX_A_EDITING', 'Bearbeiten');
DEFINE('_JX_A_ITEM', 'G&auml;stebucheintrag');
DEFINE('_JX_A_NOTITLE', 'Bitte einen Titel eingeben');//ALERT
DEFINE('_JX_A_ITEM_DETAILS', 'Details');
DEFINE('_JX_A_ENTER_TITLE', 'Titel');
DEFINE('_JX_A_ENTER_CONTENT', 'Inhalt');
DEFINE('_JX_A_EXTRA_INFO', 'Details');
DEFINE('_JX_A_PUBLISHITEM', 'Eintrag ver&ouml;ffentlichen');
DEFINE('_JX_A_START_PUBLISHING', 'Ver&ouml;ffentlichung starten');
DEFINE('_JX_A_FINISH_PUBLISHING', 'Ver&ouml;ffentlichung beendenen');
DEFINE('_JX_A_COMMENTFORMONFIRSTPAGE', 'Nur Eintragsformular auf der ersten Seite anzeigen, mit Link zu den Eintr&auml;gen');
DEFINE('_JX_A_COMMENTFORMLINKEDTO', 'Nur Eintr&auml;ge auf der ersten Seite anzeigen, mit Link zum Eintragsformular');
DEFINE('_JX_A_COMMENTFORMABOVE', 'Eintragsformular &uuml;bder den Eintr&auml;gen anzeigen');
DEFINE('_JX_A_COMMENTFORMBELOW', 'Eintragsformular unter den Eintr&auml;gen anzeigen');
DEFINE('_JX_A_COMMENTFORMNONE', 'Eintragsformular nicht anzeigen');
DEFINE('_JX_A_DONTTREATSPAM', 'Spam nicht behandeln');
DEFINE('_JX_A_DELETESPAM', 'Alle als Spam markierte Eintr&auml;ge l&ouml;schen');
DEFINE('_JX_A_DONTPUBLISHSPAM', 'Alle als Spam markierte Eintr&auml;ge nicht automatisch ver&ouml;ffentlichen');
DEFINE('_JX_A_EMAILSPAMWARNING', 'Warnung &uuml;ber Eintr&auml;ge an Admin schicken');
DEFINE('_JX_A_ADMINEMAIL', 'Administrator-Emailadresse (leer f&uuml;r Superadmin-Email).');
DEFINE('_JX_A_ADMINNAME', 'In Emails verwendeter Administrator-Name.');
DEFINE('_JX_A_EMAILCOMMENTTOADMIN', 'Eine Email an den admin senden, wenn Eintr&auml;ge eingestellt wurden.');
DEFINE('_JX_A_COMMENTFORMPLACEMENT', 'Plazierung des Eintragsformulars auf dem G&auml;stebuch.');
DEFINE('_JX_A_CLOAKEMAILADDRESS', 'Eingegeben Emailadressen verschl&uuml;sseln.');
DEFINE('_JX_A_HOWTOTREATSPAM', 'Wie sollen als Spam markierte Eintr&auml;ge behandelt werden, entsprechend den folgenden Einstellungen.');
DEFINE('_JX_A_SPAM_URL', 'Behandle Eintr&auml;ge mit url tag/link als Spam.');
DEFINE('_JX_A_SPAM_IMAGE', 'Behandle Eintr&auml;ge mit image tag als Spam.');
DEFINE('_JX_A_SPAM_ONLYSMILEYS', 'Behandle Eintr&auml;ge nur mit Smiley als Spam.');
DEFINE('_JX_A_SPAM_DATAINUNUSEDFIELDS', 'Behandle Eintr&auml;ge mit Daten in nicht angezeigten Form-Feldern als Spam.');
DEFINE('_JX_A_SPAM_FORBIDDEN_WORDS', 'Behandle Eintr&auml;ge mit den folgenden verbotenen W&ouml;rtern als Spam (jedes Wort in einer neuen Zeile).');
DEFINE('_JX_A_POSTINGSETTINGS', 'Posting');
DEFINE('_JX_A_EMAILSETTINGS', 'Email');
DEFINE('_JX_A_SPAMSETTINGS', 'Spam');
DEFINE('_JX_A_FLOODPROTECTION', 'Floodprotection, Anzahl Sekunden die zwischen zwei Eintr&auml;gen von der selben IP-Adresse aus vergehen mu&szlig;.');
DEFINE('_JX_A_DISALLOWDOUBLEPOSTINGS', 'Double Posting von zwei Eintr&auml;gen mit dem selben Titel und Inhalt verbieten.');
DEFINE('_JX_A_ALLOWGUESTNAME', 'G&auml;sten die Eingabe eines Namens beim G&auml;stebucheintrag erlauben.');
DEFINE('_JX_A_SPAM_BANNEDIP', 'Bahandle EIntr&auml;ge der folgenden IP-Adressen als Spam (jede Adresse in einer neuen Zeile).');
DEFINE('_JX_A_INFORMATION_DESC', 'Bitte die Dokumentation lesen, dies gilt auch f&uuml;r die Liste mit zuk&uuml;nftigen Pl&auml;nen, den &Auml;nderungen und der Lizenz.');
DEFINE('_JX_A_CONFIGURATION_DESC', 'Konfigurationsoptionen der Komponente &auml;ndern: Ansichts-, Email-, Eingabe- und Spameinstellungen.');
DEFINE('_JX_A_TEMPLATEMANAGER', 'Template Manager');
DEFINE('_JX_A_TEMPLATEMANAGER_DESC', 'Templates f&uuml;r alle Seiten und Emails der Komponente bearbeiten.');
DEFINE('_JX_A_LISTITEMS_DESC', 'Alle Eintr&auml;ge auflisten, mit Optionen zum ver&ouml;ffentlichen, bearbeiten und schreiben von Eintr&auml;gen.');
DEFINE('_JX_A_USEREDITHOURS', 'Registrierte Benutzer k&ouml;nnen eigene Eintr&auml;ge f&uuml;r diese Anzahl Stunden bearbeiten.');
DEFINE('_JX_A_PREVIEWPAGE', 'Voransicht benutzen, bevor gespeichert wird.');
DEFINE('_JX_A_BACKTOCP_DESC', 'F&uuml;r die R&uuml;ckkehr zum Controlpanel auf das Komponeneten-Logo klicken.');
DEFINE('_JX_A_SPAM_SMILEYLIST', 'Pr&uuml;fliste f&uuml;r Smileys, getrennt durch Leerzeichen.');
DEFINE('_JX_A_SPAMSCORE', 'Spam Score');
DEFINE('_JX_A_SHOW_USERNAME', '\'Ja\' ausw&auml;hlen um den Benutzernamen anstatt des wirklichen Namen anzuzeigen.');
DEFINE('_JX_A_CONTENT', 'Eintrag');
DEFINE('_JX_A_FROMIP', 'Von IP');
DEFINE('_JX_A_AUTHOR', 'Autor');
DEFINE('_JX_A_ENTER_EMAIL', 'Email');
DEFINE('_JX_A_ENTER_URL', 'Homepage');
DEFINE('_JX_A_PUBLISHING', 'Ver&ouml;ffentlichen');
DEFINE('_JX_A_NOCONTENT', 'Bitte etwas Inhalt eingeben.');//ALERT
DEFINE('_JX_A_INVALIDEMAIL', 'Die eingegeben Email ist ungültig.');//ALERT
DEFINE('_JX_A_CLOSE', 'Fenster schliessen');
DEFINE('_JX_A_PRINT', 'Drucken');
DEFINE('_JX_A_PREVIEW', 'G&auml;stebucheintrag ansehen');
DEFINE('_JX_A_IMPORT_FINISHED', 'Import beendet');
DEFINE('_JX_A_IMPORT_FINISHED_DESCR', 'Du hast folgende <<NUMBER>> Eintr&auml;ge importiert');
DEFINE('_JX_A_SOURCE_AKOBOOK', 'AkoBook');
DEFINE('_JX_A_IMPORT_SOURCE', 'Importquelle ausw&auml;hlen');
DEFINE('_JX_A_IMPORT_SOURCE_DESCR', 'Importquelle f&uuml;r G&auml;stebucheintr&auml;ge ausw&auml;hlen:');
DEFINE('_JX_A_IMPORT_SELECTED', 'Importiere ausgew&auml;hlte Quelle');
DEFINE('_JX_A_IMPORT_ENTRIES', 'Importiere Eintr&auml;ge');
DEFINE('_JX_A_IMPORT_ENTRIES_DESC', 'Importiere G&auml;stebucheintr&auml;ge aus externen Quellen.');
DEFINE('_JX_A_IMPORTSETTINGS', 'Importiere');
DEFINE('_JX_A_IMPORT_PUBLISHITEMS', 'Importierte Eintr&auml;ge ver&ouml;ffentlichen?');
DEFINE('_JX_A_IMPORT_MAXURLLEN', 'Maximale L&auml;nge von Linktexten. Falls der Linktext l&auml;nger ist, wird er gek&uuml;rzt ');
DEFINE('_JX_A_IMPORT_REMOVEBBCODE', 'Konvertierung von BBCode in Eintr&auml;gen zu Html bevor diese in der Jambook-Datenbank gespeichert werden.');
DEFINE('_JX_A_USE_CAPTCHA', 'CAPTCHA-Bild benutzen');
DEFINE('_JX_A_DONATION_DESC', 'Um die weitere Entwicklung an dieser freien Komponente zu unterst&uuml;tzen, bitte &uuml;berlegen dem Autor &uuml;ber die Schaltfl&auml;che weiter unten etwas zu spenden.');
DEFINE('_JX_A_DONATION_HEADING', 'Jambook unterst&uuml;tzen');
DEFINE('_JX_A_CREDITS', 'Credits');
DEFINE('_JX_A_CAPTCHACLASS', 'CAPTCHA class');
DEFINE('_JX_A_CAPTCHAFONT', 'CAPTCHA Font (Dustismo)');
DEFINE('_JX_A_SUPPORT', 'Jambook Hilfe');
DEFINE('_JX_A_HOMEPAGE', 'Homepage');
DEFINE('_JX_A_SUPPORTFORUM', 'Support Forum');
DEFINE('_JX_A_BUGTRACKER', 'Bug Tracker');
DEFINE('_JX_A_LINK', 'LINK');
DEFINE('_JX_A_JAMBOOKINFO', 'Jambook Info');
DEFINE('_JX_A_LATESTVERSION', 'Letzte Version');
DEFINE('_JX_A_VERSION', 'Installierte version');
DEFINE('_JX_A_LICENSE', 'Lizenz');
DEFINE('_JX_A_COPYRIGHT', 'Copyright');
DEFINE('_JX_A_DELETEAFTERDAYS_NAME', 'Tage aufbewahren');
DEFINE('_JX_A_ITEMSNEWFOR_NAME', 'Tage als neu');
DEFINE('_JX_A_PUBLISHINGLIMIT_NAME', 'Max. Tage als ver&ouml;ffentlicht');
DEFINE('_JX_A_SORTORDER_NAME', 'Sortierreihenfolge');
DEFINE('_JX_A_ITEMLIMIT_NAME', 'Eintr&auml;ge je Seite');
DEFINE('_JX_A_DATEFORMAT_NAME', 'Datumsformat');
DEFINE('_JX_A_SHOW_USERNAME_NAME', 'Benutzername anzeigen');
DEFINE('_JX_A_SELECTTEMPLATE_NAME', 'Template ausw&auml;hlen');
DEFINE('_JX_A_CLOAKEMAILADDRESS_NAME', 'Email verschl&uuml;sseln');
DEFINE('_JX_A_COMMENTFORMPLACEMENT_NAME', 'Platzierung des Eintragsformulars');
DEFINE('_JX_A_PREVIEWPAGE_NAME', 'Voransicht verwenden');
DEFINE('_JX_A_ALLOWGUESTNAME_NAME', 'G&auml;stename erlauben');
DEFINE('_JX_A_POSTITEMS_NAME', 'Eintragseinschr&auml;nkungen');
DEFINE('_JX_A_AUTOAPPROVEITEMS_NAME', 'Autmatisch pr&uuml;fen');
DEFINE('_JX_A_USEREDITHOURS_NAME', 'Bearbeitungszeitraum in Stunden');
DEFINE('_JX_A_FLOODPROTECTION_NAME', 'FloodProtection');
DEFINE('_JX_A_DISALLOWDOUBLEPOSTINGS_NAME', 'Keine Double Postings');
DEFINE('_JX_A_SELECTEDITOR_NAME', 'Wysiwyg Editor');
DEFINE('_JX_A_INITIALIZE_HTML_EDITOR_NAME', 'Editor initialisieren');
DEFINE('_JX_A_EDITORWIDTH_NAME', 'Editor-Breite');
DEFINE('_JX_A_EDITORHEIGHT_NAME', 'Editor-H&ouml;he');
DEFINE('_JX_A_MAILFROMADDRESS_NAME', 'Mail-Von Adresse');
DEFINE('_JX_A_MAILFROMNAME_NAME', 'Mail-Von Name');
DEFINE('_JX_A_ADMINEMAIL_NAME', 'Admin Email Adresse');
DEFINE('_JX_A_ADMINNAME_NAME', 'Admin Email Name');
DEFINE('_JX_A_SENDTHANKYOUEMAIL_NAME', 'Danke-Email versenden');
DEFINE('_JX_A_EMAILCOMMENTTOADMIN_NAME', 'Admin benachrichtigen');
DEFINE('_JX_A_USE_CAPTCHA_NAME', 'CAPTCHA benutzen');
DEFINE('_JX_A_HOWTOTREATSPAM_NAME', 'Spam-Behandlung');
DEFINE('_JX_A_SPAM_URL_NAME', 'URL = Spam');
DEFINE('_JX_A_SPAM_IMAGE_NAME', 'Image = Spam');
DEFINE('_JX_A_SPAM_ONLYSMILEYS_NAME', 'Nur Smileys');
DEFINE('_JX_A_SPAM_DATAINUNUSEDFIELDS_NAME', 'Extra Felder');
DEFINE('_JX_A_SPAM_FORBIDDEN_WORDS_NAME', 'Verbotene W&ouml;rter');
DEFINE('_JX_A_SPAM_BANNEDIP_NAME', 'Geblockte IP');
DEFINE('_JX_A_SPAM_SMILEYLIST_NAME', 'Smiley Liste');
DEFINE('_JX_A_IMPORT_PUBLISHITEMS_NAME', 'Eintr&auml;ge ver&ouml;ffentlichen');
DEFINE('_JX_A_IMPORT_MAXURLLEN_NAME', 'Max URL-L&auml;nge');
DEFINE('_JX_A_IMPORT_REMOVEBBCODE_NAME', 'BBCode konvertieren');
DEFINE('_JX_A_AUTHOR_ALIAS', 'Autor Alias');
DEFINE('_JX_A_HIDE_EMAIL',  'Email Adresse verstecken');
DEFINE('_JX_A_HIDE_URL', 'Homepage verstecken');
DEFINE('_JX_A_TRANSLATORS', '&Uuml;bersetzer');
DEFINE('_JX_A_STRIPHTML', 'Soll der HTML-Code beibehalten, komplett entfernt, oder nur die unten gelisteten Tags entfernt werden?');
DEFINE('_JX_A_STRIPHTML_NAME', 'HTML im Beitrag entfernen?');
DEFINE('_JX_A_ALLOWEDHTML', 'Wenn bei \'HTML im Beitrag entfernen\' ausgew&auml;lt wurde \'Nicht erlaubte HTML Tags entfernen\', dann werden nur diese Tags im Beitrag beibehalten. (Trenne die einzelnen Tags mit Komma)');
DEFINE('_JX_A_ALLOWEDHTML_NAME', 'Erlaubte HTML Tags');
DEFINE('_JX_A_KEEPHTML', 'HTML komplett beibehalten');
DEFINE('_JX_A_REMOVENOTINLIST', 'Nicht erlaubte HTML Tags entfernen');
DEFINE('_JX_A_REMOVEALLHTML', 'HTML komplett entfernen');
DEFINE('_JX_A_SOURCE_EASYBOOK', 'Easybook');
DEFINE('_JX_A_CAPTCHA_NOT_AVAILABLE', 'You don\'t have the prerequisites to use CAPTCHA. It will automatically be turned off. Please see the documentation for more information.');

// Module strings

// Error messages
DEFINE('_JX_ERR_YOURCONFIG', 'Deine Konfigurationsdatei ist');
DEFINE('_JX_ERR_CHMODFILE', 'Du mu&szlig;t die Rechte auf 766 setzen, um die Einstellungen zu speichern.');
DEFINE('_JX_ERR_WARNING', 'Warnung...');
DEFINE('_JX_ERR_NOT_WRITEABLE', 'FATALER FEHLER: Konfigurationsdatei nicht beschreibbar');
DEFINE('_JX_ERR_OPEN_FILE', 'FATALER FEHLER: Datei konnte nicht ge&ouml;ffnet werden.');
DEFINE('_JX_ERR_NOTITLE', 'Titel fehlt');
DEFINE('_JX_ERR_NOCONTENT', 'Inhalt erforderlich.');
DEFINE('_JX_ERR_CHECKED_OUT1', 'Der Eintrag');
DEFINE('_JX_ERR_CHECKED_OUT2', 'wird gerade von einem anderen Administrator bearbeitet.');
DEFINE('_JX_ERR_TMPL_NOT_WRITEABLE', 'FATALER FEHLER: Template nicht beschreibbar');
DEFINE('_JX_ERR_FILE_UPLOAD', 'Upload Importdatei-Fehler.');
DEFINE('_JX_ERR_NO_FILE', 'Keine Datei gew&auml;hlt.');
DEFINE('_JX_ERR_SETTEMPLATE', 'Kann Template nicht setzen.');
DEFINE('_JX_ERR_READTEMPLATE', 'Kann Template nicht lesen.');
DEFINE('_JX_ERR_EMAILINVALID', 'Die eingegebene Email ist anscheinend nicht gültig.');//ALERT
DEFINE('_JX_ERR_INVALID_SOURCE', 'Die ausgew&auml;hlte Quelle ist ung&uuml;ltig!');
DEFINE('_JX_ERR_IMPORT_LIST', 'Folgende Eintr&auml;ge konten nicht eingef&uuml;gt werden:');
DEFINE('_JX_ERR_INCORRECT_CAPTCHA', 'Der eingegebene Text entspricht nicht dem Bild.'); //ALERT
DEFINE('_JX_ERR_NOT_FOUND', 'N/A');
DEFINE('_JX_ERR_SPOOF_CHECK_INVALID', 'You must use the form to post entries.');
DEFINE('_JX_ERR_URLINVALID', 'The URL you entered seems to be invalid.');

#DEFINE('', '');

?>
