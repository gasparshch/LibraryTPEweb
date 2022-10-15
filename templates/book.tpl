<div class="card container" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{$book->title}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{$book->genre}</h6>
        <h6 class="card-subtitle mb-2 text-muted">Escrito por: {$book->namename}</h6>
        <p class="card-text">
        {if {$smarty.server.REQUEST_URI} == "/LibraryTPEweb/aboutBook/{$book->id_book}"}
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