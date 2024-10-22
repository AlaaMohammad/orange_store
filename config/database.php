<?php

return [
    'database' => [
        'host' => 'localhost',
        'name' => $_ENV['DB_DATABASE'],
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=localhost',
        'charset' => 'utf8mb4',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ],
    ],
];