<?php

declare(strict_types=1);

namespace app\Mapper\Entity;

use app\Entity\CarOption;
use app\models\CarOptionAR;

final class CarOptionMapper
{
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
