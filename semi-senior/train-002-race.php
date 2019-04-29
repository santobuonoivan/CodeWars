<?php

function race($v1, $v2, $g) {
    
/*
    A = dB
    TA = TB + 30 minutos.
    TA = dA/VA  y   TB = dB/VB
    Como la distancia es la  misma no la diferenciaremos con letras y reemplazando en la ecuación de tiempo queda:
    d/VA = d/VB + 0,5 hs.
    d/VA – d/VB = 0,5 hs
    d x ( 1/VA – 1/VB) = 0,5 hs.
    d x ( VB – VA) / (VA x VB) = 0,5 hs
    dA = 0,5 hs x (VA x VB) / (VB – VA)
    dA = 0,5 hs x (60 Km/h x 80 Km/h) / (80 Km/h – 60 Km/h)
    dA = 120 Km
    Ahora calculamos el tiempo de cruce.
    TA = 120 Km / 60 Km/h
    TA = 2 hs.
    Se cruzan a las 2 hs de salir el primer móvil, es decir, el A.

*/
    $tiempoB = 0;
    $tiempoA = $tiempoB + ($g / $v1);

    $cross = $tiempoA * ( $v1 * $v2 ) / ( $v2 - $v1);

    $timeCross = $cross /$v1;
    var_dump( $timeCross );
    var_dump( $timeCross * 60 );

    $response[] = floor( $timeCross );
    $response[] = floor( ( $timeCross -$response[0] ) * 60);
    $response[] = floor( ( ( ( $timeCross -$response[0] ) * 60) - $response[1] ) * 60);
    var_dump( $response );
}

race(720, 850, 70);

/* BEST
function race($v1, $v2, $g) {
    return $v2 >= $v1 ? explode(' ', date("H i s", mktime(0, 0, $g*3600/($v2-$v1)))) : null;
}
*/