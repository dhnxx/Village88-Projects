<?php


class character {
    public $name;
    public $health;
    public $stamina;
    public $mana;


    public function __construct($name) {
        $this->name = $name;
        $this->health = 100;
        $this->stamina = 100;
        $this->mana = 100;
    }

    public function walk() {
        $this->stamina -= 1;
    }
    public function run() {
        $this->stamina -= 3;
    }
    public function showStats() {
        echo "<br>Name: {$this->name}<br>";
        echo "Health: {$this->health}<br>";
        echo "Stamina: {$this->stamina}<br>";
        echo "Mana: {$this->mana}<br><br>";
    }
}

class Shaman extends character {
    public function __construct($name) {
        parent::__construct($name);
        $this->health = 150;
    }
    private function heal() {
        $this->health += 5;
        $this->stamina += 5;
        $this->mana += 5;
    }

    public function castHeal() {
        $this->heal();
    }
}

class Swordsman extends character {

    public function __construct($name) {
        parent::__construct($name);
        $this->health = 170;
    }
    public function showStats() {
        echo "I am Powerful!!!";
        parent::showStats();
    }
    private function slash() {
        $this->mana -= 10;
    }

    public function castSlash() {
        $this->slash();
    }
}


$character = new character("John The Character");
$character->walk();
$character->walk();
$character->walk();
$character->run();
// $character->castSlash(); //! Error 
// $character->castHeal(); //! Error 
$character->showStats();


$shaman = new Shaman("ShamGod");
$shaman->walk();
$shaman->walk();
$shaman->walk();
$shaman->run();
$shaman->run();
$shaman->castHeal();
$shaman->showStats();

$swordsman = new Swordsman("Sword Hunter");
$swordsman->walk();
$swordsman->walk();
$swordsman->walk();
$swordsman->run();
$swordsman->run();
$swordsman->castSlash();
$swordsman->castSlash();
$swordsman->showStats();
