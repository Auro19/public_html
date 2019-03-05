<?php
if(!isset($_SESSION)){
	session_start();
}

if (!function_exists("get_real_ip")) {
	function get_real_ip(){
		if (isset($_SERVER["HTTP_CLIENT_IP"])) {
			return $_SERVER["HTTP_CLIENT_IP"];
		} elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			return $_SERVER["HTTP_X_FORWARDED_FOR"];
		} elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
			return $_SERVER["HTTP_X_FORWARDED"];
		} elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
			return $_SERVER["HTTP_FORWARDED_FOR"];
		} elseif (isset($_SERVER["HTTP_FORWARDED"])) {
			return $_SERVER["HTTP_FORWARDED"];
		} else {
			return $_SERVER["REMOTE_ADDR"];
		}
	}
}

if(isset($_POST)){
	require_once("include/php_validation/validation-2.3.3.php");
	
	$fields_login = $_POST;
	
	$rules = array();
	
	$rules[] = "required,txtBxUser,txtBxUser|El campo de texto usuario es requerido";
	$rules[] = "required,txtBxPassword,txtBxPassword|El campo password requerido";
	
	$errors = validateFields($_POST, $rules);
	
	if (isset($fields_login["recaptcha_response_field"])){
		require_once('include/reCapcha/recaptchalib.php');
		require_once('include/reCapcha/recapcha_constants.php');
		$resp = recaptcha_check_answer (RECAPCHA_PRIVATE_KEY,
										$_SERVER["REMOTE_ADDR"],
										$_POST["recaptcha_challenge_field"],
										$_POST["recaptcha_response_field"]);
        if ($resp->is_valid) {
                //echo "You got it!";
        } else {
                # set the error code so that we can display it
                $errors[] = "txtBxPassword|".$error = $resp->error;
        }
	}
	
	if (!empty($errors)){
		$_SESSION['login']['errors'] = $errors;
	} else {
		require("Connections/conn_telecom_admin.php");
		$pdo = new PDO("mysql:host=$hostname_conn_telecom_admin; dbname=$database_conn_telecom_admin", $username_conn_telecom_admin, $password_conn_telecom_admin);
		$pdo->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo->prepare("SELECT t_nivelusuario.etiqueta AS 'ETIQUETA', t_nivelusuario.id AS 'ID_NIVEL', t_usuario.id 'ID_USUARIO' FROM t_usuario, t_nivelusuario WHERE user = :user AND password = SHA1(:password) AND t_usuario.f_nivelusuario = t_nivelusuario.id");
		$stmt->bindParam(':user', $fields_login['txtBxUser'], PDO::PARAM_STR);
		$stmt->bindParam(':password', $fields_login['txtBxPassword'], PDO::PARAM_STR);
		$stmt->execute();
		$nivel_usuario = $stmt->fetchAll();
		if(is_array($nivel_usuario) && count($nivel_usuario) > 0){
			$nivel_usuario = $nivel_usuario[0];
		}
		unset($pdo);
		
		
		require("Connections/conn_telecom_admin.php");
		$pdo = new PDO("mysql:host=$hostname_conn_telecom_admin; dbname=$database_conn_telecom_admin", $username_conn_telecom_admin, $password_conn_telecom_admin);
		$pdo->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo->prepare("SELECT MAX(t_acceso.fecha_hora) 'DATETIME', t_acceso.ip 'FROM' FROM t_usuario, t_acceso WHERE t_usuario.user = :user AND t_usuario.password = SHA1(:password) AND t_acceso.f_usuario = t_usuario.id");
		$stmt->bindParam(':user', $fields_login['txtBxUser'], PDO::PARAM_STR);
		$stmt->bindParam(':password', $fields_login['txtBxPassword'], PDO::PARAM_STR);
		$stmt->execute();
		$acceso = $stmt->fetchAll();
		if(is_array($acceso) && count($acceso) > 0){
			$acceso = $acceso[0];
			$acceso = array('DATETIME' => $acceso['DATETIME'], 'FROM' => $acceso['FROM']);
		} else {
			$acceso = array('DATETIME' => '', 'FROM' => '');
		}
		unset($pdo);
		
		if(is_array($nivel_usuario) && count($nivel_usuario) > 0){
			$_SESSION['login']['username'] = $fields_login['txtBxUser'];
			$_SESSION['login']['nivel_usuario_etiqueta'] = $nivel_usuario['ETIQUETA'];
			$_SESSION['login']['nivel_usuario_id'] = $nivel_usuario['ID_NIVEL'];
			$_SESSION['login']['id_usuario'] = $nivel_usuario['ID_USUARIO'];
			$_SESSION['login']['datetime'] = $acceso['DATETIME'];
			$_SESSION['login']['from'] = $acceso['FROM'];
			if(isset($_SESSION['login']['errors'])){
				 unset($_SESSION['login']['errors']);
			}
			
			$real_ip = get_real_ip();
			$id_usuario = $_SESSION['login']['id_usuario'];
			
			require("Connections/conn_telecom_admin.php");
			$pdo = new PDO("mysql:host=$hostname_conn_telecom_admin; dbname=$database_conn_telecom_admin", $username_conn_telecom_admin, $password_conn_telecom_admin);
			$pdo->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare("INSERT INTO t_acceso (id, f_usuario, fecha_hora, ip) VALUES (NULL, :id_usuario, NOW(),  :public_ip)");
			$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
			$stmt->bindParam(':public_ip', $real_ip, PDO::PARAM_STR);
			$stmt->execute();
			unset($pdo);
		} else {
			$_SESSION['login']['errors'] = array("txtBxUser|Usuario o password incorrecto");
			if(isset($_SESSION['login']['attemps'])){
				$_SESSION['login']['attemps'] = (int)$_SESSION['login']['attemps'] + 1;
			} else {
				$_SESSION['login']['attemps'] = 1;
			}
		}
	}
	
	$MM_restrictGoTo = $_SERVER['HTTP_REFERER'];
	$MM_qsChar = "?";
	$MM_referrer = $_SERVER['PHP_SELF'];
	if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
	if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0){
		$MM_referrer .= "?" . $QUERY_STRING;
	}
	$MM_restrictGoTo = $MM_restrictGoTo/*. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer)*/;
	
	//print_r($_SESSION);
	header("Location: ". $MM_restrictGoTo);
} else {
	header("Location: . ");
}
?>