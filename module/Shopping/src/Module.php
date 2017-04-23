<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Shopping;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;
use Shopping\Entity\Categorias;

class Module
{
    const VERSION = '3.0.2dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig(){


    }


    public function onBootstrap(MvcEvent $e)
    {
        $services = $e->getApplication()->getServiceManager();

        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach(MvcEvent::EVENT_ROUTE, array($this, 'startVisit'), -100);


    }


    // funcao responsavel por start visitor
    public function startVisit(){

        if(empty($_COOKIE['uc'])){
            $signal = ['.', ' '];
            $timeKey = str_replace($signal, '', microtime());
            $keyUser = strtoupper(sha1($timeKey));
            setcookie("uc", $keyUser, time()+432000, '/');
        }
    }

}
