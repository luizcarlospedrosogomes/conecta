<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Usuario',
                        'action'     => 'index',
                    ),
                ),
            ),
            'timeline' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/timeline/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'timeline',
                    ),
                ),
            ),
			'usuario' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/usuario/index',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Usuario',
                        'action'     => 'index',
                    ),
                ),
            ),
            'usuario-cadastro' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/usuario/iniciarSessao',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Usuario',
                        'action'     => 'iniciarSessao',
                    ),
                ),
            ),
		  'turma-index' => array(
             'type' => 'literal',
             'options' => array(
                 'route'    => '/turma/index',
                 'defaults' => array(
                     'controller' => 'Turma',
                     'action'     => 'index',
                 ),
             ),
         ),
		  'turma-cadastro' => array(
             'type' => 'literal',
             'options' => array(
                 'route'    => '/turma/cadastro',
                 'defaults' => array(
                     'controller' => 'Turma',
                     'action'     => 'cadastro',
                 ),
             ),
         ),
            'turma-ingressar' => array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/turma/ingressar',
                    'defaults' => array(
                        'controller' => 'Turma',
                        'action'     => 'ingressar',
                    ),
                ),
            ),
     	  'turma-excluir' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/turma/[:action]/[:id][/]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Turma',
                    ),
                ),
            ),
            'turma-post' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/post/[:nome][/]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Post',
                        'action'       => 'index',
                    ),
                ),
            ),
            'turma-chat' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/chat/[:nome][/]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Chat',
                        'action'       => 'index',
                    ),
                ),
            ),
            'usuario-logout' => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/usuario/logout',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Usuario',
                        'action'        => 'logout',
                    ),
                ),
            ),
            'post-cadastrar' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/post/cadastro/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Post',
                        'action'       => 'cadastrar',
                    ),
                ),
            ),
            'post-excluir' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/post/excluir/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Post',
                        'action'       => 'excluir',
                    ),
                ),
            ),
            'post-editar' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/post/editar/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Post',
                        'action'       => 'editar',
                    ),
                ),
            ),
            'comentario' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/post/[:nome][/]comentar[/]post[/][:id]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Comentario',
                        'action'       => 'index',
                    ),
                ),
            ),
            'comentario-cadastrar' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/comentar/cadastro/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Comentario',
                        'action'       => 'cadastrar',
                    ),
                ),
            ),
            'comentario-excluir' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/comentario/excluir/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Comentario',
                        'action'       => 'excluir',
                    ),
                ),
            ),
            'comentario-editar' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/post/editar/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Comentario',
                        'action'       => 'editar',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '[]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => Controller\IndexController::class,
			'Application\Controller\Usuario' => Controller\UsuarioController::class,
			'Application\Controller\Turma' => Controller\TurmaController::class,
            'Application\Controller\Post' => Controller\PostController::class,
            'Application\Controller\Comentario' => Controller\ComentarioController::class,
            'Application\Controller\Chat' => Controller\ChatController::class
        ),
    ),
	'session' => array(
        'remember_me_seconds' => 2419200,
        'use_cookies' => true,
        'cookie_httponly' => true,
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
	
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(

            ),
        ),
    ),
	//........
// Conteúdo novo
// Doctrine config
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
// Fim do conteúdo novo
//........
);
