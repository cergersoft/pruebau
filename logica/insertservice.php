<?php 

include 'database.php';

// llegada de post

$titulo = $_POST['titulo'];
$icono = $_POST['icono'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];

// realizar sentencia sql

$insert = "INSERT INTO `service`(`service_titulo`, `service_descripcion`, `service_icon`, `service_active`) VALUES ('$titulo', '$descripcion', '$icono', '$estado');";


// realizar consulta insert

mysqli_query($conexion, $insert);

header("Location: ../admin/service.php");

// cerrar conexion a base de datos

mysqli_close($conexion);

 ?>