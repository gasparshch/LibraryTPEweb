<div class="card container" style="width: 18rem;">
    <div class="card-body">
        {if isset($author->image)}
            <img src="{$author->image}" class="card-img-top"/>
        {/if}
        <h5 class="card-title type-letter">{$author->namename}</h5>
        <h6 class="card-subtitle mb-2 text-muted type-letter">{$author->age} AÑOS</h6>
        <p class="card-text type-letter">
        {if {$smarty.server.REQUEST_URI} == "/LibraryTPEweb/aboutAuthor/{$author->id_author}"}
            {$author->bio}
        {else}
            {$author->bio|truncate:40}
        {/if}
            </p>
        <div class="border-top pt-2">
            {if {$smarty.server.REQUEST_URI} != "/LibraryTPEweb/aboutAuthor/{$author->id_author}"}
                <!-- si estoy en el about del autor, no ofrezco la opción de leer más -->
                <a href="aboutAuthor/{$author->id_author}" class="card-link type-letter">Leer mas</a>
            {/if}
            <a href="booksAuthor/{$author->id_author}" class="card-link type-letter">Libros del Autor</a>
            {if $smarty.session.rol == 2}
                <a href="pagUpdateAuthor/{$author->id_author}" class="card-link type-letter">Editar</a>
                <a href="deleteAuthor/{$author->id_author}" class="card-link type-letter">Eliminar</a>
            {/if}
        </div>
    </div>
</div>