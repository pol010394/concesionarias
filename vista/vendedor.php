 <?php

        session_start();
        if(isset($_SESSION['nivel'])==2)
        {
?>  
<!DOCTYPE html>

<html>
    <head>
        <title>Menu Vendedor</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div align="center">Menu del Vendedor</div>
        <br>
         <div align="center">
        <?php

echo '<br> BIENVENIDO '.$_SESSION['nombre_usuario'].' '.$_SESSION['apellido_usuario'];

        ?>
             </div>
        <table border="1" style="margin: 0 auto;">
            <tr>
                  <td align="left"> 
                      <a href="cliente.php"><img class="contenedor" src="../imagenes/usuario.jpg" width="250" height="250"></a>
                  </td>
                  <td align="left"> 
                      <a href="listadodecliente.php"><img class="contenedor" src="../imagenes/can-stock-photo_csp10432328.jpg" width="250" height="250"></a>
                  </td>
                   <td align="center"> 
                       <a href="mostrarvehiculos.php"><img class="contenedor" src="../imagenes/NAZ_5b6947a7198242f98c071384253e4c33.jpg" width="250" height="250"></a>
                        
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