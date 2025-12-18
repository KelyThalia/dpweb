<div class="container mt-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-dark">Lista de Productos</h3>
    <a href="<?= BASE_URL ?>new-producto"
       class="btn text-white"
       style="background:#3a0ca3;">Nuevo +</a>
  </div>

  <div class="card shadow-lg rounded-4">
    <div class="card-body">

      <table class="table table-hover align-middle">
        <thead class="text-white" style="background:#3a0ca3;">
          <tr>
            <th>Nro</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Detalle</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Fecha Venc.</th>
            <th>Categoría</th>
            <th>Código Barra</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="content_products">
        </tbody>
      </table>

    </div>
  </div>
</div>

<script src="<?= BASE_URL ?>view/function/products.js"></script>
<script src="<?= BASE_URL ?>view/function/JsBarcode.all.min.js"></script>
