<?php

namespace Controllers;
use MVC\Router;

class PropiedadController{

    public static function index(Router $router){
        $router->render('propiedades/admin',[
            'mensaje'=>1,
            'propiedades'=>[1,2,3],
            'mensajes'=> 'Hola mensaje'
        ]);
    }

    public static function crear(){
        echo 'Creatind data';
    }
    
    public static function actualizar(){
        echo 'Updating Data';
    }
}