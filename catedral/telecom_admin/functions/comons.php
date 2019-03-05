<?php
if (!function_exists("getRecursiveMenu")) {
	function getRecursiveMenu($idNivelUsuario, $menuPadre){
		require("Connections/conn_telecom_admin.php");
		$pdo = new PDO("mysql:host=$hostname_conn_telecom_admin; dbname=$database_conn_telecom_admin", $username_conn_telecom_admin, $password_conn_telecom_admin);
		$pdo->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo->prepare("SELECT t_cms.id, t_cms.is_hiperlink, t_cms.path, t_cms.file, t_cms.menu_label, t_cms.menu_value, t_cms.f_cms_menu_padre, t_cms.id FROM t_cms, t_nivelusuario WHERE t_cms.f_nivelusuario = t_nivelusuario.id AND t_nivelusuario.id >= :id_nivel_usuario AND t_cms.f_cms_menu_padre = :menu_padre AND t_cms.id != 1 ORDER BY t_cms.menu_order");
		$stmt->bindParam(':id_nivel_usuario', $idNivelUsuario, PDO::PARAM_INT);
		$stmt->bindParam(':menu_padre', $menuPadre, PDO::PARAM_INT);
		$stmt->execute();
		$menu_usuario = $stmt->fetchAll();
		if(is_array($menu_usuario) && count($menu_usuario) > 0){
		} else {
			$menu_usuario = array();
		}
		unset($pdo);
		
		$html = "";
		
		if(count($menu_usuario) > 0){
			$html .= "<ul>".PHP_EOL;
			foreach($menu_usuario as $menu_item){
				if($menu_item['is_hiperlink']){
					$html .= "<li><a href=".$menu_item['path'].$menu_item['file'].">".$menu_item['menu_label']."</a></li>".PHP_EOL;
				} else {
					$html .= "<li>".$menu_item['menu_label']."</li>".PHP_EOL;
				}
				$test = getRecursiveMenu($idNivelUsuario, $menu_item['id']);
				if($test != ""){
					$html .= PHP_EOL."<li>".$test."</li>".PHP_EOL;
				}
			}
			$html .= "</ul>".PHP_EOL;
		}
		return $html;
	}
}

if (!function_exists("getUserItemMenu")) {
	function getUserItemMenu($idNivelUsuario, $filename){
		$arrayFile = explode("/", $filename);
		$filename = $arrayFile[count($arrayFile) - 1];
		$menu_usuario = getUserMenu($idNivelUsuario);
		foreach($menu_usuario as $menu_item){
			if($menu_item['file'] ==  $filename){
				return $menu_item;
			}
		}
		return array();
	}
}

if (!function_exists("getUserMenu")) {
	function getUserMenu($idNivelUsuario){
		require("Connections/conn_telecom_admin.php");
		$pdo = new PDO("mysql:host=$hostname_conn_telecom_admin; dbname=$database_conn_telecom_admin", $username_conn_telecom_admin, $password_conn_telecom_admin);
		$pdo->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo->prepare("SELECT t_cms.path, t_cms.file, t_cms.menu_label, t_cms.menu_value, t_cms.heading_label, t_cms.title_label, t_cms.f_cms_menu_padre, t_cms.id FROM t_cms, t_nivelusuario WHERE t_cms.f_nivelusuario = t_nivelusuario.id AND t_nivelusuario.id >= :id_nivel_usuario ORDER BY t_cms.menu_order");
		$stmt->bindParam(':id_nivel_usuario', $idNivelUsuario, PDO::PARAM_STR);
		$stmt->execute();
		$menu_usuario = $stmt->fetchAll();
		if(is_array($menu_usuario) && count($menu_usuario) > 0){
		} else {
			$menu_usuario = array();
		}
		unset($pdo);
		return $menu_usuario;
		exit;
	}
}

if (!function_exists("getValueInFieldsArray")) {
	function getValueInFieldsArray($fieldname, $arrayFields, $valueToNotExistFieldInArray = ""){
		foreach($arrayFields as $kField => $vField){
			if($kField == $fieldname){
				return $vField;
			}
		}
		return $valueToNotExistFieldInArray;
	}
}

if (!function_exists("getSelectedOnSelecInput")) {
	function getSelectedOnSelecInput($fieldname, $arrayFields, $testValue, $returnOnSelected = 'selected="selected"', $returnOnNoSelected = ""){
		foreach($arrayFields as $kField => $vField){
			if($kField == $fieldname){
				if($vField == $testValue){
					return $returnOnSelected;
				}
			}
		}
		return $returnOnNoSelected;
	}
}
?>