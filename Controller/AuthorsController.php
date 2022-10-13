<?php
require_once './Model/AuthorsModel.php';
require_once './Model/BooksModel.php';
require_once './View/AuthorsView.php';

class AuthorsController{

    private $model;
    private $view;
    private $booksModel;

    function __construct(){
        $this->model = new AuthorsModel();
        $this->view = new AuthorsView();
        $this->booksModel = new BooksModel();
    }

    function viewAutores(){
        // el model se encarga de hablar con la ddbb
        $autores = $this->model->getAutoresFromDB();

        // el view se encarga del front end
        $this->view->showAutores($autores); 
    }

    function viewAboutAutor($id){
        $autor = $this->model->getAutorFromDB($id);

        $this->view->showAboutAutor($autor);
    }

    function viewLibrosAutor($id){
    
        $autor = $this->model->getAutorFromDB($id);
        $libros = $this->booksModel->getLibrosAutorFromDB($id);

        $this->view->showLibrosAutor($autor, $libros);
    }



}