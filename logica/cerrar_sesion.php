<?php
session_start();
 
if($_SESSION['session_username']){
session_destroy();
 
echo '
        <script language = javascript>
 
                alert("Su sesion ha terminado correctamente")
                self.location = "../"
 
        </script>';
}
?>