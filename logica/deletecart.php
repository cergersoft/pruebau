<?php


require 'database.php';

$id = $_GET["delete"];
$delete = "DELETE FROM `addcart` WHERE addcart_id ='$id' ";
$eliminar = mysqli_query($conexion, $delete);

    header("Location: ../viewcart.php");

/////////// limpiar carrito de compras /////////


$limpiar = $_GET["borrar"];
$delete = "DELETE FROM `addcart` WHERE user_id ='$limpiar' ";
$eliminar = mysqli_query($conexion, $delete);



?>
