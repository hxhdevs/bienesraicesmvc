<?php

namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedoresController{

    public static function index(){
       echo 'index vendedor';
    }

    public static function crear(Router $router){
        $vendedor = new Vendedor();
        $errores = Vendedor::getErrores();
        $resultado = $_GET['resultado'] ?? null;
        $router->render('vendedores/crear',[
            'vendedor'=>$vendedor,
            'errores'=>$errores,
            'resultado'=>$resultado
        ]);
    }
    
    public static function actualizar(){
        echo 'Actualizando vendedor';
    }

    public static function eliminar(){
        echo 'Eliminando vendedor';
    }
}