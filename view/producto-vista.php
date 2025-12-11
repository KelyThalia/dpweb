<div class="container-fluid mt-4 row">
    <h2 class="text-center text-primary mb-4">PRODUCTOS EN LÍNEA</h2>

    <!-- Sección izquierda: productos -->
    <div class="col-7">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Productos</h5>
                <div class="col-9">
                    <div class="card-body row">
                        <h5 class="card-title">buscra producto</h5>
                        <div class="col-md-6">
                            <input type="text" class="from-control col-md-12" placeholder="buscar productos"
                                id="busqueda_venta" onkeyup="listar_productos_venta();">

                            <input type="hidden" id="id_producto_venta">
                            <input type="hidden" id="producto_precio_venta">
                            <input type="hidden" id="producto_cantidad_venta" .value="1">

                        </div>

                    </div>

                </div>
                <div class="row container-fluid" id="productos_venta">
                    <!-- Aquí se cargarán los productos -->
                </div>
            </div>
        </div>
    </div>

    <!-- Sección derecha: carrito / lista de compra -->
    <div class="col-5">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Lista de Compra</h5>

                <!-- RESPONSIVE en esta parte  -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th>Acción</th>
                            </tr>
                        </thead>

                        <tbody id="tablaCarrito"></tbody>
                    </table>
                </div>


                <hr>

                <div class="text-end">

                    <h5>Subtotal: S/ <span id="subtotal_final">0.00</span></h5>
                    <h5>IGV (18%): S/ <span id="igv_final">0.00</span></h5>
                    <h4>Total: S/ <span id="total_final">0.00</span></h4>

                    <div class="mt-3">
                        <button id="btn_ver_carrito" class="btn btn-info me-2">Ver Detalle</button>
                        <button class="btn btn-success">Realizar Venta</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Script -->
<script src="<?php echo BASE_URL; ?>view/function/venta.js"></script>
<script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
<script>
    let input = document.getElementById("busqueda_venta");
    input.addEventListener('keydown', (event) => {
        if (event.key == 'Enter') {
            agregar_producto_temporal();
        }
    })
    listarTemporales();
</script>