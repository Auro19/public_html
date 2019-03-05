 
<?php

function ConsultaBeficiario1($idConexion,$id_persona )
{ 


 $sql = "SELECT nombre, aPaterno, aMaterno,parentesco,fechaNac, porcentaje,calle, colonia, delegacion, cp
           FROM beneficiario 
		  WHERE id_persona =$id_persona
		    AND  id_beneficiario = 1";

	$result = mysql_query($sql,$idConexion);
	
	if ($row = mysql_fetch_array($result))
	{
		do 	{
			 $nombre1    = $row["nombre"];
			 $aPaterno1  = $row["aPaterno"];
			 $aMaterno1  = $row["aMaterno"];
			 $parentesco1= $row["parentesco"];
			 $fechaNac1  = $row["fechaNac"];
			 $porcentaje1 = $row["porcentaje"];
			 $calle1 = $row["calle"];
			 $colonia1 = $row["colonia"];
			 $delegacion1 = $row["delegacion"];
			 $cp1 = $row["cp"];
			
		
		} while ($row = mysql_fetch_array($result));
		
	} 
	else 
	{
		//echo " Disculpe  ¡ La base de datos está vacia !";
		    $nombre1    = "";
			 $aPaterno1  = "";
			 $aMaterno1  = "";
			 $parentesco1= "";
			 $fechaNac1  = "";
			 $porcentaje1 = "";
			 $calle1 = "";
			 $colonia1 = "";
			 $delegacion1 = "";
			 $cp1 = "";
		
	}
	
	
	
	$matrizB = array();
	
	$matrizB[0] = $nombre1 ;
	$matrizB[1] = $aPaterno1;
	$matrizB[2] = $aMaterno1  ;
	$matrizB[3] = $parentesco1;
	$matrizB[4] = $fechaNac1 ;
	$matrizB[5] = $porcentaje1;
	$matrizB[6] = $calle1;
	$matrizB[7] = $colonia1;
	$matrizB[8] = $delegacion1;
	$matrizB[9] = $cp1;
	
	

	
	return $matrizB;

	//CerrarConexion("personas");
}
	
	
	?>