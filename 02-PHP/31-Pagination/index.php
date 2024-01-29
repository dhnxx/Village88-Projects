<?php
require("process.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="https://sencss.kilianvalkhof.com/minified/sen.full.min.css?v1">
    <link rel="stylesheet" href="style.css?v6">
</head>

<body>
    <main>
        <form action="process.php" method="post" enctype="multipart/form-data">
            <h2>Select CSV to upload:</h2>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload CSV" name="submit">
        </form>
    </main>

    <section class="uploaded-files">
        <h2>Uploaded Files</h2>
        <ul>
<?php $file_list = fetch_csv();
            if (!empty($file_list)) {
                foreach ($file_list as $file) { ?>
                    <li><a href="main.php?file=<?= urlencode($file) ?>&page=<?=$page=1?>"><?= $file ?></a></li>
<?php }
            } ?>
        </ul>
    </section>
</body>

</html>