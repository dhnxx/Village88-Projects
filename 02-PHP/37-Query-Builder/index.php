<?php
include "database.php";
include "query-builder.php";
include "sites.php";
include "Clients.php";

$sites =  new Sites();

$sites->connect();
$sites->select(array("client_id", $sites->count));
$sites->group_by('client_id');
$sites->having($sites->count, ">", 5);
$sites->get();
$output = $sites->fetch_all($sites->complete_query);

$clients = new Clients();
$clients->connect();
$clients->select(array("*"))->where(array("last_name" => "Owen"))->get();
$output2 = $clients->fetch_all($clients->complete_query);

var_dump($output);
var_dump($output2);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Builder</title>
    <style>
        table tr th,
        td {
            border: 1px solid black;
        }
    </style>

</head>



<body>
    <table>
        <tr>
            <?php foreach ($output[0] as $key => $value) { ?>
                <th><?= $key ?></th>
            <?php } ?>
        </tr>
        <?php foreach ($output as $row) { ?>
            <tr>
                <?php foreach ($row as $value) { ?>
                    <td><?= $value ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    <table>
        <tr>
            <?php foreach ($output2[0] as $key => $value) { ?>
                <th><?= $key ?></th>
            <?php } ?>
        </tr>
        <?php foreach ($output2 as $row) { ?>
            <tr>
                <?php foreach ($row as $value) { ?>
                    <td><?= $value ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>

</html>