<h3> Agregar un libro a la biblioteca</h3>

<form action="createBook" method="post">
    <div class="mb-3">
        <label class="form-label">Título del libro</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-3">
        <label class="form-label">Género</label>
        <input type="text" class="form-control" name="genre">
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <input type="text" class="form-control" name="descrip">
    </div>
    <select class="form-select" name="id_author" aria-label="Default select example">
        <option selected>Indique su autor</option>
        {foreach from=$authors item=$author}
            <option value="{$author->id_author}">{$author->namename}</option>
        {/foreach}
    </select>
    <input type="submit" value="Agregar" class="btn btn-primary">
</form>