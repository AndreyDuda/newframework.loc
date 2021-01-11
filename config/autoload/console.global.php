<?php

use App\Console\Command;

return [
    'dependencies' => [
        'factories' => [

        ],
    ],

    'console' => [
        'commands' => [

        ],
        'cachePaths' => [
            'doctrine' => 'var/cache/doctrine',
            'twig' => 'var/cache/twig',
        ],
    ],
];
