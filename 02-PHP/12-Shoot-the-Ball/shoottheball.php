<?php

echo "<h1> Practice Starts... </h1>";

$hit = 0;
$miss = 0;

for ($i = 1; $i <= 1000; $i++) {

    $generate_result = rand(0, 1);

    if ($generate_result == 0) {
        $message = "Success!";
        $hit += 1;
        $color = "green";
    } else {
        $message = "Epic Fail!";
        $miss += 1;
        $color = "red";
    }
    echo "<p>Attempt {$i}: Shooting the ball...<span style=color:{$color}> <strong>$message</strong></span> 
	Got {$hit}x success and {$miss}x epic fail(s) so far </p>";
}
