<?php

// requerir la base de datos 
include 'database.php';

// entrada de datos 

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$cedula = $_POST["cedula"];
$usuario = $_POST["usuario"];
$correo = $_POST["correo"];
$password = $_POST["password"];
$entidad = $_POST["entidad"];

$status = 0;

$createAt = date("Y-m-d");

$encripter =md5("$password");
    
$ip = $_SERVER["REMOTE_ADDR"];

// sentencia de consultas

$register = "INSERT INTO `user`(`user_nombre`, `user_apellido`, `user_cedula`, `user_correo`, `user_usuario`, `password`, `user_entidad`, `user_createat`, `user_active`, `user_ip`) VALUES ('$nombre', '$apellido', '$cedula', '$correo', '$usuario', '$encripter', '$entidad', '$createAt', '$status', '$ip');";

$verificar_datos = mysqli_query($conexion, "SELECT * FROM `user` WHERE user_cedula = '$cedula' OR user_correo = '$correo' OR user_usuario = '$usuario'");

if (mysqli_num_rows($verificar_datos) > 0){
        echo '
            <script>
                alert("Atencion, datos ya existentes, por favor verificar");
                self.location = "../login/register.php"
            </script>';
        exit;
} else {

$resultado = mysqli_query($conexion, $register);

if(!$resultado){
    
    echo '
            <script>
                alert("Atencion, al registrar, por favor verificar");
                self.location = "../login/register.php"
            </script>';
    
} else {
    
    echo '
            <script>
                alert("Registro exitoso");
                self.location = "../"
            </script>';
    
}

}
    
mysqli_close($conexion);


?>