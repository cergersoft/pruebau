<?php


require 'database.php';

$id = $_GET["delete"];
  
   $select = "select banner_img from banner WHERE banner_id = '$id';";
   $re = mysqli_query($conexion, $select);
   while ($f=mysqli_fetch_array($re,MYSQLI_ASSOC)) { 
     unlink("../images/slider/".$f['banner_img']);
   }
   
    $delete = "DELETE FROM `banner` WHERE banner_id ='$id' ";
    $eliminar = mysqli_query($conexion, $delete);
    
    header("Location: ../admin/adminbanner.php");
            


?>