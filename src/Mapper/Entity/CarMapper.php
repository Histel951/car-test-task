<?php
declare(strict_types = 1);

namespace app\Mapper\Entity;

use app\Entity\Car;
use app\models\CarAR;

final class CarMapper
{
    public function fromActiveRecord(CarAR $ar): Car
    {
        return new Car(
            id: $ar->id,
            title: $ar->title,
            description: $ar->description,
            price: (float)$ar->price,
            photoUrl: $ar->photo_url,
            contacts: $ar->contacts,
            option: null,
        );
    }
}
