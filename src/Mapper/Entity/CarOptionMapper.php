<?php

declare(strict_types=1);

namespace app\Mapper\Entity;

use app\Entity\CarOption;
use app\models\CarOptionAR;

final class CarOptionMapper
{
    public function toActiveRecord(CarOption $carOption): CarOptionAR
    {
        $carOptionAr = new CarOptionAR();
        $carOptionAr->setAttributes([
            'car_id' => $carOption->getCarId(),
            'brand' => $carOption->getBrand(),
            'model' => $carOption->getModel(),
            'year' => $carOption->getYear(),
            'body' => $carOption->getBody(),
            'mileage' => $carOption->getMileage(),
        ]);

        return $carOptionAr;
    }

    public function fromActiveRecord(CarOptionAR $ar): CarOption
    {
        return new CarOption(
            id: $ar->id,
            carId: $ar->car_id,
            brand: $ar->brand,
            model: $ar->model,
            year: $ar->year,
            body: $ar->body,
            mileage: $ar->mileage
        );
    }
}
