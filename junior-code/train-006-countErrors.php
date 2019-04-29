<?php
/*
En una fábrica una impresora imprime etiquetas para cajas. Para un tipo de cajas, la impresora tiene que usar colores que, por simplicidad, se nombran con letras de la a la m.

Los colores utilizados por la impresora se registran en una cadena de control. Por ejemplo, una cadena de control "buena" sería aaabbbbhaijjjm, lo que significa que la impresora usó tres veces el color a, cuatro veces el color b, una vez el color h y luego una vez el color a ...

A veces hay problemas: falta de colores, mal funcionamiento técnico y se produce una cadena de control "mala", por ejemplo. aaaxbbbbyyhwawiwjjjwwm con letras que no sean de una a m.

Debe escribir una función printer_error que, dada una cadena, producirá la tasa de error de la impresora como una cadena que representa un racional cuyo numerador es el número de errores y el denominador la longitud de la cadena de control. No reduzcas esta fracción a una expresión más simple.

La cadena tiene una longitud mayor o igual a uno y solo contiene letras de a a z.
*/

//abcdefghijklm

function printerError($s) {
    return preg_match_all('/[nñopqrstuvxyz]/i',$s,$matches)."/".strlen($s);
}

// BEST return strlen(preg_replace('/[a-m]/i', '', $s)) . '/' . strlen($s);

echo printerError('abcxxx');