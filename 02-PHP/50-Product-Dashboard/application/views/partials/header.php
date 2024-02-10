<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Dashboard</title>
    <link rel="stylesheet" href="<?= base_url("assets/css/main.css?v" . time()) ?>">
</head>

<body>
    <div class="header">
        <h1>SHOP NAME</h1>
        <?php if ($this->session->userdata("current_user")) { ?>
            <a href="<?= base_url("dashboard") ?>">Dashboard</a>
            <a href="<?= base_url("users/edit") ?>">Profile</a>
            <a href="<?= base_url("users/logout") ?>">Logout</a>
        <?php } ?>
    </div>
</body>