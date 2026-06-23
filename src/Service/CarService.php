<?php
declare(strict_types=1);

namespace app\Service;

use app\DTO\CarListResult;
use app\DTO\CreateCar;
use app\DTO\CreateCarOption;
use app\Entity\Car;
use app\Entity\CarOption;
use app\Mapper\Entity\CarMapper;
use app\Mapper\Entity\CarOptionMapper;
use app\Repository\CarOptionRepositoryInterface;
use app\Repository\CarRepositoryInterface;
use Yii;

readonly class CarService implements CarServiceInterface
{
    public function __construct(
        private CarRepositoryInterface       $carRepository,
        private CarOptionRepositoryInterface $carOptionRepository,
        private CarMapper                    $carMapper,
        private CarOptionMapper              $optionMapper,
    )
    {
    }

    public function create(CreateCar $carDTO, ?CreateCarOption $optionDTO = null): Car
    {
        $tx = Yii::$app->db->beginTransaction();
        try {
            $car = new Car(
                id: null,
                title: $carDTO->getTitle(),
                description: $carDTO->getDescription(),
                price: $carDTO->getPrice(),
                photoUrl: $carDTO->getPhotoUrl(),
                contacts: $carDTO->getContacts(),
                option: null
            );

            $carAR = $this->carMapper->toActiveRecord($car);
            $carAr = $this->carRepository->save($carAR);
            $car = $this->carMapper->fromActiveRecord($carAr);

            if (null !== $optionDTO) {
                $newCarOption = new CarOption(
                    id: null,
                    carId: $car->getId(),
                    brand: $optionDTO->getBrand(),
                    model: $optionDTO->getModel(),
                    year: $optionDTO->getYear(),
                    body: $optionDTO->getBody(),
                    mileage: $optionDTO->getMileage()
                );

                $carOptionAR = $this->optionMapper->toActiveRecord($newCarOption);
                $carOptionAr = $this->carOptionRepository->save($carOptionAR);
                $carOption = $this->optionMapper->fromActiveRecord($carOptionAr);
                $car->setOption($carOption);
            }
            $tx->commit();

            return $car;
        } catch (\Throwable $e) {
            $tx->rollBack();
            throw $e;
        }
    }

    public function findById(int $id): ?Car
    {
        $carAr = $this->carRepository->findById($id);

        if (null === $carAr) {
            return null;
        }

        return $this->carMapper->fromActiveRecord($carAr);
    }

    public function getList(int $page, int $limit): CarListResult
    {
        $items = $this->carRepository->findAll($page, $limit);

        $cars = [];

        foreach ($items as $ar) {
            $car = $this->carMapper->fromActiveRecord($ar);

            $cars[] = $car;
        }

        return new CarListResult(
            items: $cars,
            total: $this->carRepository->count(),
            page: $page,
            limit: $limit
        );
    }
}
