<?php 

include 'database.php';


//recibiendo post

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$createAt = date("Y-m-d");

$ip = $_SERVER["REMOTE_ADDR"];

$insert ="INSERT INTO `message`(`message_nombre`, `message_correo`, `message_asunto`, `message_descripcion`, `message_date`, `message_ip`) VALUES ('$name', '$email', '$subject', '$message', '$createAt', '$ip')";

$query =mysqli_query($conexion,$insert);

if(!$query){
    
    echo '
            <script>
                alert("Atencion, Erro al enviar, ");
                self.location = "../"
            </script>';
    
} else {
    
    echo '
            <script>
                alert("envio exitoso");
                self.location = "../"
            </script>';
    
}

 ?>