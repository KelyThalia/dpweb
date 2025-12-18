<div class="container mt-4">

    <!-- ====== ESTILOS SOLO VISUALES ====== -->
    <style>
        .user-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-title {
            font-weight: bold;
            color: #ff4fbf;
        }

        .btn-new-user {
            background: linear-gradient(90deg, #ff6ec7, #ffb3ec);
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 14px;
            padding: 8px 18px;
            transition: transform 0.2s ease;
        }

        .btn-new-user:hover {
            transform: scale(1.05);
            color: #fff;
        }

        .card-table {
            border-radius: 20px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        table {
            margin-bottom: 0;
        }

        thead {
            background: linear-gradient(90deg, #ff6ec7, #ffb3ec);
            color: #fff;
        }

        th {
            text-align: center;
            vertical-align: middle;
        }

        td {
            text-align: center;
            vertical-align: middle;
        }

        tbody tr:hover {
            background-color: #fff0fa;
        }

        .badge {
            border-radius: 12px;
            padding: 6px 10px;
            font-size: 13px;
        }

        .btn-action {
            border-radius: 10px;
            padding: 4px 10px;
            font-size: 13px;
        }
    </style>

    <!-- HEADER -->
    <div class="user-header">
        <h3 class="user-title">Lista de Usuarios</h3>
        <a href="<?= BASE_URL ?>new-user" class="btn btn-new-user">
            + Nuevo Usuario
        </a>
    </div>

    <!-- TABLA -->
    <div class="card card-table">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>DNI</th>
                    <th>Nombres y Apellidos</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="content_users">
                <!-- JS CARGA LOS DATOS AQUÍ -->
            </tbody>
        </table>
    </div>

</div>

<script src="<?= BASE_URL ?>view/function/user.js"></script>
