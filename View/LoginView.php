<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class LoginView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showRegister(){
        // asignación
        $this->smarty->assign('titulo', 'Register now!');
        // renderizado
        $this->smarty->display('templates/register.tpl');
    }

    function showLogin($error = ""){
        // asignación
        $this->smarty->assign('titulo', 'Log In');
        $this->smarty->assign('error', $error);
        // renderizado
        $this->smarty->display('templates/login.tpl');
    }

    function showHome(){
        header("Location: ".BASE_URL."home");
    }

}