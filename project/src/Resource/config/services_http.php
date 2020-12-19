<?php

return [
    'fast_router' => [
        'shared' => true,
        'init' => function(\Perfumer\Component\Container\Container $container) {
            return \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
                $r->addRoute('GET', '/', 'home.get');
                $r->addRoute('GET', '/about', 'about.get');


                $r->addGroup('/ajax', function(\FastRoute\RouteCollector $r) {
                    $r->addRoute('POST', '/ticket', 'ajax/ticket.post');
                });
            });
        }
    ],

    'site.view' => [
        'class' => 'Perfumer\\Framework\\View\\TemplateView',
        'arguments' => ['#twig', '#site.template_provider']
    ],

    'site.template_provider' => [
        'shared' => true,
        'class' => 'Perfumer\\Framework\\View\\TemplateProvider\\TwigFilesystemProvider',
        'arguments' => ['#twig.filesystem_loader', __DIR__ . '/../view/twig', 'site']
    ],

    'site.router' => [
        'shared' => true,
        'class' => 'Perfumer\\Framework\\Router\\Http\\FastRouteRouter',
        'arguments' => ['#gateway.http', '#fast_router', [
            'data_type' => 'json',
            'allowed_actions' => ['get', 'post', 'delete', 'patch'],
        ]]
    ],

    'site.request' => [
        'class' => 'Perfumer\\Framework\\Proxy\\Request',
        'arguments' => ['$0', '$1', '$2', '$3', [
            'prefix' => 'Site\\Controller',
            'suffix' => 'Controller'
        ]]
    ],
];
