<?php
class Weight {

    protected $weight;

    public function __construct($weight)
    {
        $this->weight = $weight;
    }

    public function gain($pounds)
    {
        return new static($this->weight + $pounds);
    }

    public function lose($pounds)
    {
        return new static($this->weight - $pounds);
    }

}

$c = new Weight(100);
$ss = $c->gain(22);

var_dump($ss);