<div class="container-fluid mt-4 row">
    <h2 class="text-center text-primary mb-4">PRODUCTOS EN LÍNEA</h2>

    <!-- Sección izquierda: productos -->
    <div class="col-9">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Productos</h5>
                <div class="row container-fluid" id="productos_venta">
                    <!-- Aquí se cargarán los productos -->
                </div>
            </div>
        </div>
    </div>

    <!-- Sección derecha: carrito / lista de compra -->
    <div class="col-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Lista de Compra</h5>
                <div class="row" style="min-height: 400px;">
                    <div class="col-12" id="productos_seleccionados">
                        <p class="text-muted">No has seleccionado ningún producto.</p>
                    </div>
                </div>

                <hr>

                <div class="text-end">
                    <h5>Subtotal: S/ <span id="subtotal">0.00</span></h5>
                    <h5>IGV (18%): S/ <span id="igv">0.00</span></h5>
                    <h4>Total: S/ <span id="total">0.00</span></h4>
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
