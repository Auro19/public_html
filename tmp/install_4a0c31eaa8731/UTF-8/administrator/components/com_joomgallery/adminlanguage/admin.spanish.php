<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/LF/trunk/UTF-8/adminlanguage/admin.spanish.php $
// $Id: admin.spanish.php 305 2008-12-23 17:50:08Z aha $
/******************************************************************************\
**   JoomGallery  1.0 Beta 1                                                  **
**   By: Joom::Gallery::Project::Team                                         **
**   Copyright (C) 2008  M. Andreas Boettcher                                 **
**   Based on: PonyGallery ML 2.5.1 by PonyGallery-ML-Team                    **
**   Released under GNU GPL Public License                                    **
**   License: http://www.gnu.org/copyleft/gpl.html or have a look             **
**   at administrator/components/com_joomgallery/LICENSE.TXT                  **
\******************************************************************************/

#### Original Copyright ########################################################
## PonyGallery ML 2.5.1                                                       ##
## By: M. Andreas Boettcher & Benjamin Malte Meier                            ##
## & Andreas Hartmann & The ML-Team                                           ##
## Copyright (C) 2007 M. Andreas Boettcher, All rights reserved.              ##
## Released under GNU GPL Public License                                      ##
################################################################################


/***   Spanish language for the Backend
  **   By: Ernesto de la Fuente
  **   mailto:erny@anonadina.com
  **   last modified on 23/12/2008
  **
*/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//administrator/components/com_joomgallery/classes/admin.migrate2j.class.php
DEFINE('_JGA_PONYGALLERY','PonyGallery ML ');
DEFINE('_JGA_PICTURES_DIRECTORY','Carpeta de im&aacute;genes');
DEFINE('_JGA_ORIGINALS_DIRECTORY','Carpeta de im&aacute;genes originales');
DEFINE('_JGA_THUMBNAILS_DIRECTORY','Carpeta de Miniaturas');
DEFINE('_JGA_JOOMGALLERY','JoomGallery');
DEFINE('_JGA_SITESTATUS','Estado de la P&aacute;gina Web');
DEFINE('_JGA_SITE_OFFLINE','P&aacute;gina offline?');
DEFINE('_JGA_CHECK_DIRECTORIES','Existencia de los Directorios');
DEFINE('_JGA_CHECK_DATABASETABLES','Existencia e Integridad de las tablas de la base de datos');
DEFINE('_JGA_EMPTY','vac&iacute;a');
DEFINE('_JGA_ROWS','registro(s)');
DEFINE('_JGA_MIGRATION_FALSE','No se puede realizar la migraci&oacute;n.'); 
DEFINE('_JGA_MIGRATION_FALSE_LONG','Se han detectado errores al evaluar la posibilidad de la migraci&oacute;n. Por favor, revise todas las opciones marcadas en rojo. Solucione los errores y vuelva a esta p&aacute;gina de nuevo. La migraci&oacute;n s&oacute;lo se podr&aacute; realizar cuando todas las l&iacute;neas est&eacute;n en verde.'); 
DEFINE('_JGA_MIGRATION_TRUE','Se puede proceder a realizar la migraci&oacute;n.');
DEFINE('_JGA_MIGRATION_TRUE_LONG','No se han detectado errores al evaluar la posibilidad de la migraci&oacute;n. Sin embargo, ANTES de iniciar la migraci&oacute;n, deber&aacute; realizar una copia de seguridad de los <b>ficheros de Joomla y la Base de Datos</b>. Una vez terminada la copia de seguridad, pulse en el bot&oacute;n de empezar migraci&oacute;n. Por favor espere hasta que se termine la migraci&oacute;n, s&oacute;lo entonces podr&aacute; seguir trabajando en la p&aacute;gina web.');
DEFINE('_JGA_MIGRATION_MANAGER','Gestor de Migraci&oacute;n');
DEFINE('_JGA_MIGRATE_PONYGALLERY','Migrar de PonyGallery ML a JoomGallery');
DEFINE('_JGA_MIGRATIONCHECK','Resultados del test de migraci&oacute;n');
DEFINE('_JGA_MIGRATION_ORPHANPICS','Hu&eacute;rfanas (Im&aacute;genes sin usuario v&aacute;lido):');

//administrator/components/com_joomgallery/admin.upload.class.php
DEFINE('_JGA_FILES_IN_BATCH','Ficheros encontrados');
DEFINE('_JGA_FILENAME','Nombre del fichero');
DEFINE('_JGA_NEW_FILENAME','Nuevo nombre del fichero');
DEFINE('_JGA_UPLOAD_START','Importaci&oacute;n comenzada...');
DEFINE('_JGA_PROBLEM_COPYING','Problema copiando fichero a: ');
DEFINE('_JGA_CHECK_PERMISSIONS','Revise los permisos.');
DEFINE('_JGA_UPLOAD_COMPLETE','Importaci&oacute;n completada...');
DEFINE('_JGA_THUMBNAIL_CREATED','Miniatura creada...');
DEFINE('_JGA_RESIZED_TO_MAXWIDTH','Cambio de tama&ntilde;o al tama&ntilde;o m&acute;x. finalizado......');
DEFINE('_JGA_ORIGINAL_DELETED','La imagen ha sido borrada de la carpeta de las im&aacute;genes originales.');
DEFINE('_JGA_PROBLEM_DELETING_ORIGINAL','No ha sido posible borrar la imagen de la carpeta de las im&aacute;genes originales.');
DEFINE('_JGA_COULD_NOT_DETETE_PICTURE','No ha sido posible borrar la imagen');
DEFINE('_JGA_WRONG_FILENAME','Fichero err&oacute;neo o imposible copiar la imagen a la carpeta de im&aacute;genes originales.');
DEFINE('_JGA_ALERT_YOU_MUST_SELECT_CATEGORY','Debe elegir una categoría.');//ALERT
DEFINE('_JGA_UPLOAD_SUCCESSFULL','¡Importaci&oacute;n completada con &eacute;xito!');
DEFINE('_JGA_ERROR_PHP_MAXFILESIZE','El tama&ntilde;o del archivo es mayor que \'upload_max_filesize \' l&iacute;mite establecido en el php.ini!');
DEFINE('_JGA_ERROR_HTML_MAXFILESIZE','El tama&ntilde;o del archivo es mayor que MAX_FILE_SIZE , establecido en el formulario HTML!');
DEFINE('_JGA_ERROR_FILE_PARTLY_UPLOADED','¡S&oacute;lo se ha transferido una parte del fichero!');
DEFINE('_JGA_ERROR_FILE_NOT_UPLOADED','¡No se ha transferido ning&uacute;n fichero!');
DEFINE('_JGA_ERROR_TEMP_MISSING','¡El directorio temporal no existe!');
DEFINE('_JGA_ERROR_WRITING','¡Error de escritura!');
DEFINE('_JGA_ERROR_EXTENSION','La transferencia del fichero se ha interrumpido debido a un error en una de las extensiones!!');
DEFINE('_JGA_ERROR_CODE','C&oacute;digo de error: ');
DEFINE('_JGA_ERROR_UNKNOWN','¡Error desconocido!');

//administrator/components/com_joomgallery/includes/html/admin.categories.html.php
DEFINE('_JGA_CATEGORY_MANAGER','Gesti&oacute;n de Categor&iacute;as');
DEFINE('_JGA_DISPLAY','Mostrar');
DEFINE('_JGA_SEARCH','Buscar');
DEFINE('_JGA_SORT_BY_ORDER','Ordenar por');
DEFINE('_JGA_SORT_BY_TYPE','Ordenar por tipo');
DEFINE('_JGA_CATEGORY','Categor&iacute;a');
DEFINE('_JGA_PARENT_CATEGORY','Categor&iacute;a Superior');
DEFINE('_JGA_PUBLISHED','Publicada');
DEFINE('_JGA_OWNER','Propietario');
DEFINE('_JGA_TYPE','Tipo');
DEFINE('_JGA_HIT','Acceso');
DEFINE('_JGA_REORDER','Reordenar');
DEFINE('_JGA_SAVE_ORDER','Grabar Orden');
DEFINE('_JGA_USER_UPLOAD','Usuario Actualizado');
DEFINE('_JGA_ADMIN_UPLOAD','Admin Actualizado');
DEFINE('_JGA_UP','Arriba');
DEFINE('_JGA_DOWN','Abajo');
DEFINE('_JGA_ALERT_CATEGORY_MUST_HAVE_TITLE','La Categoría debe tener un título');//ALERT
DEFINE('_JGA_ADD_CATEGORY','A&ntilde;adir');
DEFINE('_JGA_TITLE','T&iacute;tulo');
DEFINE('_JGA_DESCRIPTION','Descripci&oacute;n');
DEFINE('_JGA_ORDERING','Orden');
DEFINE('_JGA_EDIT_CATEGORY','Editar ');
DEFINE('_JGA_THUMBNAIL_ALIGN','Alinear Miniaturas');
DEFINE('_JGA_THUMBNAIL','Miniatura');
DEFINE('_JGA_THUMBNAIL_PREVIEW','Vista Previa de la Miniatura');

//administrator/components/com_joomgallery/includes/html/admin.comments.html.php
DEFINE('_JGA_COMMENTS_MANAGER','Gesti&oacute;n de Comentarios');
DEFINE('_JGA_AUTHOR','Autor');
DEFINE('_JGA_TEXT','Texto');
DEFINE('_JGA_IP','IP');
DEFINE('_JGA_APPROVED','Aceptado');
DEFINE('_JGA_PICTURE','Imagen');
DEFINE('_JGA_DATE','Fecha');

