<?php


require 'database.php';

$id = $_GET["pago"];
$active = 1;

   $upgrade = "UPDATE `cart` SET `cart_active`='$active' WHERE  cart_id ='$id' ";
   $eliminar = mysqli_query($conexion, $upgrade);
    
    header("Location: ../admin/");
            


?>