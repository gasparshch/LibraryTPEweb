<?php
require_once './Model/BooksModel.php';
require_once './Model/AuthorsModel.php';
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class LibraryView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showHome($authors, $books){
        // asignación
        $this->smarty->assign('title', 'BIENVENIDO A LA LIBRERIA EL ATENEO ONLINE');
        $this->smarty->assign('authors', $authors);
        $this->smarty->assign('books', $books);
        // renderizado
        $this->smarty->display('templates/home.tpl');
    }

    function showHomeLocation(){

        header("Location: ".BASE_URL."home");
    }

}