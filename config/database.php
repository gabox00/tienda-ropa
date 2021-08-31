<?php

class database{
    public static function Connect(){
        $db = new mysqli("localhost", "root", "", 'tienda_ropa');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}