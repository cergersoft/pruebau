<?php

session_start();

require_once("connection.php");

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



$query =mysql_query("SELECT * FROM `user` WHERE user_usuario='".$username."' OR user_correo='".$username."' AND password='".$encripter."'");


    $numrows=mysql_num_rows($query);
    if($numrows!=0)

    {
    while($row=mysql_fetch_assoc($query))
    {
    $dbusername=$row['user_usuario'];
    $dbpassword=$row['password'];
    $dbname=$row['user_nombre'];
    $dblastname=$row['user_apellido'];
    $dbrole=$row['user_role'];
    $dbactive=$row['user_active'];
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

?>