//administrator/components/com_joomgallery/includes/html/admin.configuration.html.php
DEFINE('_JGA_CONFIGURATION_MANAGER','Configuraci&oacute;n');
DEFINE('_JGA_GENERAL_BACKEND_SETTINGS','Opciones Principales');
DEFINE('_JGA_PATH_DIRECTORIES','Rutas y Carpetas');
DEFINE('_JGA_PATH_DIRECTORIES_INTRO','Aqu&iacute; se establece d&oacute;nde se van a grabar sus im&aacute;genes. Aunque se pueden establecer las Rutas sin ninguna condici&oacute;n, se aconseja que las carpetas est&eacute;n dentro de la carpeta de la Galer&iacute;a. En caso contrario podr&iacute;an darse problemas de accesibilidad. Tanto si una carpeta tiene permiso de escritura c&oacute;mo si existen los ficheros de referencia, aparecer&aacute; marcado en Verde. En caso contrario aparecer&aacute; marcado en Rojo. En &uacute;ltimo lugar se puede elegir tambi&eacute;n el formato de fecha y hora de la Galer&iacute;a.');
DEFINE('_JGA_CONFIGURATION_INTRO','JoomGallery utiliza un fichero de configuraci&oacute;n en el que guarda todas las opciones del gestor de configuraci&oacute;n. Puede encontrar ese fichero, que se llama joomgallery.config.php, en la siguiente carpeta administrator/components/com_joomgallery. Ese fichero debe poder ser modificable desde la galer&iacute;a. Normalmente el fichero necesita tener el <a href="http://en.wikipedia.org/wiki/File_system_permissions" target="_blank">nivel de permisos</a> 766. A continuaci&oacute;n se muestra un mensaje que nos indica si se puede o no escribir ese fichero: ');//NEW
DEFINE('_JGA_PICTURES_PATH','Localizaci&oacute;n de las im&aacute;genes');
DEFINE('_JGA_PATH_PICTURES_STORED','Ruta del lugar d&oacute;nde se guardar&aacute;n tus im&aacute;genes. Es aqu&iacute; d&oacute;nde se guardar&aacute;n las im&aacute;genes reducidas generadas cuando la reducci&oacute;n autom&aacute;tica est&eacute; activada (ver "Procesar Im&aacute;genes"). Si no est&aacute; activada la reducci&oacute;n autom&aacute;tica, se guardar&aacute; aqu&iacute; una copia de las im&aacute;genes originales. Las im&aacute;genes de esta carpeta se utilizar&aacute;n en la Vista Detallada.');
DEFINE('_JGA_ORIGINALS_PATH','Localizaci&oacute;n de las im&aacute;genes originales');
DEFINE('_JGA_PATH_ORIGINALS_STORED','Ruta del lugar d&oacute;nde se guardar&aacute;n tus im&aacute;genes originales. Es aqu&iacute; d&oacute;nde se guardar&aacute;n las im&aacute;genes originales sin reducir. Las im&aacute;genes de esta carpeta se utilizar&aacute;n en la Vista Popup disponible cuando se haya seleccionado esa opci&oacute;n.');
DEFINE('_JGA_THUMBNAILS_PATH','Localizaci&oacute;n de las Miniaturas');
DEFINE('_JGA_PATH_THUMBNAILS_STORED','Ruta del lugar d&oacute;nde se guardar&aacute;n las Miniaturas. Es aqu&iacute; d&oacute;nde se guardar&aacute;n las Miniaturas generadas autom&aacute;ticamente. Las Miniaturas se utilizan en la Vista Previa de la Galer&iacute;a y las Categor&iacute;as, as&iacute; como en la "p&aacute;gina de &eacute;xitos". As&iacute; mismo se utilizan para generar las Mini-Miniaturas.');
DEFINE('_JGA_FTPUPLOAD_PATH','Carpeta de transferencia con FTP');
DEFINE('_JGA_PATH_FOR_FTPUPLOAD','Ruta del lugar d&oacute;nde se guardar&aacute;n las im&aacute;genes subidas desde un FTP.');
DEFINE('_JGA_TEMP_PATH','Carpeta Temporal');
DEFINE('_JGA_PATH_FOR_TEMP','Ruta de la carpeta temporal. Se utiliza para acciones puntuales, por ejemplo la extracci&oacute;n de im&aacute;genes de ficheros comprimidos en ZIP.');
DEFINE('_JGA_WATERMARK_PATH','Ruta de la carpeta de la Marca de Agua');
DEFINE('_JGA_PATH_WATERMARK_STORED','Ruta del lugar d&oacute;nde se guarda el fichero de Marca de Agua. Es obligatorio escribir aqu&iacute; una ruta aunque no se active la opci&oacute;n de Marca de Agua.');
DEFINE('_JGA_WATERMARK_FILE','Fichero de Marca de Agua');
DEFINE('_JGA_WATERMARK_FILE_LONG','Nombre del fichero de Marca de Agua. Puede elegir el nombre del fichero sin nunguna limitaci&oacute;n. El fichero debe ser del tipo transparente ".png". L&oacute;gicamente deber&aacute; estar en la carpeta seleccionada en el punto anterior.');
DEFINE('_JGA_TIME','Formato de Fecha/Hora');
DEFINE('_JGA_TIME_LONG','&iquest;Qu&eacute; formato de fecha/hora quiere utilizar?. Esta opci&oacute;n afectar&aacute; a todas las opciones de fecha y hora de la Galer&iacute;a. En algunas ocasiones la configuraci&oacute;n del Servidor modifica la opci&oacute;n seleccionada o tiene preferencia sobre ella.');
DEFINE('_JGA_BACKEND_REPLACEMENTS','Sustitutivos');
DEFINE('_JGA_BACKEND_REPLACEMENTS_INTRO','Los nombres de las im&aacute;genes y categor&iacute;as son arbitrarios. Para que los nombres de las im&aacute;genes y las categor&iacute;as se puedan guardar en el servidor es necesario eliminar los caracteres especiales. Por medio de las siguientes opciones usted elije como reemplazar esos caracteres especiales. Los sustitutivos deben formar parte de los caracteres normales A-Z o de los num&eacute;ricos 0-9. El subrayado _ tambi&eacute;n est&aacute; permitido. Los sustitutivos s&oacute;lo afectar&aacute;n a los ficheros y carpetas que tienen que guardarse en el sistema de ficheros del servidor. ¡No influir&aacute;n en los nombres mostrados en el frontend! La eliminaci&oacute;n de caracteres especiales se realiza autom&aacute;ticamente en cada caso. Si en las siguientes opciones no se elije un sustitutivo para un car&aacute;cter especial, se cancelar&aacute; el proceso sin realizar la substituci&oacute;n.');
DEFINE('_JGA_FILENAME_WITHJS','Revisar caracteres especiales');
DEFINE('_JGA_FILENAME_WITHJS_LONG','Si elige &quot;S&iacute;&quot; podr&aacute; definir en la siguiente opci&oacute;n cuales son los caracteres especiales y c&oacute;mo ser&aacute;n sustitu&iacute;dos. Los caracteres espec&iacute;ficos de cada pa&iacute;s como &quot;&auml;&quot; o &quot;&eacute;&quot; ser&aacute;n convertidos f&aacute;cilmente en &quot;ae&quot; o &quot;e&quot.');
DEFINE('_JGA_FILENAME_SEARCH','Caracteres especiales');
DEFINE('_JGA_FILENAME_SEARCH_LONG','Por favor, escriba separados por | los caracteres especiales que ser&aacute;n sustitu&iacute;dos.');
DEFINE('_JGA_FILENAME_REPLACE','Caracteres Nuevos');
DEFINE('_JGA_FILENAME_REPLACE_LONG','Por favor, escriba separados por | los nuevos caracteres que se utilizar&aacute;n para sustituir a los caracteres especiales.');
DEFINE('_JGA_PICTURE_PROCESSING','Procesar Im&aacute;genes');
DEFINE('_JGA_PICTURE_CREATOR','Procesador de Im&aacute;genes');
DEFINE('_JGA_NONE','Ninguno');
DEFINE('_JGA_GDLIB','Librer&iacute;a GD');
DEFINE('_JGA_GD2LIB','Librer&iacute;a GD2');
DEFINE('_JGA_IMAGEMAGICK','ImageMagick');
DEFINE('_JGA_FAST_GD2_THUMBCREATION','Mayor velocidad de reducci&oacute;n de las im&aacute;genes');
DEFINE('_JGA_FAST_GD2_THUMBCREATION_LONG','Si elige el procesador de im&aacute;genes &quot;Librer&iacute;a GD2&quot; podremos seleccionarla para la creaci&oacute;n de las miniaturas y tambi&eacute;n podremos utilizar una funci&oacute;n mejorada para la reducci&oacute;n de im&aacute;genes en la transferencia de las mismas. Esta funci&oacute;n permite acelerar las reducciones y adem&aacute;s acorta el tiempo necesario para la transferencia, pero necesita cuatro veces m&aacute;s memoria que el sistema anterior. Si tenemos poca memoria disponible no deberemos seleccionar esta opci&oacute;n.');
DEFINE('_JGA_PATH_TO_IMAGEMAGICK','Ruta de instalaci&oacute;n de ImageMagick');
DEFINE('_JGA_PICTURE_CREATOR_LONG','Elija el programa que gestionar&aacute; sus im&aacute;genes. El programa debe estar instalado en el Servidor y es necesario para tratar las im&aacute;genes, por ejemplo reducirlas y a&ntilde;adirles la Marca de Agua. La mayor&iacute;a de los servidores tienen una versi&oacute;n de PHP con la GD2 ya implementada. La versi&oacute;n de GD instalada en su sistema se muestra en la l&iacute;nea anterior a este p&aacute;rrafo. Si s&oacute;lo tiene instalado el programa de GD es preferible utilizar la GD2 ya que si no puede que algunas funciones importantes de tratamiento de im&aacute;genes no funcionen. Si ImageMagick est&aacute; instalado elija siempre este programa, ya que el resultado final siempre ser&aacute; mucho mejor.');
DEFINE('_JGA_RESIZING','Redimensi&oacute;n');
DEFINE('_JGA_NO','No');
DEFINE('_JGA_YES','S&iacute;');
DEFINE('_JGA_RESIZING_LONG','&iquest;Desea redimensionar sus im&aacute;genes? Si activa esta opci&oacute;n, todas las im&aacute;genes que se importen ser&aacute;n redimensionadas al formato mayor que usted haya especificado (a la menor de las medidas). Estas im&aacute;genes reducidas se utilizar&aacute;n en la Vista Detallada. Para no afectar a nuestra Plantilla es recomendable activar esta opci&oacute;n y ajustar los tama&ntilde;os de las im&aacute;genes a los de la Plantilla. Si no se activa la opci&oacute;n, las im&aacute;vgenes se ver&aacute;n con las dimensiones con las que se hayan transferido. La redimensi&oacute;n se aplica s&oacute;lo a la Vista Detallada. Las im&aacute;genes utilizadas para la Vista Popup no se modifican y se muestran con sus dimensiones de transferencia originales. Si quiere modificar las dimensiones de las im&aacute;genes que se ver&aacute;n en la Vista Popup deber&aacute; hacerlo antes de transferirlas a la p&aacute;gina web.');
DEFINE('_JGA_MAX_WIDTH','M&aacute;xima Anchura y Altura');
DEFINE('_JGA_MAX_WIDTH_LONG','Tama&ntilde;o m&aacute;ximo de las im&aacute;genes. Esta opci&oacute;n s&oacute;lo tiene efecto si est&aacute; activada la Redimensi&oacute;n. El valor especificado (en p&iacute;xeles) establece las dimensiones m&aacute;ximas de la imagen ajust&aacute;ndolas al ancho y al alto. Es decir, se va a redimensionar la imagen haciendo que la mayor de las dos dimensiones se convierta en el valor aqu&iacute; introducido.');
DEFINE('_JGA_PICTURE_QUALITY','Calidad');
DEFINE('_JGA_PICTURE_QUALITY_LONG','Calidad de la imagen una vez redimensionada. Esta opci&oacute;n se aplicar&aacute; s&oacute;lo si la Redimensi&oacute;n est&aacute; activada. El valor introducido (en porcentaje) nos dice la calidad de las im&aacute;genes redimensionadas respecto de las originales. Hay que tener en cuenta que a mayor Calidad m&aacute;s espacio necesitaremos en el Servidor.');
DEFINE('_JGA_THUMBNAILS_INTRO','Las Miniaturas son copias reducidas de las im&aacute;genes. Se utilizan como vista previa de las im&aacute;genes de la Categor&iacute;a, en las "p&aacute;ginas de &eacute;xitos" y si se desea en la vista principal de la Galer&iacute;a. Todas las opciones de transferencia de im&aacute;genes, tanto del backend como del frontend, crear&aacute;n las miniaturas autom&aacute;ticamente. Las opciones que seleccione aqu&iacute; se aplicar&aacute;n a la creaci&oacute;n de todas las Miniaturas.');
DEFINE('_JGA_DIRECTION_RESIZE','Conversi&oacute;n de las Miniaturas');
DEFINE('_JGA_SAMEHIGHT','seg&uacute;n la altura');
DEFINE('_JGA_SAMEWIDTH','seg&uacute;n la anchura');
DEFINE('_JGA_DIRECTION_RESIZE_LONG','El objetivo de la conversi&oacute;n de miniaturas es mostrarlas todas con la misma anchura o altura, independientemente del formato de la imagen original (retrato o paisaje). Si elegimos, por ejemplo, "seg&uacute;n altura" se crear&aacute;n todas las Miniaturas con la misma Altura y con la Anchura correspondiente. Si ponemos valores iguales en las dos opciones siguientes, las miniaturas se crear&aacute;n con la misma proporci&oacute;n altura-anchura que las originales, limitando el tama&ntilde;o al valor introducido a continuaci&oacute;n.');
DEFINE('_JGA_THUMBNAIL_WIDTH','Anchura de la Miniatura');
DEFINE('_JGA_THUMBNAIL_WIDTH_LONG','Es el valor de la anchura m&aacute;xima cuando la conversi&oacute;n se realice "seg&uacute;n la altura".');
DEFINE('_JGA_THUMBNAIL_HEIGHT','Altura de la Miniatura');
DEFINE('_JGA_THUMBNAIL_HEIGHT_LONG','Es el valor de la altura m&aacute;xima cuando la conversi&oacute;n se realice "seg&uacute;n la anchura".');
DEFINE('_JGA_THUMBNAIL_QUALITY','Calidad de la Miniatura');
DEFINE('_JGA_THUMBNAIL_QUALITY_LONG','Este valor (introducido como porcentaje) establece con qu&eacute; calidad se van a crear las miniaturas respecto de la imagen original. Hay que tener en cuenta que a mayor Calidad m&aacute;s espacio necesitaremos en el Servidor.');
DEFINE('_JGA_BACKEND_UPLOAD','Transferencias desde el Backend');
DEFINE('_JGA_UPLOAD_ORDER','Orden de los n&uacute;meros');
DEFINE('_JGA_NO_ORDER','ninguno');
DEFINE('_JGA_DESCENDING','descendente');
DEFINE('_JGA_ASCENDING','ascendente');
DEFINE('_JGA_UPLOAD_ORDER_LONG','&iquest;Quiere asignar un n&uacute;mero de orden autom&aacute;tico a las im&aacute;genes? &iquest;C&oacute;mo quiere ordenarlas? La ordenaci&oacute;n num&eacute;rica nos ayuda a organizar las im&aacute;genes en el Frontend. El orden num&eacute;rico se guarda en la base de datos y puede modificarse despu&eacute;s desde la "Gesti&oacute;n de Im&aacute;genes". La numeraci&oacute;n autom&aacute;tica al transferir las im&aacute;genes facilita la organizaci&oacute;n de las mismas en el Frontend y la gesti&oacute;n de las mismas desde el Backend. Lo m&aacute;s habitual es elegir "Orden Ascendente". (Esta opci&oacute;n se aplica tambi&eacute;n a las transferencias de im&aacute;genes realizadas por los usuarios desde el Frontend).');
DEFINE('_JGA_ORIGINAL_FILENAME','Nombre original del fichero');
DEFINE('_JGA_ORIGINAL_FILENAME_LONG','&iquest;Utilizar el nombre original del fichero como nombre de la imagen?');
DEFINE('_JGA_FILENAMENUMBER','Numeraci&oacute;n');
DEFINE('_JGA_FILENAMENUMBER_LONG','&iquest;Desea que las im&aacute;genes transferidas se numeren de forma consecutiva?');
DEFINE('_JGA_DELETE_ORIGINAL','&iquest;Borrar originales despu&eacute;s de la transferencia?');
DEFINE('_JGA_DELETE_ALL_ORIGINALS','Borrar todas las im&aacute;genes originales');
DEFINE('_JGA_DELETE_ORIGINAL_CHECKBOX','Preguntar cada vez');
DEFINE('_JGA_DELETE_ORIGINAL_LONG','Si activa esta opci&oacute;n, una vez finalizada la transmisi&oacute;n de im&aacute;genes, se borrar&aacute;n las im&aacute;genes originales de la carpeta correspondiente. Es una opci&oacute;n importante si se tiene poco sitio en el Servidor y si no quiere depender de la funci&oacute;n de Vista Popup (al borrar el original no tiene sentido ampliar a una imagen que tiene el mismo tama&ntilde;o). Si selecciona "Preguntar cada vez", cada vez que transfiera im&aacute;genes aparecer&aacute; un cuadro de di&aacute;logo que nos preguntar&aacute; si queremos borrar o no los originales.');
DEFINE('_JGA_WRONG_VALUE_COLOR','Color de fondo para Campos err&oacute;neos');
DEFINE('_JGA_WRONG_VALUE_COLOR_LONG','El color de fondo de los campos a rellenar de la secci&oacute;n de transferencias que contengan datos err&oacute;neos o insuficientes se cambiar&aacute; al color fijado en esta opci&oacute;n. Ya sea con su valor Hexadecimal o con el nombre literal del color en ingl&eacute;s.<br />Por favor, si no quiere que se cambie el color de fondo deje este campo Vac&iacute;o.');
DEFINE('_JGA_MORE_FUNCTIONS','Otras Funciones');//NEW
DEFINE('_JGA_COMBUILDER_SETTING_CB','Community Builder (y CBE superior a v1)'); //NEW
DEFINE('_JGA_COMBUILDER_SETTING_CBE','Community Builder Avanzado'); //NEW
DEFINE('_JGA_COMBUILDER_SETTING_JOMSOCIAL','JomSocial'); //NEW
DEFINE('_JGA_COMBUILDER_SUPPORT','Tipos de Usuarios Soportados'); //NEW
DEFINE('_JGA_COMBUILDER_SUPPORT_LONG','Si ha instalado y activado <a href="http://www.joomlapolis.com/">Community Builder</a>, <a href="http://www.kolloczek.com">Community Builder Avanzado</a> o <a href="http://www.jomsocial.com/">JomSocial</a> aqu&iacute; puede establecer que tipo de usuarios (p.ej. autores de im&aacute;genes o comentarios) tendr&aacute;n un v&iacute;nculo a su perfil. Si no tiene instalado CB / CBE seleccione &quot;No&quot;. Seleccione la tercera opci&oacute;n para <a href="http://www.joomla-cbe.de/">&quot;nuevo&quot; CBE</a> (v&iacute;nculo y carpeta com_cbe).'); //NEW
DEFINE('_JGA_USERNAME_REALNAME','&iquest;Mostrar el nombre real en vez del nombre de usuario?'); //NEW
DEFINE('_JGA_USERNAME_REALNAME_LONG','&iquest;Desea que se muestre en la galer&iacute;a el nombre real en lugar del nombre de usuario (p.ej. autores de im&aacute;genes o comentarios)?'); //NEW
DEFINE('_JGA_BRIDGE_SETTINGS','Puentes');
DEFINE('_JGA_BRIDGE_INSTALLED','&iquest;Instalar el Puente?');
DEFINE('_JGA_BRIDGE_INSTALLED_LONG','&iquest;Quiere activar un puente en su sistema? Un Puente es un instrumento que relaciona la Galer&iacute;a con otros componentes de Joomla o con otros programas. La posibilidad de utilizar Puentes individuales est&aacute; inclu&iacute;da en el c&oacute;digo de la Galer&iacute;a. De esta forma todas las variables de sistema de Joomla y de la Galer&iacute;a est&aacute;n disponibles para ser utilizadas. Si no utiliza actualmente ning&uacute;n Puente, por favor seleccione &quot;No&quot; .');
DEFINE('_JGA_COOLIRIS_SUPPORT','Sistema Cooliris');//NEW
DEFINE('_JGA_COOLIRIS_SUPPORT_LONG','Con el plug-in &quot;Cooliris&quot; (antiguamente PicLens) instalado, se pueden ver las im&aacute;genes de una galer&iacute;a a pantalla completa. Puede encontrar m&aacute;s informaci&oacute;n <a href="http://www.cooliris.com/">aqu&iacute;</a>. Si selecciona &quot;s&iacute;&quot; en la opci&oacute;n aparecer&aacute; un peque&ntilde;o icono en la parte inferior izquierda de la miniatura cuando el cursor pase por encima de ella. Al pulsar en el icono se abrir&aacute; la Galer&iacute;a Cooliris. En la galer&iacute;a Cooliris las p&aacute;ginas se cargar&aacute;n din&aacute;micamente, seg&uacute;n el dise&ntilde;o de p&aacute;ginas establecido en JoomGallery, cambiando de p&aacute;gina al mover la barra lateral. Cooliris no funcionar&aacute; si tenemos activada la Mesa de Luz (Lightbox) en la vista de categor&iacute;a.');//NEW
DEFINE('_JGA_COOLIRIS_LINK','V&iacute;nculo para iniciar Cooliris');//NEW
DEFINE('_JGA_COOLIRIS_LINK_LONG','&iquest;Desea que se muestre un v&iacute;nculo a la galer&iacute;a cooliris en la vista de categor&iacute;a? Puede modificar el texto del v&iacute;nculo modificando la constante de lenguaje _JGS_COOLIRISLINK_TEXT.');//NEW
DEFINE('_JGA_USER_RIGHTS','Derechos de los Usuarios');
DEFINE('_JGA_USER_UPLOAD_SETTINGS','Transferencias de Usuarios');
DEFINE('_JGA_ALLOWED_USERSPACE','Permitir Im&aacute;genes de los Usuarios');
DEFINE('_JGA_ALLOWED_USERSPACE_LONG','Establezca si los Usuarios pueden transferir sus im&aacute;genes o pueden crear categor&iacute;as.<br /><b>Si NO se permite, las siguientes opciones y las que se encuentran en <i>Opciones de Frontend &raquo; Panel de Usuario</i>, no ser&aacute;n tenidas en cuenta.</b>');
DEFINE('_JGA_APPROVAL_NEEDED','Autorizaci&oacute;n necesaria del Administrador');
DEFINE('_JGA_APPROVAL_NEEDED_LONG','Las im&aacute;genes transferidas por los Usuarios necesitan ser autorizadas por el Administrador antes de que aparezcan publicadas en el Frontend (S&iacute;). En caso contrario ser&aacute;n publicadas directamente en el Frontend (No). ');
DEFINE('_JGA_ALLOWED_CAT','Categor&iacute;as autorizadas');
DEFINE('_JGA_ALLOWED_CAT_LONG','Elija a qu&eacute; categor&iacute;as de la lista de Categor&iacute;as pueden los Usuarios transferir sus im&aacute;genes desde la opci&oacute;n &quot;My Gallery&quot; . En el proceso de transferencia de im&aacute;genes de los usuarios, ser&aacute;n estas las &uacute;nicas categor&iacute;as disponibles. Si no se selecciona ninguna, la transmisi&oacute;n de ficheros desde el Frontend no se podr&aacute; utilizar!');
DEFINE('_JGA_ALLOWED_USERCAT','Categor&iacute;as de los Usuarios: ');
DEFINE('_JGA_ALLOWED_USERCAT_LONG','Seleccione si los Usuarios pueden crear sus propias categor&iacute;as.');
DEFINE('_JGA_ALLOWED_USERCATPARENT','Permisos para categor&iacute;as de usuarios: ');
DEFINE('_JGA_ALLOWED_USERCATPARENT_LONG','Elija en qu&eacute; categor&iacute;as puede el usuario crear sus propias categor&iacute;as '); 
DEFINE('_JGA_USERCATACC','Permitir a los usuarios cambiar el nivel de acceso'); 
DEFINE('_JGA_USERCATACC_LONG','Elija si los usuarios pueden modificar el nivel de acceso para sus categor&iacute;as. El usuario no puede establecer un nivel inferior al establecido en el backend. As&iacute; mismo, como m&aacute;ximo podr&aacute; establecer que sea el de usuario registrado. Los administradores tienen plena libertad para cambiar el nivel de acceso.');
DEFINE('_JGA_USERCATSOWNUPLOAD','Transferir im&aacute;genes s&oacute;lo a nuestras categor&iacute;as:');//NEW
DEFINE('_JGA_USERCATSOWNUPLOAD_LONG','Si selecciona s&iacute;, el usuario s&oacute;lo podr&aacute; transferir im&aacute;genes a las categor&iacute;as de las que sea propietario y a las seleccionadas en el backend, siempre que no hayan sido creadas por otros usuarios.');//NEW
DEFINE('_JGA_MAX_ALLOWED_USERCATS','M&aacute;ximas Categor&iacute;as de Usuarios: ');
DEFINE('_JGA_MAX_ALLOWED_USERCATS_LONG','&iquest;Cu&aacute;ntas Categor&iacute;as puede crear, como mucho, cada Usuario?.'); 
DEFINE('_JGA_MAX_ALLOWED_PICS','N&uacute;mero m&aacute;ximo de im&aacute;genes');
DEFINE('_JGA_MAX_ALLOWED_PICS_LONG','Este ser&aacute; el l&iacute;mite de im&aacute;genes que un usuario podr&aacute; transferir a la Galer&iacute;a (en total, no cada vez). Cuando se alcance este l&iacute;mite se comunicar&aacute; al Usuario y se bloquear&aacute; la opci&oacute;n de seguir transfiriendo.');
DEFINE('_JGA_MAX_ALLOWED_FILESIZE','Tama&ntilde;o m&aacute;ximo de las im&aacute;genes');
DEFINE('_JGA_MAX_ALLOWED_FILESIZE_LONG','M&aacute;ximo tama&ntilde;o que puede tener en bytes cada imagen que transfiera el usuario. S&oacute;lo afecta a las transferencias de los Usuarios desde el Frontend!');
DEFINE('_JGA_MAX_UPLOAD_FIELDS','N&uacute;mero de campos de selecci&oacute;n de im&aacute;genes');
DEFINE('_JGA_MAX_UPLOAD_FIELDS_LONG','Establece el n&uacute;mero de im&aacute;genes (una por campo) que el Usuario puede seleccionar y transferir de una vez.');
DEFINE('_JGA_USERUPLOAD_NUMBERING','Numerar');
DEFINE('_JGA_USERUPLOAD_NUMBERING_LONG','&iquest;Quiere aplicar una numeraci&oacute;n consecutiva al nombre de las im&aacute;genes mientras se transfieren? Hay que tener esto en cuenta siempre que se esten utilizando componentes que necesiten nombres &uacute;nicos.');
DEFINE('_JGA_ALLOW_SPECIAL_GIF_UPLOAD','&iquest;Permitir la transferencia de im&aacute;genes especiales?');
DEFINE('_JGA_ALLOW_SPECIAL_GIF_UPLOAD_LONG','Las im&aacute;genes animadas (GIF) y las transparentes (PNG) no se pueden transferir sin p&eacute;rdidas debidas al programa de tratamiento de im&aacute;genes. Activando esta opci&oacute;n se permite a los usuarios transferir im&aacute;genes animadas y transparentes. En este caso no ser&aacute;n redimensionadas, sino que se utilizar&aacute;n en las distintas vistas a su tama&ntilde;o original. Se mostrar&aacute; al usuario un recuadro de selecci&oacute;n con una explicaci&oacute;n adicional. ');
DEFINE('_JGA_DELETE_ORIGINAL_USER_LONG','Esta opci&oacute;n permite a los usuarios borrar las im&aacute;genes originales de la carpeta correspondiente despu&eacute;s de la transferencia. Es una opci&oacute;n importante si se tiene poco sitio en el Servidor y si no quiere depender de la funci&oacute;n de Vista Popup (al borrar el original no tiene sentido ampliar a una imagen que tiene el mismo tama&ntilde;o). Si selecciona "Preguntar cada vez", cada vez que transfiera im&aacute;genes aparecer&aacute; un cuadro de di&aacute;logo que nos preguntar&aacute; si queremos borrar o no los originales.');
DEFINE('_JGA_SHOW_COPYRIGHT','&iquest;Mostrar aviso de copyright?');
DEFINE('_JGA_SHOW_COPYRIGHT_LONG','&iquest;Quiere mostrar un aviso de copyright en el formulario de transferencias que avise al usuario de que las im&aacute;genes que transfiera deben ser de uso libre o propias? El texto se puede establecer modificando la constante del frontend _JGS_NEW_PICTURE_COPYRIGHT .<br /><b>NOTA!! El texto que viene escrito por defecto, es s&oacute;lo un ejemplo. No es un texto seg&uacute;n las leyes de derecho. En cada uno de los casos deber&aacute; consultarse a un abogado a la hora de formular el texto!<br /></b>');
DEFINE('_JGA_SHOW_UPLOADNOTE','&iquest;Mostrar l&iacute;mites de transferencia?');
DEFINE('_JGA_SHOW_UPLOADNOTE_LONG','&iquest;Desea informar al usuario de cu&aacute;l es el tama&ntilde;o m&aacute;ximo de cada imagen y del n&uacute;mero m&aacute;ximo de im&aacute;genes que puede transferir?');
DEFINE('_JGA_RATE_SETTINGS','Valoraciones');
DEFINE('_JGA_ALLOW_RATING','Permitir Valoraciones');
DEFINE('_JGA_ALLOW_RATING_LONG','Esta opci&oacute;n muestra un campo de valoraci&oacute;n en la vista de detalle y permite que los usuarios valoren las im&aacute;genes. El &aacute;mbito de valoraci&oacute;n se puede fijar en la opci&oacute;n siguiente. ');
DEFINE('_JGA_HIGHEST_RATING','Valoraci&oacute;n M&aacute;xima');
DEFINE('_JGA_HIGHEST_RATING_LONG','Si la valoraci&oacute;n por los usuarios est&aacute; seleccionada, puede establecer aqu&iacute; el rango de valoraci&oacute;n. El valor introducido corresponde a la m&aacute;xima valoraci&oacute;n permitida. ');
DEFINE('_JGA_ALLOW_RATING_ONLY_REGUSER','Las valoraciones s&oacute;lo las pueden realizar los usuarios registrados');
DEFINE('_JGA_ALLOW_RATING_ONLY_REGUSER_LONG','&iquest;Desea que las im&aacute;genes s&oacute;lo sean valoradas por los usuarios registrados? Si elige que S&iacute;, s&oacute;lo se permitir&aacute; valorar im&aacute;genes a estos usuarios. Adem&aacute;s, esta opci&oacute;n impide que los usuarios voten m&aacute;s de una vez a una misma imagen.');
DEFINE('_JGA_COMMENT_SETTINGS','Comentarios');
DEFINE('_JGA_ALLOW_COMMENTS','Permitir Comentarios');
DEFINE('_JGA_ALLOW_COMMENTS_LONG','Esta opci&oacute;n muestra un campo de comentarios en la Vista de Detalle y permite escribir comentarios a los usuarios registrados. Tambi&eacute;n hace que se muestren los comentarios que ya se hayan hecho de la imagen en cuesti&oacute;n. ');
DEFINE('_JGA_ALLOW_ANONYM_COMMENTS','Comentarios An&oacute;nimos');
DEFINE('_JGA_ALLOW_ANONYM_COMMENTS_LONG','Esta opci&oacute;n permite que los usuarios no registrados puedan realizar comentarios. Estos ser&aacute;n registrados como "comentarios invitados". ');
DEFINE('_JGA_NAMED_ANONYM_COMMENTS','Comentarios An&oacute;nimos con nombre');
DEFINE('_JGA_NAMED_ANONYM_COMMENTS_LONG','Normalmente los comentarios an&oacute;nimos se registran como "comentarios invitados". Con esta opci&oacute;n permitimos a los invitados escribir su nombre.');
DEFINE('_JGA_COMMENTS_APPROVE_NEEDED','El Administrador debe Autorizar los Comentarios');
DEFINE('_JGA_ONLY_UNREGUSERS','S&oacute;lo usuarios NO registrados');
DEFINE('_JGA_REG_AND_UNREGUSERS','Tambi&eacute;n los usuarios registrados');
DEFINE('_JGA_COMMENTS_APPROVE_NEEDED_LONG','Normalmente los comentarios se publican en cuanto se env&iacute;an. En esta opci&oacute;n podemos hacer que los comentarios tengan que ser autorizados por el Administrador para que sean publicados (en este caso el administrador recibir&aacute; un mensaje en el backend comunic&aacute;ndole que se ha realizado un comentario). En el caso de seleccionar que S&iacute;, deber&aacute; elegir para qu&eacute; tipo de usuarios se va a exigir la autorizaci&oacute;n.');
DEFINE('_JGA_CAPTCHA_COMMENTS','Proteger los comentarios del SPAM:');
DEFINE('_JGA_CAPTCHA_COMMENTS_LONG','Los campos de comentarios son utilizados a menudo para env&iacute;ar Spam. La mayor&iacute;a de estos mensajes, los generan autom&aacute;ticamente otros ordenadores. Nos podemos proteger de estos por medio de un sistema que genere im&aacute;genes que representen c&oacute;digos (combinaci&oacute;n de letras y n&uacute;meros), los cuales no pueden ser descifrados por otros ordenadores. &iquest;Quiere mostrar debajo del campo de comentario ese campo de c&oacute;digo y exigir a los usuarios que introduzcan ese c&oacute;digo para validar el comentario?. En este caso, deber&aacute; elegir para qu&eacute; tipo de usuarios se aplicar&aacute; esta opci&oacute;n. ');
DEFINE('_JGA_ALLOW_COMMENTS_BBCODE','Permitir BBCode');
DEFINE('_JGA_ALLOW_COMMENTS_BBCODE_LONG','Permite la utilizaci&oacute;n de BBcode sencillo en los Comentarios.');
DEFINE('_JGA_ALLOW_COMMENTS_SMILIES','Permitir Smilies');
DEFINE('_JGA_ALLOW_COMMENTS_SMILIES_LONG','Permite la utilizaci&oacute;n de Smilies en los Comentarios.');
DEFINE('_JGA_ALLOW_COMMENTS_ANISMILIES','Smilies Animados');
DEFINE('_JGA_ALLOW_COMMENTS_ANISMILIES_LONG','Permite la utilizaci&oacute;n de Smilies Animados en los Comentarios, siempre que se permita el uso de Smilies en general.');
DEFINE('_JGA_SMILIES_COLOR','Combinaci&oacute;n de Colores de los Smilies');
DEFINE('_JGA_GREY','gris');
DEFINE('_JGA_ORANGE','naranja');
DEFINE('_JGA_YELLOW','amarillo');
DEFINE('_JGA_BLUE','azul');
DEFINE('_JGA_SMILIES_COLOR_LONG','Establece de qu&eacute; color van a ser los Smilies.');
DEFINE('_JGA_FRONTEND_SETTINGS','Opciones del Frontend');
DEFINE('_JGA_PICORDER','Orden de las im&aacute;genes');
DEFINE('_JGA_PICORDER_INTRO','Estas opciones afectar&aacute;n al orden de las im&aacute;genes en el Frontend. Las im&aacute;genes se pueden ordenar en funci&oacute;n de tres criterios: el orden num&eacute;rico, la fecha de transferencia y el nombre de la imagen. Cada uno de estos criterios se puede seleccionar en orden ascendente o descendente. Las prioridades se aplicar&aacute;n en funci&oacute;n del orden fijado a continuaci&oacute;n.');
DEFINE('_JGA_PICORDER_FIRST','Primer criterio de ordenaci&oacute;n');
DEFINE('_JGA_ORDERBY_ORDERING_ASC','Por orden num&eacute;rico Ascendente');
DEFINE('_JGA_ORDERBY_ORDERING_DESC','Por orden num&eacute;rico Descendente');
DEFINE('_JGA_ORDERBY_UPLOADTIME_ASC','Por fecha de transferencia Ascendente');
DEFINE('_JGA_ORDERBY_UPLOADTIME_DESC','Por fecha de transferencia Descendente');
DEFINE('_JGA_ORDERBY_PICTITLE_ASC','Por nombre de imagen Ascendente');
DEFINE('_JGA_ORDERBY_PICTITLE_DESC','Por nombre de imagen Descendente');
DEFINE('_JGA_PICORDER_FIRST_LONG','Establece seg&uacute;n qu&eacute; criterio y qu&eacute; orden, se ordenar&aacute;n las im&aacute;genes en Primer lugar.');
DEFINE('_JGA_PICORDER_SECOND','Segundo criterio de ordenaci&oacute;n');
DEFINE('_JGA_PICORDER_NO','');
DEFINE('_JGA_PICORDER_SECOND_LONG','Establece seg&uacute;n qu&eacute; criterio y qu&eacute; orden, se ordenar&aacute;n las im&aacute;genes en Segundo lugar.');
DEFINE('_JGA_PICORDER_THIRD','Tercer criterio de ordenaci&oacute;n');
DEFINE('_JGA_PICORDER_THIRD_LONG','Establece seg&uacute;n qu&eacute; criterio y qu&eacute; orden, se ordenar&aacute;n las im&aacute;genes en Tercer lugar.');
DEFINE('_JGA_PAGETITLE_SETTINGS','T&iacute;tulo de la P&aacute;gina');
DEFINE('_JGA_PAGETITLE_SETTINGS_INTRO','El t&iacute;tulo de la p&aacute;gina es importante ya que se muestra en la cabecera del navegador y en las etiquetas. El navegador tambi&eacute;n lo utiliza para los Favoritos o Marcadores y para el Historial. Adem&aacute;s el t&iacute;tulo de la p&aacute;gina es un dato importante para los buscadores y a menudo lo muestran como un enlace en sus listados. Por defecto el t&iacute;tulo de la p&aacute;gina es &quot;Galer&iacute;a&quot;. Podemos cambiarlo, cambiando la constante _JGS_GALLERY del fichero de idiomas del frontend. En las siguientes opciones, podr&aacute; a&ntilde;adir m&aacute;s componentes al t&iacute;tulo de la p&aacute;gina: la vista de categor&iacute;a y la vista de detalle.');
DEFINE('_JGA_PAGETITLE_CATVIEW','T&iacute;tulo de la P&aacute;gina de la Vista de Categor&iacute;a');
DEFINE('_JGA_PAGETITLE_CATVIEW_LONG','Esta opci&oacute;n nos permite modificar el t&iacute;tulo de la p&aacute;gina en funci&oacute;n de la vista previa de la categor&iacute;a. Si pone <b>#cat</b> en este campo, a&ntilde;adir&aacute; el nombre de la categor&iacute;a al del t&iacute;tulo general de la p&aacute;gina. Se permiten descripciones adicionales del tipo "<i>categor&iacute;a:</i>".<br /><b>Atenci&oacute;n:</b> Para un sistema multi-lenguaje puede utilizar tambi&eacute;n las variables del fichero de lenguaje del Frontend. "<i>[! _JGS_CATEGORY !]</i>" por ejemplo, insertar&aacute; la definici&oacute;n de "<i>category</i>" que se haya establecido en el fichero de lenguaje de la galer&iacute;a. No se permite en este campo ning&uacute;n c&oacute;digo <b>HTML</b> o <b>PHP</b> !');
DEFINE('_JGA_PAGETITLE_DETAILVIEW','T&iacute;tulo de la P&aacute;gina de la Vista de Detalle');
DEFINE('_JGA_PAGETITLE_DETAILVIEW_LONG','Tiene el mismo formato que la Vista de Categor&iacute;a a&ntilde;adiendo adem&aacute;s la etiqueta <b>#img</b> para el t&iacute;tulo de la imagen. Si escribimos en el campo de esta opci&oacute;n &quot;#cat - #img&quot; y con tal de que el nombre de la categor&iacute;a sea &quot;vacation photos&quot; y que la imagen se llame &quot;Mallorca&quot; , el t&iacute;tulo de la p&aacute;gina en la Vista de Detalle ser&aacute;: &quot;Galler&iacute;a - vacation photos - Mallorca&quot; ;-)');
DEFINE('_JGA_HEADER_AND_FOOTER','Cabecera y Pie de P&aacute;gina');
DEFINE('_JGA_HEADER_AND_FOOTER_INTRO','En esencia la galer&iacute;a est&aacute; dividida en tres partes: la zona de cabecera en la parte superior, la zona de contenidos en el medio y el pie de p&aacute;gina en la parte inferior. La zona de contenidos var&iacute;a en funci&oacute;n de las distintas galer&iacute;as y de las funciones seleccionadas, mientras que la cabecera y el pie de p&aacute;gina permanecen inalterables.');
DEFINE('_JGA_SHOW_GALLERYHEAD','T&iacute;tulo de la Galer&iacute;a');
DEFINE('_JGA_SHOW_GALLERYHEAD_LONG','&iquest;Desea que se muestre el T&iacute;tulo de la Galer&iacute;a? El t&iacute;tulo de la galer&iacute;a se mostrar&aacute; debajo de la ruta de la galer&iacute;a. El nombre que se muestra por defecto es el de &quot;Gallery&quot;. Puede modificarlo editando la constante _JGS_GALLERY en el fichero de lenguaje del Frontend.');
DEFINE('_JGA_SHOW_PATHWAY','Mostrar Navegaci&oacute;n de la Galer&iacute;a');
DEFINE('_JGA_SHOW_IN_HEADER','en la Cabecera');
DEFINE('_JGA_SHOW_IN_FOOTER','en el Pie de P&aacute;gina');
DEFINE('_JGA_SHOW_IN_HEADERFOOTER','en la Cabecera y en el Pie de P&aacute;gina');
DEFINE('_JGA_SHOW_PATHWAY_LONG','&iquest;D&oacute;nde quiere que se muestre la Navegaci&oacute;n? La Navegaci&oacute;n de la Galer&iacute;a es normalmente un enlace a la Vista Previa de la Galer&iacute;a y nos dice qu&eacute; parte de la Galer&iacute;a estamos viendo.');
DEFINE('_JGA_COMPLETE_BREADCRUMBS','&iquest;Mostrar Navegaci&oacute;n de Joomla?');//NEW
DEFINE('_JGA_COMPLETE_BREADCRUMBS_LONG','La Navegaci&oacute;n de Joomla se puede completar con la de la galer&iacute;a de JoomGallery. El aspecto ser&iacute;a el siguiente: <i>Inicio &raquo; Galer&iacute;a &raquo; Nombre de Categor&iacute;a &raquo; Nombre de Subcategor&iacute;a </i><br />Esta funci&oacute;n <b>s&oacute;lo</b> est&aacute; disponible para <b>Joomla 1.5</b>.');//NEW
DEFINE('_JGA_SHOW_SEARCHFIELD','Mostrar Buscar');
DEFINE('_JGA_SHOW_SEARCHFIELD_LONG','&iquest;Desea que el usuario vea la opci&oacute;n Buscar?');
DEFINE('_JGA_SHOW_ALLPICS','&iquest;Mostrar el n&uacute;mero total de im&aacute;genes?');
DEFINE('_JGA_NO_DISPLAY','No Mostrar');
DEFINE('_JGA_SHOW_ALLPICS_LONG','&iquest;Desea mostrar el n&uacute;mero total de im&aacute;genes de todas las categor&iacute;as? En caso afirmativo, &iquest;D&oacute;nde quiere que se muestren?');
DEFINE('_JGA_SHOW_ALLHITS','&iquest;Mostrar el n&uacute;mero total de accesos?');
DEFINE('_JGA_SHOW_ALLHITS_LONG','&iquest;Desea mostrar el n&uacute;mero total de accesos de todas las im&aacute;genes de todas las categor&iacute;as? Se mostrar&aacute;n con el n&uacute;mero total de im&aacute;genes, s&oacute;lo en el caso de que este se muestre.');
DEFINE('_JGA_SHOW_BACKLINK','&iquest;Mostrar Volver?');
DEFINE('_JGA_SHOW_BACKLINK_LONG','&iquest;Desea mostrar el enlace Volver y en ese caso d&oacute;nde? El enlace Volver le llevar&aacute; a la p&aacute;gina anterior o a la galer&iacute;a o a la vista de la categor&iacute;a dependiendo de en que zona de la galer&iacute;a se encuentre en ese momento.');
DEFINE('_JGA_SHOW_CREDITS','Mostrar R&oacute;tulos de Cr&eacute;ditos');
DEFINE('_JGA_SHOW_CREDITS_LONG','&iquest;Desea mostrar los R&oacute;tulos de Cr&eacute;ditos de JoomGallery ("Powered by ...") ?');
DEFINE('_JGA_USER_PANEL','Panel de Usuario');
DEFINE('_JGA_SHOW_USER_PANEL','Mostrar ');
DEFINE('_JGA_DISPLAY_TO_RMSM','Mostrar s&oacute;lo para RM y SM');
DEFINE('_JGA_DISPLAY_TO_SM','Mostrar s&oacute;lo para SM');
DEFINE('_JGA_DISPLAY_TO_ALL','Mostrar para todos');
DEFINE('_JGA_SHOW_USER_PANEL_LONG','&iquest;Qui&eacute;n queremos que pueda ver el enlace "My Gallery"? &quot;My Gallery&quot; se puede definir como el panel de control de los usuarios en el frontend. En &eacute;ste lugar los usuarios podr&aacute;n transferir, borrar o modificar im&aacute;genes, dependiendo de las opciones que se hayan pre-establecido. Las im&aacute;genes transferidas se muestran en una lista. Si los usuarios pueden transferir las im&aacute;genes a m&aacute;s de una categor&iacute;a, aqu&iacute; podr&aacute;n moverlas de la una a la otra.');
DEFINE('_JGA_SHOW_ALLPICSTOADMIN','&iquest;Mostrar todas las im&aacute;genes a los administradores?');
DEFINE('_JGA_SHOW_ALLPICSTOADMIN_LONG','Aqu&iacute; establecemos si los usuarios de tipo Admin pueden ver todas las fotos en el Panel de Control. Independientemente de qui&eacute;n sea el propietario.');
DEFINE('_JGA_SHOW_MINITHUMBS','&iquest;Mostrar Mini Miniaturas?');
DEFINE('_JGA_SHOW_MINITHUMBS_LONG','&iquest;Desea mostrar Mini Miniaturas en "My Gallery"? Si se activa esta opci&oacute;n, se mostrar&aacute; una peque&ntilde;a Miniatura al lado del nombre de la imagen para orientarnos mejor. Cuantas m&aacute;s im&aacute;genes tenga la galer&iacute;a con la que estemos trabajando, m&aacute;s tiempo tendremos que esperar para que se cargue.');
DEFINE('_JGA_POPUP_SETTINGS','Funciones Popup');
DEFINE('_JGA_POPUP_OPENJS_BORDERPX','Anchura del borde');
DEFINE('_JGA_POPUP_OPENJS_BORDERPX_LONG','Anchura del borde que se establecer&aacute; alrededor del lightbox y del &aacute;rea del sistema DHTML.');
DEFINE('_JGA_POPUP_OPENJS_BACKGROUND','Color de fondo');
DEFINE('_JGA_POPUP_OPENJS_BACKGROUND_LONG','Color de fondo del lightbox y del &aacute;rea del sistema DHTML.');
DEFINE('_JGA_STYLE_COLOR_HEX','Se puede fijar con el nombre del color en ingl&eacute;s o con su c&oacute;digo en hexadecimal.');
DEFINE('_JGA_POPUP_DHTML_BORDER','Color del Borde');
DEFINE('_JGA_POPUP_DHTML_BORDER_LONG','Color del borde del &aacute;rea del sistema DHTML.');
DEFINE('_JGA_POPUP_DHTML_SHOW_TITLE','T&iacute;tulo de la imagen en el &aacute;rea del sistema DHTML');
DEFINE('_JGA_POPUP_DHTML_SHOW_TITLE_LONG','Muestra el nombre de la imagen dentro del &aacute;rea del sistema DHTML.');
DEFINE('_JGA_POPUP_DHTML_SHOW_DESCRIPTION','Descripci&oacute;n de la imagen en el &aacute;rea del sistema DHTML');
DEFINE('_JGA_POPUP_DHTML_SHOW_DESCRIPTION_LONG','Muestra la descripci&oacute;n de la imagen dentro del &aacute;rea del sistema DHTML.');
DEFINE('_JGA_POPUP_LIGHTBOX_OVERLAY','Sombreado');
DEFINE('_JGA_POPUP_LIGHTBOX_OVERLAY_LONG','Color del sombreado que oscurecer&aacute; el resto de la pantalla cuando veamos el lightbox.');
DEFINE('_JGA_POPUP_LIGHTBOX_SPEED','Velocidad de Lightbox');
DEFINE('_JGA_POPUP_LIGHTBOX_SPEED_LONG','Puede fijarse entre 0 y 10. Cuanto mayor sea el valor m&aacute;s r&aacute;pidamente se abre la imagen con lightbox y se cambia a la imagen siguiente.');
DEFINE('_JGA_POPUP_LIGHTBOX_SLIDEALL','Todas las im&aacute;genes en lightbox');
DEFINE('_JGA_POPUP_LIGHTBOX_SLIDEALL_LONG','Todas las im&aacute;genes de la categor&iacute;a se muestran en un lightbox. <b>Atenci&oacute;n:</b> ¡se incrementa un poco el tr&aacute;fico de internet!');
DEFINE('_JGA_POPUP_JS_IMAGERESIZE','Reducir tama&ntilde;o de las im&aacute;genes con Javascript');
DEFINE('_JGA_POPUP_JS_IMAGERESIZE_LONG','&iquest;Quiere que las im&aacute;genes que sean mayores que la pantalla vean reducido su tama&ntilde;o por medio de Javascript? Esta opci&oacute;n afecta al &aacute;rea del sistema DHTML, al lightbox y a la ventana de Javascript.');
DEFINE('_JGA_POPUP_DISABLE_RIGHTCLICK','Deshabilitar el bot&oacute;n derecho del rat&oacute;n');
DEFINE('_JGA_POPUP_DISABLE_RIGHTCLICK_LONG','Esta opci&oacute;n deshabilita el men&uacute; que aparece al pulsar el bot&oacute;n derecho del rat&oacute;n cuando estamos encima de una imagen (la imagen se cierra con un click). Esto impide la aparici&oacute;n de la opci&oacute;n de grabaci&oacute;n de im&aacute;genes, pero no asegura que se impida el robo de las mismas!');
DEFINE('_JGA_GALLERY_VIEW','Vista de Galer&iacute;a');
DEFINE('_JGA_GENERAL_SETTINGS','Opciones Principales');
DEFINE('_JGA_SHOW_GALLERY_PATHWAY','Navegaci&oacute;n de la Galer&iacute;a');
DEFINE('_JGA_SHOW_GALLERY_PATHWAY_LONG','&iquest;Desea que la Navegaci&oacute;n de la Galer&iacute;a se muestre en la Vista Previa de la misma? La Navegaci&oacute;n de la Galer&iacute;a suele ser un enlace a la Vista Previa de la misma, y nos muestra en qu&eacute; sitio de la Galer&iacute;a nos encontramos.');
DEFINE('_JGA_SHOW_GALLERYHEADER','Cabecera de Categor&iacute;a');
DEFINE('_JGA_SHOW_GALLERYHEADER_LONG','&iquest;Desea que se muestre la Cabecera de la Categor&iacute;a? Por defecto la cabecera de la categor&iacute;a contiene la palabra &quot;categories&quot; y se muestra justo encima de la lista de todas las categor&iacute;as de la galer&iacute;a. Se puede modificar ese nombre, editando el valor de la constante _JGS_CATEGORIES del fichero de lenguaje del Frontend.');
DEFINE('_JGA_NUMB_COLUMN','N&uacute;mero de Columnas');
DEFINE('_JGA_ONECOLUMN','Una Columna');
DEFINE('_JGA_TWOCOLUMNS','Dos Columnas');
DEFINE('_JGA_THREECOLUMNS','Tres Columnas');
DEFINE('_JGA_FOURCOLUMNS','Cuatro Columnas');
DEFINE('_JGA_NUMB_GALLERY_COLUMN','Elija el n&uacute;mero de columnas en las que mostraremos las Categor&iacute;as.');
DEFINE('_JGA_GALLERYCATS_PER_PAGE','Categor&iacute;as por p&aacute;gina');
DEFINE('_JGA_GALLERYCATS_PER_PAGE_LONG','N&uacute;mero de categor&iacute;as por p&aacute;gina en la Vista Previa de Categor&iacute;as. El n&uacute;mero elegido debe ser m&uacute;ltiplo del n&uacute;mero de columnas, para as&iacute; evitar espacios vac&iacute;os.');
DEFINE('_JGA_ORDER_BY_ALPHA','Orden Alfab&eacute;tico');
DEFINE('_JGA_ORDER_GALLERYCATS_BY_ALPHA_LONG','&iquest;Desea que las Categor&iacute;as se ordenen alfab&eacute;ticamente en la Vista Previa de la Galer&iacute;a? Si es as&iacute;, este orden predomina sobre el establecido en el Gestor de Categor&iacute;as.');
DEFINE('_JGA_SHOW_PAGENAVIGATION','Mostrar controles de paginaci&oacute;n');
DEFINE('_JGA_DISPLAY_TOP_ONLY','s&oacute;lo arriba');
DEFINE('_JGA_DISPLAY_TOP_AND_BOTTOM','arriba y abajo');
DEFINE('_JGA_DISPLAY_BOTTOM_ONLY','s&oacute;lo abajo');
DEFINE('_JGA_GALLERY_PAGENAVIGATION','Si la Galer&iacute;a est&aacute; compuesta por un n&uacute;mero mayor que el elegido en &quot;Categor&iacute;as por p&aacute;gina&quot; , las galer&iacute;as restantes se mostrar&aacute;n en p&aacute;ginas sucesivas. Los controles de paginaci&oacute;n pueden mostrarse "s&oacute;lo arriba" o, por ejemplo, si el n&uacute;mero de categor&iacute;as por p&aacute;gina es muy grande tambi&eacute;n debajo para evitar tener que desplazarnos por la p&aacute;gina sin necesidad.');
DEFINE('_JGA_SHOW_NUMB_GALLERYCATS','Mostrar el n&uacute;mero de categor&iacute;as');
DEFINE('_JGA_SHOW_NUMB_GALLERYCATS_LONG','&iquest;Desea que se muestre el n&uacute;mero total de categor&iacute;as de la galer&iacute;a encima de la zona de visualizaci&oacute;n?');
DEFINE('_JGA_SHOW_CATEGORYTHUMBNAIL','Mostrar Miniaturas');
DEFINE('_JGA_DISPLAY_NONE','No');
DEFINE('_JGA_DISPLAY_RANDOM','Aleatoriamente');
DEFINE('_JGA_DISPLAY_MYCHOISE','Seg&uacute;n elecci&oacute;n');
DEFINE('_JGA_SHOW_CATEGORYTHUMBNAIL_LONG','Se puede mostrar una Miniatura en cada categor&iacute;a. Para ello tenemos dos opciones: la primera consiste en mostrar una Miniatura fija que se establece en las caracter&iacute;sticas de la Categor&iacute;a. La segunda consiste en mostrar aleatoriamente una Miniatura de la Categor&iacute;a y/o, si las hubiera, de las subcategor&iacute;as de primer nivel (ver opci&oacute;n siguiente). La Miniatura aleatoria se reelige cada vez que cargamos la Vista de las Categor&iacute;as. <br />ATENCI&Oacute;N! La utilizaci&oacute;n de la funci&oacute;n aleatoria puede hacer que el tiempo de carga de la p&aacute;gina web se incremente, siempre que el n&uacute;mero de categor&iacute;as e im&aacute;genes sea elevado!');
DEFINE('_JGA_RANDOMCATTHUMB','Miniatura Aleatoria');
DEFINE('_JGA_FROM_PARENT_CAT_ONLY','S&oacute;lo de la Categor&iacute;a');
DEFINE('_JGA_FROM_CHILD_CAT_ONLY','S&oacute;lo de las Subcategor&iacute;as');
DEFINE('_JGA_FROM_FAMILY_CAT','De Ambas');
DEFINE('_JGA_RANDOMCATTHUMB_LONG','Elija de qu&eacute; categor&iacute;as se elegir&aacute;n las Miniaturas (s&oacute;lo si se eligen aleatoriamente)');
DEFINE('_JGA_CATTHUMB_ALIGN','Alineaci&oacute;n de las Miniaturas');
DEFINE('_JGA_LEFT','Ajustadas a la izquierda');
DEFINE('_JGA_RIGHT','Ajustadas a la derecha');
DEFINE('_JGA_CHANGE','Posici&oacute;n Variable');
DEFINE('_JGA_CENTER','Centradas');
DEFINE('_JGA_CATTHUMB_ALIGN_LONG','Alineaci&oacute;n de las Miniaturas (s&oacute;lo si se eligen aleatoriamente). Con esta opci&oacute;n se establece la alineaci&oacute;n de las miniaturas cuando se utiliza el sistema aleatorio de elecci&oacute;n. Veremos que normalmente influye en la manera en que se visualiza la descripci&oacute;n de la categor&iacute;a.');
DEFINE('_JGA_SHOW_CATEGORY_HITS','Ver accesos a la Categor&iacute;a');
DEFINE('_JGA_SHOW_CATEGORY_HITS_LONG','&iquest;Desea que se muestren el n&uacute;mero total de accesos a las im&aacute;genes de cada categor&iacute;a? Para calcular el n&uacute;mero total de accesos se suman tambi&eacute;n los accesos a las im&aacute;genes de las subcategor&iacute;as.');
DEFINE('_JGA_SHOW_CATEGORY_ASNEW','&iquest;Destacar Nuevas Categor&iacute;as?');
DEFINE('_JGA_SHOW_CATEGORY_ASNEW_LONG','&iquest;Desea que las categor&iacute;as que tienen im&aacute;genes nuevas se resalten con la palabra &quot;NEW&quot; ?');
DEFINE('_JGA_SHOW_DAYSNEW','Per&iacute;odo de tiempo de las Novedades');
DEFINE('_JGA_SHOW_CATEGORY_DAYSNEW_LONG','Establece el per&iacute;odo de tiempo en d&iacute;as, en el que las categor&iacute;as son consideradas como Nuevas.');
DEFINE('_JGA_SHOW_RMSM','Mostrar RM y SM');
DEFINE('_JGA_SHOW_RMSM_LONG','&iquest;Mostrar RM y SM en las carpetas protegidas? Si usted utiliza carpetas protegidas (por ejemplo, carpetas con derechos de acceso limitados) seleccione S&iacute;, en caso contrario seleccione No .');
DEFINE('_JGA_SHOW_RMSM_CATEGORIES','Mostrar Categor&iacute;as RM y SM');
DEFINE('_JGA_SHOW_RMSM_CATEGORIES_LONG','&iquest;Desea que se muestren a todos los usuarios las categor&iacute;as con acceso limitado? Si selecciona &quot;S&iacute;&quot; , se mostrar&aacute;n &eacute;stas categor&iacute;as con su nombre y tipo ( RM o SM), en la Vista de Categor&iacute;as. Si se elige &quot;No&quot; , se ocultar&aacute;n todas las categor&iacute;as para las que el usuario no tiene derechos de acceso.');
DEFINE('_JGA_CATEGORY_VIEW','Vista de la Categor&iacute;a');
DEFINE('_JGA_SHOW_SUBCATEGORYHEADER','T&iacute;tulo de las Subcategor&iacute;as');
DEFINE('_JGA_SHOW_CATEGORYHEADER_LONG','&iquest;Desea que se muestre el t&iacute;tulo de la Subcategor&iacute;a? Por defecto, la palabra &quot;sub-categories&quot; viene inclu&iacute;da en el t&iacute;tulo de las Subcategor&iacute;as y se muestra encima a la derecha de la lista de las Subcategor&iacute;as de la Categor&iacute;a. Esta palabra se puede cambiar modificando la constante del frontend _JGS_SUBCATEGORIES en el fichero de lenguaje.');
DEFINE('_JGA_SHOW_CATEGORYTITLE','T&iacute;tulo para la Categor&iacute;a');
DEFINE('_JGA_SHOW_CATEGORYTITLE_LONG','&iquest;Desea que se muestre el t&iacute;tulo de la Categor&iacute;a? Este t&iacute;tulo se muestra encima a la derecha de las miniaturas de la Categor&iacute;a y nos muestra el nombre de la Categor&iacute;a correspondiente.');
DEFINE('_JGA_CATEGORY_ORDERBY_USER','Criterio de ordenaci&oacute;n seleccionable por el Usuario');
DEFINE('_JGA_CATEGORY_ORDERBY_USER_LONG','&iquest;Pueden los usuarios ordenar las im&aacute;genes de las Categor&iacute;as a su elecci&oacute;n? M&aacute;s abajo puede establecer que criterios de ordenaci&oacute;n puede elegir el usuario. En este caso las opciones de <i>Opciones del Frontend &raquo; Orden de las im&aacute;genes</i> ser&aacute;n sustitu&iacute;das por la elecci&oacute;n del usuario. ');
DEFINE('_JGA_CATEGORY_ORDERBY_USER_LIST','Lista de opciones');
DEFINE('_JGA_USER_ORDERBY_DATE','Fecha');
DEFINE('_JGA_USER_ORDERBY_AUTHOR','Autor');
DEFINE('_JGA_USER_ORDERBY_TITLE','T&iacute;tulo');
DEFINE('_JGA_USER_ORDERBY_HITS','N&uacute;mero de Accesos');
DEFINE('_JGA_USER_ORDERBY_RATING','Evaluaci&oacute;n');
DEFINE('_JGA_CATEGORY_ORDERBY_USER_LIST_LONG','Si en la opci&oacute;n anterior se ha dado permiso a los usuarios para que ordenen las im&aacute;genes seg&uacute;n su criterio, elija que criterios de ordenaci&oacute;n puede utilizar. Puede elegir m&aacute;s de un criterio (tecla Ctrl).');
DEFINE('_JGA_SHOW_CATDESCRIPTIONINCAT','Descripci&oacute;n de la Categor&iacute;a');
DEFINE('_JGA_SHOW_CATDESCRIPTIONINCAT_LONG','&iquest;Desea que se muestre la descripci&oacute;n de la categor&iacute;a debajo de su t&iacute;tulo?');
DEFINE('_JGA_NUMB_CATEGORY_COLUMN','Elija el n&uacute;mero de columnas en funci&oacute;n del cual se mostrar&aacute;n sus im&aacute;genes');
DEFINE('_JGA_CATEGORYPICS_PER_PAGE','Im&aacute;genes por P&aacute;gina');
DEFINE('_JGA_CATEGORYPICS_PER_PAGE_LONG','N&uacute;mero de im&aacute;genes que se mostrar&aacute;n en cada p&aacute;gina.');
DEFINE('_JGA_CATEGORY_THUMBALIGN','Alineaci&oacute;n de las Miniaturas / Detalles');
DEFINE('_JGA_CATEGORY_THUMBALIGN_LONG','Alineaci&oacute;n de las Miniaturas y/o detalles de la categor&iacute;a en las columnas.');
DEFINE('_JGA_CATEGORY_TEXTALIGN','Si se mostrara una miniatura, los detalles de la categor&iacute;a se mostrar&iacute;an debajo de la miniatura.');
DEFINE('_JGA_CATEGORY_TEXTALIGN_CENTER','Si elige &quot;izquierda&quot; o &quot;derecha&quot; los detalles de la categor&iacute;a se mostrar&aacute;n - una vez que la miniatura se haya mostrado - junto a la miniatura. Si elige &quot;centradas&quot; todos los detalles se mostrar&aacute;n debajo de la miniatura.');
DEFINE('_JGA_CATEGORY_PAGENAVIGATION','Si en la categor&iacute;a hay m&aacute;s im&aacute;genes que las establecidas en &quot;Miniaturas por p&aacute;gina&quot; las dem&aacute;s miniaturas se mostrar&aacute;n en las siguientes p&aacute;ginas. La barra de paginaci&oacute;n se mostrar&aacute; en la parte superior de la p&aacute;gina o - si el n&uacute;mero de im&aacute;genes por p&aacute;gina es muy grande - tambi&eacute;n en la parte inferior.');
DEFINE('_JGA_SHOW_NUMB_CATEGORYPICS','Mostrar el n&uacute;mero de im&aacute;genes');
DEFINE('_JGA_SHOW_NUMB_CATEGORYPICS_LONG','&iquest;Desea mostrar el n&uacute;mero total de im&aacute;genes de las categor&iacute;as encima del control de paginaci&oacute;n?');
DEFINE('_JGA_OPEN_DETAIL_VIEW','Seleccionar Tipo de Vista Detallada');
DEFINE('_JGA_OPEN_NORMAL','Vista por Defecto');
DEFINE('_JGA_OPEN_BLANK_WINDOW','Ventana Nueva');
DEFINE('_JGA_OPEN_JS_WINDOW','Ventana de JavaScript');
DEFINE('_JGA_OPEN_DHTML','Ventana DHTML');
DEFINE('_JGA_OPEN_LIGHTBOX','Lightbox');
DEFINE('_JGA_OPEN_THICKBOX3','Thickbox3');
DEFINE('_JGA_OPEN_SLIMBOX','Slimbox');
DEFINE('_JGA_OPEN_DETAIL_VIEW_LONG','Normalmente con un click de rat&oacute;n en una miniatura en la vista de categor&iacute;a se abre la vista detallada que nos muestra la imagen y la informaci&oacute;n correspondiente a la misma: t&iacute;tulo, autor, descripci&oacute;n, etc.. Tambi&eacute;n muestra las evaluaciones y los comentarios - siempre que esas opciones est&eacute;n seleccionadas. Aqu&iacute; puede seleccionar las opciones de visualizaci&oacute;n cuando se abre la vista detallada de una imagen. No se mostrar&aacute; la informaci&oacute;n en la vista de la imagen detallada: <ul type="square"><li> &quot;Ventana Nueva&quot; abre una nueva ventana de explorador en la que aparece la vista detallada de la imagen centrada.</li> <li> &quot;Ventana de JavaScript&quot; muestra la vista detallada de la imagen en una ventana ajustada a su tama&ntilde;o. </li> <li> &quot;Ventana DHTML&quot; muestra un &aacute;rea que contiene la vista detallada de la imagen (con borde si se elige) por encima de la vista de categor&iacute;a (no se abre una ventana nueva)</li><li> &quot;Lightbox&quot; muestra la vista detalla de la imagen en una Mesa de Luz animada. El fondo (la vista de categor&iacute;a) aparece ensombrecido.</li><li>&quot;Thickbox3&quot; muestra la imagen como el Lightbox con fondo ensombrecido. En este caso los controles de navegaci&oacute;n est&aacute;n en la esquina izquierda. Se utiliza la librer&iacute;a jquery de javascript.</li><li>&quot;Slimbox&quot; muestra la imagen como el lightbox. La &uacute;nica diferencia es que usa la librer&iacute;a de Java mootools.</li></ul> Encontrar&aacute; m&aacute;s opciones que hacen referencia a la Mesa de Luz y las otras opciones de Vista Detallada en <i>Opciones del Frontend &raquo; Funciones Popup</i>.');
DEFINE('_JGA_LIGHTBOX_ORIGINAL','Imagen original en Lightbox');
DEFINE('_JGA_LIGHTBOX_ORIGINAL_LONG','En el caso de que haya seleccionado el lightbox, puede elegir si quiere que se muestre la imagen original (Yes) o la imagen detallada (No).');
DEFINE('_JGA_SHOW_PICTURE_TITLE','Mostrar T&iacute;tulo de la Imagen');
DEFINE('_JGA_SHOW_PICTURE_TITLE_LONG','Las siguientes opciones establecen qu&eacute; informaciones detalladas de la imagen se muestran en la vista de categor&iacute;a. Esta informaci&oacute;n se muestra justo debajo de cada miniatura correspondiente. <br />&iquest;Desea mostrar los t&iacute;tulos?');
DEFINE('_JGA_SHOW_PICTURE_ASNEW','&iquest;Resaltar Im&aacute;genes Nuevas?');
DEFINE('_JGA_SHOW_PICTURE_ASNEW_LONG','&iquest;Desea que las im&aacute;genes nuevas sean se&ntilde;aladas con la leyenda &quot;NEW&quot;?');
DEFINE('_JGA_SHOW_PICTURE_DAYSNEW_LONG','Establece el n&uacute;mero de d&iacute;as de antig&uuml;edad durante los cuales una imagen se considera nueva.');
DEFINE('_JGA_SHOW_PICTURE_HITS','Mostrar Accesos');
DEFINE('_JGA_SHOW_PICTURE_HITS_LONG','&iquest;Desea mostrar los accesos por imagen a los usuarios?');
DEFINE('_JGA_SHOW_PICTURE_AUTHOR','Mostrar Autor');
DEFINE('_JGA_SHOW_PICTURE_AUTHOR_LONG','&iquest;Desea mostrar el nombre del autor a los usuarios?');
DEFINE('_JGA_SHOW_PICTURE_OWNER','Mostrar el Propietario en su lugar');
DEFINE('_JGA_SHOW_PICTURE_OWNER_LONG','&iquest;Desea mostrar el nombre del propietario en lugar del del autor si &eacute;ste no existe?');
DEFINE('_JGA_SHOW_PICTURE_COMMENTS','Mostrar Comentarios');
DEFINE('_JGA_SHOW_PICTURE_COMMENTS_LONG','&iquest;Desea mostrar comentarios a los usuarios?');
DEFINE('_JGA_SHOW_PICTURE_RATINGS','Mostrar Evaluaciones');
DEFINE('_JGA_SHOW_PICTURE_RATINGS_LONG','&iquest;Desea mostrar evaluaciones a los usuarios?');
DEFINE('_JGA_SHOW_PICTURE_DESCRIPTION','Mostrar Descripci&oacute;n');
DEFINE('_JGA_SHOW_PICTURE_DESCRIPTION_LONG','&iquest;Desea mostrar las descripciones a los usuarios?');
DEFINE('_JGA_SHOW_FAVOURITES_LINK','Mostrar enlace a Favoritos');//NEW
DEFINE('_JGA_SHOW_FAVOURITES_LINK_LONG','&iquest;Desea mostrar un enlace para que los usuarios puedan a&ntilde;adir im&aacute;genes a sus Favoritos en la vista de categor&iacute;a. Esta opci&oacute;n s&oacute;lo est&aacute; disponible si estan activados los Favoritos.');//NEW
DEFINE('_JGA_SUBCAT_SETTINGS','Subcategor&iacute;as');
DEFINE('_JGA_NUMB_SUBCATEGORY_COLUMN','N&uacute;mero de Columnas para las Subcategor&iacute;as');
DEFINE('_JGA_NUMB_SUBCATEGORY_COLUMN_LONG','Elija el n&uacute;mero de columnas para mostrar la lista de subcategor&iacute;as');
DEFINE('_JGA_CATEGORYSUBCATS_PER_PAGE','Subcategor&iacute;as por p&aacute;gina');
DEFINE('_JGA_CATEGORYSUBCATS_PER_PAGE_LONG','N&uacute;mero de subcategor&iacute;as que se mostrar&aacute;n en la vista previa de categor&iacute;as. El n&uacute;mero elegido tiene que ser divisible por el n&uacute;mero de columnas seleccionado con antelaci&oacute;n para evitar espacios vac&iacute;os.');
DEFINE('_JGA_SHOW_NUMB_SUBCATEGORIES','Mostrar el n&uacute;mero de subcategor&iacute;as');
DEFINE('_JGA_SHOW_NUMB_SUBCATEGORIES_LONG','&iquest;Desea mostrar el n&uacute;mero total de subcategor&iacute;as encima del control de paginaci&oacute;n?');
DEFINE('_JGA_ORDER_SUBCATEGORIES_BY_ALPHA_LONG','&iquest;Quiere ver las subcategor&iacute;as ordenadas alfab&eacute;ticamente en la vista de categor&iacute;as? En ese caso, esta configuraci&oacute;n tendr&aacute; preferencia sobre las opciones establecidas para las categor&iacute;as.');
DEFINE('_JGA_DETAIL_VIEW','Vista Detallada');
DEFINE('_JGA_ALLOW_DETAILPAGE','Mostrar Vista Detallada:');
DEFINE('_JGA_ALLOW_DETAILPAGE_LONG','&iquest;Desea permitir que los usuarios no registrados puedan ver la Vista Detallada? Si elige &quot;No&quot;  se ocultar&aacute;n los detalles de las im&aacute;genes a los invitados y se pedir&aacute; que los usuarios registrados introduzcan sus datos.');
DEFINE('_JGA_SHOW_DETAIL_NUMBEROFPICS','&iquest;Mostrar Orden?');
DEFINE('_JGA_SHOW_DETAIL_NUMBEROFPICS_LONG','En la vista detallada encima de cada imagen hay v&iacute;nculos que nos permiten movernos a otras im&aacute;genes. Si elige aqu&iacute; &quot;S&iacute;&quot; , aprecer&aacute; un n&uacute;mero debajo de los v&iacute;nculos que nos dice el n&uacute;mero de la imagen en la categor&iacute;a o subcategor&iacute;a, por ej. &quot;imagen 10 de 30&quot;.');
DEFINE('_JGA_DETAIL_CURSOR_NAVIGATION','Navegaci&oacute;n con las flechas del teclado');
DEFINE('_JGA_DETAIL_CURSOR_NAVIGATION_LONG','Esta opci&oacute;n habilita la navegaci&oacute;n entre las im&aacute;genes con las flechas del teclado.');
DEFINE('_JGA_DETAIL_DISABLE_RIGHTCLICK','Anular el bot&oacute;n derecho del rat&oacute;n (el Men&uacute;)');
DEFINE('_JGA_DETAIL_DISABLE_RIGHTCLICK_LONG','Esta opci&oacute;n anula el men&uacute; que aparece cuando pulsamos con el bot&oacute;n de la derecha del rat&oacute;n estando encima de una imagen (la imagen se cierra con un click). Esto impide la aparici&oacute;n de los iconos de grabaci&oacute;n, pero no impide el robo de im&aacute;genes!');
DEFINE('_JGA_SHOW_DETAIL_INFORMATION','Mostrar Detalles:');
DEFINE('_JGA_SHOW_DETAIL_INFORMATION_LONG','&iquest;Desea mostrar los detalles de las im&aacute;genes a los usuarios? Si elige &quot;No&quot; se deshabilitar&aacute;n las siguientes opciones que controlan la forma de mostrar los detalles de las im&aacute;genes.');
DEFINE('_JGA_SHOW_DETAIL_ACCORDION','&iquest;Desea que los detalles sean desplegables?');
DEFINE('_JGA_SHOW_DETAIL_ACCORDION_LONG', 'Si desea que los detalles de la imagen y las funciones de la vista detallada se puedan desplegar o no, elija &quot;S&iacute;&quot;. Este sistema s&oacute;lo se puede utilizar si la vista original <b>no</b> se abre con el sistema Lightbox.');
DEFINE('_JGA_SHOW_DETAIL_TITLE','&iquest;Mostrar T&iacute;tulo?'); // new
DEFINE('_JGA_TOP','encima');
DEFINE('_JGA_BOTTOM','debajo');
DEFINE('_JGA_SHOW_DETAIL_TITLE_LONG','&iquest;Desea mostrar el t&iacute;tulo de la imagen encima de la misma en la vista detallada?');
DEFINE('_JGA_SHOW_DETAIL_DESCRIPTION','&iquest;Mostrar Descripci&oacute;n?');
DEFINE('_JGA_SHOW_DETAIL_DESCRIPTION_LONG','&iquest;Quiere mostrar la descripci&oacute;n?');
DEFINE('_JGA_SHOW_DETAIL_DATE','&iquest;Mostrar Fecha?');
DEFINE('_JGA_SHOW_DETAIL_DATE_LONG','&iquest;Quiere que se muestre la fecha de la imagen?');
DEFINE('_JGA_SHOW_DETAIL_HITS','&iquest;Mostrar Accesos?');
DEFINE('_JGA_SHOW_DETAIL_HITS_LONG','&iquest;Quiere que se muestre el n&uacute;mero de accesos a la imagen?');
DEFINE('_JGA_SHOW_DETAIL_RATING','&iquest;Mostrar Evaluaci&oacute;n?');
DEFINE('_JGA_SHOW_DETAIL_RATING_LONG','&iquest;Quiere que se muestre la media de las evaluaciones y el n&uacute;mero de las mismas?');
DEFINE('_JGA_SHOW_DETAIL_FILESIZE','&iquest;Mostrar Tama&ntilde;o de la Foto Detalle?');
DEFINE('_JGA_SHOW_DETAIL_FILESIZE_LONG','&iquest;Quiere que se muestre el tama&ntilde;o de la foto detalle?');
DEFINE('_JGA_SHOW_DETAIL_AUTHOR','&iquest;Mostrar Autor?');
DEFINE('_JGA_SHOW_DETAIL_AUTHOR_LONG','&iquest;Quiere que se muestre el autor?');
DEFINE('_JGA_SHOW_DETAIL_ORIGFILESIZE','&iquest;Mostrar Tama&ntilde;o de la Foto Original?');
DEFINE('_JGA_SHOW_DETAIL_ORIGFILESIZE_LONG','&iquest;Quiere que se muestre el tama&ntilde;o de la foto original? Esta opci&oacute;n s&oacute;lo tendra efecto siempre que no haya borrado la imagen original.');
DEFINE('_JGA_SHOW_DETAIL_DOWNLOAD','&iquest;Mostrar Descarga?');
DEFINE('_JGA_SHOW_DETAIL_DOWNLOAD_LONG','Esta opci&oacute;n permite que los usuarios puedan descargar la imagen mostrada. &iquest;A quienes quiere mostrar esta opci&oacute;n?');
DEFINE('_JGA_DETAIL_DOWNLOADFILE','Descarga de Im&aacute;genes');
DEFINE('_JGA_RESIZED_ONLY','S&oacute;lo im&aacute;genes detalladas');
DEFINE('_JGA_ORIGINAL_ONLY','S&oacute;lo originales');
DEFINE('_JGA_RESIZED_IFNO_ORIGINAL','Usar imagen detallada si no existe la original');
DEFINE('_JGA_DETAIL_DOWNLOADFILE_LONG','&iquest;Qu&eacute; tipo de imagen quiere que se pueda descargar? &quot;S&oacute;lo im&aacute;genes detalladas&quot; se utilizar&aacute;n las im&aacute;genes tal y como se ven en la vista detallada. &quot;S&oacute;lo originales&quot; se utilizar&aacute;n las im&aacute;genes originales como en el sistema popup (con tal de que existan). Esta opci&oacute;n s&oacute;lo tendr&aacute; efecto cuando est&eacute; actividada la descarga de im&aacute;genes.');
DEFINE('_JGA_DETAIL_DOWNLOADWITHWATERMARK','&iquest;Descarga con Marca de Agua?');
DEFINE('_JGA_DETAIL_DOWNLOADWITHWATERMARK_LONG','&iquest;Quiere poner una Marca de Agua en la imagen a descargar? Si elige &quot;S&iacute;&quot; se a&ntilde;adir&aacute; una Marca de Agua a la imagen descargada independientemente de que en la vista detallada se vea la Marca de Agua.');
DEFINE('_JGA_DETAIL_INSERT_WATERMARK','&iquest;A&ntilde;adir Marca de Agua?');
DEFINE('_JGA_DETAIL_INSERT_WATERMARK_LONG','&iquest;Quiere a&ntilde;adir una Marca de Agua a la vista detallada de las im&aacute;genes? (Por defecto el fichero de la Marca de Agua se encuentra en la carpeta components/com_joomgallery/assets/images con el nombre watermark.png. Se puede cambiar la ruta y el nombre del fichero, pero deber&aacute; cambiarlos tambi&eacute;n en <i>Opciones Principales &raquo; Rutas y Carpetas</i> con los mismos valores.)');
DEFINE('_JGA_DETAIL_WATERMARK_POSITION','Posici&oacute;n de la Marca de Agua');
DEFINE('_JGA_TOP_LEFT','Arriba a la izquierda');
DEFINE('_JGA_TOP_CENTER','Arriba en el medio');
DEFINE('_JGA_TOP_RIGHT','Arriba a la derecha');
DEFINE('_JGA_MIDDLE_LEFT','En la mitad a la izquierda');
DEFINE('_JGA_MIDDLE_CENTER','En la mitad y en el medio');
DEFINE('_JGA_MIDDLE_RIGHT','En la mitad a la derecha');
DEFINE('_JGA_BOTTOM_LEFT','Abajo a la izquierda');
DEFINE('_JGA_BOTTOM_CENTER','Abajo en el medio');
DEFINE('_JGA_BOTTOM_RIGHT','Abajo a la derecha');
DEFINE('_JGA_DETAIL_WATERMARK_POSITION_LONG','Elija la posici&oacute;n de la Marca de Agua en la imagen.');
DEFINE('_JGA_SHOW_DETAIL_LINKTOORIGINAL','&iquest;Mostrar v&iacute;nculo a la imagen original?');
DEFINE('_JGA_SHOW_DETAIL_LINKTOORIGINAL_LONG','&iquest;Quiere mostrar un v&iacute;nculo a la imagen original y, en su caso, elegir qui&eacute;n puede ver este v&iacute;nculo? Si se selecciona esta opci&oacute;n, aparecer&aacute; un v&iacute;nculo a la imagen original debajo de la vista detallada de la imagen. S&oacute;lo se mostrar&aacute; cuando la imagen original sea mayor que la detallada.');
DEFINE('_JGA_OPEN_ORIGINAL_VIEW','Abrir imagen original en');
DEFINE('_JGA_OPEN_ORIGINAL_VIEW_LONG','Esta opci&oacute;n establece c&oacute;mo se mostrar&aacute;n las im&aacute;genes originales: <ul type="square"><li> &quot;Ventana Nueva&quot; abre una nueva ventana de explorador en la que aparece la vista detallada de la imagen centrada.</li> <li> &quot;Ventana de JavaScript&quot; muestra la vista detallada de la imagen en una ventana ajustada a su tama&ntilde;o. </li> <li> &quot;Ventana DHTML&quot; muestra un &aacute;rea que contiene la vista detallada de la imagen (con borde si se elige) por encima de la vista de categor&iacute;a (no se abre una ventana nueva)</li><li> &quot;Lightbox&quot; muestra la vista detalla de la imagen en una Mesa de Luz animada. El fondo (la vista de categor&iacute;a) aparece ensombrecido.</li><li>&quot;Thickbox3&quot; muestra la imagen como el Lightbox con fondo ensombrecido. En este caso los controles de navegaci&oacute;n est&aacute;n en la esquina izquierda. Se utiliza la librer&iacute;a jquery de javascript.</li><li>&quot;Slimbox&quot; muestra la imagen como el lightbox. La &uacute;nica diferencia es que usa la librer&iacute;a de Java mootools.</li></ul> Esta funci&oacute;n s&oacute;lo surte efecto si se activa "mostrar v&iacute;nculo a la imagen original". Encontrar&aacute; m&aacute;s opciones que hacen referencia a la Mesa de Luz y las otras opciones de Vista Detallada en <i>Opciones del Frontend &raquo; Funciones Popup</i>.'); 
DEFINE('_JGA_SHOW_DETAIL_BBCODELINK','&iquest;Mostrar v&iacute;nculos BBcode a la imagen?');
DEFINE('_JGA_BBCODE_IMG_ONLY','S&oacute;lo IMG-Tag');
DEFINE('_JGA_BBCODE_URL_ONLY','S&oacute;lo URL-Tag');
DEFINE('_JGA_BBCODE_BOTH','Ambos');
DEFINE('_JGA_SHOW_DETAIL_BBCODELINK_LONG','&iquest;Mostrar un campo de texto con etiquetas IMG y/o URL? Los usuarios pueden copiar y pegar el texto para crear accesos a las im&aacute;genes desde los foros.');
DEFINE('_JGA_SHOW_DETAIL_COMMENTS','Mostrar comentarios s&oacute;lo a usuarios registrados ');
DEFINE('_JGA_SHOW_DETAIL_COMMENTS_LONG','&iquest;Mostrar los comentarios publicados s&oacute;lo a los usuarios registrados?');
DEFINE('_JGA_SHOW_DETAIL_COMMENTSAREA','Mostrar caja para comentarios');
DEFINE('_JGA_SHOW_DETAIL_COMMENTSAREA_LONG','Mostrar la caja para comentarios nuevos, encima o debajo de los comentarios existentes. Esta opci&oacute;n s&oacute;lo est&aacute; disponible si los comentarios est&aacute;n permitidos.');
DEFINE('_JGA_ABOVE_COMMENTS','Encima de los comentarios');
DEFINE('_JGA_UNDERNEATH_COMMENTS','Debajo de los comentarios');
DEFINE('_JGA_SHOW_DETAIL_SEND2FRIEND','&iquest;Mostrar "Enviar a un amigo"?');
DEFINE('_JGA_SHOW_DETAIL_SEND2FRIEND_LONG','&iquest;Mostrar "Enviar a un amigo" a los usuarios?');
DEFINE('_JGA_MOTIONGALLERY_SETTINGS','Galer&iacute;a M&oacute;vil');
DEFINE('_JGA_SHOW_DETAIL_MOTIONGALLERY','&iquest;Mostrar "Minis"?');
DEFINE('_JGA_SHOW_DETAIL_MOTIONGALLERY_LONG','&iquest;Desea mostrar "minis" debajo de la vista detallada? Las "minis" son el tama&ntilde;o m&aacute;s peque&ntilde;o de una imagen dentro de una categor&iacute;a. Nos permite tener una vista general de la categor&iacute;a. Si sus categor&iacute;as tienen muchas im&aacute;genes nos permiten evitar el retardo al cargar las im&aacute;genes para su visualizaci&oacute;n.');
DEFINE('_JGA_MOTIONGALLERY_DISPLAYMODE','Tipo de visualizaci&oacute;n de las "Minis":');
DEFINE('_JGA_STATIC','Est&aacute;tico');
DEFINE('_JGA_MOVEABLE','M&oacute;vil');
DEFINE('_JGA_MOTIONGALLERY_DISPLAYMODE_LONG','Se puede elegir entre dos modos de visualizar las "minis": &quot;Est&aacute;tico&quot; todas las "minis" de la categor&iacute;a se alinean unas debajo de las otras. Esto podr&iacute;a ocupar mucho espacio si se tienen muchas im&aacute;genes. Si se selecciona &quot;M&oacute;vil&quot; se mostrar&aacute;n todas las "minis" en una &uacute;nica l&iacute;nea. La altura y anchura de esta "barra m&oacute;vil" se puede fijar en las siguientes opciones. Pulsando en la barra con el rat&oacute;n se activa el movimiento de avance o retroceso y la velocidad del mismo. Esto no afecta a la velocidad de carga, ya que todas las "minis" se cargan en la primera p&aacute;gina.');
DEFINE('_JGA_MOTIONGALLERY_WIDTH','Anchura de la Barra M&oacute;vil');
DEFINE('_JGA_MOTIONGALLERY_WIDTH_LONG','Disponible s&oacute;lo para visualizaci&oacute;n m&oacute;vil de "minis"! Establece la anchura de la Barra M&oacute;vil. Elija un valor en p&iacute;xeles (p.ej. 400)!');
DEFINE('_JGA_MOTIONGALLERY_HEIGHT','Altura de la Barra M&oacute;vil');
DEFINE('_JGA_MOTIONGALLERY_HEIGHT_LONG','Disponible s&oacute;lo para visualizaci&oacute;n m&oacute;vil de "minis"! Establece la altura de la Barra M&oacute;vil. Elija un valor en p&iacute;xeles (p.ej. 50)!');
DEFINE('_JGA_MOTIONMINIS_MAXWIDTH','Anchura M&aacute;xima de las "Minis"');
DEFINE('_JGA_MOTIONMINIS_MAXWIDTH_LONG','Anchura M&aacute;xima de las "Minis" en p&iacute;xeles. Es recomendable usar el mismo valor para la anchura y la altura.');
DEFINE('_JGA_MOTIONMINIS_MAXHEIGHT','Altura M&aacute;xima de las "Minis"');
DEFINE('_JGA_MOTIONMINIS_MAXHEIGHT_LONG','Altura M&aacute;xima de las "Minis" en p&iacute;xeles. Es recomendable usar el mismo valor para la anchura y la altura.');
DEFINE('_JGA_MOTIONMINIS_PROPORTIONS','Ajustes de las "Minis"');
DEFINE('_JGA_SAMEWIDTHANDHEIGHT','seg&uacute;n la anchura y la altura');
DEFINE('_JGA_MOTIONMINIS_PROPORTIONS_LONG','Los ajustes para mostrar las "minis" pueden ser tres distintos: si elige &quot;seg&uacute;n la anchura y la altura&quot; los ajustes se realizar&aacute;n en funci&oacute;n de los valores m&aacute;ximos de las "minis" establecidos anteriormente. Esta opci&oacute;n suele producir que las imagenes est&eacute;n distorsionadas. <br />La opci&oacute;n &quot;seg&uacute;n la altura&quot; reduce todas las "minis" a la altura m&aacute;xima establecida y deja la proporci&oacute;n original de altura-anchura. La anchura depender&aacute; del formato de la imagen. <br />La opci&oacute;n &quot;seg&uacute;n la anchura&quot; reduce todas las "minis" a la anchura m&aacute;xima establecida y deja la proporci&oacute;n original de altura-anchura. La altura depender&aacute; del formato de la imagen.');
DEFINE('_JGA_NAMESHIELD_SETTINGS','Complementos de Nombre');
DEFINE('_JGA_SHOW_DETAIL_NAMESHIELDS','&iquest;Utilizar Etiquetas?');
DEFINE('_JGA_SHOW_DETAIL_NAMESHIELDS_LONG','&iquest;Pueden los usuarios registrados tener la posibilidad de adjuntar etiquetas a la vista detallada de las im&aacute;genes? Estas etiquetas ser&aacute;n, en funci&oacute;n de lo que elijamos a continuaci&oacute;n, visibles s&oacute;lo para usuarios registrados o tambi&eacute;n para los invitados. Si el CB/CBE est&aacute; activado las etiquetas estar&aacute;n asociadas al perfil de cada usuario. El dise&ntilde;o de las etiquetas se puede modificar en los ficheros de estilo.');
DEFINE('_JGA_NAMESHIELDS_GUEST_VISIBLE','&iquest;Visible por los Invitados?');
DEFINE('_JGA_NAMESHIELDS_GUEST_VISIBLE_LONG','&iquest;Desea que las etiquetas puedan ser vistas por los invitados?');
DEFINE('_JGA_NAMESHIELDS_GUEST_INFORMATION','&iquest;Informar a los Invitados?');
DEFINE('_JGA_NAMESHIELDS_GUEST_INFORMATION_LONG','&iquest;Desea comunicar a los invitados que se est&aacute;n utilizando las etiquetas? Esta opci&oacute;n surte efecto si las etiquetas est&aacute;n permitidas.');
DEFINE('_JGA_NAMESHIELDS_HEIGHT','Altura del Campo');
DEFINE('_JGA_NAMESHIELDS_HEIGHT_LONG','Introduzca el ancho del campo en p&iacute;xeles (s&oacute;lo n&uacute;meros).');
DEFINE('_JGA_NAMESHIELDS_WIDTH','Anchura del Campo');
DEFINE('_JGA_NAMESHIELDS_WIDTH_LONG','Aqu&iacute; se puede introducir un valor relativo para la anchura. El n&uacute;mero que introduzca no es un valor absoluto sino un valor dependiente del tama&ntilde;o de la letra. Para un tama&ntilde;o de letra de 10 pt, un valor de 8 es una buena elecci&oacute;n. Busque su proporci&oacute;n id&oacute;nea.');
DEFINE('_JGA_SLIDESHOW_SETTINGS','Opciones de Diapositivas');
DEFINE('_JGA_SHOW_DETAIL_SLIDESHOW','Permitir Diapositivas');
DEFINE('_JGA_SHOW_DETAIL_SLIDESHOW_LONG','Por medio de esta opci&oacute;n se ofrece a los usuarios poder ver todas las im&aacute;genes de la categor&iacute;a en la vista detallada a partir de la imagen activa. Todas las opciones adicionales que establecen el formato de visualizaci&oacute;n de las diapositivas quedar&aacute;n sin efecto si selecciona &quot;No&quot; en esta opci&oacute;n.');
DEFINE('_JGA_SLIDESHOW_TIMEFRAME','Tiempo de Exposici&oacute;n');
DEFINE('_JGA_SLIDESHOW_TIMEFRAME_LONG','Tiempo, en segundos, durante el cual se visualiza una imagen en pantalla hasta pasar a la siguiente.');
DEFINE('_JGA_SLIDESHOW_TRANSITION','Efecto de Cambio');
DEFINE('_JGA_SLIDESHOW_TRANSITION_LONG','&iquest;Quiere utilizar efectos en el cambio de diapositivas? Internet Explorer nos proporciona distintos efectos para insertarlos entre dos diapositivas. Estos efectos funcionan &uacute;nicamente con IE.');
DEFINE('_JGA_SLIDESHOW_TRANSITION_RANDOM','Cambio Aleatorio');
DEFINE('_JGA_SLIDESHOW_TRANSITION_RANDOM_LONG','&iquest;Desea utilizar el efecto de cambio aleatorio?. Por medio de esta opci&oacute;n y, habiendo activado el Efecto de Cambio (encima), el efecto de cada cambio ser&aacute; aleatorio. La alternativa al efecto aleatorio es un efecto "difuminado" fijo. Estos efectos funcionan &uacute;nicamente con IE.');
DEFINE('_JGA_SLIDESHOW_TRANSITION_TIME','Duraci&oacute;n del Cambio');
DEFINE('_JGA_SLIDESHOW_TRANSITION_TIME_LONG','Duraci&oacute;n del cambio en segundos.');
DEFINE('_JGA_SLIDESHOW_ENDLESS_SLIDE','Diapositivas Infinitas');
DEFINE('_JGA_SLIDESHOW_ENDLESS_SLIDE_LONG','&iquest;Desea que los usuarios puedan ver las diapositivas indefinidamente?');
DEFINE('_JGA_EXIF_SETTINGS','Datos Exif');
DEFINE('_JGA_EXIF_SETTINGS_INTRO','El Exif es un formato est&aacute;ndard de los ficheros de datos por medio del cual las c&aacute;maras de fotos digitales guardan informaci&oacute;n en los ficheros de las im&aacute;genes (JPEG y TIFF). Los datos Exif se encuentran en la cabecera del fichero de la imagen y contienen importantes datos tales como el fabricante de la c&aacute;mara, el modelo de la misma, d&iacute;a y hora en que se hizo la foto, tiempo de exposici&oacute;n, etc.<br /> Tenga en cuenta que publicitando el contenido del Exif de una imagen, puede estar mostrando sin querer una serie de detalles que no estaban destinados al p&uacute;blico.');
DEFINE('_JGA_EXIF_SETTINGS_INTRO2','S&oacute;lo se puede leer los datos EXIF de los ficheros originales. Cuando se borran estos en la transferencia, los datos EXIF dejan de ser legibles.<br />Adem&aacute;s hace falta instalar y activar el lector de datos EXIF en el servidor Web. Resultado del testeo de su servidor: ');//NEW
DEFINE('_JGA_SHOW_DETAIL_EXIFDATA','Mostrar datos Exif');
DEFINE('_JGA_SHOW_DETAIL_EXIFDATA_LONG','&iquest;Desea que se muestren los datos Exif de las im&aacute;genes cuando los tengan? Si elije &quot;S&iacute;&quot; en las siguientes opciones podr&aacute; decidir qu&eacute; informaci&oacute;n va a mostrar. En caso contrario no tendr&aacute;n ning&uacute;n efecto.');
DEFINE('_JGA_IPTC_SETTINGS','IPTC-Data');//NEW
DEFINE('_JGA_IPTC_SETTINGS_INTRO','As with EXIF data, also IPTC data are stored in a dedicated area within the header of a digital image file (as well as other media). The IPTC-NAA Standard was developed by the <b>I</b>nternational <b>P</b>ress <b>T</b>elecommunications <b>C</b>ouncil (IPTC) in cooperation the <b>N</b>ewspaper <b>A</b>ssociation of <b>A</b>merica (NAA) and allows to store authorship and copyright information as well as title and relevant keywords for context related search directly within the image file itself, and as such represent an important asset in image file management. As opposed to the EXIF standart, IPTC data are not generated automatically, but need to be written into the image header with the help of special software.');//NEW
DEFINE('_JGA_IPTC_SETTINGS_INTRO2','Only fields that comply to IPTC-NAA standards will be displayed. The recent NewsML format and the alternative XMP format are not (yet) supported. Note also that IPTC data can only be read from original files. Thus, if you choose to delete the original images after upload, IPTC data will become unavailable.');//NEW
DEFINE('_JGA_SHOW_DETAIL_IPTCDATA','Show IPTC data');//NEW
DEFINE('_JGA_SHOW_DETAIL_IPTCDATA_LONG','Shall the IPTC data of the chosen picture be shown if available? If &quot;Yes&quot; by the following options you can decide which information will be published. Otherwise they are ineffective.');//NEW
DEFINE('_JGA_IPTC_COPYRIGHT','IPTC standard specifications (tag, tag-nr. description, defintion) are copyright of the International Press Telecommunications Council (<a href="http://www.iptc.org." target="_blank">www.iptc.org</a>). The use of these specifications is only permitted if they remain unaltered from those defined in official IPTC publications. The specifications used here are from the document &quot;<a href="http://iptc.cms.apa.at/std/photometadata/2008/specification/IPTC-PhotoMetadata-2008_2.pdf" target="_blank">Photo Metadata 2008, which also contains all respective licensing details.');//NEW
DEFINE('_JGA_IPTC_COPYRIGHT_LANGUAGE','');//NEW
DEFINE('_JGA_TOPLIST_SETTINGS','Listas de &Eacute;xitos');
DEFINE('_JGA_SHOW_TOPLIST','Mostrar Lista de &Eacute;xitos');
DEFINE('_JGA_SHOW_TOPLIST_LONG','&iquest;D&oacute;nde quiere que se coloque la lista? La lista est&aacute; formada por una serie de v&iacute;nculos a las p&aacute;ginas en las que se muestran las &uacute;ltimas im&aacute;genes a&ntilde;adidas, comentadas, ... Si elige &quot;No Mostrar&quot; las siguientes opciones no surtir&aacute;n ning&uacute;n efecto.');
DEFINE('_JGA_SHOW_TOPLIST_ON_VIEWS','Visualizaci&oacute;n de Listas por P&aacute;gina');
DEFINE('_JGA_ALL_VIEWS','en todas las p&aacute;ginas');
DEFINE('_JGA_ONLY_GALLERYVIEW','s&oacute;lo en la vista de la galer&iacute;a');
DEFINE('_JGA_GALLERY_AND_CATEGORYVIEW','en la vista de la galer&iacute;a y en la de categor&iacute;a');
DEFINE('_JGA_SHOW_TOPLIST_ON_VIEWS_LONG','&iquest;En qu&eacute; p&aacute;ginas desea que aprezca la lista? Puede escoger en qu&eacute; p&aacute;ginas de la galer&iacute;a se va a mostrar la lista. No aparecer&aacute; en el resto de las p&aacute;ginas.');
DEFINE('_JGA_TOPLIST_NUMB_COLS','Columnas');
DEFINE('_JGA_TOPLIST_NUMB_COLS_LONG','N&uacute;mero de columnas con las que se visualizar&aacute; el detalle de la lista');
DEFINE('_JGA_TOPLIST_NUMB_ENTRIES','Componentes de la Lista');
DEFINE('_JGA_TOPLIST_NUMB_ENTRIES_LONG','N&uacute;mero de im&aacute;genes que se mostrar&aacute;n en cada p&aacute;gina. Este valor ser&aacute; el n&uacute;mero m&aacute;ximo de im&aacute;genes que se mostrar&aacute; en cada p&aacute;gina. El n&uacute;mero en cuesti&oacute;n afectar&aacute; solamente a las im&aacute;genes que pertenezcan a cada lista. Si s&oacute;lo tuvieramos tres im&aacute;genes con comentarios s&oacute;lo ver&iacute;amos esas tres im&aacute;genes en "&uacute;ltimos comentarios", independientemente del n&uacute;mero establecido en esta opci&oacute;n (siempre que el n&uacute;mero introducido fuese mayor o igual a tres).');
DEFINE('_JGA_TOPLIST_THUMBALIGN','Alineaci&oacute;n de las miniaturas');
DEFINE('_JGA_TOPLIST_THUMBALIGN_LONG','Alineaci&oacute;n en columnas de las miniaturas. Si las miniaturas se muestran en una &uacute;nica columna, imaginemos que tenemos tres columnas, las miniaturas se situar&aacute;n en la de la izquierda, centro o derecha seg&uacute;n seleccionemos en esta opci&oacute;n. Si la vista se presenta en varias columnas, esta opci&oacute;n define la alineaci&oacute;n tanto de las miniaturas como de los detalles de las mismas a lo largo de toda la anchura de la p&aacute;gina.');
DEFINE('_JGA_TOPLIST_TEXTALIGN','Alineaci&oacute;n de los detalles');
DEFINE('_JGA_TOPLIST_TEXTALIGN_LONG','Esta opci&oacute;n s&oacute;lo se tiene en cuenta si las miniaturas se muestran en una &uacute;nica columna. En este caso las im&aacute;genes se alinear&aacute;n a la derecha de la pantalla.');
DEFINE('_JGA_TOPLIST_SHOW_RATING','&Uacute;ltimas im&aacute;genes evaluadas');
DEFINE('_JGA_TOPLIST_SHOW_RATING_LONG','&iquest;Desea mostrar el v&iacute;nculo a las &uacute;ltimas im&aacute;genes evaluadas?');
DEFINE('_JGA_TOPLIST_SHOW_LATEST','&Uacute;ltimas im&aacute;genes a&ntilde;adidas');
DEFINE('_JGA_TOPLIST_SHOW_LATEST_LONG','&iquest;Desea mostrar el v&iacute;nculo a las &uacute;ltimas im&aacute;genes a&ntilde;adidas?');
DEFINE('_JGA_TOPLIST_SHOW_COMMENTS','&Uacute;ltimas im&aacute;genes comentadas');
DEFINE('_JGA_TOPLIST_SHOW_COMMENTS_LONG','&iquest;Desea mostrar el v&iacute;nculo a las &uacute;ltimas im&aacute;genes comentadas?');
DEFINE('_JGA_TOPLIST_THISCOMMENT','Mostrar el Comentario');
DEFINE('_JGA_TOPLIST_THISCOMMENT_LONG','En esta opci&oacute;n decidimos si mostramos los comentarios en la Lista de &quot;&uacute;ltimas comentadas&quot; incluyendo autor y fecha.');
DEFINE('_JGA_TOPLIST_SHOW_MOSTVIEWED','Im&aacute;genes m&aacute;s vistas');
DEFINE('_JGA_TOPLIST_SHOW_MOSTVIEWED_LONG','&iquest;Desea mostrar el v&iacute;nculo a las im&aacute;genes m&aacute;s vistas?');
DEFINE('_JGA_FAVOURITES_SETTINGS','Favoritos');//NEW
DEFINE('_JGA_USE_FAVOURITES','Utilizar Favoritos:');//NEW
DEFINE('_JGA_USE_FAVOURITES_LONG','Aqu&iacute; se activa la funci&oacute;n de Favoritos y habilita las siguientes opciones. Los usuarios registrados pueden seleccionar las im&aacute;genes que les gusten y acceder a ellas siempre que quieran por medio del v&iacute;nculo "Mis Favoritos".');//NEW
DEFINE('_JGA_FAVOURITES_USERS','&iquest;Qui&eacute;n puede utilizarlos?');//NEW
DEFINE('_JGA_FAVOURITES_USERS_LONG','Aqu&iacute; usted decide si los usuarios registrados y los especiales pueden utilizar los Favoritos o si s&oacute;lo pueden hacerlo los especiales (grupo "Autor" y superiores).');//NEW
DEFINE('_JGA_FAVOURITES_REG_SPEC','registrados y especiales');//NEW
DEFINE('_JGA_FAVOURITES_ONLY_SPEC','s&oacute;lo especiales');//NEW
DEFINE('_JGA_FAVOURITES_GUEST_INFORMATION','Aviso si no se tienen derechos suficientes:');//NEW
DEFINE('_JGA_FAVOURITES_GUEST_INFORMATION_LONG','&iquest;Desea que se avise a los usuarios, cuando no tengan suficientes permisos, de que s&oacute;lo los usuarios registrados pueden utilizar los Favoritos?');//NEW
DEFINE('_JGA_MAX_FAVOURITES','N&uacute;mero m&aacute;ximo de im&aacute;genes:');//NEW
DEFINE('_JGA_MAX_FAVOURITES_LONG','Establezca aqu&iacute; el n&uacute;mero m&aacute;ximo de im&aacute;genes que un usuario puede seleccionar como Favorito. Es un dato MUY IMPORTANTE a la hora de permitir a los usuarios generar archivos comprimidos(ZIP) muy grandes, en caso de que la funci&oacute;n de "descarga de zip" sea utilizada simultaneamente por varios usuarios. (Si no quiere fijar un l&iacute;mite ponga este valor a 0.)');//NEW
DEFINE('_JGA_ZIPDOWNLOAD','Descarga de Zip:');//NEW
DEFINE('_JGA_ZIPDOWNLOAD_LONG','&iquest;Quiere conceder a los usuarios la posibilidad de crear ficheros zip descargables que contengan sus Favoritos?');//NEW
DEFINE('_JGA_FAVOURITES_FOR_PUBLIC_ZIP','Descarga P&uacute;blica de Zip:');//NEW
DEFINE('_JGA_FAVOURITES_FOR_PUBLIC_ZIP_LONG','Debido a que los usuarios NO registrados no pueden utilizar el sistema de Favoritos se puede, por lo menos, darles la posibilidad de utilizar la descarga en zip. Esta funci&oacute;n <b>s&oacute;lo</b> esta disponible para <b>Joomla 1.5</b>.');//NEW
DEFINE('_JGA_FAVOURITES_FOR_ZIP','Utilizar s&oacute;lo Descarga Zip:');//NEW
DEFINE('_JGA_FAVOURITES_FOR_ZIP_LONG','Si se activa esta opci&oacute;n, los favoritos no se marcar&aacute;n como "Favoritos". En ese caso todos los usuarios s&oacute;lo utilizar&aacute;n la descarga en zip.');//NEW

