<?php

declare(strict_types=1);

namespace App\Services\CarsImport\Car;

abstract readonly class BaseCar
{
    public function __construct(
        public CarType $carType,
        public Photo $photo,
        public Brand $brand,
        public float $carrying,
    ) {
    }

    public function getPhotoFileExt(): string
    {
        return $this->photo->getFileExt();
    }
}
