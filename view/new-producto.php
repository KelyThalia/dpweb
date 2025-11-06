<!-- INICIO DE CUERPO DE PÁGINA-->
<div class="container-fluid mt-4 d-flex justify-content-center ">
  <div class="card shadow" style="width: 100rem;">
    <div class="card-header bg-primary text-white text-center">
      Registrar Productos
    </div>

    <div class="card-body">
      <form id="frm_product" action="" method="" enctype="multipart/form-data">

        <div class="mb-3 row">
          <label for="codigo" class="col-sm-4 col-form-label"><b>Código:</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="codigo" name="codigo" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="nombre" class="col-sm-4 col-form-label"><b>Nombre:</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="detalle" class="col-sm-4 col-form-label"><b>Detalle:</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="detalle" name="detalle" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="precio" class="col-sm-4 col-form-label"><b>Precio:</b></label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="precio" name="precio" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="stock" class="col-sm-4 col-form-label"><b>Stock:</b></label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="stock" name="stock" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="id_categoria" class="col-sm-4 col-form-label"><b>Categoría:</b></label>
          <div class="col-sm-8">
            <select name="id_categoria" id="id_categoria">
              <option value="">Seleccione</option>
            </select>
          </div>
        </div>
         <div class="mb-3 row">
          <label for="fecha_vencimiento" class="col-sm-4 col-form-label"><b>Fecha vencimiento:</b></label>
          <div class="col-sm-8">
            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="id_proveedor" class="col-sm-4 col-form-label"><b>Proveedor:</b></label>
          <div class="col-sm-8">
            <select name="id_proveedor" id="id_proveedor" class="form-control">
              <option value="">Seleccione Proveedor</option>
            </select>
          </div>
        </div>


       
        <div class="mb-3 row">
          <label for="imagen" class="col-sm-4 col-form-label"><b>Imagen</b></label>
          <div class="col-sm-8">
            <input type="file" class="form-control" id="imagen" name="imagen" accept=".jpg, .jpeg, .png" required>
          </div>
        </div>
        <!--imagen/-->
        <div class="mt-3 text-center">
          <button type="submit" class="btn btn-success">Registrar</button>
          <button type="reset" class="btn btn-primary">Limpiar</button>
          <a href="index.php?page=products" class="btn btn-danger">Cancelar</a>
          <a href="<?php echo BASE_URL; ?>producto" class="btn btn-info">Ver</a>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA-->

<script src="<?php echo BASE_URL ?>view/function/products.js"></script>
<script> 
   cargar_categorias();
   cargar_proveedores(); 
</script>
