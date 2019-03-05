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
</body>
</html>