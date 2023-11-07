<?php

declare(strict_types=1);

namespace App\Services\CarsImport;

use App\Services\CarsImport\Car\BaseCar;

interface CarsImporterInterface
{
    /**
     * @return array<BaseCar>
     */
    public function getCarList(string $filePath): array;
}
