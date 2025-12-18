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

    <form id="frm_edit_producto" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id_producto" id="id_producto" value="<?= $ruta[1]; ?>">

      <div class="card-body">

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
            <input type="number" step="0.01" class="form-control rounded-pill" id="precio" name="precio" required>
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
            <select id="id_categoria" name="id_categoria" class="form-control rounded-pill" required>
              <option value="">Seleccione categoría</option>
            </select>
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-4 col-form-label"><b>Fecha vencimiento:</b></label>
          <div class="col-sm-8">
            <input type="date" class="form-control rounded-pill" id="fecha_vencimiento" name="fecha_vencimiento" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-4 col-form-label"><b>Proveedor:</b></label>
          <div class="col-sm-8">
            <select id="id_proveedor" name="id_proveedor" class="form-control rounded-pill" required>
              <option value="">Seleccione proveedor</option>
            </select>
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-4 col-form-label"><b>Imagen:</b></label>
          <div class="col-sm-8">
            <input type="file" class="form-control rounded-pill" id="imagen" name="imagen">
          </div>
        </div>

        <div class="text-center mt-4">
          <button type="submit" class="btn text-white px-4" style="background:#3a0ca3;">Actualizar</button>
          <button type="reset" class="btn btn-secondary px-4">Limpiar</button>
          <a href="<?php echo BASE_URL; ?>producto" class="btn btn-info px-4">Ver</a>
        </div>

      </div>
    </form>
  </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA-->

<script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
<script>
  cargar_categorias();
  cargar_proveedores();
  edit_producto();
</script>
