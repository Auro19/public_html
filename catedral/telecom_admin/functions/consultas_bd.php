<?php
if (!function_exists("getGrados")) {
	function getGrados(){
		require("Connections/conn_telecom_admin.php");
		$pdo = new PDO("mysql:host=$hostname_conn_telecom_admin; dbname=$database_conn_telecom_admin", $username_conn_telecom_admin, $password_conn_telecom_admin);
		$pdo->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo->prepare("SELECT * FROM t_grado");
		$stmt->execute();
		$grados = $stmt->fetchAll();
		unset($pdo);
		return $grados;
		exit;
	}
}

if (!function_exists("getNombramientos")) {
	function getNombramientos(){
		require("Connections/conn_telecom_admin.php");
		$pdo = new PDO("mysql:host=$hostname_conn_telecom_admin; dbname=$database_conn_telecom_admin", $username_conn_telecom_admin, $password_conn_telecom_admin);
		$pdo->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo->prepare("SELECT * FROM t_nombramiento");
		$stmt->execute();
		$nombramientos = $stmt->fetchAll();
		unset($pdo);
		return $nombramientos;
		exit;
	}
}
?>