<?php
require_once 'models/producto.php';
require_once 'models/categoria.php';

class productoController{
    public function index(){
        $producto = new producto();
        $producto = $producto->getRandom(6);
        require_once 'views/producto/destacados.php';
    }
    
    public function gestionar(){
        $producto = new producto();
        $productos = $producto->getAll();
        $admin = Utilities::admin();
        if($admin){
            require_once 'views/producto/gestionar.php';
        }
        else
            echo 'La pagina que buscas no existe';   
    }
    
    public function mostrar(){
        if(isset($_GET['id'])){
            $producto = new producto();
            $categoria = new categoria();        
            $id = $_GET['id'];
            $categoria->setId($id);
            $producto->setId($id);
            $producto = $producto->getAll();
            $categoria = $categoria->getOne();
            if(is_object($categoria)){
                require_once 'views/producto/todos.php';                
            }
            else{
                echo 'Error al cargar la Pagina!';                
            }
        }
        else
            echo 'Error al cargar la Pagina!';
    }
    
    public function mostrarDetalle(){
        if(isset($_GET['prod_id']) && isset($_GET['cat_id'])){
            $prod_id = $_GET['prod_id'];
            $cat_id = $_GET['cat_id'];
            $producto = new producto();
            $categoria = new categoria();
            $categoria->setId($cat_id);
            $categoria = $categoria->getOne();
            $producto->setId($prod_id);
            $producto = $producto->getOne();
            $producto = $producto->fetch_object();
            require_once 'views/producto/detalle.php';            
        }
        else {
            echo 'La pagina que buscas no existe';
        }
    }

    public function crearProductos(){
        //instancio categoria para mostrar las cateogrias en la view
        $categoria = new categoria();
        $categorias = $categoria->getCategorias();
        $admin = Utilities::admin();
        if($admin){
            require_once 'views/producto/crear.php';
            if($_POST){
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $id_categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
                $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
                $oferta = isset($_POST['oferta']) ? $_POST['oferta'] : false;

                //inicializando array de errores para validar las variables
                $errores = array();
                $producto = new producto();   
                
                //validar nombre
                if(!empty($nombre) && !preg_match("/[0-9]/", $nombre)){
                    $producto->setNombre($nombre);
                }
                else{
                    $errores['nombre'] = 'El nombre no es valido';
                }        

                //validar precio
                if(!empty($precio) && is_numeric($precio)){
                    $producto->setPrecio($precio);
                }
                else{
                    $errores['precio'] = 'El precio no es valido';
                }

                //validar stock
                if(!empty($stock) && is_numeric($stock)){
                    $producto->setStock($stock);
                }
                else{
                    $errores['stock'] = 'El stock no es valido';
                }

                //validar oferta
                if(!empty($oferta) && is_numeric($oferta)){
                    $producto->setOferta($oferta);
                }
                else{
                    $errores['oferta'] = 'La oferta no es valido';
                }
                
                if(isset($_FILES['image'])){                                   
                    //guardar imagen               
                    $file = $_FILES['image'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];  
                    $flag = false;
                    if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
                        if(!is_dir('uploads/images')){
                            mkdir('uploads/images', 0777, true);
                        }
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);  
                        $flag = true;
                    }
                    if(count($errores) == "" && $id_categoria && $flag){
                        $producto->setImage($filename);
                        $producto->setCategoria_id($id_categoria);
                        $producto->setDescripcion($descripcion);
                        //Crear Producto
                        $save = $producto->create();                            
                        if($save){
                            $_SESSION['msg'] = true;
                        }
                        else{
                            $_SESSION['msg'] = false;
                        } 
                    }
                    else {
                       $_SESSION['errores'] = $errores;
                    }
                }
            }
        }
        else
            echo 'La pagina que buscas no existe';       
    }
   
    public function deleteProduct(){
        $id = isset($_GET['id'])?$_GET['id']:false;  
        if($id && Utilities::admin()){
            $producto = new producto();
            $producto->setId($id);
            $flag = $producto->delete();
            if($flag){
                header("location:http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=gestionar");
            }
            else
                $_SESSION['error'] = "Ocurrio un error";            
        }
        else
            $_SESSION['error'] = "Ocurrio un error";     
    }
    
    public function viewUpdateProduct(){
        if(Utilities::admin()){
            $update = true;
            $categoria = new categoria();
            $categorias = $categoria->getCategorias();;
            $id = isset($_GET['id'])?$_GET['id']:false;  
            $producto = new producto();
            $producto->setId($id);
            $producto = $producto->getOne();
            $producto = $producto->fetch_object();
            require_once 'views/producto/update.php';            
        }
        else {
            echo 'La pagina que buscas no existe';
        }
    }
    
    public function updateProduct(){
        if(Utilities::admin()){
            if($_POST){
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $id_categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
                $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
                $oferta = isset($_POST['oferta']) ? $_POST['oferta'] : false;
                $id = isset($_GET['id']) ? $_GET['id'] : false;

                //inicializando array de errores para validar las variables
                $errores = array();
                $producto = new producto();   
                
                //validar nombre
                if(!empty($nombre) && !preg_match("/[0-9]/", $nombre)){
                    $producto->setNombre($nombre);
                }
                else{
                    $errores['nombre'] = 'El nombre no es valido';
                }        

                //validar precio
                if(!empty($precio) && is_numeric($precio)){
                    $producto->setPrecio($precio);
                }
                else{
                    $errores['precio'] = 'El precio no es valido';
                }

                //validar stock
                if(!empty($stock) && is_numeric($stock)){
                    $producto->setStock($stock);
                }
                else{
                    $errores['stock'] = 'El stock no es valido';
                }

                //validar oferta
                if(!empty($oferta) && is_numeric($oferta)){
                    $producto->setOferta($oferta);
                }
                else{
                    $errores['oferta'] = 'La oferta no es valido';
                }
                
                if(!empty($id) && is_numeric($id)){
                    $producto->setId($id);
                }                                
                //guardar imagen  
                $file = $_FILES['image'];                
                $filename = $file['name'];
                $mimetype = $file['type'];            
                if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images', 0777, true);
                    }
                    move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);  
                }
                if(count($errores) == "" && $id_categoria){
                    $producto->setImage($filename);
                    $producto->setCategoria_id($id_categoria);
                    $producto->setDescripcion($descripcion);
                    //Actualizar Producto
                    $save = $producto->update();  
                    if($save){
                        $_SESSION['msg'] = true;
                        header("location:http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=gestionar");
                    }
                    else{
                        $_SESSION['msg'] = false;                       
                    } 
                }
                else {
                   $_SESSION['errores'] = $errores;
                }                
            }
        }  
    }
}
