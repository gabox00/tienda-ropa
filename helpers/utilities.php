<?php

class Utilities{
    public static function sessionsDelete($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);            
        }
        return $name;
    }   
    
    public static function showCategorias(){
        require_once 'models/categoria.php';
        $categoria = new categoria();
        $categorias = $categoria->getCategorias();
        return $categorias;
    }
    
    public static function admin(){
        if(isset($_SESSION['user'])){
            if($_SESSION['user']->rol == 'admin'){
                return true;
            }
            else
                return FALSE;            
        }
        else {
            return FALSE;; 
        }
    }
    
    public static function statsCarrito(){
        $stats = array(
            'count' => 0,
            'total' => 0
        );
        if(isset($_SESSION['carrito'])){
            $stats['count'] = count($_SESSION['carrito']);
            foreach($_SESSION['carrito'] as $value => $producto){
                $stats['total'] += $producto['precio'] * $producto['unidades'];
            }
        }
        return $stats;
    }
    
    public static function identity(){
        if(isset($_SESSION['user'])){
            return true;
        }
        else
            return false;
    }
}