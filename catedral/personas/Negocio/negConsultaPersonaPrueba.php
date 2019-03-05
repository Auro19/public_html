 
<?php

include("../Acceso_a_datos/accConexion.php");   // se incluye la conexion de base de datos.

   error_reporting(1);                         // se incluye la conexion de base de datos.
	 $idConexion=AbrirConexion("personas");    // se incluye la conexion de base de datos.

function ConsultaPersona($idConexion,$id_persona )
{ 
   
 $sql = "SELECT folio, num_empleado, curp, homo, nombre, aPaterno, aMaterno,grado, sexo,  edoCivil ,nacionalidad,domicilio, telefonoCasa, telefonoOficina, extTelefonoOfic, telCelPersonal, 
                 telCelTrabajo, e_mail, comentarios, id_tipo FROM persona where id_persona = $id_persona";

	$result = mysql_query($sql,$idConexion);
	
	if ($row = mysql_fetch_array($result))
	{
		do 	{
		     $id_persona = $row['id_persona'];
			 $folio = $row['folio'];
             $numEmp= $row["num_empleado"];	
             $rfc    = substr($row["curp"],0,10);
			 $curp = $row["curp"];	
		     $homo = $row['homo'];			 
			 $nombre= $row["nombre"];
			 $aPaterno = $row["aPaterno"];
			 $aMaterno = $row["aMaterno"];
			 $grado = $row['grado'];
			 $sexo = $row['sexo'];
			 $civil = $row["edoCivil"];
			 $nacionalidad = $row["nacionalidad"];
			 $domicilio =  $row["domicilio"];
			 $telefonoCasa = $row['telefonoCasa'];
			 $telefonoOficina =$row['telefonoOficina'];
			 $extTelefonoOfic = $row['extTelefonoOfic'];
			 $telCelPersonal =$row['telCelPersonal'];
			 $telCelTrabajo =$row['telCelTrabajo'];
			 $email =$row["e_mail"];
			 $comentarios =$row["comentarios"];
			 $id_tipo = $row['id_tipo'];
			 
		
		} while ($row = mysql_fetch_array($result));
		
			$matriz = array();
	$matriz[0]= $id_persona;
	$matriz[1] = $folio;
	$matriz[2] = $numEmp;
	$matriz[3] = $rfc;
	$matriz[4] = $curp;
	$matriz[5] = $homo;
	$matriz[6] = $nombre;
	$matriz[7] = $aPaterno;
	$matriz[8] = $aMaterno;
	$matriz[9] = $grado;
	$matriz[10] = $sexo;
	
	$matriz[11] = $civil;
	$matriz[12] = $nacionalidad;
	$matriz[13]= $domicilio;
	$matriz[14] = $telefonoCasa;
	$matriz[15] = $telefonoOficina;
	$matriz[16] = $extTelefonoOfic;
	$matriz[17] = $telCelPersonal;
	$matriz[18] = $telCelTrabajo;
	$matriz[19]= $email;
	$matriz[20] = $comentarios;
	$matriz[21] = $id_tipo;
		
		
	} 
	else 
	{
		//echo " Disculpe  ¡ La base de datos está vacia !";
		
			 $matriz = NULL;
		
	}
	

	return $matriz;
	
	
}
	//CerrarConexion("personas");
	
	?>