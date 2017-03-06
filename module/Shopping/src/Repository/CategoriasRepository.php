<?php

namespace Shopping\Repository;

use Doctrine\ORM\EntityRepository;
use Zend\View\Model\ViewModel;

class CategoriasRepository extends EntityRepository
{


    public function getCategorias(){

        $menu =  'getCategorias OK AAA';

       return $menu;

    }


}