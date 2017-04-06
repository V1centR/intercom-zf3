<?php

namespace Shopping\Controller;

use Shopping\Entity\Banners;
use Shopping\Entity\Categorias;
use Shopping\Entity\Usuario;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\Mapping as ORM;
use Zend\Http\Header\SetCookie;
use Zend\Session\Container;

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
        $new_session = new Container('sessionUser');

        $signal = ['.', ' '];
        $timeKey = str_replace($signal, '', microtime());

        echo strtoupper(sha1($timeKey)).'<br>';



        print_r($_SESSION['sessionUser']);

        if(isset($new_session->idUser)){
            echo 'session ok';
            echo $new_session->emailUser;

        }else{

            echo 'sem sessao';
        }

        $view = new ViewModel(array(
//            'logo_shop' => $testOk,


        ));

       // $view->setTemplate('iso')->setTerminal(true);

        return $view;
    }
}
