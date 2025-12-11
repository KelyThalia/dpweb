<div class="container">
  <h3 class="mt-3 mb-3">Lista de Productos</h3>
  <a href="<?= BASE_URL ?>new-producto" class="btn btn-primary">Nuevo +</a>
  <br><br>
  <table class="table table-success table-striped-columns">
    <thead>
      <tr>
        <th>Nro</th>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Detalle</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Fecha Vencimiento</th>
        <th>Categoría</th>
        <th>Código Barra</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="content_products">
      <!-- Contenido dinámico -->
    </tbody>
  </table>
</div>

<script src="<?= BASE_URL ?>view/function/products.js"></script>
<script src="<?= BASE_URL ?>view/function/JsBarcode.all.min.js"></script>