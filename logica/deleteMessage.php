<?php


require 'database.php';

$id = $_GET["delete"];
  
    $delete = "DELETE FROM `message` WHERE message_id ='$id' ";
    $eliminar = mysqli_query($conexion, $delete);
    
    header("Location: ../admin/message.php");
            


?>