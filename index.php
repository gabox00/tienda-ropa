<?php 
//cargamos la session
session_start();
//usamos la autocarga de clases para no hacer tantos require_once de cada controllers
//lo que hace el autoload es incluir todas las clases de la carpeta controllers que existen
require_once 'config/database.php';
require_once 'autoload.php';
// o
//require_once 'controllers/NotaController.php';
//require_once 'controllers/UsuarioController.php';
require_once 'helpers/utilities.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


if(isset($_GET['controller_option']) && class_exists($_GET['controller_option'])){
    $controller_option = $_GET['controller_option'];
    $controlador = new $controller_option();
    if(isset($_GET['method_option']) && method_exists($controlador, $_GET['method_option'])){
        $method_option = $_GET['method_option'];
        $controlador->$method_option();    
    }
    else
        echo 'No existe metodo';    
}
else
    echo 'No existe esa clase';

require_once 'views/layout/footer.php';