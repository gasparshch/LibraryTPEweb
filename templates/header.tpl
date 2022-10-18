<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <base href="{BASE_URL}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <title>El Ateneo</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="img/logoAteneo.png" alt="Logo" width="32" height="24" class="d-inline-block align-text-top">
                </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                </button>
                {if $smarty.session.rol != 0}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item type-letter">
                            <a class="nav-link" href="authors">Autores</a>
                        </li>
                        <li class="nav-item type-letter">
                            <a class="nav-link" href="books">Libros</a>
                        </li>
                        {if $smarty.session.rol == 2}
                        <li class="nav-item dropdown type-letter">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mas acciones
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="pagCreateBook">Agregar libro</a></li>
                                <li><a class="dropdown-item" href="pagCreateAuthor">Agregar autor</a></li>
                            </ul>
                        </li>
                        <li class="nav-item type-letter">
                            <a class="nav-link disabled">Bienvenido, {$smarty.session.name}</a>
                        </li>
                        {else}
                        <li class="nav-item type-letter">
                            <a class="nav-link disabled">Bienvenido, {$smarty.session.name}</a>
                        </li>
                        {/if}
                    </ul>
                    <li class="d-flex btn btn-outline-secondary type-letter">
                        <a class="nav-link" href="logout">Desloguearse</a>
                    </li>
                </div>
                {/if}
            </div>
        </nav>