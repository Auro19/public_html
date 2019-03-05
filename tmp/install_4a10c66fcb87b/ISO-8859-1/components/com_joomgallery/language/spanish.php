<?php
// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-1.0/LF/trunk/ISO-8859-1/language/spanish.php $
// $Id: spanish.php 788 2008-12-15 06:32:42Z aha $
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


/***   Spanish language for the Frontend
  **   By: Ernesto de la Fuente
  **   mailto:erny@anonadina.com
  **   last modified on 10/12/2008
  **
*/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

//components/com_joomgallery/classes/modules.class.php
DEFINE('_JGS_ALERT_NO_DETAILVIEW_FOR_GUESTS','Los invitados no están autorizados a ver los detalles de las imágenes. Por favor, regístrese.');//ALERT
DEFINE('_JGS_CATEGORY','Categor&iacute;a');
DEFINE('_JGS_DESCRIPTION','Descripci&oacute;n');
DEFINE('_JGS_UPLOAD_DATE','Fecha de transferencia ');
DEFINE('_JGS_HITS','Accesos');
DEFINE('_JGS_RATING','Evaluaci&oacute;n');
DEFINE('_JGS_NO_RATINGS','Sin evaluar');
DEFINE('_JGS_LAST_COMMENT_DATE','&uacute;ltimo comentario en');
DEFINE('_JGS_NUMBER_OF_COMMENTS','N&uacute;mero de comentarios ');
DEFINE('_JGS_LAST_COMMENT_BY','hecho por ');

//components/com_joomgallery/classes/upload.class.php
DEFINE('_JGS_YOU_ARE_NOT_LOGGED','No está registrado.');//ALERT
DEFINE('_JGS_ALERT_MAX_ALLOWED_FILESIZE','Error: El fichero no puede ser mayor que ');//ALERT
DEFINE('_JGS_ALERT_BYTES',' bytes');//ALERT
DEFINE('_JGS_ALERT_SAME_PICTURE_ALREADY_EXIST','Ya existe una imagen con el mismo nombre, elija un nombre distinto e inténtelo de nuevo');//ALERT
DEFINE('_JGS_UPLOAD_COMPLETE','Transferencia completa...');
DEFINE('_JGS_PROBLEM_COPYING','Problema copiando el fichero a: ');
DEFINE('_JGS_CHECK_PERMISSIONS','Revise los permisos.');
DEFINE('_JGS_THUMBNAIL_CREATED','Miniatura creada...');
DEFINE('_JGS_RESIZED_TO_MAXWIDTH','Redimensi&oacute;n a la anchura m&aacute;xima, terminada...');
DEFINE('_JGS_ORIGINAL_DELETED','La imagen original ha sido eliminada.');
DEFINE('_JGS_PROBLEM_DELETING_ORIGINAL','La imagen original no se ha podido eliminar.');
DEFINE('_JGS_APPROVED_OWNER_PUBLISHED','publicaci&oacute;n autorizada por el propietario');
DEFINE('_JGS_NEW_PICTURE_UPLOADED','Nueva Imagen Transferida');//ALERT
DEFINE('_JGS_NEW_CONTENT_SUBMITTED','Un nuevo contenido ha sido presentado por');//ALERT
DEFINE('_JGS_TITLED','título');//ALERT
DEFINE('_JGS_ALERT_PICTURE_SUCCESSFULLY_ADDED','Imagen añadida correctamente');//ALERT
DEFINE('_JGS_NEW_FILENAME','Nuevo Nombre de fichero');
DEFINE('_JGS_WRONG_FILENAME','Fichero err&oacute;neo, o imposible copiar a la carpeta de originales la imagen transferida.');
DEFINE('_JGS_ALERT_INVALID_IMAGE_TYPE','Tipo de imagen no válido');//ALERT
DEFINE('_JGS_MORE_UPLOADS','Transferir m&aacute;s im&aacute;genes');
DEFINE('_JGS_BACK_TO_USER_PANEL','Volver a &quot;My Gallery&quot;');
DEFINE('_JGS_BACK_TO_GALLERY','Volver a la vista de la Galer&iacute;a');

//components/com_joomgallery/includes/html/joom.comments.html.php
DEFINE('_JGS_ALERT_COMMENT_DELETED','El comentario ha sido borrado.');//ALERT
DEFINE('_JGS_AUTHOR','Autor');
DEFINE('_JGS_COMMENT','Comentario');
DEFINE('_JGS_COMMENT_ADDED','Comentario a&ntilde;adido');
DEFINE('_JGS_DELETE_COMMENT','Borrar&nbsp;Comentario');
DEFINE('_JGS_BACK','Volver');

