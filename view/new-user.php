<!-- INICIO DE CUERPO DE PÁGINA -->
<div class="container-fluid mt-4">

    <!-- ====== ESTILOS SOLO VISUALES ====== -->
    <style>
        .card-user {
            max-width: 900px;
            margin: auto;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            border: none;
            overflow: hidden;
        }

        .card-user-header {
            background: linear-gradient(90deg, #ff6ec7, #ffb3ec);
            color: #fff;
            padding: 18px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .card-user-body {
            padding: 30px;
            background-color: #fff;
        }

        .form-control {
            border-radius: 12px;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #ff6ec7;
            box-shadow: 0 0 6px rgba(255, 110, 199, 0.4);
        }

        select.form_control {
            width: 100%;
            padding: 8px;
            border-radius: 12px;
            border: 1px solid #ced4da;
        }

        .form-label b {
            color: #555;
        }

        .btn-group-user {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            border-radius: 14px;
            padding: 8px 20px;
            font-weight: 500;
        }
    </style>

    <div class="card card-user">

        <!-- HEADER -->
        <div class="card-user-header">
            Registrar Usuarios
        </div>

        <!-- FORMULARIO -->
        <form id="frm_user" action="" method="">
            <div class="card-user-body">

                <div class="row mb-3">
                    <label for="nro_identidad" class="col-sm-4 col-form-label"><b>Nro Identidad:</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nro_identidad" name="nro_identidad" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="razon_social" class="col-sm-4 col-form-label"><b>Razón Social:</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="razon_social" name="razon_social" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="telefono" class="col-sm-4 col-form-label"><b>Teléfono:</b></label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="telefono" name="telefono" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="correo" class="col-sm-4 col-form-label"><b>Correo:</b></label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                </div>

               

                <div class="row mb-3">
                    <label for="departamento" class="col-sm-4 col-form-label"><b>Departamento:</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="departamento" name="departamento" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="provincia" class="col-sm-4 col-form-label"><b>Provincia:</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="provincia" name="provincia" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="distrito" class="col-sm-4 col-form-label"><b>Distrito:</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="distrito" name="distrito" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="cod_postal" class="col-sm-4 col-form-label"><b>Código Postal:</b></label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="cod_postal" name="cod_postal" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="direccion" class="col-sm-4 col-form-label"><b>Dirección:</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="rol" class="col-sm-4 col-form-label"><b>Rol:</b></label>
                    <div class="col-sm-8">
                        <select class="form_control" name="rol" id="rol">
                            <option value="" disabled selected>Seleccione</option>
                            <option value="administrador">Administrador</option>
                            <option value="vendedor">Vendedor</option>
                        </select>
                    </div>
                </div>

                <!-- BOTONES -->
                <div class="btn-group-user">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="reset" class="btn btn-primary">Limpiar</button>
                    <button type="button" class="btn btn-danger">Cancelar</button>
                    <a href="<?php echo BASE_URL; ?>users" class="btn btn-info">Ver</a>
                </div>

            </div>
        </form>

    </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA -->

<script src="<?php echo BASE_URL ?>view/function/user.js"></script>
