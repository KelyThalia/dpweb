
<?php
require_once("../model/UsuarioModel.php");
$objPersona = new UsuarioModel();

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

if ($tipo == "registrar") {
    $nro_identidad = $_POST['nro_identidad'] ?? '';
    $razon_social = $_POST['razon_social'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $departamento = $_POST['departamento'] ?? '';
    $distrito = $_POST['distrito'] ?? '';
    $provincia = $_POST['provincia'] ?? '';
    $cod_postal = $_POST['cod_postal'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $rol = $_POST['rol'] ?? '';
    $password = password_hash($nro_identidad, PASSWORD_DEFAULT);

    if ($nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == ""
        || $provincia == "" || $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacíos');
    } else {
        $ExistePersona = $objPersona->ExistePersona($nro_identidad);
        if ($ExistePersona > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error, nro de documento ya existe');
        } else {
            $respuesta = $objPersona->registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, 
                $distrito, $provincia, $cod_postal, $direccion, $rol, $password);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'Registrado correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al registrar');
            }
        }
    }
    header('Content-Type: application/json');
    echo json_encode($arrResponse);
    exit;
}

if ($tipo == "iniciar_sesion") {
    $nro_identidad = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($nro_identidad == "" || $password == "") {
        $respuesta = array('status' => false, 'msg' => 'Error, campos vacíos');
    } else {
        $ExistePersona = $objPersona->ExistePersona($nro_identidad);
        if (!$ExistePersona) {
            $respuesta = array('status' => false, 'msg' => 'Error, usuario no registrado');
        } else {
            $persona = $objPersona->buscarPersonaPorNroIdentidad($nro_identidad);
            if ($persona && password_verify($password, $persona->password)) {
                session_start();
                $_SESSION['ventas_id'] = $persona->id;
                $_SESSION['ventas_usuario'] = $persona->razon_social;
                $respuesta = array('status' => true, 'msg' => 'Ok');
            } else {
                $respuesta = array('status' => false, 'msg' => 'Error, contraseña incorrecta');
            }
        }
    }
    header('Content-Type: application/json');
    echo json_encode($respuesta);
    exit;
}

if ($tipo == "ver_usuarios") {
    header('Content-Type: application/json');
    $usuarios = $objPersona->verUsuario();
    echo json_encode($usuarios);
    exit;
}

if ($tipo == "obtener_usuario") {
    header('Content-Type: application/json');
    $id = $_GET['id'] ?? '';
    $usuario = $objPersona->obtenerUsuarioPorId($id);
    echo json_encode($usuario);
    exit;
}

if ($tipo == "actualizar_usuario") {
    $data = $_POST;
    $nro = $data['nro_identidad'] ?? '';
    $id_actual = $data['id_persona'] ?? '';

    $verificar = $objPersona->buscarPorDocumento($nro);

    if ($verificar && $verificar['id'] != $id_actual) {
        echo json_encode(['status' => false, 'msg' => 'Este número de documento ya está registrado con otro usuario.']);
    } else {
        $actualizado = $objPersona->actualizarPersona($data);
        echo json_encode(['status' => $actualizado, 'msg' => $actualizado ? 'Usuario actualizado correctamente' : 'Error al actualizar']);
    }
    exit;
}