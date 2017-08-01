<?php

        session_start();
        if(isset($_SESSION['nivel'])==1)
        {
?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="windows-1252">
        <title>Actualizar Datos</title>
        <script>
        function validar(){
            if(!dato.user.value)
            {
                alert("El Usuario es Requerido");
				dato.user.focus();
				return false;
            }
            if(!dato.pw.value)
            {
                alert("Contrasenia Requerida");
				dato.pw.focus();
				return false;
            }
        }
        </script>
    </head>
    <body>
        <form name="dato" method="POST"   onsubmit=" return validar(this);">
            <?php
         $id= isset($_REQUEST['id'])?$_REQUEST['id']:null;
         $nomb= isset($_REQUEST['nomb'])?$_REQUEST['nomb']:null;
        $categoria= isset($_REQUEST['categoria'])?$_REQUEST['categoria']:null;
        $precio= isset($_REQUEST['prec'])?$_REQUEST['prec']:null;
        
         
        ?>
            <table border="2" align="center">
           
            
                <tr><td style="text-align:center"><br>Id Auto:<input type="text" name="cedula" value="<?php echo $id; ?>" disabled="disabled">
            <br>Nombre:<input type="text" name="nombre" value="<?php echo $nomb; ?>" >
            <br>Categoria:<input type="text" name="categoria" value="<?php echo $categoria; ?>" >
            <br>Precio:<input type="text" name="precio" value="<?php echo $precio; ?>">
            
                </td></tr>
          
         <tr><td style="text-align:center"><input type="submit" name="Enviar" value ="Enviar">
         <br> <div><a href="http://localhost:81/concesionarias/vista/adminitrador.php">Regresar</a></td></tr></div>
            </table>
        
        </form>
        
       <?php
        
        include '../controlador/vehiculos.php';
        if(isset($_POST['nombre'])&&isset($_POST['categoria'])&&isset($_POST['precio']))
        {
        
        
	$nom=$_POST['nombre'];
	$categoria=$_POST['categoria'];
	$precio=$_POST['precio'];
        
       
	$obj=new vehiculos();
             
        $obj->setNombre_producto($nom);
        $obj->setCategoria($categoria);
        $obj->setPrecio($precio);
        
        
    $obj->modificarvahiculo($id);
        echo '<script language="javascript">alert("Guardado");</script>';
        echo "<script>location.href='http://localhost:81/concesionarias/vista/verlistadovehiculo.php' </script>";
        
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