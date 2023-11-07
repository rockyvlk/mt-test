<?php

declare(strict_types=1);

namespace App\Services\CarsImport;

use App\Services\CarsImport\Car\CarFactory;

final class CarsImporter implements CarsImporterInterface
{
    public function __construct(
        public FileReader $fileReader,
        public CarFactory $carFactory,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function getCarList(string $filePath): array
    {
        $cars = [];
        foreach ($this->fileReader->getRow($filePath) as $row) {
            try {
                $cars[] = $this->carFactory->create($row);
            } catch (\Throwable) {
                continue;
            }
        }
        return $cars;
    }
}
