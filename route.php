<?php

require_once 'Controller/BooksController.php';
require_once 'Controller/AuthorsController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto
}

$params = explode('/', $action);

$booksController = new BooksController();
$authorsController = new AuthorsController();

// determina que camino seguir según la acción
switch ($params[0]){
    case 'home':
        $booksController->viewHome();
        break;
    case 'autores':
        $authorsController->viewAutores();
        break;
    case 'libros':
        $booksController->viewLibros();
        break;
    case 'aboutLibro':
        $booksController->viewAboutLibro($params[1]);
        break;
    case 'aboutAutor':
        $authorsController->viewAboutAutor($params[1]);
        break;
    case 'librosAutor':
        $authorsController->viewLibrosAutor($params[1]);
        break;
    case 'crearLibro':
        $booksController->createLibro();
        break;
    case 'pagUpdateLibro':
        $booksController->pagUpdateLibro($params[1]);
        break;
    case 'updateLibro':
        $booksController->updateLibro($params[1]);
        break;
    case 'deleteLibro':
        $booksController->deleteLibro($params[1]);
        break;
    default:
        echo '404 not found';
        break;
}