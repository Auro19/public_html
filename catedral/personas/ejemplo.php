<?php
 //  session_start();
?>

<html>
  <head><title>Seguro de vida</title></head>
   <body>
   <?php 
   session_start();
       $tituloPagina = 'Seguro de vida';
        include( 'Presentacion/wfEncabezado.php' ); 
	  //validacion de porcentajes
	  
	   $porcntje1 = 0;
	   $porcntje2 = 0;
	   $porcntje3 = 0;
	   
	   
	 //abrir conexion
      include('Acceso_a_datos/accConexion.php'); 

      error_reporting(1);
	  $idConexion=AbrirConexion("personas");	
	   
	//consulta de la PERSONA 
	 include('Negocio/negConsultaPersona.php');

	 $b = array();
	 $b = ConsultaPersona( $idConexion,$_SESSION['id_persona']);
	 // echo implode (",", $b);  //imprime la cadena separada por comas
	  $id_persona = $b[0];
	  $nombre = $b[1];
	  $numEmp = $b[2];
	  $rfc    = $b[3];
	  $curp   = $b[4];
	  $civil  = $b[5];	

	  
	  
	  //Fin consulta de la PERSONA
	
	  	//consulta de BENEFICIARIO 1
	
	 include('Negocio/negConsultaBeneficiario1.php');

	 $benef = array();
	 $benef = ConsultaBeficiario1( $idConexion,$_SESSION['id_persona']);// tambien se envia el id_persona y el numero de beneficiario es fijo
	 // echo implode (",", $b);  //imprime la cadena separada por comas
	  $nombreB1      = $benef[0];
	  $aPaternoB1    = $benef[1];
	  $aMaternoB1    = $benef[2];
	  $parentescoB1  = $benef[3];
	  $fechaNacB1    = $benef[4];
      $porcentajeB1  = $benef[5];
      $calleB1   = $benef[6];
	  $coloniaB1   = $benef[7];
	  $delegacionB1   = $benef[8];
	  $cpB1   = $benef[9];
	  
	  //Fin consulta de la BENEFICIARIO1
	  
	  	//consulta de BENEFICIARIO 2
	
	 include('Negocio/negConsultaBeneficiario2.php');

	 $benef2 = array();
	 $benef2 = ConsultaBeficiario2( $idConexion,$_SESSION['id_persona'],2);   // tambien se envia el id_persona y el numero de beneficiario es fijo


      $nombreB2      = $benef2[0];
	  $aPaternoB2    = $benef2[1];
	  $aMaternoB2    = $benef2[2];
	  $parentescoB2  = $benef2[3];
	  $fechaNacB2    = $benef2[4];
      $porcentajeB2  = $benef2[5];	
	  $calleB2   = $benef2[6];
	  $coloniaB2   = $benef2[7];
	  $delegacionB2   = $benef2[8];
	  $cpB2   = $benef2[9];	  
	  
	  
	  	  //Fin consulta de la BENEFICIARIO 2
		  
		  	//consulta de BENEFICIARIO 3
	
	 include('Negocio/negConsultaBeneficiario3.php');

	 $benef3 = array();
	 $benef3 = ConsultaBeficiario3( $idConexion,$_SESSION['id_persona'],3); // tambien se envia el id_persona y el numero de beneficiario es fijo

      $nombreB3      = $benef3[0];
	  $aPaternoB3    = $benef3[1];
	  $aMaternoB3    = $benef3[2];
	  $parentescoB3  = $benef3[3];
	  $fechaNacB3    = $benef3[4];
      $porcentajeB3  = $benef3[5];	
	  $calleB3   = $benef3[6];
	  $coloniaB3   = $benef3[7];
	  $delegacionB3   = $benef3[8];
	  $cpB3   = $benef3[9];	  
	  
	  
	  	  //Fin consulta de la BENEFICIARIO 3
	
	  
	  //cerrar conexion
	  CerrarConexion("personas");
	     ?>
	<h2 align=left>Formato para Designación de Beneficiarios para Seguro de Vida</h2>
<h3 align=left>D. I. E. Secretaría Auxiliar.</h3>
 <form action="insertprueba.php" method="post" name = "form1">
 
 
 <table>
 <tr>
 <td width="120"><B>Beneficiarios de: </B> </td><td width="210"><?php echo $nombre; ?></td>
 <td width="120"><B>No. Empleado: </B> </td><td width="180"><?php echo $numEmp; ?></td>
 <td width="80"> </td><td width="100"></td>
 </tr>
 <tr>
 <td> <B>R. F. C. : </B> </td><td>  <?php echo $rfc; ?></td>
 <td><B>CURP : </B> </td><td> <?php echo $curp; ?></td>
 <td><B>Edo. Civil : </B> </td><td> <?php echo $civil; ?></td>


 </tr>
 </table> 
 
  
<Br></Br>
<Br>Para la designación de sus beneficiarios considere los siguientes requisitos:</Br>

<ol>
<li>Indique como máximo a 3 personas. 
<li>Asigne un porcentaje a cada beneficiario en número entero. Incorrecto:  %33.3 correcto: %34. 
<li>La suma total de los porcentajes de los beneficiarios debe ser 100%.  
<li>En  caso  que  desee  nombrar  beneficiarios  menores  de  edad, se debe nombrar a un mayor de edad como su representante para que éste cobre su indeminización. 
</ol>

