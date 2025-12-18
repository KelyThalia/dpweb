<!-- INICIO DE CUERPO DE PÁGINA-->
<div class="container mt-4">

    <!-- ===== ESTILOS SOLO VISUALES ===== -->
    <style>
        .card-edit {
            border-radius: 22px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.18);
            overflow: hidden;
        }

        .card-edit .card-header {
            background: linear-gradient(90deg, #ff6ec7, #ffb3ec);
            color: #fff;
            font-weight: bold;
        }

        .form-control,
        .form-select {
            border-radius: 14px;
        }

        label {
            color: #555;
        }

        .btn-update {
            background: linear-gradient(90deg, #ff6ec7, #ffb3ec);
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 14px;
            padding: 8px 18px;
        }

        .btn-update:hover {
            opacity: 0.9;
            color: #fff;
        }

        .btn-cancel {
            border-radius: 14px;
            padding: 8px 18px;
        }

        .card-footer {
            background-color: #fff0fa;
        }
    </style>

    <div class="card card-edit">

        <div class="card-header">
            <h5 class="mb-0">Editar Datos de Usuario</h5>
        </div>

        <?php
        $id = 0;
        if (isset($_GET["views"])) {
            $ruta = explode("/", $_GET["views"]);
            if (isset($ruta[1]) && is_numeric($ruta[1])) {
                $id = (int)$ruta[1];
            }
        }
        ?>

        <form id="frm_edit-user">
            <input type="hidden" id="id_persona" name="id_persona" value="<?= $id ?>">

            <div class="card-body">

                <div class="mb-3 row">
                    <label for="nro_identidad" class="col-sm-4 col-form-label"><b>Nro Identidad:</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nro_identidad" name="nro_identidad" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="razon_social" class="col-sm-4 col-form-label"><b>Razón Social:</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="razon_social" name="razon_social" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="telefono" class="col-sm-4 col-form-label"><b>Teléfono:</b></label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="telefono" name="telefono" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="correo" class="col-sm-4 col-form-label"><b>Correo:</b></label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="departamento" class="col-sm-4 col-form-label"><b>Departamento:</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="departamento" name="departamento" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="provincia" class="col-sm-4 col-form-label"><b>Provincia:</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="provincia" name="provincia" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="distrito" class="col-sm-4 col-form-label"><b>Distrito:</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="distrito" name="distrito" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="cod_postal" class="col-sm-4 col-form-label"><b>Código Postal:</b></label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="cod_postal" name="cod_postal" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="direccion" class="col-sm-4 col-form-label"><b>Dirección:</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="rol" class="col-sm-4 col-form-label"><b>Rol:</b></label>
                    <div class="col-sm-8">
                        <select class="form-control" name="rol" id="rol" required>
                            <option value="" disabled selected>Seleccione</option>
                            <option value="administrador">Administrador</option>
                            <option value="vendedor">Vendedor</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-update" id="btn_guardar_cambios">
                    Actualizar
                </button>
                <a href="<?= BASE_URL ?>users" class="btn btn-secondary btn-cancel">
                    Cancelar
                </a>
            </div>

        </form>
    </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA-->

<script src="<?php echo BASE_URL; ?>view/function/user.js"></script>
<script>
    edit_user();
</script>
