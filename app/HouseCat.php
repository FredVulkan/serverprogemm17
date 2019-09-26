<?php 
namespace App;

class HouseCat extends Cat {
    
    public function setColor($color) {
        $this->color = $color;
    }
    public function setIsMale($isMale) {
        $this->isMale = $isMale;
        echo $this->isMale;
    }
}