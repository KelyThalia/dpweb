<?php
require_once "./control/views_control.php";

$views = new viewsControl();
$mostrar = $views->getviewControl();

if ($mostrar == "login" || $mostrar == "404") {
    require_once "./view/" . $mostrar . ".php";
} else {
    include $mostrar;
}
