<?php


class HTML_Generator {

    public $list = array();

    public function __construct($list) {
        $this->list = $list;
    }

    public function render_input() {
        echo ("<h1>RENDER INPUT</h1>");
        foreach ($this->list as $keys => $item) {
?> <label for="<?= $keys ?>"><?= $keys ?></label>
            <input type="text" name="<?= $keys ?>" id="<?= $keys ?>" value="<?= $item ?>">
        <?php
        }
    }

    public function render_list($list_type) {
        echo ("<h1>RENDER LIST</h1>");
        if ($list_type === "unordered") {
            $x = "ul";
        } elseif ($list_type === "ordered") {
            $x = "ol";
        } else {
            echo ("<h1> INVALID INPUT </h1>");
        }
        echo ("<{$x}>");
        foreach ($this->list as $item) {
        ?> <li>$item</li>
<?php }
        echo ("</{$x}>");
    }
}


$new_list = new HTML_Generator(array("name" => "bag", "price" => "250", "stocks" => "10"));
$new_list->render_input();


$fruits = new HTML_Generator(array("Apple", "Banana", "Cherry"));
$fruits->render_list("unordered");

$fruits = new HTML_Generator(array("Apple", "Banana", "Cherry"));
$fruits->render_list("ordered");

?>