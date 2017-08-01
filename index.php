<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="windows-1252">
        <title></title>
        <script>
        function validar(){
            if(!datos.user.value)
            {
                alert("El Usuario es Requerido");
				datos.user.focus();
				return false;
            }
            if(!datos.pw.value)
            {
                alert("Password Requerido");
				datos.pw.focus();
				return false;
            }
        }
        </script>
    </head>
    <body>
        <form name="datos" method="POST"  action="controlador/login.php" onsubmit=" return validar(this);">
            <table border="2" align="center">
            <tr><td><br><img src="imagenes/login.png" ></td></tr>
            
            <tr><td style="text-align:center"><br>Usuario:<input type="text" name="user">
            <br>Password:<input type="password" name="pw"></td></tr>
        
         <tr><td style="text-align:center"><input type="submit" name="Enviar" value ="Enviar"></td></tr>
            </table>
        
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
