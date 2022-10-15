<?php
require_once './Model/BooksModel.php';
require_once './Model/AuthorsModel.php';
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class BooksView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showBooks($books){
        // asignación
        $this->smarty->assign('books', $books);
        // renderizado
        $this->smarty->display('templates/header.tpl');
        $this->smarty->display('templates/books.tpl');
        $this->smarty->display('templates/footer.tpl');
    }

    function showAboutBook($book){
        $this->smarty->assign('bookTitle', $book->title);
        $this->smarty->assign('book', $book);
        
        // renderizado
        $this->smarty->display('templates/header.tpl');
        $this->smarty->display('templates/book.tpl');
        $this->smarty->display('templates/footer.tpl');
    }

    function showPagUpdateBook($id_book, $book, $author, $authors){
        $this->smarty->assign('id_book', $id_book);
        $this->smarty->assign('book', $book);
        $this->smarty->assign('author', $author);
        $this->smarty->assign('authors', $authors);
        
        // renderizado
        $this->smarty->display('templates/header.tpl');
        $this->smarty->display('templates/pagUpdateBook.tpl');
        $this->smarty->display('templates/footer.tpl');

    }

    function showPagCreateBook($authors){
        $this->smarty->assign('authors', $authors);
        // renderizado
        $this->smarty->display('templates/header.tpl');
        $this->smarty->display('templates/createBook.tpl');
        $this->smarty->display('templates/footer.tpl');
    }


}