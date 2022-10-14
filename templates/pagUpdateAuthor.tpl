<h2 class="text-center">Editar autor</h2>    
            
<ul>
    <li><h3>Nombre: {$author->namename}</h3></li>
    <li>Edad: {$author->age} AÑOS</li>
    <li>Biografía: {$author->bio}</li>
</ul>


<form action="updateAuthor/{$id_author}" method="post">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="namename">
    </div>
    <div class="mb-3">
        <label class="form-label">Edad</label>
        <input type="text" class="form-control" name="age">
    </div>
    <div class="mb-3">
        <label class="form-label">Biografía</label>
        <input type="text" class="form-control" name="bio">
    </div>
    
    <input type="submit" value="Editar" class="btn btn-primary">
</form>