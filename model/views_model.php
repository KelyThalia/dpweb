<?php
    class viewsModel
  {
     protected static function get_view($views)
        {
        $white_list = [ "login", "Home", "Products", "new-user", "users", "edit-user","eliminar",
        "new-producto","producto-listar","producto-edit", "new-categoria","categoria","edit-categoria",
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


