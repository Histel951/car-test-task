<?php

declare(strict_types=1);

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

Yii::$container->set(
    \app\Repository\CarRepositoryInterface::class,
    \app\Repository\CarRepository::class
);

Yii::$container->set(
    \app\Repository\CarOptionRepositoryInterface::class,
    \app\Repository\CarOptionRepository::class
);

Yii::$container->set(
    \app\Service\CarServiceInterface::class,
    \app\Service\CarService::class
);


(new yii\web\Application($config))->run();
