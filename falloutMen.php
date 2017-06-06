<?php
/*
 * function fallOutSpecial
 * authors: Aleksandr, Vladimir, Nizami, Denis 
 * version 1.02
 */

function fallOutSpecial($max, $limPoints) {  //this function fills the array with random values.
                                             //first argument - max value of all specials, 
                                             //second aggument - limit of each special
    $specials = [
        "Strength",
        "Perception",
        "Endurance",
        "Charisma",
        "Intelligence",
        "Agility",
        "Luck",
    ];
    if ($limPoints < $max / count($specials)) {
        exit('Are you crazy? You can not count, you must enter the correct values ');
    }
    $valuesSpecial = [1, 1, 1, 1, 1, 1, 1];              //create intermediate array that stores values
    foreach ($valuesSpecial as &$value) {                // sort out the values ​​of the array, assign random values
        $value += rand(0, $max / count($valuesSpecial));
    }
    while ($max > array_sum($valuesSpecial)) {          
        $i = rand(0, count($valuesSpecial) - 1);         //choose randomly element in array
        if ($valuesSpecial[$i] == $limPoints) {          //inspect, if element equal to given values back in begin of loop
            continue;
        } else {                                         //if element less than given value - adding 1
            $valuesSpecial[$i]++;
        }
    }
    $result = array_combine($specials, $valuesSpecial);  //merge arrays
    return $result;                                      // return array
}
print_r(fallOutSpecial(40, 10));