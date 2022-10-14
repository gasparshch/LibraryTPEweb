<h2 class="text-center">Nuestra sección de libros</h2>
<div class="container text-center">
    <div class="row">

    {foreach from=$books item=$book}
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">{$book->title}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{$book->genre}</h6>
                    <p class="card-text">{$book->descrip}</p>
                    <a href="aboutBook/{$book->id_book}" class="card-link">Ver mas</a>
                    <a href="pagUpdateBook/{$book->id_book}" class="card-link">Editar</a>
                    <a href="deleteBook/{$book->id_book}" class="card-link">Eliminar</a>
                    </div>
                </div>
            </div>
    {/foreach}
</div>