//components/com_joomgallery/includes/html/joom.favourites.html.php
DEFINE('_JGS_FAV_HEADING','Mis Favoritos');//NEW
DEFINE('_JGS_ZIP_HEADING','Img&aacute;genes elegidas para la descarga en zip');//NEW
DEFINE('_JGS_FAV_SWITCH_LAYOUT','Cambiar elecci&oacute;n');//NEW
DEFINE('_JGS_FAV_REMOVE_ALL','Borrar lista');//NEW
DEFINE('_JGS_FAV_REMOVE_TOOLTIP_CAPTION','Eliminar imagen de sus favoritos');//NEW
DEFINE('_JGS_ZIP_REMOVE_TOOLTIP_CAPTION','Eliminar imagen de su lista para descargar');//NEW
DEFINE('_JGS_FAV_REMOVE_TOOLTIP_TEXT','Aqu&iacute; puede eliminar esta imagen de sus favoritos.');//NEW
DEFINE('_JGS_ZIP_REMOVE_TOOLTIP_TEXT','Aqu&iacute; puede eliminar esta imagen de su lista para descargar en zip.');//NEW
DEFINE('_JGS_FAV_NO_PICS','No ha marcado ninguna imagen');//NEW
DEFINE('_JGS_ZIP_NO_PICS','No ha seleccionado ninguna imagen');//NEW
DEFINE('_JGS_FAV_DOWNLOAD','Descargar fichero Zip');//NEW
DEFINE('_JGS_ZIP_DOWNLOAD','Descargar fichero Zip');//NEW
DEFINE('_JGS_ZIP_CREATE_TOOLTIP_TEXT','Pulse aqu&iacute; para generar un fichero zip con las im&aacute;genes de la lista que quiere descargar.');//NEW
DEFINE('_JGS_ZIP_DOWNLOAD_READY','Puede descargar aqu&iacute; el fichero zip.');//NEW
DEFINE('_JGS_ZIP_DOWNLOAD_ERROR','Ha ocurrido un error:');//NEW
DEFINE('_JGS_ZIP_FILESIZE_PART_ONE','El fichero es aproxim&aacute;damente de');//NEW
DEFINE('_JGS_ZIP_FILESIZE_PART_TWO','.');//NEW
DEFINE('_JGS_FAV_CREATEZIP_REMOVE_ALL','Si quiere borrar todas las im&aacute;genes de sus Favoritos pulse aqu&iacute;.');//NEW
DEFINE('_JGS_ZIP_CREATEZIP_REMOVE_ALL','Si quiere borrar todas las im&aacute;genes de su lista de descarga pulse aqu&iacute;.');//NEW

