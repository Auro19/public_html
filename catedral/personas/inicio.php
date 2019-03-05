
<html>
<head>
<title>Acceso al sistema</title>
</head>

<body>
<?php
session_start();
  $tituloPagina = 'Acceso para registro de beneficiarios';
        include( 'Presentacion/wfEncabezado.php' ); 
	//	 include('Acceso_a_datos/accConexion.php'); 

     // error_reporting(1);
	 // $idConexion=AbrirConexion("personas");	
	  
		?>

<font size= 2>
<hr>
<br>
<ulL>
<li>El profesor se hace responsable de que la clave de acceso al sistema es conocida s&oacutelo por &eacutel mismo.<br></li>
<li>Para hacer m&aacutes grande el font de pantalla presione la combinaci&oacuten "ctrl +" (s&oacutelo firefox y google Chrome)</li>
</ul>
<br>
<form  action="inicio2.php" method="post">
<table border=1>
<caption>Acceso al sistema<br></caption>
<tr>    <td width=100>
                CURP     <input type=text name='curp' value="" size=18 maxsize=18>
        </td>
<tr>    <td width=100>
                CLAVE <input type=text name='clave' value="" size=8 maxsize=8>
        </td>
</table>
<br>
<input type=submit value="Enviar">

</body>
</html>
<?php
?>