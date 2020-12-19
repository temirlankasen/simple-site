<?php

namespace Pub\Bundle;

use Perfumer\Component\Container\AbstractBundle;

class ControllerBundle extends AbstractBundle
{
    public function getName()
    {
        return 'site';
    }

    public function getDescription()
    {
        return 'Модуль публичной части';
    }

    public function getDefinitionFiles()
    {
        return [
            __DIR__ . '/../Resource/config/services_http.php',
        ];
    }

    public function getAliases()
    {
        return [
            'router' => 'site.router',
            'request' => 'site.request',
            'view' => 'site.view',
            'template_provider' => 'site.template_provider'
        ];
    }
}
