<?php
//* PART 1
echo "<h1>Part 1</h1>";
$digits = array(3, 12, 30);
function exponential($arr)
{
    foreach ($arr as $digit) {
        // $result[] = pow($digit,3);
        $initial = $digit;
        for ($i = 1; $i < 3; $i++) {
            $digit *= $initial;
        }
        $result[] = $digit;
    }
    return $result;
}
$result = exponential($digits);
var_dump($result);
/* expected output:
        array (size=3)
        0 => int 27
        1 => int 1728
        2 => int 27000
*/

//* PART 2
echo "<h1>Part 2</h1>";
$digits2 = array(8, 11, 4);
function exponential2($arr, $exp)
{
    foreach ($arr as $digit) {
        // $result[] = pow($digit,$exp);
        $initial = $digit;
        for ($i = 1; $i < $exp; $i++) {
            $digit *= $initial;
        }
        $result[] = $digit;
    }
    return $result;
}
/* This should dump which contains [4096, 14641,  256]. */
$result = exponential2($digits2, 4);
var_dump($result);
