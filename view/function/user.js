function validar_form() {
    let nro_documento = document.getElementById("nro_identidad").value;
    let razon_social = document.getElementById("razon_social").value;
    let telefono = document.getElementById("telefono").value;
    let correo = document.getElementById("correo").value;
    let departamento = document.getElementById("departamento").value;
    let provincia = document.getElementById("provincia").value;
    let distrito = document.getElementById("distrito").value;
    let cod_postal = document.getElementById("cod_postal").value;
    let direccion = document.getElementById("direccion").value;
    let rol = document.getElementById("rol").value;

    if (nro_documento == "" || razon_social == "" || telefono == "" || correo == "" || departamento == "" 
        || provincia == "" || distrito == "" || cod_postal == "" || direccion == "" || rol == "") {
        alert("Error: Existen campos vacios");
        return;
    }
   registarUsuario ();
}

// Evita que se envie el formulario xd

if (document.querySelector('#frm_user')) {
    let frm_user = document.querySelector('#frm_user');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }

}

async function registarUsuario() {
    try {
        // capturar campos de formulario(html)

        const datos = new FormData(frm_user);
        // enviar datos al controlador 
        let respusta = await fetch (base_url + 'control/UsuarioController.php?tipo=registrar' ,{
            method: 'POST',
            mode:'cors',
            cache: 'no-cache',
            body: datos
        }); //ALERTA EN UNA CONDICION (TRUE) (FALSE)
        let json = await respusta.json();
        if (json.status) {
            //validamos que json.status sea igual tru , si es false ya 
            alert(json.msg);//sea registrado registrado
            document.getElementById('frm_user').reset();
        }else{
            alert(json.msg);
        }

    } catch (e) {
        console.log("Error al registrar usuario" + e);

    }

}
console.log()
//finalizamos hacer todo el proceso de registro siglo de 
//vista
//html
//validar con js
//controlador recivir validar campos vacios devolver hacia la vista una ves validado enviar al modelo / ejecutar y notificar al controlador / controladoer validamos la respuesta debolver a ja
//en jv validar la respuesta si es correcto mostrar notificacion igualmento si se correcto
//MODELO VISTA CONTROLADR PARA EL USUARIO