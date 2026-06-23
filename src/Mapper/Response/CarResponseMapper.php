<?php
declare(strict_types = 1);

namespace app\Mapper\Response;

use app\Entity\Car;

class CarResponseMapper
{
    public function toArray(Car $car): array
    {
        $option = $car->getOption();

        return [
            'id' => $car->getId(),
            'title' => $car->getTitle(),
            'description' => $car->getDescription(),
            'price' => $car->getPrice(),
            'photo_url' => $car->getPhotoUrl(),
            'contacts' => $car->getContacts(),
            'options' => $option ? [
                'brand' => $option->getBrand(),
                'model' => $option->getModel(),
                'year' => $option->getYear(),
                'body' => $option->getBody(),
                'mileage' => $option->getMileage(),
            ] : null,
        ];
    }
}
