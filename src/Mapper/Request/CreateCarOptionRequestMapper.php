<?php
declare(strict_types = 1);

namespace app\Mapper\Request;

use app\DTO\CreateCarOption;

class CreateCarOptionRequestMapper
{
    public function fromArray(array $data): ?CreateCarOption
    {
        if (empty($data['options'])) {
            return null;
        }

        $opt = $data['options'];

        return new CreateCarOption(
            brand: $opt['brand'],
            model: $opt['model'],
            year: (int)$opt['year'],
            body: $opt['body'],
            mileage: (int)$opt['mileage']
        );
    }
}
