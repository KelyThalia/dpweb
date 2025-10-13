

<body>
    <!-- INICIO DE CUERPO DE PÁGINA-->
    <div class="container_fluid mt-4 d-flex justify-content-center">
        <div class="card shadow" style="width: 100rem;">
            <h5 class="btn btn-primary">Registrar Categoria</h5>
            <form id="frm_Categoria" action="" method="POST">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-4 col-form-label"><b>nombre</b>:</label>
                        <div class="col-sm-8">
                            <input type="tex" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="detalle" class="col-sm-4 col-form-label"><b>detalle:</b></label>
                        <div class="col-sm-8">
                            <input type="tex" class="form-control" id="detalle" name="detalle" required>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">registrar</button>
                        <button type="reset" class="btn btn-primary">limpiar</button>
                        <button type="button" class="btn btn-danger">cancelar</button>
                        <a href="<?php echo BASE_URL; ?>categoria-lista" class="btn btn-primary">Ver</a>
                    </div>


                </div>
            </form>
        </div>


    </div>
    <!-- FIN DE CUERPO DE PÁGINA-->
</body>

<script src="<?php echo BASE_URL ?>view/function/categoria.js"></script>

</html>