<?php

namespace Shopping\Controller;

use Shopping\Entity\Banners;
use Shopping\Entity\Categorias;
use Shopping\Entity\Usuario;
use Zend\Mvc\Controller\AbstractActionController;
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
        $product = [];

        $conn = $this->entityManager->getConnection();

        // get produtos #############
        $sql = "SELECT * FROM get_view_produtos where precopromocional <> 0 limit 4";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll();

        //get slides ################
        $bannersSlides = $this->entityManager->getRepository(Banners::class)
                        ->findBy(['categoriaid' => 0,
                                  'status' => 'A',
                                 ]);

        return new ViewModel([
            'slide1' => 'OK',
            'products' => $products,
            'slides' => $bannersSlides,
        ]);
    }

    public function isoAction()
    {
        echo 'iso action controller';




        $view = new ViewModel(array(
//            'logo_shop' => $testOk,


        ));

       // $view->setTemplate('iso')->setTerminal(true);

        return $view;
    }
}
