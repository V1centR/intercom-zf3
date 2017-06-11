<?php
/**
 * Created by NetBeans.
 * User: V1centR
 * Date: 06/09/17
 * Time: 15:00 PM Brazil - Pernambuco - Recife
 */

namespace Shopping\Controller\Factory;

use Shopping\Controller\ProdutoController;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;


class ProdFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new ProdutoController($entityManager);
    }

}