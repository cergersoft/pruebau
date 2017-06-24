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
      <div class="carousel-inner">

        <div class="item active" style="background-image: url(images/slider/1.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Estructuras Metalicas Alzate</h1>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Bienvenido</a>
           </div>
        </div>

        <?php
          require 'logica/database.php';
          $active ="activo";
          $banner = "banner";
          $ambos = "ambos";
          
          $banner="SELECT * FROM `banner` WHERE `banner_active` = '$active' AND banner_status = '$banner' OR banner_status = '$ambos' ORDER BY banner_id ";
          $re=mysqli_query($conexion, $banner) or die (mysql_error());

        while ($row=mysqli_fetch_array($re,MYSQLI_ASSOC)){ ?>

        <div class="item" style="background-image: url(images/slider/<?php echo $row['banner_img'];?>)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig"><?php echo $row['banner_titulo'];?></h1>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Bienvenido</a>
          </div>
        </div>
<?php } ?>

      </div>
      <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

      <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>

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
          <a class="navbar-brand" href="./">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="scroll active"><a href="#home">Inicio</a></li>
            <li class="scroll"><a href="#services">Servicios</a></li>
            <li class="scroll"><a href="#portfolio">Portafolio</a></li>
            <li class="scroll"><a href="#team">Conocenos</a></li>
           <li class="scroll"><a href="#pricing">Planes</a></li>
            <li class="scroll"><a href="#contact">Contacto</a></li>
            <li class="scroll"><a href="logica/cerrar_sesion.php">Salir</a></li>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h2>Servicios</h2>
            <p>Brindamos amplia variedad de diseños y herramientas que hacen de sus proyectos
               unicos y satisfacciendo sus nesecidades</p>
            
          </div>
        </div>
      </div>
      <div class="text-center our-services">
        <div class="row">
        
        <?php
          require 'logica/database.php';
          $active =1;
          
          $banner="SELECT * FROM `service` WHERE `service_active` = '$active' ORDER BY service_id ";
          $re=mysqli_query($conexion, $banner) or die (mysql_error());

        while ($row=mysqli_fetch_array($re,MYSQLI_ASSOC)){ ?>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="service-icon">
              <i class="fa fa-<?php echo $row['service_icon'];?>"></i>
            </div>
            <div class="service-info">
              <h3><?php echo $row['service_titulo'];?></h3>
              <p><?php echo $row['service_descripcion'];?></p>
            </div>
          </div>
          
    <?php } ?>

        </div>
      </div>
    </div>
  </section><!--/#services-->

<!-- galeria de fotos -->
  <section id="portfolio">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>Galeria de Fotos</h2>
          <p>Te mostramos todo lo que tenemos para brindarte para que tus proyectos sean unicos y originales</p>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">

<!-- codigo de cada imagen -->

<?php
  require 'logica/database.php';
  $active ="activo";
  $anuncio = "anuncio";
  $ambos = "ambos";

$sql="SELECT * FROM `banner` WHERE `banner_active` = '$active' AND banner_status = '$anuncio' OR banner_status = '$ambos' ";
$re=mysqli_query($conexion, $sql) or die (mysql_error());

  while ($row=mysqli_fetch_array($re,MYSQLI_ASSOC)){ ?>

        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/slider/<?php echo $row['banner_img'];?>" width="200px" height="200px">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3><?php echo $row['banner_titulo'];?></h3>
                    <p>$ <?php echo number_format($row['banner_precio'], 0, ',', ' ');?></p>
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a href="detalleslogin.php?view=<?php echo $row['banner_id'];?>" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/slider/<?php echo $row['banner_img'];?>" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php } ?>
<!-- codigo de cada imagen -->

      </div>
    </div>

  </section><!--/#portfolio-->

  <section id="team">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-10 col-sm-offset-1 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>The Team</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
        
        <hr />
        <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="service-icon">
              <i class="fa fa-line-chart"></i>
            </div>
            <div class="service-info">
              <h3>Mision</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
            </div>
          </div>
          
        <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="service-icon">
              <i class="fa fa-eye"></i>
            </div>
            <div class="service-info">
              <h3>Vision</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
            </div>
          </div>
          
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="service-icon">
              <i class="fa fa-bullseye"></i>
            </div>
            <div class="service-info">
              <h3>Objetivo</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
            </div>
          </div>
        
        
        </div>
      </div>
      <div class="team-members">
        <div class="row">
        
          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="member-image">
                <img class="img-responsive" src="images/team/1.jpg" alt="">
              </div>
              <div class="member-info">
                <h3>Marian Dixon</h3>
                <h4>CEO &amp; Founder</h4>
                <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
              </div>
              <div class="social-icons">
                <ul>
                  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          
        
        </div>
      </div>
    </div>
  </section><!--/#team-->

 <section id="pricing">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>Pricing Table</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
        </div>
      </div>
      
      <div class="pricing-table">
        <div class="row">
         
          <div class="col-sm-3">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
              <h3>Basic</h3>
              <div class="price">
                $9<span>/Month</span>
              </div>
              <ul>
                <li>Free Setup</li>
                <li>10GB Storage</li>
                <li>100GB Bandwith</li>
                <li>5 Products</li>
              </ul>
              <a href="login/register.php" class="btn btn-lg btn-primary">Sign up</a>
            </div>
          </div>
          
          
        </div>
      </div>
    </div>
  </section><!--/#pricing-->

<section id="contact">

    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Formulario de Contacto</h2>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post" action="#">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Nombe" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Correo Electronico" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="subject" class="form-control" placeholder="Asunto" required="required">
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="Escribe tu mensaje" required="required"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn-submit">Enviar</button>
                </div>
              </form>
            </div>
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> Direccion:</span> 2400 South Avenue A </li>
                  <li><i class="fa fa-phone"></i> <span> Celeular:</span> +928 336 2000  </li>
                  <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:someone@yoursite.com"> support@oxygen.com</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#contact-->
  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href="./"><img class="img-responsive" src="images/logo.png" alt=""></a>
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

