<?php

declare(strict_types=1);

namespace App\Services\CarsImport\Car;

final readonly class Car extends BaseCar
{
    public function __construct(
        Photo $photo,
        Brand $brand,
        float $carrying,
        public int $passengerSeatsCount,
    ) {
        parent::__construct(CarType::Car, $photo, $brand, $carrying);
    }
}
