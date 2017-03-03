<?php

namespace Shopping\Controller;

use Interop\Container\ContainerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Shopping\Entity\Produto;

class IndexController extends AbstractActionController
{

    /**
     * @var Doctrine/EntityManager
     */
    protected $em;

//    public function __construct($em)
//    {
//        $this->em = $em;
//
//    }

    public function indexAction()
    {

//       $em = $this->em('doctrine.entity_manager.orm_default');
//        $em = $this->get('doctrine.entitymanager.orm_default');
//
        $testeProdutos = $this->em->getRepository(Produto::class)->findAll();


     print_r($testeProdutos);

        return new ViewModel([
            'slide1' => 'OK',

        ]);
    }
}
