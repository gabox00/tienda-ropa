<?php

class categoria{
    private $id;
    private $nombre;
    private $db;
    public $admin;
    
    public function __construct() {
        $this->db = database::Connect();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    
    public function setAdmin($admin) {
        $this->admin = $admin;
    }
    
    public function getCategorias(){
        $sql = "SELECT * FROM categorias ORDER BY id ASC";
        $query = $this->db->query($sql);
        if($query){
            $categorias = $query;
            return $categorias;
        }
        return FALSE;     
    }
    
    public function getOne(){
        $sql = "SELECT * FROM categorias WHERE id = '{$this->id}'";
        $query = $this->db->query($sql);
        if($query){           
            return $query->fetch_object();
        }
        return FALSE;     
    }
    
    public function crearCategorias(){
        $sql = "INSERT INTO categorias VALUES(null,'{$this->getNombre()}');";
        $query = $this->db->query($sql);
        return $query;
    }
}


