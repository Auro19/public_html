<?php
session_start();
$curp =$_SESSION['curp']=$_REQUEST['curp'];
$clave =$_SESSION['clave']=$_REQUEST['clave'];


 include('Acceso_a_datos/accConexion.php'); 

     error_reporting(1);
	 $idConexion=AbrirConexion("personas");
	 include ('Negocio/negConsultaClave.php');
	 
	 $ConsultaClave = int;
	 
	  $ConsultaClave = ConsultaClave( $idConexion, $curp,$clave ); 
	  
	    //cerrar conexion
	  CerrarConexion("personas");
	
?>
<html>
<head>
<title>Actualizando/insertando beneficiarios</title>
</head>
<body>

<?php
 $tituloPagina = 'Beneficiarios';
 include('Presentacion/wfEncabezado.php');

if($ConsultaClave > 0){
echo 'Bienvenido';
include ('Presentacion/wfOpciones.php');
echo $ConsultaClave[0];

$_SESSION['id_persona'] = $ConsultaClave[0];
}
else{
echo 'No se encontro registro';

}


?>


 
 
 
 
</body>
</html> 