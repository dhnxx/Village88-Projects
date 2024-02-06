<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>


<body>
    <aside>
        <?= form_open("players/filter", array("method" => "get")); ?>
        <label for="name">Search Players</label>
        <div class="text">
            <input type="text" name="name" id="name" placeholder="Enter player name...">
        </div>
        <div class="gender">
            <input type="checkbox" name="female" id="female" value="1">
            <label for="female">Female</label>
            <input type="checkbox" name="male" id="male" value="1">
            <label for="male">Male</label>
        </div>

        <label for="sports">Choose Sports</label>
        <div class="sports">
            <div class="sport-list">
                <input type="checkbox" name="basketball" id="basketball" value="1">
                <label for="basketball">Basketball</label>
            </div>
            <div class="sport-list">
                <input type="checkbox" name="volleyball" id="volleyball" value="1">
                <label for="volleyball">Volleyball</label>
            </div>
            <div class="sport-list">
                <input type="checkbox" name="baseball" id="baseball" value="1">
                <label for="baseball">Baseball</label>
            </div>
            <div class="sport-list">
                <input type="checkbox" name="soccer" id="soccer" value="1">
                <label for="soccer">Soccer</label>
            </div>
            <div class="sport-list">
                <input type="checkbox" name="football" id="football" value="1">
                <label for="football">Football</label>
            </div>
            <input type="submit" value="Search">
            <?= form_close(); ?>
    </aside>
    <main>
        <?php foreach ($players as $player) { ?>
            <div class="player">
                <img src="<?= $player["image_url"] ?>" alt="<?= $player["name"] ?>">
                <p><?= $player["name"] ?></p>
            </div>
        <?php } ?>
    </main>
</body>