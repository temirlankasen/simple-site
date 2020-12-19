<?php


namespace Site\Controller;


use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Tests\Runtime\ActiveQuery\CriteriaForClearTest;
use Site\Model\NewsQuery;
use Site\Model\ServiceQuery;

class HomeController extends LayoutController
{
    public function get()
    {

        $news_raw = NewsQuery::create()
            ->orderById(Criteria::DESC)
            ->find();

        $news = [];

        foreach ($news_raw as $item){
            $news[] = [
                'id' => $item->getId(),
                'name' => $item->getName(),
                'description' => $item->getDescription(),
                'digest' => $item->getDigest(),
                'created_at' => $item->getCreatedAt('Y-m-d H:i:s')
            ];
        }

        $services_raw = ServiceQuery::create()
            ->orderById(Criteria::DESC)
            ->find();

        $services = [];

        foreach ($services_raw as $item){
            $services[] = [
                'value' => $item->getId(),
                'text' => $item->getName(),
                'description' => $item->getDescription(),
                'digest' => $item->getDigest(),
                'created_at' => $item->getCreatedAt('Y-m-d H:i:s')
            ];
        }

        $this->getView()->addGroup('content');
        $this->getView()->addVar('news', $news, 'content');
        $this->getView()->addVar('services', $services, 'content');
    }
}