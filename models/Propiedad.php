<?php 

namespace Model;

class Propiedad extends ActiveRecord {   

    protected static $tabla = 'propiedades';
    protected static $columnasDb = ['id', 'titulo', 'precio', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado',
    'vendedorid','imagen'];

    public $id;
    public $titulo;
    public $precio;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorid;
    public $imagen;
    

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null; 
        $this->titulo = $args['titulo'] ?? ''; 
        $this->precio = $args['precio'] ?? ''; 
        $this->descripcion = $args['descripcion'] ?? ''; 
        $this->habitaciones = $args['habitaciones'] ?? ''; 
        $this->wc = $args['wc'] ?? ''; 
        $this->estacionamiento = $args['estacionamiento'] ?? ''; 
        $this->creado = date('Y/m/d');
        $this->vendedorid = $args['vendedorid'] ?? ''; 
        $this->imagen = $args['imagen'] ?? '';    

    }

    public function validar() {
        
        if(!$this->titulo) {
            self::$errores[] = "Debes añadir un título";
        };
        if(!$this->precio) {
            self::$errores[] = "Debes añadir un precio";
        } elseif($this->precio < 1) {
            self::$errores[] = "El precio no puede ser menor de $1";
        };

        if(strlen($this->descripcion) < 50) {
            self::$errores[] = "Debes añadir una descripcion y debe ser tener más de 50 caracteres";
        };

        if(!$this->habitaciones) {
            self::$errores[] = "Debes añadir un habitaciones";
        };

        if(!$this->wc) {
            self::$errores[] = "Debes añadir un wc";
        };

        if(!$this->estacionamiento) {
            self::$errores[] = "Debes añadir un estacionamineto";
        };

        if(!$this->vendedorid) {
            self::$errores[] = "Debes seleccionar un vendedor";
        };

        if(!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        };

        return self::$errores;
    }

}


