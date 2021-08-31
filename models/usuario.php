<?php

class usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $rol;
    private $password;
    private $imagen;
    private $db;
    
    public function __construct() {
        $this->db = database::Connect();
    }


    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    public function setEmail($email) {
        $this->email= $this->db->real_escape_string($email);
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setPassword($password) {
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT,['cost'=>4]);
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES(null,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user',null)";
        $save = $this->db->query($sql);
        $flag = false;
        if($save){
            $flag= true;
        }
        return $flag;
    }
    
    public function login($email,$password){
        $flag = false;
        $sql = "SELECT * FROM usuarios WHERE email = '$email';";
        $login = $this->db->query($sql);
        if($login && $login->num_rows == 1){
            $user = $login->fetch_object();
            $verify = password_verify($password, $user->password);
            if($verify){
                return $user;
            }
        }
        return $flag;
        
    }
}