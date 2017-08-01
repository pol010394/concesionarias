<?php
include '../Conexcion/conexccion.php';
class vehiculos{
    private $id_producto;
    private $nombre_producto;
    private $categoria;
    private $precio;
    private $cx;
    public function vehiculos(){
        $this->cx =new conexion();
    }
          
    function getId_producto() {
        return $this->id_producto;
    }

    function getNombre_producto() {
        return $this->nombre_producto;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function setNombre_producto($nombre_producto) {
        $this->nombre_producto = $nombre_producto;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

public function insertarVehiculos(){
        $cons="select * from `autos`.`producto` where nombre_producto='$this->nombre_producto';";
        $consulta=  mysqli_query($this->cx->conectar(), $cons);
        $dato=  mysqli_num_rows($consulta);
        if($dato>0)
        {
            die ('Este Automovil ya existe') ;
                        
           header("refresh:2; url=vehiculos.php");
        }
        else{
        $sql="INSERT INTO  `autos`.`producto`(`id_producto`,`nombre_producto`,`categoria`,`precio`) VALUES ('$this->id_producto','$this->nombre_producto','$this->categoria','$this->precio')";
        $r=mysqli_query($this->cx->conectar(),$sql)or die ('Lo sientimos conexion fallida') ;
        }
    } 
    public function mostrarvehiculos(){
         $sql="SELECT * FROM producto ;";
        $r=mysqli_query($this->cx->conectar(),$sql)or die ('Lo sientimos conexion fallida') ;
      return $r;
    }
    public function eliminarVehiculos($id){
        
             $sql="DELETE FROM producto WHERE producto.id_producto='$id';";
      $r=mysqli_query($this->cx->conectar(),$sql)or die ('Lo sientimos conexion fallida') ;
      return $r;   
        
       
    }
    public function buscarvehiculo($id_producto){
         $sql="SELECT * FROM producto where id_producto='$id_productoid_producto';";
        $r=mysqli_query($this->cx->conectar(),$sql)or die ('Lo sientimos conexion fallida') ;
      return $r;
    }
    public function modificarvahiculo($id_producto){
        $sql="UPDATE `autos`.`producto` SET `nombre_producto` = '$this->nombre_producto',`categoria`='$this->categoria',`precio`='$this->precio' WHERE `producto`.`id_producto` = $id_producto;";
        $r=mysqli_query($this->cx->conectar(),$sql)or die ('Lo sientimos conexion fallida') ;
      return $r;
        
    }
}
