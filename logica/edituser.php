<?php
 include "database.php";
if ($_POST['password']=="") {
 
   $update ="UPDATE `user` SET `user_nombre`='".$_POST['nombre']."',`user_apellido`='".$_POST['apellido']."',`user_cedula`='".$_POST['cedula']."',`user_correo`='".$_POST['correo']."',`user_usuario`='".$_POST['usuario']."',`user_telefono`='".$_POST['telefono']."',`user_entidad`='".$_POST['entidad']."',`user_createat`='".$_POST['creado']."',`user_active`='".$_POST['estado']."' WHERE user_id = '".$_POST['id']."';";
   mysqli_query($conexion,$update);
 
 
 } else {   
  
  $password = $_POST['password'];
   $encripter =md5("$password");

  $update ="UPDATE `user` SET `user_nombre`='".$_POST['nombre']."',`user_apellido`='".$_POST['apellido']."',`user_cedula`='".$_POST['cedula']."',`user_correo`='".$_POST['correo']."',`user_usuario`='".$_POST['usuario']."',`user_telefono`='".$_POST['telefono']."',`password`='$encripter',`user_entidad`='".$_POST['entidad']."',`user_createat`='".$_POST['creado']."',`user_active`='".$_POST['estado']."' WHERE user_id = '".$_POST['id']."';";
   mysqli_query($conexion,$update);  
 }
header("Location: ../admin/clientes.php");
?>