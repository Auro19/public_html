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
<h2>Inicio</h2>
<?php if(isset($_SESSION) && isset($_SESSION['login']['nivel_usuario_etiqueta']) && $_SESSION['login']['nivel_usuario_etiqueta'] != ""){ ?>
<ul>
  <li>Usuario: <?php echo $_SESSION['login']['username']; ?></li>
  <li>Nivel: <?php echo $_SESSION['login']['nivel_usuario_etiqueta']; ?></li>
  <li>Ultimo acceso: <?php echo $_SESSION['login']['datetime']; ?> desde: <?php echo $_SESSION['login']['from']; ?></li>
  <li><a href="ingreso_logout.php">Desconectar</a></li>
</ul>
<?php } else { ?>
<?php
	if(isset($_SESSION) && isset($_SESSION['login']['errors'])){
		$errors = $_SESSION['login']['errors'];
		foreach($errors as $error){
			$error = explode("|", $error);
			$errorArray[$error[0]] = $error[1];
		}
	}
?>
<form action="ingreso_valida.php" method="post"  name="frmIngreso" id="frmIngreso">
  <ul>
    <li>Usuario</li>
    <li>
      <label>
        <input type="text" name="txtBxUser" id="txtBxUser" />
      </label>
    </li>
    <li>Password</li>
    <li>
      <input type="password" name="txtBxPassword" id="txtBxPassword" />
    </li>
    <?php if(isset($_SESSION['login']['attemps']) && $_SESSION['login']['attemps'] > 3){ ?>
    <li>
	<?php
  		require_once('include/reCapcha/recaptchalib.php');
		require_once('include/reCapcha/recapcha_constants.php');
		$publickey = RECAPCHA_PUBLIC_KEY;
		echo recaptcha_get_html($publickey);
	?>
    </li>
    <?php } ?>
    <li><a href="#" onclick="document.getElementById('frmIngreso').submit();">Ingresar</a></li>
  </ul>

  <?php if (count($errorArray) > 0) { ?>
  <p>Error</p>
  <ul>
  <?php foreach($errorArray as $errorK => $errorV){ ?>
    <li><?php echo $errorV; ?></li>
  <?php } ?>
  </ul>
  <?php } ?>
</form>
<?php } ?>
<p>Menú de opciones.</p>
<?php
	if(isset($_SESSION['login']['nivel_usuario_id'])){
		echo getRecursiveMenu($_SESSION['login']['nivel_usuario_id'], 1);
	}
?>
</body>
</html>