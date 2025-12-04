<?php
require_once("../model/ventaModel.php");
require_once("../model/productoModel.php");


$objVenta = new ventaModel();
$objProducto = new productoModel();




$tipo = $_GET['tipo'] ?? '';
if ($tipo == "registrarTemporal") {
    $id_producto = $_POST ['id_producto'];
    $precio = $_POST ['precio'];
    $cantidad = $_POST['cantidad'];


    $b_producto = $objVenta->buscarTemporal($id_producto, $n_cantidad);
    if ($b_producto) {
        $n_cantidad =$b_producto->cantidad+1;
       $objVenta->actualizarCantidadTemporal($id_producto, $cantidad);
       $respuesta = array('status' => true, 'msg'=>'');

    }else {
        $registro = $objVenta->registrar_temporal($id_producto, $precio, $cantidad);
       $respuesta = array('status' => true, 'msg'=>'registrado');
    }
    echo json_encode($respuesta);
}