<?php

function high($x) {
    $x = explode(' ',$x);
    $alfabeth = array_flip( str_split( "abcdefghijklmnopqrstuvwxyz") );
    $response = '';
    $maxScore = 0;
    foreach ($x as $word) {
        $score = 0;
        for ($i=0; $i < strlen( $word); $i++) { 
            $score += $alfabeth[ $word[ $i ] ] +1;
        }
        if( $maxScore < $score){
            $maxScore = $score;
            $response = $word;
        }
    }
    return $response;
}


