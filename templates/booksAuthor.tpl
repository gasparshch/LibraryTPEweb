<h2 class="text-center">Libros escritos por: {$author->namename}</h2>
    
{foreach from=$books item=$book}
    {include file='templates/book.tpl'}
{/foreach}