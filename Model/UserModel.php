<?php

class UserModel{

    private $db;

    function __construct(){
        // me conecto a la base de datos, abro conexión
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    function getUser($email){
        $query = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function createUserFromDB($email, $username, $password, $id_rol){
        $query = $this->db->prepare("INSERT INTO users(username, email, password, id_rol) VALUES (?, ?, ?, ?)");

        $query->execute(array($username, $email, $password, $id_rol));
    }

}