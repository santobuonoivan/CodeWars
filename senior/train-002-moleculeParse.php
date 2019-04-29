<?php

function parse_molecule(string $formula): array {
    //echo $formula."\n";
    # region initializeAll 
        $response = array_flip(  preg_split( '/(?=[A-Z])/', preg_replace('/[0-9\(\)\[\]]/','', $formula) ,0,PREG_SPLIT_NO_EMPTY) );
        
        
        foreach ($response as $key => $element) {
            $response[$key]=0;
        }
        $cutsOpen = [ '(','[', '{'];
        $cutsClose = [ ')',']', '}'];
        $contentAnt = 0;
    # end region initializeAll

    foreach ($cutsOpen as  $indice  => $separator) {
        $firstOpenParenthesis = strpos( $formula, $cutsOpen[ $indice ]);
        $firstCloseParenthesis= strpos( $formula, $cutsClose[ $indice ]);

        while( $firstOpenParenthesis !== false && $firstCloseParenthesis !== false ){
            
            $re = "/\\". $cutsOpen[ $indice ] .".*?\\". $cutsClose[ $indice ] ."[0-9]*/i";
            preg_match($re, $formula, $matches, PREG_OFFSET_CAPTURE, 0);
            $content= $matches[0][0];
            //echo json_encode( $content ) ."content  \n";
            $multExt= (int)preg_filter( "/\\". $cutsOpen[ $indice ] .".*?\\". $cutsClose[ $indice ]."/i",'',$content);
            
            $formula = preg_filter( $re,'',$formula);
            //echo json_encode( $formula ) ."formula sacada  \n"; //saca bien
            //echo json_encode( $cutsClose[ $indice ] ) ."cuts close  \n"; //saca bien

            //echo json_encode( $multExt ) ." mult ext  \n";
            $re = "/\\". $cutsClose[ $indice ] . $multExt ."/i";
            //echo json_encode( $re ) ." regex  \n";
            $sacarcosas = preg_replace( $re,'',$content);
            //echo json_encode( $sacarcosas ) ." sacado cut y multext  \n";
            //$vecCants = preg_replace('/([A-Z][a-z]*)/','-', $sacarcosas);
            $vecCants = array_unique( preg_split( '/(?=[A-Z])/', preg_replace('/[0-9\(\)\[\]]/','', $sacarcosas) ,0,PREG_SPLIT_NO_EMPTY));

            //$vecCants = substr( $sacarcosas,1);
            echo json_encode( substr( $sacarcosas,1) ) ." string que llega  \n";
            echo json_encode( $vecCants) ." vecCants  \n";
          
            
            # consigue la suma del contenido dentro de los cuts
                foreach ( $vecCants as $key => $value) {
                    $re = "/(".$value."[0-9]*)/";
                    echo $value." valor\n";
                    preg_match_all($re, substr( $sacarcosas,1),$machesAll);
                    $machesAll = array_unique( $machesAll[0]);
                    echo json_encode( array_unique( $machesAll) ) ." matcheall  \n";
                    $sum=0;
                    foreach ($machesAll as $match) {
                        $match = (int)str_replace($value,'',$match);
                        //echo $match." match \n";
                        $sum += $match>0 ? $match : 1;
                    }
                    echo $sum." suma \n";
                    $vecCants[$key]=$sum;
                }            
            # end
            
            $split = preg_split( '/(?=[A-Z])/', preg_replace('/[0-9\(\)\[\]]/','', $content) ,0,PREG_SPLIT_NO_EMPTY);
            
            /*
            if ( $contentAnt != 0){                
                foreach ($contentAnt as $key => $value) {
                    if( !in_array( $value, $split) ){                        
                        $response[ $value ] =  $vecCants[$key] *$multExt;
                    }               
                }                
            }*/
            
            $contentAnt = $split;
            echo json_encode( $vecCants )."array cantidades\n";
            echo json_encode( array_unique($split) )."array split\n";

            foreach (array_unique($split) as $key => $element) {
                
                $response[$element] = ($response[$element] +$vecCants[$key]) * $multExt;// modifiqué ese
            }
            echo json_encode( $response )."array respuesta\n";
            $firstOpenParenthesis = strpos( $formula, $cutsOpen[ $indice ]);
            $firstCloseParenthesis= strpos( $formula, $cutsClose[ $indice ]);
            
        }
        
    }
    
    //echo json_encode( $formula)."\n";
    //echo json_encode( $response)."\n";

    if ( $contentAnt != 0){
                
        foreach ($contentAnt as $value) {
            if( !in_array( $value, $split) ){
                
                $response[ $value ] = $response[ $value ]*$multExt;
            }                
        }                
    }
    $split = preg_split( '/(?=[A-Z])/', preg_replace('/[0-9\(\)\[\]]/','', $formula) ,0,PREG_SPLIT_NO_EMPTY);
    $multExt = 1;


    $vecCants = preg_replace('/([A-Z][a-z]*)/','-', $formula);

    $vecCants = explode('-',substr( $vecCants,1));
    foreach ($vecCants as $key => $value) {
        if( $value === ''){
            $vecCants[$key]=1;
        }
    }
    echo json_encode( $response)."response\n";
    foreach ($split as $key => $element) {
        $response[$element] +=  $vecCants[$key] * $multExt;
    } 

    return $response;
}
echo "[(CHCHC)2C2H]2FeCO2\n";
echo json_encode( parse_molecule( '[(CHCHC)2C2H]2FeCO2') )."\n";
echo json_encode( array( 'C' => 17,'H' =>10,'Fe' => 1,'O' => 2    ))."\n";


