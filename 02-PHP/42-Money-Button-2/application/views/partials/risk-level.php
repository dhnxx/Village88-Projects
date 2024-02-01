<section>
    <?= form_open("main/index", array("method" => "post", "class" => "form")); ?>
    <h2><?= $name ?></h2>
    <?= form_hidden(array("name" => $name, "value" => $value)) ?>
    <?= form_submit(array("value" => "BET", "class" => "submit")); ?>
    <p><?= $description ?></p>
    <?= form_close(); ?>
</section>