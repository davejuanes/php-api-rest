<?php

// Definimos los recursos disponibles
$allowedResourceTypers = [
    'books',
    'authors',
    'genres'
];

// Validamos que el recurso solicitado esté permitido
$resourceType = $_GET['resource_type'];

if (!in_array($resourceType, $allowedResourceTypers)) {
    die('Resource type not allowed');
}

// Defino los recursos
$books = [
    1 => [
        'title' => 'Lo que el viento se llevó',
        'author' => 'Margaret Mitchell',
        'year' => 1936,
        'genre' => 'Historical Fiction'
    ],
    2 => [
        'title' => '1984',
        'author' => 'George Orwell',
        'year' => 1949,
        'genre' => 'Dystopian'
    ],
    3 => [
        'title' => 'To Kill a Mockingbird',
        'author' => 'Harper Lee',
        'year' => 1960,
        'genre' => 'Southern Gothic'
    ]
];

header('Content-Type: application/json');
// Procesamos la solicitud según el método HTTP
switch (strtoupper($_SERVER['REQUEST_METHOD'])) {
    case 'GET':

        echo json_encode($books);

        break;
    case 'POST':
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
};