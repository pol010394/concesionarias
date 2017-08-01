 <?php

        session_start();
        if(isset($_SESSION['nivel'])==2)
        {
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>Listado</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
               <form name="datos" method="POST"  class="registro" onsubmit=" return validar(this);">
                   <br>
                   <br>
                   <div align="center" >Listado de Clientes</div>
                   <?php
        include '../controlador/clientes.php';
        
        $obj=new clientes();
	$r=$obj->mostrarCliente();
	echo "<table border=1 align='center' ><tr><td>Id</td><td>Cedula</td><td>Nombre</td><td>Apellido</td><td>Telefono</td></tr>";
	while($dato=mysqli_fetch_array($r))
	{
		
		echo "<tr>";
		echo "<td>".$dato['id_cliente']."</td>";
		echo "<td>".$dato['cedula_cliente']."</td>";
		echo "<td>".$dato['nombre_cliente']."</td>";
		echo "<td>".$dato['apellido_cliente']."</td>";
                echo "<td>".$dato['telefono']."</td>";
                echo "<td><a href='eliminarcliente.php?id={$dato['id_cliente']}'> Elminar</td>";
				echo"</tr>";
	}
	echo "</table>";
	

	?>
            <br> <div><a href="http://localhost:81/concesionarias/vista/vendedor.php">Regresar</a></div>
        
        </form>
        
    </body>
</html>
<?php

	}
        else
        {
		header("Location: http://localhost:81/concesionarias/index.php?Error=No puede ingresar");
	}
?>