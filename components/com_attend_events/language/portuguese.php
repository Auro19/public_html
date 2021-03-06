<?php
/**
* @version $Id: portuguese.php 17 2006-11-04 03:41:21Z pcarr $
* @package Joomla_1.0.x
* @subpackage Attend Events
* @copyright (C) 2005 Peter Rom�o
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Check
DEFINE("_ESESS_LANG_INCLUDED", 1);

// Front-End :: Title
DEFINE("_ESESS_COMPONENT_TITLE", "Attend Events");

// Front-End :: List
DEFINE("_ESESS_NAME", "Nome");
DEFINE("_ESESS_SESSION_UP", "Data da Sess�o");
DEFINE("_ESESS_REGISTRATION_DOWN", "Prazo para Registos");
DEFINE("_ESESS_NUM_LEFT", "# Por Registar");
DEFINE("_ESESS_NUM_AVAIL", "# Dispon�veis");
DEFINE("_ESESS_AVAIL_STATUS", "Estado");
DEFINE("_ESESS_AVAIL_STATUS_AVAIL", "Dispon�veis");
DEFINE("_ESESS_AVAIL_STATUS_FULL", "Completo");

// Front-End :: View
DEFINE("_ESESS_REG_HOSTED_BY", "Anfitri�o do Evento");
DEFINE("_ESESS_REG_DATETIME", "Data &amp; Hora");
DEFINE("_ESESS_REG_LOCATION", "Local");
DEFINE("_ESESS_REG_MAPTEXT", "Como chegar l�?");
DEFINE("_ESESS_REG_AVAIL", "Registos Dispon�veis");
DEFINE("_ESESS_REG_CLOSE", "Prazo para Registos");
DEFINE("_ESESS_UNLIMITED", "Sem Limite");
DEFINE("_ESESS_OUT_OF", "fora de");
DEFINE("_ESESS_FIELD_COMMENTS", "Coment�rios");
DEFINE("_ESESS_FIELD_COMMENTS_DESC", "");
DEFINE("_ESESS_ERROR_ONLY_REGISTERED", "S� utilizadores registados podem registar-se para esta sess�o.");
DEFINE("_ESESS_ERROR_ONLY_GUESTS", "S� visitantes podem registar-se para esta sess�o.");
DEFINE("_ESESS_ERROR_FULL", "Esta sess�o est� completa.");
DEFINE("_ESESS_REG_LIST", "Pessoas j� registadas");

// Front End :: View -> Registration Form
DEFINE("_ESESS_FIELD_FULLNAME", "Nome Completo");
DEFINE("_ESESS_FIELD_FULLNAME_DESC", "Introduz o teu Nome Completo para efeitos de contacto, por favor.");
DEFINE("_ESESS_FIELD_EMAIL", "E-mail");
DEFINE("_ESESS_FIELD_EMAIL_DESC", "Introduz aqui o teu endere�o de e-mail para contacto, por favor.");
DEFINE("_ESESS_FIELD_NUM_PEOPLE", "N�mero de pessoas");
DEFINE("_ESESS_FIELD_NUM_PEOPLE_DESC", "Quantas pessoas gostarias de registar?");
DEFINE("_ESESS_BUTTON_REGISTER", "Registar");
DEFINE("_ESESS_BUTTON_RESET", "Reset");
DEFINE("_ESESS_BUTTON_UPDATE", "Actualizar Registo");
DEFINE("_ESESS_BUTTON_CANCEL", "Cancelar Registo");
DEFINE("_ESESS_VAL_REG_ALERT", "Aspectos de Valida��o de Registo:");
DEFINE("_ESESS_VAL_REG_FULLNAME", "Dever�s fornecer o teu Nome Completo.");
DEFINE("_ESESS_VAL_REG_EMAIL", "Dever�s fornecer o teu endere�o de e-mail.");
DEFINE("_ESESS_VAL_REG_NUMBER", "N�mero de pessoas n�o representa um n�mero v�lido entre 1 e ");

// Back-End -> General
DEFINE("_ESESS_REQUIRED", "<span style=\"color: red;\">*</span>");
DEFINE("_ESESS_STYLE_TITLE", "style=\"background-color: #E0E0E0; font-weight: bold; border-bottom: 1px solid #B0B0B\"");

// Back-End -> Menus
DEFINE("_ESESS_MENU_SESSIONS", "Sess�es");
DEFINE("_ESESS_MENU_VENUES", "Locais");
DEFINE("_ESESS_MENU_REGISTRATIONS", "Registos");
DEFINE("_ESESS_MENU_CONFIGURATION", "Configura��o");

// Back-End :: Sessions :: List
DEFINE("_ESESS_FORM_SLIST", "Gestor da Sess�o");
DEFINE("_ESESS_SLIST_NAME", "Nome");
DEFINE("_ESESS_SLIST_SESSION_UP", "In�cio Sess�o na Data");
DEFINE("_ESESS_SLIST_SESSION_DOWN", "Final Sess�o na Data");
DEFINE("_ESESS_SLIST_REGISTRATION_UP", "Registos iniciam na Data");
DEFINE("_ESESS_SLIST_REGISTRATION_DOWN", "Registos Fecham na Data");
DEFINE("_ESESS_SLIST_NUM_REGISTRATIONS", "Registos");
DEFINE("_ESESS_SLIST_STATUS", "Estado");
DEFINE("_ESESS_SLIST_AVAIL", "Disponibilidade");
DEFINE("_ESESS_SLIST_PUB", "Publicado");
// Back-End :: Sessions :: List -> Filters
DEFINE("_ESESS_SFILTER_CHOOSE", "Escolhe um filtro");
DEFINE("_ESESS_SFILTER_NONE", "Sem Filtros");
DEFINE("_ESESS_SFILTER_STATUS", "- Filtros de Estado");
DEFINE("_ESESS_SFILTER_AVAIL", "- Filtros de Disponibilidade");
DEFINE("_ESESS_SFILTER_EVENT", "- Filtros de Eventos");
DEFINE("_ESESS_RFILTER_CHOOSE", "Escolhe uma Sess�o");
DEFINE("_ESESS_RFILTER_ALL", "- Todas as Sess�es");
// Back-End :: Sessions :: List -> Javascript Validation Errors
DEFINE("_ESESS_PUBLISH_MSG", "Escolhe uma sess�o para ");
DEFINE("_ESESS_DELETE_SESSION_MSG", "Escolhe uma Sess�o para apagar");


// Back-End :: Sessions :: Edit
DEFINE("_ESESS_FORM_SESS_ADD", "Adiciona Sess�o");
DEFINE("_ESESS_FORM_SESS_EDIT", "Edita Sess�o");
DEFINE("_ESESS_TITLE_DESCRIPTION", "Detalhes da Sess�o");
DEFINE("_ESESS_TITLE_SESSION_GENERAL","Geral");
DEFINE("_ESESS_TITLE_SESSION_DATETIME","Data e Hora");
DEFINE("_ESESS_FIELD_EVENT", "Evento");
DEFINE("_ESESS_FIELD_EVENT_DESC", "Escolhe um evento existente para criar uma sess�o.");
DEFINE("_ESESS_NO_EVENT", "Nenhum Evento");
DEFINE("_ESESS_FIELD_TITLE", "T�tulo");
DEFINE("_ESESS_FIELD_TITLE_DESC", "Introduz um T�tulo para a Sess�o.");
DEFINE("_ESESS_FIELD_INTRO", "Descri��o");
DEFINE("_ESESS_FIELD_INTRO_DESC", "Algum texto introdut�rio explicando algo sobre esta sess�o.  �til quando n�o ligado a nenhum evento.");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE", "Data de In�cio da Sess�o");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE_DESC", "Dia em que a sess�o se inicia.");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME", "Hora de In�cio da Sess�o");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE", "Data de Fim da Sess�o");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE_DESC", "Dia em que a sess�o se fecha.");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME", "Hora de Fim da Sess�o");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_FIELD_STATUS", "Estado");
DEFINE("_ESESS_FIELD_STATUS_DESC", "Estado Global da Sess�o:<br />Nova n�o est� access�vel<br />Aberta permite registos<br />Fechada n�o permite registos<br />Completa atingiu o m�ximo de registos poss�vel");
DEFINE("_ESESS_FIELD_MAX", "Nr. M�ximo de Registos");
DEFINE("_ESESS_FIELD_MAX_DESC", "N�mero m�ximo de registos permitidos para a sess�o.<br />Assim que este n�mero seja atingido o estado da sess�o � mudado para Completa");
DEFINE("_ESESS_FIELD_AVAIL", "Disponibilidade");
DEFINE("_ESESS_FIELD_AVAIL_DESC", "Indica a quem � permitido registar-se nas sess�es.<br />Usa Atributo Global utiliza as prefer�ncias da configura��o");
DEFINE("_ESESS_FIELD_PUBLISH", "Publicada");
DEFINE("_ESESS_FIELD_PUBLISH_DESC", "Indica se esta sess�o est� publicada.");
DEFINE("_ESESS_FIELD_SESSION_HOST", "Anfitri�o da Sess�o");
DEFINE("_ESESS_FIELD_SESSION_HOST_DESC", "Escolhe um anfitri�o para esta sess�o.  Para aparecer nesta lista,  o utilizador dever� ter um n�vel de acesso de grupo de &quot;autor&quot; ou superior.");
DEFINE("_ESESS_TAB_SESSION_REGISTRATION","Registo");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE", "Data de In�cio dos Registos");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE_DESC", "Data para Come�ar a aceitar Registos. A hiperliga��o n�o � mostrada at� esta data.");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME", "Hora de In�cio dos Registos");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE", "Data de Fecho dos Registos");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE_DESC", "Data para deixar de aceitar Registos. A hiperliga��o n�o � mostrada ap�s esta data.");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME", "Hora de Fecho dos Registos");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_TAB_SESSION_VENUE","Local");
DEFINE("_ESESS_FIELD_VENUE_LIST", "Locais Comuns");
DEFINE("_ESESS_FIELD_VENUE_LIST_DESC", "Selecciona um local j� definido na tabela de locais, ou introduz a informa��o do local nos campos abaixo.");


// Back-End :: Venues
DEFINE("_ESESS_FORM_VLIST", "Locais de Eventos");
DEFINE("_ESESS_VLIST_NAME", "Nome do Local");

// Back-End :: Venues :: Edit
DEFINE("_ESESS_FORM_VENUE_ADD", "Adiciona Local");
DEFINE("_ESESS_FORM_VENUE_EDIT", "Edita Local");
DEFINE("_ESESS_FIELD_VENUE_TITLE", "Nome");
DEFINE("_ESESS_FIELD_VENUE_TITLE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS", "Endere�o");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_CITY", "Cidade");
DEFINE("_ESESS_FIELD_VENUE_CITY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_STATE", "Regi�o");
DEFINE("_ESESS_FIELD_VENUE_STATE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE", "C�digo Postal");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY", "Pa�s");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS", "Endere�o Internet");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS_DESC", "Certifica a inclus�o de &quot;http://&quot;");
DEFINE("_ESESS_JSERROR_VENUE_TITLE", "Dever�s introduzir o nome do Local.");
DEFINE("_ESESS_JSERROR_VENUE_ADDRESS", "Dever�s introduzir o endere�o do local.");

// Back-End :: Registrations :: List
DEFINE("_ESESS_FORM_RLIST", "Registos em Eventos");
DEFINE("_ESESS_RLIST_NAME", "Nome");
DEFINE("_ESESS_RLIST_EMAIL", "E-mail");
DEFINE("_ESESS_RLIST_TITLE", "Sess�o");
DEFINE("_ESESS_RLIST_RDATE", "Data do Registo");
DEFINE("_ESESS_RLIST_STATUS", "Estado");
DEFINE("_ESESS_RLIST_NUM", "# de Registos");
DEFINE("_ESESS_RLIST_VIEWED", "Visualizados");
DEFINE("_ESESS_REGISTRATION_STATUS_REGISTERED", "Registado");
DEFINE("_ESESS_REGISTRATION_STATUS_CANCELLED", "Cancelado");
DEFINE("_ESESS_REGISTRATION_STATUS_CLOSED", "Fechado");
DEFINE("_ESESS_DELETE_REG_MSG", "Selecciona um Registo para Apagar");

// Back-End :: Registrations :: View
DEFINE("_ESESS_FORM_REG_VIEW", "Visualizar Registo");
DEFINE("_ESESS_FIELD_SESSION", "Sess�o");
DEFINE("_ESESS_FIELD_REGISTRATION_DATE", "Data do Registo");
DEFINE("_ESESS_FIELD_CANCELLATION_DATE", "Data de Cancelamento");
DEFINE("_ESESS_FIELD_REGISTRATION_STATUS", "Estado");

// Back-End :: Registrations :: Export
DEFINE("_ESESS_FORM_EXPORT", "Exportar Registos");
DEFINE("_ESESS_FIELD_METHOD", "M�todo de Exporta��o");
DEFINE("_ESESS_FIELD_METHOD_CSV", "CSV");
DEFINE("_ESESS_FIELD_FILENAME", "Nome do Ficheiro");
// Back-End :: Registrations :: Export -> Javascript Validation Errors
DEFINE("_ESESS_VAL_EXPORT_FILENAME", "Nome do Ficheiro n�o pode estar vazio.");
DEFINE("_ESESS_EXPORT_MSG", "M�todo de Exporta��o n�o conhecido");

// Back-End :: Configuration
DEFINE("_ESESS_FORM_CONFIG", "Configura��o");
DEFINE("_ESESS_FORM_CONFIG_CONFIRM", "Configura o E-mail de Confirma��o");
DEFINE("_ESESS_FORM_CONFIG_NOTIFY", "Configura o E-mail de Notifica��o");
DEFINE("_ESESS_FORM_CONFIG_CANCEL", "Configura o E-mail de Cancelamento");
DEFINE("_ESESS_ACTION_REGISTER", "Registo");
DEFINE("_ESESS_ACTION_UPDATE", "Actualizar");
DEFINE("_ESESS_ACTION_CANCEL", "Cancelar");
DEFINE("_ESESS_BUTTON_OPTIONS","Op��es");
DEFINE("_ESESS_BUTTON_OPTIONS_IMG","images/config.png");
DEFINE("_ESESS_BUTTON_THANK","Ecr� de Agradecimento");
DEFINE("_ESESS_BUTTON_THANK_IMG","images/menu.png");
DEFINE("_ESESS_BUTTON_CONFIRM","E-mail de Confirma��o");
DEFINE("_ESESS_BUTTON_CONFIRM_IMG","images/messaging.png");
DEFINE("_ESESS_BUTTON_NOTIFY","E-mail de Notifica��o");
DEFINE("_ESESS_BUTTON_NOTIFY_IMG","images/message_config.png");
DEFINE("_ESESS_BUTTON_CANCELLATION","E-amil de Cancelamento");
DEFINE("_ESESS_BUTTON_CANCELLATION_IMG","images/inbox.png");

// Admin :: Config :: Options
DEFINE("_ESESS_FORM_CONFIG_OPTIONS", "Configurar Op��es");
DEFINE("_ESESS_TAB_CONFIG_GENERAL","Geral");
DEFINE("_ESESS_TITLE_INTEGRATION", "Integra��o com otros componentes");
DEFINE("_ESESS_FIELD_INTEGRATE", "Integrar com o componente <b>JEvents</b>");
DEFINE("_ESESS_FIELD_INTEGRATE_DESC", "Permite que uma sess�o seja associada a um evento no componente <i>JEvents</i>.<br><b>Nota: Clica em &quot;Apply&quot; ap�s mudar este valor</b>.");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT", "Mostrar Assunto do Evento");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY", "Mostrar Actividade do Evento");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_LOCATION", "Mostrar Localiza��o do Evento");
DEFINE("_ESESS_FIELD_SHOW_LOCATION_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_CONTACT", "Mostrar Contacto do Evento");
DEFINE("_ESESS_FIELD_SHOW_CONTACT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_EXTRA", "Mostrar Extras do Evento");
DEFINE("_ESESS_FIELD_SHOW_EXTRA_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_TIME", "Mostrar Tempos do Evento");
DEFINE("_ESESS_FIELD_SHOW_TIME_DESC", "");
DEFINE("_ESESS_FIELD_CBINTEGRATED","Integrar com o componente <b>Community Builder</b>");
DEFINE("_ESESS_FIELD_CBINTEGRATED_DESC","Os valores por omiss�o dos campos de registo podem ser gerados a partir da informa��o contida no perfil de utilizador no Community Builder (ver separador \'Campos\'.<br><b>Note: lica em &quot;Apply&quot; ap�s mudar este valor</b>.");
DEFINE("_ESESS_FIELD_SHOWAVATAR", "Mostrar Avatar");
DEFINE("_ESESS_FIELD_SHOWAVATAR_DESC", "");
DEFINE("_ESESS_TITLE_REGISTRATIONCONTROL", "Controlo de Registos");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW", "Permitir Registos de");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW_DESC", "");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL", "S� Permitir Registos Individuais");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL_DESC", "");
DEFINE("_ESESS_FIELD_FULL_PROC", "Permitir Processamento Completo");
DEFINE("_ESESS_FIELD_FULL_PROC_DESC", "");
DEFINE("_ESESS_FIELD_REG_CANCEL", "Permitir cancelamento por parte de utilizadores registados");
DEFINE("_ESESS_FIELD_REG_CANCEL_DESC", "");
DEFINE("_ESESS_TITLE_DATETIME", "Formato de Data e Hora");
DEFINE("_ESESS_FIELD_DATE_SHORT", "Formato da Data (curto)");
DEFINE("_ESESS_FIELD_DATE_SHORT_DESC", "");
DEFINE("_ESESS_FIELD_DATE_LONG", "Formato da Data (longo)");
DEFINE("_ESESS_FIELD_DATE_LONG_DESC", "");
DEFINE("_ESESS_FIELD_TIME", "Formato da Hora");
DEFINE("_ESESS_FIELD_TIME_DESC", "");
DEFINE("_ESESS_FIELD_TIME1", "24 Horas, com zeros � frente");
DEFINE("_ESESS_FIELD_TIME2", "24 Horas, com espa�os � frente");
DEFINE("_ESESS_FIELD_TIME3", "12 Horas, com zeros � frente");
DEFINE("_ESESS_FIELD_TIME4", "12 Horas, com espa�os � frente");
DEFINE("_ESESS_TITLE_FRONTENDCONTROL", "Controlo No Espa�o P�blico");
DEFINE("_ESESS_FIELD_LIST_START", "Iniciando Listagem de Sess�es");
DEFINE("_ESESS_FIELD_LIST_START_DESC", "");
DEFINE("_ESESS_FIELD_LIST_STOP", "Parar Listagem de Sess�es");
DEFINE("_ESESS_FIELD_LIST_STOP_DESC", "");
DEFINE("_ESESS_FIELD_LIST_CASE0","Imediatamente");
DEFINE("_ESESS_FIELD_LIST_CASE1","Quando os Registos se Iniciam");
DEFINE("_ESESS_FIELD_LIST_CASE2","Quando os Registos Acabam");
DEFINE("_ESESS_FIELD_LIST_CASE3","Quando a Sess�o se Inicia");
DEFINE("_ESESS_FIELD_LIST_CASE4","Quando a Sess�o Acaba");
DEFINE("_ESESS_FIELD_LIST_FULL", "Listar Sess�es que est�o completas");
DEFINE("_ESESS_FIELD_LIST_FULL_DESC", "");
DEFINE("_ESESS_FIELD_LIST_EVERYONE", "Listar Sess�es Independentemente de Disponibilidade");
DEFINE("_ESESS_FIELD_LIST_EVERYONE_DESC", "");
DEFINE("_ESESS_FIELD_USER_NUM", "Mostrar n�mero de registos de utilizador");
DEFINE("_ESESS_FIELD_USER_NUM_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER", "Mostrar Rodap� no Espa�o P�blico");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP", "Mostrar Hiperliga��o para o Google Maps");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED", "Mostrar Lista de Utilizadores 'J� Rgistados'");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED_DESC", "");
DEFINE("_ESESS_TAB_CONFIG_FIELDS","Campos");
// Back-End :: Configuration :: Options -> Javascript Validation Errors
DEFINE("_ESESS_VAL_SESS_TITLE", "T�tulo n�o pode estar vazio.");
DEFINE("_ESESS_VAL_REGISTRATION_UP_DATE", "Data de In�cio de Registos n�o pode estar vazia.");
DEFINE("_ESESS_VAL_REGISTRATION_DOWN_DATE", "Data de Fecho de Registos n�o pode estar vazia.");
DEFINE("_ESESS_VAL_SESSION_UP_DATE", "Data de In�cio de Sess�o n�o pode estar vazia.");
DEFINE("_ESESS_VAL_SESS_MAX", "Nr. M�x. de Registos dever� ser um n�mero inteiro >=0.");
DEFINE("_ESESS_VAL_SESS_MAXMIN", "Nr. M�x de Registos n�o pode ser inferior ao Nr. Min de Registos");


// Admin :: Configuration :: Thank-You HTML
DEFINE("_ESESS_FORM_CONFIG_THANK", "Configurar Mensagem de Agradecimento");
DEFINE("_ESESS_FIELD_THANKYOU", "Ecr� de Agradecimento de Registo");
DEFINE("_ESESS_FIELD_THANKYOU_DESC", "");
DEFINE("_ESESS_DEFAULT_THANKYOU", "<h1>Obrigado, {fullname}!</h1><p>Foste registado para a sess�o {title}<p /><p>Se necessitarmos contactar-te relativamente a este registo, f�-lo-emos no endere�o {email}</p><p>Poder�s ver os detalhes desta sess�o <a href=\"{url}\">aqui</a>.</p><p>{data}<br /></p>");

// Back-End :: Configuration :: Confirmation Email
DEFINE("_ESESS_FIELD_CONFIRM_SEND", "Mandar E-mail de Confirma��o");
DEFINE("_ESESS_FIELD_CONFIRM_SEND_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL", "Endere�o(s) de E-mail de Confirma��o");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT", "Assunto do E-amil de Confirma��o");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_MSG", "Mensagem de E-mail de Confirma��o");
DEFINE("_ESESS_FIELD_CONFIRM_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_CONFIRM_SUBJECT", "{title} {action}");
DEFINE("_ESESS_DEFAULT_CONFIRM_MESSAGE", "<p>Caro {fullname}</p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Foste registado para a sess�o {title}!</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Se necessitarmos contactar-te relativamente a este registo, f�-lo-emos no endere�o {email}</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Poder�s ver os detalhes desta sess�o <a href=\"{url}\">aqui</a></span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">{data}<br /></span></p>");
// Back-End :: Configuration :: Confirmation Email -> Replacement tag notes
DEFINE("_ESESS_REPLACE_TAGS", "&lt;em&gt;Replacment Tags&lt;/em&gt;&lt;br /&gt;\nCopia e cola estas etiquetas nos campos para efeitos de substitui��o.");
DEFINE("_ESESS_REPLACE_NAME", "O Nome Completo do Utilizador");
DEFINE("_ESESS_REPLACE_EMAIL", "O Endere�o de E-mail do Utilizador");
DEFINE("_ESESS_REPLACE_URL", "O URL para mostrar informa��o sobre a sess�o");
DEFINE("_ESESS_REPLACE_TITLE", "O t�tulo da Sess�o");
DEFINE("_ESESS_REPLACE_ACTION", "A Ac��o de Registo (Registar, Actualizar, Cancelar)");
DEFINE("_ESESS_REPLACE_DATA", "Tabela com o conte�do dos dados inseridos");


// Back-End :: Configuration :: Notification Email
DEFINE("_ESESS_FIELD_NOTIFY_SEND", "Mandar E-mail de Notifica��oSend Notification Email");
DEFINE("_ESESS_FIELD_NOTIFY_SEND_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT", "Assunto do E-mail de Notifica��o");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_MSG", "Mensagem do E-mail de Notifica��o");
DEFINE("_ESESS_FIELD_NOTIFY_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_NOTIFY_SUBJECT", "Novo {title} {action}"); 
DEFINE("_ESESS_DEFAULT_NOTIFY_MESSAGE", "<p>{fullname} {email} registou-se na sess�o {title}</p><p>{data} </p>"); 






// General -> Session Status
DEFINE("_ESESS_STATUS_NEW", "Nova");
DEFINE("_ESESS_STATUS_OPEN", "Aberta");
DEFINE("_ESESS_STATUS_FULL", "Completa");
DEFINE("_ESESS_STATUS_CLOSED", "Fechada");

// General -> Session Availability
DEFINE("_ESESS_AVAIL_EVERY", "Todos");
DEFINE("_ESESS_AVAIL_REG", "Somente Utilizadores Registados");
DEFINE("_ESESS_AVAIL_GUEST", "Somente Visitantes");
DEFINE("_ESESS_AVAIL_GLOBAL", "Global");
DEFINE("_ESESS_AVAIL_GLOBAL2", "Utilizar Global");

// General -> Custom Toolbar Icons
DEFINE("_ESESS_TOOLBAR_VIEW", "V�r");
DEFINE("_ESESS_TOOLBAR_EXPORT", "Exportar");
DEFINE("_ESESS_TOOLBAR_EXPORTALL", "Exportar Tudo");
DEFINE("_ESESS_TOOLBAR_EMAIL", "E-mail");

// General -> File I/O errors
DEFINE("_ESESS_CONFIG_ERR", "Ficheiro de configura��o n�o permite escrita!");
DEFINE("_ESESS_CONFIG_ERR_OPEN", "Incapaz de abrir ficheiro de Configura��o para escrita");
DEFINE("_ESESS_CONFIG_ERR_WRITE", "Incapaz de escrever no ficheiro de Configura��o");
DEFINE("_ESESS_CONFIG_SAVE", "Configura��o Guardada com sucesso!");

// General -> Images used for sorting
DEFINE("_ESESS_ARROW_UP", "images/uparrow-1.png");
DEFINE("_ESESS_ARROW_DOWN", "images/downarrow-1.png");
DEFINE("_ESESS_ARROW_UNSET", "images/uparrow.png");

// General -> Javascript Validation
DEFINE("_ESESS_VAL_ERROR", "Erros de Valida��o:");

// General -> Dynamic Fields
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD","Novo Campo");
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD_DESC","Cica para criar um campo novo.");
DEFINE("_ESESS_DYNAMICFIELDS_LOADTABLEERROR","ocorreu um erro ao carregar os campos de registo.");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDNAME","Nome do Campo");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE","Tipo do Campo");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDPARAMETERS","Parametros Espec�ficos do Tipo");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXT","Texto");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXTAREA","�rea de Texto");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_CHECKBOX","Caixa de Escolha M�ltipla");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_RADIO","Lista de Radio Buttons");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_SELECT","Lista de Selec��o");
DEFINE("_ESESS_DYNAMICFIELDS_LAYOUT","Apresenta��o");
DEFINE("_ESESS_DYNAMICFIELDS_SIZE","Tamanho");
DEFINE("_ESESS_DYNAMICFIELDS_ROWS","Linhas");
DEFINE("_ESESS_DYNAMICFIELDS_COLS","Colunas");
DEFINE("_ESESS_DYNAMICFIELDS_INPUTCONTROL","Controlo de Introdu��o");
DEFINE("_ESESS_DYNAMICFIELDS_REQUIRED","Obrigat�rio");
DEFINE("_ESESS_DYNAMICFIELDS_MAXLENGTH","Comprimento M�ximo");
DEFINE("_ESESS_DYNAMICFIELDS_USERINTERFACE","Interface de UtilizadorUser Interface");
DEFINE("_ESESS_DYNAMICFIELDS_DEFAULT","Por Omiss�o");
DEFINE("_ESESS_DYNAMICFIELDS_CBDEFAULT","Campo do Community Builder Associado");
DEFINE("_ESESS_DYNAMICFIELDS_TOOLTIP","Tooltip");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONS","Op��es");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONNAME","Nome da Op��o");
DEFINE("_ESESS_DYNAMICFIELDS_ADDOPTION","Adicionar Op��o");
?>
