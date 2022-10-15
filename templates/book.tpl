<div class="card container" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{$book->title}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{$book->genre}</h6>

        <!-- solucionar como mostrar el autor de cada libro -->
        <h6 class="card-subtitle mb-2 text-muted">Escrito por: {$book->id_author}</h6>
        <!-- solucionar como mostrar el autor de cada libro -->
        
        <p class="card-text">
        {if {$smarty.server.REQUEST_URI} != "/LibraryTPEweb/home" && {$smarty.server.REQUEST_URI} != "/LibraryTPEweb/books"}
            {$book->descrip}
        {else}
            {$book->descrip|truncate:40}
        {/if}
            </p>
        {if {$smarty.server.REQUEST_URI} != "/LibraryTPEweb/aboutBook/{$book->id_book}"}
            <!-- si estoy en el about del libro, no ofrezco la opción de ver más -->
            <a href="aboutBook/{$book->id_book}" class="card-link">Ver más</a>
        {/if}
        <a href="pagUpdateBook/{$book->id_book}" class="card-link">Editar</a>
        <a href="deleteBook/{$book->id_book}" class="card-link">Eliminar</a>
    </div>
</div>