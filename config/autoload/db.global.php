<?php

return [
    'dependencies' => [
        'factories' => [
            PDO::class => Infrastructure\App\PDOFactory::class,
        ]
    ],

    'pdo' => [
        'dsn' => 'mysql:host=mysql;dbname=project',
        'user' => 'guest',
        'password' => 'guest',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ],
    ],
];
