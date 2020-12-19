<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'site' => [
                    'adapter' => 'pgsql',
                    'dsn' => 'pgsql:host=db;port=5432;dbname=site',
                    'user' => 'postgres',
                    'password' => 'root',
                    'settings' => [
                        'charset' => 'utf8',
                        'queries' => [
                            'utf8' => "SET NAMES 'UTF8'"
                        ]
                    ],
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'site',
            'connections' => ['site']
        ],
        'generator' => [
            'defaultConnection' => 'site',
            'connections' => ['site']
        ]
    ]
];