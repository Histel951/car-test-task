<?php

namespace app\UseCase;

use app\Mapper\Request\CreateCarOptionRequestMapper;
use app\Mapper\Request\CreateCarRequestMapper;
use app\Mapper\Response\CarResponseMapper;
use app\Service\Car\CarServiceInterface;

readonly class CreateCarUseCase
{
    public function __construct(
        private CarServiceInterface          $carService,
        private CreateCarRequestMapper       $carRequestMapper,
        private CreateCarOptionRequestMapper $carOptionRequestMapper,
        private CarResponseMapper            $responseMapper,
    )
    {
    }

    public function execute(array $data): array
    {
        $carDTO = $this->carRequestMapper->fromArray($data);
        $carOptionDTO = $this->carOptionRequestMapper->fromArray($data);

        $car = $this->carService->create($carDTO, $carOptionDTO);

        return $this->responseMapper->toArray($car);
    }
}
