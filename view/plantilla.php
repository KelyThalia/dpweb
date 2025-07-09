<?php
require_once"./config/config.php";
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
