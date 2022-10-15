<h2 class="text-center">Nuestra sección de libros</h2>
<div class="container text-center">
    <div class="row">
    {foreach from=$books item=$book}
        <div class="col">
            {include file='templates/book.tpl'}
        </div>
    {/foreach}
    </div>
</div>