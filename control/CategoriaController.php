<?php
require_once("../model/CategoriaModel.php");
$objCategoria = new CategoriaModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {

    // print_r($_POST);
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    
  

    if ($nombre == "" || $detalle == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    }else {
        // validacion si exsiste persona con el mismi dni
        $ExisteCategoria= $objCategoria->existeCategoria($nombre);
       if ($ExisteCategoria>0) {
        $arrResponse = array('status' => false, 'msg' => 'Error, nombre de categoria ya existe');
       }else{
        $respuesta = $objCategoria->registrar($nombre, $detalle);
        if ($respuesta) {
            $arrResponse = array('status' => true, 'msg' => 'registrado correctamente');
        }else{
            $arrResponse = array('status' => false, 'msg' => 'Error, procedemos a registrar');
        } 
        }
    }
    echo json_encode($arrResponse);
}
