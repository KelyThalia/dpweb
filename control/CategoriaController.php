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
            $arrResponse = 
            
            
            array('status' => false, 'msg' => 'Error, procedemos a registrar');
        } 
        }
    }
    echo json_encode($arrResponse);
}

if ($tipo == "mostrar_categorias") {
    $categorias = $objCategoria->mostrarCategorias();
    $respuesta = array('status' => true, 'msg' => '', 'data' => $categorias);
    header('Content-Type: application/json');
    echo json_encode($respuesta);
}

if ($tipo == "ver") {
    $respuesta = array('status' => false, 'msg' => 'fallo en el controlador');
    $id_categoria = $_POST['id_categoria'];
    $categoria = $objCategoria->ver($id_categoria);
    if($categoria){
        $respuesta ['status'] = true;
        $respuesta ['data'] = $categoria;
    }else {
        $respuesta['msg'] = "Error, categoria no existe";
    }
    echo json_encode($respuesta);
}


if ($tipo == "actualizar") {
    $id_categoria = $_POST['id_categoria'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];

    if ($id_categoria == "" || $nombre == "" || $detalle == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    }else {
        $existeID = $objCategoria->ver($id_categoria);
        if(!$existeID){
            $arrResponse = array('status' =>false, 'msg' => 'Error, categoria no existe');
            echo json_encode($arrResponse);
            exit; 
        }else {
            $actualizar = $objCategoria->actualizar($id_categoria, $nombre, $detalle);
            if($actualizar){
                $arrResponse = array('status' => true, 'msg' => 'Actualizado correctamente');
                
            }else {
                $arrResponse = array('status' => false, 'msg' => $actualizar);  
            }
            echo json_encode($arrResponse);
            exit;
        }
    }
}

if($tipo == "eliminar"){
    $id_categoria = $_POST['id_categoria'];
    if($id_categoria == ""){
        $arrResponse = array('status' => false, 'msg' => 'Error, id vacio');
    }else{
        $eliminar = $objCategoria->eliminar($id_categoria);
        if ($eliminar) {
            $arrResponse = array('status' => true, 'msg' => 'Categoria eliminada');
        }else{
            $arrResponse = array('status' => false, 'msg' => 'Error al eliminar categoria');
        }
        echo json_encode($arrResponse);
        exit;
    }
}