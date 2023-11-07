<?php

declare(strict_types=1);

namespace App\Services\CarsImport\Car;

final readonly class SpecMachine extends BaseCar
{
    public function __construct(
        Photo $photo,
        Brand $brand,
        float $carrying,
        public string $extra,
    ) {
        parent::__construct(CarType::SpecMachine, $photo, $brand, $carrying);
    }
}
