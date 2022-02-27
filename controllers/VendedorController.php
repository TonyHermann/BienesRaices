<?php 

namespace Controllers;

use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;


class VendedorController {

    public static function crear(Router $router) {

            //Arreglo con mensajes de errores
            $errores = Vendedor::getErrores();

            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                //Creo la instancia
                $vendedor = new Vendedor($_POST['vendedor']);

                //Validar
                $errores = $vendedor->validar();

                if(empty($errores)) {

                    //Guardar la propiedad
                    $vendedor->guardar();
                
                }

            }

            $router->render("vendedores/crear", [
                'vendedor' => $vendedor,
                'errores' => $errores
            ]);
        
    }

    public static function actualizar(Router $router) {
        //Validar la URL
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id) {
            header('Location: /admin');
        }

        // Consultar para obtener datos de la propiedad
        $vendedor = Vendedor::find($id);

        $errores = Vendedor::getErrores();



        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['vendedor'];
            $vendedor->sincronizar($args);

            $errores = $vendedor->validar();

            if(empty($errores)) {

                //Edito el registro
                $resultado = $vendedor->editarRegistro();
                
                //Redireccionar al index
                if ($resultado) {
                    // Redireccionar al usuario
                    header('Location: /admin?resultado=2');
                };
            }

        }

        $router->render("vendedores/actualizar", [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $tipo = $_POST['tipo'];
            if (!validarTipo($tipo)) {
                header('Location: /admin?resultado=5');
            }
        
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if ($id) {
                    // Consultar para obtener datos de la propiedad
                    $propiedad = Propiedad::find($id);
        
                    //Eliminar el vendedor
                    $propiedad->eliminarRegistro();
            }
        };
    }

}