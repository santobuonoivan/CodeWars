<?php

function count_smileys($arr): int {
    $line = implode('',$arr);
    $countSmiles = 0;

    
    $smiles = array_unique([ ':)',':D',';-D',':~)',';~D',':-D',';D',':-)', ';~)']);
    foreach ($smiles as $smile) {
        $countSmiles += substr_count($line,$smile);
    }
    return $countSmiles;
}

// BET
//  return preg_match_all("/[:;][-~]?[\)D]/", implode(",", $arr))





/*[A-z].*?[\(\)\[\]].*/