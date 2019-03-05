 
<?php
include('/../Acceso_a_datos/accConexion.php');   // se incluye la conexion de base de datos.

   error_reporting(1);                         // se incluye la conexion de base de datos.
	 $idConexion=AbrirConexion("personas");    // se incluye la conexion de base de datos.

function ActualizaPersona($idConexion,$id_persona, $nombre, $aPaterno, $aMaterno, $numEmp, $curp, $civil, $domicilio,
                               $telCasa, $telOficina, $extTelOfic, $telCelP, $telCelTrabajo, $email, $comentarios )
{ 

  echo "actualiza";
	 $sql="
	 UPDATE PERSONA SET 
	 nombre = '$nombre',
	 aPaterno = '$aPaterno',
	 aMaterno = '$aMaterno',
	 num_empleado = '$numEmp',
	 curp = '$curp',
	 edoCivil = '$civil',
	 domicilio = '$domicilio',
	 telefonoCasa = $telCasa,
	 telefonoOficina = $telOficina,
	 extTelefonoOfic = $extTelOfic,
	 telCelPersonal = $telCelP,
	 telCelTrabajo = $telCelTrabajo,
	 e_mail = '$email',
	 comentarios = '$comentarios'
	 WHERE id_persona = $id_persona";

$result= mysql_query($sql, $idConexion) or die ( "ACTUALIZO 0 REGISTROS");
return 1;
}
	
		 CerrarConexion("personas");
	
	
	?>