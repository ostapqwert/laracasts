<?php

namespace spec;

use MovieCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MovieCollectionSpec extends ObjectBehavior
{
    function it_is_initializable() // проверяет создан ли класс
    {
        $this->shouldHaveType(MovieCollection::class);
    }

    function it_store_a_collection_of_movie(MovieCollection\Movie $movie)
    {
        $this->add($movie); // проверяет если метод add

        $this->shouldHaveCount(1);
    }
}
