<?php

namespace app\UseCase;

use app\Mapper\Response\CarResponseMapper;
use app\Mapper\Response\ListResponseMapper;
use app\Service\Car\CarServiceInterface;

readonly class GetCarListUseCase
{
    public function __construct(
        private CarServiceInterface $carService,
        private CarResponseMapper   $responseMapper,
        private ListResponseMapper  $listMapper,
    )
    {
    }

    public function execute(int $page): array
    {
        $limit = 10;

        $result = $this->carService->getList($page, $limit);
        $data = array_map(
            fn($car) => $this->responseMapper->toArray($car),
            $result->getItems()
        );

        return $this->listMapper->toArray(
            data: $data,
            page: $result->getPage(),
            limit: $result->getLimit(),
            total: $result->getTotal()
        );
    }
}
