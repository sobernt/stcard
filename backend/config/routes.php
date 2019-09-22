<?php
return [
    'POST /categories' => 'category/create',
    'GET /categories' => 'category/index',
    'GET /categories/<id:\d+>' => 'category/index',
    'GET /categories/<id:\d+>/delete' => 'category/delete',
    'POST /categories/<id:\d+>' => 'category/update',

    'GET /category/<id:\d+>/page/<page:\d>' => 'site/index',
    'GET page/<page:\d>' => 'site/index',
    'GET /category/<id:\d+>' => 'site/index',
    '' => 'site/index',
        'POST /card' => 'card/create',
        'GET /card' => 'card/index',
        'GET /card/<id:\d+>' => 'card/index',
        'GET /card/<id:\d+>/delete' => 'card/delete',
        'POST /card/<id:\d+>' => 'card/update',
    '/login' => '/site/login',
    '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
];