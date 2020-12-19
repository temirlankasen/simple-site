<?php

return [
    'gateway' => [
        'shared' => true,
        'class' => 'Project\\Gateway',
        'arguments' => ['#application', '#gateway.http', '#gateway.console']
    ],

    'database' => [
        'shared' => true,
        'class' => 'Site\\Service\\Database',
        'arguments' => [
            '@database/db',
            '@database/host',
            '@database/port',
            '@database/username',
            '@database/password',
        ]
    ],

    'centrifugo' => [
        'shared' => true,
        'class' => 'Site\\Service\\Centrifugo',
        'arguments' => [
            '@centrifugo/host',
            '@centrifugo/api_key',
            '@centrifugo/secret_key',
        ]
    ],

    'badges' => [
        'shared' => true,
        'class' => 'Site\\Service\\Badges',
        'arguments' => [
            '@badges/host',
        ]
    ],

    'repository.record' => [
        'shared' => true,
        'class' => 'Site\\Repository\\RecordRepository',
    ],

    'domain.collection' => [
        'shared' => true,
        'class' => 'Site\\Domain\\CollectionDomain',
    ],
];