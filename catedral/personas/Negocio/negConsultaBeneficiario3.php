 
<?php

function ConsultaBeficiario3($idConexion,$id_persona )
{ 

 $sql = "SELECT nombre, aPaterno, aMaterno,parentesco,fechaNac, porcentaje,calle, colonia, delegacion, cp
           FROM beneficiario 
		  WHERE id_persona = $id_persona
		    AND  id_beneficiario =3";

	$result = mysql_query($sql,$idConexion);
	
	if ($row = mysql_fetch_array($result))
	{
		do 	{
			 $nombre3    = $row["nombre"];
			 $aPaterno3  = $row["aPaterno"];
			 $aMaterno3  = $row["aMaterno"];
			 $parentesco3= $row["parentesco"];
			 $fechaNac3  = $row["fechaNac"];
			 $porcentaje3 = $row["porcentaje"];
			 $calle3 =     $row["calle"];
			 $colonia3 =   $row["colonia"];
			 $delegacion3 = $row["delegacion"];
			 $cp3 = $row["cp"];
			
		
		} while ($row = mysql_fetch_array($result));
			$matrizB3 = array();
	
	$matrizB3[0] = $nombre3 ;
	$matrizB3[1] = $aPaterno3;
	$matrizB3[2] = $aMaterno3  ;
	$matrizB3[3] = $parentesco3;
	$matrizB3[4] = $fechaNac3 ;
	$matrizB3[5] = $porcentaje3;
	$matrizB3[6] = $calle3;
	$matrizB3[7] = $colonia3;
	$matrizB3[8] = $delegacion3;
	$matrizB3[9] = $cp3;
		
	} 
	else 
	{
		//echo " Disculpe  ¡ La base de datos está vacia !";
		 /*   $nombre3    = "";
			 $aPaterno3  = "";
			 $aMaterno3  = "";
			 $parentesco3= "";
			 $fechaNac3  = "";
			 $porcentaje3 = "";
			 $calle3 = "";
			 $colonia3 = "";
			 $delegacion3 = "";
			 $cp3 = "";*/
			 $matrizB3 = NULL;
		
	}
	
	
	

	

	
	return $matrizB3;


}
	
	
	?>