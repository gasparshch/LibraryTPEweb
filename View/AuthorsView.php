<?php
require_once './Model/BooksModel.php';
require_once './Model/AuthorsModel.php';
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class AuthorsView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showAuthors($authors){
        // asignación
        $this->smarty->assign('authors', $authors);
        // renderizado
        $this->smarty->display('templates/header.tpl');
        $this->smarty->display('templates/authors.tpl');
        $this->smarty->display('templates/footer.tpl');
    }

    function showAboutAuthor($author){
        // asignación
        $this->smarty->assign('author', $author);
        // renderizado
        $this->smarty->display('templates/header.tpl');
        $this->smarty->display('templates/author.tpl');
        $this->smarty->display('templates/footer.tpl');
    }

    function showBooksAuthor($author, $books){
        // asignación
        $this->smarty->assign('author', $author);
        $this->smarty->assign('books', $books);
        // renderizado
        $this->smarty->display('templates/header.tpl');
        $this->smarty->display('templates/booksAuthor.tpl');
        $this->smarty->display('templates/footer.tpl');
    }

    function showPagCreateAuthor(){
        $this->smarty->display('templates/header.tpl');
        $this->smarty->display('templates/createAuthor.tpl');
        $this->smarty->display('templates/footer.tpl');
    }

    function showPagUpdateAuthor($author){
        $this->smarty->assign('author', $author);
        $this->smarty->assign('id_author', $author->id_author);

        $this->smarty->display('templates/header.tpl');
        $this->smarty->display('templates/pagUpdateAuthor.tpl');
        $this->smarty->display('templates/footer.tpl');
    }


}