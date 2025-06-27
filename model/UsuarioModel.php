<?php
require_once("../library/conexion.php");
class UsuarioModel{
  private $conexion;
    function __construct(){
        $this->conexion = new conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, 
    $distrito, $provincia, $cod_postal, $direccion, $rol, $password){ 
      $consulta ="INSERT INTO  Persona (nro_identidad, razon_social, telefono, correo, departamento, 
      distrito, provincia, cod_postal, direccion, rol, password) VALUES ('$nro_identidad', '$razon_social', '$telefono', '$correo', '$departamento', 
      '$distrito', '$provincia', '$cod_postal', '$direccion', '$rol', '$password')";
      $sql = $this->conexion->query($consulta);
      if ($sql) {
        $sql = $this->conexion->insert_id;
      }else{
        $sql = 0;
      }
      return $sql;
    } 
   public function ExistePersona($nro_identidad){
    $consulta="SELECT * FROM persona WHERE nro_identidad='$nro_identidad'";
    $sql = $this->conexion->query($consulta);
    return $sql->num_rows;
   }
}