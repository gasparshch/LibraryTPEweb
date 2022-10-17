<div class="container text-center">
    <h3 class="type-letter"> Agregar un libro a la biblioteca</h3>
    <form action="createBook" method="post">
        <div class="row align-items-center">
            <div class="col">
                <label class="form-label type-letter">Título del libro</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="col">
                <label class="form-label type-letter">Género</label>
                <input type="text" class="form-control" name="genre">
            </div>
            <div class="col">
                <label class="form-label type-letter">Descripción</label>
                <input type="text" class="form-control" name="descrip">
            </div>
            <div class="col">
                <label class="form-label">Autor</label>
                <select class="form-select" name="id_author" aria-label="Default select example" required>
                    <option selected>Indique su autor</option>
                    {foreach from=$authors item=$author}
                        <option value="{$author->id_author}">{$author->namename}</option>
                    {/foreach}
                </select>
            </div>
            <div class="col">
                <label class="form-label"></label>
                <input type="submit" value="Agregar" class="btn btn-outline-secondary form-control type-letter">
            </div>
        </div>
    </form>
</div>