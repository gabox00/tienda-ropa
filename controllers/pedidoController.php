<?php

require_once 'models/pedido.php';

class pedidoController{
    public function index(){
        require_once 'views/pedido/index.php';
    }
    
    public function save(){
        if(Utilities::identity() == true){
            if(isset($_POST)){
                $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
                $localidad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
                $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
                $usuario_id = $_SESSION['user']->id;
                $coste = Utilities::statsCarrito()['total'];
                
                if(!empty($provincia) && !empty($localidad) && !empty($direccion) && !is_numeric($provincia) && !is_numeric($localidad) && !is_numeric($direccion) && $coste > 0){
                    //INSTANCIA DEL OBJETO pedido PARA GUARDAR EN BBDD
                    $pedido = new pedido();
                    $pedido->setProvincia($provincia);
                    $pedido->setCoste($coste);
                    $pedido->setLocalidad($localidad);
                    $pedido->setDireccion($direccion);
                    $pedido->setUsuario_id($usuario_id);
                    //Calcular el pedido
                    $FlagPedido = $pedido->save();
                    if($FlagPedido){             
                        require_once 'views/pedido/detalle.php';  
                        Utilities::sessionsDelete('carrito');
                    }
                    else
                        echo 'Hubo un error en el pago';
                }
                else
                {    
                    echo 'Ningun campo puede ser numerico';
                }              
            }
        }
        else
            echo 'Inicie sesion para continuar con su pedido'; 
    }
    
    public function allMyPedidos()
    {
        $pedidos = new pedido();
        $pedidos = $pedidos->getMypedidos();
        require_once 'views/pedido/misPedidos.php';
    }
    
    public function verPedido() {
        if(isset($_GET['id'])) {
            $pedidos = new pedido();
            $pedidos->setId($_GET['id']);
            $pedidos = $pedidos->specificPedido();
            require_once 'views/pedido/verPedido.php';
        }
        else {
            echo 'No existe ninguna ID';
        }
    }
    
    public function updateStatePedido(){
        if( isset($_POST['pedido_id']) && isset($_POST['estado']) ){
            switch ($_POST['estado']){
                case $_POST['estado'] == "pending":
                    $state = "Pendiente";
                    break;
                case $_POST['estado'] == "preparation":
                    $state = "En preparacion";
                    break;
                case $_POST['estado'] == "ready":
                    $state = "Preparado para enviar";
                    break;
                case $_POST['estado'] == "sended":
                    $state = "Enviado";
                    break;
            }
            $pedidoID = $_POST['pedido_id'];
            
            $pedido = new pedido();
            $pedido->setId($pedidoID);
            $pedido->setEstado($state);
            
            $flag = $pedido->updateStatePedido();
        }
    }
}