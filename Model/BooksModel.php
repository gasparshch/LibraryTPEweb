<?php

class BooksModel{

    private $db;
    
    function __construct(){
        // me conecto a la base de datos, abro conexión
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_biblioteca;charset=utf8', 'root', '');
    }
    
    function getLibrosFromDB() {
         
        // preparo la sentencia para devolver el resultado
        $sentencia = $this->db->prepare("select * from libros");
        
        $sentencia->execute();
        $libros = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
        // devuelvo todo el array de tareas
        return $libros;
    
    }

    function getLibroFromDB($id){

        // preparo la sentencia para devolver el resultado
        // el resultado es un solo objeto que busqué con el id
        $sentencia = $this->db->prepare("select * from libros WHERE id_libro=?");
        
        // lo ejecuto y capturo
        $sentencia->execute(array($id));
        $libro = $sentencia->fetch(PDO::FETCH_OBJ);
    
        // devuelvo todo el array de tareas
        return $libro;
    
    }

    function getLibrosAutorFromDB($id){

        $sentencia = $this->db->prepare("SELECT libros.*, autores.nombre FROM libros INNER JOIN autores ON libros.id_autor = autores.id_autor WHERE libros.id_autor = '".$id ."'");
        $sentencia->execute(array($id));
    
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    
    }

    function createLibroFromDB($titulo, $genero, $descripcion, $id_autor) {

        // preparo la sentencia para devolver el resultado
        $sentencia = $this->db->prepare("select * from libros");
            
        // capturo todos los items para posterior manipulación
        $sentencia->execute();
        $libros = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
        // busco el ID mas grande, habria que optimizar con lastInsertID()
        $max = 0;
        foreach($libros as $libro){
            if($libro->id_libro > $max){
                $max = $libro->id_libro;
            }
        }
        $proxId = $max + 1;
    
        // preparo la sentencia para insertar
        $sentencia = $this->db->prepare("INSERT INTO libros(id_libro, titulo, genero, descripcion, id_autor) VALUES(?, ?, ?, ?, ?) ");
    
        // ejecuto la sentencia, le paso un arreglo que va a tomar esos signos de pregunta
        $sentencia->execute(array($proxId, $titulo, $genero, $descripcion, $id_autor));
    
    }

    function deletelibroFromDB($id){

        // preparo la sentencia para borrar
        $sentencia = $this->db->prepare("DELETE FROM libros WHERE id_libro=?");
        
        // ejecuto la sentencia
        $sentencia->execute(array($id));
    }

}