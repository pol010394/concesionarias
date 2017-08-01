<?php
class conexion
{
    private $servidor='localhost';
    private $usuario='pablo';
    private $contrasenia='12345';
    private $base='autos';
    function conexion() {
        
    }
    function getServidor() {
        return $this->servidor;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getContrasenia() {
        return $this->contrasenia;
    }

    function getBase() {
        return $this->base;
    }

        public function conectar() 
    {
        $con = mysqli_connect($this->servidor,  $this->usuario ,  $this->contrasenia ,  $this->base)or die ('Lo sientimos conexion fallida');
        return $con;
    }  
}