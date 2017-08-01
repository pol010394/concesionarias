 <?php

        session_start();
        if(isset($_SESSION['nivel'])==1)
        {
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
               <form name="datos" method="POST"  class="registro" onsubmit=" return validar(this);">
                   <br>
                    <div align="center" >Listado de Vehiculos</div>
                   <br>
                   <?php
        include '../controlador/vehiculos.php';
        $obj=new vehiculos();
	$r=$obj->mostrarvehiculos();
	echo "<table border=1 align='center' ><tr><td>Id</td><td>Nombre</td><td>Categoria</td><td>Precio</td></tr>";
	while($dato=mysqli_fetch_array($r))
	{
		
		echo "<tr>";
		echo "<td>".$dato['id_producto']."</td>";
		echo "<td>".$dato['nombre_producto']."</td>";
		echo "<td>".$dato['categoria']."</td>";
		echo "<td>".$dato['precio']."</td>";
                  echo "<td><a href='eliminarauto.php?id={$dato['id_producto']}'> Elminar</td>";
              echo "<td><a href='modificar_auto.php?id={$dato['id_producto']} & nomb={$dato['nombre_producto']} & categoria={$dato['categoria']} & prec={$dato['precio']}'> Actualizar</td>";      
            
				echo"</tr>";
	}
	echo "</table>";
	

	?>
                   
            <br> <div><a href="http://localhost:81/concesionarias/vista/adminitrador.php">Regresar</a></div>
        
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