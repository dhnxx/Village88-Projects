<?php


$bingo = array(
    array(
        "B", "I", "N", "G", "O"
    ),
    array(
        "2", "4", "6", "8", "10"
    ),
    array(
        "3", "6", "9", "12", "15"
    ),
    array(
        "4", "8", "12", "16", "20"
    ),
    array(
        "5", "10", "15", "20", "25"
    ),
    array(
        "6", "12", "18", "24", "30"
    )
);
echo ("<table style='border:5px solid black; padding: 10px;'>");
foreach ($bingo as $key => $row) {
    echo ("<tr>");
    //*Header
    if ($key == 0) {
        foreach ($row as $x) {
            echo ("<th style='padding: 25px; border: 2px solid black'> <h1> {$x} </h1> </th>");
        }
        //*Description
    } else {
        foreach ($row as $x) {
            if ($key % 2 == 0) {
                $color = "color: blue";
            } else {
                $color = "color: red";
            }
            echo ("<td style='padding: 25px; border: 2px solid black; font-size:1.5rem;'> 
			<p style='{$color}'>{$x}</p> </td>");
        }
    }

    echo ("</tr>");
}
echo ("</table>");
