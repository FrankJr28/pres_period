<?php

//$array1=array('a','b','c','d');

//$array2=array('a','b','e','f');

$array1 = array(array("a"),array("b"), array("c"));

$array2 = array(array("a"),array("c"), array("x"),array("b"));

var_dump($array1);

echo "<br>";
//print_r($ar1);

//echo implode(",",$ar1);

//$elements = array('a', 'b', 'c');

//echo "<ul><li>" . implode(",", $elements) . "</li></ul>";

foreach($array1 as $k1 => $arrays) {
    foreach($arrays as $k2 => $val) {

        if($array2[$k1][$k2] == $val) {
            echo $array1[$k1][$k2]. 'is equal to'. $array2[$k1][$k2];
            unset($array2[$k1][$k2]);
        }
    }
} // end of foreach

echo "<br>";

var_dump($array2);

?>