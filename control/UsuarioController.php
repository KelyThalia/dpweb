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
