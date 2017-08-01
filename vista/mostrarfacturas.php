 
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
                   <div align="center" >Facturas</div>
                   <br>
                   <?php
        include '../controlador/factura.php';
        $obj=new factura();
	$r=$obj->mostrarFactura();
	echo "<table border=1 align='center' ><tr><td>Id</td><td>usuario</td><td>cliente</td><td>fecha</td></tr>";
	while($dato=mysqli_fetch_array($r))
	{
		
		echo "<tr>";
		echo "<td>".$dato['id_factura']."</td>";
		echo "<td>".$dato['id_usuario']."</td>";
		echo "<td>".$dato['id_cliente']."</td>";
		echo "<td>".$dato['fecha']."</td>";
				echo"</tr>";
	}
	echo "</table>";
	

	?>
            <br> <div><a href="http://localhost:81/concesionarias/vista/vendedor.php">Regresar</a></div>
        
        </form>
        
    </body>
</html>
