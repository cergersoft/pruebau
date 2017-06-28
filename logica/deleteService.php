<?php


require 'database.php';

$id = $_GET["delete"];
  
    $delete = "DELETE FROM `service` WHERE service_id ='$id' ";
    $eliminar = mysqli_query($conexion, $delete);
    
    header("Location: ../admin/service.php");
            


?>