function validar_form(tipo) {
    let formId = document.getElementById("frm_produc") ? "frm_produc" : "frm_edit_produc";
    let form = document.getElementById(formId);
    let codigo = document.getElementById("codigo").value;
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
    let precio = document.getElementById("precio").value;
    let stock = document.getElementById("stock").value;
    let fecha_vencimiento = document.getElementById("fecha_vencimiento").value;
    let id_categoria = document.getElementById("id_categoria").value;

    //let imagen = document.getElementById("imagen").value;

    //let imagen = document.getElementById("imagen").value;
    //let id_proveedor = document.getElementById("id_proveedor").value;

    if (codigo == "" || nombre == "" || detalle == "" || precio == "" || stock == "" || fecha_vencimiento == "" || id_categoria == "") {





        Swal.fire({
            title: 'Campos vacíos',
            icon: "Error",
            draggable: true

        });
        return;
    }

    if (tipo == "nuevo") {
        registrarProducto();
    }
    if (tipo == "actualizar") {
        actualizarProducto();
    }
}

if (document.querySelector('#frm_product')) {
    //evita que se envie el formulario
    let frm_product = document.querySelector('#frm_product');
    frm_product.onsubmit = function (e) {
        e.preventDefault();
        validar_form("nuevo");
    }
}

async function registrarProducto() {
    try {
        const frm_product = document.querySelector("#frm_product");
        const datos = new FormData(frm_product);
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            Swal.fire({
                icon: "success",
                title: "Éxito",
                text: json.msg
            });
            document.getElementById('frm_product').reset();

        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: json.msg
            });
        }
    } catch (error) {
        console.log("Error al registrar producto: " + error);
    }
}

function cancelar() {
    Swal.fire({
        icon: "warning",
        title: "¿Estás seguro?",
        text: "Se cancelará el registro",

    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = base_url + "?view=new-producto";
        }
    });
}

