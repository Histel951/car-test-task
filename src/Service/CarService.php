<?php
declare(strict_types=1);

namespace app\Service;

use app\DTO\CarListResult;
use app\DTO\CreateCar;
use app\DTO\CreateCarOption;
use app\Entity\Car;
use app\Entity\CarOption;
use app\Repository\CarOptionRepositoryInterface;
use app\Repository\CarRepositoryInterface;

readonly class CarService implements CarServiceInterface
{
    public function __construct(
        private CarRepositoryInterface       $carRepository,
        private CarOptionRepositoryInterface $carOptionRepository,
    )
    {
    }

    public function create(CreateCar $carDTO, ?CreateCarOption $optionDTO = null): Car
    {
        $newCar = new Car(
            id: null,
            title: $carDTO->getTitle(),
            description: $carDTO->getDescription(),
            price: $carDTO->getPrice(),
            photoUrl: $carDTO->getPhotoUrl(),
            contacts: $carDTO->getContacts(),
            option: null
        );

        $car = $this->carRepository->save($newCar);

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

            $carOption = $this->carOptionRepository->save($newCarOption);
            $car->setOption($carOption);
        }

        return $car;
    }

    public function findById(int $id): ?Car
    {
        return $this->carRepository->findById($id);
    }

    public function getList(int $page, int $limit): CarListResult
    {
        return $this->carRepository->findAll($page, $limit);
    }
}
