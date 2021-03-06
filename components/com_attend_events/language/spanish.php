<?php
/**
* @version $Id: spanish.php 26 2007-01-06 00:03:24Z pcarr $
* @package Attend Events
* @copyright (C) 2005-06 Francisco Jose Toledano
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//Check
DEFINE("_ESESS_LANG_INCLUDED", 1);

// Front-End :: Title
DEFINE("_ESESS_COMPONENT_TITLE", "Asistencia a Eventos");

// Front-End :: List
DEFINE("_ESESS_NAME", "Nombre");
DEFINE("_ESESS_SESSION_UP", "D�a de la Sesi�n");
DEFINE("_ESESS_REGISTRATION_DOWN", "Fin de Inscripciones");
DEFINE("_ESESS_NUM_LEFT", "# Quedan");
DEFINE("_ESESS_NUM_AVAIL", "# Disponibles");
DEFINE("_ESESS_AVAIL_STATUS", "Estado");
DEFINE("_ESESS_AVAIL_STATUS_AVAIL", "Disponible");
DEFINE("_ESESS_AVAIL_STATUS_FULL", "Completo");

// Front-End :: View
DEFINE("_ESESS_REG_HOSTED_BY", "Organizado por");
DEFINE("_ESESS_REG_DATETIME", "D�a y Hora");
DEFINE("_ESESS_REG_LOCATION", "Localizaci�n");
DEFINE("_ESESS_REG_MAPTEXT", "�C�mo llegar?");
DEFINE("_ESESS_REG_AVAIL", "Inscripciones disponibles");
DEFINE("_ESESS_REG_CLOSE", "Fin de Inscripciones");
DEFINE("_ESESS_UNLIMITED", "Ilimitadas");
DEFINE("_ESESS_OUT_OF", "ocupadas de");
DEFINE("_ESESS_FIELD_COMMENTS", "Comentarios");
DEFINE("_ESESS_FIELD_COMMENTS_DESC", "");
DEFINE("_ESESS_ERROR_ONLY_REGISTERED", "Solo usuarios registrados se pueden inscribir en este evento.");
DEFINE("_ESESS_ERROR_ONLY_GUESTS", "S�lo invitados se puedes inscribir en este evento.");
DEFINE("_ESESS_ERROR_FULL", "El evento est� completo.");
DEFINE("_ESESS_ERROR_CLOSED", "Ha finalizado el plazo de inscripci�n.");
DEFINE("_ESESS_REG_LIST", "Persona ya inscrita");

// Front End :: View -> Registration Form
DEFINE("_ESESS_FIELD_FULLNAME", "Nombre completo");
DEFINE("_ESESS_FIELD_FULLNAME_DESC", "Por favor, teclea tu nombre completo a efectos de contactar contigo.");
DEFINE("_ESESS_FIELD_EMAIL", "Correo electr�nico");
DEFINE("_ESESS_FIELD_EMAIL_DESC", "Por favor, teclea tu direcci�n de correo electr�nico a efectos de contactar contigo.");
DEFINE("_ESESS_FIELD_NUM_PEOPLE", "N�mero de personas");
DEFINE("_ESESS_FIELD_NUM_PEOPLE_DESC", "�Cuantas personas quieres incribir?");
DEFINE("_ESESS_BUTTON_REGISTER", "Inscribir");
DEFINE("_ESESS_BUTTON_RESET", "Reiniciar");
DEFINE("_ESESS_BUTTON_UPDATE", "Actualizar Inscripci�n");
DEFINE("_ESESS_BUTTON_CANCEL", "Cancelar Inscripci�n");
DEFINE("_ESESS_VAL_REG_ALERT", "Problemas comprobando Inscripci�n:");
DEFINE("_ESESS_VAL_REG_FULLNAME", "Debes proporcionar tu nombre completo.");
DEFINE("_ESESS_VAL_REG_EMAIL", "Debes proporcionar tu direcci�n de correo electr�nico.");
DEFINE("_ESESS_VAL_REG_NUMBER", "El n�moer de personas no es un n�mero v�lido entre 1 y "); 

// Back-End -> General
DEFINE("_ESESS_REQUIRED", "<span style=\"color: red;\">*</span>");
DEFINE("_ESESS_STYLE_TITLE", "style=\"background-color: #E0E0E0; font-weight: bold; border-bottom: 1px solid #B0B0B\"");

// Back-End -> Menus
DEFINE("_ESESS_MENU_SESSIONS", "Eventos");
DEFINE("_ESESS_MENU_VENUES", "Localizaciones");
DEFINE("_ESESS_MENU_REGISTRATIONS", "Registros");
DEFINE("_ESESS_MENU_CONFIGURATION", "Configuraci�n");

// Back-End :: Sessions :: List
DEFINE("_ESESS_FORM_SLIST", "Gestor de Eventos");
DEFINE("_ESESS_SLIST_NAME", "Nombre");
DEFINE("_ESESS_SLIST_SESSION_UP", "D�a Comienzo Evento");
DEFINE("_ESESS_SLIST_SESSION_DOWN", "D�a Finalizaci�n Evento");
DEFINE("_ESESS_SLIST_REGISTRATION_UP", "D�a Comienzo Inscripciones");
DEFINE("_ESESS_SLIST_REGISTRATION_DOWN", "D�a Finalizaci�n Inscripciones");
DEFINE("_ESESS_SLIST_NUM_REGISTRATIONS", "Inscripciones");
DEFINE("_ESESS_SLIST_STATUS", "Estado");
DEFINE("_ESESS_SLIST_AVAIL", "Disponibilidad");
DEFINE("_ESESS_SLIST_PUB", "Publicado");
// Back-End :: Sessions :: List -> Filters
DEFINE("_ESESS_SFILTER_CHOOSE", "Selecciona un filtroChoose a Filter");
DEFINE("_ESESS_SFILTER_NONE", "Sin Filtro");
DEFINE("_ESESS_SFILTER_STATUS", "- Estado de Filtro");
DEFINE("_ESESS_SFILTER_AVAIL", "- Disponibilidad de Filtro");
DEFINE("_ESESS_SFILTER_EVENT", "- Filtro de Eventos");
DEFINE("_ESESS_RFILTER_CHOOSE", "Elije un Evento");
DEFINE("_ESESS_RFILTER_ALL", "- Todos los Eventos");
// Back-End :: Sessions :: List -> Javascript Validation Errors
DEFINE("_ESESS_PUBLISH_MSG", "Selecciona un evento para ser ");
DEFINE("_ESESS_DELETE_SESSION_MSG", "Selecciona un evento para borrar");


// Back-End :: Sessions :: Edit
DEFINE("_ESESS_FORM_SESS_ADD", "A�adir Evento");
DEFINE("_ESESS_FORM_SESS_EDIT", "Editar Evento");
DEFINE("_ESESS_TITLE_DESCRIPTION", "Detalles del Evento");
DEFINE("_ESESS_TITLE_SESSION_GENERAL","General");
DEFINE("_ESESS_TITLE_SESSION_DATETIME","D�a y Hora");
DEFINE("_ESESS_FIELD_EVENT", "Evento");
DEFINE("_ESESS_FIELD_EVENT_DESC", "Selecciona una evento existente para crear una sesi�n.");
DEFINE("_ESESS_NO_EVENT", "Sin Evento");
DEFINE("_ESESS_FIELD_TITLE", "T�tulo");
DEFINE("_ESESS_FIELD_TITLE_DESC", "Teclea un t�tulo para el evento.");
DEFINE("_ESESS_FIELD_INTRO", "Descripci�n");
DEFINE("_ESESS_FIELD_INTRO_DESC", "Alg�n texto introductorio explicando este Evento. De ayuda en caso de que no haya un link al evento.");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE", "D�a de comienzo del Evento");
DEFINE("_ESESS_FIELD_SESSION_UP_DATE_DESC", "D�a que comienza el evento.");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME", "Hora de comienzo del evento");
DEFINE("_ESESS_FIELD_SESSION_UP_TIME_DESC", "A que hora comienza el evento-");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE", "D�a de finalizaci�n del evento");
DEFINE("_ESESS_FIELD_SESSION_DOWN_DATE_DESC", "D�a en el que termina el evento.");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME", "Hora de finalizaci�n del evento");
DEFINE("_ESESS_FIELD_SESSION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_FIELD_STATUS", "Estado");
DEFINE("_ESESS_FIELD_STATUS_DESC", "Estado general del evento:<br />Nuevo es no accesible<br />Abierto es listo para inscripciones<br />Cerrado es pues eso<br />Lleno es que no hay inscripciones disponibles");
DEFINE("_ESESS_FIELD_MAX", "N�mero M�ximo de Inscripciones");
DEFINE("_ESESS_FIELD_MAX_DESC", "El n�mero m�ximo de inscripciones permitidas en el evento.<br />Una vez que se ha llegado al m�ximo, el estado cambiar� a Lleno");
DEFINE("_ESESS_FIELD_AVAIL", "Disponibilidad");
DEFINE("_ESESS_FIELD_AVAIL_DESC", "Indica quien puede inscribirse en el evento.<br />Usar valores globales de la configuraci�n");
DEFINE("_ESESS_FIELD_PUBLISH", "Publicar");
DEFINE("_ESESS_FIELD_PUBLISH_DESC", "Indica cuando este evento ha sido Publicado.");
DEFINE("_ESESS_FIELD_SESSION_HOST", "Organizador del Evento");
DEFINE("_ESESS_FIELD_SESSION_HOST_DESC", "Selecciona un organizador para el evento. Para aparecer en este listado, el usuario tiene que tener un nivel de acceso de grupo de  &quot;author&quot; o superior.");
DEFINE("_ESESS_TAB_SESSION_REGISTRATION","Inscripciones");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE", "D�a de comienzo de Inscripciones");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_DATE_DESC", "D�a para comenzar a aceptar inscripciones. El enlace no se mostrar� hasta este d�a.");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME", "Hora Comienzo Inscripciones");
DEFINE("_ESESS_FIELD_REGISTRATION_UP_TIME_DESC", "");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE", "D�a Finalizaci�n Inscripciones");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_DATE_DESC", "�ltimo d�a para aceptar inscripciones.  El enlace no se mostrar� despues de este d�a.");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME", "Hora de Finalizaci�n de Inscripciones");
DEFINE("_ESESS_FIELD_REGISTRATION_DOWN_TIME_DESC", "");
DEFINE("_ESESS_TAB_SESSION_VENUE","Local");
DEFINE("_ESESS_FIELD_VENUE_LIST", "Locales com�nes");
DEFINE("_ESESS_FIELD_VENUE_LIST_DESC", "Selecciona un local de la tabla de Locales, o teclea la informaci�n de un nuevo lugar en los campos de abajo. ");


// Back-End :: Venues
DEFINE("_ESESS_FORM_VLIST", "Locales de Eventos");
DEFINE("_ESESS_VLIST_NAME", "Nombre del Local");

// Back-End :: Venues :: Edit
DEFINE("_ESESS_FORM_VENUE_ADD", "A�adir Local");
DEFINE("_ESESS_FORM_VENUE_EDIT", "Editar Local");
DEFINE("_ESESS_FIELD_VENUE_TITLE", "Nombre");
DEFINE("_ESESS_FIELD_VENUE_TITLE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS", "Direcci�n");
DEFINE("_ESESS_FIELD_VENUE_ADDRESS_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_CITY", "Ciudad");
DEFINE("_ESESS_FIELD_VENUE_CITY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_STATE", "Provincia");
DEFINE("_ESESS_FIELD_VENUE_STATE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE", "C�digo Postal");
DEFINE("_ESESS_FIELD_VENUE_POSTALCODE_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY", "Pa�s");
DEFINE("_ESESS_FIELD_VENUE_COUNTRY_DESC", "");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS", "Direcci�n Web");
DEFINE("_ESESS_FIELD_VENUE_WEBADDRESS_DESC", "Aseg�rate de incluir &quot;http://&quot;");
DEFINE("_ESESS_JSERROR_VENUE_TITLE", "Debes teclear el nombre del local.");
DEFINE("_ESESS_JSERROR_VENUE_ADDRESS", "Debes teclear la direcci�n del local.");

// Back-End :: Registrations :: List
DEFINE("_ESESS_FORM_RLIST", "Inscripciones en Eventos");
DEFINE("_ESESS_RLIST_NAME", "Nombre");
DEFINE("_ESESS_RLIST_EMAIL", "Email");
DEFINE("_ESESS_RLIST_TITLE", "Sesi�n");
DEFINE("_ESESS_RLIST_RDATE", "D�a de Inscripci�n");
DEFINE("_ESESS_RLIST_STATUS", "Estado");
DEFINE("_ESESS_RLIST_NUM", "N� Inscripciones");
DEFINE("_ESESS_RLIST_VIEWED", "Visto");
DEFINE("_ESESS_REGISTRATION_STATUS_REGISTERED", "Inscrito");
DEFINE("_ESESS_REGISTRATION_STATUS_CANCELLED", "Cancelado");
DEFINE("_ESESS_REGISTRATION_STATUS_CLOSED", "Cerrado");
DEFINE("_ESESS_DELETE_REG_MSG", "Selecciona una inscripci�n para borrar");

// Back-End :: Registrations :: View
DEFINE("_ESESS_FORM_REG_VIEW", "Ver Inscripciones");
DEFINE("_ESESS_FIELD_SESSION", "Sesi�n");
DEFINE("_ESESS_FIELD_REGISTRATION_DATE", "D�a de Inscripci�n");
DEFINE("_ESESS_FIELD_CANCELLATION_DATE", "D�a de Cancelaci�n");
DEFINE("_ESESS_FIELD_REGISTRATION_STATUS", "Estado");

// Back-End :: Registrations :: Export
DEFINE("_ESESS_FORM_EXPORT", "Exportar Inscripciones");
DEFINE("_ESESS_FIELD_METHOD", "M�todo de Exportaci�n");
DEFINE("_ESESS_FIELD_METHOD_CSV", "CSV");
DEFINE("_ESESS_FIELD_FILENAME", "Nombre del fichero");
// Back-End :: Registrations :: Export -> Javascript Validation Errors
DEFINE("_ESESS_VAL_EXPORT_FILENAME", "El nombre del fichero no puede estar vac�o.");
DEFINE("_ESESS_EXPORT_MSG", "M�todo de exportaci�n desconocido");

// Back-End :: Configuration
DEFINE("_ESESS_FORM_CONFIG", "Configuraci�n");
DEFINE("_ESESS_FORM_CONFIG_CONFIRM", "Configurar Email de Confirmaci�n");
DEFINE("_ESESS_FORM_CONFIG_NOTIFY", "Configurar Email de Notificaci�n");
DEFINE("_ESESS_FORM_CONFIG_CANCEL", "Configurar Email de Cancelaci�n");
DEFINE("_ESESS_ACTION_REGISTER", "Inscribir");
DEFINE("_ESESS_ACTION_UPDATE", "Actulizar");
DEFINE("_ESESS_ACTION_CANCEL", "Cancelar");
DEFINE("_ESESS_BUTTON_OPTIONS","Opciones");
DEFINE("_ESESS_BUTTON_OPTIONS_IMG","images/config.png");
DEFINE("_ESESS_BUTTON_THANK","Pantalla de Gracias");
DEFINE("_ESESS_BUTTON_THANK_IMG","images/menu.png");
DEFINE("_ESESS_BUTTON_CONFIRM","Email de Confirmaci�n");
DEFINE("_ESESS_BUTTON_CONFIRM_IMG","images/messaging.png");
DEFINE("_ESESS_BUTTON_NOTIFY","Email de Notificaci�n");
DEFINE("_ESESS_BUTTON_NOTIFY_IMG","images/message_config.png");
DEFINE("_ESESS_BUTTON_CANCELLATION","Email de Cancelaci�n");
DEFINE("_ESESS_BUTTON_CANCELLATION_IMG","images/inbox.png");

// Admin :: Config :: Options
DEFINE("_ESESS_FORM_CONFIG_OPTIONS", "Configurar Opciones");
DEFINE("_ESESS_TAB_CONFIG_GENERAL","General");
DEFINE("_ESESS_TITLE_INTEGRATION", "Integraci�n con otros Componentes");
DEFINE("_ESESS_FIELD_INTEGRATE", "Integraci�n con <b>JEvents</b> Component");
DEFINE("_ESESS_FIELD_INTEGRATE_DESC", "Permitir a una sesi�n ser asociada con un evento de <i>JEvents</i> component.<br><b>Nota:  Pulsa &quot;Apply&quot; bot�n despu�s de cambiar �ste valor</b>.");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT", "Mostra el tema de los Eventos");
DEFINE("_ESESS_FIELD_SHOW_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY", "Mostrar la Actividad del evento");
DEFINE("_ESESS_FIELD_SHOW_ACTIVITY_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_LOCATION", "Mostrar la localizaci�n del evento");
DEFINE("_ESESS_FIELD_SHOW_LOCATION_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_CONTACT", "Mostrar los datos de contacto del evento");
DEFINE("_ESESS_FIELD_SHOW_CONTACT_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_EXTRA", "Mostrar los extras del evento");
DEFINE("_ESESS_FIELD_SHOW_EXTRA_DESC", "");
DEFINE("_ESESS_FIELD_SHOW_TIME", "Mostrar los horarios del evento");
DEFINE("_ESESS_FIELD_SHOW_TIME_DESC", "");
DEFINE("_ESESS_FIELD_CBINTEGRATED","Integrar con <b>Community Builder</b> Component");
DEFINE("_ESESS_FIELD_CBINTEGRATED_DESC","Los valores por defecto de cada campo de inscripci�n, pueder ser generados usando la informaci�n almacenada en el perfil de usuarios de Community Builder (ver \'Fields\' tab).<br><b>Nota:  Pulsa &quot;Apply&quot; despues de cambiar este valor</b>.");
DEFINE("_ESESS_FIELD_SHOWAVATAR", "Mostrar Avatar");
DEFINE("_ESESS_FIELD_SHOWAVATAR_DESC", "");
DEFINE("_ESESS_TITLE_REGISTRATIONCONTROL", "Control de Inscripciones");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW", "Permitir inscripciones desde");
DEFINE("_ESESS_FIELD_AVAIL_ALLOW_DESC", "");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL", "S�lo permitir inscripciones individuales");
DEFINE("_ESESS_FIELD_ALLOW_INDIVIDUAL_DESC", "");
DEFINE("_ESESS_FIELD_FULL_PROC", "Permitir procesamiento completo");
DEFINE("_ESESS_FIELD_FULL_PROC_DESC", "");
DEFINE("_ESESS_FIELD_REG_CANCEL", "Permitir la cancelaci�n por el usuario registrado");
DEFINE("_ESESS_FIELD_REG_CANCEL_DESC", "");
DEFINE("_ESESS_TITLE_DATETIME", "Formato de Fecha y Hora");
DEFINE("_ESESS_FIELD_DATE_SHORT", "Formato de fecha (corto)");
DEFINE("_ESESS_FIELD_DATE_SHORT_DESC", "");
DEFINE("_ESESS_FIELD_DATE_LONG", "Formato de fecha (largo)");
DEFINE("_ESESS_FIELD_DATE_LONG_DESC", "");
DEFINE("_ESESS_FIELD_TIME", "Formato de Hora");
DEFINE("_ESESS_FIELD_TIME_DESC", "");
DEFINE("_ESESS_FIELD_TIME1", "24 Horas, Comenzando por cero");
DEFINE("_ESESS_FIELD_TIME2", "24 Horas, Comenzando por espacio");
DEFINE("_ESESS_FIELD_TIME3", "12 Horas, Comenzando por cero");
DEFINE("_ESESS_FIELD_TIME4", "12 Horas, Comenzando por espacio");
DEFINE("_ESESS_TITLE_FRONTENDCONTROL", "Contro en Front-End");
DEFINE("_ESESS_FIELD_LIST_START", "Empezar listado de Sesiones");
DEFINE("_ESESS_FIELD_LIST_START_DESC", "");
DEFINE("_ESESS_FIELD_LIST_STOP", "Finalizar listado de Sesiones");
DEFINE("_ESESS_FIELD_LIST_STOP_DESC", "");
DEFINE("_ESESS_FIELD_LIST_CASE0","Inmediatamente");
DEFINE("_ESESS_FIELD_LIST_CASE1","Cuando comienzen Inscripciones");
DEFINE("_ESESS_FIELD_LIST_CASE2","Cuando terminen Inscripciones");
DEFINE("_ESESS_FIELD_LIST_CASE3","Cuando empieze la sesi�n");
DEFINE("_ESESS_FIELD_LIST_CASE4","Cuando termine la sesi�n");
DEFINE("_ESESS_FIELD_LIST_FULL", "Listar Sesiones que est�n llenas");
DEFINE("_ESESS_FIELD_LIST_FULL_DESC", "");
DEFINE("_ESESS_FIELD_LIST_EVERYONE", "Listar Sesiones sin tener en cuenta su Disponibilidad");
DEFINE("_ESESS_FIELD_LIST_EVERYONE_DESC", "");
DEFINE("_ESESS_FIELD_USER_NUM", "Mostrar n�mero de inscripciones");
DEFINE("_ESESS_FIELD_USER_NUM_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER", "Mostrar cr�ditos en Front-End");
DEFINE("_ESESS_FIELD_DISPLAY_FOOTER_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP", "Mostrar link a Google Maps");
DEFINE("_ESESS_FIELD_DISPLAY_GOOGLEMAP_DESC", "");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED", "Mostrar lista de 'Usuarios ya Registrados'");
DEFINE("_ESESS_FIELD_DISPLAY_REGISTERED_DESC", "");
DEFINE("_ESESS_TAB_CONFIG_FIELDS","Fields");
// Back-End :: Configuration :: Options -> Javascript Validation Errors
DEFINE("_ESESS_VAL_SESS_TITLE", "T�tulo no puede estar vac�o.");
DEFINE("_ESESS_VAL_REGISTRATION_UP_DATE", "Dia de comienzo de Inscripciones tiene que ser una fecha.");
DEFINE("_ESESS_VAL_REGISTRATION_DOWN_DATE", "D�a de finalizaci�n de inscripciones tiene que ser una fecha.");
DEFINE("_ESESS_VAL_SESSION_UP_DATE", "D�a de comienzo de Sesi�n tiene que ser una fecha.");
DEFINE("_ESESS_VAL_SESS_MAX", "N�mero m�ximo de Inscripciones tiene que ser  >=0.");
DEFINE("_ESESS_VAL_SESS_MAXMIN", "N�mero m�ximo de Inscripciones no puede ser menor que n�mero m�nimo de inscipciones");


// Admin :: Configuration :: Thank-You HTML
DEFINE("_ESESS_FORM_CONFIG_THANK", "Configurar Mensaje de Gracias");
DEFINE("_ESESS_FIELD_THANKYOU", "Pantalla de Gracias por Inscribirte");
DEFINE("_ESESS_FIELD_THANKYOU_DESC", "");
DEFINE("_ESESS_DEFAULT_THANKYOU", "<h1>Gracias {fullname}!</h1><p>Te has inscrito en  {title}<p /><p>Si necesitamos contactar contigo lo haremos en  {email}</p><p>Puedes ver los detalles de este evento en <a href=\"{url}\">aqu�</a>.</p><p>{data}<br /></p>");

// Back-End :: Configuration :: Confirmation Email
DEFINE("_ESESS_FIELD_CONFIRM_SEND", "Mandar Mensaje de Confirmaci�n");
DEFINE("_ESESS_FIELD_CONFIRM_SEND_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL", "Direcci�n email de Confirmaci�n");
DEFINE("_ESESS_FIELD_CONFIRM_EMAIL_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT", "Tema en Mensaje de Confirmaci�n");
DEFINE("_ESESS_FIELD_CONFIRM_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_CONFIRM_MSG", "Texto del Mensaje de Confirmaci�n");
DEFINE("_ESESS_FIELD_CONFIRM_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_CONFIRM_SUBJECT", "{title} {action}");
DEFINE("_ESESS_DEFAULT_CONFIRM_MESSAGE", "<p>Estimado {fullname}</p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Te has inscrito en {title}!</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Si necesitamos contactar contigo lo haremos en {email}</span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">Puedes ver los datos de este evento <a href=\"{url}\">aqu�</a></span></p><p><span style=\"font-family: verdana,arial,helvetica,sans-serif;\">{data}<br /></span></p>");

// Back-End :: Configuration :: Confirmation Email -> Replacement tag notes
DEFINE("_ESESS_REPLACE_TAGS", "&lt;em&gt;Campos seleccionables&lt;/em&gt;&lt;br /&gt;\nCopia y pega estos campos en el texto y ser�n sustituidos en ejecuci�n..");
DEFINE("_ESESS_REPLACE_NAME", "Nombre completo del usuario");
DEFINE("_ESESS_REPLACE_EMAIL", "Direcci�n Email del usuario");
DEFINE("_ESESS_REPLACE_URL", "La direcci�n Web para mostrar informaci�n del evento");
DEFINE("_ESESS_REPLACE_TITLE", "El T�tulo del Evento");
DEFINE("_ESESS_REPLACE_ACTION", "La Acci�n efectuada en la inscripci�n (Inscripci�n, Modificaci�n, Cancelaci�n)");
DEFINE("_ESESS_REPLACE_DATA", "Tabla conteniendo los datos tecleados");


// Back-End :: Configuration :: Notification Email
DEFINE("_ESESS_FIELD_NOTIFY_SEND", "Mandar Email de Notificaci�n");
DEFINE("_ESESS_FIELD_NOTIFY_SEND_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT", "Asunto en el Mensaje de Notificaci�n");
DEFINE("_ESESS_FIELD_NOTIFY_SUBJECT_DESC", "");
DEFINE("_ESESS_FIELD_NOTIFY_MSG", "Texto del Mensaje de Notificaci�n");
DEFINE("_ESESS_FIELD_NOTIFY_MSG_DESC", "");
DEFINE("_ESESS_DEFAULT_NOTIFY_SUBJECT", "Nueva {action} en {title}"); 
DEFINE("_ESESS_DEFAULT_NOTIFY_MESSAGE", "<p>{fullname} {email} se ha inscrito en {title}</p><p>{data} </p>"); 

// Back-End :: Configuration :: Cancel Page
DEFINE("_ESESS_DEFAULT_CANCEL_TITLE", "Inscripci�n cancelada");
DEFINE("_ESESS_DEFAULT_CANCEL_TEXT", "{fullname}, tu inscripci�n en {title} ha sido cancelada <br />Pulsa <a href=\"{url}\">aqu�</a> para volver al evento.");




// Back-End :: About
DEFINE("_ESESS_TOOLBAR_UNINSTALL", "Desinstalar");
DEFINE("_ESESS_TOOLBAR_SAVESETTINGS", "Ajustes");
DEFINE("_ESESS_TOOLBAR_UPDATE", "Actualizar");
DEFINE("_ESESS_UNINSTALL_CONFIRM", "�Seguro que quieres borrar todos los datos de \"Attend Events\" de la base de datos?");
DEFINE("_ESESS_UNINSTALL_MESSAGE", "�Todos los datos han sido borrados correctamente! Ahora puedes desinstalar el componente.");
DEFINE("_ESESS_UPDATE_CONFIRM", "�Has hecho una copia de seguridad de la base de datos Joomla?");




// General -> Session Status
DEFINE("_ESESS_STATUS_NEW", "Nuevo");
DEFINE("_ESESS_STATUS_OPEN", "Abierta");
DEFINE("_ESESS_STATUS_FULL", "Llena");
DEFINE("_ESESS_STATUS_CLOSED", "Cerrada");

// General -> Session Availability
DEFINE("_ESESS_AVAIL_EVERY", "Todos");
DEFINE("_ESESS_AVAIL_REG", "Solo Usuarios Registrados");
DEFINE("_ESESS_AVAIL_GUEST", "S�lo invitados");
DEFINE("_ESESS_AVAIL_GLOBAL", "General");
DEFINE("_ESESS_AVAIL_GLOBAL2", "Usar valor General");

// General -> Custom Toolbar Icons
DEFINE("_ESESS_TOOLBAR_VIEW", "Ver");
DEFINE("_ESESS_TOOLBAR_EXPORT", "Exportar");
DEFINE("_ESESS_TOOLBAR_EXPORTALL", "Exportar Todo");
DEFINE("_ESESS_TOOLBAR_EMAIL", "Email");

// General -> File I/O errors
DEFINE("_ESESS_CONFIG_ERR", "�Fichero de Configuraci�n no escribible!");
DEFINE("_ESESS_CONFIG_ERR_OPEN", "Imposible abrir el fichero de configuraci�n para escribir");
DEFINE("_ESESS_CONFIG_ERR_WRITE", "Imposible escribir en el fichero de configuraci�n");
DEFINE("_ESESS_CONFIG_SAVE", "�Configuraci�n guardada correctamente!");

// General -> Images used for sorting
DEFINE("_ESESS_ARROW_UP", "images/uparrow-1.png");
DEFINE("_ESESS_ARROW_DOWN", "images/downarrow-1.png");
DEFINE("_ESESS_ARROW_UNSET", "images/uparrow.png");

// General -> Javascript Validation
DEFINE("_ESESS_VAL_ERROR", "Validation Errors:");

// General -> Dynamic Fields
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD","Nuevo Campo");
DEFINE("_ESESS_DYNAMICFIELDS_NEWFIELD_DESC","Pulsa para crear un nuevo Campo.");
DEFINE("_ESESS_DYNAMICFIELDS_LOADTABLEERROR","Ha ocurrido un error mientras se estaban cargando los campos de Inscripciones.");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDNAME","Nombre del Campo");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE","Tipo de Campo");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDPARAMETERS","Teclea los Par�metros espec�ficos");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXT","Texto");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_TEXTAREA","Area de Texto");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_CHECKBOX","Checkbox");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_RADIO","Radio List");
DEFINE("_ESESS_DYNAMICFIELDS_FIELDTYPE_SELECT","Select List");
DEFINE("_ESESS_DYNAMICFIELDS_LAYOUT","Mapa");
DEFINE("_ESESS_DYNAMICFIELDS_SIZE","Tama�o");
DEFINE("_ESESS_DYNAMICFIELDS_ROWS","Filas");
DEFINE("_ESESS_DYNAMICFIELDS_COLS","Columnas");
DEFINE("_ESESS_DYNAMICFIELDS_INPUTCONTROL","Control de Entrada");
DEFINE("_ESESS_DYNAMICFIELDS_REQUIRED","Requerido");
DEFINE("_ESESS_DYNAMICFIELDS_MAXLENGTH","Longitud M�xima");
DEFINE("_ESESS_DYNAMICFIELDS_USERINTERFACE","Interface de Usuario");
DEFINE("_ESESS_DYNAMICFIELDS_DEFAULT","Por defecto");
DEFINE("_ESESS_DYNAMICFIELDS_CBDEFAULT","Campo Asociado a Community Builder");
DEFINE("_ESESS_DYNAMICFIELDS_TOOLTIP","Ayuda");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONS","Opciones");
DEFINE("_ESESS_DYNAMICFIELDS_OPTIONNAME","Nombre de la Opci�n");
DEFINE("_ESESS_DYNAMICFIELDS_ADDOPTION","A�adir Opci�n");
?>
