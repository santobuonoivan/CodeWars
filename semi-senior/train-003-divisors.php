<?php

function primeFactors($n) {
    $result = [];
    $divisors = [];
    $count = 1;
    for($i = 2; $i < $n; $i ++) {
        if ($n % $i == 0) {
            $divisors[] = $i;
        }
    }
    $aux = [];
    foreach ($divisors as $div) {
        if( primo($div)){
            $aux[] = $div;
        }
    }
    $divisors = $aux;
    //echo json_encode($divisors)."\n";
    
    $k = 0;
    $j = $n;
    while ( $count < $n) {
        if ($j % $divisors[$k] === 0){
            $result[ $divisors[$k] ]++;
            $j = $j/$divisors[$k];
            $count *=$divisors[$k];
        }else{
            $k++;
        }
    }

    foreach ($result as $div => $exp) {
        $response[] = $exp===1 ? "($div)" : "($div**$exp)";
    }
    return implode( " ",$response);
}

function primo($num){
    $cont=0;
    // Funcion que recorre todos los numero desde el 2 hasta el valor recibido
    for($i=2;$i<=$num;$i++)
    {
        if($num%$i==0)
        {
            # Si se puede dividir por algun numero mas de una vez, no es primo
            if(++$cont>1)
                return false;
        }
    }
    return true;
}

echo json_encode(primeFactors(7775460));