//administrator/components/com_joomgallery/includes/html/admin.help.html.php
DEFINE('_JGA_HELP_MANAGER','Informaci&oacute;n y Ayuda');
DEFINE('_JGA_HELP_TEAM','El Equipo');
DEFINE('_JGA_HELP_CHIEF','L&iacute;der de Proyecto');
DEFINE('_JGA_HELP_CHIEF2','Segundo');
DEFINE('_JGA_HELP_PROGRAMMING','Programaci&oacute;n');
DEFINE('_JGA_HELP_ADVISORY','Asesor&iacute;a');
DEFINE('_JGA_HELP_QUALITY','Control de Calidad');
DEFINE('_JGA_HELP_SUPPORT','Soporte');
DEFINE('_JGA_LANGUAGE_COORDINATION','Coordinaci&oacute;n de Idiomas');
DEFINE('_JGA_HELP_ENGLISH','Ingl&eacute;s');
DEFINE('_JGA_HELP_DUTCH','Alem&aacute;n');
DEFINE('_JGA_HELP_RUSSIAN','Ruso');
DEFINE('_JGA_HELP_FINNISH','Finland&eacute;s');
DEFINE('_JGA_HELP_CHINESE','Chino, tradicional & simplificado');
DEFINE('_JGA_HELP_FRENCH','Franc&eacute;s');
DEFINE('_JGA_HELP_HUNGARIAN','H&uacute;ngaro');
DEFINE('_JGA_HELP_DANISH','Dan&eacute;s');
DEFINE('_JGA_HELP_BRAZILIAN','Portugu&eacute;s');
DEFINE('_JGA_HELP_JAPANESE','Japon&eacute;s');//NEW
DEFINE('_JGA_HELP_SPANISH','Castellano');//NEW
DEFINE('_JGA_HELP_TRANSLATION','Traducci&oacute;n');
DEFINE('_JGA_HELP_LINKS','Enlaces / Ayuda');
DEFINE('_JGA_HELP_PROJECT_WEBSITE','Web original del Proyecto (Mapa, Documentaci&oacute;n, FAQ, Descargas)');
DEFINE('_JGA_HELP_SUPPORT_FORUM','Foro del Proyecto');
DEFINE('_JGA_HELP_PROJECTSITE','Web original del Proyecto (Gesti&oacute;n de Fallos, Petici&oacute;n de Caracter&iacute;sticas, SVN)');
DEFINE('_JGA_HELP_AVALIABLE_TRANSLATIONS','Traducciones Disponibles / ficheros de lenguaje');
DEFINE('_JGA_HELP_DOWNLOAD_TRANSLATIONS','Pulsa en la bandera para descargar el lenguaje correspondiente.');
DEFINE('_JGA_HELP_THANKS','Agradecimientos / Cr&eacute;ditos');
DEFINE('_JGA_HELP_DONATIONS','Sostenimiento / donativos para el proyecto de JoomGallery');
DEFINE('_JGA_HELP_DONATIONS_LONG','Adem&aacute;s de mucho tiempo de ocio, el desarrollo y soporte de este proyecto, tambi&eacute;n cuesta dinero.<br /> Aporta tu donativo a Joomgallery para que podamos seguir desarrollando este programa sin coste alguno.<br />Gracias!');
DEFINE('_JGA_HELP_SPONSORS','Si quiere ayudar a nuestro proyecto de cualquier otra manera - h&aacute;galo participando en &eacute;l o como patrocinador - simplemente escriba un email a:<br />');
DEFINE('_JGA_HELP_LICENCE','Licencia / Garant&iacute;a');
DEFINE('_JGA_HELP_NO_GUARANTEE','El componente <a href="http://www.joomgallery.net" target="_blank">JoomGallery</a> para <a href="http://www.joomla.org" target="_blank">Joomla!</a> es Software Libre, distribu&iacute;do bajo licencia <a href="http://www.gnu.org/licenses/gpl-2.0.html">GNU/GPL</a>.<br /><br />A pesar de analizarlo a fondo, no garantizamos que nuestro software funcione correctamente, total o parcialmente.');
DEFINE('_JGA_HELP_PROMOTE','Gestionado por:');

