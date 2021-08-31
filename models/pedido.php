<?php

class pedido{
    
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $db;
    
    public function __construct() {
        $this->db = database::Connect();
    }
    
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getCoste() {
        return $this->coste;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setCoste($coste) {
        $this->coste = $coste;
    }
    
    public function save(){
        $sql = "INSERT INTO pedidos VALUES(NULL,'{$this->getUsuario_id()}','{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}','{$this->getCoste()}','En proceso', CURDATE(), CURTIME());";
        $query = $this->db->query($sql);
        $this->saveLinea();
        if($query){
            return $query;
        }
        else
            return $query;
    }
    
    public function getAll(){
        $sql = "SELECT * FROM pedidos ORDER BY id ASC";            
        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else{
            return false;
        }
}

    public function getOne(){
        $sql = "SELECT * FROM pedidos WHERE id = {$this->id}";
        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else
            return FALSE;  
        }
        
    public function saveLinea()
    {
        $sql = "SELECT LAST_INSERT_ID() AS 'pedido'";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;
        foreach ($_SESSION['carrito'] as $value => $elemento){
            $sql = "INSERT INTO lineas_pedidos (id, producto_id, pedido_id, unidades) VALUES (NULL, '{$elemento['id_producto']}', '{$pedido_id}', '{$elemento['unidades']}')";
            $query2 = $this->db->query($sql);
        }
    }
    
    public function getMypedidos(){
        if(Utilities::identity()){
            $userId = $_SESSION['user']->id;
            $sql = "SELECT * FROM pedidos WHERE usuario_id = '$userId'";
            $query = $this->db->query($sql);
            if($query){
                return $query;
            }
            else {
                return false;
            }
        }
    }
    
    public function specificPedido() {
        if(Utilities::identity()){
            $sql = "SELECT pro.*, pe.*, li.* FROM pedidos pe, lineas_pedidos li, productos pro WHERE pe.id = li.pedido_id AND li.producto_id = pro.id AND pe.id = '{$this->getId()}'";
            $query = $this->db->query($sql);
            if($query){
                return $query;
            }
            else {
                return false;
            }
        }
    }
    
    public function updateStatePedido(){
        if(Utilities::admin()){
            $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}' WHERE id = '{$this->getId()}'";
            $query = $this->db->query($sql);
            if($query){
                return $query;
            }
            else {
                return false;
            }
        }
    }
}