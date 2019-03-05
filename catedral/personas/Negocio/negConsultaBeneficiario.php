 
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
		
	} 
	else 
	{
		//echo " Disculpe  ¡ La base de datos está vacia !";
	$matrizB = NULL;
		
	}	
	
	return $matrizB;

	//CerrarConexion("personas");
}
	


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
		
	} 
	else 
	{
	    $matrizB2 = NULL;
		
	}
	
		
	return $matrizB2;

	//CerrarConexion("personas");
}
	
	

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
			 $matrizB3 = NULL;
		
	}
		
	return $matrizB3;

}


	
	
	?>