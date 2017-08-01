
<!DOCTYPE html>
<html>
    <head>
        <title>Eliminar Factura</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script>
            function validar()
       {
			if(!datos.id.value)
			{
				alert("El Nombre es Requerido");
				datos.id.focus();
				return false;
			}
        }
        
        </script>
    </head>
    <body>
        
        <form name="datos" method="POST"  class="registro" onsubmit=" return validar(this);">
             <table border="2" align="center">
                 <tr><td> <div><h1 class="centrado">Eliminar Factura</h1></div></td></tr>
		<tr><td><div><label>id</label><input type="text" name="id"></div>
                        <div><input type="submit" name="registrar" value="Eliminar Factura"></div></td></tr>
             </table>
            <div><a href="factura_1.php">ATRAS</a></div>
        </form>
        <?php
        include '../controlador/factura.php';
        if(isset($_POST['id']))
	{
	$id=$_POST['id'];
        $obj=new factura();
        $obj->eliminar($id);
	echo '<script language="javascript">alert("Cliente Eliminado");</script>';
        }
		
	
	?>
    </body>
</html>
