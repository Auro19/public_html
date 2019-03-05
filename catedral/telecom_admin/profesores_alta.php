<?php
if(!isset($_SESSION)){
	session_start();
}
require_once('include/globals.php');
require_once('functions/comons.php');

$errorArray = array();
$menuUsuario = array('heading_label' => "", 'title_label' => "");
if(isset($_SESSION['login']) && isset($_SESSION['login']['nivel_usuario_id'])){
	$menuUsuario = getUserItemMenu($_SESSION['login']['nivel_usuario_id'], $_SERVER['PHP_SELF']);
}
?>
<?php
	require_once('functions/consultas_bd.php');
	
	$errors = array();
	if(isset($_SESSION['errors'])){
		$errors = $_SESSION['errors'];
	}
	
	$alta_profesores_fields = array();
	if(isset($_SESSION['alta_profesores_fields'])){
		$alta_profesores_fields = $_SESSION['alta_profesores_fields'];
	}
	
	$grados = getGrados();
	$nombramientos = getNombramientos();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo HEADING_GENERAL; ?>-<?php echo $menuUsuario['title_label']; ?></title>

<!-- START JSCAL -->
<link type="text/css" rel="stylesheet" href="include/JSCal2-1.9/src/css/jscal2.css" />
<link type="text/css" rel="stylesheet" href="include/JSCal2-1.9/src/css/border-radius.css" />
<!-- <link type="text/css" rel="stylesheet" href="include/JSCal2-1.9/src/css/reduce-spacing.css" /> -->

<link id="skin-win2k" title="Win 2K" type="text/css" rel="alternate stylesheet" href="include/JSCal2-1.9/src/css/win2k/win2k.css" />
<link id="skin-steel" title="Steel" type="text/css" rel="alternate stylesheet" href="include/JSCal2-1.9/src/css/steel/steel.css" />
<link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="include/JSCal2-1.9/src/css/gold/gold.css" />
<link id="skin-matrix" title="Matrix" type="text/css" rel="alternate stylesheet" href="include/JSCal2-1.9/src/css/matrix/matrix.css" />
<link id="skinhelper-compact" type="text/css" rel="alternate stylesheet" href="include/JSCal2-1.9/src/css/reduce-spacing.css" />
<script src="include/JSCal2-1.9/src/js/jscal2.js"></script>
<script src="include/JSCal2-1.9/src/js/unicode-letter.js"></script>
<script src="include/JSCal2-1.9/src/js/lang/es.js"></script>
<!-- END   JSCAL -->
</head>

<body>
<h1><?php echo $menuUsuario['heading_label']; ?></h1>
<p>Menú de opciones.</p>
<?php
	if(isset($_SESSION['login']['nivel_usuario_id'])){
		echo getRecursiveMenu($_SESSION['login']['nivel_usuario_id'], 1);
	}
?>
<h2>Alta de profesores</h2>
<p>Ingrese los datos requeridos</p>
<form action="profesores_alta_valida.php" method="post" name="frmRegistroProfesor" id="frmRegistroProfesor">
  <ul>
    <li>Grado</li>
    <li>
      <select name="selGrado" id="selGrado">
        <option value="">Seleccione</option>
        <?php foreach($grados as $grado) { ?>
        <option value="<?php echo $grado['id']; ?>" <?php echo getSelectedOnSelecInput('selGrado', $alta_profesores_fields, $grado['id'], 'selected="selected"', ""); ?>><?php echo $grado['saludacion']; ?></option>
        <?php } ?>
      </select>
    </li>
    <li>Nombre(s)</li>
    <li>
      <input name="txtBxNombre" type="text" id="txtBxNombre" value="<?php echo getValueInFieldsArray("txtBxNombre", $alta_profesores_fields, ""); ?>"  />
    </li>
    <li>Primer apellido</li>
    <li>
      <input name="txtBxApepat" type="text" id="txtBxApepat" value="<?php echo getValueInFieldsArray("txtBxApepat", $alta_profesores_fields, ""); ?>"  />
    </li>
    <li>Segundo apellido</li>
    <li>
      <input name="txtBxApemat" type="text" id="txtBxApemat" value="<?php echo getValueInFieldsArray("txtBxApemat", $alta_profesores_fields, ""); ?>"  />
    </li>
    <li>Fecha de nacimiento</li>
    <li>
      <input name="calendar-inputField" id="calendar-inputField" value="<?php echo getValueInFieldsArray("calendar-inputField", $alta_profesores_fields, ""); ?>" readonly="readonly" />
      <button id="calendar-trigger">...</button>
      <script>
	Calendar.setup({
        trigger    : "calendar-trigger",
        inputField : "calendar-inputField",
		onSelect   : function() { this.hide() }
    });
    </script> 
    </li>
    <li>RFC</li>
    <li>
      <input name="txtBxRfc" type="text" id="txtBxRfc" value="<?php echo getValueInFieldsArray("txtBxRfc", $alta_profesores_fields, ""); ?>" />
    </li>
    <li>CURP</li>
    <li>
      <input name="txtBxCurp" type="text" id="txtBxCurp" value="<?php echo getValueInFieldsArray("txtBxCurp", $alta_profesores_fields, ""); ?>" maxlength="9" />
    </li>
    <li>Número de trabajador</li>
    <li>
      <input name="txtBxNumTrabajador" type="text" id="txtBxNumTrabajador" value="<?php echo getValueInFieldsArray("txtBxNumTrabajador", $alta_profesores_fields, ""); ?>" maxlength="9" />
    </li>
    <li>Folio</li>
    <li>
      <input name="txtBxFolio" type="text" id="txtBxFolio" value="<?php echo getValueInFieldsArray("txtBxFolio", $alta_profesores_fields, ""); ?>" maxlength="9" />
    </li>
    <li>Nombramiento</li>
    <li>
      <select name="selNombramiento" id="selNombramiento">
        <option value="">Seleccione</option>
        <?php foreach($nombramientos as $nombramiento) { ?>
        <option value="<?php echo $nombramiento['id']; ?>" <?php echo getSelectedOnSelecInput('selNombramiento', $alta_profesores_fields, $nombramiento['id'], 'selected="selected"', ""); ?>><?php echo $nombramiento['descripcion']; ?></option>
        <?php } ?>
      </select>
    </li>
    <li><a href="#" onclick="document.getElementById('frmRegistroProfesor').submit()">Registrar</a></li>
  </ul>
</form>
<?php foreach($errors as $error) {
	$error = explode("|", $error);
?><p><?php echo $error[1]; ?></p><?php
?>
<?php } ?>
</body>
</html>