//components/com_joomgallery/includes/html/joom.userpanel.html.php
DEFINE('_JGS_NEW_PICTURE','Nueva imagen');
DEFINE('_JGS_PICTURE_NAME','Nombre de la imagen');
DEFINE('_JGS_ACTION','Acci&oacute;n');
DEFINE('_JGS_APPROVED','Autorizado');
DEFINE('_JGS_ALERT_SURE_DELETE_SELECTED_ITEM','¿Está seguro de que quiere borrar la opción seleccionada?');//ALERT
DEFINE('_JGS_DELETE','Borrar');
DEFINE('_JGS_YOU_DO_NOT_HAVE_PICTURE','No tiene im&aacute;genes disponibles.');
DEFINE('_JGS_NEW_CATEGORY_NOTE','L&iacute;mites:');
DEFINE('_JGS_NEW_CATEGORY_MAXCOUNT','N&uacute;mero m&aacute;ximo de categor&iacute;as que puede crear: ');
DEFINE('_JGS_NEW_CATEGORY_YOURCOUNT','N&uacute;mero de categor&iacute;as creadas: ');
DEFINE('_JGS_NEW_CATEGORY_REMAINDER','N&uacute;mero de categor&iacute;as que puede crear: ');
DEFINE('_JGS_NEW_CATEGORY','Categor&iacute;a nueva');
DEFINE('_JGS_PICTURES','im&aacute;genes');
DEFINE('_JGS_PARENT_CATEGORY','Categor&iacute;a superior');
DEFINE('_JGS_ACCESS','Accesos');
DEFINE('_JGS_PUBLISHED','Publicada');
DEFINE('_JGS_EDIT','Editar');
DEFINE('_JGS_YOU_NOT_HAVE_CATEGORY','No tiene usted ninguna categor&iacute;a.');
DEFINE('_JGS_ALERT_CATEGORY_MUST_HAVE_TITLE','La categoría tiene que tener un título');//ALERT
DEFINE('_JGS_MODIFY_CATEGORY','Editar categor&iacute;a');
DEFINE('_JGS_TITLE','T&iacute;tulo');
DEFINE('_JGS_ORDERING','Orden');
DEFINE('_JGS_THUMBNAIL','Miniatura');
DEFINE('_JGS_THUMBNAIL_PREVIEW','Vista previa de la miniatura');
DEFINE('_JGS_SAVE','Guardar');
DEFINE('_JGS_CANCEL','Cancelar');
DEFINE('_JGS_ALERT_MAY_ADD_MAX_OF_PARTONE','Usted puede añadir un máximo de');//ALERT
DEFINE('_JGS_ALERT_MAY_ADD_MAX_OF_PARTTWO','imágenes. Contacte con el administrador si desea transferir más imágenes.');//ALERT
DEFINE('_JGS_NEW_PICTURE_COPYRIGHT','<b>AVISO DE COPYRIGHT:</b> <br /><div align="justify">El propietario de este sitio le concede el derecho a transferir im&aacute;genes al servidor, que ser&aacute;n visibles y accesibles por el p&uacute;blico. Las im&aacute;genes pueden estar sujetas a derechos de autor, por ello s&oacute;lo podr&aacute; transferir im&aacute;genes que haya realizado usted mismo, que est&eacute;n libres de derechos de autor o con autorizaci&oacute;n expresa del mismo. El propietario del sitio rechaza cualquier responsabilidad derivada de la transferencia de im&aacute;genes realizada por usted y declinar&aacute; cualquier reclamaci&oacute;n relacionada con la violaci&oacute;n de los derechos de autor o de cualquier otro tipo de mala utilizaci&oacute;n o abuso. Al transferir im&aacute;genes a este Sitio est&aacute; dando su consentimiento expl&iacute;cito a estas condiciones.</div>');
DEFINE('_JGS_NEW_PICTURE_NOTE','Cuota transferida:');
DEFINE('_JGS_NEW_PICTURE_MAXSIZE','Tama&ntilde;o m&aacute;ximo de la imagen a transferir: ');
DEFINE('_JGS_BYTES',' bytes');
DEFINE('_JGS_NEW_PICTURE_MAXCOUNT','N&uacute;mero m&aacute;ximo de im&aacute;genes que puede transferir: ');
DEFINE('_JGS_NEW_PICTURE_YOURCOUNT','N&uacute;mero de im&aacute;genes transferidas: ');
DEFINE('_JGS_NEW_PICTURE_REMAINDER','N&uacute;mero de im&aacute;genes que puede transferir: ');
DEFINE('_JGS_AUTHOR_OWNER','Autor/Propietario');
DEFINE('_JGS_PICTURE_PATH','Ruta de la imagen');
DEFINE('_JGS_DELETE_ORIGINAL_AFTER_UPLOAD','Borrar im&aacute;genes de la carpeta de Originales despu&eacute;s de la transferencia');
DEFINE('_JGS_CREATE_SPECIAL_GIF','&iquest;Ficheros animados o transparentes?');
DEFINE('_JGS_UPLOAD','Transferir');
DEFINE('_JGS_DELETE_ORIGINAL_AFTER_UPLOAD_ASTERISK','Al elegir esta opci&oacute;n se proceder&aacute; a borrar las im&aacute;genes originales del servidor, una vez que hayan sido transferidas. Elija esta opci&oacute;n s&oacute;lo si su servidor dispone de poco espacio. De cualquier manera las miniaturas y las vistas de detalle no ser&aacute;n modificadas por esta opci&oacute;n, la vista popup no se mostrar&aacute; con un tama&ntilde;o mayor.');
DEFINE('_JGS_CREATE_SPECIAL_GIF_ASTERISK','Esta opci&oacute;n permite transferir ficheros especiales. Elija esta opci&oacute;n s&oacute;lo si va a transferir &Uacute;NICAMENTE ficheros animados o transparentes .png o .gif. ¡Los ficheros no ser&aacute;n redimensionados ni tampoco se mostrar&aacute;n en la vista de detalle a tama&ntilde;o completo, s&oacute;lo con su tama&ntilde;o real!');
DEFINE('_JGS_EDIT_PICTURE','Editar Imagen');
DEFINE('_JGS_PICTURE','Imagen');

//components/com_joomgallery/includes/html/joom.viewcategory.html.php
DEFINE('_JGS_USER_ORDERBY','Ordenar por ');
DEFINE('_JGS_USER_ORDERBY_DEFAULT','Opciones Principales');
DEFINE('_JGS_USER_ORDERBY_DATE','Fecha');
DEFINE('_JGS_USER_ORDERBY_AUTHOR','Autor');
DEFINE('_JGS_USER_ORDERBY_TITLE','T&iacute;tulo');
DEFINE('_JGS_USER_ORDERBY_HITS','N&uacute;mero de Accesos');
DEFINE('_JGS_USER_ORDERBY_RATING','Valoraci&oacute;n');
DEFINE('_JGS_USER_ORDERBY_ASC','ascendente');
DEFINE('_JGS_USER_ORDERBY_DESC','descendente');
DEFINE('_JGS_NO_DATA','Sin datos');
DEFINE('_JGS_ONE_VOTE',' Votar');//NEW
DEFINE('_JGS_VOTES',' Votos');
DEFINE('_JGS_NO_VOTES','Sin Votos');
DEFINE('_JGS_COMMENTS','Comentarios');
DEFINE('_JGS_SUBCATEGORIES','Subcategor&iacute;as');
DEFINE('_JGS_SPECIAL_MEMBERS','[SM]');
DEFINE('_JGS_REGISTERED_MEMBERS','[RM]');
DEFINE('_JGS_THERE_IS','Es la');
DEFINE('_JGS_PICTURE_IN_CATEGORY','imagen de esta categor&iacute;a.');
DEFINE('_JGS_THERE_ARE','Son las');
DEFINE('_JGS_PICTURES_IN_CATEGORY','im&aacute;genes de esta categor&iacute;a.');
DEFINE('_JGS_PAGENAVIGATION_BEGIN','Inicio');
DEFINE('_JGS_PAGENAVIGATION_PREVIOUS','Anterior');
DEFINE('_JGS_PAGENAVIGATION_NEXT','Siguiente');
DEFINE('_JGS_PAGENAVIGATION_END','F&iacute;n');
DEFINE('_JGS_SUBCATEGORY_IN_CATEGORY','Subcategor&iacute;a de esta categor&iacute;a');
DEFINE('_JGS_SUBCATEGORIES_IN_CATEGORY','Subcategor&iacute;as de esta categor&iacute;a');
DEFINE('_JGS_COOLIRISLINK_TEXT','Iniciar Cooliris!');//NEW

