<?php

require __DIR__ . '/vendor/autoload.php';

$books = [
    'Harry Potter',
    'Ring of Beats',
    'Mazefucker naher'
];

$library = new \Acme\Library(new \Acme\BookCollection($books));

$sanchez = new \Acme\Member();

$sanchez->checkOut('Not exist', $library);
$sanchez->checkOut('Ring of Beats', $library);

var_dump($library->allBooks());
