<?php

namespace Project;

use Perfumer\Framework\Gateway\CompositeGateway;

class Gateway extends CompositeGateway
{
    protected function configure(): void
    {
        $this->addModule('site', 'naimi.xyz', null, 'http');
//        $this->addModule('site.ajax', 'ajax.site', null, 'http');
        $this->addModule('site', 'naimi.xyz', null, 'cli');
    }
}