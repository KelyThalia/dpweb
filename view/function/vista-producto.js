
async function cargarProductosTienda() {
    const contenedor = document.getElementById('contenedor_productos');

    // Mostrar loader
    contenedor.innerHTML = `
        <div class="col-12 text-center text-muted">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="mt-2">Cargando productos...</p>
        </div>
    `;

    try {
        // Llamada al controlador PHP
        const respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=mostrar_productos', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        if (!respuesta.ok) {
            throw new Error('Error al obtener datos del servidor');
        }

        const productos = await respuesta.json();

        // Validar si hay productos
        if (!productos || productos.length === 0) {
            contenedor.innerHTML = `
                <div class="col-12 text-center">
                    <h4 class="text-muted">No hay productos disponibles</h4>
                </div>
            `;
            return;
        }

        let html = '';

        productos.forEach(p => {
            // Asegurar campos y ruta de imagen
            const imagen = p.imagen && p.imagen.trim() !== ""
                ? `${base_url}${p.imagen}`
                : 'https://via.placeholder.com/300x200?text=Sin+Imagen';

            html += `
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="${imagen}" class="card-img-top" alt="${p.nombre}" style="height: 220px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">${p.nombre}</h5>
                            <p class="card-text text-muted small">${p.detalle ?? 'Sin descripción disponible'}</p>
                            <p class="card-text text-success fw-bold fs-5">S/ ${parseFloat(p.precio).toFixed(2)}</p>
                            <p class="card-text"><span class="badge bg-secondary">${p.categoria ?? 'Sin categoría'}</span></p>
                            <div class="mt-auto d-flex gap-1">
                                <a href="${base_url}producto-detalle/${p.id_producto}" class="btn btn-outline-primary btn-sm flex-fill">
                                    Ver Detalles
                                </a>
                                <button onclick="agregarAlCarrito(${p.id_producto})" class="btn btn-success btn-sm flex-fill">
                                    Carrito
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        contenedor.innerHTML = html;

    } catch (error) {
        console.error('Error al cargar los productos:', error);
        contenedor.innerHTML = `
            <div class="col-12 text-center text-danger">
                <h5>Error al cargar los productos</h5>
                <p>${error.message}</p>
            </div>
        `;
    }
}

// ====================================
// 🛒 FUNCIÓN AUXILIAR
// ====================================
function agregarAlCarrito(idProducto) {
    alert('Producto ' + idProducto + ' agregado al carrito (demo)');
}

// ====================================
// 🚀 EJECUCIÓN AUTOMÁTICA
// ====================================
document.addEventListener('DOMContentLoaded', cargarProductosTienda);
