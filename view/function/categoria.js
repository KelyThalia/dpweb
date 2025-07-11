function validar_form() {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
   

    if (nombre == "" || detalle ==""){
        alert("Error: Existen campos vacios");
        return;
    }
   registarCategoria ();
}

// Evita que se envie el formulario xd

if (document.querySelector('#frm_Categoria')) {
    let frm_Categoria = document.querySelector('#frm_Categoria');
    frm_Categoria.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }

}

async function registarCategoria() {
    try {
        // capturar campos de formulario(html)

        const datos = new FormData(frm_Categoria);
        // enviar datos al controlador 
        let respusta = await fetch (base_url + 'control/CategoriaController.php?tipo=registrar' ,{
            method: 'POST',
            mode:'cors',
            cache: 'no-cache',
            body: datos
        }); //ALERTA EN UNA CONDICION (TRUE) (FALSE)
        let json = await respusta.json();
        if (json.status) {
            //validamos que json.status sea igual tru , si es false ya 
            alert(json.msg);//sea registrado registrado
            document.getElementById('frm_Categoria').reset();
        }else{
            alert(json.msg);
        }

    } catch (e) {
        console.log("Error al registrar Categoria" + e);

    }

}

//finalizamos hacer todo el proceso de registro siglo de 
//vista
//html
//validar con js
//controlador recivir validar campos vacios devolver hacia la vista una ves validado enviar al modelo / ejecutar y notificar al controlador / controladoer validamos la respuesta debolver a ja
//en jv validar la respuesta si es correcto mostrar notificacion igualmento si se correcto
//MODELO VISTA CONTROLADR PARA EL USUARIO