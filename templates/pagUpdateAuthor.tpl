<h2 class="text-center type-letter">Editar autor</h2>    
            
<ul>
    <li class="type-letter"><h3>Nombre: {$author->namename}</h3></li>
    <li class="type-letter">Edad: {$author->age} AÑOS</li>
    <li class="type-letter">Biografía: {$author->bio}</li>
</ul>


<form action="updateAuthor/{$id_author}" method="post">
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
    
    <input type="submit" value="Editar" class="btn btn-outline-secondary type-letter">
</form>