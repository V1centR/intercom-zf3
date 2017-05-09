<?php

namespace Shopping\Helpers;

use Zend\Session\Container;
use Zend\View\Helper\AbstractHelper;

class Sessions extends AbstractHelper
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
    
    public function checkSession()
    {
        $status = false;
        $session = new Container('sessionUser');
        $hash_user = $_COOKIE['uc'];
        
        $sessionCart = new Container('sessionCart');
        if($sessionCart->keyUser != $hash_user){            
//             $sessionCart->getManager()->getStorage()->clear('sessionCart');

        $sessionCart->keyUser = '';            
        }        
//        $new_session->getManager()->getStorage()->clear('sessionUser');
        
        
        if(isset($session->idUser)){
            $status = true;
        }else{
            $status = false;
        }
        return $status;
    }
    
    public function cartItens($idCart)
    {        
        $em = $this->entityManager->getConnection();
        $this->strNumItens = "SELECT SUM(quantidade) as qtd FROM carrinhoitens where carrinhoId = '$idCart'";
        $queryNumItens = $em->prepare($this->strNumItens);
        $queryNumItens->execute();
        
        foreach($queryNumItens as $dataNumItens){            
            $itens = $dataNumItens['qtd'];
        }
        
        $cartNumItens = ['cartQtdItems' => (int) number_format($itens, 0, '.', ',')];
        
        return json_encode($cartNumItens);        
    }
}