<?php
function ValidarPorcentaje($porcntje1, $porcntje12, $porcntje3)
{ 
  $prcntjeTotal = $porcntje1+ $porcntje12+ $porcntje3;
  if ( $prcntjeTotal  != 100){
  
  echo "La suma de los porcentajes debe ser = 100"; 
      exit(); 
  }
  
  
   return $prcntjeTotal; 
} 

?>