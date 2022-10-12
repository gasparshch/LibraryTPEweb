<?php

require_once 'Controller/BibliotecaController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto
}

$params = explode('/', $action);

$bibliotecaController = new BibliotecaController();

// determina que camino seguir según la acción
switch ($params[0]){
    case 'home':
        $bibliotecaController->viewHome();
        break;
    case 'autores':
        $bibliotecaController->viewAutores();
        break;
    case 'libros':
        $bibliotecaController->viewLibros();
        break;
    case 'aboutLibro':
        $bibliotecaController->viewAboutLibro($params[1]);
        break;
    case 'aboutAutor':
        $bibliotecaController->viewAboutAutor($params[1]);
        break;
    case 'librosAutor':
        $bibliotecaController->viewLibrosAutor($params[1]);
        break;
    case 'crearLibro':
        $bibliotecaController->createLibro();
        break;
    case 'pagUpdateLibro':
        $bibliotecaController->pagUpdateLibro($params[1]);
        break;
    case 'updateLibro':
        $bibliotecaController->updateLibro($params[1]);
        break;
    case 'deleteLibro':
        $bibliotecaController->deleteLibro($params[1]);
        break;
    default:
        echo '404 not found';
        break;
}