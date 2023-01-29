<?php return array (
  'router' => 
  array (
    'routes' => 
    array (
      'zf2-themes' =>
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/zf2-themes',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'ZF2Themes\\Controller',
            'controller' => 'Index',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'default' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[:controller[/:action]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
              ),
              'defaults' => 
              array (
              ),
            ),
          ),
        ),
      ),
    ),
  ),
  'controllers' => 
  array (
    'factories' => 
    array (
      'ZF2Themes\\Controller\\Index' => 'ZF2Themes\\Factory\\Controller\\IndexControllerFactory',
    ),
  ),
  'service_manager' => 
  array (
    'factories' => 
    array (
      'initThemes' => 'ZF2Themes\\Factory\\ThemesFactory',
      'getThemesFromDir' => 'ZF2Themes\\Factory\\GetThemesFromDir',
    ),
    'invokables' => 
    array (
      'reloadService' => 'ZF2Themes\\Service\\ReloadService',
    ),
  ),
  'theme' => 
  array (
    'name' => 'default',
  ),
);
