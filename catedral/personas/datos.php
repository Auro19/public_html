<?php

function RegresaDatosPersona($id){

$id= 2;
include('conexion.php');    // se incluye la conexion de base de datos.
error_reporting(1);
$idConexion=AbrirConexion("personas");

  $sql = "SELECT nombre, aPaterno, aMaterno,num_empleado,curp, edoCivil FROM persona where id_persona = $id";
	$result = mysql_query($sql,$idConexion);
	
	if ($row = mysql_fetch_array($result))
	{
		do 	{
			echo $nombre= $row["nombre"]." ".$row["aPaterno"]." ".$row["aMaterno"]." ";
			echo $numEmp= $row["num_empleado"]. " ";
			echo $curp = $row["curp"]." ";
			echo $civil = $row["edoCivil"];
		
		} while ($row = mysql_fetch_array($result));
		
	} 
	else 
	{
		echo "<p class='Estilo1' align='center'> Disculpe pero <br> ¡ La base de datos está vacia !</p>";
	}
CerrarConexion("personas");

return array( $nombre, $numEmp, $curp, $civil);
 }
 
 list($nombre, $numEmp, $curp, $civil) = RegresaDatosPersona(2);
 
 
?>