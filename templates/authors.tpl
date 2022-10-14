<h2 class="text-center">Nuestra sección de autores</h2>
<div class="container text-center">
    <div class="row">

    {foreach from=$authors item=$author}
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">{$author->namename}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{$author->age} AÑOS</h6>
                <p class="card-text">{$author->bio}</p>
                <a href="aboutAuthor/{$author->id_author}" class="card-link">Leer mas</a>
                <a href="booksAuthor/{$author->id_author}" class="card-link">Libros del Autor</a>
                <a href="pagUpdateAuthor/{$author->id_author}" class="card-link">Editar</a>
                <a href="deleteAuthor/{$author->id_author}" class="card-link">Eliminar</a>
                </div>
            </div>
        </div>
    {/foreach}
    </div>
</div>