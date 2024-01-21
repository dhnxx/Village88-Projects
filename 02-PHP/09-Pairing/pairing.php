<?php


function card_list($cards)
{
    echo "<ul>";
    foreach ($cards as $card) {

        echo "<li> The Value of {$card["name"]} in Pyramid Solitaire is {$card["value"]}";
    }
    echo "</ul>";
}

$cards = array(
    array(
        "name" => "King",
        "value" => 13
    ),
    array(
        "name" => "Queen",
        "value" => 12
    ),
    array(
        "name" => "Jack",
        "value" => 11
    ),
    array(
        "name" => "Ace",
        "value" => 1
    )
);

card_list($cards);
