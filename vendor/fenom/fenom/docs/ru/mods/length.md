Модификатор length
===============

Модификатор возвращает количество элементов массива, итератора или символов в строке (работает с UTF8).

```smarty
{if $images|length > 5}
 to many images
{/if}
```