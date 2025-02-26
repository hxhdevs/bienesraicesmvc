<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

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

    public static function blog(Router $router){
      // $inicio = true;

      $router->render('paginas/blog');
    }

    public static function entrada(Router $router){
      $router->render('paginas/entrada');
    }

    public static function contacto(Router $router){
      $mensaje = null;
      if ($_SERVER['REQUEST_METHOD'] ==='POST') {
        $respuestas = $_POST['contacto'];
        // dep($_POST);
        // die();
         $mail = new PHPMailer();//Creando una instancia de PHPMailer
         //COnfigurando SMPT
         $mail->isSMTP();
         $mail->Host='sandbox.smtp.mailtrap.io';
         $mail->SMTPAuth = true;
         $mail->Username='ac7c49566a38e2';
         $mail->Password='7bd373a5c5d92e';
         $mail->SMTPSecure = 'tls';
         $mail->Port=465;

         //Configurando el correo
         $mail->setFrom('Jordisonnicolas@gmail.com');
         $mail->addAddress('Jordisonnicolas@gmail.com');
         $mail->Subject ='Tienes un nuevo mensaje de HXHdevs';

         //Habilitando HTML
         $mail->isHTML(true);
         $mail->CharSet='UTF-8';
        // dep($_POST);
         //Definir el contenido
         $contenido ='<html><p>Tienes un nuevo mensaje</p>
                      <p>Nombre: '.$respuestas['nombre'].'</p>';
         if ($respuestas['contacto'] === 'telefono') {
          $contenido.='<p>Eligio ser contactado por telefono</p>
                      <p>Telefono: '.$respuestas['telefono'].'</p>
                      <p>Fecha: '.$respuestas['fecha'].'</p>
                      <p>Hora: '.$respuestas['hora'].'</p>';
         }else{
          $contenido.='<p>Eligio ser contactado por email</p>
                      <p>Email: '.$respuestas['email'].'</p>';
         }
         $contenido.='<p>Mensaje: '.$respuestas['mensaje'].'</p>
                      <p>Tipo: '.$respuestas['tipo'].'</p>
                      <p>Precio: '.$respuestas['precio'].'</p>
                      <p>Contacto: '.$respuestas['contacto'].'</p>
                      <p></html> </p>';

         $mail->Body=$contenido;
         $mail->AltBody='Esto es un texto alternativo sin HTML';
        // dep($mail);
         if ($mail->send()) {
          $mensaje = "Mensaje enviado correctamente";
         }else{
          $mensaje = "El mensaje no se pudo enviar...". $mail->ErrorInfo;
         }
         
      }
      $router->render('paginas/contacto',[
        'mensaje'=>$mensaje
      ]);
    }

    

    
}
// dvqj rbqz owcp jcrs