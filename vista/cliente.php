<?php

        session_start();
        if(isset($_SESSION['nivel'])==2)
        {
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Cliente</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script>
        function validar(){
            if(!datos.cedula.value)
               {
                   alert("Ingrese su Cédula");
                   datos.cedula.focus;
                   return false;
               }if(!/^[0-9]{10}$/.test(datos.cedula.value))
                   {
                       alert("Cédula Invalida");
                   datos.cedula.focus;
                   return false;
                   }
            if(!datos.nombre.value)
            {
                alert("El Nombre es Requerido");
				datos.nombre.focus();
				return false;
            }
            if(!datos.apellido.value)
            {
                alert("El Apellido es Requerido");
				datos.apellido.focus();
				return false;
            }
            if(!datos.telef.value)
               {
                   alert("Ingrese su telefono");
                   datos.telef.focus;
                   return false;
               }if(!/^[0-9]{10}$/.test(datos.telef.value))
                   {
                       alert("telefono Invalida");
                   datos.telef.focus;
                   return false;
                   }
        }
        </script>
    </head>
    <body>
        
        <form name="datos" method="POST"  class="registro" onsubmit=" return validar(this);">
            <table border="2" align="center">
                <tr><td style="text-align:center">Registro de Clientes</td> </tr>
                <tr><td><br><img src="../imagenes/login (1).png" ></td></tr>
            
            <tr><td style="text-align:center">
            <br>Cedula:<input type="text" name="cedula">
            <br>Nombre:<input type="text" name="nombre">
            <br>Apellido:<input type="text" name="apellido">
            <br>Telefono:<input type="password" name="telef">
            
                </td>
                
            </tr>
        
         <tr><td style="text-align:center"><input type="submit" name="Enviar" value ="Enviar"></td></tr>
            </table>
            <br> <div><a href="http://localhost/concesionarias/vista/vendedor.php">Regresar</a></div>
           
        </form>
        <?php
        include '../controlador/clientes.php';
        if(isset($_POST['cedula'])&&isset($_POST['nombre'])&&isset($_POST['apellido'])&&isset($_POST['telef']))
        {
        $ced=$_POST['cedula'];
	$nom=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$telef=$_POST['telef'];
	$obj=new clientes();
         $obj->setId('');
        $obj->setCedula($ced);
        $obj->setNombre($nom);
        $obj->setApellido($apellido);
        $obj->setTelefono($telef);
        $obj->insertarCliente();
        echo '<script language="javascript">alert("Guardado");</script>';
        }
        ?>
    </body>
</html>
<?php

	}
        else
        {
		header("Location: http://localhost:81/concesionarias/index.php?Error=No puede ingresar");
	}
?>