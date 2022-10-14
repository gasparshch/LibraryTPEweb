<h2>Libros escritos por: {$author->namename}</h2>
<ul>

{foreach from=$books item=$book}
    <li>{$book->title}  </li>
{/foreach}
</ul>