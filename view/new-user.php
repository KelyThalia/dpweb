
    <!-- INICIO DE CUERPO DE PÁGINA-->
    <div class="container_fluid">
        <div class="card">
            <h5 class="btn btn-primary">titulo</h5>
            <form id="frm_user" action="" method="">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="nro_identidad" class="col-sm-4 col-form-label"><b>nro identidad</b>:</label>
                        <div class="col-sm-8">
                            <input type="tex" class="form-control" id="nro_identidad" name="nro_identidad" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="razon_social" class="col-sm-4 col-form-label"><b>razon social:</b></label>
                        <div class="col-sm-8">
                            <input type="tex" class="form-control" id="razon_social" name="razon_social" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telefono" class="col-sm-4 col-form-label"><b>Telefono:</b>:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="telefono" name="telefono" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="correo" class="col-sm-4 col-form-label"><b>Correo:</b></label>
                        <div class="col-sm-8">
                            <input type="gmail" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div> <br>

                            <div class="mb-3 row">
                                <label for="departamento" class="col-sm-4 col-form-label"><b>Departamento:</b></label>
                                <div class="col-sm-8">
                                    <input type="tex" class="form-control" id="departamento" name="departamento" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="distrito" class="col-sm-4 col-form-label"><b>Distrito:</b></label>
                                <div class="col-sm-8">
                                    <input type="tex" class="form-control" id="distrito" name="distrito" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="provincia" class="col-sm-4 col-form-label"><b>provincia</b></label>
                                <div class="col-sm-8">
                                    <input type="tex" class="form-control" id="provincia" name="provincia" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="cod_postal" class="col-sm-4 col-form-label"><b>Codigo Postal:</b></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="cod_postal" name="cod_postal" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="direccion" class="col-sm-4 col-form-label"><b>Direccion:</b></label>
                                <div class="col-sm-8">
                                    <input type="tex" class="form-control" id="direccion" name="direccion" required>
                                </div>
                            </div>


                        </div class="mb-3 row">
                        <label for="rol" class="col-sm-4 col-form-label"><b>Rol:</b></label>
                        <div class="col-sm-8">
                            <select class="form_control" name="rol" id="rol">

                                <option value="" disabled selected>seleccione</option>
                                <option value="administrador">administrador</option>
                                <option value="vendedor">vendedor</option>

                            </select>


                        </div>
                    </div>


                </div>

                <div>
                    <button type="submit" class="btn btn-success">registrar</button>
                    <button type="reset" class="btn btn-primary">limpiar</button>
                    <button type="button" class="btn btn-danger">cancelar</button>
                </div>

        </div>
        </form>
    </div>
    </div>
     <!-- FIN DE CUERPO DE PÁGINA-->
      <script src="<?php echo BASE_URL ?>view/function/user.js"></script>
      