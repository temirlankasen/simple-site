<?php

return [
    'propel' => [
        'bin'           => 'vendor/bin/propel',
        'project'       => 'site',
        'database'      => 'pgsql',
        'dsn'           => 'pgsql:host=db;port=5432;dbname=site',
        'db_user'       => 'postgres',
        'db_password'   => 'root',
        'platform'      => 'pgsql',
        'config_dir'    => 'src/Resource/propel/connection',
        'schema_dir'    => 'src/Resource/propel/schema',
        'model_dir'     => 'src/Model',
        'migration_dir' => 'src/Resource/propel/migration',
        'migration_table' => 'site_propel_migration',
    ],

    'centrifugo' => [
        'host' => '',
        'api_key' => '',
        'secret_key' => '',
    ],

    'host' => [
        'ajax' => 'http://naimi.xyz/ajax',
        'controller' => 'http://naimi.xyz',
        'static'   => 'http://static.naimi.xyz/j2yoGZ3TxX'
    ],

    'twig'       => [
        'debug' => true,
    ],
];