<!-- INICIO DE CUERPO DE PÁGINA -->
<div class="container-fluid mt-4">
  <div class="row g-4">

    <!-- ================= BUSQUEDA DE PRODUCTOS ================= -->
    <div class="col-lg-8">
      <div class="card shadow-lg border-0">
        <div class="card-header text-white text-center"
             style="background: linear-gradient(90deg,#3a0ca3,#7209b7);">
          <h5 class="mb-0">Ventas · Búsqueda de Productos</h5>
        </div>

        <div class="card-body row">
          <h5 class="card-title col-md-4 fw-bold">Buscar Producto</h5>

          <div class="col-md-6 mb-3">
            <input type="text"
                   class="form-control form-control-lg rounded-pill"
                   placeholder="Buscar producto por código o nombre"
                   id="busqueda_venta"
                   onkeyup="listar_productos_venta();">

            <input type="hidden" id="id_producto_venta">
            <input type="hidden" id="producto_precio_venta">
            <input type="hidden" id="producto_cantidad_venta" value="1">
          </div>

          <div class="row container-fluid" id="productos_venta">
            <!-- Productos dinámicos -->
          </div>
        </div>
      </div>
    </div>

    <!-- ================= LISTA DE COMPRA ================= -->
    <div class="col-lg-4">
      <div class="card shadow-lg border-0">
        <div class="card-header text-white text-center"
             style="background: linear-gradient(90deg,#212529,#343a40);">
          <h5 class="mb-0">Lista de Compra</h5>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr class="text-center">
                  <th>Producto</th>
                  <th>Cant.</th>
                  <th>P. Unit.</th>
                  <th>SubTotal</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="lista_compra">
              </tbody>
            </table>
          </div>

          <hr>

          <div class="text-end">
            <h6>Subtotal: <span class="fw-bold" id="subtotal_general"></span></h6>
            <h6>IGV: <span class="fw-bold" id="igv_general"></span></h6>
            <h4 class="text-success fw-bold">
              Total: <span id="total"></span>
            </h4>

            <button class="btn btn-lg text-white w-100 mt-3"
                    style="background:#3a0ca3;"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
              Realizar Venta
            </button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA -->

<!-- ================= MODAL ================= -->
<div class="modal fade modal-lg" id="exampleModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg">

      <div class="modal-header text-white"
           style="background: linear-gradient(90deg,#3a0ca3,#7209b7);">
        <h5 class="modal-title">Registro de Venta</h5>
        <button type="button" class="btn-close btn-close-white"
                data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form id="form_venta">
          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label">DNI del cliente</label>
              <input type="number"
                     class="form-control"
                     id="cliente_dni"
                     name="cliente_dni"
                     onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            </div>

            <div class="col-md-6 d-flex align-items-end">
              <button type="button"
                      class="btn btn-primary w-100"
                      onclick="buscar_cliente_venta();">
                Buscar cliente
              </button>
            </div>

            <div class="col-md-12">
              <label class="form-label">Nombre del Cliente</label>
              <input type="text"
                     class="form-control"
                     id="cliente_nombre"
                     name="cliente_nombre"
                     readonly>
              <input type="hidden" id="id_cliente_venta">
            </div>

            <div class="col-md-6">
              <label class="form-label">Fecha de venta</label>
              <input type="datetime-local"
                     class="form-control"
                     id="fecha_venta">
            </div>

          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary"
                data-bs-dismiss="modal">
          Cerrar
        </button>
        <button class="btn btn-success"
                onclick="registrarVenta()">
          Registrar venta
        </button>
      </div>

    </div>
  </div>
</div>

<!-- ================= SCRIPTS ================= -->
<script src="<?= BASE_URL ?>view/function/products.js"></script>
<script src="<?= BASE_URL ?>view/function/venta.js"></script>
<script>
  let input = document.getElementById("busqueda_venta");
  input.addEventListener('keydown', (event) => {
    if (event.key == 'Enter') {
      agregar_producto_temporal();
    }
  });

  listar_temporales();
  act_subt_general();
</script>
