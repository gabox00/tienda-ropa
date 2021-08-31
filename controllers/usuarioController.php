<?php
require_once 'models/usuario.php';
class usuarioController{
    
    public function registro(){
        require_once 'views/usuario/registro.php';
    }
    
    public function saveUser(){
        if(isset($_POST)){  
            //validar si estan vacios
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false; 
            //inicializando array de errores para validar las variables
            $errores = array(); 
            $flag_campos = array();
            
            //validar nombre
            if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                $flag_campos['nombre'] = true;
            }
            else{
                $flag_campos['nombre'] = false;
                $errores['nombre'] = 'El nombre no es valido';
            }
            
            //validar apellidos
            if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
                $flag_campos['apellidos'] = true;
            }
            else{
                $flag_campos['apellidos'] = false;
                $errores['apellidos'] = 'El apellido no es valido';
                
            }
            
            //validar password
            if(!empty($password)){
                $flag_campos['password'] = true;
            }
            else{
                $flag_campos['password'] = false;
                $errores['password'] = 'El password no es valido';
            }
            
            //validar email
            if(!empty($email && filter_var($email, FILTER_VALIDATE_EMAIL))){
                $flag_campos['email'] = true;
            }
            else{
                $flag_campos['email'] = false;
                $errores['email'] = 'El email no es valido';
            }
            
            if(count($errores) == ""){
                $_SESSION['register'] = true;
                $usuario = new usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $save = $usuario->save();
                if(!$save){
                    $_SESSION['register'] = false;
                }
            }
            else{
                $_SESSION['errores'] = $errores; 
                $_SESSION['register'] = false;
            }
        }
        else{
             $_SESSION['register'] = false; 
        }    
        header("location:http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=usuarioController&method_option=registro");
    }   
    
    public function login(){
        if(isset($_POST)){
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false; 
            $usuario = new usuario();
            $user = $usuario->login($email, $password);
            if(is_object($user)){
                $_SESSION['user'] = $user;
            }
            else{
                $_SESSION['error'] = 'Error en la identificacion';
            } 
        }
        else{
            $_SESSION['error'] = 'Error en la identificacion';
        }
        header("location:http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=index");
    }
    
    public function Logout(){
        if(isset($_POST)){
            Utilities::sessionsDelete('user');
            Utilities::sessionsDelete('carrito');
            header("location:http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=index");
        }
    }
    
}