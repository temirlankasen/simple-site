<?php

namespace Site\Module;

use Perfumer\Framework\Controller\Module;

class CommandModule extends Module
{
    public $name = 'site';

    public $router = 'router.console';

    public $request = 'site.request';
}