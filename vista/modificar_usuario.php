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
         $ced= isset($_REQUEST['ced'])?$_REQUEST['ced']:null;
        $nomb= isset($_REQUEST['nomb'])?$_REQUEST['nomb']:null;
        $apel= isset($_REQUEST['apel'])?$_REQUEST['apel']:null;
        $pass= isset($_REQUEST['pass'])?$_REQUEST['pass']:null;
         $niv= isset($_REQUEST['niv'])?$_REQUEST['niv']:null;
          $idcons= isset($_REQUEST['idcons'])?$_REQUEST['idcons']:null;
        ?>
            <table border="2" align="center">
           
            
                <tr><td style="text-align:center"><br>Cedula:<input type="text" name="cedula" value="<?php echo $ced; ?>" disabled="disabled">
            <br>Nombre:<input type="text" name="nombre" value="<?php echo $nomb; ?>" >
            <br>Apellido:<input type="text" name="apellido" value="<?php echo $apel; ?>" >
                <br>Password:<input type="password" name="password" value="<?php echo $pass; ?>">
            
                </td></tr>
          
         <tr><td style="text-align:center"><input type="submit" name="Enviar" value ="Enviar">
         <br> <div><a href="http://localhost:81/concesionarias/vista/adminitrador.php">Regresar</a></td></tr></div>
            </table>
        
        </form>
        
       <?php
        
        include '../controlador/usuarios.php';
        if(isset($_POST['nombre'])&&isset($_POST['apellido'])&&isset($_POST['password']))
        {
        
        
	$nom=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$pass=$_POST['password'];
        
       
	$obj=new usuario();
             
        $obj->setNombre($nom);
        $obj->setApellido($apellido);
        $obj->setCedula($ced);
        $obj->setPassword($pass);
        
    $obj->modificarUsuarios($id);
        echo '<script language="javascript">alert("Guardado");</script>';
        echo "<script>location.href='http://localhost:81/concesionarias/vista/verlistadousuario.php' </script>";
        
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