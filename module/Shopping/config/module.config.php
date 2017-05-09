<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Shopping;

use Shopping\Controller\AtendController;
use Shopping\Controller\CartController;
use Shopping\Controller\Factory\CartControllerFactory;
use Shopping\Controller\Factory\IndexControllerFactory;
use Shopping\Controller\Factory\MenuFactory;
use Shopping\Controller\Factory\ServiceFactory;
use Shopping\Controller\Factory\UsersControllerFactory;
use Shopping\Controller\Factory\SessionFactory;
use Shopping\Controller\ProdutoController;
use Shopping\Controller\UsersController;
use Zend\Router\Http\Literal;
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
            'iso' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/iso',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'iso',
                    ],
                ],
            ],

           'users' => [
                       'type' => Segment::class,
                       'options' => array(
                           'route' => '/users[:action][/:id]',
                           'constraints' => [
                               'controller' => '[a-z_-]+',
                           ],
                           'defaults' => array(
                               'controller' => UsersController::class,
                               'action' => 'register',
                           ),
                       ),
           ],

            'logout' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/logout',
                    'defaults' => [
                        'controller' => UsersController::class,
                        'action'     => 'logout',
                    ],
                ],
            ],

            'validform' => [
                'type' => Segment::class,
                'options' => array(
                    'route' => '/validform',
                    'constraints' => array(
                        'controller' => '[a-z_-]+',
                    ),
                    'defaults' => [
                        'controller' => AtendController::class,
                        'action' => 'validForm',
                    ],
                ),
            ],

           'login' => [
               'type' => Segment::class,
               'options' => array(
                   'route' => '/users[:action][/:id]',
                   'constraints' => [
                       'controller' => '[a-z_-]+',
                   ],
                   'defaults' => array(
                       'controller' => UsersController::class,
                       'action' => 'login',
                   ),
               ),
           ],

           'produto' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/produto[/:id][/:seo]',
                    'constraints' => [
                        'controller' => '[a-z_-]+',
                        'id'     => '[0-9_-]+',
                        'seo'     => '[a-z0-9_-]+',
                    ],
                    'defaults' => [
                        'controller' => ProdutoController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'cart' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/cart[/:action][/:id]',
                    'constraints' => [
                        'controller' => '[a-z_-]+',
                        'param'     => '[a-z0-9_-]+',
                    ],
                    'defaults' => [
                        'controller' => CartController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => IndexControllerFactory::class,
            Controller\AtendController::class => ServiceFactory::class,
            Controller\UsersController::class => UsersControllerFactory::class,
            Controller\ProdutoController::class => InvokableFactory::class,
            Controller\CartController::class => CartControllerFactory::class,
        ],

        'invokables' => [
            //'Shopping\Controller\Index' => \Shopping\Controller\IndexController::class,
           // 'Shopping\Controller\Atend' => \Shopping\Controller\AtendController::class
        ],

         'aliases' => [
             'iso' =>   'Shopping\Controller\Index',

         ]
    ],


    'view_helpers' => [
        'factories' => [
          //  \Shopping\Helpers\Menu::class => InvokableFactory::class,
            \Shopping\Helpers\Menu::class => MenuFactory::class,
            \Shopping\Helpers\Sessions::class => SessionFactory::class
        ],
        'aliases' => [
            'mainMenu' =>   \Shopping\Helpers\Menu::class,
            'sessions' => \Shopping\Helpers\Sessions::class,
        ]
    ],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',

        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/templates/'.TEMPLATE.'/layout/layout.phtml',
            'shopping/index/index' => __DIR__ . '/../view/templates/'.TEMPLATE.'/index.phtml',
            'error/404'               => __DIR__ . '/../view/templates/'.TEMPLATE.'/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/templates/'.TEMPLATE.'/error/index.phtml',
            'menu' => __DIR__ . '/../view/templates/'.TEMPLATE.'/menu.phtml',
            'headBar' => __DIR__ . '/../view/templates/'.TEMPLATE.'/headBar.phtml',
            'shopping/index/iso' => __DIR__ . '/../view/templates/'.TEMPLATE.'/iso.phtml',
//            'shopping/index/logout' => __DIR__ . '/../view/templates/'.TEMPLATE.'/iso.phtml',
            'generic' => __DIR__ . '/../view/templates/'.TEMPLATE.'/generic.phtml',
            'product-profile' => __DIR__ . '/../view/templates/'.TEMPLATE.'/product-profile.phtml',
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
