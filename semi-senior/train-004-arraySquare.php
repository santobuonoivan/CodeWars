<?php

function comp($a1, $a2) {
    
    if( $a1 == null || $a2 == null){ 
        return false;
    }
    foreach ($a1 as $key => $value) {
        $a1[$key]=$value**2;
    }
    sort($a1);
    sort($a2);
    return $a1 == $a2;
    
}

$a1 = [121, 144, 19, 161, 19, 144, 19, 11];
$a2 = [11*11, 121*121, 144*144, 19*19, 161*161, 19*19, 144*144, 19*19];

if( comp( $a1,$a2)){
    echo "true\n";
}else{
    echo "false\n";
}