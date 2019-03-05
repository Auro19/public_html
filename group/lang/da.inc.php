<?php
// da.inc.php, danish Version
// by Andreas Ott <anott@scriptorium.dk>
// 2003-04-16 updated by Chris Bagge

$chars = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$name_month = array("", "jan", "feb", "mar", "apr", "maj", "jun", "jul", "aug", "sep", "okt", "nov", "dec");
$l_text31a = array("default", "15 min.", "30 min.", " 1 time", " 2 timer", " 4 timer", " 1 dag");
$l_text31b = array(0, 15, 30, 60, 120, 240, 1440);
$name_day = array("s&oslash;ndag", "mandag", "tirsdag", "onsdag", "torsdag", "fredag", "l&oslash;rdag");
$name_day2 = array("ma", "ti", "on", "to", "fr", "l&oslash;", "s&oslash;");
            

//Lang Data

$_lang[" already exists. "]  = " er allerede brugt som betegnelse. ";
$_lang[" days "]  = " dage siden ";
$_lang[" is changed."]  = " er blevet opdateret.";
$_lang[" is deleted."]  = " er blevet slettet.";
$_lang["(could be modified later)"]  = "(kan �ndres senere)";
$_lang["(keep old password: leave empty)"]  = "(tom for samme adgangskode)";
$_lang["0: last name, 1: short name, 2: login name"]  = "0: efternavn, 1: forkortelse, 2: loginnavn";
$_lang[":"]  = ":";
$_lang["<"]  = "<";
$_lang["<="]  = "<=";
$_lang["<h2>Profiles</h2>In this section you can create, modify or delete profiles:"]  = "<h4>profiler</h4>Her kan du oprette, redigere og slette profiler:";
$_lang["<li>If you encounter any errors during the installation, please look into the <a href=help/faq_install.html target=_blank>install faq</a>or visit the <a href=http://www.PHProjekt.com/forum.html target=_blank>Installation forum</a></i>"]  = "<li>hvis du har problemer med installationen, se <a href='help/faq_install.html' target=_blank>'installations-FAQ'</a>eller bes�g PHProjekts<a href='http://www.PHProjekt.com/forum.html' target=_blank>installationsforum</a></i>";
$_lang[">"]  = ">";
$_lang[">="]  = ">=";
$_lang["?"]  = "?";
$_lang["A file with this name already exists!"]  = "Der findes allerede en fil med samme navn.";
$_lang["accepted"]  = "godkendt";
$_lang["access"]  = "adgang";
$_lang["Access error for mailbox"]  = "fejl ved l�sning af postkasse";
$_lang["Accounts"]  = "konti";
$_lang["Action for duplicates"]  = "h�ndelse for dubletter";
$_lang["Activate"]  = "aktiv�r";
$_lang["Active"]  = "aktiv";
$_lang["added"]  = "tilf�jet";
$_lang["Additional address"]  = "supplerende adresse";
$_lang["Additional alert box"]  = "ekstra p�mindelses vindue";
$_lang["Additional number"]  = "supplerende nummer";
$_lang["additionally assign resources to events"]  = "tildel yderligere ressourcer til projekter";
$_lang["Address book  = 1, nein = 0"]  = "adressebog ja = 1, nej = 0";
$_lang["Adds -f as 5. parameter to mail(), see php manual"]  = "tilf�jer '-f' som 5. parameter i mail(), se php-manual";
$_lang["Aim"]  = "m�l";
$_lang["Alarm"]  = "p�mindelse/alarm";
$_lang["All"]  = "alle";
$_lang["All events are deleted"]  = "Alle aftaler er slettet.";
$_lang["all fields"]  = "alle felter";
$_lang["All Links are valid."]  = "Alle links er intakte.";
$_lang["All links in events to this project are deleted"]  = "Alle henvisninger fra kalenderen til dette projekt er slettet.";
$_lang["all modules"]  = "alle moduler";
$_lang["All profiles are deleted"]  = "Alle profiler er slettet.";
$_lang["All todo lists of the user are deleted"]  = "Alle opgavelister er slettet.";
$_lang["Alternative "]  = "mulighed ";
$_lang["Alternative list view"]  = "alternativ liste visning";
$_lang["An error ocurred while creating table: "]  = "fejl ved oprettelse af tabellen: ";
$_lang["and leave on server"]  = "hent post og lad en kopi ligge p� serveren";
$_lang["And put it below this element"]  = "og s�t det ind under dette element";
$_lang["Appears as a tipp while moving the mouse over the field: Additional comments to the field or explanation if a regular expression is applied"]  = "Hj�lpen vises, n�r musen k�res over feltet: yderligere kommentarer til feltet eller en forklaring p� et regul�rt udtryk.";
$_lang["Appears in the filter select box in the list view"]  = "Optr�der i filtervalgsboksen i listevisningen.";
$_lang["Apply import pattern"]  = "anvend importm�nster";
$_lang["approve"]  = "bekr�ft";
$_lang["Are you sure?"]  = "Er du sikker?";
$_lang["As parent object"]  = "samme som for mappe";
$_lang["ascending"]  = "Aufsteigend";
$_lang["Assign work time"]  = "tildel arbejdstid";
$_lang["Assigned"]  = "tildeldt";
$_lang["Assigning projects"]  = "Tildeling til flere projekter";
$_lang["Attachment"]  = "vedh�ftede filer";
$_lang["Authentication"]  = "autentifikation";
$_lang["Automatic assign to group:"]  = "automatisk tildeling til gruppe:";
$_lang["Automatic assign to user:"]  = "automatisk tildeling til bruger:";
$_lang["Automatic scaling"]  = "automatisk skalering";
$_lang["back"]  = "tilbage";
$_lang["bank account deleted"]  = "Bankkonti er slettet.";
$_lang["Basis data"]  = "Basis data";
$_lang["Begin"]  = "start";
$_lang["Begin > End"]  = "start > slut";
$_lang["Begin:"]  = "start:";
$_lang["Body"]  = "tekst";
$_lang["Bookmark"]  = "bogm�rke";
$_lang["Bookmarks"]  = "Ops�tning af bogm�rker/foretrukne";
$_lang["Bookmarks yes = 1, no = 0"]  = "foretrukne ja = 1, nej = 0";
$_lang["by"]  = "af";
$_lang["Calculated budget"]  = "beregnet budget";
$_lang["Calendar"]  = "kalender";
$_lang["Calendar user"]  = "Kalenderbenutzer";
$_lang["calendar week"]  = "kalender uge";
$_lang["cancel"]  = "tilbage";
$_lang["cannot end before the end of project"]  = "kan ikke slutte f�r afslutningen af projekt";
$_lang["cannot end before the start of project"]  = "kan ikke slutte f�r starten p&aring projekt";
$_lang["cannot start before the end of project"]  = "kan ikke begynde f�r afslutningen af projekt";
$_lang["cannot start before the start of project"]  = "kan ikke begynde f�r starten p� projekt";
$_lang["Categorization"]  = "Categorization";
$_lang["Category"]  = "kategori";
$_lang["Category deleted"]  = "Kategori slettet.";
$_lang["Change in the timecard"]  = "tidskortmodifikation";
$_lang["changed"]  = "�ndret";
$_lang["Chat Direction"]  = "chat-retning";
$_lang["Chat Entry"]  = "chat indl�g";
$_lang["Check"]  = "tjek";
$_lang["Check for duplicates during import"]  = "Kontroll�r for dubletter ved import";
$_lang["Check for mail"]  = "se efter ny email";
$_lang["Check the content of the previous field!"]  = "Kontroll�r indholdet af de forrige felt.";
$_lang["Checkbox"]  = "afkrydsningsboks";
$_lang["Choose group"]  = "v�lg gruppe";
$_lang["columns"]  = "kolonner";
$_lang["Comment"]  = "bem�rkning";
$_lang["Contact"]  = "kontaktperson";
$_lang["Contact Manager"]  = "Administration af kontaktinformation";
$_lang["Contacts"]  = "kontakter";
$_lang["contains"]  = "indeholder";
$_lang["Content for select Box"]  = "indhold for valgboks";
$_lang["Copy"]  = "kopier";
$_lang["Copy project branch"]  = "kopi af projektgrem";
$_lang["Create"]  = "opret ny";
$_lang["Create new element"]  = "opret nyt element";
$_lang["Create new event"]  = "Opret & slet aftale";
$_lang["create vcard"]  = "opret vcard";
$_lang["Created by"]  = "oprettet af";
$_lang["Crypt upload file with password"]  = "beskyt(krypter) fil med adgangskode";
$_lang["Currency symbol"]  = "valutasymbol";
$_lang["Current Open Polls"]  = "ikke afgivne stemmer";
$_lang["Daily"]  = "daglig";
$_lang["Date"]  = "dato";
$_lang["Day"]  = "dag";
$_lang["Days"]  = "dage";
$_lang["Deactivate"]  = "deaktiv�r";
$_lang["Deadline"]  = "aftale";
$_lang["Default access mode: private=0, group=1"]  = "standard adgangsmodus: privat=0, gruppe=1";
$_lang["default mode for forum tree: 1 - open, 0 - closed"]  = "standardvisning for tr�de i fora: 1 - �bne, 0 - lukkede";
$_lang["Default value"]  = "standardv�rdi";
$_lang["Delete"]  = "slet";
$_lang["Delete group and merge contents with group"]  = "Slet gruppe og l�g indhold til eksisterende gruppe.";
$_lang["Deletion of super admin root not possible"]  = "super/admin/root kan ikke slettes";
$_lang["Dependency"]  = "afh�ngighed";
$_lang["Describe your request"]  = "beskrivelse";
$_lang["Description"]  = "betegnelse";
$_lang["Directory"]  = "mappe";
$_lang["Discard duplicates"]  = "slet dubletter";
$_lang["Display"]  = "vis";
$_lang["Dispose as child"]  = "indordn under f�rste forekomst";
$_lang["does not contain"]  = "indeholder ikke";
$_lang["Does not exist"]  = "findes ikke";
$_lang["done"]  = "udf�";
$_lang["Due date"]  = "frist";
$_lang["Edit timeframe of a project branch"]  = "redig�r tidslinien for denne projektgren";
$_lang["Email Address"]  = "e-mailadresse";
$_lang["Email Address of the support"]  = "e-mail adresse for support";
$_lang["Enables mail notification on new elements"]  = "send en e-mail ved nye elementer";
$_lang["Encrypt passwords"]  = "krypt�r adgangsk";
$_lang["End"]  = "slut";
$_lang["End:"]  = "slut:";
$_lang["ended"]  = "afsluttet";
$_lang["ends with"]  = "ender med";
$_lang["Events"]  = "i aftaler";
$_lang["exact"]  = "pr�cis";
$_lang["export"]  = "eksporter";
$_lang["External contacts"]  = "eksterne kontakter";
$_lang["Field name in database"]  = "feltnavn i database";
$_lang["Field name in form"]  = "feltnavn i formen";
$_lang["Field separator"]  = "feltseparator";
$_lang["Fields to match"]  = "feltnavne, der skal matche";
$_lang["File"]  = "fil";
$_lang["File Downloads"]  = "download af filer";
$_lang["File management"]  = "Fil administration";
$_lang["Filenames will now be crypted ..."]  = "filnavne bliver nu krypteret";
$_lang["Files"]  = "filer";
$_lang["fill out in case of authentication via POP before SMTP"]  = "Udfyld dette, hvis der skal bruges autentifikation via POP inden SMTP";
$_lang["fill out in case of SMTP authentication"]  = "Udfyld for SMTP-autentificering";
$_lang["Filter element"]  = "filterelement";
$_lang["Finished"]  = "Det var det!";
$_lang["finished"]  = "f�rdig";
$_lang["First hour of the day:"]  = "start p� arbejdstid i kalender [kl]: ";
$_lang["First insert"]  = "f�rste element";
$_lang["First module view on startup"]  = "modul der vises ved opstart";
$_lang["for invalid links"]  = "for d�de links";
$_lang["Forum"]  = "Ops�tning af fora";
$_lang["Forum yes = 1, no = 0"]  = "forum ja = 1, nej = 0";
$_lang["Forward"]  = "videresend";
$_lang["Further events"]  = "Weitere Termine";
$_lang["Gantt"]  = "tidslinie";
$_lang["Generate a new password"]  = "Generer ny adgangskode:";
$_lang["go"]  = "send";
$_lang["Group created"]  = "Gruppe oprettet.";
$_lang["Group management"]  = "Ops�tning af grupper";
$_lang["Group members"]  = "gruppemedlemmer";
$_lang["Group name"]  = "gruppenavn";
$_lang["has been canceled"]  = "er blevet annulleret.";
$_lang["has been changed"]  = "er �ndret";
$_lang["has been created"]  = "er oprettet";
$_lang["has reassigned the following request"]  = "har tildelt foresp�rgslen p� ny.";
$_lang["Header groupviews"]  = "overskrifter for gruppevisninger";
$_lang["Help"]  = "hj�lp";
$_lang["Help Desk Manager / Trouble Ticket System"]  = "manager for supportforesp�rgsler";
$_lang["Highlight list records with mouseover"]  = "'mouseover'-effekt i lister";
$_lang["horizontal"]  = "vandret";
$_lang["Horz. Narrow"]  = "vandr. smal";
$_lang["Hostname"]  = "computernavn (hostname)";
$_lang["Hourly rate"]  = "timepris";
$_lang["Hours"]  = "timer";
$_lang["imcoming Mails"]  = "indkommende beskeder";
$_lang["Import"]  = "import�r";
$_lang["Import list"]  = "indl�s liste";
$_lang["Import pattern"]  = "import�r m�nster";
$_lang["in"]  = "i";
$_lang["in mails"]  = "i e-mails";
$_lang["In this section you can choose a new random generated password."]  = "In this section you can choose a new random generated password.";
$_lang["In this table you can find all forums listed"]  = "In this table you can find all forums listed";
$_lang["In this table you can find all threads listed"]  = "In this table you can find all threads listed";
$_lang["Inactive"]  = "inaktiv";
$_lang["Insert a valid Internet address! "]  = "Indtast en e-mailadresse. ";
$_lang["insert db field (only for contacts)"]  = "ins�t db felt (kun for kontakter)";
$_lang["internal"]  = "intern";
$_lang["is in field"]  = "er i felt";
$_lang["is taken out of all user profiles"]  = "er fjernet fra alle profiler.";
$_lang["is taken out of these votes where he/she has not yet participated"]  = "er fjernet fra de afstemninger, hvor vedkommende endnu ikke har stemt.";
$_lang["is taken to the bookmark list."]  = " er blevet tilf�jet dine foretrukne.";
$_lang["just one <b>Alternative</b> or"]  = "V�lg �t <b>alternativ</b> eller";
$_lang["Language"]  = "sprog";
$_lang["Last hour of the day:"]  = "slut p� arbejdstid i kalender [kl]:";
$_lang["Last status change"]  = "sidste �ndring";
$_lang["ldap name"]  = "LDAP navn";
$_lang["Leader"]  = "leder";
$_lang["Legend"]  = "symbol";
$_lang["List"]  = "liste";
$_lang["Location of the database"]  = "databasens placering";
$_lang["locked by"]  = "l�st af";
$_lang["Log history of records"]  = "Log history of records";
$_lang["logged in as"]  = "Angemeldet als";
$_lang["Login name"]  = "login navn";
$_lang["Mail"]  = "send email";
$_lang["Mail no = 0, only send = 1, send and receive = 2"]  = "email; ingen = 0, kan kun sende = 1, b�de sende og modtage = 2";
$_lang["Mail to the chief"]  = "mail til chefen";
$_lang["Max. file size"]  = "maks. filst�rrelse";
$_lang["max. minutes before the event"]  = "maks. minutter f�r aftalen";
$_lang["Me"]  = "mig selv";
$_lang["Member of following groups"]  = "medlem af f�lgende grupper";
$_lang["minutes"]  = "minutter";
$_lang["mobile // mobile phone"]  = "mobil nr";
$_lang["Modify"]  = "�ndern";
$_lang["Modify element"]  = "redig�r element";
$_lang["Module"]  = "modul";
$_lang["Module Designer"]  = "moduldesigner";
$_lang["Module element"]  = "modulelement";
$_lang["Move"]  = "flyt";
$_lang["multi lines"]  = "flere linier";
$_lang["multiple events"]  = "flere aftaler";
$_lang["Multiple select"]  = "flervalgsboks";
$_lang["My Statistic"]  = "min statistik";
$_lang["name"]  = "Titel";
$_lang["Name"]  = "navn";
$_lang["name and network path"]  = "tilf�j sti";
$_lang["Name of the database"]  = "databasens navn";
$_lang["Name of the existing database"]  = "den (eksistierende) databases navn";
$_lang["name of the local server to identify it while HELO procedure"]  = "navnet p� denne server til identifikation i HELO-proceduren";
$_lang["name of the rule"]  = "reglens navn";
$_lang["Name of userdefined field"]  = "navn p� brugerdefineret felt";
$_lang["Name or short form already exists"]  = "Navn eller forkortelse findes allerede.";
$_lang["New"]  = "ny";
$_lang["New contact"]  = "ny kontaktperson";
$_lang["New files"]  = "nye filer";
$_lang["New forum postings"]  = "nye indl�g i fora";
$_lang["New mail arrived"]  = "ny email modtaget";
$_lang["New notes"]  = "nye noter";
$_lang["New Password"]  = "ny adgangskode";
$_lang["New password"]  = "ny adgangskode";
$_lang["New Polls"]  = "nye afstemningsresultater";
$_lang["New profile"]  = "Neuer Verteiler";
$_lang["New Sub-Project"]  = "ny underprojekt";
$_lang["New todo"]  = "ny opgave";
$_lang["Newest messages at bottom"]  = "nyeste meddelelser i bunden";
$_lang["Newest messages on top"]  = "nyeste meddelelser i toppen";
$_lang["News"]  = "nyheder";
$_lang["Next"]  = "n�ste";
$_lang["No"]  = "nej";
$_lang["no = leave empty"]  = "nej = tomt felt";
$_lang["No access"]  = "ingen adgang";
$_lang["No Authentication"]  = "ingen autentificering";
$_lang["No events yet today"]  = "ingen opgaver/m�der i dag";
$_lang["No value"]  = "ikke bestemt";
$_lang["no vote: "]  = "ingen stemme: ";
$_lang["Normal user"]  = "almindelig bruger";
$_lang["Notes"]  = "noter";
$_lang["Notice of receipt"]  = "bekr�telse af modtagelsen";
$_lang["Notify all group members"]  = "Informer alle medlemmer af gruppen";
$_lang["Notify recipient"]  = "underret modtager";
$_lang["objects"]  = "objekter";
$_lang["of"]  = "af";
$_lang["offered"]  = "tilbudt";
$_lang["Old password"]  = "gammel adgangskode";
$_lang["Old Password"]  = "Indtast gammel adgangskode:";
$_lang["Once"]  = "�n gang";
$_lang["Only main projects"]  = "kun hovedprojekter";
$_lang["only read access to selection"]  = "only write access to selection";
$_lang["Only this project"]  = "kun  dette projekt";
$_lang["Option to release objects in all groups"]  = "mulighed for at frigive objekter i alle grupper";
$_lang["Options"]  = "indstillinger";
$_lang["or"]  = "eller";
$_lang["or profile"]  = "eller profiler";
$_lang["ordered"]  = "bestilt";
$_lang["Orphan files"]  = "Filer uden tilh�rsforhold";
$_lang["Parent object"]  = "stamobjekt";
$_lang["part of the word"]  = "del af ordet";
$_lang["Participants"]  = "personer";
$_lang["participants have voted in this poll"]  = "adspurgte har afgivet svar.";
$_lang["Participants:"]  = "deltagende personer:";
$_lang["Password"]  = "adgangskode";
$_lang["Password change"]  = "skift af adgangskode";
$_lang["Password for the access"]  = "adgangskode for databasen";
$_lang["password for this account"]  = "SMTP-adgangskode";
$_lang["password for this pop account"]  = "adgangskode for denne POP-konto";
$_lang["Passwords dont match!"]  = "Adgangskode passer ikke";
$_lang["Passwords will now be encrypted ..."]  = "adgangsk bliver nu krypteret";
$_lang["Path to sendfax"]  = "sti til sendfax";
$_lang["Person"]  = "Person";
$_lang["Persons"]  = "Person(er)";
$_lang["Phone"]  = "tlf";
$_lang["Please check start and end time! "]  = "Fejl i tidsangivelsen! ";
$_lang["Please check the date!"]  = "Kontroll�r datoen!";
$_lang["Please check the end time! "]  = "Kontroll�r slut tidspunkt! ";
$_lang["Please check the given time"]  = "Venligst kontroll�r tidsangivelsen.";
$_lang["Please check the start time! "]  = "Kontroll�r start tidspunkt! ";
$_lang["please check the status!"]  = "Kontroll�r statustal!";
$_lang["Please check your date and time format! "]  = "Kontroll�r talformatet! ";
$_lang["Please choose a project"]  = "Venligst v�lg et projekt.";
$_lang["Please choose a user"]  = "V�lg venligst bruger.";
$_lang["Please choose an element"]  = "V�lg et element.";
$_lang["Please choose an export file (*.csv)"]  = "Venligst v�lg en eksportfil (*.csv)";
$_lang["Please choose at least one person"]  = "v�lg mindst en person";
$_lang["Please choose at least one project"]  = "v�lg mindst et projekt";
$_lang["Please create the file directory"]  = "Venligst opret denne mappe.";
$_lang["Please enter a regular expression to check the input on this field"]  = "Indtast et regul�rt indtryk for at validere feltet.";
$_lang["Please fill in the fields below"]  = "F�rst skal du indtaste informationer om din databaseops�tning,<br>som vil blive testet.";
$_lang["Please fill in the following field"]  = "Venligst fyld f�lgende felt ud.";
$_lang["Please insert a name"]  = "Venligst indtast navn.";
$_lang["Please remark:<ul><li>A blank database must be available<li>Please ensure that the webserver is able to write the file config.inc.php"]  = "Bem�rk:<ul><li>en tom database skal v�re til stede<li>kontroll�r, at der kan skrives til konfigurationsfilen 'config.inc.php'<br> (skriverettigheder gives med 'chmod 777')";
$_lang["Please select a file"]  = "Du skal angive en fil.";
$_lang["Please select a file (*.csv)"]  = "V�lg venligst en fil (*.csv)";
$_lang["Please select a vcard (*.vcf)"]  = "V�lg venligst et vcard (*.vcf).";
$_lang["Please select at least one (valid) address."]  = "V�lg mindst �n korrekt adresse.";
$_lang["Please select at least one bookmark"]  = "V�lg mindst �n foretrukken.";
$_lang["Please select at least one name! "]  = "V�lg mindst �t navn. ";
$_lang["Please select!"]  = "V�lg venligst!";
$_lang["Please specify a description!"]  = "Indtast en betegnelse.";
$_lang["Please specify a description! "]  = "Indtast en betegnelse. ";
$_lang["Please specify the question for the poll! "]  = "Indtast et sp�rgsm�l. ";
$_lang["Poll created on the "]  = "afstemning er oprettet d. ";
$_lang["Poll Question: "]  = "afstemningssp�rgsm�l: ";
$_lang["posting (and all comments) with an ID"]  = "send indl�g (og kommentarer) med et ID";
$_lang["Predefined selection"]  = "foruddefineret valg";
$_lang["Predefined value for creation of a record. Could be used in combination with a hidden field as well"]  = "Foruddefineret v�rdi ved oprettelsen af et element. Kan ogs� bruges i kombination med et skjult felt.";
$_lang["Previous"]  = "foreg�ende";
$_lang["print"]  = "udskriv";
$_lang["Priority"]  = "prioritet";
$_lang["priority"]  = "Priorit�t";
$_lang["private"]  = "privat";
$_lang["Profiles"]  = "profiler";
$_lang["Profiles for contacts"]  = "profil for kontakter";
$_lang["progress"]  = "gennemf�rsel";
$_lang["Project"]  = "projekt";
$_lang["Project management yes = 1, no = 0"]  = "projektstyring ja = 1, nej = 0";
$_lang["Project Name"]  = "projektnavn";
$_lang["Project summary"]  = "projektresumee";
$_lang["Projects"]  = "Ops�tning af projekter";
$_lang["public"]  = "offentlig";
$_lang["Put the word AND between several phrases"]  = "s�t ordet AND mellem flere udtryk";
$_lang["Question:"]  = "sp�rgsm�l:";
$_lang["Re-Opened"]  = "fortsat";
$_lang["Read access"]  = "l�seadgang";
$_lang["real username for POP before SMTP"]  = "brugernavn for POP inden SMTP";
$_lang["real username for SMTP auth"]  = "brugernavn for SMTP-autentificering";
$_lang["Receive"]  = "hent";
$_lang["Received"]  = "modtaget";
$_lang["Receiver"]  = "modtager";
$_lang["Record import failed because of wrong field count"]  = "Indl�sningen er mislykkedes pga. forkert antal felter.";
$_lang["records"]  = "elementer";
$_lang["Regular Expression:"]  = "regul�re udtryk:";
$_lang["reject"]  = "reject";
$_lang["rejected"]  = "afvist";
$_lang["remark"]  = "bem�rkning";
$_lang["Remark"]  = "bem�rkning";
$_lang["Repeat"]  = "gentag adgangskode";
$_lang["Reply"]  = "svar";
$_lang["Results of Polls"]  = "resultatlist for alle stemmer";
$_lang["results of the vote: "]  = "afstemningsresultater: ";
$_lang["Retype new password"]  = "bekr�ft";
$_lang["Role"]  = "rolle";
$_lang["Role deleted, assignment to users for this role removed"]  = "rolle slettet, tildeling af denne rolle til brugere fjernet";
$_lang["Roles"]  = "Ops�tning af roller";
$_lang["rows"]  = "r�kker";
$_lang["RT Option: Customer Authentification"]  = "RT ops�tning: rettigheder for support";
$_lang["RT Option: Customer can set a due date"]  = "RT ops�tning: kunden kan s�tte en frist";
$_lang["Rules"]  = "regler";
$_lang["Save"]  = "gem";
$_lang["Save password"]  = "Gem adgangskode:";
$_lang["schedule invisible to others"]  = "andre m� ikke se min kalender";
$_lang["schedule readable to others"]  = "andre m� se min kalender";
$_lang["schedule visible but not readable"]  = "aftaler synlige, men ikke l�sbare";
$_lang["Search"]  = "s�g";
$_lang["Search area"]  = "Search area";
$_lang["Search term"]  = "Search term";
$_lang["Seems that You have a valid database connection!"]  = "Det er lykkedes at etablere forbindelse til databasen.";
$_lang["Select all"]  = "marker alt";
$_lang["Select by db query"]  = "v�lg databaseforesp�rgsel";
$_lang["Select the type of this form element"]  = "V�lg typen for dette formelement.";
$_lang["Self"]  = " egen ";
$_lang["Send"]  = " Senden";
$_lang["Send date"]  = "forsendelsesdato";
$_lang["Send single mails"]  = "send som enkelt beskeder";
$_lang["Sender"]  = "afsender";
$_lang["Sendmail mode: 0: use mail(); 1: use socket"]  = "sendmail-metode: 0: brug mail(); 1: brug socket";
$_lang["sent Mails"]  = "sendte beskeder";
$_lang["Set Links"]  = "Links";
$_lang["Settings"]  = "ops�tning";
$_lang["several answers possible"]  = "(flere valg muligt)";
$_lang["several to choose?"]  = "flere?";
$_lang["Short Form"]  = "forkortelse";
$_lang["Short form"]  = "forkortelse";
$_lang["Show bookings"]  = "vis reservationerne";
$_lang["Signature"]  = "underskrift";
$_lang["Single account query"]  = "Foresp�rgsel p� enkelt konto";
$_lang["single line"]  = "enkelt linie";
$_lang["Single Text line"]  = "enkel tekstlinie";
$_lang["SMTP auth (via socket only!)"]  = "SMTP autentificering (kun via socket!)";
$_lang["solve"]  = "svar";
$_lang["solved"]  = "besvaret";
$_lang["Some"]  = "andre";
$_lang["Span element over"]  = "Ford�l elementet over";
$_lang["Starts in"]  = "begynder om";
$_lang["starts with"]  = "begynder med";
$_lang["Statistics"]  = "projektstatistik";
$_lang["stopped"]  = "afbrudt";
$_lang["Sub-Project of"]  = "underprojekt af";
$_lang["Suggestion"]  = "forslag";
$_lang["Summary"]  = "oversigt";
$_lang["Table contacts (for external contacts) created"]  = "kontakttabel (for eksterne kontakter) oprettet";
$_lang["Table dateien (for file-handling) created"]  = "filtabel (til filstyring) oprettet";
$_lang["Table forum (for discssions etc.) created"]  = "forumtabel (for forum) oprettet";
$_lang["Table lesezeichen (for bookmarks) created"]  = "bogm�rketabel (for foretrukne) oprettet";
$_lang["Table logs (for user login/-out tracking) created"]  = "tabellen logs (for bruger login/-out registrering) oprettet";
$_lang["Table mail_account, mail_attach, mail_client und mail_rules (for the mail reader) created"]  = "tabellerne mail_account, mail_attach, mail_client und mail_rules (for email program) oprettet";
$_lang["Table notes (for notes) created"]  = "notestabel (for noter) oprettet";
$_lang["Table projekte (for project management) created"]  = "projektetabel (for projektstyring) oprettet";
$_lang["Table rts and rts_cat (for the help desk) created"]  = "tabellerne rts og rts_cat (for help desk) oprettet";
$_lang["Table termine (for events) created"]  = "aftaletabel (for gruppekalenderen) oprettet";
$_lang["Table timecard (for time sheet system) created"]  = "tidsreg-tabel (for tidsstyring) oprettet";
$_lang["Table timeproj (assigning work time to projects) created"]  = "tabellen timeproj (for time/sagstyring) oprettet";
$_lang["Table todo (for todo-lists) created"]  = "opgavetabel (for opgavelisten) oprettet";
$_lang["Table votum (for polls) created"]  = "afstemningstabel (for afstemninger) oprettet";
$_lang["Tables contacts_profiles und contacts_prof_rel created"]  = "tabellerne contacts_profiles og contacts_prof_rel oprettet";
$_lang["Textarea"]  = "tekstfelt";
$_lang["The bookmark is deleted"]  = "Foretrukne er slettet.";
$_lang["The category has been created"]  = " Kategori er blevet oprettet.";
$_lang["The category has been modified"]  = " Kategori er blevet opdateret.";
$_lang["The contact has been deleted"]  = "Kontaktpersonen er slettet.";
$_lang["the data set is now modified."]  = "Brugeren er blevet opdateret.";
$_lang["The duration of the project is incorrect."]  = "Projektets tidsrum er forkert.";
$_lang["the files"]  = "i filer";
$_lang["the forum"]  = "i fora";
$_lang["The group default has been created"]  = "gruppen 'default' oprettet";
$_lang["The list has been imported."]  = "Listen er blevet indl�st.";
$_lang["The list has been rejected."]  = "Listen er ikke blevet indl�st.";
$_lang["The new contact has been added"]  = "Den nye kontaktperson er blevet oprettet.";
$_lang["The new password must have 5 letters at least"]  = "Den nye adgangskode skal mindst v�re 5 tegn.";
$_lang["The profile has been deleted."]  = "Profilen er slettet.";
$_lang["The project has been modified"]  = "Projektet er blevet opdateret.";
$_lang["The project is deleted"]  = "Projektet er blevet slettet.";
$_lang["The project is now in the list"]  = "Projektet er blevet oprettet";
$_lang["the real address of the SMTP mail server, you have access to (maybe localhost)"]  = "SMTP-serverens adresse (m�ske localhost)";
$_lang["The role has been created"]  = "rolle er oprettet";
$_lang["The role has been modified"]  = "rolle er �ndret";
$_lang["The server needs the privilege to write to the directories"]  = "Serveren skal have skriverettigheder til mappen.";
$_lang["The server sent an error message."]  = "Serveren giver f�lgende fejlmeddelelse:";
$_lang["the user is now in the list."]  = "Den nye bruger er oprettet.";
$_lang["There is no open record with a begin time on this day!"]  = "Fejl i datoangivelsen! Venligst kontroll�r.";
$_lang["There were errors, please have a look at the messages above"]  = "Der var fejl, se fejlmeddelelserne oven for.";
$_lang["Theres an error in your time sheet: "]  = "Fejl i arbejdstidstabel. Venligst kontroll�r din tidsreg..";
$_lang["these fields have to be filled in."]  = "Disse felter skal udfyldes.";
$_lang["This address already exists with a different description"]  = "Den samme adresse eksisterer allerede under denne betegnelse.";
$_lang["This combination first name/family name already exists."]  = "Kombinationen fornavn/efternavn eksisterer allerede. ";
$_lang["This login name already exists! Please chosse another one."]  = "Dette login bruges allerede! V�lg venligst et andet";
$_lang["This name already exists"]  = "Dette navn findes allerede.";
$_lang["This short name already exists!"]  = "Denne forkortelse er allerede oprettet. Venligst v�lg en anden. ";
$_lang["Threads older than"]  = "indl�g i fora, oprettet for mere end ";
$_lang["threads older than x days are deleted."]  = "Bidrag til fora, der er mere end x dage gamle, er slettet.";
$_lang["Time limit for sessions"]  = "tidsbegr�nsning for sessioner";
$_lang["time-axis:"]  = "tidsakse:";
$_lang["Timecard"]  = "tidsreg.";
$_lang["Timezone"]  = "tidszone";
$_lang["Timezone difference [h] Server - user"]  = "tidszoneforskel [t] server - bruger";
$_lang["to"]  = "til";
$_lang["Todays Events"]  = "aftaler idag";
$_lang["Todo"]  = "opgaver";
$_lang["Todo lists"]  = "opgavelister";
$_lang["Todo-Lists yes = 1, no = 0"]  = "opgaveliste ja = 1, nej = 0";
$_lang["Tooltip"]  = "konteksthj�lp";
$_lang["Topics"]  = "Topics";
$_lang["Track user login/logout"]  = "log bruger-login/logout";
$_lang["Type of database system"]  = "databasetype";
$_lang["Unconfirmed Events"]  = "Unconfirmed Events";
$_lang["Undertake"]  = "foretag";
$_lang["undo"]  = "annull�r";
$_lang["Unlock file"]  = "nlock file";
$_lang["Until"]  = "til";
$_lang["URL to the homepage of the company"]  = "firmahjemmesidens URL";
$_lang["use LDAP"]  = "brug LDAP";
$_lang["Use only normal characters and numbers, no special characters,spaces etc."]  = "Brug kun bogstaver og tal, ingen specielle tegn, mellemrum osv.";
$_lang["Used for fixed amount of values (separate with the pipe: | ) or for the sql statement, see element type"]  = "Bruges for et fast antal v�rdier (afgr�nset ved \"pipe\"-tegnet: | ) eller for et SQL-foresp�rgsel, se elementtype.";
$_lang["User"]  = "bruger";
$_lang["user file deleted"]  = "Brugerdata er slettet.";
$_lang["User management"]  = "Ops�tning af brugerprofil";
$_lang["User w/Chief Rights"]  = "privilegeret bruger (chef)";
$_lang["Usergroup"]  = "Gruppe";
$_lang["Username"]  = "bruger";
$_lang["Username for the access"]  = "bruger for databaseadgang";
$_lang["Valid characters"]  = "gyldige tegn";
$_lang["Value appears in the alt tag of the blue button (mouse over) in the list view"]  = "V�rdien optr�der som konteksthj�lp for den bl� knap i listevisningen.";
$_lang["Version management"]  = "versionstyring";
$_lang["vertical"]  = "lodret";
$_lang["view"]  = "vis";
$_lang["View"]  = "vis";
$_lang["view mail list"]  = "se post liste";
$_lang["Visibility"]  = "synlighed";
$_lang["Visibility presetting when creating an event"]  = "Voreinstellung der Sichtbarkeit beim Anlegen eines Termins";
$_lang["Voting system"]  = "afstemningssystem";
$_lang["Voting system yes = 1, no = 0"]  = "afstemninger ja = 1, nej = 0";
$_lang["waiting"]  = "venter";
$_lang["Warning, violation of dependency"]  = "Advarsel! overtr�delse af afh�ngighed";
$_lang["with POP before SMTP"]  = "POP inden SMTP";
$_lang["Working"]  = "i gang";
$_lang["Write"]  = "send";
$_lang["Write access"]  = "skrive rettigheder";
$_lang["Wrong password"]  = "Forkert adgangskode.";
$_lang["Yes"]  = "ja";
$_lang["You are not allowed to overwrite this file since somebody else uploaded it"]  = "Du kan ikke overskrive filen, da den blev oprettet af en anden person";
$_lang["You didnt repeat the new password correctly"]  = "De to indtastede adgangsk er forskellige.";
$_lang["You have to fill in the following fields: family name, short name and password."]  = "Udfyld felterne efternavn, forkortelse og adgangskode.";
$_lang["You should give at least one answer! "]  = "Indtast mindst �n valgmulighed. ";
$_lang["Your call for votes is now active. "]  = "Dit sp�rgsm�l kommer nu til afstemmning. ";
$_lang["Your mail has been sent successfully"]  = "Din mail er blevet sendt.";
$_lang["Your new password has been stored"]  = "Din ny adgangskode er gemt.";
$_lang["Zip code"]  = "postnummer";
?>
