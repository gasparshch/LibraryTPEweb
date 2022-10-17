{include file= 'templates/header.tpl'}

<div class="container text-center">
    <h2 class="type-letter">{$titulo}</h2>
    <form action="createUser" method="post">
        <div class="row align-items-center">
            <div class="col">
                <input placeholder="email" class="form-control" type="text" name="email" id="email" required>
            </div>
            <div class="col">
                <input placeholder="username" class="form-control" type="text" name="username" id="username" required>
            </div>
            <div class="col">
                <input placeholder="password" class="form-control" type="password" name="password" id="password" required>
            </div>
            <div class="col">
                <select class="form-select" name="id_rol" aria-label="Default select example" required>
                    <option selected>Indique tipo de usuario</option>
                    <option value="1">User</option>
                    <option value="2">Admin</option>
                </select>
            </div>
            <div class="col">
                <input type="submit" value="Register" class="btn btn-outline-secondary type-letter">
            </div>
        </div>
    </form>
</div>

{include file= 'templates/footer.tpl'}