//components/com_joomgallery/includes/html/joom.viewdetails.html.php
DEFINE('_JGS_PREVIOUS_IMAGE','Anterior');
DEFINE('_JGS_OF','de');
DEFINE('_JGS_PICTUREDETAILS','Informaci&oacute;n de la imagen');
DEFINE('_JGS_SLIDESHOW','Diapositivas');
DEFINE('_JGS_START','Empezar');
DEFINE('_JGS_PAUSE','Pausa');
DEFINE('_JGS_STOP','Stop');
DEFINE('_JGS_REPEAT_ENDLESS','Repetir indefinidamente');
DEFINE('_JGS_SLIDESHOW_NO_SCRIPT','[Por favor, active JavaScript para poder ver las diapositivas]');//NEW
DEFINE('_JGS_NEXT_IMAGE','Siguiente');
DEFINE('_JGS_DATE','Fecha');
DEFINE('_JGS_FILESIZE','Tam&ntilde; del fichero');
DEFINE('_JGS_FILESIZE_ORIGINAL','Tama&ntilde;o de la imagen original');
DEFINE('_JGS_FULLSIZE_TOOLTIP_TEXT','Pulse en la lupa para ver la imagen a tama&ntilde;o original en una nueva ventana.');
DEFINE('_JGS_FULLSIZE_TOOLTIP_CAPTION','Ver tama&ntilde;o completo');
DEFINE('_JGS_FULLSIZE_TOOLTIP_TEXT_LOGIN','¡Debe registrarse para ver la imagen a tama&ntilde;o completo!');
DEFINE('_JGS_DOWNLOAD_TOOLTIP_TEXT','Pulsar para descargar la imagen.'); 
DEFINE('_JGS_DOWNLOAD_TOOLTIP_CAPTION','Descargar');
DEFINE('_JGS_DOWNLOAD_TOOLTIP_TEXT_LOGIN','¡Debe registrarse para descargar la imagen!'); 
DEFINE('_JGS_NAMESHIELD_TOOLTIP_TEXT','Si se reconoce en una imagen, puede ponerle una etiqueta a la misma. La etiqueta se visualiza en la esquina superior izquierda de la imagen. Utilice el rat&oacute;n para poner la etiqueta en donde usted desee. ¡Aseg&uacute;rese de no pisar otra etiqueta!, las etiquetas anteriores tienen preferencia y tapar&aacute;n la suya. Una vez colocada su etiqueta pulse en este enlace. Podr&aacute; eliminar la etiqueta cuando quiera.');
DEFINE('_JGS_NAMESHIELD_TOOLTIP_CAPTION','Guardar mi Etiqueta');
DEFINE('_JGS_ALERT_SURE_DELETE_NAMESHIELD_','¿Está seguro de que quiere borrar su Etiqueta?');//ALERT
DEFINE('_JGS_NAMESHIELD_DELETE_TOOLTIP_TEXT','Puede borrar su Etiqueta pulsando en este enlace. Podr&aacute; a&ntilde;adir una nueva despu&eacute;s de haber borrado la anterior.');
DEFINE('_JGS_NAMESHIELD_DELETE_TOOLTIP_CAPTION','Borrar mi Etiqueta');
DEFINE('_JGS_NAMESHIELD_UNREGISTERED_TOOLTIP_TEXT','S&oacute;lo los usuarios registrados pueden poner Etiquetas. ¡Por favor, reg&iacute;strese!');
DEFINE('_JGS_NAMESHIELD_UNREGISTERED_TOOLTIP_CAPTION','&iquest;A&ntilde;adir mi Etiqueta?');
DEFINE('_JGS_BBCODE_SHARE','Compartir esta imagen en los Foros (BBcode)'); 
DEFINE('_JGS_BBCODE_IMG','Incluir imagen'); 
DEFINE('_JGS_BBCODE_LINK','Enlace de la imagen'); 
DEFINE('_JGS_PICTURE_RATING','Valoraci&oacute;n de la imagen');
DEFINE('_JGS_LOGIN_FIRST','Por favor, primero reg&iacute;strese...');
DEFINE('_JGS_NO_RATING_ON_OWN_PICTURES','¡No puede votar a sus im&aacute;genes!');
DEFINE('_JGS_BAD','Error');
DEFINE('_JGS_GOOD','Correcto');
DEFINE('_JGS_VOTE','Votar!');
DEFINE('_JGS_BBCODE_OFF','desactivado');
DEFINE('_JGS_BBCODE_ON','activado');
DEFINE('_JGS_GUEST','Invitado');
DEFINE('_JGS_BBCODE_IS','BBCode est&aacute;');
DEFINE('_JGS_ENTER_CODE','Por fav&oacute;r, teclee el c&oacute;digo de la imagen:');
DEFINE('_JGS_SEND','Enviar');
DEFINE('_JGS_COMMENT_SEND','Escribir comentario'); 
DEFINE('_JGS_EMAILSEND','Enviar mensaje'); 
DEFINE('_JGS_EXISTING_COMMENTS','Comentarios de la imagen'); 
DEFINE('_JGS_NO_EXISTING_COMMENTS','La imagen no tiene comentarios.'); 
DEFINE('_JGS_WRITE_FIRST_COMMENT','¡Escribir el primer comentario!'); 
DEFINE('_JGS_NO_COMMENTS_FOR_UNREG', 'No se muestran los comentarios a los usuarios no registrados. ¡Reg&iacute;strese, por favor!'); 
DEFINE('_JGS_NEW_COMMENT','Hacer un nuevo comentario');
DEFINE('_JGS_NO_COMMENTS_BY_GUEST','Los invitados no pueden hacer comentarios. Reg&iacute;strese, por favor...');
DEFINE('_JGS_SEND_TO_FRIEND','Enviar a un amigo');
DEFINE('_JGS_YOUR_NAME','Nombre');
DEFINE('_JGS_YOUR_MAIL','Direcci&oacute;n de correo');
DEFINE('_JGS_FRIENDS_NAME','Nombre de su amigo');
DEFINE('_JGS_FRIENDS_MAIL','Direcci&oacute;n de correo de su amigo');
DEFINE('_JGS_FAV_ADD_PICTURE_TOOLTIP_CAPTION','A&ntilde;adir im&aacute;genes a favoritos');//NEW
DEFINE('_JGS_ZIP_ADD_PICTURE_TOOLTIP_CAPTION','A&ntilde;adir im&aacute;genes a la lista de descarga');//NEW
DEFINE('_JGS_FAV_ADD_PICTURE_TOOLTIP_TEXT','Aqu&iacute; puede a&ntilde;adir esta imagen a sus favoritos. Con el enlace <i>Mis Favoritos</i> puede ver todas sus im&aacute;genes.');//NEW
DEFINE('_JGS_ZIP_ADD_PICTURE_TOOLTIP_TEXT','Aqu&iacute; puede a&ntilde;adir esta imagen a su lista de descarga. Con el enlace <i>Descarga en Zip</i> puede ver todas sus im&aacute;genes y descargarlas en un fichero zip.');//NEW
DEFINE('_JGS_FAV_ADD_PICTURE_NOT_ALLOWED_TOOLTIP_TEXT','Perd&oacute;n, no tiene suficientes permisos para utilizar la opci&oacute;´n de favoritos.');//NEW
DEFINE('_JGS_ZIP_ADD_PICTURE_NOT_ALLOWED_TOOLTIP_TEXT','Perd&oacute;n, no tiene suficientes permisos para utilizar la opci&oacute;´n de favoritos.');//NEW

