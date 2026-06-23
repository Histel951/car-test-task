<?php

namespace app\Repository\CarOption;

use app\models\CarOptionAR;

interface CarOptionRepositoryInterface
{
    public function save(CarOptionAR $option): CarOptionAR;
}
