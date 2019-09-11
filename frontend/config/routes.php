<?php
return [
    'page/<page:\d>' => 'site/index',
    '' => 'site/index',
    'GET card/<id:\d+>' => 'card/index',
    '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
];