//components/com_joomgallery/includes/html/joom.viewspecial.html.php
DEFINE('_JGS_NO_COMMENTS','Sin Comentarios');
DEFINE('_JGS_WROTE','escribi&oacute;');
DEFINE('_JGS_AT','en');

//components/com_joomgallery/includes/html/joom.viewusergalleries.html.php
DEFINE('_JGS_USERNAME','Nombre de usuario');
DEFINE('_JGS_CATEGORIES','Categor&iacute;as');
DEFINE('_JGS_NUMB_HITS','N&uacute;mero de Accesos');
DEFINE('_JGS_TO_GALLERY','A la Galer&iacute;a');

//components/com_joomgallery/includes/joom.comments.php
DEFINE('_JGS_ALERT_NEW_COMMENT','Nuevo Comentario');//ALERT
DEFINE('_JGS_ALERT_NEW_COMMENT_MESSAGE_PARTONE','Nuevo comentario de ');//ALERT
DEFINE('_JGS_ALERT_NEW_COMMENT_MESSAGE_PARTTWO',' ha sido recibido. El comentario necesita su aprobación para ser publicado.');//ALERT
DEFINE('_JGS_ALERT_COMMENT_SAVED','Su comentario ha sido guardado.');//ALERT
DEFINE('_JGS_ALERT_COMMENT_SAVED_BUT_NEEDS_ARROVAL','Su comentario ha sido guardado, pero necesita ser aprobado por el administrador'); //ALERT
DEFINE('_JGS_ALERT_SECURITY_CODE_WRONG','¡El código de seguridad (CAPTCHA) introducido es erróneo!');//Alert