//administrator/components/com_joomgallery/includes/html/admin.migration.html.php
DEFINE('_JGA_CHECKMIGRATION_PONY','Verificar la posibilidad de actualizar de Ponygallery ML a JoomGallery:'); 
DEFINE('_JGA_CHECKMIGRATION_4IMAGES','Verificar la posibilidad de actualizar de 4image a JoomGallery:');

//administrator/components/com_joomgallery/includes/html/admin.pictures.html.php
DEFINE('_JGA_PICTURE_MANAGER','Gestor de Im&aacute;genes');
DEFINE('_JGA_SORT_BY_CATEGORY','Ordenar por Categor&iacute;a:');
DEFINE('_JGA_HITS','Accesos');
DEFINE('_JGA_ALERT_PICTURE_MUST_HAVE_TITLE','La imagen necesita tener título');//ALERT
DEFINE('_JGA_ALERT_YOU_MUST_SELECT_PICTURE_FILENAME','Necesita escribir el nombre del fichero de la imagen.');//ALERT
DEFINE('_JGA_ALERT_YOU_MUST_SELECT_THUMBNAIL_FILENAME','Necesita escribir el nombre del fichero de la miniatura.');//ALERT
DEFINE('_JGA_PICTURE_ADD','A&ntilde;adir Imagen');
DEFINE('_JGA_DOES_ORIGINAL_EXIST','&iquest;Existe el original?');
DEFINE('_JGA_ORIGINAL_EXIST','¡El original existe!');
DEFINE('_JGA_ORIGINAL_NOT_EXIST','¡El original no existe!');
DEFINE('_JGA_NO_PICTURE_SELECTED','¡No se ha seleccionado ninguna imagen!');
DEFINE('_JGA_ASSIGN_ORIGINAL','Asignar el original');
DEFINE('_JGA_COMPULSORYFIELDS','Campos Obligatorios');
DEFINE('_JGA_ASSIGN_ORIGINAL_LONG','Seleccione la opci&oacute;n cuando haya que asignar una imagen original a la imagen. Dado que al subir las im&aacute;genes podemos decidir borrar los originales, es posible que no tengamos una imagen original disponible. <br />Tenga en cuenta que s&oacute;lo puede asignar una imagen original que tenga el mismo nombre que la imagen detallada y que esa imagen original tiene que estar en la carpeta &quot;originals_directory / name_of_category&quot; .<br />Despu&eacute;s de seleccionar la imagen, se le mostrar&aacute; un mensaje que le dir&aacute; si la imagen original seleccionada es valida. Si selecciona &quot;S&iacute;&quot; y la imagen original no existe, se utilizar&aacute; la imagen detallada en lugar de la original. En caso contrario, no se asignar&aacute; ninguna imagen original a la imagen.');
DEFINE('_JGA_PICTURE_PREVIEW','Vista Previa de la Imagen');
DEFINE('_JGA_PICTURE_EDIT','Editar Imagen');
DEFINE('_JGA_PICTURE_RATING','Evaluaci&oacute;n de la Imagen');
DEFINE('_JGA_PICTURE_VOTES',' Votos');
DEFINE('_JGA_CLEAR_PICTURE_VOTES', 'Borrar todos los votos de esta imagen'); 
DEFINE('_JGA_MOVE_PICTURE','Mover im&aacute;genes a otra categor&iacute;a diferente');
DEFINE('_JGA_MOVE_PICTURE_TO_CATEGORY','Categor&iacute;a a la que vamos a mover las im&aacute;genes');
DEFINE('_JGA_PICTURES_TO_MOVE','Im&aacute;genes a mover');
DEFINE('_JGA_PREVIOUS_CATEGORY','categor&iacute;a anterior');

