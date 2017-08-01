<?php
include '../Conexcion/conexccion.php';
function verificar($user,$pass)
	{
		$cx=new conexion();
		$sql="select*from usuario where usuario.cedula_usuario='$user' and usuario.password='$pass';";
		$r=mysqli_query($cx->conectar(),$sql);
		if($var=mysqli_fetch_array($r))
		{
			return $var;
		}
		else
		{
			return false;
		}
		mysqli_close();	
	}
		if(isset($_POST['user'])&&isset($_POST['pw']))
	{
	$user=$_POST['user'];
	$pass=$_POST['pw'];
	$dato=verificar($user,$pass);
	
	if($dato!=false)
	 {
		session_start(); 
		$_SESSION['id_usuario']=$dato['id_usuario'];
		$_SESSION['cedula_usuario']=$dato['cedula_usuario'];
		$_SESSION['nombre_usuario']=$dato['nombre_usuario'];
		$_SESSION['apellido_usuario']=$dato['apellido_usuario'];
		$_SESSION['password']=$dato['password'];
		$_SESSION['nivel']=$dato['nivel'];
		$_SESSION['id_consecionarias']=$dato['id_consecionarias'];
		switch ($_SESSION['nivel'])
		{
			case 1: 
			header('Location: http://localhost:81/concesionarias/vista/adminitrador.php');
			break;
			case 2: 
			header('Location: http://localhost:81/concesionarias/vista/vendedor.php');
			break;
			
		}
	 }
         else{
    echo "El usuario no existe en el sistema";
     echo "<script>location.href='http://localhost:81/concesionarias/index.php ' </script>";
}
	}
	

