<?php
declare(strict_types = 1);

namespace app\Repository;

use app\Entity\CarOption;
use app\Mapper\Entity\CarOptionMapper;
use app\models\CarOptionAR;

readonly class CarOptionRepository implements CarOptionRepositoryInterface
{
    public function __construct(
        private CarOptionMapper $mapper
    )
    {
    }

    public function save(CarOption $option): CarOption
    {
        $carOptionAR = new CarOptionAR();
        $carOptionAR->setAttributes([
            'car_id' => $option->getCarId(),
            'brand' => $option->getBrand(),
            'model' => $option->getModel(),
            'year' => $option->getYear(),
            'body' => $option->getBody(),
            'mileage' => $option->getMileage(),
        ]);

        $carOptionAR->save();

        return $this->mapper->fromActiveRecord($carOptionAR);
    }
}
