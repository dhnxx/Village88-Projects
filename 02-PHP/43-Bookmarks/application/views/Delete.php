<h1>Are you sure you want to delete</h1>
<h2><?php echo "{$folder}/{$name} ({$url})"; ?></h2>
<form action="<?php echo base_url("Main/confirm_delete/{$id}"); ?>" method="post">
    <input type="submit" value="No">
    <input type="submit" value="Yes, I want to Delete" name="confirm">
</form>