
<?php 
function AbrirConexion($bd)
{ 
   if (!($link=mysql_connect("localhost","nidiakaren","nidia123"))) 
   { 
      echo "Error al intentar acceder al MDB"; 
      exit(); 
   } 
   if (!mysql_select_db($bd,$link)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   return $link; 
} 



function CerrarConexion($link)
{ 
	mysql_close($link); //cierra la conexion
}
?>