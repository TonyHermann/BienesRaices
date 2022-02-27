<?php 

namespace Model;

class ActiveRecord {

    // Conexión a la DB
    protected static $db;
    protected static $columnasDb = [];
    protected static $errores = [];
    protected static $tabla = '';

    //Definir la conexión a la base de datos
    public static function setDB($database) {
        self::$db = $database;
    }


    public function guardar() {
        $query = $this->crearQuery();

        $resultado = self::$db->query($query);

        if ($resultado) {
            // Redireccionar al usuario
            header('Location: /admin?resultado=1');
        };  
        
    }

    //Crear nuestro Query para mandar a la DB
    public function crearQuery() {
        $atributos = $this->sanitizarAtributos();

        $stringColumns = join(', ' , array_keys($atributos));
        
        $stringValues = join("', '", array_values($atributos));

        $query = " INSERT INTO " . static::$tabla .  " ( $stringColumns ) VALUES ( '$stringValues' ) ";

        return $query;
    }

    //Identificar y unir atributos de la DB  (crear la copia exacta de lo que voy a subir)
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDb as $columna) {
            if($columna === 'id') continue;   
            $atributos[$columna] = $this->$columna;
        }
        
        return $atributos;
    }

    //Sanitizar atributos
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            if($atributos[$key] === 'email') {
                $sanitizado[$key] = self::$db->escape_string(filter_var($value, FILTER_VALIDATE_EMAIL)); 
            }
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //Eliminar imagen
    public function removeImage() {
        unlink(CARPETA_IMAGENES . $this->imagen);
    }

    // Subir archivos
    public function setImage($imagen) {
        if($imagen) {
            //Asignar al atributo imagen el nombre de la imagen
            $this->imagen = $imagen;
        }
    }

    public static function getErrores() {
        return static::$errores;
    }

    public function validar() {
        static::$errores = [];
        return static::$errores;
    }

    public static function All($limit = null) {
        if($limit) {
            $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $limit;
        } else {
            $query = "SELECT * FROM " . static::$tabla;
        }
        $resultado = self::consultarSQL($query);

        return $resultado;
        
    }

    //Buscar un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla .  " WHERE id = ${id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query) {
        $resultado = self::$db->query($query);

        $array= [];

        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }

        $resultado->free();

        return $array;

    }

    public static function crearObjeto($registro) {
        $objeto = new static;
        

        foreach ($registro as $key => $value) {
            if(property_exists($objeto, $key)) {
                $objeto->$key = $value; 
            }
        }

        return $objeto;
    }

    //Sincroniza lo que el user escribió con el objeto
    public function sincronizar($args = []){
        foreach ($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }   
    }

    public function editarRegistro() {

        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = " UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";
       
        $resultado = self::$db->query($query);
        return $resultado;
    }   

    public function eliminarRegistro() {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = '" . self::$db->escape_string($this->id) . "' LIMIT 1 ";
        
        $resultado = self::$db->query($query);
        
        $this->removeImage();

        if($resultado) {
            header('Location: /admin?resultado=3');
        };
    }
};


