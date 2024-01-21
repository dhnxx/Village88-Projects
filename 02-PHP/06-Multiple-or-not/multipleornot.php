<?php

$arr = array();

for ($num = 1; $num <= 1000; $num++) {

    if ($num % 3 == 0) {

        echo "$num " . "=> Multiple" . "<br>";
    } else {
        echo "$num " . "=> Not Multiple" . "<br>";
    }
}
