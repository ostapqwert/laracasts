<?php

class StringPrinter
{
    public static function staticEcho($value)
    {
        echo $value . " printed by static method \n";
    }

    public function echo($value)
    {
        echo $value . " printet by not static method \n";
    }
}

class Number
{
    protected $number;

    protected $printer;

    public function __construct($number)
    {
        $this->setNumber($number);
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setPrinter(StringPrinter $printer)
    {
        $this->printer = $printer;
    }

    public static function numberFiveTimesAndSetPrinter($number, StringPrinter $printer)
    {
        $static = new static($number * 5);
        $static->setPrinter($printer);

        return $static;
    }

    public function print()
    {
        if($this->printer instanceof StringPrinter){
            $this->printer->echo($this->number);
        } else {
            StringPrinter::staticEcho($this->number);
        }
    }


}

$obj = new Number(5);
$obj->print();

$obj2 = Number::numberFiveTimesAndSetPrinter(10, new StringPrinter());
$obj2->print();
