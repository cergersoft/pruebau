
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

      <?php
            require '../logica/database.php';
            $id = $_POST['id'];
            $consulta = "SELECT * FROM `service` where service_id =$id";
            $re=mysqli_query($conexion,$consulta) or die (mysql_error());
            while ($row=mysqli_fetch_array($re,MYSQLI_ASSOC)){ ?>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nombre : <?php echo $row['service_titulo'];?></h4>
          <p></p>
          <h4 class="modal-title">icono: <i class="fa fa-<?php echo $row['service_icon'];?> fa-fw"></i></h4>
        </div>

        <div class="modal-body">
          <p><?php echo $row['service_descripcion'];?></p>
        </div>

        <hr>
     <h3>Editar Servicio</h3>
        <form action="../logica/updateservice.php" method="post" class="form1">
          <div class="form-group">
          <input type="text" class="form-control" value="<?php echo $row['service_titulo'];?>">
          </div>
          <div class="form-group">
          <input type="text" class="form-control" value="<?php echo $row['service_icon'];?>">
          </div>
          <div class="form-group">
          <textarea class="form-control" rows="5" id="comment"><?php echo $row['service_descripcion'];?></textarea>
          </div>
          <div class="form-group">
          <select name="" class="form-control">
            <option value="<?php echo $row['service_active'];?>">
            <?php if ($row['service_active'] == "1"){
                      echo 'Activo';
                  } elseif ($row['service_active'] == "0"){
                      echo 'Pendiente';
                  };?></option>
            <option value="1">Activo</option>
            <option value="0">Pendiente</option>
          </select>
          </div>
          <div class="form-group">
            <button class="btn btn-info"> Actualizar </button>
          </div>
        </form>



        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

    <?php } ?>

      </div>
    
    
    </div>
  