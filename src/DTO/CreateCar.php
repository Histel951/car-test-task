<?php

namespace app\DTO;

readonly class CreateCar
{
    public function __construct(
        private string $title,
        private string $description,
        private float $price,
        private string $photoUrl,
        private string $contacts
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getPhotoUrl(): string
    {
        return $this->photoUrl;
    }

    public function getContacts(): string
    {
        return $this->contacts;
    }
}
