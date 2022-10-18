<h3 class="type-letter text-center"> Agregar un autor a la biblioteca</h3>
<div class="container shadow p-3 mb-5 bg-body rounded text-center">
    <form action="createAuthor" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label type-letter">Nombre</label>
            <input type="text" class="form-control" name="namename">
        </div>
        <div class="mb-3">
            <label class="form-label type-letter">Edad</label>
            <input type="text" class="form-control" name="age">
        </div>
        <div class="mb-3">
            <label class="form-label type-letter">Biografía</label>
            <input type="text" class="form-control" name="bio">
        </div>
        <div class="mb-3">
            <label class="form-label type-letter">Imagen del autor (opcional)</label>
            <input type="file" class="form-control" name="input_name" id="imageToUpload">
        </div>
        
        <input type="submit" value="Editar" class="btn btn-outline-secondary type-letter">
    </form>
</div>