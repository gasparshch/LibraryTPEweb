<?php
require_once './Model/UserModel.php';
require_once './View/LoginView.php';

class LoginController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
    }

    function viewRegister(){
        session_start();
        $_SESSION["rol"] = 0;
        $this->view->showRegister();
    }

    function viewLogin(){
        session_start();
        $_SESSION["rol"] = 0;
        $this->view->showLogin();   
    }

    function viewLogout(){
        session_start();
        $_SESSION["rol"] = 0;
        session_destroy();
        $this->view->showLogin("Te deslogueaste");
    }

    function verifyLogin(){
        if (!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->getUser($email);
            
            // si el user existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->password)){
                session_start();
                $_SESSION["email"] = $user->email;
                $_SESSION["name"] = $user->username;
                $_SESSION["rol"] = $user->id_rol;
                $this->view->showHome();
            } else {
                session_start();
                $_SESSION["rol"] = 0;
                $this->view->showLogin("Acceso denegado");             
            }   
        }
    }

    function createUser(){
        if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['id_rol'])){
            $email = $_POST['email'];
            $username = $_POST['username'];
            $id_rol = $_POST['id_rol'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->model->createUserFromDB($email,$username, $password, $id_rol);
            header("Location: ".BASE_URL."home");
        }

    }

}