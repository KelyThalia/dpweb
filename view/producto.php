<h3 class="text-center mb-4">Lista de Productos</h3>

<div class="d-flex justify-content-center">
  <table class="table table-success table-striped text-center w-50">
    <thead>
      <tr>
        <th>Nro</th>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Detalle</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Fecha Vencimiento</th>
        <th>categoria</th>
        <th>código Barra</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="content_products"></tbody>
  </table>
</div>
<script src="<?php echo BASE_URL ?>view/function/products.js"></script>
<script src="<?php echo BASE_URL ?>view/function/JsBarcode.all.min.js"></script>
