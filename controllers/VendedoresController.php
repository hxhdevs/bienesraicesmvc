<?php

namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedoresController{

    public static function index(){
       echo 'index vendedor';
    }

    public static function crear(){
        echo 'Creando vendedor';
    }
    
    public static function actualizar(){
        echo 'Actualizando vendedor';
    }

    public static function eliminar(){
        echo 'Eliminando vendedor';
    }
}