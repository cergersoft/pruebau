<?php

session_start();

include 'database.php';


$cant = $_POST['cant'];
$banner = $_POST['bannerid'];
$user = $_POST['userid'];
$precio = $_POST['precio'];

$total = $cant * $precio;


$addcart = "INSERT INTO `addcart`(`user_id`, `banner_id`, `addcart_cant`, `addcart_valor`) VALUES ('$user', '$banner', '$cant', '$total');";

$insert = mysqli_query($conexion, $addcart);

header("Location: ../clientes.php");

mysqli_close($conexion)

 ?>