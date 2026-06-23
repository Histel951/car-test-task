<?php

namespace app\Repository\Car;

use app\models\CarAR;

interface CarRepositoryInterface
{
    public function save(CarAR $car): CarAR;
    public function findById(int $id): ?CarAR;

    /**
     * @param int $page
     * @param int $limit
     * @return array<CarAR>
     */
    public function findAll(int $page, int $limit): array;
    public function count(): int;
}
