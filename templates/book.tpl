<div class="card container" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title type-letter">{$book->title}</h5>
        <h6 class="card-subtitle mb-2 text-muted type-letter">{$book->genre}</h6>
        <h6 class="card-subtitle mb-2 text-muted type-letter">Escrito por: {$book->namename}</h6>
        <p class="card-text type-letter">
        {if {$smarty.server.REQUEST_URI} == "/LibraryTPEweb/aboutBook/{$book->id_book}"}
            {$book->descrip}
        {else}
            {$book->descrip|truncate:40}
        {/if}
            </p>
        <div class="border-top pt-2">
            {if {$smarty.server.REQUEST_URI} != "/LibraryTPEweb/aboutBook/{$book->id_book}"}
                <!-- si estoy en el about del libro, no ofrezco la opción de ver más -->
                <a href="aboutBook/{$book->id_book}" class="card-link type-letter">Ver más</a>
            {/if}
            {if $smarty.session.rol == 2}
                <a href="pagUpdateBook/{$book->id_book}" class="card-link type-letter">Editar</a>
                <a href="deleteBook/{$book->id_book}" class="card-link type-letter">Eliminar</a>
            {/if}
        </div>
    </div>
</div>