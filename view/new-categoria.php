
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kely</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>

<body>

   
 <!-- FIN DE CUERPO DE PÁGINA-->
    <div class="container_fluid">
        <div class="card">
            <h5 class="btn btn-primary">registrar Categoria</h5>
            <form id="frm_Categoria" action="" method="">
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
                        <a href="index.php?page=categoria" class="btn btn-danger">cancelar</a>
                          <a href="<?php echo BASE_URL; ?>producto-listar" class="btn btn-secondary">ver</a>
                    </div>


                </div>
            </form>
        </div>


    </div>
   <!-- FIN DE CUERPO DE PÁGINA-->
</body>

<script src="<?php echo BASE_URL ?>view/function/categoria.js"></script>
<script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>