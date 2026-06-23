<?php

namespace app\DTO;

use app\Entity\Car;

readonly class CarListResult
{
    /**
     * @param array<Car> $items
     */
    public function __construct(
        private array $items,
        private int   $total,
        private int   $page,
        private int   $limit
    )
    {
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }
}
