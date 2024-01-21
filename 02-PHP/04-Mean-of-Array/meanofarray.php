<?php

$arr_given = array(13, 143, 88, 65, 120);
$sum = 0;
$num_of_elements = count($arr_given);
for ($num = 0; $num <= $num_of_elements - 1; $num++) {
    $sum += $arr_given[$num];
}
$answer = $sum / $num_of_elements;
echo "$answer";
