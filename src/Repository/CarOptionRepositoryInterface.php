<?php

namespace app\Repository;

use app\Entity\CarOption;

interface CarOptionRepositoryInterface
{
    public function save(CarOption $option): CarOption;
}