//administrator/components/com_joomgallery/includes/admin.uploads.html.php
DEFINE('_JGA_PICTURE_UPLOAD_MANAGER','Subir Im&aacute;genes');
DEFINE('_JGA_UPLOAD_COMPLETE_CHOOSE_NEXT','Transferencia terminada con &eacute;xito. ¡Seleccione la siguiente imagen!');
DEFINE('_JGA_PLEASE_SELECT_IMAGE','Seleccionar Imagen');
DEFINE('_JGA_PICTURE_ASSIGN_TO_CATEGORY','Categor&iacute;a a la que se van a copiar las im&aacute;genes');
DEFINE('_JGA_GENERIC_TITLE','T&iacute;tulo Gen&eacute;rico');
DEFINE('_JGA_GENERIC_DESCRIPTION','Descripci&oacute;n Gen&eacute;rica');
DEFINE('_JGA_OPTION','(opcional)');
DEFINE('_JGA_DELETE_ORIGINAL_AFTER_UPLOAD','Borrar im&aacute;genes de la carpeta "original" despu&eacute;s de la transferencia');
DEFINE('_JGA_CREATE_SPECIAL_GIF','Ficheros de imagen transparentes o animados');
DEFINE('_JGA_UPLOAD','Transferir');
DEFINE('_JGA_DELETE_ORIGINAL_AFTER_UPLOAD_ASTERISK','Eligiendo esta opci&oacute;n se borraran las im&aacute;genes originales del servidor despu&eacute;s de terminar la transferencia. Elija esta opci&oacute;n si tiene un servidor con poco espacio. No obstante no se tocar&aacute;n ni las miniaturas ni las vistas detalladas.');
DEFINE('_JGA_CREATE_SPECIAL_GIF_ASTERISK','Esta opci&oacute;n permite transferir ficheros especiales. Seleccione esta opci&oacute;n &uacute;nicamente si TODOS los ficheros a transferir son animados o transparentes (ficheros .png or .gif). Estos ficheros no ser&aacute;n redimensionados de tal forma que se mostrar&aacute;n con su tama&ntilde;o original en la vista detallada.');
DEFINE('_JGA_BATCH_UPLOAD_MANAGER','Transferencia por Lotes');
DEFINE('_JGA_BATCH_UPLOAD_NOTE','I M P O R T A N T E &nbsp;&nbsp;&nbsp; A T E N C I &Oacute; N ! !<br />Por favor, no transferir directorios comprimidos! <br /> S&oacute;lo se transferir&aacute;n correctamente los ficheros de im&aacute;genes comprimidos.');
DEFINE('_JGA_BATCH_ZIP_FILE','Fichero de Im&aacute;genes Comprimidas (.zip)');
DEFINE('_JGA_COUNTER_NUMBER','Iniciar la numeraci&oacute;n');
DEFINE('_JGA_START_BATCHUPLOAD','Comenzar Transferencia');
DEFINE('_JGA_COUNTER_NUMBER_ASTERISK','Al t&iacute;tulo gen&eacute;rico de las im&aacute;genes se le asignan n&uacute;meros consecutivos. Introduzca un valor en este campo si quiere que la numeraci&oacute;n empiece por ese valor. En caso contrario deje el campo vac&iacute;o');
DEFINE('_JGA_FTP_UPLOAD_MANAGER','Transferencia V&iacute;a FTP');
DEFINE('_JGA_SELECT_DIRECTORY','Carpeta Nueva');
DEFINE('_JGA_CHANGE_FOLDER','Cambiar Ruta');
DEFINE('_JGA_PLEASE_SELECT_PICTURES','Por favor, seleccione las im&aacute;genes ');
DEFINE('_JGA_DELETE_AFTER_UPLOAD','&iquest;Desa borrar las im&aacute;genes (originales) despu&eacute;s de la transferencia?');
DEFINE('_JGA_JAVA_UPLOAD_MANAGER','Transferencia Mediante Java');
DEFINE('_JGA_JUPLOAD_NOTE', 'I M P O R T A N T E &nbsp;&nbsp;&nbsp; A T E N C I &Oacute; N ! !<br />Para utilizar la transferencia mediante Java, su navegador necesita tener instalado el plugin de Java versi&oacute;n 1.5 o superior, en caso contrario la aplicaci&oacute;n no funcionar&aacute;. Adem&aacute;s, deber&aacute; aceptar el certificado de seguridad para esta aplicaci&oacute;n.');
DEFINE('_JGA_JUPLOAD_YOU_MUST_SELECT_CATEGORY','Tiene que seleccionar una categor&iacute;a.');
DEFINE('_JGA_JUPLOAD_PICTURE_MUST_HAVE_TITLE','La imagen tiene que tener t&iacute;tulo');

