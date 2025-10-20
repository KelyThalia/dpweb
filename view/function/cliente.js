/*Cada línea busca un campo del formulario HTML por su ID 
(como nro_identidad, correo, etc.) y guarda su valor en una variable.*/

function validar_form(tipo) {
    let nro_documento = document.getElementById("nro_identidad").value; /*nro_documento guarda el valor del campo número de documento. */
    let razon_social = document.getElementById("razon_social").value;
    let telefono = document.getElementById("telefono").value;
    let correo = document.getElementById("correo").value; /*correo guarda el valor del campo correo electrónico. */
    let departamento = document.getElementById("departamento").value;
    let provincia = document.getElementById("provincia").value;
    let distrito = document.getElementById("distrito").value;
    let cod_postal = document.getElementById("cod_postal").value;
    let direccion = document.getElementById("direccion").value;
    let rol = document.getElementById("rol").value;
    /*VALIDACON DE CAMPOS VACIOS */
    if (nro_documento == "" || razon_social == "" || telefono == "" || correo == "" || departamento == ""
        || provincia == "" || distrito == "" || cod_postal == "" || direccion == "" || rol == "") {

        Swal.fire({
            title: "ERROR?",
            text: "¡Ups! Hay campos vacíos.",
            icon: "question"
        });
        return;
    }
    if (tipo=="nuevo") {
        registrarCliente();   
    }
      if (tipo=="actualizar") {
        actualizarCliente();   
    }
    /*Aquí se verifica si alguno de los campos está vacío. */
 
} 

if (document.querySelector('#frm_cliente')) { /* verifica si existe un formulario con el ID frm_user en el documento HTML.document.querySelector('#frm_user') busca el formulario.Si existe, entra al bloque if. */
    let frm_cliente = document.querySelector('#frm_cliente'); /* Aquí se guarda una referencia al formulario en la variable frm_user */
    frm_cliente.onsubmit = function (e) { /*Se define qué pasará cuando el formulario se intente enviar (evento submit). */
        e.preventDefault(); /*Esto detiene el comportamiento predeterminado del formulario, que sería enviarlo directamente al servidor y recargar la página.En lugar de eso, queremos validar los datos primero. */
        validar_form("nuevo"); /* Aquí se llama a la función validar_form() que hemos definido antes. Esta función valida los campos del formulario y, si todo está bien, llama a registarUsuario() para enviar los datos al servidor. */
    }
}

async function registrarCliente() {
    const form = document.getElementById("frm_cliente");
    const datos = new FormData(form);

    try {
        const response = await fetch(base_url + "control/UsuarioController.php?tipo=registrar", {
            method: "POST",
            body: datos
        });

        const result = await response.json();

        if (result.status) {
            Swal.fire({
                icon: "success",
                title: "Éxito",
                text: result.msg
            });
            form.reset();
        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: result.msg
            });
        }

    } catch (error) {
        console.error("Error al registrar cliente:", error);
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Ocurrió un problema al registrar el cliente."
        });
    }
}

async function iniciar_sesion() {
    let usuario = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (usuario == "" || password == "") {
        Swal.fire({
            icon: "error",
            title: "Error, campos vacios!"

        });
        return;

    }
    try {
        const datos = new FormData(frm_login);
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=iniciar_sesion', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            location.replace(base_url + 'new-user');
           
            //validamos que json.status sea igual tru , si es false ya 
            //sea registrado registrado

        } else {
            alert(json.msg);
        }
    }
    catch (error) {
        console.log(error);
    }

}
async function obtenerUsuarioPorId(id) {
    try {
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=obtener_usuario&id=' + id);
        let usuario = await respuesta.json();
        document.getElementById('id_persona').value = usuario.id || '';
        document.getElementById('nro_identidad').value = usuario.nro_identidad || '';
        document.getElementById('razon_social').value = usuario.razon_social || '';
        document.getElementById('telefono').value = usuario.telefono || '';
        document.getElementById('correo').value = usuario.correo || '';
        document.getElementById('departamento').value = usuario.departamento || '';
        document.getElementById('provincia').value = usuario.provincia || '';
        document.getElementById('distrito').value = usuario.distrito || '';
        document.getElementById('cod_postal').value = usuario.cod_postal || '';
        document.getElementById('direccion').value = usuario.direccion || '';
        document.getElementById('rol').value = usuario.rol || '';
    } catch (e) {
        console.error("Error al obtener usuario por ID", e); //  AHORA ESTÁ BIEN
    }
}

