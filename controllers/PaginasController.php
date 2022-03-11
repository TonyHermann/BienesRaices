<?php
namespace Controllers;

use Model\Entrada;
use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::All(3);

        $inicio = true;
        $simpleheader = false;

        $entradas = Entrada::All(3);

        $router->render('/paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio,
            'simpleheader' => $simpleheader,
            'entradas' => $entradas,
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('/paginas/nosotros', [

        ]);
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::All();
        $router->render('/paginas/anuncios', [
            'propiedades' => $propiedades,
        ]);
    }

    public static function propiedad(Router $router)
    {
        //Validar id
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin');
        };

        $propiedad = Propiedad::find($id);

        $router->render('paginas/anuncio', [
            'propiedad' => $propiedad,
            'id' => $id,
        ]);

    }

    public static function blog(Router $router)
    {
        $entradas = Entrada::All();
        $router->render('paginas/blog', [
            'entradas' => $entradas,
        ]);
    }

    public static function entrada(Router $router)
    {
        //Validar id
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /');
        };

        $entrada = Entrada::find($id);

        $router->render('paginas/entrada', [
            'entrada' => $entrada,
        ]);
    }

    public static function contacto(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $mensaje = null;

            $respuestas = $_POST['contacto'];

            //Creando instancia PHPMailer
            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'x';
            $mail->Password = 'x';
            $mail->Port = 4444;

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'ContactoBienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar html
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo correo. </p>';
            $contenido .= '<p> Nombre: ' . $respuestas['nombre'] . ' </p>';
            
            //Mandar contenido de forma condicional

            if($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p> Eligió ser contactado por telefono. </p>';
                $contenido .= '<p> Telefono: ' . $respuestas['telefono'] . ' </p>';
                $contenido .= '<p> Fecha: ' . $respuestas['fecha'] . ' </p>';
                $contenido .= '<p> Hora: ' . $respuestas['hora'] . ' </p>';
            } else {
                //Significa que es email
                $contenido .= '<p> Eligió ser contactado por email. </p>';
                $contenido .= '<p> Email: ' . $respuestas['email'] . ' </p>';
            }

            $contenido .= '<p> Mensaje: ' . $respuestas['mensaje'] . ' </p>';
            $contenido .= '<p> Vende o compra: ' . $respuestas['tipo'] . ' </p>';
            $contenido .= '<p> Presupuesto: ' . $respuestas['precio'] . ' </p>';

            $contenido .= '</html>';

            $mail->AltBody = 'Hola! desde el altbody';
            $mail->Body = $contenido;
            try {
                $mail->send();
                $mensaje = 'El mensaje fue enviado correctamente';
            } catch (Exception $e) {
                $mensaje = 'El mensaje no pudo ser enviado al destino';
            }

        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }

}
