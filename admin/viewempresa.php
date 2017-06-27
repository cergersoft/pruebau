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

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                            <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Forms</a>
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
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3>Ficha Empresa</h3>
                        </div>

                    <?php
                          require '../logica/database.php';
                            $user =$_GET['view'];
                            $sql="SELECT * FROM `user` JOIN banner WHERE user_id = '$user' LIMIT 1 ";
                            $re=mysqli_query($conexion, $sql) or die (mysql_error());
                            while ($row=mysqli_fetch_array($re,MYSQLI_ASSOC)){ ?>
                        <div class="panel-body">
                            
                            <div class="col-md-6">

                            <div class="form-group">
                            <label for="">Nombre: </label>
                            <label><?php echo $row['user_nombre'];?> </label>
                            </div>
                            <div class="form-group">
                            <label for="">Apellido: </label>
                            <label><?php echo $row['user_apellido'];?></label>
                            </div>
                            <div class="form-group">
                            <label for="">Cedula: </label>
                            <label><?php echo $row['user_cedula'];?></label>
                            </div>
                            <div class="form-group">
                            <label for="">Usuario: </label>
                            <label><?php echo $row['user_usuario'];?></label>
                            </div> 

                            </div>


                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Correo: </label>
                            <label><?php echo $row['user_correo'];?></label>
                            </div>
                            <div class="form-group">
                            <label for="">Telefono: </label>
                            <?php echo $row['user_telefono'];?></label>
                            </div>
                            <div class="form-group">
                            <label for="">Entidad: </label>
                            <label><?php echo $row['user_entidad'];?></label>
                            </div>
                            <div class="form-group">
                            <label for="">Creado: </label>
                            <label><?php echo $row['user_createat'];?></label>
                            </div>
                            <div class="form-group">
                            <label for="">Estado: </label>
                            <label><?php if ($row['user_active'] == 1){
                                 echo ' <span class="glyphicon glyphicon-ok text-success"> Activo</span>';
                                 } elseif ($row['user_active'] == 0){
                                 echo ' <span class="glyphicon glyphicon-time text-danger"> Pendiente</span>';
                                 }; ?>
                            </label>
                            </div>  
                            </div>
                        </div>
                    
                        <div class="panel-footer">
                        
                            <a href="../logica/deleteCliente.php?delete=<?php echo $row['user_id'];?>" class="btn btn-danger"> Borrar</a>

                            <a href="editempresa.php?view=<?php echo $row['user_id'];?>" class="btn btn-info"> Editar</a>
                        </div>
                    <?php } ?>
                    </div>
                </div>
               <div class="col-lg-2"></div> 
                                </div>
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>



    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

</body>

</html>


<?php } ?>