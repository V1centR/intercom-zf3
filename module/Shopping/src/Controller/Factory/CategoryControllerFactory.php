<?php
/**
 * User: dev
 * Date: 06/08/17
 * Time: 7:29 PM
 */

namespace Shopping\Controller\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Shopping\Controller\CategoryController;


class CategoryControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new CategoryController($entityManager);
    }


}