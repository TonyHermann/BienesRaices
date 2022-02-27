<?php 

namespace Model;

class Entrada extends ActiveRecord {
    protected static $tabla = "blogentries";
    protected static $columnasDb = ['id', 'title', 'content', 'fecha', 'imagen', 'id_User'];

    public $id;
    public $title;
    public $content;
    public $fecha;
    public $imagen;
    public $id_User;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null; 
        $this->title = $args['title'] ?? ''; 
        $this->content = $args['content'] ?? ''; 
        $this->fecha = date('Y/m/d');
        $this->imagen = $args['imagen'] ?? '';   
        $this->id_User = $args['id_User'] ?? '4'; 

    }

    public function validar() {
        if(!$this->title) {
            self::$errores[] = "Debes añadir un título";
        };
        if(strlen($this->content) < 50) {
            self::$errores[] = "Debes añadir una descripcion y debe ser tener más de 50 caracteres";
        };

        if(!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        };

        return self::$errores;
    }


}