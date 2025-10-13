// ✅ Validar formulario antes de enviar
function validar_form(tipo) {
    let nombre = document.getElementById("nombre").value.trim();
    let detalle = document.getElementById("detalle").value.trim();

    if (nombre === "" || detalle === "") {
        Swal.fire('Campos incompletos', 'Completa todos los campos', 'warning');
        return;
    }
    if (tipo === "nuevo") registrarCategoria();
    if (tipo === "actualizar") actualizarCategoria();
}

// ✅ Evitar envío automático del formulario nuevo
if (document.querySelector('#frm_categoria')) {
    let frm_categorie = document.querySelector('#frm_categoria');
    frm_categorie.onsubmit = function (e) {
        e.preventDefault();
        validar_form("nuevo");
    }
}

// ✅ Registrar Categoría
async function registrarCategoria() {
    try {
        const datos = new FormData(document.querySelector("#frm_categoria"));
        let respuesta = await fetch(base_url + 'control/categoriaController.php?tipo=registrar', { method: 'POST', body: datos });
        let json = await respuesta.json();
        if (json.status) {
            Swal.fire('¡Registrado!', json.msg, 'success');
            document.getElementById('frm_categoria').reset();
            view_categoria();
        } else {
            Swal.fire('Error', json.msg, 'error');
        }
    } catch (error) {
        console.log("Error: " + error);
    }
}

// ✅ Cancelar registro
function cancelar() {
    Swal.fire({
        title: 'Cancelar?',
        showCancelButton: true,
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
        icon: 'question'
    }).then((result) => {
        if (result.isConfirmed) window.location.href = base_url + "?view=new-categoria";
    });
}

// ✅ Listar categorías
async function view_categoria() {
    try {
        let respuesta = await fetch(base_url + 'control/categoriaController.php?tipo=mostrar_categorias', { method: 'POST' });
        let json = await respuesta.json();
        let tbody = document.getElementById('content_categoria');
        if (json && json.length > 0) {
            let html = '';
            json.forEach((c, i) => {
                html += `<tr>
                    <td>${i + 1}</td>
                    <td>${c.nombre || ''}</td>
                    <td>${c.detalle || ''}</td>
                    <td>
                        <a href="${base_url}categoria-edit/${c.id}" class="btn btn-primary btn-sm">Editar</a>
                        <button onclick="eliminar(${c.id})" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>`;
            });
            tbody.innerHTML = html;
        } else {
            tbody.innerHTML = '<tr><td colspan="4">Sin categorías</td></tr>';
        }
    } catch (error) {
        console.log(error);
        document.getElementById('content_categoria').innerHTML = '<tr><td colspan="4">Error al cargar</td></tr>';
    }
}

if (document.getElementById('content_categoria')) view_categoria();

// ✅ Editar categoría
async function edit_categoria() {
    try {
        let id = document.getElementById('id_categoria').value;
        const datos = new FormData();
        datos.append('id_categoria', id);
        let respuesta = await fetch(base_url + 'control/categoriaController.php?tipo=ver', { method: 'POST', body: datos });
        let json = await respuesta.json();
        if (!json.status) return Swal.fire('Error', json.msg, 'error');
        document.getElementById('nombre').value = json.data.nombre;
        document.getElementById('detalle').value = json.data.detalle;
    } catch (error) { console.log(error); }
}

// ✅ Actualizar categoría
if (document.querySelector("#frm_edit_categoria")) {
    document.querySelector("#frm_edit_categoria").onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}

async function actualizarCategoria() {
    const datos = new FormData(document.querySelector("#frm_edit_categoria"));
    let respuesta = await fetch(base_url + 'control/categoriaController.php?tipo=actualizar', { method: 'POST', body: datos });
    let json = await respuesta.json();
    if (!json.status) Swal.fire('Error', json.msg || 'Error al actualizar', 'error');
    else Swal.fire('Actualizado', json.msg, 'success').then(() => view_categoria());
}

// ✅ Eliminar categoría
async function eliminar(id) {
    Swal.fire({
        title: 'Eliminar categoría?',
        text: 'No se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then(async (result) => {
        if (!result.isConfirmed) return;
        try {
            const datos = new FormData();
            datos.append('id_categoria', id);
            let respuesta = await fetch(base_url + 'control/categoriaController.php?tipo=eliminar', { method: 'POST', body: datos });
            let json = await respuesta.json();
            if (json.status) Swal.fire('Eliminado', json.msg, 'success').then(() => view_categoria());
            else Swal.fire('Error', json.msg, 'error');
        } catch (error) { console.log(error); }
    });
}
