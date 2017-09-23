<?php

namespace App\Acme\Transformers;

abstract class Transformer
{

    /**
     * @param $lessons
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    /**
     * @param $lessons
     * @return array
     */
    public abstract function transform($item);

}