<?php

require_once 'models/producto.php';

class carritoController{
    public static function index(){
        require_once 'views/carrito/todo.php';
    }
    
    public function add()
    {
        if(isset($_GET['prod_id'])){
            $prod_id = $_GET['prod_id'];
            $producto = new producto();
            $producto->setId($prod_id);
            $producto = $producto->getOne();
            $producto = $producto->fetch_object();
            if(is_object($producto)){
                if(isset($_SESSION['carrito'])){
                    $count = 0;
                    foreach($_SESSION['carrito'] as $indice => $elemento){
                        if($elemento['id_producto'] == $prod_id){
                            $_SESSION['carrito'][$indice]['unidades']++;
                            $count++;                           
                            require_once 'views/carrito/todo.php';
                        }   
                    }
                }
                if(!isset($count) || $count == 0){
                    $_SESSION['carrito'][] = array(
                        "id_producto" => $producto->id,
                        "precio" => $producto->precio,
                        "unidades" => 1,
                        "producto" => $producto
                    );   
                    require_once 'views/carrito/todo.php';
                }
                        
            }
            else{
                echo 'error';                
            }
        }
        else{
            echo 'error';            
        }
    }
    
    public function deleteAll()
    {
        if(isset($_SESSION['carrito'])){
            unset($_SESSION['carrito']);
        }
        else
            echo 'No existe el carrito';
    }
    
    public function modifyUnits()
    {    
        if(isset($_SESSION['carrito']) && isset($_GET)){
            if(isset($_GET['mas'])){
                $indice = $_GET['indice'];
                $_SESSION['carrito'][$indice]['unidades']++;
            }
            else{
                $indice = $_GET['indice'];
                $_SESSION['carrito'][$indice]['unidades']--;
                if($_SESSION['carrito'][$indice]['unidades'] === 0){
                    unset($_SESSION['carrito'][$indice]);
                }
            }
            carritoController::index();
        }
    }
    
    public function unsetProduct(){
        if(isset($_GET['indice'])){
            unset($_SESSION['carrito'][$_GET['indice']]);
        }
        carritoController::index();
    }
    
    public function unsetCarrito(){
        Utilities::sessionsDelete('carrito');
        carritoController::index();
    }
}

?>