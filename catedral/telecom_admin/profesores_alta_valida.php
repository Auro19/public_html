<?php
if(!isset($_SESSION)){
	session_start();
}
if(isset($_POST)){
	require_once("include/php_validation/validation-2.3.3.php");
	
	$rules = array();
	
	$_SESSION['alta_profesores_fields'] = $_POST;
	
	$rules[] = "required,selGrado,selGrado|El grado es requerido";
	$rules[] = "required,txtBxNombre,txtBxNombre|El campo nombre es requerido";
	$rules[] = "required,txtBxApepat,txtBxApepat|El campo primer apellido es requerido";
	$rules[] = "required,txtBxApemat,txtBxApemat|El campo segundo apellido es requerido";
	$rules[] = "required,calendar-inputField,calendar-inputField|El campo fecha de nacimiento es requerido";
	$rules[] = "required,txtBxRfc,txtBxRfc|El campo RFC es requerido";
	$rules[] = "required,txtBxCurp,txtBxCurp|El campo CURP es requerido";
	$rules[] = "required,txtBxNumTrabajador,txtBxNumTrabajador|El número de trabajador es requerido";
	$rules[] = "required,txtBxFolio,txtBxFolio|El número de trabajador es requerido";
	$rules[] = "required,selNombramiento,selNombramiento|El nombramiento es requerido";
	
	$errors = validateFields($_POST, $rules);
	
	$id_profesor = 0;
	
	if (!empty($errors)){
		$_SESSION['errors'] = $errors;
		//print_r($errors);
		header("Location: profesores_alta.php");
	} else {
		$fields = $_POST;
		
		require("Connections/conn_telecom_admin.php");
		
		$pdo = new PDO("mysql:host=$hostname_conn_telecom_admin; dbname=$database_conn_telecom_admin", $username_conn_telecom_admin, $password_conn_telecom_admin);
		$pdo->beginTransaction();
		try {
			$stmt = $pdo->prepare("INSERT INTO t_persona (id, nombre, apepat, apemat, fecnac, rfc, curp) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
			$stmt->bindParam(1, $fields['txtBxNombre']);
			$stmt->bindParam(2, $fields['txtBxApepat']);
			$stmt->bindParam(3, $fields['txtBxApemat']);
			$stmt->bindParam(4, $fields['calendar-inputField']);
			$stmt->bindParam(5, $fields['txtBxRfc']);
			$stmt->bindParam(6, $fields['txtBxCurp']);
			$stmt->execute();
			$id_persona = $pdo->lastInsertId();
			$pdo->commit();
			
			$pdo2 = new PDO("mysql:host=$hostname_conn_telecom_admin; dbname=$database_conn_telecom_admin", $username_conn_telecom_admin, $password_conn_telecom_admin);
			$pdo2->beginTransaction();
			$stmt = $pdo2->prepare("INSERT INTO t_profesor (id, f_persona, folio, num_trabajador, f_nombramiento, f_grado) VALUES (NULL, ?, ?, ?, ?, ?)");
			$stmt->bindParam(1, $id_persona);
			$stmt->bindParam(2, $fields['txtBxFolio']);
			$stmt->bindParam(3, $fields['txtBxNumTrabajador']);
			$stmt->bindParam(4, $fields['selNombramiento']);
			$stmt->bindParam(5, $fields['selGrado']);
			$stmt->execute();
			$id_profesor = $pdo2->lastInsertId();
			$pdo2->commit();
			
			if(isset($_SESSION['errors'])) { unset($_SESSION['errors']); }
			if(isset($_SESSION['alta_profesores_fields'])) { unset($_SESSION['alta_profesores_fields']);}
		} catch(PDOException $e) {
			var_dump($e);
			try{
				$pdo->rollBack();
			} catch(PDOException $e) {
			}
			try{
				$pdo2->rollBack();
			} catch(PDOException $e) {
			}
		}
		unset($pdo);
		unset($pdo2);
		header("Location: profesores_alta.php?action=alta&idProfesor=$id_profesor");
	}
} else {
	//header("Location: . ");
}
?>