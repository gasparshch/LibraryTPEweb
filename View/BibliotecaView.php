<?php
require_once './Model/BibliotecaModel.php';

class BibliotecaView{

    function __construct(){

    }

    function showHome($autores, $libros){
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <base href="'.BASE_URL.'"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <title>Document</title>
        </head>
        <body>
            
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                <a class="navbar-brand" href="home">EL ATENEO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="autores">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="libros">Libros</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mas Acciones
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">ABM Libro</a></li>
                        <li><a class="dropdown-item" href="#">ABM Autor</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
    
            <h1 class="text-center">BIENVENIDO A LA LIBRERIA EL ATENEO ONLINE</h1>
            <h3 class="text-center">Nuestra sección de Autores</h3>
            <div class="container text-center">
                <div class="row">';
    
                foreach($autores as $autor){
                    $html.= '
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                            <h5 class="card-title">'.$autor->nombre.'</h5>
                            <h6 class="card-subtitle mb-2 text-muted">'.$autor->edad.' AÑOS</h6>
                            <p class="card-text">'.$autor->biografia.'</p>
                            <a href="aboutAutor/'.$autor->id_autor.'" class="card-link">Leer mas</a>
                            <a href="librosAutor/'.$autor->id_autor.'" class="card-link">Libros del Autor</a>
                            </div>
                        </div>
                    </div>';
                }
            $html.= '
                </div>
            </div>
            <h3 class="text-center">Nuestra sección de Libros</h3>
            <div class="container text-center">
                <div class="row">';
    
                foreach($libros as $libro){
                    $html.= '
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                <h5 class="card-title">'.$libro->titulo.'</h5>
                                <h6 class="card-subtitle mb-2 text-muted">'.$libro->genero.'</h6>
                                <-- <h6 class="card-subtitle mb-2 text-muted">Escrito por: '.$autor->nombre.'</h6> -->
                                <p class="card-text">'.$libro->descripcion.'</p>
                                <a href="aboutLibro/'.$libro->id_libro.'" class="card-link">Ver mas</a>
                                <a href="pagUpdateLibro/'.$libro->id_libro.'" class="card-link">Editar</a>
                                <a href="deleteLibro/'.$libro->id_libro.'" class="card-link">Eliminar</a>
                                </div>
                            </div>
                        </div>';
                }
            $html.='
            </div>
    
            <h3> Agregar un libro a la biblioteca</h3>
    
            <form action="crearLibro" method="post">
                <div class="mb-3">
                    <label class="form-label">Título del libro</label>
                    <input type="text" class="form-control" name="titulo">
                </div>
                <div class="mb-3">
                    <label class="form-label">Género</label>
                    <input type="text" class="form-control" name="genero">
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion">
                </div>
                <select class="form-select" name="id_autor" aria-label="Default select example">
                    <option selected>Indique su autor</option>';
                    foreach($autores as $autor){
                        $html.='
                        <option value="'.$autor->id_autor.'">'.$autor->nombre.'</option>';
                    }
                $html.='
                </select>
                <input type="submit" value="Agregar" class="btn btn-primary">
            </form>
    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        </body>
        </html>';
    
        echo $html;
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function showAutores($autores){
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <base href="'.BASE_URL.'"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <title>Document</title>
        </head>
        <body>
            
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                <a class="navbar-brand" href="home">EL ATENEO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="autores">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="libros">Libros</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mas Acciones
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="abmLibro">ABM Libro</a></li>
                        <li><a class="dropdown-item" href="abmAutor">ABM Autor</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>

            <h1 class="text-center">AUTORES DISPONIBLES</h1>
            <div class="container text-center">
                <div class="row">';

                foreach($autores as $autor){
                    $html.= '
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                            <h5 class="card-title">'.$autor->nombre.'</h5>
                            <h6 class="card-subtitle mb-2 text-muted">'.$autor->edad.' AÑOS</h6>
                            <p class="card-text">'.$autor->biografia.'</p>
                            <a href="aboutAutor/'.$autor->id_autor.'" class="card-link">Leer mas</a>
                            <a href="librosAutor/'.$autor->id_autor.'" class="card-link">Libros del Autor</a>
                            </div>
                        </div>
                    </div>';
                }
            $html.= '
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        </body>
        </html>';

        echo $html;
    }

    function showLibros($libros){
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <base href="'.BASE_URL.'"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <title>Document</title>
        </head>
        <body>
            
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                <a class="navbar-brand" href="home">EL ATENEO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="autores">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="libros">Libros</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mas Acciones
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">ABM Libro</a></li>
                        <li><a class="dropdown-item" href="#">ABM Autor</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>

            <h1 class="text-center">LIBROS DISPONIBLES</h1>
            <div class="container text-center">
                <div class="row">';

                foreach($libros as $libro){
                    $html.= '
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                <h5 class="card-title">'.$libro->titulo.'</h5>
                                <h6 class="card-subtitle mb-2 text-muted">'.$libro->genero.'</h6>
                                <p class="card-text">'.$libro->descripcion.'</p>
                                <a href="aboutLibro/'.$libro->id_libro.'" class="card-link">Ver mas</a>
                                <a href="pagUpdateLibro/'.$libro->id_libro.'" class="card-link">Editar</a>
                                <a href="deleteLibro/'.$libro->id_libro.'" class="card-link">Eliminar</a>
                                </div>
                            </div>
                        </div>';
                }
            $html.='
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        </body>
        </html>';

        echo $html;
    }

    function showAboutLibro($libro, $autor){
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <base href="'.BASE_URL.'"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <title>Document</title>
        </head>
        <body>
            
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                <a class="navbar-brand" href="home">EL ATENEO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="autores">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="libros">Libros</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mas Acciones
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="abmLibro">ABM Libro</a></li>
                        <li><a class="dropdown-item" href="abmAutor">ABM Autor</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>

            <h2>Título: '.$libro->titulo.'</h2>    
            
            <ul>
                <li>Género: '.$libro->genero.'</li>
                <li>Sinópsis: '.$libro->descripcion.'</li>
                <li>Escrito por: '.$autor->nombre.'</li>
            </ul>

            ';

        echo $html;
    }

    function showAboutAutor($autor){
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <base href="'.BASE_URL.'"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <title>Document</title>
        </head>
        <body>
            
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                <a class="navbar-brand" href="home">EL ATENEO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="autores">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="libros">Libros</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mas Acciones
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="abmLibro">ABM Libro</a></li>
                        <li><a class="dropdown-item" href="abmAutor">ABM Autor</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>

            <h2>Nombre: '.$autor->nombre.'</h2>
            <ul>    
                <li>Edad: '.$autor->edad.' años</li>
                <li>Biografía: '.$autor->biografia.'</li>
            </ul>
            ';

        echo $html;
    }

    function showLibrosAutor($autor, $libros){
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <base href="'.BASE_URL.'"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <title>Document</title>
        </head>
        <body>
            
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                <a class="navbar-brand" href="home">EL ATENEO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="autores">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="libros">Libros</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mas Acciones
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="abmLibro">ABM Libro</a></li>
                        <li><a class="dropdown-item" href="abmAutor">ABM Autor</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>

            <h1>Libros escritos por: '.$autor->nombre.'</h1>
            <ul>
            ';

            foreach ($libros as $libro){
                $html.= '<li>'.$libro->titulo.'  </li>';
        
            }
            $html.= '</ul>';


        echo $html;
    }

    function showPagUpdateLibro($id, $libro, $autor, $autores){
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <base href="'.BASE_URL.'"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <title>Document</title>
        </head>
        <body>
            
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                <a class="navbar-brand" href="home">EL ATENEO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="autores">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="libros">Libros</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mas Acciones
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">ABM Libro</a></li>
                        <li><a class="dropdown-item" href="#">ABM Autor</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
            
            <h2 class="text-center">Editar libro</h2>    
            
            <ul>
                <li><h3>Título: '.$libro->titulo.'</h3></li>
                <li>Género: '.$libro->genero.'</li>
                <li>Sinópsis: '.$libro->descripcion.'</li>
                <li>Escrito por: '.$autor->nombre.'</li>
            </ul>


            <form action="updateLibro/'.$id.'" method="post">
                <div class="mb-3">
                    <label class="form-label">Título del libro</label>
                    <input type="text" class="form-control" name="titulo">
                </div>
                <div class="mb-3">
                    <label class="form-label">Género</label>
                    <input type="text" class="form-control" name="genero">
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion">
                </div>
                <select class="form-select" name="id_autor" aria-label="Default select example">
                    <option selected>Indique su autor</option>';
                    foreach($autores as $autor){
                        $html.='
                        <option value="'.$autor->id_autor.'">'.$autor->nombre.'</option>';
                    }
                $html.='
                </select>
                <input type="submit" value="Editar" class="btn btn-primary">
            </form>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        </body>
        </html>';

        echo $html;
    }


}