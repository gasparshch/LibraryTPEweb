<h2 class="text-center">Editar libro</h2>    
            
<ul>
    <li><h3>Título: {$book->title}</h3></li>
    <li>Género: {$book->genre}</li>
    <li>Sinópsis: {$book->descrip}</li>
    <li>Escrito por: {$author->namename}</li>
</ul>


<form action="updateBook/{$id_book}" method="post">
    <div class="mb-3">
        <label class="form-label">Título del libro</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-3">
        <label class="form-label">Género</label>
        <input type="text" class="form-control" name="genre">
    </div>
    <div class="mb-3">
        <label class="form-label">Sinópsis</label>
        <input type="text" class="form-control" name="descrip">
    </div>
    <select class="form-select" name="id_author" aria-label="Default select example">
        <option selected>Indique su autor</option>
        {foreach from=$authors item=$author}
            <option value="{$author->id_author}">{$author->namename}</option>
        {/foreach}
    </select>
    <input type="submit" value="Editar" class="btn btn-primary">
</form>