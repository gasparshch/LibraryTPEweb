<?php

class AuthorsModel{

    private $db;

    function __construct(){
        // me conecto a la base de datos, abro conexión
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    function getAuthorsFromDb() {
     
        // preparo la sentencia para devolver el resultado
        $query = $this->db->prepare("select * from authors");
        
        $query->execute();
        $authors = $query->fetchAll(PDO::FETCH_OBJ);
    
        // devuelvo todo el array de tareas
        return $authors;
    
    }

    function getAuthorFromDB($id_author){

        // preparo la sentencia para devolver el resultado
        // el resultado es un solo objeto que busqué con el id
        $query = $this->db->prepare("select * from authors WHERE id_author=?");
        
        // lo ejecuto y capturo
        $query->execute(array($id_author));
        $author = $query->fetch(PDO::FETCH_OBJ);
    
        // devuelvo todo el array de tareas
        return $author;
    
    }

    function getBooksAuthorFromDB($id_author){

        $query = $this->db->prepare("SELECT authors.namename, books.* FROM authors INNER JOIN books ON authors.id_author = books.id_author WHERE authors.id_author = ?");
        $query->execute(array($id_author));
    
        return $query->fetchAll(PDO::FETCH_OBJ);
    
    }

    function createAuthorFromDB($namename, $age, $bio){
        // preparo la sentencia para devolver el resultado
        $query = $this->db->prepare("select * from authors");
            
        // capturo todos los items para posterior manipulación
        $query->execute();
        $authors = $query->fetchAll(PDO::FETCH_OBJ);
    
        // busco el ID mas grande, habria que optimizar con lastInsertID()
        $max = 0;
        foreach($authors as $author){
            if($author->id_author > $max){
                $max = $author->id_author;
            }
        }
        $proxId = $max + 1;
    
        // preparo la sentencia para insertar
        $query = $this->db->prepare("INSERT INTO authors(id_author, namename, age, bio) VALUES(?, ?, ?, ?) ");
    
        // ejecuto la sentencia, le paso un arreglo que va a tomar esos signos de pregunta
        $query->execute(array($proxId, $namename, $age, $bio));
    }

    function deleteAuthorFromDB($id_author){

        // preparo la sentencia para borrar
        $query = $this->db->prepare("DELETE FROM authors WHERE id_author=?");
        
        // ejecuto la sentencia
        $query->execute(array($id_author));
    }

    function updateAuthorFromDB($id_author, $namename, $age, $bio){
        // preparo la sentencia para actualizar
        $query = $this->db->prepare("UPDATE authors SET namename=?, age=?, bio=? WHERE id_author=?");
    
        // ejecuto la sentencia
        $query->execute(array($namename, $age, $bio, $id_author));
    }

}