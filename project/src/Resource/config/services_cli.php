<?php

return [
    'site.request' => [
        'class' => 'Perfumer\\Framework\\Proxy\\Request',
        'arguments' => ['$0', '$1', '$2', '$3', [
            'prefix' => 'Site\\Command',
            'suffix' => 'Command'
        ]]
    ]
];
