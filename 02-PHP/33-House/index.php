<?php


class house {

    public $location;
    public $price;
    public $lot;
    public $type;
    public $discount;
    public $total_price;

    public function __construct($location, $price, $lot, $type) {
        $this->location = $location;
        $this->price = $price;
        $this->lot = $lot;
        $this->type = $type;
        $this->discount = ($this->type === "Pre-selling") ? 0.2 : 0.05;
        $this->total_price = $this->price - ($this->price * $this->discount);

        $this->showAll();
    }

    public function showAll() {
        $properties = array("Location" => $this->location, "Price" => $this->price, "Lot" => $this->lot, "Type" => $this->type, "Discount" => $this->discount, "Total Price" => $this->total_price);

        foreach ($properties as $keys => $property) {
            echo "{$keys}: {$property}<br>";
        }
    }
}


$house1 = new house("La Union", 1500000, "100sqm", "Pre-selling");
echo "<br>";
$house2 = new house("Metro Manila", 1000000, "150sqm", "Ready for Occupancy");
echo "<br>";
$house3 = new house("Cebu City", 1200000, "120sqm", "Pre-selling");
echo "<br>";
$house4 = new house("Quezon City", 850000, "200sqm", "Ready for Occupancy");
echo "<br>";
$house5 = new house("Davao City", 900000, "180sqm", "Pre-selling");
