<h2 class="text-center type-letter">Editar libro</h2>    
            
<ul>
    <li class="type-letter"><h3>Título: {$book->title}</h3></li>
    <li class="type-letter">Género: {$book->genre}</li>
    <li class="type-letter">Sinópsis: {$book->descrip}</li>
    <li class="type-letter">Escrito por: {$author->namename}</li>
</ul>


<form action="updateBook/{$id_book}" method="post">
    <div class="mb-3">
        <label class="form-label type-letter">Título del libro</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-3">
        <label class="form-label type-letter">Género</label>
        <input type="text" class="form-control" name="genre">
    </div>
    <div class="mb-3">
        <label class="form-label type-letter">Sinópsis</label>
        <input type="text" class="form-control" name="descrip">
    </div>
    <select class="form-select" name="id_author" aria-label="Default select example">
        <option selected>Indique su autor</option>
        {foreach from=$authors item=$author}
            <option value="{$author->id_author}">{$author->namename}</option>
        {/foreach}
    </select>
    <input type="submit" value="Editar" class="btn btn-outline-secondary type-letter">
</form>