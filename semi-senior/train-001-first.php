<?php

function expanded_form(int $n): string {
    $n = str_split( $n );
    $count = count( $n );
    $response = '';
    foreach ($n as $key => $num) {
        if( $num != 0){
            $response .= $num.str_repeat('0',$count - ($key+1)).'+';
        }
    }
    return substr($response,0,-1);     
}

echo expanded_form(12301).'\n';