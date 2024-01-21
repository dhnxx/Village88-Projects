<?php


function convert_to_blanks($list)
{

    foreach ($list as $element) {
        if (is_numeric($element)) {
            for ($i = 0; $i < $element; $i++) {
                echo (" _ ");
            }
        } else {
            echo ("{$element[0]}");
            for ($x = 0; $x < strlen($element) - 1; $x++) {
                echo (" _ ");
            }
        }
        echo ("<br><br>");
    }
}

$list = array(4, "Michael", 3, "Karen", 2, "Rogie");
convert_to_blanks($list);
