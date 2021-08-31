<?php

require_once 'models/categoria.php';

class categoriaController{
    
    public function index(){
        $categoria = new categoria();
        $categorias = $categoria->getCategorias();
        $admin = Utilities::admin();
        $categoria->setAdmin($admin);
        if($categoria->admin){
            require_once 'views/categoria/index.php';
        }
        else {
            echo 'No existe la pagina que buscas';
        }
    }
    
    public function crearCategorias(){   
        $categoria = new categoria();
        $admin = Utilities::admin();
        $categoria->setAdmin($admin);
        if($categoria->admin){
            require_once 'views/categoria/crear.php';
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']: false;
            if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                $categoria = new categoria();
                $categoria->setNombre($nombre);
                $flag = $categoria->crearCategorias();
                if($flag){
                    $_SESSION['msg'] = true;
                    header("location:http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=categoriaController&method_option=index");
                }
                else{
                    $_SESSION['msg'] = false;
                }     
            }
            else {
               $_SESSION['msg'] = false;
            }            
        }
        else {
            echo 'No existe la pagina que buscas';
        }
    }
}