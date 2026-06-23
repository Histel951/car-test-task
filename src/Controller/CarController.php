<?php

namespace app\Controller;

use app\UseCase\GetCarByIdUseCase;
use app\UseCase\GetCarListUseCase;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\UseCase\CreateCarUseCase;

class CarController extends Controller
{
    public function __construct(
        $id,
        $module,
        private readonly CreateCarUseCase $createCarUseCase,
        private readonly GetCarByIdUseCase $getCarByIdUseCase,
        private readonly GetCarListUseCase $getCarListUseCase,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
    }

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [
            'class' => \yii\filters\ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
    }

    /**
     * POST /car/create
     */
    public function actionCreate(): array
    {
        $data = Yii::$app->request->post();

        $result = $this->createCarUseCase->execute($data);

        Yii::$app->response->statusCode = 201;

        return $result;
    }

    public function actionView(int $id): array
    {
        $result = $this->getCarByIdUseCase->execute($id);

        if ($result === null) {
            Yii::$app->response->statusCode = 404;

            return [
                'message' => 'Car not found',
            ];
        }

        return $result;
    }

    public function actionList(): array
    {
        $page = (int)Yii::$app->request->get('page', 1);

        return $this->getCarListUseCase->execute($page);
    }
}
