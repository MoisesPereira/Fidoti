<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Fidoti\Controller\Fidoti' => 'Fidoti\Controller\FidotiController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'fidoti' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/fidoti[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'route'    => '/fidoti/index',
                        'controller' => 'Fidoti\Controller\Fidoti',
                        'action'     => 'index',
                        //'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'fidoti' => __DIR__ . '/../view',
        ),
    ),
);