<?php
require_once './Model/BibliotecaModel.php';
require_once './View/BibliotecaView.php';

// el controlador divide el trabajo a la bbdd y al frontend
class BibliotecaController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new BibliotecaModel();
        $this->view = new BibliotecaView();
    }

    function viewHome(){
        // el model se encarga de hablar con la ddbb
        $autores = $this->model->getAutoresFromDB();
        $libros = $this->model->getLibrosFromDB();
        //$autor = $this->model->getAutorFromDB($id_autor);

        // el view se encarga del front end
        $this->view->showHome($autores, $libros);
    }

    function viewAutores(){
        // el model se encarga de hablar con la ddbb
        $autores = $this->model->getAutoresFromDB();

        // el view se encarga del front end
        $this->view->showAutores($autores); 
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
        $autor = $this->model->getAutorFromDB($libro->id_autor);

        // el view se encarga del front end
        $this->view->showAboutLibro($libro, $autor);
    }

    function viewAboutAutor($id){
        $autor = $this->model->getAutorFromDB($id);

        $this->view->showAboutAutor($autor);
    }

    function viewLibrosAutor($id){
    
        $autor = $this->model->getAutorFromDB($id);
        $libros = $this->model->getLibrosAutorFromDB($id);

        $this->view->showLibrosAutor($autor, $libros);
    }

    function pagUpdateLibro($id){

        $libro = $this->model->getLibroFromDB($id);
        $autor = $this->model->getAutorFromDB($libro->id_autor);
        $autores = $this->model->getAutoresFromDB();

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