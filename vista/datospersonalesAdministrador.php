<?php

        session_start();
        if(isset($_SESSION['nivel'])==1)
        {
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Datos Personales</title>
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
            if(!datos.pass.value)
            {
                alert("Password Requerido");
				datos.pass.focus();
				return false;
            }
        }
        </script>
    </head>
    <body>
        
        <form name="datos" method="POST"  class="registro" onsubmit=" return validar(this);">
            <?php
    


        ?>
            <table border="2" align="center">
                <tr><td style="text-align:center">Modificar Datos Personales</td> </tr>
                <tr><td><br><img src="../imagenes/login (1).png" ></td></tr>
            
            <tr><td style="text-align:center">
            <br>Cedula:<input type="text" name="cedula" value="<?php echo $_SESSION['cedula_usuario'];  ?>" disabled="disabled" >
            <br>Nombre:<input type="text" name="nombre" value="<?php echo $_SESSION['nombre_usuario'];  ?> ">
            <br>Apellido:<input type="text" name="apellido" value="<?php echo $_SESSION['apellido_usuario'];  ?> ">
            <br>Password:<input type="password" name="pass" value="<?php echo $_SESSION['password'];  ?> " >
            <br>Nivel:<input type="text" name="nivel" value="<?php echo $_SESSION['nivel'];  ?> "disabled="disabled" >
                </td>
                
            </tr>
        
         <tr><td style="text-align:center"><input type="submit" name="modificar" value ="modificar"></td></tr>
            </table>
            <br> <div><a href="http://localhost:81/concesionarias/vista/adminitrador.php">Regresar</a></div>
            
        
        </form>
        <?php
        
        include '../controlador/usuarios.php';
        if(isset($_POST['nombre'])&&isset($_POST['apellido'])&&isset($_POST['pass']))
        {
        $ids=$_SESSION['cedula_usuario'];
        
	$nom=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$pass=$_POST['pass'];
	$obj=new usuario();
       
       
        $obj->setNombre($nom);
        $obj->setApellido($apellido);
        $obj->setPassword($pass);
        
        $obj->modificarUsuarios($ids);
   
        echo '<script language="javascript">alert("Guardado");</script>';
        echo "<script>location.href='http://localhost:81/concesionarias/index.php ' </script>";
        
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