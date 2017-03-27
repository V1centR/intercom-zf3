<?php

namespace Shopping\Controller;

use Shopping\Entity\Banners;
use Shopping\Entity\Categorias;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\Mapping as ORM;

class AtendController extends AbstractActionController
{
    /**
     * Entity manager
     * @var Doctrine/EntityManager
     */
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
       // $getCategorias = $this->entityManager->getRepository(Categorias::class)->getCategorias();
    }

    public function indexAction()
    {
        return new ViewModel([
           'teste' => 'ok'
        ]);
    }

    public function isoAction()
    {
        echo 'iso action controller';

        $view = new ViewModel(array(
//            'logo_shop' => $testOk,
        ));

        $view->setTemplate('iso')->setTerminal(true);

        return $view;
    }
}
