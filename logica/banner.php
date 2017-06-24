<?php

// requerir la base de datos
include 'database.php';

// entrada de datos

$ruta = "../images/slider/";
opendir($ruta);
$destino = $ruta.$_FILES['imagen']['name'];
copy($_FILES['imagen']['tmp_name'],$destino);
$img_banner=$_FILES['imagen']['name'];

//redimencionar imagenes

$ruta_imagen = "../images/slider/$img_banner";
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


$titulo = $_POST["titulo"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];

$status = "pendiente";
$anuncio = "pendiente";
// sentencia de consultas

$register = "INSERT INTO `banner`(`banner_titulo`, `banner_descripcion`, `banner_precio`, `banner_active`, `banner_status`, `banner_img`) VALUES ('$titulo', '$descripcion', '$precio', '$status', '$anuncio', '$img_banner');";

$resultado = mysqli_query($conexion, $register);

if(!$resultado){

    echo '
            <script>
                alert("Atencion, Error al publicar anuncio, por favor verificar");
                self.location = "../admin/banner.php"
            </script>';

} else {

    echo '
            <script>
                alert("Registro exitoso");
                self.location = "../admin/adminbanner.php"
            </script>';

}



mysqli_close($conexion);


?>