async function view_cliente() {
    try {
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver_cliente', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        // Verificar si el servidor devolvió algo
        if (!respuesta.ok) throw new Error("Error HTTP: " + respuesta.status);

        let resultado = await respuesta.json();
        console.log("Respuesta del servidor:", resultado);

        if (!resultado.status) {
            console.warn("Servidor respondió con error:", resultado.msg);
            Swal.fire({
                icon: "warning",
                title: "Atención",
                text: resultado.msg || "No hay clientes registrados."
            });
            return;
        }

        let usuarios = resultado.data; // ✅ AQUÍ está el array real

        let tbody = document.getElementById('content_cliente');
        tbody.innerHTML = '';

        let filasHTML = usuarios.map((usuario, index) => `
            <tr class="text-center">
                <td>${index + 1}</td>
                <td>${usuario.nro_identidad}</td>
                <td>${usuario.razon_social}</td>
                <td>${usuario.correo}</td>
                <td>${usuario.rol || 'Desconocido'}</td>
                <td>${usuario.estado || 'Activo'}</td>
                <td>
                    <a href="${base_url}edit-cliente/${usuario.id}" class="btn btn-sm btn-primary">Editar</a>
                    <button type="button" class="btn btn-danger" onclick="Eliminar(${usuario.id})">Eliminar</button>
                </td>
            </tr>
        `).join('');

        tbody.innerHTML = filasHTML;

    } catch (error) {
        console.error("Error al obtener clientes:", error);
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "No se pudieron cargar los clientes."
        });
    }
}

if (document.getElementById('content_cliente')) {
    view_cliente();
}


if (document.getElementById('content_cliente')) {
    view_cliente(); // ✅ ahora sí coincide el nombre
}


async function edit_cliente() {
    try {
        let id_persona = document.getElementById('id_persona').value;
        const datos = new FormData();
        //para agregar como un hijos.
        datos.append('id_persona', id_persona);

        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        json = await respuesta.json();

        if (!json.status) {
            alert(jsn.msg);
            return; 
        }
        document.getElementById('nro_identidad').value = json.data.nro_identidad;
        document.getElementById('razon_social').value = json.data.razon_social;
        document.getElementById('telefono').value = json.data.telefono;
        document.getElementById('correo').value = json.data.correo;
        document.getElementById('departamento').value = json.data.departamento;
        document.getElementById('provincia').value = json.data.provincia;
        document.getElementById('distrito').value = json.data.distrito;
        document.getElementById('cod_postal').value = json.data.cod_postal;
        document.getElementById('direccion').value = json.data.direccion;
        document.getElementById('rol').value = json.data.rol;

    } catch (error) {
       console.log('oops, ocurrió un error'+error);
    }
}

if (document.getElementById('btn_guardar_cambios')) {
    document.getElementById('btn_guardar_cambios').addEventListener('click', function () {
        actualizarCliente(); // Llama a la función que hará el update
    });
}
if (document.querySelector('#frm_edit-cliente')) { 
    let frm_cliente = document.querySelector('#frm_edit-cliente'); 
    frm_cliente.onsubmit = function (e) { 
        e.preventDefault(); 
        validar_form("actualizar"); 
    }
}


async function actualizarCliente() {
   const datos = new FormData(frm_edit_cliente);
   let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=actualizar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (!json.status) {
            alert("Ooops. ocurrio un error al actualizar, intentelo nuevamente");
            console.log(json.msg);
            return;
            
        }else{
            alert(json.msg);
        }

    
}
async function fn_eliminar(id) {
    if (window.confirm("Confirmar eliminar?")) {
        eliminar(id);
    }
}

async function eliminar(id) {
    let datos = new FormData();
    datos.append('id_persona', id);
    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=eliminar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if (!json.status) {
        alert("Oooooops, ocurrio un error al eliminar persona, intentelo mas tarde");
        console.log(json.msg);
        return;
    }else{
        alert(json.msg);
        location.replace(base_url + 'users');
    }
}
