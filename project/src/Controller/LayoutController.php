<?php

namespace Site\Controller;

use Perfumer\Framework\Controller\TemplateController;
use Perfumer\Framework\Controller\ViewController;
use Perfumer\Framework\Router\Http\FastRouteRouterControllerHelpers;
use Perfumer\Framework\View\StatusViewControllerHelpers;

class LayoutController extends TemplateController
{
    use FastRouteRouterControllerHelpers;
    use StatusViewControllerHelpers;

    protected function validateNotEmpty($var, $name)
    {
        if (!$var) {
            $this->forward('error', 'badRequest', ["\"$name\" parameter must be set"]);
        }
    }

    protected function validateRegex($var, $name, $regex)
    {
        if ($var && !preg_match($regex, $var)) {
            $this->forward('error', 'badRequest', ["\"$name\" parameter is invalid, only letters, digits and underscore signs are allowed"]);
        }
    }

    public function before()
    {
        parent::before();

        $this->pageTraitBefore();

        $this->getView()->addVar('vars', [
            'hosts' => $this->getContainer()->getResource('host')
        ],
        'app');
    }

    protected function pageTraitBefore()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $this->getView()->setTemplate($this->getInitial()->getResource());
//        $this->s('twig.loader');
    }
}
