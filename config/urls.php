<?php

return [
    // auth
    'login' => 'auth/login',
    'logout' => 'auth/logout',
    'activate' => 'auth/activate',

    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
];
