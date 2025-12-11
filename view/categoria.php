<div class="container mt-4">
  <h3 class="mt-3 mb-3">Lista de categoría</h3>
  <a href="<?= BASE_URL ?>new-categoria" class="btn btn-primary mb-3">Nuevo +</a>

  <div class="table-responsive">
    <table class="table table-success table-striped table-hover align-middle">
      <thead class="table-success">
        <tr>
          <th class="text-center">Nro</th>
          <th>Nombre</th>
          <th>Detalle</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody id="content_categoria">
        <!-- Aquí se cargará dinámicamente el contenido -->
      </tbody>
    </table>
  </div>
</div>

<script src="<?= BASE_URL ?>view/function/categoria.js"></script>