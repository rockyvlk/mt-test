<?php

declare(strict_types=1);

namespace App\Services\CarsImport\Car;

final readonly class Truck extends BaseCar
{
    public function __construct(
        Photo $photo,
        Brand $brand,
        float $carrying,
        public Body $body
    ) {
        parent::__construct(CarType::Truck, $photo, $brand, $carrying);
    }

    public function getBodyVolume(): float
    {
        return $this->body->getVolume();
    }
}
