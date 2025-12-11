
<!-- INICIO DE CUERPO DE PÁGINA -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="btn btn-primary">Registro de Categoria</h5>
            
            <form id="frm_categoria" action="" method="">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-4 col-form-label">nombre :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="detalle" class="col-sm-4 col-form-label">detalle :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="detalle" name="detalle" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="reset" class="btn btn-info">Limpiar</button>
                    <a href="<?= BASE_URL ?>category" class="btn btn-danger">Cancelar</a>
                    <a href="<?php echo BASE_URL; ?>categoria" class="btn btn-info">Ver</a>
                </div>
            </form>
        </div>
    </div>
<!-- FIN DE CUERPO DE PÁGINA -->
 <script src="<?php echo BASE_URL; ?>view/function/categoria.js"></script>