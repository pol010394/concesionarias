<?php   
session_start();
session_destroy();
echo 'sesion finalizada';
header("refresh:2;url=http://localhost:81/concesionarias/index.php");

 ?>