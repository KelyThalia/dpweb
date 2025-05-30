<?php
require_once "./model/views_model.php";
class viewsControl extends viewsModel{
    public function getPlantilla(){
        return require_once "./view/plantilla.php";
    }
    public function getviewControl (){
        if (isset($_GET["views"])) {
          $ruta = explode("/",$_GET["views"]);
          $response = viewsModel:: get_view($ruta[0]);

        }else{
          $response = "index.php";
        }
        return $response;
    }
}
?>