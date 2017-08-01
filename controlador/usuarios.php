<?php
include '../Conexcion/conexccion.php';
class usuario{
    private $id;
    private $cedula;
    private $nombre;
    private $apellido;
    private $password;
    private $nivel;
    private $consecionarias;
    private $cx;
    public function usuario(){
        $this->cx =new conexion();
    }
    public function getId() {
        return $this->id;
    }

    public function getCedula() {
        return $this->cedula;
    }

   public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function getConsecionarias() {
        return $this->consecionarias;
    }


    public function setId($id) {
        $this->id = $id;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

   public function setConsecionarias($consecionarias) {
        $this->consecionarias = $consecionarias;
    }
    public function insertarUsuario(){
        $cons="select * from `autos`.`usuario` where cedula_usuario='$this->cedula';";
        $consulta=  mysqli_query($this->cx->conectar(), $cons);
        $dato=  mysqli_num_rows($consulta);
        if($dato>0)
        {
            die ('Este Usuario ya existe') ;
                        
           header("refresh:2; url=usuario.php");
        }
        else{
        $sql="INSERT INTO  `autos`.`usuario`(`id_usuario`, `cedula_usuario`, `nombre_usuario`, `apellido_usuario`, `password`, `nivel`, `id_consecionarias`) VALUES ('$this->id','$this->cedula','$this->nombre','$this->apellido','$this->password','$this->nivel','1')";
        $r=mysqli_query($this->cx->conectar(),$sql)or die ('Lo sientimos conexion fallida') ;
        }
    }
    public function mostrarUsuarios(){
        $sql="SELECT * FROM usuario ;";
        $r=mysqli_query($this->cx->conectar(),$sql)or die ('Lo sientimos conexion fallida') ;
      return $r;
    }
    public function eliminarUsuario($id){
         $sql="DELETE FROM usuario WHERE usuario.id_usuario='$id';";
      $r=mysqli_query($this->cx->conectar(),$sql)or die ('Lo sientimos conexion fallida') ;
      return $r;
    }
    public function modificarUsuarios($id){
        $sql="UPDATE `autos`.`usuario` SET `nombre_usuario` = '$this->nombre',`apellido_usuario`='$this->apellido',`password`='$this->password' WHERE `usuario`.`id_usuario` = $id;";
        $r=mysqli_query($this->cx->conectar(),$sql)or die ('Lo sientimos conexion fallida') ;
      return $r;
        
    }

    

}
