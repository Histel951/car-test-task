<?php

namespace app\Service\Car;

use app\DTO\CarListResult;
use app\DTO\CreateCar;
use app\DTO\CreateCarOption;
use app\Entity\Car;

interface CarServiceInterface
{
    public function create(CreateCar $carDTO, ?CreateCarOption $optionDTO = null): Car;
    public function findById(int $id): ?Car;
    public function getList(int $page, int $limit): CarListResult;
}
