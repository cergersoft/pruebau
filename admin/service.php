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

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="./vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="./vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="./vendor/form1.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

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
                    <h1 class="page-header">Servicios</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Administracion de servicios <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#crearservicio">Crear Servicio</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th>icono</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                
                           <?php
                            require '../logica/database.php';
                            $message = "SELECT * FROM `service` ";
                            $re=mysqli_query($conexion,$message) or die (mysql_error());

                            while ($row=mysqli_fetch_array($re,MYSQLI_ASSOC)){ ?>
                                
                                    <tr class="odd gradeX">
                                        <td> <center> <a href="JavaScript:void(0)" data-toggle="modal" data-target="#modal" onclick="modal_ajax('<?php echo $row['service_id'];?>','modal','service_modal.php')"> <?php echo $row['service_titulo'];?> </a> </center> </td>

                                        <td> <center> <?php echo $row['service_descripcion'];?> </center> </td>

                                        <td class="center"> <center> <?php echo $row['service_icon'];?> </center> </td>

                                        <td class="center"> <center> 
                                            <?php if ($row['service_active'] == "1"){
                                                 echo '<span class="glyphicon glyphicon-ok text-success"> Activo</span>';
                                                } elseif ($row['service_active'] == "0"){
                                                 echo '<span class="glyphicon glyphicon-time text-danger"> Pendiente</span>';
                                            };?> </center> </td>

                                        <td class="center"> <center> 
                                                
                                                <a href="../logica/deleteService.php?delete=<?php echo $row['service_id'];?>" class="btn btn-danger btn-block"> eliminar </a>
                                         </center> </td>
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
                <!-- /.col-lg-12 -->
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

<!-- //////////// modal2 ////////// -->

<div class="modal fade" id="crearservicio" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Crear Servicio </h4>
        </div>

    <div class="modal-body">
        <form action="../logica/insertservice.php" method="post" class="form1">
          <div class="form-group">
          <input type="text" name="titulo" class="form-control" placeholder="Titulo">
          </div>
          <div class="form-group">
          <input type="text" name="icono" class="form-control" placeholder="Nombre Icono">
          </div>
          <div class="form-group">
          <textarea name="descripcion" class="form-control" rows="5" id="comment" placeholder="Descripcion"></textarea>
          </div>
          <div class="form-group">
          <select name="estado" class="form-control">
            <option value="0">Seleccionar Estado</option>
            <option value="1">Activo</option>
            <option value="0">Pendiente</option>
          </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-warning"> Crear </button>
          </div>
        </form>
        </div>
      </div>
    
    
    </div>
  </div>

<!-- //////////// modal2 ////////// -->

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
 
?>