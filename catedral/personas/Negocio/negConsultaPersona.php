 
<?php


function ConsultaPersona($idConexion,$id_persona )
{ 
   
//include('/../Acceso_a_datos/accConexion.php');   // se incluye la conexion de base de datos.

  //   error_reporting(1);                         // se incluye la conexion de base de datos.
	 //  $idConexion=AbrirConexion("personas");    // se incluye la conexion de base de datos.

 $sql = "SELECT nombre, aPaterno, aMaterno,num_empleado,curp, edoCivil FROM persona where id_persona = $id_persona";

	$result = mysql_query($sql,$idConexion);
	
	if ($row = mysql_fetch_array($result))
	{
		do 	{
		     $id_persona = $row['id_persona'];
			 $nombre= $row["nombre"]." ".$row["aPaterno"]." ".$row["aMaterno"]." " ;
			 $numEmp= $row["num_empleado"];
			 $rfc    = substr($row["curp"],0,10);
			 $curp = $row["curp"];
			 $civil = $row["edoCivil"];
		
		} while ($row = mysql_fetch_array($result));
		
	} 
	else 
	{
		//echo " Disculpe  ¡ La base de datos está vacia !";
		     $id_persona = "";
			 $nombre = "";
			 $numEmp = "";
			 $rfc    = "";
			 $curp   = "";
			 $civil  = "";
		
	}
	
	$matriz = array();
	$matriz[0]= $id_persona;
	$matriz[1] = $nombre;
	$matriz[2] = $numEmp;
	$matriz[3] = $rfc;
	$matriz[4] = $curp;
	$matriz[5] = $civil;
	
	return $matriz;
	
	//CerrarConexion("personas");
}
	
	
	?>