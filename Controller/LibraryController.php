<?php
require_once './View/LibraryView.php';
require_once './Model/BooksModel.php';
require_once './Model/AuthorsModel.php';

// el controlador divide el trabajo a la bbdd y al frontend
class LibraryController{

    private $view;
    private $authorsModel;
    private $booksModel;

    function __construct(){
        $this->booksModel = new BooksModel();
        $this->authorsModel = new AuthorsModel();
        $this->view = new LibraryView();
    }

    function viewHome(){
        // el model se encarga de hablar con la ddbb
        $authors = $this->authorsModel->getAuthorsFromDB();
        $books = $this->booksModel->getBooksFromDB();

        // el view se encarga del front end
        $this->view->showHome($authors, $books);
    }

}