<?php
declare(strict_types = 1);

namespace app\Entity;

final class Car
{
    public function __construct(
        private readonly ?int       $id,
        private readonly string     $title,
        private readonly string     $description,
        private readonly float      $price,
        private readonly string     $photoUrl,
        private readonly string     $contacts,
        private ?CarOption $option = null,
    )
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

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

    public function getOption(): ?CarOption
    {
        return $this->option;
    }

    public function setOption(?CarOption $option): void
    {
        $this->option = $option;
    }
}
