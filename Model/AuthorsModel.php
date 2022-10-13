<?php

class AuthorsModel{

    private $db;

    function __construct(){
        // me conecto a la base de datos, abro conexión
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    function getAutoresFromDb() {
     
        // preparo la sentencia para devolver el resultado
        $sentencia = $this->db->prepare("select * from autores");
        
        $sentencia->execute();
        $autores = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
        // devuelvo todo el array de tareas
        return $autores;
    
    }

    function getAutorFromDB($id){

        // preparo la sentencia para devolver el resultado
        // el resultado es un solo objeto que busqué con el id
        $sentencia = $this->db->prepare("select * from autores WHERE id_autor=?");
        
        // lo ejecuto y capturo
        $sentencia->execute(array($id));
        $autor = $sentencia->fetch(PDO::FETCH_OBJ);
    
        // devuelvo todo el array de tareas
        return $autor;
    
    }



}