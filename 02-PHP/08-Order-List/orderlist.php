<?php


function food_list($foods)
{
    echo "<ol>";
    foreach ($foods as $food) {

        echo "<li> {$food}";
    }
    echo "</ol>";
}
$x = array('Spaghetti', 'Pizza', 'Iced tea');
food_list($x);
