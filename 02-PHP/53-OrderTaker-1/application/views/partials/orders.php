<ul>
<?php foreach ($orders as $order) {?> 
    <li>
        <h2><?= $order["id"] ?></h2>
        <p><?= $order["content"] ?></p>
    </li>
<?php } ?> 
</ul>