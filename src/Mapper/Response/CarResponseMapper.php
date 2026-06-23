<?php
declare(strict_types = 1);

namespace app\Mapper\Response;

use app\Entity\Car;

class CarResponseMapper
{
    public function toArray(Car $car): array
    {
        return [
            'id' => $car->getId(),
            'title' => $car->getTitle(),
            'description' => $car->getDescription(),
            'price' => $car->getPrice(),
            'photo_url' => $car->getPhotoUrl(),
            'contacts' => $car->getContacts(),
            'options' => $car->getOption() ? [
                'brand' => $car->getOption()->getBrand(),
                'model' => $car->getOption()->getModel(),
                'year' => $car->getOption()->getYear(),
                'body' => $car->getOption()->getBody(),
                'mileage' => $car->getOption()->getMileage(),
            ] : null,
        ];
    }
}
