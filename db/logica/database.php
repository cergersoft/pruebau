<?php

$server = "sql104.eshost.com.ar";
$user = "eshos_18419746";
$pass = "geraldin";
$db = "eshos_18419746_talleruni";

// conexion

$conexion = mysqli_connect($server, $user, $pass, $db);

    if(!$conexion){
        
        echo "error en la conexion - revise su conexion";
        
    } //else {
        
        //echo "conexion exitosa";
    //}


?>