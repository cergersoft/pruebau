<?php

session_start();

require_once("database.php");

if(isset($_POST["_login"])){

if(!empty($_POST['_usuario']) && !empty($_POST['_password'])) {

    $username=$_POST['_usuario'];
    $password=$_POST['_password'];

    $encripter =md5("$password");

    //roles administrativos

    $suadmin="ROLE_SUADMIN";
    $user="ROLE_USER";
    $admin="ROLE_ADMIN";
    $active = 1;


$login = "SELECT * FROM `user` WHERE user_usuario='".$username."' OR user_correo='".$username."' AND password='".$encripter."'";
$query =mysqli_query($conexion,$login);


    $numrows=mysqli_num_rows($query);
    if($numrows!=0)

    {
    while($row=mysqli_fetch_assoc($query))
    {
    $dbusername=$row['user_usuario'];
    $dbpassword=$row['password'];
    $dbname=$row['user_nombre'];
    $dblastname=$row['user_apellido'];
    $dbrole=$row['user_role'];
    $dbactive=$row['user_active'];
    $dbmail=$row['user_correo'];
    $dbid=$row['user_id'];
    $dbpago=$row['user_pago'];
    }

        if($username == $dbusername && $encripter == $dbpassword && $suadmin == $dbrole && $active == $dbactive)

    {

$_SESSION['session_username']=$dbname. " " .$dblastname;
$_SESSION['user_suadmin']=$dbrole;
    /* Redirect browser */


    header("Location: ../admin/");
    }
    } else {

       echo '
            <script>
                alert("Correo o password Invalidos");
                window.history.go(-1);
            </script>';
    }


    if($username == $dbusername && $encripter == $dbpassword && $user == $dbrole && $active == $dbactive)

    {

$_SESSION['session_username']=$dbname. " " .$dblastname;
$_SESSION['user_suadmin']=$dbrole;
$_SESSION['user_correo']=$dbmail;
$_SESSION['user_id']=$dbid;
$_SESSION['user_pago']=$dbpago;

    /* Redirect browser */


    header("Location: ../clientes.php");
    }
    } else {

       echo '
            <script>
                alert("Correo o password Invalidos");
                window.history.go(-1);
            </script>';
    }


    if($username == $dbusername && $encripter == $dbpassword && $admin == $dbrole && $active == $dbactive)

    {


    $_SESSION['session_username']=$dbname. " " .$dblastname;
    $_SESSION['user_admin']=$dbrole;
    /* Redirect browser */


    header("Location: ../admin/admin.php");
    }
    } else {

       echo '
            <script>
                alert("Correo o password Invalidos");
                window.history.go(-1);
            </script>';
    }


        if($username == $dbusername && $password == $dbpassword && $gold == $dbrole)

    {


    $_SESSION['session_username']=$dbname. " " .$dblastname. " " .$dbrole;
    /* Redirect browser */


    header("Location: ../");
    }

        echo '
            <script>
                alert("Correo o password Invalidos");
                self.location = "../login/login.php"
            </script>';
?>
