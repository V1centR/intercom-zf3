<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Shopping;

use Shopping\Controller\Factory\IndexControllerFactory;
use Shopping\Controller\Factory\MenuFactory;
use Zend\Router\Http\Literal;
use Shopping\view\varejo\Helper\Menu;
use Zend\Router\Http\Segment;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'shopping' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/shop[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => IndexControllerFactory::class,

        ],
    ],


    'view_helpers' => [
        'factories' => [
            \Shopping\Helpers\Menu::class => InvokableFactory::class,
            \Shopping\Helpers\Menu::class => MenuFactory::class
        ],
        'aliases' => [
            'mainMenu' =>   \Shopping\Helpers\Menu::class
        ]
    ],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
//        'template_map' => [
//            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
//            'shopping/index/index' => __DIR__ . '/../view/shopping/index/index.phtml',
//            'error/404'               => __DIR__ . '/../view/error/404.phtml',
//            'error/index'             => __DIR__ . '/../view/error/index.phtml',
//        ],
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/templates/'.TEMPLATE.'/layout/layout.phtml',
            'shopping/index/index' => __DIR__ . '/../view/templates/'.TEMPLATE.'/index.phtml',
            'error/404'               => __DIR__ . '/../view/templates/'.TEMPLATE.'/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/templates/'.TEMPLATE.'/error/index.phtml',
            'menu' => __DIR__ . '/../view/templates/'.TEMPLATE.'/menu.phtml',
        ],

        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Shopping/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]


];
