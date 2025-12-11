let productos_venta = [];
let id = 2;
let id2 = 4;
let producto = {};
producto.nombre = "Producto A";
producto.precio = 100;
producto.cantidad = 2;
productos_venta.push(producto);
//productos_venta[id]=producto;
console.log(productos_venta);

let producto2 = {};
producto2.nombre = "Producto B";
producto2.precio = 200;
producto2.cantidad = 1;
//productos_venta.push(producto);

productos_venta[id] = producto;
productos_venta[id2] = producto2;
console.log(productos_venta);

console.log(productos_venta);



async function agregar_producto_temporal(id, precio, cantidad) {
    const datos = new FormData();
    datos.append('id_producto', id);
    datos.append('precio', precio);
    datos.append('cantidad', cantidad);

    try {
        let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=registrarTemporal', {
            method: 'POST',
            body: datos
        });

        let json = await respuesta.json();

        if (json.status) {
            if (json.msg === 'registrado') {
                Swal.fire("Agregado al carrito");
            } else {
                Swal.fire("Actualizado");
            }

            if (typeof actualizarCarrito === 'function') actualizarCarrito();
        }
    } catch (e) {
        console.log(e);
    }
}




document.addEventListener('DOMContentLoaded', actualizarCarrito);



async function eliminar_temporal(id) {

    const datos = new FormData();
    datos.append('id', id);

    let res = await fetch(base_url + 'control/ventaController.php?tipo=eliminar', {
        method: 'POST',
        body: datos
    });

    let json = await res.json();

    if (json.status) {
        actualizarCarrito();
        Swal.fire({ icon: "success", title: "Producto eliminado" })

    } else {
        Swal.fire({ icon: "error", title: "Error al eliminar" })
    }
    //await actualizarCarrito();
}

async function actualizarCarrito() {
    try {
        let res = await fetch(base_url + 'control/ventaController.php?tipo=listarTemporal');
        let json = await res.json();

        if (json.status) {

            let rows = "";
            let subtotalGeneral = 0;

            json.data.forEach(p => {

                let subtotal = p.precio * p.cantidad;
                subtotalGeneral += subtotal;

                rows += `
                <tr>
                    <td>${p.nombre}</td>

                    <td>
                        <input type="number"
                            class="form-control"
                            id="cantidad_${p.id}"
                            value="${p.cantidad}"
                            style="width: 70px;"
                            min="1"
                        >
                    </td>

                    <td>s/. ${p.precio}</td>
                    <td>s/. ${subtotal.toFixed(2)}</td>

                    <td>
                        <button onclick="eliminar_temporal(${p.id})" class="btn btn-danger btn-sm">
                            Eliminar
                        </button>
                    </td>
                </tr>`;
            });

            // Insertamos en la tabla
            document.getElementById("tablaCarrito").innerHTML = rows;

            // Cálculos finales
            let igv = subtotalGeneral * 0.18;
            let totalFinal = subtotalGeneral + igv;

            document.getElementById("subtotal_final").textContent = subtotalGeneral.toFixed(2);
            document.getElementById("igv_final").textContent = igv.toFixed(2);
            document.getElementById("total_final").textContent = totalFinal.toFixed(2);
        }
    } catch (error) {
        console.log(error);
    }
}

document.addEventListener('DOMContentLoaded', actualizarCarrito);

