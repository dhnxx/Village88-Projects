<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>


<body>
    <h1>Leave Request</h1>
    <div class="table">
    <table>
        <tr>
            <th>Employee Name</th>
            <th>Request Date</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Leave Type</th>
        </tr>
<?php foreach($employees as $employee) {?>
        <tr>
            <td><?= "{$employee["first_name"]} {$employee["last_name"]}"?></td>
            <td><?= $employee["request_date"] ?></td>
            <td><?= $employee["from_date"] ?></td>
            <td><?= $employee["to_date"] ?></td>
            <td><?= $employee["leave_type"] ?></td>
        </tr>
<?php } ?>
    </table>
    </div>
<?php $count += 5 ?>
<?php if ($count < $result) { ?>
    <form action="<?= base_url("requests/{$count}") ?>" method ="post">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
        <input type="submit" value="Show More">
    </form>
<?php } ?>
</body>