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
            <td><?= "{$employee["first_name"]} {$employee["last_name"]}" ?></td>
            <td><?= date("m/d/y", strtotime($employee["request_date"])) ?></td>
            <td><?= date("m/d/y", strtotime($employee["from_date"])) ?></td>
            <td><?= date("m/d/y", strtotime($employee["to_date"])) ?></td>
            <td><?= $employee["leave_type"] ?></td>
        </tr>
<?php } ?>
    </table>