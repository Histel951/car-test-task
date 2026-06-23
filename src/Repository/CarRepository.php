<?php
declare(strict_types = 1);

namespace app\Repository;

use app\DTO\CarListResult;
use app\Entity\Car;
use app\Mapper\Entity\CarMapper;
use app\Mapper\Entity\CarOptionMapper;
use app\models\CarAR;

readonly class CarRepository implements CarRepositoryInterface
{
    public function __construct(
        private CarMapper $mapper,
        private CarOptionMapper $optionMapper,
    ) {
    }

    public function save(Car $car): Car
    {
        $carAR = new CarAR();
        $carAR->setAttributes([
            'title' => $car->getTitle(),
            'description' => $car->getDescription(),
            'price' => $car->getPrice(),
            'photo_url' => $car->getPhotoUrl(),
            'contacts' => $car->getContacts(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $carAR->save();

        return $this->mapper->fromActiveRecord($carAR);
    }

    public function findById(int $id): ?Car
    {
        $ar = CarAR::find()
            ->with('option')
            ->where(['id' => $id])
            ->one();

        if (!$ar) {
            return null;
        }

        $car = $this->mapper->fromActiveRecord($ar);

        if (null !== $ar->option) {
            $car->setOption(
                $this->optionMapper->fromActiveRecord($ar->option)
            );
        }

        return $car;
    }

    public function findAll(int $page, int $limit): CarListResult
    {
        $query = CarAR::find()
            ->with('option');

        $total = (int)$query->count();

        $items = $query
            ->offset(($page - 1) * $limit)
            ->limit($limit)
            ->all();

        $cars = [];

        foreach ($items as $ar) {
            $car = $this->mapper->fromActiveRecord($ar);

            if (null !== $ar->option) {
                $car->setOption(
                    $this->optionMapper->fromActiveRecord($ar->option)
                );
            }

            $cars[] = $car;
        }

        return new CarListResult(
            items: $cars,
            total: $total,
            page: $page,
            limit: $limit
        );
    }
}
