 
<?php


function ActualizaBeneficiario1($idConexion,$id_persona,$id_beneficiario1, $nombre1, $aPaterno1, $aMaterno1, $parentesco1, $fechaNac1, $porcentaje1, $calle1,
                               $colonia1, $delegacion1, $cp1 )
{ 


  echo "actualiza";
	 $sql="
	 UPDATE Beneficiario SET 
	 nombre = '$nombre1',
	 aPaterno = '$aPaterno1',
	 aMaterno = '$aMaterno1',
	 parentesco = '$parentesco1',
	 fechaNac= '$fechaNac1',
	 porcentaje = $porcentaje1,
     calle = '$calle1',
     colonia = '$colonia1',
     delegacion = '$delegacion1',
	 cp ='$cp1',
    USUARIO_MODIFICO = 'USER',
     ULTIMA_MODIFICACION = CURDATE()
	 WHERE id_persona = $id_persona
	 and  id_beneficiario = 1 ";

$result= mysql_query($sql, $idConexion) or die ( "ACTUALIZO 0 REGISTROS");
return 1;
}
	
	function ActualizaBeneficiario2($idConexion,$id_persona,$id_beneficiario2, $nombre2, $aPaterno2, $aMaterno2, $parentesco2, $fechaNac2, $porcentaje2, $calle2,
                               $colonia2, $delegacion2, $cp2 )
{ 

  echo "actualiza";
	 $sql="
	 UPDATE Beneficiario SET 
	 nombre = '$nombre2',
	 aPaterno = '$aPaterno2',
	 aMaterno = '$aMaterno2',
	 parentesco = '$parentesco2',
	 fechaNac= '$fechaNac2',
	 porcentaje = $porcentaje2,
     calle = '$calle2',
     colonia = '$colonia2',
     delegacion = '$delegacion2',
	 cp = '$cp2',
    USUARIO_MODIFICO = 'USER',
     ULTIMA_MODIFICACION = CURDATE()
	 WHERE id_persona = $id_persona
	 and  id_beneficiario = 2 ";

$result= mysql_query($sql, $idConexion) or die ( "ACTUALIZO 0 REGISTROS");
return 1;
}
	
		function ActualizaBeneficiario3($idConexion,$id_persona,$id_beneficiario3, $nombre3, $aPaterno3, $aMaterno3, $parentesco3, $fechaNac3, $porcentaje3, $calle3,
                               $colonia3, $delegacion3, $cp3 )
{ 

  echo "actualiza";
	 $sql="
	 UPDATE Beneficiario SET 
	 nombre = '$nombre3',
	 aPaterno = '$aPaterno3',
	 aMaterno = '$aMaterno3',
	 parentesco = '$parentesco3',
	 fechaNac= '$fechaNac3',
	 porcentaje = $porcentaje3,
     calle = '$calle3',
     colonia = '$colonia3',
     delegacion = '$delegacion3',
	 cp = '$cp3',	 
    USUARIO_MODIFICO = 'USER',
     ULTIMA_MODIFICACION = CURDATE()
	 WHERE id_persona = $id_persona
	 and  id_beneficiario = 3 ";

$result= mysql_query($sql, $idConexion) or die ( "ACTUALIZO 0 REGISTROS");
return 1;
}
	
	
	
	?>