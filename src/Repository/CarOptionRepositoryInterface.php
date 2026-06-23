<?php

namespace app\Repository;

use app\models\CarOptionAR;

interface CarOptionRepositoryInterface
{
    public function save(CarOptionAR $option): CarOptionAR;
}
