<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header") ?>

<body>
    <h1>Contact</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($contacts as $contact) { ?>
            <tr>
                <td><?php echo $contact['name'] ?></td>
                <td><?php echo $contact['contact_number'] ?></td>
                <td>
                    <div class="actions">
                        <a href="<?php echo base_url("contacts/show/{$contact['id']}") ?>">Show</a>
                        <a href="<?php echo base_url("contacts/edit/{$contact['id']}") ?>">Edit</a>
                        <form action="<?php echo base_url("contacts/destroy") ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $contact['id'] ?>">
                            <input type="submit" value="Remove">
                        </form>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="<?php echo base_url("contacts/new") ?>">Add new contact</a>
</body>