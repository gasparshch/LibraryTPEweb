<?php
require_once './Model/BooksModel.php';
require_once './View/BooksView.php';
require_once './Model/AuthorsModel';

// el controlador divide el trabajo a la bbdd y al frontend
class BooksController{

    private $model;
    private $view;
    private $authorsModel;

    function __construct(){
        $this->model = new BooksModel();
        $this->view = new BooksView();
        $this->authorsModel = new AuthorsModel();
    }

    function viewHome(){
        // el model se encarga de hablar con la ddbb
        $autores = $this->authorsModel->getAutoresFromDB();
        $libros = $this->model->getLibrosFromDB();
        //$autor = $this->model->getAutorFromDB($id_autor);

        // el view se encarga del front end
        $this->view->showHome($autores, $libros);
    }

    function viewLibros(){
        // el model se encarga de hablar con la ddbb
        $libros = $this->model->getLibrosFromDB();

        // el view se encarga del front end
        $this->view->showLibros($libros); 
    }

    function viewAboutLibro($id){
        // el model se encarga de hablar con la ddbb
        $libro = $this->model->getLibroFromDB($id);
        $autor = $this->authorsModel->getAutorFromDB($libro->id_autor);

        // el view se encarga del front end
        $this->view->showAboutLibro($libro, $autor);
    }

    function pagUpdateLibro($id){

        $libro = $this->model->getLibroFromDB($id);
        $autor = $this->authorsModel->getAutorFromDB($libro->id_autor);
        $autores = $this->authorsModel->getAutoresFromDB();

        $this->view->showPagUpdateLibro($id, $libro, $autor, $autores);
    }

    function createLibro(){

        if(!empty($_POST['titulo']) && !empty($_POST['genero']) && !empty($_POST['descripcion']) && !empty($_POST['id_autor'])) {
            $this->model->createLibroFromDB($_POST['titulo'], $_POST['genero'], $_POST['descripcion'], $_POST['id_autor']);
            $this->view->showHomeLocation();
        } else {
            $this->view->showHomeLocation();
        }
    }

    function deleteLibro($id){

        $this->model->deleteLibroFromDB($id);
        $this->view->showHomeLocation();
    
    }

    function updateLibro($id){
        if(!empty($_POST['titulo']) && !empty($_POST['genero']) && !empty($_POST['descripcion']) && !empty($_POST['id_autor'])) {
            $this->model->updateLibroFromDB($id, $_POST['titulo'], $_POST['genero'], $_POST['descripcion'], $_POST['id_autor']);
            $this->view->showHomeLocation();
        } else {
            $this->view->showHomeLocation();
        }
    }


}