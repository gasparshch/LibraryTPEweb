<div class="container text-center">
    <h3 class="type-letter"> Agregar un autor a la biblioteca</h3>
    <form action="createAuthor" method="post">
        <div class="row align-items-center">
            <div class="col">
                <label class="form-label type-letter">Nombre del autor</label>
                <input type="text" class="form-control" name="namename">
            </div>
            <div class="col">
                <label class="form-label type-letter">Edad</label>
                <input type="text" class="form-control" name="age">
            </div>
            <div class="col">
                <label class="form-label type-letter">Biografía</label>
                <input type="text" class="form-control" name="bio">
            </div>
            <div class="col">
                <label class="form-label"></label>
                <input type="submit" value="Agregar" class="btn btn-outline-secondary form-control type-letter">
            </div>
        </div>
    </form>
</div>