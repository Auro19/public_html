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
	require("Connections/conn_telecom_admin.php");
	$pdo = new PDO("mysql:host=$hostname_conn_telecom_admin; dbname=$database_conn_telecom_admin", $username_conn_telecom_admin, $password_conn_telecom_admin);
	$pdo->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $pdo->prepare("SELECT t_profesor.id, t_grado.saludacion, t_persona.nombre, t_persona.apepat FROM `t_persona`, t_grado, t_profesor WHERE t_profesor.f_grado = t_grado.id AND t_profesor.f_persona = t_persona.id");
	$stmt->execute();
	$profesores = $stmt->fetchAll();
	unset($pdo);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo HEADING_GENERAL; ?> - <?php echo $menuUsuario['title_label']; ?></title>
</head>

<body>
<h1><?php echo $menuUsuario['heading_label']; ?></h1>
<p>Menú de opciones.</p>
<?php
	if(isset($_SESSION['login']['nivel_usuario_id'])){
		echo getRecursiveMenu($_SESSION['login']['nivel_usuario_id'], 1);
	}
?>
<p>Profesores en la base de datos:</p>
<form>
<select name="">
  <option value="">Seleccione</option>
  <?php foreach($profesores as $profesor){ ?>
  <option value="<?php echo $profesor['id']; ?>"><?php echo $profesor['saludacion']; ?> <?php echo $profesor['nombre']; ?> <?php echo $profesor['apepat']; ?></option>
  <?php } ?>
</select>
</form>
</body>
</html>