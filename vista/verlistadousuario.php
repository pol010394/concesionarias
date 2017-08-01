<?php

        session_start();
        if(isset($_SESSION['nivel'])==1)
        {
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>Menu de Usuarios</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
               <form name="datos" method="POST"  class="registro" onsubmit=" return validar(this);">
                   <br>
                   <br>
                   <div align="center" >Listado de Usuarios</div>
                   <?php
        include '../controlador/usuarios.php';
        
        $obj=new usuario();
	$r=$obj->mostrarUsuarios();
	echo "<table border=1 align='center' ><tr><td>Id</td><td>Cedula</td><td>Nombre</td><td>Apellido</td><td>Password</td><td>nivel</td><td>Consecionaria</td></tr>";
	while($dato=mysqli_fetch_array($r))
	{
		
		echo "<tr>";
		echo "<td>".$dato['id_usuario']."</td>";
		echo "<td>".$dato['cedula_usuario']."</td>";
		echo "<td>".$dato['nombre_usuario']."</td>";
		echo "<td>".$dato['apellido_usuario']."</td>";
                echo "<td>".$dato['password']."</td>";
                echo "<td>".$dato['nivel']."</td>";
                echo "<td>".$dato['id_consecionarias']."</td>";
                 echo "<td><a href='eliminar_usuario.php?id={$dato['id_usuario']}'> Elminar</td>";
              echo "<td><a href='modificar_usuario.php?id={$dato['id_usuario']} & ced={$dato['cedula_usuario']} & nomb={$dato['nombre_usuario']} & apel={$dato['apellido_usuario']} & pass={$dato['password']} & niv={$dato['nivel']} & idcons={$dato['id_consecionarias']}'> Actualizar</td>";      
            
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