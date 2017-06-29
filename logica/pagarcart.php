<?php 

session_start();

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

date_default_timezone_set('America/Mexico_City');
$pago = date('Y-m-d H:m:s');

$facturaNro = "0000".$contador;
$total= $_POST['total'];
$estado = 0;

if (count($_POST['carrito']) > 0) {

	foreach ($_POST['carrito'] as $row) {


$bannerid = $row['bannerid'];
$bannertitulo = $row['bannertitulo'];
$bannerprecio = $row['bannerprecio'];
$cartcant= $row['cartcant'];
$cartvalor = $row['cartvalor'];

$user = $row['user'];
$userpago = $row['userpago'];




$register = "INSERT INTO `registerCart`(`register_bid`, `register_titulo`, `register_precio`, `register_cant`, `register_cartvalor`, `register_total`, `register_user`, `register_userpago`, `register_factura`, `register_fecha`) VALUES ('$bannerid', '$bannertitulo', '$bannerprecio', '$cartcant', '$cartvalor', '$total', '$user', '$userpago', '$facturaNro', '$pago');";

mysqli_query($conexion, $register);




	}
}

$cart = "INSERT INTO `cart`(`user_id`, `cart_userpago`, `cart_factura`, `cart_total`, `cart_fecha`, `cart_active`) VALUES ('$user', '$userpago', '$facturaNro', '$total', '$pago', '$estado');";

 $result = mysqli_query($conexion, $cart);

if (isset($result)){

	$delete = "DELETE FROM `addcart` WHERE user_id = '$user';";
	mysqli_query($conexion, $delete);
}

if(!$delete){
    
    echo '
            <script>
                alert("Atencion, Su compra no se realizo limpiando carrito, por favor verificar");
                self.location = "../clientes.php"
            </script>';
    
} else {
    
    echo '
            <script>
                alert("Su Orden de compra se Proceso satisfactoriamente. Hemos limpiado tu carrito");
                self.location = "../viewcart.php"
            </script>';
    
}

mysqli_close($conexion);

 ?>