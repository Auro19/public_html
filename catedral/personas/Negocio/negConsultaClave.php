<?php

session_start();


	  
function ConsultaClave($idConexion,$curp,$clave )
{ 

 $sql = "SELECT id_persona
           FROM clave 
		  WHERE curp = '$curp'
		    AND  clave = MD5('$clave');";

	$result = mysql_query($sql,$idConexion);
	
$id_persona = mysql_fetch_array($result); 
 echo "$count[0]"; 
	
	if ($id_persona > 0)
	{
		echo "ok";
			return $id_persona ;
	} 
	else 
	{
		echo "Datos incorrectos";
		return 0;
		
	}
	
	
//return 1;
}
	

?>