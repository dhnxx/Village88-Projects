<?php

class Item {

    public $name = "Item name";
    public $price = "0";
    public $stock = 0;
    public $sold = 0;

    public function __construct($name, $price, $stock) {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function logDetails() {
        $properties = array($this->name, $this->price, $this->stock, $this->sold);
        foreach ($properties as $property) {
            echo ("$property <br>");
        }
        // var_dump($this->name);
    }

    public function buy() {
        if ($this->stock <= 0) {
            echo ("<h2> No stocks left! </h2>");
        } else {
            $this->stock -= 1;
            $this->sold += 1;
            echo ("<h2> Buying $this->name </h2>");
        }
    }

    public function returnItem() {
        if ($this->sold <= 0) {
            echo ("<h2> Return Unsuccessful! </h2>");
        } else {
            $this->stock += 1;
            $this->sold -= 1;
            echo ("<h2> Returning </h2>");
        }
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }
}

$item1 = new Item("Laptop", "$2000", 50);
$item2 = new Item("Tablet", "$1000", 35);
$item3 = new Item("Smart Phone", "$500", 40);

echo "<h1> ITEM 1 </h1>";
$item1->logDetails();
$item1->buy();
$item1->buy();
$item1->buy();
$item1->logDetails();
$item1->returnItem();
$item1->logDetails();
echo "<h1> ITEM 2 </h1>";
$item2->logDetails();
$item2->buy();
$item2->buy();
$item2->returnItem();
$item2->returnItem();
$item2->logDetails();
echo "<h1> ITEM 3 </h1>";
$item3->returnItem();
$item3->returnItem();
$item3->returnItem();
$item3->logDetails();
