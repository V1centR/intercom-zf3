<?php

namespace Shopping\Helpers;

use Zend\Session\Container;
use Zend\View\Helper\AbstractHelper;

class Sessions extends AbstractHelper {

    /**
     * Entity manager.
     * @var Doctrine/EntityManager
     */
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function checkSession() {
        $status = false;

        if (isset($session->idUser)) {
            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }

    /**
     * 
     * @param type $idCart
     * @return type
     */
    public function cartItens($idCart) {

        $visitor = new Container('sessionVisitor');
        $hash_user = $visitor->keyUser;

        $em = $this->entityManager->getConnection();
        $this->strNumItens = "SELECT SUM(quantidade) as qtd FROM carrinhoitens where carrinhoId = '$idCart'";
        $queryNumItens = $em->prepare($this->strNumItens);
        $queryNumItens->execute();

        foreach ($queryNumItens as $dataNumItens) {
            $itens = $dataNumItens['qtd'];
        }
       

        return (int) number_format($itens, 0, '.', ',');
    }

}
