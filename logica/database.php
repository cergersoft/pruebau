<?php

$server = "localhost";
$user = "root";
$pass = "geraldine2016";
$db = "pruebau";

// conexion

$conexion = mysqli_connect($server, $user, $pass, $db);

    if(!$conexion){
        
        echo "error en la conexion - revise su conexion";
        
    } //else {
        
        //echo "conexion exitosa";
    //}


?>