//administrator/components/com_joomgallery/includes/html/admin.votes.html
DEFINE('_JGA_VOTES_MANAGER','Gesti&oacute;n de Votaciones');
DEFINE('_JGA_SYNCHRONIZE_VOTES', 'Despuraci&oacute;n de Votos'); 
DEFINE('_JGA_SYNCHRONIZE_VOTES_LONG', 'Depura los votos en funci&oacute;n de la tabla de usuarios. Se eliminar&aacute;n los votos de los usuarios dados de baja. ATENCI&Oacute;N: Se borrar&aacute;n todos los votos que no tengan un usuario asignado (p.ej. cuando hayan sido importados de PonyGallery ML)'); 
DEFINE('_JGA_RESET_VOTES', 'Reiniciar votos'); 
DEFINE('_JGA_RESET_VOTES_LONG', 'Pone a cero los votos de todas las im&aacute;genes.');
DEFINE('_JGA_ALERT_RESET_VOTES_CONFIRM', '¿Seguro que quiere continuar? ¡Algunos o todos los votos van a ser eliminados!');//ALERT

//administrator/components/com_joomgallery/includes/html/admin.cssedit.php
DEFINE('_JGA_CSS_CANCELED','Edici&oacute;n de CSS canceleda.');
DEFINE('_JGA_CSS_SAVED','Fichero CSS personalizado guardado.');
DEFINE('_JGA_CSS_DELETED','Fichero CSS personalizado borrado.');
DEFINE('_JGA_CSS_ERROR_WRITING','Error intentando escribir fichero CSS: ');
DEFINE('_JGA_CSS_ERROR_DELETING','Error intentando borrar fichero CSS: ');
DEFINE('_JGA_CSS_ERROR_READING','Error intentando leer fichero CSS: ');
DEFINE('_JGA_CSS_WARNING_PERMS','¡Atenci&oacute;n: no tiene permisos de escritura para el fichero CSS!');

