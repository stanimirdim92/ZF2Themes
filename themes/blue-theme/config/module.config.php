<?php

return [
    /*
     * These are mandatory, but if anyone who doesn't want to put text, just leave them empty: => ''.
     */
    'description' => 'ZF2 blue theme',
    'title' => 'Blue theme',
    'screenshot' => 'blue-theme.png',
    'author' => 'Stanimir Dimitrov',
    'version' => '1.0',
    'date' => '16.10.2015',
    'website' => '',

    /*
     * The only path structure that is a must and must stay this way is /public/themes/THEME_NAME/ and /module/Themes/THEME_NAME/.
     *
     * Every file structure inside /public/themes/THEME_NAME/ can be orginized according to the users needs,
     * as long as the paths are specified in here. Which means that these examples are fully valid.
     *
     * You can omit the first trailing slash. The system will always include one for you.
     *
     *   'css' => [
     *       '/habalababala/Anotherpath/to/style.css',
     *       'css/style.css',
     *       'scss/style.scss',
     *       '/css/scss/style.css',
     *   ],
     *   'js' => [
     *       '/habalababala/Anotherpath/to/custom.js',
     *       '/assets//js/ember.js',
     *       '3rdparty/jquery.js',
     *    ],
     *
     */
    'css' => [
        '/css/nameDoesntMatter.css',
    ],
    'js' => [
        '/js/nameDoesntMatter.js',
    ],

    /*
     * template_map is not necessary, but it's good for performance.
     */
    'template_map' => include __DIR__.'/../template_map.php',
    'template_path_stack' => [
        'blue-theme' => __DIR__.'/../view',
    ],
];
