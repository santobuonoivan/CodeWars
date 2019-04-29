<?php




function getCount($str) {
    $count = 0;
    for ($i=0; $i < strlen($str) ; $i++) { 
        $count += preg_match('/[aeiouáéíóúü]/i',$str[$i]);
    }
    return $count;
}

//best return preg_match_all('/[aeiou]/i',$str,$matches);

echo getCount('hola como estas');