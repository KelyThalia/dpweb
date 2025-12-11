<?php
require_once("../model/VentaModel.php");
require_once("../model/productoModel.php");

$objProducto = new ProductoModel();
$objVenta = new VentaModel();

$tipo = $_GET['tipo'];


if ($tipo == "registrarTemporal") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $id_producto = $_POST['id_producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $b_producto = $objVenta->buscarTemporal($id_producto);

    if ($b_producto) {
        $nueva_cantidad = $b_producto->cantidad + 1;
        $objVenta->actualizarCantidadTemporal($id_producto, $nueva_cantidad);
        $respuesta = array('status' => true, 'msg' => 'actualizado');
    } else {
        $registro = $objVenta->registrar_temporal($id_producto, $precio, $cantidad);
        $respuesta = array('status' => true, 'msg' => 'registrado');
    }
    echo json_encode($respuesta);
}




if ($tipo == "ver") {
    $respuesta = array('status' => false, 'msg' => '');
    $id_producto = $_POST['id_producto'];
    $producto = $objVenta->verTemporal($id_producto);
    if ($producto) {
        $respuesta['status'] = true;
        $respuesta['data'] = $producto;
    } else {
        $respuesta['msg'] = "Error, producto no encontrado";
    }
    echo json_encode($respuesta);
}


if ($tipo == "eliminar") {
    $id = $_POST['id'];
    $delete = $objVenta->eliminarTemporalVenta($id);

    if ($delete) {
        $respuesta['status'] = true;
        $respuesta['msg'] = "Producto eliminado";
    } else {
        $respuesta['msg'] = "Error al eliminar";
    }

    echo json_encode($respuesta);
}

if ($tipo == "listarTemporal") {
    $temporales = $objVenta->mostrarProductosTemporal();
    $respuesta = array('status' => true,'data' => $temporales);
    echo json_encode($respuesta);
}
if ($tipo == "actualizar_cantidad") {
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
   $consulta = $objVenta->actualizarCantidadTemporalBYid($id, $cantidad);
    if ($consulta) {
        $respuesta = array('status' => true, 'msg' => 'success');

    }else{
        $respuesta = array('status' => false, 'msg' => 'error');
    }
    echo json_encode($respuesta);
}