//components/com_joomgallery/includes/joom.favourites.php
DEFINE('_JGS_FAV_ALREADY_IN','Esta imagen ya est&aacute; marcada como uno de sus favoritos.');//NEW
DEFINE('_JGS_ZIP_ALREADY_IN','Esta imagen ya est&aacute; en su lista de descarga.');//NEW
DEFINE('_JGS_FAV_ALREADY_MAX','Ya ha alcanzado el n&uacute;mero m&aacute;ximo de im&aacute;genes en sus favoritos.');//NEW
DEFINE('_JGS_ZIP_ALREADY_MAX','Ya ha alcanzado el n&uacute;mero m&aacute;ximo de im&aacute;genes en su lista de descarga.');//NEW
DEFINE('_JGS_FAV_SUCCESSFULLY_ADDED','La imagen se ha a&ntilde;adido correctamente a sus favoritos.');//NEW
DEFINE('_JGS_ZIP_SUCCESSFULLY_ADDED','La imagen se ha a&ntilde;adido correctamente a su lista de descarga.');//NEW
DEFINE('_JGS_FAV_NOT_IN','Esta imagen no est&aacute; marcada como uno de sus favoritos.');//NEW
DEFINE('_JGS_ZIP_NOT_IN','Esta imagen no est&aacute; en su lista de descarga.');//NEW
DEFINE('_JGS_FAV_SUCCESSFULLY_REMOVED','La imagen se ha borrado correctamente de sus favoritos.');//NEW
DEFINE('_JGS_ZIP_SUCCESSFULLY_REMOVED','La imagen se ha borrado correctamente de su lista de descarga.');//NEW
DEFINE('_JGS_FAV_ALL_REMOVED','Se borrar&aacute;n todas las im&aacute;genes de sus favoritos.');//NEW
DEFINE('_JGS_ZIP_ALL_REMOVED','Se borrar&aacute;n todas las im&aacute;genes de su lista de descarga.');//NEW
DEFINE('_JGS_FAV_NOT_ALLOWED','No se permite la descarga en Zip.');//NEW
DEFINE('_JGS_FAV_ZIPLIBRARY_NOT_FOUND','La librer&iacute;a PCL-Zip no se encuentra -> la descarga en Zip es imposible');//NEW
DEFINE('_JGS_FAV_NO_PICTURES','No tiene ninguna imagen en sus favoritos.');//NEW
DEFINE('_JGS_ZIP_NO_PICTURES','No tiene ninguna imagen en su lista de descarga.');//NEW

//components/com_joomgallery/includes/joom.javascript.php
DEFINE('_JGS_ALERT_YOU_MUST_SELECT_CATEGORY','Tiene que selecionar una categoría.');//ALERT
DEFINE('_JGS_ALERT_YOU_MUST_SELECT_ONE_FILE','Elija un fichero.'); //ALERT
DEFINE('_JGS_ALERT_PICTURE_MUST_HAVE_TITLE','La imagen debe tener título');//ALERT
DEFINE('_JGS_ALERT_FILENAME_DOUBLE1','Ficheros repetidos en el campo'); //ALERT
DEFINE('_JGS_ALERT_FILENAME_DOUBLE2','y el campo'); //ALERT
DEFINE('_JGS_ALERT_WRONG_FIILENAME','No se admiten caracteres especiales. \nSólo se admiten a-z, A-Z, -, _ .'); //ALERT
DEFINE('_JGS_ALERT_WRONG_EXTENSION','¡Tipo de fichero erróneo!\nSólo se admite .jpg, .jpeg, .jpe, .gif y .png .'); //ALERT
DEFINE('_JGS_ALERT_YOU_MUST_SELECT_ONE_PICTURE','Seleccione una imagen.');  //ALERT
DEFINE('_JGS_ALERT_ENTER_NAME_EMAIL','¡Escriba nombre y dirección de correo!');//ALERT
DEFINE('_JGS_ALERT_ENTER_COMMENT','¡Escriba su comentario!');  //ALERT
DEFINE('_JGS_ALERT_ENTER_CODE','¡Escriba el código de la imagen!');//Alert
DEFINE('_JGS_CLOSE','Cerrar');
DEFINE('_JGS_PREVIOUS',' Anterior');
DEFINE('_JGS_NEXT','Siguiente');
DEFINE('_JGS_ESC','(Esc)');

//components/com_joomgallery/includes/joom.nameshields.php
DEFINE('_JGS_ALERT_NAMESHIELD_NOT_SAVED','Su etiqueta no se puede guardar porque está situada en una zona reservada (la posición inicial de todas las etiquetas) en la esquina superior izquierda de la imagen. Elija una posici&oacute;n diferente, fuera de la zona reservada.');//ALERT
DEFINE('_JGS_ALERT_NAMESHIELD_SAVED','Su etiqueta se ha añadido correctamente a la imagen');//ALERT
DEFINE('_JGS_ALERT_NAMESHIELD_DELETED','Su etiqueta se ha quitado correctamente de la imagen.');//ALERT

//components/com_joomgallery/includes/joom.slideshow.php
DEFINE('_JGS_GO_ON','Continuar');
DEFINE('_JGS_ALERT_ONCE_AGAIN','¿Repetir de nuevo?'); //ALERT

//components/com_joomgallery/includes/joom.specialimages.php
DEFINE('_JGS_ALERT_NOT_ALLOWED_VIEW_PICTURE','¡No tiene permiso para ver esta imagen!');//ALERT
DEFINE('_JGS_ALERT_FILE_NOT_EXIST','¡La imagen no existe!'); //ALERT

