<?php


class House
{
    static function diagnose(){
        return 1;
    }
    public function introduce(){
        if ($this->diagnose() == 1)
        print ( "House " . $this->getHouseName() . " of " . $this->getHouseSeat() . " : " . '"' . $this->getHouseMotto() . '"' . PHP_EOL);
    }
//    public function getHouseMotto(){}
//    public function getHouseSeat(){}
//    public function getHouseName(){}
}