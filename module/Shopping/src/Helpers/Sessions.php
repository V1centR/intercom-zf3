<?php

namespace Shopping\Helpers;

use Zend\Session\Container;
use Zend\View\Helper\AbstractHelper;

class Sessions extends AbstractHelper
{

    public function checkSession()
    {
        $status = false;
        $session = new Container('sessionUser');

        if(isset($session->idUser)){
            $status = true;
        }else{
            $status = false;
        }
        return $status;
    }


}