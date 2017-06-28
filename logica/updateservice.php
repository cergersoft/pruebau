<?php 

include 'database.php';

  $update ="UPDATE `service` SET `service_titulo`='".$_POST['titulo']."',`service_descripcion`='".$_POST['descripcion']."',`service_icon`='".$_POST['icono']."',`service_active`='".$_POST['estado']."' WHERE service_id = '".$_POST['id']."';";

   mysqli_query($conexion,$update);  

header("Location: ../admin/service.php");

 ?>