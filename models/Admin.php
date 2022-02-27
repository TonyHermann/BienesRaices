<?php 

namespace Model;

class Admin extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columansDb = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar() {
        if(!$this->email) {
            self::$errores[] = 'El email es obligatorio';
        }
        
        if(!$this->password) {
            self::$errores[] = 'La contraseña es requerida';
        }

        return self::$errores;
    }
    
    public function existeUsuario() {
        $query = "SELECT email FROM " . self::$tabla . " WHERE email = '$this->email'" . " LIMIT 1";
        $resultado = self::$db->query($query);
        $resultado->fetch_object();
        
        if($resultado->num_rows === 0) {
            
            self::$errores[] = 'El usuario no existe';
        }
        return $resultado;
    }

    public function conseguirUsuario() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '$this->email'" . " LIMIT 1";
        $resultado = self::$db->query($query);

        return $resultado;
    }
    
    public function verificarContraseña($resultado) {
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);

        if(!$autenticado) {
            self::$errores[] = 'La contraseña es incorrecta';
        }
        
        return $autenticado;
    }

    public function autenticarUsuario() {
        session_start();

        //Llenar el array de _session
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /');
    }
    
}