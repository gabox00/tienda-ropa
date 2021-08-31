<?php

class producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $image;
    private $db;
    
    public function __construct() {
        $this->db = database::Connect();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCategoria_id() {
        return $this->categoria_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getOferta() {
        return $this->oferta;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getImage() {
        return $this->image;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function setOferta($oferta) {
        $this->oferta = $oferta;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getAll(){
        if($this->id){
            $sql = "SELECT * FROM productos WHERE categoria_id = '{$this->id}'";
        }
        else{
            $sql = "SELECT * FROM productos ORDER BY id ASC";            
        }
        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else{
            return false;
        }
    }
    
    public function getOne(){
        $sql = "SELECT * FROM productos WHERE id ={$this->id}";
        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else
            return FALSE;  
    }
    
    public function getRandom($limit){
        $sql = "SELECT c.nombre AS nombre_cat, p.* FROM categorias c, productos p WHERE c.id = p.categoria_id ORDER BY RAND() LIMIT $limit;";
        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else
            return FALSE; 
        
    }

    public function create(){
        $sql = "INSERT INTO productos VALUES(null,'{$this->getCategoria_id()}','{$this->getNombre()}','{$this->getDescripcion()}','{$this->getPrecio()}','{$this->getStock()}','{$this->getOferta()}',CURDATE(),'{$this->getImage()}')";
        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else
            return false;
    }
    
    public function delete(){
        $sql = "DELETE FROM productos WHERE id={$this->id}";
        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else
            return FALSE;
    }
    
    public function update(){
        $sql = "UPDATE productos SET categoria_id = '{$this->getCategoria_id()}', nombre = '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio = '{$this->getPrecio()}', stock = '{$this->getStock()}', oferta = '{$this->getOferta()}'";
        if($this->getImage() != NULL){
            $sql.= ", image = '{$this->getImage()}'";            
        }
        $sql.= " WHERE id = '{$this->getId()}';";
        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else
            return FALSE;
    }
}
