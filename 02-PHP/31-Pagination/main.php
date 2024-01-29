<?php require("process.php");
ini_set("auto_detect_line_endings", true);
$handle = fopen("uploads/$clicked_file", 'r');
$row = 1;
echo ($_GET['page'])
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="https://sencss.kilianvalkhof.com/minified/sen.full.min.css?v1">
    <link rel="stylesheet" href="style.css?v6">
</head>

<body>
    <header>
        <h1><?= htmlspecialchars($clicked_file) ?></h1>
        <div class="home"><a href="index.php">Home</a></div>
    </header>
    <section class="table-container">
        <table>
            <thead>
<?php
                fseek($handle, 0);
                while (($data = fgetcsv($handle)) !== FALSE) {
                    if ($row === 1) { ?>
                        <tr>
                            <th>ID</th>
<?php //* Print data from the first row
                            foreach ($data as $column) { ?>
                                <th><?= $column ?></th>
<?php } ?>
                        </tr>
            </thead>
            <tbody>
<?php } else { ?>
<?php //* Print remaining data if within the page range
                        if ($row > (($_GET['page'] * 50) - 50) && $row < (($_GET['page'] * 50) + 2)) { ?>
                    <tr>
                        <td><?= $row - 1 ?></td>
<?php foreach ($data as $column) { ?>
                            <td><?= $column ?></td>
<?php } ?>
                    </tr>
<?php }
                    } ?>
<?php $row++;
                } ?>
            </tbody>
        </table>
    </section>
    <footer>
        <div class="pages">
            <ul>
<?php for ($i = 1; $i < ($est_total_row) + 1; $i++) { ?>
                    <li> <a href="main.php?file=<?= urlencode($clicked_file) ?>&page=<?= urlencode($page = $i) ?>"><?= $i ?></a></li>
<?php } ?>
            </ul>
        </div>
    </footer>


</body>

</html>