<?php

declare(strict_types=1);

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

Yii::$container->set(
    \app\Repository\Car\CarRepositoryInterface::class,
    \app\Repository\Car\CarRepository::class
);

Yii::$container->set(
    \app\Repository\CarOption\CarOptionRepositoryInterface::class,
    \app\Repository\CarOption\CarOptionRepository::class
);

Yii::$container->set(
    \app\Service\Car\CarServiceInterface::class,
    \app\Service\Car\CarService::class
);

Yii::$container->set(
    \app\Service\Transaction\TransactionManagerInterface::class,
    \app\Service\Transaction\YiiTransactionManager::class
);


(new yii\web\Application($config))->run();
