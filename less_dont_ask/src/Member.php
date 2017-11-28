<?php

namespace Acme;


class Member
{

    protected $books = [];

    public function checkOut($book, Library $library)
    {
            $library->checkOut($book);

            $this->books[] = $book;
    }

}