/*Cada línea busca un campo del formulario HTML por su ID 
(como nro_identidad, correo, etc.) y guarda su valor en una variable.*/
//include("../config/config.php");
function validar_form() {
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
        alert("Error: Existen campos vacios");
        return;
    }/*Aquí se verifica si alguno de los campos está vacío. */
    registarUsuario();
} /* El operador || significa "o",
   así que si cualquiera de los campos es una--
    cadena vacía (""), entra al bloque if. */

/* Evita que se envie el formulario 
MANEJO DEL ENVIO DEL FORMULARIO
“Este código se asegura de que el formulario con ID frm_user no se envíe automáticamente.
 En vez de eso, cuando el usuario hace clic en enviar, se ejecuta una función que primero detiene 
 el envío y luego llama a validar_form(). 
Esta validación garantiza que todos los campos estén llenos antes de registrar al usuario.”*/


if (document.querySelector('#frm_user')) { /* verifica si existe un formulario con el ID frm_user en el documento HTML.document.querySelector('#frm_user') busca el formulario.Si existe, entra al bloque if. */
    let frm_user = document.querySelector('#frm_user'); /* Aquí se guarda una referencia al formulario en la variable frm_user */
    frm_user.onsubmit = function (e) { /*Se define qué pasará cuando el formulario se intente enviar (evento submit). */
        e.preventDefault(); /*Esto detiene el comportamiento predeterminado del formulario, que sería enviarlo directamente al servidor y recargar la página.En lugar de eso, queremos validar los datos primero. */
        validar_form(); /* Aquí se llama a la función validar_form() que hemos definido antes. Esta función valida los campos del formulario y, si todo está bien, llama a registarUsuario() para enviar los datos al servidor. */
    }
}

async function registarUsuario() {
    try {
        // capturar campos de formulario(html)

        const datos = new FormData(frm_user);
        // enviar datos al controlador 
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        }); //ALERTA EN UNA CONDICION (TRUE) (FALSE)
        // ----
        let json = await respuesta.json();
        if (json.status) {
            //validamos que json.status sea igual tru , si es false ya 
            alert(json.msg);//sea registrado registrado
            document.getElementById('frm_user').reset();
        } else {
            alert(json.msg);
        }

    } catch (e) {
        console.log("Error al registrar usuario" + e);

    }
    /*“Esta función registrarUsuario se encarga de enviar los datos del formulario al servidor
    usando JavaScript moderno con fetch. Primero recoge todos los datos con FormData, luego los
     envía mediante una solicitud POST a un archivo PHP. Espera la respuesta y muestra un mensaje
    de éxito o error dependiendo del resultado. Si ocurre un problema técnico, lo muestra en la consola del navegador.” */
}
async function iniciar_secion() {
    let usuario = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (usuario == "" || password == "") {
        alert("Error, campos vacios!")
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

async function view_users() {
    try {
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver_usuarios', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        let usuarios = await respuesta.json();
        console.log("Usuarios recibidos:", usuarios); // <-- para depurar

        let tbody = document.getElementById('content_users');
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
                 <a href="`+ base_url+`edit_user/`+usuario.id+`">Editar</a>
                </td>
            </tr>
        `).join('');

        tbody.innerHTML = filasHTML;

    } catch (error) {
        console.error("Error al obtener usuarios:", error);
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "No se pudieron cargar los usuarios."
        });
    }
}
/* capturar en valor con js y enviar al controlador mostrar en un formulario para poder actualizar*/
if (document.getElementById('content_users')) {
    view_users();
    
}
