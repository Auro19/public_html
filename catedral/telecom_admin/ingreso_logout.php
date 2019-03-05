<?php
// *** Logout the current user.
$logoutGoTo = "ingreso.php";
if (!isset($_SESSION)) {
  session_start();
}

$logoutGoTo = $_SERVER['HTTP_REFERER'];

$_SESSION['login']['username'] = NULL;
$_SESSION['login']['nivel_usuario_etiqueta'] = NULL;
$_SESSION['login']['nivel_usuario_id'] = NULL;
$_SESSION['login']['attemps'] = NULL;

unset($_SESSION['login']['username']);
unset($_SESSION['login']['nivel_usuario_etiqueta']);
unset($_SESSION['login']['nivel_usuario_id']);
unset($_SESSION['login']['attemps']);

unset($_SESSION);

header("Location: $logoutGoTo");
exit;
?>