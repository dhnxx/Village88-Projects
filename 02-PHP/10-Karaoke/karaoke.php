<?php

for ($i = 0; $i < 50; $i++) {

    $score = rand(1, 100);
    if ($score < 50) {
        $message = "Never sing again, ever!";
    } else if ($score < 80) {
        $message = "Practice more!";
    } else if ($score < 95) {
        $message = "You're getting better!";
    } else if ($score <= 100) {
        $message = "What an excellent singer!";
    }
    echo "<h1> {$score} </h1>";
    echo "<h2> {$message} </h2>";
}
