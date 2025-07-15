<?php
require_once "./config/config.php";
require_once "./control/views_control.php";

$views = new viewsControl();
$mostrar = $views->getviewControl();

if ($mostrar == "login" || $mostrar == "404") {
    require_once "./view/" . $mostrar . ".php";
} else {
    include "./view/include/header.php"; //cargamos el header
    include $mostrar;
    include "./view/include/fooder.php"; //cargamos el fooder
}
/*“Este archivo es como el corazón del sistema. Se encarga de decidir qué vista mostrar al usuario. 
Primero incluye la configuración y los controladores necesarios. Luego obtiene el nombre de la vista usando 
la clase viewsControl. Si es una vista especial como 'login' o '404', se carga directamente. En cambio,
si es una página normal, se carga junto con un encabezado (header) y un pie de página (footer).
Esto permite reutilizar la misma estructura visual en todas las páginas del sitio.”
 */