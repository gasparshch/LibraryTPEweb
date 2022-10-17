{include file= 'templates/header.tpl'}

<div class="container">
    

    <h2 class="text-center type-letter">{$titulo}</h2>

    <form action="verify" method="post" class="text-center">

        <input placeholder="email" type="text" name="email" id="email" required>
        <input placeholder="password" type="password" name="password" id="password" required>

        <input type="submit" value="Login" class="btn btn-outline-secondary type-letter">
        <a href="register" class="btn btn-outline-secondary type-letter">Register</a>
    </form>

    <h4 class="alert-danger text-center type-letter">{$error}</h4>
</div>

{include file= 'templates/footer.tpl'}