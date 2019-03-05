<?php
 session_start();

//consulta de la PERSONA 
	 include("../Negocio/negConsultaPersonaPrueba.php");
	 

	 $b = array();
	 $b = ConsultaPersona( $idConexion,$_SESSION['id_persona']);
	 // echo implode (",", $b);  //imprime la cadena separada por comas
	  $id_persona = $b[0];
	  $folio = $b[1];
	   $numEmp = $b[2];
	     $rfc    = $b[3];
	  $curp   = $b[4];
	  $homo = $b[5];
	  $nombre = $b[6];
	  $aPaterno = $b[7];
	  $aMaterno = $b[8];
	  $grado = $b[9];
	  $sexo = $b[10];
	  $civil  = $b[11];	
	  $nacionalidad = $b[12];
	  $domicilio = $b[13];
	  $telefonoCasa = $b[14];
	  $telefonoOficina = $b[15];
	  $teleCelPersonal = $b[16];
	  $telCelTrabajo = $b[17];
	  $extTelefonoOfic = $b[18];
	  $email = $b[19];
	  $comentarios = $b[20];
	  $id_tipo  = $b[21];
	  
	 
	  echo $sexo;
	 


?>


<HTML>
<HEAD>
	<TITLE>Ingeniería en Telecomunicaciones</TITLE>
</head>
<Body>
	<FORM ACTION="wfDatosPersonalesAct.php" METHOD=POST>

<CENTER>
DATOS PERSONALES
<BR>  <BR>

<TABLE BORDER>

<TR>
<TD colspan = "100%">  DATOS PERSONALES </TD>
<TR>
   <TD>Nombre:</TD>
   <TD> <INPUT TYPE="text" NAME="nombre" SIZE=48 MAXLENGTH=48 value="<?php echo  $nombre; ?>" ></TD>

<TR>
   <TD>Apellido Paterno:</TD>
   <TD> <INPUT TYPE="text" NAME="aPaterno" SIZE=48 MAXLENGTH=48 value="<?php echo  $aPaterno; ?>"></TD>
<TR>
   <TD>Apellido Materno:</TD>
   <TD> <INPUT TYPE="text" NAME="aMaterno" SIZE=48 MAXLENGTH=48 value="<?php echo  $aMaterno; ?>"></TD>
<TR>
   <TD>Grado académico:</TD>
   <TD> <INPUT TYPE="text" NAME="grado" SIZE=48 MAXLENGTH=48 value="<?php echo  $grado; ?>"></TD>
<TR>
   <TD>RFC:</TD>
   <TD> <INPUT TYPE="text" NAME="rfc" SIZE=18 MAXLENGTH=18 value="<?php echo  $rfc; ?>"> Homo clave:
        <INPUT TYPE="text" NAME="hclave" SIZE= 10 MAXLENGTH=10 value="<?php echo  $homo; ?>"> 
        </TD>

<TR>
   <TD>Número de trabajador:</TD>
   <TD> <INPUT TYPE="text" NAME="noEmp" SIZE=48 MAXLENGTH=48 value="<?php echo  $numEmp; ?>"></TD>

<TR>
   <TD>Curp:</TD>
   <TD> <INPUT TYPE="text" NAME="curp" SIZE=48 MAXLENGTH=48 value="<?php echo  $curp; ?>"></TD>

<TR>
   <TD>Categoría:</TD>
   <TD> <SELECT NAME="categoria">
           <OPTION value = "1" <?php  if($id_tipo==1) echo 'selected = "selected"'; ?> >PROFESOR CARRERA TITULAR TIEMPO COMPLETO	
           <OPTION value = "2" <?php  if($id_tipo==2) echo 'selected = "selected"'; ?>>AYUDANTE DE PROFESOR A INTERINO
           <OPTION value = "3" <?php  if($id_tipo==3) echo 'selected = "selected"'; ?>>PROFESOR ASIGNATURA INTERINO	
		   <OPTION value = "4" <?php  if($id_tipo==4) echo 'selected = "selected"'; ?>>PROFESOR ORDINARIO DE ASIGNATURA	
		   <OPTION value = "5" <?php  if($id_tipo==5) echo 'selected = "selected"'; ?>>PROFESOR ORDINARIO CARRERA ASOCIADO TIEMPO COMPLETO INTERINO	
		   <OPTION value = "6" <?php  if($id_tipo==6) echo 'selected = "selected"'; ?>>TECNICO ACADEMICO ASOCIADO CON TIEMPO COMPLETO DEFINITIVO	
        </SELECT>  </TD>

