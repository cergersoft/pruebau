<?php 

include 'database.php';

////////////////////// contador ////////////////////////
$archivo = "generador/txtvisitas/contador2.txt";
 
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
////////////////////// contador ////////////////////////


$bannerid = $_POST['bannerid'];
$bannertitulo = $_POST['bannertitulo'];
$bannerprecio = $_POST['bannerprecio'];
$cartcant= $_POST['cartcant'];
$cartvalor = $_POST['cartvalor'];
$total= $_POST['total'];
$user = $_POST['user'];
$userpago = $_POST['userpago'];

date_default_timezone_set('America/Mexico_City');
$pago = date('Y-m-d H:m:s');

$facturaNro = "0000".$contador;

$register = "INSERT INTO `registercart`(`register__bid`, `register_titulo`, `register_precio`, `register_cant`, `register_cartvalor`, `register_total`, `register_user`, `register_userpago`, `register_factura`, `register_fecha`) VALUES ('$bannerid', '$bannertitulo', '$bannerprecio', '$cartcant, '$cartvalor', '$total', '$user', '$userpago', '$$facturaNro', '$pago');";
mysqli_query($conexion, $register);



mysqli_close($conexion);

 ?>