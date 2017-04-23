<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 4/22/17
 * Time: 8:04 PM
 */

namespace Shopping\Controller\Factory;

use Shopping\Controller\CartController;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;


class CartControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new CartController($entityManager);
    }

}