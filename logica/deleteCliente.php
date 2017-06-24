<?php


require 'database.php';

$id = $_GET["delete"];
  
    $delete = "DELETE FROM `user` WHERE user_id ='$id' ";
    $eliminar = mysqli_query($conexion, $delete);
    
    header("Location: ../admin/clientes.php");
            


?>