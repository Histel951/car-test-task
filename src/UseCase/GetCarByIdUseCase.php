<?php

namespace app\UseCase;

use app\Mapper\Response\CarResponseMapper;
use app\Service\Car\CarServiceInterface;

readonly class GetCarByIdUseCase
{
    public function __construct(
        private CarServiceInterface $carService,
        private CarResponseMapper   $responseMapper,
    )
    {
    }

    public function execute(int $id): ?array
    {
        $car = $this->carService->findById($id);

        if (!$car) {
            return null;
        }

        return $this->responseMapper->toArray($car);
    }
}
