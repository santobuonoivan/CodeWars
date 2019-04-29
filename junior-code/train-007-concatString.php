<?php

function longest($a, $b) {
    $line = array_unique( str_split( $a.$b ) );
    sort( $line );
    return implode('',$line);
}

/**
 * best
 * function longest($a, $b) {
 * return count_chars($a.$b, 3);
 * }
 */

$a = 'aabcc';
$b = 'aaccbbe';
echo longest($a,$b);