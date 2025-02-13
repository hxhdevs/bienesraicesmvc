<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;

class PaginasController{

    public static function index(Router $router){
      $propiedades = Propiedad::get(3);
      $inicio = true;

       $router->render('paginas/index',[
            'propiedades' => $propiedades,
            'inicio' => $inicio
       ]);
    }

    public static function nosotros(Router $router){
      $inicio = true;

       $router->render('paginas/nosotros',[
            'inicio' => $inicio
       ]);
    }

    public static function propiedades(Router $router){
      $propiedades = Propiedad::all();
      // $inicio = true;

       $router->render('/paginas/index',[
            'propiedades' => $propiedades
            // 'inicio' => $inicio
       ]);
    }

    public static function propiedad(Router $router){
      $id = validarORedireccionar('/propiedades');
      $propiedad = Propiedad::find($id);

      $router->render('/paginas/anuncio',[
          'propiedad' => $propiedad
      ]);
    }

    public static function blog(){
       echo 'blog';
    }

    public static function entrada(){
       echo 'entrada';
    }

    public static function contacto(){
       echo 'contacto';
    }

    

    
}