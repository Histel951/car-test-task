<?php
declare(strict_types = 1);

namespace app\Repository;

use app\models\CarAR;

readonly class CarRepository implements CarRepositoryInterface
{
    public function save(CarAR $car): CarAR
    {
        if (!$car->save()) {
            throw new \RuntimeException('Car save failed');
        }

        return $car;
    }

    public function findById(int $id): ?CarAR
    {
        $ar = CarAR::find()
            ->with('option')
            ->where(['id' => $id])
            ->one();

        if (!$ar) {
            return null;
        }

        return $ar;
    }

    public function findAll(int $page, int $limit): array
    {
        $query = CarAR::find()
            ->with('option');

        $items = $query
            ->offset(($page - 1) * $limit)
            ->limit($limit)
            ->all();

        return $items;
    }

    public function count(): int
    {
        return (int)CarAR::find()->count();
    }
}
