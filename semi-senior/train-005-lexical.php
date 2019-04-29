<?php



function inArray($array1, $array2) {
    $response =[];
    foreach ($array1 as $a1) {    
        foreach ($array2 as $a2) {
            if ( preg_match( "/.*($a1).*/",$a2 )==1){
                $response[] = $a1;
            }    
        }
    }
    sort($response);
    return array_values(array_unique($response));
}


/*
function inArray($a1, $a2) {
    $r = array_filter($a1, function($v) use ($a2) {
        foreach ($a2 as $v2) {
            if (strpos($v2, $v) !== false) return true;
        }
        return false;
    });
    sort($r);
    return $r;
}*/