<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<h1>Bookmark</h1>
<h2>Add a Bookmark</h2>
<form action="<?php echo base_url("Main/add_bookmarks") ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
    <label for="url">URL:</label>
    <input type="text" name="url" id="url">
    <label for="folder">Folder:</label>
    <select name="folder" id="folder">
        <option value="Favorites">Favorites</option>
        <option value="Others">Others</option>
        <option value="Saved Link">Saved Link</option>
        <option value="Quick Access">Quick Access</option>
    </select>
    <input type="submit" value="Submit">

</form>

<h2>Bookmarks</h2>
<table>
    <tr>
        <th>Folder</th>
        <th>Name</th>
        <th>Url</th>
        <th>Action</th>
    </tr>
    <?php foreach ($bookmarks as $bookmark) { ?>
        <tr>
            <td><?php echo $bookmark["folder"] ?></td>
            <td><?php echo $bookmark["name"] ?> </td>
            <td><?php echo $bookmark["url"] ?> </td>
            <td>
                <form action="<?php echo base_url("Main/delete_bookmarks/{$bookmark['id']}") ?>" method="post">
                    <input type="hidden" name="folder" value="<?php echo $bookmark["folder"] ?>">
                    <input type="hidden" name="name" value="<?php echo $bookmark["name"] ?>">
                    <input type="hidden" name="url" value="<?php echo $bookmark["url"] ?>">
                    <input type="submit" value="delete">
                </form>

            </td>
        </tr>
    <?php } ?>
</table>