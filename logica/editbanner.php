<?php
 include "database.php";
if ($_FILES['imagen']['name']=="") {
 
   $update ="UPDATE `banner` SET `banner_titulo`='".$_POST['titulo']."',`banner_descripcion`='".$_POST['descripcion']."',
   `banner_precio`='".$_POST['precio']."',`banner_active`='".$_POST['active']."',`banner_status`='".$_POST['Status']."' WHERE banner_id = '".$_POST['id']."';";
   mysqli_query($conexion,$update);
 
 
 } else {   
    
   $select = "select banner_img from banner WHERE banner_id = '".$_POST['id']."';";
   $re = mysqli_query($conexion, $select);
   while ($f=mysqli_fetch_array($re,MYSQLI_ASSOC)) {
     unlink("../images/slider/".$f['banner_img']);
   }
   $ruta = "../images/slider/";
   opendir($ruta);
   $destino = $ruta.$_FILES['imagen']['name'];
   copy($_FILES['imagen']['tmp_name'],$destino);
   $nombreimg=$_FILES['imagen']['name'];
   
   //redimencionar imagenes

$ruta_imagen = "../images/slider/$nombreimg";
$miniatura_ancho_maximo = 1414;
$miniatura_alto_maximo = 944;
$calidad = 90;
$info_imagen = getimagesize($ruta_imagen);
$imagen_ancho = $info_imagen[0];
$imagen_alto = $info_imagen[1];
$imagen_tipo = $info_imagen['mime'];


$proporcion_imagen = $imagen_ancho / $imagen_alto;
$proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

if ( $proporcion_imagen = $proporcion_miniatura ){
	$miniatura_ancho = $miniatura_ancho_maximo;
	$miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;

} else if ( $proporcion_imagen = $proporcion_miniatura ){
	$miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
	$miniatura_alto = $miniatura_alto_maximo;

} else {
	$miniatura_ancho = $miniatura_ancho_maximo;
	$miniatura_alto = $miniatura_alto_maximo;
}


switch ( $imagen_tipo ){
	case "image/png":
		$imagen = imagecreatefrompng( $ruta_imagen );
		break;

        case "image/jpg":
	case "image/jpeg":
		$imagen = imagecreatefromjpeg( $ruta_imagen );

		break;
	case "image/gif":
		$imagen = imagecreatefromgif( $ruta_imagen );
		break;
}

$lienzo = imagecreatetruecolor( $miniatura_ancho, $miniatura_alto );

imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho, $miniatura_alto, $imagen_ancho, $imagen_alto);

$resultado= imagejpeg($lienzo,$ruta_imagen,$calidad);
 
   $update ="UPDATE `banner` SET `banner_titulo`='".$_POST['titulo']."',`banner_descripcion`='".$_POST['descripcion']."',
   `banner_precio`='".$_POST['precio']."',`banner_active`='".$_POST['active']."',
   `banner_status`='".$_POST['Status']."',`banner_img`='".$nombreimg."' WHERE banner_id = '".$_POST['id']."';";
   mysqli_query($conexion,$update);  
 }
header("Location: ../admin/adminbanner.php");
?>