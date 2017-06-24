
<?php

session_start();

if(!isset($_SESSION["session_username"])) {

    header("location:../");

} else {

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Estructuras Metalicas Alzate</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset3.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">

  
  <link rel="shortcut icon" href="images/favicon.ico">
</head><!--/head-->

<body>

  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->

  <header id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
     

    </div><!--/#home-slider-->
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./clientes.php">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="scroll active"><a href="./clientes.php">Inicio</a></li>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
 

 <div >
	<div class="container">
		<p class="close-folio-item" href="#"></p>

<?php
  require 'logica/database.php';
  $view =$_GET['view'];

$sql="SELECT * FROM `banner` WHERE `banner_id` = '$view'  ";
$re=mysqli_query($conexion, $sql) or die (mysql_error());

  while ($row=mysqli_fetch_array($re,MYSQLI_ASSOC)){ ?>
		<img class="img-responsive" src="images/slider/<?php echo $row['banner_img'];?>" />
    <hr>
		<div class="row">
			<div class="col-sm-9">
				<div class="project-info">
					<h2><?php echo $row['banner_titulo'];?></h2>
					<h3><?php echo $row['banner_descripcion'];?></h3>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="project-details">
					<h2>Precio</h2>
					<h2>$ <?php echo number_format($row['banner_precio'], 0, '.', ' ');?></h2>
				</div>
			</div>
		</div>

<?php } ?>

	</div>
</div>

<hr>


  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href="./clientes.php"><img class="img-responsive" src="images/logo.png" alt=""></a> 
        </div>
        <div class="social-icons">
          <ul>

            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>&copy; 2016 CergerSoft.</p>
          </div>
          <div class="col-sm-6">
            <p class="pull-right">Designed by <a href="http://www.themeum.com/">Themeum</a> - Oxygen Theme</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

</body>
</html>


<?php



}



?>

