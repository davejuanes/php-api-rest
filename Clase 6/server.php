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

// Levantamos el id del recurso buscado
$resourceId = array_key_exists('resource_id', $_GET) ? $_GET['resource_id'] : '';

// Procesamos la solicitud según el método HTTP
switch (strtoupper($_SERVER['REQUEST_METHOD'])) {
    case 'GET':

        if (empty($resourceId)) {
            echo json_encode($books);
        } else {
            if (array_key_exists($resourceId, $books)) {
                echo json_encode($books[$resourceId]);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Resource not found']);
            }
        }

        break;
    case 'POST':
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
};