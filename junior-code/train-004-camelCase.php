<?php

/**
 * Complete the method/function so that it converts dash/underscore delimited words into camel casing. The first word within the output should be capitalized only if the original word was capitalized.
 * 
 * Examples
 * toCamelCase("the-stealth-warrior"); // returns "theStealthWarrior"
 * 
 * toCamelCase("The_Stealth_Warrior"); // returns "TheStealthWarrior"
 */

function toCamelCase($str) 
{
    $capitalizeFirstCharacter = false;
    $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));

    if (!$capitalizeFirstCharacter) {
        $str[0] = strtolower($str[0]);
    }

    return $str;
}
