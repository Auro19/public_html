 
<?php


function InsertaBeneficiario1($idConexion,$id_persona,$id_beneficiario1, $nombre1, $aPaterno1, $aMaterno1, $parentesco1, $fechaNac1, $porcentaje1, $calle1,
                               $colonia1, $delegacion1, $cp1 )
{ 

  echo "inserta";
	 $sql="INSERT INTO Beneficiario (id_persona, id_beneficiario, nombre, aPaterno, aMaterno,
        parentesco, fechaNac, porcentaje, calle, colonia, delegacion, cp, USUARIO_MODIFICO, ULTIMA_MODIFICACION)
VALUES
($id_persona, $id_beneficiario1,'$nombre1','$aPaterno1','$aMaterno1' , '$parentesco1' , '$fechaNac1', $porcentaje1, '$calle1', 
 '$colonia1', '$delegacion1', '$cp1','USER' ,CURDATE() )";

$result= mysql_query($sql, $idConexion) or die ( "INSERTO 0 REGISTROS");

return 1;
}
	
	function InsertaBeneficiario2($idConexion,$id_persona,$id_beneficiario2, $nombre2, $aPaterno2, $aMaterno2, $parentesco2, $fechaNac2, $porcentaje2, $calle2,
                               $colonia2, $delegacion2, $cp2 )
{ 

  echo "inserta2";
	 $sql="INSERT INTO Beneficiario (id_persona, id_beneficiario, nombre, aPaterno, aMaterno,
        parentesco, fechaNac, porcentaje, calle, colonia, delegacion, cp, USUARIO_MODIFICO, ULTIMA_MODIFICACION)
VALUES
($id_persona, $id_beneficiario2,'$nombre2','$aPaterno2','$aMaterno2' , '$parentesco2' , '$fechaNac2', $porcentaje2, '$calle2', 
 '$colonia2', '$delegacion2', '$cp2','USER' ,CURDATE() )";

$result= mysql_query($sql, $idConexion) or die ( "INSERTO 0 REGISTROS");

return 1;
}
	function InsertaBeneficiario3($idConexion,$id_persona,$id_beneficiario3, $nombre3, $aPaterno3, $aMaterno3, $parentesco3, $fechaNac3, $porcentaje3, $calle3,
                               $colonia3, $delegacion3, $cp3 )
{ 

  echo "inserta3";
	 $sql="INSERT INTO Beneficiario (id_persona, id_beneficiario, nombre, aPaterno, aMaterno,
        parentesco, fechaNac, porcentaje, calle, colonia, delegacion, cp, USUARIO_MODIFICO, ULTIMA_MODIFICACION)
VALUES
($id_persona,3,'$nombre3','$aPaterno3','$aMaterno3' , '$parentesco3' , '$fechaNac3', $porcentaje3, '$calle3', 
 '$colonia3', '$delegacion3', '$cp3','USER' ,CURDATE() )";

$result= mysql_query($sql, $idConexion) or die ( "INSERTO 0 REGISTROS");

return 1;
}
	
	
	
	
	?>