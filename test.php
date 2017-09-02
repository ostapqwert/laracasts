<?php

class Strr {

    public function echoString($str){
        echo $str;
    }
}

class Number {

    protected $number;
    protected $string;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public static function plusAnything($aaa, Strr $string)
    {
        return new static($aaa * 5);
    }

    public function getNumber(){
        return $this->number;
    }


}

$obj = new Number(5);
echo $obj->getNumber();

echo "\n";

$s = new Strr();
$obj2 = Number::plusAnything(10, $s);
echo $obj2->getNumber();
echo "\n";