<?php

namespace Shopping\Helpers;

use Zend\View\Helper\AbstractHelper;
use Shopping\Entity\Categorias;

class Menu extends AbstractHelper
{




    public function renderMenu(){

        print_r($this->getCategorias);

        return "Helper::renderMenu ok";
    }

}