<?php

namespace Acme;


class BookCollection
{

    protected $books;

    public function __construct($books)
    {
        $this->books = $books;
    }

    public function contains($book)
    {
        return in_array($book, $this->books);
    }

    public function remove($book)
    {

        if( ! $this->contains($book))
        {
            Throw new \Exception($book. 'is now availible');
        }

        return new self(array_diff($this->books, [$book]));
    }

}