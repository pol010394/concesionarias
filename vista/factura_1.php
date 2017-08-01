
<!DOCTYPE html>
<html>
    <head>
        <title>Factura</title>
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
             <?php
        session_start();


        ?>
            <table border="2" align="center">
                <tr><td style="text-align:center">Factura</td> </tr>
                <tr><td style="text-align:center"><br><img src="../imagenes/factura.png" ></td></tr>
            
            <tr><td style="text-align:center">
                    <br>ID_Usuario:<input type="text" name="usuario">
            <br>ID_Cliente:<input type="text" name="id_cliente">
            
            <br>Fecha:<input type="text" name="fecha" >
            
            
                </td>
                
            </tr>
        
         <tr><td style="text-align:center"><input type="submit" name="Enviar" value ="Enviar"></td></tr>
            </table>
            <br> <div><a href="http://localhost:81/concesionarias/vista/vendedor.php">Regresar</a></div>
              <br> <div><a href="http://localhost:81/concesionarias/vista/mostrarfacturas.php">Facturas</a></div>
             <br> <div><a href="http://localhost:81/concesionarias/vista/eliminarfactura.php">Eliminar</a></div>
        
        </form>
        <?php
        include '../controlador/factura.php';
        
        if(isset($_POST['usuario'])&&isset($_POST['id_cliente'])&&isset($_POST['fecha']))
        {
        $id_usuario=$_POST['usuario'];
        $id_cliente=$_POST['id_cliente'];
	$fecha=$_POST['fecha'];
	
	$obj=new factura();
         $obj->setId_factura('');
        $obj->setId_usuario($id_usuario);
        $obj->setId_cliente($id_cliente);
        $obj->setFecha($fecha);
         $obj->ingresarFactura();
        echo '<script language="javascript">alert("Guardado");</script>';
        }
        ?>
    </body>
</html>
