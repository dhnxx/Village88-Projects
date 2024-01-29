<?php

class Bike {
    private $distance = 0;

    public function drive() {
        $this->distance += 10;
        echo "Driving Forward / Total: {$this->distance}<br>";
        return $this;
    }

    public function reverse() {
        $this->distance -= 5;
        echo "Driving Reverse / Total: {$this->distance} <br>";
        return $this;
    }

    public function displayInfo() {
        echo "<br>Distance traveled:  {$this->distance} miles<br>";
        return $this;
    }
}

$bike1 = new Bike();
$bike1->drive()->drive()->drive()->reverse()->displayInfo();
