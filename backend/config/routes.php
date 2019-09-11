<?php
return [
    'page/<page:\d>' => 'site/index',
    '' => 'site/index',
    'POST /card' => 'card/create',
    'GET /card' => 'card/index',
    'GET /card/<id:\d+>' => 'card/index',
    'GET /card/<id:\d+>/delete' => 'card/delete',
    'POST /card/<id:\d+>' => 'card/update',
    '/login' => '/site/login',
    '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
];