<?php

require_once 'Controller/BooksController.php';
require_once 'Controller/AuthorsController.php';
require_once 'Controller/LibraryController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto
}

$params = explode('/', $action);

$libraryController = new LibraryController();
$booksController = new BooksController();
$authorsController = new AuthorsController();

// determina que camino seguir según la acción
switch ($params[0]){
    case 'home':
        $libraryController->viewHome();
        break;
    case 'books':
        $booksController->viewBooks();
        break;
    case 'aboutBook':
        $booksController->viewAboutBook($params[1]);
        break;
    case 'pagCreateBook':
        $booksController->pagCreateBook();
        break;
    case 'createBook':
        $booksController->createBook();
        break;
    case 'deleteBook':
        $booksController->deleteBook($params[1]);
        break;
    case 'pagUpdateBook':
        $booksController->pagUpdateBook($params[1]);
        break;
    case 'updateBook':
        $booksController->updateBook($params[1]);
        break;
    case 'authors':
        $authorsController->viewAuthors();
        break;
    case 'aboutAuthor':
        $authorsController->viewAboutAuthor($params[1]);
        break;
    case 'booksAuthor':
        $authorsController->viewBooksAuthor($params[1]);
        break;
    case 'pagCreateAuthor':
        $authorsController->pagCreateAuthor();
        break;
    case 'createAuthor':
        $authorsController->createAuthor();
        break;
    case 'deleteAuthor':
        $authorsController->deleteAuthor($params[1]);
        break;
    case 'pagUpdateAuthor':
        $authorsController->pagUpdateAuthor($params[1]);
        break;
    case 'updateAuthor':
        $authorsController->updateAuthor($params[1]);
        break;
    default:
        echo '404 not found';
        break;
}