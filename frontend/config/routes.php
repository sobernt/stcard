<?php
return [
    'GET /category/<id:\d+>/page/<page:\d>' => 'site/index',
    'GET /category/<id:\d+>' => 'site/index',
    'GET page/<page:\d>' => 'site/index',
    '' => 'site/index',
    'GET card/<id:\d+>' => 'card/index',
    '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
];