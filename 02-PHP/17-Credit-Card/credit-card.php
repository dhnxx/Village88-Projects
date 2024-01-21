<?php
$users = array(
    array('cardholder_name' => "Michael Choi", 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
    array('cardholder_name' => "John Supsupin", 'cvc' => 789, 'acc_num' => "0001 1200 1500 1510"),
    array('cardholder_name' => "KB Tonel", 'cvc' => 567, 'acc_num' => "4568 456 123 5214"),
    array('cardholder_name' => "Mark Guillen", 'cvc' => 345, 'acc_num' => "123 123 123 123"),
    array('cardholder_name' => "Alice Johnson", 'cvc' => 111, 'acc_num' => "1111 2222 3333 4444"),
    array('cardholder_name' => "Bob Smith", 'cvc' => 222, 'acc_num' => "5555 6666 7777 8888"),
    array('cardholder_name' => "Charlie Brown", 'cvc' => 333, 'acc_num' => "9999 0000 1111 2222"),
    array('cardholder_name' => "Diana Miller", 'cvc' => 444, 'acc_num' => "3333 4444 5555 666"),
    array('cardholder_name' => "Evan Turner", 'cvc' => 555, 'acc_num' => "7777 8888 9999 000"),
    array('cardholder_name' => "Evan Turner", 'cvc' => 555, 'acc_num' => "7777 8888 9999 000")
);
?>

<!DOCTYPE html>
<html lang="en">
<style>
    th,
    td {
        padding: 5px;
        border: 1px solid black
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Card</title>
</head>

<body>
    <main>
        <table style="border:1px solid black">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Name in uppercase</th>
                <th>Account num</th>
                <th>CVC Num</th>
                <th>Full Account</th>
                <th>Length of full account</th>
                <th>Is Valid</th>
            </tr>
            <?php foreach ($users as $keys => $rows) { ?>
                <tr style="background-color: <?= ($keys % 3 == 0) ? 'lightgray' : ''; ?>">
                    <td><?= $keys + 1 ?></td>
                    <td><?= $rows['cardholder_name'] ?></td>
                    <td><?= strtoupper($rows['cardholder_name']) ?></td>
                    <td><?= $rows['acc_num'] ?></td>
                    <td><?= $rows['cvc'] ?></td>
                    <td><?= $rows['acc_num'] . $rows['cvc'] ?></td>
                    <td><?= $length = strlen(str_replace(" ", "", $rows['acc_num'] . $rows['cvc'])) ?></td>
                    <td><?= ($length == 19) ? "yes" : "no"; ?></td>
                </tr>
            <?php } ?>
        </table>
    </main>

</body>

</html>