Proporcione  los  datos que  a continuación se le indican asegurandose que no existe en ellos ningún error.

<Br><B>Beneficiario 1:</B>
 

				Nombre(s):  <input type=TEXT size=80 maxlength=80 name= "nombreBenef1"  value="<?php echo $nombreB1; ?>"></Br> 

<Br>Apellido Paterno: <input type=TEXT size=30 maxlength=30 name="aPatBenef1" value="<?php echo $aPaternoB1; ?>">
Apellido Materno: <input type=TEXT size=30 maxlength=30 name="aMatBenef1" value="<?php echo $aMaternoB1; ?>" ></Br>
 
<Br>Parentesco: <input type=TEXT size=15 maxlength=15 name="parenBenef1" value="<?php echo $parentescoB1; ?>">
Fecha de nacimiento: <input type=TEXT size=10 maxlength=10 name="fecNacBenef1" value="<?php echo $fechaNacB1; ?>">
Porcentaje: <input type=TEXT size=10 maxlength=10 name="porcentajeBenef1" value=<?php echo $porcentajeB1; ?>> </Br>

<Br>Dirección. Calle y número: <input type=TEXT size=70 maxlength=70 name="dirBenef1" value="<?php echo $calleB1; ?>"> </Br>

<Br>Colonia: <input type=TEXT size=50 maxlength=50 name="colBenef1" value="<?php echo $coloniaB1; ?>"> </Br>

<Br>Deleg. O Municipio: <input type=TEXT size=50 maxlength=50 name="delBenef1" value="<?php echo $delegacionB1; ?>">
C. P.: <input type=TEXT size=20 maxlength=20 name="cpBenef1" value="<?php echo $cpB1; ?>"> </Br>
<Br></Br>

<Br><B>Beneficiario 2:</B>
Nombre(s):  <input type=TEXT size=80 maxlength=80 name="nombreBenef2" value = "<?php echo  $nombreB2; ?>" ></Br>

<Br>Apellido Paterno: <input type=TEXT size=30 maxlength=30 name="aPatBenef2" value = "<?php echo  $aPaternoB2; ?>" >
Apellido Materno: <input type=TEXT size=30 maxlength=30 name="aMatBenef2" value ="<?php echo  $aMaternoB2; ?>" ></Br>
 
<Br>Parentesco: <input type=TEXT size=15 maxlength=15 name="parenBenef2" value = "<?php echo  $parentescoB2; ?>" >
Fecha de nacimiento: <input type=TEXT size=10 maxlength=10 name="fecNacBenef2" value = "<?php echo  $fechaNacB2; ?>" >
Porcentaje: <input type=TEXT size=10 maxlength=10 name="porcentajeBenef2" value=<?php echo $porcentajeB2; ?>> </Br>

<Br>Dirección. Calle y número: <input type=TEXT size=70 maxlength=70 name="dirBenef2" value = "<?php echo  $calleB2; ?>"> </Br>

<Br>Colonia: <input type=TEXT size=50 maxlength=50 name="colBenef2" value = "<?php echo  $coloniaB2; ?>" > </Br>

<Br>Deleg. O Municipio: <input type=TEXT size=50 maxlength=50 name="delBenef2" value = "<?php echo  $delegacionB2; ?>" >
C. P.: <input type=TEXT size=20 maxlength=20 name="cpBenef2" value = <?php echo  $cpB2; ?> > </Br>
<Br></Br>

<Br><B>Beneficiario 3:</B>
Nombre(s):  <input type=TEXT size=80 maxlength=80 name="nombreBenef3" value = "<?php echo  $nombreB3; ?> "></Br>

<Br>Apellido Paterno: <input type=TEXT size=30 maxlength=30 name="aPatBenef3" value = "<?php echo  $aPaternoB3; ?>">
Apellido Materno: <input type=TEXT size=30 maxlength=30 name="aMatBenef3" value = "<?php echo  $aMaternoB3; ?>"></Br>
 
<Br>Parentesco: <input type=TEXT size=15 maxlength=15 name="parenBenef3" value = "<?php echo  $parentescoB3; ?>">
Fecha de nacimiento: <input type=TEXT size=10 maxlength=10 name="fecNacBenef3" value = "<?php echo  $fechaNacB3; ?>">
Porcentaje: <input type=TEXT size=10 maxlength=10 name="porcentajeBenef3" value=<?php echo $porcentajeB3; ?> > </Br>

<Br>Dirección. Calle y número: <input type=TEXT size=70 maxlength=70 name="dirBenef3" value = "<?php echo  $calleB3; ?>"> </Br>

<Br>Colonia: <input type=TEXT size=50 maxlength=50 name="colBenef3" value = "<?php echo  $coloniaB3; ?>"> </Br>

<Br>Deleg. O Municipio: <input type=TEXT size=50 maxlength=50 name="delBenef3" value = "<?php echo  $delegacionB3; ?>">
C. P.: <input type=TEXT size=20 maxlength=20 name="cpBenef3" value = <?php echo  $cpB3; ?>> </Br>
<Br></Br>
 <center>   <input type="submit" name="botEnviarRegistro" value="Enviar"> </center>
</form>

<!--Agregamos script de validacion -->
<script type="text/javascript" src="main.js"></script> 



</body> 	
</html>