async function view_producto() {
    try {
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=mostrar_productos', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        let json = await respuesta.json();


        document.getElementById('content_products').innerHTML = '';

        if (json && json.length > 0) {

            json.forEach((producto, index) => {
                let tr = document.createElement("tr");

                tr.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${producto.codigo || ""}</td>
                    <td>${producto.nombre || ""}</td>
                    <td>${producto.detalle || ""}</td>
                    <td>${producto.precio || ""}</td>
                    <td>${producto.stock || ""}</td>
                    <td>${producto.fecha_vencimiento || ""}</td>
                    <td>${producto.categoria || ""}</td>
                    <td><svg id="barcode${producto.id}"></svg></td>
                    <td>
                        <a href="${base_url}producto-edit/${producto.id}" class="btn btn-primary">Editar</a>
                        <button class="btn btn-danger" onclick="eliminar(${producto.id})">Eliminar</button>
                    </td>`;
                document.getElementById('content_products').appendChild(tr);
            });

            json.forEach(producto => {
                JsBarcode("#barcode" + producto.id, String(producto.codigo || ""), {
                    Width: 2,
                    height: 40
                });
            });

        } else {
            document.getElementById('content_products').innerHTML = `
                <tr>
                    <td colspan="10">No hay productos disponibles</td>
                </tr>`;
        }

    } catch (error) {
        console.log(error);
        document.getElementById('content_products').innerHTML = `
            <tr>
                <td colspan="10">Error al cargar productos</td>
            </tr>`;
    }
}

if (document.getElementById('content_products')) {
    view_producto();
}


async function edit_producto() {
    try {
        let id_producto = document.getElementById('id_producto').value;
        const datos = new FormData();
        datos.append('id_producto', id_producto);

        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (!json.status) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: json.msg
            });
            return;
        }
        document.getElementById('codigo').value = json.data.codigo;
        document.getElementById('nombre').value = json.data.nombre;
        document.getElementById('detalle').value = json.data.detalle;
        document.getElementById('precio').value = json.data.precio;
        document.getElementById('stock').value = json.data.stock;
        document.getElementById('fecha_vencimiento').value = json.data.fecha_vencimiento;
        document.getElementById('id_categoria').value = json.data.id_categoria;
        document.getElementById('id_proveedor').value = json.data.id_proveedor;


    } catch (error) {
        console.log(' ocurrio un error' + error);
    }
}

if (document.querySelector("#frm_edit_producto")) {
    let frm_edit_producto = document.querySelector("#frm_edit_producto");
    frm_edit_producto.onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}

async function actualizarProducto() {
    try {
        const datos = new FormData(document.getElementById('frm_edit_producto'));
        const idProducto = document.getElementById('id_producto').value;

        if (idProducto) {
            datos.append('id_producto', idProducto);
        } else {
            Swal.fire({
                title: "Error",
                text: "No se encontró el ID del producto.",
                icon: "error"
            });
            return;
        }

        for (let pair of datos.entries()) {
            console.log(`${pair[0]}: ${pair[1]}`);
        }

        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=actualizar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();
        console.log("Respuesta de actualización:", json);
        if (json.status) {
            Swal.fire({
                title: json.msg,
                icon: "success",
                draggable: true
            }).then(() => {
                // Redirigir después de cerrar el alert
                location.href = base_url + 'producto';
                // view_productos(); // Solo si quieres actualizar sin recargar
            });
        } else {
            Swal.fire({
                title: json.msg,
                icon: "error",
                draggable: true
            });
        }
    } catch (e) {
        console.error("Error al actualizar producto:", e);
        Swal.fire({
            title: "Error",
            text: "Error al actualizar: " + e.message,
            icon: "error"
        });
    }
}

async function eliminar(id) {
    Swal.fire({
        icon: "warning",
        title: "¿Estás seguro?",
        text: "Esta acción no se puede revertir",

    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                const datos = new FormData();
                datos.append('id_producto', id)
                let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=eliminar', {
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: datos
                });
                json = await respuesta.json();
                if (json.status) {
                    Swal.fire({
                        icon: "success",
                        title: "Eliminado",
                        text: json.msg
                    }).then(() => {
                        view_producto();
                    });

                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: json.msg
                    });
                }

            } catch (error) {
                console.log(' ocurrio un error' + error);
            }
        }
    });
}

async function cargar_categorias() {
    let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=ver_categorias', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache'

    });
    let json = await respuesta.json();
    let contenido = '<option>Seleccione</option>';
    json.data.forEach(categoria => {
        contenido += '<option value="' + categoria.id + '">' + categoria.nombre + '</option>';
    });
    //console.log(contenido);
    document.getElementById("id_categoria").innerHTML = contenido;
}


// cargar proveedor 
async function cargar_proveedores() {
    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=mostrar_proveedores', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache'
    });
    let json = await respuesta.json();
    let contenido = '<option>Seleccione</option>';
    json.data.forEach(proveedor => {
        contenido += '<option value="' + proveedor.id + '">' + proveedor.razon_social + '</option>';
    });
    //console.log(contenido);
    document.getElementById("id_proveedor").innerHTML = contenido;
}

async function listar_productos_venta() {
    try {
        let dato = document.getElementById('busqueda_venta').value;
        const datos = new FormData();
        datos.append('dato', dato);

        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=buscar_producto_venta', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        json = await respuesta.json();
        let contenidot = document.getElementById('productos_venta');

        if (json.status) {
            contenidot.innerHTML = ``;

            json.data.forEach(producto => {

                let producto_list = `
                <div class="card m-2 col-12">
                    <img src="${base_url + producto.imagen}" alt="" width="100%" height="150px">
                    <p class="card-text">${producto.nombre}</p>
                    <p>Precio: ${producto.precio}</p>
                    <p>Stock: ${producto.stock}</p>

                    <!-- ESTE BOTÓN ES LA CLAVE -->
                    <button onclick="agregar_producto_temporal(${producto.id}, ${producto.precio}, 1)" 
                        class="btn btn-success">
                        Agregar
                    </button>
                </div>`;

                let nueva_fila = document.createElement("div");
                nueva_fila.className = "div col-md-3 col-sm-6 col-xs-12";
                nueva_fila.innerHTML = producto_list;
                contenidot.appendChild(nueva_fila);
            });
        }
    } catch (e) {
        console.log('error en mostrar producto ' + e);
    }
}


if (document.getElementById('productos_venta')) {
    listar_productos_venta();
}

