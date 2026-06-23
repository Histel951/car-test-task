<?php
declare(strict_types = 1);

namespace app\Mapper\Request;

use app\DTO\CreateCar;

class CreateCarRequestMapper
{
    public function fromArray(array $data): CreateCar
    {
        return new CreateCar(
            title: $data['title'],
            description: $data['description'],
            price: (float) $data['price'],
            photoUrl: $data['photo_url'],
            contacts: $data['contacts']
        );
    }
}
