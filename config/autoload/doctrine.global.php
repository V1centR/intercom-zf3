<?php

use Doctrine\DBAL\Driver\PDOMySql\Driver as PDOMySqlDriver;
use Doctrine\ORM\EntityManagerInterface;
use DoctrineORMModule\Service\EntityManagerFactory;

return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => PDOMySqlDriver::class,
                'params' => array(
                    'host' => '127.0.0.1',
                    'port' => '3306',
                    'dbname' => 'db1',
                ),
            ),
        )
    ),
    'service_manager' => [

        'factories' => [

            EntityManagerInterface::class => EntityManagerFactory::class,

        ],
    ]


);