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

    <!-- ===== SOLO ESTILOS (NO AFECTA FUNCIONAMIENTO) ===== -->
    <style>
        /* Fondo del header rosado suave */
        .navbar {
            background: linear-gradient(90deg, #f7b3ff, #ffd1f3) !important;
        }

        /* BOTONES DEL MENÚ */
        .navbar .nav-link {
            color: #fff !important;
            margin: 4px;
            padding: 6px 14px;
            border-radius: 14px;
            background: rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(6px);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-weight: 500;
        }

        /* Borde rosado brillante */
        .navbar .nav-link::before {
            content: "";
            position: absolute;
            inset: 0;
            padding: 2px;
            border-radius: 14px;
            background: linear-gradient(90deg, #ff6ec7, #ffb3ec);
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }

        /* Glow rosado */
        .navbar .nav-link::after {
            content: "";
            position: absolute;
            inset: -4px;
            background: linear-gradient(90deg, #ff6ec7, #ffb3ec);
            filter: blur(14px);
            opacity: 0.6;
            z-index: -1;
        }

        /* Hover */
        .navbar .nav-link:hover {
            transform: scale(1.08);
            box-shadow: 0 0 20px rgba(255, 110, 199, 0.9);
            color: #fff !important;
        }

        /* Dropdown items normales */
        .dropdown-menu {
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-white" href="#">logo</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>users">users</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>new-producto">productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>new-categoria">categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>new-cliente">Clients</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>new-proveedor">Proveedor</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>producto-vista">Producto-vista</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Schops</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sales</a></li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">perfil</a></li>
                            <li><a class="dropdown-item" href="#">logout</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">conted</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

</body>
</html>

    <!-- “Este código es la estructura base de una página web. 
     Usa Bootstrap para los estilos y la barra de navegación. En el <head>, 
     se define el título, se importa Bootstrap y se pasa la URL base desde PHP a
     JavaScript. En el <body>, se crea una barra de navegación con enlaces como Home,
     Usuarios, Productos,
     etc., y un menú desplegable para el usuario. Todo está preparado para verse bien en distintos dispositivos.” -->