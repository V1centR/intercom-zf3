<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 3/7/17
 * Time: 8:43 PM
 */

namespace Shopping\Controller\Factory;

use Shopping\Controller\AtendController;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;


class ServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new AtendController($entityManager);
    }


}