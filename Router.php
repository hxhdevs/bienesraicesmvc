<?php

namespace MVC;

Class Router{
    
    public $rutasGET =[];
    public $rutasPOST =[];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }
    
    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }


    public function comprobarRutas(){
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $urlActual = explode('?',$urlActual)[0];
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $urlActual = explode('?',$urlActual)[0];
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if ($fn) {
            call_user_func($fn, $this);
        }else{
            echo "Page not Found";
        }
    }

    public function render($view, $datos = []){
        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        include_once __DIR__ . '/views/layout.php';
    }
    
}