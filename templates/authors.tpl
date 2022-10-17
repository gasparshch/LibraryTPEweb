<h2 class="text-center type-letter">Nuestra sección de autores</h2>
<div class="container text-center">
    <div class="row">

    {foreach from=$authors item=$author}
        <div class="col">
            {include file='templates/author.tpl'}
        </div>
    {/foreach}
    </div>
</div>