<!-- INICIO DE CUERPO DE PÁGINA-->
<div class="container_fluid">
    <div class="card">
        <h5 class="card-header">Editar datos de producto
            <?php
            if (isset($_GET["views"])) {
                $ruta = explode("/", $_GET["views"]);
                echo $ruta[1];
            }
            ?>
        </h5>
        <form id="frm_edit_producto" method="POST">
            <input type="hidden" name="id_producto" id="id_producto" value="<?= $ruta[1]; ?>">
            <div class="card-body">

                <div class="mb-3 row">
                    <label for="Nro" class="col-sm-2 col-form-label">Nro:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="Nro" name="Nro" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-2 col-form-label">Codigo:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="codigo" name="codigo" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="detalle" class="col-sm-2 col-form-label">Detalle:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="detalle" name="detalle" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
                    <div class="col-sm-4">
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="stock" class="col-sm-2 col-form-label">Stock:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="id_categoria" class="col-sm-2 col-form-label">id_categoria:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="id_categoria" name="id_categoria" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fecha_vencimiento" class="col-sm-2 col-form-label">Fecha vencimiento:</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="imagen" class="col-sm-2 col-form-label"><b>Imagen:</b></label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control" id="imagen" name="imagen" accept=".jpg, .jpeg, .png">
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">actualizar</button>
                    <a href="<?php echo BASE_URL; ?>producto-listar" class="btn btn-secondary">Cancelar</a>
                </div>

            </div>
        </form>
    </div>
</div>
<!--fin de acuerdo de pagina-->
<script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
<script>
    edit_producto();
</script>