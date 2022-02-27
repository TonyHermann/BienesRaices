<?php
namespace Controllers;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Entrada;

class BlogController {
    public static function crear(Router $router) {

        //Arreglo con mensajes de errores
        $errores = Entrada::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
 
            //Creo la instancia
            $entrada = new Entrada($_POST['entrada']);
            
            //Subida de archivos
    
            //Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
            //Setear imagen
            //Hacer un resize de la imagen
            if($_FILES['entrada']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(1280,720);
                $entrada->setImage($nombreImagen);
            }

            //Validar
            $errores = $entrada->validar();
    
            if(empty($errores)) {
    
                //Crear la carpeta
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
    
                $pathx = CARPETA_IMAGENES . $nombreImagen;
                
                // Guardar la imagen
                $image->save($pathx);
    
    
                //Guardar la propiedad
                $entrada->guardar();

            }
    
        }

        $router->render('/blog/crear', [
            'errores' => $errores,
            'entrada' => $entrada
        ]);

    }

    public static function actualizar(Router $router) {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id) {
            header('Location: /admin');
        }

        // Consultar para obtener datos de la propiedad
        $entrada = Entrada::find($id);

        $errores = Entrada::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['entrada'];
            $entrada->sincronizar($args);
          
            $errores = $entrada->validar();
        
            if(empty($errores)) {
    
                /** Subida de archivos */
    
                //Crear la carpeta
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
    
                
                //si existe una nueva imagen...
                if($_FILES['entrada']['tmp_name']['imagen']) {
                    //Eliminar la imagen anterior
                    $entrada->removeImage();
    
                    //Hacer un resize de la imagen
                    $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(1280,720);
    
                    //Creo un nombre de imagen aleatorio
                    $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
                    //Setear imagen
                    $entrada->setImage($nombreImagen);
    
                    //Creo el path para guarda la imagen...
                    $pathx = CARPETA_IMAGENES . $nombreImagen;
    
                    // Guardar la imagen
                    $image->save($pathx);
                }
    
                //Edito el registro
                $resultado = $entrada->editarRegistro();
                
                //Redireccionar al index
                if ($resultado) {
                    // Redireccionar al usuario
                    header('Location: /admin?resultado=2');
                };
            }
    
        }

        $router->render("blog/actualizar", [
            'entrada' => $entrada,
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
                    $entrada = Entrada::find($id);
        
                    //Eliminar la propiedad
                    $entrada->eliminarRegistro();
            }
        };

    }

}