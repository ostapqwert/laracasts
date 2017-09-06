<?php

class MovieCollection implements Countable
{
    protected $collection;

    public function add($movie)
    {
        $this->collection[] = $movie;
    }


    public function count()
    {
        return count($this->collection);
    }
}
