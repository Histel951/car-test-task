<?php

namespace app\Repository;

use app\DTO\CarListResult;
use app\Entity\Car;

interface CarRepositoryInterface
{
    public function save(Car $car): Car;
    public function findById(int $id): ?Car;
    public function findAll(int $page, int $limit): CarListResult;
}
