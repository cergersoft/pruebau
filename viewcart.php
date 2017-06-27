
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
            <li class="scroll"><a href="./clientes.php">Inicio</a></li>

            <?php

              include ("logica/database.php");
              $userid = $_SESSION['user_id'];
              $consulta="SELECT * FROM `addcart` WHERE `user_id` = '$userid' ";
              $hacerConsulta=mysqli_query($conexion,$consulta);
              $shoppinin=mysqli_num_rows($hacerConsulta);

            ?>
            <li class="scroll active"><a href="viewcart.php"><i class="fa fa-shopping-cart"></i> <?php echo $shoppinin; ?></a></li>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
 

 <div >
	<div class="container table-responsive">
		<p class="close-folio-item" ></p>

<h1>Carrito de compra</h1>
<hr>

<table class="table table-striped">
  
  <thead>
    <tr>
      <th><center> Codigo </center></th>
      <th><center> Foto </center></th>
      <th><center> Nombre </center></th>
      <th><center> Valor Unitario </center></th>
      <th><center> Cantidad </center></th>
      <th><center> Valor Total </center></th>
    </tr>
  </thead>

<tbody>

<?php
  require 'logica/database.php';
  $user =$_SESSION['user_id'];

$sql="SELECT * FROM `addcart` JOIN banner WHERE addcart.banner_id = banner.banner_id and addcart.user_id = '$user' ";
$re=mysqli_query($conexion, $sql) or die (mysql_error());

  while ($row=mysqli_fetch_array($re,MYSQLI_ASSOC)){ ?>

    <tr>
      <td><center> <?php echo $row['banner_id'];?> </center></td>
      <td><center> <img src="images/slider/<?php echo $row['banner_img'];?>" width="80px" height="80px"> </center></td>
      <td><center> <?php echo $row['banner_titulo'];?> </center></td>
      <td><center> <?php echo $row['banner_precio'];?> </center></td>
      <td><center> <?php echo $row['addcart_cant'];?> </center></td>
      <td><center><input type="text" class="importe_linea" value="<?php echo $row['addcart_valor'];?>"/>  </center></td>
    </tr>

<?php } ?>
  </tbody>

  <td><input type="button" value="Calcular" onclick="calcular_total()"/> </td>
      <td>
        
        <form action="logica/pagarcart.php" method="post">
        
        <?php
          require 'logica/database.php';
          $user =$_SESSION['user_id'];
          $sql="SELECT * FROM `addcart` JOIN banner WHERE addcart.banner_id = banner.banner_id and addcart.user_id = '$user' ";
          $re=mysqli_query($conexion, $sql) or die (mysql_error());
          while ($row=mysqli_fetch_array($re,MYSQLI_ASSOC)){ ?>
          
          <input type="hidden" name="bannerid" value="<?php echo $row['banner_id'];?>">
          <input type="hidden" name="bannerimg" value="<?php echo $row['banner_img'];?>">
          <input type="hidden" name="bannertitulo" value="<?php echo $row['banner_titulo'];?>">
          <input type="hidden" name="bannerprecio" value="<?php echo $row['banner_precio'];?>">
          <input type="hidden" name="cartcant" value="<?php echo $row['addcart_cant'];?>">
          <input type="hidden" name="cartvalor" value="<?php echo $row['addcart_valor'];?>">
        <?php } ?>
        <label for="total">Total: <input type="text" name="total" id="total" value="0"/>
        <input type="text" name="factura" placeholder="cod factura">
        <input type="hidden" name="user" value="<?php echo $_SESSION['user_id'];?>">
          
          <button class="btn btn-primary"><i class="fa fa-shopping-cart"></i> pagar</button>
        </form>

      </td>

</table>

<hr>




  


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
  <script type="text/javascript" src="js/calcular.js"></script>

</body>
</html>


<?php



}



?>

