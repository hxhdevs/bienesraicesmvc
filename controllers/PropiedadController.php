<?php

namespace Controllers;

use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;

class PropiedadController{

    public static function index(Router $router){
        $vendedores = Vendedor::all();
        $propiedades = Propiedad::all();
        $resultado = null;
        $router->render('propiedades/admin',[
            'vendedores'=>$vendedores,
            'propiedades'=>$propiedades,
            'resultado'=>$resultado
        ]);
    }

    public static function crear(){
        echo 'Creatind data';
    }
    
    public static function actualizar(){
        echo 'Updating Data';
    }
}