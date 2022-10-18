<?php
require_once './Model/AuthorsModel.php';
require_once './Model/BooksModel.php';
require_once './View/AuthorsView.php';
require_once './View/LibraryView.php';
require_once './Helpers/AuthHelper.php';

class AuthorsController{

    private $model;
    private $view;
    private $libraryView;
    private $booksModel;
    private $authHelper;

    function __construct(){
        $this->model = new AuthorsModel();
        $this->view = new AuthorsView();
        $this->booksModel = new BooksModel();
        $this->libraryView = new LibraryView();
        $this->authHelper = new AuthHelper();
    }

    function viewAuthors(){
        $this->authHelper->checkLoggedIn();
        // el model se encarga de hablar con la ddbb
        $authors = $this->model->getAuthorsFromDB();

        // el view se encarga del front end
        $this->view->showAuthors($authors); 
    }

    function viewAboutAuthor($id_author){
        $this->authHelper->checkLoggedIn();
        $author = $this->model->getAuthorFromDB($id_author);

        $this->view->showAboutAuthor($author);
    }

    function viewBooksAuthor($id_author){
        $this->authHelper->checkLoggedIn();
        // capturo al autor y los libros que le pertenecen
        $author = $this->model->getAuthorFromDB($id_author);
        $books = $this->model->getBooksAuthorFromDB($author->id_author);

        $this->view->showBooksAuthor($author, $books);
    }

    function pagCreateAuthor(){
        $this->authHelper->checkLoggedIn();
        $this->view->showPagCreateAuthor();
    }

    function createAuthor(){
        $this->authHelper->checkLoggedIn();
        if(!empty($_POST['namename']) && !empty($_POST['age']) && !empty($_POST['bio'])) {
            if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png"){
                $this->model->createAuthorFromDB($_POST['namename'], $_POST['age'], $_POST['bio'], $_FILES['input_name']['tmp_name']);
            } else {
                $this->model->createAuthorFromDB($_POST['namename'], $_POST['age'], $_POST['bio']);
            }
            $this->libraryView->showHomeLocation();
        } else {
            $this->libraryView->showHomeLocation();
        }
    }

    function deleteAuthor($id_author){
        $this->authHelper->checkLoggedIn();
        $this->model->deleteAuthorFromDB($id_author);
        $this->libraryView->showHomeLocation();
    
    }

    function pagUpdateAuthor($id_author){
        $this->authHelper->checkLoggedIn();
        $author = $this->model->getAuthorFromDB($id_author);

        $this->view->showPagUpdateAuthor($author);
    }

    function updateAuthor($id_author){
        $this->authHelper->checkLoggedIn();
        if(!empty($_POST['namename']) && !empty($_POST['age']) && !empty($_POST['bio'])) {
            if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png"){
                $this->model->updateAuthorFromDB($id_author, $_POST['namename'], $_POST['age'], $_POST['bio'], $_FILES['input_name']['tmp_name']);
                $this->libraryView->showHomeLocation();
            } else {
                $this->model->updateAuthorFromDB($id_author, $_POST['namename'], $_POST['age'], $_POST['bio']);
                $this->libraryView->showHomeLocation();
            }
        } else {
            $this->libraryView->showHomeLocation();
        }
    }

}