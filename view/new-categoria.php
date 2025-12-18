<!-- INICIO DE CUERPO DE PÁGINA -->
<div class="container-fluid mt-4">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

      <div class="card shadow-lg" style="border-radius: 18px;">
        <div class="card-header text-center text-white"
             style="background: linear-gradient(90deg,#3a0ca3,#7209b7); font-weight:bold;">
          Registrar Categoría
        </div>

        <form id="frm_categoria">
          <div class="card-body">

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

            <div class="text-center mt-4">
              <button type="submit" class="btn text-white px-4" style="background:#3a0ca3;">Registrar</button>
              <button type="reset" class="btn btn-secondary px-4">Limpiar</button>
              <a href="<?= BASE_URL ?>categoria" class="btn btn-danger px-4">Cancelar</a>
              <a href="<?= BASE_URL ?>categoria" class="btn btn-info px-4">Ver</a>
            </div>

          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA -->

<script src="<?= BASE_URL ?>view/function/categoria.js"></script>
