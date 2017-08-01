<?php

        session_start();
        if(isset($_SESSION['nivel'])==1)
        {
?>
  <?php
        include '../controlador/usuarios.php';
        $id= isset($_REQUEST['id'])?$_REQUEST['id']:null;
        
	
        $obj=new usuario();
        $obj->eliminarUsuario($id);
	echo '<script language="javascript">alert("Usuario Eliminado");</script>';
	
	header("Location:http://localhost:81/concesionarias/vista/verlistadousuario.php");	
	


	}
        else
        {
		header("Location: http://localhost:81/concesionarias/index.php?Error=No puede ingresar");
	}
?>