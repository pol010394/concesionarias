<?php

include '../Conexcion/conexccion.php';

class clientes {

    private $id;
    private $cedula;
    private $nombre;
    private $apellido;
    private $telefono;
    private $cx;

    public function clientes() {
        $this->cx = new conexion();
    }

    function getId() {
        return $this->id;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function insertarCliente() {
        $cons = "select * from `autos`.`cliente` where cedula_cliente='$this->cedula';";
        $consulta = mysqli_query($this->cx->conectar(), $cons);
        $dato = mysqli_num_rows($consulta);
        if ($dato > 0) {
            die('Este cliente ya existe');

            header("refresh:2; url=usuario.php");
        } else {
            $sql = "INSERT INTO  `autos`.`cliente`(`id_cliente`, `cedula_cliente`, `nombre_cliente`, `apellido_cliente`, `telefono`) VALUES ('$this->id','$this->cedula','$this->nombre','$this->apellido','$this->telefono')";
            $r = mysqli_query($this->cx->conectar(), $sql)or die('Lo sientimos conexion fallida');
        }
    }

    public function eliminarCliente($cedula) {
        $sql = "DELETE FROM cliente WHERE cliente.id_cliente='$cedula';";
        $r = mysqli_query($this->cx->conectar(), $sql)or die('Lo sientimos conexion fallida');
        return $r;
    }

    public function mostrarCliente() {
        $sql = "SELECT * FROM cliente ;";
        $r = mysqli_query($this->cx->conectar(), $sql)or die('Lo sientimos conexion fallida');
        return $r;
    }

}
