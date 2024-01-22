<?php
//* Temporarily disable deprecated warning
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $row = 1;
    //! Deprecated  https://www.drupal.org/project/csv_serialization/issues/3254327
    ini_set("auto_detect_line_endings", true);
    $handle = fopen('us-500.csv', 'r');
    ?>
    <table>
        <?php
        while (($data = fgetcsv($handle)) !== FALSE) {
            if ($row === 1) { ?>
                <tr>
                    <?php
                    //* Print data from the first row
                    foreach ($data as $column) { ?>
                        <th>
                            <?= $column ?>
                        </th>
                    <?php }
                    ?>
                </tr>
            <?php } else { ?>
                <!-- added -1 to separate the header to the contents -->
                <tr class=<?= (($row - 1) % 10 == 0) ? "alternate" : "" ?>>
                    <?php
                    //* Print remaining data
                    foreach ($data as $column) { ?>
                        <td>
                            <?= $column ?>
                        </td>
                    <?php }
                    ?>
                </tr>
            <?php } ?>
        <?php $row++;
        } ?>
    </table>

</body>

</html>