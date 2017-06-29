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
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                    <?php

                        include ("../logica/database.php");

                          $consulta="SELECT * FROM `message` WHERE `message_status` = 'noleido' ";
                          $hacerConsulta=mysqli_query($conexion,$consulta);
                          $numeroDeCitasDelDia=mysqli_num_rows($hacerConsulta);

                    ?>
                                    <?php echo $numeroDeCitasDelDia; ?></div>
                                    <div>Nuevos Mensajes</div>
                                </div>
                            </div>
                        </div>
                        <a href="message.php">
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
                                    <div class="huge">
                    <?php

                        include ("../logica/database.php");

                          $consulta="SELECT * FROM `user` WHERE `user_entidad` = 'cliente' and user_role = 'ROLE_USER' ";
                          $hacerConsulta=mysqli_query($conexion,$consulta);
                          $numeroDeCitasDelDia=mysqli_num_rows($hacerConsulta);

                    ?>
                                    <?php echo $numeroDeCitasDelDia; ?></div>
                                    <div>Cliente</div>
                                </div>
                            </div>
                        </div>
                        <a href="clientes.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Clientes</span>
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
                                    <i class="fa fa-university fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                    <?php

                        include ("../logica/database.php");

                          $consulta="SELECT * FROM `user` WHERE `user_entidad` = 'empresa' ";
                          $hacerConsulta=mysqli_query($conexion,$consulta);
                          $numeroDeCitasDelDia=mysqli_num_rows($hacerConsulta);

                    ?>
                                    <?php echo $numeroDeCitasDelDia; ?></div>
                                    <div>Empresa</div>
                                </div>
                            </div>
                        </div>
                        <a href="empresa.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Empresas</span>
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
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                    <?php

                        include ("../logica/database.php");
                            $estado = 0;
                          $consulta="SELECT * FROM `cart` WHERE `cart_active` = '$estado' ";
                          $hacerConsulta=mysqli_query($conexion,$consulta);
                          $numeroDeCitasDelDia=mysqli_num_rows($hacerConsulta);

                    ?>
                                    <?php echo $numeroDeCitasDelDia; ?></div>
                                    <div>Nueva Orden Compra</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Compras</span>
                                <span class="pull-right"></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabla de Pagos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><center>Cliente</center></th>
                                        <th><center>Entidad</center></th>
                                        <th><center>cedula o Nit</center></th>
                                        <th><center>Telefono</center></th>
                                        <th><center>Ref Pago</center></th>
                                        <th><center>Fecha</center></th>
                                        <th><center>Pago</center></th>
                                        <th><center>valor</center></th>
                                    </tr>
                                </thead>
                                <tbody>

                          <?php
                            require '../logica/database.php';
                            $user ="ROLE_USER";
                            $empresa = "empresa";
                            $entidad = "SELECT * FROM `cart` JOIN `user` WHERE cart.user_id = user.user_id ";
                            $re=mysqli_query($conexion,$entidad) or die (mysql_error());

                            while ($row=mysqli_fetch_array($re)){ ?>
                                    <tr >
                                        <td><center><?php echo $row['user_nombre'];?> <?php echo $row['user_apellido'];?></center></td>
                                        <td><center><?php echo $row['user_entidad'];?></center></td>
                                        <td><center><?php echo $row['user_cedula'];?></center></td>
                                        <td><center><?php echo $row['user_telefono'];?></center></td>
                                        <td><center><?php echo $row['user_pago'];?></center></td>
                                        <td><center><?php echo $row['cart_fecha'];?></center></td>
                                        <td><center> <a href="../logica/pagos.php?pago=<?php echo $row['cart_id'];?>">
                                        <?php if ($row['cart_active'] == 1){
                                                 echo '<span class="glyphicon glyphicon-ok text-success"> Pagado</span>';
                                                } elseif ($row['cart_active'] == 0){
                                                 echo '<span class="glyphicon glyphicon-time text-danger"> Pendiente</span>';
                                                };?> </a>
                                        </center></td>

                                        <td>
                                            <center>
                                                <label> <?php echo number_format($row['cart_total'], 0, ',', ' ');?></label>
                                            </center>
                                        </td>
                                        
                                    </tr>
                             <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->

                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

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

    <!-- DataTables JavaScript -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="./vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="./vendor/modal_ajax.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>




<?php
     
}