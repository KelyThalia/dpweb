<?php
require_once("../library/conexion.php");
//require_once "../config/config.php";
class UsuarioModel
{
  private $conexion;
  function __construct()
  {
    $this->conexion = new conexion();
    $this->conexion = $this->conexion->connect();
  }
  public function registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $distrito, $provincia, $cod_postal,  $direccion,
    $rol, $password
  ) {
    $consulta = "INSERT INTO  persona (nro_identidad, razon_social, telefono, correo, departamento, 
      distrito, provincia, cod_postal, direccion, rol, password) VALUES ('$nro_identidad', '$razon_social', '$telefono', '$correo', '$departamento', 
      '$distrito', '$provincia', '$cod_postal', '$direccion', '$rol', '$password')";
    $sql = $this->conexion->query($consulta);
    if ($sql) {
      $sql = $this->conexion->insert_id;
    } else {
      $sql = 0;
    }
    return $sql;
  }
  public function ExistePersona($nro_identidad)
  {
    $consulta = "SELECT * FROM persona WHERE nro_identidad='$nro_identidad'";
    $sql = $this->conexion->query($consulta);
    return $sql->num_rows;
  }
  public function buscarPersonaPorNroIdentidad($nro_identidad)
  {
    $consulta = "SELECT id, razon_social, password FROM persona WHERE nro_identidad ='$nro_identidad' limit 1";
    $sql = $this->conexion->query($consulta);
    return $sql->fetch_object();
  }
  public function verUsuario() {
    $arr_usuario = array();
    $consulta = "SELECT * FROM persona";
    $sql = $this->conexion->query($consulta);
    while ($objeto = $sql->fetch_object()){
        array_push($arr_usuario, $objeto);
      }
    return $arr_usuario;
  }
   public function obtenerUsuarioPorId($id)
  {
    $stmt = $this->conexion->prepare("SELECT * FROM persona WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    return $resultado->fetch_assoc();
  }
   public function buscarPorDocumento($nro_identidad)
  {
    $stmt = $this->conexion->prepare("SELECT id FROM persona WHERE nro_identidad = ?");
    $stmt->bind_param("s", $nro_identidad);
    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->fetch_assoc();
  }
  
  public function actualizarPersona($data)
{
    $stmt = $this->conexion->prepare("UPDATE persona SET nro_identidad = ?, razon_social = ?, telefono = ?, correo = ?, departamento = ?, provincia = ?, distrito = ?, cod_postal = ?, direccion = ?, rol = ? WHERE id = ?");
    $stmt->bind_param(
      "ssssssssss",
      $data['nro_identidad'],
      $data['razon_social'],
      $data['telefono'],
      $data['correo'],
      $data['departamento'],
      $data['provincia'],
      $data['distrito'],
      $data['cod_postal'],
      $data['direccion'],
      $data['rol'],
      $data['id_persona']
    );
    return $stmt->execute();
}

}

  

