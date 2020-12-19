<?php

namespace Site\Module;

use Perfumer\Framework\Controller\Module;

class ControllerModule extends Module
{
    public $name = 'site';

    public $router = 'site.router';

    public $request = 'site.request';

    public $components = [
        'view' => 'site.view',
        'template_provider' => 'site.template_provider'
    ];
}