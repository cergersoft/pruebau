<?php

// requerir la base de datos 
include 'database.php';
include 'generador/generador.php';
// entrada de datos 

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$cedula = $_POST["cedula"];
$usuario = $_POST["usuario"];
$correo = $_POST["correo"];
$password = $_POST["password"];
$entidad = $_POST["entidad"];
$phone = $_POST["phone"];

$status = 0;

$createAt = date("Y-m-d");
$definicion = "ROLE_USER";
$encripter =md5("$password");
    
$generador = generarCodigo(6);

// sentencia de consultas

$register = "INSERT INTO `user`(`user_nombre`, `user_apellido`, `user_cedula`, `user_correo`, `user_usuario`, `user_telefono`, `password`, `user_entidad`, `user_createat`, `user_active`, `user_role`, `user_pago`) VALUES ('$nombre', '$apellido', '$cedula', '$correo', '$usuario', '$phone', '$encripter', '$entidad', '$createAt', '$status', '$definicion', '$generador');";

////////////////////////////////       validacion de repetidos     ////////////////////////////////////////////
$verificar_datos = mysqli_query($conexion, "SELECT * FROM `user` WHERE user_cedula = '$cedula' OR user_correo = '$correo' OR user_usuario = '$usuario'");

if (mysqli_num_rows($verificar_datos) > 0){
        echo '
            <script>
                alert("Atencion, datos ya existentes, por favor verificar");
                self.location = "../login/register.php"
            </script>';
        exit;
} else {
////////////////////////////////       validacion de repetidos     ////////////////////////////////////////////


$resultado = mysqli_query($conexion,$register);

if(!$resultado){
    
    echo '
            <script>
                alert("Atencion, Error al registrar, por favor verificar");
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