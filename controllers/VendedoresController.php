<?php

namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedoresController{

    public static function index(){
       echo 'index vendedor';
    }

    public static function crear(Router $router){
        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor();
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            $vendedor = new Vendedor($_POST['vendedor']);
            $errores = $vendedor->validar();

            if (empty($errores)) {
                $vendedor->guardar();
            }
        }
        $router->render('vendedores/crear',[
            'errores'=>$errores,
            'vendedor'=>$vendedor
        ]);
    }
    
    public static function actualizar(Router $router){
        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');
        $vendedor = Vendedor::find($id);
        $router->render('vendedores/crear',[
            'errores'=>$errores,
            'vendedor'=>$vendedor
        ]);
    }

    public static function eliminar(){
        echo 'Eliminando vendedor';
    }
}