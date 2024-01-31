<h1>User name: <?php echo $name ?> </h1>
<h2>User Age: <?php echo $age ?>, Location: <?php echo $location ?></h2>
<h3><?php echo count($hobbies) ?> Hobbies</h3>
<ul>
    <?php foreach ($hobbies as $hobby) { ?>
        <li><?= $hobby ?></li>
    <?php } ?>
</ul>