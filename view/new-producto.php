<!-- INICIO DE CUERPO DE PÁGINA-->
<div class="container_fluid">
    <div class="card">
        <h5 class="btn btn-primary">Registrar Productos</h5>
        <form id="frm_producto" action="" method="POST">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-4 col-form-label"><b>Codigo:</b>:</label>
                    <div class="col-sm-8">
                        <input type="tex" class="form-control" id="codigo" name="codigo" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-4 col-form-label"><b>Nombre:</b></label>
                    <div class="col-sm-8">
                        <input type="tex" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="detalle" class="col-sm-4 col-form-label"><b>Detalle:</b>:</label>
                    <div class="col-sm-8">
                        <input type="tex" class="form-control" id="detalle" name="detalle" required>
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
                    <label for="id_categoria" class="col-sm-4 col-form-label"><b>id_categoria:</b></label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="id_categoria" name="id_categoria" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="fecha_vencimiento" class="col-sm-4 col-form-label"><b>Fecha vencimiento:</b></label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
                    </div>
                </div>




            </div>


    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-success">registrar</button>
        <button type="reset" class="btn btn-primary">limpiar</button>
        <a href="index.php?page=products" class="btn btn-danger">cancelar</a>
        <a href="<?php echo BASE_URL; ?>producto-listar">ver</a>
    </div>

</div>
</form>
</div>
</div>
<!-- FIN DE CUERPO DE PÁGINA-->
<script src="<?php echo BASE_URL ?>view/function/products.js"></script>