//components/com_joomgallery/includes/joom.userpanel.php
DEFINE('_JGS_USER_ORDERBY_DATE_ASC','Ascendente por Fecha de Transferencia');
DEFINE('_JGS_USER_ORDERBY_DATE_DESC','Descendente por Fecha de Transferencia');
DEFINE('_JGS_USER_ORDERBY_TITLE_ASC','Ascendente por T&iacute;tulo');
DEFINE('_JGS_USER_ORDERBY_TITLE_DESC','Descendente por T&iacute;tulo');
DEFINE('_JGS_USER_ORDERBY_HITS_ASC','Ascendente por Accesos');
DEFINE('_JGS_USER_ORDERBY_HITS_DESC','Descendente por Accesos');
DEFINE('_JGS_USER_ORDERBY_CATNAME_ASC','Ascendente por Categor&iacute;a');
DEFINE('_JGS_USER_ORDERBY_CATNAME_DESC','Descendente por Categor&iacute;a');
DEFINE('_JGS_ALL','Todas');
DEFINE('_JGS_APPROVED_ONLY','s&oacute;lo autorizadas');
DEFINE('_JGS_NOT_APPROVED_ONLY','s&oacute;lo no autorizadas');
DEFINE('_JGS_NO','No');
DEFINE('_JGS_YES','S&iacute;');
DEFINE('_JGS_SELECT_THUMBNAIL','Seleccionar Miniatura');
DEFINE('_JGS_ERROR_DELETING_CATEGORY_DIRECTORY','¡Ocurri&oacute; un error al intentar borrar la carpeta de categor&iacute;as!');
DEFINE('_JGS_ERROR_DELETING_CATEGORY_DATABASE_ENTRY','Ocurri&oacute; un error al intentar borrar la categor&iacute;a en la base de datos!'); 
DEFINE('_JGS_SUCCESS_DELETING_CATEGORY','Categor&iacute;a borrada correctamente.'); 
DEFINE('_JGS_ALERT_NOT_ALLOWED_TO_EDIT_PICTURE','No tiene permiso para editar esta imagen');//ALERT
DEFINE('_JGS_ALERT_PICTURE_SUCCESSFULLY_UPDATED','Imagen modificada correctamente');//ALERT
DEFINE('_JGS_ALERT_NOT_ALLOWED_DELETE_PICTURE','No tiene permiso para borrar esta imagen');//ALERT
DEFINE('_JGS_COULD_NOT_DELETE_THUMBNAIL_FILE','no se puede borrar el fichero de la miniatura de la imagen');
DEFINE('_JGS_COULD_NOT_DELETE_PICTURE_FILE','No se puede borrar el fichero de la imagen');
DEFINE('_JGS_ALERT_PICTURE_AND_COMMENTS_DELETED','La imagen, sus comentarios y sus etiquetas han sido eliminados correctamente.');//ALERT

//components/com_joomgallery/includes/joom.viewdetails.php
DEFINE('_JGS_ALERT_NOPICTURE_OR_NOTAPPROVED','¡La imagen ya no existe o tiene que ser aprobada por el admistrador!');//ALERT
DEFINE('_JGS_NO_ORIGINAL_FILE','¡La imagen original no est&aacute; disponible!');

//components/com_joomgallery/includes/joom.viewspecial.php
DEFINE('_JGS_SEARCH_RESULTS','Buscar resultados por');
DEFINE('_JGS_TOP','MAX');
DEFINE('_JGS_LAST_COMMENTED_PICTURE','&Uacute;ltimas im&aacute;genes comentadas');
DEFINE('_JGS_LAST_ADDED_PICTURE','&Uacute;ltimas im&aacute;genes a&ntilde;adidas');
DEFINE('_JGS_BEST_RATED_PICTURE','Im&aacute;genes m&aacute;s valoradas');
DEFINE('_JGS_MOST_VIEWED_PICTURE','Im&aacute;genes m&aacute;s vistas');

//components/com_joomgallery/includes/joom.viewusergalleries.php
DEFINE('_JGS_NO_USERGALLERIES','No hay galer&iacute;as de usuarios disponibles.');
DEFINE('_JGS_NO_PICTURES_IN_USERGALLERIES','No hay im&aacute;genes disponibles en las galer&iacute;as de usuarios.');

//components/com_joomgallery/includes/joom.votepic.php
DEFINE('_JGS_ALERT_YOUR_VOTE_NOT_COUNTED','¡S&oacute;lo se puede votar una vez por cada imagen! Su voto no ser&aacute; tenido en cuenta.');
DEFINE('_JGS_ALERT_YOUR_VOTE_COUNTED','Su voto ha sido contabilizado.');//ALERT

