<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 21/07/2017
 * Time: 16:50
 */

namespace Shopping\Controller\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Shopping\Helpers\Footer;


class FooterFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new Footer($entityManager);
    }


}