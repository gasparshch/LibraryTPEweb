<div class="card container" style="width: 18rem;">
    <div class="card-body">
    <h5 class="card-title">{$author->namename}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{$author->age} AÑOS</h6>
    <p class="card-text">
    {if {$smarty.server.REQUEST_URI} != "/LibraryTPEweb/home" && {$smarty.server.REQUEST_URI} != "/LibraryTPEweb/authors"}
        {$author->bio}
    {else}
        {$author->bio|truncate:40}
    {/if}
        </p>
    {if {$smarty.server.REQUEST_URI} != "/LibraryTPEweb/aboutAuthor/{$author->id_author}"}
        <!-- si estoy en el about del autor, no ofrezco la opción de leer más -->
        <a href="aboutAuthor/{$author->id_author}" class="card-link">Leer mas</a>
    {/if}
    <a href="booksAuthor/{$author->id_author}" class="card-link">Libros del Autor</a>
    <a href="pagUpdateAuthor/{$author->id_author}" class="card-link">Editar</a>
    <a href="deleteAuthor/{$author->id_author}" class="card-link">Eliminar</a>
    </div>
</div>