//administrator/components/com_joomgallery/includes/html/admin.cssedit.html.php
DEFINE('_JGA_CSS_MANAGER','Personalice su CSS');
DEFINE('_JGA_EDIT_CSS_EXPLANATION','A continuaci&oacute;n puede editar la actual configuraci&oacute;n de su fichero CSS para Joomgallery, o editar el fichero directamente en el servidor. Tambi&eacute;n puede borrar su personalizaci&oacute;n por medio del bot&oacute;n de la barra de herramientas o volviendo a la Plantilla Original.');
DEFINE('_JGA_NEW_CSS_EXPLANATION','A continuaci&oacute;n puede crear un nuevo CSS personalizado tomando como ejemplo el de la plantilla original, o editar el fichero directamente en el servidor. Pulse &quot;Grabar&quot; cuando haya terminado la nueva personalizaci&oacute;n.'); // new
DEFINE('_JGA_CSS_CONFIRM_DELETE','¿Está seguro de que quiere borrar su fichero personalizado de estilo (CSS)?'); //alert

//administrator/components/com_joomgallery/includes/admin.categories.php
DEFINE('_JGA_ORDERBY_CATPATH_ASC','ascendente por organizaci&oacute;n de categor&iacute;as');  
DEFINE('_JGA_ORDERBY_CATPATH_DESC','descendente por organizaci&oacute;n de categor&iacute;as'); 
DEFINE('_JGA_ORDERBY_DBID_ASC','ascendente por ID'); 
DEFINE('_JGA_ORDERBY_DBID_DESC','descendente por ID'); 
DEFINE('_JGA_ORDERBY_CATNAME_ASC','ascendente por nombre de categor&iacute;a'); 
DEFINE('_JGA_ORDERBY_CATNAME_DESC','descendente por nombre de categor&iacute;a'); 
DEFINE('_JGA_ORDERBY_DBOWNERID_ASC','ascendente por Propietario'); 
DEFINE('_JGA_ORDERBY_DBOWNERID_DESC','descendente por Propietario'); 
DEFINE('_JGA_NOT_PUBLISHED','No publicada');
DEFINE('_JGA_USERCATEGORIES_ONLY','S&oacute;lo categor&iacute;as de usuarios');
DEFINE('_JGA_BACKENDCATEGORIES_ONLY','S&oacute;lo categor&iacute;as del Backend');
DEFINE('_JGA_PLEASE_SELECT_THUMBNAIL','Seleccionar Miniatura');

