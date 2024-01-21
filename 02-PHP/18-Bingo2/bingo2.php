<?php


$bingo = array(
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

?>

<!DOCTYPE html>
<html lang="en">

<style>
    table {
        font-size: 3rem;
        text-align: center;
        margin: 0 auto;
    }

    table th,
    td {
        padding: 25px;
        border: 2px solid black;
        width: 75px;
    }

    th {
        background-color: brown;
        color: whitesmoke;
    }

    .alternate {
        background-color: #769656;
    }

    .alternate_light {
        background-color: #EEEED2;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo 2</title>
</head>

<body>
    <main>
        <table>
            <tr>
                <th>B</th>
                <th>I</th>
                <th>N</th>
                <th>G</th>
                <th>O</th>
            </tr>
            <?php foreach ($bingo as $keys => $rows) { ?>
                <tr>
                    <td class=<?= $keys % 2 == 0 ? 'alternate' : 'alternate_light' ?>> <?= $rows[0] ?> </td>
                    <td class=<?= $keys % 2 != 0 ? 'alternate' : 'alternate_light' ?>> <?= $rows[1] ?> </td>
                    <td class=<?= $keys % 2 == 0 ? 'alternate' : 'alternate_light' ?>> <?= $rows[2] ?> </td>
                    <td class=<?= $keys % 2 != 0 ? 'alternate' : 'alternate_light' ?>> <?= $rows[3] ?> </td>
                    <td class=<?= $keys % 2 == 0 ? 'alternate' : 'alternate_light' ?>> <?= $rows[4] ?> </td>
                </tr>
            <?php } ?>
        </table>
    </main>
</body>

</html>