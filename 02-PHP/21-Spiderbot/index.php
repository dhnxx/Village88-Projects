<?php
// http://www.php.net/manual/en/function.curl-setopt.php

// Initialize cURL
$url = "http://www.bing.com/search?q=software+engineer";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
    die();
}

curl_close($ch);

require("simple_html_dom.php");

$html = str_get_html($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Engineer Search</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v3">
</head>

<body>
    <section>
        <h1>Software Engineer 🧑‍💻</h1>
        <h2>Top 5 results: </h2>
        <div class="results">
            <?php
            $searchCount = 0;
            foreach ($html->find('h2 a') as $element) {
                if ($searchCount >= 5) {
                    break;
                }
            ?>
                <h3><?= $element->plaintext ?></h3>
                <a href="<?= $element->href ?>" target="_blank"><?= $element->href ?></a>
            <?php
                $searchCount++;
            }
            ?>
        </div>
    </section>
</body>

</html>