<?php

namespace app\DTO;

readonly class CreateCarOption
{
    public function __construct(
        private string $brand,
        private string $model,
        private int $year,
        private string $body,
        private int $mileage
    ) {}

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }
}
