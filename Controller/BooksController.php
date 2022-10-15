<?php
require_once './Model/BooksModel.php';
require_once './View/BooksView.php';
require_once './Model/AuthorsModel.php';
require_once './View/LibraryView.php';

// el controlador divide el trabajo a la bbdd y al frontend
class BooksController{

    private $model;
    private $view;
    private $libraryView;
    private $authorsModel;

    function __construct(){
        $this->model = new BooksModel();
        $this->view = new BooksView();
        $this->libraryView = new LibraryView();
        $this->authorsModel = new AuthorsModel();
    }

    function viewBooks(){
        // el model se encarga de hablar con la ddbb
        $books = $this->model->getBooksFromDB();

        // el view se encarga del front end
        $this->view->showBooks($books); 
    }

    function viewAboutBook($id_book){
        // el model se encarga de hablar con la ddbb
        $book = $this->model->getBookFromDB($id_book);

        // el view se encarga del front end
        $this->view->showAboutBook($book);
    }

    function pagUpdateBook($id_book){

        $book = $this->model->getBookFromDB($id_book);
        $author = $this->authorsModel->getAuthorFromDB($book->id_author);
        $authors = $this->authorsModel->getAuthorsFromDB();

        $this->view->showPagUpdateBook($id_book, $book, $author, $authors);
    }

    function createBook(){

        if(!empty($_POST['title']) && !empty($_POST['genre']) && !empty($_POST['descrip']) && !empty($_POST['id_author'])) {
            $this->model->createBookFromDB($_POST['title'], $_POST['genre'], $_POST['descrip'], $_POST['id_author']);
            $this->libraryView->showHomeLocation();
        } else {
            $this->libraryView->showHomeLocation();
        }
    }

    function deleteBook($id_book){

        $this->model->deleteBookFromDB($id_book);
        $this->libraryView->showHomeLocation();
    
    }

    function updateBook($id_book){
        if(!empty($_POST['title']) && !empty($_POST['genre']) && !empty($_POST['descrip']) && !empty($_POST['id_author'])) {
            $this->model->updateBookFromDB($id_book, $_POST['title'], $_POST['genre'], $_POST['descrip'], $_POST['id_author']);
            $this->libraryView->showHomeLocation();
        } else {
            $this->libraryView->showHomeLocation();
        }
    }

    function pagCreateBook(){
        // capturo los autores para luego elegir a cual pertenece este nuevo libro
        $authors = $this->authorsModel->getAuthorsFromDB();
        $this->view->showPagCreateBook($authors);
    }


}