<TR>
   <TD>Nacionalidad:</TD>
   <TD> <INPUT TYPE="text" NAME="nacionalidad" SIZE=48 MAXLENGTH=48 value="<?php echo  $nacionalidad; ?>"></TD>
<TR>
   <TD>Estado Civil:</TD>
   <TD> <SELECT NAME="OPCION" value = "<?php echo  $civil; ?>">
           <OPTION value = "S">Soltero(a)
           <OPTION value = "C">Casado(a)
           <OPTION value = "O">Otro
        </SELECT>   
	
		
        <INPUT TYPE="radio" NAME="sexo" VALUE="M" <?php if($sexo=='M') echo 'checked="checked"';?> /> Hombre
        <INPUT TYPE="radio" NAME="sexo" VALUE="F"<?php if($sexo=='F') echo 'checked="checked"';?> /> Mujer 
	
		</TD>

<TR>
<TD colspan = "100%">  DOMICILIO </TD>
<TR>
   <TD>Calle:</TD>
   <TD> <INPUT TYPE="text" NAME="calle"  value="<?php echo  $domicilio; ?>">
    Número ext:
    <INPUT TYPE="text" NAME="noExt"  value="<?php echo  $domicilio; ?>">
	Número int:
	<INPUT TYPE="text" NAME="noInt"  value="<?php echo  $domicilio; ?>"></TD>

<TR>
   <TD>Código Postal:</TD>
   <TD> <INPUT TYPE="text" NAME="postal" SIZE=5 MAXLENGTH=5 value="<?php echo  $cp; ?>">Ciudad:
        <INPUT TYPE="text" NAME="ciudad" SIZE=36 MAXLENGTH=36 value="<?php echo  $ciudad; ?>"></TD>

<TR>
   <TD>Teléfono casa: </TD>
   <TD> <INPUT TYPE="text" NAME="tCasa" SIZE=20 MAXLENGTH=20 value="<?php echo  $telefonoCasa; ?>">                Teléfono oficina: 
        <INPUT TYPE="text" NAME="tOficina" SIZE=19 MAXLENGTH=19 value = "<?php echo  $telefonoOficina; ?>">
		Ext:<INPUT TYPE="text" NAME="extOficina" SIZE=5 MAXLENGTH=5 value = "<?php echo  $extTelefonoOfic; ?>"> </TD>
<TR>
   <TD>Teléfono celular personal: </TD>
   <TD> <INPUT TYPE="text" NAME="tCel" SIZE=20 MAXLENGTH=20 value="<?php echo  $telCelPersonal; ?>">                Teléfono celular trabajo: 
        <INPUT TYPE="text" NAME="tCelWork" SIZE=19 MAXLENGTH=19 value="<?php echo  $telCelTrabajo; ?>"></TD>

<TR>
   <TD>E-mail personal: </TD>
   <TD> <INPUT TYPE="text" NAME="email" SIZE=20 MAXLENGTH=20 value="<?php echo  $email; ?>">       </TD>

<TR>
   <TD>Comentarios<BR> personales:</TD>
   <TD><TEXTAREA NAME="coment" ROWS=5 COLS=50 value="<?php echo  $comentarios; ?>"></TEXTAREA></TD>

<TR>
   <TH>Pulse aquí:</TH>
   <TD ALIGN=CENTER>
       <INPUT TYPE="submit" VALUE="Enviar datos ">
       <INPUT TYPE="reset" VALUE="Borrar los datos"></TD>

</TABLE>
</CENTER>
</FORM>
</body>
</html>