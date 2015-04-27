<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Produto\Controller\Produto' => 'Produto\Controller\ProdutoController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'produto' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/produto[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'route'    => '/produto/index',
                        'controller' => 'Produto\Controller\Produto',
                        'action'     => 'index',
                        //'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'produto' => __DIR__ . '/../view',
        ),
    ),
);