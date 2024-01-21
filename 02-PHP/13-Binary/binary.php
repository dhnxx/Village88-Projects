<?php

$binary = array(1, 1, 0, 1, 1, 0, 1);
function get_count($arr)
{
    $zeroes = 0;
    $ones = 0;

    foreach ($arr as $num) {
        if ($num == 0) {
            $zeroes++;
        } else {
            $ones++;
        }
    }
    return array(
        array("zeroes" => $zeroes), array("ones" => $ones)
    );
}

$output = get_count($binary);
var_dump($output); 
//$output should be equal to array("zeroes" => 2,  "ones" => 5);