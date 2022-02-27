<?php 

define('TEMPLATES_URL', __DIR__ . '/templates/');
define('FUNCIONES_URL', __DIR__ .'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . "/imagenes/");

function incluirTemplate( $nombre, $state = false ) {
    if ($state == 'inicio') {
        $inicio = true;
        include TEMPLATES_URL . "/${nombre}.php";
    } else if ($state == 'simpleheader') {
        $simpleheader = true;
        include TEMPLATES_URL . "/${nombre}.php";
    } else if (!$state) {
        include TEMPLATES_URL . "/${nombre}.php";
    }
    
};

function estaAutenticado() {
    session_start();

    if(!$_SESSION['login']) {
        header('Location: /bienesraices/');
    }

}

function echoPre($thing) {
    echo "<pre>";
    var_dump($thing);
    echo "</pre>";
    exit;
}

// Sanitizar HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipo($string) {
    $tipos = ['vendedor', 'propiedad'];

    return in_array($string, $tipos);

}   

function mostrarNotificacion($codigo) {
    $mensaje = '';
    switch ($codigo) {
        case '1':
            $mensaje = 'Creado correctamente';
            break;
        case '2':
            $mensaje = 'Actualizado correctamente';
            break;
        case '3':
            $mensaje = 'Eliminado correctamente';
            break;
        case '4':
            $mensaje = 'El elemento que estas tratando de eliminar no tiene un tipo válido';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function limitar_cadena($cadena, $limite, $sufijo){
	// Si la longitud es mayor que el límite...
	if(strlen($cadena) > $limite){
		// Entonces corta la cadena y ponle el sufijo
		return substr($cadena, 0, $limite) . $sufijo;
	}
	
	// Si no, entonces devuelve la cadena normal
	return $cadena;
}