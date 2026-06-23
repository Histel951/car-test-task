<?php
declare(strict_types = 1);

namespace app\Repository;

use app\models\CarOptionAR;

readonly class CarOptionRepository implements CarOptionRepositoryInterface
{
    public function save(CarOptionAR $option): CarOptionAR
    {
        if (!$option->save()) {
            throw new \RuntimeException('Car option save failed');
        }

        return $option;
    }
}
