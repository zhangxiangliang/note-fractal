<?php

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

require_once "./vendor/autoload.php";

$fractal = new Manager();

$books = [
    [
        'id' => '1',
        'title' => 'Hogfather',
        'yr' => '1998',
        'author_name' => 'Philip K Dick',
        'author_email' => 'philip@example.org',
    ],
    [
        'id' => '2',
        'title' => 'Game Of Kill Everyone',
        'yr' => '2014',
        'author_name' => 'George R. R. Satan',
        'author_email' => 'george@example.org',
    ]
];

$resource = new Collection($books, function (array $book) {
    return [
        'id' => (int) $book['id'],
        'title' => $book['title'],
        'year' => (int) $book['yr'],
        'author' => [
            'name' => $book['author_name'],
            'email' => $book['author_email']
        ],
        'links' => [
            [ 'rel' => 'self', 'uri' => '/books/' . $book['id'] ],
            [ 'rel' => 'edit', 'uri' => '/books/' . $book['id'] ],
        ]
    ];
});

var_dump(
    $fractal->createData($resource)->toArray(),
    $fractal->createData($resource)->toJson()
);
