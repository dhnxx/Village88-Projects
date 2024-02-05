<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/main.css?v30") ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <script>
        $(document).ready(function() {
            var options = {
                title: {
                    text: "Client Billing"
                },
                data: [{
                    type: "column",
                    dataPoints: [
                        <?php foreach ($billings as $billing) { ?> {
                                label: "<?= $billing["Month"] ?>",
                                y: <?= $billing["amount"] ?>
                            },
                        <?php } ?>
                    ]
                }]
            };

            $("#chartContainer").CanvasJSChart(options);
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="head">
            <h1>List of total charges per month</h1>
            <?= form_open("main", array("method" => "post")) ?>
            <input type="date" name="from" id="from" value="<?= $date["from"] ?>">
            <input type="date" name="to" id="to" value="<?= $date["to"] ?>">
            <input type="submit" value="Change Date">
            <?= form_close() ?>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($billings as $billing) { ?>
                    <tr>
                        <td><?= $billing["Month"] ?></td>
                        <td><?= $billing["Year"] ?></td>
                        <td><?= $billing["amount"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div id="chartContainer"></div>
    </div>
</body>

</html>