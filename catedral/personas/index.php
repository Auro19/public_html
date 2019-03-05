<?php 

class Usuarios { 
//Creamos la clase "Usuarios" 
private $nombreBenef1; 
 /*   private $rpass; 
    private $rrpass; 
    private $remail; 
    private $rnombre; 
    private $rapellido; 
    private $rsexo; */
    private $botonenviarregistro; 
//Damos como privadas las variables.     
    public function validar_registro($nombreBenef1){ 

/* 

Creamos la función pública "validar_registro" y pasamos las variables a validar como parámetros. 

Funciones:  

public: el metodo es accesible desde cualquiero lado 

private: el metodo es accesible solo desde dentro de la clase 

protected: el metodo es accesible dentro de la clase y sus herencias 

Gracias dii3g0 por pasarme estos datos, public, private y protected. 

 */ 

            $nombreBenef1 = htmlspecialchars(mysql_real_escape_string(strip_tags($_POST["nombreBenef1"]))); 
           /* $rpass = htmlspecialchars(mysql_real_escape_string(strip_tags($_POST["pass"]))); 
            $rrpass = htmlspecialchars(mysql_real_escape_string(strip_tags($_POST["rpass"]))); 
            $remail = htmlspecialchars(mysql_real_escape_string(strip_tags($_POST["email"]))); 
            $rnombre = htmlspecialchars(mysql_real_escape_string(strip_tags($_POST["nombre"]))); 
            $rapellido = htmlspecialchars(mysql_real_escape_string(strip_tags($_POST["apellido"]))); 
            $rsexo = htmlspecialchars(mysql_real_escape_string(strip_tags($_POST["sexo"]))); */
            $botonenviarregistro = $_POST["botEnviarRegistro"]; 
//Las variables contienen los datos escritos por el usuario. 
    $this->nombreBenef1 = $nombreBenef1; 
  /*  $this->rpass = $rpass; 
    $this->rrpass = $rrpass; 
    $this->remail = $remail; 
    $this->rnombre = $rnombre; 
    $this->rapellido = $rapellido; 
    $this->rsexo = $rsexo; */
    $this->botonenviarregistro = $botonenviarregistro; 
//Estamos declarando que las variables que pasamos como privadas son las mismas que de los parámetros.
    if(isset($this->botonenviarregistro)){ 
//Si se apretó el botón "Registrarse". 
        $validar = TRUE; 
//La variable "validar" es verdadera. 
        if($this->nombreBenef1 == ''){ 
            echo "Falta completar el nombre de usuario. <br>"; 
            $validar = FALSE;     
        } 
//Si la variable "usuario" no tiene nada escrito sale el mensaje escrito con el echo y la variable "validar" es falsa.
     /*   if($this->rpass == ''){ 
            echo "Falta completar la contraseña. <br>"; 
            $validar = FALSE;     
        } 
        if($this->rrpass == '' or $this->rrpass != $this->rpass){ 
            echo "Falta repetir la contraseña o es inválida. <br>"; 
            $validar = FALSE;     
        } */
//Si la variable "rpass" no tiene nada escrito o la variable "rrpass" no es igual a la variable "rpass" sale el mensaje puesto en el echo y la variable "validar" es falsa.
    /*    if(!preg_match('/^[^@]+@[a-zA-Z0-9._-]+.[a-zA-Z]+$/', $this->remail)){ 
            echo "El email es inválido. <br>"; 
            $validar = FALSE;     
        } */
//Si la variable "remáis" no contiene un punto y un arroba sale el mensaje puesto en el echo y la variable "validar" es falsa.
        if($this->nombreBenef1 == ''){ 
            echo "Falta completar el nombre. <br>"; 
            $validar = FALSE;     
        } 
		/*
        if($this->rapellido == ''){ 
            echo "Falta completar el apellido. <br>"; 
            $validar = FALSE;     
        } 
        if($this->rsexo == ''){ 
            echo "Falta completar el sexo. <br>"; 
            $validar = FALSE;     
        } */
        if($validar == TRUE){ 
        //si se validó todo el formulario pasamos a registrarlo en la BD. 
	
$con = mysql_connect("localhost","root","nidia");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("personas", $con);
  

$id_persona = 1;

// Se reciben los valores del Beneficiario 1
$id_beneficiario1 = 1;
$nombre1 = $_POST['nombreBenef1'];
$aPaterno1 = $_POST['aPatBenef1'];
$aMaterno1 = $_POST['aMatBenef1'];
$parentesco1 = $_POST['parenBenef1'];
$fechaNac1 = $_POST['fecNacBenef1'];
$porcentaje1 = $_POST['porcentajeBenef1'];
$domicilio1 = $_POST['dirBenef1'].' '.$_POST['colBenef1'].' '.$_POST['delBenef1'].' '.$_POST['cpBenef1'];

// Se reciben los valores del Beneficiario 2
/*
$id_beneficiario2 = 2;
$nombre2 = $_POST['nombreBenef2'];
$aPaterno2 = $_POST['aPatBenef2'];
$aMaterno2 = $_POST['aMatBenef2'];
$parentesco2 = $_POST['parenBenef2'];
$fechaNac2 = $_POST['fecNacBenef2'];
$porcentaje2 = $_POST['porcentajeBenef2'];
$domicilio2 = $_POST['dirBenef2'].' '.$_POST['colBenef2'].' '.$_POST['delBenef2'].' '.$_POST['cpBenef2'];*/




  
$sql="INSERT INTO Beneficiario (id_persona, id_beneficiario, nombre, aPaterno, aMaterno,
        parentesco, fechaNac, porcentaje, domicilio, USUARIO_MODIFICO, ULTIMA_MODIFICACION)
VALUES
($id_persona,$id_beneficiario1,'$nombre1','$aPaterno1','$aMaterno1' , '$parentesco1' , '$fechaNac1', $porcentaje1, '$domicilio1','USER' ,CURDATE() )";

echo "1 record added";


if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  
  

mysql_close($con);

		
		
        } 
    } 
} 
} 
?> 