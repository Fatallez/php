<?php

return [
    'title' => 'Мой магазин',
    'defaultControllerName' => 'good',

    'components' => [
      'db' => [
          'class' => \App\services\DB::class,
          'config' => [
              'driver' => 'mysql',
              'host' => 'localhost:3307',
              'dbname' => 'php',
              'charset' => 'UTF8',
              'username' => 'root',
              'password' => '',
          ]
      ],
      'twigRenderer' => [
        'class' => \App\services\renderers\TwigRenderer::class,
      ],
      'request' => [
        'class' => \App\services\Request::class,
      ],
      'goodRepository' => [
        'class' => \App\repositories\GoodRepository::class,
      ],
      'userRepository' => [
        'class' => \App\repositories\UserRepository::class,
      ],
      'basketServices' => [
        'class' => \App\services\BasketServices::class,
      ],
    ],
];
