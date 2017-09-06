<?php

namespace spec;

use MovieCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MovieCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MovieCollection::class);
    }

    function it_store_a_collection_of_movie(MovieCollection\Movie $movie)
    {
        $this->add($movie);

        $this->shouldHaveCount(1);
    }
}
