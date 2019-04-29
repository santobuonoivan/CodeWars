<?php

/**
 * You probably know the "like" system from Facebook and other pages. People can "like" blog posts, pictures or other items. We want to create the text that should be displayed next to such an item.
 *
 *
 * Implement a function likes :: [String] -> String, which must take in input array, containing the names of people who like an item. It must return the display text as shown in the examples:
 * 
 * likes [] // must be "no one likes this"
 * likes ["Peter"] // must be "Peter likes this"
 * likes ["Jacob", "Alex"] // must be "Jacob and Alex like this"
 * likes ["Max", "John", "Mark"] // must be "Max, John and Mark like this"
 * likes ["Alex", "Jacob", "Mark", "Max"] // must be "Alex, Jacob and 2 others like this"
 */


function likes( $names ) {
    $response = '';
    switch ( count($names) ) {
        case 0:
            $response = "no one likes this";
            break;
        case 1:
        case 2:
        case 3:
            for($i=0;$i< (count($names)-1) ; $i++){
                $response .= $names[$i].",";
            }
            $response = count($names)>1 ? substr($response, 0, -1).'and '.$names[count($names)-1].' like this' : $names[count($names)-1].' likes this';
            break;
        default:
            $response .= $names[0].', '.$names[1].' and '. (count($names)-2).' others like this';
            break;
    }    
    return $response;
}