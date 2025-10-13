<?php
    class viewsModel
  {
     protected static function get_view($views)
        {
        $white_list = [ "login", "Home", "Products", "new-user", "users", "new-categoria", "edit-user","eliminar",
        "new-producto","producto-listar","producto-edit","categoria-lista","categoria-edit",
          "new-proveedor", "proveedor", "edit-proveedor","new-cliente","cliente","edit-cliente"];
        if (in_array($views, $white_list)) {
            if (is_file("./view/" . $views . ".php")) {
                $content = "./view/" . $views . ".php";
            } else {
                $content = "404";
            }
        }elseif ($views == "login"){
            $content = "login";

        } else {
            $content = "404";
          
         }
        return $content;
       }
  }
?>
<!--“Este código pertenece a un sistema de plantillas en un proyecto MVC.
 El método get_view determina qué vista debe mostrarse según el nombre recibido. 
 Solo se permiten vistas específicas que están en una lista blanca como 'Home' o 'new-user'.
 Si se solicita una vista permitida y existe el archivo PHP correspondiente, lo carga. Si no existe o no está permitida,
 devuelve un error 404. La única excepción es la vista 'login', que se permite de forma especial.”
-->

