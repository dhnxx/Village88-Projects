<?php

$url = "http://www.bing.com/search?q=ruby+on+rails";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);
curl_close($ch);

// Create a DOM parser object
$dom = new DOMDocument;
@$dom->loadHTML($data);

// Find all h2 elements
$headings = $dom->getElementsByTagName('h2');

// Loop through each h2 element and extract the title
foreach ($headings as $heading) {
    $a = $heading->getElementsByTagName('a');
    foreach ($a as $link) {
        echo $link->nodeValue . '<br>';
    }
}
