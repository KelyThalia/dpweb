<!-- INICIO DE CUERPO DE PÁGINA-->
<div class="container-fluid mt-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">

      <div class="card shadow-lg" style="border-radius: 20px;">

        <div class="card-header text-center text-white"
             style="background: linear-gradient(90deg,#3a0ca3,#7209b7); font-weight:bold;">
          Registrar Productos
        </div>

        <div class="card-body">

          <form id="frm_product" enctype="multipart/form-data">

            <div class="mb-3 row">
              <label class="col-sm-4 col-form-label"><b>Código:</b></label>
              <div class="col-sm-8">
                <input type="text" class="form-control rounded-pill" id="codigo" name="codigo" required>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-4 col-form-label"><b>Nombre:</b></label>
              <div class="col-sm-8">
                <input type="text" class="form-control rounded-pill" id="nombre" name="nombre" required>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-4 col-form-label"><b>Detalle:</b></label>
              <div class="col-sm-8">
                <input type="text" class="form-control rounded-pill" id="detalle" name="detalle" required>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-4 col-form-label"><b>Precio:</b></label>
              <div class="col-sm-8">
                <input type="number" class="form-control rounded-pill" id="precio" name="precio" required>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-4 col-form-label"><b>Stock:</b></label>
              <div class="col-sm-8">
                <input type="number" class="form-control rounded-pill" id="stock" name="stock" required>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-4 col-form-label"><b>Categoría:</b></label>
              <div class="col-sm-8">
                <select id="id_categoria" class="form-control rounded-pill"></select>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-4 col-form-label"><b>Fecha vencimiento:</b></label>
              <div class="col-sm-8">
                <input type="date" class="form-control rounded-pill" id="fecha_vencimiento" required>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-4 col-form-label"><b>Proveedor:</b></label>
              <div class="col-sm-8">
                <select id="id_proveedor" class="form-control rounded-pill"></select>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-4 col-form-label"><b>Imagen:</b></label>
              <div class="col-sm-8">
                <input type="file" class="form-control rounded-pill" id="imagen" required>
              </div>
            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn text-white px-4" style="background:#3a0ca3;">
                Registrar
              </button>
              <button type="reset" class="btn btn-secondary px-4">Limpiar</button>
              <a href="<?= BASE_URL ?>producto" class="btn btn-info px-4">Ver</a>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA-->
