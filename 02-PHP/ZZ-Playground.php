<?php

class Smartphone {
    public $apps = array("Playstore");
    public $model;
    public $sim1;

    public function __construct() {
        echo "Welcome!";
        $this->model = "Realme 8 5g";
    }
    public function install($app_name) {
        array_push($this->apps, $app_name);
        echo "Successfully installed $app_name.";
        $this->list_apps();
    }
    public function list_apps() {
        echo "<br>All apps:";
        foreach ($this->apps as $app) {
            echo "$app ";
        }
    }
}

class Realme extends Smartphone {

    public function __construct()
    {
        parent::__construct();
        echo "additional";
    }
    public function reformat() {
        echo "Fake reformatting Realme phone...";
    }
}
class Apple extends Smartphone {
    public function clean_storage() {
        $this->apps = array();
    }
}
class Samsung extends Smartphone {
    public function delete_app() {
        return array_pop($this->apps);
    }
}

// creating an instance of Realme, Apple, and Samsung 
$realme = new Realme();
$apple = new Apple();
$samsung = new Samsung();

// all instances still have smartphone methods because its class extends the Smartphone class
$realme->list_apps();
$apple->list_apps();
$samsung->list_apps();

// yet they are subclasses which means they can extend the current functionality of the Smartphone class
// instances of the Realme class can perform the reformat method which prints only
$realme->reformat();

// instances of the Apple class can perform the clean_storage method
$apple->clean_storage();
$apple->list_apps();

// instances of the Samsung class can perform the delete_app method
echo $samsung->delete_app();
$samsung->list_apps();