<?php
require_once("../model/ProductoModel.php");
require_once("../model/CategoriaModel.php");


$objProducto = new ProductoModel();
$objCategoria = new CategoriaModel();



// Forzar salida JSON
header('Content-Type: application/json; charset=utf-8');

// Evitar que los warnings rompan el JSON
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

// Capturar errores fatales al final de la ejecución y devolver JSON
register_shutdown_function(function () {
    $err = error_get_last();
    if ($err !== null) {
        http_response_code(500);
        header('Content-Type: application/json; charset=utf-8');
        $msg = isset($err['message']) ? $err['message'] : 'Error fatal';
        echo json_encode(['status' => false, 'msg' => 'Fatal error: ' . $msg]);
    }
});


$tipo = $_GET['tipo'] ?? '';

if ($tipo == "registrar") {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_categoria  = $_POST['id_categoria'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $id_proveedor = $_POST['id_proveedor'];

    if (
        empty($codigo) || empty($nombre) || empty($detalle) || empty($precio) ||
        empty($stock) || empty($id_categoria) || empty($fecha_vencimiento) || empty($id_proveedor)
    ) {
        echo json_encode(['status' => false, 'msg' => 'Error, campos vacíos']);
        exit;
    }

    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['status' => false, 'msg' => 'Error, imagen no recibida']);
        exit;
    }

    $existeProducto = $objProducto->existeProducto($codigo);
    if ($existeProducto > 0) {
        echo json_encode(['status' => false, 'msg' => 'Error, código de producto ya existe']);
        exit;
    }

    $file = $_FILES['imagen'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $extPermitidas = ['jpg', 'jpeg', 'png'];

    if (!in_array($ext, $extPermitidas)) {
        echo json_encode(['status' => false, 'msg' => 'Formato de imagen no permitido']);
        exit;
    }
    if ($file['size'] > 5 * 1024 * 1024) {
        echo json_encode(['status' => false, 'msg' => 'La imagen supera 5MB']);
        exit;
    }

    $carpetaUploads = "../uploads/productos/";
    if (!is_dir($carpetaUploads)) {
        @mkdir($carpetaUploads, 0775, true);
    }

    $nombreUnico = uniqid('prod_') . '.' . $ext;
    $rutaFisica = $carpetaUploads . $nombreUnico;
    $rutaRelativa = "uploads/productos/" . $nombreUnico;

    if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
        echo json_encode(['status' => false, 'msg' => 'No se pudo guardar la imagen']);
        exit;
    }

    $respuesta = $objProducto->registrar($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento, $rutaRelativa, $id_proveedor);

    echo json_encode([
        'status' => $respuesta ? true : false,
        'msg' => $respuesta ? 'Registrado correctamente' : 'Error, fallo en registro',
        'imagen' => $respuesta ? $rutaRelativa : null
    ]);
    exit;
}

if ($tipo == "mostrar_productos") {
    $productos = $objProducto->mostrarProductos();
    echo json_encode($productos);
    exit;
}

if ($tipo == "ver") {
    //print_r($_POST);
    $respuesta = array('status' => false, 'msg' => '');
    $id_producto = $_POST['id_producto'];
    $producto = $objProducto->ver($id_producto);
    if ($producto) {
        $respuesta['status'] = true;
        $respuesta['data'] = $producto;
    } else {
        $respuesta['msg'] = 'Error, producto no existe';
    }
    echo json_encode($respuesta);
}

if ($tipo == "actualizar") {
    $id_producto = $_POST['id_producto'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $id_categoria = $_POST['id_categoria'];

    // **NO VALIDAR id_proveedor si NO existe en el formulario**
    if (
        empty($id_producto) || empty($codigo) || empty($nombre) || empty($detalle) ||
        empty($precio) || empty($stock) || empty($fecha_vencimiento) ||
        empty($id_categoria)
    ) {
        echo json_encode(['status' => false, 'msg' => 'Error, campos vacíos']);
        exit;
    }

    $producto = $objProducto->ver($id_producto);
    if (!$producto) {
        echo json_encode(['status' => false, 'msg' => 'Error, producto no existe']);
        exit;
    }

    // Imagen
    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        $imagen = $producto->imagen;
    } else {
        $file = $_FILES['imagen'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, ['jpg','jpeg','png'])) {
            echo json_encode(['status'=>false,'msg'=>'Formato inválido']);
            exit;
        }

        $carpeta = "../uploads/productos/";
        if(!is_dir($carpeta)){
            mkdir($carpeta,0775,true);
        }

        $nuevo = uniqid('prod_').'.'.$ext;
        move_uploaded_file($file['tmp_name'],$carpeta.$nuevo);
        $imagen = "uploads/productos/".$nuevo;
    }

    $actualizar = $objProducto->actualizar(
        $id_producto, $codigo, $nombre, $detalle,
        $precio, $stock, $id_categoria, $fecha_vencimiento,
        $producto->id_proveedor,  // mantener proveedor
        $imagen
    );

    echo json_encode([
        'status'=> $actualizar ? true : false,
        'msg'=> $actualizar ? 'Actualizado correctamente' : 'Error al actualizar'
    ]);
    exit;
}


if ($tipo == "eliminar") {
    $id_producto = $_POST['id_producto'];
    if (empty($id_producto)) {
        echo json_encode(['status' => false, 'msg' => 'Error, id vacío']);
        exit;
    }
    $eliminar = $objProducto->eliminar($id_producto);
    echo json_encode([
        'status' => $eliminar ? true : false,
        'msg' => $eliminar ? 'Producto eliminado' : 'Error al eliminar producto'
    ]);
    exit;
}



if ($tipo == "buscar_producto_venta") {
    $dato = $_POST['dato'];
    $respuesta = array('status' => false, 'msj'=>'fallo en el controlador');
    $productos = $objProducto->buscarProductoByNombreOrCodigo($dato);
    
       $respuesta = array('status' => true, 'data'=>$productos);
    
     echo json_encode($respuesta);
 }
?>
