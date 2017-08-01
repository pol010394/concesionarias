<?php

        session_start();
        if(isset($_SESSION['nivel'])==1)
        {
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Usuario</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../tcal.css" />
        <script type="text/javascript" src="../tcal.js"></script> 
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
            <table border="2" align="center">
                <tr><td style="text-align:center">Registro de Usuarios</td> </tr>
                <tr><td><br><img src="../imagenes/login (1).png" ></td></tr>
            
            <tr><td style="text-align:center">
            <br>Cedula:<input type="text" name="cedula">
            <br>Nombre:<input type="text" name="nombre">
            <br>Apellido:<input type="text" name="apellido" class="tcal">
            <div><input type="text" name="date" class="tcal" value="" /></div>
            <br>Password:<input type="password" name="pass">
            <br>Nivel:<select for="emailsignup" name="nivel">
              <option value=""selected="">Seleccione</option> 
              <option value="1"selected="">Administrador </option>
              <option value="2"selected="">Vendedor</option>
            </select>
                </td>
                
            </tr>
        
         <tr><td style="text-align:center"><input type="submit" name="Enviar" value ="Enviar"></td></tr>
            </table>
            <br> <div><a href="http://localhost:81/concesionarias/vista/adminitrador.php">Regresar</a></div>
       
        
        </form>
        <?php
        include '../controlador/usuarios.php';
        if(isset($_POST['cedula'])&&isset($_POST['nombre'])&&isset($_POST['apellido'])&&isset($_POST['pass'])&&isset($_POST['nivel']))
        {
        $ced=$_POST['cedula'];
	$nom=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$pass=$_POST['pass'];
	$nvn=$_POST['nivel'];
	$obj=new usuario();
         $obj->setId('');
        $obj->setCedula($ced);
        $obj->setNombre($nom);
        $obj->setApellido($apellido);
        $obj->setPassword($pass);
        $obj->setNivel($nvn);
        $obj->insertarUsuario();
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