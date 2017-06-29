<?php 
$archivo = "txtvisitas/contador2.txt";
 
    if(!file_exists($archivo)){
         
     $file = fopen($archivo, "w"); 
     $grabar = fwrite($file, 0);
         
      fclose($file);  
    }
    $file = fopen($archivo, "r");
$contador = fread($file, filesize($archivo));
fclose($file);
$file = fopen($archivo, "w"); 
$contador = $contador + 1;
$grabar = fwrite($file, $contador);
fclose($file);
 
date_default_timezone_set('America/Mexico_City');
$fecha_ingre = date("Y-m-d");

 
?>