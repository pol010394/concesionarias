<?php

        session_start();
        if(isset($_SESSION['nivel'])==2)
        {
?>
  <?php
        include '../controlador/clientes.php';
        $id= isset($_REQUEST['id'])?$_REQUEST['id']:null;
        
	
        $obj=new clientes();
        $obj->eliminarCliente($id);
	echo '<script language="javascript">alert("Usuario Eliminado");</script>';
	
	header("Location:http://localhost:81/concesionarias/vista/listadodecliente.php");	
	


	}
        else
        {
		header("Location: http://localhost:81/concesionarias/index.php?Error=No puede ingresar");
	}
?>