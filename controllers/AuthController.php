<?php
namespace Controllers;

use Model\Admin;
use MVC\Router;

class AuthController {
    public static function login(Router $router) {
        $errores = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);
            
            $errores = $auth->validar();

            if(empty($errores)) {
                //Verificar si el usuario existe
                $resultado = $auth->existeUsuario();
            
                if($resultado->num_rows === 0) {
                $errores = Admin::getErrores();
                } else {
                    $resultado = $auth->conseguirUsuario();
                    //Verificar el password
                    $autenticar = $auth->verificarContraseña($resultado);
                    if(!$autenticar) {
                        $errores = Admin::getErrores();
                    } else {
                        //Autenticar al usuario
                        $auth->autenticarUsuario();
                    }
                }
                
            }

        }

        $router->render('/auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout() {
        session_start();

        $_SESSION = [];

        header('Location: /');
    }
}