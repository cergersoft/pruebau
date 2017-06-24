<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/register.css">
</head>
<body>

<div class="login-form">
<form action="../logica/registrar.php" method="post">
     <h1>Registro</h1>
     
     <div class="form-group ">
       <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
       <i class="fa fa-user"></i>
     </div>
     
     <div class="form-group ">
       <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
       <i class="fa fa-user"></i>
     </div>
     
     <div class="form-group">
       <input type="text" name="cedula" class="form-control" placeholder="Cedula o Nit" required>
       <i class="fa fa-lock"></i>
     </div>
     
     <div class="form-group ">
       <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
       <i class="fa fa-user"></i>
     </div>
     
     <div class="form-group">
       <input type="mail" name="correo" class="form-control" placeholder="Correo Electronico" required>
       <i class="fa fa-lock"></i>
     </div>
     
     <div class="form-group">
       <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
       <i class="fa fa-lock"></i>
     </div>
     
     <div class="form-group">
       <label><input type="radio" required name="entidad" value="empresa"> Empresa</label> <label><input type="radio" name="entidad" required value="cliente"> Usuario</label>
       <i class="fa fa-lock"></i>
     </div>
     
      
     <button type="submit" class="log-btn" ><strong>Iniciar</strong> <span class="glyphicon glyphicon-ok-sign"></span></button>
     
</form> 
   </div>


<script src="./js/jquery.min.js"></script>
<script src="./js/login.js"></script>
	
</body>
</html>