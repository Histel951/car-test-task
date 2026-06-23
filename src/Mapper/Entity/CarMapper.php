<?php
declare(strict_types = 1);

namespace app\Mapper\Entity;

use app\Entity\Car;
use app\Entity\CarOption;
use app\models\CarAR;

final class CarMapper
{
    public function toActiveRecord(Car $car): CarAR
    {
        $carAr = new CarAR();
        $carAr->setAttributes([
            'title' => $car->getTitle(),
            'description' => $car->getDescription(),
            'price' => $car->getPrice(),
            'photo_url' => $car->getPhotoUrl(),
            'contacts' => $car->getContacts(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return $carAr;
    }

    public function fromActiveRecord(CarAR $ar): Car
    {
        $option = $ar->option;
        if (null !== $option) {
            $option = new CarOption(
                id: $option->id,
                carId: $option->car_id,
                brand: $option->brand,
                model: $option->model,
                year: $option->year,
                body: $option->body,
                mileage: $option->mileage
            );
        }

        return new Car(
            id: $ar->id,
            title: $ar->title,
            description: $ar->description,
            price: (float)$ar->price,
            photoUrl: $ar->photo_url,
            contacts: $ar->contacts,
            option: $option,
        );
    }
}
