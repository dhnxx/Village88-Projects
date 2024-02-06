<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view("partials/header.php"); ?>


<body>
    <aside>
        <?= form_open("/", array("method" => "get")); ?>
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
                <div>
                    <input type="checkbox" name="basketball" id="basketball" value="1">
                    <label for="basketball">Basketball</label>
                </div>
                <label class="number" for="basketball">1</label>
            </div>
            <div class="sport-list">
                <div>
                    <input type="checkbox" name="volleyball" id="volleyball" value="2">
                    <label for="volleyball">Volleyball</label>
                </div>
                <label class="number" for="volleyball">2</label>
            </div>
            <div class="sport-list">
                <div>
                    <input type="checkbox" name="baseball" id="baseball" value="3">
                    <label for="baseball">Baseball</label>
                </div>
                <label class="number" for="baseball">3</label>

            </div>
            <div class="sport-list">
                <div>
                    <input type="checkbox" name="soccer" id="soccer" value="4">
                    <label for="soccer">Soccer</label>
                </div>
                <label class="number" for="soccer">4</label>

            </div>
            <div class="sport-list">
                <div>
                    <input type="checkbox" name="football" id="football" value="5">
                    <label for="football">Football</label>
                </div>
                <label class="number" for="football">5</label>
            </div>
            <input type="submit" value="Search">
            <?= form_close(); ?>
    </aside>
    <main>
        <?php foreach ($players as $player) { ?>
            <div class="player">
                <img src="<?= $player["image_url"] ?>" alt="<?= $player["Name"] ?>">
                <p><?= $player["Name"] ?></p>
                <p><?= $player["sport_ids"] ?></p>
            </div>
        <?php } ?>
    </main>
</body>