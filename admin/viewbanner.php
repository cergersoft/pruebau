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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $_SESSION['session_username'];?></title>
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                <?php if ($_SESSION['user_suadmin'] == "ROLE_SUADMIN"){
                    echo "SUPER ADMINISTRADOR";
                };?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">

        <?php
            require '../logica/connection.php';
            $re=mysql_query("SELECT * FROM `message` where `message_status` = 'noleido' ") or die (mysql_error());

            while ($row=mysql_fetch_array($re,MYSQLI_ASSOC)){ ?>
                        <li>
                            <a href="JavaScript:void(0)" data-toggle="modal" data-target="#modal" onclick="modal_ajax('<?php echo $row['message_id'];?>','modal','message_modal.php')">
                                <div>
                                    <strong><?php echo $row['message_nombre'];?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?php echo $row['message_date'];?></em>
                                    </span>
                                </div>
                                <div><?php echo $row['message_asunto'];?></div>
                            </a>
                        </li>
                        <li class="divider"></li>

        <?php } ?>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $_SESSION['session_username'];?> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="../logica/cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        

                        <li>
                            <a href="./"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="clientes.php"><i class="fa fa-user fa-fw"></i> Clientes</a>
                        </li>
                        <li>
                            <a href="empresa.php"><i class="fa fa-university fa-fw"></i> Empresas</a>
                        </li>
                        <li>
                            <a href="banner.php"><i class="fa fa-paperclip fa-fw"></i> Publicar Anuncios</a>
                        </li>
                        <li>
                            <a href="adminbanner.php"><i class="fa fa-paperclip fa-fw"></i> Administrar Anuncios</a>
                        </li>
                        <li>
                            <a href="message.php"><i class="fa fa-envelope fa-fw"></i> Mensajes</a>
                        </li>
                        <li>
                            <a href="service.php"><i class="fa fa-cog fa-fw"></i> Servicios</a>
                        </li>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

<!-- panel de vision -->
   
   
   <div id="page-wrapper">
            
               
  <?php
       require '../logica/database.php';
       $id = $_GET["view"];
       $ver= "SELECT * FROM `banner` WHERE `banner_id` = '$id' ";
       $re=mysqli_query($conexion,$ver) or die (mysql_error());

       while ($row=mysqli_fetch_array($re,MYSQLI_ASSOC)){ ?>
          <div class="row">     
                <div class="col-lg-12">
                    <h1 class="page-header">Ficha Banner</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <label for="">Titulo:</label> <?php echo $row['banner_titulo'];?>
                        </div>
                        <div class="panel-body">
                           
                            <div class="col-lg-4">
                               <label for="">Foto Anuncio</label>
                                <img src="../images/slider/<?php echo $row['banner_img'];?>" width="150px" height="120px">
                            </div>
                            <div class="col-lg-4">
                            <label for="">Descripcion</label>
                            <p><?php echo $row['banner_descripcion'];?></p>
                            
                        </div>
                        <div class="col-lg-4">
                            
                            <label for="">Precio Producto</label>
                            <p>$ <?php echo $row['banner_precio'];?></p>
                            <label for="">Estado Del producto</label>
                            <p>
                            
                            <?php if ($row['banner_active'] == 1){
                              echo '<span class="glyphicon glyphicon-ok text-success"> Activo</span>';
                              } elseif ($row['banner_active'] == 0){
                              echo '<span class="glyphicon glyphicon-time text-danger"> Pendiente</span>';
                            };?>
                            
                            </p>
                            
                            <label for="">Tipo de Publicacion</label>
                            <p><?php 
                                  if ($row['banner_status'] == 'ambos'){
                                     echo 'Banner / Anuncio';
                                  } elseif ($row['banner_status'] == 'anuncio'){
                                     echo 'Anuncio';
                                  } elseif ($row['banner_status'] == 'banner'){
                                     echo 'Banner'; 
                                  };?> </p>
                            
                        </div>
                        </div>
                        <div class="panel-footer">
                           <div style="margin-left:75%;">
                               <a href="#" type="submit" class="btn btn-info">Editar</a>
                               <a href="../logica/deleteBanner.php?delete=<?php echo $row['banner_id'];?>" type="submit" class="btn btn-danger">Borrar</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <div class="col-lg-2"></div>
                
            <!-- /.row -->
        </div>
<?php } ?>
        </div>
        <!-- /#page-wrapper -->
    
    
<!-- panel de vision -->
    </div>
    <!-- /#wrapper -->
   <!-- //////////// modal ////////// -->

<div class="modal fade" id="modal" role="dialog">
    
  </div>

<!-- //////////// modal ////////// -->
    <!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>
    
    <script src="./vendor/modal_ajax.js"></script>

</body>

</html>


<?php

}

?>
