

<?php
session_start();

// $tituloPagina = 'Registro';
 // include('/Presentacion/wfEncabezado.php');  //encabezado de la pagina
  include('Acceso_a_datos/accConexion.php');    // se incluye la conexion de base de datos.

  $idConexion= AbrirConexion("personas"); //Nombre de la base de datos.
  
 

// Se reciben los valores del Beneficiario 1
$id_beneficiario1 = 1;
$nombre1 = strtoupper($_POST['nombreBenef1']);
$aPaterno1 =strtoupper($_POST['aPatBenef1']);
$aMaterno1 = strtoupper($_POST['aMatBenef1']);
$parentesco1 = strtoupper($_POST['parenBenef1']);
$fechaNac1 = $_POST['fecNacBenef1'];
$porcentaje1 = $_POST['porcentajeBenef1'];
$calle1 = strtoupper($_POST['dirBenef1']);
$colonia1 = strtoupper($_POST['colBenef1']);
$delegacion1= strtoupper($_POST['delBenef1']);
$cp1= $_POST['cpBenef1'];

// Se reciben los valores del Beneficiario 2
$id_beneficiario2 = 2;
$nombre2 = strtoupper($_POST['nombreBenef2']);
$aPaterno2 = strtoupper($_POST['aPatBenef2']);
$aMaterno2 = strtoupper($_POST['aMatBenef2']);
$parentesco2 = strtoupper($_POST['parenBenef2']);
$fechaNac2 = $_POST['fecNacBenef2'];
$porcentaje2 = $_POST['porcentajeBenef2'];
$calle2 = strtoupper($_POST['dirBenef2']);
$colonia2 = strtoupper($_POST['colBenef2']);
$delegacion2= strtoupper($_POST['delBenef2']);
$cp2= $_POST['cpBenef2'];

// Se reciben los valores del Beneficiario 2
$id_beneficiario3 = 3;
$nombre3 = strtoupper($_POST['nombreBenef3']);
$aPaterno3 = strtoupper($_POST['aPatBenef3']);
$aMaterno3 = strtoupper($_POST['aMatBenef3']);
$parentesco3 = strtoupper($_POST['parenBenef3']);
$fechaNac3 = $_POST['fecNacBenef3'];
$porcentaje3 = $_POST['porcentajeBenef3'];
$calle3 = strtoupper($_POST['dirBenef3']);
$colonia3 = strtoupper($_POST['colBenef3']);
$delegacion3= strtoupper($_POST['delBenef3']);
$cp3 = $_POST['cpBenef3'];

include ('Negocio/negActualizaBeneficiario.php');
include ('Negocio/negInsertaBeneficiario.php');
 include('Negocio/negConsultaBeneficiario.php');


$prcntjeTotal = $porcentaje1+ $porcentaje2+ $porcentaje3;
  if ( $prcntjeTotal  != 100){
  
  echo "La suma de los porcentajes debe ser = 100"; 
      exit(); 
  }
 else{
 
echo "BIEN"; 
 

	$benef = array();
	 $benef = ConsultaBeficiario1( $idConexion, $_SESSION['id_persona']);
	
	 if ($benef == NULL) {
	 echo "inserta";
	 echo "sesion id: ".$_SESSION['id_persona'];
	 echo $nombre1;
	 

	$insertaBenef1 = InsertaBeneficiario1 ($idConexion,$_SESSION['id_persona'],1, $nombre1, $aPaterno1, $aMaterno1, $parentesco1, $fechaNac1, $porcentaje1, $calle1,
                               $colonia1, $delegacion1, $cp1);
		echo $insertaBenef1[0];
		}
		else{
		echo "actualizaPRUEBA";
	
		$actualizaBenef1 = ActualizaBeneficiario1 ($idConexion,$_SESSION['id_persona'],1, $nombre1, $aPaterno1, $aMaterno1, $parentesco1, $fechaNac1, $porcentaje1, $calle1,
                               $colonia1, $delegacion1, $cp1);
		}
	

		$benef2 = array();
	 $benef2 = ConsultaBeficiario2( $idConexion, $_SESSION['id_persona']);

	 if ($benef2 == NULL) {
	 echo "inserta2";
	 echo "sesion id: ".$_SESSION['id_persona'];
	 echo $nombre1;
	 
	
	$insertaBenef2 = InsertaBeneficiario2 ($idConexion,$_SESSION['id_persona'],2, $nombre2, $aPaterno2, $aMaterno2, $parentesco2, $fechaNac2, $porcentaje2, $calle2,
                               $colonia2, $delegacion2, $cp2);
		echo $insertaBenef2[1];
		}
		else{
		echo "actualizaPRUEBA2";
		
		$actualizaBenef2 = ActualizaBeneficiario2 ($idConexion,$_SESSION['id_persona'],2, $nombre2, $aPaterno2, $aMaterno2, $parentesco2, $fechaNac2, $porcentaje2, $calle2,
                               $colonia2, $delegacion2, $cp2);
		}
		
	
		$benef3 = array();
	 $benef3 = ConsultaBeficiario3( $idConexion, $_SESSION['id_persona']);
	 
	 if ($benef3 == NULL) {
	 echo "inserta3";
	 echo "sesion id: ".$_SESSION['id_persona'];
	 echo $nombre1;
	 
	
	$insertaBenef3 = InsertaBeneficiario3 ($idConexion,$_SESSION['id_persona'],3, $nombre3, $aPaterno3, $aMaterno3, $parentesco3, $fechaNac3, $porcentaje3, $calle3,
                               $colonia3, $delegacion3, $cp3);
		echo $insertaBenef3[2];
		}
		else{
		echo "actualizaPRUEBA3";
		
		$actualizaBenef3 = ActualizaBeneficiario3 ($idConexion,$_SESSION['id_persona'],3, $nombre3, $aPaterno3, $aMaterno3, $parentesco3, $fechaNac3, $porcentaje3, $calle3,
                               $colonia3, $delegacion3, $cp3);
		}
		
		

		 }
	

?>