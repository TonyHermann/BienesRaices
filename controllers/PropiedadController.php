<?php 

namespace Controllers;

use Model\Propiedad;
use Model\Vendedor;
use Model\Entrada;
use MVC\Router;

use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
    public static function index(Router $router) {

        $resultado = $_GET['resultado'];

        $propiedades = Propiedad::all();

        $vendedores = Vendedor::all();

        $entradas = Entrada::All();

        $router->render("paginas/admin", [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores,
            'entradas' => $entradas
        ]);
    }

    public static function crear(Router $router) {

        //Obtener vendedores
        $vendedores = Vendedor::All();

        //Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Creo la instancia
            $propiedad = new Propiedad($_POST['propiedad']);
    
            //Subida de archivos
    
            //Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
            //Setear imagen
            //Hacer un resize de la imagen
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(1280,720);
                $propiedad->setImage($nombreImagen);
            }
        
            //Validar
            $errores = $propiedad->validar();
    
            if(empty($errores)) {
    
                //Crear la carpeta
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
    
                $pathx = CARPETA_IMAGENES . $nombreImagen;
                
                // Guardar la imagen
                $image->save($pathx);
    
    
                //Guardar la propiedad
                $propiedad->guardar();

            }
    
        }

        $router->render("propiedades/crear", [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id) {
            header('Location: /admin');
        }

        // Consultar para obtener datos de la propiedad
        $propiedad = Propiedad::find($id);

        $vendedores = Vendedor::All();

        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['propiedad'];
            $propiedad->sincronizar($args);
          
            $errores = $propiedad->validar();
        
            if(empty($errores)) {
    
                /** Subida de archivos */
    
                //Crear la carpeta
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
    
                
                //si existe una nueva imagen...
                if($_FILES['propiedad']['tmp_name']['imagen']) {
                    //Eliminar la imagen anterior
                    $propiedad->removeImage();
    
                    //Hacer un resize de la imagen
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(1280,720);
    
                    //Creo un nombre de imagen aleatorio
                    $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
                    //Setear imagen
                    $propiedad->setImage($nombreImagen);
    
                    //Creo el path para guarda la imagen...
                    $pathx = CARPETA_IMAGENES . $nombreImagen;
    
                    // Guardar la imagen
                    $image->save($pathx);
                }
    
                //Edito el registro
                $resultado = $propiedad->editarRegistro();
                
                //Redireccionar al index
                if ($resultado) {
                    // Redireccionar al usuario
                    header('Location: /admin?resultado=2');
                };
            }
    
        }

        $router->render("propiedades/actualizar", [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);

    }

    public static function eliminar(Router $router) {
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
                    //Eliminar la propiedad
                    $resultado = $propiedad->eliminarRegistro();
                    
                    // Redireccionar
                    if($resultado) {
                        header('location: /');
                    }   
                    
            }
        };  

    }

}