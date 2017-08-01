<?php

        session_start();
        if(isset($_SESSION['nivel'])==1)
        {
?> 
<!DOCTYPE html>

<html>
    <head>
        <title>Menu Administrador</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div align="center">Menu del Administrador</div>
        <br>
         <div align="center">
        <?php
     
echo '<br> BIENVENIDO '.$_SESSION['nombre_usuario'].' '.$_SESSION['apellido_usuario'];

        ?>
             </div>
        <table border="1" style="margin: 0 auto;">
            <tr>
                  <td align="left"> 
                      <a href="usuario.php"><img class="contenedor" src="../imagenes/usuario.jpg" width="250" height="250"></a>
                  </td>
                  <td align="left"> 
                      <a href="datospersonalesAdministrador.php"><img class="contenedor" src="../imagenes/datospersonales.jpg" width="250" height="250"></a>
                  </td>
                   <td align="left"> 
                       <a href="verlistadousuario.php"><img class="contenedor" src="../imagenes/can-stock-photo_csp10432328.jpg" width="250" height="250"></a>
                  </td>
                   <td align="center"> 
                       <a href="vehiculos.php"><img class="contenedor" src="../imagenes/car.png" width="250" height="250"></a>
                        
                   </td>
                   <td align="center"> 
                       <a href="verlistadovehiculo.php"><img class="contenedor" src="../imagenes/buscarauto.jpg" width="250" height="250"></a>
                        
                   </td>
                   
                  </tr>
        </table>
        <div align="right"><a href="../controlador/cerrar.php">
                
                <img class="contenedor" src="../imagenes/locks-icon.png" width="80" height="80"></a>  </div>
    </body>
</html>
<?php

	}
        else
        {
		header("Location: http://localhost:81/concesionarias/index.php?Error=No puede ingresar");
	}
?>