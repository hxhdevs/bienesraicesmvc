<?php

namespace Controllers;

use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController{

    public static function index(Router $router){
        $vendedores = Vendedor::all();
        $propiedades = Propiedad::all();
        $resultado = $_GET['resultado'] ?? null;
        $router->render('propiedades/admin',[
            'vendedores'=>$vendedores,
            'propiedades'=>$propiedades,
            'resultado'=>$resultado
        ]);
    }

    public static function crear(Router $router){
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();
        

        if ($_SERVER['REQUEST_METHOD']==='POST') {
            $propiedad= new Propiedad($_POST['propiedad']);
            $nombreImagen = md5(uniqid(rand(),true)).".jpg";

            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
                $propiedad->setImagen($nombreImagen);
            }
            $errores = $propiedad->validar();

            if (empty($errores)) {
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                $image->save(CARPETA_IMAGENES.$nombreImagen);
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear',[
            'propiedad'=>$propiedad,
            'vendedores'=>$vendedores,
            'errores'=>$errores
        ]);
    }
    
    public static function actualizar(){
        echo 'Updating Data';
    }
}