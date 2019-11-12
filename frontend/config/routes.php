<?php
return [
    'GET /category/<id:\d+>/page/<page:\d>' => 'site/index',
    'GET /category/<id:\d+>' => 'site/index',
    'GET page/<page:\d>' => 'site/index',
    '' => 'site/index',
    'GET card/<id:\d+>' => 'card/index',

    'POST /v2/check/create' => 'api/create',
    'GET /v2/check/<id:\w+>/status' => 'api/status',
    'GET /v2/check/<id:\w+>/results' => 'api/result',

    '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
];