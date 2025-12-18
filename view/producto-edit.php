<!-- INICIO DE CUERPO DE PÁGINA-->
<div class="container mt-4">
  <div class="card shadow-lg rounded-4">

    <div class="card-header text-white"
         style="background:linear-gradient(90deg,#3a0ca3,#7209b7);">
      Editar datos de producto
      <?php
        if (isset($_GET["views"])) {
          $ruta = explode("/", $_GET["views"]);
          echo $ruta[1];
        }
      ?>
    </div>

    <form id="frm_edit_producto" method="POST">
      <input type="hidden" name="id_producto" id="id_producto" value="<?= $ruta[1]; ?>">

      <div class="card-body">

        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Código:</label>
          <div class="col-sm-4">
            <input type="number" class="form-control rounded-pill" id="codigo" name="codigo" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Nombre:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control rounded-pill" id="nombre" name="nombre" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Detalle:</label>
          <div class="col-sm-4">
            <input type="text" class="form-control rounded-pill" id="detalle" name="detalle" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Precio:</label>
          <div class="col-sm-4">
            <input type="number" step="0.01" class="form-control rounded-pill" id="precio" name="precio" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Stock:</label>
          <div class="col-sm-4">
            <input type="number" class="form-control rounded-pill" id="stock" name="stock" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Categoría:</label>
          <div class="col-sm-4">
            <input type="number" class="form-control rounded-pill" id="id_categoria" name="id_categoria" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Fecha venc.:</label>
          <div class="col-sm-4">
            <input type="date" class="form-control rounded-pill" id="fecha_vencimiento" name="fecha_vencimiento" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Imagen:</label>
          <div class="col-sm-4">
            <input type="file" class="form-control rounded-pill" id="imagen" name="imagen">
          </div>
        </div>

        <div class="mt-4">
          <button type="submit" class="btn text-white"
                  style="background:#3a0ca3;">Actualizar</button>
          <a href="<?php echo BASE_URL; ?>producto-listar" class="btn btn-secondary">Cancelar</a>
        </div>

      </div>
    </form>
  </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA-->

<script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
<script>
  edit_producto();
</script>
