<?php

namespace Shopping\Helpers;

use Zend\View\Helper\AbstractHelper;
use Shopping\Entity\Categorias;
use Doctrine\ORM\Mapping as ORM;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Shopping\Controller\IndexController;

class Menu extends AbstractHelper
{

    /**
     * Entity manager.
     * @var Doctrine/EntityManager
     */
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function renderMenu(){

      //  $conn = $this->entityManager->getConnection();

        $conn = $this->entityManager->getConnection();

        // get produtos #############
        $sql = "SELECT * FROM get_view_produtos where precopromocional <> 0 limit 4";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll();

       // print_r($products);

        return "Helper::renderMenu ok";
    }

}