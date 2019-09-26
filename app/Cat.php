<?php
namespace App; 

class Cat {
    public $age;
    protected $color;
    private $isMale;
    public static $owner = "Kaspar";
    public function __construct($age, $color, $isMale){
        $this->age = $age;
        $this->color = $color;
        $this->isMale = $isMale;
    }

    public function meow() {
        echo "Meow";
    }

    public function purr() {
        echo "Purr";
    }
}