<!DOCTYPE html>
<html>
    <head>
        <title>Actualizar Vehiculos</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
               <form name="datos" method="POST"  class="registro" onsubmit=" return validar(this);">
            <table border="2" align="center">
                <tr><td style="text-align:center">Actualizacion Datos del Vehichulo</td> </tr>
                <tr><td><br><img src="../imagenes/car.png" width="250" height="250" align="center"></td></tr>
                
            <tr><td style="text-align:center">
            <br>Nombre:<input type="text" name="nombre">
            <br>Categoria:<select for="emailsignup" name="categoria">
              <option value="0" selected="">Seleccione</option> 
              <option value="1" selected="">Autos </option>
              <option value="2" selected="">Todo-Terreno</option>
              <option value="3" selected="">Camionetas</option>
            </select>
            
            <br>Precio:<input type="text" name="precio">
                         
             </td>
                
            </tr>
        
         <tr><td style="text-align:center"><input type="submit" name="Enviar" value ="Enviar"></td></tr>
            </table>
            <br> <div><a href="http://localhost:81/concesionarias/vista/adminitrador.php">Regresar</a></div>
            
        
        </form>
        <?php
        include '../controlador/vehiculos.php';
        if(isset($_POST['nombre'])&&isset($_POST['categoria'])&&isset($_POST['precio']))
        {
        $nombre=$_POST['nombre'];
	$categoria=$_POST['categoria'];
	$precio=$_POST['precio'];
	$obj=new vehiculos();
        $obj->setId_producto('');
        $obj->setNombre_producto($nombre);
        $obj->setCategoria($categoria);
        $obj->setPrecio($precio);
        $obj->insertarVehiculos();
        echo '<script language="javascript">alert("Guardado");</script>';
        }
        ?>
    </body>
</html>
