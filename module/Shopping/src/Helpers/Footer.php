<?php

namespace Shopping\Helpers;

use Zend\Session\Container;
use Zend\View\Helper\AbstractHelper;

class Footer extends AbstractHelper {

    /**
     * Entity manager.
     * @var Doctrine/EntityManager
     */
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * 
     * @param type $idCart
     * @return type
     */
    public function footerItens() {

        $itensLink = [];
        $itemsPaymnt = [];
        $address = [];
        $certified = [];
        $itemsPack = [];

        $em = $this->entityManager->getConnection();
        $this->strItens = "SELECT * FROM textosshopping WHERE status = 'A'";
        $queryNumItens = $em->prepare($this->strItens);
        $queryNumItens->execute();
        
        //get payment items
//        $this->strItens = "SELECT * FROM textosshopping WHERE status = 'A'";
//        $queryNumItens = $em->prepare($this->strItens);
//        $queryNumItens->execute();

        foreach ($queryNumItens as $dataNumItens) {
            $itemsPack['links'][] = $dataNumItens;
        }

        return $itemsPack;
    }

}
