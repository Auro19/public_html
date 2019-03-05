

<?php

  $tituloPagina = 'Registro';
  include('/Presentacion/wfEncabezado.php');  //encabezado de la pagina
  include('/Acceso_a_datos/accConexion.php');    // se incluye la conexion de base de datos.
  include('validacion.php');
 error_reporting(1);
  $idConexion= AbrirConexion("personas"); //Nombre de la base de datos.
  
 
$id_persona = 3;
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
//$domicilio2 = strtoupper($_POST['dirBenef2'].' '.$_POST['colBenef2'].' '.$_POST['delBenef2'].' '.$_POST['cpBenef2']);
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
//$domicilio3 = strtoupper($_POST['dirBenef3'].' '.$_POST['colBenef3'].' '.$_POST['delBenef3'].' '.$_POST['cpBenef3']);
$calle3 = strtoupper($_POST['dirBenef3']);
$colonia3 = strtoupper($_POST['colBenef3']);
$delegacion3= strtoupper($_POST['delBenef3']);
$cp3 = $_POST['cpBenef3'];



$prcntjeTotal = $porcentaje1+ $porcentaje2+ $porcentaje3;
  if ( $prcntjeTotal  != 100){
  
  echo "La suma de los porcentajes debe ser = 100"; 
      exit(); 
  }
 else{
 
echo "BIEN"; 
 include('/Negocio/negConsultaBeneficiario1.php');

	$benef = array();
	 $benef = ConsultaBeficiario1( $idConexion);
	 echo $benef;
	 if ($benef = NULL) {
	 echo "inserta";
	 $sql="INSERT INTO Beneficiario (id_persona, id_beneficiario, nombre, aPaterno, aMaterno,
        parentesco, fechaNac, porcentaje, calle, colonia, delegacion, cp, USUARIO_MODIFICO, ULTIMA_MODIFICACION)
VALUES
($id_persona, $id_beneficiario1,'$nombre1','$aPaterno1','$aMaterno1' , '$parentesco1' , '$fechaNac1', $porcentaje1, '$calle1', 
 '$colonia1', '$delegacion1', $cp1,'USER' ,CURDATE() )";

$result1= mysql_query($sql, $idConexion) or die ( "INSERTO 0 REGISTROS");
}
else
{
echo "actualiza";
ActualizaBeneficiario1

}

/*	else
		 {
  
	 $sql2="UPDATE  beneficiario SET 
	  nombre = '$nombre1',
	  aPaterno = '$aPaterno1',
	  aMaterno = '$aMaterno1',
	  parentesco = '$parentesco1',
	  fechaNac = '$fechaNac1',
	  porcentaje =$porcentaje1,
	  calle = '$calle1',
	  colonia = '$colonia1', 
	  delegacion = '$delegacion1', 
	  cp = $cp1, 
	  USUARIO_MODIFICO = 'USER', 
	  ULTIMA_MODIFICACION = CURDATE()
	  where id_persona = $id_persona
	  and id_beneficiario = 1";


$result2= mysql_query($sql2, $idConexion) or die ("no se actualizo");
  
		 } */
		 }
	
	/*********************************************************************************/
	/*
	include('/Negocio/negConsultaBeneficiario2.php');

	$benef2 = array();
	 $benef2 = ConsultaBeficiario2( $idConexion,$id_persona,2);
	 echo $benef2;
 if ( $benef2= NULL ) {
	 echo "inserta";
	 $sqlb2="INSERT INTO Beneficiario (id_persona, id_beneficiario, nombre, aPaterno, aMaterno,
        parentesco, fechaNac, porcentaje, calle, colonia, delegacion, cp, USUARIO_MODIFICO, ULTIMA_MODIFICACION)
VALUES
($id_persona,2,'$nombre2','$aPaterno2','$aMaterno2' , '$parentesco2' , '$fechaNac2', $porcentaje2, '$calle2', 
 '$colonia2', '$delegacion2', $cp2,'USER' ,CURDATE() )";

$resultb2= mysql_query($sqlb2, $idConexion) or die ( "PROBLEMA INSERTANDO BENEFICIARIO  2");
}

	 else
		 {
  
	 $sqlact2="UPDATE  beneficiario SET 
	  nombre = '$nombre2',
	  aPaterno = '$aPaterno2',
	  aMaterno = '$aMaterno2',
	  parentesco = '$parentesco2',
	  fechaNac = '$fechaNac2',
	  porcentaje =$porcentaje2,
	  calle = '$calle2',
	  colonia = '$colonia2', 
	  delegacion = '$delegacion2', 
	  cp = $cp2, 
	  USUARIO_MODIFICO = 'USER', 
	  ULTIMA_MODIFICACION = CURDATE()
	  where id_persona = $id_persona
	  and id_beneficiario = 2";


$resultact2= mysql_query($sqlact2, $idConexion) or die ("no se actualizo 2");
  
		 } 
	
	
	
	/***********************BENEFICIARIO 3**********************************************************/
	
	/*
	include('/Negocio/negConsultaBeneficiario3.php');

	 $benef3 = array();
	 $benef3 = ConsultaBeficiario3( $idConexion,$id_persona,3);
	 echo $benef3;
     
	 if ($benef3 = NULL) {
	 echo "inserta";
	 $sqlb3="INSERT INTO Beneficiario (id_persona, id_beneficiario, nombre, aPaterno, aMaterno,
        parentesco, fechaNac, porcentaje, calle, colonia, delegacion, cp, USUARIO_MODIFICO, ULTIMA_MODIFICACION)
VALUES
($id_persona,3,$nombre3','$aPaterno3','$aMaterno3' , '$parentesco3' , '$fechaNac3', $porcentaje3, '$calle3', 
 '$colonia3', '$delegacion3', $cp3,'USER' ,CURDATE() )";

$resultb3= mysql_query($sqlb3, $idConexion) or die ( "PROBLEMA INSERTANDO BENEFICIARIO  3");
}

	 else
		 {
  
	 $sqlact3="UPDATE  beneficiario SET 
	  nombre = '$nombre3',
	  aPaterno = '$aPaterno3',
	  aMaterno = '$aMaterno3',
	  parentesco = '$parentesco3',
	  fechaNac = '$fechaNac3',
	  porcentaje =$porcentaje3,
	  calle = '$calle3',
	  colonia = '$colonia3', 
	  delegacion = '$delegacion3', 
	  cp = $cp3, 
	  USUARIO_MODIFICO = 'USER', 
	  ULTIMA_MODIFICACION = CURDATE()
	  where id_persona = $id_persona
	  and id_beneficiario = 3";


$resultact3= mysql_query($sqlact3, $idConexion) or die ("no se actualizo 3");
  
		 } */

	
	 

CerrarConexion("personas");
?>