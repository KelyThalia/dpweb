<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kely</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
        /* Define una variable JavaScript base_url con el mismo valor que BASE_URL en PHP*/
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary"> <!-- Aquí comienza una barra de navegación -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
             <!-- Este es el botón que aparece en móviles para colapsar o expandir el menú.-->
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Aquí inicia el menú de navegación con varias secciones (links). me-auto los alinea a la izquierda.-->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Aquí se definen los enlaces de navegación del sitio web. -->
                     <!--Cada li representa una opción del menú-->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>users">users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">schops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">sales</a>
                    </li>
                    
                </ul>
                <form class="d-flex" role="search">

                    

                    <!--Este bloque crea un menú desplegable
                     para el perfil del usuario (por ejemplo,
                      con opciones como “perfil” o “logout”). -->

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown"> 
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown <!-- Este es un menú desplegable que se activa al hacer clic en el enlace. -->
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">perfil</a></li>
                                <li><a class="dropdown-item" href="#">logout</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">conted</a></li>
                                <!--Opciones dentro del menú desplegable.-->
                            </ul>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
    <!-- “Este código es la estructura base de una página web. 
     Usa Bootstrap para los estilos y la barra de navegación. En el <head>, 
     se define el título, se importa Bootstrap y se pasa la URL base desde PHP a
     JavaScript. En el <body>, se crea una barra de navegación con enlaces como Home,
     Usuarios, Productos,
     etc., y un menú desplegable para el usuario. Todo está preparado para verse bien en distintos dispositivos.” -->