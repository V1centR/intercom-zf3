<?php

namespace Shopping\Controller;

use Shopping\Entity\Banners;
use Shopping\Entity\Visitante;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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
        $hash_user = $_COOKIE['uc'];
        $userVisit = $this->entityManager->getRepository(Visitante::class)
            ->findOneBy(['sessao' => $hash_user]);
        
        $sequencesPack = [];
        
        for($i=0;$i<=5;$i++){
            
            $sequencesPack[] = self::gerador(1,60);
        }

        
        foreach ($sequencesPack as $data1) {
            
            echo "<br>";
            
            foreach ($data1 as $sequence) {
                echo $sequence." ";                
            }
        }
        exit;
        
//        $valor = 2400.99;
//        echo 'R$: '.number_format($valor,2,",",".");
        

        $view = new ViewModel(array(
//            'logo_shop' => $testOk,
        ));

       // $view->setTemplate('iso')->setTerminal(true);

        return $view;
    }
    
    public function gerador($start,$end){
        
        $times = 0;
        $randomico = [];
            
            while($times <= 5){
                $alter = rand($start, $end);
                $search = in_array($alter,$randomico);

                if(!$search){                    
                   $randomico[] = $alter;                  
                }else{
                    $times--;
                }
                $times++;
            }
            
            sort($randomico);
        
        return $randomico;
    }
}