//components/com_joomgallery/joomgallery.html.php
DEFINE('_JGS_GALLERY','Galer&iacute;a');
DEFINE('_JGS_USER_PANEL','Panel de Control');
DEFINE('_JGS_USERGALLERIES','Galer&iacute;as de Usuarios');
DEFINE('_JGS_REGISTERED_MEMBERS_LONG','Usuarios Registrados');
DEFINE('_JGS_SPECIAL_MEMBERS_LONG','Miembros Especiales');
DEFINE('_JGS_SEARCH','Buscando galer&iacute;a...');
DEFINE('_JGS_NUMB_PICTURES_ALL','N&uacute;mero total de im&aacute;genes en todas las categor&iacute;as: ');
DEFINE('_JGS_NUMB_HITS_ALL_PICTURES','N&uacute;mero total de accesos a todas las im&aacute;genes: ');
DEFINE('_JGS_TOP_RATED','Mejor Valoradas');
DEFINE('_JGS_LAST_ADDED','&Uacute;ltimas A&ntilde;adidas');
DEFINE('_JGS_LAST_COMMENTED','&Uacute;ltimas Comentadas');
DEFINE('_JGS_MOST_VIEWED','M&aacute;s Vistas');
DEFINE('_JGS_CATEGORY_IN_GALLERY','categor&iacute;a de esta galer&iacute;a.');
DEFINE('_JGS_CATEGORIES_IN_GALLERY','categor&iacute;as de esta galer&iacute;a.');
DEFINE('_JGS_BACK_TO_CATEGORY','Volver a la vista de categor&iacute;a');
DEFINE('_JGS_FAV_MY','Mis Favoritos');//NEW
DEFINE('_JGS_ZIP_MY','Descarga en Zip');//NEW
DEFINE('_JGS_FAV_DOWNLOAD_TOOLTIP_TEXT','Aqu&iacute; puede ver todas las im&aacute;genes de sus favoritos. Para a&ntilde;adir una imagen a esta lista deber&aacute; utilizar el icono que hay al lado de cada imagen.');//NEW
DEFINE('_JGS_ZIP_DOWNLOAD_ALLOWED_TOOLTIP_TEXT','Si quiere puede descargar todas estas im&aacute;genes a la vez en un fichero comprimido.');//NEW
DEFINE('_JGS_ZIP_DOWNLOAD_TOOLTIP_TEXT','Aqu&iacute; puede ver todas las im&aacute;genes de su lista de descarga (puede descargar todas estas im&aacute;genes a la vez en un fichero comprimido). Para a&ntilde;adir una imagen a esta lista deber&aacute; utilizar el icono que hay al lado de cada imagen.');//NEW
DEFINE('_JGS_FAV_DOWNLOAD_NOT_ALLOWED_TOOLTIP_TEXT','Perd&oacute;n, no tiene suficientes permisos para utilizar la opci&oacute;´n de favoritos.');//NEW
DEFINE('_JGS_ZIP_DOWNLOAD_NOT_ALLOWED_TOOLTIP_TEXT','Perd&oacute;n, no tiene suficientes permisos para utilizar la opci&oacute;´n de lista de descarga.');//NEW

//components/com_joomgallery/joomgallery.php
DEFINE('_JGS_ALERT_YOU_NOT_ACCESS_THIS_DIRECTORY','No tiene permiso para acceder a esta carpeta');//ALERT
DEFINE('_JGS_INVITE_YOU_VIEW_PICTURE','le ha invitado a ver una imagen. Pulse en el siguiente enlace para verla.');
DEFINE('_JGS_RECOMMENDED_PICTURE_FROM_FRIEND',' Una Imagen recomendada por un amigo');
DEFINE('_JGS_MAIL_SENT','El mensaje ha sido enviado...');//ALERT

//administrator/components/com_joomgallery/common.joomgallery.php
DEFINE('_JG_FILE_NOT_FOUND','¡ERROR: no se encuentra el fichero!');
DEFINE('_JG_GD_ONLY_JPG_PNG','¡ERROR: GD s&oacute;lo puede gestionar ficheros JPG y PNG!');
DEFINE('_JG_RESIZE_TO_MAX','Redimensionando al ancho m&aacute;ximo...');
DEFINE('_JG_CREATE_THUMBNAIL_FROM','Creando la miniatura de');
DEFINE('_JG_GD_LIBARY_NOT_INSTALLED','¡La librer&iacute;a de im&aacute;genes GD no est&aacute; instalada!');
DEFINE('_JG_GD_NO_TRUECOLOR','¡La librer&iacute;a de im&aacute;genes GD no soporte miniaturas en colores verdaderos!');
DEFINE('_JG_NEW_ORDERING_SAVED','Nuevo orden guardado');
DEFINE('_JG_HOME','P&aacute;gina de Inicio');
DEFINE('_JG_PAGE','P&aacute;gina'); 

//mod_joomimage
DEFINE('_JGS_JOOMGALLERY_NOT_INSTALLED','¡JoomGallery no est&aacute; instalada!');
DEFINE('_JGS_JOOMGALLERY_NOT_UPTODATE','¡JoomGallery no est&aacute; actualizada! Este m&oacute;dulo s&oacute;lo funciona con la &uacute;ltima versi&oacute;n de JoomGallery.');
DEFINE('_JGS_NO_PICTURES_AVAILABLE','No hay im&aacute;genes en la galer&iacute;a.');

?>
