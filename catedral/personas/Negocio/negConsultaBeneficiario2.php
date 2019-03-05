 
<?php

function ConsultaBeficiario2($idConexion,$id_persona )
{ 

 $sql = "SELECT nombre, aPaterno, aMaterno,parentesco,fechaNac, porcentaje,calle, colonia, delegacion,cp
           FROM beneficiario 
		  WHERE id_persona = $id_persona
		    AND  id_beneficiario = 2";

	$result = mysql_query($sql,$idConexion);
	
	if ($row = mysql_fetch_array($result))
	{
		do 	{
			 $nombre2    = $row["nombre"];
			 $aPaterno2  = $row["aPaterno"];
			 $aMaterno2  = $row["aMaterno"];
			 $parentesco2= $row["parentesco"];
			 $fechaNac2  = $row["fechaNac"];
			 $porcentaje2 = $row["porcentaje"];
			 $calle2 = $row["calle"];
			 $colonia2 = $row["colonia"];
			 $delegacion2 = $row["delegacion"];
			 $cp2 = $row["cp"];
			
		
		} while ($row = mysql_fetch_array($result));
		
	} 
	else 
	{
		//echo " Disculpe  ¡ La base de datos está vacia !";
		    $nombre2    = "";
			 $aPaterno2  = "";
			 $aMaterno2  = "";
			 $parentesco2= "";
			 $fechaNac2  = "";
			 $porcentaje2 = "";
			 $domicilio2 = "";
			 $calle2     = "";
			 $colonia2   = "";
			 $delegacion2 = "";
			 $cp2 = "";
		
	}
	
	
	
	$matrizB2 = array();
	
	$matrizB2[0] = $nombre2 ;
	$matrizB2[1] = $aPaterno2;
	$matrizB2[2] = $aMaterno2  ;
	$matrizB2[3] = $parentesco2;
	$matrizB2[4] = $fechaNac2 ;
	$matrizB2[5] = $porcentaje2;
	$matrizB2[6] = $calle2;
	$matrizB2[7] = $colonia2;
	$matrizB2[8] = $delegacion2;
	$matrizB2[9] = $cp2;

	
	return $matrizB2;

	//CerrarConexion("personas");
}
	
	
	?>