//administrator/components/com_joomgallery/includes/admin.comments.php
DEFINE('_JGA_ALERT_SELECT_AN_ITEM','Seleccione un elemento para');//ALERT
DEFINE('_JGA_ALERT_SELECT_AN_ITEM_TO_DELETE','Seleccione un elemento para borrar');//ALERT

//administrator/components/com_joomgallery/includes/admin.configuration.php
DEFINE('_JGA_EASYCAPTCHA_INSTALLED','EasyCaptcha est&aacute; instalado y funciona correctamente');
DEFINE('_JGA_EASYCAPTCHA_NOT_INSTALLED','Parece que EasyCaptcha no est&aacute; instalado');
DEFINE('_JGA_GD_INSTALLED_PARTONE','Parece que el GD est&aacute; instalado y funciona correctamente. Su sistema parece tener la versi&oacute;n ');
DEFINE('_JGA_GD_INSTALLED_PARTTWO',' de GD. Las Miniaturas y las redimensiones funcionar&aacute;n correctamente.');
DEFINE('_JGA_GD_NO_VERSION','Parece que el GD est&aacute; instalado, pero no se puede asegurar qu&eacute; versi&oacute;n es. Mire en la pantalla  SYSTEM | SYSTEM INFO | PHP INFO  para revisar la instalaci&oacute;n de su GD y cu&aacute;l es su versi&oacute;n.');
DEFINE('_JGA_GD_NOT_INSTALLED','Parece que el GD no est&aacute; instalado en su sistema. JoomGallery necesita GD para generar las miniaturas y redimensionar sus im&aacute;genes. Sin GD deber&aacute; generar sus miniaturas manualmente y subirlas de una en una. Si no piensa utilizar ninguno, en la opci&oacute;n de Procesador de Im&aacute;genes ponga "Ninguno". Si necesita ayuda para instalar el GD, puede dirigirse a ');
DEFINE('_JGA_GD_MORE_INFO',' para m&aacute;s informaci&oacute;n.');
DEFINE('_JGA_IM_INSTALLED','<b>Parece que ImageMagick est&aacute; instalado y funciona correctamente</b><br />La ruta ser&aacute; detectada autom&aacute;ticamente. Deje el campo vac&iacute;o. '); 
DEFINE('_JGA_IM_NOT_INSTALLED','Ruta de ImageMagick. Debe terminar en /. Deje este campo vac&iacute;o para que ImageMagick sea detectado autom&aacute;ticamente.<br /><b>ImageMagick no est&aacute; instalado en su sistema. Podr&iacute;a ser que la ruta de ImageMagick no fuese la correcta. En caso de duda pregunte al gestor de su dominio si tiene instalado ImageMagick en su servidor. Como opci&oacute;n alternativa a ImageMagick puede utilizar GD o GD2.</b>');
DEFINE('_JGA_EXIF_NOT_INSTALLED','El lector de datos EXIF no est&aacute; instalado en su servidor.');//NEW
DEFINE('_JGA_EXIF_INSTALLED','El lector de datos EXIF est&aacute; instalado en su servidor. Los datos EXIF se mostrar&aacute;n adecuadamente.');//NEW
DEFINE('_JGA_EXIF_INSTALLED_BUT','El lector de datos EXIF est&aacute; instalado en su servidor pero no est&aacute; activado.');//NEW
DEFINE('_JGA_EXIF_NO_OPTIONS','Las siguientes opciones no producir&aacute;n ning&uacute;n efecto. Contacte con su proveedor o con el administrador de su sistema.');//NEW
DEFINE('_JGA_DIRECTORY_WRITEABLE','Se puede escribir en la carpeta');
DEFINE('_JGA_DIRECTORY_UNWRITEABLE','No se puede escribir en la carpeta, revise los permisos');
DEFINE('_JGA_FILE_EXIST','El fichero existe');
DEFINE('_JGA_ALERT_FILE_NOT_EXIST','El fichero no existe');//ALERT
DEFINE('_JGA_ALERT_THUMBNAIL_PATH_SUPPORT','¡Debe escribir la ruta para las miniaturas!');//ALERT
DEFINE('_JGA_CSS_NOT_WRITEABLE','¡Error guardando el fichero de estilos!'); 
DEFINE('_JGA_CONFIGURATION_WRITEABLE','El fichero de configuraci&oacute;n tiene permisos de escritura!');//NEW
DEFINE('_JGA_CONFIGURATION_NOT_WRITEABLE','¡El fichero de configuraci&oacute;n no tiene permisos de escritura!');
DEFINE('_JGA_SETTINGS_SAVED','Opciones grabadas');
DEFINE('_JGA_OF','de');// Preguntar

//administrator/components/com_joomgallery/includes/admin.pictures.php
DEFINE('_JGA_ALL_PICTURES','Todas las im&aacute;genes');
DEFINE('_JGA_NOT_APPROVED_ONLY','S&oacute;lo im&aacute;genes no autorizadas');
DEFINE('_JGA_APPROVED_ONLY','S&oacute;lo im&aacute;genes autorizadas');
DEFINE('_JGA_USER_UPLOADED_ONLY','S&oacute;lo im&aacute;genes transferidas por usuarios');
DEFINE('_JGA_ADMIN_UPLOADED_ONLY','S&oacute;lo im&aacute;genes transferidas por administ.');
DEFINE('_JGA_SELECT_CATEGORY ','Elija Categor&iacute;a');
DEFINE('_JGA_ALERT_PLEASE_SELECT_CATEGORY','¡Por favor, elija una categoría!');//ALERT

//administrator/components/com_joomgallery/includes/admin.uploads.php
DEFINE('_JGA_ALERT_YOU_MUST_SELECT_ONE_PICTURE','Por favor, elija una imagen.');  //ALERT
DEFINE('_JGA_ALERT_WRONG_EXTENSION','¡Fichero erróneo!\nSólo se admiten .jpg, .jpeg, .jpe, .gif o .png '); //ALERT
DEFINE('_JGA_ALERT_WRONG_FIILENAME','No se permite escribir caracteres especiales en este campo. \n Sólo a-z, A-Z, -, _ son admitidos.'); //ALERT
DEFINE('_JGA_ALERT_FILENAME_DOUBLE1','¡Ficheros repetidos!\nEn el campo'); //ALERT
DEFINE('_JGA_ALERT_FILENAME_DOUBLE2','y en el campo'); //ALERT
DEFINE('_JGA_ALERT_YOU_MUST_SELECT_ONE_FILE','Por favor, seleccione un fichero.'); //ALERT
DEFINE('_JGA_ALERT_WRONG_VALUE','Dato incorrecto en campo!'); //ALERT

//administrator/components/com_joomgallery/includes/admin.votes.php
DEFINE('_JGA_USERVOTES_SYNCHRONIZED','Todos los votos corresponden a usuarios activos'); 
DEFINE('_JGA_ALL_VOTES_DELETED','Se han borrado todos los votos!'); 

//administrator/components/com_joomgallery/admin.joomgallery.html.php
DEFINE('_JGA_ADMINMENU','Panel de Control de JoomGallery');

//administrator/components/com_joomgallery/common.joomgallery.php
DEFINE('_JG_FILE_NOT_FOUND','¡ERROR: no se encuentra el fichero!');
DEFINE('_JG_GD_ONLY_JPG_PNG','¡ERROR: GD s&oacute;lo mpuede manipular ficheros JPG y PNG!');
DEFINE('_JG_RESIZE_TO_MAX','Redimensionando a la anchura m&aacute;xima...');
DEFINE('_JG_CREATE_THUMBNAIL_FROM','Creando miniatura de');
DEFINE('_JG_GD_LIBARY_NOT_INSTALLED','¡La librer&iacute;a de im&aacute;genes GD no est&aacute; instalada!');
DEFINE('_JG_GD_NO_TRUECOLOR','¡La librer&iacute;a de im&aacute;genes GD no puede crear miniaturas en colores verdaderos!');
DEFINE('_JG_NEW_ORDERING_SAVED','Nuevo orden guardado');
DEFINE('_JG_HOME','Inicio');
DEFINE('_JG_PAGE','P&aacute;gina'); 

//administrator/components/com_joomgallery/install.joomgallery.php
DEFINE('_JGA_JOOMGALLERY_SUCCESSFULLY_INSTALLED','JoomGallery se ha instalado correctamente.');

//administrator/components/com_joomgallery/joomgallery.class.php
DEFINE('_JGA_SELECT_AN_ITEM_TO_MOVE','¡Por favor, seleccione los elementos que quiere mover!'); 

//administrator/components/com_joomgallery/toolbar.joomgallery.html.php
DEFINE('_JGA_TOOLBAR_PUBLISH','Publicar');
DEFINE('_JGA_TOOLBAR_UNPUBLISH','Despublicar');
DEFINE('_JGA_TOOLBAR_NEW','Nuevo');
DEFINE('_JGA_TOOLBAR_EDIT','Editar');
DEFINE('_JGA_TOOLBAR_REMOVE','Borrar');
DEFINE('_JGA_TOOLBAR_CPANEL','Panel de Control');
DEFINE('_JGA_TOOLBAR_HELP','Ayuda');
DEFINE('_JGA_TOOLBAR_APPROVE','Autorizar');
DEFINE('_JGA_TOOLBAR_SAVE','Grabar');
DEFINE('_JGA_TOOLBAR_CANCEL','Cancelar');
DEFINE('_JGA_TOOLBAR_MOVE','Mover');
DEFINE('_JGA_TOOLBAR_PUBLISH_COMMENT','Publicar Comentario');
DEFINE('_JGA_TOOLBAR_UNPUBLISH_COMMENT','Despublicar Comentario');
DEFINE('_JGA_TOOLBAR_APPROVE_COMMENT','Aprobar Comentario');
DEFINE('_JGA_TOOLBAR_REMOVE_COMMENT','Borrar Comentario');
DEFINE('_JGA_TOOLBAR_DEL_CSS','Borrar CSS');

//Errors
DEFINE('_JGA_ALERT_ERROR_BR','\n');//ALERT //PLEASE DO NOT CHANGE THIS LINE
DEFINE('_JGA_ALERT_ERROR','¡Se ha producido un error!\n');//ALERT
DEFINE('_JGA_ALERT_ERROR_NUMBER','Número de error: ');//ALERT
DEFINE('_JGA_ALERT_ERROR_BREAK','¡Se ha detenido todo el proceso!');//ALERT
DEFINE('_JGA_ALERT_ERROR_CATID','ID de Categoría: ');//ALERT
DEFINE('_JGA_ALERT_ERROR_DIRECTORY','Carpeta: ');//ALERT
DEFINE('_JGA_ALERT_ERROR_NAME','Nombre: ');//ALERT
DEFINE('_JGA_ALERT_ERROR_SEE_FAQS','Para más información sobre este error consulte nuestras FAQs: ');//ALERT
DEFINE('_JGA_ALERT_ERROR_NOTE','Si no encuentra la solución en las FAQ, apunte el número de error y cualquier información sobre el mismo y visite nuestro Foro de Soporte: ');//ALERT
DEFINE('_JGA_ALERT_ERROR_FORUM','http://www.forum.en.joomgallery.net/');//ALERT //PLEASE DO NOT CHANGE THIS LINE
DEFINE('_JGA_ALERT_ERROR_FAQ','http://www.en.joomgallery.net/faq/errors/error');//ALERT //PLEASE DO NOT CHANGE THIS LINE
DEFINE('_JGA_ALERT_ERROR_HTML','.html');//ALERT //PLEASE DO NOT CHANGE THIS LINE
DEFINE('_JGA_ALERT_ERROR_0','¡Error sin definir!');//ALERT 
DEFINE('_JGA_ALERT_ERROR_1001','La categoría correspondiente al ID de más abajo no puede borrarse porque todavía tiene imágenes o subcategorías. Por favor, borre o mueva primero todas las imágenes y subcategorías.');//ALERT

?>
