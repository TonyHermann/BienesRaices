<?php 

namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn) {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {

        session_start();
        $auth = $_SESSION['login'] ?? null;

        //Arreglo de rutas protegidas
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar/', '/blog/crear', '/blog/actualizar', '/blog/eliminar'];


        $urlActual = $_SERVER['REDIRECT_URL'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        // echo "<pre>";

        // echo(var_dump($this->rutasGET));

        // echo "</pre>";

        // echo "<pre>";

        // echo(var_dump($this->rutasPOST));

        // echo "</pre>";

        // echo "<pre>";

        // echo($urlActual);

        // echo "</pre>";

        // echo "<pre>";

        // echo($_SERVER['PATH_INFO']);

        // echo "</pre>";

        // echoPre($_SERVER);


        if($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? NULL;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? NULL;
        }

        if(in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /');
        }

        if($fn) {
            call_user_func($fn, $this);
        } else {
            echoPre('ERROR 404');
        }

   
    }

    public function render($view, $datos = []) {
        
        foreach($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/view/$view.php";
        $contenido = ob_get_clean();
        include __DIR__ . "/view/layout.php";
    }

}