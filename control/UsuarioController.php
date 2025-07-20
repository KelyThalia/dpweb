<?php
require_once("../model/UsuarioModel.php");
$objPersona = new UsuarioModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {

    // print_r($_POST);
    $nro_identidad = $_POST['nro_identidad'];
    $razon_social = $_POST['razon_social'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $departamento = $_POST['departamento'];
    $distrito = $_POST['distrito'];
    $provincia = $_POST['provincia'];
    $cod_postal = $_POST['cod_postal'];
    $direccion = $_POST['direccion'];
    $rol = $_POST['rol'];
    //ENCRIPTANDO EL NRO_IDENTIDAD PARA UTILIZARLO COMO IDENTIDAD
    $password = password_hash($nro_identidad, PASSWORD_DEFAULT);

    if ($nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == ""
        || $provincia == "" || $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    }else {
        // validacion si exsiste persona con el mismi dni
        $ExistePersona = $objPersona->ExistePersona($nro_identidad);
       if ($ExistePersona>0) {
        $arrResponse = array('status' => false, 'msg' => 'Error, nro de documento ya existe');
       }else{
        $respuesta = $objPersona->registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, 
        $distrito, $provincia, $cod_postal, $direccion, $rol, $password);
        if ($respuesta) {
            $arrResponse = array('status' => true, 'msg' => 'registrado correctamente');
        }else{
            $arrResponse = array('status' => false, 'msg' => 'Error, procedemos a registrar');
        } 
        }
    }
    echo json_encode($arrResponse);
}
if ($tipo == "iniciar_sesion") {
    $nro_identidad = $_POST['username'];
    $password = $_POST['password'];
    if ($nro_identidad =="" || $password == "") {
        $respuesta = array('status' => false, 'msg' => 'Error, campos vacios');
    }else {
        $ExistePersona = $objPersona->ExistePersona($nro_identidad);
        if (!$ExistePersona) {
           $respuesta = array('status' => false, 'msg' => 'Error, usuario no registrado');
        }else {
            $persona = $objPersona->buscarPersonaPorNroIdentidad($nro_identidad);
            if (password_verify( $password,$persona->password )) {
                session_start();
                $_SESSION['ventas_id'] = $persona->id;
                $_SESSION['ventas_usuario'] = $persona->razon_social;
                $respuesta = array('status' => true, 'msg' => 'Ok');
            }else {
                $respuesta = array('status' => false, 'msg' => 'Error, contraseña incorrecto');
            }
        }
    }
    echo json_encode($respuesta);
}
/*
if($tipo == "ver_usuario") {
    $usuarios = $objPersona->verUsuario();
    echo json_encode($usuarios);
}*/

if ($_GET['tipo'] == 'ver_usuario') {
    $usuarios = $usuario->listar(); // método que consulta la BD
    header('Content-Type: application/json');
    echo json_encode($usuarios);
    exit;
}

if ($_GET['tipo'] == 'ver_usuario') {
    $usuarios = $usuario->listarUsuario();
    header('Content-Type: application/json');
    echo json_encode($usuarios);
    exit;
}

if ($_GET['tipo'] == 'registrar') {
    $dni = $_POST['dni'];
    $nombres = $_POST['nombres_apellidos'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    $estado = $_POST['estado'];

    $res = $usuario->registrar($dni, $nombres, $correo, $rol, $estado);
    echo $res ? "ok" : "error";
    exit;
}



//Append child agregar hijo es mas cencillo ocument objet vfgd agregas hijos
//inner html
//primero se usa un bucle 
//carguar la informacion de la base de datos