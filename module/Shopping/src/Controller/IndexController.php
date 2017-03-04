<?php

namespace Shopping\Controller;

use Doctrine\ORM\EntityManager;
use DoctrineModule\ServiceFactory\AbstractDoctrineServiceFactory;
use Interop\Container\ContainerInterface;
use Shopping\Entity\Produto;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceManager;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\Mapping as ORM;


class IndexController extends AbstractActionController
{

    /**
     * Entity manager
     * @var Doctrine/EntityManager
     */
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        $query = $this->entityManager->getRepository(Produto::class)
            ->findAll();

       foreach ($query as $key){
           echo $key->getNome()."<br>";
       }

        return new ViewModel([
            'slide1' => 'OK',

        ]);
    }
}
