

<?php

  $tituloPagina = 'Registro';
  include('/Presentacion/wfEncabezado.php');  //encabezado de la pagina
  include('/Acceso_a_datos/accConexion.php');    // se incluye la conexion de base de datos.
  include('validacion.php');
 error_reporting(1);
  $idConexion= AbrirConexion("personas"); //Nombre de la base de datos.
  
 
$id_persona = 2;
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

$ok = 1;



$prcntjeTotal = $porcentaje1+ $porcentaje2+ $porcentaje3;
  if ( $prcntjeTotal  != 100){
  
  echo "La suma de los porcentajes debe ser = 100"; 
      exit(); 
  }
 else{
 

 include('Negocio/negConsultaBeneficiario1.php');

	 $benef = array();
	 $benef = ConsultaBeficiario1( $idConexion);
	 if (isset($benef) ) {
	 echo "inserta";
	/* 
	 $sql1="INSERT INTO Beneficiario (id_persona, id_beneficiario, nombre, aPaterno, aMaterno,
        parentesco, fechaNac, porcentaje, domicilio, USUARIO_MODIFICO, ULTIMA_MODIFICACION)
VALUES
($id_persona,$id_beneficiario1,'$nombre1','$aPaterno1','$aMaterno1' , '$parentesco1' , '$fechaNac1', $porcentaje1, '$calle1', 
 '$colonia1', '$delegacion1', '$cp1','USER' ,CURDATE() )";

$result1= mysql_query($sql1, $idConexion) or die ("se inserto 0 benficiarios");*/
	 }
	 else
	 {
	    echo "actualiza";
		 exit(); 
	 }
/*
$sql1="INSERT INTO Beneficiario (id_persona, id_beneficiario, nombre, aPaterno, aMaterno,
        parentesco, fechaNac, porcentaje, domicilio, USUARIO_MODIFICO, ULTIMA_MODIFICACION)
VALUES
($id_persona,$id_beneficiario1,'$nombre1','$aPaterno1','$aMaterno1' , '$parentesco1' , '$fechaNac1', $porcentaje1, '$domicilio1','USER' ,CURDATE() )";

$result1= mysql_query($sql1, $idConexion) or die ("se inserto 0 benficiarios");

//if ($ok == 1 ) {
if(isset($nombre2, $aPaterno2, $aMaterno2, $parentesco2, $fechaNac2, $porcentaje2, $domicilio2 )) {

$sql2="INSERT INTO Beneficiario (id_persona, id_beneficiario, nombre, aPaterno, aMaterno,
        parentesco, fechaNac, porcentaje, domicilio, USUARIO_MODIFICO, ULTIMA_MODIFICACION)
VALUES
($id_persona,$id_beneficiario2,'$nombre2','$aPaterno2','$aMaterno2' , '$parentesco2' , '$fechaNac2', $porcentaje2, '$domicilio2','USER' ,CURDATE() )";
$result2= mysql_query($sql2, $idConexion) or die ("se inserto 1 beneficiario");
}

//if($ok == 2){
if(isset($nombre3, $aPaterno3, $aMaterno3, $parentesco3, $fechaNac3, $porcentaje3, $domicilio3 )) {
 $sql3="INSERT INTO Beneficiario (id_persona, id_beneficiario, nombre, aPaterno, aMaterno,
        parentesco, fechaNac, porcentaje, domicilio, USUARIO_MODIFICO, ULTIMA_MODIFICACION)
VALUES
($id_persona,$id_beneficiario3,'$nombre3,'$aPaterno3','$aMaterno3' , '$parentesco3' , '$fechaNac3', $porcentaje3, '$domicilio3','USER' ,CURDATE() )";
 
$result3= mysql_query($sql3, $idConexion) or die ("se insertaron 2 beneficiarios");
  }
  }
  */
  
CerrarConexion("personas");

?>