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



    <!-- Bootstrap Core CSS -->

    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <!-- MetisMenu CSS -->

    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">



    <!-- Custom CSS -->

    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">



    <!-- Morris Charts CSS -->

    <link href="./vendor/morrisjs/morris.css" rel="stylesheet">



    <!-- Custom Fonts -->

    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">





</head>



<body>



    <div id="wrapper">

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
                            <a href="vermessage.php?view=<?php echo $row['message_id'];?>">
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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
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
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
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



        <div id="page-wrapper">

            <div class="row">

                <div class="col-lg-12">

                    <h1 class="page-header">Dashboard</h1>

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

            <div class="row">



                <div class="col-lg-3 col-md-6">

                    <div class="panel panel-primary">

                        <div class="panel-heading">

                            <div class="row">

                                <div class="col-xs-3">

                                    <i class="fa fa-comments fa-5x"></i>

                                </div>

                                <div class="col-xs-9 text-right">

                                    <div class="huge">26</div>

                                    <div>Nuevos Mensajes</div>

                                </div>

                            </div>

                        </div>

                        <a href="taller_alzatenew/login/register.php">

                            <div class="panel-footer">

                                <span class="pull-left">Ver Mensajes</span>

                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>

                            </div>

                        </a>

                    </div>

                </div>



                <div class="col-lg-3 col-md-6">

                    <div class="panel panel-green">

                        <div class="panel-heading">

                            <div class="row">

                                <div class="col-xs-3">

                                    <i class="fa fa-user fa-5x"></i>

                                </div>

                                <div class="col-xs-9 text-right">

                                    <div class="huge">12</div>

                                    <div>Nuevos Usuario</div>

                                </div>

                            </div>

                        </div>

                        <a href="#">

                            <div class="panel-footer">

                                <span class="pull-left">Ver Usuarios</span>

                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="panel panel-yellow">

                        <div class="panel-heading">

                            <div class="row">

                                <div class="col-xs-3">

                                    <i class="fa fa-shopping-cart fa-5x"></i>

                                </div>

                                <div class="col-xs-9 text-right">

                                    <div class="huge">124</div>

                                    <div>Nueva Compra</div>

                                </div>

                            </div>

                        </div>

                        <a href="#">

                            <div class="panel-footer">

                                <span class="pull-left">Ver Compras</span>

                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="panel panel-red">

                        <div class="panel-heading">

                            <div class="row">

                                <div class="col-xs-3">

                                    <i class="fa fa-money fa-5x"></i>

                                </div>

                                <div class="col-xs-9 text-right">

                                    <div class="huge">13</div>

                                    <div>Nuevos Pedidos</div>

                                </div>

                            </div>

                        </div>

                        <a href="#">

                            <div class="panel-footer">

                                <span class="pull-left">Ver Pedidos</span>

                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

            <!-- /.row -->

            <div class="row">

                <div class="col-lg-8">



                    <!-- /.panel -->

                    <div class="panel panel-default">



                        <div class="panel-heading">

                            <i class="fa fa-money fa-fw"></i> Panel Pagos



                        </div>



                        <!-- /.panel-heading -->

                        <div class="panel-body">

                            <div class="row">



                                    <div class="table-responsive">

                                        <table class="table table-bordered table-hover table-striped">

                                            <thead>

                                                <tr>

                                                    <th>#</th>

                                                    <th>Date</th>

                                                    <th>Time</th>

                                                    <th>Amount</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <tr>

                                                    <td>3326</td>

                                                    <td>10/21/2013</td>

                                                    <td>3:29 PM</td>

                                                    <td>$321.33</td>

                                                </tr>

                                                <tr>

                                                    <td>3325</td>

                                                    <td>10/21/2013</td>

                                                    <td>3:20 PM</td>

                                                    <td>$234.34</td>

                                                </tr>

                                                <tr>

                                                    <td>3324</td>

                                                    <td>10/21/2013</td>

                                                    <td>3:03 PM</td>

                                                    <td>$724.17</td>

                                                </tr>

                                                <tr>

                                                    <td>3323</td>

                                                    <td>10/21/2013</td>

                                                    <td>3:00 PM</td>

                                                    <td>$23.71</td>

                                                </tr>

                                                <tr>

                                                    <td>3322</td>

                                                    <td>10/21/2013</td>

                                                    <td>2:49 PM</td>

                                                    <td>$8345.23</td>

                                                </tr>

                                                <tr>

                                                    <td>3321</td>

                                                    <td>10/21/2013</td>

                                                    <td>2:23 PM</td>

                                                    <td>$245.12</td>

                                                </tr>

                                                <tr>

                                                    <td>3320</td>

                                                    <td>10/21/2013</td>

                                                    <td>2:15 PM</td>

                                                    <td>$5663.54</td>

                                                </tr>

                                                <tr>

                                                    <td>3319</td>

                                                    <td>10/21/2013</td>

                                                    <td>2:13 PM</td>

                                                    <td>$943.45</td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                    <!-- /.table-responsive -->



                                <!-- /.col-lg-4 (nested) -->

                                <div class="col-lg-8">

                                    <div id="morris-bar-chart"></div>

                                </div>

                                <!-- /.col-lg-8 (nested) -->

                            </div>

                            <!-- /.row -->

                        </div>

                        <!-- /.panel-body -->

                    </div>

                    <!-- /.panel -->

                </div>

                <!-- /.col-lg-8 -->

                <div class="col-lg-4">

                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <i class="fa fa-bell fa-fw"></i> Panel de Notificaciones

                        </div>

                        <!-- /.panel-heading -->

                        <div class="panel-body">

                            <div class="list-group">

                                <a href="#" class="list-group-item">

                                    <i class="fa fa-comment fa-fw"></i> New Comment

                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>

                                    </span>

                                </a>





                                <a href="#" class="list-group-item">

                                    <i class="fa fa-user fa-fw"></i> Nuevo Clientes

                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>

                                    </span>

                                </a>

                                <a href="#" class="list-group-item">

                                    <i class="fa fa-university fa-fw"></i> Nueva Empresa

                                    <span class="pull-right text-muted small"><em>11:32 AM</em>

                                    </span>

                                </a>



                                <a href="#" class="list-group-item">

                                    <i class="fa fa-shopping-cart fa-fw"></i> Nueva Compra

                                    <span class="pull-right text-muted small"><em>9:49 AM</em>

                                    </span>

                                </a>

                                <a href="#" class="list-group-item">

                                    <i class="fa fa-money fa-fw"></i> Pedidos Online

                                    <span class="pull-right text-muted small"><em>Yesterday</em>

                                    </span>

                                </a>

                            </div>

                            <!-- /.list-group -->



                        </div>

                        <!-- /.panel-body -->

                    </div>

                    <!-- /.panel -->





                    <!-- /.panel -->

                    <div class="chat-panel panel panel-default">

                        <div class="panel-heading">

                            <i class="fa fa-comments fa-fw"></i> Chat

                            <div class="btn-group pull-right">

                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">

                                    <i class="fa fa-chevron-down"></i>

                                </button>

                                <ul class="dropdown-menu slidedown">

                                    <li>

                                        <a href="#">

                                            <i class="fa fa-refresh fa-fw"></i> Refresh

                                        </a>

                                    </li>

                                    <li>

                                        <a href="#">

                                            <i class="fa fa-check-circle fa-fw"></i> Available

                                        </a>

                                    </li>

                                    <li>

                                        <a href="#">

                                            <i class="fa fa-times fa-fw"></i> Busy

                                        </a>

                                    </li>

                                    <li>

                                        <a href="#">

                                            <i class="fa fa-clock-o fa-fw"></i> Away

                                        </a>

                                    </li>

                                    <li class="divider"></li>

                                    <li>

                                        <a href="#">

                                            <i class="fa fa-sign-out fa-fw"></i> Sign Out

                                        </a>

                                    </li>

                                </ul>

                            </div>

                        </div>

                        <!-- /.panel-heading -->

                        <div class="panel-body">

                            <ul class="chat">

                                <li class="left clearfix">

                                    <span class="chat-img pull-left">

                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />

                                    </span>

                                    <div class="chat-body clearfix">

                                        <div class="header">

                                            <strong class="primary-font">Jack Sparrow</strong>

                                            <small class="pull-right text-muted">

                                                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago

                                            </small>

                                        </div>

                                        <p>

                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.

                                        </p>

                                    </div>

                                </li>

                                <li class="right clearfix">

                                    <span class="chat-img pull-right">

                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />

                                    </span>

                                    <div class="chat-body clearfix">

                                        <div class="header">

                                            <small class=" text-muted">

                                                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>

                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>

                                        </div>

                                        <p>

                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.

                                        </p>

                                    </div>

                                </li>

                                <li class="left clearfix">

                                    <span class="chat-img pull-left">

                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />

                                    </span>

                                    <div class="chat-body clearfix">

                                        <div class="header">

                                            <strong class="primary-font">Jack Sparrow</strong>

                                            <small class="pull-right text-muted">

                                                <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>

                                        </div>

                                        <p>

                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.

                                        </p>

                                    </div>

                                </li>

                                <li class="right clearfix">

                                    <span class="chat-img pull-right">

                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />

                                    </span>

                                    <div class="chat-body clearfix">

                                        <div class="header">

                                            <small class=" text-muted">

                                                <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>

                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>

                                        </div>

                                        <p>

                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.

                                        </p>

                                    </div>

                                </li>

                            </ul>

                        </div>

                        <!-- /.panel-body -->

                        <div class="panel-footer">

                            <div class="input-group">

                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />

                                <span class="input-group-btn">

                                    <button class="btn btn-warning btn-sm" id="btn-chat">

                                        Send

                                    </button>

                                </span>

                            </div>

                        </div>

                        <!-- /.panel-footer -->

                    </div>

                    <!-- /.panel .chat-panel -->

                </div>

                <!-- /.col-lg-4 -->

            </div>

            <!-- /.row -->

        </div>

        <!-- /#page-wrapper -->



    </div>

    <!-- /#wrapper -->



    <!-- jQuery -->

    <script src="./vendor/jquery/jquery.min.js"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>



    <!-- Metis Menu Plugin JavaScript -->

    <script src="./vendor/metisMenu/metisMenu.min.js"></script>



    <!-- Morris Charts JavaScript -->

    <script src="./vendor/raphael/raphael.min.js"></script>

    <script src="./vendor/morrisjs/morris.min.js"></script>

    <script src="./data/morris-data.js"></script>



    <!-- Custom Theme JavaScript -->

    <script src="./dist/js/sb-admin-2.js"></script>



</body>



</html>





<?php



}



?>

