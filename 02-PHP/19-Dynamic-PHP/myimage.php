<?php
//* Generate a random ticket number
function generateTicketNumber()
{
    return rand(100000, 999999);
}

$color = array("230, 126, 34", "231, 76, 60", "155, 89, 182");


$my_img = imagecreate(200, 300);
$background = imagecolorallocate($my_img, rand(45, 255), rand(45, 255), rand(45, 255));
$text_colour = imagecolorallocate($my_img, 255, 255, 255);


$ticket_number = generateTicketNumber();


imagestring($my_img, 10, 30, 100, "Ticket #$ticket_number", $text_colour);


$tickets[] = $my_img;


header("Content-type: image/png");

$randomIndex = array_rand($tickets);
imagepng($tickets[$randomIndex]);


foreach ($tickets as $img) {
    imagedestroy($img);
}
