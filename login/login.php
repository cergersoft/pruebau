<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="login-form">
<form action="../logica/login.php" method="post">
     <h1>Iniciar Sesion</h1> 
     <div class="form-group ">
       <input type="text" class="form-control" name="_usuario" placeholder="Usuario" id="UserName">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" name="_password" placeholder="Contraseña" id="Passwod">
       <i class="fa fa-lock"></i>
     </div>
      <span class="alert">Invalid Credentials</span>
     <button type="submit" class="log-btn" name="_login"><strong>Iniciar</strong> <span class="glyphicon glyphicon-ok-sign"></span></button>
     
</form> 
   </div>


<script src="js/jquery.min.js"></script>
	
</body>
</html>