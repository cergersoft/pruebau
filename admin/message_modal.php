
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

      <?php
            require '../logica/database.php';
            $id = $_POST['id'];
            $cambio = "leido";
            mysqli_query($conexion, "UPDATE `message` SET `message_status`= '$cambio' WHERE message_id = $id");

            $consulta = "SELECT * FROM `message` where message_id =$id";
            $re=mysqli_query($conexion,$consulta) or die (mysql_error());

      while ($row=mysqli_fetch_array($re,MYSQLI_ASSOC)){ ?>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nombre : <?php echo $row['message_nombre'];?></h4>
          <p></p>
          <h4 class="modal-title">Asunto: <?php echo $row['message_asunto'];?></h4>
        </div>

        <div class="modal-body">
          <p><?php echo $row['message_descripcion'];?></p>
            <hr>
          <p>Recivido: <?php echo $row['message_date'];?></p>
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

    <?php } ?>

      </div>
    
    
    </div>
  